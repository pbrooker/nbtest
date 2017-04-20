<?php
class Datagathering_model extends CI_Model
{
	/**
	 * Inserts last scan data into database
	 * @param $data
	 */
	public function saveLastProcessed($data) {
		$this->db->insert('nbdata_last_update', $data);

	}

	public function updateCsvVersion($data) {
		$update = array (
			'current_version' => $data['last_modified']
		);
		$this->db->where('id', $data['source_id'])
				 ->update('nbdata_sources', $update);
	}

	/**
	 * Gets hash record from database if it exists
	 * @param $header_hash
	 * @return mixed
	 */
	public function getLastProcessed($header_hash) {

		$this->db->select('current_version')
			     ->from('nbdata_sources')
				 ->where('current_version =', $header_hash);
		$query = $this->db->get()->row();

		return $query;
	}

	/**
	 * Get urls for processing
	 * @param $name optional to get a single record id
	 */
	public function getDataUrls($name = null) {
		if($name == null) {
			$this->db->select('*')
				 ->from('nbdata_sources');
		} else {
			$this->db->select('id')
					 ->from('nbdata_sources')
				     ->where('name =', $name);
		}
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
	public function processZipFile($file_data) {

		ini_set('memory_limit','2000M');
		//hardcoded temporarily for testing
		$file_path = 'https://qimple.s3.amazonaws.com/NBData_Temp/' . $file_data['name'] . '.csv';
		//$file_path = $file_data['file_path'];
		//$new_name = str_replace("\\","/",$file_path);

		$this->db->select('hash_value')
				 ->from("`" .$file_data['name'] . "`");
		$result1 = $this->db->get();

		$initial_count = $result1->num_rows();
		if($initial_count == null) {
			$initial_count = 0;
		}

		//get header for column names
		$handle = fopen($file_data['file_path'], 'r');
		$header = fgetcsv($handle);
		$head_data = "";
		foreach($header as $value) {
			$value = preg_replace('/\s+/', '_', $value);
			$head_data .= '`' . $value . '`,';
		}
		$columns = rtrim(trim($head_data),',');


         //import from temp csv file into database
		$sql    = (
			'LOAD DATA LOCAL INFILE "'. $file_path . '" 
            IGNORE INTO TABLE `' . $file_data['name'] .'`
            CHARACTER SET \'utf8\'
            FIELDS TERMINATED by \',\'
            ENCLOSED BY \'"\' 
            LINES TERMINATED BY  \'\n\' 
            IGNORE 1 LINES
            (' . $columns .')'
            );

		$query  = $this->db->query( $sql );


		$this->db->select('hash_value')
			->from("`" .$file_data['name'] . "`");
		$result2  = $this->db->get();
		$final_count = $result2->num_rows();
		$count = $final_count - $initial_count;
		$insert_data = array (
			'last_modified' => $file_data['last_modified'],
			'source_id' => $file_data['source_id'],
		);
		$update_data = array (
			'last_modified' => $file_data['last_modified'],
			'source_id' => $file_data['source_id'],
			'table' => $file_data['name']
		);

		$log_data = array (
			'last_modified' => $file_data['last_modified'],
			'source_id' => $file_data['source_id']
		);

		if($count > 0) {

			$this->updateCsvVersion($update_data);
			$this->saveLastProcessed($insert_data);
			return $count;

		} elseif ($count == null || $count == 0) {

			return $count;
		}
	}


	public function getParticipationRate($date)
	{
		$this->db->select('geography, value')
			->from("`" . '02820087' . "`")
			->where('ref_date =', $date)
			->where('`characteristics` = "Participation rate (percent)"')
			->where('`agegroup` = "15 years and over"')
			->where('`sex` = "Both sexes"')
			->where('`statistics` = "Estimate"')
			->where('`datatype` = "Seasonally adjusted"');

		$query = $this->db->get();

		$table = array();
		$table['cols'] = array(

			array('label' => 'Region', 'type' => 'string'),
			array('label' => 'Percentage', 'type' => 'number')

		);
		$rows = array();

		foreach($query->result() as $key => $value) {
			if($key > 0) {
				$temp = array();
				// the following line will be used to slice the Pie chart
				$temp[] = array('v' => (string) $value->geography);
				$temp[] = array('v' => floatval($value->value) );
				$rows[] = array('c' => $temp);
			}
		}
		$table['rows'] = $rows;
		$jsonTable = json_encode($table);

		return $jsonTable;
	}

	public function getParticipationRateMM($date)
	{
		$this->db->select('geography, value')
			->from("`" . '02820087' . "`")
			->where('ref_date =', $date)
			->where('`characteristics` = "Participation rate (percent)"')
			->where('`agegroup` = "15 years and over"')
			->where('`sex` = "Both sexes"')
			->where('`statistics` = "Standard error of month-to-month change"')
			->where('`datatype` = "Seasonally adjusted"');

		$query = $this->db->get();

		$table = array();
		$table['cols'] = array(

			array('label' => 'Region', 'type' => 'string'),
			array('label' => 'Percentage', 'type' => 'number')

		);
		$rows = array();

		foreach($query->result() as $key => $value) {
			if($key > 0) {
				$temp = array();
				// the following line will be used to slice the Pie chart
				$temp[] = array('v' => (string) $value->geography);
				$temp[] = array('v' => floatval($value->value) );
				$rows[] = array('c' => $temp);
			}
		}
		$table['rows'] = $rows;
		$jsonTable = json_encode($table);

		return $jsonTable;
	}
}
