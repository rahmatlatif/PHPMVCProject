<?php
require_once '../../includes/header.php';
?>

<html>
  <head>
    <title>Registration</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
	<script src="resources/scripts/jquery-1.7.1.min.js"></script>
    <script src="resources/scripts/jquery-ui-1.8.10.custom.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="/module5project/public/css/styleThankyou.css" type="text/css" rel="stylesheet"/>
  </head>
  <body>
	<div id="bodycontainer" class="container-fluid">
		<div class="center">
			<div id="fill" class="row"></div>
			<div id="homeheading" class="row row-centered">
				<div class="col-lg-10 text-center">
					<h1>Hello,</h1>
					<h3>You're only one step from being able to log into our website! Simply click on the link below to confirm your account!</h3>
				</div>
			</div>
		</div>

		<div class="center">
			<div id="homeheading" class="row row-centered">
				<div class="col-lg-10 text-center">
				<a href="../../login.php" class="myButton">Begin a world of possibilities</a>
				</div>
			</div>
		</div>
		
	<?php
		require_once '../../includes/footer.php';
	?>
	
   </body>
</html>