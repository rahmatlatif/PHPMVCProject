<?php
ob_start();
include '../../includes/security.php';
include '../../includes/header.php';
use classes\entity\Job;
use classes\entity\Community;
use classes\entity\User;
use classes\business\UserManager;
use classes\entity\Topic;
use classes\entity\Thread;

$id = $user->id;
$UM=new UserManager();
$threads = $UM->getAllThreads($id);
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
					<h2>Inbox</h2>
					<br>
					<table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFA500">
					<tr>
					<td width="6%" align="center" bgcolor="#FFA500"><strong>#</strong></td>
					<td width="53%" align="center" bgcolor="#FFA500"><strong>Subject</strong></td>
					<td width="15%" align="center" bgcolor="#FFA500"><strong>From</strong></td>
					<td width="13%" align="center" bgcolor="#FFA500"><strong>Date/Time</strong></td>
					</tr>
			 
					<?php
					 
					// Start looping table row
					foreach ((array)$threads as $thread) { 
						if($thread!=null){
					/*while($rows = mysql_fetch_array($result)){*/
					?>
							<tr>
							<td><?php echo $thread->subjectId ?></td>
							<td><a href="view_thread.php?id=<?php echo $thread->subjectId ?>&userFromId=<?php echo $thread->userFrom ?>">
							<?php echo $thread->subject; ?></a><BR></td>
							<td><?php 
							$user_from_id = $thread->userFrom;
							$user_from = $UM->getUserById($user_from_id);
							echo $user_from->firstName; ?></td>
							<td><?php echo $thread->threadDate; ?></td>
							</tr>
							 
					<?php
					// Exit looping
						}
					}
					?>
					 
					<tr>
					<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="new_topic.php"><strong>Compose New Message</strong> </a></td>
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