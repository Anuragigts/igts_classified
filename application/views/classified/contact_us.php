	<title>365 Deals :: Contact us</title>
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

	<!-- Section Title-->    
	<div class="section-title-01">
		<!-- Parallax Background -->
		<div class="bg_parallax image_01_parallax"></div>
	</div>
	<!-- End Section Title-->
	
	<link rel="stylesheet" href="j-folder/css/j-forms.css" />
	
	<!--Content Central -->
	<section class="content-central">
		<!-- Shadow Semiboxed -->
		<div class="semiboxshadow text-center">
			<img src="img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
		</div>
		<!-- End content info -->
		<div class="content_info">
			<div class="">
				<!-- content-->
				<!-- Google Map --> 
                <div id="map"></div>
                <!-- End Google Map --> 

                <!-- End content info - page Fill with -->
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
                                <!-- Sidebars -->
                                <div class="col-sm-3">
									<div class="item_subpages">
										<ul class="">
											<li><a href='about_us'>About US</a></li>
											<li class="active_page"><a href='contact_us'>Contact US</a></li>
											<li><a href=''>Terms & Conditions</a></li>
											<li><a href=''>Privacy Policy</a></li>
											<li><a href=''>Refund Policy</a></li>
										</ul>
									</div>
								</div>
								<div class="col-sm-9">
									<div class="row">
										<div class="col-md-4">
											<aside>
												<h4>The Office</h4>
												<address>
												  <i class="fa fa-map-marker"></i> fa795 Folsom Ave, Suite 600<br>
												  <i class="fa fa-plane"></i> San Francisco, CA 94107<br>
												  <i class="fa fa-phone"></i>  (123) 456-7890
												</address>

												<address>
												  <strong>99 Deals Emails</strong><br>
												  <i class="fa fa-envelope"></i><a href="mailto:#" class="cont_a"> sales@gmail.com</a><br>
												  <i class="fa fa-envelope"></i><a href="mailto:#" class="cont_a"> support@gmail.com</a>
												</address>
											</aside>

											<hr class="tall">
										</div>
										<!-- End Sidebars -->

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
				<!-- End content-->
			</div>
		</div>   
		<!-- End content info -->
	</section>
	<!-- End Shadow Semiboxed -->
	<script src="js/jquery.js"></script>
	 <script src="js/maps/gmap3.js"></script>  
	<!--  ======================= Google Map  ============================== -->
        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript">
            /*
                Map Settings
                Find the Latitude and Longitude of your address:    
                - http://universimmedia.pagesperso-orange.fr/geo/loc.htm    
                - http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/
            */

            // Map Markers
            var mapMarkers = [{
                address: "217 Summit Boulevard, Birmingham, AL 35243",
                html: "<strong>Alabama Office</strong><br>217 Summit Boulevard, Birmingham, AL 35243<br><br><a href='#' onclick='mapCenterAt({latitude: 33.44792, longitude: -86.72963, zoom: 16}, event)'>[+] zoom here</a>",
                icon: {
                    image: "img/img-theme/pin.png",
                    iconsize: [26, 46],
                    iconanchor: [12, 46]
                }
            },{
                address: "645 E. Shaw Avenue, Fresno, CA 93710",
                html: "<strong>California Office</strong><br>645 E. Shaw Avenue, Fresno, CA 93710<br><br><a href='#' onclick='mapCenterAt({latitude: 36.80948, longitude: -119.77598, zoom: 16}, event)'>[+] zoom here</a>",
                icon: {
                    image: "img/img-theme/pin.png",
                    iconsize: [26, 46],
                    iconanchor: [12, 46]
                }
            },{
                address: "New York, NY 10017",
                html: "<strong>New York Office</strong><br>New York, NY 10017<br><br><a href='#' onclick='mapCenterAt({latitude: 40.75198, longitude: -73.96978, zoom: 16}, event)'>[+] zoom here</a>",
                icon: {
                    image: "img/img-theme/pin.png",
                    iconsize: [26, 46],
                    iconanchor: [12, 46]
                }
            }];

            // Map Initial Location
            var initLatitude = 38.09024;
            var initLongitude = -98.71289;

            // Map Extended Settings
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

            // Map Center At
            var mapCenterAt = function(options, e) {
                e.preventDefault();
                $("#map").gMap("centerAt", options);
            }

        </script>