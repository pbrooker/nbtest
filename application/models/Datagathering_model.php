<?php
class Datagathering_model extends CI_Model
{
	/**
	 * Inserts last scan data into database
	 * @param $data
	 */
	public function saveLastProcessed($data)
	{
		$this->db->insert('nbdata_last_update', $data);

	}

	/**
	 * Gets hash record from database if it exists
	 * @param $header_hash
	 * @return mixed
	 */
	public function getLastProcessed($header_hash) {

		$this->db->select('last_modified')
			     ->from('nbdata_last_update')
				 ->where('last_modified =', $header_hash);
		$query = $this->db->get()->row();

		return $query;
	}


	/**
	 * Processes large CSV file and inserts it. Returns a count if records successfully inserted
	 * @param $filepath
	 * @return bool
	 */
	public function processZipFile($insert_data)
	{

		//hardcoded temporarily for testing
		$file_path = 'https://qimple.s3.amazonaws.com/NBData_Temp/output.csv';
		//$new_name = str_replace("\\","/",$file_path);

		$this->db->select('hash_value')
				 ->from('nbdata');
		$result1 = $this->db->get();

		$initial_count = $result1->num_rows();

         //import from temp csv file into database
		$sql    = (
			'LOAD DATA LOCAL INFILE "'. $file_path . '" 
            IGNORE INTO TABLE `nbdata`
            FIELDS TERMINATED by \',\'
            ENCLOSED BY \'"\' 
            LINES TERMINATED BY  \'\n\' 
            IGNORE 1 LINES
            (`ref_date`, `geography`, `characteristics`, `sex`,`agegroup`,`vector`, `coordinate`, `value`, `hash_value`)'
            );

		$query  = $this->db->query( $sql );


		$this->db->select('hash_value')
			->from('nbdata');
		$result2  = $this->db->get();

		$final_count = $result2->num_rows();

		$count = $final_count - $initial_count;
		if($count > 0) {
			return $count;
			$this->saveLastProcessed($insert_data);
		} else {
			return false;
		}
	}
}