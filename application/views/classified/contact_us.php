	<title>Right Deals :: Contact us</title>
	<style>
		.section-title-01{
		height: 273px;
		background-color: #262626;
		text-align: center;
		position: relative;
		width: 100%;
		overflow: hidden;
		}
	</style>

	<div class="section-title-01">
		<div class="bg_parallax image_01_parallax"></div>
	</div>
	
	<link rel="stylesheet" href="j-folder/css/j-forms.css" />
	
	<section class="content-central">
		<div class="semiboxshadow text-center">
			<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
		</div>
		<div class="content_info">
			<div class="">
				
				<div id="map"></div>
               
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
										<div class="col-md-4">
											<aside class="cont_left">
												<h4 class="whi_te">The Office</h4>
												<address class="whi_te">
												  <i class="fa fa-map-marker"></i> fa795 Folsom Ave, Suite 600<br>
												  <i class="fa fa-plane"></i> San Francisco, CA 94107<br>
												  <i class="fa fa-phone"></i>  (123) 456-7890
												</address>

												<address class="whi_te">
												  <strong class="whi_te">99 Deals Emails</strong><br>
												  <i class="fa fa-envelope"></i><a href="mailto:#"> sales@gmail.com</a><br>
												  <i class="fa fa-envelope"></i><a href="mailto:#"> support@gmail.com</a>
												</address>
											</aside>

											<hr class="tall">
										</div>
										
										<div class="col-md-8">
											<h3>Contact Form</h3>
											<p class="lead">
											   Find a wide variety of airline tickets and cheap flights, hotels, tour packages, car rentals, cruises and more in travelia.com.You can choose your favorite destination and start planning your long-awaited vacation.
											   You can also check availability of flights and hotels quickly and easily, in order to find the option that best suits your needs.
											</p>
											<form id="form-contact" class="form-theme" action="">
												<input type="text" placeholder="Name" name="Name" required="">
												<input type="email" placeholder="Email" name="Email" required="">
												<input type="number" placeholder="Phone" name="Phone" required="">
												<textarea placeholder="Your Message" name="message" required=""></textarea>
												<input type="submit" name="Submit" value="Send Message" class="btn btn-primary">
											</form> 
											<div id="result"></div>  
										</div>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>  
			</div>
		</div>   
	</section>
	
	<script src="js/jquery.js"></script>
	<script src="js/maps/gmap3.js"></script>  
	
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