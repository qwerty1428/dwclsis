<?php
include "core/init.php";
if(isset($_POST['submit'])|| !isset($_POST['password'])){
	$pass = $_POST['password'];
	$checkpass=mysql_query("SELECT * FROM quiz_group WHERE password='$pass'");
	 $countPass = mysql_numrows($checkpass);
	 if($countPass == 1){
	 	header("location:student_quiz.php");
	 	}else{
	 	$gid=$_SESSION['gropID'];
	 	$msg="Invalid Quiz Password";
	 	header("location:student_group_page.php?gid=$gid&&msg=$msg");
	 	}
	 	
	 	
	 }
?>