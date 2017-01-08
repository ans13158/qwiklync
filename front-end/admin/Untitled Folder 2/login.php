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
	else if(isset($_SESSION['sucessfulSignup']))
	{
		$sucessful=$_SESSION['sucessfulSignup'];
		?>
	
	<!DOCTYPE html>
		<html>

		<head>
			<meta charset="utf-8" />
			<title>Xadmino - Responsive Admin Dashboard Template</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, admin-scalable=no" />
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
						<h4 class="text-muted text-center m-t-0"><b>Sign In</b></h4>
						<form class="form-horizontal m-t-20" action="<?php echo $current_file; ?>" method="POST">
							<div class="form-group">
								<div class="col-xs-12">
									<input class="form-control" type="text" required="" placeholder="Email" name="admin_Email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<input class="form-control" type="password" required="" placeholder="Password" name="admin_Password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<div class="checkbox checkbox-primary">
										<input id="checkbox-signup" type="checkbox">
										<label for="checkbox-signup"> Remember me </label>
									</div>
								</div>
							</div>
							<div class="form-group text-center m-t-20">
								<div class="col-xs-12">
									<button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
								</div>
							</div>
							<div>
								<p style="color:green;"><b><?php echo $sucessful; ?></b></p>
							</div>

							<div class="form-group m-t-30 m-b-0">
								<div class="col-sm-7"> <a href="pages-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a></div>
								<div class="col-sm-5 text-right"> <a href="registration.php" class="text-muted">Create an account</a></div>
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
	session_destroy();

	}
	else//if session is not set
	{	
		$error='';
		$admin_Email='';
		if(isset($_POST['admin_Email']) && isset($_POST['admin_Password']))
		{
			$admin_Email= $_POST['admin_Email'];
			$admin_Password= $_POST['admin_Password'];
			$admin_Salt=md5($admin_Email.$admin_Password);
			
			if(!empty($admin_Email) && !empty($admin_Password))
			{
				$query= "select adminId from admin where email = '$admin_Email' and salt = '$admin_Salt'";
				$result = mysqli_query($conn,$query);
     
				$count = mysqli_num_rows($result);
				if($count==1)
				{
						$row=mysqli_fetch_row($result);
						$admin_id=$row[0];
						$_SESSION['adminId']= $admin_id;
						header('Location: index.php');
				}	
				else
				{
					$error= 'Please Enter Valid Password OR Email.';
				}
			
				
			}
		}
				
		?>
		
		<!DOCTYPE html>
		<html>

		<head>
			<meta charset="utf-8" />
			<title>Xadmino - Responsive Admin Dashboard Template</title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, admin-scalable=no" />
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
						<h4 class="text-muted text-center m-t-0"><b>Sign In</b></h4>
						<form class="form-horizontal m-t-20" action="<?php echo $current_file; ?>" method="POST">
							<div class="form-group">
								<div class="col-xs-12">
									<input class="form-control" type="text" required="" placeholder="Email" name="admin_Email" value="<?php echo $admin_Email?>">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<input class="form-control" type="password" required="" placeholder="Password" name="admin_Password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<div class="checkbox checkbox-primary">
										<input id="checkbox-signup" type="checkbox">
										<label for="checkbox-signup"> Remember me </label>
									</div>
								</div>
							</div>
							<div class="form-group text-center m-t-20">
								<div class="col-xs-12">
									<button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
								</div>
							</div>
							<div>
								<p style="color:red;"><?php echo $error; ?></p>
							</div>
							<div class="form-group m-t-30 m-b-0">
								<div class="col-sm-7"> <a href="pages-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a></div>
								<div class="col-sm-5 text-right"> <a href="pages-register.html" class="text-muted">Create an account</a></div>
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
