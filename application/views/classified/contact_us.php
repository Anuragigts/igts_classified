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
		  	jQuery.validator.addMethod("character", function (value) {
					 return /^[a-zA-Z\s]+$/.test(value);
					});
			// Setup form validation on the #register-form element
			$("#contact_form").validate({
			
				// Specify the validation rules
				rules: {
					contact_name: {
						required: true,
						character:true
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
						required: "Please enter your name",
						character: "please Enter characters",
					},
					contact_no: {
						required: "Please Enter Mobile No"
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
					<form id="contact_form" action="" class="j-forms" method="post" style="background-color:#fff;">
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
												<div class="col-md-5 col-sm-4 col-xs-12">
													<aside class="cont_left">
														<address class="whi_te">
															<i class="fa fa-map-marker"></i> 99right deals, Building 3, Chiswick Park<br>
															<span class="pad_left_23"></span> 566 Chiswick High Road, London, W4 5YA<br>
														</address>
													</aside>
												</div>
												<div class="col-md-3 col-sm-4 col-xs-12">
													<aside class="cont_left">
														<address class="whi_te">
															<i class="fa fa-phone"></i>  (+44) 02089355446 <br>
														</address>
													</aside>
												</div>
												<div class="col-md-4 col-sm-4 col-xs-12 top_pad_10">
													<aside class="cont_left">
														<address class="whi_te">
															<i class="fa fa-envelope"></i><a href="mailto:support@99rightdeals.com"> support@99rightdeals.com</a><br>
															<i class="fa fa-envelope"></i><a href="mailto:advertising@99rightdeals.com"> advertising@99rightdeals.com</a><br>
														</address>
													</aside>
												</div>
											</div>
											<div class="divider_space"></div>	
											<div class="row">
												<div class="col-md-8 col-sm-7 col-xs-12">
													<p class="lead" align="justify">
													   If you ever have any difficulties or want to ask any questions, our customer service team are available on live chat every day of the year from 9am to 5pm.
													</p>
													<?php if($this->session->flashdata("msg") != ""){ ?>
														<div class="alert alert-success">
														    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>        
														    <h4>
														        <?php echo $this->session->flashdata("msg");?>
														    </h4>
														</div>
													<?php } ?>
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
																<input type="text" id="contact_no" name="contact_no" placeholder="Enter Your Mobile Number" maxlength= '11' onkeypress="return isNumber(event)">
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
				address: "Building 3, Chiswick Park 566 Chiswick High Road, London, W4 5YA",
				html: "<strong>99 Right deals</strong><br>United States<br><br><a href='#' onclick='mapCenterAt({latitude: 51.495097, longitude: -0.273317, zoom: 16}, event)'>[+] zoom here</a>",
				icon: {
					image: "img/map-marker.png",
					iconsize: [25, 35],
					iconanchor: [12, 46]
				}
			}];

			var initLatitude = 51.495097;
			var initLongitude = -0.273317;

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
				zoom: 13
			};
			
			$("#map").gMap(mapSettings);

			var mapCenterAt = function(options, e) {
				e.preventDefault();
				$("#map").gMap("centerAt", options);
			}

		</script>
		
		<script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>
		<script type="text/javascript">
			setTimeout(function(){
				$(".alert").hide();
			},5000);
		</script>
		<!-- xxx footerscript Content xxx -->
		<?php echo $this->load->view('common/footerscript');?> 
		<!-- xxx footerscript End xxx -->
			
	</body>
</html>
