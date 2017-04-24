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
		$this->form_validation->set_rules('startmonth', 'Start Month',
			'required|min_length[2]|max_length[2]|callback_monthCheck');

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

			// alternative dates for Employment Rate
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

			// dates for 10 year growth
			$endyear = ((int)$startyear - 9) . '/' . $startmonth;
			$dataGrowth = array(

				'startdate' => $startdate,
				'enddate' => $endyear,
				'characteristics' => 'Employment rate (percent)'
			);


			//alternative dates for Employment Rate m-m - Trying to find what data is being pulled
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

			$dataParticipation = array (
				'date' => $startdate,
				'characteristics' => 'Participation rate (percent)'
			);
			$dataUnemployment = array (
				'date' => $startdate,
				'characteristics' => 'Unemployment rate (percent)'
			);

			$dataUR_MM = $mmDates;
			$dataUR_MM['characteristics'] = 'Unemployment rate (percent)';

			$dataUR_YY = $erDates;
			$dataUR_YY['characteristics'] = 'Unemployment rate (percent)';

			$dataPR_MM = $mmDates;
			$dataPR_MM['characteristics'] = 'Participation rate (percent)';

			$dataPR_YY = $dates;
			$dataPR_YY['characteristics'] = 'Participation rate (percent)';



			$data['participation_yy'] = $this->nbdata->getComparisonBarChart($dataPR_YY);
			$data['participation'] = $this->nbdata->getBarChart($dataParticipation);
			$data['participation_mm'] = $this->nbdata->getComparisonBarChart($dataPR_MM);
			$data['employment_mm'] = $this->nbdata->getEmploymentRate($erMMDates);
			$data['employment_yy'] = $this->nbdata->getEmploymentRate($erDates);
			$data['employment_ur'] = $this->nbdata->getBarChart($dataUnemployment);
			$data['employment_urMM'] = $this->nbdata->getComparisonBarChart($dataUR_MM);
			$data['employment_urYY'] = $this->nbdata->getComparisonBarChart($dataUR_YY);
			$data['growth_10yr'] = $this->nbdata->getComparisonBarChart($dataGrowth);
		}
		if(isset($data)) {

			$this->load->view('participation', $data);
		}

	}

	public function getLabourForceCharts()
	{
		$this->form_validation->set_rules('startyear', 'Start Year', 'required|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('startmonth', 'Start Month',
			'required|min_length[2]|max_length[2]|callback_monthCheck');

		if ($this->form_validation->run() == TRUE) {

			$startyear = $this->input->post('startyear');
			$startmonth = $this->input->post('startmonth');


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