<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Delivery Boy</h3></div>
            <div class="panel-body">
                <table Id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" wIdth="100%">
                    <thead>
                    <tr>
                        <th>Delivery Boy Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
						<th>Profile Photo</th>
						<th>Driving License</th>
						<th>Date Of Birth</th>
						<th>Email</th>
						<th>Password</th>     
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($deliveryBoyData = mysqli_fetch_assoc($selectDeliveryBoyResults)) {
                    ?>
                        <tr>
                            <td><?php echo $deliveryBoyData['deliveryBoyId']; ?></td>
							<td><?php echo $deliveryBoyData['firstName']; ?></td>
							<td><?php echo $deliveryBoyData['lastName']; ?></td>
							<td>
								<?php 
									$profilePath=$deliveryBoyData['profilePhotoPath'];
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
												<img src="<?php echo $photo; ?>" width="100" height="100" alt="<?php echo $deliveryBoyData['profilePhotoName']; ?>">;
											
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
							<td><?php echo $deliveryBoyData['drivingLicense']; ?></td>
							<td><?php echo $deliveryBoyData['dateOfBirth']; ?></td>
							<td><?php echo $deliveryBoyData['email']; ?></td>
							<td><?php echo $deliveryBoyData['password']; ?></td>
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