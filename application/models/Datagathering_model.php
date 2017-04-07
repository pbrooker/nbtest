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
	 * Get urls for processing
	 *
	 */
	public function getDataUrls() {

		$this->db->select('*')
				 ->from('nbdata_sources');
		$query = $this->db->get();

		return $query;
	}

	/**
	 * Get hashcodes to see if they need to be updated
	 *
	 */
	public function getCurrentHashCodes() {

		$this->db->select('id, last_modified, source_id')
				 ->from('nbdata_last_update')
				 ->where('last_modified IS NOT NULL');
		$query = $this->db->get();

		return $query;
	}


	/**
	 * Processes large CSV file and inserts it. Returns a count if records successfully inserted
	 * @param $file_data  array containing last_modified, source_id and file_path
	 * @return bool
	 */
	public function processZipFile($file_data)
	{
		ini_set('memory_limit','2000M');
		//hardcoded temporarily for testing
		$file_path = 'https://qimple.s3.amazonaws.com/NBData_Temp/02820087.csv';
		//$file_path = $file_data['file_path'];
		//$new_name = str_replace("\\","/",$file_path);

		$this->db->select('hash_value')
				 ->from($file_data['name']);
		$result1 = $this->db->get();

		$initial_count = $result1->num_rows();

		//get header for column names
		$handle = fopen($file_data['file_path'], 'r');
		$header = fgetcsv($handle);


         //import from temp csv file into database
		$sql    = (
			'LOAD DATA LOCAL INFILE "'. $file_path . '" 
            IGNORE INTO TABLE `' . $file_data['name'] .'`
            FIELDS TERMINATED by \',\'
            ENCLOSED BY \'"\' 
            LINES TERMINATED BY  \'\n\' 
            IGNORE 1 LINES
            (`ref_date`, `geography`, `characteristics`, `sex`,`agegroup`,`vector`, 
            `coordinate`, `value`, `hash_value`)'
            );

		$query  = $this->db->query( $sql );


		$this->db->select('hash_value')
			->from($file_data['name']);
		$result2  = $this->db->get();

		$final_count = $result2->num_rows();

		$count = $final_count - $initial_count;

		$insert_data = array (
			'last_modified' => $file_data['last_modified'],
			'source_id' => $file_data['source_id'],

		);
		if($count > 0) {
			return $count;
			$this->saveLastProcessed($insert_data);
		} else {
			return false;
		}
	}
}