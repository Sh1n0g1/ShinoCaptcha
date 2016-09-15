<?php
//Replace not clear character 
include './config.php';

$im = imagecreatetruecolor($width, $height);	
$background_color = imagecolorallocate($im, 255,255,255);
$text_color = imagecolorallocate($im, 0,255,0);

imageantialias($im, true);

$count=0;
while($count < 20){
	$x=rand(1,$width);
	$y=rand(1,$height);
	$r=rand(1,100);
	imagefilledellipse($im,$x-3,$y-3,$r,$r,16777215);
	imagefilledellipse($im,$x+3,$y+3,$r,$r,0);
	imagefilledellipse($im,$x,$y,$r,$r,$text_color);
	$count++;
}

$angle=rand(-30,30);
imagettftext($im,30,$angle,$width*1/8-3,$height*1/2+15-3,16777215,'uc.ttf', CreateChallenge());
imagettftext($im,30,$angle,$width*1/8+3,$height*1/2+15+3,0,'uc.ttf', CreateChallenge());
imagettftext($im,30,$angle,$width*1/8,$height*1/2+15,$text_color,'uc.ttf', CreateChallenge());


//Create Response
header("Content-Type: image/png");

imagepng($im);
imagedestroy($im);


function CreateChallenge(){
	if(isset($_GET['x']) && isset($_GET['t'])){
		if(preg_match('/^[0-9]+$/',$_GET['t'])){
			if (time() - $_GET['t'] < 10){
				include './config.php';
				return str_replace($confusingchar,$replacingchar,strtoupper(substr(sha1($secret.$_GET['x'].$_SERVER['REMOTE_ADDR'].$_GET['t']),0,6)));
			}else{
				return 'TIMEOUT'."\n".(time()-$_GET['t']);
			}
		}else{
			return 'INVALID';
		}
	}else{
		return 'MISSING';
	}
}

?>
