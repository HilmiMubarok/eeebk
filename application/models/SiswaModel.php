<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model {

	// private $_batchImport;
 
 //    public function setBatchImport($batchImport) {
 //        $this->_batchImport = $batchImport;
 //    }
 
    // save data
    public function importData($table, $data) {
        // $data = $this->_batchImport;
        $this->db->insert_batch($table, $data);
    }

    public function getSameNis()
    {
    	$this->db->select('nis');
    	return $this->db->get('siswa');
    }

}

/* End of file SiswaModel.php */
/* Location: ./application/models/SiswaModel.php */