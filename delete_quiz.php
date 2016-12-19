<?php 
include "core/init.php";

$deletequestion = mysql_query("DELETE FROM quiz_questions WHERE id = ".$_GET['id']."");
$deleteanswers = mysql_query("DELETE FROM answers_questions WHERE question_id = ".$_GET['id']."");
header("location:quiz_index.php");

?>