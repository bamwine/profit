 <script src="<?=base_url('assets/');?>js/signature.js"></script>
<div class="row">

<div class="col-md-12">
	<div class="white-box">
		<h3 class="box-title">Returned Loans</h3>
		<p class="text-muted">Collected Moneys</p>
	   
	   <div id="chartdiv2" style="width: 100%; height: 400px;"></div>
							
	   
	</div>
						
</div>


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
                                            
                                            <td> <a href="<?=base_url('Admins/user_errors/'.h_encrypt_decrypt($n->userIdl).'/lad');?>"><?=$n->bal_pay;?></a></td>
											<td><?=$n->bal_pay-$n->bal_to_pay;?></td>
											<td><?=$n->bal_to_pay;?></td>
											 <td> <a href="<?=base_url('Admins/user_errors2/'.h_encrypt_decrypt($n->id).'/pdv');?>">view</a></td>
											
											
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




<script>

	
			/////////////chart 2//////////////
			
			   var chart;
            var legend;

            var chartData2 = [<?php
                $notices = $this->crud_model->get_all_loans_trans3();
                foreach ($notices as $row):
                    ?>{
						
					 "country": 'collected',
                   
                    "value": <?php echo $row['collected']; ?>	
                
            },

		 <?php
endforeach
?>
<?php
foreach ($notices as $row):
                    ?>{
						
					 "country": 'Taken',
                   
                    "value": <?php echo $row['Taken']; ?>	
                
            },

		 <?php
endforeach
?>
               
            ];

            AmCharts.ready(function () {
                // PIE chart
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartData2;
                chart.titleField = "country";
                chart.valueField = "value";
                chart.outlineColor = "#FFFFFF";
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;
                chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
                // this makes the chart 3D
                chart.depth3D = 15;
                chart.angle = 30;

                // WRITE
                chart.write("chartdiv2");
            });
			
        </script>	 
               