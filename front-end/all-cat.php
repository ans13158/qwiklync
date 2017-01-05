<?php

    require_once "connection.php" ;

    $category = "";         //Names of DISTINCT categories
    $num_rowsCategory = "" ;   //Number of rows with DISTINCT  
                                //categories

    $subCategory == "";     //Names of DISTINCT subcategories 
                                //under above category

    $categoryCountQuery = "SELECT DISTINCT category FROM job LIMIT 9  " ;
    
    $countCategoryResult = $conn->query($categoryCountQuery);
    
    if(!$countCategoryResult)  {
        die($conn->error) ;
    }
    
    
    
    $num_rowsCategory = mysqli_num_rows($countCategoryResult) ;
    /*while($num_rowsCategory) {
    $res = mysqli_fetch_array($countCategoryResult) ;

    $category = $res[0] ;
    

    echo $category . " "  ;
    $num_rowsCategory--;
    }*/


?>


<?php 
    require "common/header.php";
?>
    <title>Opportunities A Mega Job Board Template</title>

    </head>
    <!-- FOR NAVBAR & BLACK STRIP ON TOP  -->

    <?php require "common/navbar.php" ;  ?>

        <section class="breadcrumb-search parallex">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="col-md-8 col-sm-12 col-md-offset-2 col-xs-12 nopadding">
                            <div class="search-form-container">
                                <form class="form-inline">
                                    <div class="col-md-7 col-sm-7 col-xs-12 nopadding">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Search Keyword" value="">
                                            <i class="icon-magnifying-glass"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12 nopadding">
                                        <div class="form-group">
                                            <select class="select-category form-control">
                                                <option label="Select Option"></option>
                                                <option value="0">Customer Service</option>
                                                <option value="1">Designer</option>
                                                <option value="2">Developer</option>
                                                <option value="3">Finance</option>
                                                <option value="4">Human Resource</option>
                                                <option value="5">Information Technology</option>
                                                <option value="6">Marketing</option>
                                                <option value="7">Others</option>
                                                <option value="8">Sales</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                                        <div class="form-group form-action">
                                            <button type="button" class="btn btn-default btn-search-submit">Search <i class="fa fa-angle-right"></i> </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="categories">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="Heading-title black">
                                <h1>Job categories</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                            <div id="cats-masonry">
                                
                                    <!-- WHILE for number of rows with distinct categories -->

                                <?php  
                                    while($num_rowsCategory)  {
                                        $res = mysqli_fetch_array($countCategoryResult);
                                        $category = $res[0] ;
                                ?>  
                                <div class="col-md-4 col-sm-6 col-xs-12">

                                  
                                    <div class="category-box">
                                        <div class="category-heading"> 
                                            <a href="#"> 
                                                <?php
                                                    echo $category ;

                                                  ?>
                                                
                                            </a>
                                        </div>
                                        
                   <!--  Select distinct subCategories with above 
                            category  -->                     

                                        <?php
                                            $querySubCategory = "SELECT DISTINCT subCategory FROM job WHERE category='$category' ";
                                            
                                            $subCategoryResult=
                                                $conn->query($querySubCategory);

                                            $num_rowsSubCategory =
                                                mysqli_num_rows(    $subCategoryResult);    

                                        ?>
                                            <ul class="">

               <!-- While for distinct subCategories-->
                                            <?php

                                                while($num_rowsSubCategory)  {

                                                    $resSubCat = mysqli_fetch_array($subCategoryResult);

                                                    $subCategory = $resSubCat[0];

                                                    $queryCountSubCat = "SELECT COUNT(subCategory) from job WHERE subCategory='$subCategory'" ;
                                                    $resultCountSub = $conn->query($queryCountSubCat);

                                                    $countSub=mysqli_fetch_array($resultCountSub);
                                                    $count=$countSub[0];
                                            ?>                                 
                                                <li><a href="#"> <?php echo $subCategory; ?>
                                                 <span>( <?php 
                                                    echo $count;
                                                   ?> )</span> </a></li>

                                                <?php 
                                                    $num_rowsSubCategory--;  
                                                  } 
                                                ?>

                                               <!-- <li><a href="#"> Networking <span>( 450 )</span> </a></li>
                                                <li><a href="#"> Programming <span>( 3622 )</span> </a></li>
                                                <li><a href="#"> ASP.NET <span>( 880 )</span> </a></li>
                                                <li><a href="#"> Java <span>( 6632 )</span> </a></li>
                                                <li><a href="#"> Data Mining <span>( 3224 )</span> </a></li>
                                                <li><a href="#"> Data Base <span>( 1110 )</span> </a></li>
                                                <li><a href="#"> Java <span>( 6632 )</span> </a></li>
                                                <li><a href="#"> Data Mining <span>( 3224 )</span> </a></li>
                                                <li><a href="#"> Data Base <span>( 1110 )</span> </a></li> -->
                                            </ul>
                                    </div>                        
                                </div>

                                <?php 
                                        $num_rowsCategory--;
                              } ?>
                               <!-- <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="category-box">
                                        <div class="category-heading"> <a href="#"> Engineering Science </a> </div>
                                        <ul class="">
                                            <li><a href="#"> Electrical Engineer‎ <span>( 332 )</span> </a></li>
                                            <li><a href="#"> Custom Clearance Executive‎ <span>( 420 )</span> </a></li>
                                            <li><a href="#"> Engineer/ Senior Engineer‎ <span>( 92 )</span> </a></li>
                                            <li><a href="#"> QA (Quality Assurance) Officer‎ <span>( 660 )</span> </a></li>
                                            <li><a href="#"> Civil Engineer‎ <span> ( 652 )</span> </a></li>
                                            <li><a href="#"> Senior HR Executive‎ <span>( 754 )</span> </a></li>
                                            <li><a href="#"> Sales Engineer‎ <span>( 840 )</span> </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="category-box">
                                        <div class="category-heading"> <a href="#"> Marketing & Telemarketing </a> </div>
                                        <ul class="">
                                            <li><a href="#"> Marketing Manager‎ <span>( 153 )</span> </a></li>
                                            <li><a href="#"> Retail Brand Manager‎ <span>( 350 )</span> </a></li>
                                            <li><a href="#"> Social Media Executive‎ <span>( 922 )</span> </a></li>
                                            <li><a href="#"> Cargo Marketing Officer‎ <span>( 330 )</span> </a></li>
                                            <li><a href="#"> Cargo Marketing Officer‎ <span>( 330 )</span> </a></li>
                                            <li><a href="#"> Retail Brand Manager‎ <span>( 332 )</span> </a></li>
                                            <li><a href="#"> Assistant Manager - Sales  <span>( 924 )</span> </a></li>
                                            <li><a href="#"> Outlet / Marketing Manager‎ <span>( 610 ) </span> </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="category-box">
                                        <div class="category-heading"> <a href="#"> Education & Training </a> </div>
                                        <ul class="">
                                            <li><a href="#"> Web Engineering Instructor‎ <span>( 693 )</span> </a></li>
                                            <li><a href="#"> Lab Assistant‎ <span>( 630 )</span> </a></li>
                                            <li><a href="#"> Computer Science Teacher‎ <span>( 922 )</span> </a></li>
                                            <li><a href="#"> Instructor Automobile Engine‎ <span>( 360 ) </span> </a></li>
                                            <li><a href="#"> Customer Service Rep.‎‎ <span>( 998 )</span> </a></li>
                                            <li><a href="#"> Secondary School Teachers‎  <span>( 204 )</span> </a></li>
                                            <li><a href="#"> Business Development Officer‎ <span>( 299 )</span> </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="category-box">
                                        <div class="category-heading"> <a href="#"> Call Center & BPO </a> </div>
                                        <ul class="">
                                            <li><a href="#"> Intr. Sales Representative‎‎ <span>( 654 )</span> </a></li>
                                            <li><a href="#"> Customer Services Rep. <span>( 321 )</span> </a></li>
                                            <li><a href="#"> Customer Rep. Officer‎‎ <span>( 987 )</span> </a></li>
                                            <li><a href="#"> HR Assistant‎ <span>( 456 )</span> </a></li>
                                            <li><a href="#"> Web Developer Intern‎ <span>( 582 )</span> </a></li>
                                            <li><a href="#"> Injury Claim Officer‎  <span>( 951 )</span> </a></li>
                                            <li><a href="#"> Inbound Customer Executive‎ <span>( 333 )</span> </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="category-box">
                                        <div class="category-heading"> <a href="#"> Banking & Financial </a> </div>
                                        <ul class="">
                                            <li><a href="#"> Business Dev. Executive‎‎ <span>( 652 )</span> </a></li>
                                            <li><a href="#"> Business Dev. Officer‎ <span> ( 326 )</span> </a></li>
                                            <li><a href="#"> ACA Trainee‎ <span>( 548 )</span> </a></li>
                                            <li><a href="#"> Relationship Executive‎ <span>( 356 )</span> </a></li>
                                            <li><a href="#"> Assistant Corporate Secretary‎ <span>( 124 )</span> </a></li>
                                            <li><a href="#"> Editor / Transcriptionist‎  <span>( 954 )</span> </a></li>
                                            <li><a href="#"> Assistant Manager Audit‎ <span>( 785 )</span> </a></li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="category-box">
                                        <div class="category-heading"> <a href="#"> Computer and IT </a></div>
                                        <ul class="">
                                            <li><a href="#"> Andriod <span>( 2253 )</span> </a></li>
                                            <li><a href="#"> Networking <span>( 450 )</span> </a></li>
                                            <li><a href="#"> Programming <span>( 3622 )</span> </a></li>
                                            <li><a href="#"> ASP.NET <span>( 880 )</span> </a></li>
                                            <li><a href="#"> Java <span>( 6632 )</span> </a></li>
                                            <li><a href="#"> Data Mining <span>( 3224 )</span> </a></li>
                                            <li><a href="#"> Data Base <span>( 1110 )</span> </a></li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="category-box">
                                        <div class="category-heading"> <a href="#"> Engineering Science </a> </div>
                                        <ul class="">
                                            <li><a href="#"> Electrical Engineer‎ <span>( 332 )</span> </a></li>
                                            <li><a href="#"> Custom Clearance Executive‎ <span>( 420 )</span> </a></li>
                                            <li><a href="#"> Engineer/ Senior Engineer‎ <span>( 92 )</span> </a></li>
                                            <li><a href="#"> QA (Quality Assurance) Officer‎ <span>( 660 )</span> </a></li>
                                            <li><a href="#"> Civil Engineer‎ <span> ( 652 )</span> </a></li>
                                            <li><a href="#"> Senior HR Executive‎ <span>( 754 )</span> </a></li>
                                            <li><a href="#"> Sales Engineer‎ <span>( 840 )</span> </a></li>
                                        </ul>

                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="category-box">
                                        <div class="category-heading"> <a href="#"> Marketing & Telemarketing </a> </div>
                                        <ul class="">
                                            <li><a href="#"> Marketing Manager‎ <span>( 153 )</span> </a></li>
                                            <li><a href="#"> Retail Brand Manager‎ <span>( 350 )</span> </a></li>
                                            <li><a href="#"> Social Media Executive‎ <span>( 922 )</span> </a></li>
                                            <li><a href="#"> Cargo Marketing Officer‎ <span>( 330 )</span> </a></li>
                                            <li><a href="#"> Retail Brand Manager‎ <span>( 332 )</span> </a></li>
                                            <li><a href="#"> Assistant Manager - Sales  <span>( 924 )</span> </a></li>
                                            <li><a href="#"> Outlet / Marketing Manager‎ <span>( 610 ) </span> </a></li>
                                        </ul>

                                    </div>
                                </div>  -->
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="load-more-btn">
                                        <button class="btn-default"> Load More <i class="fa fa-refresh"></i> </button>
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
            <script type="text/javascript">
                (function($) {
                    "use strict";
                    $('#cats-masonry').imagesLoaded(function() {
                        $('#cats-masonry').isotope({
                            layoutMode: 'masonry',
                            transitionDuration: '0.3s'
                        });
                    });
                })(jQuery);
            </script>

            <!-- CORE JS -->
            <script type="text/javascript" src="js/custom.js"></script>

            </div>
            </body>

            </html>