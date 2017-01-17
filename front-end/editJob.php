<?php
    require_once "connection.php";
    $company = "";
    $error = "";
    $jobId = "" ;

    if(isset($_GET['error'] ) )  {
        $error = $_GET['error'];
    }
    if(isset($_GET['jobId'] ) )  {
        $jobId = $_GET['jobId'];
            
        }
    
    else  {
        header('Location:index.php');
    }


if(isset($_POST['editJob'] ) )  {
    if($_POST['editJob'] == "yes" )  {
        $id = strip_tags( trim($_POST['jobId']) );
        $compId = strip_tags( trim($_POST['companyId'] ) ); 
        $title = strip_tags( trim($_POST['jobTitle']) );
        $location = strip_tags( trim($_POST['jobLocation']) );
        $category = strip_tags( trim($_POST['jobCategory']) ) ;
        $subCategory = strip_tags( trim($_POST['jobSubCategory']) ) ;
        $type = strip_tags( trim($_POST['jobType']) ) ;
        $shift = strip_tags( trim($_POST['jobShift']) ) ;
        $vacancy = strip_tags( trim($_POST['jobVacancy']) ) ;
        $experience = strip_tags( trim($_POST['jobExperience']) ) ;
        $salary = trim($_POST['jobSalary'])  ;
        $lastDate = strip_tags( trim($_POST['jobLastDate']) ) ;
        $kind = strip_tags( trim($_POST['jobKind']) ) ;
        $tags = strip_tags( trim($_POST['jobTags']) ) ;
        $description =  trim($_POST['jobDesc']) ;
        $specification =  trim($_POST['jobSpecs'])  ;
        $techGuidance = trim($_POST['jobTechGuide']) ;

        $updateQuery = "UPDATE `job` SET `title` = '$title', `location` = '$location', `category` = '$category', `subCategory` = '$subCategory', `type` = '$type', `shift` = '$shift', `vacancy` = '$vacancy', `experience` = '$experience', `salary` = '$salary', `lastDate` = '$lastDate', `kind` = '$kind', `tags` = '$tags', `description` = '$description', `specification` = '$specification', `techGuidance` = '$techGuidance' WHERE `jobId` = '$jobId'" ;
        $updateResult = $conn->query($updateQuery);

        if(!$updateResult)  
            $error = "Error updating information". $conn->error;
     
        else
            $success = "successsfuly updated information.<br>
        You can now either <a href='editCompanyDetails.php?compId=$compId'style='color:green;text-decoration:underline'>Go Back</a> & update other job details or browse through other pages. ";
  }
}
    $getCompQuery = "SELECT `companyId` FROM `job` WHERE `jobId`='$jobId'";
    $getCompResult = $conn->query($getCompQuery);
    $company = mysqli_fetch_assoc($getCompResult)['companyId'];

?>    
<?php 
    require "common/header.php";
?>
    <title>Edit Job Details</title>

