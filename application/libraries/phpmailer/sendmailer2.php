<?php

 $message = "selamat bergabung!";
	require 'phpmailer/PHPMailerAutoload.php';
			 
			ini_set('display_errors', 'On');
			$mail = new PHPMailer;
 			//Tell PHPMailer to use SMTP
			$mail->isSMTP();
			
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$mail->SMTPDebug = 0;
			
			//Ask for HTML-friendly debug output
			$mail->Debugoutput = 'html';
			
			//Set the hostname of the mail server
			$mail->Host = 'smtp.gmail.com';
			
			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$mail->Port = 587;
			
			//Set the encryption system to use - ssl (deprecated) or tls
			$mail->SMTPSecure = 'tls';
			
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
			
			//Username to use for SMTP authentication - use full email address for gmail
			$mail->Username = "okkisetyawan@gmail.com";
			
			//Password to use for SMTP authentication
			$mail->Password = "";
			
			//Set who the message is to be sent from
			//$mail->setFrom('$emailfrom', 'Admin Recruitment');
			
			$mail->From = 'okkisetyawan@gmail.com';
			$mail->FromName = 'Admin Recruitment';
			
			//Set an alternative reply-to address
			$mail->addReplyTo('okkisetyawan@gmail.com', 'Admin Recruitment');
			
			//Set who the message is to be sent to
			$mail->addAddress('sawunggalihapik@gmail.com', 'candidate');
			
			//Set the subject line
			$mail->Subject = 'Hallo!';
			
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$mail->msgHTML($message);
			
			//Replace the plain text body with one created manually
			$mail->AltBody = 'This is a plain-text message body';
			
			//Attach an image file
			//$mail->addAttachment('images/phpmailer_mini.png');
			
			//send the message, check for errors
			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
				echo "Message sent!";
			} 
	
 


?>