<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rewarding extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') !== "bk") {
			show_404();
		}
		$this->load->model('CRUDModel', 'crud');
		$this->load->model('RewardingModel', 'rewarding');

	}

	public function index()
	{
		$data['title'] = "Rewarding";
		$data['siswa'] = $this->crud->getAll('siswa')->result();
		// $data['rewarding'] = $this->rewarding->getRewardByStatus('pending')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('rewarding/index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function siswa($nis)
	{

		$data['title'] = "Pilih Siswa";
		$data['siswa'] = $this->crud->getWhere(array('nis' => $nis), 'siswa')->row();
		$data['reward'] = $this->crud->getAll('reward')->result();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('rewarding/pilih_siswa', $data);
		$this->load->view('templates/footer', $data);
	}

	public function acc($siswa_id)
	{
		$reward_id       = $this->input->post('reward');
		$get_skor_reward = array('id_reward' => $reward_id);
		$skor_reward     = $this->crud->getWhere($get_skor_reward, 'reward')->row()->skor_reward;
		$acc             = $this->rewarding->acc($siswa_id, $reward_id, $skor_reward);

		if ($acc) {
			$data = array(
				'pesan' => 'Reward Berhasil Ditambahkan',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("rewarding");
		} else {
			$data = array(
				'pesan' => 'Reward Gagal Ditambahkan',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("rewarding");
		}

	}

	public function tolak($siswa_id, $reward_id, $skor_reward)
	{

		$tolak = $this->rewarding->tolak($siswa_id, $reward_id, $skor_reward);

		if ($tolak) {
			$data = array(
				'pesan' => 'Data Berhasil Ditolak',
				'icon'  => 'success'
			);
			$this->session->set_flashdata($data);
			redirect("rewarding");
		} else {
			$data = array(
				'pesan' => 'Data Gagal Ditolak',
				'icon'  => 'danger'
			);
			$this->session->set_flashdata($data);
			redirect("rewarding");
		}
		
	}

}

/* End of file Rewarding.php */
/* Location: ./application/controllers/Rewarding.php */