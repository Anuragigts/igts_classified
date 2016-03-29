<!DOCTYPE html>
<html>
	<head>
		
		<title>Contact US | 99 Right Deals</title>
		
		<meta name="description" content="99 Right Deals dedicated to our client or customer care services 24 x 7. How Can I Assist You." />
		
		<!-- xxx Head Content xxx -->
		<?php echo $this->load->view('common/head');?> 
		<!-- xxx End xxx -->
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
		
		<script>
								  
		  $(function() {
		  
			// Setup form validation on the #register-form element
			$("#contact_form").validate({
			
				// Specify the validation rules
				rules: {
					contact_name: {
						required: true,
					},
					contact_email: {
							required: true,
							email: true
						},
					contact_no: {
						required: true,
					},
					contact_message: {
						required: true,
						minlength: 60
					}
				},
				
				// Specify the validation error messages
				messages: {
					contact_name: {
						required: "Please Enter Your Name",
					},
					contact_no: {
						required: "Please Enter Mobile No"
						//minlength: "Please Enter 10 Digit Mobile No"
					},
					contact_message: {
						required: "Please Enter Message",
						minlength: "Title contains atleast 60 characters"
					},
					contact_email: "Please enter a valid email address",
				},
				
				submitHandler: function(form) {
					// form.submit();
					return true;
				}
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
			
			<section class="content-central">
				<div class="semiboxshadow text-center">
					<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
				</div>
				<div class="content_info">
					<form id="contact_form" action="#" class="j-forms" method="post" style="background-color:#fff;">
						<div class="content_info">
							<div class="paddings-mini">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<div class="titles">
												<h2>Contact <span>US </span></h2>
												<hr class="tall">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="row">
												<div class="col-md-4 col-sm-4 col-xs-12">
													<aside class="cont_left">
														<address class="whi_te">
															<i class="fa fa-map-marker"></i> fa795 Folsom Ave, Suite 600<br>
															<span class="pad_left_23"></span> San Francisco, CA 94107<br>
														</address>
													</aside>
												</div>
												<div class="col-md-4 col-sm-4 col-xs-12 top_pad_10">
													<aside class="cont_left">
														<address class="whi_te">
															<i class="fa fa-phone"></i>  (123) 456-7890 <br>
															<i class="fa fa-phone"></i>  (123) 456-7890
														</address>
													</aside>
												</div>
												<div class="col-md-4 col-sm-4 col-xs-12 top_pad_10">
													<aside class="cont_left">
														<address class="whi_te">
															<i class="fa fa-envelope"></i><a href="mailto:#"> sales@gmail.com</a><br>
															<i class="fa fa-envelope"></i><a href="mailto:#"> support@gmail.com</a>
														</address>
													</aside>
												</div>
											</div>
											<div class="divider_space"></div>	
											<div class="row">
												<div class="col-md-8 col-sm-7 col-xs-12">
													<p class="lead" align="justify">
													   Find a wide variety of airline tickets and cheap flights, hotels, tour packages, car rentals, cruises and more in travelia.com.You can choose your favorite destination and start planning your long-awaited vacation.
													</p>
													<div class="row">
														<div class="col-sm-6 unit">
															<div class="input">
																<label class="icon-right" for="contact_name">
																	<i class="fa fa-user"></i>
																</label>
																<input type="text" id="contact_name" name="contact_name" placeholder="Enter Your Name"  >
															</div>
														</div>
														<div class="col-sm-6 unit">
															<div class="input">
																<label class="icon-right" for="contact_email">
																	<i class="fa fa-envelope-o"></i>
																</label>
																<input type="email" id="contact_email" name="contact_email" placeholder="Enter Your Email">
															</div>
														</div>
														<div class="col-sm-12 unit">
															<div class="input">
																<label class="icon-right" for="contact_no">
																	<i class="fa fa-phone"></i>
																</label>
																<input type="text" id="contact_no" name="contact_no" placeholder="Enter Your Mobile Number ">
															</div>
														</div>
														<div class="col-sm-12 unit">
															<div class="input">
																<textarea type="text" id="contact_message" name="contact_message" placeholder="Enter Your Message "></textarea>
															</div>
														</div>
														<div class="col-sm-12 unit">													
															<input type="submit" id="submit" name='submit' class="btn btn-primary" value="Send">
														</div>
													</div>
												</div>
												<div class="col-md-4 col-sm-5 col-xs-12">
													<img src="img/contact.jpg" class="img img-responsive con_tact" alt="Contact" title="Contact">
												</div>
											</div>
											<div class="divider_space"></div>	
											<div class="row">
												<div class="col-md-12 col-sm-12 col-xs-12">
													<div id="map"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>  
					</form>
				</div>   
			</section>
			<!-- Inner Page Content End-->
		
			<!-- xxx footer Content xxx -->
			<?php echo $this->load->view('common/footer');?> 
			<!-- xxx footer End xxx -->
			
		</div>
		<!-- End Entire Wrap -->
		
		<script src="<?php echo base_url(); ?>js/jquery.js"></script>
		<script src="<?php echo base_url(); ?>js/maps/gmap3.js"></script>  
		<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
			
			var mapMarkers = [{
				address: "217 Summit Boulevard, Birmingham, AL 35243",
				html: "<strong>99 Right deals</strong><br>United States<br><br><a href='#' onclick='mapCenterAt({latitude: 33.44792, longitude: -86.72963, zoom: 16}, event)'>[+] zoom here</a>",
				icon: {
					image: "img/map-marker.png",
					iconsize: [25, 35],
					iconanchor: [12, 46]
				}
			}];

			var initLatitude = 33.44792;
			var initLongitude = -86.72963;

			var mapSettings = {
				controls: {
					panControl: true,
					zoomControl: true,
					mapTypeControl: true,
					scaleControl: true,
					streetViewControl: true,
					overviewMapControl: true
				},
				scrollwheel: false,
				markers: mapMarkers,
				latitude: initLatitude,
				longitude: initLongitude,
				zoom: 5
			};
			
			$("#map").gMap(mapSettings);

			var mapCenterAt = function(options, e) {
				e.preventDefault();
				$("#map").gMap("centerAt", options);
			}

		</script>
		
		<script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>
		
		<!-- xxx footerscript Content xxx -->
		<?php echo $this->load->view('common/footerscript');?> 
		<!-- xxx footerscript End xxx -->
			
	</body>
</html>
