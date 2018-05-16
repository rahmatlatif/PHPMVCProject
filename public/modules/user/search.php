<?php
	require_once '../../includes/autoload.php';

	use classes\business\UserManager;
	use classes\entity\User;

	ob_start();
	include '../../includes/security.php';
	include '../../includes/header.php';
	$query = $_GET['query'];
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
	<script>
	function myfunction(clicked_id) {
		var id = clicked_id;
		window.location = "/module5project/public/modules/user/userprofile.php?id=" + id;
	};
</script>
  </head>
  <body>
	<div id="bodycontainer" class="container-fluid">
		<div class="center">
			<div id="fill" class="row"></div>
			<div id="homeheading" class="row row-centered">
				<div class="col-lg-10 col-lg-offset-1 text-center">
					<h2>Search Results</h2>
				</div>
			</div>
		</div>
			 
		<div class="center">
			<div class="row">
				<div id="registerbutton" class="col-lg-8 col-lg-offset-2 text-center">
				<?php
					$UM=new UserManager();
					$users=$UM->searchUsers($query);
				 ?> 
						<table  style="background-color:orange;" width="800" border="1">
							<tr>
							   <td><b>Id</b></td>
							   <td><b>First Name</b></td>
							   <td><b>Last Name</b></td>
							   <td><b>Email</b></td>
							</tr>
					<?php 
					foreach ((array)$users as $user) {
						if($user!=null){
							?>
							<tr>
							   <td><?=$user->id?></td>
							   <td><?=$user->firstName?></td>
							   <td><?=$user->lastName?></td>
							   <td><?=$user->email?></td>
							   <td>
							   <button id=<?php echo "'".$user->id."'"?> onclick="myfunction(this.id)">View</button>
							   </td> 
							</tr>
							<?php 
						}
					}
					?>
					</table><br/><br/>
					<?php  
				//} else { 
					//echo "No results";
				//}
				?> 
				</div>
			</div>
		</div>
		
	</div>
	
   </body>
</html>

<?php
include '../../includes/footer.php';
?>