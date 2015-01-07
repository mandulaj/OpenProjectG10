<!doctype html>

<?php
require_once 'core/init.php';
require_once 'db/connect.php';
$pass_reset = FALSE;
$register = FALSE;
$title = "Title";
if(!$LOGGED_IN && isset($_GET["forgot_password"]))
{
	$pass_reset = TRUE;
	$title = "Forgot Password";
}
else if(!$LOGGED_IN && isset($_GET["register"]))
{
	$register = TRUE;
	$title = "Register";	
}
else if($LOGGED_IN)
{
	$user_info = getInfo($_SESSION["user_id"],array("first_name","last_name"));
	$title = $user_info[0] . " " . $user_info[1];	
	
}
else
{
	$title = "Finit.com";	
}
?>
<html>
<?php include "core/includes/headers/loginPage_header.php";?>
<body>

<?php


if($pass_reset)
{
	include "core/includes/resetPassword.php";

}
else if(isset($_GET["expage"]) && !$LOGGED_IN)
{
?>
<div class="main-container">
	<div id="back_to_index" onclick="window.location = 'index.php'" title="Back to Login"></div>
<div class="center_container"><?php include $_GET["expage"]; ?></div>

</div>	
<?php
}
else if($register)
{
	include "core/includes/register.php";
}
else if(!$LOGGED_IN)
{
	include "core/includes/loginPage.php";
	if(isset($_SESSION["messageFromRegister"]))
	{
		$local123 = $_SESSION['messageFromRegister'][0];
		$status = $_SESSION['messageFromRegister'][1];
		if($status)
		{
			$stat_id = "infoBoxRegOk";
		}
		else
		{
			$stat_id = "infoBoxRegNotOk";
		}
		unset($_SESSION['messageFromRegister']);
		echo "<div id='$stat_id'>$local123</div>";
	}
?>

<?php
}
else if($LOGGED_IN)
{
	include "core/includes/topbar.php";
	include "core/includes/mainpg.php";
	if(isset($_GET["page"]))
	{
		$page = "pages/".$_GET["page"].".php";	
	}
	else if(isset($_GET["expage"]))
	{
		$page = $_GET["expage"];
	}
	else
	{
		$page = "pages/pageHome.php";
	}

?>
<div id="page_loader"><img src="images/ajax_loader_gray_512.gif"></div>
<div id="main">
	<?php include $page; ?>
</div>
<?php
}


include "core/includes/bottom.php"
?>

</body>
</html>