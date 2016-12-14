<?php 
include 'core/init.php';

if(empty($_POST)===false){
	$username=$_POST['username'];
	$password=$_POST['password'];

	if(empty($username) ===true || empty($password) ===true){
		$errors[] = 'You need to enter a username and password';
	}else if (user_exists($username)==false){
		$errors[] = 'Username doesn\'t exists';
	}else if(user_active($username)==false){
		$errors[] = 'You haven\'t activated your account';
	}else{
		$login =login($username, $password);
		if ($login ===false) {
			$errors[] = 'username password invalid';
		}else{
			$login = login($username, $password);
			if($login==false){
				$errors[]='Error!';
			}else{
				$_SESSION['user_id'] = $login;
				header("location:index.php");
				exit();
			}
		}
	}
}else{
	$errors[] = 'no data received';
}
if(empty($errors)==false){
?>
	<!--ERROR MSG-->

<?php
	echo output_errors($errors);
}
?>