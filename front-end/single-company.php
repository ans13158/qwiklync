<?php 

    require_once "connection.php";
    $companyId = "";
    if(isset($_GET['companyId']) )  {
        $companyId= $_GET['companyId'] ;
    }

    else  {
        header('Location:all-company.php');
    }

    $companyName = "";
    $companyType = "";
    $companyKind = "";
    $companySite = "";
    $companyAddress = "";
    $companyMail = "";
    $companyLogoPath = "";
    $companyLogoName = "";
    $companyLogoVariable = "";
    $companyAbout = "";

    $selectQuery = "SELECT * FROM `company` WHERE `companyId`='$companyId'";
    $selectRes = $conn->query($selectQuery);
    $selectDisplay=mysqli_fetch_assoc($selectRes);

    $companyName = $selectDisplay['name'];
    $companyType = $selectDisplay['industryType'];
    $companyKind = $selectDisplay['type'];
    $companySize = $selectDisplay['companySize'];
    
    $companyFounded = $selectDisplay['founded']; 
    $companySite = $selectDisplay['website'];
    $companyAddress = $selectDisplay['address'];
    $companyMail = $selectDisplay['email'];
    $companyPhone = $selectDisplay['phone'];
    $companyLogoPath = $selectDisplay['logoPath'];
    $companyLogoName = $selectDisplay['logoName'];
    $companyAbout = $selectDisplay['about'];
    $companySpeciality = $selectDisplay['specialities'];
    $companyLogoVariable = $companyLogoPath . "/" . $companyLogoName;

 ?>

<?php 
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
                        <h3>About Company</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a> </li>
                                <li class="active"><a href="single-company.php?companyId=<?php echo $companyId; ?> ">Single-company</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="resume2 resume7">
            <div class="container">
                 <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding" >
                        <div class="col-md-4 col-sm-4 col-xs-12" >
                        </div>

                        <div class="col-md-4 col-sm-4 col-xs-12" >
                        
                            <div class="profile-photo"><img src="<?php echo $companyLogoVariable;?>" alt="" class="img-responsive" style="height: auto;width: auto"></div>
                        </div>    
                            
                        </div>
                        
                    

                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                        <div class="col-md-9 col-sm-7 col-xs-12">
                            <div class="profile-info">
                            <br><br>
                                <h1 class="profile-title"><?php echo $companyName;?></h1>
                                <h2 class="profile-position"><?php echo $companyType;?> Industry</h2></div>
                            <ul class="profile-list">
                                <li class="">
                                    <strong class="title">Company Type:</strong>
                                    <span class="cont"><?php echo $companyKind;?></span>
                                </li>


                                <li class="">
                                    <strong class="title">Company Size:</strong>
                                    <span class="cont"><?php echo $companySize; ?></span>
                                </li>

                                <li class="">
                                    <strong class="title">Company Kind:</strong>
                                    <span class="cont"><?php echo $companyKind; ?></span>
                                </li>
                                <li class="">
                                    <strong class="title">Company Website:</strong>
                                    <span class="cont"><a href="<?php echo $companySite;?>" ><?php echo $companySite; ?></a></span>
                                </li>

                                <li class="">
                                    <strong class="title">Founded in Year:</strong>
                                    <span class="cont"><?php echo $companyFounded; ?></span>
                                </li>
                              <li class="">
                                    <strong class="title">E-mail:</strong>
                                    <span class="cont"><a href="mailto:<?php echo $companyMail;?>"><?php echo $companyMail;?></a></span>
                                </li>
                                <li class="">
                                    <strong class="title">Address:</strong>
                                    <span class="cont"><?php echo $companyAddress; ?>  </span>
                                </li>

                                <li class="">
                                    <strong class="title">Company's Contact No.:</strong>
                                    <span class="cont"><?php echo $companyPhone; ?></span>
                                </li>

                            </ul>    
                            <!--<h4><strong> About Me:</strong></h4>

                            -->
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <div class="heading-inner">
                                <p class="title">About Us:</p>
                            </div>
                            <?php echo $companyAbout; ?>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <div class="heading-inner">
                                <p class="title">Our Specialities:</p>
                            </div>
                            <?php echo $companySpeciality; ?>
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

            <!-- CORE JS -->
            <script type="text/javascript" src="js/custom.js"></script>

            </div>
            </body>

            </html>