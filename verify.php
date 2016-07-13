<?php
	if(isset($_POST['nonce']) && isset($_POST['time']) && isset($_POST['captcha'])){
		if(preg_match('/^[0-9]+$/',$_POST['time'])){
			if(time()-$_POST['time'] < 60){
				include 'secret.php';
				$forbiddenchar=array('8','B','0','D','1','2','5','4','6');
				$comprehensive=array('H','J','Q','L','M','P','T','W','Y');
				if(strtoupper($_POST['captcha'])==str_replace(
						$forbiddenchar,
						$comprehensive,
						strtoupper(
							substr(
								sha1(
									$secret.$_POST['nonce'].$_SERVER['REMOTE_ADDR'].$_POST['time']
								),
								0,
								6
							)
						)
					)
				){
					//Success
					print('success');
					
					
					
					
					
					
					
					
					
					
					
				}else{
					//Failed
					print 'Wrong Captcha';
				}
			}else{
				//Timeout
				print 'Too Late';
			}
		}else{
			//Wrong Time value
			print 'ERROR3';
		}
	}else{
		//Parameter missing
		print 'ERROR4';
	}
?>
