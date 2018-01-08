<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");

		$this->load->model('User_model');
	}

	public function index($username)
	{
		$this->load->model('Thread_model');
		$this->load->model('Berita_model');

		// ambil data user
		$data['user'] = $this->User_model->get_user($username);

		// ambil data thread oleh user
		$data['threads'] = $this->Thread_model->get_thread_by_user($username);

		// ambil data berita oleh user
		$data['beritas'] = $this->Berita_model->get_berita_by_user($username);

		$this->load->view('master/header');
		$this->load->view('user/index', $data);
		$this->load->view('master/footer');
	}

}
