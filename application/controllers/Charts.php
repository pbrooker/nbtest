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
		$this->form_validation->set_rules('date', 'Date', 'required|min_length[7]|max_length[7]');


		if ($this->form_validation->run() == TRUE)
		{
			$date = $this->input->post('date');
			$data['participation'] = $this->nbdata->getParticipationRate($date);
			$data['participation_mm'] = $this->nbdata->getParticipationRateMM($date);
		}
		if(isset($data)) {

			$this->load->view('participation', $data);
		}
	}

	public function participationMM()
	{
		$this->form_validation->set_rules('startdate', 'Start Date', 'required|min_length[7]|max_length[7]');
		$this->form_validation->set_rules('enddate', 'End Date', 'required|min_length[7]|max_length[7]');

		if ($this->form_validation->run() == TRUE)
		{
			$startdate = $this->input->post('startdate');
			$enddate = $this->input->post('enddate');
			$dates = array (
				'startdate' => $startdate,
				'enddate' => $enddate
			);
			$data['participation_mm'] = $this->nbdata->getParticipationRateMM($dates);
		}
		if(isset($data)) {

			$this->load->view('participation', $data);
		}
	}

}