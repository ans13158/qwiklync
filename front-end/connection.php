<?php

	$mysql_host='localhost';
	$mysql_user='root';
	$mysql_pass='ans';

	$connection_error='Couldn\'t connect to the database.Please Enter valid details.';

	$mysql_db='qwiklync';
	$conn= new mysqli($mysql_host,$mysql_user,$mysql_pass,$mysql_db);
	
	
						
	if(!$conn)
	{
		die($connection_error);
	}
	//$countCategorys = 5;

	//$conn->close() ;
?>
