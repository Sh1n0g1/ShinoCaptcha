<?php
	//CAPTCHA size
	// if you want to change the size, consider to change the font size
	$width  = 200;
	$height = 180;
	
	//TIMEOUT (second)
	$timeout_image   =  10;
	$timeout_captcha = 300;
	
	//CHARACTER REPLACEMENT
	// you can eliminate the confusing characters like '1' 'l' 'I'
	$confusingchar=array('8','B','0','D','1','2','5','4','6');
	$replacingchar=array('H','J','Q','L','M','P','T','W','Y');
	
	//SECRET
	// it is such a salt to generate unpredictable value
	$secret='bGcGQUD-mFfNFGDf2BX5ekpbDs4guLMMuf2yfDTmY7V_iSC7r8';
	
?>