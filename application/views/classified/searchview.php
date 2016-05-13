<!DOCTYPE html>
<html>
	<head>
		
		<title>Right Deals :: Main Search</title>
		
		<!-- xxx Head Content xxx -->
		<?php echo $this->load->view('common/head');?> 
		<!-- xxx End xxx -->
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>js/jquery.cleditor.css" />
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>js/filter.css"> 
		<link rel="stylesheet" href="<?php echo base_url(); ?>libs/slider.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jssor.slider.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {
			  $('.cd-filter-content').niceScroll({
				autohidemode: 'false',     
				cursorborderradius: '0px', 
				background: '#f4f4f4',     
				cursorwidth: '8px',       
				cursorcolor: '#E95413'     
			  });
			});
		</script>

	
	
		<script type="text/javascript">
			$(function(){
				$(".loc_map").click(function(){
					var val = $(".loc_map").attr("id");
					var val1 = val.split(",");
					$(".map_show").html('<iframe src = "https://maps.google.com/maps?q='+val1[0]+','+val1[1]+'&hl=es;z=5&amp;output=embed" width="950px" height="300px"></iframe>');
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
					$('.price_sort').change(function() {
							$("form.jforms").submit();
						}
					)
					$('.recentdays_sort').change(function() {
							$("form.jforms").submit();
						}
					)
					$(".seach_btn").click(function(){
						if ($('#find_loc').val() == '') {
							$('#latt').val('');
							$('#longg').val('');
							$("form.jforms").submit();
						}
						else{
							$("form.jforms").submit();
						}
					});
				}
			);
		</script>

		<script type="text/javascript">
			$("form").submit(function(){
			    var uri = window.location.toString();
				if (uri.indexOf("?") > 0) {
				    var clean_uri = uri.substring(0, uri.indexOf("?"));
				    window.history.replaceState({}, document.title, clean_uri);
				}
			});
			
		</script>
			  <?php
			  if (array_key_exists('allbustype', $busconcount)) {
				   $allbustype = $busconcount['allbustype'];
				}
				if (array_key_exists('business', $busconcount)) {
				   $business = $busconcount['business'];
				}
				if (array_key_exists('consumer', $busconcount)) {
				   $consumer = $busconcount['consumer'];
				}
			  foreach ($public_adview as $publicview) {
			  	$left_ad1 = $publicview->sidead_one;
			  	$topad = $publicview->topad;
			  	$mid_ad = $publicview->mid_ad;
			  }

			$miles =  $this->session->userdata('miles');
			$looking_search = $this->session->userdata('s_looking_search'); 
			$cat_id =  $this->session->userdata('s_cat_id');
			$search_sub = $this->session->userdata('s_search_sub'); 
			$search_subsub =  $this->session->userdata('s_search_subsub');
			$dealtitle = $this->session->userdata('s_dealtitle');
			$dealprice = $this->session->userdata('s_dealprice');
			$recentdays = $this->session->userdata('s_recentdays');
			$search_bustype = $this->session->userdata('s_search_bustype');
			$location = $this->session->userdata('s_location');
			$latt = $this->session->userdata('s_latt');
			$longg = $this->session->userdata('s_longg');
			$seller_deals = $this->session->userdata('s_seller_deals');
			$dealurgent = $this->session->userdata('s_dealurgent');
			if ($cat_id == 1) {
			  	 if (array_key_exists('company', $sellerneededcount)) {
					   $company = $sellerneededcount['company'];
				}
				if (array_key_exists('Agency', $sellerneededcount)) {
				   $agency = $sellerneededcount['Agency'];
				}
				if (array_key_exists('Other', $sellerneededcount)) {
				   $other = $sellerneededcount['Other'];
				}
			}
			if ($cat_id == 2) {
				  if (array_key_exists('provider', $sellerneededcount)) {
					   $seller = $sellerneededcount['provider'];
				}
				if (array_key_exists('needed', $sellerneededcount)) {
				   $needed = $sellerneededcount['needed'];
				}

			}
			if ($cat_id == 3) {
				   if (array_key_exists('seller', $sellerneededcount)) {
					   $seller = $sellerneededcount['seller'];
				}
				 if (array_key_exists('needed', $sellerneededcount)) {
					   $needed = $sellerneededcount['needed'];
				}
				 if (array_key_exists('forhire', $sellerneededcount)) {
					   $forhire = $sellerneededcount['forhire'];
				}
			}
			if ($cat_id == 4) {
				/*foreach ($sellerneededcount as $sncnt) {
				$offered = $sncnt->offered;
				$wanted = $sncnt->wanted;
				}*/
				if (array_key_exists('offered', $sellerneededcount)) {
					   $offered = $sellerneededcount['offered'];
				}
				 if (array_key_exists('wanted', $sellerneededcount)) {
					   $wanted = $sellerneededcount['wanted'];
				}
			}
			if ($cat_id == 5) {
				/*foreach ($sellerneededcount as $sncnt) {
				$seller = $sncnt->seller;
				$needed = $sncnt->needed;
		  		}*/
		  		if (array_key_exists('seller', $sellerneededcount)) {
					   $seller = $sellerneededcount['seller'];
				}
				 if (array_key_exists('needed', $sellerneededcount)) {
					   $needed = $sellerneededcount['needed'];
				}
			}
			if ($cat_id == 6) {
				/*foreach ($sellerneededcount as $sncnt) {
						$seller = $sncnt->seller;
						$needed = $sncnt->needed;
						$charity = $sncnt->charity;
				  }*/
				  if (array_key_exists('seller', $sellerneededcount)) {
					   $seller = $sellerneededcount['seller'];
				}
				 if (array_key_exists('needed', $sellerneededcount)) {
					   $needed = $sellerneededcount['needed'];
				}
				if (array_key_exists('charity', $sellerneededcount)) {
					   $charity = $sellerneededcount['charity'];
				}
			}
			if($cat_id == 7) {
				/*foreach ($sellerneededcount as $sncnt) {
					$seller = $sncnt->seller;
					$needed = $sncnt->needed;
					$charity = $sncnt->charity; 
				  }*/
				  if (array_key_exists('seller', $sellerneededcount)) {
					   $seller = $sellerneededcount['seller'];
				}
				 if (array_key_exists('needed', $sellerneededcount)) {
					   $needed = $sellerneededcount['needed'];
				}
				if (array_key_exists('charity', $sellerneededcount)) {
					   $charity = $sellerneededcount['charity'];
				}
			}
			if($cat_id == 8) {
				/*foreach ($sellerneededcount as $sncnt) {
				  	$seller = $sncnt->seller;
				  	$needed = $sncnt->needed;
				  }*/
				  if (array_key_exists('seller', $sellerneededcount)) {
					   $seller = $sellerneededcount['seller'];
				}
				 if (array_key_exists('needed', $sellerneededcount)) {
					   $needed = $sellerneededcount['needed'];
				}
			}
			// print_r($deals_pck);
			if (array_key_exists('urgentcount', $deals_pck)) {
			   $urgentcnt = $deals_pck['urgentcount'];
			}
			if (array_key_exists('platinumcount', $deals_pck)) {
			   $platinumcnt = $deals_pck['platinumcount'];
			}
			if (array_key_exists('goldcount', $deals_pck)) {
			   $goldcnt = $deals_pck['goldcount'];
			}
			if (array_key_exists('freecount', $deals_pck)) {
			   $freecnt = $deals_pck['freecount'];
			}
			
			$car_van_bus = $this->session->userdata('car_van_bus');
            $motor_hm = $this->session->userdata('motor_hm');
            $bikes_sub = $this->session->userdata('bikes_sub');
            $plant_farm = $this->session->userdata('plant_farm');
            $boats_sub = $this->session->userdata('boats_sub');
	   ?>
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
				<div class="semiboxshadow text-center">
					<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
				</div>
				<form id="j-forms2" action="" method='get' class="j-forms jforms" style="background-color: rgb(255, 255, 255) !important;" autocomplete="off">
					<div class="content_info">
						<div class="paddings">
							<div class="container pad_bott_50">
								<div class="row">
									<div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 search_menu">
										<div class="row">
											<div class="col-md-4 col-sm-4 col-xs-12">
												<div class="input">
													<input type="text" id="looking_search" name="looking_search" placeholder="I'm looking for" value="<?php echo $looking_search; ?>">
												</div>
											</div>
											<div class="col-md-3 col-sm-3 col-xs-12 top_pad_10">
												<label class="input select">
													<select class="guests-input" name="category_name">
														<option value="all" <?php if ($cat_id == 'all') { echo "selected=selected"; } ?>>All</option>
														<?php foreach ($show_all as $show_val) { ?>
														<option value="<?php echo $show_val->category_id; ?>" <?php if ($cat_id == $show_val->category_id) { echo "selected=selected"; } ?>><?php echo ucwords($show_val->category_name); ?></option>
														<?php	} ?>
													</select>
													<i></i>
												</label>
											</div>

											<div class="col-md-5 col-sm-5 col-xs-12 top_pad_10">
												<div class="row">
													<div class="col-md-8 col-sm-8 col-xs-12">
														<div class="input">
															<label class="icon-left" for="">
																<i class="fa fa-search"></i>
															</label>
															<input type="text" placeholder="Enter a Location" id="list-autocomplete" name="list-autocomplete" value="<?php echo $location; ?>">
														</div>
													</div>
													<div class="col-md-4 col-sm-4 col-xs-12 top_pad_10">
														<input type="submit" class="primary-btn seach_btn" name='' Value="Search">
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
									<div class="col-md-3 col-sm-3">
										<div class="container-by-widget-filter bg-dark color-white cloth_h3">
											<!-- Widget Filter -->
											<?php 
												if ($cat_id) {
												if ($cat_id == 'all') { ?>
												<h3 class="title-widget">Home Search Filter</h3>
												<?php }?>
												<?php if ($cat_id == '1') { ?>
												<h3 class="title-widget">Jobs Search Filter</h3>
												<?php }?>
												<?php if ($cat_id == '2') { ?>
												<h3 class="title-widget">Services Search Filter</h3>
												<?php }?>
												<?php if ($cat_id == '3') { ?>
												<h3 class="title-widget">Motor Search Filter</h3>
												<?php }?>
												<?php if ($cat_id == '4') { ?>
												<h3 class="title-widget">Property Search Filter</h3>
												<?php }?>
												<?php if ($cat_id == '5') { ?>
												<h3 class="title-widget">Pets Search Filter</h3>
												<?php }?>
												<?php if ($cat_id == '6') { ?>
												<h3 class="title-widget">Clothing & Lifestyles Search Filter</h3>
												<?php }?>
												<?php if ($cat_id == '7') { ?>
												<h3 class="title-widget">Home & kitchen Search Filter</h3>
												<?php }?>
												<?php if ($cat_id == '8') { ?>
												<h3 class="title-widget">E-Zone Search Filter</h3>
												<?php }?>
											<?php } ?>
											<div class="cd-filter-block">
												<h4 class="title-widget ">Deal Type</h4>

												<div class="cd-filter-content" >
													<div>
														<label class="radio">
															<input type="radio" name="search_bustype" class="search_bustype" value="all" <?php if($search_bustype == 'all') echo 'checked = checked';?> checked >
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
											</div>

													<?php 
														if ($cat_id) {
														if ($cat_id != 'all') { ?>
															<?php if ($cat_id == '1') { ?>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Jobs Search Filters</h4>
																	<div class="cd-filter-content">
																		<div id='limit_scrol'>
																			<?php foreach ($subcat_cnt as $subcat_cntval) { ?>
																				<label class="checkbox">
																					<input type="checkbox" name="search_sub[]" class="search_sub" value="<?php echo $subcat_cntval->sub_category_id; ?>" <?php if (isset($search_sub) && in_array($subcat_cntval->sub_category_id, $search_sub)) { echo "checked = checked";	} ?> >
																					<i></i> <?php echo $subcat_cntval->sub_category_name; ?> (<?php echo $subcat_cntval->no_ads; ?>)
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Seller Type</h4>

																	<div class="cd-filter-content" >
																		<div>
																			<label class="checkbox">
																				<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Company" <?php if(isset($seller_deals) && in_array('Company',$seller_deals)){ echo 'checked = checked';}?> >
																				<i></i> Company Deals (<?php echo $company; ?>)
																			</label>
																			<label class="checkbox">
																				<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Agency" <?php if(isset($seller_deals) && in_array('Agency',$seller_deals)){ echo 'checked = checked';}?> >
																				<i></i> Agency Deals (<?php echo $agency; ?>)
																			</label>
																			<label class="checkbox">
																				<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Other" <?php if(isset($seller_deals) && in_array('Other',$seller_deals)){ echo 'checked = checked';}?> >
																				<i></i> Other Deals (<?php echo $other; ?>)
																			</label>
																		</div>
																	</div> 
																</div>
															<?php }		?>

															<?php if ($cat_id == '2') { ?>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Professional</h4>
																	<div class="cd-filter-content">
																		<div id='limit_scrol'>
																			<?php foreach ($subcat_prof as $subcat_profval) { ?>
																				<label class="checkbox">
																					<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_profval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_profval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																					<i></i> <?php echo $subcat_profval->sub_subcategory_name; ?> (<?php echo $subcat_profval->no_ads; ?>)
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Popular</h4>
																	<div class="cd-filter-content">
																		<div id='limit_scrol'>
																			<?php foreach ($subcat_pop as $subcat_popval) { ?>
																				<label class="checkbox">
																					<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_popval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_popval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																					<i></i> <?php echo $subcat_popval->sub_subcategory_name; ?> (<?php echo $subcat_popval->no_ads; ?>)
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<div class="cd-filter-block">
																	<h4 class="title-widget ">Seller Type</h4>

																	<div class="cd-filter-content" >
																		<div>
																			<label class="checkbox">
																				<input type="checkbox" name="seller_deals[]" class='seller_deals' <?php if(isset($seller_deals) && in_array('service_provider',$seller_deals)) echo 'checked = checked';?> value="service_provider" >
																				<i></i> Service provider (<?php echo $seller; ?>)
																			</label>
																			<label class="checkbox">
																				<input type="checkbox" name="seller_deals[]" class='seller_deals' <?php if(isset($seller_deals) && in_array('service_needed',$seller_deals)) echo 'checked = checked';?> value="service_needed" >
																				<i></i> Service Needed (<?php echo $needed; ?>)
																			</label>
																		</div>
																	</div> 
																</div>
																
															<?php }		?>
															<!-- motor point -->
															<?php if ($cat_id == 3) { ?>
															<div class="cd-filter-block">
																<h4 class="title-widget">Cars Filters</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_cars as $subcat_carsval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="car_van_bus[]" class="car_van_bus" value="<?php echo $subcat_carsval->sub_subcategory_id; ?>" <?php if (isset($car_van_bus) && in_array($subcat_carsval->sub_subcategory_id, $car_van_bus)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_carsval->sub_subcategory_name; ?> (<?php echo $subcat_carsval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Bikes Filters</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_bikes as $subcat_bikesval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="bikes_sub[]" class="bikes_sub" value="<?php echo $subcat_bikesval->sub_subcategory_id; ?>" <?php if (isset($bikes_sub) && in_array($subcat_bikesval->sub_subcategory_id, $bikes_sub)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_bikesval->sub_subcategory_name; ?> (<?php echo $subcat_bikesval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Motor Homes Filters</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_motorhomes as $subcat_motorhomesval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="motor_hm[]" class="motor_hm" value="<?php echo $subcat_motorhomesval->sub_subcategory_id; ?>" <?php if (isset($motor_hm) && in_array($subcat_motorhomesval->sub_subcategory_id, $motor_hm)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_motorhomesval->sub_subcategory_name; ?> (<?php echo $subcat_motorhomesval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Vans, Trucks & SUV's</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_vans as $subcat_vansval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="car_van_bus[]" class="car_van_bus" value="<?php echo $subcat_vansval->sub_subcategory_id; ?>" <?php if (isset($car_van_bus) && in_array($subcat_vansval->sub_subcategory_id, $car_van_bus)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_vansval->sub_subcategory_name; ?> (<?php echo $subcat_vansval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">coaches & buses</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_buses as $subcat_busesval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="car_van_bus[]" class="car_van_bus" value="<?php echo $subcat_busesval->sub_subcategory_id; ?>" <?php if (isset($car_van_bus) && in_array($subcat_busesval->sub_subcategory_id, $car_van_bus)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_busesval->sub_subcategory_name; ?> (<?php echo $subcat_busesval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Plant Machinery</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_plant as $subcat_plantval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="plant_farm[]" class="plant_farm" value="<?php echo $subcat_plantval->sub_subcategory_id; ?>" <?php if (isset($plant_farm) && in_array($subcat_plantval->sub_subcategory_id, $plant_farm)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_plantval->sub_subcategory_name; ?> (<?php echo $subcat_plantval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Farming Vehicles</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_farming as $subcat_farmingval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="plant_farm[]" class="plant_farm" value="<?php echo $subcat_farmingval->sub_subcategory_id; ?>" <?php if (isset($plant_farm) && in_array($subcat_farmingval->sub_subcategory_id, $plant_farm)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_farmingval->sub_subcategory_name; ?> (<?php echo $subcat_farmingval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Boats</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_boats as $subcat_boatsval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="boats_sub[]" class="boats_sub" value="<?php echo $subcat_boatsval->sub_subcategory_id; ?>" <?php if (isset($boats_sub) && in_array($subcat_boatsval->sub_subcategory_id, $boats_sub)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_boatsval->sub_subcategory_name; ?> (<?php echo $subcat_boatsval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget ">Seller Type</h4>

																<div class="cd-filter-content">
																	<div>
																		<label class="checkbox">
																			<input type="checkbox" name="seller_deals[]" class='seller_deals' <?php if(isset($seller_deals) && in_array('Seller',$seller_deals)) echo 'checked = checked';?> value="Seller" >
																			<i></i> Seller Deals (<?php echo $seller; ?>)
																		</label>
																		<label class="checkbox">
																			<input type="checkbox" name="seller_deals[]" class='seller_deals' <?php if(isset($seller_deals) && in_array('Needed',$seller_deals)) echo 'checked = checked';?> value="Needed" >
																			<i></i> Needed Deals (<?php echo $needed; ?>)
																		</label>
																		<label class="checkbox">
																			<input type="checkbox" name="seller_deals[]" class='seller_deals' <?php if(isset($seller_deals) && in_array('ForHire',$seller_deals)) echo 'checked = checked';?> value="ForHire" >
																			<i></i> ForHire Deals (<?php echo $forhire; ?>)
																		</label>
																	</div>
																</div> 
															</div>
															<?php } ?>
															<!-- find a property -->
															<?php if ($cat_id == '4') { ?>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Residential</h4>
																	<div class="cd-filter-content">
																		<div>
																			<?php foreach ($subcat_resi as $subcat_resival) { ?>
																				<label class="checkbox">
																					<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_resival->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_resival->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																					<i></i> <?php echo $subcat_resival->sub_subcategory_name; ?> (<?php echo $subcat_resival->no_ads; ?>)
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Commercial</h4>
																	<div class="cd-filter-content">
																		<div>
																			<?php foreach ($subcat_comm as $subcat_commval) { ?>
																				<label class="checkbox">
																					<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_commval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_commval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																					<i></i> <?php echo $subcat_commval->sub_subcategory_name; ?> (<?php echo $subcat_commval->no_ads; ?>)
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<div class="cd-filter-block">
																	<h4 class="title-widget ">Seller Type</h4>

																	<div class="cd-filter-content" >
																		<div>
																			<label class="checkbox">
																				<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Offered" <?php if(isset($seller_deals) && in_array('Offered',$seller_deals)) echo 'checked = checked';?> >
																				<i></i> Offered Deals (<?php echo $offered; ?>)
																			</label>
																			<label class="checkbox">
																				<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Wanted" <?php if(isset($seller_deals) && in_array('Wanted',$seller_deals)) echo 'checked = checked';?> >
																				<i></i> Wanted Deals (<?php echo $wanted; ?>)
																			</label>
																		</div>
																	</div> 
																</div>
															<?php }		?>
															<!-- pets  -->
															<?php if ($cat_id == '5') { ?>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Pets Search Filters</h4>
																	<div class="cd-filter-content">
																		<div>
																			<?php foreach ($subcat_pets as $subcat_petsval) { ?>
																				<label class="checkbox">
																					<input type="checkbox" name="search_sub[]" class="search_sub" value="<?php echo $subcat_petsval->sub_category_id; ?>" <?php if (isset($search_sub) && in_array($subcat_petsval->sub_category_id, $search_sub)) { echo "checked = checked";	} ?> >
																					<i></i> <?php echo $subcat_petsval->sub_category_name; ?> (<?php echo $subcat_petsval->no_ads; ?>)
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Big Animals</h4>
																	<div class="cd-filter-content">
																		<div id='limit_scrol'>
																			<?php foreach ($subcat_bigpets as $subcat_bigpetsval) { ?>
																				<label class="checkbox">
																					<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_bigpetsval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_bigpetsval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																					<i></i> <?php echo $subcat_bigpetsval->sub_subcategory_name; ?> (<?php echo $subcat_bigpetsval->no_ads; ?>)
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Small Animals</h4>
																	<div class="cd-filter-content">
																		<div id='limit_scrol'>
																			<?php foreach ($subcat_smallpets as $subcat_smallpetsval) { ?>
																				<label class="checkbox">
																					<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_smallpetsval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_smallpetsval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																					<i></i> <?php echo $subcat_smallpetsval->sub_subcategory_name; ?> (<?php echo $subcat_smallpetsval->no_ads; ?>)
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Pet Accessories</h4>
																	<div class="cd-filter-content">
																		<div id='limit_scrol'>
																			<?php foreach ($subcat_petsaccess as $subcat_petsaccessval) { ?>
																				<label class="checkbox">
																					<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_petsaccessval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_petsaccessval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																					<i></i> <?php echo $subcat_petsaccessval->sub_subcategory_name; ?> (<?php echo $subcat_petsaccessval->no_ads; ?>)
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<div class="cd-filter-block">
																	<h4 class="title-widget ">Seller Type</h4>

																	<div class="cd-filter-content" >
																		<div>
																			<label class="checkbox">
																				<input type="checkbox" name="seller_deals[]" class='seller_deals' <?php if(isset($seller_deals) && in_array('Seller',$seller_deals)) echo 'checked = checked';?> value="Seller" >
																				<i></i> Seller Deals (<?php echo $seller; ?>)
																			</label>
																			<label class="checkbox">
																				<input type="checkbox" name="seller_deals[]" class='seller_deals' <?php if(isset($seller_deals) && in_array('Needed',$seller_deals)) echo 'checked = checked';?> value="Needed" >
																				<i></i> Needed Deals (<?php echo $needed; ?>)
																			</label>
																		</div>
																	</div> 
																</div>
															<?php }		?>
															<!-- cloths -->
															<?php if ($cat_id == '6') { ?>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Women</h4>
																	<div class="cd-filter-content">
																		<div>
																			<?php foreach ($subcat_women as $subcat_womenval) { ?>
																				<label class="checkbox">
																					<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_womenval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_womenval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																					<i></i> <?php echo $subcat_womenval->sub_subcategory_name; ?> (<?php echo $subcat_womenval->no_ads; ?>)
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Men</h4>
																	<div class="cd-filter-content">
																		<div>
																			<?php foreach ($subcat_men as $subcat_menval) { ?>
																				<label class="checkbox">
																					<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_menval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_menval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																					<i></i> <?php echo $subcat_menval->sub_subcategory_name; ?> (<?php echo $subcat_menval->no_ads; ?>)
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Boy</h4>
																	<div class="cd-filter-content">
																		<div>
																			<?php foreach ($subcat_boy as $subcat_boyval) { ?>
																				<label class="checkbox">
																					<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_boyval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_boyval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																					<i></i> <?php echo $subcat_boyval->sub_subcategory_name; ?> (<?php echo $subcat_boyval->no_ads; ?>)
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Girl</h4>
																	<div class="cd-filter-content">
																		<div>
																			<?php foreach ($subcat_girl as $subcat_girlval) { ?>
																				<label class="checkbox">
																					<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_girlval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_girlval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																					<i></i> <?php echo $subcat_girlval->sub_subcategory_name; ?> (<?php echo $subcat_girlval->no_ads; ?>)
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Baby Boy</h4>
																	<div class="cd-filter-content">
																		<div>
																			<?php foreach ($subcat_bboy as $subcat_bboyval) { ?>
																				<label class="checkbox">
																					<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_bboyval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_bboyval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																					<i></i> <?php echo $subcat_bboyval->sub_subcategory_name; ?> (<?php echo $subcat_bboyval->no_ads; ?>)
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<div class="cd-filter-block">
																	<h4 class="title-widget">Baby Girl</h4>
																	<div class="cd-filter-content">
																		<div>
																			<?php foreach ($subcat_bgirl as $subcat_bgirlval) { ?>
																				<label class="checkbox">
																					<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_bgirlval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_bgirlval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																					<i></i> <?php echo $subcat_bgirlval->sub_subcategory_name; ?> (<?php echo $subcat_bgirlval->no_ads; ?>)
																				</label>
																			<?php } ?>
																		</div>
																	</div>
																</div>
																<div class="cd-filter-block">
																	<h4 class="title-widget ">Seller Type</h4>

																	<div class="cd-filter-content" >
																		<div>
																			<label class="checkbox">
																				<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Seller" <?php if(isset($seller_deals) && in_array('Seller',$seller_deals)) echo 'checked = checked';?> >
																				<i></i> Seller (<?php echo $seller; ?>)
																			</label>
																			<label class="checkbox">
																				<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Needed" <?php if(isset($seller_deals) && in_array('Needed',$seller_deals)) echo 'checked = checked';?> >
																				<i></i> Needed (<?php echo $needed; ?>)
																			</label>
																			<label class="checkbox">
																				<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Charity" <?php if(isset($seller_deals) && in_array('Charity',$seller_deals)) echo 'checked = checked';?> >
																				<i></i> Charity (<?php echo $charity; ?>)
																			</label>
																		</div>
																	</div> 
																</div>
															<?php }		?>
															<?php if ($cat_id == 7) { ?>
															<div class="cd-filter-block">
																<h4 class="title-widget">Kitchen Essentials</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_kitchen as $subcat_kitchenval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_kitchenval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_kitchenval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_kitchenval->sub_subcategory_name; ?> (<?php echo $subcat_kitchenval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Home Essentials</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_home as $subcat_homeval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_homeval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_homeval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_homeval->sub_subcategory_name; ?> (<?php echo $subcat_homeval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Decor</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_decor as $subcat_decorval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_decorval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_decorval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_decorval->sub_subcategory_name; ?> (<?php echo $subcat_decorval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget ">Seller Type</h4>

																<div class="cd-filter-content" >
																	<div>
																		<label class="checkbox">
																			<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Seller" <?php if(isset($seller_deals) && in_array('Seller',$seller_deals)) echo 'checked = checked';?> >
																			<i></i> Seller Deals (<?php echo $seller; ?>)
																		</label>
																		<label class="checkbox">
																			<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Needed" <?php if(isset($seller_deals) && in_array('Needed',$seller_deals)) echo 'checked = checked';?> >
																			<i></i> Needed Deals (<?php echo $needed; ?>)
																		</label>
																		<label class="checkbox">
																			<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Charity" <?php if(isset($seller_deals) && in_array('Charity',$seller_deals)) echo 'checked = checked';?> >
																			<i></i> Charity Deals (<?php echo $charity; ?>)
																		</label>
																	</div>
																</div> 
															</div>
															<?php } ?>
															<?php if ($cat_id == 8) { ?>
															<div class="cd-filter-block">
																<h4 class="title-widget">Phones & Tablets</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_phone as $subcat_phoneval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_phoneval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_phoneval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_phoneval->sub_subcategory_name; ?> (<?php echo $subcat_phoneval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Home Appliances</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_homeapp as $subcat_homeappval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_homeappval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_homeappval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_homeappval->sub_subcategory_name; ?> (<?php echo $subcat_homeappval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Small Appliances</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_smallapp as $subcat_smallappval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_smallappval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_smallappval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_smallappval->sub_subcategory_name; ?> (<?php echo $subcat_smallappval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Laptop & Computers</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_lappy as $subcat_lappyval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_lappyval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_lappyval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_lappyval->sub_subcategory_name; ?> (<?php echo $subcat_lappyval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Accessories</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_access as $subcat_accessval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_accessval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_accessval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_accessval->sub_subcategory_name; ?> (<?php echo $subcat_accessval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Personal Care</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_pcare as $subcat_pcareval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_pcareval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_pcareval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_pcareval->sub_subcategory_name; ?> (<?php echo $subcat_pcareval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Home Entertainment</h4>
																<div class="cd-filter-content">
																	<div id='limit_scrol'>
																		<?php foreach ($subcat_henter as $subcat_henterval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_henterval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_henterval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_henterval->sub_subcategory_name; ?> (<?php echo $subcat_henterval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Photography</h4>
																<div class="cd-filter-content">
																	<div>
																		<?php foreach ($subcat_pgraphy as $subcat_pgraphyval) { ?>
																			<label class="checkbox">
																				<input type="checkbox" name="search_subsub[]" class="search_subsub" value="<?php echo $subcat_pgraphyval->sub_subcategory_id; ?>" <?php if (isset($search_subsub) && in_array($subcat_pgraphyval->sub_subcategory_id, $search_subsub)) { echo "checked = checked";	} ?> >
																				<i></i> <?php echo $subcat_pgraphyval->sub_subcategory_name; ?> (<?php echo $subcat_pgraphyval->no_ads; ?>)
																			</label>
																		<?php } ?>
																	</div>
																</div>
															</div>
															<div class="cd-filter-block">
																<h4 class="title-widget">Seller Type</h4>

																<div class="cd-filter-content" >
																	<div>
																		<label class="checkbox">
																			<input type="checkbox" name="seller_deals[]" class='seller_deals' <?php if(isset($seller_deals) && in_array('Seller',$seller_deals)) echo 'checked = checked';?> value="Seller" >
																			<i></i> Seller Deals (<?php echo $seller; ?>)
																		</label>
																		<label class="checkbox">
																			<input type="checkbox" name="seller_deals[]" class='seller_deals' <?php if(isset($seller_deals) && in_array('Needed',$seller_deals)) echo 'checked = checked';?> value="Needed" >
																			<i></i> Needed Deals (<?php echo $needed; ?>)
																		</label>
																	</div>
																</div> 
															</div>
															<?php } ?>
														<?php  }
															}
													 ?>
													 <div class="cd-filter-block">
														<h4 class="title-widget">Search Only</h4>

														<div class="cd-filter-content">
															<?php if ($cat_id == 1 || $cat_id == 2 || $cat_id == 3 || $cat_id == 4) { ?>
																<div>
																	<label class="checkbox">
																		<input type="checkbox" name="dealurgent[]" class="dealurgent"  value="0" <?php if(isset($dealurgent) && in_array('0',$dealurgent)){ echo 'checked = checked';}?> >
																		<i></i> Urgent Deals (<?php echo $urgentcnt; ?>)
																	</label>
																	<label class="checkbox">
																		<input type="checkbox" name="dealurgent[]" class="dealurgent" value="3" <?php if(isset($dealurgent) && in_array('3',$dealurgent)){ echo 'checked = checked';}?> >
																		<i></i> Significant Deals (<?php echo $platinumcnt; ?>)
																	</label>
																	<label class="checkbox">
																		<input type="checkbox" name="dealurgent[]" class="dealurgent" value="2" <?php if(isset($dealurgent) && in_array('2',$dealurgent)){ echo 'checked = checked';}?> >
																		<i></i> Most Valued Deals (<?php echo $goldcnt; ?>)
																	</label>
																	<label class="checkbox">
																		<input type="checkbox" name="dealurgent[]" class="dealurgent" value="1" <?php if(isset($dealurgent) && in_array('1',$dealurgent)){ echo 'checked = checked';}?> >
																		<i></i> Recent Deals (<?php echo $freecnt; ?>)
																	</label>
																</div>
															<?php }
															else if ($cat_id == 5 || $cat_id == 6 || $cat_id == 7 || $cat_id == 8){ ?>
																<div>
																	<label class="checkbox">
																		<input type="checkbox" name="dealurgent[]" class="dealurgent"  value="0" <?php if(isset($dealurgent) && in_array('0',$dealurgent)){ echo 'checked = checked';}?> >
																		<i></i> Urgent Deals (<?php echo $urgentcnt; ?>)
																	</label>
																	<label class="checkbox">
																		<input type="checkbox" name="dealurgent[]" class="dealurgent" value="6" <?php if(isset($dealurgent) && in_array('6',$dealurgent)){ echo 'checked = checked';}?> >
																		<i></i> Significant Deals (<?php echo $platinumcnt; ?>)
																	</label>
																	<label class="checkbox">
																		<input type="checkbox" name="dealurgent[]" class="dealurgent" value="5" <?php if(isset($dealurgent) && in_array('5',$dealurgent)){ echo 'checked = checked';}?> >
																		<i></i> Most Valued Deals (<?php echo $goldcnt; ?>)
																	</label>
																	<label class="checkbox">
																		<input type="checkbox" name="dealurgent[]" class="dealurgent" value="4" <?php if(isset($dealurgent) && in_array('4',$dealurgent)){ echo 'checked = checked';}?> >
																		<i></i> Recent Deals (<?php echo $freecnt; ?>)
																	</label>
																</div>
															<?php }
															else{ ?>
																<div>
																	<label class="checkbox">
																		<input type="checkbox" name="dealurgent[]" class="dealurgent"  value="0" <?php if(isset($dealurgent) && in_array('0',$dealurgent)){ echo 'checked = checked';}?> >
																		<i></i> Urgent Deals (<?php echo $urgentcnt; ?>)
																	</label>
																	<label class="checkbox">
																		<input type="checkbox" name="dealurgent[]" class="dealurgent" value="3,6" <?php if(isset($dealurgent) && in_array('3,6',$dealurgent)){ echo 'checked = checked';}?> >
																		<i></i> Significant Deals (<?php echo $platinumcnt; ?>)
																	</label>
																	<label class="checkbox">
																		<input type="checkbox" name="dealurgent[]" class="dealurgent" value="2,5" <?php if(isset($dealurgent) && in_array('2,5',$dealurgent)){ echo 'checked = checked';}?> >
																		<i></i> Most Valued Deals (<?php echo $goldcnt; ?>)
																	</label>
																	<label class="checkbox">
																		<input type="checkbox" name="dealurgent[]" class="dealurgent" value="1,4" <?php if(isset($dealurgent) && in_array('1,4',$dealurgent)){ echo 'checked = checked';}?> >
																		<i></i> Recent Deals (<?php echo $freecnt; ?>)
																	</label>
																</div>
															<?php } ?>
														</div>
													</div>
											
										</div>
										<div class="row top_20">
											<div class="col-sm-12 add_left">
												<?php echo $left_ad1; ?>
											</div>
										</div>
									</div>
									<!-- End Item Table-->
									<!-- Item Table-->
									<div class="col-md-9 col-sm-9">
										<?php if ($this->session->userdata("saved_msg")) { ?>
											<div class="alert alert-success">
											    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>        
											    <h4>
											        <?php echo $this->session->userdata("saved_msg");?>
											    </h4>
											</div>
										<?php } ?>
										<?php if($this->session->flashdata("err") != ""){ ?>
										<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<h4><?php echo $this->session->flashdata("err");?></h4>
										</div>
										<?php }?>
										
										<div class="sort-by-container tooltip-hover">
											<div class="row">
												<div class="col-md-10 col-sm-9">
													<strong>Sort by:</strong>
													<ul>                            
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
												<div class="col-md-2 col-sm-3 saved_link1">
													<a class="saved_link" style="margin:0px;" href="javascript:void(0);">Save Search</a>
													<!-- <input type="hidden" name="login_id" id="login_id"	value="<?php echo $login_id; ?>"> -->
													<input type="hidden" name="search_title" id="search_title"	value="<?php echo $looking_search; ?>">
													<input type="hidden" name="search_cat" id="search_cat"	value="<?php echo $cat_id; ?>">
													<input type="hidden" name="search_loc" id="search_loc"	value="<?php echo $location; ?>">
												</div>
											</div>
										</div>
										<!-- sort-by-container-->
										<?php if (!empty($searchview_result)) { ?>
										<div class="row list_view_searches motor_result">
											<?php echo $this->load->view("classified/searchview_search"); ?>
										</div>
										<?php }
										else{ ?>
										<div class="row list_view_searches motor_result">
											<?php echo $this->load->view("classified/searchnoresults"); ?>
										</div>
										<?php } ?>
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
		
		<div class="modal fade" id="map_location" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2>Map Location</h2>
					</div>
					<div class="modal-body map_show">
						
					</div>
				</div>
			</div>
		</div>
		
		<!-- End Shadow Semiboxed -->
		<script src="<?php echo base_url(); ?>js/jquery.js"></script> 
		<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>
		
		<script type="text/javascript">
			$(function(){
				$(".saved_link").click(function(){
					var login_id = <?php if ($this->session->userdata('login_id')){ echo $this->session->userdata('login_id'); }else{ echo 0; } ?>;
					if (login_id == '' || login_id == 0) {
						window.location.href = '<?php echo base_url(); ?>login';
						return false;
					}
					else{
						$.ajax({
							type: "POST",
							url: "<?php echo base_url();?>searchview/addsave_search",
							data: {
								login_id: login_id,
								search_title: $("#search_title").val(),
								search_cat: $("#search_cat").val(),
								search_loc: $("#search_loc").val()
							},
							success: function (data) {
								// if (data == 1) {
									window.location.reload();
								// };
							}
						})
					}
				});
			});
		</script>

		<script type="text/javascript">
		setTimeout(function(){
			$(".alert").hide();
		}, 5000);
		</script>

		<script type="text/javascript" src="<?php echo base_url(); ?>libs/jquery.xuSlider.js"></script>
		
		<script>
			$('.xuSlider').xuSlider();
		</script>
		
		<script>
			$(document).ready(function(){
				$('#list-autocomplete').autocomplete({
					source: '<?php echo base_url(); ?>classified/search_autocomplete',
					minLength: 1,
					messages: {
						noResults:'No Data Found'
					}
				});

				/*auto deal tag search*/
				$('#looking_search').autocomplete({
					source: '<?php echo base_url(); ?>classified/search_dealtag',
					minLength: 1,
					messages: {
						noResults:'No Data Found'
					}
				});

				$.post( "<?php echo base_url();?>searchview/search_exists" , {
				 title: $("#search_title").val(),
				 cat: $("#search_cat").val(),
				 loc: $("#search_loc").val()
				} ,function(data) {
		               if (data == 1) {
		               	$(".saved_link1 a").remove();
		               	$(".saved_link1").html("<a href='<?php echo base_url(); ?>my-wishes'><span class='saved_link'>Saved</span></a>");
		               }
		        });
			});
		</script>
		
		<script src="<?php echo base_url(); ?>js/jquery.nicescroll.js"></script> 

		<script src="<?php echo base_url();?>libs/jquery.mixitup.min.js"></script>
		<script src="<?php echo base_url();?>libs/main.js"></script>
		
		<!-- xxx footerscript Content xxx -->
		<?php echo $this->load->view('common/footerscript');?> 
		<!-- xxx footerscript End xxx -->
			
	</body>
</html>
