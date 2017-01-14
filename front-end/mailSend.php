<?php
	//FIle Inclusion
	include "assets/phpMailer/PHPMailerAutoload.php";
	//include "dbconfig.php";
	
	
	
	

	//Message 
	$htmlMessage = "Greetings, From Qwiklync Team. Thanks for Registration.For verify your Email you need to click the link below
					<br></br><br></br>";
	
	$verifyLink = "http://qwiklync.com/dev/verify.php?emailId=".$emailId."&verifyId=".$verifyId ;
	
	$htmlMessage= $htmlMessage.$verifyLink;
	
	//Creating mail Object for phpMailer
	$mail = new PHPMailer;

	//Enable SMTP debugging. 
	//$mail->SMTPDebug = 2;       
	$mail->Debugoutput = 'html';                        
	//Set PHPMailer to use SMTP.
	$mail->isSMTP();            
	//Set SMTP host name                          
	$mail->Host = "mail.qwiklync.com";
	//Set TCP port to connect to 
	$mail->Port = 587;

	$mail->SMTPSecure = "tls"; 
	//Set this to true if SMTP host requires authentication to send email
	$mail->SMTPAuth = true;                          
	//Provide username and password     
	$mail->Username = "connect@qwiklync.com";                 
	$mail->Password = "Qwiklync@123";                           
	
	                        

	$mail->From = "connect@qwiklync.com";
	$mail->FromName = "Qwiklync Team";

	$mail->addAddress($emailId, $username);
	$mail->AddBCC("connect@qwiklync.com", "Qwiklync Team");
	$mail->isHTML(true);
	$mail->Subject = "Qwiklync Registration";
	$mail->Body = $htmlMessage;
	$mail->AltBody = $htmlMessage;
		
		if(!$mail->send()) 
		{	
			$error = "Unable to register you this time.Please Try Again. Mailer Error: ".$mail->ErrorInfo;
			header('Location:register.php?error='.$error);
		} 
		else 
		{	
			$sucess = "Registration Complete.Check your EmailId and verify it.Then,Log In";
			header('Location:login.php?sucess='.$sucess);
		}
	
	
	

?>