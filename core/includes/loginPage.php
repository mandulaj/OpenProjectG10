<?php
require_once "functions/security.php";
$token = randomString(128);
$_SESSION["form_token"] = $token;
?>

<div class="center-box">
	<div id="logo">
    </div>
    <h2 class="box-heading">Login</h2>
    <div class="login-form">
    	<form action="login.php" method="post" id="form">
        	<input class="input" id="user_name" type="text" name="user_name" placeholder="Username">
            <br>
            <input class="input" id="password" type="password" name="password" placeholder="Password">
            <input type="text" name="middle_name" class="middle_name">
            <input type="text" name="token" class="middle_name" value="<?php echo $token ?>">
            <div id='error'>Wrong Username/Password combination.</div>
      		<a id="lost-pass" href="index.php?forgot_password=true">Forgot the password? Click Here!</a>
            <div id="submit-button">
            Login
            </div>
            <div id="or">OR</div>
        	<div id="signup-button">
            	Sign Up
        	</div>    
        </form>
    	
    
    
    </div>
</div>