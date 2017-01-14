<?php


 //if(isset($_POST['submit'] ) )  {
 	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) )  {

 		$name = $_POST['name'];
 		$email = $_POST['email'];
 		//$jobResume = $_POST['jobResume'];
 		$message = $_POST['message'];
 		//echo "yes";
 		
 			//checks on uploaded file
$curdir= dirname($_SERVER['PHP_SELF']);
 		$target_dir = $url.$curdir."/resume/";
$target_file = $target_dir . basename($_FILES["uploadResume"]["name"]);
//echo $target_dir;
echo $_FILES["uploadResume"]["tmp_name"];
$uploadOk = 1;

// Check if image file is a actual image or fake image

// Check if file already exists



// Check if $uploadOk is set to 0 by an error
/*if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {*/
    if (move_uploaded_file($_FILES["uploadResume"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["uploadResume"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
 	//}
 /*}


 else  {
 	header('Location:single-job.php?jobId=');
 }