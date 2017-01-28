<?php 
include "core/init.php";
$qname=$_POST['quiz_name'];
$group=$_POST['group'];
$quarter=$_POST['qtr'];
$pass=$_POST['password'];
$time= time();

if(isset($_POST['create'])){

	$createquiz = mysql_query("INSERT INTO quiz_group(name,gid,qtr,password,posted_by,date_created)VALUES('$qname','$group','$quarter','$pass','".$user_data['user_id']."',now())");
	$lastqgid=mysql_insert_id();
	$_SESSION['qgroup']=$lastqgid;
	header('location:create_quiz_question.php');
}

?>