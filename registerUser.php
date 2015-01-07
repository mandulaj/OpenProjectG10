<?php
require_once "core/init.php";
require_once "db/connect.php";
require_once "functions/security.php";
if(isset($_POST["username"],$_POST["password"],$_POST["password_retyped"],$_POST["first_name"],$_POST["last_name"],$_POST["email"],$_POST["gender"],$_POST["agreement"],$_POST["middle_name"],$_POST["token"]))
{
	if($POST["middle_name"] == "" && !($_POST["username"] == "" && $_POST["password"] == "" && $_POST["password_retyped"] == "" && $_POST["first_name"] == "" && $_POST["email"] == "" && $_POST["gender"] == "" && $_POST["agreement"] == "" && $_POST["last_name"] == "")&& $_POST["password"] == $_POST["password_retyped"]&& $_POST["token"] == $_SESSION["form_token"] )	
	{
		$created = createUser(array("username" => $_POST["username"],"password" =>$_POST["password"],"first_name" => $_POST["first_name"],"last_name"=>$_POST["last_name"],"email" => $_POST["email"]));
		unset($_SESSION["form_token"]);
		$usr = escape($_POST['username']);
		
		if($created)
		{
			mkdir("users/$usr");
			$_SESSION['messageFromRegister'] = array("<p id='ok'>The account for $usr was created successfuly. Please login.</p>",1);
			header("Location: index.php");
		}
		else
		{
			$_SESSION['messageFromRegister'] = array("<p>The account for $usr was not created successfuly. Please try again.</p>".$db->error,0);
			header("Location: index.php");
		}
		
	}
	else
	{
		$_SESSION['messageFromRegister'] = array("<p>We have not received any data. The wires are plugged.</p>",0);
		echo "Empty";
		
	}
}
else
{
	$_SESSION['messageFromRegister'] = array("<p>We have not received any data. The wires are plugged.</p>",0);
	echo "No Values";	
}

header("Location: index.php");

?>