<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konseling extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') !== "siswa") {
			show_404();
		}
		$this->load->model('CRUDModel', 'crud');
		$this->load->model('KonselingModel', 'konseling');

	}

	public function index()
	{
		$data['title']       = "Konseling";
		$data['title_modal'] = "Tambah Konseling";
		$data['pelanggaran'] = $this->crud->getAll('pelanggaran')->result();
		$data['konseling']   = $this->konseling->getKonseling($this->session->userdata('username'))->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('konseling/index', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('modals/siswa/add_konseling', $data);
	}

	public function save()
	{
		$data = array(
			'siswa_id'       => $this->session->userdata('username'),
			'pelanggaran_id' => $this->input->post('nama_pelanggaran'),
			'status'         => 'pending'
		);

		$save = $this->crud->save($data, 'review_pelanggaran');

		if ($save) {
			$data = array(
				'pesan' => 'Data Berhasil Disimpan',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("konseling");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Disimpan',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("konseling");
		}
	}

}

/* End of file Konseling.php */
/* Location: ./application/controllers/Konseling.php */