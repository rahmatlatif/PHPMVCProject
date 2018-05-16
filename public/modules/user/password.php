<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\PHP\includes\PHPMailer-master\src\Exception.php';
require 'C:\PHP\includes\PHPMailer-master\src\PHPMailer.php';
require 'C:\PHP\includes\PHPMailer-master\src\SMTP.php';
if (isset($_POST['submit']))
{

// check for valid email address
$email = $_POST['remail'];
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     $error[] = 'Please enter a valid email address';
}

// checks if the username is in use
$check = mysql_query("SELECT email FROM tb_user WHERE email = '$email'")or die(mysql_error());
$check2 = mysql_num_rows($check);

//if the name exists it gives an error
if ($check2 == 0) {
$error[] = 'Sorry, we cannot find your account details please try another email address.';
}

// if no errors then carry on
if (!$error) {

$query = mysql_query("SELECT firstname FROM tb_user WHERE email = '$email' ")or die (mysql_error());
$r = mysql_fetch_object($query);

//create a new random password

$password = substr(md5(uniqid(rand(),1)),3,10);

//send email
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
$mail->AltBody = "This is the plain text version of the email content";

//update database
$sql = mysql_query("UPDATE members SET password='$password' WHERE email = '$email'")or die (mysql_error());
$rsent = true;


}// close errors
}// close if form sent

//show any errors
if (!empty($error))
{
        $i = 0;
        while ($i < count($error)){
        echo "<div class='msg-error'>".$error[$i]."</div>";
        $i ++;}
}// close if empty errors


if ($rsent == true){
    echo "<p>You have been sent an email with your account details to $email</p>n";
    } else {
    echo "<p>Please enter your e-mail address. You will receive a new password via e-mail.</p>n";
    }

?>

<form action="" method="post">
<p>Email Address: <input type="text" name="remail" size="50" maxlength="255">
<input type="submit" name="submit" value="Get New Password"></p>
</form>