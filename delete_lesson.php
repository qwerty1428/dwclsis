<?php 
include "core/init.php";

$deletelesson = mysql_query("DELETE FROM tbl_lessons WHERE id = ".$_GET['id']."");
header("location:lesson_index.php");

?>