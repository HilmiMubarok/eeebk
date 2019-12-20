<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RewardingModel extends CI_Model {

	public function getRewardByStatus($status)
	{
		$this->db->join('reward', 'review_reward.reward_id = reward.id_reward');
		// Join Siswa Here
		return $this->db->where('status', $status)->get('review_reward')->result();
		
	}

	public function getSkorSiswa($siswa_id, $is_point = null)
	{
		if (!$is_point) {
			return $this->db->where('siswa_id', $siswa_id)->get('skor');
		} else {
			return $this->db->where('siswa_id', $siswa_id)->get('point');
		}
	}

	public function acc($siswa_id, $reward_id, $skor_reward)
	{

		$cek_skor   = $this->getSkorSiswa($siswa_id, true)->row();
		$notifikasi = array(
			'siswa_id' => $siswa_id,
			'pesan'    => 'BK Telah Menambahkan Reward Kepada Anda',
			'icon'     => 'fas fa-check',
			'bg_color' => 'success',
			'tanggal'  => date('Y-m-d'),
			'status'   => 'unread'
		);

		if (count($cek_skor) > 0) {
			$skor = $cek_skor->jumlah_point + $skor_reward;
		 	$this->db->where('siswa_id', $siswa_id);
 			$this->db->update('point', array('jumlah_point' => $skor));
 			$this->db->insert('notifikasi', $notifikasi);
		} else {
		 	$data = array(
				'siswa_id'     => $siswa_id,
				'jumlah_point' => $skor_reward
		 	);
		 	$this->db->insert('point', $data);
 			$this->db->insert('notifikasi', $notifikasi);
		}
		$insert_review_reward = array(
			'siswa_id'  => $siswa_id,
			'reward_id' => $reward_id,
			'status'    => 'disetujui'
		);
		return $this->db->insert('review_reward', $insert_review_reward);
	}

}

/* End of file RewardingModel.php */
/* Location: ./application/models/RewardingModel.php */