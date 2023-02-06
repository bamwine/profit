 <script src="<?=base_url('assets/');?>js/signature.js"></script>
<div class="row">

<div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Approved Loans</h3>
                            <p class="text-muted">List of all Approved Money Request</p>
                            
								<?php if ($loanlistf) { ?>
							<div class="table-responsive">
                                <table class="table color-table success-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            
                                            <th>Refrence No#</th>
											<th>Amount</th>
											<th>Account No</th>
											<th>Approved Date</th>                                            
											<th>Status</th>
											<th>Description</th>
                                        </tr>
                                    </thead>
                              <?php
//var_dump($networks->result());

 $count=1;
    //var_dump($projects->result());
    foreach ($loanlistf->result() as $n) 
    {
      
?>
                                        <tr>
                                            <td><?=$count;?></td>
                                            
                                            <td><?=$n->tx_nol;?></td>
											<td><?=number_format($n->amountl, 2);?></td>
											<td> <a href="<?=base_url('Dashboard/user_errors/'.h_encrypt_decrypt($n->userIdl).'/udat');?>"><?=$n->to_accnol;?></a></td>
											<td><?=h_nice_date($n->date_apprv);?></td>                                            
											<td><a href="javascript:;"  onclick="$('#nurse_view_<?php echo $n->id; ?>').modal('show');"><?=$n->statusl;?></a></td>
											<td><?=$n->descriptionl;?></td>
                                        </tr>
										
				<div id="nurse_view_<?=$n->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
			  <br/><br/><br/><br/><br/><br/><br/><br/> <br/><br/><br/><br/><br/><br/><br/><br/>
                <div class="modal-content">
                  <div class="modal-header orange_header">
                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                    <h3 class="modal-title">Make Contract</h3>
                  </div>
                
				  <div class="modal-body">
                   
               <form class="form-horizontal" method="post" action="<?=base_url('Dashboard/contra/'.h_encrypt_decrypt($n->userIdl));?>">
              <div class="box-body">
                <div class="form-group">
                  <label >Account No</label>
                  
                   <input type="text" readonly="true" class="form-control" id="accn" name="accn" value="<?=$n->to_accnol; ?>" >
                  
                </div>
				
				<input type="hidden"  class="form-control" id="userid" name="userid" value="<?=$n->userIdl; ?>" >
				<input type="hidden"  class="form-control" id="lonid" name="lonid" value="<?=$n->id; ?>" >
                  
               <div class="form-group">
                  <label >Requested Amount</label>
                  
                   <input type="text" readonly="true" class="form-control" id="" name="rqmout" value="<?=$n->amountl; ?>" >
                  
                </div>
				
				
				<div class="form-group">
                  <label >Requested Date</label>
                  
                   <input type="text" readonly="true" class="form-control" id="rdate" name="rdate" value="<?=$n->date_apprv?>"  >
                  
                </div>
				
				<div class="form-group">
                  <label >Approved Amount</label>
                  
                   <input type="text"  class="form-control" id="apmout" name="apmout"  >
                  
                </div>
				
				<div class="form-group">
                  <label >Rate</label>
                  
                   <input type="text"  class="form-control" id="rate" name="rate"  >
                  
                </div>
				
				<div class="form-group">
                  <label >Amount Payeable</label>
                  
                   <input type="text" readonly="true"  class="form-control" id="apay" name="apay"  >
                  
                </div>
				
				<div class="form-group">
                  
                  
                   <input type="hidden"  class="form-control" id="" name="sign" value="<?=$n->signature; ?>" >
                  
                </div>
				
				<div id="canvas">
			
			<img id="saveSignature" alt="Saved image png" src="<?=base_url($n->signature)?>"/>
			
			
		</div>

		
				
				 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit" class="btn btn-info pull-right" name="upda_data">Contract</button>
              </div>
              <!-- /.box-footer -->
            </form>
                  
                  </div>
				  
                </div>
               
              </div>
            </div>
					

										
										
										
<?php $count+= 1;
    }

?>         
                                    </tbody>
                                </table>
                            </div>
							
							<?php  } else{ echo '<h1>You Have Not Approved Any Loans</h1>';} ?>
                        </div>
						
                    </div>
					
					
                    
</div>
               