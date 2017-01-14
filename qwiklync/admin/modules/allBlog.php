<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Blog</h3></div>
            <div class="panel-body">
                <table Id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" wIdth="100%">
                    <thead>
                    <tr>
                        <th>Blog Id</th>
                        <th>Title</th>
                        <th>Category</th>
						<th>Photo</th>
						<th>Date</th>
						<th>Main Point</th>
						<th>Content</th> 
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($blogData = mysqli_fetch_assoc($selectBlogResult)) {
                    ?>
                        <tr>
                            <td><?php echo $blogData['blogId']; ?></td>
							<td><?php echo $blogData['title']; ?></td>
							<td><?php echo $blogData['category']; ?></td>
							<td>
		<?php
							$photoPath = $blogData['photoPath'];
							$photoName = $blogData['photoName'];
							$photo = $photoPath."/".$photoName;
		?>					
								<img src="<?php echo $photo; ?>" width="100" height="100" alt="Blog Photo">;
							</td>
							<td><?php echo $blogData['date']; ?></td>
							<td><?php echo $blogData['mainPoint']; ?></td>
							<td><?php echo $blogData['content']; ?></td>
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