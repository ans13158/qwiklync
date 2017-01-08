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

		//Get All Menu Details
		$menuDetails = "SELECT * FROM `food`";
		$menuDetailsResults = $conn -> query($menuDetails);
	

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
		
		if(isset($_POST['submitButton']))
		{
			$deleteQuery="DELETE FROM `food`";
			$deleteResult = mysqli_query($conn,$deleteQuery);
			if($deleteResult)
			{
				$sucess = "Deletion Sucessful.Add New Menu.";
				header('Location:addMenu.php?sucess='.$sucess);
			}
			else
			{
				$error = "Deletion Filed! Try Again.";
				header('Location:deleteMenuComplete.php?error='.$error);

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
                                <h4 class="pull-left page-title">Delete Menu</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Menu</a></li>
                                    <li class="active">Delete Menu</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
					

					
					
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">Delete Complete Menu</h3>
								</div>
								<div class="panel-body">
									<form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
										<div class="form-group">
											<div class="modal bs-example-modal" tabindex="-1" role="dialog">
												<div class="modal-dialog" role="document">
														<div class="col-lg-12">
															<div class="panel panel-fill panel-danger">
																<div class="panel-body">
																	<p style="font-size:20px"><b>Are you sure for deleting the complete Menu?</b></p>
																</div>
															</div>
														</div>	
												</div>
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
										echo "<span class=\"alert-info\"> See Menu Details Below</span>";
									}
                                    ?>
                                    <button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Delete Menu </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
		
				<?php
					include 'modules/allMenuDetails.php';
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

