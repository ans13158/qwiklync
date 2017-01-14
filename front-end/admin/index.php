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
		
		//Get All Blog Details
		$selectBlog = "SELECT * FROM `blog`";
		$selectBlogResult = $conn -> query($selectBlog);
	

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
									<h4 class="pull-left page-title">Dashboard</h4>
									<ol class="breadcrumb pull-right">
										<li><a href="index.html#">Qwiklync</a></li>
										<li class="active">Dashboard</li>
									</ol>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-lg-3">
								<div class="panel panel-primary text-center">
									<div class="panel-heading">
										<h4 class="panel-title">Total Jobs</h4></div>
									<div class="panel-body">
										<h3 class=""><b>2568</b></h3>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-3">
								<div class="panel panel-primary text-center">
									<div class="panel-heading">
										<h4 class="panel-title">Total Job Seekers</h4></div>
									<div class="panel-body">
										<h3 class=""><b>368</b></h3>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-3">
								<div class="panel panel-primary text-center">
									<div class="panel-heading">
										<h4 class="panel-title">Total Companies</h4></div>
									<div class="panel-body">
										<h3 class=""><b>2548</b></h3>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-3">
								<div class="panel panel-primary text-center">
									<div class="panel-heading">
										<h4 class="panel-title">Total Blogs</h4></div>
									<div class="panel-body">
										<h3 class=""><b>27797</b></h3>
									</div>
								</div>
							</div>
						</div>
						
						<?php
							include 'modules/allBlog.php';
						?>
						
					</div>
				</div>
			</div>
			

		</div>
		
		<?php
			include 'common/footer.php';
		?>
	</body>
</html>
<?php
	}
?>