 <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    
                    <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="<?= $this->M_general_model->get_image_url($userdetails->pics);?>" alt="user-img" class="img-circle"> <span class="hide-menu"><?=$username;?><span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                         <li><a href="<?=base_url('Customer/changerm/adt');?>"><i class="ti-user"></i> My Profile</a></li>                      
                            <!--li><a href="<?=base_url('Customer/changerm/actste');?>"><i class="ti-settings"></i> Account Setting</a></li-->
                            <li><a  href="<?=base_url('logout');?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <li> <a href="<?=base_url('Customer/changerm/dsb');?>" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu">Dashboard</span></a> </li>
					
                    
                    <li> <a href="<?=base_url('Customer/changerm/qkc');?>" class="waves-effect"><i class="fa fa-bolt"></i> <span class="hide-menu">Quick Cash</span></a> </li>
                   <!-- <li> <a href="<?=base_url('Customer/changerm/bq');?>" class="waves-effect"><i class="fa fa-question"></i> <span class="hide-menu">Balance Inquiry</span></a> </li>
                    <li> <a href="<?=base_url('Customer/changerm/stm');?>" class="waves-effect"><i class="fa fa-print"></i> <span class="hide-menu">Print Statement</span></a> </li>
					<li> <a href="<?=base_url('Customer/changerm/wd');?>" class="waves-effect"><i class="fa fa-arrow-circle-o-down"></i> <span class="hide-menu">WithDraw || Deposit</span></a> </li>
                   <li> <a href="<?=base_url('Customer/changerm/adt');?>" class="waves-effect"><i class="fa fa-user"></i> <span class="hide-menu">Account Details</span></a> </li>					
					
                    <li> <a href="<?=base_url('Customer/changerm/ft');?>" class="waves-effect"><i class="fa fa-exchange"></i> <span class="hide-menu">Transfer Funds</span></a> </li>
					-->
                    
                    
                    <li><a  href="<?=base_url('logout');?>" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                    
                </ul>
            </div>
        </div>