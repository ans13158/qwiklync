<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$q = $_GET['q'];


	include 'connection.php';
	
	$sql="SELECT * FROM faq WHERE faqid <=$q AND faqid >=1";
	$result = mysqli_query($conn,$sql);

	$r=7;
	$c=1;
	while($row = mysqli_fetch_array($result)) 
	{

		echo '<div class="panel panel-default"><div class="panel-heading" role="tab" id="'.$c.'"><h4 class="panel-title"> <a class="collapsed collapse-controle" data-toggle="collapse" data-parent="#accordion" href="#'.$r.'" aria-expanded="false" aria-controls="'.$r.'">'.$row['question'].'<span class="expand-icon-wrap"><i class="fa expand-icon"></i></span> </a> </h4></div><div id="'.$r.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="'.$c.'" aria-expanded="false"><div class="panel-body"><p>'.$row['answer'].'</p></div></div></div>';

		$r++;
		$c++;

    
	}










mysqli_close($conn);
?>
</body>
</html>