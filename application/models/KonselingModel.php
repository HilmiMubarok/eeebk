<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonselingModel extends CI_Model {

	public function getKonseling($siswa_id)
	{
		$this->db->join('pelanggaran', 'review_pelanggaran.pelanggaran_id = pelanggaran.id_pelanggaran');
		return $this->db->where('review_pelanggaran.siswa_id', $siswa_id)->get('review_pelanggaran');
	}

}

/* End of file KonselingModel.php */
/* Location: ./application/models/KonselingModel.php */