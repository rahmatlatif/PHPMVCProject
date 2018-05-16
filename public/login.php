<?php
use classes\business\UserManager;

require_once 'includes/autoload.php';

$formerror="";

$email="";
$password="";
if(isset($_REQUEST["submitted"])){
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];

    $UM=new UserManager();

    $existuser=$UM->getUserByEmailPassword($email,$password);
    if(isset($existuser)){
		session_start();
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user'] = serialize($existuser);
        header("Location:home.php");
    }else{
        $formerror="Invalid User Name or Password";
    }
}

?>

<!DOCTYPE html>
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
	<link href="/module5project/public/css/styleLogin.css" type="text/css" rel="stylesheet"/>
  </head>
  <body>
	<div id="bodycontainer" class="container-fluid">
		<div class="center">
			<div id="fill" class="row"></div>
			<div id="homeheading" class="row row-centered">
				<div class="col-lg-10 col-lg-offset-1 text-center">
					<h1>Welcome.</h1>
				</div>
			</div>
		</div>

		<div class="center">
			<div id="homeheading" class="row row-centered">
				<div class="col-lg-10 col-lg-offset-1 text-center">
					<div><?=$formerror?></div>
						<form name="myForm" method="post">
							<input class="textbox" input type="text" name="email" value="<?=$email?>" placeholder="Email" required>
							<br><br>
							<input class="textbox" type="password" name="password" value="<?=$password?>" placeholder="Password" required>
							<br><br>
							<input type="hidden" name="submitted" value="1"><input type="submit" name="submit" class="myButton" value="Submit">
							<input type="submit" name="clear" value="Clear Search" class="myButton" onclick="javascript:clearForm();">
							<br>
							<h6><a href="/module5project/public/modules/user/forgetpassword.php">Forgot your password?</a>
							<br>
							<a href="modules/user/register.php">Register Now</a>
						</form>
				</div>
			</div>
		</div>

	<?php
		include 'includes/footer.php';
	?>

   </body>
</html>
