<?php

require_once "connection.php";
$disp=[];
$y="";
function counting($param)  {
	$query = "SELECT Count(`jobId`) FROM `job` WHERE `category`= '$param'" ;
	//$disp = mysqli_fetch_array($result) ;
	return $query ;
}

$x = counting("Computer & IT");
//show($x) ;

//function show($x) {
$result = mysqli_fetch_array($conn->query($x) );
//$disp = mysqli_fetch_array($result) ;
echo $result[0];
//}