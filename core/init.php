<?php
session_start();
//error_reporting(0);

if(isset($_SESSION["user_id"]))
{
	$TOKEN = $_SESSION["token"];
	$LOGGED_IN = TRUE;
}
else
{
	$LOGGED_IN = FALSE;
}
?>