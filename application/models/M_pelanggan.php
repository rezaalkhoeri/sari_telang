<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
	public function register($data)
	{
		$this->db->insert('tbl_pelanggan', $data);
	}

	public function get_pelangganByID($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_pelanggan');
		$this->db->where('id_pelanggan', $id);
		return $this->db->get()->result();
	}

	public function update_data($id, $data)
	{
		$this->db->where('id_pelanggan', $id);
		$result = $this->db->update('tbl_pelanggan', $data);
		return $result;
	}
}

/* End of file M_pelanggan.php */
