<head>
	<title><?php echo $title; ?></title>
    <link type="text/css" rel="stylesheet" href="css/general_style.css"> 
<?php
	if(!$LOGGED_IN && !$pass_reset && !$register)
	{
?>
	<link typr="text/css" rel="stylesheet" href="css/login.css">
    <link typr="text/css" rel="stylesheet" href="css/form.css">
    <script src="javascript/jquery-1.9.1.min.js"> </script>
	<script src="javascript/login.js"> </script>
    <script src="javascript/blur.min.js"> </script>
    <style>
		body {
			background-image: url(images/backgrounds/bg<?php
				$img = array("1","3","4","5");
				echo $img[mt_rand(0,count($img)-1)];
			 ?>.jpg);
			background-position: top left;
			background-repeat: repeat;
			
		}
	
	</style>
<?php
		
	}
	if($pass_reset)
	{	
?>
    <link typr="text/css" rel="stylesheet" href="css/form.css">
    <script src="javascript/blur.min.js"> </script>
    <style>
		body {
			background-image: url(images/backgrounds/bg<?php
				$img = array("1","3","4","5");
				echo $img[mt_rand(0,count($img)-1)];
			 ?>.jpg);
			background-position: top left;
			background-repeat: repeat;
			
		}
	
	</style>
<?php
	}
	if($register)
	{
?>
	<link typr="text/css" rel="stylesheet" href="css/form.css">
	<script src="javascript/jquery-1.9.1.min.js"> </script>
	<script src="javascript/register.js"> </script>
    <script src="javascript/blur.min.js"> </script>
    <style>
		body {
			background-image: url(images/backgrounds/bg<?php
				$img = array("1","3","4","5");
				echo $img[mt_rand(0,count($img)-1)];
			 ?>.jpg);
			background-position: top left;
			background-repeat: repeat;
			
		}
	
	</style>
<?php		
	}
	
	if($LOGGED_IN)
	{
?>
    <link typr="text/css" rel="stylesheet" href="css/session.css">
    <script src="javascript/jquery-1.9.1.min.js"> </script>
    <script src="javascript/session.js"> </script>
    <!---<script src="javascript/headroom.min.js"> </script>--->
<?php
	}
?>   
</head>