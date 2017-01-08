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
		
		$fileName='';
		$fileType='';
		$file='';
		
		$foodId='';
		$restaurantId='';
		$foodDetails='';
		$foodName='';
		$foodDescription='';
		$type='';
		$oldPrice='';
		$newPrice='';
		$category='';
		
		if(isset($_POST['submitButton']))
		{
			$fileName= $_FILES['file']['name'];
			$file= $_FILES['file']['tmp_name'];
			if(!empty($fileName))
			{
				$fileType= explode('.',$fileName);
				if($fileType[1]=='csv')
				{
					$deleteQuery="DELETE FROM `food`";
					$deleteResult = mysqli_query($conn,$deleteQuery);
					if($deleteResult)
					{
						$handle= fopen($file,"r");
						while($data= fgetcsv($handle))
						{
							$foodId=$data[0];
							$restaurantId=$data[1];
							$foodDetails=$data[2];
							$foodName=$data[3];
							$foodDescription=$data[4];
							$type=$data[5];
							$oldPrice=$data[6];
							$newPrice=$data[7];
							$category=$data[8];
							
							//error Insert Query is not working
							$insertQuery="INSERT INTO `food`(`foodId`, `restaurantId`, `foodDetails`, `foodName`, `foodDescription`, `type`, `oldPrice`, `newPrice`, `category`) VALUES (`".$foodId."`, `".$restaurantId."`, `".$foodDetails."`, `".$foodName."`, `".$foodDescription."`, `".$type."`, `".$oldPrice."`, `".$newPrice."`, `".$category."`)";
							$insertResult = mysqli_query($conn,$insertQuery);
							
						}
					if($insertResult)
					{
						fclose($handle);
						$sucess = "Updation Successful";
						header('Location:addMenuCSV.php?sucess='.$sucess);
					}
					else
					{
						$error = "Insertion Failed! Try again";
					}
				}
				else
				{
					$error = "Updation Failed! Only CSV File is allowed.Try again";
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
                                <h4 class="pull-left page-title">Update Menu</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Menu</a></li>
                                    <li class="active">Update Menu</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
					

					
					
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">Enter Menu Details</h3>
								</div>
								<div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label type="hidden" class="col-md-2 control-label">Upload Menu CSV File</label>
                                        <div class="col-md-10">
                                            <input type="file" name="file" class="form-control" placeholder="abc.csv" required="required" >
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
                                    <button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Update Menu Details</button>
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

