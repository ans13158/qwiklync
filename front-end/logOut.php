<?php

session_start();
if(isset($_SESSION['userId']) && isset($_SESSION['userType']) && isset($_SESSION['username'] ) )
{
	session_destroy();
	header('Location:index.php');
}