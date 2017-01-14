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
		$adminResult = $conn -> query($getAdminData);
		$adminResultData = mysqli_fetch_assoc($adminResult);
		
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
		
		$foodId= '';
		$restaurantId= '';
		$foodDetails='';
		$foodName='';
		$foodDescription='';
		$type='';
		$oldPrice= '';
		$newPrice= '';
		$category= '';
		
		
		if(isset($_POST['submitButton']))
		{
			$foodId= $_POST['oldFoodId'];
			$restaurantId= $_POST['restaurantId'];
			$foodDetails=$_POST['foodDetails'];
			$foodName=$_POST['foodName'];
			$foodDescription=$_POST['foodDescription'];
			$type=$_POST['type'];
			$oldPrice= $_POST['oldPrice'];
			$newPrice= $_POST['newPrice'];
			$category= $_POST['category'];

				
			if(!empty($foodId) && !empty($restaurantId) && !empty($foodDetails) && !empty($foodName) && !empty($foodDescription) && !empty($type) && !empty($oldPrice) && !empty($newPrice) && !empty($category))
			
			{
			
				//error delete query is not running
				$deleteQuery= "DELETE FROM `food` WHERE  `foodId`=`".$foodId."`";
				$deleteResult = mysqli_query($conn, $deleteQuery);
				
				
				if($deleteResult)  
				{

					$sucess = "Deletion Successful";
					header('Location:deleteMenuFood.php?sucess='.$sucess);
				}
				else
				{
					$error = "Deletion Failed!";
					header('Location:deleteMenuFood.php?foodId='.$foodId.'&error='.$error.'&submitButton=');
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
					<?php
					
							if(isset($_GET['foodId']))
							{
								$foodId = $_GET['foodId'];
								$foodQuery = "SELECT * FROM `food` WHERE `foodId` = '$foodId'";
								$foodQueryResults = $conn -> query($foodQuery);
								$foodQueryResultsCount = mysqli_num_rows($foodQueryResults);
								if(!$foodQueryResultsCount==1)
								{
									$error="Please Enter valid Food Id";
									header('Location:deleteMenuFood.php?error='.$error.'&submitButton=');
								}
								
								else
								{
										$foodData = mysqli_fetch_assoc($foodQueryResults);
										
										$foodId=$foodData['foodId'];
										$restaurantId=$foodData['restaurantId'];
										$foodDetails=$foodData['foodDetails'];
										$foodName=$foodData['foodName'];
										$foodDescription=$foodData['foodDescription'];
										$type=$foodData['type'];
										$oldPrice=$foodData['oldPrice'];
										$newPrice=$foodData['newPrice'];
										$category=$foodData['category'];
										
										if(!empty($foodId))
										{
											?>
											
											<div class="row">
												<div class="col-sm-12">
													<div class="panel panel-primary">
														<div class="panel-heading">
															<h3 class="panel-title">Delete Food Details</h3>
														</div>
														<div class="panel-body">
															<form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
																<div class="form-group">
																	<label class="col-md-2 control-label">Food Id</label>
																	<div class="col-md-10">
																		<input type="text" name="foodId" class="form-control" required="required" value="<?php echo $foodId;?>" disabled>
																		<input type="hidden" name="oldFoodId" class="form-control" value="<?php echo $foodId;?>">
																	</div>
																</div>
																
																<div class="form-group">
																	<label class="col-md-2 control-label">Restaurant Id</label>
																	<div class="col-md-10">
																		<input type="text" name="restaurantId" class="form-control" placeholder="RST0x" value="<?php echo $restaurantId;?>" required="required" readonly>
																	</div>
																</div>

																<div class="form-group">
																	<label class="col-md-2 control-label">Food Details</label>
																	<div class="col-md-10">
																		<input type="textarea" name="foodDetails" class="form-control"  value="<?php echo $foodDetails;?>" placeholder="It is very famous in China" required="required" readonly>
																	</div>
																</div>

																
																<div class="form-group">
																	<label class="col-md-2 control-label">Food Name</label>
																	<div class="col-md-10">
																		<input type="text" name="foodName" class="form-control" value="<?php echo $foodName;?>" placeholder="Kadahi Paneer" required="required" readonly>
																	</div>
																</div>
																
																<div class="form-group">
																	<label class="col-md-2 control-label">Food Description</label>
																	<div class="col-md-10">
																		<input type="textarea" name="foodDescription" class="form-control" value="<?php echo $foodDescription;?>" placeholder="Yummy and Spicy in Taste" required="required" readonly>
																	</div>
																</div>
																
																<div class="form-group">
																	<label class="col-md-2 control-label">Type</label>
																	<div class="col-md-10">
																		<input type="text" name="type" class="form-control" value="<?php echo $type;?>" placeholder="Vegetarian" required="required" readonly>
																	</div>
																</div>
																
																<div class="form-group">
																	<label class="col-md-2 control-label">Old Price</label>
																	<div class="col-md-10">
																		<input type="float" name="oldPrice" class="form-control" value="<?php echo $oldPrice;?>" placeholder="72.5" required="required" readonly>
																	</div>
																</div>
																
																<div class="form-group">
																	<label class="col-md-2 control-label">New Price</label>
																	<div class="col-md-10">
																		<input type="float" name="newPrice" class="form-control" value="<?php echo $newPrice;?>" placeholder="75.5" required="required" readonly>
																	</div>
																</div>
																
																<div class="form-group">
																	<label class="col-md-2 control-label">Category</label>
																	<div class="col-md-10">
																		<input type="text" name="category" class="form-control" value="<?php echo $category;?>" placeholder="Indian" required="required" readonly>
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
																<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Delete Food Details</button>
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
											<h3 class="panel-title">Enter Food Details</h3></div>
										<div class="panel-body">
											<form class="form-horizontal" role="form" method="get" action="<?php echo $current_file; ?>">
												<div class="form-group">
													<label class="col-md-2 control-label">Food Id</label>
													<div class="col-md-10">
														<input type="text" name="foodId" class="form-control" placeholder="FID0x">
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
												echo "<span class=\"alert-info\"> Search Food Details Below</span>";
											}
											?>
											<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Search Food</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					<?php
					}
					?>
										
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

