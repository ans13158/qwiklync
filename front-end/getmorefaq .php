<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q = $_GET['q'];

$servername = "localhost";
$username = "root";
$password = "ans";
$dbname = "qwiklync";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

$sql="SELECT * FROM faq WHERE faqid <=$q AND faqid >=5";
$result = mysqli_query($con,$sql);

$r=9;
$c=1;
while($row = mysqli_fetch_array($result)) {

echo '<div class="panel panel-default"><div class="panel-heading" role="tab" id="'.$c.'"><h4 class="panel-title"> <a class="collapsed collapse-controle" data-toggle="collapse" data-parent="#accordion" href="#'.$r.'" aria-expanded="false" aria-controls="'.$r.'">'.$row['faqId'].') ' .$row['question'].'<span class="expand-icon-wrap"><i class="fa expand-icon"></i></span> </a> </h4></div><div id="'.$r.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="'.$c.'" aria-expanded="false"><div class="panel-body"><p>'.$row['answer'].'</p></div></div></div>';

$r++;
$c++;

    
}










mysqli_close($con);
?>
</body>
</html>