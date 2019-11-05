<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SkoringModel extends CI_Model {

	public function getPelanggaranByStatus($status)
	{
		$this->db->join('pelanggaran', 'review_pelanggaran.pelanggaran_id = pelanggaran.id_pelanggaran');
		// Join Siswa Here
		return $this->db->where('status', $status)->get('review_pelanggaran');
	}

	public function getSkorSiswa($siswa_id)
	{
		return $this->db->where('siswa_id', $siswa_id)->get('skor');
	}

	public function acc($siswa_id, $pelanggaran_id, $skor_pelanggaran)
	{

		$cek_skor   = $this->getSkorSiswa($siswa_id)->row();
		$notifikasi = array(
			'siswa_id' => $siswa_id,
			'pesan'    => 'BK Telah Menyetujui Pelanggaran Anda',
			'icon'     => 'fas fa-check',
			'bg_color' => 'success',
			'tanggal'  => date('Y-m-d'),
			'status'   => 'unread'
		);

		if (count($cek_skor) > 0) {
			$skor = $cek_skor->jumlah_skor + $skor_pelanggaran;
		 	$this->db->where('siswa_id', $siswa_id);
 			$this->db->update('skor', array('jumlah_skor' => $skor));
 			$this->db->insert('notifikasi', $notifikasi);
		} else {
		 	$data = array(
				'siswa_id'    => $siswa_id,
				'jumlah_skor' => $skor_pelanggaran
		 	);
		 	$this->db->insert('skor', $data);
 			$this->db->insert('notifikasi', $notifikasi);
		}
		$this->db->where(array('siswa_id' => $siswa_id, 'pelanggaran_id' => $pelanggaran_id));
		return $this->db->update('review_pelanggaran', array('status' => 'disetujui'));
	}

	public function tolak($siswa_id, $pelanggaran_id, $skor_pelanggaran)
	{
		$cek_skor   = $this->getSkorSiswa($siswa_id)->row();
		$notifikasi = array(
			'siswa_id' => $siswa_id,
			'pesan'    => 'BK Telah Menolak Pelanggaran Anda',
			'icon'     => 'fas fa-check',
			'bg_color' => 'danger',
			'tanggal'  => date('Y-m-d'),
			'status'   => 'unread'
		);

		if (count($cek_skor) > 0) {
 			$this->db->insert('notifikasi', $notifikasi);
		} else {
		 	$data = array(
				'siswa_id'    => $siswa_id,
				'jumlah_skor' => $skor_pelanggaran
		 	);
		 	$this->db->insert('skor', $data);
 			$this->db->insert('notifikasi', $notifikasi);
		}
		$this->db->where(array('siswa_id' => $siswa_id, 'pelanggaran_id' => $pelanggaran_id));
		return $this->db->update('review_pelanggaran', array('status' => 'ditolak'));
	}

}

/* End of file SkoringModel.php */
/* Location: ./application/models/SkoringModel.php */