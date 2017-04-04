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

	public function processZipFile($filepath)
	{
		$this->db->select('hash_value')
				 ->from('nbdata');
		$result1 = $this->db->get();

		$initial_count = $result1->num_rows();

		$this->db->query('LOAD DATA LOCAL INFILE "'. $filepath .'"
        INTO TABLE `nbdata`
        FIELDS TERMINATED by \',\'
        LINES TERMINATED BY \'\n\'');



		$this->db->select('hash_value')
			->from('nbdata');
		$result2  = $this->db->get();

		$final_count = $result2->num_rows();

		$count = $final_count - $initial_count;
		if($count > 0) {
			return $count;
		} else {
			return false;
		}


	}
}