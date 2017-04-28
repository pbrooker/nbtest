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

			$this->updateCsvVersion($update_data);
			$this->saveLastProcessed($insert_data);
			return $count;

	}


	public function getEmploymentRate($data)
	{


		$this->db->select("geography, value, CASE geography WHEN 'Canada' THEN 1 WHEN 'Newfoundland and Labrador' THEN
		2 WHEN 'Prince Edward Island' THEN 3 WHEN 'Nova Scotia' THEN 4 WHEN 'New Brunswick' THEN 5 WHEN 'Quebec' THEN 6 
		WHEN 'Ontario' THEN 7 WHEN 'Manitoba' THEN 8 WHEN 'Saskatchewan' THEN 9 WHEN 'Alberta' THEN 10 WHEN 
		'British Columbia' THEN 11 END AS order_prov", FALSE)
			->from("`" . '02820087' . "`")
			->where('ref_date =', $data['startdate'])
			->where('`characteristics` = ', $data['characteristics'])
//			->where_in('geography', array('Canada', 'Newfoundland and Labrador', 'Prince Edward Island', 'Nova Scotia',
//				'New Brunswick', 'Quebec', 'Ontario', 'Manitoba', 'Saskatchewan', 'Alberta', 'British Columbia'))
			->where('`agegroup` = ', $data['agegroup'])
			->where('`sex` = ', $data['sex'])
			->where('`statistics` =', $data['statistics'] )
			->where('`datatype` = ', $data['datatype'])
			->order_by('order_prov', 'ASC');

		$start = $this->db->get()->result();
		$query = $this->db->last_query();

		$this->db->select("geography, value, CASE geography WHEN 'Canada' THEN 1 WHEN 'Newfoundland and Labrador' THEN
		2 WHEN 'Prince Edward Island' THEN 3 WHEN 'Nova Scotia' THEN 4 WHEN 'New Brunswick' THEN 5 WHEN 'Quebec' THEN 6 
		WHEN 'Ontario' THEN 7 WHEN 'Manitoba' THEN 8 WHEN 'Saskatchewan' THEN 9 WHEN 'Alberta' THEN 10 WHEN 
		'British Columbia' THEN 11 END AS order_prov", FALSE)
			->from("`" . '02820087' . "`")
			->where('ref_date =', $data['enddate'])
			->where('`characteristics` =', $data['characteristics'])
//			->where_in('geo', array('Canada', 'Newfoundland and Labrador', 'Prince Edward Island', 'Nova Scotia',
//				'New Brunswick', 'Quebec', 'Ontario', 'Manitoba', 'Saskatchewan', 'Alberta', 'British Columbia'))
			->where('`agegroup` = ', $data['agegroup'])
			->where('`sex` = ', $data['sex'])
			->where('`statistics` = ', $data['statistics'])
			->where('`datatype` = ', $data['datatype'])
			->order_by('order_prov', 'ASC');

		$end = $this->db->get()->result();

		$result = array();
		foreach($start as $key => $value) {
			$name = $value->geography;
			$val = $value->value;
			foreach($end as $innerKey => $innerValue) {
				if($innerValue->geography == $name) {
					$diff =  $val - $innerValue->value;
					$percent = sprintf('%.01f',  ($diff / $innerValue->value) * 100);
					$shortName = $this->_provinceNames($name);
					$temp = array(
						'geography' => $shortName,
						'value' => $percent
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

	/**
	 * Query returns data based on the selected characteristics and date.
	 * @param $data
	 * @return string
	 */
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

	/**
	 *  Data includes start date, end date, and characteristic definition, allow comparison between the results of
	 * two queries
	 * @param $data
	 * @return string
	 */
	public function getComparisonBarChart($data)
	{

		$this->db->select("geography, value, CASE geography WHEN 'Canada' THEN 1 WHEN 'Newfoundland and Labrador' THEN
		2 WHEN 'Prince Edward Island' THEN 3 WHEN 'Nova Scotia' THEN 4 WHEN 'New Brunswick' THEN 5 WHEN 'Quebec' THEN 6 
		WHEN 'Ontario' THEN 7 WHEN 'Manitoba' THEN 8 WHEN 'Saskatchewan' THEN 9 WHEN 'Alberta' THEN 10 WHEN 
		'British Columbia' THEN 11 END AS order_prov", FALSE)
			->from("`" . '02820087' . "`")
			->where('ref_date =', $data['startdate'])
			->where('`characteristics` =', $data['characteristics'])
			->where('`agegroup` = ', $data['agegroup'])
			->where('`sex` = ', $data['sex'])
			->where('`statistics` = "Estimate"')
			->where('`datatype` = ', $data['datatype'])
			->order_by('order_prov', 'ASC');

		$start = $this->db->get()->result();

		$this->db->select("geography, value, CASE geography WHEN 'Canada' THEN 1 WHEN 'Newfoundland and Labrador' THEN
		2 WHEN 'Prince Edward Island' THEN 3 WHEN 'Nova Scotia' THEN 4 WHEN 'New Brunswick' THEN 5 WHEN 'Quebec' THEN 6 
		WHEN 'Ontario' THEN 7 WHEN 'Manitoba' THEN 8 WHEN 'Saskatchewan' THEN 9 WHEN 'Alberta' THEN 10 WHEN 
		'British Columbia' THEN 11 END AS order_prov", FALSE)
			->from("`" . '02820087' . "`")
			->where('ref_date =', $data['enddate'])
			->where('`characteristics` =', $data['characteristics'])
			->where('`agegroup` = "15 years and over"')
			->where('`sex` = "Both sexes"')
			->where('`statistics` = "Estimate"')
			->where('`datatype` = ', $data['datatype'])
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

	public function getLabourForceData($data)
	{
		$where_in = $data['where_in'];
		$characteristics = $data['characteristics'];

		$this->db->select('value, ref_date, characteristics')
				 ->from("`" . '02820087' . "`")
				 ->where_in('ref_date', $where_in)
				 ->where('`agegroup` = "15 years and over"')
				 ->where('`sex` = "Both sexes"')
				 ->where('`statistics` = "Estimate"')
				 ->where('`datatype` = "Seasonally adjusted"')
				 ->where('`characteristics` =', $characteristics)
				 ->where('`geography` = "New Brunswick"');

		$result = $this->db->get()->result();
		//$query = $this->db->last_query();

		$table = array();
		$table['cols'] = array(

			array('id' =>'','label' => 'Date', 'type' => 'date' ),
			array('id' =>'', 'label' => 'Value', 'type' => 'number')


		);
		$rows = array();

		foreach($result as $key => $value) {

			$temp = array();
			$dates = explode('/', $value->ref_date);
			$temp[] = array('v' => 'Date(' . $dates['0'] . ',' . ($dates['1'] - 1) . ',01' .')');
			if($value->characteristics == 'Employment (x 1,000)' || $value->characteristics == 'Labour force (x 1,000)') {
				$temp[] = array('v' => ((int)$value->value) * 1000);
			} else {
				$temp[] = array('v' => ($value->value));
			}


			$rows[] = array('c' => $temp);

		}

		$table['rows'] = $rows;
		$jsonTable = json_encode($table);

		return $jsonTable;
	}

	public function getLabourForceStatistics($data)
	{
		$startyear = $data['startyear'];
		$prevyear = $data['prevyear'];
		$prevmonth = $data['prevmonth'];
		$where_in = $data['characteristics'];
		$math_array = $data['math_array'];

		$this->db->select("value, ref_date, characteristics, CASE `characteristics` WHEN 'Population (x 1,000)' THEN 1 
		WHEN 'Labour force (x 1,000)' THEN 2 WHEN 'Employment (x 1,000)' THEN 3 WHEN 'Employment full-time (x 1,000)' 
		THEN 4 WHEN 'Employment part-time (x 1,000)' THEN 5 WHEN 'Unemployment (x 1,000)' THEN 6 WHEN 
		'Participation rate (percent)' THEN 7 WHEN 'Employment rate (percent)' THEN 8 WHEN 'Unemployment rate (percent)'
		THEN 9 END AS ord_results")
			->from("`" . '02820087' . "`")
			->where('`ref_date` =' , $startyear)
			->where_in('characteristics', $where_in)
			->where('`agegroup` = "15 years and over"')
			->where('`sex` = "Both sexes"')
			->where('`statistics` = "Estimate"')
			->where('`datatype` = "Seasonally adjusted"')
			->where('`geography` = "New Brunswick"')
			->order_by('ord_results', 'ASC');

		$start_result = $this->db->get()->result();

		$this->db->select("value, ref_date, characteristics, CASE `characteristics` WHEN 'Population (x 1,000)' THEN 1 
		WHEN 'Labour force (x 1,000)' THEN 2 WHEN 'Employment (x 1,000)' THEN 3 WHEN 'Employment full-time (x 1,000)' 
		THEN 4 WHEN 'Employment part-time (x 1,000)' THEN 5 WHEN 'Unemployment (x 1,000)' THEN 6 WHEN 
		'Participation rate (percent)' THEN 7 WHEN 'Employment rate (percent)' THEN 8 WHEN 'Unemployment rate (percent)'
		THEN 9 END AS ord_results")
			->from("`" . '02820087' . "`")
			->where('`ref_date` =' , $prevyear)
			->where_in('characteristics', $where_in)
			->where('`agegroup` = "15 years and over"')
			->where('`sex` = "Both sexes"')
			->where('`statistics` = "Estimate"')
			->where('`datatype` = "Seasonally adjusted"')
			->where('`geography` = "New Brunswick"')
			->order_by('ord_results', 'ASC');

		$prev_result = $this->db->get()->result();

		$this->db->select("value, ref_date, characteristics, CASE `characteristics` WHEN 'Population (x 1,000)' THEN 1 
		WHEN 'Labour force (x 1,000)' THEN 2 WHEN 'Employment (x 1,000)' THEN 3 WHEN 'Employment full-time (x 1,000)' 
		THEN 4 WHEN 'Employment part-time (x 1,000)' THEN 5 WHEN 'Unemployment (x 1,000)' THEN 6 WHEN 
		'Participation rate (percent)' THEN 7 WHEN 'Employment rate (percent)' THEN 8 WHEN 'Unemployment rate (percent)'
		THEN 9 END AS ord_results")
			->from("`" . '02820087' . "`")
			->where('`ref_date` =' , $prevmonth)
			->where_in('characteristics', $where_in)
			->where('`agegroup` = "15 years and over"')
			->where('`sex` = "Both sexes"')
			->where('`statistics` = "Estimate"')
			->where('`datatype` = "Seasonally adjusted"')
			->where('`geography` = "New Brunswick"')
			->order_by('ord_results', 'ASC');

		$prev_month_result = $this->db->get()->result();


		//getting comparisons for year over year and month to last month
		$result[] = array();
		$temp = array();
		foreach($start_result as $key => $value) {
			$characteristic = $value->characteristics;
			$ref_date = $value->ref_date;
			$val = $value->value;
			foreach($prev_result as $innerKey => $innerValue) {
				if($innerValue->characteristics == $characteristic) {
					$inVal = $innerValue->value;
					$diff = $val - $inVal;
					$temp['characteristics'] = $value->characteristics;
					$temp['curr_year'] = $ref_date;
					$temp['prev_year'] = $innerValue->ref_date;
					if(in_array($innerValue->characteristics, $math_array)) {
						$perc_diff = sprintf('%.01f', (($diff / $val) * 100));
						$temp['perc_diff'] = $perc_diff;
						$temp['curr_yr_val'] = $value->value * 1000;
						$temp['prev_yr_val'] = $innerValue->value * 1000;
						$temp['yr_diff'] = $diff * 1000;
					} else {
						$temp['curr_yr_val'] = $value->value;
						$temp['prev_yr_val'] = $innerValue->value;
						$temp['yr_diff'] = $diff;
						$temp['perc_diff'] = "";
					}

				}
			}
			foreach($prev_month_result as $prevMonth => $preVal) {
				if($preVal->characteristics == $characteristic) {
					$lastMoVal = $preVal->value;
					$modiff = $val - $lastMoVal;
					$temp['prev_month'] = $preVal->ref_date;
					if(in_array($preVal->characteristics, $math_array)) {
						$month_perc_diff = sprintf('%.01f', (($modiff / $val) * 100));
						$temp['mo_per_diff'] = $month_perc_diff;
						$temp['prev_mo_val'] = $lastMoVal * 1000;
						$temp['mo_diff'] = $modiff * 1000;
					} else {
						$temp['prev_mo_val'] = $lastMoVal;
						$temp['mo_diff'] = $modiff;
						$temp['mo_per_diff'] = "";
					}

				}
			}
			array_push($result, $temp);
		}
		$result1 = array_filter($result);

		foreach($result1 as $key => $value) {

			$table = array();
			$table['cols'] = array(

				array('label' => 'Characteristics', 'type' => 'string', ),
				array('label' => $value['prev_year'], 'type' => 'number'),
				array('label' => $value['prev_month'], 'type' => 'number'),
				array('label' => $value['curr_year'], 'type' => 'number'),
				array('label' => 'M-M Change', 'type' => 'number'),
				array('label' =>'', 'type' => 'number'),
				array('label' => 'Y-Y Change', 'type' => 'number'),
				array('label' => '', 'type' => 'number')

			);
		}
		$rows = array();

		foreach($result1 as $key => $value) {
			if(is_numeric($value['mo_per_diff'])) {
				$mo_diff = $value['mo_per_diff'];
			} else {
				$mo_diff = null;
			}
			if(is_numeric($value['perc_diff'])) {
				$yr_diff = $value['perc_diff'];
			} else {
				$yr_diff = null;
			}

			$temp = array();
			// the following line will be used to slice the Pie chart
			$temp[] = array('v' => $this->_fieldNames($value['characteristics']));
			$temp[] = array('v' => $value['prev_yr_val']);
			$temp[] = array('v' => $value['prev_mo_val']);
			$temp[] = array('v' => $value['curr_yr_val']);
			$temp[] = array('v' => $value['mo_diff']);
			$temp[] = array('v' => $mo_diff);
			$temp[] = array('v' => $value['yr_diff']);
			$temp[] = array('v' => $yr_diff);

			$rows[] = array('c' => $temp);

		}
		$table['rows'] = $rows;
		$jsonTable = json_encode($table);

		return $jsonTable;
	}

	public function getCharacteristics($data)
	{
		$this->db->select('c.characteristic')
			     ->from('characteristics AS c')
				 ->join('table_characteristics AS tc', 'tc.characteristic_id = c.id')
				 ->join('tables AS t', 't.id = tc.table_id')
				 ->where('t.table =',  $data['table'])
				 ->where('c.language =', $data['language']);

		$query = $this->db->get();

		return $query;
	}

	public function getGeography($lang)
	{
		$this->db->select('name')
				 ->from('geography_prov')
				 ->where('lang =', $lang);

		$query = $this->db->get();

		return $query;
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

	private function _fieldNames($name)
	{
		switch ($name) {
			case 'Population (x 1,000)':
				$returnName = 'Population';
				break;
			case 'Labour force (x 1,000)':
				$returnName = 'Labour Force';
				break;
			case 'Employment (x 1,000)':
				$returnName = 'Employment';
				break;
			case 'Employment full-time (x 1,000)':
				$returnName = 'FT Employment';
				break;
			case 'Employment part-time (x 1,000)':
				$returnName = 'PT Employment';
				break;
			case 'Unemployment (x 1,000)':
				$returnName = 'Unemployment';
				break;
			case 'Participation rate (percent)':
				$returnName = 'Participation rate (%)';
				break;
			case 'Employment rate (percent)':
				$returnName = 'Employment rate (%)';
				break;
			case 'Unemployment rate (percent)':
				$returnName = 'Unemployment rate (%)';
				break;
			default:
				$returnName = $name;
		}

		return $returnName;
	}
}

