<?php
require_once 'core/init.php';
require_once 'db/connect.php';
$Errors = array();
if(isset($_POST['user_name'],$_POST['password'])){
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	if(strlen($user_name) < 1 || strlen($password) < 6){
		$Errors[] = "Enter the correct Username and Password.";
	}else{
		if ($user_id = $loginUser($user_name,$password)){
			$_SESSION["user_id"] = $user_id;
		
		}else{
			$Errors[] = "Wrong Username/Password combination. Please try again.";
		}
	}
}



?>