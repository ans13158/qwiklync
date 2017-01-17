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

<script type="text/javascript">
    var start = 0;
</script>
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
			
					$latestBlogQuery = "SELECT * FROM `blog` where `category` NOT LIKE '$specialCategory' Order BY blogId DESC Limit 10";		
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
                        <!--FETCH BLOGS FOR CATEGORY -->

                        <?php

                        $SelectBlogQuery = "SELECT * FROM `blog` where `category`  LIKE '$specialCategory' Order BY blogId DESC Limit 10";       
                    $SelectBlogResult = $conn -> query($SelectBlogQuery);
                    $blogDispCount = mysqli_num_rows($SelectBlogResult);
                                if(!$SelectBlogResult) {
                                    $error = "Error retriving blogs." .$conn->error;
                                    echo $error;
                                }
                                if($blogDispCount==0){
                                    echo "Sorry! No blogs to display at the moment.Please come back again later.";
                                }
                                $id="";
                                ?>

                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <?php
                            while($blogDispCount)  {
                                    $blogShow = mysqli_fetch_assoc($SelectBlogResult);
                                    $id = $blogShow['blogId'];
                                    $title = $blogShow['title'];
                                    $content = $blogShow['content'];
                                    $photoName = $blogShow['photoName'];
                                    $photoPath = $blogShow['photoPath'];
                                    $photoVariable= $photoPath . "/" .$photoName ;
                                    $date = $blogShow['date'];
                                    $category = $blogShow['category'];

                                    /*Count comments for this blog*/
                                    $countQuery = "SELECT COUNT(`commentId`) FROM `blogcomment` WHERE `blogId`='$id' ";
                                    $countComment = $conn->query($countQuery);
                                    $count = mysqli_fetch_array($countComment);

                                    
                        ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="blog-post">
                                        <div class="post-img">
                                            <a href="fullBlog.php?blogId=<?php echo $id;?>&category=<?php echo $category;?>">

                                                <img src="<?php echo $photoVariable ;?>" alt="<?php echo $title;?>" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="post-info">
                                            <a href="fullBlog.php?blogId=<?php echo $id;?>&category=<?php echo $category;?>"><?php echo $date;?></a>
                                            <a href="fullBlog.php?blogId=<?php echo $id;?>&category=<?php echo $category;?>"><?php echo $count[0];?> comments</a>
                                        </div>
                                        <h3 class="post-title">
                                <a href="fullBlog.php?blogId=<?php echo $id;?>&category=<?php echo $category;?>">
                                    <?php echo $title;?>
                                </a>
                            </h3>
                                        <a href="fullBlog.php?blogId=<?php echo $id;?>&category=<?php echo $category;?>">
                                        <p class="post-excerpt">
                                        <?php  
                                        $i = 0; 
                                        $shortCont = ""; 
                                    for($i=0;$i<10;$i++)  
                                              $shortCont = $shortCont . $content[$i];
                                          echo $shortCont;
                                         ?>     .....Read More

                                        </p>
                                        </a>
                                    </div>
                                </div>
                                <?php
                                    $blogDispCount-- ;
                                }
                                ?>
                               
                               <div class="panel panel-default " id="extra">
    
                                </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                                <div class="pagination-box clearfix">
                                    <div class="load-more-btn">
                                        <button class="btn-default"  onclick="showMoreBlogCat();">Load More<i class="fa fa-refresh"></i> </button>
                                    </div>
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

        <script>
            
    function showMoreBlogCat() {
        //var start = 0;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                 //var para=document.createElement("p");
                   //   para.setAttribute("id","ext");
                 //var node=document.createTextNode(xmlhttp.responseText);
                 //para.appendChild(node) ;

                //document.getElementById("extra").appendChild(para)  ;
              document.getElementById("extra").innerHTML+=xmlhttp.responseText;
               

            }
        };
        xmlhttp.open("GET","getMoreBlogCat.php?id="+<?php echo $id;?> + "&category=<?php echo $specialCategory;?>"+"&start="+start,true);
        xmlhttp.send();
       start = start + 4;
}
</script>
    </div>
</body>

</html>
<?php
}
?>