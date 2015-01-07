<?php
require_once "functions/security.php";
$token = randomString(128);
$_SESSION["form_token"] = $token;
?>
<div id="backdrop">
	<div id="errorbox">
    	<h3 id="errorTitle">Error</h3>
    	<div id="errorContent">
        
        </div>
    </div>
</div>

<div id="back_to_index" onclick="window.location = 'index.php'" title="Back to Login"></div>

<div class="register-form">
<h2 class="form_title_h2">Register</h2>
<h3 class="form_title_h3">Free signup</h3>
<form id="form" action="registerUser.php" method="post">
	<input class="input" type="text" id="user_name" name="username" placeholder="Username"/><div class="check" id="username_check"></div><div class="info" id="username_info" style="z-index:20;"><p>Username Taken</p></div><br/>
    <input class="input" id="password" type="password" name="password" placeholder="Password"/><div class="check" id="password_check"></div><div class="info" id="password_info" style="z-index:21;"></div><br/>
    <div id="password_strength">
    	<div class="strenght"> </div>
        <div class="strenght"> </div>
        <div class="strenght"> </div>
        <div class="strenght"> </div>
        <div class="strenght"> </div>
        <div class="strenght"> </div>
        <div class="strenght"> </div>
        <div class="strenght"> </div>
        <span id="password_str_text">Weak</span>
    </div>
    <input class="input" type="password" id="password_retyped" name="password_retyped" placeholder="Retype Password"/><div class="check" id="passwordtwo_check"></div>
    <input class="input" type="text" id="first_name" name="first_name" placeholder="First Name"/><div class="check" id="first_name_check"></div><br/>
    <input class="input" type="text" id="last_name" name="last_name" placeholder="Last Name"/><div class="check" id="last_name_check"></div><br/>
    <input class="input" type="email" id="email" name="email" placeholder="Email"/><div class="check" id="email_check"></div><br/>
    <table width="300px" id="gender_table">
        <tr>
            <td><div class="table_content_wrap"><label for="male">Male</label><input type="radio" name="gender" value="M" id="male" /></div></td>
            <td><div class="table_content_wrap"><label for="female">Female</label><input type="radio" name="gender" value"F" id="female"/></div></td>
        </tr>
    </table>
	<div id="terms_checkbox">
    <label for="agreement">I agree with the terms of use</label><input type="checkbox" name="agreement" id="agreement" value="Test"/>
    <input type="text" name="middle_name" class="middle_name">
    <input type="text" name="token" class="middle_name" value="<?php echo $token ?>">
	</div>
</form>
<div id="submit-button">
            Sign Up
</div>
</div>