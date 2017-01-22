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
		
		//Get email data from $_GET
		$adminId = $_SESSION['adminId'];
		//Select Admin Details from the DB
		$getAdminData = "SELECT * FROM `admin` WHERE `adminId` = '$adminId'";
		$adminDataResult = $conn -> query($getAdminData);
		$adminData = mysqli_fetch_assoc($adminDataResult);

		//Get All Restaurant Details
		$selectJobQuery = "SELECT * FROM `job`";
		$jobResults = $conn -> query($selectJobQuery);
		
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
                                <h4 class="pull-left page-title">View All Jobs</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Job</a></li>
                                    <li class="active">View All Jobs</li>
                                </ol>
                                <div class="clearfix"></div>
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
    </div>
</body>

</html>
<?php
}
?>