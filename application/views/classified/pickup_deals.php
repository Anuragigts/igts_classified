	<title>Right Deals ::  Pick-up deals</title>
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
	<!-- use jssor.slider.debug.js instead for debug -->
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
		$(".favourite_label").click(function(){
			var id = $(this).attr('id');
			var id1 = id.split(',');
			var val = $(".favourite_label1").hasClass('active');
			if (val == true) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>description_view/remove_favourite",
					data: {
						ad_id: id1[0], 
						login_id: id1[1]
					},
					success: function (data) {
						$("div .del"+id1[0]+id1[1]).remove();
					}
				})
			}
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
		
		<div class="content_info">
			<div class="paddings">
				<div class="container">
					<div class="row">
						<!-- Item Table-->
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

						<form action="#" method="post" class="j-forms">
							<!-- Item Table-->
							<div class="col-sm-9 list-view">
								<div class="row">
									<div class="col-sm-12">
										<h2>Pickup deals</h2>
										<label>Hi <?php echo @$log_name; ?>, you have <?php echo count(@$pickup_deals); ?> Pickup deals</label><hr>
									</div>
								</div>
								
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
												<li >
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
												<li >
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
                                    </div>
                                </div>
                                <!-- sort-by-container-->
								
								<div class="row list_view_searches">
                                    <!-- platinum+urgent package start -->
                                    <?php foreach (@$pickup_deals as $pvalue) {
                                    	/*currency symbol*/ 
                                    	if ($pvalue->currency == 'pound') {
                                    		$currency = '£';
                                    	}
                                    	else if ($pvalue->currency == 'euro') {
                                    		$currency = '€';
                                    	}
                                    	if ($pvalue->package_type == 'platinum' && $pvalue->urgent_package != '') {
                                     ?>
                                    <div class="col-md-12 <?php echo "del".$pvalue->ad_id.$this->session->userdata('login_id'); ?>">
										<div class="first_list">
											<div class="row">
												<div class="col-sm-4">
													<?php if ($pvalue->urgent_package !='') { ?>
														<div class="featured-badge">
															<span>Urgent</span>
														</div>
													<?php } ?>
													<div class="xuSlider">
														<ul class="sliders">
															<?php 
															$pic = mysql_query("select * from ad_img WHERE ad_id = '$pvalue->ad_id'");
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
															<img src="img/icons/crown.png" class="pull-right" alt="Crown" title="Crown Icon"></b>
														</div>
													</div>
												</div>
												<div class="col-sm-8 middle_text">
													<div class="row">
														<div class="col-sm-8">
															<div class="row">
																<div class="col-xs-8">
																	<h3 class="list_title"><?php echo $pvalue->deal_tag; ?></h3>
																</div>
																<div class="col-xs-4">
																	<div class="add-to-favourite-list pull-right">
																		<a href="javascript:void(0);" class="favourite_label" id="<?php echo $pvalue->ad_id.",".$this->session->userdata('login_id'); ?>">
																		<span class="favourite_label1 active" title="Add to favourite"></span>
																		</a>
																	</div>
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
																		<a href="javascript:void(0);" class="location loc_map" id="<?php echo $pvalue->latt.','.$pvalue->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $pvalue->loc_name; ?>"> Location</a>
																	</div>
																</div>
															</div>
														</div>
														
														<?php if ($pvalue->ad_type != 'consumer') {
																if ($pvalue->bus_logo != '') { ?>
																	<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/<?php echo $pvalue->bus_logo; ?>" alt="<?php echo $pvalue->bus_logo; ?>" title="business logo" class="img-responsive">
																</div>
															<?php	}
																else{ ?>
																<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/trader.png" alt="trader.png" title="business logo" class="img-responsive">
																</div>
															<?php	}
															  } ?>
													</div>
													<hr class="separator">
													<div class="row">
														<div class="col-xs-8">
															<div class="row">
																<div class="col-xs-12">
																	<p class=""><?php echo substr(strip_tags($pvalue->deal_desc),1,46); ?> </p>
																</div>
																<div class="col-xs-12">
																	<a href="description_view/details/<?php echo $pvalue->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																</div>
															</div>
														</div>
														<div class="col-xs-4">
															<div class="row">
																<div class="col-xs-10 col-xs-offset-1 amt_bg">
																	<h3 class="view_price"><?php echo $currency.$pvalue->price; ?></h3>
																</div>
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
														<li><i class="fa fa-camera"></i><a href="#"><?php echo $pvalue->img_count; ?></a></li>
														<li><i class="fa fa-video-camera"></i><a href="#">1</a></li>
														<li><i class="fa fa-user"></i><a href="#"><?php echo $log_name; ?></a></li>
														<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($pvalue->created_on)); ?></span></li>
														<li><i class="fa fa-eye"></i><span>0 Views</span></li>
														<li><span>Deal ID : <?php echo $pvalue->ad_prefix.$pvalue->ad_id; ?></span></li>
													</ul>                      
												</div>
											</div>
										</div><hr class="separator">	
										<!-- End Item Gallery List View-->
									</div>
									<?php } ?>
									<!-- platinum+urgent package end -->
									
									<!-- platinum package start-->
									<?php 
									if ($pvalue->package_type == 'platinum' && $pvalue->urgent_package == ''){
									 ?>
                                    <div class="col-md-12 <?php echo "del".$pvalue->ad_id.$this->session->userdata('login_id'); ?>">
										<div class="first_list">
											<div class="row">
												<div class="col-sm-4">
													<div class="xuSlider">
														<ul class="sliders">
															<?php 
															$pic = mysql_query("select * from ad_img WHERE ad_id = '$pvalue->ad_id'");
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
															<img src="img/icons/crown.png" class="pull-right" alt="Crown" title="Crown Icon"></b>
														</div>
													</div>
												</div>
												<div class="col-sm-8 middle_text">
													<div class="row">
														<div class="col-sm-8">
															<div class="row">
																<div class="col-xs-8">
																	<h3 class="list_title"><?php echo $pvalue->deal_tag; ?></h3>
																</div>
																<div class="col-xs-4">
																	<div class="add-to-favourite-list pull-right">
																		<a href="javascript:void(0);" class="favourite_label" id="<?php echo $pvalue->ad_id.",".$this->session->userdata('login_id'); ?>">
																		<span class="favourite_label1 active"  title="Add to favourite"></span>
																		</a>
																	</div>
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
																		<a href="javascript:void(0);" class="location loc_map" id="<?php echo $pvalue->latt.','.$pvalue->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $pvalue->loc_name; ?>"> Location</a>
																	</div>
																</div>
															</div>
														</div>
														
														<?php if ($pvalue->ad_type != 'consumer') {
																if ($pvalue->bus_logo != '') { ?>
																	<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/<?php echo $pvalue->bus_logo; ?>" alt="<?php echo $pvalue->bus_logo; ?>" title="business logo" class="img-responsive">
																</div>
															<?php	}
																else{ ?>
																<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/trader.png" alt="trader.png" title="business logo" class="img-responsive">
																</div>
															<?php	}
															  } ?>
													</div>
													<hr class="separator">
													<div class="row">
														<div class="col-xs-8">
															<div class="row">
																<div class="col-xs-12">
																	<p class=""><?php echo substr(strip_tags($pvalue->deal_desc),1,46); ?> </p>
																</div>
																<div class="col-xs-12">
																	<a href="description_view/details/<?php echo $pvalue->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																</div>
															</div>
														</div>
														<div class="col-xs-4">
															<div class="row">
																<?php if ($pvalue->category_id != 'jobs') { ?>
																<div class="col-xs-10 col-xs-offset-1 amt_bg">
																	<h3 class="view_price"><?php echo $currency.$pvalue->price; ?></h3>
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
														<li><i class="fa fa-camera"></i><a href="#"><?php echo $pvalue->img_count; ?></a></li>
														<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
														<li><i class="fa fa-user"></i><a href="#"><?php echo $log_name; ?></a></li>
														<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($pvalue->created_on)); ?></span></li>
														<li><i class="fa fa-eye"></i><span>0 Views</span></li>
														<li><span>Deal ID : <?php echo $pvalue->ad_prefix.$pvalue->ad_id; ?></span></li>
													</ul>                      
												</div>
											</div>
										</div><hr class="separator">	
									</div>
									<?php } ?>
									<!-- platinum package end -->

									<!-- gold+urgent package starts -->
									<?php 
									if ($pvalue->package_type == 'gold' && $pvalue->urgent_package != ''){
									 ?>
									<div class="col-md-12 <?php echo "del".$pvalue->ad_id.$this->session->userdata('login_id'); ?>">
										<div class="first_list gold_bgcolor">
											<div class="row">
												<div class="col-sm-4">
													<?php if ($pvalue->urgent_package !='') { ?>
														<div class="featured-badge">
															<span>Urgent</span>
														</div>
													<?php } ?>
													<div class="img-hover view_img">
														<img src="ad_images/<?php echo $pvalue->img_name; ?>" alt="img_1" title="img_1" class="img-responsive">
														<div class="overlay"><a href="description_view/details/<?php echo $pvalue->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
													</div>
													<div class="">
														<div class="price11">
															<span></span><b>
															<img src="img/icons/thumb.png" class="pull-right" alt="thumb" title="thumb Icon"></b>
														</div>
													</div>
												</div>
												<div class="col-sm-8 middle_text">
													<div class="row">
														<div class="col-sm-8">
															<div class="row">
																<div class="col-xs-8">
																	<h3 class="list_title"><?php echo $pvalue->deal_tag; ?></h3>
																</div>
																<div class="col-xs-4">
																	<div class="add-to-favourite-list pull-right">
																		<a href="javascript:void(0);" class="favourite_label" id="<?php echo $pvalue->ad_id.",".$this->session->userdata('login_id'); ?>">
																		<span class="favourite_label1 active"  title="Add to favourite"></span>
																		</a>
																	</div>
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
																		<a href="javascript:void(0);" class="location loc_map" id="<?php echo $pvalue->latt.','.$pvalue->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $pvalue->loc_name; ?>"> Location</a>
																	</div>
																</div>
															</div>
														</div>
														
														<?php if ($pvalue->ad_type != 'consumer') {
																if ($pvalue->bus_logo != '') { ?>
																	<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/<?php echo $pvalue->bus_logo; ?>" alt="<?php echo $pvalue->bus_logo; ?>" title="business logo" class="img-responsive">
																</div>
															<?php	}
																else{ ?>
																<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/trader.png" alt="trader.png" title="business logo" class="img-responsive">
																</div>
															<?php	}
															  } ?>
													</div>
													<hr class="separator">
													<div class="row">
														<div class="col-xs-8">
															<div class="row">
																<div class="col-xs-12">
																	<p class=""><?php echo substr(strip_tags($pvalue->deal_desc),1,46); ?></p>
																</div>
																<div class="col-xs-12">
																	<a href="description_view/details/<?php echo $pvalue->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																</div>
															</div>
														</div>
														<div class="col-xs-4">
															<div class="row">
																<?php if ($pvalue->category_id != 'jobs') { ?>
																<div class="col-xs-10 col-xs-offset-1 amt_bg">
																	<h3 class="view_price"><?php echo $currency.$pvalue->price; ?></h3>
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
														<li><i class="fa fa-camera"></i><a href="#"><?php echo $pvalue->img_count; ?></a></li>
														<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
														<li><i class="fa fa-user"></i><a href="#"><?php echo $log_name; ?></a></li>
														<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($pvalue->created_on)); ?></span></li>
														<li><i class="fa fa-eye"></i><span>0 Views</span></li>
														<li><span>Deal ID : <?php echo $pvalue->ad_prefix.$pvalue->ad_id; ?></span></li>
													</ul>                      
												</div>
											</div>
										</div><hr class="separator">	
									</div>
									<?php } ?>
									<!-- gold+urgent package end -->
									
									<!-- gold package starts -->
									<?php 
									if ($pvalue->package_type == 'gold' && $pvalue->urgent_package == ''){
									 ?>
									<div class="col-md-12 <?php echo "del".$pvalue->ad_id.$this->session->userdata('login_id'); ?>">
										<div class="first_list gold_bgcolor">
											<div class="row">
												<div class="col-sm-4 ">
													<div class="img-hover view_img">
														<img src="ad_images/<?php echo $pvalue->img_name; ?>" alt="no_image.png" title="significant" class="img-responsive">
														<div class="overlay"><a href="description_view/details/<?php echo $pvalue->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
													</div>
													<div class="">
														<div class="price11">
															<span></span><b>
															<img src="img/icons/thumb.png" class="pull-right" alt="thumb" title="thumb Icon"></b>
														</div>
													</div>
												</div>
												<div class="col-sm-8 middle_text">
													<div class="row">
														<div class="col-sm-8">
															<div class="row">
																<div class="col-xs-8">
																	<h3 class="list_title"><?php echo $pvalue->deal_tag; ?></h3>
																</div>
																<div class="col-xs-4">
																	<div class="add-to-favourite-list pull-right">
																		<a href="javascript:void(0);" class="favourite_label" id="<?php echo $pvalue->ad_id.",".$this->session->userdata('login_id'); ?>">
																		<span class="favourite_label1 active"  title="Add to favourite"></span>
																		</a>
																	</div>
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
																		<a href="javascript:void(0);" class="location loc_map" id="<?php echo $pvalue->latt.','.$pvalue->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $pvalue->loc_name; ?>"> Location</a>
																	</div>
																</div>
															</div>
														</div>
														
														<?php if ($pvalue->ad_type != 'consumer') {
																if ($pvalue->bus_logo != '') { ?>
																	<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/<?php echo $pvalue->bus_logo; ?>" alt="<?php echo $pvalue->bus_logo; ?>" title="business logo" class="img-responsive">
																</div>
															<?php	}
																else{ ?>
																<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/trader.png" alt="trader.png" title="business logo" class="img-responsive">
																</div>
															<?php	}
															  } ?>
													</div>
													<hr class="separator">
													<div class="row">
														<div class="col-xs-8">
															<div class="row">
																<div class="col-xs-12">
																	<p class=""><?php echo substr(strip_tags($pvalue->deal_desc),1,46); ?></p>
																</div>
																<div class="col-xs-12">
																	<a href="description_view/details/<?php echo $pvalue->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																</div>
															</div>
														</div>
														<div class="col-xs-4">
															<div class="row">
																<?php if ($pvalue->category_id != 'jobs') { ?>
																<div class="col-xs-10 col-xs-offset-1 amt_bg">
																	<h3 class="view_price"><?php echo $currency.$pvalue->price; ?></h3>
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
														<li><i class="fa fa-camera"></i><a href="#"><?php echo $pvalue->img_count; ?></a></li>
														<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
														<li><i class="fa fa-user"></i><a href="#"><?php echo $log_name; ?></a></li>
														<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($pvalue->created_on)); ?></span></li>
														<li><i class="fa fa-eye"></i><span>0 Views</span></li>
														<li><span>Deal ID : <?php echo $pvalue->ad_prefix.$pvalue->ad_id; ?></span></li>
													</ul>                      
												</div>
											</div>
										</div><hr class="separator">	
									</div>
									<?php } ?>
									<!-- gold package end -->
									
									<!-- free+urgent package starts -->
									<?php 
									if ($pvalue->package_type == 'free' && $pvalue->urgent_package != ''){
									 ?>
									<div class="col-md-12 <?php echo "del".$pvalue->ad_id.$this->session->userdata('login_id'); ?>">
										<div class="first_list">
											<div class="row">
												<div class="col-sm-4 view_img">
													<?php if ($pvalue->urgent_package !='') { ?>
														<div class="featured-badge">
															<span>Urgent</span>
														</div>
													<?php } ?>
													<div class="img-hover">
														<img src="ad_images/<?php echo $pvalue->img_name; ?>" alt="img_1" title="img_1" class="img-responsive">
														<div class="overlay"><a href="description_view/details/<?php echo $pvalue->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
													</div>
												</div>
												<div class="col-sm-8 middle_text">
													<div class="row">
														<div class="col-sm-8">
															<div class="row">
																<div class="col-xs-8">
																	<h3 class="list_title"><?php echo $pvalue->deal_tag; ?></h3>
																</div>
																<div class="col-xs-4">
																	<div class="add-to-favourite-list pull-right">
																		<a href="javascript:void(0);" class="favourite_label" id="<?php echo $pvalue->ad_id.",".$this->session->userdata('login_id'); ?>">
																		<span class="favourite_label1 active"  title="Add to favourite"></span>
																		</a>
																	</div>
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
																		<a href="javascript:void(0);" class="location loc_map" id="<?php echo $pvalue->latt.','.$pvalue->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $pvalue->loc_name; ?>"> Location</a>
																	</div>
																</div>
															</div>
														</div>
														
														<?php if ($pvalue->ad_type != 'consumer') {
																if ($pvalue->bus_logo != '') { ?>
																	<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/<?php echo $pvalue->bus_logo; ?>" alt="<?php echo $pvalue->bus_logo; ?>" title="business logo" class="img-responsive">
																</div>
															<?php	}
																else{ ?>
																<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/trader.png" alt="trader.png" title="business logo" class="img-responsive">
																</div>
															<?php	}
															  } ?>
													</div>
													<hr class="separator">
													<div class="row">
														<div class="col-xs-8">
															<div class="row">
																<div class="col-xs-12">
																	<p class=""><?php echo substr(strip_tags($pvalue->deal_desc),1,46); ?></p>
																</div>
																<div class="col-xs-12">
																	<a href="description_view/details/<?php echo $pvalue->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																</div>
															</div>
														</div>
														<div class="col-xs-4">
															<div class="row">
																<?php if ($pvalue->category_id != 'jobs') { ?>
																<div class="col-xs-10 col-xs-offset-1 amt_bg">
																	<h3 class="view_price"><?php echo $currency.$pvalue->price; ?></h3>
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
														<li><i class="fa fa-camera"></i><a href="#"><?php echo $pvalue->img_count; ?></a></li>
														<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
														<li><i class="fa fa-user"></i><a href="#"><?php echo $log_name; ?></a></li>
														<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($pvalue->created_on)); ?></span></li>
														<li><i class="fa fa-eye"></i><span>0 Views</span></li>
														<li><span>Deal ID : <?php echo $pvalue->ad_prefix.$pvalue->ad_id; ?></span></li>
													</ul>                      
												</div>
											</div>
										</div><hr class="separator">	
									</div>
									<?php } ?>
									<!-- free+urgent package ends -->
									
									<!-- free package starts -->
									<?php 
									if ($pvalue->package_type == 'free' && $pvalue->urgent_package == ''){
									 ?>
									<div class="col-md-12 <?php echo "del".$pvalue->ad_id.$this->session->userdata('login_id'); ?>">
										<div class="first_list">
											<div class="row">
												<div class="col-sm-4 view_img">
													<div class="img-hover">
														<img src="ad_images/<?php echo $pvalue->img_name; ?>" alt="img_1" title="img_1" class="img-responsive">
														<div class="overlay"><a href="description_view/details/<?php echo $pvalue->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
													</div>
												</div>
												<div class="col-sm-8 middle_text">
													<div class="row">
														<div class="col-sm-8">
															<div class="row">
																<div class="col-xs-8">
																	<h3 class="list_title"><?php echo $pvalue->deal_tag; ?></h3>
																</div>
																<div class="col-xs-4">
																	<div class="add-to-favourite-list pull-right">
																		<a href="javascript:void(0);" class="favourite_label" id="<?php echo $pvalue->ad_id.",".$this->session->userdata('login_id'); ?>">
																		<span class="favourite_label1 active"  title="Add to favourite"></span>
																		</a>
																	</div>
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
																		<a href="javascript:void(0);" class="location loc_map" id="<?php echo $pvalue->latt.','.$pvalue->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $pvalue->loc_name; ?>"> Location</a>
																	</div>
																</div>
															</div>
														</div>
														
														<?php if ($pvalue->ad_type != 'consumer') {
																if ($pvalue->bus_logo != '') { ?>
																	<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/<?php echo $pvalue->bus_logo; ?>" alt="<?php echo $pvalue->bus_logo; ?>" title="business logo" class="img-responsive">
																</div>
															<?php	}
																else{ ?>
																<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos/trader.png" alt="trader.png" title="business logo" class="img-responsive">
																</div>
															<?php	}
															  } ?>
													</div>
													<hr class="separator">
													<div class="row">
														<div class="col-xs-8">
															<div class="row">
																<div class="col-xs-12">
																	<p class=""><?php echo substr(strip_tags($pvalue->deal_desc),1,46); ?></p>
																</div>
																<div class="col-xs-12">
																	<a href="description_view/details/<?php echo $pvalue->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																</div>
															</div>
														</div>
														<div class="col-xs-4">
															<div class="row">
																<?php if ($pvalue->category_id != 'jobs') { ?>
																<div class="col-xs-10 col-xs-offset-1 amt_bg">
																	<h3 class="view_price"><?php echo $currency.$pvalue->price; ?></h3>
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
														<li><i class="fa fa-camera"></i><a href="#"><?php echo $pvalue->img_count; ?></a></li>
														<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
														<li><i class="fa fa-user"></i><a href="#"><?php echo $log_name; ?></a></li>
														<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($pvalue->created_on)); ?></span></li>
														<li><i class="fa fa-eye"></i><span>0 Views</span></li>
														<li><span>Deal ID : <?php echo $pvalue->ad_prefix.$pvalue->ad_id; ?></span></li>
													</ul>                      
												</div>
											</div>
										</div><hr class="separator">	
									</div>
									<?php } ?>
									<!-- free package ends -->
									<?php } ?>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
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
	
	<script src="http://maps.googleapis.com/maps/api/js"></script>

	<script>
		var myCenter=new google.maps.LatLng(51.508742,-0.120850);

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
			 
		google.maps.event.addListener(map,'center_changed',function() {
		// 3 seconds after the center of the map has changed, pan back to the marker
		  window.setTimeout(function() {
			map.panTo(marker.getPosition());
		  },3000);
		  });
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	
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
	
	<script src="js/jquery.nicescroll.js"></script> 

	<script src="libs/jquery.mixitup.min.js"></script>
	<script src="libs/main.js"></script>

	<!-- location map -->
	<script type="text/javascript">
	$(function(){
		$(".loc_map").click(function(){
			var val = $(".loc_map").attr("id");
			var val1 = val.split(",");
			$(".map_show").html('<iframe src = "https://maps.google.com/maps?q='+val1[0]+','+val1[1]+'&hl=es;z=5&amp;output=embed" width="950px" height="300px"></iframe>');
		});
	});
	</script>