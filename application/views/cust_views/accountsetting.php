  <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Profile Information</h3>
                           <form class="form-horizontal" role="form">
                                        <div class="form-body">
                                           
                                            <hr class="m-t-0 m-b-40">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">First Name:</label>
                                                        <div class="col-md-9">
                                                        <input type="text" id="fname" name="fname" class="form-control" value="<?=$userdetails->fname?>"/>  
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Last Name:</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="lname" name="lname" class="form-control" value="<?=$userdetails->lname?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Gender:</label>
                                                        <div class="col-md-9">
                                                        <input type="text" id="gender" name="gender" class="form-control" value="<?=$userdetails->gender?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Date of Birth:</label>
                                                        <div class="col-md-9">
                                                          <input type="text" id="gender" name="gender" class="form-control mydatepicker" value="<?=$userdetails->bdate?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Phone Number:</label>
                                                        <div class="col-md-9">
                                                      <input type="text" id="phone" name="phone" class="form-control" value="<?=$userdetails->phone?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email:</label>
                                                        <div class="col-md-9">
                                            <input type="email" id="email" name="email" class="form-control" value="<?=$userdetails->email?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <h3 class="box-title">Address</h3>
                                            <hr class="m-t-0 m-b-40">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Address:</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control-static"> <?=$userdetails->address?> </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">City:</label>
                                                        <div class="col-md-9">
                                                           <input type="text" id="city" name="city" class="form-control" value="<?=$userdetails->city?> " />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">State:</label>
                                                        <div class="col-md-9">
                                                           <input type="text" id="state" name="state" class="form-control" value="<?=$userdetails->state?> "/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Post Code:</label>
                                                        <div class="col-md-9">
                                                       <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?=$userdetails->zipcode?> "/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Country:</label>
                                                        <div class="col-md-9">
                                                    <input type="text" id="country" name="country" class="form-control" value="<?=$userdetails->country?> " />
                                                        </div>
                                                    </div>
                                                </div>
												
												  <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Update</button>
  <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
												
                                                <!--/span-->
                                            </div>
                                        </div>
                                        
                                    </form>
                                
							
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title">Change Account Pin</h3>
                            <form class="form-material form-horizontal" method="post" action="<?=base_url('Customer/changepin')?>">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-email">User Name</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-email" name="example-email" readonly="true" class="form-control"  value="<?= $userdetails->fname."  ".$userdetails->lname;?>"  /> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-phone">Account Number</span>
                                    </label>
                                    <div class="col-md-12">
                      <input type="text" id="example-phone" name="example-phone" readonly="true" class="form-control" value="<?=$userdetails->acc_no?>" /> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="pwd">New Account Pin</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="password" id="pin" name="pin" class="form-control" placeholder=""> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="cpwd">Confirm Account Pin</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="password" id="cpin" name="cpin" class="form-control" placeholder=""> </div>
                                </div>
                                <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Change</button>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="white-box">
                            <h3 class="box-title">Change Password</h3>
                            <form class="form-material form-horizontal"  method="post" action="<?=base_url('Customer/changepwd')?>">
                                <div class="form-group">
                                    <label class="col-md-12" for="example-email">User Name</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" id="example-email" name="example-email" readonly="true" class="form-control"  value="<?= $userdetails->fname."  ".$userdetails->lname;?>"  /> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="example-phone">Account Number</span>
                                    </label>
                                    <div class="col-md-12">
                      <input type="text" id="example-phone" name="example-phone" readonly="true" class="form-control" value="<?=$userdetails->acc_no?>" /> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="pwd">New Password</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="password" id="pwd" name="pwd" class="form-control" placeholder=""> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12" for="cpwd">Confirm New Password</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="password" id="cpwd" name="cpwd" class="form-control" placeholder=""> </div>
                                </div>
                                <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Change</button>
                                <button type="submit" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>