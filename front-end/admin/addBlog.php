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
				
				if(mkdir($path,0777,true))
				{
					
					$insertQuery = "INSERT INTO `blog`(`title`, `content`, `mainPoint`, `photoName`, `photoPath`, `date`, `category`) VALUES ('$title', '$content', '$mainPoint', '$photoName', '$photoPath', '$date', '$category')";
					$insertResult = $conn -> query($insertQuery);
					move_uploaded_file($photo,$photoVariable);
					
					if($insertResult)
					{
						$sucess = "Blog is successfully added.";
						header('Location:addBlog.php?sucess='.$sucess);
					} 
					else
					{
						$error = "Addition of blog is failed! Please try again.";
					}
				}
				else
				{
					$error = "Unable to create directory! Please Try Again.";
				}
			}
			else
			{
				$error = "Addition of blog is failed! Please try again.Only images allowed";
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
	
	
		<?php
			include 'common/nav.php';
		?>
	

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
                                <h4 class="pull-left page-title">Add Blog</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="index.php">Admin</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li class="active">Add Blog</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
					
					<div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Enter Blog Details</h3></div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="post" action="<?php echo $current_file; ?>" enctype="multipart/form-data">
                                    
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Title</label>
                                        <div class="col-md-10">
                                            <input type="text" name="title"  class="form-control" value="<?php echo $title;?>" placeholder="Title" required="required">
                                        </div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Main Point</label>
                                        <div class="col-md-10">
											<textarea name="mainPoint" rows="2" class="form-control" value="<?php echo $mainPoint;?>" placeholder="Main Point" required="required"></textarea>
										</div>
                                    </div>
									
									<div class="form-group">
                                        <label class="col-md-2 control-label">Content</label>
                                        <div class="col-md-10">
											<textarea name="content" rows="7" class="form-control" value="<?php echo $content;?>" placeholder="Content" required="required"></textarea>
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
                                    } else if(!$error == "")
									{
                                        echo "<span <b style=\"color:red\">".$error."</b></span>";
                                    }
									else
									{
										echo "<span class=\"alert-info\"> See Blog Details Below</span>";
									}
                                    ?>
                                    <button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" name="submitButton">Add Blog</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
		
				<?php
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