<?php
include "core/init.php";
if(isset($_POST['submit'])|| !isset($_POST['password'])){
	$pass = $_POST['password'];
	$checkpass=mysql_query("SELECT * FROM tbl_group WHERE gpassword='$pass'");
	 $countPass = mysql_numrows($checkpass);
	 if($countPass == 1){
	 	while($row=mysql_fetch_assoc($checkpass)){
	 		$gid=$row['gid'];
	 	}
	 	$insStudent=mysql_query("INSERT INTO student_group(gid,sid)VALUES('$gid','".$user_data['user_id']."')");
	 	header("location:index.php");
	 }
}
?>