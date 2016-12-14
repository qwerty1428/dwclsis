<?php
require '../database/connection.php';

$title = trim($_POST['title']);
$content = trim($_POST['content']);
$posted = trim($_POST['user']);
$subject = trim( $_POST['subject']);
 $time=time();
$result=mysql_query("INSERT INTO tbl_lessons (id,title,content,subject,posted_by,date_posted) VALUES('', '$title', '$content', '$subject','$posted','$time') ");
header('location:lesson_manager.php');
?>