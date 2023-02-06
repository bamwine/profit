<div class="row">

					
<div class="col-md-12">
<div class="white-box">
	<h3 class="box-title">Satics Chart</h3>
	<p class="text-muted">List of all Pending Money Request</p>
	
						
	<div id="chartdiv" style="width: 100%; height: 400px;"></div>
</div>
						
</div>					
                    


<div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">In Comming Loans Requests</h3>
                            <p class="text-muted">List of all Pending Money Request</p>
							<?php if ($loanlistp) { ?>
												
                            <div class="table-responsive">
                                <table class="table color-table success-table table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>                                            
                                            <th>Refrence No#</th>
											<th>Amount</th>
											<th>Account No</th>
											<th>Request Date</th>                                            
											<th>Status</th>
											<th>Description</th>
                                        </tr>
                                    </thead>
                              <?php
//var_dump($networks->result());

 $count=1;
    //var_dump($projects->result());
    foreach ($loanlistp->result() as $n) 
    {
      
?>
                                        <tr>
                                            <td><?=$count;?></td>
                                            
                                            <td><?=$n->tx_nol;?></td>
											<td><?=number_format($n->amountl, 2);?></td>
											<td> <a href="<?=base_url('Admins/user_errors/'.h_encrypt_decrypt($n->userIdl).'/udat');?>"><?=$n->to_accnol;?></a></td>
											
											<div id="nurse_view_<?=$n->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<br/><br/><br/><br/>
					<div class="modal-content">
					<div class="modal-header orange_header">
					<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
					<h3 class="modal-title">Change  Status</h3>
					</div>

					<div class="modal-body">

					<form class="form-horizontal" method="post" action="<?=base_url('Admins/changeLoanStatus');?>">
					<div class="box-body">
					<div class="form-group">
					<label >Account No</label>

					<input type="text" readonly="true" class="form-control" id="accn" name="accn" value="<?=$n->to_accnol; ?>" >

					</div>

					<input type="hidden"  class="form-control" id="userid" name="userid" value="<?=$n->userIdl; ?>" >
					<input type="hidden"  class="form-control" id="lonid" name="lonid" value="<?=$n->id; ?>" >
					<input type="hidden"  class="form-control" id="amount" name="amount" value="<?=$n->amountl; ?>" >

					<div class="form-group">
					<label>Status</label>
					<select class="form-control" name="sta_type">

					<option value="">select</option>
					<option value="PENDING">PENDING</option>
					<option value="APPROVED">APPROVED</option>


					</select>
					</div>


					</div>
					<!-- /.box-body -->
					<div class="box-footer">
					<!--button type="reset" class="btn btn-default">Cancel</button-->
					<button type="submit" class="btn btn-info pull-right" name="upda_data">Change</button>
					</div>
					<!-- /.box-footer -->
					</form>

					</div>

					</div>

					</div>
					</div>
							
											
											<td><?=h_nice_date($n->tdatel);?></td>                                            
											<td> <a href="javascript:;"  onclick="$('#nurse_view_<?php echo $n->id; ?>').modal('show');"><?=$n->statusl;?></a></td>
											<td><?=$n->descriptionl;?></td>
                                        </tr>
										
										
<?php $count+= 1;
    }

?>         
                                    </tbody>
                                </table>
                            </div>
							
							<?php  } else{ echo '<h1>You Have No Loans Requests</h1>';} ?>
                        </div>
						
</div>

					
</div>
               
			   
<script>
            var chart;

            var chartData = [<?php
                $notices = $this->crud_model->get_all_loanspend();
                foreach ($notices as $row):
                    ?>{
                "country": "<?php echo $row['names']; ?>",
                "visits": <?php echo $row['amt']; ?>,
                "color": "#FF0F00"
            },

		 <?php
endforeach
?>
			];


            var chart = AmCharts.makeChart("chartdiv", {
                type: "serial",
                dataProvider: chartData,
                categoryField: "country",
                depth3D: 20,
                angle: 30,

                categoryAxis: {
                    labelRotation: 90,
                    gridPosition: "start"
                },

                valueAxes: [{
                    title: "Amount Requested"
                }],

                graphs: [{

                    valueField: "visits",
                    colorField: "color",
                    type: "column",
                    lineAlpha: 0,
                    fillAlphas: 1
                }],

                chartCursor: {
                    cursorAlpha: 0,
                    zoomable: false,
                    categoryBalloonEnabled: false
                },
                "export": {
                    "enabled": true
                }

            });
        </script>	 
  			   