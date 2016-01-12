	<title>365 Deals :: Login</title>
	<style>
		.section-title-01{
		height: 315px;
		background-color: #262626;
		text-align: center;
		position: relative;
		width: 100%;
		overflow: hidden;
		}
	</style>
	<link rel="stylesheet" type="text/css" media="all" href="logreg.css">
	<link rel="stylesheet" type="text/css" media="all" href="switchery.min.css">
	<script type="text/javascript" src="switchery.min.js"></script>
	<!-- Section Title-->    
	<div class="section-title-01">
		<div class="bg_parallax image_02_parallax"></div>
	</div>
	<!-- End Section Title-->
	<!--Content Central -->
	<section class="content-central">
		<!-- Shadow Semiboxed -->
		<div class="semiboxshadow text-center">
			<img src="img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
		</div>
		<!-- End Shadow Semiboxed -->
		<!-- End content info - page Fill with -->
		<div class="content_info">
			<div class="paddings-mini">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="login-form">
								<div class="login-title pad_bottm">
									<h2 class="text1 text_center ">Login</h2>
								</div>
								<?php echo $this->view("classified_layout/success_error"); ?>
								<div class="row login_totpad login_totpad_bor">
									<div class="col-md-4 login_left">
										<div class="log_leftpad text_center">
											<a href="index.php"><img src="img/365deal.png" class="log_logo" alt="Logo" title="Logo 365 Deals"></a> 
											<h4 class="log_side top_20"><a href="signup">Create New Account</a></h4>
											<h4 class="log_side"><a href="forgot_password">Forgot Password</a></h4>
											<div class="login-options">
												<a href="#" class="login-op-btn grad-btn ln-tr fb">Login with Facebook</a>
											</div>
											<!-- end FB login -->
											<div class=" login-options">
												<a href="#" class="login-op-btn grad-btn ln-tr gp">Login with Google</a>
											</div>
											<!-- end GP login -->
										</div>
									</div>
									<div class="col-md-8">
										<script type="text/javascript">
											function check(){
												var ch = document.getElementById('w_check').checked;
												if(ch){
													document.getElementById('password').disabled = true;
												}
												else{
												 document.getElementById('password').disabled = false;
												}
											}
											
											$(function(){
												$('#wo_login .switchery').click(function(){
													var  col = $('.switchery').css('box-shadow');
													if(col == 'rgb(223, 223, 223) 0px 0px 0px 0px inset'){
														document.getElementById('password').disabled = true;
														document.getElementById('w_login').value = 1;
													}
													else{
														document.getElementById('password').disabled = false;
														document.getElementById('w_login').value = 0;
													}
											
												});
												 $('#remember .switchery').click(function(){
													var  col = $('.switchery').css('box-shadow');
													if(col == 'rgb(223, 223, 223) 0px 0px 0px 0px inset'){
														document.getElementById('remember').value = 1;
													}
													else{
														document.getElementById('remember').value = 0;
													}
											
												});
											});
										</script>
										<div class="login_form">
											<form  method="post" class="log_form" action="" id="register-form">
												<div class="col-1">
													<label>Email <sup style='color:red;'>*</sup>
													<input placeholder="Enter Email" id="email" name="email" tabindex="1" required>
													<?php echo form_error("email");?>
													</label>
												</div>
												<div class="col-1">
													<label>Password <sup style='color:red;'>*</sup>
													<input type="password" placeholder="Enter password" id="password" name="password" tabindex="2" required>
													<?php echo form_error("password");?>
													</label>
												</div>
												<div class="col-1" id='wo_login'>
													<label> Want to Post an Ad without Login
													<input type='hidden' name='w_login' id='w_login' value='0'>
													</label>
													<div class="text_center check_topb">
														<input type="checkbox" id='w_check' name='w_check' onclick='check()' class="js-switch">
													</div>
												</div>
												<div class="col-submit">
													<input type='submit' id="login" name='login' class="btn btn-primary" value='Login' />
												</div>
												<div class="col-1" id='remember'>
													<label> Remember Password
													<input type='hidden' name='remember' id='remember' value='0' />
													</label>
													<div class="text_center check_botb"><input type="checkbox" class="js-switch"></div>
												</div>
											</form>
											<!-- End form -->
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end col-md-8/offset -->
					</div>
					<!-- end row -->
				</div>
			</div>
		</div>
		<!-- End content info - page Fill with  --> 
	</section>
	<script src="js/jquery.js"></script> 
	<script>
		setTimeout(function(){
			 $(".alert").hide();
		},5000);
		
	</script>