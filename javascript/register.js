// JavaScript Document
var PasswordErrors = "";
var OtherErrors = ""
var userAsErr = false;
var passAsErr = false;

var typingTimer_username;
var typingTimer_password;
var typingTimer_password_again;
var typingTimer_first_name;
var typingTimer_last_name;
var typingTimer_email;
                
var doneTypingInterval = 2000; 

//on keyup, start the countdown
function keyupPause(selector,typing_Timer,done_Typing)
{

	$(selector).keyup(function(){
    	clearTimeout(typing_Timer);
    	if ($(selector).val) {
        	return setTimeout(done_Typing, doneTypingInterval);
    	}
	});
}

//user is "finished typing," do something
function doneTyping () {
    //do something
}

$(document).ready(function()
{
	$("input#password").keyup(function(e) {
        checkPasswordSterngth(false,false);
		passwordMatch();
		
    });
	
	$("input#password").blur(function(e) {
        checkPasswordSterngth(true,false);
		if(PasswordErrors){
			displayInfo("#password_info",PasswordErrors,10000)
		}
		
    });
	
	$("input#user_name").blur(function(e) {
		checkUsername(true);
		
	});
	
	$("input#password_retyped").keyup(function(e) {
        passwordMatch();
    });
	
	$("input#password_retyped").blur(function(e) {
        passwordMatch();
    });
	
	
	$("input#first_name").keyup(function(e) {
        checkName("first_name")
    });
	$("input#first_name").blur(function(e) {
        checkName("first_name")
    });
	
	$("input#last_name").keyup(function(e) {
        checkName("last_name")
    });
	
	$("input#last_name").blur(function(e) {
        checkName("last_name")
    });
	$("input#email").keyup(function(e) {
        checkEmail()
    });
	$("input#email").blur(function(e) {
        checkEmail()
    });
	/**/
	/*
	typingTimer_password = keyupPause("input#password",typingTimer_password,function(e) {
        checkPasswordSterngth(true,false);
		if(PasswordErrors){
			displayInfo("#password_info",PasswordErrors,10000)
		}
		passwordMatch();
		
    });
	
	
	typingTimer_username = keyupPause("input#user_name",typingTimer_username,function(e) {
		checkUsername(true);
	});
	
	typingTimer_password_again = keyupPause("input#password_retyped",typingTimer_password_again,function(e) {
        passwordMatch();
    });
	
	
	typingTimer_first_name = keyupPause("input#first_name",typingTimer_first_name,function(e) {
        checkName("first_name")
    });
	typingTimer_last_name = keyupPause("input#last_name",typingTimer_last_name,function(e) {
        checkName("last_name")
    });
	
	
	typingTimer_last_email = upkeyPause("input#email",typingTimer_last_email,function(e) {
        checkEmail()
    });
	
	*/
	

	$("#submit-button").on("click",function(){
		
		finalValidation()
	});

	$("#backdrop").on("click",function(){
		$("#backdrop").fadeOut("fast")
		$("#submit-button").html("Sign Up");
		
	});
	
	$(".register-form").blurjs({
			source: 'body',
			radius: 20,
			overlay: 'rgba(255,255,255,0.4)',
			draggable: true,
			debug: true
			
		}
	);
	
	
});




function validAgreement()
{
	if($("#agreement").prop('checked'))
	{
		return true;
	}
	else
	{
		OtherErrors += "<p>To sign up you <span>have to</span> agree with our terms of use.<br /> Click <a href='#'>this link</a> to get more information.</p>"
		return false;
	}
	
}

function finalValidation()
{
	$("#submit-button").html("<div id='loader'></div>");
	OtherErrors = "";
	var result = true;
	checkUsername(false);
	checkRemote(false);
	var pass = passAsErr;
	var uname = userAsErr;
	var pmatch = passwordMatch();
	var fname = checkName("first_name");
	var lname = checkName("last_name");
	var email = checkEmail();
	var gender = checkGender();
	var agreement = validAgreement();
	
	if (uname&&email&&fname&&lname&&pmatch&&agreement&&gender)
	{
		
		if(PasswordErrors == "" && OtherErrors == "")
		{
			if(pass)
			{
				document.getElementById("form").submit();
			
				
				return true;
			}
		}
		else
		{
			
			$("#errorContent").html(PasswordErrors + OtherErrors)
			$("#backdrop").fadeIn("fast")
			
			return false;
		}
	}
	else if(PasswordErrors != "" || OtherErrors != "")
	{
		
		$("#errorContent").html(PasswordErrors + OtherErrors)
		$("#backdrop").fadeIn("fast")
		return false;
	}
		
	
}

