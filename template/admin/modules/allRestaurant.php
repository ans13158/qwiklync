<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Restaurant</h3></div>
            <div class="panel-body">
                <table Id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" wIdth="100%">
                    <thead>
                    <tr>
                        <th>Restaurant Id</th>
                        <th>Restaurant Name</th>
                        <th>Type Of Cuisine</th>
						<th>Restaurant Photos</th>
						<th>Restaurant Logo</th>
						<th>About Restaurant</th>
						<th>Take Away</th>
						<th>Delivery</th>
						<th>Dine In</th>
						<th>Minimum Order</th>
						<th>Delivery Time</th>
						<th>Category</th>
						<th>Is it Popular</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($restaurantData = mysqli_fetch_assoc($restaurantResults)) {
                    ?>
                        <tr>
                            <td><?php echo $restaurantData['restaurantId']; ?></td>
                            <td><?php echo $restaurantData['restaurantName']; ?></td>
                            <td><?php echo $restaurantData['typeOfCuisine']; ?></td>
							<td>
								<?php 
									$photoPath=$restaurantData['photoPath'];
									$dir1=$photoPath."/";
									if(is_dir($dir1))
									{	
										
										if($handle1=opendir($dir1))
										{
											while(($file1=readdir($handle1)) != false)
											{
												if($file1==='.' || $file1==='..') continue;
												
												$photo1=$dir1.$file1;
								?>
												<!--Error Images are not displaying  -->
												<img src="<?php echo $photo1; ?>" width="100" height="100" alt="<?php echo $restaurantData['photoName']; ?>">;
											
								<?php			}
											closedir($handle1);
										}
									}
									else
									{
										echo'Photos is not present';
									}
								?>
							</td>
							
                            <td>
								<?php 
									$logoPath=$restaurantData['logoPath'];
									$dir2=$logoPath."/";
									if(is_dir($dir2))
									{	
										
										if($handle2=opendir($dir2))
										{
											while(($file2=readdir($handle2)) != false)
											{
												if($file2==='.' || $file2==='..') continue;
												
												$photo2=$dir2.$file2;
								?>
												<!--Error Images are not displaying  -->
												<img src="<?php echo $photo2; ?>" width="100" height="100" alt="<?php echo $restaurantData['logoName']; ?>">;
											
								<?php			}
											closedir($handle2);
										}
									}
									else
									{
										echo'Logo is not present';
									}
								?>
							</td>
							
							<td><?php echo $restaurantData['aboutRestaurant']; ?></td>
                            <td><?php echo $restaurantData['takeAway']; ?></td>
                            <td><?php echo $restaurantData['delivery']; ?></td>
							<td><?php echo $restaurantData['dineIn']; ?></td>
                            <td><?php echo $restaurantData['minimumOrder']; ?></td>
                            <td><?php echo $restaurantData['deliveryTime']; ?></td>
							<td><?php echo $restaurantData['category']; ?></td>
							<td><?php echo $restaurantData['popular']; ?></td>
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