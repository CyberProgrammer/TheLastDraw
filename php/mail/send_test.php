<?php
	$receiver = "papercut@gmail.com"; 
	$subject = "Email test";
	$message = "This is just a test of sendmail!";
	$headers = "From: webmaster@example.com" . "\r\n" .
	"CC: lastdrawcigars@support.com";


	if(mail($receiver, $subject, $message, $headers)){
		echo "Email sent!";
	}
	else{
		echo "Email not sent!";
	}
	
?>