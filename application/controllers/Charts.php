<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charts extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Datagathering_model', 'nbdata');
	}

	public function selectChart()
	{
		$this->load->view('select_chart');
	}

	public function participation()
	{
		$this->load->view('participation');
	}

}