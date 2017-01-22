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
		$selectContactQuery = "SELECT * FROM `contactus` ";
		$contactResults = $conn->query($selectContactQuery);
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
		
		$contactId="";
		$name="";

				
		if(isset($_POST['submitButton']))
		{
			$contactId= $_POST['contactId'];
	
			if(!empty($contactId))
			
			{
				
				$selectSingleContactQuery = "SELECT * FROM `contactus` WHERE `contactId` ='".$contactId."'";
				$selectSingleContactQueryResults = $conn -> query($selectSingleContactQuery);

				if($selectSingleContactQueryResults ->num_rows == 1)
				{
					$pathQuery="Select `contactId`,`name` From `contactus` WHERE `contactId`='".$contactId."'";
					
					
					$deleteQuery = "DELETE FROM `contactus` WHERE `contactId`='".$contactId."'";
					$deleteQueryResult = $conn -> query($deleteQuery);
					if($deleteQueryResult)
					{
						$sucess = "Delete Successful";
						header('Location:deleteQueries.php?sucess='.$sucess);
					}
					else
					{
						
						$error = "Delete Failed! Please Try Again Later";
						header('Location:deleteQueries.php?error='.$error);
					}
				}
				else
				{
					$error = "Please Enter Valid Contact ID";
					header('Location:deleteQueries.php?error='.$error);
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
                                    <li><a href="#">Queries</a></li>
                                    <li class="active">Delete Query</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
							<div></div>
                        </div>
                    </div>
					
					<?php
                    if(isset($_GET['contactId']))
					{
                        $contactId = $_GET['contactId'];
                        $selectSingleContactQuery = "SELECT * FROM `contactus` WHERE `contactId` = '$contactId'";
                        $singleContactResults = $conn -> query($selectSingleContactQuery);
						$singleContactResultsCount = mysqli_num_rows($singleContactResults);
						if(!$singleContactResultsCount==1)
						{
							$error="Please Enter valid Contact Id";
							header('Location:deleteQueries.php?error='.$error.'&submitButton=');
						}
						
						else
						{
								$singleContactData = mysqli_fetch_assoc($singleContactResults);
								
								$contactId= $singleContactData['contactId'];
								$name= $singleContactData['name'];
								$email= $singleContactData['email'];
								$phone= $singleContactData['phone'];
								$subject= $singleContactData['subject'];
								$message= $singleContactData['message'];
								
								if(!empty($contactId))
								{
									?>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Delete Query</h3>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>"" onsubmit="return confirm('Are you sure you want to delete?')" " >
														<div class="form-group">
															<label class="col-md-2 control-label">Contact Id</label>
															<div class="col-md-10">
																
																<input type="hidden" name="contactId" class="form-control" value="<?php echo $contactId;?>" >
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Sender's Name</label>
															<div class="col-md-10">
																<input type="text" name="name" class="form-control" placeholder="John Doe" value="<?php echo $name;?>" required="required" disabled>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label"> Sender's Email</label>
															<div class="col-md-10">
																<input type="text" name="email" class="form-control"  value="<?php echo $email;?>" placeholder="jonDoe@john.com" required="required" disabled>
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Sender's Phone No.</label>
															<div class="col-md-10">
																<input type="text" name="phone" class="form-control" value="<?php echo $phone;?>" placeholder="8888888888 " required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Subject of the Message</label>
															<div class="col-md-10">
																<input type="text" class="form-control" name="subject" disabled placeholder="" value="<?php echo $subject;?>" >
																
																	
																
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Mesage</label>
															<div class="col-md-10">
																<input type="text" name="message" class="form-control"  disabled value ="<?php echo $message;?>" >
																																									
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
														<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Delete Query</button>
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
										<h3 class="panel-title">Enter Contact Id</h3></div>
									<div class="panel-body">
										<form class="form-horizontal" role="form" method="get" action="<?php echo $current_file; ?>">
											<div class="form-group">
												<label class="col-md-2 control-label">Contact Id</label>
												<div class="col-md-10">
													<input type="text" name="contactId" class="form-control" placeholder="01">
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
										<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" >Search Query</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php
					}
				
					include 'modules/allQueries.php';
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