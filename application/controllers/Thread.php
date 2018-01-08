<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thread extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");

		$this->load->model('Thread_model');
	}

	public function index()
	{
		$data['threads'] = $this->Thread_model->get_threads();

		$this->load->view('master/header');
		$this->load->view('thread/index', $data);
		$this->load->view('master/footer');
	}

	public function add()
	{
		// jika belum login, redirect halaman login
		if ( ! $this->session->userdata('user_id')) {
			redirect('auth');
		}

		$this->load->model('Kategori_model');

		// ambil data kategori
		$data['kategories'] = $this->Kategori_model->get_kategories();

		$this->load->view('master/header');
		$this->load->view('thread/add', $data);
		$this->load->view('master/footer');
	}

	public function save()
	{
		$judul = $this->input->post('judul');
		$konten = $this->input->post('konten');
		$kategori_id = $this->input->post('kategori_id');
		$user_id = $this->session->userdata('user_id');

		$data = [
			'judul' => $judul,
			'konten' => $konten,
			'kategori_id' => $kategori_id,
			'user_id' => $user_id
		];

		$id = $this->Thread_model->add_thread($data);

		redirect('thread/view/' . $id);
	}

	public function delete($id)
	{
		// cek pemilik thread
		$result = $this->Thread_model->get_thread($id);

		// user yang diperbolehkan menghapus hanya pemilik thread atau admin
		if ($result['user_id'] == $this->session->userdata('user_id') || $this->session->userdata('role') == 1)
		{
			$this->Thread_model->delete_thread($id);

			redirect('thread');
		}
		else
		{
			redirect('thread/view/' . $id);
		}
	}

	public function view($id)
	{
		$this->load->model('Komentarthread_model');

		// ambil data thread
		$data['thread'] = $this->Thread_model->get_thread($id);

		// ambil data komentar
		$data['komentars'] = $this->Komentarthread_model->get_komentars($id);

		$this->load->view('master/header');
		$this->load->view('thread/view', $data);
		$this->load->view('master/footer');
	}

	public function add_komentar()
	{
		$this->load->model('Komentarthread_model');

		$komentar = $this->input->post('komentar');
		$user_id = $this->session->userdata('user_id');
		$thread_id = $this->input->post('thread_id');

		$data = [
			'user_id' => $user_id,
			'komentar' => $komentar,
			'thread_id' => $thread_id
		];

		// simpan komentar ke database
		$this->Komentarthread_model->add_komentar($data);

		redirect('thread/view/' . $thread_id);
	}

	public function delete_komentar($id)
	{
		$this->load->model('Komentarthread_model');

		// cek pemilik komentar
		$result = $this->Komentarthread_model->get_komentar($id);

		// user yang diperbolehkan menghapus hanya pemilik komentar atau admin
		if ($result['user_id'] == $this->session->userdata('user_id') || $this->session->userdata('role') == 1)
		{
			$this->Komentarthread_model->delete_komentar($id);
		}

		redirect('thread/view/' . $result['thread_id']);
	}

}