function checkEmail()
{
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    $("#email_check").css("visibility","visible");
	if(re.test($("input#email").val()))
	{
		$("#email_check").css("background-color","#3EA400");
		return true;
	}
	else
	{
		$("#email_check").css("background-color","#BE0C10");
		OtherErrors += "<p>Please enter a <span>valid</span> email.</p>";
		return false;
	}
}

function checkGender()
{
	var s = $("input[type=radio]");
	var checked = s[0].checked || s[1].checked;
	if(checked)
	{
		return true;
		
	}
	else
	{
		OtherErrors += "<p>Check at least one of the Genders</p>"
		return false;
	}
}

function checkName(name)
{
	var element = $("#"+name);
	$("#"+name+"_check").css("visibility","visible")
	if (element.val() != "" && /^[a-zA-Z]+$/.test(element.val()))
	{
		$("#"+name+"_check").css("background-color","#3EA400");
		return true;
	}
	else
	{
		$("#"+name+"_check").css("background-color","#BE0C10");
		OtherErrors += "<p>Invalid Name: <span>"+element.val()+"</span>.</p>"
		return false;
	}
	
}

function passwordMatch() 
{
	var pass1 = $("input#password").val();
	var pass2 = $("input#password_retyped").val();
	$("#passwordtwo_check").css("visibility","visible")
	if(pass1 == pass2 && pass2 != "" && pass1 != "")
	{
		$("#passwordtwo_check").css("background-color","#3EA400");
		return true;
	}
	else
	{
		var sufix1 = (pass1.length <= 1)?(""):("s")
		var sufix2 = (pass2.length <= 1)?(""):("s")
		$("#passwordtwo_check").css("background-color","#BE0C10");
		OtherErrors += "<p><span>Passwords don't match.</span> One is <span>"+pass1.length+" character" +sufix1+" long.</span> The other is <span>"+ pass2.length +" character" +sufix2+" long.</span></p>";
		
		return false;	
	}
}

function checkPasswordSterngth(remote,retscore)
{
	if(remote)
	{
		checkRemote(true)
		return;
	}
	var score = 0;
	var errors = "";
	var finalTest = true;
	var password = $("#password").val();
	if (password.length >= 8)
	{
		score += 3;	
	}
	else if(finalTest) 
	{
		errors += "<p>Password must be at least <span>8 characters</span> long! <br/>It is only<span> " + password.length + " </span>characters long!<br><span id='em'>Tip: The longer the password the more secure it is. Try this <a href='securePassword.php'>link</a> for tips how to make a secure password.</span></p>";
	}
	
	if(/\d/.test(password))
	{
		score += 3;	
	}
	else if(finalTest)
	{
		errors += "<p>Password must contain at least <span>one</span> number.</p>";
	}
	
	if(/[A-Z]/.test(password))
	{
		score += 3;
	}
	else if(finalTest)
	{
		errors += "<p>Password must contain at least <span>one</span> Upper Case letter.</p>"	
	}
	
	if(/[a-z]/.test(password))
	{
		score += 3;
	}
	else if(finalTest)
	{
		errors += "<p>Password must contain at least <span>one</span> lower case letter.</p>"	
	}
	
	if(/[_\W]/.test(password))
	{
		score += 1;
	}
	
	if(password.length >= 16)
	{
		score += 1;
	}
	
	if(password.length >= 24)
	{
		score += 1;
	}
	
	if(password.length >= 32)
	{
		score += 1;
	}
	
	
	
	
	PasswordErrors = errors;
	
	if(retscore)
	{
		return score;
	}
	else
	{	
		
		updateStrengthMeter(score)
	}
	
}


function checkRemote(Async)
{
	var Password = $("#password").val();
	var URL = MakeHomeURL(); 
	URL += "passwordTest.php";
	if(Password.length >= 8)
	{
		$.ajax({url:URL, type:"POST", data: {password: Password},success: function(data)
		{
			$("#password_check").css("visibility","visible")
			
			if(data == "1")
			{
				$("#password_check").css("background-color","#BE0C10");
				updateStrengthMeter(0);
				displayInfo("#password_info","<p>This password is too easy to crack! Choose a more complex one.</p>",5000)
				if(Async)
				{
					passAsErr = false;
					return false;
				}
				
			}
			else
			{
				var score = checkPasswordSterngth(false,true);
				if(score >= 12){
					$("#password_check").css("background-color","#3EA400");
					if(Async)
					{
						passAsErr = true;
						return true;
					}
					
				}
				else
				{
					$("#password_check").css("background-color","#BE0C10");
					if(Async)
					{
						passAsErr = false;
						return false;
					}
					
				}
			}
		},
		async:Async});
	}
	else
	{
		passAsErr = false;
		$("#password_check").css("visibility","visible");
		$("#password_check").css("background-color","#BE0C10");
	}
}

