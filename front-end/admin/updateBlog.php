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
		
		$title= '';
		$mainPoint= '';
		$content= '';
		$photo='';
		$photoName= '';
		$photoType= '';
		$photoPath= '';
		$category='';
		$date='';
		
		if(isset($_POST['submitButton']))
		{
			$blogId= $_POST['blogId'];
			$title= $_POST['title'];
			$mainPoint= $_POST['mainPoint'];
			$content= $_POST['content'];
			$photo= $_FILES['photo']['tmp_name'];
			$photoType= $_FILES['photo']['type'];
			$photoName= $_FILES['photo']['name'];
			$category=$_POST['category'];
			$date=date("Y-F-d");
			$uniq=uniqid();
			
			$photoFolderName= $photoName.$uniq;
			$path="../admin/blogImages/".$photoFolderName;
			$photoPath= $path;
			$photoVariable= $path."/".$photoName;


				if(substr($photoType,0,5)=="image")	
				{
					$pathQuery="Select `photoPath` From `blog` WHERE `blogId`='$blogId'";
					$pathQueryResult = $conn -> query($pathQuery);
					$pathData = mysqli_fetch_assoc($pathQueryResult);
					$oldPhotoPath=$pathData['photoPath'];
					
					removeFolder($oldPhotoPath);
				
					if(mkdir($path,0777,true))
					{
							
						$updateQuery = "UPDATE `blog` SET `title`='$title',`content`='$content',`mainPoint`='$mainPoint',`photoName`='$photoName',`photoPath`='$photoPath',`date`='$date',`category`='$category' WHERE `blogId`='$blogId'";
						$updateResult = $conn -> query($updateQuery);
						move_uploaded_file($photo,$photoVariable);
						
						if($updateResult)
						{
							$sucess = "Blog is sucessfully updated.";
							header('Location:updateBlog.php?sucess='.$sucess);
						} 
						else
						{
							$error = "Updation Failed! Please Try Again.";
						}
					}
					else
					{
						$error = "Unable To Make Directory.";
					}
				}
				else
				{
					$error = "Updation Failed! Please Try Again.Only Images Allowed";
					header('Location:updateBlog.php?blogId='.$blogId.'&error='.$error.'&submitButton=');
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
	
	<nav>
		<?php
			include 'common/nav.php';
		?>
	</nav>

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
                                <h4 class="pull-left page-title">Update Blog</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li class="active">Update Blog</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
						
					<?php
                    if(isset($_GET['blogId']))
					{
                        $blogId = $_GET['blogId'];
                        $selectBlog = "SELECT * FROM `blog` WHERE `blogId` = '$blogId'";
                        $selectBlogResult = $conn -> query($selectBlog);
						$count = mysqli_num_rows($selectBlogResult);
						if(!$count==1)
						{
							$error="Please Enter valid Blog Id";
							header('Location:updateBlog.php?error='.$error.'&submitButton=');
						}
						
						else
						{
								$blogData = mysqli_fetch_assoc($selectBlogResult);
								
								$title= $blogData['title'];
								$mainPoint= $blogData['mainPoint'];
								$content= $blogData['content'];
								$photoPath= $blogData['photoPath'];
								$photoName= $blogData['photoName'];
								$photo=$photoPath."/".$photoName; 
								$category=$blogData['category'];
								$date=$blogData['date'];
								
								
								if(!empty($blogId))
								{
									?>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="panel panel-primary">
												<div class="panel-heading">
													<h3 class="panel-title">Update Blog</h3>
												</div>
												<div class="panel-body">
													<form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
														
														<input type="hidden" name="blogId" value="<?php echo $blogId;?>" >
														
														<div class="form-group">
															<label class="col-md-2 control-label">Title</label>
															<div class="col-md-10">
																<input type="textarea" name="title"  class="form-control" value="<?php echo $title;?>" placeholder="Title" required="required">
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Main Point</label>
															<div class="col-md-10">
																<input type="textarea" style="height:80px" name="mainPoint" class="form-control" value="<?php echo $mainPoint;?>" placeholder="Main Point" required="required">
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Content</label>
															<div class="col-md-10">
																<input type="text" name="content" style="height:180px" class="form-control" value="<?php echo $content;?>" placeholder="Content" required="required">
														   </div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Photo</label>
															<div class="col-md-10">
																<input type="file" name="photo" class="form-control" required="required">
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-md-2 control-label">Category</label>
															<div class="col-md-10">
																<input type="text" name="category" class="form-control" placeholder="Category" value="<?php echo $category;?>" required="required">
															</div>
														</div>
														
														<?php
														if(!$sucess == "")
														{
															echo "<span <b style=\"color:green\">".$sucess."</b></span>";
														} 
														else if(!$error == "")
														{
															echo "<span <b style=\"color:red\">".$error."</b></span>";
														}
														else 
														{
															echo "";
														}


														?>
														<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Update Blog</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								
						<?php
									}
								}
							}
							else
							{
						?>
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title">Enter Blog Details</h3></div>
									<div class="panel-body">
										<form class="form-horizontal" role="form" method="get" action="<?php echo $current_file; ?>">
											<div class="form-group">
												<label class="col-md-2 control-label">Blog Id</label>
												<div class="col-md-10">
													<input type="text" name="blogId" class="form-control" placeholder="Blog Id">
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
											echo "<span class=\"alert-info\"> Search Blog Details Below</span>";
										}
										?>
										<button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Search Blog</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				<?php
					}
				
					include 'modules/allBlog.php';
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