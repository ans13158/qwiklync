<?php
	ob_start();
	$current_file= $_SERVER['SCRIPT_NAME'];
	//Starting Session
	session_start();
	
	//connecting to database
	include 'connection.php';
	
	//Validating Existing Session
	if(isset($_SESSION['admin_Id'])){
		header('Location:index.php');
	}
	else//if session is not set
	{	
		$admin_Email= '';
		$admin_Username= '';
		$admin_First_Name= '';
		$admin_Last_Name= '';
		$error='';
		if(isset($_POST['admin_Email']) && isset($_POST['admin_Username']) && isset($_POST['admin_Password']) && isset($_POST['admin_First_Name']) && isset($_POST['admin_Last_Name']))
		{
			$admin_Email= $_POST['admin_Email'];
			$admin_Username= $_POST['admin_Username'];
			$admin_Password= $_POST['admin_Password'];
			$admin_Salt=md5($admin_Email.$admin_Password);
			$admin_First_Name= $_POST['admin_First_Name'];
			$admin_Last_Name= $_POST['admin_Last_Name'];
			
			if(!empty($admin_Email) && !empty($admin_Username) && !empty($admin_Password) && !empty($admin_Salt) && !empty($admin_First_Name) && !empty($admin_Last_Name))
			{
				$query="Select username from admin where username='$admin_Username'";
				$result=mysqli_query($conn,$query);
				$count = mysqli_num_rows($result);
				if($count==1)
				{
						$error= 'Username already exist.Try different username.';
						$admin_Username='';
				}	
				else
				{
					$query1="Insert into admin  values ('','$admin_First_Name','$admin_Last_Name','$admin_Username','$admin_Email','','$admin_Password','$admin_Salt','','','','','','')";
					if(mysqli_query($conn,$query1))
					{
						$_SESSION['sucessfulSignup']= 'Sucessful Signup';
						header('Location:login.php');
					}
					else
					{
						$error= 'Sorry unable to register you this time.Try again Later.';
					}
					
				}
			}
		}
?>
		
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Xadmino - Responsive Admin Dashboard Template</title>
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
                <h3 class="text-center m-t-0 m-b-30"> <span class=""><img src="assets/images/logo_dark.png" alt="logo" height="32"></span></h3>
                <h4 class="text-muted text-center m-t-0"><b>Sign Up</b></h4>
                <form class="form-horizontal m-t-20" action="<?php echo $current_file; ?>" method="POST">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" required="" placeholder="Email" name="admin_Email" value="<?php echo $admin_Email;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Username" name="admin_Username" value="<?php echo $admin_Username;?>" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" name="admin_Password" placeholder="Password">
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="First Name" name="admin_First_Name" value="<?php echo $admin_First_Name;?>">
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Last Name" name="admin_Last_Name" value="<?php echo $admin_Last_Name;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox" checked="checked">
                                <label for="checkbox-signup"> I accept <a href="pages-register.html#">Terms and Conditions</a> </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </div>
					<div>
						<p style="color:red;"><?php echo $error; ?></p>
					</div>
                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-sm-12 text-center"> <a href="pages-login.html" class="text-muted">Already have account?</a></div>
                    </div>
                </form>
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