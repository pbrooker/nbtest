<?php
class Datagathering_model extends CI_Model
{
	public function process_data($csv)
	{
		$con = $this->db->conn_id;


	}

	public function saveLastProcessed($data)
	{
		$this->db->insert('nbdata_last_update', $data);

	}

	public function getLastProcessed($header_hash) {

		$this->db->select('id')
			     ->from('nbdata_last_update')
				 ->where('last_modified =', $header_hash)
				 ->limit(1);
		$query = $this->db->get();

		return $query;
	}
}