</head>
            <!-- FOR NAVBAR & BLACK STRIP ON TOP  -->

            <?php require "common/navbar.php" ;  ?>


        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Edit Job Details</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                 <li><a href="index.php">Home</a> </li> 
                                
                                <li class="active"><a href="#">Edit Job Details</a> </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="post-job light-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12 col-md-push-4">
                        <div class="Heading-title-left black small-heading">
                            <h3>Edit Job Details</h3>
                            <p>Check & edit job details in the fields given below. </br>
                            <b>If some detail is correct and you wish to keep it unchanged,then leave it as it is.</b></p>
                        </div>
                        <div class="post-job2-panel">
                            <form class="row" action="#" method="POST" name="postJobForm">
                            <?php
                                     if(!$error == "")
                                    {
                                        echo "<span> <h4 style=\"color:red;text-align:center\">".$error."</h4></span>";
                                    }
                                ?>
                                <!-- FETCH JOB DETAILS AND SHOW FOR CORRECTION -->

                                <?php
                                    $jobTitle = "";
                                    $jobLocation = "";
                                    $jobCategory = "";
                                    $jobSubCategory = "";
                                    $jobType = "";
                                    $jobShift = "";
                                    $jobVacancy = "";
                                    $jobExperience = "";
                                    $jobSalary = "";
                                    $jobPostedOn = "" ;
                                    $jobLastDate = "";
                                    $jobKind = "";
                                    $jobTags = "";
                                    $jobDesc = "";
                                    $jobSpecs = "";
                                    $jobTechGuide = "";

                                    $jobQuery = "SELECT * FROM `job` WHERE `jobId` = '$jobId'";
                                    $jobResult = $conn->query($jobQuery);
                                    if(!$jobResult)  {
                                        $error = "Error Retriving current job details.".$conn->error;
                                    }
                                    $jobDisplay = mysqli_fetch_assoc($jobResult);
                                    $jobTitle = $jobDisplay['title'];
                                    $jobLocation = $jobDisplay['location'];
                                    $jobCategory = $jobDisplay['category'];
                                    $jobSubCategory = $jobDisplay['subCategory'];
                                    $jobType = $jobDisplay['type'];
                                    $jobShift = $jobDisplay['shift'];
                                    $jobVacancy = $jobDisplay['vacancy'];
                                    $jobExperience =$jobDisplay['experience'];
                                    $jobPostedOn = $jobDisplay['postedOn'];
                                    $jobLastDate = $jobDisplay['lastDate'];
                                    $jobKind = $jobDisplay['kind'];
                                    $jobTags = $jobDisplay['tags'];
                                    $jobDesc = $jobDisplay['description'];
                                    $jobSpecs = $jobDisplay['specification'];
                                    $jobTechGuide = $jobDisplay['techGuidance'];

                                ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                    <input type="hidden" name="jobId" value="<?php echo $jobId;?>" />

                                    <input type="hidden" name="companyId" value="<?php echo $company;?>" />

                                        <label>Job Title *</label>
                                        
                                        <input type="text" placeholder="Job Title" class="form-control" name="jobTitle" value = "<?php echo $jobTitle; ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Location *</label>
                                        <input type="text" placeholder="Job Location" class="form-control" name="jobLocation" value = "<?php echo $jobLocation; ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Category *</label>
                                        <select class="questions-category form-control" multiple="multiple" name="jobCategory" value = "<?php echo $jobCategory; ?>" required="required">
                                        <option value = "<?php echo $jobCategory; ?>" selected="selected"><?php echo $jobCategory; ?></option>
                                            <option value="Transporation" >Transporation</option>
                                            <option value="Restaurant, Food, Hotels">Restaurant, Food, Hotels</option>
                                            <option value="Art, Design & Multimedia">Art, Design and Multimedia</option>
                                            <option value="Healthcare & Medicine">Healthcare and Medicine</option>
                                            <option value="Laravel">Laravel</option>
                                            <option value="Sofware">Sofware</option>
                                            <option value="Computer & IT">Computer and IT</option>
                                            <option value="Accounting & Finance">Accounting and  Finance</option>
                                            <option value="Education & Academia">Education and Academia</option>
                                            <option value="Construction, Engineering">Construction, Engineering</option>
                                            <option value="Software & Development">Software and Development</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Sub-category *</label>
                                        <input type="text" placeholder="Web Developer/Marketing Manager/Salesman etc." class="form-control" name="jobSubCategory" value = "<?php echo $jobSubCategory; ?>" required="required">
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Type *</label>
                                        <select class="questions-category form-control" name="jobType" required="required" value = "<?php echo $jobType; ?>">
                                            <option value="<?php echo $jobType; ?>" selected="selected"> <?php echo $jobType; ?> </option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Work From Home">Work From Home</option>
                                            <option value="Freelancer">Freelancer</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Shift</label>
                                        <select class="questions-category form-control" name="jobShift" value = "<?php echo $jobShift; ?>">
                                            <option value="<?php echo $jobShift; ?>" selected="selected"> <?php echo $jobShift; ?></option>
                                            <option value="Morning" selected="selected">Morning</option>
                                            <option value="Evening">Evening</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Vacancies *</label>
                                        <input type="text" placeholder="Number of Job Vacancies" class="form-control" name="jobVacancy" value = "<?php echo $jobVacancy; ?>" required="required">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Experience</label>
                                        <select class="questions-category form-control" name="jobExperience" value = "<?php echo $jobExperience; ?>">   
                                            <option value="<?php echo $jobExperience; ?>" selected="selected"> <?php echo $jobExperience; ?> </option>
                                            <option value="Fresher">Fresher</option>
                                            <option value="1 Year">1 Year</option>
                                            <option value="2 Years">2 Years</option>
                                            <option value="3 Years">3 Years</option>
                                            <option value="4 Years">4 Years</option>
                                            <option value="5 Years">5 Years</option>
                                            <option value="6+ Years">6+ Years</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Expected Salary *</label>
                                        <select class="questions-category form-control" name="jobSalary" required="required" value = "<?php echo $jobSalary; ?>">
                                            <option value="₹10,000 or Less"> 10,000 or Less</option>
                                            <option value="₹10,000 +">10,000 +</option>
                                            <option value="₹20,000 +">20,000 +</option>
                                            <option value="₹30,000 +">30,000 +</option>
                                            <option value="₹40,000 +">40,000 +</option>
                                            <option value="₹50,000 +">50,000 +</option>
                                            <option value="₹100,000 +">100,000 +</option>
                                            <option value="Negotiable">Negotiable</option>
                                        </select>
                                    </div>
                                </div>

                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Type of Job you want this to be displayed *</label>
                                        <select class="questions-category form-control" name="jobKind" value = "<?php echo $jobKind; ?>" required="required">
                                            <option value="<?php echo $jobKind; ?>" selected="selected"><?php echo $jobKind; ?></option>
                                            <option value="Featured Job">Featured Job</option>
                                            <option value="Hot Job">Hot Job</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                
                                 <div class="clearfix"></div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Posted On *</label>
                                        <input type="date" class="questions-category form-control" name="jobPostedOn" value = "<?php echo $jobPostedOn; ?>" required="required" disabled >
                                            
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Last Date of Application *</label>
                                        <input type="date" class="questions-category form-control" name="jobLastDate" value = "<?php echo $jobLastDate; ?>" required="required">
                                            
                                    </div>
                                </div>

                                
                               

                                 <div class="clearfix"></div>
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Tags *</label>
                                        <input type="text" class="questions-category form-control" id= "tags"  class="form-control" data-role="tagsinput" name="jobTags" required="required" value = "<?php echo $jobTags; ?>" >
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Description *</label>
                                        <textarea name="jobDesc" class="ckeditor" > <?php echo $jobDesc; ?> </textarea required="required" >
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Job Specifications(Write a brief description of the job,in points) *</label>
                                        <textarea name="jobSpecs" class="ckeditor" required="required">
                                           <?php echo $jobSpecs; ?>
                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Technical Guidance(Write briefy in about 5-6 points) *</label>
                                        <textarea name="jobTechGuide" class="ckeditor" required="required">
                                            <?php echo $jobTechGuide; ?>
                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                
                                <?php
                                    if(!$success == "")
                                    {
                                        echo "<span> <h3 style=\"color:green;text-align:center\">".$success."</h3></span>";
                                    } 
                                    else if(!$error == "")
                                    {
                                        echo "<span> <h3 style=\"color:red;text-align:center\">".$error."</h3></span>";
                                    }
                                ?>

                            </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input type="hidden" name="editJob" value="yes" />
                                    <button class="btn btn-default pull-right">Edit Job Details <i class="fa fa-angle-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 col-md-pull-8">
                        <div class="widget">
                            <div class="widget-heading"><span class="title">Company Details</span></div>

                            <!-- RETRIVE DETAILS OF THE COMPANY POSTING THIS JOB  -->

                            <?php
                                $companyQuery = "SELECT `name`,`industryType`,`website`,`email`,`logoPath`,`logoName`,`about` FROM `company` WHERE `companyId`= '$company'";
                                $companyRes = $conn->query($companyQuery);
                                if(!$companyRes)
                                    echo "error".$conn->error;
                                $companyDisplay = mysqli_fetch_assoc($companyRes);
                                $name = $companyDisplay['name'];
                                $industryType = $companyDisplay['industryType'];
                                $website = $companyDisplay['website'];
                                $email = $companyDisplay['email'];
                                $logoPath = $companyDisplay['logoPath'];
                                $logoName = $companyDisplay['logoName'];
                                $logo = $logoPath . "/" . $logoName ;
                                

                            ?>
                            <div class="" id="followers">
                                <ul class="list-group list-group-dividered list-group-full">
                                    <li class="list-group-item">
                                        <div class="media">
                                            
                                                
                                                    <img src="<?php echo $logo; ?>" class="img-responsive" alt="<?php echo $name; ?>">
                                                                         
                                            </div>
                                            
                                                
                                                <table>

                                                    <div class="media">   

                                                    <tr>
                                                        <td> <h4> Name : </td></h4>
                                                        <td><h4><?php echo $name; ?></h4></td>             
                                                    </tr>

                                                    </div>

                                                  <div class="media">  

                                                    <tr>
                                                        <td> <h4>Website :</h4> </td>
                                                        <td style="padding-left:10px;"><h4><?php echo $website; ?></h4></td>             
                                                    </tr>

                                                    </div>

                                                      <div class="media">   

                                                    <tr>
                                                        <td> <h4>Type : </h4></td>
                                                        <td style="paddong-left:10px;" ><h4><?php echo $industryType; ?></h4></td>             
                                                    </tr>

                                                    </div>

                                                    <div class="media">

                                                    <tr>
                                                        <td> <h4>email-id : </h4></td>
                                                        <td style="padding-left:10px;"><h4><?php echo $email; ?></h4></td>             
                                                    </tr>

                                                    </div>
                                                    
                                                </table>
                                                    
                                                </div>
                                            </div>
                                                
                                            </div>
                                        </div>
                                    </li>
                                    
                                </ul>
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
        <script type="text/javascript" src="js/jquery.tagsinput.min.js"></script>
        <script type="text/javascript">
            $('#tags').tagsInput({
                width: 'auto'
            });
        </script>

        <!-- CK-EDITOR -->
        <script src="http://cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>
        <script type="text/javascript">
            CKEDITOR.replace('ckeditor');
        </script>
        <!-- FOR THIS PAGE ONLY -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVj6yChAfe1ilA4YrZgn_UCAnei8AhQxQ&amp;sensor=false"></script>
        <script type="text/javascript" src="js/map.js"></script>
        <!-- CORE JS -->
        <script type="text/javascript" src="js/custom.js"></script>
    </div>
</body>

</html>