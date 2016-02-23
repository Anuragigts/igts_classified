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
		<div class="row">
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
		?>
			<!-- platinum+urgent starts -->
			<?php 
			if ($m_details->package_type == 'platinum' && $m_details->urgent_package != '') {
			 ?>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="featured-badge">
					<span>Urgent</span>
				</div>
				<div class="xuSlider xuSlider_plat_urgtnt">
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
				<div class="info-gallery">
					<h3><?php echo $m_details->deal_tag; ?></h3>
					<hr class="separator">
					<p><?php echo substr(strip_tags($m_details->deal_desc), 0, 39); ?></p>
					<?php if ($m_details->category_id != 'jobs') { ?>
					<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
					<?php }
					else{ ?>
						<h3 class="home_price"></h3>		
					<?php	}
					?>
					<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
					<div class="price">
						<b><img src="img/icons/crown.png" alt="crown" title="Best Deal"></b> 
					</div>
				</div>
			</div>
			<?php } ?>
			<!-- platinum+urgent ends -->
			
			<!-- platinum starts -->
			<?php 
			if ($m_details->package_type == 'platinum' && $m_details->urgent_package == '') {
			 ?>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="xuSlider xuSlider_plat">
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
				<div class="info-gallery">
					<h3><?php echo $m_details->deal_tag; ?></h3>
					<hr class="separator">
					<p><?php echo substr(strip_tags($m_details->deal_desc), 0, 39); ?></p>
					<?php if ($m_details->category_id != 'jobs') { ?>
					<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
					<?php }
					else{ ?>
						<h3 class="home_price"></h3>		
					<?php	}
					?>
					<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
					<div class="price">
						<b><img src="img/icons/crown.png" alt="crown" title="Best Deal"></b>
					</div>
				</div>
			</div>
			<?php } ?>
			<!-- platinum ends -->
			
			<!-- gold+urgent starts -->
			<?php 
			if ($m_details->package_type == 'gold' && $m_details->urgent_package != '') {
			 ?>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="featured-badge">
					<span>Urgent</span>
				</div>
				<div class="img-hover box_img">
					<img src="ad_images/<?php echo $m_details->img_name; ?>" alt="" class="img-responsive">
					<div class="overlay">
						<a href="description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a>
					</div>
				</div>
				<div class="info-gallery gold_bgcolor">
					<h3><?php echo $m_details->deal_tag; ?></h3>
					<hr class="separator">
					<p><?php echo substr(strip_tags($m_details->deal_desc), 0, 39); ?></p>
					<?php if ($m_details->category_id != 'jobs') { ?>
					<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
					<?php }
					else{ ?>
						<h3 class="home_price"></h3>		
					<?php	}
					?>
					<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
					<div class="price">
						<b><img src="img/icons/thumb.png" alt="Thumb" title="Right Deal"></b>
					</div>
				</div>
			</div>
			<?php } ?>
			<!-- gold+urgent starts -->
		
			<!-- gold starts -->
			<?php 
		if ($m_details->package_type == 'gold' && $m_details->urgent_package == '') {
		 ?>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="img-hover box_img">
					<img src="ad_images/<?php echo $m_details->img_name; ?>" alt="" class="img-responsive">
					<div class="overlay">
						<a href="description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a>
					</div>
				</div>
				<div class="info-gallery gold_bgcolor">
					<h3><?php echo $m_details->deal_tag; ?></h3>
					<hr class="separator">
					<p><?php echo substr(strip_tags($m_details->deal_desc), 0, 39); ?></p>
					<?php if ($m_details->category_id != 'jobs') { ?>
					<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
					<?php }
					else{ ?>
						<h3 class="home_price"></h3>		
					<?php	}
					?>
					<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
					<div class="price">
						<b><img src="img/icons/thumb.png" alt="Thumb" title="Right Deal"></b>
					</div>
				</div>
			</div>
			<?php } ?>
			<!-- gold ends-->
			
			<!-- free+urgent starts-->
			<?php 
		if ($m_details->package_type == 'free' && $m_details->urgent_package != '') {
		 ?>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="featured-badge">
					<span>Urgent</span>
				</div>
				<div class="img-hover box_img">
					<img src="ad_images/<?php echo $m_details->img_name; ?>" alt="" class="img-responsive">
					<div class="overlay">
						<a href="description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a>
					</div>
				</div>
				<div class="info-gallery">
					<h3><?php echo $m_details->deal_tag; ?></h3>
					<hr class="separator">
					<p><?php echo substr(strip_tags($m_details->deal_desc), 0, 39); ?></p>
					<?php if ($m_details->category_id != 'jobs') { ?>
					<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
					<?php }
					else{ ?>
						<h3 class="home_price"></h3>		
					<?php	}
					?>
					<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
				</div>
			</div>
			<?php } ?>
			<!-- free+urgent ends-->
			
			<!-- free starts-->
			<?php 
		if ($m_details->package_type == 'free' && $m_details->urgent_package == '') {
		 ?>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="img-hover box_img">
					<img src="ad_images/<?php echo $m_details->img_name; ?>" alt="" class="img-responsive">
					<div class="overlay">
						<a href="description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a>
					</div>
				</div>
				<div class="info-gallery">
					<h3><?php echo $m_details->deal_tag; ?></h3>
					<hr class="separator">
					<p><?php echo substr(strip_tags($m_details->deal_desc), 0, 39); ?></p>
					<?php if ($m_details->category_id != 'jobs') { ?>
					<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
					<?php }
					else{ ?>
						<h3 class="home_price"></h3>		
					<?php	}
					?>
					<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
				</div>
			</div>
			<?php } ?>
			<!-- free ends-->
			<?php } ?>
		</div>

		<script type="text/javascript" src="libs/jquery.xuSlider.js"></script>
		<script>
			$('.xuSlider').xuSlider();
		</script>