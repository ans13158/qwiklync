 <?php
		
require_once "connection.php" ;

if( !(isset( $_POST['jobTitle'] ) && isset( $_POST['jobLocation'] ) && isset( $_POST['jobCategory'] ) &&isset( $_POST['jobSubCategory'] ) && isset( $_POST['jobType'] ) && isset( $_POST['jobShift'] ) && isset( $_POST['jobVacancy'] ) && isset( $_POST['jobExperience'] ) && isset( $_POST['jobSalary'] ) && isset( $_POST['jobLastDate'] ) && isset( $_POST['jobKind'] ) && isset( $_POST['jobTags'] ) && isset( $_POST['jobDesc'] ) && isset( $_POST['jobSpecs'] ) && isset( $_POST['jobTechGuide'] ) ) )  {							

		header('Location:company-details.php') ;
	
	}
				
else				
	{
					$jobCompany = strip_tags( trim($_POST['companyId']) );
					$jobTitle = strip_tags( trim($_POST['jobTitle']) );
					$jobLocation = strip_tags( trim($_POST['jobLocation']) );
					$jobCategory = strip_tags( trim($_POST['jobCategory']) ) ;
					$jobSubCategory = strip_tags( trim($_POST['jobSubCategory']) ) ;
					$jobType = strip_tags( trim($_POST['jobType']) ) ;
					$jobShift = strip_tags( trim($_POST['jobShift']) ) ;
					$jobVacancy = strip_tags( trim($_POST['jobVacancy']) ) ;
					$jobExperience = strip_tags( trim($_POST['jobExperience']) ) ;
					$jobSalary = trim($_POST['jobSalary'])  ;
					$jobLastDate = strip_tags( trim($_POST['jobLastDate']) ) ;
					$jobKind = strip_tags( trim($_POST['jobKind']) ) ;
					$jobTags = strip_tags( trim($_POST['jobTags']) ) ;
					$jobDesc =  trim($_POST['jobDesc']) ;
					$jobSpecs =  trim($_POST['jobSpecs'])  ;
					$jobTechGuide = trim($_POST['jobTechGuide']) ;

					$jobPostDate = date("Y/m/d") ;

					

					$insertQuery = "INSERT INTO `job`(`companyId`, `title`, `location`, `category`, `subCategory`, `type`, `shift`, `vacancy`, `experience`,`salary`, `postedOn`, `lastDate`, `kind`, `tags`, `description`, `specification`, `techGuidance`) VALUES ('$jobCompany', '$jobTitle', '$jobLocation', '$jobCategory', '$jobSubCategory', '$jobType', '$jobShift', '$jobVacancy', '$jobExperience','$jobSalary', '$jobPostDate', '$jobLastDate', '$jobKind', '$jobTags', '$jobDesc', '$jobSpecs', '$jobTechGuide') " ;

				

			$insertResult = $conn->query($insertQuery) ;
			$lastId = $conn->insert_id;
			if($insertResult)  {  
				header('Location:single-job.php?jobId='.$lastId);
				}	
			else
				
				header('Location:post-job.php?companyId='.$jobCompany . '&error=Error in posting your job. Please try again.');

		}

?>