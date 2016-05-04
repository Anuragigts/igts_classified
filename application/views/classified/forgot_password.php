<!DOCTYPE html>
<html>
	<head>
		
		<title>Forgot Password | 99 Right Deals</title>
		
		<!-- xxx Head Content xxx -->
		<?php echo $this->load->view('common/head');?> 
		<!-- xxx End xxx -->
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/logreg.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
	
	</head>
	
	<body id="home">
		
		<!--Preloader-->
		<div class="preloader">
			<div class="status">&nbsp;</div>
		</div> 
			   
		<!-- Start Entire Wrap-->
		<div id="layout">
			
			<!-- xxx tophead Content xxx -->
			<?php echo $this->load->view('common/tophead'); ?> 
			<!-- xxx End tophead xxx -->
			
			<!-- Inner Page Content Start-->
			<div class="section-title-01">
				<div class="bg_parallax image_02_parallax"></div>
			</div>
			
			<!--Content Central -->
			<section class="content-central">
				<div class="semiboxshadow text-center">
					<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
				</div>
				
				<!-- End content info - page Fill with -->
				<div class="content_info">
					<div class="paddings-mini">
						<div class="container">
							<div class="row">
								<div class="col-md-6 col-md-offset-3">
									<?php echo $this->view("classified_layout/success_error"); ?>
									<div class="row login_totpad">
										<div class="col-sm-12">	
											<div class="row login_left">
												<div class="col-md-6">
													<div class=" pull-left">
														<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/maillogo.png"  class="" alt="Logo" title="99 Right Deals">  </a> 
													</div>
												</div>
												<div class="col-md-6">
													<h2 class="login_name">Forgot Password</h2>
												</div>
											</div>
											<div class="login-form">
												<!-- End Title -->
												<form  method="post" class="log_form" action="" id="forgot-form">
													<div class="col-12">
														<label>Current Email <sup style='color:red;'>*</sup>
														<input placeholder="Enter Your Email" id="forgotemail" name="forgotemail" tabindex="1">
														<?php echo form_error("forgotemail");?>
														</label>
													</div>
													<div class="col-submit">
														<input type="submit" id="forgot" name='forgot' class="btn btn-primary" value="Submit">
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<!-- Inner Page Content End-->
		
			<!-- xxx footer Content xxx -->
			<?php echo $this->load->view('common/footer');?> 
			<!-- xxx footer End xxx -->
			
		</div>
		<!-- End Entire Wrap -->
		
		<script src="<?php echo base_url(); ?>js/jquery.js"></script> 
		<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>
		<script>
			setTimeout(function(){
				 $(".alert").hide();
			},5000);
		</script>

		<!-- xxx footerscript Content xxx -->
		<?php echo $this->load->view('common/footerscript');?> 
		<!-- xxx footerscript End xxx -->
			
	</body>
</html>
