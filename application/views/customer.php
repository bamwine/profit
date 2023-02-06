
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
	

	
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" ><b><img src="<?=base_url('assets/');?>logs/Onlinesmall.png" alt="home" /></b><span class="hidden-xs"><strong>PRO</strong>-FIT</span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    
                   
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="<?= $this->M_general_model->get_image_url($userdetails->pics);?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?=$userdetails->fname;?></b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="<?=base_url('Customer/changerm/adt');?>"><i class="ti-user"></i> My Profile</a></li>                      
                            <!--li><a href="<?=base_url('Customer/changerm/actste');?>"><i class="ti-settings"></i> Account Setting</a></li-->
                            <li><a  href="<?=base_url('logout');?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    
                </ul>
            </div>
            
        </nav>
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
                        <h4 class="page-title"> Dashboard</h4> </div>
                    
                </div>
                <!--row -->
             
                <?php
				//error_reporting(0);
				
				
switch ($view_div)
{
    case 'tk':
        $this->load->view('cust_views/token');
        break;
		
		 case 'adt':
        $this->load->view('cust_views/account_details');
        break;

     case 'wd':
        $this->load->view('cust_views/withd');
        break;
		
		case 'ft':
        $this->load->view('cust_views/transfer');
        break;
		
		case 'qkc':
        $this->load->view('cust_views/qiuck');
        break;
		
		case 'bq':
        $this->load->view('cust_views/balace');
        break;
		
		case 'stm':
        $this->load->view('cust_views/stament');
        break;
		
		case 'dsb':
        $this->load->view('cust_views/dashbord');
        break;
		
		case 'actste':
        $this->load->view('cust_views/accountsetting');
        break;



    default:
        $this->load->view('cust_views/dashbord');
        break;
}
?>
				
				
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Innocat Technolgies  </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    