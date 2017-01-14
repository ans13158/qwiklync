<?php 
	ob_start();
	$current_file= $_SERVER['SCRIPT_NAME'];
	//Starting Session
	session_start();
	
	//connecting to database
	include 'connection.php';
	
   
	
	if(!isset($_GET['category']))
	{
		header('Location:blog.php');
	}
	else
	{
	
		require "common/header.php";
?>
    <title>Opportunities A Mega Job Board Template</title>

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
                                <li><a href="#">Home</a> </li>
                                <li><a href="#">Blog </a> </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="categories-list-page light-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <aside>
                                <div class="widget">
                                    <div class="widget-heading"><span class="title">Hot Categories</span></div>
                                    <ul class="categories-module">
             <?php
				$specialCategory = $_GET['category'];
				
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
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div id="posts-masonry" class="posts-masonry">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="blog-post">
                                        <div class="post-img">
                                            <a href="#">
                                                <img src="images/blog/1.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <a href="">Aug 30, 2016</a>
                                            <a href="#">23 comments</a>
                                        </div>
                                        <h3 class="post-title">
                                <a href="#">
                                    Sketch Designing Artists are beauty: A report
                                </a>
                            </h3>
                                        <p class="post-excerpt">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="blog-post">
                                        <div class="post-img">
                                            <a href="#">
                                                <img src="images/blog/2.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <a href="#">august 30, 2016</a>
                                            <a href="#">90 comments</a>
                                        </div>
                                        <h3 class="post-title">
                                <a href="#">
                                    A suitable timings for a graphic designers
                                </a>
                            </h3>
                                        <p class="post-excerpt">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="blog-post">
                                        <div class="post-img">
                                            <a href="#">
                                                <img src="images/blog/3.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <a href="#">august 02, 2016</a>
                                            <a href="#">10 comments</a>
                                        </div>
                                        <h3 class="post-title">
                                <a href="#">
                                    How to get a job on same time same place
                                </a>
                            </h3>
                                        <p class="post-excerpt">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="blog-post">
                                        <div class="post-img">
                                            <a href="#">
                                                <img src="images/blog/4.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <a href="#">July 30, 2016</a>
                                            <a href="#">1 comments</a>
                                        </div>
                                        <h3 class="post-title">
                                <a href="#">
                                    Are you looking for pefect job for free lancing work
                                </a>
                            </h3>
                                        <p class="post-excerpt">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="blog-post">
                                        <div class="post-img">
                                            <a href="#">
                                                <img src="images/blog/5.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <a href="#">July 30, 2016</a>
                                            <a href="#">1 comments</a>
                                        </div>
                                        <h3 class="post-title">
                                <a href="#">
                                   Lorem ipsum dolor sit amet adierm miedin fro geting 
                                </a>
                            </h3>
                                        <p class="post-excerpt">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="blog-post">
                                        <div class="post-img">
                                            <a href="#">
                                                <img src="images/blog/6.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <a href="#">June 30, 2016</a>
                                            <a href="#">20 comments</a>
                                        </div>
                                        <h3 class="post-title">
                                <a href="#">
                                    Lorem ipsum dolor sit amet adierm miedin fro geting
                                </a>
                            </h3>
                                        <p class="post-excerpt">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="blog-post">
                                        <div class="post-img">
                                            <a href="#">
                                                <img src="images/blog/7.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <a href="#">April 20, 2016</a>
                                            <a href="#">08 comments</a>
                                        </div>
                                        <h3 class="post-title">
                                <a href="#">
                                     Lorem ipsum dolor sit amet adierm miedin fro geting
                                </a>
                            </h3>
                                        <p class="post-excerpt">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="blog-post">
                                        <div class="post-img">
                                            <a href="#">
                                                <img src="images/blog/8.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <a href="#">July 06, 2016</a>
                                            <a href="#">90 comments</a>
                                        </div>
                                        <h3 class="post-title">
                                <a href="#">
                                     Lorem ipsum dolor sit amet adierm miedin fro geting
                                </a>
                            </h3>
                                        <p class="post-excerpt">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="blog-post">
                                        <div class="post-img">
                                            <a href="#">
                                                <img src="images/blog/9.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <a href="#">March 15, 2016</a>
                                            <a href="#">08 comments</a>
                                        </div>
                                        <h3 class="post-title">
                                <a href="#">
                                     Lorem ipsum dolor sit amet adierm miedin fro geting
                                </a>
                            </h3>
                                        <p class="post-excerpt">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="blog-post">
                                        <div class="post-img">
                                            <a href="#">
                                                <img src="images/blog/10.jpg" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <a href="#">July 06, 2016</a>
                                            <a href="#">05 comments</a>
                                        </div>
                                        <h3 class="post-title">
                                <a href="#">
                                     Lorem ipsum dolor sit amet adierm miedin fro geting
                                </a>
                            </h3>
                                        <p class="post-excerpt">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam neque tempora odit atque repellat est molestiae perferendis.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div class="pagination-box clearfix">
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a>
                                        </li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li>
                                            <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

         <!--- required for SUB-FOOTER PAGE and FOOTER   -->
        <?php require "common/footer.php" ; ?>

                    <!--- Footer ends   -->
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

        <!-- FOR THIS PAGE ONLY -->

        <script src="js/imagesloaded.js"></script>
        <script src="js/isotope.min.js"></script>

        <!-- CORE JS -->
        <script type="text/javascript" src="js/custom.js"></script>

        <script type="text/javascript">
            (function($) {
                "use strict";
                $('#posts-masonry').imagesLoaded(function() {
                    $('#posts-masonry').isotope({
                        layoutMode: 'masonry',
                        transitionDuration: '0.3s'
                    });
                });
            })(jQuery);
        </script>

    </div>
</body>

</html>
<?php
}
?>