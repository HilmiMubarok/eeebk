<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DashboardModel');
		$this->load->model('CRUDModel', 'crud');
		if ($this->session->userdata('logged_in') == FALSE ) {
			redirect("auth");
		}
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		
		if ($this->session->userdata('level') == "siswa") {
			$data['level']        = "Siswa";
			$data['jumlah_point'] = $this->crud->getWhere(array('siswa_id' => $this->session->userdata('username')), 'point')->row();
			$data['jumlah_skor']  = $this->crud->getWhere(array('siswa_id' => $this->session->userdata('username')), 'skor')->row();
			$data['jumlah_pelanggaran']  = count($this->crud->getWhere(array('siswa_id' => $this->session->userdata('username')), 'review_pelanggaran')->result());
		} elseif ($this->session->userdata('level') == "bk") {
			$where = array(
				'status' => 'pending'
			);
			$data['pelanggaran_pending'] = count($this->crud->getWhere($where, 'review_pelanggaran')->result());
			$data['level']   = "BK";
		} elseif ($this->session->userdata('level') == "ortu") {
			$data['level']   = "Orang Tua";
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */