<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Menu Details</h3></div>
            <div class="panel-body">
                <table Id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" wIdth="100%">
                    <thead>
                    <tr>
                        <th>Food Id</th>
                        <th>Restaurant Id</th>
                        <th>Food Details</th>
						<th>Food Name</th>
						<th>Food Descriptions</th>
						<th>Food Type</th>
						<th>Old Price</th>
						<th>New Price</th>
						<th>Category</th>
						</tr>
                    </thead>
                    <tbody>
                    <?php
                        while($menuDetailsData = mysqli_fetch_assoc($menuDetailsResults)) {
                    ?>
                        <tr>
                            <td><?php echo $menuDetailsData['foodId']; ?></td>
							<td><?php echo $menuDetailsData['restaurantId']; ?></td>
							<td><?php echo $menuDetailsData['foodDetails']; ?></td>
							<td><?php echo $menuDetailsData['foodName']; ?></td>
							<td><?php echo $menuDetailsData['foodDescription']; ?></td>
							<td><?php echo $menuDetailsData['type']; ?></td>
							<td><?php echo $menuDetailsData['oldPrice']; ?></td>
							<td><?php echo $menuDetailsData['newPrice']; ?></td>
							<td><?php echo $menuDetailsData['category']; ?></td>
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