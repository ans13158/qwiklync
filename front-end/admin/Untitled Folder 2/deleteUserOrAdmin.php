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
		$adminResult = $conn -> query($getAdminData);
		$adminResultData = mysqli_fetch_assoc($adminResult);
		
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
		
		//Get All User Details
		$selectUser = "SELECT * FROM `users`";
		$selectUsersResults = $conn -> query($selectUser);

		//Get All Admin Details
		$selectAdmin = "SELECT * FROM `admin`";
		$adminResults = $conn -> query($selectAdmin);

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
                                <h4 class="pull-left page-title">Delete User/Admin</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">User</a></li>
                                    <li class="active">Delete User/Admin</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
					
					<?php
					
						 if(isset($_GET['submit']))
						 {
							$option='';
							$option=$_GET['option'];
							
							if($option=="user")
							{
								header('Location:deleteUser.php');
							}
							else
							{
								header('Location:deleteAdmin.php');
							}
							
						 }
						
					?>
					
					<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title">Select Correct Option</h3></div>
									<div class="panel-body">
										<form class="form-horizontal" role="form" method="get" action="<?php echo $current_file; ?>">
											<div class="form-group">
												<label class="col-md-2 control-label">Select Option</label>
												<div class="col-md-10">
													<select class="form-control" name="option">
														<option value="user" >User</option>
														<option value="admin" >Admin</option>
													</select>
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
											echo "<span class=\"alert-info\"> Search User/Admin Details Below</span>";
										}
										?>
										<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submit">Submit</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					
				<?php
					include 'modules/allUser.php';
				?>
		
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

