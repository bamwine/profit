  <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?=base_url('assets/');?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url('assets/');?>bootstrap/dist/js/tether.min.js"></script>
    <script src="<?=base_url('assets/');?>bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/');?>plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?=base_url('assets/');?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?=base_url('assets/');?>js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url('assets/');?>js/waves.js"></script>
    <!--weather icon -->
    <script src="<?=base_url('assets/');?>plugins/bower_components/skycons/skycons.js"></script>
    <!--Morris JavaScript -->
    <script src="<?=base_url('assets/');?>plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="<?=base_url('assets/');?>plugins/bower_components/morrisjs/morris.js"></script>
    <!-- jQuery for carousel -->
    <script src="<?=base_url('assets/');?>plugins/bower_components/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?=base_url('assets/');?>plugins/bower_components/owl.carousel/owl.custom.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="<?=base_url('assets/');?>plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="<?=base_url('assets/');?>plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <!--Counter js -->
    <script src="<?=base_url('assets/');?>plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="<?=base_url('assets/');?>plugins/bower_components/counterup/jquery.counterup.min.js"></script>
	
	  <!-- Date Picker Plugin JavaScript -->
    <script src="<?=base_url('assets/');?>plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	
	  <script src="<?=base_url('assets/');?>plugins/bower_components/register-steps/jquery.easing.min.js"></script>
    <script src="<?=base_url('assets/');?>plugins/bower_components/register-steps/register-init.js"></script>
	
	 <!-- Sweet-Alert  -->
    <script src="<?=base_url('assets/');?>plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="<?=base_url('assets/');?>plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    <!-- Custom Theme JavaScript -->
	
	<!-- Magnific popup JavaScript -->
    <script src="<?=base_url('assets/');?>plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="<?=base_url('assets/');?>plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
	
	    <script src="<?=base_url('assets/');?>plugins/bower_components/toast-master/js/jquery.toast.js"></script>
    <script src="<?=base_url('assets/');?>js/toastr.js"></script>
	<script src="<?=base_url('assets/');?>plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
	
    <script type="text/javascript">
        //Alerts
        $(".myadmin-alert .closed").click(function (event) {
            $(this).parents(".myadmin-alert").fadeToggle(350);
            return false;
        });
        /* Click to close */
        $(".myadmin-alert-click").click(function (event) {
            $(this).fadeToggle(350);
            return false;
        });
        $(".showtop").click(function () {
            $(".alerttop").fadeToggle(350);
        });
        $(".showtop2").click(function () {
            $(".alerttop2").fadeToggle(350);
        });
     
		
		// Date Picker
        jQuery('.mydatepicker, #datepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true
            , todayHighlight: true
        });
		
		
		$('#apmout').change(function(){
		
var a=$('#apmout').val();
var r=($('#rate').val()/100);
//var d =(r * a);
//var t=(d+a);
var t=inter(a,r);
$('#apay').val(t);
});

$('#rate').change(function(){
	
var a=$('#apmout').val();
var r=($('#rate').val()/100);
//var d =(r * a);
//var t=(d+a);
var t=inter(a,r);

$('#apay').val(t);
});



function  inter(a,r){
	
	var d =(r * a);
var t=(d+a);
return t;	
}
		
    </script>
	
	
	 <script>
        $(document).ready(function () {
			
			 $('#myTable').DataTable();
	 });
	 
	 
	 </script>
	 
	 <script type="text/javascript">
$(document).ready(function () {
    //Disable full page
    $("body").on("contextmenu",function(e){
        return false;
    });
    
    //Disable part of page
    $("#id").on("contextmenu",function(e){
        return false;
    });
});
</script>
	
    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url('assets/');?>js/custom.min.js"></script>
    <script src="<?=base_url('assets/');?>js/widget.js"></script>
    <!--Style Switcher -->
    <script src="<?=base_url('assets/');?>plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>