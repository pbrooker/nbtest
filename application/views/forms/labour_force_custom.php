<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<script
		src="https://code.jquery.com/jquery-3.2.1.min.js"
		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link href="<?php print str_replace(array("http:","https:"),"",base_url('bower_components/font-awesome/css/font-awesome.min.css'));?>" rel="stylesheet" type="text/css" />
    <link href="<?php print str_replace(array("http:","https:"),"",base_url('assets/compass/main.css'));?>" rel="stylesheet" type="text/css" />

	<meta charset="utf-8">
	<title>Welcome to Datamining</title>

	<style type="text/css">


	</style>
</head>
<body>

<div id="container">

    <p>Create a custom Labour Force Charts</p>
	<?php echo form_open('Charts/generateCustomChart') ;?>
	<label for="startYear">Enter the year for reports (eg. 2016)</label>
	<input id="startYear" name="startYear" type="text" size="15"><br>
	<label for="startMonth">Enter the month in numberic format for reports (eg. 12 for December)</label>
	<input id="startMonth" name="startMonth" type="text" size="15"><br>
    <label for="agegroups">Select Agegroup</label>
    <?php echo form_dropdown('agegroup', $agegroups);  ?><br>
    <label for="agegroups">Select Sex</label>
	<?php echo form_dropdown('sex', $sex);  ?><br>

    <label for="agegroups">Select Statistics</label>
	<?php echo form_dropdown('stats', $stats);  ?><br>
    <label for="agegroups">Select Datatype</label>
	<?php echo form_dropdown('datatype', $datatype);  ?><br>
    <label for="agegroups">Select Geography</label>
	<?php echo form_dropdown('geography', $geography);  ?><br>
    <label for="agegroups">Select Characteristics</label>
	<?php echo form_dropdown('characteristics', $characteristics);  ?><br>


	<?php echo form_submit('Charts', 'Create Custom Charts!');?>
	<?php echo form_close();?>
</div>
</body>
</html>
