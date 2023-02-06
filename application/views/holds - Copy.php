    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register" style="background: url(<?=base_url('assets/');?>logs/login-register.jpg) no-repeat center center / cover !important;
  height: 100%;
  position: fixed;">
        <div class="login-box login-sidebar">
            <div class="white-box">
                <form class="form-horizontal form-material" method="post"  id="loginform" action="<?=base_url('Home/processLogin2');?>">
                    <a href="javascript:void(0)" class="text-center db"><img src="<?=base_url('assets/');?>logs/logos.png" alt="home" width="100%" />
                        <br/></a>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="username" required="" placeholder="Username"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="Password"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Remember me </label>
                            </div> 
					<div>
					</div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    
                </form>

            </div>
        </div>
    </section>
