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
                    
                    <li class="mega-dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><span class="hidden-xs">Menu</span> <i class="icon-options-vertical"></i></a>
                        <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Manage Accounts</li>
                                    <li><a href="<?=base_url('Dashboard/changerm/use');?>">User Details</a> </li>
									<li><a href="<?=base_url('Dashboard/changerm/acclt');?>">Accounts Details</a> </li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Loan Management</li>
                                    <li><a href="<?=base_url('Dashboard/changerm/lonp');?>">Pending</a> </li>
									<li><a href="<?=base_url('Dashboard/changerm/appv');?>">Approved</a> </li>
									<li><a href="<?=base_url('Dashboard/changerm/trans');?>">Transfered</a> </li>
									<li><a href="<?=base_url('Dashboard/changerm/pays');?>">Loan Payment</a> </li>
                                </ul>
                            </li>
                            <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Returns</li>
                                    <li><a href="<?=base_url('Dashboard/changerm/pd');?>">Returned Loans</a> </li>
                                </ul>
                            </li>
                          <!--  <li class="col-sm-3">
                                <ul>
                                    <li class="dropdown-header">Manage Clients</li>
                                    <li> <a href="javascript:void(0)">Link of page</a> </li>
                                </ul>
                            </li> -->
							 <li class="col-sm-12 m-t-40 demo-box">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-purple"><a href="<?=base_url('Register')?>"  class="text-white"><i class="linea-icon linea-basic fa-fw" data-icon="v"></i><br/>Create Accounts</a></div>
                                    </div>

                                    
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- /.Megamenu -->
                    <li > <a class="dropdown-toggle waves-effect waves-light"  href="<?=base_url('Home/logout');?>""><span class="hidden-xs">Logut</span> <i class="icon-logout fa-fw"></i></a>
                   
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
        $this->load->view('res/userlist');
        break;
		
				
		case 'acclt':
        $this->load->view('res/uacclist');
        break;
		
		case 'pays':
        $this->load->view('res/loanpays');
        break;
		
		case 'lonp':
        $this->load->view('res/loanlist'); 
        break;
		
		case 'appv':
        $this->load->view('res/loanlistapp');
        break;
		
		
		case 'trans':
        $this->load->view('res/loanlistsff');
        break;
		
		case 'udat':
        $this->load->view('res/user/account_details');
        break;
		
		case 'uset':
        $this->load->view('res/user/accountsetting');
        break;
		
		case 'bq':
        $this->load->view('res/user/balace');
        break;
		
		case 'pd':
        $this->load->view('res/paidloans');
        break;
		
		case 'pdv':
        $this->load->view('res/viewpay');
        break;
		
		case 'stm':
        $this->load->view('res/user/stament');
        break;
		case 'ft':
        $this->load->view('res/user/transfer');
        break;
		
		case 'wd':
        $this->load->view('res/user/withd');
        break;
		
		case 'qkc':
        $this->load->view('res/user/qiuck');
        break;
		
		case 'tk':
        $this->load->view('res/user/token');
        break;

		case 'dash':
        $this->load->view('res/dashbord');
        break;
		
		
		case 'contr':
        $this->load->view('res/user/contract_det');
        break;
		
		case 'lad':
        $this->load->view('res/user/loansd');
        break;
		
		
		case 'sign':
        $this->load->view('res/user/sign');
        break;
		
		case 'bd':
        $this->load->view('res/user/bank_details');
        break;
		
}
?>
				
				
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Innocat Technolgies  </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    