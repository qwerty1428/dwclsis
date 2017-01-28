<?php 
include 'core/init.php';

if(isset($_POST['submit'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['usname'];
	$pwd = md5($_POST['pwd2']);
	$update = mysql_query("UPDATE users SET first_name='$fname', last_name='$lname',username='$uname',password='$pwd' WHERE user_id='$session_user_id'");
	header("location:update_profile.php");
}

?>