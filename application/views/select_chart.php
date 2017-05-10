<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Datamining</title>

	<style type="text/css">

		::selection { background-color: #E13300; color: white; }
		::-moz-selection { background-color: #E13300; color: white; }

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
	</style>
</head>
<body>

<div id="container">
	<h1>Charts</h1>

	<div id="body">

        <br>
		<?php echo form_open('Charts/getAllParticipationCharts') ;?>
        <p>Get All Participation Charts</p>
        <label for="startYear">Enter the year for reports (eg. 2016)</label>
        <input id="startYear" name="startYear" type="text" size="15"><br>
        <label for="startMonth">Enter the month in numberic format for reports (eg. 12 for December)</label>
        <input id="startMonth" name="startMonth" type="text" size="15"><br>

		<?php echo form_submit('Charts', 'Get Participation Charts!');?>
		<?php echo form_close();?>

        <br><br>

		<?php echo form_open('Charts/getLabourForceCharts') ;?>
        <p>Get All Labour Force Charts</p>
        <label for="startYear">Enter the year for reports (eg. 2016)</label>
        <input id="startYear" name="startYear" type="text" size="15"><br>
        <label for="startMonth">Enter the month in numberic format for reports (eg. 12 for December)</label>
        <input id="startMonth" name="startMonth" type="text" size="15"><br>

		<?php echo form_submit('Charts', 'Get Labour Force Charts!');?>
		<?php echo form_close();?>

        <br><br>

		<?php echo form_open('Charts/getFullReport') ;?>
        <p>Get Full Report</p>
        <label for="startYear">Enter the year for reports (eg. 2016)</label>
        <input id="startYear" name="startYear" type="text" size="15"><br>
        <label for="startMonth">Enter the month in numberic format for reports (eg. 12 for December)</label>
        <input id="startMonth" name="startMonth" type="text" size="15"><br>

		<?php echo form_submit('Charts', 'Get Full Report!');?>
		<?php echo form_close();?>

        <br><br>

		<?php echo form_open('Charts/getYouthParticipationCharts') ;?>
        <p>Get Youth Participation</p>
        <label for="startYear">Enter the year for reports (eg. 2016)</label>
        <input id="startYear" name="startYear" type="text" size="15"><br>
        <label for="startMonth">Enter the month in numberic format for reports (eg. 12 for December)</label>
        <input id="startMonth" name="startMonth" type="text" size="15"><br>

		<?php echo form_submit('Charts', 'Get Youth Participation Report!');?>
		<?php echo form_close();?>


    </div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>