<?php
include "core/init.php";
if(isset($_POST['submit'])|| !isset($_POST['pwd'])){
	$msg="Password has been change!";
	mysql_query("UPDATE users SET password='".md5($_POST['pwd2'])."' WHERE user_id='".$user_data['user_id']."' ");
	header("location:profile.php?msg=$msg");
}
?>