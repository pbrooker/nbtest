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
	public function processZipFile($filepath)
	{

		//hardcoded temporarily for testing
		$file_path = 'https://qimple.s3.amazonaws.com/NBData_Temp/output.csv';
		//$new_name = str_replace("\\","/",$file_path);

		$this->db->select('hash_value')
				 ->from('nbdata');
		$result1 = $this->db->get();

		$initial_count = $result1->num_rows();

		//Only if we can't do LOAD DATA LOCAL INFILE
//		if(($handle = fopen($new_name, 'r')) !== false) {
//
//			$csv = new SplFileObject($new_name);
//			$csv->setFlags(SplFileObject::READ_CSV);
//			$start = 0;
//			$batch = 10000000;
//			$db_data[] = array();
//			while (!$csv->eof()) {
//				foreach (new LimitIterator($csv, $start, $batch) as $line) {
//					$data = $line;
//
//					array_push($data, $line);
//				}
//			}
//			$this->db->trans_start();
//			foreach ($db_data as $item) {
//				$insert_query = $this->db->insert_string('table_name', $item);
//				$insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
//				$this->db->query($insert_query);
//			}
//			$this->db->trans_complete();
//		}


         //import from temp csv file into database
		$sql    = (
			'LOAD DATA LOCAL INFILE "'. $file_path . '" 
            IGNORE INTO TABLE `nbdata`
            FIELDS TERMINATED by \',\'
            LINES TERMINATED BY  \'\n\' 
            IGNORE 1 LINES
            (`ref_date`, `geography`, `characteristics`, `sex`,`agegroup`,`vector`, `coordinate`, `value`, `hash_value`)'
            );

		$query  = $this->db->query( $sql );
		$var = $this->db->last_query();
		var_dump($var);



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