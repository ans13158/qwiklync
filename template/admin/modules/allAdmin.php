<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Admins Details</h3></div>
            <div class="panel-body">
                <table Id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" wIdth="100%">
                    <thead>
                    <tr>
                        <th>Admin Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
						<th>User Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Password</th>
						<th>Profile Photo </th>
						<th>role</th>
						<th>Id Card Type</th>
						<th>Id Card Number</th>
						<th>Date Of Birth</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($adminData = mysqli_fetch_assoc($adminResults)) {
                    ?>
                        <tr>
                            <td><?php echo $adminData['adminId']; ?></td>
							<td><?php echo $adminData['firstName']; ?></td>
							<td><?php echo $adminData['lastName']; ?></td>
							<td><?php echo $adminData['userName']; ?></td>
							<td><?php echo $adminData['email']; ?></td>
							<td><?php echo $adminData['phone']; ?></td>
							<td><?php echo $adminData['password']; ?></td>
							<td>
								<?php 
									$profilePath=$adminData['profilePhotoPath'];
									$dir=$profilePath."/";
									if(is_dir($dir))
									{	
										
										if($handle=opendir($dir))
										{
											while(($file=readdir($handle)) != false)
											{
												if($file==='.' || $file==='..') continue;
												
												$photo=$dir.$file;
								?>
												<!--Error Images are not displaying  -->
												<img src="<?php echo $photo; ?>" width="100" height="100" alt="<?php echo $adminData['profilePhotoName']; ?>">;
											
								<?php			}
											closedir($handle);
										}
									}
									else
									{
										echo'Photo is not present';
									}
								?>
							
							</td>
							<td><?php echo $adminData['role']; ?></td>
							<td><?php echo $adminData['idCardType']; ?></td>
							<td><?php echo $adminData['idCard']; ?></td>
							<td><?php echo $adminData['dOB']; ?></td>
							
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