<?php
//send_mail.php

if(isset($_POST['email_data']))
{
	require 'class/class.phpmailer.php';
	$output = '';
	foreach($_POST['email_data'] as $row)
	{
		$mail = new PHPMailer;
		$mail->IsSMTP();								//Sets Mailer to send message using SMTP
		$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = '587';	
		$mail->SMTPSecure = 'ssl';							//Sets the default SMTP server port
		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = 'nblkperera@gmail.com';					//Sets SMTP username
		$mail->Password = 'kavindra1629';					//Sets SMTP password
		//$mail->SMTPSecure = '';	
		$mail->setFrom('nblkperera@gmail.com', 'Lakshitha Perera');						//Sets connection prefix. Options are "", "ssl" or "tls"
		//$mail->From = 'nblkperera@gmail.com';			//Sets the From email address for the message
		//$mail->FromName = 'gmail';					//Sets the From name of the message
		$mail->AddAddress($row["email"]);	//Adds a "To" address
		//$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
		//$mail->IsHTML(true);							//Sets message type to HTML
		$mail->Subject = 'Testing'; //Sets the Subject of the message
		//An HTML or plain text message body
		$mail->Body = '<p>hi,bro..</p>';

		$mail->AltBody = '';

	//	$result = $mail->Send();						//Send an Email. Return true on success or false on error

		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
			//Section 2: IMAP
			//Uncomment these to save your message in the 'Sent Mail' folder.
			#if (save_mail($mail)) {
			#    echo "Message saved!";
			#}
		}

?>