<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PelanggaranModel');
		$this->load->model('CRUDModel');
		if ($this->session->userdata('level') !== "bk") {
			show_404();
		}
	}

	public function index()
	{
		$data['title']       = "Data Pelanggaran";
		$data['title_modal'] = "Tambah Data Pelanggaran";
		$data['pelanggaran'] = $this->CRUDModel->getAll('pelanggaran')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pelanggaran/index', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('modals/add_pelanggaran', $data);
	}

	public function save()
	{
		$data = array(
			'nama_pelanggaran' => $this->input->post('nama_pelanggaran'),
			'skor_pelanggaran' => $this->input->post('skor_pelanggaran')
		);

		$save = $this->CRUDModel->save($data, 'pelanggaran');

		if ($save) {
			$data = array(
				'pesan' => 'Data Berhasil Disimpan',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("pelanggaran");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Disimpan',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("pelanggaran");
		}
	}

	public function edit($id)
	{
		$get_pelanggaran     = array('id_pelanggaran' => $id);
		$data['pelanggaran'] = $this->CRUDModel->getWhere($get_pelanggaran, 'pelanggaran')->row();
		$data['title']       = "Edit Pelanggaran ".$data['pelanggaran']->nama_pelanggaran;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('pelanggaran/edit', $data);
		$this->load->view('templates/footer', $data);
	}

	public function update()
	{
		$where = array('id_pelanggaran' => $this->input->post('id_pelanggaran'));
		$data  = array(
			'nama_pelanggaran' => $this->input->post('nama_pelanggaran'),
			'skor_pelanggaran' => $this->input->post('skor_pelanggaran')
		);

		$update = $this->CRUDModel->update($where, $data, 'pelanggaran');

		if ($update) {
			$data = array(
				'pesan' => 'Data Berhasil Diupdate',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("pelanggaran");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Diupdate',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("pelanggaran");
		}
	}

	public function delete($id)
	{
		$where = array('id_pelanggaran' => $id);
		$delete = $this->CRUDModel->delete($where, 'pelanggaran');

		if ($delete) {
			$data = array(
				'pesan' => 'Data Berhasil Dihapus',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("pelanggaran");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Dihapus',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("pelanggaran");
		}
	}

}

/* End of file Pelanggaran.php */
/* Location: ./application/controllers/Pelanggaran.php */