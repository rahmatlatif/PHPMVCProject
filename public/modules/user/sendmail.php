<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use classes\business\UserManager;

require 'C:\PHP\includes\PHPMailer-master\src\Exception.php';
require 'C:\PHP\includes\PHPMailer-master\src\PHPMailer.php';
require 'C:\PHP\includes\PHPMailer-master\src\SMTP.php';
require 'C:\Program Files (x86)\Apache Software Foundation\Apache2.2\htdocs\module5project\classes\business\UserManager.php';
require 'C:\Program Files (x86)\Apache Software Foundation\Apache2.2\htdocs\module5project\classes\data\UserManagerDB.php';
require 'C:\Program Files (x86)\Apache Software Foundation\Apache2.2\htdocs\module5project\classes\entity\User.php';
require 'C:\Program Files (x86)\Apache Software Foundation\Apache2.2\htdocs\module5project\classes\util\DBUtil.php';
require 'C:\Program Files (x86)\Apache Software Foundation\Apache2.2\htdocs\module5project\classes\util\Config.php';
/* mysql_connect("localhost", "root", "Leparkour951") or die("Error connecting to database: ".mysql_error());
     
mysql_select_db("phpcrudsample") or die(mysql_error());
$rsent = false; */

if (isset($_POST['submit']))
{

$email = $_POST['remail'];
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     $error[] = 'Please enter a valid email address';
}
$UM=new UserManager();
$user=$UM->getUserByEmail($email);
// checks if the username is in use
/* $check = mysql_query("SELECT email FROM tb_user WHERE email = '$email'")or die(mysql_error());
$check2 = mysql_num_rows($check); */

//if the name exists it gives an error
/* if ($check2 == 0) {
$error[] = 'Sorry, we cannot find your account details please try another email address.';
} else { */

/* $query = mysql_query("SELECT firstname FROM tb_user WHERE email = '$email' ")or die (mysql_error());
$r = mysql_fetch_object($query); */

//create a new random password

$password = substr(md5(uniqid(rand(),1)),3,10);

/* //send email
$mail = new PHPMailer;
//Enable SMTP debugging.
$mail->SMTPDebug = 0;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "abclearnctr@gmail.com";
$mail->Password = "RahmatYasin";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = 587;
$mail->From = "abclearnctr@gmail.com";
$mail->FromName = "ABC Learning Centre Admin";
$mail->addAddress("$email");
$mail->isHTML(true);
$mail->Subject = "Account Details Recovery";
$mail->Body = "<p>Hi $r->firstname, you or someone else have requested your account details. Here is your account information please keep this as you may need this at a later stage. Your password is $password Your password has been reset please login and change your password to something more rememberable. Regards Site Admin</p>";
$mail->AltBody = "This is the plain text version of the email content"; */
$UM->sendMail($email, $password);

//update database
$UM->updatePassword($email, $password);
/* $sql = mysql_query("UPDATE tb_user SET password='$password' WHERE email = '$email'")or die (mysql_error()); */
//$rsent = true;

//}
// close errors
// close if form sent

//show any errors
/* if (!empty($error))
{
        $i = 0;
        while ($i < count($error)){
        echo "<div class='msg-error'>".$error[$i]."</div>";
$i ++;}
} */
// close if empty errors

/* $mail->send(); */
}
?>

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
					<h2>Success</h2>
				</div>
			</div>
		</div>
			 
		<div class="center">
			<div class="row">
				<div id="registerbutton" class="col-lg-4 col-lg-offset-4 text-center">
					<p>You have successfully reset password. Please log in with the new password sent to your email.</p>
					<a href="/module5project/public/login.php" class="myButton">Return to Login</a>
				</div>
			</div>
		</div>
		
	</div>
	
   </body>
</html>

<?php
include '../../includes/footer.php';
?>