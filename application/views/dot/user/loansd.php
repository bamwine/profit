  <div class="row">
<div class="col-sm-12">
<div class="white-box">
	<h3 class="box-title">Loan Payement</h3>
   <form class="form-horizontal" action="<?=base_url('Dashboard/payloan/'.h_encrypt_decrypt($hasloan->userIdl))?>" method="post">
				<div class="form-body">
				   
					<hr class="m-t-0 m-b-40">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">User Account:</label>
								<div class="col-md-9">
								<input readonly="readonly" id="uaccn" name="uaccn" class="form-control" value="<?=$userdetails->acc_no?>"/>  
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Means Of Payment:</label>
								<div class="col-md-9">
							   <select class="form-control" name="paymean">
							 <option value="">select Transaction Type</option>
								<option value="cash">Cash</option>
								<option value="account">Account</option>
							   
							</select>
								
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Account No Paying:</label>
								<div class="col-md-9">
								<input type="text" id="paying_acc" name="paying_acc" class="form-control"  />
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Date of payment:</label>
								<div class="col-md-9">
								  <input type="text" id="dop" name="dop" class="form-control mydatepicker"  />
								</div>
							</div>
						</div>
						<!--/span-->
					</div>
					<!--/row-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Amount paid:</label>
								<div class="col-md-9">
								<input type="text" id="pay_amt" name="pay_amt" class="form-control" />
								</div>
							</div>
						</div>
						<!--/span-->
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-3">Loan Balance:</label>
								<div class="col-md-9">
								<input readonly="readonly" id="loan_amt" name="loan_amt" class="form-control" value="<?=$hasloan->bal_to_pay?>" />
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
								
								<div class="col-md-9">
								<input hidden="hidden" id="userids" name="userids" class="form-control" value="<?=$hasloan->userIdl?>"/>  
								</div>
							</div>
							
							<div class="form-group">
								
								<div class="col-md-9">
								<input hidden="hidden" id="loanid" name="loanid" class="form-control" value="<?=$hasloan->id?>"/>  
								</div>
							</div>
						
					</div>
				   
						  <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Submit</button>
						
						<!--/span-->
					</div>
				</div>
				
			</form>
		
	
</div>
                    </div>
                </div>
				
			