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

		//Get All Job Details
		$selectJobQuery = "SELECT * FROM `job` ";
		$jobResults = $conn->query($selectJobQuery);
		//echo "yes";

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
		
		$jobId="";
		$jobTitle="";

				
		if(isset($_POST['submitButton']))
		{
			$jobId= $_POST['jobId'];
	
			if(!empty($jobId))
			
			{
				
				$selectSingleJobQuery = "SELECT * FROM `job` WHERE `jobId` ='".$jobId."'";
				$selectSingleJobQueryResults = $conn -> query($selectSingleJobQuery);

				if($selectSingleJobQueryResults ->num_rows == 1)
				{
					$pathQuery="Select `jobId`,`title` From `job` WHERE `jobId`='".$jobId."'";
					
					
					$deleteQuery = "DELETE FROM `job` WHERE `jobId`='".$jobId."'";
					$deleteQueryResult = $conn -> query($deleteQuery);
					if($deleteQueryResult)
					{
						$sucess = "Delete Successful";
						header('Location:deleteJob.php?sucess='.$sucess);
					}
					else
					{
						
						$error = "Delete Failed! Please Try Again Later";
						header('Location:deleteJob.php?error='.$error);
					}
				}
				else
				{
					$error = "Please Enter Valid Job ID";
					header('Location:deleteJob.php?error='.$error);
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
                                <h4 class="pull-left page-title">Delete Job</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Job</a></li>
                                    <li class="active">Delete Job</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
							<div></div>
                        </div>
                    </div>
					
					<?php
                    if(isset($_GET['jobId']))
					{
                        $jobId = $_GET['jobId'];
                        $selectSingleJobQuery = "SELECT * FROM `job` WHERE `jobId` = '$jobId'";
                        $singleJobResults = $conn -> query($selectSingleJobQuery);
						$singleJobResultsCount = mysqli_num_rows($singleJobResults);
						if(!$singleJobResultsCount==1)
						{
							$error="Please Enter valid Job Id";
							header('Location:deleteJob.php?error='.$error.'&submitButton=');
						}
						
						else
						{
								$singleJobData = mysqli_fetch_assoc($singleJobResults);
								
								$jobId= $singleJobData['jobId'];
								$title= $singleJobData['title'];
								$location= $singleJobData['location'];
								$category= $singleJobData['category'];
								$subCategory= $singleJobData['subCategory'];
								$type= $singleJobData['type'];
								$vacancy= $singleJobData['vacancy'];
								$experience= $singleJobData['experience'];
								$salary= $singleJobData['salary'];
								$postedOn= $singleJobData['postedOn'];
								$lastDate = $singleJobData['lastDate'];
								$kind = $singleJobData['kind'];
								$tags = $singleJobData['tags'];

								if(!empty($jobId))
								{
									?>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Delete Job</h3>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>"" onsubmit="return confirm('Are you sure you want to delete?')" " >
														<div class="form-group">
															<label class="col-md-2 control-label">Job Id</label>
															<div class="col-md-10">
																
																<input type="hidden" name="jobId" class="form-control" value="<?php echo $jobId;?>" >
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Job Title</label>
															<div class="col-md-10">
																<input type="text" name="title" class="form-control" placeholder="Looking For Android Developer" value="<?php echo $title;?>" required="required" disabled>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label"> Job Location</label>
															<div class="col-md-10">
																<input type="text" name="location" class="form-control"  value="<?php echo $location;?>" placeholder="Delhi,India" required="required" disabled>
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Job Category</label>
															<div class="col-md-10">
																<input type="text" name="category" class="form-control" value="<?php echo $category;?>" placeholder="Computer & IT" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Job Sub-category</label>
															<div class="col-md-10">
																<input type="text" class="form-control" name="subCategory" disabled placeholder="Android Developer" value="<?php echo $subCategory;?>" >
																
																	
																
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Job Type</label>
															<div class="col-md-10">
																<input type="text" name="type" class="form-control"  disabled value ="<?php echo $type;?>" >
																																									
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Job Vacancy</label>
															<div class="col-md-10">
																<input type="text" name="vacancy" class="form-control" disabled placeholder="5" value="<?php echo $vacancy;?>">
														
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Job Experience</label>
															<div class="col-md-10">
																<input type="text" name="experience" class="form-control" value="<?php echo $experience;?>" placeholder="Fresher" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Expected Salary</label>
															<div class="col-md-10">
																<input type="text" name="salary" class="form-control" value="<?php echo $salary;?>" placeholder="10000+" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Job Posted On</label>
															<div class="col-md-10">
																<input type="text" name="postedOn" class="form-control" value="<?php echo $postedOn;?>" placeholder="2017/01/01" required="required" disabled>
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
														else 
														{
															echo "";
														}


														?>
														<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Delete Job Details</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								
						<?php
									}
								}
							}
							else
							{
						?>
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title">Enter Job Id</h3></div>
									<div class="panel-body">
										<form class="form-horizontal" role="form" method="get" action="<?php echo $current_file; ?>">
											<div class="form-group">
												<label class="col-md-2 control-label">Job Id</label>
												<div class="col-md-10">
													<input type="text" name="jobId" class="form-control" placeholder="01">
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
										<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" >Search Job</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php
					}
				
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