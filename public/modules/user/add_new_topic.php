<?php
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="Leparkour951"; // Mysql password 
$db_name="phpcrudsample"; // Database name 
$tbl_name="fquestions"; // Table name 
 
// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
 
// get data that sent from form 
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_POST['name'];
$email=$_POST['email'];

date_default_timezone_set('Asia/Singapore');
$datetime=date("d/m/y h:i:s"); //create date time
 
$sql="INSERT INTO $tbl_name(topic, detail, name, email, datetime)VALUES('$topic', '$detail', '$name', '$email', '$datetime')";
$result=mysql_query($sql);
 
if($result){
	header("Location: main_forum.php");
}
else {
echo "ERROR";
}
mysql_close();
?>