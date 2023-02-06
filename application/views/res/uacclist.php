<div class="row">

<div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Accounts  List</h3>
                            <p class="text-muted">View account details, credit, debit funds from the acount or activate, de-activate them.</p>
                            <?php if ($accounlist) {?>
							
							<div class="table-responsive">
                                <table class="table color-table success-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>user Name</th>
                                            <th>Account No.</th>
                                            <th>Balance</th>
											<th>Account Type</th>
                                            <th>Account status</th>
											<th>Statement</th>
                                        </tr>
                                    </thead>
<?php  $count=1;
    //var_dump($projects->result());
    foreach ($accounlist->result() as $n) 
    {
    $atype = "";
	if($n->type == "CA"){$atype = "Checking Account";}
	else if($n->type == "SA") {$atype = "Saving Account";}
	else if($n->type == "FDA") {$atype = "Fixed deposit Account";}  
?>							
     									
                                   <tr>
                                            <th><?=$count;?></th>
                                            <th><?=$n->fname .' '.$n->lname;?></th>
                                            <th><a href="<?=base_url('Dashboard/user_errors/'.h_encrypt_decrypt($n->user_id).'/udat');?>"><?=$n->acc_no; ?></a></th>
                                            <th><?=$n->balance; ?></th>
											<th><?=$atype ?></th>
											
					<div id="nurse_view_<?=$n->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<br/><br/><br/><br/>
					<div class="modal-content">
					<div class="modal-header orange_header">
					<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
					<h3 class="modal-title">Change User Status</h3>
					</div>

					<div class="modal-body">

					<form class="form-horizontal" method="post" action="<?=base_url('Dashboard/changeAccStatus');?>">
					<div class="box-body">
					<div class="form-group">
					<label >Account No</label>

					<input type="text" readonly="true" class="form-control" id="accn" name="accn" value="<?=$n->acc_no; ?>" >

					</div>

					<input type="hidden"  class="form-control" id="userid" name="userid" value="<?=$n->id; ?>" >

					<div class="form-group">
					<label>Status</label>
					<select class="form-control" name="sta_type">

					<option value="">select</option>
					<option value="ACTIVE">ACTIVATE</option>
					<option value="INACTIVE">DEACTIVATE</option>


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
											
                                            <th><a href="javascript:;"  onclick="$('#nurse_view_<?php echo $n->id; ?>').modal('show');"><?=$n->status == 'INACTIVE'? 'Inactive' : 'Active'; ?></a></th>
											<th> <a href="<?=base_url('Dashboard/user_errors/'.h_encrypt_decrypt($n->user_id).'/stm');?>">Statement</a></th>
                                    </tr>
										
<?php $count+= 1;
    }

?> 										
        
                                    </tbody>
                                </table>
                            </div>
							
							<?php }  else{ echo '<h1>There No Accounts Registered yet</h1>';}?>

							
                        </div>
						
                    </div>
					
					
                    
</div>
               