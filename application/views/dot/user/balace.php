
<script>

   
   
   $(document).ready(function(){
   
   
   function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
   
   });
   
</script>

<div class="row">
                    <div class="col-md-12"  id="example">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Account Details</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-body">

                                            <hr class="m-t-0 m-b-40">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">ACCOUNT HOLDER NAME:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?=$userdetails->fname."    ".$userdetails->lname;?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3"></label>
                                                        <div class="col-md-9">
                                                            <img src="<?=base_url($userdetails->pics);?>" alt="user-img" class="img-circle" height="200px">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">ACCOUNT NO:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?=$userdetails->acc_no?> </p>
                                                        </div>
                                                    </div>
                                                </div>
												
												<div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">BALANCE:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?=$userdetails->balance?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            

                                        </div>
                                        
                                    </form>
									
									
<div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">YOUR LAST TRANSACTION MADE</h3>
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
                             
                                        <tr>
                                            <td><?=$count=1;?></td>
                                            <td><?=h_nice_date($userbalinqure->lastdat);?></td>
                                            <td><?=$userbalinqure->tx_no;?></td>
                                            <td><?=$userbalinqure->description;?></td>
											<td><?=$userbalinqure->tx_type == "debit" ? "$&nbsp;" . number_format($userbalinqure->amount, 2) : "";?></td>
                                            <td><?=$userbalinqure->tx_type == "credit" ? "$&nbsp;" . number_format($userbalinqure->amount, 2) : "";?></td>
											<td><?=$userbalinqure->status;?></td>
                                        </tr>
										
							        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  
									
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="button" class="btn btn-success"  onclick="printDiv(#example);"> <i class="fa fa-check"></i> Print Document</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
				
                </div>
                <!-- /.row -->