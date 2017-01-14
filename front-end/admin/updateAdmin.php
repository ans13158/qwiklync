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
		
		$adminFormId= '';
		$firstName= '';
		$oldFirstName= '';
		$lastName= '';
		$oldLastName= '';
		$userName='';
		$email= '';
		$phone='';
		$password= '';
		$salt='';
		$profilePhoto='';
		$profilePhotoPath= '';
		$oldProfilePhotoPath= '';
		$profilePhotoName= '';
		$profilePhotoType= '';
		$role='';
		$idCardType='';
		$idCard='';
		$dOB='';
		$curdir='';
		$photoFolderName='';
		$oldPhotoFolderName='';
		
		
		/*if(isset($_POST['restaurantId']) && isset($_POST['restaurantName']) && isset($_POST['typeOfCuisine']) && isset($_POST['aboutRestaurant']) && isset($_POST['takeAway']) && isset($_POST['delivery']) && isset($_POST['dineIn']) && isset($_POST['minimumOrder']) && isset($_POST['deliveryTime']) && isset($_POST['category']) && isset($_POST['photo']) && isset($_POST['logo']) && isset($_POST['photoFolder']))*/
		if(isset($_POST['submitButton']))
		{
			$adminFormId= $_POST['oldAdminFormId'];
			$firstName= $_POST['firstName'];
			$oldFirstName= $_POST['oldFirstName'];
			$lastName= $_POST['lastName'];
			$oldLastName= $_POST['oldLastName'];
			$userName= $_POST['userName'];
			$email= $_POST['email'];
			$phone= $_POST['phone'];
			$password= $_POST['password'];
			$salt=md5($email.$password);

			$profilePhoto= $_FILES['profilePhoto']['tmp_name'];
			$profilePhotoType= $_FILES['profilePhoto']['type'];
			$profilePhotoName= $_FILES['profilePhoto']['name'];
			$role=$_POST['role'];
			$idCardType=$_POST['idCardType'];
			$idCard=$_POST['idCard'];
			$dOB=$_POST['dOB'];
			
			$curdir= dirname($_SERVER['PHP_SELF']);
			$photoFolderName= $adminFormId.$firstName.$lastName;
			$oldPhotoFolderName= $adminFormId.$oldFirstName.$oldLastName;
			$path=$url.$curdir."/images/adminProfileImages/".$photoFolderName;
			$profilePhotoPath= $path;
			$oldProfilePhotoPath= $url.$curdir."/images/adminProfileImages/".$oldPhotoFolderName;
			$profilePhotoVariable= $path."/".$profilePhotoName;

			
			
			if(!empty($adminFormId) && !empty($firstName) && !empty($lastName) && !empty($userName)  && !empty($email) && !empty($phone) && !empty($password)&& !empty($profilePhoto)  && !empty($role)  && !empty($idCardType)  && !empty($idCard) && !empty($dOB) )
			
			{
				if(substr($profilePhotoType,0,5)=="image")	
				{

				
					$deleteQuery = "DELETE FROM `admin` WHERE `adminId`='".$adminFormId."'";
					$deleteQueryResult = $conn -> query($deleteQuery);
					if($deleteQueryResult)
					{
						
						removeFolder($oldProfilePhotoPath);
					
						if(mkdir($path,0777,true))
						{
							//Insert Query Is not working
							$insertQuery = "INSERT INTO `admin`(`adminId`, `firstName`, `lastName`, `userName`, `email`, `phone`, `password`, `salt`, `profilePhotoPath`, `profilePhotoName`, `role`, `idCardType`, `idCard`, `dOB`) VALUES (`".$adminId."`, `".$firstName."`, `".$lastName."`, `".$userName."`, `".$email."`, `".$phone."`, `".$password."`, `".$salt."`, `".$profilePhotoPath."`, `".$profilePhotoName."`, `".$role."`, `".$idCardType."`, `".$idCard."`, `".$dOB."`)";
							$insertResult = $conn -> query($insertQuery);
							move_uploaded_file($profilePhoto,$profilePhotoVariable);
							
							if($insertResult)
							{

								
								$sucess = "Updation Successful";
								header('Location:updateAdmin.php?sucess='.$sucess);
							} 
							else
							{
								$error = "Updation Failed! Please Try Again.";
							}
						}
						else
						{
							$error = "Unable To Make Directory.";
						}

						
					}
					else
					{
						$error = "Deletion Failed!Please Try Again.";
						header('Location:updateAdmin.php?adminFormId='.$adminFormId.'&error='.$error.'&submitButton=');
					}
						
				}
				else
				{
					$error = "Updation Failed! Please Try Again.Only Images Allowed";
					header('Location:updateAdmin.php?adminFormId='.$adminFormId.'&error='.$error.'&submitButton=');
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
                                <h4 class="pull-left page-title">Update Admin</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Admin</a></li>
                                    <li class="active">Update Admin</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
						
					<?php
                    if(isset($_GET['adminFormId']))
					{
                        $adminFormId = $_GET['adminFormId'];
                        $selectSingleAdminQuery = "SELECT * FROM `admin` WHERE `adminId` = '$adminFormId'";
                        $selectSingleAdminResults = $conn -> query($selectSingleAdminQuery);
						$selectSingleAdminResultsCount = mysqli_num_rows($selectSingleAdminResults);
						if(!$selectSingleAdminResultsCount==1)
						{
							$error="Please Enter valid Admin Id";
							header('Location:updateAdmin.php?error='.$error.'&submitButton=');
						}
						
						else
						{
								$adminGetData = mysqli_fetch_assoc($selectSingleAdminResults);
								
								$adminFormId= $adminGetData['adminId'];
								$firstName= $adminGetData['firstName'];
								$lastName= $adminGetData['lastName'];
								$userName= $adminGetData['userName'];
								$email= $adminGetData['email'];
								$phone= $adminGetData['phone'];
								$password= $adminGetData['password'];
								$salt= $adminGetData['salt'];
								$profilePhotoPath=$adminGetData['profilePhotoPath'];
								$profilePhotoName=$adminGetData['profilePhotoName'];
								$role=$adminGetData['role'];
								$idCardType=$adminGetData['idCardType'];
								$idCard=$adminGetData['idCard'];
								$dOB=$adminGetData['dOB'];

								if(!empty($adminFormId))
								{
									?>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Update Admin Details</h3>
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
																
																<input type="text" name="firstName" class="form-control" placeholder="Pankaj" value="<?php echo $firstName;?>" required="required" >
																<input type="hidden" name="oldFirstName" class="form-control" value="<?php echo $firstName;?>">
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label">Last Name</label>
															<div class="col-md-10">
																<input type="text" name="lastName" class="form-control"  value="<?php echo $lastName;?>" placeholder="Jha" required="required" >
																<input type="hidden" name="oldLastName" class="form-control" value="<?php echo $lastName;?>">
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label">User Name</label>
															<div class="col-md-10">
																<input type="text" name="userName" class="form-control"  value="<?php echo $userName;?>" placeholder="Pankaj123" required="required" >
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Email</label>
															<div class="col-md-10">
																<input type="text" name="email" class="form-control" value="<?php echo $email;?>" placeholder="abc@gmail.com" required="required" >
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Phone Number</label>
															<div class="col-md-10">
																<input type="text" name="phone" class="form-control"  value="<?php echo $phone;?>" placeholder="8987756543" required="required" >
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Password</label>
															<div class="col-md-10">
																<input type="text" name="password" class="form-control" value="<?php echo $password;?>" required="required" >
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Profile Photo</label>
															<div class="col-md-10">
																<input type="file" name="profilePhoto" class="form-control" required="required">
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Role</label>
															<div class="col-md-10">
																<select class="form-control" name="role" >
																
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
																<select class="form-control" name="idCardType" >
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
																<input type="text" name="idCard" class="form-control" placeholder="ASDFG1234567" value="<?php echo $idCard;?>" required="required" >
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Date Of Birth</label>
															<div class="col-md-10">
																<input type="text" name="dOB" class="form-control" value="<?php echo $dOB;?>" placeholder="1990-12-12" required="required" >
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
														<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Update Admin Details</button>
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
</body>


</html>
<?php
}
?>