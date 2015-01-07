<?php
require_once 'core/init.php';
require_once 'db/connect.php';
require_once "functions/security.php";


$T = 0;
if(isset($_POST["input"])){
	$T = 1;
	$saltFrontab = randomString(32);
	$saltBackab = randomString(32);
	
	
	
	$listofkeys = array();
	$listofvalues = array();
	
	$output = "Hash: ". hashPassword($_POST["input"],$saltFrontab,$saltBackab) . " SaltFront: ". $saltFrontab ." SaltBAck: ". $saltBackab;
	
	
	 
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SHA512 Generator</title>
</head>

<body>
	<form action="" method="post">
    	<label for="input">Password</label>
    	<input type="text" name="input" />
        <input type="submit" value="Submit" />
    </form>
    
    <?php
	if($T == 1){
	?>
    	<hr />
		<textarea cols="128" onclick="this.focus();this.select()" data-><?php echo $output;?></textarea>
        <br />
	<?php
		echo "Length: ",strlen($output);
	}
	
	echo randomString(128);
	
	?>
</body>
</html>