<?php 
include "core/init.php";
$deletegroup = mysql_query("DELETE FROM quiz_group WHERE qgid = ".$_GET['id']."");
$deletequestion = mysql_query("TRUNCATE TABLE questions");
$deleteanswers = mysql_query("TRUNCATE TABLE answers");
header("location:quiz_index.php");

?>