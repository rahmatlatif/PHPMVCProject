<?php
ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\Community;
use classes\entity\User;
use classes\entity\Answer;
use classes\business\UserManager;
use classes\entity\Message;


$subjectId = $_GET['id'];
$userToId = $user->id;
$userFromId = $_GET['userFromId'];
$UM=new UserManager();
$messages = $UM->getAllMessages($subjectId, $userToId, $userFromId);
?>
<!-- NEED TO CLEAN UP USERTO AND USERFROM MIX UP -->
<!DOCTYPE html>
<html>
  <head>
    <title>View Message</title>
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
		<div class="center">
			<div class="row">
				<div id="registerbutton" class="col-lg-8 col-lg-offset-2 text-center">
 
<?php

foreach($messages as $message) {
	if($message!=null){
?>
 
<table width="400" border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="1" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="18%" bgcolor="#FFA500"><strong>From</strong></td>
<td width="5%" bgcolor="#FFA500">:</td>
<td width="77%" bgcolor="#FFA500"><?php echo $message->userFrom; ?></td>
</tr>
<tr>
<td bgcolor="#FFA500"><strong>To</strong></td>
<td bgcolor="#FFA500">:</td>
<td bgcolor="#FFA500"><?php echo $message->userFrom; ?></td>
</tr>
<tr>
<td bgcolor="#FFA500"><strong>Message</strong></td>
<td bgcolor="#FFA500">:</td>
<td bgcolor="#FFA500"><?php echo $message->messageBody; ?></td>
</tr>
<tr>
<td bgcolor="#FFA500"><strong>Date</strong></td>
<td bgcolor="#FFA500">:</td>
<td bgcolor="#FFA500"><?php echo $message->messageDate; ?></td>
</tr>
</table></td>
</tr>
</table><br>
 
<?php
	}
}
?>
 
<BR>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form2" method="post" action="reply.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td valign="top"><strong>Message</strong></td>
<td valign="top">:</td>
<td><textarea name="a_message" cols="45" rows="3" id="a_message"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="userFromId" type="hidden" value="<?php echo $userFromId; ?>"></td>
<td><input name="subjectId" type="hidden" value="<?php echo $subjectId; ?>"></td>
<td><input name="userToId" type="hidden" value="<?php echo $userToId; ?>"></td>
<td><input type="submit" name="Submit" value="Submit"> 
<input type="reset" name="Submit2" value="Reset"></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</div>
			</div>
		</div>
	</div>