<?php
	ob_start();
	$current_file= $_SERVER['SCRIPT_NAME'];
	//Starting Session
	session_start();
	
	//connecting to database
	include 'connection.php';
	
	if(isset($_GET['emailId']) && isset($_GET['verifyId']))
	{
			$emailId = $_GET['emailId'];
			$verifyId = $_GET['verifyId'];
		
			$checkQuery = "SELECT count(userId) as Total, `userId` , `status` FROM `user` WHERE `emailId`='$emailId' AND `verifyId`='$verifyId'";
			$checkResult = $conn -> query($checkQuery);
			$checkData = mysqli_fetch_assoc($checkResult);
			$count = $checkData['Total'];
			
			if($count==1)
			{	
				$status = $checkData['status'];
				
				if($status== 2)
				{	
					$userId = $userData['userId'];
			
					$updateQuery = "UPDATE `user` SET `status`='3' WHERE `userId`='$userId'";
					$updateResult = $conn -> query($updateQuery);
					
					if($updateResult)
					{
						$sucess = "You are sucessfully verify your Email Id.Now, Log In and Update your account.";
						header('Location:login.php?sucess='.$sucess);
					}
					else
					{
						$error = "UpdateQuery is not working";
						header('Location:register.php?error='.$error);
					}
				}
				else
				{
					$sucess = "You are already verify your Email Id.Now, Log In and Update yourself.";
					header('Location:login.php?sucess='.$sucess);
				}
			}
			else
			{		
				$error = "Invalid URL Path.Please Contact Qwiklync Team Immidiately.Thanks";
				header('Location:register.php?error='.$error);
			}
		
	}
	else
	{
		header('Location:http://qwiklync.com/dev/');
	}

?>