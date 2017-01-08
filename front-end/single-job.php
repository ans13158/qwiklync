<?php     if( empty($_GET['jobId']) )  {        header('Location:index.php');    }   else  {        require_once "connection.php";        $jobId="";        $jobSubCategory="";        $jobCategory="";        if( isset($_GET['jobId']) ) {            $jobId=$_GET['jobId'] ;        }        $jobQuery="SELECT * FROM `job` WHERE `jobId`='$jobId' ";        $jobResult= $conn->query($jobQuery);        $jobDisp=mysqli_fetch_assoc($jobResult);        if(!$jobResult)            header('Location:404.php');                                    $companyId=$jobDisp['companyId'];            /*FETCH COMPANY DETAILS FOR ABOVE companyId*/          $companyQuery="SELECT * FROM `company` WHERE `companyId`='$companyId' ";     $companyResult=$conn->query($companyQuery);                         $companyDisp=mysqli_fetch_assoc($companyResult);     if (!$companyDisp)         header('Location:404.php')   ;     /*STORE COMPANY DETAILS IN VARIABLES*/     $companyName = $companyDisp['name'];          $companyMail = $companyDisp['email'];      $companyPhone = $companyDisp['phone'];     $companySite = $companyDisp['website'];     $companyAddress = $companyDisp['address'];     $companyLogoPath = $companyDisp['logoPath'];     $companyLogoName = $companyDisp['logoName'];      //FETCH COMPANY'S LOGO :        $companyLogo = $companyLogoPath . "/" . $companyLogoName ;         /*FETCH AND STORE job DETAILS IN VARIABLES*/          $jobTitle=$jobDisp['title'];          $jobLocation=$jobDisp['location'];     $jobCategory=$jobDisp['category'];     $jobSubCategory=$jobDisp['subCategory'];     $jobType=$jobDisp['type'];          $jobShift=$jobDisp['shift'];     $jobVacancy=$jobDisp['vacancy'];             $jobExperience=$jobDisp['experience'];          $jobSalary=$jobDisp['salary'];                  $jobPostedOn=$jobDisp['postedOn'];     $jobLastDate=$jobDisp['lastDate'];     $jobKind=$jobDisp['kind'];     $jobDesc=$jobDisp['description'];     $jobSpecs=$jobDisp['specification'];     $jobTechGuide=$jobDisp['techGuidance'];         require "common/header.php";?>    <title>Opportunities A Mega Job Board Template</title>    </head>    <!-- FOR NAVBAR & BLACK STRIP ON TOP  -->    <?php require "common/navbar.php" ;  ?>        <section class="job-breadcrumb">            <div class="container">                <div class="row">                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">                        <h3><?php echo  $jobTitle ; ?></h3>                    </div>                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">                        <div class="bread">                            <ol class="breadcrumb">                                <li><a href="index.php">Home</a> </li>                                <li class="active">job Detail</li>                            </ol>                        </div>                    </div>                </div>            </div>        </section>        <section class="single-job-section">            <div class="container">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                        <div class="col-md-8 col-sm-8 col-xs-12">                            <div class="single-job-page">                                <div class="job-short-detail">                                    <div class="heading-inner">                                        <p class="title">Job Details</p>                                    </div>                                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                                        <dl>                                            <dt>Job Type:</dt>                                            <dd><?php echo  $jobType; ?></dd>                                            <dt>Job Experience:</dt>                                            <dd> <?php echo  $jobExperience; ?> </dd>                                            <dt>Job Shift:</dt>                                            <dd> <?php echo  $jobShift;?></dd>                                            <dt>Posted On:</dt>                                            <dd><?php echo  $jobPostedOn;?></dd>                                            <dt>Last Date:</dt>                                            <dd> <?php echo  $jobLastDate;?></dd>                                            <dt>No. of Vacancies:</dt>                                            <dd><?php echo  $jobVacancy;?></dd>                                            <dt>Location(s):</dt>                                            <dd><?php echo  $jobLocation;?></dd>                                            <dt>Expected Salary:</dt>                                            <dd>$<?php echo  $jobSalary;?></dd>                                        </dl>                                    </div>                                </div>                                <div class="heading-inner">                                    <p class="title">Job Description</p>                                </div>                                <div class="job-desc job-detail-boxes">                                    <p>                                        <?php echo  $jobDesc;?>                                    </p>                                    <div class="heading-inner">                                        <p class="title">Job Specification:</p>                                    </div>                                    <ul class="desc-points">                                        <?php echo  $jobSpecs;?>                                    </ul>                                    <div class="heading-inner">                                        <p class="title">Technical Guidance:</p>                                    </div>                                    <ul class="desc-points">                                        <?php echo  $jobTechGuide;?>                                    </ul>                                </div>                            </div>                        </div>                        <div class="col-md-4 col-sm-4 col-xs-12">                            <aside>                                <div class="apply-job">                                    <a class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-upload"></i>Apply For Position</a>                                    <a class="btn btn-default bookmark"><i class="fa fa-star"></i> Bookmark This Job</a>                                </div>                                <div class="company-detail">                                    <div class="company-img">                                        <img src="<?php echo  $companyLogo;?>" class="img-responsive" alt="">                                    </div>                                    <div class="company-contact-detail">                                        <table>                                            <tr>                                                <th>Name:</th>                                                <td> <?php echo  $companyName;?></td>                                            </tr>                                            <tr>                                                <th>Email:</th>                                                <td> <?php echo  $companyMail;?></td>                                            </tr>                                            <tr>                                                <th>Phone:</th>                                                <td> <?php echo  $companyPhone;?></td>                                            </tr>                                            <tr>                                                <th>Website:</th>                                                <td> <?php echo  $companySite;?></td>                                            </tr>                                            <tr>                                                <th>Address:</th>                                                <td> <?php echo  $companyAddress;?></td>                                            </tr>                                        </table>                                    </div>                                </div>                            </aside>                            <div class="single-job-map">                                <div id="map-contact"></div>                            </div>                      <!-- FETCH & DISPLAY FEATURED JOBS  -->    <?php                                $featuredQuery="SELECT `jobId`, `title`,`location`,`postedOn`,`lastDate`,`type` FROM job WHERE `kind`='Featured Job' LIMIT 4 ";                                $featuredResult=$conn->query($featuredQuery);                                if(!$featuredResult)                                   die("no".mysql_error());                                     $featuredRow=mysqli_num_rows($featuredResult);                                                                if($featuredRow == 0)  {                                    $featuredMessage="<h4>Sorry! No Featured Jobs available at the moment. Please comae again later.</h4>";                                    echo $message;                                }                                                                ?>                            <div class="widget">                                <div class="widget-heading"><span class="title">Featured Jobs</span></div>                                <ul class="related-post">                                    <?php                                       while($featuredRow)  {                                        $featuredDisp=mysqli_fetch_assoc($featuredResult);                                                                                $featuredJobId = $featuredDisp['jobId'];                                                                                $featuredJobTitle = $featuredDisp['title'];                                        $featuredJobLocation = $featuredDisp['location'];                                        $featuredJobPosted = $featuredDisp['postedOn'];                                        $featuredJobLastDate = $featuredDisp['lastDate'];                                         $featuredJobType = $featuredDisp['type'];                                        ?>                                    <li>                                        <a href="single-job.php?jobId=<?php echo $featuredJobId; ?>"                                        >                                        <?php echo $featuredJobTitle; ?>                                          </a>                                        <span><i class="fa fa-map-marker"></i><?php echo $featuredJobLocation;?> </span>                                        <span><i class="fa fa-calendar"></i><?php echo $featuredJobPosted;?> TO <?php echo $featuredJobLastDate;?> </span>                                    </li>                                    <?php                                        $featuredRow--;                                     }                                            ?>                                                                   </ul>                            </div>                        </div>                    </div>                </div>            </div>        </section>        <section class="featured-jobs">            <div class="container">                <div class="row">                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding">                        <div class="col-md-12 col-sm-12 col-xs-12">                                <!--RELATED JOBS ARE THOSE THAT HAVE SAME CATEGORY BUT DIFFERENT SUBCATEGORY AS THAT OF THE JOB IN DISPLAY,CURRENTLY, ON THE PAGE.  -->                                            <div class="Heading-title-left black small-heading">                                <h3>Related Jobs</h3>                            </div>                        </div>            <!-- FETCH & DISPLAY DATA FOR RELATED JOB-->                 <?php                $relatedQuery = "SELECT `jobId`,`companyId`,`title`,`subCategory`,`location`,`salary`,`postedOn`,`type` FROM `job` WHERE `category` LIKE '$jobCategory' AND `subCategory` NOT LIKE '$jobSubCategory'";                                $relatedResult = $conn->query($relatedQuery);                $relatedRow = mysqli_num_rows($relatedResult);                $relatedClass="";                $timeElapsed = "";                $relatedPostedOn = "";                if($relatedRow == 0)  {                    $message="<h4>Sorry! No jobs related to this one available at the moment! Please come again later.</h4>";                    echo $message;                }                while($relatedRow)  {                        $relatedDisp = mysqli_fetch_assoc($relatedResult);                        $relatedJobId = $relatedDisp['jobId'];                        $relatedCompanyId = $relatedDisp['companyId'];                        $relatedTitle = $relatedDisp['title'];                        $relatedSubCategory = $relatedDisp['subCategory'];                        $relatedLocation=$relatedDisp['location'];                        $relatedSalary = $relatedDisp['salary'];                        $relatedType = $relatedDisp['type'];                        $relatedPostedOn= $relatedDisp['postedOn'];                        /*FETCH COMPANY INFO BASED ON COMPANY ID*/                        //echo $relatedCompanyId;                        $relatedCompanyQuery = "SELECT `companyId`,`name`,`logoPath`,`logoName` FROM `company` WHERE `companyId` = '$relatedCompanyId'";                                                $relatedCompanyResult = $conn->query($relatedCompanyQuery);                                               if(!$relatedCompanyResult)                            echo "no".$conn->error;                                               $relatedCompanyDisp = mysqli_fetch_assoc($relatedCompanyResult);                                                $relatedCompanyName = $relatedCompanyDisp['name'];                                                $relatedCompanyLogoName = $relatedCompanyDisp['logoName'];                                                $relatedCompanyLogoPath = $relatedCompanyDisp['logoPath'] ;                        $relatedLogo = $relatedCompanyLogoPath . "/" . $relatedCompanyLogoName ;                                              /*DECIDE CLASS FOR COLOR OF JOB TYPE :                            IF type="Full-Time" : Class="mata-detail-full-time"                            IF type="Part-Time" : Class="mata-detail-part"                                                        IF type="Work From Home" : Class="mata-detail-remote"                                                        IF type="Freelancer" : Class="mata-detail-full-time"                                                    */                            if($relatedType=="Full Time")                                $relatedClass = "mata-detail full-time";                            else if($relatedType=="Part Time")                                $relatedClass = "mata-detail part";                            else if($relatedType=="Work From Home")                                $relatedClass = "mata-detail remote";                            else                                 $relatedClass = "mata-detail full-time";                        /*                            CALCULATES NO. OF DAYS ELAPSED SINCE JOB POSTED :                             USING "datediff(date1, date2) function"; constraint: DATE SHOULD BE IN YYYY/MM/DD FORMAT ONLY.                        */                            /* $dateCurrent = date("Y/m/d");                            $timeElapsed =  DATEDIFF(date("Y/m/d"),STR_TO_DATE($relatedPostedOn, '%Y/%m/%d'))                            echo $timeElapsed;*/                    ?>                                 <div class="col-md-4 col-sm-6 col-xs-12">                            <div class="featured-image-box">                                <div class="img-box"><img src="<?php echo $relatedLogo;?>" class="img-responsive center-block" alt=""></div>                                <div class="content-area">                                    <div class="">                                        <h4><a href="single-job.php?jobId=<?php echo $relatedJobId;?>"> <?php echo $relatedSubCategory;?> </a></h4>                                        <p> <?php echo $relatedCompanyName  . "  " .$relatedLocation;?> </p>                                    </div>                                    <div class="feature-post-meta">                                        <a href=""> <i class="fa fa-clock-o"></i> 1 days ago</a> <a href="" class="<?php echo $relatedClass; ?>"><?php echo $relatedType;?></a> </div>                                    <div class="feature-post-meta-bottom"> <span>$<?php echo $relatedSalary;?><small>/ month</small></span> <a href="" class="apply pull-right"> Apply Now</a> </div>                                </div>                            </div>                        </div>                        <?php                            $relatedRow--;                          }                        ?>                                         </div>                </div>            </div>        </section>        <!--- required for SUB-FOOTER PAGE and FOOTER   -->        <?php require "common/footer.php" ; ?>            <!--- Footer ends   -->            <div class="modal fade apply-job-modal" id="myModal">                <div class="modal-dialog" role="document">                    <div class="modal-content">                        <div class="modal-body contact-form-container">                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>                            <div class="job-modal">                                <h2>Want To Apply For this Job?</h2>                            </div>                            <form method="POST" id="job-form"  enctype="multipart/form-data">                                <div class="row clearfix">                                    <div class="column col-md-12 col-sm-12 col-xs-12">                                        <div class="form-group">                                            <input type="text" class="form-control" name="name" value="" placeholder="Full Name" required>                                        </div>                                        <div class="form-group">                                            <input type="email" class="form-control" name="email" value="" placeholder="Email" required>                                        </div>                                    </div>                                    <div class="column col-md-12 col-sm-12 col-xs-12">                                    <div class="form-group">                                        <select class="select-resume form-control">                                            <option value="">&nbsp;</option>                                            <option value="0">Software Engineering</option>                                            <option value="2">Graphic Designing</option>                                            <option value="3">Front end Developer</option>                                            <option value="4">IT Specialist</option>                                        </select>                                    </div>                                </div>                                <div class="column col-md-12 col-sm-12 col-xs-12">                                    <div class="input-group image-preview form-group">                                    <input type="file" name="uploadResume" id="uploadResume" style="display: none;">                                        <input type="text" placeholder="Upload Resume" class="form-control image-preview-filename" disabled="disabled">                                        <span class="input-group-btn">                                        <button type="button" class="btn btn-default image-preview-clear" style="display:none;">                                            <span class="glyphicon glyphicon-remove"></span> Clear                                        </button>                                        <div class="btn btn-default image-preview-input">                                            <span class="glyphicon glyphicon-folder-open"></span>                                            <span class="image-preview-input-title">Browse</span>                                            <input type="file" accept="file_extension" name="input-file-preview" />                                        </div>                                        </span>                                    </div>                                </div>                                    <div class="column col-md-12 col-sm-12 col-xs-12">                                        <div class="form-group">                                            <textarea name="message" rows="6" class="form-control"  name="coverLetter" placeholder="Cover Letter" required></textarea>                                        </div>                                    </div>                                    <div class="col-md-12 col-xs-12">                                    <input type="hidden" name="param" value="yes">                                        <div class="text-center">                                            <button type="submit" name="submit" class="btn btn-default btn-block">Apply Now</button>                                        </div>                                    </div>                                </div>                            </form>                        </div>                    </div>                </div>            </div>            <a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>            <!-- JAVASCRIPT JS  -->            <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>            <!-- JAVASCRIPT JS  -->            <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>            <!-- BOOTSTRAP CORE JS -->            <script type="text/javascript" src="js/bootstrap.min.js"></script>            <!-- JQUERY SELECT -->            <script type="text/javascript" src="js/select2.min.js"></script>            <!-- MEGA MENU -->            <script type="text/javascript" src="js/mega_menu.min.js"></script>            <!-- JQUERY COUNTERUP -->            <script type="text/javascript" src="js/counterup.js"></script>            <!-- JQUERY WAYPOINT -->            <script type="text/javascript" src="js/waypoints.min.js"></script>            <!-- JQUERY REVEAL -->            <script type="text/javascript" src="js/footer-reveal.min.js"></script>            <!-- Owl Carousel -->            <script type="text/javascript" src="js/owl-carousel.js"></script>            <!-- FOR THIS PAGE ONLY -->            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>            <script type="text/javascript" src="js/map.js"></script>            <!-- CORE JS -->            <script type="text/javascript" src="js/custom.js"></script>            </div>            </body>            </html>   <?php                                      }                                ?>         