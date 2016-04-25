<!DOCTYPE html>
<html>
	<head>
		
		<title>About US | 99 Right Deals</title>
		
		<meta name="description" content="99 Right Deals provides free classifieds ads for new or used and buy or sell goods or products and services in United Kingdom. And create own free ads on 99 Right Deals." />
		
		<!-- xxx Head Content xxx -->
		<?php echo $this->load->view('common/head');?> 
		<!-- xxx End xxx -->
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
		
	</head>
	<body id="home">
		<!--Preloader-->
		<div class="preloader">
			<div class="status">&nbsp;</div>
		</div> 
			   
		<!-- layout-->
		<div id="layout">
			<!-- xxx tophead Content xxx -->
			<?php echo $this->load->view('common/tophead'); ?> 
			<!-- xxx End tophead xxx -->
		
			<div class="section-title-01">
				<!-- Parallax Background -->
				<div class="bg_parallax image_01_parallax"></div>
			</div>
		
			<!--Content Central -->
			<section class="content-central">
				<!-- Shadow Semiboxed -->
				<div class="semiboxshadow text-center">
					<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
				</div>
				<!-- End content info -->
				<div class="content_info">
					<div class="paddings">
						<!-- content-->
						<div class="container about_text">
							<div class="row">
								<div class="col-md-12">
									<div class="titles">
										<h2>Feedback Sent <span>Successfully </span></h2>
										<hr class="tall">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="titles">
										<a href="<?php echo base_url(); ?>">Go To Homepage</a>
									</div>
								</div>
							</div>
							
						</div>
						<!-- End content-->
					</div>
				</div>   
				<!-- End content info -->
			</section>
			<!-- End Shadow Semiboxed -->
		
			<!-- xxx footer Content xxx -->
			<?php echo $this->load->view('common/footer');?> 
			<!-- xxx footer End xxx -->
			
		</div>
		<!-- End Entire Wrap -->
		
		<script src="<?php echo base_url(); ?>js/jquery.js"></script>
		<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>
		<script type="text/javascript">
			setTimeout(function(){ window.location = '<?php echo base_url(); ?>'; }, 5000);
		</script>
		<!-- xxx footerscript Content xxx -->
		<?php echo $this->load->view('common/footerscript');?> 
		<!-- xxx footerscript End xxx -->
			
	</body>
</html>
