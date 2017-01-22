<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Job-seekers</h3></div>
            <div class="panel-body">
                <table Id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" wIdth="100%">
                    <thead>
                     <tr> 
                        <th>Resume Id</th>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>College</th>
                        <th>Company Working At</th>
                        <th>Current Post</th>
                        <th>Number Of Companies Worked At</th>    
                        <th>Company Worked At</th>
                        <th>Posts Held</th>
                        <th>Worked From</th>    
                        <th>Worked Till</th>
                        <th>Degree</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>About Job-seeker</th>
                        <th>Facebook</th>
                        <th>LinkedIn</th>
                        <th>Twitter</th>

                        

                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($  = mysqli_fetch_assoc($seekerResults)) {
                                $resumeId = $seekerData['resumeId'];
                                  
                    ?>

                        <tr>
                            <td><?php echo $seekerData['resumeId']; ?></td>
                            <td><?php echo $seekerData['userId']; ?></td>
                            <td><?php echo $seekerData['name']; ?></td>
                            <td><img src="<?php echo $seekerData['photoPath'].'/'.$seekerData['photoName']; ?></td><td><?php echo $seekerData['college']; ?> " style="height: 50px;width: 50px;"></td>
                           <span> <td><?php echo $seekerData['college']; ?></td></span>
                            <span><td><?php echo $seekerData['company']; ?></td></span>

                            <td><?php echo $seekerData['post']; ?></td>
                            <td><?php echo $seekerData['numberOfCompany']; ?></td>
                            <td><?php echo $seekerData['degree']; ?></td>
                            <td><?php echo $seekerData['email']; ?></td>
                            <td><?php echo $seekerData['phone']; ?></td>
                            <td><?php echo $seekerData['address']; ?></td>
                            <td><?php echo $seekerData['aboutMe']; ?></td>
                            <td><?php echo $seekerData['facebook']; ?></td>
                            <td><?php echo $seekerData['linkedIn']; ?></td>
                            <td><?php echo $seekerData['twitter']; ?></td>

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