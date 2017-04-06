<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datagathering extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Datagathering_model', 'nbdata');
	}

/**
 * Function to gather zip files. Currently hard coded to button post, but each button can be linked to a different URL,
 * or input could be adjusted to a function call with a url input
 *
 */
	public function downloadZipFile()
	{
		$url = $this->input->post('url');
		$filename = './uploads/02820002-eng.zip';
		if (file_exists($filename)) {
			chmod($filename, 0777);
			//flock($filename, LOCK_UN);
			unlink($filename);
		}
		//$filepath = './uploads/02820002-eng.zip';
		$fp_header = './uploads/header_data.txt';

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);

		$raw_file_data = curl_exec($ch);

		//get header data to compare for last update
		$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$header = substr($raw_file_data, 0, $header_size);
		$body = substr($raw_file_data, $header_size);

		if(curl_errno($ch)){
			echo 'error:' . curl_error($ch);
		}
		curl_close($ch);
		file_put_contents($filename, $body);
		file_put_contents($fp_header, $header);
		$header_hash = $this->processHeaderText($fp_header);


		if($header_hash) {

			// if exists, process file
			if (filesize($filename) > 0) {
				$processed_csv = $this->processZipFile($filename);
				if($processed_csv) {
					$result = $this->nbdata->processZipFile('/uploads/02820002-eng/output.csv');
					if($result) {
						echo $result . 'records saved';
					} else {
						echo 'Error processing csv';
					}
				}
			}
		}

	}

	/**
	 * Unzip the source_file in the destination dir
	 *
	 * @param   string      The path to the ZIP-file.
	 * @param   string      The path where the zipfile should be unpacked, if false the directory of the zip-file is used
	 * @param   boolean     Indicates if the files will be unpacked in a directory with the name of the zip-file (true) or not (false) (only if the destination directory is set to false!)
	 * @param   boolean     Overwrite existing files (true) or not (false)
	 *
	 * @return  boolean     Succesful or not
	 */
	function processZipFile($filepath, $dest_dir=false, $create_zip_name_dir=true, $overwrite=true) {


		if ($zip = zip_open($filepath))
		{
			if (is_resource($zip))
			{
				$splitter = ($create_zip_name_dir === true) ? "." : "/";
				if ($dest_dir === false) $dest_dir = substr($filepath, 0, strrpos($filepath, $splitter))."/";

				// Create the directories to the destination dir if they don't already exist
				$this->create_dirs($dest_dir);

				// For every file in the zip-packet
				while ($zip_entry = zip_read($zip))
				{
					// Now we're going to create the directories in the destination directories

					// If the file is not in the root dir
					$pos_last_slash = strrpos(zip_entry_name($zip_entry), "/");
					if ($pos_last_slash !== false)
					{
						// Create the directory where the zip-entry should be saved (with a "/" at the end)
						$this->create_dirs($dest_dir.substr(zip_entry_name($zip_entry), 0, $pos_last_slash+1));
					}

					// Open the entry
					if (zip_entry_open($zip,$zip_entry,"r"))
					{

						// The name of the file to save on the disk
						$file_name = $dest_dir.zip_entry_name($zip_entry);

						// Check if the files should be overwritten or not
						if ($overwrite === true || $overwrite === false && !is_file($file_name))
						{
							// Get the content of the zip entry
							$fstream = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

							file_put_contents($file_name, $fstream );
							// Set the rights
							chmod($file_name, 0777);
							echo "save: ".$file_name."<br />";
						}

						// Close the entry
						zip_entry_close($zip_entry);
					}
				}
				// Close the zip-file
				zip_close($zip);
			}
		}
		else
		{
			$data = array (
				'heading' => 'Zip Error',
				'message' => 'There was an error with the Zip file, please try again'
			);
			redirect(base_url('Gather/error'), $data);

		}
		$csv = './uploads/02820002-eng/02820002-eng.csv';
		if(file_exists($csv)) {
			$this->processCsv($csv);
		}

		return true;
	}

	/**
	 * This function creates recursive directories if it doesn't already exist
	 *
	 * @param String  The path that should be created
	 *
	 * @return  void
	 */
	function create_dirs($path)
	{
		if (!is_dir($path))
		{
			$directory_path = "";
			$directories = explode("/",$path);
			array_pop($directories);

			foreach($directories as $directory)
			{
				$directory_path .= $directory."/";
				if (!is_dir($directory_path))
				{
					mkdir($directory_path);
					chmod($directory_path, 0777);
				}
			}
		}
	}

	/**
	 * Function takes a CSV and processes it to remove not relevant entries ($age).
	 * @param $csv
	 * @param $age
	 * @return bool
	 */

	function processCsv($csv, $age = 10)
	{
		set_time_limit(300);
		$cutoffYear = (int)date('Y') - $age;
		$outfile = './uploads/02820002-eng/output.csv';
		if (file_exists($outfile)) {
			chmod($outfile, 0766);
			//flock($outfile, LOCK_UN);
			unlink($outfile);
		}

		if(($handle = fopen($csv, 'r')) !== false) {

			$csv = new SplFileObject($csv);
			$csv->setFlags(SplFileObject::READ_CSV);
			$start = 0;
			$batch = 10000000;
			$output = fopen('./uploads/02820002-eng/output.csv', 'w');
			// get the first row, which contains the column-titles (if necessary)
			$header = fgetcsv($handle);
			array_push($header, "," . 'hash_value');
			fputcsv($output, $header);

			while (!$csv->eof()) {
				foreach (new LimitIterator($csv, $start, $batch) as $line) {

					//get line and ensure first entry is cast as int for comparison
					$year = (int)$line[0];

					//verify within year range
					if (!($year <= $cutoffYear)) {
						$data = $line;
						$hash = hash('md5', implode($line));
						array_push($data, $hash);
						fputcsv($output, $data);
					}
				}
				$start += $batch;
				return true;
				chmod($outfile, 0766);

			}

		}   else {

			return false;
		}

	}

	/**
	 * Reads header file data and creates a unique hash code based on length and date created. Then checks it against
	 * the database of hash records. If the hash exists, the process exits. Otherwise it goes to the next stage of
	 * processing
	 * @param $header
	 * @return bool|string
	 */

	function processHeaderText($header)
	{

		$file = $header;

		$fopen = fopen($file, 'r');
		$fread = fread($fopen,filesize($file));

		fclose($fopen);

		$remove = "\n";

		$split = explode($remove, $fread);

		$array[] = null;
		$colon = ":";

		foreach ($split as $string)
		{
			$row = explode($colon, $string, 2);
			array_push($array,$row);
		}
		$save_data = "";
		foreach($array as $value) {
			switch ($value[0]) {
				case "Last-Modified":
					$save_data .=  $value[1] . ',';
					break;
				case "Content-Length":
					$save_data .=  $value[1];
					break;
			}
		}

		$header_hash = hash('md5', $save_data);
		$insert_data = array ('last_modified' => $header_hash );

		//check for existing hash
		$last_processed = $this->nbdata->getLastProcessed($header_hash);
		if($last_processed == null ) {
			$this->nbdata->saveLastProcessed($insert_data);
			return $header_hash;
		} else {
			$exists_data = array ('last_modified' => null);
			$this->nbdata->saveLastProcessed($exists_data);
			echo 'Record already exists. Database has been updated with scan date.';
			return false;
		}




	}



}