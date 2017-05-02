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
		$this->form_validation->set_rules('startDate', 'Start Date', 'required|min_length[7]|max_length[7]');
		$this->form_validation->set_rules('endDate', 'End Date', 'required|min_length[7]|max_length[7]');

		if ($this->form_validation->run() == TRUE)
		{
			$startDate = $this->input->post('startDate');
			$endDate = $this->input->post('endDate');
			$dates = array (
				'startDate' => $startDate,
				'endDate' => $endDate
			);
			$data['participation_mm'] = $this->nbdata->getParticipationRateMM($dates);
		}
		if(isset($data)) {

			$this->load->view('participation', $data);
		}
	}

	public function participationYY()
	{
		$this->form_validation->set_rules('startYear', 'Start Year', 'required|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('startMonth', 'Start Month', 'required|min_length[2]|max_length[2]');

		if ($this->form_validation->run() == TRUE)
		{
			$startYear = $this->input->post('startYear');
			$startMonth = $this->input->post('startMonth');

			// dates for y-y
			$startDate = $startYear . '/' .$startMonth;
			$endDate = ((int)$startYear - 1) . '/' . $startMonth;
			$dates = array (
				'startDate' => $endDate,
				'endDate' => $startDate
			);
			$data['participation_yy'] = $this->nbdata->getComparisonBarChart($dates);
		}
		if(isset($data)) {

			$this->load->view('participation', $data);
		}
	}

	public function getAllParticipationCharts()
	{
		$this->form_validation->set_rules('startYear', 'Start Year', 'required|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('startMonth', 'Start Month',
			'required|min_length[2]|max_length[2]|callback_monthCheck');

		if ($this->form_validation->run() == TRUE)
		{
			$startYear = $this->input->post('startYear');
			$startMonth = $this->input->post('startMonth');

			$date_array = array('startYear' => $startYear, 'startMonth' => $startMonth);

			$dates = $this->_dateSelectionArray($date_array);


			// alternative dates for Employment Rate
			$erDates = array (
				'startDate' => $dates['startDate'],
				'endDate' => $dates['endDate'],
				'characteristics' => 'Employment (x 1,000)',
				'datatype' => 'Seasonally adjusted'
			);

			//alternative dates for Employment Rate m-m
			$erMMDates = $dates['rev_chrono_mm_offset'];
			$erMMDates['characteristics'] = 'Employment (x 1,000)';
			$erMMDates['datatype'] = 'Seasonally adjusted';

			// dates for 10 year growth
			$dataGrowth = $dates['ten_year_span'];
			$dataGrowth['characteristics'] = 'Employment (x 1,000)';
			$dataGrowth['datatype'] = 'Seasonally adjusted';


			$dataParticipation = array (
				'date' => $dates['startDate'],
				'characteristics' => 'Participation rate (percent)'
			);
			$dataUnemployment = array (
				'date' => $dates['startDate'],
				'characteristics' => 'Unemployment rate (percent)'
			);

			$dataUR_MM = $dates['mm_chrono'];
			$dataUR_MM['characteristics'] = 'Unemployment rate (percent)';
			$dataUR_MM['datatype'] = 'Seasonally adjusted';

			$dataUR_YY = $dates['chrono_year'];
			$dataUR_YY['characteristics'] = 'Unemployment rate (percent)';
			$dataUR_YY['datatype'] = 'Seasonally adjusted';

			$dataPR_MM = $dates['reverse_mm_chrono'];
			$dataPR_MM['characteristics'] = 'Participation rate (percent)';
			$dataPR_MM['datatype'] = 'Seasonally adjusted';

			$dataPR_YY = $dates['chrono_year'];
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
		$this->form_validation->set_rules('startYear', 'Start Year', 'required|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('startMonth', 'Start Month',
			'required|min_length[2]|max_length[2]|callback_monthCheck');


		if ($this->form_validation->run() == TRUE) {

			$startYear = $this->input->post('startYear');
			$startMonth = $this->input->post('startMonth');


			// date array to get arrays for trend reports and generate chart and table data
			$date = array('startMonth' => $startMonth, 'startYear' => $startYear);

			// for Month to Month trends
			$MM = $this->_monthToMonthArray($date);

			// for Year to Year trends
			$YY = $this->_yearToYearArray($date);

			$data['labour_force_statistics'] = $this->generateOverallTableReportData($date);


			// Get southeast reports
			$se_date = $date;
			$se_date['region'] = 'Southeast Region';
			$data['southeast'] = $this->generateRegionTableReportData($se_date);

			// Get southwest reports
			$sw_date = $date;
			$sw_date['region'] = 'Southwest Region';
			$data['southwest'] = $this->generateRegionTableReportData($sw_date);

			// Get central reports
			$ce_date = $date;
			$ce_date['region'] = 'Central Region';
			$data['central'] = $this->generateRegionTableReportData($ce_date);

			// Get northeast reports
			$ne_date = $date;
			$ne_date['region'] = 'Northeast Region';
			$data['northeast'] = $this->generateRegionTableReportData($ne_date);

			// Get northwest reports
			$nw_date = $date;
			$nw_date['region'] = 'Northwest Region';
			$data['northwest'] = $this->generateRegionTableReportData($nw_date);

			// Get Youth reports
			$yt_date = $date;
			$yt_date['region'] = 'Youth';
			$data['youth'] = $this->generateRegionTableReportData($yt_date);

			$dataLF_MM = array (
				'where_in' => $MM,
				'characteristics' => 'Labour force (x 1,000)'
			);
			$dataLF_YY = array (
				'where_in' => $YY,
				'characteristics' => 'Labour force (x 1,000)',
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

	public function generateBarChartData($data)
	{
		$startMonth = $data['startMonth'];
		$startYear = $data['startYear'];
		$characteristics = $data['characteristics'];
		$datatype = $data['datatype'];
		$reportType = $data['reportType'];

		// date array to get arrays for trend reports and generate chart and table data
		$date = array('startMonth' => $startMonth, 'startYear' => $startYear);



	}

	public function generateComparisonBarChartData($data)
	{
		$startMonth = $data['startMonth'];
		$startYear = $data['startYear'];
		$characteristics = $data['characteristics'];
		$datatype = $data['datatype'];


	}

	public function customLabourForceChartBuild($lang = 'EN')
	{


		if($lang == 'EN') {
			$characteristics = array('language' => 'EN', 'table' => '02820087');
		} else {
			$characteristics = array('language' => 'FR', 'table' => '02820087');
		}

		$geo = $this->nbdata->getGeography($lang);
		$geography = array();

		if($geo->num_rows() > 0) {
			foreach ($geo->result() as $key => $value) {
				$geography[$value->name] = $value->name;
			}
		}
		$char = $this->nbdata->getCharacteristics($characteristics);
		$characteristics = array();

		if($char->num_rows() > 0) {
			foreach ($char->result() as $key => $value) {
				$characteristics[$value->characteristic] = $value->characteristic;
			}
		}

		$data['agegroups'] = $this->_arrays('agegroups');
		$data['sex'] = $this->_arrays('sex');
		$data['stats'] = $this->_arrays('stat_02820087');
		$data['datatype'] = $this->_arrays('dt_02820087');
		$data['geography'] = $geography;
		$data['characteristics'] = $characteristics;


		if (isset($data)) {

			$this->load->view('forms/labour_force_custom', $data);
		}


	}

	public function generateCustomChart()
	{
		$this->form_validation->set_rules('startYear', 'Start Year', 'required|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('startMonth', 'Start Month',
			'required|min_length[2]|max_length[2]|callback_monthCheck');

		if ($this->form_validation->run() == TRUE) {
			$data = array();
			$startYear = $this->input->post('startYear');
			$startMonth = $this->input->post('startMonth');

			$data['startDate'] = ($startYear - 1) . '/' . $startMonth;
			$data['endDate'] = $startYear . '/' . $startMonth;
			$data['agegroup'] = $this->input->post('agegroup');
			$data['sex'] = $this->input->post('sex');
			$data['datatype'] = $this->input->post('datatype');
			$data['geography'] = $this->input->post('geography');
			$data['statistics'] = $this->input->post('stats');
			$data['characteristics'] = $this->input->post('characteristics');

			$chart['data'] = $this->nbdata->getComparisonBarChart($data);

			$chart['title'] = 'Custom Labour Force Chart';


			$this->template->write('custom_title', 'Custom Chart');
			$this->template->write_view('head', 'chart_views/bar_chart', $chart);
			$this->template->write_view('content', 'chart_views/view');

			$this->template->render();

		}

	}

	public function generateOverallTableReportData($data)
	{
		$startMonth = $data['startMonth'];
		$startYear = $data['startYear'];

		// for Year over year and last month to current month data table
		$mo = $startMonth - 1;
		if($mo == 0) {
			$mo = 12;
		}
		if($startMonth == 1) {
			$prevMonthYear = $startYear -1;
		} else {
			$prevMonthYear = $startYear;
		}
		$mo_pad = sprintf('%02d', $startMonth);
		$dataTable = array (

			'startYear' => $startYear . '/' . $mo_pad,
			'prevyear' => ($startYear - 1) . '/' . $mo_pad,
			'prevmonth' =>  $prevMonthYear . '/' . sprintf( '%02d', $mo),
			'characteristics' => array (
				'Population (x 1,000)', 'Labour force (x 1,000)', 'Employment (x 1,000)',
				'Employment full-time (x 1,000)', 'Employment part-time (x 1,000)', 'Unemployment (x 1,000)',
				'Participation rate (percent)', 'Employment rate (percent)', 'Unemployment rate (percent)'
			),
			'math_array' => array (
				'Population (x 1,000)', 'Labour force (x 1,000)', 'Employment (x 1,000)',
				'Employment full-time (x 1,000)', 'Employment part-time (x 1,000)', 'Unemployment (x 1,000)'
			),
			'order' => 'CASE `characteristics` WHEN "Population (x 1,000)" THEN 1 
		WHEN "Labour force (x 1,000)" THEN 2 WHEN "Employment (x 1,000)" THEN 3 WHEN "Full-time employment (x 1,000)" 
		THEN 4 WHEN "Employment part-time (x 1,000)" THEN 5 WHEN "Unemployment (x 1,000)" THEN 6 WHEN 
		"Participation rate (percent)" THEN 7 WHEN "Employment rate (percent)" THEN 8 WHEN "Unemployment rate (percent)"
		THEN 9 END AS ord_results'

		);

		$dateObj   = DateTime::createFromFormat('!m', $startMonth);
		$monthName = $dateObj->format('F');

		$labour_force_statistics = array(
			'data' => $this->nbdata->getLabourForceStatistics($dataTable),
			'date' => $monthName . ' ' . $startYear);

		return $labour_force_statistics;
	}

	/**
	 * Start data includes Start Month, Start Year and Region. This information is used to create associated charts for
	 * the specified economic region and return the data sets to be assigned to a view. This controller returns an
	 * entire set of region or youth reports(trends and data table)
	 * @param $startData
	 * @return mixed
	 */
	public function generateRegionTableReportData($startData)
	{
		$startMonth = $startData['startMonth'];
		$startYear = $startData['startYear'];
		$region = $startData['region'];


		// for Year over year and last month to current month data table
		$mo = $startMonth - 1;
		if($mo == 0) {
			$mo = 12;
		}
		if($startMonth == 1) {
			$prevMonthYear = $startYear -1;
		} else {
			$prevMonthYear = $startYear;
		}
		$mo_pad = sprintf('%02d', $startMonth);

		$MM = $this->_monthToMonthArray($startData);
		$YY = $this->_yearToYearArray($startData);

		$dataTable = array (

			'startYear' => $startYear . '/' . $mo_pad,
			'prevyear' => ($startYear - 1) . '/' . $mo_pad,
			'prevmonth' =>  $prevMonthYear . '/' . sprintf( '%02d', $mo),
			'characteristics' => array (
				'Population (x 1,000)', 'Labour force (x 1,000)', 'Employment (x 1,000)',
				'Employment full-time (x 1,000)', 'Employment part-time (x 1,000)', 'Unemployment (x 1,000)',
				'Participation rate (percent)', 'Employment rate (percent)', 'Unemployment rate (percent)'
			),
			'math_array' => array (
				'Population (x 1,000)', 'Labour force (x 1,000)', 'Employment (x 1,000)',
				'Employment full-time (x 1,000)', 'Employment part-time (x 1,000)', 'Unemployment (x 1,000)'
			),
			'order' => 'CASE `characteristics` WHEN "Population (x 1,000)" THEN 1 
		WHEN "Labour force (x 1,000)" THEN 2 WHEN "Employment (x 1,000)" THEN 3 WHEN "Full-time employment (x 1,000)" 
		THEN 4 WHEN "Employment part-time (x 1,000)" THEN 5 WHEN "Unemployment (x 1,000)" THEN 6 WHEN 
		"Participation rate (percent)" THEN 7 WHEN "Employment rate (percent)" THEN 8 WHEN "Unemployment rate (percent)"
		THEN 9 END AS ord_results'

		);

		$regionDataTable = array (

			'startYear' => $startYear . '/' . $mo_pad,
			'prevyear' => ($startYear - 1) . '/' . $mo_pad,
			'prevmonth' =>  $prevMonthYear . '/' . sprintf( '%02d', $mo),
			'characteristics' => array (
				'Population (x 1,000)', 'Labour force (x 1,000)', 'Employment (x 1,000)',
				'Full-time employment (x 1,000)', 'Part-time employment (x 1,000)', 'Unemployment (x 1,000)',
				'Participation rate (percent)', 'Employment rate (percent)', 'Unemployment rate (percent)',
			),
			'math_array' => array (
				'Population (x 1,000)', 'Labour force (x 1,000)', 'Employment (x 1,000)',
				'Full-time employment (x 1,000)', 'Part-time employment (x 1,000)', 'Unemployment (x 1,000)'
			),
			'order' => 'CASE `characteristics` WHEN "Population (x 1,000)" THEN 1 
		WHEN "Labour force (x 1,000)" THEN 2 WHEN "Employment (x 1,000)" THEN 3 WHEN "Employment full-time (x 1,000)" 
		THEN 4 WHEN "Part-time employment (x 1,000)" THEN 5 WHEN "Unemployment (x 1,000)" THEN 6 WHEN 
		"Participation rate (percent)" THEN 7 WHEN "Employment rate (percent)" THEN 8 WHEN "Unemployment rate (percent)"
		THEN 9 END AS ord_results'
		);


		// Get name for month for table header
		$dateObj   = DateTime::createFromFormat('!m', $startMonth);
		$monthName = $dateObj->format('F');

		$regionDataTable['table'] = '02820122';
		switch ($region) {
			case 'Southeast Region':
				$regionDataTable['geography'] = $this->_returnGeographyByRegion($region);
				$data['se_lf_stats'] = array (
					'data' => $this->nbdata->getLabourForceStatistics($regionDataTable),
					'date' => $monthName . ' ' . $startYear,
					'title' => $region
				);
				$se_lf_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Labour force (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['se_lf_mm'] = $this->nbdata->getLabourForceData($se_lf_mm);
				$se_lf_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Labour force (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['se_lf_yy'] = $this->nbdata->getLabourForceData($se_lf_yy);
				$se_em_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Employment (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['se_em_mm'] = $this->nbdata->getLabourForceData($se_em_mm);
				$se_em_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Employment (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['se_em_yy'] = $this->nbdata->getLabourForceData($se_em_yy);
				$se_um_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Unemployment rate (percent)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['se_um_mm'] = $this->nbdata->getLabourForceData($se_um_mm);
				$se_um_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Unemployment rate (percent)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['se_um_yy'] = $this->nbdata->getLabourForceData($se_um_yy);
				break;

			case 'Southwest Region':
				$regionDataTable['geography'] = $this->_returnGeographyByRegion($region);
				$data['sw_lf_stats'] = array (
					'data' => $this->nbdata->getLabourForceStatistics($regionDataTable),
					'date' => $monthName . ' ' . $startYear,
					'title' => $region
				);
				$sw_lf_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Labour force (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['sw_lf_mm'] = $this->nbdata->getLabourForceData($sw_lf_mm);
				$sw_lf_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Labour force (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['sw_lf_yy'] = $this->nbdata->getLabourForceData($sw_lf_yy);
				$sw_em_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Employment (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['sw_em_mm'] = $this->nbdata->getLabourForceData($sw_em_mm);
				$sw_em_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Employment (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['sw_em_yy'] = $this->nbdata->getLabourForceData($sw_em_yy);
				$sw_um_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Unemployment rate (percent)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['sw_um_mm'] = $this->nbdata->getLabourForceData($sw_um_mm);
				$sw_um_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Unemployment rate (percent)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['sw_um_yy'] = $this->nbdata->getLabourForceData($sw_um_yy);
				break;

			case 'Central Region':
				$regionDataTable['geography'] = $this->_returnGeographyByRegion($region);
				$data['ce_lf_stats'] = array (
					'data' => $this->nbdata->getLabourForceStatistics($regionDataTable),
					'date' => $monthName . ' ' . $startYear,
					'title' => $region
				);
				$ce_lf_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Labour force (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['ce_lf_mm'] = $this->nbdata->getLabourForceData($ce_lf_mm);
				$ce_lf_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Labour force (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['ce_lf_yy'] = $this->nbdata->getLabourForceData($ce_lf_yy);
				$ce_em_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Employment (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['ce_em_mm'] = $this->nbdata->getLabourForceData($ce_em_mm);
				$ce_em_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Employment (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['ce_em_yy'] = $this->nbdata->getLabourForceData($ce_em_yy);
				$ce_um_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Unemployment rate (percent)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['ce_um_mm'] = $this->nbdata->getLabourForceData($ce_um_mm);
				$ce_um_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Unemployment rate (percent)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['ce_um_yy'] = $this->nbdata->getLabourForceData($ce_um_yy);
				break;

			case 'Northwest Region':
				$regionDataTable['geography'] = $this->_returnGeographyByRegion($region);
				$data['nw_lf_stats'] = array (
					'data' => $this->nbdata->getLabourForceStatistics($regionDataTable),
					'date' => $monthName . ' ' . $startYear,
					'title' => $region
				);
				$nw_lf_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Labour force (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['nw_lf_mm'] = $this->nbdata->getLabourForceData($nw_lf_mm);
				$nw_lf_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Labour force (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['nw_lf_yy'] = $this->nbdata->getLabourForceData($nw_lf_yy);
				$nw_em_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Employment (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['nw_em_mm'] = $this->nbdata->getLabourForceData($nw_em_mm);
				$nw_em_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Employment (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['nw_em_yy'] = $this->nbdata->getLabourForceData($nw_em_yy);
				$nw_um_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Unemployment rate (percent)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['nw_um_mm'] = $this->nbdata->getLabourForceData($nw_um_mm);
				$nw_um_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Unemployment rate (percent)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['nw_um_yy'] = $this->nbdata->getLabourForceData($nw_um_yy);
				break;

			case 'Northeast Region':
				$regionDataTable['geography'] = $this->_returnGeographyByRegion($region);
				$data['ne_lf_stats'] = array (
					'data' => $this->nbdata->getLabourForceStatistics($regionDataTable),
					'date' => $monthName . ' ' . $startYear,
					'title' => $region
				);
				$ne_lf_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Labour force (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['ne_lf_mm'] = $this->nbdata->getLabourForceData($ne_lf_mm);
				$ne_lf_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Labour force (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['ne_lf_yy'] = $this->nbdata->getLabourForceData($ne_lf_yy);
				$ne_em_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Employment (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['ne_em_mm'] = $this->nbdata->getLabourForceData($ne_em_mm);
				$ne_em_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Employment (x 1,000)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['ne_em_yy'] = $this->nbdata->getLabourForceData($ne_em_yy);
				$ne_um_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Unemployment rate (percent)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['ne_um_mm'] = $this->nbdata->getLabourForceData($ne_um_mm);
				$ne_um_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Unemployment rate (percent)',
					'table' => '02820122',
					'geography' => $this->_returnGeographyByRegion($region)
				);
				$data['ne_um_yy'] = $this->nbdata->getLabourForceData($ne_um_yy);
				break;

			case 'Youth':
				$dataTable['agegroup'] = '15 to 24 years';
				$dataTable['datatype'] = 'Unadjusted';
				$dataTable['charttype'] = 'Youth';
				$data['youth_stats'] = array (
					'data' => $this->nbdata->getLabourForceStatistics($dataTable),
					'date' => $monthName . ' ' . $startYear,
					'title' => $region
				);
				$yt_lf_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Labour force (x 1,000)',
					'geography' => $this->_returnGeographyByRegion($region),
					'agegroup' => '15 to 24 years',
					'datatype' => 'Unadjusted'

				);
				$data['yt_lf_mm'] = $this->nbdata->getLabourForceData($yt_lf_mm);
				$yt_lf_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Labour force (x 1,000)',
					'geography' => $this->_returnGeographyByRegion($region),
					'agegroup' => '15 to 24 years',
					'datatype' => 'Unadjusted'
				);
				$data['yt_lf_yy'] = $this->nbdata->getLabourForceData($yt_lf_yy);
				$yt_em_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Employment (x 1,000)',
					'geography' => $this->_returnGeographyByRegion($region),
					'agegroup' => '15 to 24 years',
					'datatype' => 'Unadjusted'
				);
				$data['yt_em_mm'] = $this->nbdata->getLabourForceData($yt_em_mm);
				$yt_em_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Employment (x 1,000)',
					'geography' => $this->_returnGeographyByRegion($region),
					'agegroup' => '15 to 24 years',
					'datatype' => 'Unadjusted'
				);
				$data['yt_em_yy'] = $this->nbdata->getLabourForceData($yt_em_yy);
				$yt_um_mm = array (
					'where_in' => $MM,
					'characteristics' => 'Unemployment rate (percent)',
					'geography' => $this->_returnGeographyByRegion($region),
					'agegroup' => '15 to 24 years',
					'datatype' => 'Unadjusted'
				);
				$data['yt_um_mm'] = $this->nbdata->getLabourForceData($yt_um_mm);
				$yt_um_yy = array (
					'where_in' => $YY,
					'characteristics' => 'Unemployment rate (percent)',
					'geography' => $this->_returnGeographyByRegion($region),
					'agegroup' => '15 to 24 years',
					'datatype' => 'Unadjusted'
				);
				$data['yt_um_yy'] = $this->nbdata->getLabourForceData($yt_um_yy);
				break;

		}
		return $data;
	}

	function monthCheck($num)
	{
		if($num > 12 || $num < 1) {
			$this->form_validation->set_message(
				'startMonth',
				'The %s field must be a valid month'
			);
			return FALSE;
		}
		else
		{
			return TRUE;
		}

	}

	private function _arrays($name)
	{
		$agegroups = array ('15 years and over' => '15 years and over', '15 to 64 years' => '15 to 64 years',
			'15 to 24 years' => '15 to 24 years', '15 to 19 years' =>'15 to 19 years',
			'20 to 24 years' => '20 to 24 years','25 years and over' => '25 years and over',
			'25 to 54 years' => '25 to 54 years', '55 years and over' => '55 years and over',
			'55 to 64 years' => '55 to 64 years');
		$sex = array ( 'Both sexes' => 'Both sexes', 'Males' => 'Males', 'Females' => 'Females');

		$stat_02820087 = array ('Estimate' => 'Estimate', 'Standard error of estimate' => 'Standard error of estimate',
			'Standard error of month-to-month change' => 'Standard error of month-to-month change',
			'Standard error of year-over-year change' => 'Standard error of year-over-year change');

		$dt_02820087 = array ('Seasonally adjusted' => 'Seasonally adjusted','Unadjusted' => 'Unadjusted',
			'Trend-cycle' => 'Trend-cycle');

		switch ($name) {
			case 'agegroups':
				return $agegroups;
				break;
			case 'sex':
				return $sex;
				break;
			case 'stat_02820087':
				return $stat_02820087;
				break;
			case 'dt_02820087':
				return $dt_02820087;
				break;
		}
	}

	private function _returnGeographyByRegion($region)
	{

		switch($region) {
			case 'Southeast Region':
				return 'Moncton-Richibucto, New Brunswick';
				break;
			case 'Southwest Region':
				return 'Saint John-St. Stephen, New Brunswick';
				break;
			case 'Central Region':
				return 'Fredericton-Oromocto, New Brunswick';
				break;
			case 'Northwest Region':
				return 'Edmundston-Woodstock, New Brunswick';
				break;
			case 'Northeast Region':
				return 'Campbellton-Miramichi, New Brunswick';
				break;
			case 'Youth':
				return 'New Brunswick';
		}
	}

	private function _monthToMonthArray($data)
	{
		$startMonth = $data['startMonth'];
		$startYear = $data['startYear'];

		// build 12 month array
		$MM = array();
		if ($startMonth <= 12 && $startMonth >= 1) {
			$month = $startMonth;
			$yr = $startYear;
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

		return $MM;
	}

	private function _yearToYearArray($data)
	{
		$startMonth = $data['startMonth'];
		$startYear = $data['startYear'];

		// build 10 year array
		$YY = array();
		if ($startMonth <= 12 && $startMonth >= 1) {
			$month = $startMonth;
			$yr = $startYear;
			for ($i = 0; $i <= 9; $i++) {
				$mo_padded = sprintf('%02d', $month);
				$YY[$i] = $yr . '/' . $mo_padded;
				$yr--;
			}
		}

		return $YY;
	}

	/**
	 * This function exists to create a selection of date arrays to use to build charts with. Each array serves a
	 * specific purpose as commented below. The multiple date formats are used to minimize the number of queries
	 * needed to produce the desired reports. All dates used are specifically used to match existing results from
	 * NBJobs.
	 * @param $data
	 * @return mixed
	 */
	private function _dateSelectionArray($data)
	{


		$startMonth = $data['startMonth'];
		$startYear = $data['startYear'];

		// dates for standard year over year chart selection. StartDate is always the date selected at input.
		// EndDate is always the startYear - 1. Exp: startdate: 2017/01, endDate 2016/01
		$dates['startDate'] = $startDate = $startYear . '/' .$startMonth;
		$dates['endDate'] = ((int)$startYear - 1) . '/' . $startMonth;

		// chrono_year is startDate and endDate in chonological order: startDate: 2016/01, endDate 2017/01
		//  This date array is used in the Unemployment Rate Year to Year and Participation Rate Year to Year
		// report.
		$dates['chrono_year'] = array (
			'startDate' => $dates['endDate'],
			'endDate' => $dates['startDate']
		);

		// reverse_mm_chrono is the date array for month to month comparison in reverse chronological order.
		// Entered year and month: 2017  01
		// Example: startDate: 2017/01 endDate: 2016/12.  This date array is used in the Participation Rate Month to
		// Month chart
		if($startMonth <= 12 && $startMonth > 1) {
			$mo = $startMonth - 1;

			$dates['reverse_mm_chrono'] = array(
				'startDate' => $startYear . '/' . $startMonth,
				'endDate' => $startYear . '/' . $mo
			);
		} elseif($startMonth == 1) {
			$mo = 12;
			$yr = $startYear - 1;

			$dates['reverse_mm_chrono'] = array(
				'startDate' => $startYear . '/' . $startMonth,
				'endDate' => $yr . '/' . $mo
			);
		}

		// mm_chrono is the date array for month to month comparison in standard chronological order.
		// Entered year and month 2017  01
		// Example: startDate: 2016/12, endDate: 2017/01. This date array is used in Unemployment Rate month to month
		// chart
		if($startMonth <= 12 && $startMonth > 1) {
			$mo = $startMonth - 1;

			$dates['mm_chrono'] = array(
				'startDate' => $startYear . '/' . $mo,
				'endDate' => $startYear . '/' . $startMonth
			);
		} elseif($startMonth == 1) {
			$mo = 12;
			$yr = $startYear - 1;

			$dates['mm_chrono'] = array(
				'startDate' => $yr . '/' . $mo,
				'endDate' => $startYear . '/' . $startMonth
			);
		}

		// rev_chrono_mm_offset is the date array for month to month comparison in reverse chronological order, offset
		// by one month. This is done specifically to match the desired results in the existing NBJobs reports.
		// Entered year and month 2017 01
		// Example result: startDate: 2017/01 endDate: 2016/12
		if($startMonth <= 12 && $startMonth > 1) {
			$mo = $startMonth - 1;

			$dates['rev_chrono_mm_offset'] = array(
				'startDate' => $startYear . '/' . $startMonth,
				'endDate' => $startYear . '/' . $mo,
				'characteristics' => 'Employment (x 1,000)',
				'datatype' => 'Seasonally adjusted'
			);
		} elseif($startMonth == 1) {
			$mo = 12;
			$yr = $startYear - 1;

			$dates['rev_chrono_mm_offset'] = array(
				'startDate' => $startYear . '/' . $startMonth,
				'endDate' => $yr . '/' . $mo,
				'characteristics' => 'Employment (x 1,000)',
				'datatype' => 'Seasonally adjusted'
			);
		}

		// ten_year_span is the date array for 10 year comparison chart. 
		$endYear = ((int)$startYear - 10) . '/' . $startMonth;
		$dates['ten_year_span'] = array(
			'startDate' => $startDate,
			'endDate' => $endYear
		);

		return $dates;
	}


}
