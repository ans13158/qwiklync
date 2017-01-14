<?php

require_once "connection.php";

    $error = "";
    $success = "";

    if( isset($_GET['error']) ) 
        $error = $_GET['error']; 

    if( isset($_GET['success']) ) 
        $success = $_GET['success'];
    
    $companyId = "";
    $name = "";
    $type= "";
    $size="";
    $kind="";
    $website="";
    $founded="";
    $address="";
    $email = "";
    $phone="";
    $logoName="";
    $logoPath="";
    $about="";
    $speciality="";
    $logoName = "";

    if(isset($_POST['companyName'] ) && isset($_POST['companyType']) && isset($_POST['companySize']) && isset($_POST['companyKind']) && isset($_POST['companySite']) && isset($_POST['companyFounded']) && isset($_POST['companyAddress']) && isset($_POST['companyEmail']) && isset($_POST['companyPhone'])  && isset($_POST['aboutCompany']) && isset($_POST['companySpeciality']) )  {
            
            $name = $_POST['companyName'];
            $type = $_POST['companyType'];
            $size = $_POST['companySize'];
            $kind = $_POST['companyKind'] ;
            $website = $_POST['companySite'] ;
            $founded = $_POST['companyFounded'];
            $address = $_POST['companyAddress'];
            $email = $_POST['companyEmail'];
            $phone = $_POST['companyPhone'];
            $about = $_POST['aboutCompany'];
            $speciality = $_POST['companySpeciality'];
            

            $uniq=uniqid();


            
            $logo= $_FILES['logo']['tmp_name'];
            $logoType= $_FILES['logo']['type'];
            $logoName= $_FILES['logo']['name'];
            $photoFolderName= $logoName.$uniq;
            $path="companies/".$photoFolderName;
            $photoPath= $path;
            $photoVariable= $path."/".$logoName;
            
            
            
            if(substr($logoType,0,5)=="image") 
            {
                
                if(mkdir($path,0777,true))
                {
                    
                $insertQuery = "INSERT INTO `company`(`name`,`industryType`,`companySize`,`type`,`website`,`founded`,`address`,`email`,`phone`,`about`,`specialities`) VALUES ('$name','$type', '$size','$kind', '$website', '$founded', '$address','$email','$phone','$about','$speciality') ";
                $insertResult = $conn->query($insertQuery);

                if(!$insertResult) {
                    $error = "Error executing insert query".$conn->error  ;    
                }
                move_uploaded_file($logo,$photoVariable);
                    
                    
                }
                else
                {
                    $error = "Unable to create directory! Please Try Again.";
                }
            }
            else
            {
                $error = "Addition of Company is failed! Please try again.Only images allowed";
            }    
        }

        




    


?>    
<?php 
    require "common/header.php";
?>
    <title>Add Company Details</title>

</head>
            <!-- FOR NAVBAR & BLACK STRIP ON TOP  -->

            <?php require "common/navbar.php" ;  ?>


        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Post A Job</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                 <li><a href="index.php">Home</a> </li> 
                                
                                <li class="active"><a href="post-job.php">Post Job</a> </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="post-job light-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                        <div class="Heading-title-left black small-heading">
                            <h3>Add Organisation's Details</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium</p>
                        </div>
                        <div class="post-job2-panel">
                            <form class="row" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="postJobForm">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Name of the Company *</label>
                                        <input type="text" placeholder="Company's Name" class="form-control" name="companyName" required="required">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Industry Type *</label>
                                        <select class="questions-category form-control" name="companyType" required="required">
                                            <option value="Transporation">Transporation</option>
                                            <option value="Restaurant, Food, Hotels">Restaurant, Food, Hotels</option>
                                            <option value="Art, Design & Multimedia">Art, Design & Multimedia</option>
                                            <option value="Healthcare & Medicine">Healthcare & Medicine</option>
                                            <option value="Laravel">Laravel</option>
                                            <option value="Sofware">Sofware</option>
                                            <option value="Computer & IT">Computer & IT</option>
                                            <option value="Accounting & Finance">Accounting & Finance</option>
                                            <option value="Education & Academia">Education & Academia</option>
                                            <option value="Construction, Engineering">Construction, Engineering</option>
                                            <option value="Software & Development">Software & Development</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Company Size (No. of Employees) </label>
                                        <input type="text" placeholder="Company Size" class="form-control" name="companySize" >
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Company Type *</label>
                                        <select class="questions-category form-control" name="companyKind" required="required">
                                            <option value="Government Organisation">Government Organisation</option>
                                            <option value="Private Organisation">Private Organisation</option>
                                            <option value="NGO">NGO</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                         <label>Company's Website *</label>
                                         <input type="text"  placeholder="Company Website" class="form-control" name="companySite" required="required">
                                        </div>
                                    </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Year of Foundation </label>
                                        <input type="text" placeholder="Foundation Year" class="form-control" name="companyFounded" >
                                    </div>
                                </div>

                                

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    
                                        <div class="form-group">
                                        <label>Address of Company Headquaters </label>
                                        <input type="text" placeholder="Headquaters' Address" class="form-control" name="companyAddress" >
                                    </div>
                                </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Company's E-mail Address *</label>
                                        <input type="text" placeholder="Email Address" class="form-control" name="companyEmail" required="required" >
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Company's Contact Number </label>
                                        <input type="text" class=" form-control" name="companyPhone" placeholder="Contact No."  >
                                            
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Company's Logo * </label>
                                         
                                         <input type="file" name="logo" id="logo" class="form-control" required="required">   
                                    </div>
                                </div>
                                

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>About Company *</label>
                                        <textarea name="aboutCompany" class="ckeditor" required="required" ></textarea  >
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Company's Specialities</label>
                                        <textarea name="companySpeciality" class="ckeditor">
                                           
                                        </textarea>
                                    </div>
                                </div>

                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                
                                <?php
                                    if(!$sucess == "")
                                    {
                                        echo "<span> <h3 style=\"color:green;text-align:center\">".$sucess."</h3></span>";
                                    } 
                                    else if(!$error == "")
                                    {
                                        echo "<span> <h3 style=\"color:red;text-align:center\">".$error."</h3></span>";
                                    }
                                ?>

                                    <button class="btn btn-default pull-right" name="submitCompany">Submit Details
                                     & Proceed <i class="fa fa-angle-right"></i></button>
                                </div>
                            </form>
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