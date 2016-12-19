<?php 
include 'core/init.php';

if(isset($_POST['submit'])){
	$register = mysql_query("INSERT INTO users(first_name, last_name, username,password,active,access) VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['username']."','".md5($_POST['password'])."','1','".$_POST['type']."')");
	header("location:login-form.php");
}

?>