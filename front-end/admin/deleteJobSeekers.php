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
		$seekerQuery = "SELECT * FROM `resume` ";
		$seekerResults = $conn->query($seekerQuery);
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
		
		$resumeId="";
		$userId="";

				
		if(isset($_POST['submitButton']))
		{
			$resumeId= $_POST['resumeId'];
	
			if(!empty($resumeId))
			
			{
				
				$selectSingleSeekerQuery = "SELECT * FROM `resume` WHERE `resumeId` ='".$resumeId."'";
				$selectSingleSeekerQueryResults = $conn -> query($selectSingleSeekerQuery);

				if($selectSingleSeekerQueryResults ->num_rows == 1)
				{
					$pathQuery="Select `resumeId`,`userId` From `resume` WHERE `resumeId`='".$resumeId."'";
					
					
					$deleteQuery = "DELETE FROM `resume` WHERE `resumeId`='".$resumeId."'";
					$deleteQueryResult = $conn -> query($deleteQuery);
					if($deleteQueryResult)
					{
						$sucess = "Delete Successful";
						header('Location:deleteJobSeekers.php?sucess='.$sucess);
					}
					else
					{
						
						$error = "Delete Failed! Please Try Again Later";
						header('Location:deleteJobSeekers.php?error='.$error);
					}
				}
				else
				{
					$error = "Please Enter Valid Resume ID";
					header('Location:deleteJobSeekers.php?error='.$error);
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
                                <h4 class="pull-left page-title">Delete Job-seekers</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Job</a></li>
                                    <li class="active">Delete Job-seekers</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
							<div></div>
                        </div>
                    </div>
					
					<?php
                    if(isset($_GET['resumeId']))
					{
                        $resumeId = $_GET['resumeId'];
                        $selectSingleSeekerQuery = "SELECT * FROM `resume` WHERE `resumeId` = '$resumeId'";
                        $singleSeekerResults = $conn -> query($selectSingleSeekerQuery);
						$singleSeekerResultsCount = mysqli_num_rows($singleSeekerResults);
						if(!$singleSeekerResultsCount==1)
						{
							$error="Please Enter valid Resume Id";
							header('Location:deleteJobSeekers.php?error='.$error.'&submitButton=');
						}
						
						else
						{
								$singleSeekerData = mysqli_fetch_assoc($singleSeekerResults);
								
								$resumeId= $singleSeekerData['resumeId'];
								$userId= $singleSeekerData['userId'];
								$name= $singleSeekerData['name'];
								$photoPath= $singleSeekerData['photoPath'];
								$photoName= $singleSeekerData['photoName'];
								$college= $singleSeekerData['college'];
								$company= $singleSeekerData['company'];
								$post= $singleSeekerData['post'];
								$numberOfCompany= $singleSeekerData['numberOfCompany'];
								$degree= $singleSeekerData['degree'];
								$email = $singleSeekerData['email'];
								$address = $singleSeekerData['address'];
								$aboutMe = $singleSeekerData['aboutMe'];
								$facebook = $singleSeekerData['facebook'];
								$linkedIn = $singleSeekerData['linkedIn'];
								$twitter = $singleSeekerData['twitter'];


								if(!empty($resumeId))
								{
									?>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Delete Job-seeker</h3>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>"" onsubmit="return confirm('Are you sure you want to delete?')" " >
														<div class="form-group">
															<label class="col-md-2 control-label">Resume Id</label>
															<div class="col-md-10">
																
																<input type="hidden" name="resumeId" class="form-control" value="<?php echo $resumeId;?>" >
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">User Id</label>
															<div class="col-md-10">
																<input type="text" name="userId" class="form-control" placeholder="01" value="<?php echo $userId;?>" required="required" disabled>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label"> Name</label>
															<div class="col-md-10">
																<input type="text" name="name" class="form-control"  value="<?php echo $name;?>" placeholder="John Doe" required="required" disabled>
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Photo Path</label>
															<div class="col-md-10">
																<input type="text" name="photoPath" class="form-control" value="<?php echo $photoPath;?>" placeholder="" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Photo Name</label>
															<div class="col-md-10">
																<input type="text" class="form-control" name="photoName" disabled placeholder="" value="<?php echo $photoName;?>" >
																
																	
																
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">College</label>
															<div class="col-md-10">
																<input type="text" name="college" class="form-control"  disabled value ="<?php echo $college;?>" >
																																									
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Company Working At</label>
															<div class="col-md-10">
																<input type="text" name="company" class="form-control" disabled placeholder="Microsoft" value="<?php echo $company;?>">
														
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Post</label>
															<div class="col-md-10">
																<input type="text" name="post" class="form-control" value="<?php echo $post;?>" placeholder="Developer" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Number Of Companies Worked At</label>
															<div class="col-md-10">
																<input type="text" name="numberOfCompany" class="form-control" value="<?php echo $numberOfCompany;?>" placeholder="2" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Degree</label>
															<div class="col-md-10">
																<input type="text" name="degree" class="form-control" value="<?php echo $degree;?>" placeholder="B.Tech" required="required" disabled>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label">E-Mail</label>
															<div class="col-md-10">
																<input type="text" name="email" class="form-control" value="<?php echo $email;?>" placeholder="john@doe.com" required="required" disabled>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label">Address</label>
															<div class="col-md-10">
																<input type="text" name="address" class="form-control" value="<?php echo $address;?>" placeholder="21, Baker Street" required="required" disabled>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">About Job-seeker</label>
															<div class="col-md-10">
																<input type="text" name="aboutMe" class="form-control" value="<?php echo $aboutMe;?>" placeholder="" required="required" disabled>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Facebook Link</label>
															<div class="col-md-10">
																<input type="text" name="facebook" class="form-control" value="<?php echo $facebook;?>" placeholder="" required="required" disabled>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">LinkedIn</label>
															<div class="col-md-10">
																<input type="text" name="linkedIn" class="form-control" value="<?php echo $linkedIn;?>" placeholder="" required="required" disabled>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-2 control-label">Twitter</label>
															<div class="col-md-10">
																<input type="text" name="twitter" class="form-control" value="<?php echo $twitter;?>" placeholder="" required="required" disabled>
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
														<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Delete Job-seeker Details</button>
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
										<h3 class="panel-title">Enter Resume Id</h3></div>
									<div class="panel-body">
										<form class="form-horizontal" role="form" method="get" action="<?php echo $current_file; ?>">
											<div class="form-group">
												<label class="col-md-2 control-label">Resume Id</label>
												<div class="col-md-10">
													<input type="text" name="resumeId" class="form-control" placeholder="01">
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
											echo "<span class=\"alert-info\"> Search Job-seeker Details Below</span>";
										}
										?>
										<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" >Search Job-seeker</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php
					}
				
					include 'modules/allJobSeekers.php';
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