<div class="row">

<div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title">Transfered Loans</h3>
                            <p class="text-muted">List of all Transfered Money Request</p>
							
							<div id="chartdiv" style="width: 100%; height: 400px;"></div>
							
                        </div>
						
</div>

<div class="col-md-6">
                        <div class="white-box">
                            <h3 class="box-title">Transfered Loans</h3>
                            <p class="text-muted">List of all Transfered Money Request</p>
							
							<div id="chartdiv2" style="width: 100%; height: 400px;"></div>
							
                        </div>
						
</div>

					
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
               
			   
			 
			 
			   
<script>
            var chart;

            var chartData = [<?php
                $notices = $this->crud_model->get_all_loans_trans();
                foreach ($notices as $row):
                    ?>{
						
					 "year": '<?php echo $row['months']; ?>',
                    "income": <?php echo $row['asked']; ?>,
                    "expenses": <?php echo $row['Taken']; ?>	
                
            },

		 <?php
endforeach
?>

			];

 AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = chartData;
                chart.categoryField = "year";
                chart.startDuration = 1;
                chart.plotAreaBorderColor = "#DADADA";
                chart.plotAreaBorderAlpha = 1;
                // this single line makes the chart a bar chart
               // chart.rotate = true;

                // AXES
                // Category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridPosition = "start";
                categoryAxis.gridAlpha = 0.1;
                categoryAxis.axisAlpha = 0;

                // Value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisAlpha = 0;
                valueAxis.gridAlpha = 0.1;
                valueAxis.position = "top";
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // first graph
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "column";
                graph1.title = "Requested";
                graph1.valueField = "income";
                graph1.balloonText = "Requested:[[value]]";
                graph1.lineAlpha = 0;
                graph1.fillColors = "#ADD981";
                graph1.fillAlphas = 1;
                chart.addGraph(graph1);

                // second graph
                var graph2 = new AmCharts.AmGraph();
                graph2.type = "column";
                graph2.title = "Taken";
                graph2.valueField = "expenses";
                graph2.balloonText = "Taken:[[value]]";
                graph2.lineAlpha = 0;
                graph2.fillColors = "#81acd9";
                graph2.fillAlphas = 1;
                chart.addGraph(graph2);

                // LEGEND
                var legend = new AmCharts.AmLegend();
                chart.addLegend(legend);

                chart.creditsPosition = "top-right";

                // WRITE
                chart.write("chartdiv");
				
				
            });
			
			
			
			/////////////chart 2//////////////
			
			   var chart;
            var legend;

            var chartData2 = [<?php
                $notices = $this->crud_model->get_all_loans_trans2();
                foreach ($notices as $row):
                    ?>{
						
					 "country": 'Requested',
                   
                    "value": <?php echo $row['asked']; ?>	
                
            },

		 <?php
endforeach
?>
<?php
foreach ($notices as $row):
                    ?>{
						
					 "country": 'Approved',
                   
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
  			   