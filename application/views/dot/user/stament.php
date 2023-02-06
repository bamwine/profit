<div class="row">

<div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Account Statement</h3>
                            <p class="text-muted">View list of all credit/ debit / fund transfer transaction summary by this user.</p>
                            <div class="table-responsive">
                                <table class="table color-table success-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Transaction Date</th>
                                            <th>Refrence No#</th>
                                            <th>Description</th>
											<th>Debit</th>
                                            <th>Credit</th>
											<th>Status</th>
                                        </tr>
                                    </thead>
                              <?php
//var_dump($networks->result());

if ($tranaction) 
{ $count=1;
    //var_dump($projects->result());
    foreach ($tranaction->result() as $n) 
    {
      
?>
                                        <tr>
                                            <td><?=$count;?></td>
                                            <td><?=h_nice_date($n->tdate);?></td>
                                            <td><?=$n->tx_no;?></td>
                                            <td><?=$n->description;?></td>
											<td><?=$n->tx_type == "debit" ? "$&nbsp;" . number_format($n->amount, 2) : "";?></td>
                                            <td><?=$n->tx_type == "credit" ? "$&nbsp;" . number_format($n->amount, 2) : "";?></td>
											<td><?=$n->status;?></td>
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
                                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Print Statment</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    </div>
					
					
                    
</div>
               