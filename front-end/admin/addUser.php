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
		$lastName= '';
		$phone='';
		$profilePhoto= '';
		$profilePhotoName= '';
		$profilePhotoPath= '';
		$profilePhotoType= '';
		$photoFolderName='';
		
		
		if(isset($_POST['submitButton']))
		{
			$userId= $_POST['userId'];
			$email= $_POST['email'];
			$password= $_POST['password'];
			$salt=md5($email.$password);
			$firstName= $_POST['firstName'];
			$lastName= $_POST['lastName'];
			$phone= $_POST['phone'];
			$profilePhoto= $_FILES['profilePhoto']['tmp_name'];
			$profilePhotoType= $_FILES['profilePhoto']['type'];
			$profilePhotoName= $_FILES['profilePhoto']['name'];
			$curdir= dirname($_SERVER['PHP_SELF']);
			$photoFolderName= $userId.$firstName.$lastName;
			$path=$url.$curdir."/images/userProfileImages/".$photoFolderName;
			$profilePhotoPath= $path;
			$profilePhotoVariable= $path."/".$profilePhotoName;
			
			
			if(!empty($userId) && !empty($email) && !empty($password) && !empty($firstName) && !empty($lastName) && !empty($phone) && !empty($profilePhoto))	
			{
				$selectUsersQuery = "SELECT * FROM `users` WHERE `userId` ='$userId'";
				$usersQueryResults = $conn -> query($selectUsersQuery);
				
				
				if($usersQueryResults ->num_rows == 0)
				{
					
					if(substr($profilePhotoType,0,5)=="image")	
					{
						
						if(mkdir($path,0777,true))
						{
							
							//Insertion Query is not working
							$insertQuery = "INSERT INTO `users`(`userId`, `email`, `password`, `salt`, `firstName`, `lastName`, `phone`, `profilePhotoPath`, `profilePhotoName`) VALUES (`".$userId."`, `".$email."`, `".$password."`, `".$salt."`, `".$firstName."`, `".$lastName."`, `".$phone."`, `".$profilePhotoPath."`, `".$profilePhotoName."`)";
							$insertResult = $conn -> query($insertQuery);
							
							move_uploaded_file($profilePhoto,$profilePhotoVariable);
							
							if($insertResult)
							{
								$sucess = "Insertion Successful";
								header('Location:addUser.php?sucess='.$sucess);
							} else
							{
								$error = "Insertion Failed! Please Try Again ";
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
					$error = "Insertion Failed! User With Same Id Already exists";
				
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
                                <h4 class="pull-left page-title">Add User</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">User</a></li>
                                    <li class="active">Add User</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
					
					<div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Enter User Details</h3></div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">User Id</label>
                                        <div class="col-md-10">
                                            <input type="text" name="userId" class="form-control" placeholder="USR0x" required="required" value="<?php echo $userId;?>">
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
                                        <label class="col-md-2 control-label">Phone Number</label>
                                        <div class="col-md-10">
                                            <input type="text" name="phone" class="form-control" value="<?php echo $phone;?>" placeholder="9897456234" required="required">
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
                                    } else if(!$error == "")
									{
                                        echo "<span <b style=\"color:red\">".$error."</b></span>";
                                    }
									else
									{
										echo "<span class=\"alert-info\"> See Users Details Below</span>";
									}
                                    ?>
                                    <button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Add User</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
		
				<?php
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