<?php
	$nonce=substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
	$time=time();
?>
<center>
<form action=verify.php method=post>
	<input name=nonce type=hidden value=<?php print($nonce); ?>>
	<input name=time type=hidden value=<?php print($time); ?>>
	<img  src='captcha.php?x=<?php print("$nonce&t=$time"); ?>'><br clear=all>
	<input name=captcha type=text>
	<input type=submit>
</form>