 <div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Users</h3></div>
            <div class="panel-body">
                <table Id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" wIdth="100%">
                    <thead>
                    <tr>
                        <th>User Id</th>
                        <th>Email</th>
                        <th>Password</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Phone Number</th>
						<th>Profile Photo </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($userData = mysqli_fetch_assoc($selectUsersResults)) {
                    ?>
                        <tr>
                            <td><?php echo $userData['userId']; ?></td>
							<td><?php echo $userData['email']; ?></td>
							<td><?php echo $userData['password']; ?></td>
							<td><?php echo $userData['firstName']; ?></td>
							<td><?php echo $userData['lastName']; ?></td>
							<td><?php echo $userData['phone']; ?></td>
							<td>
								<?php 
									$profilePath=$userData['profilePhotoPath'];
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
												<img src="<?php echo $photo; ?>" width="100" height="100" alt="<?php echo $userData['profilePhotoName']; ?>">;
											
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