<?php 
    ob_start();
	$current_file= $_SERVER['SCRIPT_NAME'];
	//Starting Session
	session_start();

	if(isset($_SESSION['userId']) && isset($_SESSION['userType']) && isset($_SESSION['username']) )   {
		$userId  = $_SESSION['userId'];
		$username = $_SESSION['username'];
		$userType = $_SESSION['userType'];
	}
	//connecting to database
	include 'connection.php';
	
   
	
	if(!isset($_GET['category']) && !isset($_GET['blogId']))
	{
		header('Location:blog.php');
	}
	else
	{        $blogId = $_GET['blogId'];
				$userId = $_SESSION["userId"];
				
		
		$message = "";
		if(isset($_GET['message']))
		{
			$message = $_GET['message'];
		}
		
		$blogId = $_GET['blogId'];
		$specialCategory = $_GET['category'];
		
		if(isset($_GET['submitReply']))
		{ 
			if(isset($_SESSION["userId"]))
			{
				$blogId = $_GET['blogId'];
				$userId = $_SESSION["userId"];
				$commentId = $_GET['commentId'];
				$replyDate = date("Y-F-d");
				$replyContent = $_GET['content'];
				
				$insertReplyQuery = "INSERT INTO `blogreply`(`commentId`, `blogId`, `userId`, `content`, `date`) VALUES ('$commentId', '$blogId', '$userId', '$replyContent', '$replyDate')";
				$insertReplyResult = $conn -> query($insertReplyQuery);
				
				if($insertReplyResult)
				{
					$message = "Your reply sucessfully submit.";
				}
				else
				{
					$message = "Insert Reply Query is not working";
				}
			}
			else
			{
				$message = "Sorry,We are unable to submit your reply.Please LogIn before Reply on the Comment.";
			}
		}
		
		if(isset($_GET['submitComment']))
		{
			if(isset($_SESSION["userId"]))
			{
				$blogId = $_GET['blogId'];
				$userId = $_SESSION["userId"];
				$commentDate = date("Y-F-d");
				$commentContent = $_GET['comment'];
				
				$insertCommentQuery = "INSERT INTO `blogcomment`(`blogId`, `userId`, `content`, `date`) VALUES ('$blogId', '$userId', '$commentContent', '$commentDate')";
				$insertCommentResult = $conn -> query($insertCommentQuery);
				
				if($insertCommentResult)
				{
					$message = "Your comment sucessfully submit.";
				}
				else
				{
					$message = "Insert Comment Query is not working";
				}
			}
			else
			{
				$message = "Sorry,We are unable to submit your comment.Please LogIn before Comment on the Blog.";
			}
		}
		
		require "common/header.php";
?>
    <title>Qwiklync - Full Blog</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>





</head>

	<!-- FOR NAVBAR & BLACK STRIP ON TOP  -->

    <?php require "common/navbar.php" ;  ?>

        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Blog</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a> </li>
                                <li class="active">Full Blog </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="categories-list-page light-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
						
						<div class="col-md-4 col-sm-12 col-xs-12">
                            <aside>
                             
                                <div class="widget">
                                    <div class="widget-heading"><span class="title">Hot Categories</span></div>
                                    <ul class="categories-module">
            <?php
				
				
				$blogQuery ="SELECT DISTINCT `category` FROM `blog` ORDER BY `category` ";
				$blogResult = $conn -> query($blogQuery);
			
				while($blogData=mysqli_fetch_assoc($blogResult))
				{
					$blogCategory =$blogData['category'];
					
					$blogCountQuery ="SELECT Count(`category`) AS Number FROM `blog` where `category`='$blogCategory'";
					$blogCountResult = $conn -> query($blogCountQuery);
					$blogCountData=mysqli_fetch_assoc($blogCountResult);
					$blogCount = $blogCountData['Number'];
			?>		
					<li> <a href="blogCategory.php?category=<?php echo $blogCategory;?>"> <?php echo $blogCategory;?> <span>(<?php echo $blogCount;?>)</span> </a> </li>
			<?php
				}
			?>                            
                                    </ul>
                                </div>
                                <div class="widget">
                                    <div class="widget-heading"><span class="title">Latest Articles</span></div>
                                    <ul class="related-post">
            <?php
			
					$latestBlogQuery = "SELECT * FROM `blog` where `category`='$specialCategory' Order BY blogId DESC Limit 10";		
					$latestBlogResult = $conn -> query($latestBlogQuery);
			
					while($latestData=mysqli_fetch_assoc($latestBlogResult))
					{
						$title = $latestData['title'];
						$date = $latestData['date'];
						$blogId = $latestData['blogId'];
						$category = $latestData['category'];
						
						$commentQuery = "SELECT COUNT(commentId) AS Number FROM `blogcomment` WHERE `blogId` = '$blogId'";
						$commentResult = $conn -> query($commentQuery);
						$commentData=mysqli_fetch_assoc($commentResult);
						$comment = $commentData['Number'];
			?>			
						<li>
							<a href="fullBlog.php?blogId=<?php echo $blogId;?>&category=<?php echo $category;?>"><?php echo $title;?> </a>
							<span><i class="fa fa-map-marker"></i><?php echo $comment;?> Comments</span>
							<span><i class="fa fa-calendar"></i><?php echo $date;?> </span>
						</li>
			<?php	
					}
			?>
                                    </ul>
                                </div>

                            </aside>
                        </div>
			<?php
				$blogQuery = "SELECT * FROM `blog` WHERE `blogId` = '$blogId'";
				$blogResult = $conn -> query($blogQuery);
				$blogData=mysqli_fetch_assoc($blogResult);
				
				$title = $blogData['title'];
				$content = $blogData['content'];
				$mainPoint = $blogData['mainPoint'];
				$photoName = $blogData['photoName'];
				$photoPath = $blogData['photoPath'];
				$imgPath = $photoPath."/".$photoName;
				$date = $blogData['date'];
			?>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="blog-post">
                                <div class="post-img">
                                    <img src="<?php echo $imgPath;?>" alt="" class="img-responsive">
                                </div>
                                <div class="blog-single">
                                    <div class="post-info">
                                        <?php echo $date;?>
                                    </div>
                                    <h3 class="post-title">
										<?php echo $title;?>
									</h3>
                                    <p>
                                        <?php echo $content;?>
                                    </p>
                                    <blockquote>
                                        <?php echo $mainPoint;?>
                                    </blockquote>
                                    
                                  
                                </div>
                            </div>
		<?php
						$commentCOUNTQuery = "SELECT COUNT(commentId) AS Number FROM `blogcomment` WHERE `blogId` = '$blogId'";
						$commentCOUNTResult = $conn -> query($commentCOUNTQuery);
						$commentCOUNTData=mysqli_fetch_assoc($commentCOUNTResult);
						$commentCOUNT = $commentCOUNTData['Number'];

		
		?>
                            <div class="heading"><span class="title">Comments (<?php echo $commentCOUNT;?>)</span>
		<?php
                                    if(!$message == "")
									{
                                        echo "<span <b style=\"color:green\">".$message."</b></span>";
                                    }
		?>					</div>
		
                            <div class="comments-container ">
								<ul>
		<?php           $whichComment=0;
						$commentQuery = "SELECT * FROM `blogcomment` WHERE `blogId` = '$blogId' ORDER BY `commentId`";
						$commentResult = $conn -> query($commentQuery);
						while($commentData=mysqli_fetch_assoc($commentResult))
						{
							$commentContent = $commentData['content'];
							$commentDate = $commentData['date'];
							$userCommentId = $commentData['userId'];
							$commentId = $commentData['commentId'];
							
							$userCommentQuery = "SELECT `username`, `profilePhotoPath`, `profilePhotoName` FROM `user` WHERE `userId`='$userCommentId'";
							$userCommentResult = $conn -> query($userCommentQuery);
							$userCommentData=mysqli_fetch_assoc($userCommentResult);
							
							$username = $userCommentData['username'];
							$profilePhotoPath = $userCommentData['profilePhotoPath'];
							$profilePhotoName = $userCommentData['profilePhotoName'];
							$imgsrcUser = $profilePhotoPath."/".$profilePhotoName;
							
		?>
							<li class="comment-box">
								<div class="col-md-2 col-sm-3 col-xs-3 comment-author-image hidden-xs">
									<img src="<?php echo $imgsrcUser;?>" class="img-circle img-responsive" alt="User Image">
								</div>
								<div class="col-md-10 col-sm-9 col-xs-12">
									<h4><?php echo $username;?></h4>
									<div class="news-date"> <?php echo $commentDate;?></div>
									<p><?php echo $commentContent;?></p>
									<div class="newReply"></div>
									<div class="comment-reply">
										<h6>
											
			
												<div id="collapseThree"  aria-labelledby="headingThree" aria-expanded="false">
													<ul>

				<div class="replyDetails"></div>
													</ul>
													<form action="" method="GET">
											<input type="hidden" name="blogId" value="<?php echo $blogId; ?>" >
											<input type="hidden" name="category" value="<?php echo $category; ?>">
											<input type="hidden" name="commentId" value="<?php echo $commentId; ?>">
                                            <input type="hidden" name="divid" value="<?php echo $whichComment;?>"> 
											<input type="submit" class="btn btn-default" name="viewReply" value="view reply"></form>
												</div>
												
											<a  class="addButton btn btn-default" value="3"  onclick="comment(<?php echo $whichComment?>)"  >Reply </a>
										<?php $whichComment++; ?>	
										<!--	<div class="modal fade apply-job-modal" id="reply">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-body contact-form-container">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
															<div class="job-modal">
																<h2>Leave a reply</h2>
															</div>
															<form method="post" id="job-form">
																<div class="row clearfix">
															
																	<div class="column col-md-12 col-sm-12 col-xs-12">
																		<div class="form-group">
																			<input type="hidden" name="commentId" value="<?php echo $commentId;?>">
																			<input type="hidden" name="category" value="<?php echo $specialCategory;?>">
																			<input type="hidden" name="blogId" value="<?php echo $blogId;?>">
																			<textarea name="reply" rows="6" class="form-control" placeholder="Reply" required></textarea>
																		</div>
																	</div>
																	<div class="col-md-6 col-xs-6">
																		<div class="text-center">
																			<button type="submit" name="submitReply" class="btn btn-default btn-block">Submit</button>
																		</div>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div> -->
											
										</h6>
									</div>
								</div>
							</li>
		
		<?php
						}

		?>				
                             
			<?php	if(isset($_GET['viewReply']))	 						
						{	
                 ?>



                 <?php


						$commentId = $_GET['commentId'];
							$replyQuery = "SELECT * FROM `blogreply` WHERE `commentId` = '$commentId' ORDER BY `replyId`";
							$replyResult = $conn -> query($replyQuery);
                               
							while($replyData=mysqli_fetch_assoc($replyResult))
							{ 
								$replyContent = $replyData['content'];
								$replyDate = $replyData['date'];
								$userReplyId = $replyData['userId'];
							 
							//SELECT `username`, `profilePhotoPath`, `profilePhotoName` FROM `user` WHERE `userId`='$userReplyId'
								$userReplyQuery = "SELECT * FROM `user` WHERE `userId` = '$userReplyId'";
								$userReplyResult = $conn -> query($userReplyQuery);
								$userReplyData=mysqli_fetch_assoc($userReplyResult);
									
								$username = $userReplyData['username'];
								$profilePhotoPath = $userReplyData['profilePhotoPath'];
								$profilePhotoName = $userReplyData['profilePhotoName'];
								$imgsrcUser = $profilePhotoPath."/".$profilePhotoName;
			?>				


                     <script type="text/javascript">
                 	var replyDetails=document.getElementsByClassName("replyDetails");
                     	var x=<?php echo $_GET['divid'] ;?>;
                     	replyDetails[x].innerHTML+='<li ><div class="col-md-2 col-sm-3 col-xs-3 comment-author-image hidden-xs"><img src="<?php echo $imgsrcUser;?>" class="img-circle img-responsive" alt="User Image"></div><div class="col-md-10 col-sm-9 col-xs-12"><h4><?php echo $username;?></h4><div class="news-date"> <?php echo $replyDate;?></div><p><?php echo $replyContent;?></p></div></li>';
                     	x++;
								</script>	
			
			<?php
							}
						}
			?>							


			<div id="newComment"></div>
									</ul>
								
								<a class="btn btn-default"  onclick="leaveComment()">Leave a comment</a>
								
                     <!--           <div class="modal fade apply-job-modal" id="comment">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-body contact-form-container">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
												<div class="job-modal">
													<h2>Leave a comment</h2>
												</div>
												<form method="GET" action="fullBlog.php" id="job-form">
													<div class="row clearfix">
												
														<div class="column col-md-12 col-sm-12 col-xs-12">
															<div class="form-group">	
																<input type="hidden" name="category" value="<?php echo $specialCategory;?>">
																<input type="hidden" name="blogId" value="<?php echo $blogId;?>">
																<textarea name="comment" rows="6" class="form-control" placeholder="Comment" required></textarea>
															</div>
														</div>
														<div class="col-md-6 col-xs-6">
															<div class="text-center">
																<button type="submit" name="submitComment" class="btn btn-default btn-block">Submit</button>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div> -->
								
								
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        <!--- required for SUB-FOOTER PAGE and FOOTER   -->
        <?php require "common/footer.php" ; ?>
		
        <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>

        <!-- JAVASCRIPT JS  -->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    
    <!-- JAVASCRIPT JS  --> 
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

        <!-- BOOTSTRAP CORE JS -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

        <!-- JQUERY SELECT -->
        <script type="text/javascript" src="js/select2.min.js"></script>

        <!-- MEGA MENU -->
        <script type="text/javascript" src="js/mega_menu.min.js"></script>

         

        <!-- JQUERY COUNTERUP -->
        <script type="text/javascript" src="js/counterup.js"></script>

        <!-- JQUERY WAYPOINT -->
        <script type="text/javascript" src="js/waypoints.min.js"></script>

        <!-- JQUERY REVEAL -->
        <script type="text/javascript" src="js/footer-reveal.min.js"></script>

        <!-- Owl Carousel -->
        <script type="text/javascript" src="js/owl-carousel.js"></script>

        <!-- CORE JS -->
        <script type="text/javascript" src="js/custom.js"></script>


    </div>
    <script type="text/javascript">


    
  var i;
  var newReply =document.getElementsByClassName("newReply");
  var newComment=document.getElementById("newComment");
  
    function comment(i) {
    

	

newReply[i].innerHTML='<form method="GET" id="job-form" action="#"><div class="row clearfix"><div class="column col-md-12 col-sm-12 col-xs-12"><div class="form-group"><input type="hidden" name="commentId" value="<?php echo $commentId;?>" ><input type="hidden" name="category" value="<?php echo $specialCategory;?>"><input type="hidden" name="blogId" value="<?php echo $blogId;?>"><textarea name="content" rows="6" class="form-control" placeholder="Reply" required></textarea>	</div>	</div><div class="col-md-6 col-xs-6"><div class="text-center"><input type="submit" name="submitReply" class="btn btn-default btn-block" value="submit reply"></div></div></div></form>';
     }

function leaveComment(){



newComment.innerHTML='<form method="GET" action="fullBlog.php" id="job-form"><div class="row clearfix"><div class="column col-md-12 col-sm-12 col-xs-12"><div class="form-group">	<input type="hidden" name="category" value="<?php echo $specialCategory;?>">										<input type="hidden" name="blogId" value="<?php echo $blogId;?>"><textarea name="comment" rows="6" class="form-control" placeholder="Comment" required></textarea>			</div></div><div class="col-md-6 col-xs-6">	<div class="text-center"><button type="submit" name="submitComment" class="btn btn-default">Submit</button></div></div></div>		</form>';

}






    </script>
   
</body>

</html>
<?php
}
?>