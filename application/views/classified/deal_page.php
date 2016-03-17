	<title>Hot Deals | 99 Right Deals</title>
	<style>
		.section-title-01{
		height: 220px;
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
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>js/filter.css"> 
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
			        /*$('input:radio').click(function() {
							$("form.jforms").submit();
			            }*/
			        )
			        $('.dealtitle_sort').change(function() {
							$("form.jforms").submit();
			            }
			        )
			        $('.price_sort').change(function() {
							$("form.jforms").submit();
			            }
			        )
			        $('.recentdays_sort').change(function() {
							$("form.jforms").submit();
			            }
			        )
			        $("#find_deal").click(function(){
			        	$("form.jforms").submit();
			        });
			    }
			);
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
		<?php 
		foreach ($busconcount as $countval) {
		  	$allbustype = $countval->allbustype;
		  	$business = $countval->business;
		  	$consumer = $countval->consumer;
		  }
		  foreach ($deals_pck as $pckval) {
		  	$urgentcnt = $pckval->urgentcount;
		  	$platinumcnt = $pckval->platinumcount;
		  	$goldcnt = $pckval->goldcount;
		  	$freecnt = $pckval->freecount;
		  }
		$cat_id =  $this->session->userdata('cat_id');
		$bus_id =  $this->session->userdata('bus_id');
		$seller_id =  $this->session->userdata('seller_id');
		$search_sub =  $this->session->userdata('search_sub');
		$search_bustype = $this->session->userdata('search_bustype');
		$dealtitle = $this->session->userdata('dealtitle');
		$dealprice = $this->session->userdata('dealprice');
		$recentdays = $this->session->userdata('recentdays');
		$location = $this->session->userdata('location');
		$latt = $this->session->userdata('latt');
		$longg = $this->session->userdata('longg');
		 ?>

		 <!-- map on model -->
	   <script type="text/javascript">
		$(function(){
			$(".loc_map").click(function(){
				var val = $(".loc_map").attr("id");
				var val1 = val.split(",");
				$(".map_show").html('<iframe src = "https://maps.google.com/maps?q='+val1[0]+','+val1[1]+'&hl=es;z=5&amp;output=embed" width="950px" height="300px"></iframe>');
			});
		});
		</script>
	  <link rel="stylesheet" href="<?php echo base_url(); ?>libs/slider.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jssor.slider.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css">
	
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
		<form action="<?php echo base_url(); ?>deal_page/index" method="post" class="j-forms jforms" style="background-color: white ! important;">
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
													<input type="radio" name="business_type" class='bus_type' value="business" <?php if ($bus_id == 'business') {	echo "checked=checked";	} ?> >
													<i></i>Business 
												</label>
											</div>
											<div class="inline-group hot_deal_rad1">
												<label class="radio">
													<input type="radio" name="business_type" class='bus_type'  value="consumer" <?php if ($bus_id == 'consumer') {	echo "checked=checked";	} ?> >
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
													<select name="category_name" id="category_name">
														<option value="all" selected <?php if ($cat_id == 'all') { echo "selected=selected"; } ?> >All</option>
														<?php foreach ($category as $categorycal) { ?>
														<option value="<?php echo $categorycal->category_id; ?>" <?php if ($cat_id == $categorycal->category_id) { echo "selected=selected"; } ?> ><?php echo ucfirst($categorycal->category_name); ?></option>
														<?php } ?>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<div class="widget right-130">
													<div class="input">
														<input type="text" placeholder="Enter Location" id="find_loc" name="find_loc" value="<?php echo $location; ?>">
														<input type='hidden' name='latt' id='latt' value='<?php echo $latt; ?>' >
														<input type='hidden' name='longg' id='longg' value='<?php echo $longg ?>' >
													</div>
													<input type="submit" id='find_deal' name='find_deal' value="FindDeal" class="bg addon-btn adn-130 adn-right" />
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
											<h4 class="title-widget closed">Deal Type</h4>

											<div class="cd-filter-content" style="overflow: hidden; display: none;">
												<div>
													<label class="radio">
														<input type="radio" name="search_bustype" class="search_bustype" value="all" <?php if($search_bustype == 'all') echo 'checked = checked';?>  >
														<i></i> All (<?php echo $allbustype; ?>)
													</label>
													<label class="radio">
														<input type="radio" name="search_bustype" class="search_bustype" value="business" <?php if($search_bustype == 'business') echo 'checked = checked';?> >
														<i></i> Business (<?php echo $business; ?>)
													</label>
													<label class="radio">
														<input type="radio" name="search_bustype" class="search_bustype" value="consumer" <?php if($search_bustype == 'consumer') echo 'checked = checked';?> >
														<i></i> Consumer (<?php echo $consumer; ?>)
													</label>
												</div>
											</div>
											<?php 
											if ($cat_id) {
											if ($cat_id != 'all') { ?>
											 <div class="cd-filter-block">
												<h4 class="title-widget">Search Filters</h4>

												<div class="cd-filter-content">
													<?php if ($cat_id != '2' && $cat_id != '4' && $cat_id != '7') { ?>
													<div id='limit_scrol'>
														<?php foreach ($subcat_cnt as $subcat_cntval) { ?>
															<label class="checkbox">
																<input type="checkbox" name="search_sub[]" class="search_sub" value="<?php echo $subcat_cntval->sub_category_id; ?>" <?php if (isset($search_sub) && in_array($subcat_cntval->sub_category_id, $search_sub)) { echo "checked = checked";	} ?> >
																<i></i> <?php echo $subcat_cntval->sub_category_name; ?> (<?php echo $subcat_cntval->no_ads; ?>)
															</label>
														<?php } ?>
													</div>
													<?php }
													else{ ?>
														<div>
															<?php foreach ($subcat_cnt as $subcat_cntval) { ?>
																<label class="checkbox">
																	<input type="checkbox" name="search_sub[]" class="search_sub" value="<?php echo $subcat_cntval->sub_category_id; ?>" <?php if (isset($search_sub) && in_array($subcat_cntval->sub_category_id, $search_sub)) { echo "checked = checked";	} ?> >
																	<i></i> <?php echo $subcat_cntval->sub_category_name; ?> (<?php echo $subcat_cntval->no_ads; ?>)
																</label>
															<?php } ?>
														</div>
													<?php } ?>
												</div>
											</div> 
											<?php  }
												}
											 ?>
											 <?php 
											if ($cat_id) {
											if ($cat_id != 'all') { ?>
											 <div class="cd-filter-block">
												<h4 class="title-widget">Seller Only</h4>

												<div class="cd-filter-content">
													<div>
														<?php
														 foreach ($sellercount as $val) {
														 	foreach ($val as $k => $value) {
														  ?>
															<label class="checkbox">
																<input type="checkbox" name="seller_id[]" class="seller_id" value="<?php echo $k; ?>" <?php if (isset($seller_id) && in_array($k, $seller_id)) { echo "checked = checked";	} ?> >
																<i></i> <?php echo $k; ?> (<?php echo $value; ?>)
															</label>
														<?php } } ?>
													</div>
												</div>
											</div>
											<?php } } ?>
										</div>
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
																	<option value="Any" <?php if($dealtitle == 'Any') echo 'selected = selected';?> >Any</option>
																	<option value="atoz" <?php if($dealtitle == 'atoz') echo 'selected = selected';?> >A to Z</option>
																	<option value="ztoa" <?php if($dealtitle == 'ztoa') echo 'selected = selected';?> >Z to A</option>
																</select>
																<i></i>
															</label>
														</div>
	                                                </li>
													<li>
														<div class="top_bar_top">
															<label class="input select">
																<select name="price_sort" class="price_sort">
																	<option value="Any" <?php if($dealprice == 'Any') echo 'selected = selected';?> >Any(Pricing)</option>
																	<option value="lowtohigh" <?php if($dealprice == 'lowtohigh') echo 'selected = selected';?> >Low to High</option>
																	<option value="hightolow" <?php if($dealprice == 'hightolow') echo 'selected = selected';?> >High to Low</option>
																</select>
																<i></i>
															</label>
														</div>
	                                                </li>
	                                                <li>
														<div class="top_bar_top">
															<label class="input select">
																	<select name="recentdays_sort" class="recentdays_sort">
																		<option value="Any" <?php if($recentdays == 'Any') echo 'selected = selected';?> >Any(posted on)</option>
																		<option value="last24hours" <?php if($recentdays == 'last24hours') echo 'selected = selected';?> >Last 24 Hours</option>
																		<option value="last3days" <?php if($recentdays == 'last3days') echo 'selected = selected';?> >Last 3 Days</option>
																		<option value="last7days" <?php if($recentdays == 'last7days') echo 'selected = selected';?> >Last 7 Days</option>
																		<option value="last14days" <?php if($recentdays == 'last14days') echo 'selected = selected';?> >Last 14 Days</option>
																		<option value="last1month" <?php if($recentdays == 'last1month') echo 'selected = selected';?> >Last 1 month</option>
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
	<!--MAP Modal -->
	<div class="modal fade" id="map_location" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<!-- <form action="#" method="post" class="j-forms " > -->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2>Map Location</h2>
					</div>
					<div class="modal-body map_show">
						
					</div>
				</div>
			<!-- </form> -->
		</div>
	</div>
	
	
	