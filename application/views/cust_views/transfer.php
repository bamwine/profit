<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Funds Transfer</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form action="<?=base_url('Customer/Transfer')?>" class="form-horizontal" method="post">
                                        <div class="form-body">
                                            <h3 class="box-title">Information</h3>
                                            <hr class="m-t-0 m-b-40">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Receiver's Bank Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="rbname" class="form-control" placeholder="">  </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                               <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Receiver's Name</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="rname" class="form-control" placeholder="">  </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                           <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Receiver's Account Number</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="accno" class="form-control" placeholder="">  </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                               <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">SWIFT/ABA Routing Number</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="swift" class="form-control" placeholder="">  </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
											
											 <div class="row">
											 <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Sender's Account No</label>
                                                        <div class="col-md-9">
													<input type="text" name="saccno" readonly="true" class="form-control" value="<?=$userdetails->acc_no;?>">  </div>
                                                    </div>
                                                </div>
											 
											 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Amount to Transfer Shs</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="amt" class="form-control" placeholder="">  </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                               <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Fund Transfer Option</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control"  name="toption" tabindex="1">
                                                               <option value="">-- Please select your option --</option>
																<option value="DT">Domestic Transfer</option>
																<option value="LT">Local Transfer</option>
																<option value="IT">International Transfer</option>
															</select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
											
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Date of Transfer</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="dot" class="form-control mydatepicker"  placeholder="">  </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                               <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Transfer Description</label>
                                                        <div class="col-md-9">
                                                            <textarea type="text"  name="desc" class="form-control" placeholder=""></textarea>  </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn btn-success">Submit</button>
                                                            <button type="button" class="btn btn-default">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--./row-->