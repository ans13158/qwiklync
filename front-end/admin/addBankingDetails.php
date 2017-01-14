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
		
		$bankingDetailsId= '';
		$ifscCode= '';
		$bankName= '';
		$accountNo='';
		$accountHolderName= '';
		$branch='';
		$email= '';		
		
		
		if(isset($_POST['submitButton']))
		{
			$bankingDetailsId= $_POST['bankingDetailsId'];
			$ifscCode= $_POST['ifscCode'];
			$bankName= $_POST['bankName'];
			$accountNo= $_POST['accountNo'];
			$accountHolderName= $_POST['accountHolderName'];
			$branch= $_POST['branch'];
			$email= $_POST['email'];
		
			if(!empty($bankingDetailsId) && !empty($ifscCode) && !empty($bankName) && !empty($accountNo) && !empty($accountHolderName) && !empty($branch) && !empty($email))	
			{
				$selectBankingDetailsQuery = "SELECT * FROM `banking_details` WHERE `bankingDetailsId` ='$bankingDetailsId'";
				$selectBankingDetailsQueryResults = $conn -> query($selectBankingDetailsQuery);

				if($selectBankingDetailsQueryResults ->num_rows == 0)
				{
					//Process your form
					$insertQuery = "INSERT INTO `banking_details`(`bankingDetailsId`, `ifscCode`, `bankName`,`accountNo` ,`accountHolderName`,`branch` ,`email`) VALUES ('$bankingDetailsId','$ifscCode','$bankName','$accountNo','$accountHolderName','$branch','$email')";
					$insertResult = $conn -> query($insertQuery);
					if($insertResult) 
					{
						$sucess = "Insertion Successful";
						header('Location:addBankingDetails.php?sucess='.$sucess);
					} else
					{
						$error = "Insertion Failed! Please Try Again.";
						header('Location:addBankingDetails.php?Id='.$bankingDetailsId.'&error='.$error.'&submitButton=');
					}
					
				}
				else 
				{
					$error = "Insertion Failed! Banking Details With Same Id Already exists";
				
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
                                <h4 class="pull-left page-title">Add Banking Details</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Banking Details</a></li>
                                    <li class="active">Add Banking Details</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
					
					<div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Enter Banking Details</h3></div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Banking Details Id</label>
                                        <div class="col-md-10">
                                            <input type="text" name="bankingDetailsId" class="form-control" placeholder="BKD0x" required="required" value="<?php echo $bankingDetailsId;?>">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Branch IFSC Code</label>
                                        <div class="col-md-10">
                                            <input type="text" name="ifscCode" class="form-control" placeholder="SBIN0010405" value="<?php echo $ifscCode;?>" required="required">
                                        </div>
                                    </div>

									<div class="form-group">
                                        <label class="col-md-2 control-label">Bank Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="bankName" class="form-control"  value="<?php echo $bankName;?>" placeholder="State Bank of India" required="required">
                                        </div>
                                    </div>

									
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Account Number</label>
                                        <div class="col-md-10">
                                            <input type="text" name="accountNo" class="form-control" value="<?php echo $accountNo;?>" placeholder="1434765462756454" required="required">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Account Holder Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="accountHolderName" class="form-control" value="<?php echo $accountHolderName;?>" placeholder="Priyank Jha" required="required">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Branch Name</label>
                                        <div class="col-md-10">
                                            <input type="text" name="branch" class="form-control" value="<?php echo $branch;?>" placeholder="Pantnagar" required="required">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Bank Email Id</label>
                                        <div class="col-md-10">
                                            <input type="text" name="email" class="form-control" value="<?php echo $email;?>" placeholder="abc@gmail.com" required="required">
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
										echo "<span class=\"alert-info\"> See Banking Details Below</span>";
									}
                                    ?>
                                    <button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Add Banking Details</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
		
				<?php
					include 'modules/allBankingDetails.php';
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