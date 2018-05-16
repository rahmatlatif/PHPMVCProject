<?php
ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\Community;
use classes\entity\User;
use classes\entity\Answer;
use classes\business\UserManager;


$id = $_GET['id'];
$communityId = $_GET['communityId'];
$UM=new UserManager();
$community = $UM->getCommunityById($communityId);
$communityName = $community->communityName;
$topic = $UM->getTopicById($communityName,$id);

/* $id=$_GET['id'];
$sql="SELECT * FROM $tbl_name WHERE id='$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result); */
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
							<td><table width="100%" border="1" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
								<tr>
									<td bgcolor="#FFA500" border="1"><strong><?php echo $topic->topicTopic; ?></strong></td>
								</tr>
								 
								<tr>
									<td bgcolor="#FFA500" border="1"><?php echo $topic->topicDetail; ?></td>
								</tr>
								 
								<tr>
									<td bgcolor="#FFA500" border="1"><strong>By :</strong> <?php echo $topic->topicCreator; ?> <strong>Email : </strong><?php echo $topic->topicCreatorEmail;?></td>
								</tr>
								 
								<tr>
									<td bgcolor="#FFA500" border="1"><strong>Date/time : </strong><?php echo $topic->topicDateTime; ?></td>
								</tr>
							</table></td>
						</tr>
					</table>
<BR>
 
<?php
$answerName = $communityName.'answer';
$answers=$UM->getAnswerById($answerName,$id);
/* $tbl_name2="fanswer"; // Switch to table "forum_answer"
$sql2="SELECT * FROM $tbl_name2 WHERE question_id='$id'";
$result2=mysql_query($sql2); */
foreach($answers as $answer) {
	if($answer!=null){
?>
 
<table width="400" border="1" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="1" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td bgcolor="#FFA500"><strong>ID</strong></td>
<td bgcolor="#FFA500">:</td>
<td bgcolor="#FFA500"><?php echo $answer->answerId; ?></td>
</tr>
<tr>
<td width="18%" bgcolor="#FFA500"><strong>Name</strong></td>
<td width="5%" bgcolor="#FFA500">:</td>
<td width="77%" bgcolor="#FFA500"><?php echo $answer->answerName; ?></td>
</tr>
<tr>
<td bgcolor="#FFA500"><strong>Email</strong></td>
<td bgcolor="#FFA500">:</td>
<td bgcolor="#FFA500"><?php echo $answer->answerEmail; ?></td>
</tr>
<tr>
<td bgcolor="#FFA500"><strong>Answer</strong></td>
<td bgcolor="#FFA500">:</td>
<td bgcolor="#FFA500"><?php echo $answer->answerAnswer; ?></td>
</tr>
<tr>
<td bgcolor="#FFA500"><strong>Date/Time</strong></td>
<td bgcolor="#FFA500">:</td>
<td bgcolor="#FFA500"><?php echo $answer->answerDateTime; ?></td>
</tr>
</table></td>
</tr>
</table><br>
 
<?php
	}
}
/* $host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="Leparkour951"; // Mysql password 
$db_name="phpcrudsample"; // Database name 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB"); */

$UM->updateViews($communityName,$id);
/*$sql3="SELECT view FROM $communityName WHERE id='$id'";
$result3=mysql_query($sql3);
$rows=mysql_fetch_array($result3);
$view=$rows['view'];
 
// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$sql4="INSERT INTO $communityName(view) VALUES('$view') WHERE id='$id'";
$result4=mysql_query($sql4);
}
 
// count more value
$addview=$view+1;
$sql5="update $communityName set view='$addview' WHERE id='$id'";
$result5=mysql_query($sql5);
mysql_close(); */ 
?>
 
<BR>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="add_answer.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr >
<td width="18%"><strong>Name</strong></td>
<td width="3%">:</td>
<td width="79%"><input name="a_name" type="text" id="a_name" size="45"></td>
</tr>
<tr>
<td><strong>Email</strong></td>
<td>:</td>
<td><input name="a_email" type="text" id="a_email" size="45"></td>
</tr>
<tr>
<td valign="top"><strong>Answer</strong></td>
<td valign="top">:</td>
<td><textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
<td><input name="answerName" type="hidden" value="<?php echo $answerName; ?>"></td>
<td><input name="communityId" type="hidden" value="<?php echo $communityId; ?>"></td>
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