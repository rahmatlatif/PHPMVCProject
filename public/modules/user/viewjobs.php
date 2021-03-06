<?php
	include '../../includes/security.php';
	include '../../includes/header.php';
	use classes\business\UserManager;
	use classes\entity\User;
	use classes\entity\Job;
	ob_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>View Jobs</title>
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
	 <script>
	function myfunction(clicked_id) {
		var id = clicked_id;
		window.location = "/module5project/public/modules/user/jobad.php?jobid=" + id;
	};
</script>
  </head>
  <body>
	<div id="bodycontainer" class="container-fluid">
		<div id="contentbody" class="col-lg-8 col-lg-offset-2 text-center">
			<h1>Available Jobs</h1>
			<br>
			<?php 
				$UM=new UserManager();
				$jobs=$UM->getAllJobs();
				$total=count($jobs);
				if(isset($jobs)){
					?>
					<table  style="background-color:orange;" width="800" border="1">
							<tr>
							   <td><b>Id</b></td>
							   <td><b>Job Title</b></td>
							   <td><b>Job Expiry</b></td>
							   <td><b>Job Requirement</b></td>
							</tr>    
					<?php 
					foreach ($jobs as $job) {
						if($job!=null){
							?>
							<tr>
							   <td><?=$job->jobId?></td>
							   <td><?=$job->jobTitle?></td>
							   <td><?=$job->jobExpiry?></td>
							   <td><?=$job->jobRequirement?></td>
							   <td>
							   <button id=<?php echo "'".$job->jobId."'"?> onclick="myfunction(this.id)">View</button>
							   </td>     
							</tr>
							<?php 
						}
					}
					?>
					</table><br/><br/>
					<?php 
				}
				?>
		</div>
	</div> 
  </body>
</html>
<?php
include '../../includes/footer.php';
?>