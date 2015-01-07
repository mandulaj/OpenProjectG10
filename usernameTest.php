<?php
require_once 'db/connect.php';
if(isset($_POST["user_name"]) && $_POST["user_name"] != "")
{
	if(usernameExists($_POST["user_name"]))
	{
		echo "1";	
	}
	else
	{
		echo "0";
	}
}
else
{
	echo "0";	
}

?>