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
		$selectAdminData = mysqli_fetch_assoc($adminDataResult);

		//Get All User Details
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
		$lastName= '';
		$userName= '';
		$email= '';
		$phone='';
		$password= '';
		$salt='';
		
		$profilePhoto='';
		$profilePhotoPath= '';
		$profilePhotoName= '';
		$profilePhotoType= '';
		$drivingLicense='';
		$role='';
		$idCardType='';
		$idCard='';
		$dOB='';
		
		$curdir='';
		$photoFolderName='';
		
		
		if(isset($_POST['submitButton']))
		{
			$adminFormId= $_POST['adminFormId'];
			$firstName= $_POST['firstName'];
			$lastName= $_POST['lastName'];
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
			$path=$url.$curdir."/images/adminProfileImages/".$photoFolderName;
			$profilePhotoPath= $path;
			$profilePhotoVariable= $path."/".$profilePhotoName;
			
			
			if(!empty($adminFormId) && !empty($firstName) && !empty($lastName) && !empty($userName) && !empty($email) && !empty($phone) && !empty($password) && !empty($profilePhoto) && !empty($role) && !empty($idCardType) && !empty($idCard) && !empty($dOB)  )	
			{
					//Select Query is not working
					$adminQuery = "SELECT * FROM `admin` WHERE `adminId` ='".$adminFormId."'";
					$adminGetResults = $conn -> query($adminQuery);
					
					
					
					if($adminGetResults ->num_rows == 0)
					{
				
						if(substr($profilePhotoType,0,5)=="image")	
						{
							
							if(mkdir($path,0777,true))
							{
								
								$insertQuery = "INSERT INTO `admin`(`adminId`, `firstName`, `lastName`, `userName`, `email`, `phone`, `password`, `salt`, `profilePhotoPath`, `profilePhotoName`, `role`, `idCardType`, `idCard`, `dOB`) VALUES (`".$adminFormId."`, `".$firstName."`, `".$lastName."`, `".$userName."`, `".$email."`, `".$phone."`, `".$password."`, `".$salt."`, `".$profilePhotoPath."`, `".$profilePhotoName."`, `".$role."`, `".$idCardType."`, `".$idCard."`, `".$dOB."`)";
								$insertResult = $conn -> query($insertQuery);
								
								
								if($insertResult)
								{
								
									move_uploaded_file($profilePhoto,$profilePhotoVariable);
									$sucess = "Insertion Successful";
									header('Location:addAdmin.php?sucess='.$sucess);
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
						$error = "Insertion Failed! Admin With Same Id Already exists";
					
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
                                <h4 class="pull-left page-title">Add Admin</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Admin</a></li>
                                    <li class="active">Add Admin</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
					
					<div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Enter Admin Details</h3></div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Admin Id</label>
                                        <div class="col-md-10">
                                            <input type="text" name="adminFormId" class="form-control" placeholder="ADM0x" required="required" value="<?php echo $adminFormId;?>">
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
                                        <label class="col-md-2 control-label">UserName</label>
                                        <div class="col-md-10">
                                            <input type="text" name="userName" class="form-control" value="<?php echo $userName;?>" placeholder="Pankaj123" required="required">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Email Id</label>
                                        <div class="col-md-10">
                                            <input type="text" name="email" class="form-control" placeholder="abc@gmail.com" value="<?php echo $email;?>" required="required">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Phone Number</label>
                                        <div class="col-md-10">
                                            <input type="text" name="phone" class="form-control" placeholder="9897674534" value="<?php echo $phone;?>" required="required">
                                        </div>
                                    </div>

									<div class="form-group">
                                        <label class="col-md-2 control-label">Password</label>
                                        <div class="col-md-10">
                                            <input type="password" name="password" class="form-control"  required="required">
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
                                            <select class="form-control" name="role">
											
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
                                            <select class="form-control" name="idCardType">
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
                                            <input type="text" name="idCard" class="form-control" placeholder="ASDFG1234567" value="<?php echo $idCard;?>" required="required">
                                        </div>
                                    </div>
									

									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Date Of Birth</label>
                                        <div class="col-md-10">
                                            <input type="date" name="dOB" class="form-control" required="required">
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
										echo "<span class=\"alert-info\"> See Admin Details Below</span>";
									}
                                    ?>
                                    <button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Add Admin</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
		
				<?php
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