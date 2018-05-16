<?php
include '../../includes/header.php';
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
	<link href="/module5project/public/css/styleRegistration.css" type="text/css" rel="stylesheet"/>
  </head>
  <body>
	<div id="bodycontainer" class="container-fluid">
		<div class="center">
			<div id="fill" class="row"></div>
			<div id="homeheading" class="row row-centered">
				<div class="col-lg-10 col-lg-offset-1 text-center">
					<h2>Reset Password</h2>
				</div>
			</div>
		</div>
			 
		<div class="center">
			<div class="row">
				<div id="registerbutton" class="col-lg-4 col-lg-offset-4 text-center">
					<form action="sendmail.php" method="post">
						<p>Email Address: <input type="text" name="remail" size="50" maxlength="255">
						<br>
						<input type="submit" name="submit" class="myButton" value="Get New Password"></p>
					</form>
				</div>
			</div>
		</div>
		
	</div>
	
   </body>
</html>

<?php
include '../../includes/footer.php';
?>
