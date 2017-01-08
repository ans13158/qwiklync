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

		//Get All Delivery Boy Details
		$selectDeliveryBoyQuery = "SELECT * FROM `delivery_boy`";
		$selectDeliveryBoyResults = $conn -> query($selectDeliveryBoyQuery);
	

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
		
		$deliveryBoyId= '';
		$firstName= '';
		$oldFirstName= '';
		$lastName= '';
		$oldLastName= '';
		$profilePhoto='';
		$profilePhotoPath= '';
		$oldProfilePhotoPath= '';
		$profilePhotoName= '';
		$profilePhotoType= '';
		$drivingLicense='';
		$dateOfBirth='';
		$email= '';
		$password= '';
		$salt='';
		$curdir='';
		$photoFolderName='';
		$oldPhotoFolderName='';
		
		
		/*if(isset($_POST['restaurantId']) && isset($_POST['restaurantName']) && isset($_POST['typeOfCuisine']) && isset($_POST['aboutRestaurant']) && isset($_POST['takeAway']) && isset($_POST['delivery']) && isset($_POST['dineIn']) && isset($_POST['minimumOrder']) && isset($_POST['deliveryTime']) && isset($_POST['category']) && isset($_POST['photo']) && isset($_POST['logo']) && isset($_POST['photoFolder']))*/
		if(isset($_POST['submitButton']))
		{
			$deliveryBoyId= $_POST['oldDeliveryBoyId'];
			$firstName= $_POST['firstName'];
			$oldFirstName= $_POST['oldFirstName'];
			$lastName= $_POST['lastName'];
			$oldLastName= $_POST['oldLastName'];
			$profilePhoto= $_FILES['profilePhoto']['tmp_name'];
			$profilePhotoType= $_FILES['profilePhoto']['type'];
			$profilePhotoName= $_FILES['profilePhoto']['name'];
			$drivingLicense=$_POST['drivingLicense'];
			$dateOfBirth=$_POST['dateOfBirth'];
			$email= $_POST['email'];
			$password= $_POST['password'];
			$salt=md5($email.$password);
			$curdir= dirname($_SERVER['PHP_SELF']);
			$photoFolderName= $deliveryBoyId.$firstName.$lastName;
			$oldPhotoFolderName= $deliveryBoyId.$oldFirstName.$oldLastName;
			$path=$url.$curdir."/images/deliveryBoyProfileImages/".$photoFolderName;
			$profilePhotoPath= $path;
			$oldProfilePhotoPath= $url.$curdir."/images/deliveryBoyProfileImages/".$oldPhotoFolderName;
			$profilePhotoVariable= $path."/".$profilePhotoName;

			
			
			if(!empty($deliveryBoyId) && !empty($firstName) && !empty($lastName) && !empty($profilePhoto) && !empty($drivingLicense) && !empty($dateOfBirth) && !empty($email) && !empty($password))
			
			{
				if(substr($profilePhotoType,0,5)=="image")	
				{

				
					$deleteQuery = "DELETE FROM `delivery_boy` WHERE `deliveryBoyId`='".$deliveryBoyId."'";
					$deleteQueryResult = $conn -> query($deleteQuery);
					if($deleteQueryResult)
					{
						
						removeFolder($oldProfilePhotoPath);
					
						if(mkdir($path,0777,true))
						{
								
							$insertQuery = "INSERT INTO `delivery_boy`(`deliveryBoyId`, `firstName`, `lastName`, `profilePhotoPath`, `profilePhotoName`, `drivingLicense`, `dateOfBirth`, `email`, `password`, `salt`) VALUES ('".$deliveryBoyId."', '".$firstName."', '".$lastName."', '".$profilePhotoPath."', '".$profilePhotoName."', '".$drivingLicense."', '".$dateOfBirth."', '".$email."', '".$password."', '".$salt."')";
							$insertResult = $conn -> query($insertQuery);
							move_uploaded_file($profilePhoto,$profilePhotoVariable);
							
							if($insertResult)
							{

								
								$sucess = "Updation Successful";
								header('Location:updateDeliveryBoy.php?sucess='.$sucess);
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
						header('Location:updateDeliveryBoy.php?deliveryBoyId='.$deliveryBoyId.'&error='.$error.'&submitButton=');
					}
						
				}
				else
				{
					$error = "Updation Failed! Please Try Again.Only Images Allowed";
					header('Location:updateDeliveryBoy.php?deliveryBoyId='.$deliveryBoyId.'&error='.$error.'&submitButton=');
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
                                <h4 class="pull-left page-title">Update Delivery Boy</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Delivery Boy</a></li>
                                    <li class="active">Update Delivery Boy</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
						
					<?php
                    if(isset($_GET['deliveryBoyId']))
					{
                        $deliveryBoyId = $_GET['deliveryBoyId'];
                        $selectSingleDeliveryBoyQuery = "SELECT * FROM `delivery_boy` WHERE `deliveryBoyId` = '$deliveryBoyId'";
                        $deliveryBoyResults = $conn -> query($selectSingleDeliveryBoyQuery);
						$deliveryBoyCount = mysqli_num_rows($deliveryBoyResults);
						if(!$deliveryBoyCount==1)
						{
							$error="Please Enter valid Delivery Boy Id";
							header('Location:updateDeliveryBoy.php?error='.$error.'&submitButton=');
						}
						
						else
						{
								$deliveryBoyData = mysqli_fetch_assoc($deliveryBoyResults);
								
								$deliveryBoyId= $deliveryBoyData['deliveryBoyId'];
								$firstName= $deliveryBoyData['firstName'];
								$lastName= $deliveryBoyData['lastName'];
								$profilePhotoPath=$deliveryBoyData['profilePhotoPath'];
								$profilePhotoName=$deliveryBoyData['profilePhotoName'];
								$drivingLicense= $deliveryBoyData['drivingLicense'];
								$dateOfBirth=$deliveryBoyData['dateOfBirth'];
								$email= $deliveryBoyData['email'];
								$password= $deliveryBoyData['password'];
								$salt= $deliveryBoyData['salt'];

								if(!empty($deliveryBoyId))
								{
									?>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Update Delivery Boy Details</h3>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
														<div class="form-group">
															<label class="col-md-2 control-label">Delivery Boy Id</label>
															<div class="col-md-10">
																<input type="text" name="deliveryBoyId" class="form-control" placeholder="DBY0x" required="required" value="<?php echo $deliveryBoyId;?>" disabled>
																<input type="hidden" name="oldDeliveryBoyId" class="form-control" value="<?php echo $deliveryBoyId;?>">
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
															<label class="col-md-2 control-label">Profile Photo</label>
															<div class="col-md-10">
																<input type="file" name="profilePhoto" class="form-control" required="required">
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Driving License</label>
															<div class="col-md-10">
																<input type="text" name="drivingLicense" class="form-control" value="<?php echo $drivingLicense;?>" placeholder="ASDFGH1234567" required="required">
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Date Of Birth</label>
															<div class="col-md-10">
																<input type="date" name="dateOfBirth" class="form-control" value="<?php echo $dateOfBirth;?>" placeholder="1990-12-12" required="required">
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
														<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Update Delivery Boy Details</button>
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
										<h3 class="panel-title">Enter Delivery Boy Id</h3></div>
									<div class="panel-body">
										<form class="form-horizontal" role="form" method="get" action="<?php echo $current_file; ?>">
											<div class="form-group">
												<label class="col-md-2 control-label">Delivery Boy Id</label>
												<div class="col-md-10">
													<input type="text" name="deliveryBoyId" class="form-control" placeholder="DBY0x">
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
											echo "<span class=\"alert-info\"> Search Delivery Boy Details Below</span>";
										}
										?>
										<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Search Delivery Boy</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php
					}
				
					include 'modules/allDeliveryBoy.php';
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