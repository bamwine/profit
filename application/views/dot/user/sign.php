
 
   <!--link href="<?=base_url('assets/');?>css/signature-pad.css" rel="stylesheet"-->
<form action="<?=base_url('Dashboard/update_sign/'.h_encrypt_decrypt($userdetails->id))?>" method="post" enctype="multipart/form-data">
   <div class="pull-right m-t-30 text-left zoom-gallery">

 
<a href="<?=base_url($userdetails->signature);?>" title="Your  Signature that will be used">
<img src="<?=base_url($userdetails->signature);?>" width="300px" />
<!--img  id="saveSignature" width="300px" /-->

</a>

<a href="<?=base_url($userdetails->pics);?>" title="Your  photo">
<img src="<?=base_url($userdetails->pics);?>" width="300px" />

</a>

</div>

  <div id="signature-pad" class="signature-pad text-left ">
    <div class="signature-pad--body ">
      <canvas id="newSignature"></canvas>
    </div>

	
    <div class="signature-pad--footer ">
     
		 <div class="clearfix row"><br/><br/></div>
     
      <div class="row">
			<div class="col-md-6">
			<div class="row">
			<div class="col-md-offset-3 col-md-9">
		<button type="button" class="btn btn-danger" data-action="clear">Clear</button>
          <button type="button" class="btn btn-success" data-action="change-color">Change color</button>
          <button type="button" class="btn btn-danger" data-action="undo">Undo</button>
			</div>
			</div>
			</div>
			
		</div>
		
		 <div class="clearfix row"><br/><br/></div>
       
		
		<div class="row">
			<div class="col-md-6">
			<div class="row">
			<div class="col-md-offset-3 col-md-9">
			<button type="button" class="btn btn-success " data-action="save-png">Save as PNG</button>
          <button type="button" class="btn btn-danger " data-action="save-jpg">Save as JPG</button>
          <button type="button" class="btn btn-success " data-action="save-svg">Save as SVG</button>
			</div>
			</div>
			</div>
			
		</div>
      
	  

			</div>
			
				
			</div>	
			 <div class="clearfix row"><br/><br/></div>
			
			<div class="row">
			<div class="col-md-6">
			<div class="row">
			<div class="col-md-offset-3 col-md-9">
			<input type="file" name="sign" id="sign"  placeholder="Profile Pics" title="Signature" class=" btn-success data-toggle="tooltip" />
						
			<button type="submit" class="btn btn-success " >Save </button>
			
          
			</div>
			</div>
			</div>
			
		</div>
			
</form>

 
  <script src="<?=base_url('assets/');?>js/signature_pad.js"></script>
<script src="<?=base_url('assets/');?>js/app.js"></script>
