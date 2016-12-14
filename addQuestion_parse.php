<?php 
include "core/init.php";
if(!isset($_POST['iscorrect'])){
header("location:create_quiz_question.php?error=error");
}
$questions = $_POST['desc'];
$answer1=$_POST['answer1'];
$answer2=$_POST['answer2'];
$answer3=$_POST['answer3'];
$answer4=$_POST['answer4'];
$anscorrect=$_POST['iscorrect'];
$groupid=$_POST['group'];
$addquestion = mysql_query("INSERT INTO quiz_questions(question,gid,posted_by,date_posted) VALUES ('$questions','$groupid','".$user_data['user_id']."','".time()."') ");
	$lastID=mysql_insert_id();
if($anscorrect == "answer1"){
	$answersql = mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer1','1')");
	mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer2','0')");
	mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer3','0')");
	mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer4','0')");
	header("location:quiz_index.php");
}
if($anscorrect == "answer2"){
	$answersql = mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer1','0')");
	mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer2','1')");
	mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer3','0')");
	mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer4','0')");
	header("location:quiz_index.php");
}
if($anscorrect == "answer3"){
	$answersql = mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer1','0')");
	mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer2','0')");
	mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer3','1')");
	mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer4','0')");
	header("location:quiz_index.php");
}
if($anscorrect == "answer4"){
	$answersql = mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer1','0')");
	mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer2','0')");
	mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer3','0')");
	mysql_query("INSERT INTO answers_questions(question_id,answer,correct) VALUES ('$lastID','$answer4','1')");
	header("location:quiz_index.php");
}
?>