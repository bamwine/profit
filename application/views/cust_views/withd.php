 <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Transactions</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form action="<?=base_url('Customer/transaction')?>" class="form-horizontal form-bordered" method="post">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Account Holder Name</label>
                                                <div class="col-md-9">
												
                                                     <span class="help-block"> <p><?=$flnames;?></p></span>
													 <span class="help-block"> <p>Email:&nbsp;&nbsp;<?=$uemail;?></p> </span>
													<span class="help-block"> <p>Phone:&nbsp;&nbsp;<?=$uphone;?></p> </span> 													 
													 
													 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Address</label>
                                                <div class="col-md-9">
                                                    <span class="help-block"> <p><?=$uaddress;?></p></span>
													 <span class="help-block"> <p><?=$ucountry;?></p> </span>
													<span class="help-block"> <p><?=$ustate;?></p> </span> 
													<span class="help-block"> <p><?=$ucity;?></p> </span>
													<span class="help-block"> <p><?=$uzipcode;?></p> </span>
													</div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Account Number</label>
                                                <div class="col-md-9">
                                                    <span class="help-block"> <p><?=$uacc_no;?>&nbsp;&nbsp;<?=$utype;?></p></span> </div>
                                            </div>  
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Current Balance</label>
                                                <div class="col-md-9">
                                                    <span class="help-block"> <p><?=$ubalance;?></p></span> </div>
                                            </div>
											
											<div class="form-group">
                                                <label class="control-label col-md-3">Transaction History</label>
                                                <div class="col-md-9">
                                                    <a  class="form-control"></a> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Transaction Type</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="type">
													 <option value="">select Transaction Type</option>
                                                        <option value="credit">Credit</option>
                                                        <option value="debit">Debit</option>
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Amount</label>
                                                <div class="col-md-9">
                                                     <input type="text" name="amt" class="form-control" placeholder=""> </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Transfer Description</label>
                                                <div class="col-md-9">
                                                    <textarea type="text" name="desc" class="form-control"></textarea> </div>
                                            </div>
                                           
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Proceed Transction</button>
                                                            <button type="button" class="btn btn-default">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                   
                </div>
                <!--./row-->