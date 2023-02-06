<div class="row">

<div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">User Details List</h3>
                            <p class="text-muted">View account details, credit, debit funds from the acount or activate, de-activate them.</p>
                            
							  <?php if ($userlist) {?>
							<div class="table-responsive">
                                <table class="table color-table success-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>user Name</th>
                                            <th>Account No.</th>
                                            <th>Email / Phone</th>
											<th>Register Date</th>
                                            <th>User status</th>
											<!--th>Delete</th-->
                                        </tr>
										
                                    </thead>
									
		<?php
 $count=1;
    //var_dump($projects->result());
    foreach ($userlist->result() as $n) 
    {
      
?>							
                                   <tr>
                                           <th><?=$count;?></th>
                                            <th><a href="<?=base_url('Dashboard/user_errors/'.h_encrypt_decrypt($n->id).'/udat')?>"><?=$n->fname .' '.$n->lname;?></a></th>
                                            <th><?=$n->acc_no; ?></th>
                                            <th><a href="javascript:;"  onclick="$('#change_email_<?php echo $n->id; ?>').modal('show');"><?=$n->email; ?>&nbsp;/&nbsp;<?=$n->phone; ?></a></th>
											<th><?= h_nice_date($n->bdate); ?></th>
                                            <th><a href="javascript:;"  onclick="$('#nurse_view_<?php echo $n->id; ?>').modal('show');"><?=$n->is_active == 'FALSE'? 'Inactive' : 'Active'; ?></a></th>
											<!--th><a href="<?=base_url('Dashboard/delusers/'.h_encrypt_decrypt($n->id))?>">Delete</a></th-->
											
			<div id="nurse_view_<?=$n->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
			  <br/><br/><br/><br/>
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Change User Status</h3>
                  </div>
                 
				  <div class="modal-body">
                   
                   <form class="form-horizontal" method="post" action="<?=base_url('Dashboard/changeUserStatus');?>">
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
                     <option value="TRUE">Activate</option>
					 <option value="FALSE">Deactive</option>
					 
					
                  </select>
                </div>
				
				 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right" name="upda_data">Update</button>
              </div>
              <!-- /.box-footer -->
            </form>
                  
                  </div>
				  
                </div>
               
              </div>
            </div>
					

<div id="change_email_<?=$n->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
			  <br/><br/><br/><br/>
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Change User Email</h3>
                  </div>
                 
				  <div class="modal-body">
                   
                   <form class="form-horizontal" method="post" action="<?=base_url('Dashboard/changeUserEmail');?>">
              <div class="box-body">
                <div class="form-group">
                  <label >Old Email</label>
                  
                   <input type="text" readonly="true" class="form-control" id="accn" name="accn" value="<?=$n->email; ?>" >
                  
                </div>
				
				<input type="hidden"  class="form-control" id="userid" name="userid" value="<?=$n->id; ?>" >
                  
                <div class="form-group">
                  <label >New Email</label>
                  
                   <input type="email"  class="form-control" id="email" name="email" required >
                  
                </div>
				
				 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
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
    }//h_encrypt_decrypt

?>        
                                    </tbody>
                                </table>
                            </div>
							
								<?php }  else{ echo '<h1>There No Accounts Registered yet</h1>';}?>
                        </div>
						
                    </div>
					
					
                    
</div>
               