<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$id="";
	require_once "connection.php";
$id = $_GET['id'];
$start = $_GET['start'];
$id = $id - $start;
//echo $start;


$sql="SELECT `companyId`,`name`,`address`,`logoName`,`logoPath` FROM `company` WHERE `companyId` <'$id' ORDER BY `companyId`  DESC LIMIT 6 ";
$result = mysqli_query($conn,$sql);


while($row = mysqli_fetch_assoc($result)) {
									$companyId = $row['companyId'];
                                    $name = $row['name'];
                                    $address = $row['address'];
                                    $logoPath = $row['logoPath'];
                                    $logoName = $row['logoName'];
                                    $logo = $logoPath . "/" . $logoName  ;
?>
<div class="col-md-4 col-sm-6 col-xs-12">
                                    <a href="single-company.php?companyId=<?php echo $companyId; ?>">
                                        <div class="company-list-box">
                                            <span class="company-list-img">
                                    <img src="<?php echo $logo; ?>" class="img-responsive" alt="<?php echo $name; ?>">
                                </span>
                                            <div class="company-list-box-detail">
                                                <h5> <?php echo $name; ?> </h5>
                                                <p><?php echo $address; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
<?php



    
}










mysqli_close($conn);
?>
</body>
</html>