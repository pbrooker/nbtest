<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Datamining</title>

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
</head>
<body>

<div class="container">
	<h1>Welcome to Datamining!</h1>

	<div id="body">
        <?php echo form_open('Datagathering/downloadZipFile') ;?>
		<p>Click to initiate the Curl call</p>

		<?php echo form_submit('Datagathering', 'Get that data!');?>
        <?php echo form_close();?>

		<p>Data will be gathered from the targeted resources</p>
		<p>If you want to do something else, why not try a chart? :-)</p>
        <a href="<?= base_url('Charts/selectChart/');?>" class="btn btn-success">Charts</a>
        <a href="<?= base_url('Charts/lmiPrimaryPage');?>" class="btn btn-success">LMI Main</a>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>