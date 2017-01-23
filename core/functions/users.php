<?php 
function user_data($user_id){
	$data = array();
	$user_id = (int) $user_id;
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();

	if($func_num_args>1){
		unset($func_get_args[0]);
		  $fields ='`' .implode('`,`',$func_get_args).'`';
		 $data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM users WHERE `user_id`= '$user_id' "));
		
		return $data;
	}
}
function logged_in(){
	return (isset($_SESSION['user_id'])) ? true : false;
	//function to check if user is login
}
	function user_exists($username){
		$username = sanitize($username);
		$query=mysql_query("SELECT COUNT(user_id) FROM users WHERE username='$username' ");
		return (mysql_result($query,0)==1) ? true : false;
		//function to check if user is exist
	}
	function user_active($username){
		$username = sanitize($username);
		$query=mysql_query("SELECT COUNT(user_id) FROM users WHERE username='$username'AND active = 1 ");
		return (mysql_result($query,0)==1) ? true : false;
		//function to check if user is active
	}
	function user_id_username($username){
		$username = sanitize($username);
		return mysql_result(mysql_query("SELECT user_id FROM users WHERE username='$username'"),0,'user_id');
		//function that gets the user id	
	}
	function login($username, $password){
		$user_id = user_id_username($username);
		$username = sanitize($username);
		$password = md5($password);

		return(mysql_result(mysql_query("SELECT COUNT(user_id) FROM users WHERE username='$username' AND password ='$password'"),0)==1) ? $user_id : false;
		//function that logins user

	}
?> 