function checkUsername(Async)
{
	var User_name = $("#user_name").val();
	var URL = MakeHomeURL();
	URL += "usernameTest.php";
	
	if(User_name.length >= 5)
	{
		if(/[\w]$/.test(User_name))
		{
			$.ajax({url:URL,type:"POST",data:{user_name: User_name},success: function(data)
			{
				console.log(data=="1")
				
				$("#username_check").css("visibility","visible");
				if(data == "1")
				{
					$("#username_check").css("background-color","#BE0C10");
					OtherErrors += "<p>This Username: <span>"+User_name+"</span> is already taken. Try another one.</p>";
					displayInfo("#username_info","<p>Username taken! Try another one.</p>",5000);
					if(Async){
						userAsErr = false;
						return false;
					}
				}
				else
				{
					
					$("#username_info").html("")
					$("#username_info").fadeOut("fast");
					$("#username_check").css("background-color","#3EA400");
					
					if(Async){
						userAsErr = true;
						return true;
					}
				}
			},async:Async});
		}
		else
		{
			OtherErrors += "<p>Username can only contain letters, numbers or underscores.";
			displayInfo("#username_info","<p>Username can only contain letters, numbers or underscores.</p>",5000);
		}
	}
	else
	{
		OtherErrors += "<p>The Username is too short. Choose a longer username or append <span>"+(5-User_name.length)+"</span> character to it.</p>"
		displayInfo("#username_info","<p>Username too short</p>",5000)
		$("#username_check").css("visibility","visible");
		$("#username_check").css("background-color","#BE0C10");
		if(Async){
			userAsErr = false;
			return false;
		}
	}
}

function MakeHomeURL()
{
	var url = document.URL.split("/");
	var URL = "http:/";
	for(var i = 1;i<url.length-1;i++)
	{
		URL += url[i]+"/";
	}
	return URL;	
}

function updateStrengthMeter(score)
{
	
	if(score != 0)
	{
		$("#password_strength").css("display","block");
	}
	$(".strenght").css("background-color", "#D5D5D5");
	$("#password_check").css("visibility","visible")
	
	if(score >= 16)
	{
		var color = "rgb(0, 133, 255)"
		$("#password_check").css("background-color","rgb(0, 133, 255)");
	}
	
	else if(score >= 13)
	{
		var color = "#3EA400";
		$("#password_check").css("background-color","#3EA400");
		
	}
	else if(score >= 12)
	{
		var color = "rgb(221, 212, 0)"
		$("#password_check").css("background-color","rgb(221, 212, 0)");
		
	}
	else
	{
		var color = "#BE0C10";
		$("#password_check").css("background-color","#BE0C10");
		
	}
	
	switch(score)
	{
		case 16:
			$(".strenght:nth-child(8)").css("background-color", color);
		case 15:
			$(".strenght:nth-child(7)").css("background-color", color);
		case 14:
			$(".strenght:nth-child(6)").css("background-color", color);
		case 13:
			$(".strenght:nth-child(5)").css("background-color", color);
		case 12:
			$(".strenght:nth-child(4)").css("background-color", color);
		case 11:
		case 10:
		case 9:
			$(".strenght:nth-child(3)").css("background-color", color);
			
		case 8:
		case 7:
		case 6:
			$(".strenght:nth-child(2)").css("background-color", color);
		case 5:
		case 4:
		case 3:
		case 2:
		case 1:
			$(".strenght:nth-child(1)").css("background-color", color);
			break;
		case 0:
			$("#password_strength").css("display","none");
			
			break
		default:
			
			
	}
	switch(score) {
		case 16:
			$("#password_str_text").html("HARDCORE!");
			break;
		case 15:
			$("#password_str_text").html("Mega Strong!");
			break;
		case 14:
			$("#password_str_text").html("Ultra Strong");
			break;
		case 13:
			$("#password_str_text").html("Very Strong");
			break;
		case 12:
			$("#password_str_text").html("Moderate");
			break;
		case 11:
		case 10:
		case 9:
		case 8:
		case 7:
		case 6:
		case 5:
		case 4:
		case 3:
		case 2:
			$("#password_str_text").html("Weak");
			break;
		case 1:
			$("#password_str_text").html("Anyone can crack this.");
			break;	
		
	}
	
}

function displayInfo(element,message,time)
{
	$(element).html(message).fadeIn("fast");
	setTimeout(function()
	{
		
		$(element).fadeOut("slow");
		//$(element).html("")
	},time);	
}