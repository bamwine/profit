 <?php
        //if form errors
        $message = validation_errors() ?'<div class="alert alert-warning fade in">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <br> '.validation_errors().'</div>' : '';
			echo $message;

?> 
 
 <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> 
                <ul class="nav navbar-top-links navbar-right pull-right">
                  
                    <!-- /.dropdown -->
                    
                     <li > <a class="dropdown-toggle waves-effect waves-light"  href="<?=base_url('Home/logout2');?>""><span class="hidden-xs">Logut</span> <i class="icon-logout fa-fw"></i></a>
                   
                </ul>
            </div>
            
        </nav>
        <!-- End Top Navigation -->
 
 
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

 
   <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"> </h4> </div>
                    
                </div>
                <!--row -->
             
                <?php
				//error_reporting(0);
				
				
switch ($view_div)
{
    case 'use':
        $this->load->view('dot/userlist');
        break;
		
				
		case 'acclt':
        $this->load->view('dot/uacclist');
        break;
		
		case 'pays':
        $this->load->view('dot/loanpays');
        break;
		
		case 'lonp':
        $this->load->view('dot/loanlist'); 
        break;
		
		case 'appv':
        $this->load->view('dot/loanlistapp');
        break;
		
		
		case 'trans':
        $this->load->view('dot/loanlistsff');
        break;
		
		case 'udat':
        $this->load->view('dot/user/account_details');
        break;
		
		case 'uset':
        $this->load->view('dot/user/accountsetting');
        break;
		
		case 'bq':
        $this->load->view('dot/user/balace');
        break;
		
		case 'pd':
        $this->load->view('dot/paidloans');
        break;
		
		case 'pdv':
        $this->load->view('dot/viewpay');
        break;
		
		case 'stm':
        $this->load->view('dot/user/stament');
        break;
		case 'ft':
        $this->load->view('dot/user/transfer');
        break;
		
		case 'wd':
        $this->load->view('dot/user/withd');
        break;
		
		case 'qkc':
        $this->load->view('dot/user/qiuck');
        break;
		
		case 'tk':
        $this->load->view('dot/user/token');
        break;

		case 'dash':
        $this->load->view('dot/dashbord');
        break;
		
		
		case 'contr':
        $this->load->view('dot/user/contract_det');
        break;
		
		case 'lad':
        $this->load->view('dot/user/loansd');
        break;
		
		
		case 'sign':
        $this->load->view('dot/user/sign');
        break;
		
		case 'bd':
        $this->load->view('dot/user/bank_details');
        break;
		
}
?>
				
				
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Innocat Technolgies  </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    