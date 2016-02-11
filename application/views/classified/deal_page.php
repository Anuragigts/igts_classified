	<title>365 Deals :: Deal</title>
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
	
	<link rel="stylesheet" href="js/filter.css"> 
	<script type="text/javascript">
		$(document).ready(function() {
		  $('.cd-filter-content').niceScroll({
			autohidemode: 'false',     
			cursorborderradius: '0px', 
			background: '#E5E9E7',     
			cursorwidth: '8px',       
			cursorcolor: '#E95413'     
		  });
		});
	</script>
	<style type="text/css">
		#scroll_area1 {
		  height: 200px;
		}
		#scroll_area2{
		  height: 200px;
		}
	</style>
	
	

	 <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('find_loc'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();
                $("#latt").val(latitude);
                $("#longg").val(longitude);
            });
        });

        $(function(){
        	$("#find_deal").click(function(){
        		var cat = $("#category_name").val();
        		var latt = $("#latt").val();
        		var longg = $("#longg").val();
        		var bustype = $("input[name=business_type]:checked").val();
        		$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>deal_page/result_form",
					data: {
						cat: cat,
						latt: latt,
						longg: longg,
						bustype: bustype
					},
					success: function (data) {
						$(".result_hide").css("display", 'block');
						$(".search_result").html(data);
					}
				})
        	});
        });
    </script>
	  
	<link rel="stylesheet" href="j-folder/css/j-forms.css">
	
	<!-- Section Title-->    
	<div class="section-title-01">
		<!-- Parallax Background -->
		<div class="bg_parallax image_01_parallax"></div>
	</div>
	<!-- End Section Title-->
	
	<!--Content Central -->
	<section class="content-central">
		<!-- Shadow Semiboxed -->
		<div class="semiboxshadow text-center">
			<img src="img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
		</div>
		<form action="" method="post" class="j-forms" style="background-color: white ! important;">
			<div class="content_info">
				<div class="paddings">
					<div class="container">
						<div class="row">
							<div class="col-md-12 tabs-detailed">
								<!-- Nav Tabs-->
								<div class="titles">
									<h2>HOT DEALS <span>CATEGORIES </span></h2>
									<hr class="tall">
								</div>
								<div class="row">
									<div class="col-sm-4 col-sm-offset-4">
										<div class="unit check logic-block-radio">
											<div class="inline-group hot_deal_rad">
												<label class="radio">
													<input type="radio" name="business_type" class='bus_type' value="business">
													<i></i>Business 
												</label>
											</div>
											<div class="inline-group hot_deal_rad1">
												<label class="radio">
													<input type="radio" name="business_type" class='bus_type'  value="consumer">
													<i></i>Consumer 
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row top_20">
									<div class="col-sm-8 col-sm-offset-2">
										<div class="row">
											<div class="span6 unit">
												<label class="input select">
													<input type='hidden' name='latt' id='latt' value='' >
													<input type='hidden' name='longg' id='longg' value='' >
													<select name="category_name" id="category_name">
														<option value="all" selected >All</option>
														<option value="ezone">E-Zone</option>
														<option value="motorpoint">Motor Point</option>
														<option value="clothing_&_lifestyles">Clothing & LifeStyles</option>
														<option value="services">Services</option>
														<option value="findaproperty">Find a Property</option>
														<option value="kitchenhome">Home & Kitchen</option>
														<option value="pets">Pets</option>
														<option value="jobs">Jobs</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<div class="widget right-130">
													<div class="input">
														<input type="text" placeholder="Enter Location" id="find_loc" name="find_loc">
													</div>
													<button type="button" id='find_deal' class="bg addon-btn adn-130 adn-right">
														Find a Deal
													</button>
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
							<div class="deal_result_hide result_hide" style='display:none;'>
								<hr class="top_20 separator">
								<div class="col-sm-3 all_categories">
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
										</div> <!-- cd-filter-content -->
									</div> <!-- cd-filter-block -->
									
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
										</div> <!-- cd-filter-content -->
									</div> <!-- cd-filter-block -->
								</div>
								<div class="row top_20">
									<div class="col-sm-12">
										<iframe id="google_ad_92003487801" sandbox="allow-scripts" src="https://tpc.googlesyndication.com/sadbundle/11713703021028404835/300x250/300x250_RI.html#t=2984758803809756206&amp;p=https%3A%2F%2Fgoogleads.g.doubleclick.net" scrolling="no" style="border:0;overflow:hidden;" frameborder="0" height="250" width="260"></iframe>
									</div>
								</div>
								<div class="row top_20">
									<div class="col-sm-12">
										<iframe id="google_ad_92003487801" sandbox="allow-scripts" src="https://tpc.googlesyndication.com/sadbundle/11713703021028404835/300x250/300x250_RI.html#t=2984758803809756206&amp;p=https%3A%2F%2Fgoogleads.g.doubleclick.net" scrolling="no" style="border:0;overflow:hidden;" frameborder="0" height="250" width="260"></iframe>
									</div>
								</div>
							</div>
								<!-- Item Table-->
								<div class="col-sm-3" style="display: none;">
									<div class="container-by-widget-filter bg-dark color-white">
										<!-- Widget Filter -->
										<h3 class="title-widget">Cars Filter</h3>
										<div class="cd-filter-block">
											<h4 class="title-widget">Body Type</h4>
											<div class="cd-filter-content">
												<div  id="scroll_area1">
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> All 
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> 2 Door Saloon
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> 4 Door Saloon
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Saloon
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Convertible
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Coupe 
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Estate
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> 3 Door Hatchback
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> 5 Door Hatchback 
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Sports
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Light 4x4 Utility
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> MPV
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Others
													</label>
												</div>
											</div> 
										</div> 

										<div class="cd-filter-block">
											<h4 class="title-widget closed">Fuel type</h4>

											<div class="cd-filter-content" style="display: none;">
												<div>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i>Petrol
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Diesel
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Other
													</label>
												</div>
											</div> 
										</div> 
										
										<div class="cd-filter-block">
											<h4 class="title-widget closed">Mileage</h4>

											<div class="cd-filter-content" style="display: none;">
												<div>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> All 
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Up to 15,000 miles 
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Up to 30,000 miles
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Up to 60,000 miles
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Up to 80,000 miles
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Over 80,000 miles
													</label>
												</div>
											</div>
										</div>
										
										<div class="cd-filter-block">
											<h4 class="title-widget closed">Seller Type</h4>

											<div class="cd-filter-content" style="display: none;">
												<div>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> All 
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Trade
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Private
													</label>
												</div>
											</div> 
										</div> 
										
										<div class="cd-filter-block">
											<h4 class="title-widget closed">Transmission</h4>

											<div class="cd-filter-content" style="display: none;">
												<div>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Any 
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Manual
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Automatic
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Others
													</label>
												</div>
											</div> 
										</div>
										
										<div class="cd-filter-block">
											<h4 class="title-widget closed">Engine Size</h4>

											<div class="cd-filter-content" style="display: none;">
												<div id="scroll_area1">
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Any
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Up to 999 cc 
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> 1,000 - 1,999 cc
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> 2,000 - 2,999 cc
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> 3,000 - 3,999 cc
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> 4,000 - 4,999 cc
													</label>
													<label class="checkbox">
														<input type="checkbox" name="" value="" >
														<i></i> Over 4,999 cc
													</label>
												</div>
											</div> 
										</div>
										
										<div class="cd-filter-block">
											<h4 class="title-widget closed">Search Only</h4>

											<div class="cd-filter-content" style="display: none;">
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
														<a href="deal_page_box">
															<i class="fa fa-th-large"></i>
														</a>
													</li>
													<li data-toggle="tooltip" title="" data-original-title="LIST VIEW" class="active">
														<a href="deal_page">
															<i class="fa fa-list"></i>
														</a>
													</li> 
												</ul>
											</div>
										</div>
									</div>
									<!-- sort-by-container-->

									<div class="row list_view_searches search_result">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
	<!-- End Shadow Semiboxed -->
	
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="libs/jquery.xuSlider.js"></script>
	
	<script src="js/jquery.nicescroll.js"></script> 

	<script src="libs/jquery.mixitup.min.js"></script>
	<script src="libs/main.js"></script>