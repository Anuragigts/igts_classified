<!DOCTYPE html>
<html>
	<head>
		
		<title>Right Deals :: All Categories search</title>
		
		<meta name="description" content="365" />
		<meta name="keywords" content="Hot" />
		
		<!-- xxx Head Content xxx -->
		<?php echo $this->load->view('common/head');?> 
		<!-- xxx End xxx -->
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>libs/slider.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/homeslider.css">
		<link rel="stylesheet" href="js/filter.css"> 
		
		<script type="text/javascript">
			$(document).ready(function() {
			  $('.cd-filter-content').niceScroll({
				autohidemode: 'false',     
				cursorborderradius: '0px', 
				background: '#f4f4f4',     
				cursorwidth: '8px',       
				cursorcolor: '#E95413'     
			  });
			  function tog(v){return v?'addClass':'removeClass';} 
				$(document).on('input', '.clearable', function(){
					$(this)[tog(this.value)]('x');
				}).on('mousemove', '.x', function( e ){
					$(this)[tog(this.offsetWidth-18 < e.clientX-this.getBoundingClientRect().left)]('onX');
				}).on('touchstart click', '.onX', function( ev ){
					ev.preventDefault();
					$(this).removeClass('x onX').val('').change();
				});
			});
		</script>
		
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
			
			<!--Content Central -->
			<section class="content-central">
				<!-- Shadow Semiboxed -->
				<div class="semiboxshadow text-center">
					<img src="img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
				</div>
				<form id="j-forms" action="#" class="j-forms" method="post" style="background-color: rgb(255, 255, 255) !important;">
					<div class="content_info">
						<div class="paddings">
							<div class="container pad_bott_50">
								<div class="row">
									<div class="col-md-6 col-sm-8 col-md-offset-1" style="margin-bottom:50px;">
										<div class="unit">
											<div class="input">
												<label class="icon-left" for="">
													<i class="fa fa-search"></i>
												</label>
												<input type="text" placeholder="enter a letter" id="list-autocomplete" name="list-autocomplete">
											</div>
										</div>
									</div>
									
									<div class="col-md-10 col-sm-8 col-md-offset-1" style="border: 2px solid rgb(94, 195, 163);padding: 7px 10px;height: 68px;">
										<div class="row">
											<div class="col-md-3 col-sm-3 col-xs-12 unit">
												<div class="input">
													<label class="icon-left" for="">
														<i class="fa fa-search"></i>
													</label>
													<input type="text" class="clearable" id="typeservice" name="typeservice" placeholder="I'm looking for">
												</div>
											</div>
											<div class="col-md-3 col-sm-2 col-xs-12 unit">
												<label class="input select">
													<select name="">
														<option value="none" selected disabled="">Select Category</option>
														<option value="">Services</option>
														<option value="">Motors</option>
														<option value="">Pets</option>
														<option value="">Jobs</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="col-md-6 col-sm-7 col-xs-12 unit">
												<div class="row">
													<div class="col-md-5 col-sm-5 col-xs-12 unit">
														<div class="input">
															<label class="icon-left" for="">
																<i class="fa fa-search"></i>
															</label>
															<input type="text" id="typeservice" name="typeservice" placeholder="Location">
														</div>
													</div>
													<div class="col-md-7 col-sm-7 col-xs-12">
														<div class="range range-success">
															<input type="range" name="range" min="3" max="20" value="10" onchange="rangeSuccess.value=value">
															<output id="rangeSuccess">50</output>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="container">
								<div class="row">
									<!-- Item Table-->
									<div class="col-sm-3">
										<div class="container-by-widget-filter bg-dark color-white">
											<!-- Widget Filter -->
											<h3 class="title-widget">Filters</h3>
											<div class="cd-filter-block">
												<h4 class="title-widget">Categories</h4>
												<div class="cd-filter-content">
													<div class="filters_categories">
														<ul class="list-styles">
															<li id="e_zone_fil_show"><i class="fa fa-arrow-circle-o-right"></i> E-Zone
																<ul class="filters_left" id="e_zone_fil_hide" style="display:none;">
																	<li><i class="fa fa-angle-right"></i> <a href="phones_tablets_view">Phones & Tablets</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="home_applications_view">Home Appliances</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="small_applicaances_view">Small Appliances</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="laptop_computers_view">Laptop & Computers</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="accessories_view">Accessories</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="personal_care_view">Personal Care</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="home_entertainment_view">Home Entertainment</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="photography_view">Photography</a></li>
																</ul>
															</li>
															<li id="motor_fil_show"><i class="fa fa-arrow-circle-o-right"></i> Motor Point
																<ul class="filters_left" id="motor_fil_hide" style="display:none;">
																	<li><i class="fa fa-angle-right"></i> <a href="cars_view">Cars</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="bikes_scoters_view">Bikes & Scooters</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="motorhomes_caravans_view">Motor-homes & Caravans</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="vans_trunks_svu_view">Vans,Trunks & SUV's</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="coaches_busses_view">Coaches & Buses</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="plantmachinery_view">Plant Machinery</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="farmingvehicles_view">Farming Vehicles</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="boats_view">Boats</a></li>
																</ul>
															</li>
															<li id="clot_fil_show"><i class="fa fa-arrow-circle-o-right"></i> Clothing & LifeStyles
																<ul class="filters_left" id="clot_fil_hide" style="display:none;">
																	<li><i class="fa fa-angle-right"></i> <a href="women_view">Women</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="men_view">Men </a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="boys_view">Boy</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="girls_view">Girls</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="baby_boy_view">Baby Boy</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="baby_girl_view">Baby Girl</a></li>
																</ul>
															</li>
															<li id="service_fil_show"><i class="fa fa-arrow-circle-o-right"></i> Services
																<ul class="filters_left" id="service_fil_hide" style="display:none;">
																	<li><i class="fa fa-angle-right"></i> <a href="professional_view">Professional </a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="popular_view">Popular </a></li>
																</ul>
															</li>
															<li id="property_fil_show"><i class="fa fa-arrow-circle-o-right"></i> Find a Property
																<ul class="filters_left" id="property_fil_hide" style="display:none;">
																	<li><i class="fa fa-angle-right"></i> <a href="residential_view">Residential</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="commercial_view">Commercial </a></li>
																</ul>
															</li>
															<li id="home_fil_show"><i class="fa fa-arrow-circle-o-right"></i> Home & Kitchen
																<ul class="filters_left" id="home_fil_hide" style="display:none;">
																	<li><i class="fa fa-angle-right"></i> <a href="kitchen_essentials_view">Kitchen Essentials</a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="home_essentials_view">Home Essentials </a></li>
																	<li><i class="fa fa-angle-right"></i> <a href="decor_view">Decor </a></li>
																</ul>
															</li>
															<li><i class="fa fa-arrow-circle-o-right"></i> <a href="pets_view">Pets</a></li>
															<li><i class="fa fa-arrow-circle-o-right"></i> <a href="job_view">Jobs</a></li>
														</ul>
													</div>
												</div>
											</div>
											
											<div class="cd-filter-block">
												<h4 class="title-widget closed">Location</h4>

												<div class="cd-filter-content" style="overflow: hidden; display: none;">
													<div id="limit_scrol">
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Madhapur
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Banjara Hills
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> madhapur
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Secunderabad 
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Kachiguda 
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> JNTU 
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> KPHP 
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Jubilee Hills 
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Lakdikapul
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Khairatabad
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Dilsukhnagar
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Others
														</label>
													</div>
												</div>
											</div> 
											
											
											
											<div class="cd-filter-block">
												<h4 class="title-widget">Search Only</h4>

												<div class="cd-filter-content">
													<div>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Urgent Deals 
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Feature Deals
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Deals With Pictures
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Others
														</label>
													</div>
												</div>
											</div> 
										</div>
										<div class="row top_20">
											<div class="col-sm-12">
												<img src="<?php echo base_url(); ?>img/slide/right_ad.jpg" alt="add" title="Adds">
											</div>
										</div>
										<div class="row top_20">
											<div class="col-sm-12">
												<img src="<?php echo base_url(); ?>img/slide/right_ad.jpg" alt="add" title="Adds">
											</div>
										</div>
									</div>
									<!-- End Item Table-->

									<!-- Item Table-->
									<div class="col-md-9">
										<div class="sort-by-container tooltip-hover">
											<div class="row">
												<div class="col-md-9">
													<strong>Sort by:</strong>
													<ul>                            
														<li>
															<div class="top_bar_top">
																<label class="input select">
																	<select name="star">
																		<option value="none" selected disabled="">Select Star</option>
																		<option value="5">5 Starts</option>
																		<option value="4">4 Starts</option>
																		<option value="3">3 Starts</option>
																		<option value="2">2 Starts</option>
																		<option value="1">1 Starts</option>
																	</select>
																	<i></i>
																</label>
															</div>
														</li>
														<li>
															<div class="top_bar_top">
																<label class="input select">
																	<select name="star">
																		<option value="none" selected disabled="">Select Name</option>
																		<option value="5">A to Z</option>
																		<option value="4">Z to A</option>
																	</select>
																	<i></i>
																</label>
															</div>
														</li>
														<li>
															<div class="top_bar_top">
																<label class="input select">
																	<select name="star">
																		<option value="none" selected disabled="">Select Price</option>
																		<option value="5">Sort Ascending</option>
																		<option value="4">Sort Descending</option>
																	</select>
																	<i></i>
																</label>
															</div>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="style-view">
														<li data-toggle="tooltip" title="" data-original-title="BOX VIEW">
															<a href="deals-administrator-box">
																<i class="fa fa-th-large"></i>
															</a>
														</li>
														<li data-toggle="tooltip" title="" data-original-title="LIST VIEW" class="active">
															<a href="deals-administrator">
																<i class="fa fa-list"></i>
															</a>
														</li> 
													</ul>
												</div>
											</div>
										</div>
										<!-- sort-by-container-->

										<div class="row list_view_searches">
											<!-- platinum+urgent package start -->
											<div class="col-md-12">
												<div class="first_list">
													<div class="row">
														<div class="col-sm-4">
															<div class="featured-badge">
																<span>Urgent</span>
															</div>
															<div class="xuSlider">
																<ul class="sliders">
																	<li><img src="img/blog/002.jpg" class="img-responsive" alt="Slider1" title="Sliders"></li>
																	<li><img src="img/blog/003.jpg" class="img-responsive" alt="Slider2" title="Sliders"></li>
																	<li><img src="img/blog/004.jpg" class="img-responsive" alt="Slider3" title="Sliders"></li>
																	<li><img src="img/blog/005.jpg" class="img-responsive" alt="Slider4" title="Sliders"></li>
																	<li><img src="img/blog/006.jpg" class="img-responsive" alt="Slider5" title="Sliders"></li>
																</ul>
																<div class="direction-nav">
																	<a href="javascript:;" class="prev icon-circle-arrow-left icon-4x"><i>Previous</i></a>
																	<a href="javascript:;" class="next icon-circle-arrow-right icon-4x"><i>Next</i></a>
																</div>
																<div class="control-nav">
																	<li data-id="1"><a href="javascript:;">1</a></li>
																	<li data-id="2"><a href="javascript:;">2</a></li>
																	<li data-id="3"><a href="javascript:;">3</a></li>
																	<li data-id="4"><a href="javascript:;">4</a></li>
																	<li data-id="5"><a href="javascript:;">5</a></li>
																</div>	
															</div>
															<div class="">
																<div class="price11">
																	<span></span><b>
																	<img src="img/icons/crown.png" class="pull-right" alt="Crown" title="Crown Icon"></b>
																</div>
															</div>
														</div>
														<div class="col-sm-8 middle_text">
															<div class="row">
																<div class="col-sm-8">
																	<div class="row">
																		<div class="col-xs-12">
																			<h3 class="list_title">Sample text Here</h3>
																		</div>
																	</div>
																	<div class="row">
																		<div class="col-xs-4">
																			<ul class="starts">
																				<li><a href="#"><i class="fa fa-star"></i></a></li>
																				<li><a href="#"><i class="fa fa-star"></i></a></li>
																				<li><a href="#"><i class="fa fa-star"></i></a></li>
																				<li><a href="#"><i class="fa fa-star"></i></a></li>
																				<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
																			</ul>
																		</div>
																		<div class="col-xs-8">
																			<div class="location pull-right ">
																				<i class="fa fa-map-marker "></i> 
																				<a href="" class="location"> Location</a> ,<a href="" class="location">Place</a>
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="col-xs-4 serch_bus_logo">
																	<img src="img/brand/intel.png" alt="intel" title="intel logo" class="img-responsive">
																</div>
															</div>
															<hr class="separator">
															<div class="row">
																<div class="col-xs-8">
																	<div class="row">
																		<div class="col-xs-12">
																			<p class="">The Holiday Inn Bilbao is in a prime location next to the Basilica of  and the </p>
																		</div>
																		<div class="col-xs-12">
																			<a href="description_view" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																		</div>
																	</div>
																</div>
																<div class="col-xs-4">
																	<div class="row">
																		<div class="col-xs-10 col-xs-offset-1 amt_bg">
																			<h3 class="view_price">£1106</h3>
																		</div>
																		<div class="col-xs-12">
																			<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Now</span></a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div><!-- End Row-->
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="post-meta list_view_bottom" >
															<ul>
																<li><i class="fa fa-camera"></i><a href="#">2</a></li>
																<li><i class="fa fa-video-camera"></i><a href="#">3</a></li>
																<li><i class="fa fa-user"></i><a href="#">Person Name</a></li>
																<li><i class="fa fa-clock-o"></i><span>April 23, 2015</span></li>
																<li><i class="fa fa-eye"></i><span>234 Views</span></li>
																<li><span>Deal ID : 112457856</span></li>
																<li><i class="fa fa-star"></i><span><a href="#">Saved</a></span></li>
																<li><i class="fa fa-edit"></i></li>
																<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
															</ul>                      
														</div>
													</div>
												</div><hr class="separator">	
												<!-- End Item Gallery List View-->
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</section>
			<!-- Inner Page Content End-->
		
			<!-- xxx footer Content xxx -->
			<?php echo $this->load->view('common/footer');?> 
			<!-- xxx footer End xxx -->
			
		</div>
		<!-- End Entire Wrap -->
		
		<!-- End Shadow Semiboxed -->
		<script src="<?php echo base_url(); ?>js/jquery.js"></script> 
		
		<script src="<?php echo base_url(); ?>js/bootstrap-slider.js"></script>
		<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>libs/jquery.xuSlider.js"></script>
		<script>
			$('.xuSlider').xuSlider();
		</script>
		
		<script>
			$('#ex1').slider({
				formatter: function(value) {
					return 'Current value: ' + value;
				}
			});
		</script>
		
		<script src="j-folder/js/jquery.ui.min.js"></script>
	
		
		<script>
			$(document).ready(function(){
				$('#list-autocomplete').autocomplete({
					source: [ "c++", "java", "jphp", "jcoldfusion", "jjavascript", "jasp", "jruby" ],
					messages: {
						noResults:''
					}
				});
			});
		</script>
		
		<!-- xxx footerscript Content xxx -->
		<?php echo $this->load->view('common/footerscript');?> 
		<!-- xxx footerscript End xxx -->
			
	</body>
</html>
