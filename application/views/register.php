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
                <img src="<?=base_url('assets/');?>logs/logos.png" alt="Home"  width="100%"/>
                <!-- multistep form -->
            <form id="msform" class="form-horizontal form-material" action="<?=base_url('Register/createAccount')?>" method="post" enctype="multipart/form-data" >
                    <!-- progressbar -->
						
                    <ul id="eliteregister">
                        <li class="active">Personal Information</li>
                        <li>Address Information</li>
                        <li>Bank Account Information</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title"></h2>
                        <h3 class="fs-subtitle"></h3>
                        <input type="text" name="firstname"  placeholder="First Name" />
						 <input type="text" name="lastname"  placeholder="Last Name" />
                        <input type="password" name="password" placeholder="Password" />
                        <input type="password" name="cpassword" placeholder="Confirm Password" />
						
						  <input type="email" name="email"  placeholder="Email eg.user@domain.com" />
						 <input type="text" name="phone"  placeholder="Phone Number" />
                        <input type="text" name="dob" placeholder="Date of Birth" class="mydatepicker"/>
                        <input type="file" name="passport" id="passport"  placeholder="Profile Pics" title="PassPort Photo" data-toggle="tooltip" />
						 <input type="file" name="nin" placeholder="Profile Pics" title="National Id Photo" data-toggle="tooltip" />
						
							<select  name="gender" >
							<option value="">Select Gender</option>
								<option value="M">Male</option>
								<option value="F">Female</option>
							</select> 
						
                        <input type="button" name="next" class="next action-button" value="Next" /> </fieldset>
                    <fieldset>
                        <h2 class="fs-title"></h2>
                        <h3 class="fs-subtitle"></h3>
                       <textarea name="address" name="address"  cols="35" rows="2" >Address</textarea>                       
                        <input name="state" type="text" placeholder="Country" />
						 <input name="city" type="text" placeholder="City Name" />
						<input name="zipcode" type="text" placeholder="Zip Code" />
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        <input type="button" name="next" class="next action-button" value="Next" /> </fieldset>
                    <fieldset>
                        <h2 class="fs-title"></h2>
						 <h3 class="fs-subtitle"></h3>
                      <select  name="acctype" >
					<option value="">Please select Account Type</option>
					<option value="CA">Checking Account</option>
					<option value="SA">Saving Account</option>
					<option value="FDA">Fixed deposit Account</option>
					</select>
					
                        <input name="pin" type="text" placeholder="Account Pin" />
                        <input name="cpin" type="text" placeholder="Verify Pin Number" />
                        <input type="file" name="lc1d" placeholder="LC1 Document" title="LC1 Document" data-toggle="tooltip" />
                      <input type="text" name="currtbank" placeholder="Current Bank Account" />
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        <input type="submit" name="submit" class=" action-button" value="Register Acct!" /> </fieldset>
                </form>
                <div class="clear"></div>
				
            </div>
        </div>
		<!--div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Have an account? <a href="<?=base_url('Login');?>" class="text-primary m-l-5"><b>Log In</b></a>&nbsp;|<a href="<?=base_url('Home');?>" class="text-primary m-l-5"><b>Home</b></a></p>
                        </div>
        </div-->
    </section>
    
	