<?php
	include './config.php';
	if(isset($_POST['nonce']) && isset($_POST['time']) && isset($_POST['captcha'])){
		if(preg_match('/^[0-9]+$/',$_POST['time'])){
			if(time()-$_POST['time'] < $timeout_captcha){
				if(strtoupper($_POST['captcha'])==str_replace($confusingchar,$replacingchar,strtoupper(substr(sha1($secret.$_POST['nonce'].$_SERVER['REMOTE_ADDR'].$_POST['time']),0,6)))){
					//Success
					$shinocaptcharesult=TRUE;
				}else{
					//Failed
					$shinocaptcharesult='CAPTCHA is wrong, try it again.';
				}
			}else{
				//Timeout
				$shinocaptcharesult='TIMEOUT';
			}
		}else{
			//Wrong Time value
			$shinocaptcharesult='INVALIDPARAMETER';
		}
	}else{
		//Parameter missing
		$shinocaptcharesult='INVALIDPARAMETER';
	}

	if($shinocaptcharesult){
		//Success
	}else{
		//Failed
		die($shinocaptcharesult);
	}
?>
