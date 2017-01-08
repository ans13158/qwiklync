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
		
		$restaurantId= '';
		$restaurantName= '';
		$oldRestaurantName= '';
		$typeOfCuisine= '';
		$photo= '';
		$photoName= '';
		$photoType= '';
		$photoPath= '';
		$photoFolderName= '';
		$logo= '';
		$logoName='';
		$logoType= '';
		$logoPath= '';
		$logoFolderName= '';
		$aboutRestaurant= '';
		$takeAway= '';
		$delivery= '';
		$dineIn= '';
		$minimumOrder= '';
		$deliveryTime= '';
		$category= '';
		$popular='';
		$curdir= dirname($_SERVER['PHP_SELF']);
		$restaurantFolder= '';
		$oldRestaurantFolder= '';
		
		if(isset($_POST['submitButton']))
		{	
			
			$restaurantId= $_POST['oldRestaurantId'];
			$oldRestaurantName= $_POST['oldRestaurantName'];
			$oldRestaurantFolder= $url.$curdir."/images/restaurantImages/".$restaurantId.$oldRestaurantName;
			
			$restaurantName= $_POST['restaurantName'];
			$restaurantFolder= $url.$curdir."/images/restaurantImages/".$restaurantId.$restaurantName;
			
			$photoName= $_FILES['photo']['name'];
			$photo= $_FILES['photo']['tmp_name'];
			$photoType= $_FILES['photo']['type'];
			$photoFolderName= $restaurantFolder."/photos";
			$photoVariable= $photoFolderName."/".$photoName;
			
			$logoName= $_FILES['logo']['name'];
			$logo= $_FILES['logo']['tmp_name'];
			$logoType= $_FILES['logo']['type'];
			$logoFolderName= $restaurantFolder."/logo";
			$logoVariable= $logoFolderName."/".$logoName;
			
			$typeOfCuisine=$_POST['typeOfCuisine']; 
			$aboutRestaurant= $_POST['aboutRestaurant'];
			$takeAway= $_POST['takeAway'];
			$delivery= $_POST['delivery'];
			$dineIn= $_POST['dineIn'];
			$minimumOrder= $_POST['minimumOrder'];
			$deliveryTime= $_POST['deliveryTime'];
			$category= $_POST['category'];
			$popular=$_POST['popular'];
			//Condition is not satisfying
			if(!empty($restaurantId) && !empty($oldRestaurantName)  && !empty($restaurantName) && !empty($photo) && !empty($logo) && !empty($typeOfCuisine) && !empty($aboutRestaurant) && !empty($takeAway) && !empty($delivery) && !empty($dineIn) && !empty($minimumOrder) && !empty($deliveryTime) && !empty($category) && !empty($popular) )
			
			{
				$sucess="ok";
				if( (substr($logoType,0,5)=="image")  & (substr($photoType,0,5)=="image"))	
				{
					$deleteQuery = "DELETE FROM `restaurant_details` WHERE `restaurantId`='".$restaurantId."'";
					$deleteQueryResult = $conn -> query($deleteQuery);
					if($deleteQueryResult)
					{
						removeFolder($oldRestaurantFolder);
						if((mkdir($restaurantFolder,0777,true)) && (mkdir($photoFolderName,0777,true)) && (mkdir($logoFolderName,0777,true)) )
						{	
									
									$insertQuery = "INSERT INTO `restaurant_details`(`restaurantId`, `restaurantName`, `typeOfCuisine`,`photoName` ,`photoPath`,`logoName` ,`logoPath`, `aboutRestaurant`, `takeAway`, `delivery`, `dineIn`, `minimumOrder`, `deliveryTime`, `category`, `popular`) VALUES ('$restaurantId','$restaurantName','$typeOfCuisine','$photoName','$photoFolderName','$logoName','$logoFolderName','$aboutRestaurant','$takeAway','$delivery','$dineIn',$minimumOrder,'$deliveryTime','$category','$popular')";
									$insertResult = $conn -> query($insertQuery);
									move_uploaded_file($photo,$photoVariable);
									move_uploaded_file($logo,$logoVariable);
									
									if($insertResult)
									{
										$sucess = "Updation Successful";
										header('Location:updateRestaurant.php?sucess='.$sucess);
									} 
									else
									{
										$error = "Updationn Failed! Please Try Again.";
									}
						}
						else
						{
							$error = "Unable to create directory! Please Try Again.";
						}
					}
					else
					{
						$error = "Delete Failed! Please Try Again Later";
						header('Location:UpdateRestaurant.php?error='.$error);
					}
				}
				else
				{
					$error = "Updation Failed! Please Try Again.Only Images Allowed";
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
                                <h4 class="pull-left page-title">Update Restaurant</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Restaurant</a></li>
                                    <li class="active">Update Restaurant</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
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
							header('Location:updateRestaurant.php?error='.$error.'&submitButton=');
						}
						
						else
						{
								$singleRestaurantData = mysqli_fetch_assoc($singleRestaurantResults);
								
								$restaurantId= $singleRestaurantData['restaurantId'];
								$restaurantName= $singleRestaurantData['restaurantName'];
								$typeOfCuisine= $singleRestaurantData['typeOfCuisine'];
								$photo= $singleRestaurantData['photoName'];
								$logo= $singleRestaurantData['logoName'];
								$aboutRestaurant= $singleRestaurantData['aboutRestaurant'];
								$takeAway= $singleRestaurantData['takeAway'];
								$delivery= $singleRestaurantData['delivery'];
								$dineIn= $singleRestaurantData['dineIn'];
								$minimumOrder= $singleRestaurantData['minimumOrder'];
								$deliveryTime= $singleRestaurantData['deliveryTime'];
								$category= $singleRestaurantData['category'];
								$popular= $singleRestaurantData['popular'];

								if(!empty($restaurantId))
								{
									?>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Update Restuarant Details</h3>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
														<div class="form-group">
															<label class="col-md-2 control-label">Restaurant Id</label>
															<div class="col-md-10">
																<input type="text" name="restaurantId" class="form-control" placeholder="RST0x" required="required" value="<?php echo $restaurantId;?>" disabled>
																<input type="hidden" name="oldRestaurantId" class="form-control" value="<?php echo $restaurantId;?>">
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Restaurant Name</label>
															<div class="col-md-10">
																<input type="text" name="restaurantName" class="form-control" placeholder="FUN 'N' FOOD" value="<?php echo $restaurantName;?>" required="required">
																<input type="hidden" name="oldRestaurantName" class="form-control" value="<?php echo $restaurantName;?>" ">
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label">Type of Cuisine</label>
															<div class="col-md-10">
																<input type="text" name="typeOfCuisine" class="form-control"  value="<?php echo $typeOfCuisine;?>" placeholder="Italian" required="required">
															</div>
														</div>

														<div class="form-group">
															<label class="col-md-2 control-label">Photos</label>
															<div class="col-md-10">
																<input type="file" name="photo" class="form-control"  multiple="multiple" required="required">
															</div>
														</div>

														
														<div class="form-group">
															<label class="col-md-2 control-label">Logo</label>
															<div class="col-md-10">
																<input type="file" name="logo" class="form-control"  required="required">
															</div>
														</div>
														
														
														<div class="form-group">
															<label class="col-md-2 control-label">About Restaurant</label>
															<div class="col-md-10">
																<input type="textarea" name="aboutRestaurant" class="form-control" value="<?php echo $aboutRestaurant;?>" placeholder="It is a Five Star Hotel." required="required">
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Take Away</label>
															<div class="col-md-10">
																<select class="form-control" name="takeAway" >
																
																	<option value="Yes" <?php if ($takeAway == "Yes") echo "selected='selected'";?>>Yes</option>
																	<option value="No" <?php if ($takeAway == "No") echo "selected='selected'";?>>No</option>
																</select>
																
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Delivery</label>
															<div class="col-md-10">
																<select class="form-control" name="delivery" >
																
																	<option value="Yes" <?php if ($delivery == "Yes") echo "selected='selected'";?>>Yes</option>
																	<option value="No" <?php if ($delivery == "No") echo "selected='selected'";?>>No</option>
																</select>
																
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Dine In</label>
															<div class="col-md-10">
																<select class="form-control" name="dineIn" >
																
																	<option value="Yes" <?php if ($dineIn == "Yes") echo "selected='selected'";?>>Yes</option>
																	<option value="No" <?php if ($dineIn == "No") echo "selected='selected'";?>>No</option>
																</select>
																
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Minimum Order</label>
															<div class="col-md-10">
																<input type="number" name="minimumOrder" class="form-control" value="<?php echo $minimumOrder;?>" placeholder="100" required="required">
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Delivery Time</label>
															<div class="col-md-10">
																<input type="textarea" name="deliveryTime" class="form-control" value="<?php echo $deliveryTime;?>" placeholder="60min" required="required">
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Category</label>
															<div class="col-md-10">
																<input type="text" name="category" class="form-control" value="<?php echo $category;?>" placeholder="Casual Dining" required="required">
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
														<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Update Restaurant Details</button>
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
</body>


</html>
<?php
}
?>