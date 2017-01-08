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
		
		
		
		if(isset($_POST['submitButton']))
		{
			$userId= $_POST['oldUserId'];
			
			if(!empty($userId))
			
			{
				$selectDeleteQuery = "SELECT * FROM `users` WHERE `userId` ='".$userId."'";
				$selectDeleteQueryResults = $conn -> query($selectDeleteQuery);

				if($selectDeleteQueryResults ->num_rows == 1)
				{
					$pathQuery="Select profilePhotoPath From `users` WHERE `userId`='".$userId."'";
					$pathQueryResults = $conn -> query($pathQuery);
					$pathData = mysqli_fetch_assoc($pathQueryResults);
					$profilePhotoPath=$pathData['profilePhotoPath'];
					
					
					$deleteQuery = "DELETE FROM `users` WHERE `userId`='".$userId."'";
					$deleteQueryResult = $conn -> query($deleteQuery);
					if($deleteQueryResult)
					{
						
						removeFolder($profilePhotoPath);
											
						$sucess = "Delete Successful";
						header('Location:deleteUser.php?sucess='.$sucess);
					}
					else
					{
						$error = "Delete Failed! Please Try Again Later";
						header('Location:deleteUser.php?error='.$error);
					}
					
				}
				else
				{
					$error = "Please Enter Valid User ID";
					header('Location:deleteUser.php?error='.$error);
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
    <div id="wrapper">
        <?php
				include 'common/sideNavBar.php';
		?>
		
        <div class="content-page">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-header-title">
                                <h4 class="pull-left page-title">Delete User</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">User</a></li>
                                    <li class="active">Delete User</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
							<div></div>
                        </div>
                    </div>
					
					<?php
                    if(isset($_GET['userId']))
					{
                        $userId = $_GET['userId'];
                        $selectUser = "SELECT * FROM `users` WHERE `userId` = '$userId'";
                        $selectUserResults = $conn -> query($selectUser);
						$selectUserCount = mysqli_num_rows($selectUserResults);
						if(!$selectUserCount==1)
						{
							$error="Please Enter valid User Id";
							header('Location:deleteUser.php?error='.$error.'&submitButton=');
						}
						
						else
						{
								$userData = mysqli_fetch_assoc($selectUserResults);
								
								$userId= $userData['userId'];
								$email= $userData['email'];
								$password= $userData['password'];
								$firstName= $userData['firstName'];
								$lastName= $userData['lastName'];
								$phone= $userData['phone'];
								$profilePhotoName=$userData['profilePhotoName'];
								
								if(!empty($userId))
								{
									?>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Delete User Details</h3>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
														<div class="form-group">
															<label class="col-md-2 control-label">User Id</label>
															<div class="col-md-10">
																<input type="text" name="userId" class="form-control" placeholder="USR0x" required="required" value="<?php echo $userId;?>" disabled>
																<input type="hIdden" name="oldUserId" class="form-control" value="<?php echo $userId;?>">
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Email</label>
															<div class="col-md-10">
																<input type="text" name="email" class="form-control" value="<?php echo $email;?>" placeholder="abc@gmail.com" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Password</label>
															<div class="col-md-10">
																<input type="text" name="password" class="form-control" value="<?php echo $password;?>" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">First Name</label>
															<div class="col-md-10">
																<input type="text" name="firstName" class="form-control" placeholder="Pankaj" value="<?php echo $firstName;?>" required="required" disabled>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label">Last Name</label>
															<div class="col-md-10">
																<input type="text" name="lastName" class="form-control"  value="<?php echo $lastName;?>" placeholder="Jha" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Phone</label>
															<div class="col-md-10">
																<input type="text" name="phone" class="form-control"  value="<?php echo $phone;?>" placeholder="9123789561" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Profile Photo Name</label>
															<div class="col-md-10">
																<input type="text" name="profilePhotoName" class="form-control"  value="<?php echo $profilePhotoName;?>" placeholder="abc.jpg" required="required" disabled>
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
														<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Delete User Details</button>
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
    </div>
</body>
</html>
<?php
}
?>