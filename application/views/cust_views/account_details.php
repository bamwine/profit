
           

<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Account Details</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-body">
                                            <h3 class="box-title">Person Info</h3>
                                            <hr class="m-t-0 m-b-40">
											
											 <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">&nbsp;&nbsp;</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static">  </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3"></label>
                                                        <div class="col-md-9">
                                                             <img src="<?= $this->M_general_model->get_image_url($userdetails->pics);?>" alt="user-img" class="img-circle" height="200px">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
											
											
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">First Name:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?=$userdetails->fname;?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Last Name:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"><?=$userdetails->lname?> </p>
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
                                                            <p class="form-control-static"> <?=$userdetails->gender?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Date of Birth:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?=h_nice_date($userdetails->bdate)?></p>
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
                                                            <p class="form-control-static"> <?=$userdetails->phone?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?=$userdetails->email?></p>
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
                                                            <p class="form-control-static"> <?=$userdetails->address?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">City:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?=$userdetails->city?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">State:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?=$userdetails->state?> </p>
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
                                                            <p class="form-control-static"> <?=$userdetails->zipcode?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Country:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> <?=$userdetails->country?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--./row-->
		   

               