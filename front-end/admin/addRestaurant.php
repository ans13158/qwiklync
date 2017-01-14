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
		$rating='';
					//Address details
		$buildingNo ="";
		$buildingName ="";
		$streetNo ="";
		$streetName ="";
		$city ="";
		$landmark ="";
		$pincode ="";
		$district ="";
		$state ="";
		$country ="";
		
		//Timings Details
		$monMrngTym="";
		$monMrngAm="";
		$monEvngTym="";
		$monEvngAm="";
		
		$tuesMrngTym="";
		$tuesMrngAm="";
		$tuesEvngTym="";
		$tuesEvngAm="";
		
		$wedMrngTym="";
		$wedMrngAm="";
		$wedEvngTym="";
		$wedEvngAm="";
		
		$thrMrngTym="";
		$thrMrngAm="";
		$thrEvngTym="";
		$thrEvngAm="";
		
		$friMrngTym="";
		$friMrngAm="";
		$friEvngTym="";
		$friEvngAm="";
		
		$satMrngTym="";
		$satMrngAm="";
		$satEvngTym="";
		$satEvngAm="";
		
		$sunMrngTym="";
		$sunMrngAm="";
		$sunEvngTym="";
		$sunEvngAm="";
		
		
		
		if(isset($_POST['submitButton']))
		{
			$restaurantId= $_POST['restaurantId'];
			$restaurantName= $_POST['restaurantName'];
			$typeOfCuisine=$_POST['typeOfCuisine']; 
			$photo= $_FILES['photo']['tmp_name'];
			$photoName= $_FILES['photo']['name'];
			$photoType= $_FILES['photo']['type'];
			$logo= $_FILES['logo']['tmp_name'];
			$logoName= $_FILES['logo']['name'];
			$logoType= $_FILES['logo']['type'];
			$aboutRestaurant= $_POST['aboutRestaurant'];
			$takeAway= $_POST['takeAway'];
			$delivery= $_POST['delivery'];
			$dineIn= $_POST['dineIn'];
			$minimumOrder= $_POST['minimumOrder'];
			$deliveryTime= $_POST['deliveryTime'];
			$category= $_POST['category'];
			$popular=$_POST['popular'];
			$rating=$_POST['rating'];
			$curdir= dirname($_SERVER['PHP_SELF']);
			$restaurantFolder= $curdir."/images/restaurantImages/".$restaurantId.$restaurantName;
			
			$photoFolderName= $restaurantFolder."/photos";
			$photoPath= $photoFolderName;
			$photoVariable= $photoPath."/".$photoName;
			
			$logoFolderName= $restaurantFolder."/logo";
			$logoPath= $logoFolderName;
			$logoVariable= $logoPath."/".$logoName;
			
			//Address details
			$buildingNo =$_POST['buildingNo'];
			$buildingName =$_POST['buildingName'];
			$streetNo =$_POST['streetNo'];
			$streetName =$_POST['streetName'];
			$city =$_POST['city'];
			$landmark =$_POST['landmark'];
			$pincode =$_POST['pincode'];
			$district =$_POST['district'];
			$state =$_POST['state'];
			$country =$_POST['country'];
			
			//Timings Details
			$monMrngTym=$_POST['monMrngTym'];
			$monMrngAm=$_POST['monMrngAm'];
			$monEvngTym=$_POST['monEvngTym'];
			$monEvngAm=$_POST['monEvngAm'];
			
			$tuesMrngTym=$_POST['tuesMrngTym'];
			$tuesMrngAm=$_POST['tuesMrngAm'];
			$tuesEvngTym=$_POST['tuesEvngTym'];
			$tuesEvngAm=$_POST['tuesEvngAm'];
			
			$wedMrngTym=$_POST['wedMrngTym'];
			$wedMrngAm=$_POST['wedMrngAm'];
			$wedEvngTym=$_POST['wedEvngTym'];
			$wedEvngAm=$_POST['wedEvngAm'];
			
			$thrMrngTym=$_POST['thrMrngTym'];
			$thrMrngAm=$_POST['thrMrngAm'];
			$thrEvngTym=$_POST['thrEvngTym'];
			$thrEvngAm=$_POST['thrEvngAm'];
			
			$friMrngTym=$_POST['friMrngTym'];
			$friMrngAm=$_POST['friMrngAm'];
			$friEvngTym=$_POST['friEvngTym'];
			$friEvngAm=$_POST['friEvngAm'];
			
			$satMrngTym=$_POST['satMrngTym'];
			$satMrngAm=$_POST['satMrngAm'];
			$satEvngTym=$_POST['satEvngTym'];
			$satEvngAm=$_POST['satEvngAm'];
			
			$sunMrngTym=$_POST['sunMrngTym'];
			$sunMrngAm=$_POST['sunMrngAm'];
			$sunEvngTym=$_POST['sunEvngTym'];
			$sunEvngAm=$_POST['sunEvngAm'];
			
			//Condition is not satisfying
			if(!empty($restaurantId) && !empty($restaurantName) && !empty($typeOfCuisine) && !empty($photo) && !empty($logo) && !empty($aboutRestaurant) && !empty($takeAway) && !empty($delivery) && !empty($dineIn) && !empty($minimumOrder) && !empty($deliveryTime) && !empty($category) && !empty($popular))	
			{

				
				$selectOneRestaurantQuery = "SELECT * FROM `restaurant_details` WHERE `restaurantId` ='$restaurantId'";
				$oneRestaurantResults = $conn -> query($selectOneRestaurantQuery);
				

				if($oneRestaurantResults ->num_rows == 0)
				{
					
					if( (substr($logoType,0,5)=="image")  && (substr($photoType,0,5)=="image"))	
					{	
						
						if((mkdir($restaurantFolder,0777,true)) && (mkdir($photoPath,0777,true)) && (mkdir($logoPath,0777,true)) )
						{	
									
									$insertQuery = "INSERT INTO `restaurant_details`(`restaurantId`, `restaurantName`, `typeOfCuisine`,`photoName` ,`photoPath`,`logoName` ,`logoPath`, `aboutRestaurant`, `takeAway`, `delivery`, `dineIn`, `minimumOrder`, `deliveryTime`, `category`, `popular`, `rating`) VALUES ('$restaurantId','$restaurantName','$typeOfCuisine','$photoName','$photoPath','$logoName','$logoPath','$aboutRestaurant','$takeAway','$delivery','$dineIn',$minimumOrder,'$deliveryTime','$category','$popular','$rating')";
									$insertResult = $conn -> query($insertQuery);
									
									$insertAddressQuery="INSERT INTO `address`(`addressId`, `addressType`, `addressTypeId`, `buildingNo`, `buildingName`, `streetNo`, `streetName`, `city`, `landmark`, `pinCode`, `district`, `state`, `country`) VALUES (``, `Restaurant`, `$restaurantId`, `$buildingNo`, `$buildingName`, `$streetNo`, `$streetName`, `$city`, `$landmark`, `$pinCode`, `$district`, `$state`, `$country`)";
									$insertAddressResult = $conn -> query($insertAddressQuery);
									
									$insertTimingQuery="INSERT INTO `timings`(`timingId`, `restaurantId`, `monMrngTym`, `monMrngAm`, `monEvngTym`, `monEvngAm`, `tuesMrngTym`, `tuesMrngAm`, `tuesEvngTym`, `tuesEvngAm`, `wedMrngTym`, `wedMrngAm`, `wedEvngTym`, `wedEvngAm`, `thrMrngTym`, `thrMrngAm`, `thrEvngTym`, `thrEvngAm`, `friMrngTym`, `friMrngAm`, `friEvngTym`, `friEvngAm`, `satMrngTym`, `satMrngAm`, `satEvngTym`, `satEvngAm`, `sunMrngTym`, `sunMrngAm`, `sunEvngTym`, `sunEvngAm`) VALUES (``, `$restaurantId`, `$monMrngTym`, `$monMrngAm`, `$monEvngTym`, `$monEvngAm`, `$tuesMrngTym`, `$tuesMrngAm`, `$tuesEvngTym`, `$tuesEvngAm`, `$wedMrngTym`, `$wedMrngAm`, `$wedEvngTym`, `$wedEvngAm`, `$thrMrngTym`, `$thrMrngAm`, `$thrEvngTym`, `$thrEvngAm`, `$friMrngTym`, `$friMrngAm`, `$friEvngTym`, `$friEvngAm`, `$satMrngTym`, `$satMrngAm`, `$satEvngTym`, `$satEvngAm`, `$sunMrngTym`, `$sunMrngAm`, `$sunEvngTym`, `$sunEvngAm`)";
									$insertTimingResult = $conn -> query($insertTimingQuery);
									
									move_uploaded_file($photo,$photoVariable);
									move_uploaded_file($logo,$logoVariable);
									
									if($insertResult && $insertAddressResult && $insertTimingResult)
									{
										$sucess = "Insertion Successful";
										header('Location:addRestaurant.php?sucess='.$sucess);
									} 
									else
									{
										$error = "Insertion Failed! Please Try Again.";
									}
						}
						else
						{
							$error = "Unable to create directory! Please Try Again.";
						}
					}
					else
					{
						$error = "Insertion Failed! Please Try Again.Only Images Allowed";
					}
				}
				else 
				{
					$error = "Insertion Failed! Restaurant With Same Id Already exists";
				
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
                                <h4 class="pull-left page-title">Add Restaurant</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Restaurant</a></li>
                                    <li class="active">Add Restaurant</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
					
					<div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Enter Restaurant Details</h3></div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Restaurant Id</label>
                                        <div class="col-md-10">
                                            <input type="text" name="restaurantId" class="form-control" placeholder="RST0x" required="required" value="<?php echo $restaurantId;?>">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Restaurant Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="restaurantName" class="form-control" placeholder="FUN 'N' FOOD" value="<?php echo $restaurantName;?>" required="required">
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
                                            <input type="file" name="photo" class="form-control" value="<?php echo $photo;?>" multiple="multiple" required="required">
                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Logo</label>
                                        <div class="col-md-10">
                                            <input type="file" name="logo" class="form-control" value="<?php echo $logo;?>" required="required">
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
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Is it Popular?</label>
                                        <div class="col-md-10">
                                            <select class="form-control" name="popular">
                                                <option value="Popular" <?php if ($popular == "Popular") echo "selected='selected'";?>>Popular</option>
                                                <option value="Not Popular" <?php if ($popular == "Not Popular") echo "selected='selected'";?>>Not Popular</option>
                                            </select>
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Rating</label>
                                        <div class="col-md-10">
                                            <input type="text" name="rating" class="form-control" value="<?php echo $rating;?>" placeholder="4" required="required">
                                        </div>
                                    </div>
									
									
									<div class="col-md-12">
										<div class="panel-group" id="accordion-test-2">
											<div class="panel panel-info panel-color">
												<div class="panel-heading">
													<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-test-2" href="ui-tabs-accordions.html#collapseOne-2" aria-expanded="false" class="collapsed"> Enter Address Details Below </a></h4>
												</div>
												<div id="collapseOne-2" class="panel-collapse collapse">
													<div class="panel-body"> 
													
											
												
																
																	<label class="col-md-2 control-label">Building No.</label>
																	<div class="col-md-4">
																		<input type="text" name="buildingNo" class="form-control" value="<?php echo $buildingNo;?>" placeholder="H-123" required="required">
																	</div>
																	
																	<label class="col-md-2 control-label">Building Name</label>
																	<div class="col-md-4">
																		<input type="text" name="buildingName" class="form-control" value="<?php echo $buildingName;?>" placeholder="Pacific Mall" required="required">
																	</div>
																
																	<br></br>
																
																	<label class="col-md-2 control-label">Street No.</label>
																	<div class="col-md-4">
																		<input type="text" name="streetNo" class="form-control" value="<?php echo $streetNo;?>" placeholder="123" ">
																	</div>
																	
																	<label class="col-md-2 control-label">Street Name</label>
																	<div class="col-md-4">
																		<input type="text" name="streetName" class="form-control" value="<?php echo $streetName;?>" placeholder="Gandhi Marg" ">
																	</div>
																
																	<br></br>
															
																	<label class="col-md-2 control-label">City/Town/Locality</label>
																	<div class="col-md-4">
																		<input type="text" name="city" class="form-control" value="<?php echo $city;?>" placeholder="Arya Nagar" required="required">
																	</div>
																	
																	<label class="col-md-2 control-label">Landmark</label>
																	<div class="col-md-4">
																		<input type="text" name="landmark" class="form-control" value="<?php echo $landmark;?>" placeholder="Shahid Chowk" required="required">
																	</div>
															
																	<br></br>
														
																	<label class="col-md-2 control-label">Pin Code</label>
																	<div class="col-md-4">
																		<input type="number" name="pincode" class="form-control" value="<?php echo $pincode;?>" placeholder="278654" required="required">
																	</div>
																	
																	<label class="col-md-2 control-label">District</label>
																	<div class="col-md-4">
																		<input type="text" name="district" class="form-control" value="<?php echo $district;?>" placeholder="Nanital" required="required">
																	</div>
																
																	<br></br>
																
																	<label class="col-md-2 control-label">State</label>
																	<div class="col-md-4">
																		<input type="text" name="state" class="form-control" value="<?php echo $state;?>" placeholder="Agra" required="required">
																	</div>
																	
																	<label class="col-md-2 control-label">Country</label>
																	<div class="col-md-4">
																		<select class="form-control" name="country" >
												
																			<option value="India" <?php if ($country == "India") echo "selected='selected'";?>>India</option>
																			
																		</select>
																	</div>
														
																</div>
															</div>
														</div>

																
														
														
													
											<div class="panel panel-info panel-color">
												<div class="panel-heading">
													<h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion-test-2" href="ui-tabs-accordions.html#collapseTwo-2" class="collapsed" aria-expanded="false"> Enter Timing Details Below </a></h4></div>
												<div id="collapseTwo-2" class="panel-collapse collapse in">
													<div class="panel-body"> 
														<p style="color:red">* Fill Closed if Restaurant Manager announce holiday on that day.</p>
														<div class="col-md-12">
														<label class="col-md-2 control-label">Monday</label>
														<div class="col-md-2">
															<input type="text" name="monMrngTym" class="form-control" value="<?php echo $monMrngTym;?>" placeholder="09:00" required="required">
														</div>
														<div class="col-md-2">
															<select class="form-control" name="monMrngAm">
																<option value="AM" <?php if ($monMrngAm == "AM") echo "selected='selected'";?>>AM</option>
																<option value="PM" <?php if ($monMrngAm == "PM") echo "selected='selected'";?>>PM</option>
															</select>
														</div>
														<div class="col-md-1">
														<p style="text-align:center;">--</p>
													`	</div>
														<div class="col-md-2">
															<input type="text" name="monEvngTym" class="form-control" value="<?php echo $monEvngTym;?>" placeholder="09:00" required="required">
														</div>
														<div class="col-md-2">
															<select class="form-control" name="monEvngAm">
																<option value="AM" <?php if ($monEvngAm == "AM") echo "selected='selected'";?>>AM</option>
																<option value="PM" <?php if ($monEvngAm == "PM") echo "selected='selected'";?>>PM</option>
															</select>
														</div>
														</div>
														
														<div class="col-md-12">
														<label class="col-md-2 control-label">Tuesday</label>
														<div class="col-md-2">
															<input type="text" name="tuesMrngTym" class="form-control" value="<?php echo $tuesMrngTym;?>" placeholder="09:00" required="required">
														</div>
														<div class="col-md-2">
															<select class="form-control" name="tuesMrngAm">
																<option value="AM" <?php if ($tuesMrngAm == "AM") echo "selected='selected'";?>>AM</option>
																<option value="PM" <?php if ($tuesMrngAm == "PM") echo "selected='selected'";?>>PM</option>
															</select>
														</div>
														<div class="col-md-1">
														<p style="text-align:center;">--</p>
													`	</div>
														<div class="col-md-2">
															<input type="text" name="tuesEvngTym" class="form-control" value="<?php echo $tuesEvngTym;?>" placeholder="09:00" required="required">
														</div>
														<div class="col-md-2">
															<select class="form-control" name="tuesEvngAm">
																<option value="AM" <?php if ($tuesEvngAm == "AM") echo "selected='selected'";?>>AM</option>
																<option value="PM" <?php if ($tuesEvngAm == "PM") echo "selected='selected'";?>>PM</option>
															</select>
														</div>
														</div>
														
														<div class="col-md-12">
														<label class="col-md-2 control-label">Wednesday</label>
														<div class="col-md-2">
															<input type="text" name="wedMrngTym" class="form-control" value="<?php echo $wedMrngTym;?>" placeholder="09:00" required="required">
														</div>
														<div class="col-md-2">
															<select class="form-control" name="wedMrngAm">
																<option value="AM" <?php if ($wedMrngAm == "AM") echo "selected='selected'";?>>AM</option>
																<option value="PM" <?php if ($wedMrngAm == "PM") echo "selected='selected'";?>>PM</option>
															</select>
														</div>
														<div class="col-md-1">
														<p style="text-align:center;">--</p>
													`	</div>
														<div class="col-md-2">
															<input type="text" name="wedEvngTym" class="form-control" value="<?php echo $wedEvngTym;?>" placeholder="09:00" required="required">
														</div>
														<div class="col-md-2">
															<select class="form-control" name="wedEvngAm">
																<option value="AM" <?php if ($wedEvngAm == "AM") echo "selected='selected'";?>>AM</option>
																<option value="PM" <?php if ($wedEvngAm == "PM") echo "selected='selected'";?>>PM</option>
															</select>
														</div>
														</div>
														
														<div class="col-md-12">
														<label class="col-md-2 control-label">Thrusday</label>
														<div class="col-md-2">
															<input type="text" name="thrMrngTym" class="form-control" value="<?php echo $thrMrngTym;?>" placeholder="09:00" required="required">
														</div>
														<div class="col-md-2">
															<select class="form-control" name="thrMrngAm">
																<option value="AM" <?php if ($thrMrngAm == "AM") echo "selected='selected'";?>>AM</option>
																<option value="PM" <?php if ($thrMrngAm == "PM") echo "selected='selected'";?>>PM</option>
															</select>
														</div>
														<div class="col-md-1">
														<p style="text-align:center;">--</p>
													`	</div>
														<div class="col-md-2">
															<input type="text" name="thrEvngTym" class="form-control" value="<?php echo $thrEvngTym;?>" placeholder="09:00" required="required">
														</div>
														<div class="col-md-2">
															<select class="form-control" name="thrEvngAm">
																<option value="AM" <?php if ($thrEvngAm == "AM") echo "selected='selected'";?>>AM</option>
																<option value="PM" <?php if ($thrEvngAm == "PM") echo "selected='selected'";?>>PM</option>
															</select>
														</div>
														</div>
														
														<div class="col-md-12">
														<label class="col-md-2 control-label">Friday</label>
														<div class="col-md-2">
															<input type="text" name="friMrngTym" class="form-control" value="<?php echo $friMrngTym;?>" placeholder="09:00" required="required">
														</div>
														<div class="col-md-2">
															<select class="form-control" name="friMrngAm">
																<option value="AM" <?php if ($friMrngAm == "AM") echo "selected='selected'";?>>AM</option>
																<option value="PM" <?php if ($friMrngAm == "PM") echo "selected='selected'";?>>PM</option>
															</select>
														</div>
														<div class="col-md-1">
														<p style="text-align:center;">--</p>
													`	</div>
														<div class="col-md-2">
															<input type="text" name="friEvngTym" class="form-control" value="<?php echo $monEvngTym;?>" placeholder="09:00" required="required">
														</div>
														<div class="col-md-2">
															<select class="form-control" name="friEvngAm">
																<option value="AM" <?php if ($friEvngAm == "AM") echo "selected='selected'";?>>AM</option>
																<option value="PM" <?php if ($friEvngAm == "PM") echo "selected='selected'";?>>PM</option>
															</select>
														</div>
														</div>
														
														<div class="col-md-12">
														<label class="col-md-2 control-label">Saturday</label>
														<div class="col-md-2">
															<input type="text" name="satMrngTym" class="form-control" value="<?php echo $monMrngTym;?>" placeholder="09:00" required="required">
														</div>
														<div class="col-md-2">
															<select class="form-control" name="satMrngAm">
																<option value="AM" <?php if ($satMrngAm == "AM") echo "selected='selected'";?>>AM</option>
																<option value="PM" <?php if ($satMrngAm == "PM") echo "selected='selected'";?>>PM</option>
															</select>
														</div>
														<div class="col-md-1">
														<p style="text-align:center;">--</p>
													`	</div>
														<div class="col-md-2">
															<input type="text" name="satEvngTym" class="form-control" value="<?php echo $satEvngTym;?>" placeholder="09:00" required="required">
														</div>
														<div class="col-md-2">
															<select class="form-control" name="satEvngAm">
																<option value="AM" <?php if ($satEvngAm == "AM") echo "selected='selected'";?>>AM</option>
																<option value="PM" <?php if ($satEvngAm == "PM") echo "selected='selected'";?>>PM</option>
															</select>
														</div>
														</div>
														
														<div class="col-md-12">
														<label class="col-md-2 control-label">Sunday</label>
														<div class="col-md-2">
															<input type="text" name="sunMrngTym" class="form-control" value="<?php echo $sunMrngTym;?>" placeholder="09:00" required="required">
														</div>
														<div class="col-md-2">
															<select class="form-control" name="sunMrngAm">
																<option value="AM" <?php if ($sunMrngAm == "AM") echo "selected='selected'";?>>AM</option>
																<option value="PM" <?php if ($sunMrngAm == "PM") echo "selected='selected'";?>>PM</option>
															</select>
														</div>
														<div class="col-md-1">
														<p style="text-align:center;">--</p>
													`	</div>
														<div class="col-md-2">
															<input type="text" name="sunEvngTym" class="form-control" value="<?php echo $sunEvngTym;?>" placeholder="09:00" required="required">
														</div>
														<div class="col-md-2">
															<select class="form-control" name="sunEvngAm">
																<option value="AM" <?php if ($sunEvngAm == "AM") echo "selected='selected'";?>>AM</option>
																<option value="PM" <?php if ($sunEvngAm == "PM") echo "selected='selected'";?>>PM</option>
															</select>
														</div>
														</div>
														
													</div>
												</div>
											</div>
											<br></br>
										
										
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
										echo "<span class=\"alert-info\"> See Restaurant Details Below</span>";
									}
                                    ?>
                                    <button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Add Restaurant</button>
                                </form>
									</div>
								
                            
                        </div>
                    </div>
                </div>
		
				<?php
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