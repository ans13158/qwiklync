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

		//Get All Restaurant Details
		$selectBankingDetails = "SELECT * FROM `banking_details`";
		$selectBankingDetailsResults = $conn -> query($selectBankingDetails);
	

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
			$bankingDetailsId= $_POST['oldBankingDetailsId'];
	
			if(!empty($bankingDetailsId))
			
			{
				$deleteBankingDetails = "SELECT * FROM `banking_details` WHERE `bankingDetailsId` ='".$bankingDetailsId."'";
				$deleteBankingDetailsResults = $conn -> query($deleteBankingDetails);

				if($deleteBankingDetailsResults ->num_rows == 1)
				{
					$deleteQuery = "DELETE FROM `banking_details` WHERE `bankingDetailsId` ='".$bankingDetailsId."'";
					$deleteQueryResult = $conn -> query($deleteQuery);
					if($deleteQueryResult)
					{
						$sucess = "Delete Successful";
						header('Location:deleteBankingDetails.php?sucess='.$sucess);
					}
					else
					{
						$error = "Delete Failed! Please Try Again Later";
						header('Location:deleteBankingDetails.php?error='.$error);
					}
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
                                <h4 class="pull-left page-title">Delete Banking Details</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Banking Details</a></li>
                                    <li class="active">Delete Banking Details</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
							<div></div>
                        </div>
                    </div>
					
					<?php
                    if(isset($_GET['bankingDetailsId']))
					{
                        $bankingDetailsId = $_GET['bankingDetailsId'];
                        $selectBankingDetailsQuery = "SELECT * FROM `banking_details` WHERE `bankingDetailsId` = '$bankingDetailsId'";
                        $bankingDetailsResults = $conn -> query($selectBankingDetailsQuery);
						$selectBankingDetailsResultsCount = mysqli_num_rows($bankingDetailsResults);
						if(!$selectBankingDetailsResultsCount==1)
						{
							$error="Please Enter valid Banking Details Id";
							header('Location:deleteBankingDetails.php?error='.$error.'&submitButton=');
						}
						
						else
						{
								$selectBankingDetailsData = mysqli_fetch_assoc($bankingDetailsResults);
								
								$bankingDetailsId= $selectBankingDetailsData['bankingDetailsId'];
								$ifscCode= $selectBankingDetailsData['ifscCode'];
								$bankName= $selectBankingDetailsData['bankName'];
								$accountNo= $selectBankingDetailsData['accountNo'];
								$accountHolderName= $selectBankingDetailsData['accountHolderName'];
								$branch= $selectBankingDetailsData['branch'];
								$email= $selectBankingDetailsData['email'];

								if(!empty($bankingDetailsId))
								{
									?>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Delete Banking Details</h3>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
														<div class="form-group">
															<label class="col-md-2 control-label">Banking Details Id</label>
															<div class="col-md-10">
																<input type="text" name="bankingDetailsId" class="form-control" placeholder="BKD0x" required="required" value="<?php echo $bankingDetailsId;?>" disabled>
																<input type="hidden" name="oldBankingDetailsId" class="form-control" value="<?php echo $bankingDetailsId;?>">
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Branch IFSC Code</label>
															<div class="col-md-10">
																<input type="text" name="ifscCode" class="form-control" placeholder="SBIN0010405" value="<?php echo $ifscCode;?>" required="required" disabled>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label">Bank Name</label>
															<div class="col-md-10">
																<input type="text" name="bankName" class="form-control"  value="<?php echo $bankName;?>" placeholder="State Bank of India" required="required" disabled>
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Account Number</label>
															<div class="col-md-10">
																<input type="text" name="accountNo" class="form-control" value="<?php echo $accountNo;?>" placeholder="1434765462756454" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Account Holder Name</label>
															<div class="col-md-10">
																<input type="text" name="accountHolderName" class="form-control" value="<?php echo $accountHolderName;?>" placeholder="Priyank Jha" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Branch Name</label>
															<div class="col-md-10">
																<input type="text" name="branch" class="form-control" value="<?php echo $branch;?>" placeholder="Pantnagar" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Bank Email Id</label>
															<div class="col-md-10">
																<input type="text" name="email" class="form-control" value="<?php echo $email;?>" placeholder="abc@gmail.com" required="required" disabled>
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
														<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Delete Banking Details</button>
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
										<h3 class="panel-title">Enter Banking Details Id</h3></div>
									<div class="panel-body">
										<form class="form-horizontal" role="form" method="get" action="<?php echo $current_file; ?>">
											<div class="form-group">
												<label class="col-md-2 control-label">Banking Details Id</label>
												<div class="col-md-10">
													<input type="text" name="bankingDetailsId" class="form-control" placeholder="BKD0x">
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
											echo "<span class=\"alert-info\"> Search Banking Details Below</span>";
										}
										?>
										<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Search Banking Details</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php
					}
				
					include 'modules/allBankingDetails.php';
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