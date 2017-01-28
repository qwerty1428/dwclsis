<?php 
include "core/init.php";
echo $_POST['lessonid'];

if($_POST['lessonid'] ==""){
$result = mysql_query("INSERT INTO tbl_lessons (title,content,posted_by,date_posted,qtr,gid) VALUES ('".$_POST['title']."','".$_POST['contentbox']."','".$user_data['user_id']."',now(),'".$_POST['qtr']."','".$_POST['group']."') ");
		header("location:lesson_index.php");	
}else{
	$result = mysql_query("UPDATE tbl_lessons SET title = '".$_POST['title']."',content='".$_POST['contentbox']."',date_posted=now(), qtr =' ".$_POST['qtr']."', gid='".$_POST['group']."' WHERE id='".$_POST['lessonid']."' ");
		header("location:add_lesson.php?id=".$_POST['lessonid']."");
}
/*
if(isset($_POST['lessonid']) != ''){
	$result = mysql_query("UPDATE tbl_lessons SET title = '".$_POST['title']."',content='".$_POST['contentbox']."',date_posted='".time()."', qtr =' ".$_POST['qtr']."' WHERE id='".$_POST['lessonid']."' ");
		header("location:add_lesson.php?id=".$_POST['lessonid']."");	
	
}else{
	
		$result = mysql_query("INSERT INTO tbl_lessons (title,content,posted_by,date_posted,qtr) VALUES ('".$_POST['title']."','".$_POST['contentbox']."','".$user_data['user_id']."','".time()."','".$_POST['qtr']."') ");
		header("location:lesson_index.php");	
}
*/
?>