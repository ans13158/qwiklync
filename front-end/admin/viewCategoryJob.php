<?php
ob_start();
$current_file= $_SERVER['SCRIPT_NAME'];
// Start Session
session_start();

include '../connection.php';

	$selectJobQuery = "" ;
	$selectJobQueryResults = "" ;
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
		
		if(isset($_GET['category']) )  {
			$category = $_GET['category'] ;
			$selectJobQuery = "SELECT * FROM `job` WHERE `category` LIKE '$category'";
		}
		else  {
		$selectJobQuery = "SELECT * FROM `job`";
	}
		$jobResults = $conn -> query($selectJobQuery);


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
                                <h4 class="pull-left page-title">View Category Jobs	</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Job</a></li>
                                    <li class="active">View Category Jobs</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
					
					<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title">Enter Job Category</h3></div>
									<div class="panel-body">
										<form class="form-horizontal" role="form" method="get" action="<?php echo $current_file; ?>">
											<div class="form-group">
												<label class="col-md-2 control-label">Job Category</label>
												<div class="col-md-10">
													<input type="text" name="category" class="form-control" placeholder="Computer & IT">
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
											echo "<span class=\"alert-info\"> Search Job Details Below</span>";
										}
										?>
										<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" >Search Job Category</button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<?php
					include 'modules/allJobs.php';
					?>
				
					<?php
						include 'common/footer.php';
					?>
			</div>
		</div>
	</div>
</body>
<?php
}
?>	
					