// JavaScript Document


$(document).ready(function()
{
	var button = $("#submit-button");
	var register = $("#signup-button");
	
	$(".center-box").blurjs({
			source: 'body',
			radius: 20,
			overlay: 'rgba(255,255,255,0.4)',
			draggable: true,
			
		}
	);
	
	$(".center_container").blurjs({
			source: 'body',
			radius: 20,
			overlay: 'rgba(255,255,255,0.6)',
			offset:	{
				x: 0,
				y: -60	
			}
			
		}
	);
	
	/*$(".input").blurjs({
		source: 'body',
		radius: 5,
		overlay: 'rgba(255,255,255,0.4)',
		draggable: true,
		cache: true
		
	});*/
	
	$("#infoBoxRegOk").on("click",function(){
		$("#infoBoxRegOk").hide();
	});
	
	$("#infoBoxRegNotOk").on("click",function(){
		$("#infoBoxRegNotOk").hide();
	});
	
	button.on("click",function()
	{
		$("#error").hide();
		validateForm();
	});
	
	
	$("#user_name").keyup(function (e) {
    if (e.keyCode == 13) {
        $("#password").focus();
    }
	});
	
	$("#password").keyup(function (e) {
    if (e.keyCode == 13) {
		validateForm();
    }
	});	
	
	register.on("click",function()
	{
		window.location = "index.php?register=true";
	});
});


function validateForm()
{
	var pass = true;
	var username = document.getElementById("user_name");
	var password = document.getElementById("password");
	if(username.value == "")
	{
		if(username.className.indexOf("novalue") == -1)
		{
			username.className += " novalue";
		}
		pass = false;
	}
	else
	{
		if(username.className.indexOf("novalue") != -1)
		{
			username.className = username.className.slice(0,username.className.indexOf("novalue")-1);		
		}
	}
	if (password.value == "")
	{
		if(password.className.indexOf("novalue") == -1)
		{
			password.className += " novalue";
		}
		pass = false;
	}
	else
	{
		if(password.className.indexOf("novalue") != -1)
		{
			password.className = password.className.slice(0,password.className.indexOf("novalue")-1);
		}
	}
	
	if(pass)
	{
		submitForm();
		//document.getElementById("form").submit();
	}
	
}

function submitForm()
{
	$("#submit-button").html("<img id='loader' src='images/ajax_loader_gray_512.gif'/>");
	var usernameobj = document.getElementById("user_name");
	var passwordobj = document.getElementById("password");
	var tokenobj = $(".middle_name")[1]
	var middobj = $(".middle_name")[0]
	var Data = {
		user_name:usernameobj.value,
		password:passwordobj.value,
		token:tokenobj.value,
		middle_name:middobj.value
		};
	$.ajax({
		url: "login.php",
		type: "POST",
		data: Data,
		success: function(data)
		{
			if(data == "1")
			{
				window.location = "index.php";
			}
			else
			{
				$("#error").css("display","block")
				$("#submit-button").html("Login");
				//$("#error").fadeIn("fast");
			}
		}
	});
}