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

		ini_set('memory_limit','4000M');
		set_time_limit(1800);
		//hardcoded temporarily for testing
		$file_path = 'https://qimple.s3.amazonaws.com/NBData_Temp/' . $file_data['name'] . '.csv';
		//$file_path = $file_data['file_path'];
		//$new_name = str_replace("\\","/",$file_path);

		$initial_count = $this->db->count_all("`" . $file_data['name'] . "`");


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


		$final_count = $this->db->count_all("`" . $file_data['name'] . "`");
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


		if($count > 0) {

			$this->updateCsvVersion($update_data);
			$this->saveLastProcessed($insert_data);
			return $count;

		} elseif ($count == null || $count == 0) {

			$this->saveLastProcessed($insert_data);
			return $count;
		}
	}


	public function getEmploymentRate($dates)
	{
		$startdate = $dates['startdate'];
		$enddate = $dates['enddate'];


		$this->db->select("geo, value, CASE geo WHEN 'Canada' THEN 1 WHEN 'Newfoundland and Labrador' THEN
		2 WHEN 'Prince Edward Island' THEN 3 WHEN 'Nova Scotia' THEN 4 WHEN 'New Brunswick' THEN 5 WHEN 'Quebec' THEN 6 
		WHEN 'Ontario' THEN 7 WHEN 'Manitoba' THEN 8 WHEN 'Saskatchewan' THEN 9 WHEN 'Alberta' THEN 10 WHEN 
		'British Columbia' THEN 11 END AS order_prov", FALSE)
			->from("`" . '02820122' . "`")
			->where('ref_date =', $startdate)
			->where('`characteristics` = "Employment rate (percent)"')
			->where_in('geo', array('Canada', 'Newfoundland and Labrador', 'Prince Edward Island', 'Nova Scotia',
				'New Brunswick', 'Quebec', 'Ontario', 'Manitoba', 'Saskatchewan', 'Alberta', 'British Columbia'))
			//->where('`agegroup` = "15 years and over"')
			//->where('`sex` = "Both sexes"')
			->where('`statistics` = "Estimate"')
			//->where('`datatype` = "Seasonally adjusted"')
			->order_by('order_prov', 'ASC');

		$start = $this->db->get()->result();
		$query = $this->db->last_query();

		$this->db->select("geo, value, CASE geo WHEN 'Canada' THEN 1 WHEN 'Newfoundland and Labrador' THEN
		2 WHEN 'Prince Edward Island' THEN 3 WHEN 'Nova Scotia' THEN 4 WHEN 'New Brunswick' THEN 5 WHEN 'Quebec' THEN 6 
		WHEN 'Ontario' THEN 7 WHEN 'Manitoba' THEN 8 WHEN 'Saskatchewan' THEN 9 WHEN 'Alberta' THEN 10 WHEN 
		'British Columbia' THEN 11 END AS order_prov", FALSE)
			->from("`" . '02820122' . "`")
			->where('ref_date =', $enddate)
			->where('`characteristics` = "Employment rate (percent)"')
			->where_in('geo', array('Canada', 'Newfoundland and Labrador', 'Prince Edward Island', 'Nova Scotia',
				'New Brunswick', 'Quebec', 'Ontario', 'Manitoba', 'Saskatchewan', 'Alberta', 'British Columbia'))
			//->where('`agegroup` = "15 years and over"')
			//->where('`sex` = "Both sexes"')
			->where('`statistics` = "Estimate"')
			//->where('`datatype` = "Seasonally adjusted"')
			->order_by('order_prov', 'ASC');

		$end = $this->db->get()->result();

		$result = array();
		foreach($start as $key => $value) {
			$name = $value->geo;
			$val = $value->value;
			foreach($end as $innerKey => $innerValue) {
				if($innerValue->geo == $name) {
					$diff =  $innerValue->value - $val;
					$shortName = $this->_provinceNames($name);
					$temp = array(
						'geography' => $shortName,
						'value' => $diff
					);
					array_push($result, $temp);
				}
			}
		}

		$table = array();
		$table['cols'] = array(

			array('label' => 'Region', 'type' => 'string', ),
			array('label' => 'Percentage', 'type' => 'number'),
			array('role' => 'annotation', 'type' => 'string'),
			array('role' => 'annotation', 'type' => 'string'),
			array('role' => 'style', 'type' => 'string')

		);
		$rows = array();

		foreach($result as $key => $value) {

			$temp = array();
			// the following line will be used to slice the Pie chart
			$temp[] = array('v' => $value['geography']);
			$temp[] = array('v' => $value['value']);
			$temp[] = array('v' => (string)$value['value'] . '%');
			$temp[] = array('v' => $value['geography']);
			if($value['geography'] == 'NB') {
				$temp[] = array('v' => '#FF5F18');
			} else {
				$temp[] = array('v' => '#8A62A0');
			}
			$rows[] = array('c' => $temp);

		}
		$table['rows'] = $rows;
		$jsonTable = json_encode($table);

		return $jsonTable;
	}

	public function getBarChart($data)
	{
		$date = $data['date'];
		$characteristics = $data['characteristics'];

		$this->db->select("geography, value, CASE geography WHEN 'Canada' THEN 1 WHEN 'Newfoundland and Labrador' THEN
		2 WHEN 'Prince Edward Island' THEN 3 WHEN 'Nova Scotia' THEN 4 WHEN 'New Brunswick' THEN 5 WHEN 'Quebec' THEN 6 
		WHEN 'Ontario' THEN 7 WHEN 'Manitoba' THEN 8 WHEN 'Saskatchewan' THEN 9 WHEN 'Alberta' THEN 10 WHEN 
		'British Columbia' THEN 11 END AS order_prov", FALSE)
			->from("`" . '02820087' . "`")
			->where('ref_date =', $date)
			->where('`characteristics` =', $characteristics)
			->where('`agegroup` = "15 years and over"')
			->where('`sex` = "Both sexes"')
			->where('`statistics` = "Estimate"')
			->where('`datatype` = "Seasonally adjusted"')
			->order_by('order_prov', 'ASC');

		$query = $this->db->get();

		$table = array();
		$table['cols'] = array(

			array('label' => 'Region', 'type' => 'string'),
			array('label' => 'Percentage', 'type' => 'number'),
			array('role' => 'annotation', 'type' => 'string'),
			array('role' => 'annotation', 'type' => 'string'),
			array('role' => 'style', 'type' => 'string')


		);
		$rows = array();

		foreach($query->result() as $key => $value) {
			$temp = array();
			$shortName = $this->_provinceNames($value->geography);
			// the following line will be used to slice the Pie chart
			$temp[] = array('v' => $shortName);
			$temp[] = array('v' => floatval($value->value) );
			$temp[] = array('v' => (string)$value->value . '%');
			$temp[] = array('v' => $shortName);
			if($shortName == 'NB') {
				$temp[] = array('v' => '#FF5F18');
			} else {
				$temp[] = array('v' => '#8A62A0');
			}
			$rows[] = array('c' => $temp);

		};
		$table['rows'] = $rows;
		$jsonTable = json_encode($table);

		return $jsonTable;
	}

	public function getComparisonBarChart($data)
	{
		$startdate = $data['startdate'];
		$enddate = $data['enddate'];
		$characteristics = $data['characteristics'];


		$this->db->select("geography, value, CASE geography WHEN 'Canada' THEN 1 WHEN 'Newfoundland and Labrador' THEN
		2 WHEN 'Prince Edward Island' THEN 3 WHEN 'Nova Scotia' THEN 4 WHEN 'New Brunswick' THEN 5 WHEN 'Quebec' THEN 6 
		WHEN 'Ontario' THEN 7 WHEN 'Manitoba' THEN 8 WHEN 'Saskatchewan' THEN 9 WHEN 'Alberta' THEN 10 WHEN 
		'British Columbia' THEN 11 END AS order_prov", FALSE)
			->from("`" . '02820087' . "`")
			->where('ref_date =', $startdate)
			->where('`characteristics` =', $characteristics)
			->where('`agegroup` = "15 years and over"')
			->where('`sex` = "Both sexes"')
			->where('`statistics` = "Estimate"')
			->where('`datatype` = "Seasonally adjusted"')
			->order_by('order_prov', 'ASC');

		$start = $this->db->get()->result();

		$this->db->select("geography, value, CASE geography WHEN 'Canada' THEN 1 WHEN 'Newfoundland and Labrador' THEN
		2 WHEN 'Prince Edward Island' THEN 3 WHEN 'Nova Scotia' THEN 4 WHEN 'New Brunswick' THEN 5 WHEN 'Quebec' THEN 6 
		WHEN 'Ontario' THEN 7 WHEN 'Manitoba' THEN 8 WHEN 'Saskatchewan' THEN 9 WHEN 'Alberta' THEN 10 WHEN 
		'British Columbia' THEN 11 END AS order_prov", FALSE)
			->from("`" . '02820087' . "`")
			->where('ref_date =', $enddate)
			->where('`characteristics` =', $characteristics)
			->where('`agegroup` = "15 years and over"')
			->where('`sex` = "Both sexes"')
			->where('`statistics` = "Estimate"')
			->where('`datatype` = "Seasonally adjusted"')
			->order_by('order_prov', 'ASC');

		$end = $this->db->get()->result();

		$result = array();
		foreach($start as $key => $value) {
			$name = $value->geography;
			$val = $value->value;
			foreach($end as $innerKey => $innerValue) {
				if($innerValue->geography == $name) {
					$diff =  $innerValue->value - $val;
					$shortName = $this->_provinceNames($name);
					$temp = array(
						'geography' => $shortName,
						'value' => $diff
					);
					array_push($result, $temp);
				}
			}
		}

		$table = array();
		$table['cols'] = array(

			array('label' => 'Region', 'type' => 'string', ),
			array('label' => 'Percentage', 'type' => 'number'),
			array('role' => 'annotation', 'type' => 'string'),
			array('role' => 'annotation', 'type' => 'string'),
			array('role' => 'style', 'type' => 'string')

		);
		$rows = array();

		foreach($result as $key => $value) {

			$temp = array();
			// the following line will be used to slice the Pie chart
			$temp[] = array('v' => $value['geography']);
			$temp[] = array('v' => $value['value']);
			$temp[] = array('v' => (string)$value['value'] . '(pp)');
			$temp[] = array('v' => $value['geography']);
			if($value['geography'] == 'NB') {
				$temp[] = array('v' => '#FF5F18');
			} else {
				$temp[] = array('v' => '#8A62A0');
			}
			$rows[] = array('c' => $temp);

		}
		$table['rows'] = $rows;
		$jsonTable = json_encode($table);

		return $jsonTable;
	}



	private function _provinceNames($name)
	{

		switch ($name) {
			case 'Ontario':
				$returnName = 'ON';
				break;
			case 'Quebec':
				$returnName = 'QC';
				break;
			case 'New Brunswick':
				$returnName = 'NB';
				break;
			case 'Nova Scotia':
				$returnName = 'NS';
				break;
			case 'Prince Edward Island':
				$returnName = 'PE';
				break;
			case 'Manitoba':
				$returnName = 'MB';
				break;
			case 'Alberta':
				$returnName = 'AB';
				break;
			case 'British Columbia':
				$returnName = 'BC';
				break;
			case 'Saskatchewan':
				$returnName = 'SK';
				break;
			case 'Newfoundland and Labrador':
				$returnName = 'NL';
				break;
			case 'Canada':
				$returnName = 'Canada';
				break;
			default:
				$returnName = $name;
		}

		return $returnName;
	}
}
