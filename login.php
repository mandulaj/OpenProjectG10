<?php
require_once 'core/init.php';
require_once 'db/connect.php';
$token = $_SESSION["form_token"];

$Errors = array();

if(isset($_POST['user_name'],$_POST['password'],$_POST['middle_name'],$_POST["token"]) && $_POST["middle_name"]=="" && $token == $_POST["token"])
{
	
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	if(strlen($user_name) < 1 || strlen($password) < 1)
	{
		$Errors[] = "string_error";
		echo "string_error";
	}
	else
	{
		$user_id = loginUser($user_name,$password);
		if ($user_id != -1)
		{
			$_SESSION["user_id"] = $user_id;
			//appendIP();
			unset($_SESSION["form_token"]);
			$_SESSION["token"] = randomString(128);
			echo "1";
			//header("Location: index.php");
		
		}
		else
		{
			$Errors[] = "password";
			echo "password";
		}
	}
}
else
{
	echo "string_error";	
}

//$_SESSION["errors"] = $Errors;
//header("Location: index.php");



//echo '<p>We are sorry but there was an error please return to the homepage by clicking this <a href="index.php">link</a> and try again.</p>';
?>