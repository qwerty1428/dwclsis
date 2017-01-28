<?php 
include "core/init.php";
if(!isset($_POST['iscorrect'])){
header("location:create_quiz_question.php?error=error");
}
if(isset($_POST['id'])){
	$questions = $_POST['desc'];
$answer1=$_POST['answer1'];
$answer2=$_POST['answer2'];
$answer3=$_POST['answer3'];
$answer4=$_POST['answer4'];
$anscorrect=$_POST['iscorrect'];
$groupid=$_POST['group'];
$addquestion = mysql_query("UPDATE questions SET question='$questions',qgid='".$_SESSION['qgroup']."',posted_by='".$user_data['user_id']."',date_posted=now() WHERE id ='".$_POST['id']."' ");
if($anscorrect == "answer1"){
	$answersql = mysql_query("UPDATE  answers SET answer='$answer1',correct='1' WHERE question_id='".$_POST['id']."')");
	mysql_query("UPDATE  answers SET answer='$answer1',correct='0' WHERE question_id='".$_POST['id']."')");
	mysql_query("UPDATE  answers SET answer='$answer1',correct='0' WHERE question_id='".$_POST['id']."')");
	mysql_query("UPDATE  answers SET answer='$answer1',correct='0' WHERE question_id='".$_POST['id']."')");
	header("location:create_quiz_question.php");
}
if($anscorrect == "answer2"){
	$answersql = mysql_query("UPDATE  answers SET answer='$answer2',correct='0' WHERE question_id='".$_POST['id']."')");
	mysql_query("UPDATE  answers SET answer='$answer2',correct='1' WHERE question_id='".$_POST['id']."')");
	mysql_query("UPDATE  answers SET answer='$answer2',correct='0' WHERE question_id='".$_POST['id']."')");
	mysql_query("UPDATE  answers SET answer='$answer2',correct='0' WHERE question_id='".$_POST['id']."')");
	header("location:create_quiz_question.php");
}
if($anscorrect == "answer3"){
	$answersql = mysql_query("UPDATE  answers SET answer='$answer3',correct='0' WHERE question_id='".$_POST['id']."')");
	mysql_query("UPDATE  answers SET answer='$answer3',correct='0' WHERE question_id='".$_POST['id']."')");
	mysql_query("UPDATE  answers SET answer='$answer3',correct='1' WHERE question_id='".$_POST['id']."')");
	mysql_query("UPDATE  answers SET answer='$answer3',correct='0' WHERE question_id='".$_POST['id']."')");
	header("location:create_quiz_question.php");
}
if($anscorrect == "answer4"){
	$answersql = mysql_query("UPDATE  answers SET answer='$answer4',correct='0' WHERE question_id='".$_POST['id']."')");
	mysql_query("UPDATE  answers SET answer='$answer4',correct='0' WHERE question_id='".$_POST['id']."')");
	mysql_query("UPDATE  answers SET answer='$answer4',correct='0' WHERE question_id='".$_POST['id']."')");
	mysql_query("UPDATE  answers SET answer='$answer4',correct='1' WHERE question_id='".$_POST['id']."')");
	header("location:create_quiz_question.php");
}
}else{
	$questions = $_POST['desc'];
$answer1=$_POST['answer1'];
$answer2=$_POST['answer2'];
$answer3=$_POST['answer3'];
$answer4=$_POST['answer4'];
$anscorrect=$_POST['iscorrect'];
$groupid=$_POST['group'];
$addquestion = mysql_query("INSERT INTO questions(question,qgid,posted_by,date_posted) VALUES ('$questions','".$_SESSION['qgroup']."','".$user_data['user_id']."',now()) ");
	$lastID=mysql_insert_id();
if($anscorrect == "answer1"){
	$answersql = mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer1','1')");
	mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer2','0')");
	mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer3','0')");
	mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer4','0')");
	header("location:create_quiz_question.php");
}
if($anscorrect == "answer2"){
	$answersql = mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer1','0')");
	mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer2','1')");
	mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer3','0')");
	mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer4','0')");
	header("location:create_quiz_question.php");
}
if($anscorrect == "answer3"){
	$answersql = mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer1','0')");
	mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer2','0')");
	mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer3','1')");
	mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer4','0')");
	header("location:create_quiz_question.php");
}
if($anscorrect == "answer4"){
	$answersql = mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer1','0')");
	mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer2','0')");
	mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer3','0')");
	mysql_query("INSERT INTO answers(question_id,answer,correct) VALUES ('$lastID','$answer4','1')");
	header("location:create_quiz_question.php");
}
}
?>