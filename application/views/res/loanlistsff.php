<div class="row">

<div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Transfered Loans</h3>
                            <p class="text-muted">List of all Transfered Money Request</p>
							
							<?php if ($loanlistran){ ?>
                            <div class="table-responsive">
                                <table class="table color-table success-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                             <th>Account</th>
                                            <th>Amount Requested</th>
											<th>Date Requested</th>
											<th>Availed Amount</th>
											<th>Transfered Date</th>
											<th>Rate</th>
                                            <th>Total Payeable</th>
											<th>Balance Payeable</th>
											<th>Contract Details</th>
											<th>Status</th>
											
                                        </tr>
                                    </thead>
                              <?php
//var_dump($networks->result());

 $count=1;
    //var_dump($projects->result());
    foreach ($loanlistran->result() as $n) 
    {
      
?>
                                        <tr>
                                            <td><?=$count;?></td>
											
<td> <a href="<?=base_url('Dashboard/user_errors/'.h_encrypt_decrypt($n->userIdl).'/udat');?>"><?=$n->to_accnol;?></a></td>
																						
                                            <td><?=$n->ramount;?></td>
											<td><?=h_nice_date($n->rdate);?></td>
											<td><?=$n->availb_amt;?></td>
											<td><?=h_nice_date($n->date_apprv);?></td>
											<td><?=$n->rate;?></td>
                                            <td><?=$n->bal_pay;?></td>
											<td><?=$n->bal_to_pay;?></td>
											<!--td><a href="javascript:;"  onclick="$('#nurse_view_<?php echo $n->id; ?>').modal('show');">Details</a></td-->
											<td> <a target="blank" href="<?=base_url('Dashboard/user_errors3/'.h_encrypt_decrypt($n->id).'/contr');?>">Details</a></td>

											<td><a href="javascript:;"><?=$n->statusl;?></a></td>
											
                                        </tr>
										
				
										
										
										
<?php $count+= 1;
    }

?>         
                                    </tbody>
                                </table>
                            </div>
							
							<?php  } else{ echo '<h1>You Have No Transfered Loans</h1>';} ?>
							
                        </div>
						
                    </div>
					
					
                    
</div>
               