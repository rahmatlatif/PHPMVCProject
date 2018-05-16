<?php
ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\Community;
use classes\entity\User;
use classes\business\UserManager;

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="Leparkour951"; // Mysql password 
$db_name="phpcrudsample"; // Database name 
$tbl_name="`java developers`"; // Table name 

// Connect to server and select database
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT * FROM $tbl_name ORDER BY id DESC";
// OREDER BY id DESC is order result by descending

$result=mysql_query($sql);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Community Forum</title>
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
					<table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFA500">
					<tr>
					<td width="6%" align="center" bgcolor="#FFA500"><strong>#</strong></td>
					<td width="53%" align="center" bgcolor="#FFA500"><strong>Topic</strong></td>
					<td width="15%" align="center" bgcolor="#FFA500"><strong>Views</strong></td>
					<td width="13%" align="center" bgcolor="#FFA500"><strong>Replies</strong></td>
					<td width="13%" align="center" bgcolor="#FFA500"><strong>Date/Time</strong></td>
					</tr>
			 
					<?php
					 
					// Start looping table row
					while($rows = mysql_fetch_array($result)){
					?>
					<tr>
					<td bgcolor="#FFFFFF"><?php echo $rows['id']; ?></td>
					<td bgcolor="#FFFFFF"><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
					<td align="center" bgcolor="#FFFFFF"><?php echo $rows['view']; ?></td>
					<td align="center" bgcolor="#FFFFFF"><?php echo $rows['reply']; ?></td>
					<td align="center" bgcolor="#FFFFFF"><?php echo $rows['datetime']; ?></td>
					</tr>
					 
					<?php
					// Exit looping and close connection 
					}
					mysql_close();
					?>
					 
					<tr>
					<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="new_topic.php"><strong>Create New Topic</strong> </a></td>
					</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
   </body>
</html>
<?php
include '../../includes/footer.php';
?>


