<?php
include 'core/init.php';
if(isset($_POST['submit'])){
	$name = $_FILES['prof_pic']['name'];
	 $tmp_name = $_FILES['prof_pic']['tmp_name'];
	
			$location = "img/prof_pic/$name";
			move_uploaded_file($tmp_name,$location );
			$query = mysql_query("UPDATE users SET profile_pic='$location' WHERE user_id ='".$user_data['user_id']."' ");
			header('location:profile.php');
	}else{
		die("please select a file");
	}



?>