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
		
		
		
		if(isset($_POST['submitButton']))
		{
			$deliveryBoyId= $_POST['oldDeliveryBoyId'];
			
			if(!empty($deliveryBoyId))
			
			{
				$selectDeleteQuery = "SELECT * FROM `delivery_boy` WHERE `deliveryBoyId` ='".$deliveryBoyId."'";
				$selectDeleteQueryResults = $conn -> query($selectDeleteQuery);

				if($selectDeleteQueryResults ->num_rows == 1)
				{
					$pathQuery="Select profilePhotoPath From `delivery_boy` WHERE `deliveryBoyId`='".$deliveryBoyId."'";
					$pathQueryResults = $conn -> query($pathQuery);
					$pathData = mysqli_fetch_assoc($pathQueryResults);
					$profilePhotoPath=$pathData['profilePhotoPath'];
					
					
					$deleteQuery = "DELETE FROM `delivery_boy` WHERE `deliveryBoyId`='".$deliveryBoyId."'";
					$deleteQueryResult = $conn -> query($deleteQuery);
					if($deleteQueryResult)
					{
						
						removeFolder($profilePhotoPath);
											
						$sucess = "Delete Successful";
						header('Location:deleteDeliveryBoy.php?sucess='.$sucess);
					}
					else
					{
						$error = "Delete Failed! Please Try Again Later";
						header('Location:deleteDeliveryBoy.php?error='.$error);
					}
					
				}
				else
				{
					$error = "Please Enter Valid Delivery Boy ID";
					header('Location:deleteDeliveryBoy.php?error='.$error);
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
                                <h4 class="pull-left page-title">Delete Delivery Boy</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Delivery Boy</a></li>
                                    <li class="active">Delete Delivery Boy</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
							<div></div>
                        </div>
                    </div>
					
					<?php
                    if(isset($_GET['deliveryBoyId']))
					{
                        $deliveryBoyId = $_GET['deliveryBoyId'];
                        $selectDeliveryBoy = "SELECT * FROM `delivery_boy` WHERE `deliveryBoyId` = '$deliveryBoyId'";
                        $deliveryBoyResults = $conn -> query($selectDeliveryBoy);
						$deliveryBoyCount = mysqli_num_rows($deliveryBoyResults);
						if(!$deliveryBoyCount==1)
						{
							$error="Please Enter valid Delivery Boy Id";
							header('Location:deleteDeliveryBoy.php?error='.$error.'&submitButton=');
						}
						
						else
						{
								$deliveryBoyData = mysqli_fetch_assoc($deliveryBoyResults);
								
								$deliveryBoyId= $deliveryBoyData['deliveryBoyId'];
								$firstName= $deliveryBoyData['firstName'];
								$lastName= $deliveryBoyData['lastName'];
								$profilePhotoName=$deliveryBoyData['profilePhotoName'];
								$drivingLicense= $deliveryBoyData['drivingLicense'];
								$dateOfBirth=$deliveryBoyData['dateOfBirth'];
								$email= $deliveryBoyData['email'];
								$password= $deliveryBoyData['password'];
								
								
								if(!empty($deliveryBoyId))
								{
									?>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Delete Delivery Boy Details</h3>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
														<div class="form-group">
															<label class="col-md-2 control-label">Delivery Boy Id</label>
															<div class="col-md-10">
																<input type="text" name="deliveryBoyId" class="form-control" placeholder="DBY0x" required="required" value="<?php echo $deliveryBoyId;?>" disabled>
																<input type="hIdden" name="oldDeliveryBoyId" class="form-control" value="<?php echo $deliveryBoyId;?>">
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
															<label class="col-md-2 control-label">Profile Photo Name</label>
															<div class="col-md-10">
																<input type="text" name="profilePhotoName" class="form-control"  value="<?php echo $profilePhotoName;?>" placeholder="abc.jpg" required="required" disabled>
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Driving License</label>
															<div class="col-md-10">
																<input type="text" name="drivingLicense" class="form-control"  value="<?php echo $drivingLicense;?>" placeholder="ASDFGH1234567" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Date Of Birth</label>
															<div class="col-md-10">
																<input type="text" name="dateOfBirth" class="form-control" value="<?php echo $dateOfBirth;?>" placeholder="1990-12-12" required="required" disabled>
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
														<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Delete Delivery Boy Details</button>
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
    </div>
</body>
</html>
<?php
}
?>