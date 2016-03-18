	<title>Services Classified Ads | 99 Right Deals</title>
	
	<style>
		.section-title-01{
			height: 220px;
			background-color: #262626;
			text-align: center;
			position: relative;
			width: 100%;
			overflow: hidden;
		}
	</style>
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>js/filter.css"> 
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
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>libs/slider.css">
	
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jssor.slider.min.js"></script>
	<!-- use jssor.slider.debug.js instead for debug -->
	
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
	  <?php foreach ($public_adview as $publicview) {
	  	$left_ad1 = $publicview->sidead_one;
	  	$topad = $publicview->topad;
	  	$mid_ad = $publicview->mid_ad;
	  }
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
			        $(".clear_location").click(function(){
			        	$('#latt').val('');
			        	$('#longg').val('');
			        	$('#find_loc').val('');
			        	$("form.jforms").submit();
			        });
			    }
			);
		</script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css">
	 <?php 
			$prof_service = $this->session->userdata('prof_service');
			$pop_service = $this->session->userdata('pop_service');
			$seller_deals = $this->session->userdata('seller_deals');
			$dealurgent = $this->session->userdata('dealurgent');
			$dealtitle = $this->session->userdata('dealtitle');
			$dealprice = $this->session->userdata('dealprice');
			$recentdays = $this->session->userdata('recentdays');
			$search_bustype = $this->session->userdata('search_bustype');
			$location = $this->session->userdata('location');
			$latt = $this->session->userdata('latt');
			$longg = $this->session->userdata('longg');



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
			  foreach ($sellerneededcount as $sncnt) {
			  	$seller = $sncnt->provider;
			  	$needed = $sncnt->needed;
			  }
	   ?>
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
		<form id="j-forms2" name="jforms"method='post' action="<?php echo base_url(); ?>services_view/search_filters" class="jforms j-forms" style="background-color: rgb(255, 255, 255) !important;">
			<input type='hidden' class='curr_url' name='curr_url' value='<?php echo current_url();?>'>
			<div class="content_info">
				<div class="paddings">
					<div class="container pad_bott_50">
						<div class="row">
							<div class="col-md-10 col-sm-8 col-md-offset-1 add_top">
								<?php echo $topad; ?>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<!-- Item Table-->
							<div class="col-md-3 col-sm-3">
								<div class="container-by-widget-filter bg-dark color-white">
									<!-- Widget Filter -->
									<h3 class="title-widget">Services Filter</h3>
									<div class="cd-filter-block">
										<h4 class="title-widget">Professional</h4>
										<div class="cd-filter-content">
											<div id="limit_scrol">
												<?php  foreach ($services_sub_prof as $subprof) { ?>
												<label class="checkbox">
													<input type="checkbox" name="prof_service[]" class='prof_service' value="<?php echo $subprof->sub_subcategory_id; ?>" <?php if(isset($prof_service) && in_array($subprof->sub_subcategory_id,$prof_service)){ echo 'checked = checked';}?> >
													<i></i> <?php echo ucwords($subprof->sub_subcategory_name)." (".$subprof->no_ads.")"; ?>
												</label>
												<?php } ?>
											</div>
										</div>
									</div>

									<div class="cd-filter-block">
										<h4 class="title-widget">Popular</h4>
										<div class="cd-filter-content">
											<div id="limit_scrol">
												<?php  foreach ($services_sub_pop as $subpop) { ?>
												<label class="checkbox">
													<input type="checkbox" name="pop_service[]" class="pop_service" value="<?php echo $subpop->sub_subcategory_id; ?>" <?php if(isset($pop_service) && in_array($subpop->sub_subcategory_id,$pop_service)) echo 'checked = checked';?> >
													<i></i> <?php echo ucwords($subpop->sub_subcategory_name)." (".$subpop->no_ads.")"; ?>
												</label>
												<?php } ?>
											</div>
										</div>
									</div>
									<div class="cd-filter-block">
										<h4 class="title-widget closed">Seller Type</h4>

										<div class="cd-filter-content" style="overflow: hidden; display: none;">
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
									</div>
									
									<div class="cd-filter-block">
										<h4 class="title-widget closed">Location</h4>

										<div class="cd-filter-content" style="overflow: hidden; display: none;">
											<div class="input">
												<input type="text" placeholder="Enter Location" id="find_loc" class="find_loc_search" name="find_loc" value="<?php echo $location; ?>">
												<input type='hidden' name='latt' id='latt' value='<?php echo $latt; ?>' >
												<input type='hidden' name='longg' id='longg' value='<?php echo $longg; ?>' >
												<button type='submit' class="btn btn-primary sm-btn pull-right find_location" name='find_location' id='find_location' >Find</button>
												<button class="btn btn-primary sm-btn pull-right clear_location" name='clear_location' id='clear_location' >Clear</button>
											</div>
										</div>
									</div> 
									
									<div class="cd-filter-block">
										<h4 class="title-widget">Search Only</h4>

										<div class="cd-filter-content">
											<div>
												<label class="checkbox">
													<input type="checkbox" name="dealurgent[]" class="dealurgent"  value="0" <?php if(isset($dealurgent) && in_array('0',$dealurgent)){ echo 'checked = checked';}?>>
													<i></i> Urgent Deals (<?php echo $urgentcnt; ?>)
												</label>
												<label class="checkbox">
													<input type="checkbox" name="dealurgent[]" class="dealurgent" value="3"<?php if(isset($dealurgent) && in_array('3',$dealurgent)){ echo 'checked = checked';}?> >
													<i></i> Significant Deals (<?php echo $platinumcnt; ?>)
												</label>
												<label class="checkbox">
													<input type="checkbox" name="dealurgent[]" class="dealurgent" value="2"<?php if(isset($dealurgent) && in_array('2',$dealurgent)){ echo 'checked = checked';}?>>
													<i></i> Most Valued Deals (<?php echo $goldcnt; ?>)
												</label>
												<label class="checkbox">
													<input type="checkbox" name="dealurgent[]" class="dealurgent" value="1" <?php if(isset($dealurgent) && in_array('1',$dealurgent)){ echo 'checked = checked';}?>>
													<i></i> Recent Deals (<?php echo $freecnt; ?>)
												</label>
											</div>
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
								
								<div class="row search_result">
                               	  <?php echo $this->load->view("classified/services_view_search"); ?> 
                               	</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>

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
	
	<!-- End Shadow Semiboxed -->
	<script src="<?php echo base_url(); ?>js/jquery.js"></script> 
	
	
	<script type="text/javascript" src="<?php echo base_url(); ?>libs/jquery.xuSlider.js"></script>
	<script>
		$('.xuSlider').xuSlider();
	</script>
	
	<script src="<?php echo base_url(); ?>js/jquery.nicescroll.js"></script> 

	<script src="<?php echo base_url(); ?>libs/jquery.mixitup.min.js"></script>
	<script src="<?php echo base_url(); ?>libs/main.js"></script>	