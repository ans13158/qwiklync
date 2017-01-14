<?php
	ob_start();
	$current_file= $_SERVER['SCRIPT_NAME'];
	//Starting Session
	session_start();
	
	//connecting to database
	include 'connection.php';
	
	//Validating Existing Session
	if(isset($_SESSION['adminId'])){
		header('Location:index.php');
	}
	else//if session is not set
	{	
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
	
		$email= '';
		$firstName= '';
		$lastName= '';
		
		if(isset($_POST['submit']))
		{
			$email= $_POST['email'];
			$password= $_POST['password'];
			$confirmPassword= $_POST['confirmPassword'];
			$firstName= $_POST['firstName'];
			$lastName= $_POST['lastName'];
			
			$photo= $_FILES['photo']['tmp_name'];
			$photoType= $_FILES['photo']['type'];
			$photoName= $_FILES['photo']['name'];
			$uniq=uniqid();
			
			$photoFolderName= $email.$photoName.$uniq;
			$path="../admin/adminPhoto/".$photoFolderName;
			$photoPath= $path;
			$photoVariable= $path."/".$photoName;
			
			if($password == $confirmPassword)
			{				
				if(substr($photoType,0,5)=="image")	
				{
			
					$salt = md5($email.$password);
					if(mkdir($path,0777,true))
					{
						
						$insertQuery = "INSERT INTO `admin`(`email`, `password`, `salt`, `firstName`, `lastName`, `photoPath`, `photoName`) VALUES ('$email', '$password', '$salt', '$firstName', '$lastName', '$photoPath', '$photoName')";
						$insertResult = $conn -> query($insertQuery);
						move_uploaded_file($photo,$photoVariable);
						
						if($insertResult)
						{
							$sucess = "Registration Sucessfull.";
							header('Location:signUp.php?sucess='.$sucess);
						} 
						else
						{
							$error = "Insert Query is not Working! Please try again.";
						}
					}
					else
					{
						$error = "Unable to create directory! Please Try Again.";
					}
				}
				else
				{
					$error = "Registration failed! Please try again. Only images allowed";
				}
			}
			else
			{
				$error = "Please enter same password.";
			}
		}
?>
		
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Qwiklync -Admin SignUp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="panel panel-color panel-primary panel-pages">
            <div class="panel-body">
                <div class="text-center" style="background-color:blue;"> <span class=""><img src="assets/images/logo.png" alt="logo" height="60px"></span></div>
                <br></br><h4 class="text-muted text-center m-t-0"><b>Sign Up</b></h4>
                <form class="form-horizontal m-t-20" action="<?php echo $current_file; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" required="required" placeholder="Email" name="email" value="<?php echo $email;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="required" name="password" placeholder="Password">
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="required" name="confirmPassword" placeholder="Confirm Password">
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="required" placeholder="First Name" name="firstName" value="<?php echo $firstName;?>">
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="required" placeholder="Last Name" name="lastName" value="<?php echo $lastName;?>">
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-md-5 control-label">Upload ProfilePhoto</label>
						<div class="col-md-7">
							<input type="file" name="photo" class="form-control" required="required">
						</div>
					</div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox" checked="checked" required="required">
                                <label for="checkbox-signup"> I accept all Terms and Conditions</label>
                            </div>
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
						
					?>
						       
				   <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                           <button type="submit" class="btn btn-info waves-effect waves-light m-l-10" name="submit">Register</button>
                        </div>
                    </div>
				
				</form>

					<div class="form-group m-t-30 m-b-0">
                        <div class="col-sm-12 text-center"> <a href="login.php" class="text-muted">Already have account?</a></div>
                    </div>
               
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>
<?php

	}

?>