	<title>Right Deals :: Deals Administrator</title>
	
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
	
	<link rel="stylesheet" href="libs/slider.css">
	<script type="text/javascript" src="js/jssor.slider.min.js"></script>
	
	<script>
		jssor_1_slider_init = function() {
			
			var jssor_1_SlideshowTransitions = [
			  {$Duration:1200,$Zoom:1,$Easing:{$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
			  {$Duration:1000,$Zoom:11,$SlideOut:true,$Easing:{$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear},$Opacity:2},
			  {$Duration:1200,$Zoom:1,$Rotate:1,$During:{$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
			  {$Duration:1000,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
			  {$Duration:1200,x:0.5,$Cols:2,$Zoom:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
			  {$Duration:1200,x:4,$Cols:2,$Zoom:11,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear},$Opacity:2},
			  {$Duration:1200,x:0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Left:$Jease$.$Swing,$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
			  {$Duration:1000,x:-4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
			  {$Duration:1200,x:-0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Left:$Jease$.$Swing,$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
			  {$Duration:1000,x:4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
			  {$Duration:1200,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},
			  {$Duration:1000,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InExpo,$Top:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.7}},
			  {$Duration:1200,x:-4,y:2,$Rows:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:28},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},
			  {$Duration:1200,x:1,y:2,$Cols:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:19},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.8}}
			];
			
			var jssor_1_options = {
			  $AutoPlay: true,
			  $SlideshowOptions: {
				$Class: $JssorSlideshowRunner$,
				$Transitions: jssor_1_SlideshowTransitions,
				$TransitionsOrder: 1
			  },
			  $ArrowNavigatorOptions: {
				$Class: $JssorArrowNavigator$
			  },
			  $ThumbnailNavigatorOptions: {
				$Class: $JssorThumbnailNavigator$,
				$Rows: 2,
				$Cols: 6,
				$SpacingX: 14,
				$SpacingY: 12,
				$Orientation: 2,
				$Align: 156
			  }
			};
			
			var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
			
			//responsive code begin
			//you can remove responsive code if you don't want the slider scales while window resizing
			function ScaleSlider() {
				var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
				if (refSize) {
					refSize = Math.min(refSize, 242);
					refSize = Math.max(refSize, 238);
					jssor_1_slider.$ScaleWidth(refSize);
				}
				else {
					window.setTimeout(ScaleSlider, 30);
				}
			}
			ScaleSlider();
			$Jssor$.$AddEvent(window, "load", ScaleSlider);
			$Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
			$Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
			//responsive code end
		};
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
	$(function(){
		/*search ato z / A to Z*/
			$(".dealtitle_sort").change(function(){
				var dealtitle = $(".dealtitle_sort option:selected").val();
				var dealprice = $(".price_sort option:selected").val();
        		$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>deals_administrator/my_ads_search",
					data: {
						dealtitle: dealtitle,
						dealprice: dealprice
					},
					success: function (data) {
						$(".deals_search_result").html(data);
					}
				})
        	});
		/*search price asc / desc*/
			$(".price_sort").change(function(){
				var dealprice = $(".price_sort option:selected").val();
				var dealtitle = $(".dealtitle_sort option:selected").val();
        		$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>deals_administrator/my_ads_search",
					data: {
						dealtitle: dealtitle,
						dealprice: dealprice
					},
					success: function (data) {
						$(".deals_search_result").html(data);
					}
				})
        	});
	});
	</script>
	<link rel="stylesheet" href="j-folder/css/j-forms.css">
	
	<div class="section-title-01">
		<div class="bg_parallax image_01_parallax"></div>
	</div>   
	
	<section class="content-central">
		<div class="semiboxshadow text-center">
			<img src="img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
		</div>
		
		<div class="content_info">
			<div class="paddings">
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							<div class="item-table">
								<div class="header-table color-red">
									<img src="<?php echo base_url(); ?>img/icons/user_pro.png" alt="user_pro" title="Profile" class="img-responsive pvt-no-img">
									<h2><?php echo @$log_name; ?></h2> 
								</div>
								<ul class="dashboard_tag">
									<li><img src="img/icons/admin.png" alt="admin" title="admin image"><a href='deals_administrator'>Deals Administrator</a></li>
									<li><img src="img/icons/pickup.png" alt="pickup" title="pickup image"><a href='pickup_deals'>Pickup deals</a></li>
									<li><img src="img/icons/seaked.png" alt="seaked" title="seaked image"><a href='reserved_searches'>Reserved Searches</a></li>
									<li><img src="img/icons/updateprofile.png" alt="updateprofile" title="updateprofile image"> <a href='update_profile'>Update Profile</a></li>
								</ul>
								<a class="btn color-red" href="<?php echo base_url(); ?>login/logout">Logout</a>
							</div>
						</div>
						<!-- End Item Table-->

						<form id="j-forms" action="#" class="j-forms" method="post">
							<!-- Item Table-->
							<div class="col-md-9">
                                <div class="row">
									<div class="col-sm-12">
										<h2>Deals Administrator</h2>
										<label>Hi <?php echo $log_name; ?></label><hr>
									</div>
								</div>
                                
                                <!-- sort-by-container-->
                                <div class="sort-by-container tooltip-hover">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <strong>Sort by:</strong>
                                            <ul>                            
                                                <li>
													<div class="top_bar_top">
														<label class="input select">
															<select name="star">
																<option value="none" selected disabled="">Stars</option>
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
																<option value="Any">Title</option>
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
																<option value="Any">Pricing</option>
																<option value="lowtohigh">Low to High</option>
																<option value="hightolow">High to Low</option>
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
                                                    <a href="deals_administrator_box">
                                                        <i class="fa fa-th-large"></i>
                                                    </a>
                                                </li>
                                                <li data-toggle="tooltip" title="" data-original-title="LIST VIEW" class="active">
                                                    <a href="deals_administrator">
                                                        <i class="fa fa-list"></i>
                                                    </a>
                                                </li> 
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- sort-by-container-->

                                <div class="row list_view_searches">
                                    <!-- platinum package start-->
                                    <?php foreach ($my_ads_details as $m_details) {
                                    	/*person name*/
                                    	if ($m_details->ad_type == 'business') {
                                    	$person_name = @mysql_result(mysql_query("SELECT `contact_person` FROM `contactinfo_business` WHERE ad_id = '$m_details->ad_id'"), 0,'contact_person');
                                    	}
                                    	else if ($m_details->ad_type == 'consumer') {
                                    	$person_name = @mysql_result(mysql_query("SELECT `contact_name` FROM `contactinfo_consumer` WHERE ad_id = '$m_details->ad_id'"), 0,'contact_name');
                                    	}

                                    	/*currency symbol*/ 
                                    	if ($m_details->currency == 'pound') {
                                    		$currency = '£';
                                    	}
                                    	else if ($m_details->currency == 'euro') {
                                    		$currency = '€';
                                    	}
                                    	
                                    if ($m_details->package_type == 'platinum' && $m_details->urgent_package == '') {
                                    ?>
                                    <div class="col-md-12">
										<div class="first_list">
											<div class="row">
												<div class="col-sm-4">
													<div class="xuSlider">
														<ul class="sliders">
															<?php 
															$pic = mysql_query("select * from ad_img WHERE ad_id = '$m_details->ad_id'");
															while ($res = mysql_fetch_object($pic)) { ?>
															<li><img src="ad_images/<?php echo $res->img_name; ?>" class="img-responsive" alt="Slider1" title="<?php echo $res->img_name; ?>"></li>
															<?php	
																}
															 ?>
														</ul>
														<div class="direction-nav">
															<a href="javascript:;" class="prev icon-circle-arrow-left icon-4x"><i>Previous</i></a>
															<a href="javascript:;" class="next icon-circle-arrow-right icon-4x"><i>Next</i></a>
														</div>
														<div class="control-nav">
															<li data-id="1"><a href="javascript:;">1</a></li>
															<li data-id="2"><a href="javascript:;">2</a></li>
															<li data-id="3"><a href="javascript:;">3</a></li>
															<li data-id="4"><a href="javascript:;">4</a></li>
															<li data-id="5"><a href="javascript:;">5</a></li>
														</div>	
													</div>
													<div class="">
														<div class="price11">
															<span></span><b>
															<img src="img/icons/crown.png" class="pull-right" alt="Crown" title="Best Deal"></b>
														</div>
													</div>
												</div>
												<div class="col-sm-8 middle_text">
													<div class="row">
														<div class="col-sm-8">
															<div class="row">
																<div class="col-xs-12">
																	<h3 class="list_title"><?php echo $m_details->deal_tag; ?></h3>
																</div>
															</div>
															<div class="row">
																<div class="col-xs-4">
																	<ul class="starts">
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
																	</ul>
																</div>
																<div class="col-xs-8">
																	<div class="location pull-right ">
																		<i class="fa fa-map-marker "></i> 
																		<a href="javascript:void(0);" class="location loc_map" id="<?php echo $m_details->latt.','.$m_details->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $m_details->loc_name; ?>"> Location</a>
																	</div>
																</div>
															</div>
														</div>
														<?php
														if ($m_details->ad_type == 'business') {
															if ($m_details->bus_logo != '') { ?>
															<div class="col-xs-4 serch_bus_logo">
															<img src="ad_images/business_logos/<?php echo $m_details->bus_logo; ?>" alt="<?php echo $m_details->bus_logo; ?>" title="busniess logo" class="img-responsive">
															</div>
															<?php }
															else{ ?>
																<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/trader.png" alt="intel" title="intel logo" class="img-responsive">
																</div>
														<?php	}
															}
																 ?>
														
													</div>
													<hr class="separator">
													<div class="row">
														<div class="col-xs-8">
															<div class="row">
																<div class="col-xs-12">
																	<p class=""><?php echo substr(strip_tags($m_details->deal_desc), 1, 85); ?></p>
																</div>
																<div class="col-xs-12">
																	<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																</div>
															</div>
														</div>
														<div class="col-xs-4">
															<div class="row">
																
																	<?php if ($m_details->category_id != 'jobs') { ?>
																<div class="col-xs-10 col-xs-offset-1 amt_bg">
																	<h3 class="view_price"><?php echo $currency.number_format($m_details->price); ?></h3>
																</div>
																	<?php } ?>
																
																<div class="col-xs-12">
																	<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Now</span></a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="post-meta list_view_bottom" >
													<ul>
														<li><i class="fa fa-camera"></i><a href="#"><?php echo $m_details->img_count; ?></a></li>
														<li><i class="fa fa-video-camera"></i><a href="#">1</a></li>
														<li><i class="fa fa-user"></i><a href="#"><?php echo $person_name; ?></a></li>
														<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($m_details->created_on)); ?></span></li>
														<li><span>Deal ID : <?php echo $m_details->ad_prefix.$m_details->ad_id; ?></span></li>
														<li><i class="fa fa-edit"></i></li>
														<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
													</ul>                      
												</div>
											</div>
										</div><hr class="separator">	
									</div>
									<?php } ?>
									<!-- platinum package end -->

									<?php 
									if ($m_details->package_type == 'platinum' && $m_details->urgent_package != '') {
									 ?>
									<!-- platinum+urgent package start -->
									<div class="col-md-12">
										<div class="first_list">
											<div class="row">
												<div class="col-sm-4">
													<div class="featured-badge">
														<span>Urgent</span>
													</div>
													<div class="xuSlider">
														<ul class="sliders">
															<?php 
															$pic = mysql_query("select * from ad_img WHERE ad_id = '$m_details->ad_id'");
															while ($res = mysql_fetch_object($pic)) { ?>
															<li><img src="ad_images/<?php echo $res->img_name; ?>" class="img-responsive" alt="Slider1" title="<?php echo $res->img_name; ?>"></li>
															<?php	
																}
															 ?>
														</ul>
														<div class="direction-nav">
															<a href="javascript:;" class="prev icon-circle-arrow-left icon-4x"><i>Previous</i></a>
															<a href="javascript:;" class="next icon-circle-arrow-right icon-4x"><i>Next</i></a>
														</div>
														<div class="control-nav">
															<li data-id="1"><a href="javascript:;">1</a></li>
															<li data-id="2"><a href="javascript:;">2</a></li>
															<li data-id="3"><a href="javascript:;">3</a></li>
															<li data-id="4"><a href="javascript:;">4</a></li>
															<li data-id="5"><a href="javascript:;">5</a></li>
														</div>	
													</div>
													<div class="">
														<div class="price11">
															<span></span><b>
															<img src="img/icons/crown.png" class="pull-right" alt="Crown" title="Best Deal"></b>
														</div>
													</div>
												</div>
												<div class="col-sm-8 middle_text">
													<div class="row">
														<div class="col-sm-8">
															<div class="row">
																<div class="col-xs-12">
																	<h3 class="list_title"><?php echo $m_details->deal_tag; ?></h3>
																</div>
															</div>
															<div class="row">
																<div class="col-xs-4">
																	<ul class="starts">
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
																	</ul>
																</div>
																<div class="col-xs-8">
																	<div class="location pull-right ">
																		<i class="fa fa-map-marker "></i> 
																		<a href="javascript:void(0);" class="location loc_map" id="<?php echo $m_details->latt.','.$m_details->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $m_details->loc_name; ?>"> Location</a>
																	</div>
																</div>
															</div>
														</div>
														
														<?php
														if ($m_details->ad_type == 'business') {
															if ($m_details->bus_logo != '') { ?>
															<div class="col-xs-4 serch_bus_logo">
															<img src="ad_images/business_logos/<?php echo $m_details->bus_logo; ?>" alt="<?php echo $m_details->bus_logo; ?>" title="busniess logo" class="img-responsive">
															</div>
															<?php }
															else{ ?>
																<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/trader.png" alt="intel" title="intel logo" class="img-responsive">
																</div>
														<?php	}
															}
																 ?>
													</div>
													<hr class="separator">
													<div class="row">
														<div class="col-xs-8">
															<div class="row">
																<div class="col-xs-12">
																	<p class=""><?php echo substr(strip_tags($m_details->deal_desc), 1, 85); ?></p>
																</div>
																<div class="col-xs-12">
																	<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																</div>
															</div>
														</div>
														<div class="col-xs-4">
															<div class="row">
																
																	<?php if ($m_details->category_id != 'jobs') { ?>
																<div class="col-xs-10 col-xs-offset-1 amt_bg">
																	<h3 class="view_price"><?php echo $currency.number_format($m_details->price); ?></h3>
																</div>
																	<?php } ?>
																
																<div class="col-xs-12">
																	<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Now</span></a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!-- End Row-->
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="post-meta list_view_bottom" >
													<ul>
														<li><i class="fa fa-camera"></i><a href="#"><?php echo $m_details->img_count; ?></a></li>
														<li><i class="fa fa-video-camera"></i><a href="#">1</a></li>
														<li><i class="fa fa-user"></i><a href="#"><?php echo $person_name; ?></a></li>
														<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($m_details->created_on)); ?></span></li>
														<li><span>Deal ID : <?php echo $m_details->ad_prefix.$m_details->ad_id; ?></span></li>
														<li><i class="fa fa-edit"></i></li>
														<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
													</ul>                      
												</div>
											</div>
										</div><hr class="separator">	
										<!-- End Item Gallery List View-->
									</div>
									<?php } ?>
									<!-- platinum+urgent package end -->

									<?php 
									if ($m_details->package_type == 'gold' && $m_details->urgent_package == '') {
									 ?>
									<!-- gold package starts -->
									<div class="col-md-12">
										<div class="first_list gold_bgcolor">
											<div class="row">
												<div class="col-sm-4 ">
													<div class="img-hover view_img">
														<img src="ad_images/<?php echo $m_details->img_name; ?>" alt="img_1" title="<?php echo $m_details->img_name; ?>" class="img-responsive">
														<div class="overlay"><a href="description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
													</div>
													<div class="">
														<div class="price11">
															<span></span><b>
															<img src="img/icons/thumb.png" class="pull-right" alt="thumb" title="Right Deal"></b>
														</div>
													</div>
												</div>
												<div class="col-sm-8 middle_text">
													<div class="row">
														<div class="col-sm-8">
															<div class="row">
																<div class="col-xs-12">
																	<h3 class="list_title"><?php echo $m_details->deal_tag; ?></h3>
																</div>
															</div>
															<div class="row">
																<div class="col-xs-4">
																	<ul class="starts">
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
																	</ul>
																</div>
																<div class="col-xs-8">
																	<div class="location pull-right ">
																		<i class="fa fa-map-marker "></i> 
																		<a href="javascript:void(0);" class="location loc_map" id="<?php echo $m_details->latt.','.$m_details->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $m_details->loc_name; ?>"> Location</a>
																	</div>
																</div>
															</div>
														</div>
														
														<?php
														if ($m_details->ad_type == 'business') {
															if ($m_details->bus_logo != '') { ?>
															<div class="col-xs-4 serch_bus_logo">
															<img src="ad_images/business_logos/<?php echo $m_details->bus_logo; ?>" alt="<?php echo $m_details->bus_logo; ?>" title="busniess logo" class="img-responsive">
															</div>
															<?php }
															else{ ?>
																<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/trader.png" alt="intel" title="intel logo" class="img-responsive">
																</div>
														<?php	}
															}
																 ?>
													</div>
													<hr class="separator">
													<div class="row">
														<div class="col-xs-8">
															<div class="row">
																<div class="col-xs-12">
																	<p class=""><?php echo substr(strip_tags($m_details->deal_desc), 1, 85); ?> </p>
																</div>
																<div class="col-xs-12">
																	<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																</div>
															</div>
														</div>
														<div class="col-xs-4">
															<div class="row">
																
																	<?php if ($m_details->category_id != 'jobs') { ?>
																<div class="col-xs-10 col-xs-offset-1 amt_bg">
																	<h3 class="view_price"><?php echo $currency.number_format($m_details->price); ?></h3>
																</div>
																	<?php } ?>
																
																<div class="col-xs-12">
																	<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Now</span></a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!-- End Row-->
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="post-meta list_view_bottom gold_bgcolor">
													<ul>
														<li><i class="fa fa-camera"></i><a href="#"><?php echo $m_details->img_count; ?></a></li>
														<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
														<li><i class="fa fa-user"></i><a href="#"><?php echo $person_name; ?></a></li>
														<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($m_details->created_on)); ?></span></li>
														<li><span>Deal ID : <?php echo $m_details->ad_prefix.$m_details->ad_id; ?></span></li>
														<li><i class="fa fa-edit"></i></li>
														<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
													</ul>                      
												</div>
											</div>
										</div><hr class="separator">	
									</div>
									<?php } ?>
									<!-- gold package end -->
									
									<?php 
									if ($m_details->package_type == 'gold' && $m_details->urgent_package != '') {
									 ?>
									<!-- gold+urgent package starts -->
									<div class="col-md-12">
										<div class="first_list gold_bgcolor">
											<div class="row">
												<div class="col-sm-4">
													<div class="featured-badge">
														<span>Urgent</span>
													</div>
													<div class="img-hover view_img">
														<img src="ad_images/<?php echo $m_details->img_name; ?>" alt="img_1" title="<?php echo $m_details->img_name; ?>" class="img-responsive">
														<div class="overlay"><a href="description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
													</div>
													<div class="">
														<div class="price11">
															<span></span><b>
															<img src="img/icons/thumb.png" class="pull-right" alt="thumb" title="Right Deal"></b>
														</div>
													</div>
												</div>
												<div class="col-sm-8 middle_text">
													<div class="row">
														<div class="col-sm-8">
															<div class="row">
																<div class="col-xs-12">
																	<h3 class="list_title"><?php echo $m_details->deal_tag; ?></h3>
																</div>
															</div>
															<div class="row">
																<div class="col-xs-4">
																	<ul class="starts">
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
																	</ul>
																</div>
																<div class="col-xs-8">
																	<div class="location pull-right ">
																		<i class="fa fa-map-marker "></i> 
																		<a href="javascript:void(0);" class="location loc_map" id="<?php echo $m_details->latt.','.$m_details->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $m_details->loc_name; ?>"> Location</a>
																	</div>
																</div>
															</div>
														</div>
														
														<?php
														if ($m_details->ad_type == 'business') {
															if ($m_details->bus_logo != '') { ?>
															<div class="col-xs-4 serch_bus_logo">
															<img src="ad_images/business_logos/<?php echo $m_details->bus_logo; ?>" alt="<?php echo $m_details->bus_logo; ?>" title="busniess logo" class="img-responsive">
															</div>
															<?php }
															else{ ?>
																<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/trader.png" alt="intel" title="intel logo" class="img-responsive">
																</div>
														<?php	}
															}
																 ?>
													</div>
													<hr class="separator">
													<div class="row">
														<div class="col-xs-8">
															<div class="row">
																<div class="col-xs-12">
																	<p class=""><?php echo substr(strip_tags($m_details->deal_desc), 1, 85); ?></p>
																</div>
																<div class="col-xs-12">
																	<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																</div>
															</div>
														</div>
														<div class="col-xs-4">
															<div class="row">
																
																	<?php if ($m_details->category_id != 'jobs') { ?>
																<div class="col-xs-10 col-xs-offset-1 amt_bg">
																	<h3 class="view_price"><?php echo $currency.number_format($m_details->price); ?></h3>
																</div>
																	<?php } ?>
																
																<div class="col-xs-12">
																	<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Now</span></a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!-- End Row-->
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="post-meta list_view_bottom gold_bgcolor">
													<ul>
														<li><i class="fa fa-camera"></i><a href="#"><?php echo $m_details->img_count; ?></a></li>
														<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
														<li><i class="fa fa-user"></i><a href="#"><?php echo $person_name; ?></a></li>
														<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($m_details->created_on)); ?></span></li>
														<li><span>Deal ID : <?php echo $m_details->ad_prefix.$m_details->ad_id; ?></span></li>
														<li><i class="fa fa-edit"></i></li>
														<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
													</ul>                      
												</div>
											</div>
										</div><hr class="separator">	
									</div>
									<?php } ?>
									<!-- gold+urgent package end -->
									
									<!-- free package starts -->
									<?php 
									if ($m_details->package_type == 'free' && $m_details->urgent_package == '') {
									 ?>
									<div class="col-md-12">
										<div class="first_list">
											<div class="row">
												<div class="col-sm-4">
													<div class="img-hover view_img">
														<img src="ad_images/<?php echo $m_details->img_name; ?>" alt="img_1" title="<?php echo $m_details->deal_tag; ?>" class="img-responsive">
														<div class="overlay"><a href="description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
													</div>
												</div>
												<div class="col-sm-8 middle_text">
													<div class="row">
														<div class="col-sm-8">
															<div class="row">
																<div class="col-xs-12">
																	<h3 class="list_title"><?php echo $m_details->deal_tag; ?></h3>
																</div>
															</div>
															<div class="row">
																<div class="col-xs-4">
																	<ul class="starts">
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
																	</ul>
																</div>
																<div class="col-xs-8">
																	<div class="location pull-right ">
																		<i class="fa fa-map-marker "></i> 
																		<a href="javascript:void(0);" class="location loc_map" id="<?php echo $m_details->latt.','.$m_details->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $m_details->loc_name; ?>"> Location</a>
																	</div>
																</div>
															</div>
														</div>
														
														<?php
														if ($m_details->ad_type == 'business') {
															if ($m_details->bus_logo != '') { ?>
															<div class="col-xs-4 serch_bus_logo">
															<img src="ad_images/business_logos/<?php echo $m_details->bus_logo; ?>" alt="<?php echo $m_details->bus_logo; ?>" title="busniess logo" class="img-responsive">
															</div>
															<?php }
															else{ ?>
																<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/trader.png" alt="intel" title="intel logo" class="img-responsive">
																</div>
														<?php	}
															}
																 ?>
													</div>
													<hr class="separator">
													<div class="row">
														<div class="col-xs-8">
															<div class="row">
																<div class="col-xs-12">
																	<p class=""><?php echo substr(strip_tags($m_details->deal_desc), 1, 85); ?> </p>
																</div>
																<div class="col-xs-12">
																	<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																</div>
															</div>
														</div>
														<div class="col-xs-4">
															<div class="row">
																
																	<?php if ($m_details->category_id != 'jobs') { ?>
																<div class="col-xs-10 col-xs-offset-1 amt_bg">
																	<h3 class="view_price"><?php echo $currency.number_format($m_details->price); ?></h3>
																</div>
																	<?php } ?>
																
																<div class="col-xs-12">
																	<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Now</span></a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!-- End Row-->
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="post-meta list_view_bottom" >
													<ul>
														<li><i class="fa fa-camera"></i><a href="#"><?php echo $m_details->img_count; ?></a></li>
														<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
														<li><i class="fa fa-user"></i><a href="#"><?php echo $person_name; ?></a></li>
														<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($m_details->created_on)); ?></span></li>
														<li><span>Deal ID : <?php echo $m_details->ad_prefix.$m_details->ad_id; ?></span></li>
														<li><i class="fa fa-edit"></i></li>
														<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
													</ul>                      
												</div>
											</div>
										</div><hr class="separator">	
									</div>
									<?php } ?>
									<!-- free package ends -->
									
									<!-- free+urgent package starts -->
									<?php 
									if ($m_details->package_type == 'free' && $m_details->urgent_package != '') {
									 ?>
									<div class="col-md-12">
										<div class="first_list">
											<div class="row">
												<div class="col-sm-4">
													<div class="featured-badge">
														<span>Urgent</span>
													</div>
													<div class="img-hover view_img">
														<img src="ad_images/<?php echo $m_details->img_name; ?>" alt="img_1" title="<?php echo $m_details->deal_tag; ?>" class="img-responsive">
														<div class="overlay"><a href="description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
													</div>
												</div>
												<div class="col-sm-8 middle_text">
													<div class="row">
														<div class="col-sm-8">
															<div class="row">
																<div class="col-xs-12">
																	<h3 class="list_title"><?php echo $m_details->deal_tag; ?></h3>
																</div>
															</div>
															<div class="row">
																<div class="col-xs-4">
																	<ul class="starts">
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star"></i></a></li>
																		<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
																	</ul>
																</div>
																<div class="col-xs-8">
																	<div class="location pull-right ">
																		<i class="fa fa-map-marker "></i> 
																		<a href="javascript:void(0);" class="location loc_map" id="<?php echo $m_details->latt.','.$m_details->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $m_details->loc_name; ?>"> Location</a>
																	</div>
																</div>
															</div>
														</div>
														
														<?php
														if ($m_details->ad_type == 'business') {
															if ($m_details->bus_logo != '') { ?>
															<div class="col-xs-4 serch_bus_logo">
															<img src="ad_images/business_logos/<?php echo $m_details->bus_logo; ?>" alt="<?php echo $m_details->bus_logo; ?>" title="busniess logo" class="img-responsive">
															</div>
															<?php }
															else{ ?>
																<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/trader.png" alt="intel" title="intel logo" class="img-responsive">
																</div>
														<?php	}
															}
																 ?>
													</div>
													<hr class="separator">
													<div class="row">
														<div class="col-xs-8">
															<div class="row">
																<div class="col-xs-12">
																	<p class=""><?php echo substr(strip_tags($m_details->deal_desc), 1, 85); ?> </p>
																</div>
																<div class="col-xs-12">
																	<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																</div>
															</div>
														</div>
														<div class="col-xs-4">
															<div class="row">

																	<?php if ($m_details->category_id != 'jobs') { ?>
																	<div class="col-xs-10 col-xs-offset-1 amt_bg">
																		<h3 class="view_price"><?php echo $currency.number_format($m_details->price); ?>	</h3>
																	</div>
																	<?php } ?>
																
																<div class="col-xs-12">
																	<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Now</span></a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><!-- End Row-->
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="post-meta list_view_bottom" >
													<ul>
														<li><i class="fa fa-camera"></i><a href="#"><?php echo $m_details->img_count; ?></a></li>
														<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
														<li><i class="fa fa-user"></i><a href="#"><?php echo $person_name; ?></a></li>
														<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($m_details->created_on)); ?></span></li>
														<li><span>Deal ID : <?php echo $m_details->ad_prefix.$m_details->ad_id; ?></span></li>
														<li><i class="fa fa-edit"></i></li>
														<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
													</ul>                      
												</div>
											</div>
										</div><hr class="separator">	
									</div>
									<?php 
										}
									} ?>
									<!-- free+urgent package ends -->
                                <div class="row list_view_searches deals_search_result">
                                    <?php echo $this->load->view('classified/deals_administrator_search'); ?>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
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
	<script src="js/jquery.js"></script> 
	
	<script src="j-folder/js/jquery.maskedinput.min.js"></script>
	<script src="j-folder/js/jquery.validate.min.js"></script>
	<script src="j-folder/js/additional-methods.min.js"></script>
	<script src="j-folder/js/jquery.form.min.js"></script>
	<script src="j-folder/js/j-forms.min.js"></script>   

	<script type="text/javascript" src="libs/jquery.xuSlider.js"></script>
	<script>
		$('.xuSlider').xuSlider();
	</script>
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-36251023-1']);
	  _gaq.push(['_setDomainName', 'jqueryscript.net']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>	

	<script src="http://maps.googleapis.com/maps/api/js"></script>

	<script>
		var myCenter=new google.maps.LatLng(55.8558347,-3.3274721000000227);

		function initialize()
		{
		var mapProp = {
		  center: myCenter,
		  zoom:5,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		  };

		var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

		var marker = new google.maps.Marker({
		  position: myCenter,
		  title:'Click to zoom'
		  });

		marker.setMap(map);

		// Zoom to 9 when clicking on marker
		google.maps.event.addListener(marker,'click',function() {
		  map.setZoom(9);
		  map.setCenter(marker.getPosition());
		  });
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>