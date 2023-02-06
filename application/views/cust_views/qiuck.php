  <div id="wrapper" class="row">
        <div class="login-box">
            <div class="white-box">
                <form class="form-horizontal form-material" id="loginform" action="<?=base_url('Customer/Quickloan')?>" method="post">
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <div class="user-thumb text-center"> <img alt="thumbnail" class="img-circle" width="100" src="<?=base_url('assets/');?>quick.png">
                                <h3><?=$userdetails->fname?></h3> </div>
                        </div>
                    </div>
					
					 <input class="form-control" type="text" hidden="true" name="userid" value="<?=$userdetails->id?>"> 
					 <input class="form-control" type="text" hidden="true" name="acount_no" value="<?=$userdetails->acc_no?>">
					
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="amount" placeholder="Amount"> </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Make Request</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>