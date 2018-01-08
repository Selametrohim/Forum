<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");

		$this->load->model('Berita_model');
	}

	public function index()
	{
		$data['beritas'] = $this->Berita_model->get_beritas();

		$this->load->view('master/header');
		$this->load->view('berita/index', $data);
		$this->load->view('master/footer');
	}

	public function add()
	{
		// jika bukan admin, redirect halaman login
		if ($this->session->userdata('role') != 1) {
			redirect('auth');
		}

		$this->load->view('master/header');
		$this->load->view('berita/add');
		$this->load->view('master/footer');
	}

	public function save()
	{
		$judul = $this->input->post('judul');
		$konten = $this->input->post('konten');
		$user_id = $this->session->userdata('user_id');

		$data = [
			'judul' => $judul,
			'konten' => $konten,
			'user_id' => $user_id
		];

		$id = $this->Berita_model->add_berita($data);

		redirect('berita/view/' . $id);
	}

	public function delete($id)
	{
		// cek pemilik thread
		$result = $this->Berita_model->get_berita($id);

		// user yang diperbolehkan menghapus hanya pemilik thread atau admin
		if ($result['user_id'] == $this->session->userdata('user_id') || $this->session->userdata('role') == 1)
		{
			$this->Berita_model->delete_berita($id);

			redirect('berita');
		}
		else
		{
			redirect('berita/view/' . $id);
		}
	}

	public function view($id)
	{
		$this->load->model('Komentarberita_model');

		// ambil data thread
		$data['berita'] = $this->Berita_model->get_berita($id);

		// ambil data komentar
		$data['komentars'] = $this->Komentarberita_model->get_komentars($id);

		$this->load->view('master/header');
		$this->load->view('berita/view', $data);
		$this->load->view('master/footer');
	}

	public function add_komentar()
	{
		$this->load->model('Komentarberita_model');

		$komentar = $this->input->post('komentar');
		$user_id = $this->session->userdata('user_id');
		$berita_id = $this->input->post('berita_id');

		$data = [
			'user_id' => $user_id,
			'komentar' => $komentar,
			'berita_id' => $berita_id
		];

		// simpan komentar ke database
		$this->Komentarberita_model->add_komentar($data);

		redirect('berita/view/' . $berita_id);
	}

	public function delete_komentar($id)
	{
		$this->load->model('Komentarberita_model');

		// cek pemilik komentar
		$result = $this->Komentarberita_model->get_komentar($id);

		// user yang diperbolehkan menghapus hanya pemilik komentar atau admin
		if ($result['user_id'] == $this->session->userdata('user_id') || $this->session->userdata('role') == 1)
		{
			$this->Komentarberita_model->delete_komentar($id);
		}

		redirect('berita/view/' . $result['berita_id']);
	}

}
