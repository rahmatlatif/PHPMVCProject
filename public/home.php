<?php
include 'includes/security.php';
include 'includes/header.php';
ob_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Homepage</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
	<script src="resources/scripts/jquery-1.7.1.min.js"></script>
    <script src="resources/scripts/jquery-ui-1.8.10.custom.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="/module5project/public/css/style.css" type="text/css" rel="stylesheet"/>
  </head>
  <body>
	<div id="bodycontainer" class="container-fluid">
		<!--<h1>Welcome.</h1>-->	 
	<div class="row" style="margin-top: 50px;">
		<div class="col-md-1 offset-md-2">
			<img src="/module5project/public/images/profilepic.jpg" height="120px">
		</div>
		<div class="col-md-8 offset-md-4">
			<h1><?php echo $user->firstName . ' ' . $user->lastName; ?></h1>
		</div>
	</div> 
	</div>
  </body>
</html>
<?php
include 'includes/footer.php';
?>
