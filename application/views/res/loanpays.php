 <script src="<?=base_url('assets/');?>js/signature.js"></script>
<div class="row">

<div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Verfied Payment Accounts</h3>
                            <p class="text-muted">Search an account and pay</p>
							
							<?php if ($user_accts){ ?>
                            <div class="table-responsive">
                                <table class="table color-table success-table">
                                    <thead>
                                        <tr>
                                                                                       
                                            <th>No#</th>											
											<th>Account No</th>
											<th>Bank Name</th> 
											<th>Holders Name</th>											
											
                                        </tr>
                                    </thead>
                              <?php
 $count=1;
    //var_dump($projects->result());
    foreach ($user_accts->result() as $n) 
    {
      
?>
                                        <tr>
                                            <td><?=$count;?></td>
                                            
                                            <td> <a href="<?=base_url('Dashboard/user_errors/'.h_encrypt_decrypt($n->user_id).'/lad');?>"><?=$n->user_bak_acc;?></a></td>
											<td><?=$n->user_bak_na;?></td>                                            
											<td><?=$n->fname;?>&nbsp;&nbsp;&nbsp;<?=$n->lname;?></td>  
                                        </tr>
										
<?php $count+= 1;
    }

?>         
                                    </tbody>
                                </table>
                            </div>
							
							<?php  } else{ echo '<h1>You Have No Accounts To Verify</h1>';} ?>
                        </div>
						
                    </div>
					
					
                    
</div>
               