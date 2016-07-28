
<center>
<form action=verify.php method=post>

<!-- Inserted for ShinoCaptha -->
	<?php
		$nonce=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
		$time=time();
		include './config.php';
	?>
	<input name=nonce type=hidden value=<?php print($nonce); ?>>
	<input name=time type=hidden value=<?php print($time); ?>>
	<img  src='captcha.php?x=<?php print("$nonce&t=$time"); ?>'><br clear=all>
	<input name=captcha type=text><br>
	TIME:<span id="shinocaptchacountdown"><?php echo $timeout_captcha; ?></span>
	<script>
	var t=<?php echo $timeout_captcha; ?>;
	setInterval(ShinoCaptchaCount,1000);	
	function ShinoCaptchaCount(){
		t--;
		document.getElementById('shinocaptchacountdown').innerHTML=t;
	}
	</script>
	
<!-- End of ShinoCaptcha -->
	<input type=submit>
</form>