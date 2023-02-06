<div class="row">

<div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Bank Accounts</h3>
                            <p class="text-muted"> these are Your Account</p>
							
                            <div class="table-responsive">
                                <table class="table color-table success-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Account Number</th>
                                            <th>Bank Name</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                              <?php
//var_dump($networks->result());

if ($user_bank) 
{ $count=1;
    //var_dump($projects->result());
    foreach ($user_bank->result() as $n) 
    {
      
?>
                                        <tr>
                                            <td><?=$count;?></td>
                                            <td><?=$n->user_bak_acc;?></td>
                                            <td><?=$n->user_bak_na;?></td>
                                           <td><a href="javascript:;"  onclick="$('#nurse_view_<?php echo $n->id; ?>').modal('show');"><?=$n->user_bak_stut	;?></a></td>
											
											
											<div id="nurse_view_<?=$n->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<br/><br/><br/><br/>
					<div class="modal-content">
					<div class="modal-header orange_header">
					<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
					<h3 class="modal-title">Change Account Status</h3>
					</div>

					<div class="modal-body">

					<form class="form-horizontal" method="post" action="<?=base_url('Dashboard/changeUserBankStatus');?>">
					<div class="box-body">
					<div class="form-group">
					<label >Account No</label>

					<input type="text" readonly="true" class="form-control" id="accn" name="accn" value="<?=$n->user_acct; ?>" >

					</div>

					<input type="hidden"  class="form-control" id="userid" name="userid" value="<?=$n->id; ?>" >

					<div class="form-group">
					<label>Status</label>
					<select class="form-control" name="sta_type">

					<option value="">select</option>
					<option value="Verfied">Verfied</option>
					<option value="Not Verfied">Not Verfied</option>


					</select>
					</div>


					</div>
					<!-- /.box-body -->
					<div class="box-footer">
					
					<button type="submit" class="btn btn-info pull-right" name="upda_data">Change</button>
					</div>
					<!-- /.box-footer -->
					</form>

					</div>

					</div>

					</div>
					</div>
											
                                        </tr>
										
										
							
											
                   									
										
										
<?php $count+= 1;
    }
}
?>         
                                    </tbody>
                                </table>
                            </div>
                        </div>
									<div class="form-actions">
									        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                     <a href="javascript:;"  onclick="$('#nurse_view').modal('show');" class="btn btn-success"> <i class="fa fa-check"></i> More</a>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
                                        </div>
                    </div>
					
					
                    
</div>
      

<div id="nurse_view" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<br/><br/><br/><br/>
					<div class="modal-content">
					<div class="modal-header orange_header">
					<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
					<h3 class="modal-title">Add Account</h3>
					</div>

					<div class="modal-body">

					<form class="form-horizontal" method="post" action="<?=base_url('Dashboard/addUserBanks/'.h_encrypt_decrypt($userdetails->id));?>">
					<div class="box-body">
					<div class="form-group">
					<label >Pro-Fit Account No</label>

					<input type="text" readonly="true" class="form-control" id="accn" name="accn" value="<?=$userdetails->acc_no?>" >

					</div>

					<input type="hidden"  class="form-control" id="userid" name="userid" value="<?=$userdetails->id?>" >

					<div class="form-group">
					<label >Bank Name</label>

					<input type="text"  class="form-control" id="accn" name="bank_nam"  >

					</div>

					
					<div class="form-group">
					<label >Bank Account No</label>

					<input type="text"  class="form-control" id="accn" name="bank_acct"  >

					</div>

					</div>
					<!-- /.box-body -->
					<div class="box-footer">
					
					<button type="submit" class="btn btn-info pull-right" name="upda_data">Add</button>
					</div>
					<!-- /.box-footer -->
					</form>

					</div>

					</div>

					</div>
					</div>
						  