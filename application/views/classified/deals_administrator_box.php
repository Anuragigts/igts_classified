	<title>365 Deals :: Deals Administrator</title>
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
									<img src="img/icons/people.png" alt="people" title="people image">
									<h2>User Name</h2>
									<!--<span>$ 99 / per month</span> -->
								</div>
								<ul class="dashboard_tag">
									<li><img src="img/icons/admin.png" alt="admin" title="admin image"><a href='deals_administrator'>Deals Administrator</a></li>
									<li><img src="img/icons/pickup.png" alt="pickup" title="pickup image"><a href='pickup_deals'>Pickup deals</a></li>
									<li><img src="img/icons/seaked.png" alt="seaked" title="seaked image"><a href='seeked_searches'>Reserved Searches</a></li>
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
										<label>Hi User Name, you have 0 Pick-up deals</label>
										<hr>
									</div>
								</div>
								<!-- sort-by-container-->
								<div class="sort-by-container tooltip-hover">
									<div class="row">
										<div class="col-md-9">
											<strong>Sort by:</strong>
											<ul>
												<li>
													<div class="selector">
														<select>
															<option value="5">5 Starts</option>
															<option value="4">4 Starts</option>
															<option value="3">3 Starts</option>
															<option value="2">2 Starts</option>
															<option value="1">1 Starts</option>
														</select>
														<span class="custom-select">Users Rating</span>
													</div>
												</li>
												<li>
													<div class="selector">
														<select>
															<option value="1">A To Z</option>
															<option value="2">Z To A</option>
														</select>
														<span class="custom-select">Name</span>
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
								<div class="first_box_list">
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-4">
											<div class="featured-badge">
												<span>Urgent</span>
											</div>
											<div class="xuSlider xuSlider_box">
												<ul class="sliders">
													<li><img src="img/blog/002.jpg" class="img-responsive" alt="Slider1" title="Sliders"></li>
													<li><img src="img/blog/003.jpg" class="img-responsive" alt="Slider2" title="Sliders"></li>
													<li><img src="img/blog/004.jpg" class="img-responsive" alt="Slider3" title="Sliders"></li>
													<li><img src="img/blog/005.jpg" class="img-responsive" alt="Slider4" title="Sliders"></li>
													<li><img src="img/blog/006.jpg" class="img-responsive" alt="Slider5" title="Sliders"></li>
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
											<div class="info-gallery">
												<h3>Sample text Here</h3>
												<hr class="separator">
												<p>The Royal National is in London near Covent Garden and 100 meters.</p>
												<ul class="starts">
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
												</ul>
												<a href="description_view" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
												<div class="price">
													<b><img src="img/icons/crown.png" alt="crown" title="Crown Icon"></b>£125 
												</div>
											</div>
										</div>
										
										<div class="col-xs-12 col-sm-6 col-md-4">
											<div class="xuSlider xuSlider_box">
												<ul class="sliders">
													<li><img src="img/blog/002.jpg" class="img-responsive" alt="Slider1" title="Sliders"></li>
													<li><img src="img/blog/003.jpg" class="img-responsive" alt="Slider2" title="Sliders"></li>
													<li><img src="img/blog/004.jpg" class="img-responsive" alt="Slider3" title="Sliders"></li>
													<li><img src="img/blog/005.jpg" class="img-responsive" alt="Slider4" title="Sliders"></li>
													<li><img src="img/blog/006.jpg" class="img-responsive" alt="Slider5" title="Sliders"></li>
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
											<div class="info-gallery">
												<h3>Sample text Here</h3>
												<hr class="separator">
												<p>The Royal National is in London near Covent Garden and 100 meters.</p>
												<ul class="starts">
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
												</ul>
												<a href="description_view" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
												<div class="price">
													<b><img src="img/icons/crown.png" alt="crown" title="Crown Icon"></b>£125
												</div>
											</div>
										</div>
										
										<div class="col-xs-12 col-sm-6 col-md-4">
											<div class="featured-badge">
												<span>Urgent</span>
											</div>
											<div class="img-hover">
												<img src="img/hotel-img/1.jpg" alt="" class="img-responsive">
												<div class="overlay">
													<a href="description_view"><i class="top_20 fa fa-link"></i></a>
												</div>
											</div>
											<div class="info-gallery gold_bgcolor">
												<h3>Sample text Here</h3>
												<hr class="separator">
												<p>The Royal National is in London near Covent Garden and 100 meters.</p>
												<ul class="starts">
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
												</ul>
												<a href="description_view" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
												<div class="price">
													<b><img src="img/icons/thumb.png" alt="Thumb" title="Thumb Icon"></b>£125
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-xs-12 col-sm-6 col-md-4">
											<div class="img-hover">
												<img src="img/hotel-img/1.jpg" alt="" class="img-responsive">
												<div class="overlay">
													<a href="description_view"><i class="top_20 fa fa-link"></i></a>
												</div>
											</div>
											<div class="info-gallery gold_bgcolor">
												<h3>Sample text Here</h3>
												<hr class="separator">
												<p>The Royal National is in London near Covent Garden and 100 meters.</p>
												<ul class="starts">
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
												</ul>
												<a href="description_view" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
												<div class="price">
													<b><img src="img/icons/thumb.png" alt="Thumb" title="Thumb Icon"></b>£125
												</div>
											</div>
										</div>
										
										<div class="col-xs-12 col-sm-6 col-md-4">
											<div class="featured-badge">
												<span>Urgent</span>
											</div>
											<div class="img-hover">
												<img src="img/hotel-img/1.jpg" alt="" class="img-responsive">
												<div class="overlay">
													<a href="description_view"><i class="top_20 fa fa-link"></i></a>
												</div>
											</div>
											<div class="info-gallery">
												<h3>Sample text Here</h3>
												<hr class="separator">
												<p>The Royal National is in London near Covent Garden and 100 meters.</p>
												<ul class="starts">
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
												</ul>
												<a href="description_view" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
												<div class="price">
													<b></b>£125
												</div>
											</div>
										</div>
										
										<div class="col-xs-12 col-sm-6 col-md-4">
											<div class="img-hover">
												<img src="img/hotel-img/1.jpg" alt="" class="img-responsive">
												<div class="overlay">
													<a href="description_view"><i class="top_20 fa fa-link"></i></a>
												</div>
											</div>
											<div class="info-gallery">
												<h3>Sample text Here</h3>
												<hr class="separator">
												<p>The Royal National is in London near Covent Garden and 100 meters.</p>
												<ul class="starts">
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
												</ul>
												<a href="description_view" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
												<div class="price">
													<b></b>£125
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
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