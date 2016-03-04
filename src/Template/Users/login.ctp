<header>
  <div class="header_section-login">
    <div class="container">
      <div class="row">
	  	<div class="col-lg-4 col-md-4 col-sm-2 col-xs-3">
	  		<div class="clearfix">
	  		</div>
	  	</div>
	  	<form name="loginform" id="loginform" method="post">
		  	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 login mrg-top text-center">
		  		<div class="brand_logo1 top-logo"> <a href="#"><img src="images/logo.png" /></a> </div> 
		  		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 padd-rgt mar-bottm">
		  			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-rgt padd-lft">
		  				<div class="username">
		  					<input type="text" name="username" class="form-control1 bor-rad" placeholder="USER NAME_">
		  				</div>
		  			</div>
		  			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-rgt padd-lft">
		  				<input type="password" name="password" class="form-control1 bor-rad1" placeholder="PASSWORD_">
		  			</div>
		  		</div>
		  		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 padd-lft">
		  			<div class="btn1 btn-default"><button class="submit_btn"><i class="fa fa-angle-double-right"></i></button></div>
		  		</div>
		  		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-8 text-left mar-bottm mrg-top1">
		  			<span class="forget-password"><a href="">Forget password?</a></span>
		  		</div>
		  		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-4 text-right mrg-top1">
		  			<span class="sigup"><a href="<?= $this->Url->build(["controller" => "users", "action" => "add"]);?>">SignUp</a></span>
		  		</div>
		  		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 puzztm" style="margin-bottom:40px;">
		  		<p>Welcome to the buzztm access portal</p>
		  	</div>
		  </form>
	  	<!-- <p class="portal">Please enter the correct password</P> -->
	  </div>
	  
	  </div>
      </div>
    </div>
  </div>
</header>