<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Secure Password</title>
<link rel="stylesheet" href="css/general_style.css" />
<link rel="stylesheet" href="css/secPass.css" />
<script src="javascript/jquery-1.9.1.min.js"> </script>
<script>
	var randomString = function(length) // generates a random string of a specific length
	{
		var src = ""
		if($("#low").prop('checked')) src += "abcdefghijklmnopqrstuvwxyz";
		if($("#upp").prop('checked')) src += "ABCDEFGHIJKLMNOPQRSTUVWXTZ";
		if($("#num").prop('checked')) src += "0123456789";
		if($("#sym").prop('checked')) src += "!@#$%^&*()_~`+-={[}]:;'|\"\\<,>.?/";
		if(src == "")
		{
			return "You have to check at least one box!"	
		}
		var ret = "";
		for (var i = 0; i < length; i++){
			pos = Math.floor(Math.random() * src.length);
			ret += src[pos];
		}
		return ret;
	}
	
	function generate()
	{
		var res = $("#result");
		var randompassword = randomString($("#number").val());
		
		res.attr("value", randompassword);
		
	}
	
	

</script>
</head>

<body>
<div class="main_content">
<h2>Secure password</h2>

<p>Your safety is our priority. This is why we force users to select strong passwords. It is important to realize that modern computers can check millions of password every second. For fast computers hacking an account with password <em>‘password123’</em> is a piece of cake. Additionally to that, to narrow down the search index, lists of most common passwords are available on the internet for free such as <a href="10k_most_common.txt" download >this one</a>. It is a simple task for even a noob to write a simple script that tries all the passwords in a matter of minutes. Thousands of accounts have been stolen on giant networks such as <a href="https://www.facebook.com/">Facebook</a> or <a href="twitter.com">Twitter</a>. We want to protect our users. This is why we have constructed a guide for making a secure password.</p>
<h3>How To:</h3>
<p>The basis of a strong password is making it unpredictable and unique. When signing up for a new account, we compare the password to a list of most common passwords and reject it if we find a match. </p>
<h3>A strong password should contain:</h4>
<table id="chartable">
   
    <thead>
    	<th>Character category</th>
        <th>Examples</th>
    </thead>
    <tr>
        <td>Uppercase letters</td>
        <td>A,B,C</td>
    </tr>
    <tr>
        <td>Lowercase letters</td>
        <td>a,b,c</td>
    </tr>
    <tr>
        <td>Numbers</td>
        <td>1,2,3,4,5,6,7,8,9,0</td>
    </tr>
    <tr>
        <td>Symbols</td>
        <td>` ~ ! @ # $ % ^ & * ( ) _ - + = { } [ ] \ | : ; " ' < > , . ? /</td>
    </tr>
    
</table>

	<div id="passwordGen">
    	<h3>Password Generator</h3>
        <p>Try generating some random password.</p>
        <input id="low" type="checkbox" name="low" checked> <label for="low">Lowercase</label> 
        <input id="upp" type="checkbox" name="upp" checked><label for="upp">Uppercase</label> 
        <input id="num" type="checkbox" name="num" checked><label for="num">Numbers</label> 
        <input id="sym" type="checkbox" name="sym" checked><label for="sym">Symbols</label> 
    
        <label id="lab_numb" for="numberOf">Number of Characters:</label><input id="number" type="number" min="8" max="128" value="16" name="numberOf"> 
        <button onClick="generate()" id="button">Generate Random Password</button>
        <p id="lab_res">Result:</p>
        <input id="result" type="text" onclick="this.focus();this.select()">
        <div style="float: none; clear: both;"></div>
        <h5>Nothing is sent to our servers. All the password generating is done localy on your computer. As long as you close the website, noone will be able to find out this randomly generated password.</h5> 
    </div>





</div>


</body>
</html>