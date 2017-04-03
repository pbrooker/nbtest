<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datagathering extends CI_Controller {




	public function downloadZipFile()
	{
		$url = $this->input->post('url');
		$filename = './uploads/02820002-eng.zip';
		if (file_exists($filename)) {
			unlink($filename);
		}
		$filepath = './uploads/02820002-eng.zip';

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
		$raw_file_data = curl_exec($ch);

		if(curl_errno($ch)){
			echo 'error:' . curl_error($ch);
		}
		curl_close($ch);
		file_put_contents($filepath, $raw_file_data);

		// if exists, process file
		if (filesize($filepath) > 0) {
			$this->processZipFile($filepath);
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
			return false;
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




}