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
		
		$selectReviewQuery = "SELECT * FROM `review`";
		$selectReviewQueryResults = $conn -> query($selectReviewQuery);

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
			$reviewId= $_POST['oldreviewId'];
	
			if(!empty($reviewId))
			
			{
				$selectDeleteQuery = "SELECT * FROM `review` WHERE `reviewId` ='".$reviewId."'";
				$selectDeleteQueryResults = $conn -> query($selectDeleteQuery);

				if($selectDeleteQueryResults ->num_rows == 1)
				{
					$deleteQuery = "DELETE FROM `review` WHERE `reviewId`='".$reviewId."'";
					$deleteQueryResult = $conn -> query($deleteQuery);
					if($deleteQueryResult)
					{
						$sucess = "Delete Successful";
						header('Location:deletereview.php?sucess='.$sucess);
					}
					else
					{
						$error = "Delete Failed! Please Try Again Later";
						header('Location:deletereview.php?error='.$error);
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
                                <h4 class="pull-left page-title">Delete Review</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Review</a></li>
                                    <li class="active">Delete Review</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
					<?php
                    if(isset($_GET['reviewId']))
					{
                        $reviewId = $_GET['reviewId'];
                        $reviewQuery = "SELECT * FROM `review` WHERE `reviewId` = '$reviewId'";
                        $reviewQueryResults = $conn -> query($reviewQuery);
						$reviewQueryResultsCount = mysqli_num_rows($reviewQueryResults);
						if(!$reviewQueryResultsCount==1)
						{
							$error="Please Enter valid Review Id";
							header('Location:deleteReview.php?error='.$error.'&submitButton=');
						}
						
						else
						{
								$reviewQueryData = mysqli_fetch_assoc($reviewQueryResults);
								
								$reviewId= $reviewQueryData['reviewId'];
								$reviewType= $reviewQueryData['reviewType'];
								$restaurantDeliveryBoyId= $reviewQueryData['restaurant/DeliveryBoyId'];
								$userEmail= $reviewQueryData['userEmail'];
								$review= $reviewQueryData['review'];
								$rating= $reviewQueryData['rating'];
					
								if(!empty($reviewId))
								{
									?>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Delete Review Details</h3>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
														<div class="form-group">
															<label class="col-md-2 control-label">Review Id</label>
															<div class="col-md-10">
																<input type="text" name="reviewId" class="form-control" placeholder="REV0x" required="required" value="<?php echo $reviewId;?>" disabled>
																<input type="hidden" name="oldreviewId" class="form-control" value="<?php echo $reviewId;?>">
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Review Type</label>
															<div class="col-md-10">
																<?php
																
																	if($reviewType=="Restaurant")
																	{
																?>
																		<input type="radio" name="reviewType" class=".btn" disabled checked><b style="color:blue">Restaurant</b></input><br>
																		<input type="radio" name="reviewType" class=".btn" disabled ><b>Delivery Boy</b></input>
																<?php		
																	
																	}
																	else
																	{
																?>
																		<input type="radio" name="reviewType" class=".btn" disabled ><b>Restaurant</b></input><br>
																		<input type="radio" name="reviewType" class=".btn" disabled checked><b style="color:blue">Delivery Boy</b></input>
																<?php
																		
																	}
														
																?>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label">Restaurant/Delivery Boy Id</label>
															<div class="col-md-10">
																<input type="text" name="restaurantDeliveryBoyId" class="form-control"  value="<?php echo $restaurantDeliveryBoyId;?>" placeholder="RES0x" required="required" disabled>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label">User Email</label>
															<div class="col-md-10">
																<input type="text" name="userEmail" class="form-control"  value="<?php echo $userEmail;?>" placeholder="abc@gmail.com" required="required" disabled>
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Review</label>
															<div class="col-md-10">
																<input type="text" name="review" class="form-control"  value="<?php echo $review;?>" placeholder="abc" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Rating</label>
															<div class="col-md-10">
																<input type="text" name="rating" class="form-control" value="<?php echo $rating;?>" placeholder="5" required="required" disabled>
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
														<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Delete Restaurant Details</button>
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
										<h3 class="panel-title">Enter Review Id</h3></div>
									<div class="panel-body">
										<form class="form-horizontal" role="form" method="get" action="<?php echo $current_file; ?>">
											<div class="form-group">
												<label class="col-md-2 control-label">Review Id</label>
												<div class="col-md-10">
													<input type="text" name="reviewId" class="form-control" placeholder="REV0x">
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
											echo "<span class=\"alert-info\"> Search Review Details Below</span>";
										}
										?>
										<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Search Review</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php
					}
				
					include 'modules/allReview.php';
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