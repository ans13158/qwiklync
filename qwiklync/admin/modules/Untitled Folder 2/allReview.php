<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Restaurant</h3></div>
            <div class="panel-body">
                <table Id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" wIdth="100%">
                    <thead>
                    <tr>
                        <th>Review Id</th>
                        <th>Type of Review</th>
                        <th>Restaurant/Delivery Boy Id</th>
						<th>User Email Id</th>
						<th>Review</th>
						<th>Rating</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($selectReviewQueryData = mysqli_fetch_assoc($selectReviewQueryResults)) {
                    ?>
                        <tr>
                            <td><?php echo $selectReviewQueryData['reviewId']; ?></td>
                            <td><?php echo $selectReviewQueryData['reviewType']; ?></td>
                            <td><?php echo $selectReviewQueryData['restaurant/DeliveryBoyId']; ?></td>
							<td><?php echo $selectReviewQueryData['userEmail']; ?></td>
                            <td><?php echo $selectReviewQueryData['review']; ?></td>
                            <td><?php echo $selectReviewQueryData['rating']; ?></td>
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