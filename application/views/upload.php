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
	 
	 
	 
   <section id="wrapper" class="step-register">
        <div class="register-box">
            <div class="">
                <a href="javascript:void(0)" class="text-center db m-b-40"><img src="<?=base_url('assets/');?>logs/Onlinesmall.png" alt="Profit investiment LTD" />
                    <br/><img src="<?=base_url('assets/');?>logs/Onlinesmall.png" alt="Home" /></a>
                <!-- multistep form -->
           <?php echo $error;?>

<?php echo form_open_multipart('Register/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>
                <div class="clear"></div>
				
            </div>
        </div>
		<div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Have an account? <a href="<?=base_url('Login');?>" class="text-primary m-l-5"><b>Log In</b></a>&nbsp;|<a href="<?=base_url('Home');?>" class="text-primary m-l-5"><b>Home</b></a></p>
                        </div>
        </div>
    </section>
    
	