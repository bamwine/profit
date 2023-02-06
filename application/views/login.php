 <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
	
	  <?php
        //if form errors
        $message = validation_errors() ?'<div class="alert alert-warning fade in">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <br> '.validation_errors().'</div>' : '';
        //get flash messages
        $message .= $this->session->flashdata('failed') ?'<div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> '.$this->session->flashdata('failed').'</div>' : '';

        $message .= $this->session->flashdata('success') ?'<div class="alert alert-success fade in">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>'.$this->session->flashdata('success').'</div>' : '';

        echo $message;
		


?>

	
     <section id="wrapper" class="login-register">
	 
        <div class="login-box">
		
<img src="<?=base_url('assets/');?>logs/logos.png" alt="Home"  width="100%"/>

            <div class="black-box bx-shadow2">
                <form class="form-horizontal form-material" id="loginform" action="<?=base_url('Login/processLogin');?>" method="post">
                    <h3 class="box-title m-b-20">Sign In</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="accno" required="" placeholder="# Account No"> </div>
                    </div>
                   
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="pass" required="" placeholder="Password"> </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Login</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p><a href="<?=base_url('Home');?>" class="text-primary m-l-5"><b>Home</b></a></p>
                        
						
						</div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- jQuery -->