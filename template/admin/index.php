<?php
	ob_start();
	//Starting Session
	session_start();

	//Validating Existing Session
	if(!isset($_SESSION['adminId'])){
		header('Location:login.php');
	}
	else
	{
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
										<li><a href="index.html#">Xadmino</a></li>
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
										<h4 class="panel-title">Total Orders</h4></div>
									<div class="panel-body">
										<h3 class=""><b>2568</b></h3>
										<p class="text-muted"><b>48%</b> From Last 24 Hours</p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-3">
								<div class="panel panel-primary text-center">
									<div class="panel-heading">
										<h4 class="panel-title">Total Pending Orders</h4></div>
									<div class="panel-body">
										<h3 class=""><b>368</b></h3>
										<p class="text-muted"><b>15%</b> Orders in Last 10 hours</p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-3">
								<div class="panel panel-primary text-center">
									<div class="panel-heading">
										<h4 class="panel-title">Total Processed Order</h4></div>
									<div class="panel-body">
										<h3 class=""><b>2548</b></h3>
										<p class="text-muted"><b>65%</b> From Last 24 Hours</p>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-lg-3">
								<div class="panel panel-primary text-center">
									<div class="panel-heading">
										<h4 class="panel-title">Total Completed Orders</h4></div>
									<div class="panel-body">
										<h3 class=""><b>27797</b></h3>
										<p class="text-muted"><b>31%</b> From Last 1 month</p>
									</div>
								</div>
							</div>
						</div>
						
						<?php
							include 'common/dynamicTables.php';
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