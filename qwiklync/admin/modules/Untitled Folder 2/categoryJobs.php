<?php 
   
if(isset($_GET['jobCat'] ) )   {
 $jobCategory = $_GET['jobCat'];
 $selectQuery = "SELECT * FROM `job` WHERE `category` LIKE '$jobCategory'" ;
 $selectJobQueryResults = $conn->query($selectQuery) ;
 if(mysqli_num_rows($selectJobQueryResults) == 0)  {
    $error = "Please Enter Valid Cateogory" ;
 }

 else  {
    $sucess = "";
 }


 }  



?>


<div class="row">
    <div class="col-md-12">

    <div class="select-category">
        <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Enter Job Category</h3></div>
                                        <div class="panel-body">
                                            <form class="form-horizontal" role="form" method="get" action="<?php echo $current_file; ?>">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Job Category</label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="jobCat" class="form-control" placeholder="Computer & IT">
                                                    </div>
                                                </div>
                                                <?php
                                            if(!$sucess == "")
                                            {
                                                echo "<span <b style=\"color:green\">".$sucess."</b></span>";
                                            } else if(!$error == "")
                                            {
                                                echo "<span <b style=\"color:red\">".$error."</b></span>";
                                            }
                                            else
                                            {
                                                echo "<span class=\"alert-info\"> Search Job Details Below</span>"; }
                                            ?>
                                            <button type="submit" style="float: right;" class="btn btn-info waves-effect waves-light m-l-10" >Search Job</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Jobs</h3></div>
            <div class="panel-body">
                <table Id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" wIdth="100%">
                    <thead>
                    <tr>
                        <th>Job Id</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Job Category</th>
                        <th>Sub-category</th>
						<th>Type</th>
                        <th>Vacancy</th>
                        <th>Experience</th>    
                        <th>Salary</th>
                        <th>Posted On</th>
                        <th>Last Date</th>
                        <th>Kind</th>
                        <th>Tags</th>
                        

                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($selectJobQueryData = mysqli_fetch_assoc($selectJobQueryResults)) {
                    ?>
                        <tr>
                            <td><?php echo $selectJobQueryData['jobId']; ?></td>
                            <td><?php echo $selectJobQueryData['title']; ?></td>
                            <td><?php echo $selectJobQueryData['location']; ?></td>
							<td><?php echo $selectJobQueryData['category']; ?></td>
                            <td><?php echo $selectJobQueryData['subCategory']; ?></td>
                            <td><?php echo $selectJobQueryData['type']
                             ?></td>
                             <td><?php echo $selectJobQueryData['vacancy']
                             ?></td>
                             <td><?php echo $selectJobQueryData['experience']
                             ?></td>
                            <td><?php echo $selectJobQueryData['salary']
                             ?></td>
                             <td><?php echo $selectJobQueryData['postedOn']
                             ?></td>
                             <td><?php echo $selectJobQueryData['lastDate']
                             ?></td>
                             <td><?php echo $selectJobQueryData['kind']
                             ?></td> 
                             <td><?php echo $selectJobQueryData['tags']
                             ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>