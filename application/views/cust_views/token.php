  <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Transaction Authorization Code</h3>
							<h2>Transaction Authorization Code</h2>
<p>Funds transfer is a process of transfering funds from your account to other account in same Bank.<br/>Please make sure that you have enough funds available in your account to transfer. Also don't forgot to validate receiver's account number.</p>

<p>The token code has been sent to your email : <span style="color:#0066CC;font-weight:bold;"><?=$uemail; ?></span></p>
<p>You have <span id="defaultCountdown"></span> minutes remaining to insert valid OTP. System will automatically redirect to 'Fund Transfer' page to initiate fund transfer again.</p>
                            <form class="form-material form-horizontal"  action="<?=base_url('Customer/Transferfud')?>" method="post" >
                                <div class="form-group">
                                    <label class="col-md-12" for="example-text">Transaction Authorization Code</span>
                                    </label>
                                    <div class="col-md-12">
                                        <input type="text" name="token" id="example-text" name="example-text" class="form-control"> </div>
                                </div>
                                
                                
                                
                                <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Validate TAC</button>
                               
                            </form>
                        </div>
                    </div>
                </div>
                
				<script>
$(document).ready(function(){ 
	
    $('#defaultCountdown').countdown({
    	until: +60, 
        compact: true,
        onExpiry: timerdone,
        format: 'MS'
	});
})
</script>