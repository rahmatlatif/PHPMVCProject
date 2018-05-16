<?php
ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\Community;
use classes\entity\User;
use classes\business\UserManager;
use classes\entity\Topic;
error_reporting(0);

$id = $_GET['id'];
$UM=new UserManager();
$community = $UM->getCommunityById($id);
$communityName = $community->communityName;
$topics = $UM->getAllTopics($communityName);

/*  if(isset($_REQUEST["submitted"])){
	$UM->saveApplication($user, $job);
	header("Location:/module5project/public/modules/user/jobapplied.php");  
 } */
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
					<h2><?php echo $community->communityName ?></h2>
					<p><?php echo $community->communityLanguage?></p>
					<br>
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
					foreach ((array)$topics as $topic) { 
						if($topic!=null){
					/*while($rows = mysql_fetch_array($result)){*/
					?>
							<tr>
							<td><?php echo $topic->topicId ?></td>
							<td><a href="view_topic.php?id=<?php echo $topic->topicId ?>&communityId=<?php echo $id ?>">
							<?php echo $topic->topicTopic; ?></a><BR></td>
							<td><?php echo $topic->topicViews; ?></td>
							<td><?php echo $topic->topicReplies; ?></td>
							<td><?php echo $topic->topicDateTime; ?></td>
							</tr>
							 
					<?php
					// Exit looping
						}
					}
					?>
					 
					<tr>
					<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="new_topic.php"><strong>Create New Topic</strong> </a></td>
					</tr>
					</table>
				</div>
			</div>
		</div>
		
	</div>
	<?php
include '../../includes/footer.php';
?>
	
   </body>
</html>