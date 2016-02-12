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
        	/*find search deal*/
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

        	/*search filters*/
        	$(".searchdealpostad").click(function(){
        		var latt = $("#latt").val();
        		var longg = $("#longg").val();
        		if ($("input:radio[name=business_type]").is(":checked")) {
        			var bustype = $("input[name=business_type]:checked").val();
        		}else{
        			var bustype = 0;
        		}
        		var cat = $("#category_name").val();
        		/*deal last postad */
        		var postadtime_list = [];
        		$("input[name='last_dealpostad[]']:checked").each( function () {
					 var postad = $(this).val();
				     postadtime_list.push(postad); 
				});
        		$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>deal_page/search_filters",
					data: {
						cat: cat,
						latt: latt,
						longg: longg,
						bustype: bustype,
						postadtime_list: postadtime_list
					},
					success: function (data) {
						$(".search_result").html(data);
					}
				})
        	});

			$(".dealurgent").click(function(){
        		var latt = $("#latt").val();
        		var longg = $("#longg").val();
        		if ($("input:radio[name=business_type]").is(":checked")) {
        			var bustype = $("input[name=business_type]:checked").val();
        		}else{
        			var bustype = 0;
        		}
        		var cat = $("#category_name").val();
        		/*deal urgent */
        		var urgenttime_list = [];
        		$("input[name='dealurgent[]']:checked").each( function () {
					 var urgent = $(this).val();
				     urgenttime_list.push(urgent); 
				});
				/*deal location search */
        		var location_list = [];
        		$("input[name='loc_search[]']:checked").each( function () {
					 var location = $(this).val();
				     location_list.push(location); 
				});
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>deal_page/search_filters",
					data: {
						cat: cat,
						latt: latt,
						longg: longg,
						bustype: bustype,
						urgenttime_list: urgenttime_list,
						location_list: location_list
					},
					success: function (data) {
						$(".search_result").html(data);
					}
				})
        	});
	
			$(".loc_search").click(function(){

        		var latt = $("#latt").val();
        		var longg = $("#longg").val();
        		if ($("input:radio[name=business_type]").is(":checked")) {
        			var bustype = $("input[name=business_type]:checked").val();
        		}else{
        			var bustype = 0;
        		}
        		var cat = $("#category_name").val();
        		/*deal location search */
        		var location_list = [];
        		$("input[name='loc_search[]']:checked").each( function () {
					 var location = $(this).val();
				     location_list.push(location); 
				});

				/*deal urgent */
        		var urgenttime_list = [];
        		$("input[name='dealurgent[]']:checked").each( function () {
					 var urgent = $(this).val();
				     urgenttime_list.push(urgent); 
				});
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>deal_page/search_filters",
					data: {
						cat: cat,
						latt: latt,
						longg: longg,
						bustype: bustype,
						location_list: location_list,
						urgenttime_list: urgenttime_list
					},
					success: function (data) {
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
										<h4 class="title-widget closed">Deals posted</h4>

										<div class="cd-filter-content" style="overflow: hidden; display: none;">
											<div id="limit_scrol">
												<label class="checkbox">
													<input type="checkbox" name="last_dealpostad[]" class='searchdealpostad' value="last24hours" >
													<i></i>Last 24 Hours
												</label>
												<label class="checkbox">
													<input type="checkbox" name="last_dealpostad[]" class='searchdealpostad' value="last3days" >
													<i></i> Last 3 Days
												</label>
												<label class="checkbox">
													<input type="checkbox" name="last_dealpostad[]" class='searchdealpostad' value="last7days" >
													<i></i> Last 7 Days
												</label>
												<label class="checkbox">
													<input type="checkbox" name="last_dealpostad[]" class='searchdealpostad' value="last14days" >
													<i></i> Last 14 Days
												</label>
												<label class="checkbox">
													<input type="checkbox" name="last_dealpostad[]" class='searchdealpostad' value="1month" >
													<i></i> Last 1 Month
												</label>
											</div>
										</div>
									</div>

									<div class="cd-filter-block">
										<h4 class="title-widget closed">Location</h4>

										<div class="cd-filter-content" style="overflow: hidden; display: none;">
											<div id="limit_scrol">
												<?php foreach ($loc_list as $loc_val) {
													$loc_name = explode(",", $loc_val->loc_name);
												 ?>
												<label class="checkbox">
													<input type="checkbox" name="loc_search[]" class='loc_search' value="<?php echo $loc_val->latt.",".$loc_val->longg; ?>" >
													<i></i> <?php echo $loc_name[2]; ?>
												</label>
												<?php } ?>
											</div>
										</div> <!-- cd-filter-content -->
									</div> <!-- cd-filter-block -->
									
									<div class="cd-filter-block">
										<h4 class="title-widget">Search Only</h4>

										<div class="cd-filter-content">
											<div>
												<label class="checkbox">
													<input type="checkbox" name="dealurgent[]" class="dealurgent"  value="urgent" >
													<i></i> Urgent Deals 
												</label>
												<label class="checkbox">
													<input type="checkbox" name="dealurgent[]" class="dealurgent" value="platinum" >
													<i></i> Platinum Deals
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