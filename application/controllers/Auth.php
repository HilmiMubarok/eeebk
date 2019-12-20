<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->model('CRUDModel', 'crud');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			redirect("dashboard");
		}
		$data['title'] = "Login EBK";

		$this->load->view('auth/login', $data);		
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$auth     = array('username' => $username);
		$authUser = array('nis' => $username);
		$res      = $this->AuthModel->cek_login('users', $auth)->row();
		$getUser  = $this->crud->getWhere($authUser, 'siswa')->row();

		if ($res) {

			if (password_verify($password, $res->password)) {
				$user_data = array(
					'username'   => $res->username,
					'nama_siswa' => $getUser->nama_siswa,
					'level'      => $res->level,
					'logged_in'  => TRUE
				);


				$this->session->set_userdata($user_data);

				redirect(base_url("dashboard"));
			}

		} else {
			$flash_data = array(
				'pesan' => 'Id User atau Password Salah'
			);
			$this->session->set_flashdata($flash_data);
			redirect(base_url("auth"));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */