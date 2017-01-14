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
		
		if(isset($_POST['submit']))
		{
			$email= $_POST['email'];
			$password= $_POST['password'];
			$salt=md5($email.$password);
			
			$query= "SELECT `adminId` FROM `admin` WHERE `email`='$email' AND `salt`='$salt'";
			$result = mysqli_query($conn,$query);
 
			$count = mysqli_num_rows($result);
			if($count==1)
			{
					$row=mysqli_fetch_row($result);
					$adminId=$row[0];
					$_SESSION['adminId']= $adminId;
					header('Location: index.php');
			}	
			else
			{
				$error= 'Please Enter Valid Email or Password.';
			}
			
				
			
		}
				
?>
		
	
	<!DOCTYPE html>
		<html>

		<head>
			<meta charset="utf-8" />
			<title>Qwiklync - Admin Login</title>
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
						<div class="text-center" style="background-color:blue;"> <span class=""><img src="assets/images/logo.png" alt="logo" height="60px"></span></div>
						<br></br><h4 class="text-muted text-center m-t-0"><b>Sign In</b></h4>
						<form class="form-horizontal m-t-20" action="<?php echo $current_file; ?>" method="POST">
							<div class="form-group">
								<div class="col-xs-12">
									<input class="form-control" type="email" required="required" value="<?php echo $email;?>" placeholder="Email" name="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<input class="form-control" type="password" required="required" placeholder="Password" name="password">
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
								   <button type="submit" class="btn btn-info waves-effect waves-light m-l-10" name="submit">Sign In</button>
								</div>
							</div>
						
						</form>

							<div class="form-group m-t-30 m-b-0">
								<div class="col-sm-7"> <a href="#" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a></div>
								<div class="col-sm-5 text-right"> <a href="signUp.php" class="text-muted">Create an account</a></div>
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
