<?php
require_once "connection.php";
$companyId = "";
$error = "";
$editJob = "";
$jobId = "";
$flag="";
$edit="";
$compId="";

if(!isset($_GET['compId'] ) ) 
	header('Location:login.php?error=You need to login first.');

if(isset($_POST['submitJob'] ) && isset($_POST['jobId']) )  {
	
	$flag = $_POST['jobId'];
	header("Location:editJob.php?jobId=$flag");

}



$companyId = $_GET['compId'];
$id = $companyId;


if(isset($_POST['edit'])  )  {
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
            
            
            
            /*if(substr($logoType,0,5)=="image") 
            {
                
                if(mkdir($path,0777,true))
                {*/
                  
                $updateQuery = "UPDATE `company` SET  `name`='$name', `industryType` = '$type', `companySize`='$size',`type`='$kind',`website`= '$website', `founded`='$founded', `address` = '$address', `email` = '$email', `phone` = '$phone', `about` = '$about', `specialities` = '$speciality' WHERE `companyId`= '$companyId' ";
                $updateResult = $conn->query($updateQuery);
               
                if(!$updateResult) {
                	
                    $error = "Error executing update query".$conn->error;
                }
                else
                {	
                	$success = "Company Details have been edited successfuly. You can now either edit the jobs you have posted or go back to other pages. ";
                	

                 	
                 
                //move_uploaded_file($logo,$photoVariable);
                 }   
                    
                //}
                /*else
                {
                    $error = "Unable to create directory! Please Try Again.";
                }*/
            //}
            /*else
            {
                $error = "Updation of Company Details failed! Please try again.Only images allowed";
            }*/    
        }
}



  

	$companyId = $_GET['compId'];
	$showQuery = "SELECT * FROM `company` WHERE `companyId`='$companyId'";
	$showResult = $conn->query($showQuery);
	
	$id = "";
	$name = "";
	$industryType = "";
	$size = "";
	$type = "";
	$website = "";
	$founded = "";
	$address = "";
	$email = "";
	$phone = "";
	$logoPath = "";
	$logoName = "";
	$about = "";
	$speciality = "";

	$logoVariable = "" ;

	if(!$showResult) {
		$error = "No such company listed in our database.".$conn->error;
	}

	
		if(mysqli_num_rows($showResult) == 0)
			$error = "No such company listed in our database.";
		
		
			$showArray = mysqli_fetch_assoc($showResult);
			$id = $showArray['companyId'];
			$name = $showArray['name'];
			$industryType = $showArray['industryType'];
			$size = $showArray['companySize'];
			$kind = $showArray['type'];
			$website = $showArray['website'];
			$founded = $showArray['founded'];
			$address =$showArray['address'];
			$email = $showArray['email'];
			$phone = $showArray['phone'];
			$logoPath = $showArray['logoPath'];
			$logoName = $showArray['logoName'];
			$about = $showArray['about'];
			$speciality = $showArray['specialities'];

			$logoVariable = $logoPath . "/" . $logoName;
		

		

		 
    require "common/header.php";
?>
    <title>Edit Company Details</title>

