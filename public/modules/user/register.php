<?php
ob_start();
require_once '../../includes/autoload.php';
require_once '../../includes/header.php';


use classes\util\DBUtil;
use classes\business\UserManager;
use classes\entity\User;

$formerror="";

$firstName="";
$lastName="";
$email="";
$password="";

if(isset($_REQUEST["submitted"])){
    $firstName=$_REQUEST["firstName"];
    $lastName=$_REQUEST["lastName"];
    $email=$_REQUEST["email"];
    $password=$_REQUEST["password"];
    
    if($firstName!='' && $lastName!='' && $email!='' && $password!=''){
        $UM=new UserManager();
        $user=new User();
        $user->firstName=$firstName;
        $user->lastName=$lastName;
        $user->email=$email;
        $user->password=$password;
        
        $existuser=$UM->getUserByEmail($email);
    
        if(!isset($existuser)){
            // Save the Data to Database
            $UM->saveUser($user);
            header("Location:/module5project/public/modules/user/registerthankyou.php");
        }
        else{
            $formerror="User Already Exist";
        }
    }else{
        $formerror="Please fill in the fields";
    }
}

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
	<link href="/module5project/public/css/styleRegistration.css" type="text/css" rel="stylesheet"/>
  </head>
  
  <body>
	<div id="bodycontainer" class="container-fluid">
		<div class="center">
			<div id="fill" class="row"></div>
			<div id="homeheading" class="row row-centered">
				<div class="col-lg-10 col-lg-offset-1 text-center">
					<h1>Let's get started.</h1>
				</div>
			</div>
		</div>
	<div class="center">
		<div id="homeheading" class="row row-centered">
			<div class="col-lg-10 col-lg-offset-1 text-center">
				<form name="myForm" method="post">
					<div><?=$formerror?></div>
					<input class="textbox" type="text" placeholder="First name"  name="firstName" value="<?=$firstName?>" required> 
					<br><br> 
					<input class="textbox" type="text" placeholder="Last name" name="lastName" value="<?=$lastName?>" required> 
					<br><br> 
					<input class="textbox" type="text" placeholder="Password" name="password" value="<?=$password?>" required> 
					<br><br> 
					<input class="textbox" type="text" placeholder="Confirm Password" value="<?=$password?>" required> 
					<br><br> 
					<input class="textbox" type="text" placeholder="Email Address" name="email" value="<?=$email?>" required>
					<br>
					<input type="hidden" name="submitted" value="1"><input type="submit" class="myButton" name="submit" value="Submit">
					<input type="submit" name="clear" class="myButton" value="Clear Search" onclick="javascript:clearForm();">
				</form>
			</div>
		</div>
	</div>
	<?php
		require_once '../../includes/footer.php';
	?>
  </body>
</html>


