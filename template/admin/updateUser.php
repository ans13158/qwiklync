 <?php
ob_start();
$current_file= $_SERVER['SCRIPT_NAME'];
// Start Session
session_start();

include 'connection.php';

	// Check Session valIdate
	if(!isset($_SESSION['adminId']))
	{
		header('Location:login.php');
	}
	else 
	{
		//Get email data from $_GET
		$adminId = $_SESSION['adminId'];
		//Select Admin Details from the DB
		$getAdminData = "SELECT * FROM `admin` WHERE `adminId` = '$adminId'";
		$adminDataResult = $conn -> query($getAdminData);
		$adminData = mysqli_fetch_assoc($adminDataResult);

		//Get All User Details
		$selectUser = "SELECT * FROM `users`";
		$selectUsersResults = $conn -> query($selectUser);
	

		//Check if any error or success message is there
		$error = "";
		if(isset($_GET['error']))
		{
			$error = $_GET['error'];
		}
		
		$sucess = "";
		if(isset($_GET['sucess']))
		{
			$sucess = $_GET['sucess'];
		}
		
		$userId= '';
		$email= '';
		$password= '';
		$salt='';
		$firstName= '';
		$oldFirstName= '';
		$lastName= '';
		$oldLastName= '';
		$phone='';
		$profilePhoto='';
		$profilePhotoPath= '';
		$oldProfilePhotoPath= '';
		$profilePhotoName= '';
		$profilePhotoType= '';
		$curdir='';
		$photoFolderName='';
		$oldPhotoFolderName='';
		
		
		
		if(isset($_POST['submitButton']))
		{
			$userId= $_POST['oldUserId'];
			$email= $_POST['email'];
			$password= $_POST['password'];
			$salt=md5($email.$password);
			$firstName= $_POST['firstName'];
			$oldFirstName= $_POST['oldFirstName'];
			$lastName= $_POST['lastName'];
			$oldLastName= $_POST['oldLastName'];
			$phone=$_POST['phone'];
			$profilePhoto= $_FILES['profilePhoto']['tmp_name'];
			$profilePhotoType= $_FILES['profilePhoto']['type'];
			$profilePhotoName= $_FILES['profilePhoto']['name'];
			
			$curdir= dirname($_SERVER['PHP_SELF']);
			$photoFolderName= $userId.$firstName.$lastName;
			$oldPhotoFolderName= $userId.$oldFirstName.$oldLastName;
			$path=$url.$curdir."/images/userProfileImages/".$photoFolderName;
			$profilePhotoPath= $path;
			$oldProfilePhotoPath= $url.$curdir."/images/userProfileImages/".$oldPhotoFolderName;
			$profilePhotoVariable= $path."/".$profilePhotoName;

						
			if(!empty($userId) && !empty($email) && !empty($password) && !empty($firstName) && !empty($lastName) && !empty($phone) && !empty($profilePhoto)  )
			
			{
				
				
				if(substr($profilePhotoType,0,5)=="image")	
				{
				
					//Pointer is not coming here
					$deleteQuery= "DELETE FROM `users` WHERE `userId`='".$userId."'";
					$deleteResult = mysqli_query($conn, $deleteQuery);
					
					
					if($deleteResult)  
					{
						
						removeFolder($oldProfilePhotoPath);
						
						if(mkdir($path,0777,true))
						{
							
							$insertQuery = "INSERT INTO `users`(`userId`, `email`, `password`,`salt` ,`firstName`,`lastName`,`phone`,`profilePhotoPath` ,`profilePhotoName`) VALUES ('$userId','$email','$password','$salt','$firstName','$lastName','$phone','$profilePhotoPath','$profilePhotoName')";
							$insertResult = $conn -> query($insertQuery);
							
							if($insertResult)
							{
								
								move_uploaded_file($profilePhoto,$profilePhotoVariable);
								$sucess = "Updation Successful";
								header('Location:updateUser.php?sucess='.$sucess);
							} 
							else
							{
								$error = "Updation Failed! Please Try Again.";
							}
						}
						else
						{
							$error = "Unable To make Directory.";
						}

						
					}
					else
					{
						$error = "Deletion Failed!Please Try Again.";
						header('Location:updateUser.php?userId='.$userId.'&error='.$error.'&submitButton=');
					}
						
				}
				else
				{
					$error = "Updation Failed! Please Try Again.Only Images Allowed";
					header('Location:updateUser.php?userId='.$userId.'&error='.$error.'&submitButton=');
				}
			}
			
		}
?>

<!DOCTYPE html>
<html>

	<head>
		<?php
			include 'common/header.php';
		?>
	</head>
	
	<nav>
		<?php
			include 'common/nav.php';
		?>
	</nav>

<body class="fixed-left">
    <div Id="wrapper">
        <?php
				include 'common/sideNavBar.php';
		?>
		
        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-header-title">
                                <h4 class="pull-left page-title">Update User</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">User</a></li>
                                    <li class="active">Update User</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
						
					<?php
                    if(isset($_GET['userId']))
					{
                        $userId = $_GET['userId'];
                        $selectSingleUserQuery = "SELECT * FROM `users` WHERE `userId` = '$userId'";
                        $userResults = $conn -> query($selectSingleUserQuery);
						$userCount = mysqli_num_rows($userResults);
						if(!$userCount==1)
						{
							$error="Please Enter valid User Id";
							header('Location:updateUser.php?error='.$error.'&submitButton=');
						}
						
						else
						{
								$userData = mysqli_fetch_assoc($userResults);
								
								$userId= $userData['userId'];
								$email= $userData['email'];
								$password= $userData['password'];
								$salt= $userData['salt'];
								$firstName= $userData['firstName'];
								$lastName= $userData['lastName'];
								$phone= $userData['phone'];
								$profilePhotoPath=$userData['profilePhotoPath'];
								$profilePhotoName=$userData['profilePhotoName'];
								
								if(!empty($userId))
								{
									?>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Update User Details</h3>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
														<div class="form-group">
															<label class="col-md-2 control-label">User Id</label>
															<div class="col-md-10">
																<input type="text" name="userId" class="form-control" placeholder="USR0x" required="required" value="<?php echo $userId;?>" disabled>
																<input type="hidden" name="oldUserId" class="form-control" value="<?php echo $userId;?>">
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Email</label>
															<div class="col-md-10">
																<input type="text" name="email" class="form-control" value="<?php echo $email;?>" placeholder="abc@gmail.com" required="required">
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Password</label>
															<div class="col-md-10">
																<input type="text" name="password" class="form-control" value="<?php echo $password;?>" required="required">
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">First Name</label>
															<div class="col-md-10">
																<input type="text" name="firstName" class="form-control" placeholder="Priyank" value="<?php echo $firstName;?>" required="required">
																<input type="hidden" name="oldFirstName" class="form-control" value="<?php echo $firstName;?>">
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label">Last Name</label>
															<div class="col-md-10">
																<input type="text" name="lastName" class="form-control"  value="<?php echo $lastName;?>" placeholder="Jha" required="required">
																<input type="hidden" name="oldLastName" class="form-control" value="<?php echo $lastName;?>">
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label">Phone</label>
															<div class="col-md-10">
																<input type="text" name="phone" class="form-control" value="<?php echo $phone;?>" placeholder="9871234567" required="required">
															</div>
														</div>
														
														
														<div class="form-group">
															<label class="col-md-2 control-label">Profile Photo</label>
															<div class="col-md-10">
																<input type="file" name="profilePhoto" class="form-control" required="required">
															</div>
														</div>

														
														
													
														<?php
														if(!$sucess == "")
														{
															echo "<span <b style=\"color:green\">".$sucess."</b></span>";
														} 
														else if(!$error == "")
														{
															echo "<span <b style=\"color:red\">".$error."</b></span>";
														}
														else 
														{
															echo "";
														}


														?>
														<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Update User Details</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								
						<?php
									}
								}
							}
							else
							{
						?>
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title">Enter User Id</h3></div>
									<div class="panel-body">
										<form class="form-horizontal" role="form" method="get" action="<?php echo $current_file; ?>">
											<div class="form-group">
												<label class="col-md-2 control-label">User Id</label>
												<div class="col-md-10">
													<input type="text" name="userId" class="form-control" placeholder="USR0x">
												</div>
											</div>
											<?php
										if(!$sucess == "")
										{
											echo "<span <b style=\"color:green\">".$sucess."</b></span>";
										} else if(!$error == "")
										{
											echo "<span <b style=\"color:red\">".$error."</b></span>";
										}
										else
										{
											echo "<span class=\"alert-info\"> Search User Details Below</span>";
										}
										?>
										<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Search User</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php
					}
				
					include 'modules/allUser.php';
				?>
				
				<?php
					include 'common/footer.php';
				?>
			</div>
		</div>
	</div>
</body>


</html>
<?php
}
?>