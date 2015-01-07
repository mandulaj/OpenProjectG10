<?php  
/*
session_start();  
  
$string = '';  
  
for ($i = 0; $i < 5; $i++) {  
    // this numbers refer to numbers of the ascii table (lower case)  
    $string .= chr(rand(97, 122));  
}  
  
$_SESSION['rand_code'] = $string;  
  
$dir = 'fonts/';  
  
$image = imagecreatetruecolor(170, 60);  
$black = imagecolorallocate($image, 0, 0, 0);  
$color = imagecolorallocate($image, 200, 100, 90); // red  
$white = imagecolorallocate($image, 255, 255, 255);  
  
imagefilledrectangle($image,0,0,399,99,$white);  
imagettftext ($image, 30, 0, 10, 40, $color, $dir."arial.ttf", $_SESSION['random_code']);  
  
header("Content-type: image/png");  
imagepng($image);  
*/
?>  

<?php 
/*
session_start(); 
$text = rand(10000,99999); 
$_SESSION["vercode"] = $text; 
$height = 25; 
$width = 65; 
  
$image_p = imagecreate($width, $height); 
$black = imagecolorallocate($image_p, 0, 0, 0); 
$white = imagecolorallocate($image_p, 255, 255, 255); 
$font_size = 14; 
  
imagestring($image_p, $font_size, 5, 5, $text, $white); 
imagejpeg($image_p, null, 80); 
*/
?>

<?php 
//Start the session so we can store what the security code actually is
session_start();

//Send a generated image to the browser 
create_image(); 
exit(); 

function create_image() 
{ 
    //Let's generate a totally random string using md5 
    $md5_hash = md5(rand(0,999)); 
    //We don't need a 32 character long string so we trim it down to 5 
    $security_code = substr($md5_hash, 15, 5); 

    //Set the session to store the security code
    $_SESSION["security_code"] = $security_code;

    //Set the image width and height 
    $width = 100; 
    $height = 20;  

    //Create the image resource 
    $image = ImageCreate($width, $height);  

    //We are making three colors, white, black and gray 
    $white = ImageColorAllocate($image, 255, 255, 255); 
    $black = ImageColorAllocate($image, 0, 0, 0); 
    $grey = ImageColorAllocate($image, 204, 204, 204); 

    //Make the background black 
    ImageFill($image, 0, 0, $black); 

    //Add randomly generated string in white to the image
    ImageString($image, 3, 30, 3, $security_code, $white); 

    //Throw in some lines to make it a little bit harder for any bots to break 
    ImageRectangle($image,0,0,$width-1,$height-1,$grey); 
    imageline($image, 0, $height/2, $width, $height/2, $grey); 
    imageline($image, $width/2, 0, $width/2, $height, $grey); 
 
    //Tell the browser what kind of file is come in 
    header("Content-Type: image/jpeg"); 

    //Output the newly created image in jpeg format 
    ImageJpeg($image); 
    
    //Free up resources
    ImageDestroy($image); 
} 
?>