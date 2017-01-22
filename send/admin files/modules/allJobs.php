<div class="row">
    <div class="col-md-12">
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
                        while($jobData = mysqli_fetch_assoc($jobResults)) {
                    ?>
                        <tr>
                            <td><?php echo $jobData['jobId']; ?></td>
                            <td><?php echo $jobData['title']; ?></td>
                            <td><?php echo $jobData['location']; ?></td><td><?php echo $jobData['category']; ?></td>
                            <td><?php echo $jobData['subCategory']; ?></td>
                            <td><?php echo $jobData['type']; ?></td>
                            <td><?php echo $jobData['vacancy']; ?></td>
                            <td><?php echo $jobData['experience']; ?></td>
                            <td><?php echo $jobData['salary']; ?></td>
                            <td><?php echo $jobData['postedOn']; ?></td>
                            <td><?php echo $jobData['lastDate']; ?></td>
                            <td><?php echo $jobData['kind']; ?></td>
                            <td><?php echo $jobData['tags']; ?></td>

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