<?php

if ($cont_details) 
{ $count=1;
    //var_dump($projects->result());
    foreach ($cont_details->result() as $cont_details) 
    {
      
?>
    

 <div class="row">
                    <div class="col-md-12">
                        <div class="white-box printableArea">
                            <h3><b>CONTRACT DETAILS</b> <span class="pull-right">#5669626</span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left"> <address>
                                            <h3> &nbsp;<b class="text-danger"></b></h3>
                                            <p class="text-muted m-l-5">
                                                </p>
								<img src="<?=$this->M_general_model->get_image_url($cont_details->pics);?>" alt="user-img" class="img-circle" height="200px">
                                                 
                                        </address> </div>
                                    <div class="pull-right text-right"> <address>
                                            <h3>Personal Infor</h3>
                                            <h4 class="font-bold"><?=$cont_details->fname;?>&nbsp;<?=$cont_details->lname;?></h4>
                                            <p class="text-muted m-l-30"><b>Email :</b> <?=$cont_details->email?>
											<br/> <b>Location :</b><?=$cont_details->country?> &nbsp;<?=$cont_details->address?></p>
                                            <br/> <b>Phone Number :</b><?=$cont_details->phone?>,
                                            <p class="m-t-30"><b>Date of birth :</b> <i class="fa fa-calendar"></i> <?=h_nice_date($cont_details->bdate)?></p>
                                            
                                        </address> </div>
										<div class="clearfix"></div>
										<div class="pull-left text-left"> <address>
                                            <h3>Loan Details</h3>
                                            <h4 class="font-bold"><?=$cont_details->fname;?>&nbsp;<?=$cont_details->lname;?>,</h4>
                                            <p class="text-muted m-l-30"><b>Account No :&nbsp;</b><?=$cont_details->to_accnol;?>,
                                                <br/> <b>Amount Requested :&nbsp;</b><?=$cont_details->ramount;?>,
                                                </p>
                                            <p class="m-t-30"><b>Date Requested :</b> <i class="fa fa-calendar"></i> <?=h_nice_date($cont_details->rdate);?></p>
                                            <p class="m-t-30"><b>Availed Amount :</b>  <?=$cont_details->availb_amt;?></p>
                                            
											<p><b>Transfered Date :</b> <i class="fa fa-calendar"></i> <?=h_nice_date($cont_details->date_apprv);?></p>
                                        </address> </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-right">Account</th>
                                                    <th class="text-right">Amount Requested</th>
                                                    <th class="text-right">Availed Amount</th>
													<th class="text-right">Rate</th>
                                                    <th class="text-right">Total Payeable</th>
                                                    <th class="text-right">Balance Remainig</th>
                                                    
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-right"><?=$cont_details->to_accnol;?></th>
                                                    <th class="text-right"><?=$cont_details->ramount;?></th>
                                                    <th class="text-right"><?=$cont_details->availb_amt;?></th>
													<th class="text-right"><?=$cont_details->rate;?></th>
                                                    <th class="text-right"><?=$cont_details->bal_pay;?></th>
                                                    <th class="text-right"><?=$cont_details->bal_to_pay;?></th>
                                                </tr>
                                                
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        
                                        <p>Rate (<?=$cont_details->rate;?>%) : <?=$cont_details->availb_amt;?> </p>
                                        <hr>
                                        <h3><b>Total :</b> shs<?=$cont_details->bal_pay;?></h3> </div>
										
										<div class="pull-left m-t-30 text-right">
                                        
                                        <p><b>Date Signed :</b> <?=h_nice_date($cont_details->date_apprv);?> </p>
                                        <hr>
                                        <h3><b>Signature :</b> <img src="<?=base_url($cont_details->signature);?>" alt="user-img" class="img-circle" height="100px"></h3> </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                       
                                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
		   
<?php $count+= 1;
    }
}
?> 
  
                