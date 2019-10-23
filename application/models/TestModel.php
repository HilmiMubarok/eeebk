<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestModel extends CI_Model {

	public function get($table)
	{
		return $this->db->get($table);
	}

}

/* End of file TestModel.php */
/* Location: ./application/models/TestModel.php */