// JavaScript Document
var visible = false
var mouse_is_inside = false
$(document).ready(function(e) {
    $("#text-pic").click(function(e) {
		if(!visible)
		{
			$(".top-bar-submenu").slideDown("fast");
			visible = true;
		}
		
    });
	
	$(".top-bar-submenu").on("mouseleave",function(){
		$("top-bar-submenu").hide();
		
	});
	
	
	$('.top-bar-submenu').hover(function(){ 
        mouse_is_inside=true; 
    }, function(){ 
        mouse_is_inside=false; 
    });

    $("body").mouseup(function(){ 
        if(! mouse_is_inside && visible) {
		$('.top-bar-submenu').slideUp("fast");
		setTimeout(function(){visible = false;},10);
		}
    });
	
	function changePG(menuObj)
	{
		$("#page_loader").css("display","block");
		for(var i = 0; i < $(".nav-bar ul#menu li").length;i++)
		{
			$(".nav-bar ul li").removeAttr("id");	
		}
		$(menuObj).attr("id","sellected");
		var newURL = "?page=" + $(menuObj).attr("class");
		window.history.pushState("",$(menuObj).children("a").html(), newURL);
		$("#main").load("pages/"+$(menuObj).attr("class")+".php",function(response,status,xhr)
		{
			console.log(response)
			console.log(status)
			console.log(xhr)
			
			
			$("#page_loader").css("display","none");	
		});
		
	}
	window.changePG = changePG;
	
		
	$(".nav-bar ul#menu li").click(function(){
		$("#page_loader").css("display","block");
		for(var i = 0; i < $(".nav-bar ul#menu li").length;i++)
		{
			$(".nav-bar ul li").removeAttr("id");	
		}
		$(this).attr("id","sellected");
		var newURL = "?page=" + $(this).attr("class");
		window.history.pushState("",$(this).children("a").html(), newURL);
		$("#main").load("pages/"+$(this).attr("class")+".php",function()
		{
			$("#page_loader").css("display","none");	
		});
	});	
	
	$(".nav-bar ul#menu li a").click(function(event)
	{
		event.preventDefault();
	});
	
});
