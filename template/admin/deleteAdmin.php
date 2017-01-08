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

		//Get All Restaurant Details
		$selectAdmin = "SELECT * FROM `admin`";
		$adminResults = $conn -> query($selectAdmin);
	

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
			$adminFormId= $_POST['oldAdminFormId'];
			
			if(!empty($adminFormId))
			
			{
				$selectDeleteQuery = "SELECT * FROM `admin` WHERE `adminId` ='".$adminFormId."'";
				$selectDeleteQueryResults = $conn -> query($selectDeleteQuery);

				if($selectDeleteQueryResults ->num_rows == 1)
				{
					$pathQuery="Select profilePhotoPath From `admin` WHERE `adminId`='".$adminFormId."'";
					$pathQueryResults = $conn -> query($pathQuery);
					$pathData = mysqli_fetch_assoc($pathQueryResults);
					$profilePhotoPath=$pathData['profilePhotoPath'];
					
					$deleteQuery = "DELETE FROM `admin` WHERE `adminId`='".$adminFormId."'";
					$deleteQueryResult = $conn -> query($deleteQuery);
					if($deleteQueryResult)
					{
						
						removeFolder($profilePhotoPath);
											
						$sucess = "Delete Successful";
						header('Location:deleteAdmin.php?sucess='.$sucess);
					}
					else
					{
						$error = "Delete Failed! Please Try Again Later";
						header('Location:deleteAdmin.php?error='.$error);
					}
					
				}
				else
				{
					$error = "Please Enter Valid Admin ID";
					header('Location:deleteAdmin.php?error='.$error);
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
                                <h4 class="pull-left page-title">Delete Admin</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Admin</a></li>
                                    <li class="active">Delete Admin</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
							<div></div>
                        </div>
                    </div>
					
					<?php
                    if(isset($_GET['adminFormId']))
					{
                        $adminFormId = $_GET['adminFormId'];
                        $selectAdminForm = "SELECT * FROM `admin` WHERE `adminId` = '$adminFormId'";
                        $selectAdminFormResults = $conn -> query($selectAdminForm);
						$selectAdminFormCount = mysqli_num_rows($selectAdminFormResults);
						if(!$selectAdminFormCount==1)
						{
							$error="Please Enter valid Admin Id";
							header('Location:deleteAdmin.php?error='.$error.'&submitButton=');
						}
						
						else
						{
								$adminFormData = mysqli_fetch_assoc($selectAdminFormResults);
								
								$adminFormId= $adminFormData['adminId'];
								$firstName= $adminFormData['firstName'];
								$lastName= $adminFormData['lastName'];
								$userName= $adminFormData['userName'];
								$email= $adminFormData['email'];
								$phone= $adminFormData['phone'];
								$password= $adminFormData['password'];
					
								$profilePhotoName=$adminFormData['profilePhotoName'];
								$role= $adminFormData['role'];
								$idCardType= $adminFormData['idCardType'];
								$idCard= $adminFormData['idCard'];
								$dOB=$adminFormData['dOB'];
								
								
								if(!empty($adminFormId))
								{
									?>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Delete Admin Details</h3>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
														<div class="form-group">
															<label class="col-md-2 control-label">Admin Id</label>
															<div class="col-md-10">
																<input type="text" name="adminFormId" class="form-control" placeholder="ADM0x" required="required" value="<?php echo $adminFormId;?>" disabled>
																<input type="hIdden" name="oldAdminFormId" class="form-control" value="<?php echo $adminFormId;?>">
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
															<label class="col-md-2 control-label">User Name</label>
															<div class="col-md-10">
																<input type="text" name="userName" class="form-control"  value="<?php echo $userName;?>" placeholder="Pankaj123" required="required" disabled>
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Email</label>
															<div class="col-md-10">
																<input type="text" name="email" class="form-control" value="<?php echo $email;?>" placeholder="abc@gmail.com" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Phone Number</label>
															<div class="col-md-10">
																<input type="text" name="phone" class="form-control"  value="<?php echo $phone;?>" placeholder="8987756543" required="required" disabled>
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Password</label>
															<div class="col-md-10">
																<input type="text" name="password" class="form-control" value="<?php echo $password;?>" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Profile Photo Name</label>
															<div class="col-md-10">
																<input type="text" name="profilePhotoName" class="form-control"  value="<?php echo $profilePhotoName;?>" placeholder="abc.jpg" required="required" disabled>
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Role</label>
															<div class="col-md-10">
																<select class="form-control" name="role" disabled>
																
																	<option value="Admin" <?php if ($role == "Admin") echo "selected='selected'";?>>Admin</option>
																	<option value="Editor" <?php if ($role == "Editor") echo "selected='selected'";?>>Editor</option>
																	<option value="Agent" <?php if ($role == "Agent") echo "selected='selected'";?>>Agent</option>
																	<option value="Restaurant" <?php if ($role == "Restaurant") echo "selected='selected'";?>>Restaurant</option>
																</select>
																
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Id Card Type</label>
															<div class="col-md-10">
																<select class="form-control" name="idCardType" disabled>
																	<option value="PAN Card" <?php if ($idCardType == "PAN Card") echo "selected='selected'";?>>PAN Card</option>
																	<option value="Aadhar Card" <?php if ($idCardType == "Aadhar Card") echo "selected='selected'";?>>Aadhar Card</option>
																	<option value="Voter Id" <?php if ($idCardType == "Voter Id") echo "selected='selected'";?>>Voter Id</option>
																	<option value="Passport" <?php if ($idCardType == "Passport") echo "selected='selected'";?>>Passport</option>
																</select>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">ID card Number</label>
															<div class="col-md-10">
																<input type="text" name="idCard" class="form-control" placeholder="ASDFG1234567" value="<?php echo $idCard;?>" required="required" disabled>
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Date Of Birth</label>
															<div class="col-md-10">
																<input type="text" name="dOB" class="form-control" value="<?php echo $dOB;?>" placeholder="1990-12-12" required="required" disabled>
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
														<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Delete Admin Details</button>
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
										<h3 class="panel-title">Enter Admin Id</h3></div>
									<div class="panel-body">
										<form class="form-horizontal" role="form" method="get" action="<?php echo $current_file; ?>">
											<div class="form-group">
												<label class="col-md-2 control-label">Admin Id</label>
												<div class="col-md-10">
													<input type="text" name="adminFormId" class="form-control" placeholder="ADM0x">
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
											echo "<span class=\"alert-info\"> Search Admin Details Below</span>";
										}
										?>
										<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Search Admin</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php
					}
				
					include 'modules/allAdmin.php';
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