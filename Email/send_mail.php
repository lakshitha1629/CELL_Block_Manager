<?php
//
require 'PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$htmlversion="<p style='color:red;'>This is the HTML version</p>";
		$textVersion="This is the text Version";
		$mail->isSMTP();                           		 // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  								// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                                // Enable SMTP authentication
		$mail->Username = 'nblkperera@gmail.com';         			  // SMTP username
		$mail->Password = 'kavindra1629';                      // SMTP password
		$mail->Port = 25;                                   // TCP port to connect to
		$mail->setFrom('nblkperera@gmail.com', 'Test Email');
		$mail->addAddress('iit15038@std.uwu.ac.lk');               // Name is optional
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Test Email Subject';
		$mail->Body    = $htmlversion;
		$mail->AltBody = $textVersion;

	if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Message has been sent.';
	}

?>