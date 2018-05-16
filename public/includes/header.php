<?php
//include 'includes/security.php';
include 'C:\Program Files (x86)\Apache Software Foundation\Apache2.2\htdocs\module5project\public\includes\security.php';
 
use classes\util\DBUtil;
use classes\business\UserManagerDB;
use classes\business\UserManager;
use classes\entity\User;

ob_start();
?>
 
<!DOCTYPE html>
<html>
	<head>
		<title>ABC Learning Centre</title>
	</head>
	<body>
	<div id="header" class="container-fluid">
		<div class="row">
			<div class="col-lg-1">
				<img src="/module5project/public/images/logo.jpg" height="46" width="55" />
			</div>
            <div class="col-lg-2">
				<?php if ($user->is_admin == 1){ ?>
					<table cellspacing="10">
						<tr>
							<td><a href="/module5project/public/home.php">Home</a></td>
							<td><a href="/module5project/public/modules/user/updateprofile.php">Update Profile</a></td>
							<td><a href="/module5project/public/modules/user/userlist.php">Users</a></td>
							<td><a href="/module5project/public/modules/user/searchusers.php">Search Users</a></td>
							<td><a href="/module5project/public/modules/user/viewjobs.php">Jobs</a></td>
							<td><a href="/module5project/public/modules/user/searchjob.php">Search Jobs</a></td>
							<td><a href="/module5project/public/modules/user/community.php">Communities</a></td>
							<td><a href="/module5project/public/modules/user/searchcommunity.php">Search Communities</a></td>
							<td><a href="/module5project/public/modules/user/inbox.php">Inbox</a></td>
							<td><a href="/module5project/public/logout.php">Logout</a></td>
						</tr>
					</table>
                <?php } else { ?>
					<table cellspacing="10">
						<tr>
							<td><a href="/module5project/public/home.php">Home</a></td>
							<td><a href="/module5project/public/modules/user/updateprofile.php">Update Profile</a></td>
							<td><a href="/module5project/public/modules/user/userlist.php">View Users</a></td>
							<td><a href="/module5project/public/modules/user/searchusers.php">Search Users</a> &nbsp;</td>
							<td><a href="/module5project/public/logout.php">Logout</a></td>
						</tr>
					</table>
				<?php } ?>
        </div>
    </div>
</div>
</body>
     
     
</html>