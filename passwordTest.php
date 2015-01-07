<?php
if(isset($_POST["password"])&& $_POST["password"]!= "")
{
	$filename = '10k_most_common.txt';
	$searchfor = $_POST["password"];
	$file = file_get_contents($filename);
	$searchfor = strtolower($searchfor);
	if(strpos($file, $searchfor) !== false) 
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
