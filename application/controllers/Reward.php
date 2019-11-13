<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reward extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('RewardModel');
		$this->load->model('CRUDModel', 'crud');
		if ($this->session->userdata('level') !== "bk") {
			show_404();
		}
	}

	public function index()
	{
		$data['title']       = "Data Reward";
		$data['title_modal'] = "Tambah Data Reward";
		$data['reward']      = $this->crud->getAll('reward')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('reward/index', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('modals/reward/add_reward', $data);
	}

	public function save()
	{
		$data = array(
			'nama_reward' => $this->input->post('nama_reward'),
			'skor_reward' => $this->input->post('skor_reward')
		);

		$save = $this->crud->save($data, 'reward');

		if ($save) {
			$data = array(
				'pesan' => 'Data Berhasil Disimpan',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("reward");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Disimpan',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("reward");
		}
	}

	public function edit($id)
	{
		$get_reward     = array('id_reward' => $id);
		$data['reward'] = $this->crud->getWhere($get_reward, 'reward')->row();
		$data['title']  = "Edit Reward ".$data['reward']->nama_reward;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('reward/edit', $data);
		$this->load->view('templates/footer', $data);
	}

	public function update()
	{
		$where = array('id_reward' => $this->input->post('id_reward'));
		$data  = array(
			'nama_reward' => $this->input->post('nama_reward'),
			'skor_reward' => $this->input->post('skor_reward')
		);

		$update = $this->crud->update($where, $data, 'reward');

		if ($update) {
			$data = array(
				'pesan' => 'Data Berhasil Diupdate',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("reward");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Diupdate',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("reward");
		}
	}

	public function delete($id)
	{
		$where = array('id_reward' => $id);
		$delete = $this->crud->delete($where, 'reward');

		if ($delete) {
			$data = array(
				'pesan' => 'Data Berhasil Dihapus',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("reward");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Dihapus',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("reward");
		}
	}

}

/* End of file Reward.php */
/* Location: ./application/controllers/Reward.php */