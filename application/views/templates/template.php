<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable = no">
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<title>
		<?php
		if ($custom_title){
			echo $custom_title;
		} else {
			$domain = str_replace("www.","",$_SERVER['SERVER_NAME']);
			echo ucfirst($domain) . " - " . $title;
		}
		?>
	</title>
    <script src="<?= base_url('assets/js/app.min.js');?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/js/jquery.combined.min.js');?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/css/bootstrap.min.css');?>" type="text/css"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>


	<?php if ($head) :?>
		<?= $head;?>
	<?php endif;?>

<body>


	<?php print $content ?>



</body>
</html>