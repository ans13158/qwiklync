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
		$selectRestaurantQuery = "SELECT * FROM `restaurant_details`";
		$restaurantResults = $conn -> query($selectRestaurantQuery);
	

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
		
		$restaurantId="";
		$curdir= dirname($_SERVER['PHP_SELF']);
		$restaurantName="";
		$restaurantFolder= "";

		
		if(isset($_POST['submitButton']))
		{
			$restaurantId= $_POST['oldRestaurantId'];
	
			if(!empty($restaurantId))
			
			{
				
				$selectSingleRestaurantQuery = "SELECT * FROM `restaurant_details` WHERE `restaurantId` ='".$restaurantId."'";
				$selectSingleRestaurantQueryResults = $conn -> query($selectSingleRestaurantQuery);

				if($selectSingleRestaurantQueryResults ->num_rows == 1)
				{
					$pathQuery="Select `restaurantId`,`restaurantName` From `restaurant_details` WHERE `restaurantId`='".$restaurantId."'";
					$pathQueryResults = $conn -> query($pathQuery);
					$pathData = mysqli_fetch_assoc($pathQueryResults);
					$restaurantName=$pathData['restaurantName'];

					$restaurantFolder= $url.$curdir."/images/restaurantImages/".$restaurantId.$restaurantName;
					
					$deleteQuery = "DELETE FROM `restaurant_details` WHERE `restaurantId`='".$restaurantId."'";
					$deleteQueryResult = $conn -> query($deleteQuery);
					if($deleteQueryResult)
					{
						removeFolder($restaurantFolder);
						$sucess = "Delete Successful";
						header('Location:deleteRestaurant.php?sucess='.$sucess);
					}
					else
					{
						
						$error = "Delete Failed! Please Try Again Later";
						header('Location:deleteRestaurant.php?error='.$error);
					}
				}
				else
				{
					$error = "Please Enter Valid Restaurant ID";
					header('Location:deleteRestaurant.php?error='.$error);
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
                                <h4 class="pull-left page-title">Delete Restaurant</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Restaurant</a></li>
                                    <li class="active">Delete Restaurant</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
							<div></div>
                        </div>
                    </div>
					
					<?php
                    if(isset($_GET['restaurantId']))
					{
                        $restaurantId = $_GET['restaurantId'];
                        $selectSingleRestaurantQuery = "SELECT * FROM `restaurant_details` WHERE `restaurantId` = '$restaurantId'";
                        $singleRestaurantResults = $conn -> query($selectSingleRestaurantQuery);
						$singleRestaurantResultsCount = mysqli_num_rows($singleRestaurantResults);
						if(!$singleRestaurantResultsCount==1)
						{
							$error="Please Enter valid Restaurant Id";
							header('Location:deleteRestaurant.php?error='.$error.'&submitButton=');
						}
						
						else
						{
								$singleRestaurantData = mysqli_fetch_assoc($singleRestaurantResults);
								
								$restaurantId= $singleRestaurantData['restaurantId'];
								$restaurantName= $singleRestaurantData['restaurantName'];
								$typeOfCuisine= $singleRestaurantData['typeOfCuisine'];
								$photoName= $singleRestaurantData['photoName'];
								$logoName= $singleRestaurantData['logoName'];
								$aboutRestaurant= $singleRestaurantData['aboutRestaurant'];
								$takeAway= $singleRestaurantData['takeAway'];
								$delivery= $singleRestaurantData['delivery'];
								$dineIn= $singleRestaurantData['dineIn'];
								$minimumOrder= $singleRestaurantData['minimumOrder'];
								$deliveryTime= $singleRestaurantData['deliveryTime'];
								$category= $singleRestaurantData['category'];

								if(!empty($restaurantId))
								{
									?>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Delete Restuarant Details</h3>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
														<div class="form-group">
															<label class="col-md-2 control-label">Restaurant Id</label>
															<div class="col-md-10">
																<input type="text" name="restaurantId" class="form-control" placeholder="RST0x" required="required" value="<?php echo $restaurantId;?>" disabled>
																<input type="hIdden" name="oldRestaurantId" class="form-control" value="<?php echo $restaurantId;?>">
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Restaurant Name</label>
															<div class="col-md-10">
																<input type="text" name="restaurantName" class="form-control" placeholder="FUN 'N' FOOD" value="<?php echo $restaurantName;?>" required="required" disabled>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label">Type of Cuisine</label>
															<div class="col-md-10">
																<input type="text" name="typeOfCuisine" class="form-control"  value="<?php echo $typeOfCuisine;?>" placeholder="Italian" required="required" disabled>
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label">Photo Name</label>
															<div class="col-md-10">
																<input type="text" name="photoName" class="form-control"  value="<?php echo $photoName;?>" placeholder="abc.jpg" required="required" disabled>
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Logo Name</label>
															<div class="col-md-10">
																<input type="text" name="logoName" class="form-control"  value="<?php echo $logoName;?>" placeholder="abc.jpg" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">About Restaurant</label>
															<div class="col-md-10">
																<input type="textarea" name="aboutRestaurant" class="form-control" value="<?php echo $aboutRestaurant;?>" placeholder="It is a Five Star Hotel." required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Take Away</label>
															<div class="col-md-10">
																<select class="form-control" name="takeAway" disabled>
																
																	<option value="Yes" <?php if ($takeAway == "Yes") echo "selected='selected'";?>>Yes</option>
																	<option value="No" <?php if ($takeAway == "No") echo "selected='selected'";?>>No</option>
																</select>
																
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Delivery</label>
															<div class="col-md-10">
																<select class="form-control" name="delivery" disabled>
																
																	<option value="Yes" <?php if ($delivery == "Yes") echo "selected='selected'";?>>Yes</option>
																	<option value="No" <?php if ($delivery == "No") echo "selected='selected'";?>>No</option>
																</select>
																
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Dine In</label>
															<div class="col-md-10">
																<select class="form-control" name="dineIn" disabled>
																
																	<option value="Yes" <?php if ($dineIn == "Yes") echo "selected='selected'";?>>Yes</option>
																	<option value="No" <?php if ($dineIn == "No") echo "selected='selected'";?>>No</option>
																</select>
																
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Minimum Order</label>
															<div class="col-md-10">
																<input type="number" name="minimumOrder" class="form-control" value="<?php echo $minimumOrder;?>" placeholder="100" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Delivery Time</label>
															<div class="col-md-10">
																<input type="textarea" name="deliveryTime" class="form-control" value="<?php echo $deliveryTime;?>" placeholder="60min" required="required" disabled>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Category</label>
															<div class="col-md-10">
																<input type="text" name="category" class="form-control" value="<?php echo $category;?>" placeholder="Casual Dining" required="required" disabled>
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
										<h3 class="panel-title">Enter Restaurant Id</h3></div>
									<div class="panel-body">
										<form class="form-horizontal" role="form" method="get" action="<?php echo $current_file; ?>">
											<div class="form-group">
												<label class="col-md-2 control-label">Restaurant Id</label>
												<div class="col-md-10">
													<input type="text" name="restaurantId" class="form-control" placeholder="RST0x">
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
											echo "<span class=\"alert-info\"> Search Restaurant Details Below</span>";
										}
										?>
										<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Search Restaurant</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php
					}
				
					include 'modules/allRestaurant.php';
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