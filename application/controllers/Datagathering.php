<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datagathering extends CI_Controller {




	function downloadZipFile($url, $filepath)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
		$raw_file_data = curl_exec($ch);

		if(curl_errno($ch)){
			echo 'error:' . curl_error($ch);
		}
		curl_close($ch);

		file_put_contents($filepath, $raw_file_data);
		return (filesize($filepath) > 0)? true : false;
	}


}