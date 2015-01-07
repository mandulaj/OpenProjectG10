<?php
	require_once "core/init.php";
	require_once "db/connect.php";
	$info = getInfo($_SESSION["user_id"],array("first_name","last_name","username","profile_key"));
	$first_name = $info["first_name"];
	$last_name = $info["last_name"];
	$username = $info["username"];
	$profile_key = $info["profile_key"];
	if(isset($_GET["page"]))
	{
		$sellected = $_GET["page"];
	}
	else
	{
		$sellected = "pageHome";
	}
	
	$images = "users/$username/profilePic/$profile_key.png";
?>

<div class="nav-bar" unselectable="on">
	<ul id="menu">
    	<li class="pageHome" <?php if($sellected == "pageHome") echo "id='sellected'"; ?>><a href="#">Home</a></li>
        <li class="pageCalendar" <?php if($sellected == "pageCalendar") echo "id='sellected'"; ?>><a href="#">Calendar</a></li>
        <li class="pagePython" <?php if($sellected == "pagePython") echo "id='sellected'"; ?>><a href="#">Python</a></li>
        <li class="pageHomework" <?php if($sellected == "pageHomework") echo "id='sellected'"; ?>><a href="#">Homework</a></li>
        <li class="pageTodos" <?php if($sellected == "pageTodos") echo "id='sellected'"; ?>><a href="#">Todos</a></li>
    </ul>
    
    
    <div id="name-box">
    	<div id="text-pic">
    		<span><?php echo $first_name." ".$last_name ?></span>
       	 	<img id="porfilepic" width="35px" src="<?php echo $image ?>">
         </div>
        <div class="top-bar-submenu">
        	<ul>
        		<li><a href="#">Change Password</a></li>
        		<li><a href="#">Settings</a></li>
        		<li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

</div>

<hr id="separator" />
