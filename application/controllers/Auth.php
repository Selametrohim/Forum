<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");

		$this->load->model('User_model');
	}

	public function index()
	{
		// jika sudah pernah login, redirect ke halaman utama
		if ($this->session->userdata('user_id')) {
			redirect();
		}

		$this->load->view('auth');
	}

	public function sign_in_process()
	{
		// tangkap data ke variable
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// cari user dengan username/email
		$result = $this->User_model->auth_user($username);

		if ($result)
		{
			// cek password sama dengan database atau tidak
			if (password_verify($password, $result['password']))
			{
				// simpan data session
				$this->session->set_userdata([
					'user_id'		=> $result['id'],
					'username'	=> $result['username'],
					'nama'			=> $result['nama'],
					'role'			=> $result['role']
				]);

				redirect();
			}
			else
			{
				// kondisi jika password salah
				$this->session->set_flashdata('message', 'Password salah');

				redirect('auth');
			}
		}
		else
		{
			// kondisi jika username/email tidak ditemukan
			$this->session->set_flashdata('message', 'User tidak ditemukan');

			redirect('auth');
		}
	}

	public function register()
	{
		// tangkap data ke variable
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// cek di database username/email sudah pernah didaftarkan atau tidak
		if (empty($this->User_model->auth_user($username)) && empty($this->User_model->auth_user($email)))
		{
			$data = [
				'nama' => $nama,
				'email' => $email,
				'username' => $username,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'role' => 2
			];

			// tambah user baru ke database
			$id = $this->User_model->add_user($data);

			$this->session->set_flashdata('message', 'User tidak ditemukan');

			$this->session->set_userdata([
				'user_id'		=> $id,
				'username'	=> $username,
				'nama'			=> $nama,
				'role'			=> 2
			]);

			redirect();
		}
		else
		{
			// jika username/email sudah ada
			$this->session->set_flashdata('message', 'Username/email sudah pernah terdaftar');

			redirect('auth');
		}
	}

	public function sign_out()
	{
		// hapus data session
		$this->session->unset_userdata([
			'user_id',
			'username',
			'role',
			'nama'
		]);
		
		redirect('auth');
	}

}
