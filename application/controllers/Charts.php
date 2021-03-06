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
				'startdate' => $enddate,
				'enddate' => $startdate
			);



			// dates for m-m
			if($startmonth <= 12 && $startmonth > 1) {
				$mo = $startmonth - 1;

				$mmDates = array(
					'startdate' => $startyear . '/' . $startmonth,
					'enddate' => $startyear . '/' . $mo
				);
			} elseif($startmonth == 1) {
				$mo = 12;
				$yr = $startyear - 1;

				$mmDates = array(
					'startdate' => $startyear . '/' . $startmonth,
					'enddate' => $yr . '/' . $mo
				);
			}

			// dates for Unemployment m-m
			if($startmonth <= 12 && $startmonth > 1) {
				$mo = $startmonth - 1;

				$urMmDates = array(
					'startdate' => $startyear . '/' . $mo,
					'enddate' => $startyear . '/' . $startmonth
				);
			} elseif($startmonth == 1) {
				$mo = 12;
				$yr = $startyear - 1;

				$urMmDates = array(
					'startdate' => $yr . '/' . $mo,
					'enddate' => $startyear . '/' . $startmonth
				);
			}

			// alternative dates for Employment Rate
			$erDates = array (
				'startdate' => $startdate,
				'enddate' => $enddate,
				'characteristics' => 'Employment (x 1,000)',
				'datatype' => 'Seasonally adjusted'
			);

			//alternative dates for Employment Rate m-m - Trying to find what data is being pulled
			if($startmonth <= 12 && $startmonth > 1) {
				$mo = $startmonth - 1;

				$erMMDates = array(
					'startdate' => $startyear . '/' . $startmonth,
					'enddate' => $startyear . '/' . $mo,
					'characteristics' => 'Employment (x 1,000)',
					'datatype' => 'Seasonally adjusted'
				);
			} elseif($startmonth == 1) {
				$mo = 12;
				$yr = $startyear - 1;

				$erMMDates = array(
					'startdate' => $startyear . '/' . $startmonth,
					'enddate' => $yr . '/' . $mo,
					'characteristics' => 'Employment (x 1,000)',
					'datatype' => 'Seasonally adjusted'
				);
			}

			// dates for 10 year growth
			$endyear = ((int)$startyear - 10) . '/' . $startmonth;
			$dataGrowth = array(

				'startdate' => $startdate,
				'enddate' => $endyear,
				'characteristics' => 'Employment (x 1,000)',
				'datatype' => 'Seasonally adjusted'
			);


			$dataParticipation = array (
				'date' => $startdate,
				'characteristics' => 'Participation rate (percent)'
			);
			$dataUnemployment = array (
				'date' => $startdate,
				'characteristics' => 'Unemployment rate (percent)'
			);

			$dataUR_MM = $urMmDates;
			$dataUR_MM['characteristics'] = 'Unemployment rate (percent)';
			$dataUR_MM['datatype'] = 'Seasonally adjusted';

			$dataUR_YY = $dates;
			$dataUR_YY['characteristics'] = 'Unemployment rate (percent)';
			$dataUR_YY['datatype'] = 'Seasonally adjusted';

			$dataPR_MM = $mmDates;
			$dataPR_MM['characteristics'] = 'Participation rate (percent)';
			$dataPR_MM['datatype'] = 'Seasonally adjusted';

			$dataPR_YY = $dates;
			$dataPR_YY['characteristics'] = 'Participation rate (percent)';
			$dataPR_YY['datatype'] = 'Seasonally adjusted';


			// Common to all queries
			$common_settings = array ('agegroup' => '15 years and over', 'sex' => 'Both sexes', 'statistics' => 'Estimate' );

			foreach($common_settings as $key => $value) {

				$erDates[$key] = $value;
				$dataGrowth[$key] = $value;
				$erMMDates[$key] = $value;
				$dataUR_MM[$key] = $value;
				$dataUR_YY[$key] = $value;
				$dataPR_MM[$key] = $value;
				$dataPR_YY[$key] = $value;
			}

			$data['participation_yy'] = $this->nbdata->getComparisonBarChart($dataPR_YY);
			$data['participation'] = $this->nbdata->getBarChart($dataParticipation);
			$data['participation_mm'] = $this->nbdata->getComparisonBarChart($dataPR_MM);
			$data['employment_mm'] = $this->nbdata->getEmploymentRate($erMMDates);
			$data['employment_yy'] = $this->nbdata->getEmploymentRate($erDates);
			$data['employment_ur'] = $this->nbdata->getBarChart($dataUnemployment);
			$data['employment_urMM'] = $this->nbdata->getComparisonBarChart($dataUR_MM);
			$data['employment_urYY'] = $this->nbdata->getComparisonBarChart($dataUR_YY);
			$data['growth_10yr'] = $this->nbdata->getEmploymentRate($dataGrowth);
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


			// for Month to Month trends
			$MM = array();
			if ($startmonth <= 12 && $startmonth >= 1) {
				$month = $startmonth;
				$yr = $startyear;
				for ($i = 0; $i <= 13; $i++) {
					if ($month > 0) {
						$mo_padded = sprintf('%02d', $month);
						$MM[$i] = $yr . '/' . $mo_padded;
						$month--;
					} else {
						$month = 12;
						$yr--;
					}
				}
			}

			// for Year to Year trends
			$YY = array();
			if ($startmonth <= 12 && $startmonth >= 1) {
				$month = $startmonth;
				$yr = $startyear;
				for ($i = 0; $i <= 9; $i++) {
					$mo_padded = sprintf('%02d', $month);
					$YY[$i] = $yr . '/' . $mo_padded;
					$yr--;
				}
			}

			// for Year over year and last month to current month data table
			$mo = $startmonth - 1;
			if($mo == 0) {
				$mo = 12;
			}
			if($startmonth == 1) {
				$prevMonthYear = $startyear -1;
			} else {
				$prevMonthYear = $startyear;
			}
			$mo_pad = sprintf('%02d', $startmonth);
			$dataTable = array (

				'startyear' => $startyear . '/' . $mo_pad,
				'prevyear' => ($startyear - 1) . '/' . $mo_pad,
				'prevmonth' =>  $prevMonthYear . '/' . sprintf( '%02d', $mo),
				'characteristics' => array (
					'Population (x 1,000)', 'Labour force (x 1,000)', 'Employment (x 1,000)',
					'Employment full-time (x 1,000)', 'Employment part-time (x 1,000)', 'Unemployment (x 1,000)',
					'Participation rate (percent)', 'Employment rate (percent)', 'Unemployment rate (percent)'
				),
				'math_array' => array (
					'Population (x 1,000)', 'Labour force (x 1,000)', 'Employment (x 1,000)',
					'Employment full-time (x 1,000)', 'Employment part-time (x 1,000)', 'Unemployment (x 1,000)'
				)

			);

			$dataLF_MM = array (
				'where_in' => $MM,
				'characteristics' => 'Labour force (x 1,000)' )
			;
			$dataLF_YY = array (
				'where_in' => $YY,
				'characteristics' => 'Labour force (x 1,000)'
			);
			$dataEM_MM = array (
				'where_in' => $MM,
				'characteristics' => 'Employment (x 1,000)'
			);
			$dataEM_YY = array (
				'where_in' => $YY,
				'characteristics' => 'Employment (x 1,000)'
			);
			$dataUM_MM = array (
				'where_in' => $MM,
				'characteristics' => 'Unemployment rate (percent)'
			);
			$dataUM_YY = array (
				'where_in' => $YY,
				'characteristics' => 'Unemployment rate (percent)'
			);

			$dateObj   = DateTime::createFromFormat('!m', $startmonth);
			$monthName = $dateObj->format('F');

			$data['labour_force_statistics'] = array(
				'data' => $this->nbdata->getLabourForceStatistics($dataTable),
				'date' => $monthName . ' ' . $startyear);
			$data['labour_force_mm'] = $this->nbdata->getLabourForceData($dataLF_MM);
			$data['labour_force_yy'] = $this->nbdata->getLabourForceData($dataLF_YY);
			$data['employment_mm'] = $this->nbdata->getLabourForceData($dataEM_MM);
			$data['employment_yy'] = $this->nbdata->getLabourForceData($dataEM_YY);
			$data['unemployment_mm'] = $this->nbdata->getLabourForceData($dataUM_MM);
			$data['unemployment_yy'] = $this->nbdata->getLabourForceData($dataUM_YY);
		}

		if (isset($data)) {

			$this->load->view('labour_force', $data);
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