 <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    
                    <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="<?=base_url($userdetails->pics);?>" alt="user-img" class="img-circle"> <span class="hide-menu"><?=$username;?><span class="fa arrow"></span></span>
                        </a>
                        
                    </li>
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <li> <a href="<?=base_url('Dashboard/user_errors/'.$id_enc.'/udat');?>" class="waves-effect"><i class="fa fa-user"></i> <span class="hide-menu">Account Details</span></a> </li>					
					<li> <a href="<?=base_url('Dashboard/user_errors/'.$id_enc.'/uset');?>" class="waves-effect"><i class="ti-settings"></i> <span class="hide-menu">Account Settings</span></a> </li>					
					
                    <li> <a href="<?=base_url('Dashboard/user_errors/'.$id_enc.'/wd');?>" class="waves-effect"><i class="fa fa-arrow-circle-o-down"></i> <span class="hide-menu">WithDraw || Deposit</span></a> </li>
                   <li> <a href="<?=base_url('Dashboard/user_errors/'.$id_enc.'/bd');?>" class="waves-effect"><i class="fa fa-arrow-circle-o-down"></i> <span class="hide-menu">Bank Details</span></a> </li>
                   
                    <li> <a href="<?=base_url('Dashboard/user_errors/'.$id_enc.'/ft');?>" class="waves-effect"><i class="fa fa-exchange"></i> <span class="hide-menu">Transfer Funds</span></a> </li>
                    <li> <a href="<?=base_url('Dashboard/user_errors/'.$id_enc.'/qkc');?>" class="waves-effect"><i class="fa fa-bolt"></i> <span class="hide-menu">Quick Cash</span></a> </li>
                    <li> <a href="<?=base_url('Dashboard/user_errors/'.$id_enc.'/bq');?>" class="waves-effect"><i class="fa fa-question"></i> <span class="hide-menu">Balance Inquiry</span></a> </li>
                    <li> <a href="<?=base_url('Dashboard/user_errors/'.$id_enc.'/stm');?>" class="waves-effect"><i class="fa fa-print"></i> <span class="hide-menu">Print Statement</span></a> </li>
                    
                    <li> <a href="<?=base_url('Dashboard/user_errors/'.$id_enc.'/sign');?>" class="waves-effect"><i class="fa fa-print"></i> <span class="hide-menu">Signature</span></a> </li>
                    
                    <li><a  href="<?=base_url('Home/logout');?>" class="waves-effect"><i class="icon-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
                    
                </ul>
            </div>
        </div>