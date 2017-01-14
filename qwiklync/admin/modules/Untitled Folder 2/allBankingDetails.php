<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">All Banking Details</h3></div>
            <div class="panel-body">
                <table Id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" wIdth="100%">
                    <thead>
                    <tr>
                        <th>Banking Details Id</th>
                        <th>IFSC Code</th>
                        <th>Bank Name</th>
						<th>Account Number</th>
						<th>Account Holder Name</th>
						<th>Branch</th>
						<th>Email Id</th>
						</tr>
                    </thead>
                    <tbody>
                    <?php
                        while($BankingDetailsData = mysqli_fetch_assoc($selectBankingDetailsResults)) {
                    ?>
                        <tr>
                            <td><?php echo $BankingDetailsData['bankingDetailsId']; ?></td>
							<td><?php echo $BankingDetailsData['ifscCode']; ?></td>
							<td><?php echo $BankingDetailsData['bankName']; ?></td>
							<td><?php echo $BankingDetailsData['accountNo']; ?></td>
							<td><?php echo $BankingDetailsData['accountHolderName']; ?></td>
							<td><?php echo $BankingDetailsData['branch']; ?></td>
							<td><?php echo $BankingDetailsData['email']; ?></td>
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