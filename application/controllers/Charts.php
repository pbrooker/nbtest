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

	public function participationYY()
	{
		$this->form_validation->set_rules('startyear', 'Start Year', 'required|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('startmonth', 'Start Month', 'required|min_length[2]|max_length[2]');

		if ($this->form_validation->run() == TRUE)
		{
			$startyear = $this->input->post('startyear');
			$startmonth = $this->input->post('startmonth');

			$startdate = $startyear . '/' .$startmonth;

			$enddate = ((int)$startyear + 1) . '/' . $startmonth;
			$dates = array (
				'startdate' => $startdate,
				'enddate' => $enddate
			);
			$data['participation_yy'] = $this->nbdata->getParticipationRateYY($dates);
		}
		if(isset($data)) {

			$this->load->view('participation', $data);
		}
	}

	public function getAllParticipationCharts()
	{
		$this->form_validation->set_rules('startyear', 'Start Year', 'required|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('startmonth', 'Start Month', 'required|min_length[2]|max_length[2]|callback_monthCheck');

		if ($this->form_validation->run() == TRUE)
		{
			$startyear = $this->input->post('startyear');
			$startmonth = $this->input->post('startmonth');

			// dates for y-y
			$startdate = $startyear . '/' .$startmonth;
			$enddate = ((int)$startyear - 1) . '/' . $startmonth;
			$dates = array (
				'startdate' => $startdate,
				'enddate' => $enddate
			);
			$erDates = array (
				'startdate' => $enddate,
				'enddate' => $startdate
			);

			// dates for m-m
			if($startmonth <= 12 && $startmonth > 1) {
				$mo = $startmonth - 1;

				$mmDates = array(
					'startdate' => $startyear . '/' . $mo,
					'enddate' => $startyear . '/' . $startmonth
				);
			} elseif($startmonth == 1) {
				$mo = 12;
				$yr = $startyear - 1;

				$mmDates = array(
					'startdate' => $yr . '/' . $mo,
					'enddate' => $startyear . '/' . $startmonth
				);
			}

			//dates for Employment Rate m-m
			if($startmonth <= 12 && $startmonth > 1) {
				$mo = $startmonth - 1;

				$erMMDates = array(
					'startdate' => $startyear . '/' . $startmonth,
					'enddate' => $startyear . '/' . $mo
				);
			} elseif($startmonth == 1) {
				$mo = 12;
				$yr = $startyear - 1;

				$erMMDates = array(
					'startdate' => $startyear . '/' . $startmonth,
					'enddate' => $yr . '/' . $mo
				);
			}





			$data['participation_yy'] = $this->nbdata->getParticipationRateYY($dates);
			$data['participation'] = $this->nbdata->getParticipationRate($startdate);
			$data['participation_mm'] = $this->nbdata->getParticipationRateMM($mmDates);
			$data['employment_mm'] = $this->nbdata->getEmploymentRate($erMMDates);
			$data['employment_yy'] = $this->nbdata->getEmploymentRate($erDates);
		}
		if(isset($data)) {

			$this->load->view('participation', $data);
		}

	}

	function monthCheck($num)
	{
		if($num > 12 || $num < 1) {
			$this->form_validation->set_message(
				'startmonth',
				'The %s field must be a valid month'
			);
			return FALSE;
		}
		else
		{
			return TRUE;
		}

	}

}