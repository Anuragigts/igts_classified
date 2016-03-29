<!DOCTYPE html>
<html>
	<head>
		
		<title>Right Deals :: Significant Deals View</title>
		
		<!-- xxx Head Content xxx -->
		<?php echo $this->load->view('common/head');?> 
		<!-- xxx End xxx -->
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>js/jquery.cleditor.css" />
	
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
				<div class="bg_parallax image_01_parallax"></div>
			</div>   
			
			<section class="content-central">
				<div class="semiboxshadow text-center">
					<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
				</div>
				
				<div class="content_info">
					<div class="paddings">
						<div class="container">
							<div class="row">
								<div class="col-sm-3">
									<img src="<?php echo base_url(); ?>img/slide/side_view.jpg" class="img-responsive" alt="side_view" title="Side Ad">
								</div>
								
								<form id="j-forms" action="#" class="j-forms" method="post">
									<div class="col-md-9">
										<div class="row">
											<div class="col-sm-12">
												<h2>Significant Deals View</h2>
											</div>
										</div>
										
										<div class="sort-by-container tooltip-hover">
											<div class="row">
												<div class="col-md-12">
													<strong>Sort by:</strong>
													<ul>                            
														<li>
															<div class="top_bar_top">
																<label class="input select">
																	<select name="dealtitle_sort" class="dealtitle_sort">
																		<option value="Any">Title</option>
																		<option value="atoz">A to Z</option>
																		<option value="ztoa">Z to A</option>
																	</select>
																	<i></i>
																</label>
															</div>
														</li>
														<li>
															<div class="top_bar_top">
																<label class="input select">
																	<select name="price_sort" class="price_sort">
																		<option value="Any">Pricing</option>
																		<option value="lowtohigh">Low to High</option>
																		<option value="hightolow">High to Low</option>
																	</select>
																	<i></i>
																</label>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
										
										<div class="row">
										
										</div>
									</div>
								</form>
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
		
		<!-- xxx footerscript Content xxx -->
		<?php echo $this->load->view('common/footerscript');?> 
		<!-- xxx footerscript End xxx -->
			
	</body>
</html>
