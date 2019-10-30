<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUDModel extends CI_Model {

	public function getAll($table)
	{
		return $this->db->get($table);
	}

	public function getWhere($data, $table)
	{
		return $this->db->get_where($table, $data);
	}

	public function save($data, $table)
	{
		return $this->db->insert($table, $data);
	}

	public function update($field, $data, $table)
	{
		return $this->db->where($field)->update($table, $data);
	}

	public function delete($field, $table)
	{
		return $this->db->where($field)->delete($table);
	}

}

/* End of file CRUDModel.php */
/* Location: ./application/models/CRUDModel.php */