<?php        $category="";    if(empty( $_GET['subCat'] ) )  {        header('location:all-categories.php');    }    else  {        require_once "connection.php" ;        $subCat = $_GET['subCat'];        $dispQuery = "SELECT companyId,category,title,location,nature FROM job WHERE subCategory LIKE '$subCat' " ;         $dispResult = $conn->query($dispQuery);        if(!$dispResult)            echo "no" ;        $row = mysqli_num_rows($dispResult) ;        //echo $companyId;    ?>    <?php     require "common/header.php";?>        <title>Opportunities A Mega Job Board Template</title>        </head>        <!-- FOR NAVBAR & BLACK STRIP ON TOP  -->        <?php require "common/navbar.php" ;  ?>            <section class="breadcrumb-search parallex">                <div class="container-fluid">                    <div class="row">                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                            <div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 nopadding">                                <div class="search-form-contaner">                                    <form class="form-inline">                                        <div class="col-md-7 col-sm-7 col-xs-12 nopadding">                                            <div class="form-group">                                                <input type="text" class="form-control" name="keyword" placeholder="Search Keyword" value="">                                                <i class="icon-magnifying-glass"></i>                                            </div>                                        </div>                                        <div class="col-md-3 col-sm-3 col-xs-12 nopadding">                                            <div class="form-group">                                                <select class="select-category form-control">                                                    <option label="Select Option"></option>                                                    <option value="0">Customer Service</option>                                                    <option value="1">Designer</option>                                                    <option value="2">Developer</option>                                                    <option value="3">Finance</option>                                                    <option value="4">Human Resource</option>                                                    <option value="5">Information Technology</option>                                                    <option value="6">Marketing</option>                                                    <option value="7">Others</option>                                                    <option value="8">Sales</option>                                                </select>                                            </div>                                        </div>                                        <div class="col-md-2 col-sm-2 col-xs-12 nopadding">                                            <div class="form-group form-action">                                                <button type="button" class="btn btn-default btn-search-submit">Search <i class="fa fa-angle-right"></i> </button>                                            </div>                                        </div>                                    </form>                                </div>                            </div>                        </div>                    </div>                </div>            </section>            <section class="categories-list-page light-grey">                <div class="container">                    <div class="row">                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                            <div class="col-md-8 col-sm-12 col-xs-12">                                <h4 class="search-result-text">Showing <?php echo $row; ?> of 60 available job(s)</h4>                            </div>                            <div class="col-md-8 col-sm-12 col-xs-12">                                <div class="all-jobs-list-box">                                    <?php                                        while($row)  {                                             $res = mysqli_fetch_assoc($dispResult) ;                                              $category = $res['category'] ;                                             $companyId = $res['companyId'] ;                                             $title = $res['title'] ;                                             $location = $res['location'] ;                                             $nature = $res['nature'];                                             $companyQuery = "SELECT name,logoPath,logoName FROM company WHERE companyID = '$companyId' ";                                             $companyResult = $conn->query($companyQuery) ;                                             if(!$companyResult)                                                  echo "no again" ;                                             $companyRes = mysqli_fetch_assoc($companyResult) ;                                             $name = $companyRes['name'];                                             $logoPath = $companyRes['logoPath'] ;                                             $logoName = $companyRes['logoName'] ;                                     ?>                                        <div class="job-box">                                            <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs hidden-sm">                                                <div class="comp-logo">                                                    <a href=""> <img src="<?php echo $logoPath.'/'.$logoName; ?>" class="img-responsive" alt="scriptsbundle"></a>                                                </div>                                            </div>                                            <div class="col-md-6 col-sm-6 col-xs-12 nopadding">                                                <div class="job-title-box">                                                    <a href="#">                                                        <div class="job-title">                                                            <?php echo $title;?>                                                        </div>                                                    </a>                                                    <a href="#"><span class="comp-name"><?php echo $name . " ". $location ;?> </span></a>                                                </div>                                            </div>                                            <div class="col-md-2 col-sm-3 col-xs-6">                                                <a href="#">                                                    <div class="job-type jt-remote-color">                                                        <i class="fa fa-clock-o"></i>                                                        <?php echo $nature; ?>                                                    </div>                                                </a>                                            </div>                                            <div class="col-md-2 col-sm-2 col-xs-12 nopadding">                                                <button class="btn btn-primary btn-custom">Apply Now</button>                                            </div>                                        </div>                                        <?php                                    $row--;                                  }                                  ?>                                </div>                                <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                                    <div class="pagination-box clearfix">                                        <ul class="pagination">                                            <li>                                                <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a>                                            </li>                                            <li class="active"><a href="#">1</a></li>                                            <li><a href="#">2</a></li>                                            <li><a href="#">3</a></li>                                            <li><a href="#">4</a></li>                                            <li><a href="#">5</a></li>                                            <li>                                                <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a>                                            </li>                                        </ul>                                    </div>                                </div>                            </div>                            <div class="col-md-4 col-sm-12 col-xs-12">                                <aside>                                    <div class="widget">                                        <div class="widget-heading"><span class="title"><?php echo $category;  ?></span></div>                                        <ul class="categories-module">                                        <!--Displaying subCategories of parent category  -->                                                                                              <?php                                            $subCatQuery= "SELECT DISTINCT subCategory FROM job WHERE category='$category' ";                                            $result=$conn->query($subCatQuery);                                            $subCatRow = mysqli_num_rows($result);                                            while($subCatRow)  {                                                $subCatDisp = mysqli_fetch_assoc($result);                                                $sub=$subCatDisp['subCategory'];                                                                                    //Counting number of jobs with this subCategory                                                                                                        $queryCountSubCat = "SELECT COUNT(subCategory) from job WHERE subCategory='$sub'" ;                                                    $resultCountSub = $conn->query($queryCountSubCat);                                                    $countSub=mysqli_fetch_array($resultCountSub);                                                    $count=$countSub[0];                                         ?>                                                <li>                                                    <a href="">                                                        <?php echo $sub; ?> <span>(<?php echo $count ; ?>)</span> </a>                                                </li>                                                <?php $subCatRow--; }?>                                        </ul>                                    </div>                                    <div class="widget">                                        <div class="widget-heading"><span class="title">Hot Jobs</span></div>                                        <!-- Display Hot Jobs of parent category's other subcategories; not same subCategory-->                                                                                <?php                                        $hotJobQuery= "SELECT companyId,category,title,location,postedOn,lastDate FROM job WHERE category LIKE '$category' AND subCategory NOT LIKE '$subCat'" ;                                                                               $hotJobRes = $conn->query($hotJobQuery) ;                                        $hotJobRow = mysqli_num_rows($hotJobRes);                                                                                while($hotJobRow)  {                                            $hotJobResult=mysqli_fetch_assoc($hotJobRes);                                            $companyId = $hotJobResult['companyId'];                                            $title=$hotJobResult['title'];                                            $location=$hotJobResult['location'];                                            $postedOn=$hotJobResult['postedOn'];                                            $lastDate=$hotJobResult['lastDate'] ;                                        ?>                                        <ul class="related-post">                                                                                               <li>                                                <a href="#">                                                <?php                                                     echo $title;                                                 ?>                                                                                                    </a>                                                <span><i class="fa fa-map-marker"></i><?php                                                     echo $location;                                                   ?></span>                                                <span><i class="fa fa-calendar"></i><?php                                                echo $postedOn . " - ".$lastDate ;                                                ?> </span>                                            </li>                                        <?php  $hotJobRow-- ; } ?>                                        </ul>                                    </div>                                </aside>                            </div>                        </div>                    </div>                </div>            </section>            <!--- required for SUB-FOOTER PAGE and FOOTER   -->            <?php require "common/footer.php" ; ?>                <!--- Footer ends   -->                <!-- JAVASCRIPT JS  -->                <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>                <!-- JAVASCRIPT JS  -->                <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>                <!-- BOOTSTRAP CORE JS -->                <script type="text/javascript" src="js/bootstrap.min.js"></script>                <!-- JQUERY SELECT -->                <script type="text/javascript" src="js/select2.min.js"></script>                <!-- MEGA MENU -->                <script type="text/javascript" src="js/mega_menu.min.js"></script>                <!-- JQUERY COUNTERUP -->                <script type="text/javascript" src="js/counterup.js"></script>                <!-- JQUERY WAYPOINT -->                <script type="text/javascript" src="js/waypoints.min.js"></script>                <!-- JQUERY REVEAL -->                <script type="text/javascript" src="js/footer-reveal.min.js"></script>                <!-- Owl Carousel -->                <script type="text/javascript" src="js/owl-carousel.js"></script>                <!-- CORE JS -->                <script type="text/javascript" src="js/custom.js"></script>                </div>                </body>                </html><?php    }?>  