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
		$selectDeliveryBoy = "SELECT * FROM `delivery_boy`";
		$selectDeliveryBoyResults = $conn -> query($selectDeliveryBoy);
	

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
		$lastName= '';
		$profilePhoto='';
		$profilePhotoPath= '';
		$profilePhotoName= '';
		$profilePhotoType= '';
		$drivingLicense='';
		$dateOfBirth='';
		$email= '';
		$password= '';
		$salt='';
		$curdir='';
		$photoFolderName='';
		
		
		if(isset($_POST['submitButton']))
		{
			$deliveryBoyId= $_POST['deliveryBoyId'];
			$firstName= $_POST['firstName'];
			$lastName= $_POST['lastName'];
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
			$path=$url.$curdir."/images/deliveryBoyProfileImages/".$photoFolderName;
			$profilePhotoPath= $path;
			$profilePhotoVariable= $path."/".$profilePhotoName;
			
		
			if(!empty($deliveryBoyId) && !empty($firstName) && !empty($lastName) && !empty($profilePhoto) && !empty($drivingLicense) && !empty($dateOfBirth) && !empty($email) && !empty($password) && !empty($salt))	
			{
				
					$selectDeliveryBoyQuery = "SELECT * FROM `delivery_boy` WHERE `deliveryBoyId` ='$deliveryBoyId'";
					$selectDeliveryBoyQueryResults = $conn -> query($selectDeliveryBoyQuery);
					
					
					
					if($selectDeliveryBoyQueryResults ->num_rows == 0)
					{
						
						if(substr($profilePhotoType,0,5)=="image")	
						{
							
							if(mkdir($path,0777,true))
							{
								
								$insertQuery = "INSERT INTO `delivery_boy`(`deliveryBoyId`, `firstName`, `lastName`, `profilePhotoPath`, `profilePhotoName`, `drivingLicense`, `dateOfBirth`, `email`, `password`, `salt`) VALUES ('".$deliveryBoyId."', '".$firstName."', '".$lastName."', '".$profilePhotoPath."', '".$profilePhotoName."', '".$drivingLicense."', '".$dateOfBirth."', '".$email."', '".$password."', '".$salt."')";
								$insertResult = $conn -> query($insertQuery);
								move_uploaded_file($profilePhoto,$profilePhotoVariable);
								
								if($insertResult)
								{
									$sucess = "Insertion Successful";
									header('Location:addDeliveryBoy.php?sucess='.$sucess);
								} 
								else
								{
									$error = "Insertion Failed! Please Try Again.";
								}
							}
							else
							{
								$error = "Unable to create directory! Please Try Again.";
							}
						}
						else
						{
							$error = "Insertion Failed! Please Try Again.Only Images Allowed";
						}
					}
					else 
					{
						$error = "Insertion Failed! Delivery Boy With Same Id Already exists";
					
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
	
	
		<?php
			include 'common/nav.php';
		?>
	

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
                                <h4 class="pull-left page-title">Add Delivery Boy</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Delivery Boy</a></li>
                                    <li class="active">Add Delivery Boy</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
					
					<div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Enter Delivery Boy Details</h3></div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Delivery Boy Id</label>
                                        <div class="col-md-10">
                                            <input type="text" name="deliveryBoyId" class="form-control" placeholder="DBY0x" required="required" value="<?php echo $deliveryBoyId;?>">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">First Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="firstName" class="form-control" value="<?php echo $firstName;?>" placeholder="Pankaj" required="required">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">lastName</label>
                                        <div class="col-md-10">
                                            <input type="text" name="lastName" class="form-control" value="<?php echo $lastName;?>" placeholder="Jha" required="required">
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
                                            <input type="text" name="drivingLicense" class="form-control" placeholder="ASDFG1234567" value="<?php echo $drivingLicense;?>" required="required">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Date Of Birth</label>
                                        <div class="col-md-10">
                                            <input type="date" name="dateOfBirth" class="form-control" required="required">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Email Id</label>
                                        <div class="col-md-10">
                                            <input type="text" name="email" class="form-control" placeholder="abc@gmail.com" value="<?php echo $email;?>" required="required">
                                        </div>
                                    </div>

									<div class="form-group">
                                        <label class="col-md-2 control-label">Password</label>
                                        <div class="col-md-10">
                                            <input type="password" name="password" class="form-control"  required="required">
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
										echo "<span class=\"alert-info\"> See Delivery Boy Details Below</span>";
									}
                                    ?>
                                    <button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Add Delivery Boy</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
		
				<?php
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