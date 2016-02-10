	<title>365 Deals :: Forgot Password</title>
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
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>logreg.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>switchery.min.css">
	<script type="text/javascript" src="switchery.min.js"></script>
	<!-- Section Title-->    
	<div class="section-title-01">
		<!-- Parallax Background -->
		<div class="bg_parallax image_02_parallax"></div>
		<!-- Parallax Background -->
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
						<div class="col-md-6 col-md-offset-3">
							<div class="row login_totpad">
								<div class="col-sm-12">		
									<div class="row login_left">
										<div class="col-md-6">
											<div class=" pull-left">
												<a href="<?php echo base_url(); ?>index.php"><img src="<?php echo base_url(); ?>img/maillogo.png"  class="" alt="Logo" title="99 Right Deals">  </a> 
											</div>
										</div>
										<div class="col-md-6">
											<h2 class="login_name">Forgot Password</h2>
										</div>
									</div>
									<div class="login-form">
										<!-- End Title -->
										<?php echo $this->view("classified_layout/success_error"); ?>
										<form  method="post" class="log_form" action="<?php echo base_url(); ?>common/forgot/<?php echo @$rcode; ?>" id="forgot-form">
											<div class="col-12">
												<label>New Password <sup style='color:red;'>*</sup>
												<input type='password' placeholder="Enter Password" id="password" name="password" tabindex="1" required>
												<input type="hidden" id="random" name="random" value='<?php echo @$rcode; ?>' tabindex="1">
												<?php echo form_error("password");?>
												</label>
											</div>
											<div class="col-12">
												<label>Confirm Password <sup style='color:red;'>*</sup>
												<input type='password' placeholder="Enter password" id="conf_password" name="conf_password" tabindex="1" required>
												<?php echo form_error("conf_password");?>
												</label>
											</div>
											<div class="col-submit">
												<input type="submit" id="forgot_pwd" name='forgot_pwd' class="btn btn-primary" value="Submit">
											</div>
										</form>
										<!-- End form -->
									</div>
								</div>
							</div>
							<!-- end login form -->
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