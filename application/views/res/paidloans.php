 <script src="<?=base_url('assets/');?>js/signature.js"></script>
<div class="row">

<div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Returned Loans</h3>
                            <p class="text-muted">Collected Moneys</p>
                            <div class="table-responsive">
                                <table class="table color-table success-table">
                                    <thead>
                                        <tr>
                                                                                       
                                            <th>No#</th>											
											<th>Loan Taken</th> 
											<th>Paid</th>
											<th>Balance</th>
											<th>Details</th>
											
                                        </tr>
                                    </thead>
                              <?php
//var_dump($networks->result());

if ($loanlistran) 
{ $count=1;
    //var_dump($projects->result());
    foreach ($loanlistran->result() as $n) 
    {
      
?>
                                        <tr>
                                            <td><?=$count;?></td>
                                            
                                            <td> <a href="<?=base_url('Dashboard/user_errors/'.h_encrypt_decrypt($n->userIdl).'/lad');?>"><?=$n->bal_pay;?></a></td>
											<td><?=$n->bal_pay-$n->bal_to_pay;?></td>
											<td><?=$n->bal_to_pay;?></td>
											 <td> <a href="<?=base_url('Dashboard/user_errors2/'.h_encrypt_decrypt($n->id).'/pdv');?>">view</a></td>
											
											
					</tr>
										
<?php $count+= 1;
    }
}
?>         
                                    </tbody>
                                </table>
                            </div>
                        </div>
						
                    </div>
					
					
                    
</div>
               