<?php
require_once 'core/init.php';
require_once 'db/mysql_login.php'; 
require_once 'functions/security.php';


$db = new mysqli($db_host,$db_username,$db_password,$db_database);

if($db->connect_errno){
	echo "Sorry we are having some problems!";
	echo($db->connect_error);
	echo($_SERVER["SERVER_ADDR"]);
	//errorPG("Sorry we are having some problems!");
	die(); 	
}

function queryInUsersDB($sql)
{
	global $db;
	return $db->query($sql);	
}


function loginUser($user_name,$password)
{

	$user_name = escape($user_name);
	$salt_sql = "SELECT `front_salt`,`back_salt` FROM `users` WHERE `username` = '$user_name'";
	$salt_result = queryInUsersDB($salt_sql);
	if ( $salt_result === FALSE ) 
	{
		//echo "Failed to get Username";
		return -1;
	}
    elseif ($salt_result->num_rows == 1) 
	{
		$r_s = $salt_result->fetch_array();
		$saltFront = $r_s["front_salt"];
		$saltBack = $r_s["back_salt"];
	}else{
		return -1;
	}
	
	$password = hashPassword($password,$saltFront,$saltBack);
	
	
	$sql = "SELECT `user_id` FROM `users` WHERE `username` = '$user_name' AND `password` = '$password'";
	
	$result = queryInUsersDB($sql);
	if ( $result === FALSE ) 
	{
		//echo "FALSE";

		return -1;
	}
    elseif ($result->num_rows == 1) 
	{
		$r = $result->fetch_array();
		return $r["user_id"];
	}else{
		//echo $result->num_rows;
		return -1;
	}
	
}

function getAnyInfo($id,$id_databaseName,$values,$table="users")
{
	$sql_query = "SELECT `".implode("`,`", $values)."` FROM `$table` WHERE `$id_databaseName` = '$id'";
	//echo $sql_query;
	$result = queryInUsersDB($sql_query);
	
	if ( $result === FALSE ) 
	{

		return 0;
	}
    elseif ($result->num_rows == 1) 
	{
		return $result->fetch_array();
	}else{
		return 0;
	}
	
}

function getInfo($user_id,$values)
{
	return getAnyInfo($user_id,"user_id",$values,"users");
}

function createUser($values) 
{
	$saltFront = randomString(32);
	$saltBack = randomString(32);
	$key = randomString(128);
	$profileKey = randomString(64);
	
	$listofkeys = array();
	$listofvalues = array();
	
	$values["password"] = hashPassword($values["password"],$saltFront,$saltBack);
	
	$values["front_salt"] = $saltFront;
	$values["back_salt"] = $saltBack;
	
	
	foreach($values as $x=>$x_value)
	{
		$x_value = escape($x_value);
		$listofkeys[] = $x;
		$listofvalues[] = $x_value;
		
	}
	
	$sql = "INSERT INTO `users` (`".implode("`,`", $listofkeys)."`, `key`, `profile_key`) VALUES ('".implode("','", $listofvalues)."','$key','$profileKey')";
	$res = queryInUsersDB($sql);
	
	if($res == FALSE)
	{
		return 0;
	}
	else
	{
		return 1;
	}
	
}

function updateInfo($id,$values,$table="users")
{
	$keyval = array();
	
	foreach($values as $key=>$val)
	{
		$keyval[] = "`".$key."` = '".$val."' ";
	}
	$sql = "UPDATE `$table` SET ".implode(",",$keyval)." WHERE `user_id`='$id'";
	$res = queryInUsersDB($sql);
	echo $sql;
	if($res == FALSE)
	{
		return 0;
	}
	else
	{
		return 1;
	}
	
}



function usernameExists($username)
{
	$username = escape($username);
	$sql = "SELECT `user_id` FROM `users` WHERE `username` = '$username'";
	$res = queryInUsersDB($sql);
	
	if ( $res === FALSE ) 
	{
		return 0;
	}
    elseif ($res->num_rows >= 1) 
	{
		return 1;
	}else{
		return 0;
	}
}

function appendIP()
{
	$iplist = getInfo($_SESSION["user_id"],array("ip_hist"));
	$iplist = $iplist[0];
	if(strpos($iplist, $_SERVER['REMOTE_ADDR']) !== false)
	{
		$iplist = $iplist.",".$_SERVER['REMOTE_ADDR'];
		updateInfo($_SESSION["user_id"],array("ip_hist"=>$iplist));
	}
	
	
}

function updateProfileKey($id)
{
	$newKey = randomeString(128);
	$val = array("profile_key"=>$newKey);
	updateInfo($id,$val);
}

function isEmptyValue($id,$value,$table)
{
	$result = getAnyInfo($id,"user_id",$value,$table);
	if($result){}
}

?>
