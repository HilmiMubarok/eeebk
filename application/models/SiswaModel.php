<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model {

    // save data
    public function importData($table, $data) {
        return $this->db->insert_batch($table, $data);
    }

}

/* End of file SiswaModel.php */
/* Location: ./application/models/SiswaModel.php */