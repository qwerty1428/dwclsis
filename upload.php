<?php
include 'core/init.php';
if(isset($_POST['save'])){
	$description = $_POST['desc'];
	$tags = $_POST['tags'];
	$time = time();
	$title = $_POST['title'];
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$rand_dir_name = substr(str_shuffle($chars), 0, 15);
	$random_file_name = substr(str_shuffle($chars), 0, 15);
	$file_id = substr(str_shuffle($chars), 0, 10);
	$errors = array();
	$getFromSecond = rand(0,10);

	$check=mysql_query("SELECT * FROM photos WHERE file_name='$filename'");


	foreach ($_FILES['file']['tmp_name'] as $key => $tmp_name) {
		$filename = $_FILES['file']['name'][$key];
		$filetype = $_FILES['file']['type'][$key];
		$file_tmp = $_FILES['file']['tmp_name'][$key];
		if(mysql_num_rows($check)===0){	
			if($filetype == "video/mp4" || $filetype == "video/x-matroska" || $filetype =="video/x-flv")
			{
				//commands
				//	-i input file name
				//	-an Disabled audio
				//	-ss seconds in the video
				//	-s size of the image
					
		
			$ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg";
			$imageFile = "uploads/userdata/videos/thumbnails/$random_file_name.png";
			$size = "120x90";
			
			 $cmd = "$ffmpeg -i $file_tmp -an -ss $getFromSecond -s $size $imageFile";
			 if(!shell_exec($cmd)){
			 	echo "THUMBNAIL CREATED";
			 }else
			 {
			 	echo "ERROR!";
			 }

			 $location = 'uploads/userdata/videos/'.$rand_dir_name.''.$file_name;
			 	$query = "INSERT INTO videos(file_id,file_name,title,description,date_posted,posted_by,tags,location,type,thumbnail) VALUES ('$file_id','$filename','$title','$description',$time,'".$user_data['user_id']."','$tags','$location','$filetype','$imageFile')";
				
					move_uploaded_file($file_tmp,'uploads/userdata/videos/'.$rand_dir_name.''.$filename);
					$result = mysql_query($query);
					header("Location:video_index.php");
				}
				else
				{
					print_r($errors);
				}
			}else{
				echo "<h1>ERROR!</h1>";
			}
			
		}
	
	}
			
?>