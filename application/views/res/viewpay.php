<div class="row">

<div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Transfered Loans</h3>
                            <p class="text-muted">List of all Transfered Money Request</p>
							<?php if ($loanpaids){ ?>
                            <div class="table-responsive">
                                <table class="table color-table success-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                             <th>Account paid On</th>
                                            <th>Means of Pay</th>
											<th>Amount paid</th>
											<th>Date paid</th>
											
											
                                        </tr>
                                    </thead>
                              <?php


 $count=1;
    //var_dump($projects->result());
    foreach ($loanpaids->result() as $n) 
    {
      
?>
                                        <tr>
                                            <td><?=$count;?></td>
											
											<td> <a href="<?=base_url('Dashboard/user_errors/'.h_encrypt_decrypt($n->user_id).'/udat');?>"><?=$n->pay_account;?></a></td>
											<td><?=$n->means_pay;?></td>
											<td><?=$n->amout_paid;?></td>
											<td><?=h_nice_date($n->date_pay);?></td>
											
											
                                            
                                        </tr>
										
				
									<?php $count+= 1;  } ?>
   	
										
										
        
                                    </tbody>
                                </table>
                            </div>
<?php 
} else{ echo '<h1>You Have No Loans</h1>';}
?> 		
							
                        </div>
						
                    </div>
					
					
                    
</div>
               