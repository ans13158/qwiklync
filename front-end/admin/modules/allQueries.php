<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Jobs</h3></div>
            <div class="panel-body">
                <table Id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" wIdth="100%">
                    <thead>
                     <tr> 
                        <th>Query Id</th>
                        <th>Sender's Name</th>
                        <th>Sender's Email Address</th>
                        <th>Sender's Phone No.</th>
                        <th>Subject of Message</th>
                        <th>Message</th>
                        
                        

                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($contactData = mysqli_fetch_assoc($contactResults)) {
                    ?>
                        <tr>
                            <td><?php echo $contactData['contactId']; ?></td>
                            <td><?php echo $contactData['name']; ?></td>
                            <td><?php echo $contactData['email']; ?></td>
                            <td><?php echo $contactData['phone']; ?></td>
                            <td><?php echo $contactData['subject']; ?></td>
                            <td><?php echo $contactData['message']; ?></td>
                            
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