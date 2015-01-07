<?php
require_once 'core/init.php';
require_once 'db/mysql_login.php';


function randomString($length)
{
	$alpha = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","0","1","2","3","4","5","6","7","8","9");
	$length_of_alph = count($alpha);
	
	$result = "";
	for($i = 0;$i < $length; $i++)
	{
		$result = $result.$alpha[mt_rand(0,$length_of_alph-1)];
	}
	
	return $result;
}


function escape($string) 
{
	global $db_host,$db_username,$db_password;
	$mysql = new mysqli($db_host,$db_username,$db_password);
	return trim(htmlentities(mysqli_real_escape_string($mysql,$string),ENT_QUOTES,"UTF-8"));
}

function hashPassword($password,$saltF,$saltB,$number = 3)
{
	for($i = 0;$i<$number;$i++)
	{
		$password = hash("sha512",$saltF.$password.$saltB);
	}
	return $password;
}

?>
