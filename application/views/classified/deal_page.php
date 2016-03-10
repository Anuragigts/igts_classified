	<title>Right Deals :: Deal</title>
	<style>
		.section-title-01{
		height: 273px;
		background-color: #262626;
		text-align: center;
		position: relative;
		width: 100%;
		overflow: hidden;
		}
		#scroll_area1 {
		  height: 200px;
		}
		#scroll_area2{
		  height: 200px;
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
    </script>
    <script type="text/javascript">
		$(document).ready(
			    function()
			    {
			        $("input:checkbox").change(
			            function()
			            {
			                    $("form.jforms").submit();
			            }
			        )
			        $('input:radio').click(function() {
							$("form.jforms").submit();
			            }
			        )
			        $('.dealtitle_sort').change(function() {
							$("form.jforms").submit();
			            }
			        )
			        $('.recentdays_sort').change(function() {
							$("form.jforms").submit();
			            }
			        )
			        $(".clear_location").click(function(){
			        	$('#latt').val('');
			        	$('#longg').val('');
			        	$('#find_loc').val('');
			        	$("form.jforms").submit();
			        });

			        $("#find_deal").click(function(){
			        	$("form").submit();
			        });
			    }
			);
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
			<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
		</div>
		<form action="<?php echo base_url(); ?>deal_page" method="post" class="j-forms jforms" style="background-color: white ! important;">
			<div class="content_info hotdeal_minheight">
				<div class="paddings">
					<div class="container">
						<div class="row">
							<div class="col-md-12 tabs-detailed deal_border">
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
														<?php foreach ($category as $categorycal) { ?>
														<option value="<?php echo $categorycal->category_id; ?>"><?php echo ucfirst($categorycal->category_name); ?></option>
														<?php } ?>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<div class="widget right-130">
													<div class="input">
														<input type="text" placeholder="Enter Location" id="find_loc" name="find_loc">
													</div>
													<button type="button" id='find_deal' name='find_deal' value="find_deal" class="bg addon-btn adn-130 adn-right">
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
							<div class="deal_result_hide result_hide" >
								<hr class="top_20 separator">
								<div class="col-sm-3 all_categories">
								<div class="container-by-widget-filter bg-dark color-white">
									<!-- Widget Filter -->
									<h3 class="title-widget">Filters</h3>
									<div class="cd-filter-block">
										<h4 class="title-widget">Location</h4>

										<div class="cd-filter-content">
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
													<i></i> Significant Deals
												</label>
											</div>
										</div> <!-- cd-filter-content -->
									</div> <!-- cd-filter-block -->
								</div>
							</div>
								<!-- Item Table-->
								<div class="col-md-9">
									<div class="sort-by-container tooltip-hover">
										<div class="row">
											<div class="col-md-12">
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
																<select name="dealtitle_sort" class="dealtitle_sort">
																	<option value="Any">Any</option>
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
																	<option value="Any">Any(Pricing)</option>
																	<option value="lowtohigh">Low to High</option>
																	<option value="hightolow">High to Low</option>
																</select>
																<i></i>
															</label>
														</div>
													</li>
													<li>
														<div class="top_bar_top">
															<label class="input select">
																<select name="recentdays_sort" class="recentdays_sort">
																	<option value="Any">Any(posted on)</option>
																	<option value="last24hours">Last 24 Hours</option>
																	<option value="last3days">Last 3 Days</option>
																	<option value="last7days">Last 7 Days</option>
																	<option value="last14days">Last 14 Days</option>
																	<option value="last1month">Last 1 month</option>
																</select>
																<i></i>
															</label>
														</div>
													</li>
												</ul>
											</div>
											
										</div>
									</div>
									<!-- sort-by-container-->

									<div class="row list_view_searches">
										<?php echo $this->load->view("classified/deal_page_search"); ?> 
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