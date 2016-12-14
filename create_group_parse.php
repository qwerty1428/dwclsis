<?php
include "core/init.php";

if(isset($_POST['save'])){
	$gname=$_POST['group_name'];
	$gpassword=$_POST['password'];
	$time = time();
	$result = mysql_query("INSERT INTO tbl_group(gname,gpassword,date_created) VALUES ('$gname','$gpassword','$time') ") or die(mysql_error());
	header("location:group_index.php");
}

?>