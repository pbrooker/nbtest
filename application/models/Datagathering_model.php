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

		$this->db->select('last_modified')
			     ->from('nbdata_last_update')
				 ->where('last_modified =', $header_hash);
		$query = $this->db->get()->row();

		return $query;
	}

	public function processZipFile($filepath)
	{

		$file_path = 'https://qimple.s3.amazonaws.com/NBData_Temp/output.csv';
		//$new_name = str_replace("\\","/",$file_path);
		$con = $this->db->conn_id;
		$this->db->select('hash_value')
				 ->from('nbdata');
		$result1 = $this->db->get();

		$initial_count = $result1->num_rows();

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


	/*
	*Function For Batch Insert using Ignore Into
	*/
	public function custom_insert_batch($table = '', $set = NULL)
	{
		if ( ! is_null($set))
		{
			$this->set_insert_batch($set);
		}

		if (count($this->ar_set) == 0)
		{
			if ($this->db_debug)
			{
				//No valid data array.  Folds in cases where keys and values did not match up
				return $this->display_error('db_must_use_set');
			}
			return FALSE;
		}

		if ($table == '')
		{
			if ( ! isset($this->ar_from[0]))
			{
				if ($this->db_debug)
				{
					return $this->display_error('db_must_set_table');
				}
				return FALSE;
			}

			$table = $this->ar_from[0];
		}

		// Batch this baby
		for ($i = 0, $total = count($this->ar_set); $i < $total; $i = $i + 100)
		{

			$sql = $this->_insert_batch($this->_protect_identifiers($table, TRUE, NULL, FALSE), $this->ar_keys, array_slice($this->ar_set, $i, 100));
			$sql = str_replace('INSERT INTO','INSERT IGNORE INTO',$sql);
			//echo $sql;

			$this->query($sql);
		}

		$this->_reset_write();


		return TRUE;
	}
}