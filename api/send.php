<?php
//send_mail.php

	require 'class/class.phpmailer.php';

		$mail = new PHPMailer;
		$mail->IsSMTP();	
	
		$mail->Host = 'myapollophoto.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = '465';								//Sets the default SMTP server port
		$mail->SMTPAuth = false;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = 'noreply@myapollophoto.com';					//Sets SMTP username
		$mail->Password = 'ApolloPhoto123#@!';					//Sets SMTP password
		$mail->SMTPSecure = 'ssl';							//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = 'noreply@myapollophoto.com';			//Sets the From email address for the message
		$mail->FromName = 'Myapollophoto.com';					//Sets the From name of the message
		$mail->AddAddress('voteonlinofficial@gmail.com');	//Adds a "To" address
								//Sets word wrapping on the body of the message to a given number of characters
								//Sets message type to HTML
		$mail->Subject = 'sub'; //Sets the Subject of the message
		//An HTML or plain text message body
		$mail->Body = '
	Thank you for visiting Apollo Photo Station.We hope you enjoyed.Please Share Your Photo with title #gothdistance';

		$mail->AltBody = '';

		$result = $mail->Send();						//Send an Email. Return true on success or false on error




?>