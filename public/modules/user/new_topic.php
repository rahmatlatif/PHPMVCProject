<?php
ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\Community;
use classes\entity\User;
use classes\business\UserManager;
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
					<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
						<tr>
							<form id="form1" name="form1" method="post" action="add_new_topic.php">
								<td>
									<table width="100%" border="1" cellpadding="3" cellspacing="1" bgcolor="#f2bf61">
										<tr bgcolor="#f2bf61">
											<td colspan="3" bgcolor="#FFA500"><strong>Create New Topic</strong> </td>
										</tr>
										<tr bgcolor="#f2bf61">
											<td width="14%"><strong>Topic</strong></td>
											<td width="2%">:</td>
											<td width="84%"><input name="topic" type="text" id="topic" size="50" /></td>
										</tr>
										<tr bgcolor="#f2bf61">
											<td valign="top"><strong>Detail</strong></td>
											<td valign="top">:</td>
											<td><textarea name="detail" cols="50" rows="3" id="detail"></textarea></td>
										</tr>
										<tr bgcolor="#f2bf61">
											<td><strong>Name</strong></td>
											<td>:</td>
											<td><input name="name" type="text" id="name" size="50" /></td>
										</tr>
										<tr bgcolor="#f2bf61">
											<td><strong>Email</strong></td>
											<td>:</td>
											<td><input name="email" type="text" id="email" size="50" /></td>
										</tr>
										<tr bgcolor="#f2bf61">
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td><input type="submit" name="Submit" value="Submit" /> 
											<input type="reset" name="Submit2" value="Reset" /></td>
										</tr>
									</table>
								</td>
							</form>
						</tr>
					</table>
 </body>
</html>
<?php
include '../../includes/footer.php';
?>