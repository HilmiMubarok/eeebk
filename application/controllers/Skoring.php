<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skoring extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') !== "bk") {
			show_404();
		}
		$this->load->model('CRUDModel', 'crud');
		$this->load->model('SkoringModel', 'skoring');

	}

	public function index()
	{
		$data['title']   = "Skoring";
		$data['skoring'] = $this->skoring->getPelanggaranByStatus('pending')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('skoring/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function acc($siswa_id, $pelanggaran_id, $skor_pelanggaran)
	{

		$acc = $this->skoring->acc($siswa_id, $pelanggaran_id, $skor_pelanggaran);

		if ($acc) {
			$data = array(
				'pesan' => 'Data Berhasil Disetujui',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("skoring");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Disetujui',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("skoring");
		}

	}

}

/* End of file Skoring.php */
/* Location: ./application/controllers/Skoring.php */