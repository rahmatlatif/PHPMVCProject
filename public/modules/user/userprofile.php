<?php
ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\User;
use classes\business\UserManager;
$id = $_GET['id'];
$UM=new UserManager();
$user = $UM->getUserById($id);

 if(isset($_REQUEST["submitted"])){
	$UM->saveApplication($user, $job);
	header("Location:/module5project/public/modules/user/jobapplied.php"); 
 }
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
			 
		<div  class="center">
			<div class="row">
				<div style="background-color:orange; width:60%; margin-top: 50px;" class="col-lg-8 col-lg-offset-2 text-center">
					<h2><?php echo $user->firstName ." ". $user->lastName?></h2>
					<!--<h3>Job Description</h3>-->
					<p><?php echo $user->email?>
					</p>
					<br>
					<!--<h3>Job Requirement</h3>
					<p></p>
					<h4>Expiry</h4>
					<p></p>
					<br>
					<form name="myForm" method="post">
					<input type="hidden" name="submitted" value="1"><input type="submit" class="myButton" name="submit" value="Apply">
					</form>-->
				</div>
			</div>
		</div>
		
	</div>
	<?php
include '../../includes/footer.php';
?>
	
   </body>
</html>