</head>
            <!-- FOR NAVBAR & BLACK STRIP ON TOP  -->

            <?php require "common/navbar.php" ;  ?>


        <section class="job-breadcrumb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                        <h3>Edit Organisation Details</h3>
                    </div>
                    <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                        <div class="bread">
                            <ol class="breadcrumb">
                                 <li><a href="index.php">Home</a> </li> 
                                
                                <li class="active"><a href="#">Edit Organisation Details</a> </li>
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
                            <h3>Edit Organisation's Details</h3>
                            <p>Check & edit your organisation's details in the fields given below. </br>
                          	<b>If some detail is correct and you wish to keep it unchanged,then leave it as it is.</b></p>
                        </div>
                        <div class="post-job2-panel">
                            <form class="row" action="#" method="POST" name="postJobForm" enctype="multipart/form-data">
                            	<input type="hidden" name="edit" value="yes">
                            	<input type="hidden" name="compId" value="<?php echo $id; ?>">
                            <div class="col-md-2 col-sm-2 col-xs-12">
                            </div>
                            	<div class="col-md-8 col-sm-8 col-xs-12">
                            		<img src="<?php echo $logoVariable;?>" >
                            	</div>
                           <div class="col-md-2 col-sm-2 col-xs-12">
                           </div> 	
                            	
                            	
                            	<div class="col-md-3 col-sm-3 col-xs-12"></div>
                            	<div class="col-md-6 col-sm-6 col-xs-12">		<br>
                            		<label>Change Logo</label>
                            		<input type="file" name="logo" id="logo" value="">
                            	</div>
                            	<div class="col-md-3 col-sm-3 col-xs-12"></div>

                            	<div class="clearfix"><br></div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                    <br>
                                        <label>Name of the Company *</label>
                                        <input type="text" placeholder="Company's Name" class="form-control" name="companyName" required="required" value="<?php echo $name;?>">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                    <br>
                                        <label>Industry Type *</label>
                                        <select class="questions-category form-control" name="companyType" required="required" selected="<?php echo $industryType;?>">
                                        	<option value="<?php echo $industryType;?>" selected="selected"><?php echo $industryType;?></option>
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
                                        <input type="text" placeholder="Company Size" class="form-control" name="companySize" value="<?php echo $size;?>">
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Company Type *</label>
                                        <select class="questions-category form-control" name="companyKind" required="required" value="<?php echo $kind;?>">
                                        	<option value="<?php echo $kind;?>" selected = "selected"> <?php echo $kind;?></option>
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
                                         <input type="text"  placeholder="Company Website" class="form-control" name="companySite" required="required" value="<?php echo $website;?>">
                                        </div>
                                    </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Year of Foundation </label>
                                        <input type="text" placeholder="Foundation Year" class="form-control" name="companyFounded" value="<?php echo $founded;?>" >
                                    </div>
                                </div>

                                

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    
                                        <div class="form-group">
                                        <label>Address of Company Headquaters </label>
                                        <input type="text" placeholder="Headquaters' Address" class="form-control" name="companyAddress" value="<?php echo $address;?>">
                                    </div>
                                </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Company's E-mail Address *</label>
                                        <input type="text" placeholder="Email Address" class="form-control" name="companyEmail" required="required" value="<?php echo $email;?>" >
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Company's Contact Number </label>
                                        <input type="text" class=" form-control" name="companyPhone" placeholder="Contact No."  value="<?php echo $phone;?>">
                                            
                                    </div>
                                </div>

                                

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>About Company *</label>
                                        <textarea name="aboutCompany" class="ckeditor" required="required" ><?php echo $about;?></textarea  >
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Company's Specialities</label>
                                        <textarea name="companySpeciality" class="ckeditor" ><?php echo $speciality;?>
                                           
                                        </textarea>
                                    </div>
                                </div>

                                

                                                                    <button class="btn btn-default pull-right" name="submitCompany">Edit Details
                                     & Proceed <i class="fa fa-angle-right"></i></button>

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
                                
        <section class="faqs">
            <div class="container">


                        	<!--FETCH DETAILS OF JOBS POSTED BY THIS COMPANY-->
                        	<div class="col-md-12 col-sm-12 col-xs-12">
                                 	<h1 style="text-align: center;">Jobs Posted</h1>
                        		</div>
                        	<?php

                        		$jobQuery = "SELECT * FROM `job` WHERE `companyid` = '$id'";
                        		$jobResult = $conn->query($jobQuery);
                        		$row = mysqli_num_rows($jobResult);
                        		if($row == 0)  {
                        			echo "You haven't posted any jobs yet.";
                        		}
                        		else  {

                        			?>

                        			<div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel-group drop-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php
                        			$x = 7;
	                        			$y = 1;
                        			while($row)  {
	                        			$jobDisplay = mysqli_fetch_assoc($jobResult);
	                        			$jobId = $jobDisplay['jobId'];
	                        			$flag = $jobId;
	                        			$jobTitle = $jobDisplay['title'];
	                        			$jobLocation = $jobDisplay['location'];
	                        			$jobCategory = $jobDisplay['category'];
	                        			$jobSubCategory = $jobDisplay['subCategory'];
	                        			$jobType = $jobDisplay['type'];
	                        			$jobShift = $jobDisplay['shift'];
	                        			$jobVacancy = $jobDisplay['vacancy'];
	                        			$jobExperience = $jobDisplay['experience'];
	                        			$jobPostedOn = $jobDisplay['postedOn'];
	                        			$jobLastDate = $jobDisplay['lastDate'];
	                        			$jobKind = $jobDisplay['kind'];
	                        			$tags = $jobDisplay['tags'];
	                        			$jobDesc = $jobDisplay['description'];
	                        			$jobSpecs = $jobDisplay['specification'];
	                        			$jobTech = $jobDisplay['techGuidance'];  
	                        			
                        		?>
                        		
                                <div class="panel panel-default">
                                	<div class="panel-heading" role="tab" id="'.$y.'">
                                		<h4 class="panel-title"> 
	                                		<a class="collapsed collapse-controle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $x;?>" aria-expanded="false" aria-controls="<?php echo $x; ?>"><?php echo $jobTitle ;?>
	                                		<span class="expand-icon-wrap"><i class="fa expand-icon"></i></span> </a> 
                                		</h4>
                                	</div>
                                	<div id="<?php echo $x;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo $y;?>" aria-expanded="false">
                                		<div class="panel-body">
                                			<div class="col-md-9 col-sm-7 col-xs-12">
                           					 <div class="profile-info">
                           					 	
                           					 	<ul class="profile-list">
                               						<li class="">
					                                    <strong class="title">Job Category:</strong>
					                                    <span class="cont"><?php echo $jobCategory;?></span>
				                                	</li>
				                                	<li class="">
					                                    <strong class="title">Job Sub-category:</strong>
					                                    <span class="cont"><?php echo $jobSubCategory;?></span>
				                                	</li>
				                                	<li class="">
					                                    <strong class="title">Job Type:</strong>
					                                    <span class="cont"><?php echo $jobType;?></span>
				                                	</li>
				                                	<li class="">
					                                    <strong class="title">Vacancies Available:</strong>
					                                    <span class="cont"><?php echo $jobVacancy;?></span>
				                                	</li>
				                                	<li class="">
					                                    <strong class="title">Job Posted On:</strong>
					                                    <span class="cont"><?php echo $jobPostedOn;?></span>
				                                	</li>
				                                	<li class="">
					                                    <strong class="title">Job Last Date:</strong>
					                                    <span class="cont"><?php echo $jobLastDate;?></span>
				                                	</li>
				                                	<li class="">
					                                    <strong class="title">Kind of Job:</strong>
					                                    <span class="cont"><?php echo $jobKind;?></span>
				                                	</li>
				                                	<li class="">
					                                    <strong class="title">Job Last Date:</strong>
					                                    <span class="cont"><?php echo $jobLastDate;?></span>
				                                	</li>
				                                	<li class="">
					                                    <strong class="title">Tags:</strong>
					                                    <span class="cont"><?php echo $tags;?></span>
				                                	</li>
				                                	<li class="">
					                                    <strong class="title">Job Description:</strong>
					                                    <div class="cont"><?php echo $jobDesc;?></div>
				                                	</li>
				                                		<form action="#" method="POST">

				                                <input type="hidden" name="jobId" value= "<?php echo $flag; ?>" > 
				                                	
				                                	<?php echo $jobId; ?>
				                                	 <button class="btn btn-default pull-right" name="submitJob" >
				                                	 Edit This Job   <i class="fa fa-angle-right"></i></button>
				                                	 </form>
                           					 </div>
                           					</div>
                                		</div>
                                	</div>
                                </div>
                        	<?php
                        		$x++;
                        		$y++;
                        		$row--;
                        		}
							}

                        	?>	


                                </div>
                            </form>
                        </div>
                    </div>

             </section>      
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






<?php
	
?>

















?>