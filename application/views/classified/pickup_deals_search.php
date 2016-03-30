	<!-- platinum+urgent package start -->
	<?php foreach (@$pickup_deals as $pvalue) {
		/*location*/
			$latt = $pvalue->latt;
			$longg = $pvalue->longg;
			$url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$latt.",".$longg."&sensor=true";
			$ch = curl_init();
			// Disable SSL verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// Will return the response, if false it print the response
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Set the url
			curl_setopt($ch, CURLOPT_URL,$url);
			// Execute
			$result=curl_exec($ch);
			// Closing
			curl_close($ch);
			$json_response = json_decode($result, true);
			$city_name = $json_response['results'][0]['address_components'][2]['short_name'];
		/*currency symbol*/ 
		if ($pvalue->currency == 'pound') {
			$currency = '<span class="pound_sym"></span>';
		}
		else if ($pvalue->currency == 'euro') {
			$currency = '<span class="euro_sym"></span>';
		}
		if (($pvalue->package_type == '3' || $pvalue->package_type == '6') && $pvalue->urgent_package != '0') {
		?>
	<div class="col-md-12 <?php echo "del".$pvalue->ad_id.$this->session->userdata('login_id'); ?>">
		<div class="first_list">
			<div class="row">
				<div class="col-sm-4">
					<?php if ($pvalue->urgent_package !='') { ?>
					<div class="featured-badge">
					</div>
					<?php } ?>
					<div class="xuSlider">
						<ul class="sliders">
							<?php 
								$pic = mysql_query("select * from ad_img WHERE ad_id = '$pvalue->ad_id'");
								while ($res = mysql_fetch_object($pic)) { ?>
							<li><img src="<?php echo base_url(); ?>pictures/<?php echo $res->img_name; ?>" class="img-responsive" alt="<?php echo $res->img_name; ?>" title="<?php echo $res->img_name; ?>"></li>
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
							<img src="<?php echo base_url(); ?>img/icons/crown.png" class="pull-right" alt="Crown" title="Crown Icon"></b>
						</div>
					</div>
				</div>
				<div class="col-sm-8 middle_text">
					<div class="row">
						<div class="col-sm-8">
							<div class="row">
								<div class="col-xs-10">
									<h3 class="list_title"><?php echo substr($pvalue->deal_tag, 0,20); ?></h3>
								</div>
								<div class="col-xs-2">
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
										<img src="<?php echo base_url(); ?>img/icons/location_map.png" title="Location" alt="map" class="map_icon">
										<a href="javascript:void(0);" class="location loc_map" id="<?php echo $pvalue->latt.','.$pvalue->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $pvalue->loc_name; ?>"> <?php echo $city_name; ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php if ($pvalue->ad_type != 'consumer') {
							if ($pvalue->bus_logo != '') { ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $pvalue->bus_logo; ?>" alt="<?php echo $pvalue->bus_logo; ?>" title="business logo" class="img-responsive">
						</div>
						<?php	}
							else{ ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt="trader.png" title="business logo" class="img-responsive">
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
			</div>
			<!-- End Row-->
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="post-meta list_view_bottom" >
					<ul>
						<li><i class="fa fa-camera"></i><a href="#"><?php echo $pvalue->img_count; ?></a></li>
						<li><i class="fa fa-video-camera"></i><a href="#">1</a></li>
						<li><i class="fa fa-user"></i><a href="#"><?php echo $log_name; ?></a></li>
						<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($pvalue->created_on)); ?></span></li>
						<li><span>Deal ID : <?php echo $pvalue->ad_prefix.$pvalue->ad_id; ?></span></li>
					</ul>
				</div>
			</div>
		</div>
		<hr class="separator">
		<!-- End Item Gallery List View-->
	</div>
	<?php } ?>
	<!-- platinum+urgent package end -->
	<!-- platinum package start-->
	<?php 
		if (($pvalue->package_type == '3' || $pvalue->package_type == '6') && $pvalue->urgent_package == '0'){
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
							<li><img src="<?php echo base_url(); ?>pictures/<?php echo $res->img_name; ?>" class="img-responsive" alt="<?php echo $res->img_name; ?>" title="<?php echo $res->img_name; ?>"></li>
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
							<img src="<?php echo base_url(); ?>img/icons/crown.png" class="pull-right" alt="Crown" title="Crown Icon"></b>
						</div>
					</div>
				</div>
				<div class="col-sm-8 middle_text">
					<div class="row">
						<div class="col-sm-8">
							<div class="row">
								<div class="col-xs-10">
									<h3 class="list_title"><?php echo substr($pvalue->deal_tag, 0,20); ?></h3>
								</div>
								<div class="col-xs-2">
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
										<img src="<?php echo base_url(); ?>img/icons/location_map.png" title="Location" alt="map" class="map_icon">
										<a href="javascript:void(0);" class="location loc_map" id="<?php echo $pvalue->latt.','.$pvalue->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $pvalue->loc_name; ?>"> <?php echo $city_name; ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php if ($pvalue->ad_type != 'consumer') {
							if ($pvalue->bus_logo != '') { ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $pvalue->bus_logo; ?>" alt="<?php echo $pvalue->bus_logo; ?>" title="business logo" class="img-responsive">
						</div>
						<?php	}
							else{ ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt="trader.png" title="business logo" class="img-responsive">
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
								<?php if ($pvalue->category_id != '1') { ?>
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
						<li><span>Deal ID : <?php echo $pvalue->ad_prefix.$pvalue->ad_id; ?></span></li>
					</ul>
				</div>
			</div>
		</div>
		<hr class="separator">
	</div>
	<?php } ?>
	<!-- platinum package end -->
	<!-- gold+urgent package starts -->
	<?php 
		if (($pvalue->package_type == '2' || $pvalue->package_type == '5') && $pvalue->urgent_package != '0'){
		 ?>
	<div class="col-md-12 <?php echo "del".$pvalue->ad_id.$this->session->userdata('login_id'); ?>">
		<div class="first_list gold_bgcolor">
			<div class="row">
				<div class="col-sm-4">
					<?php if ($pvalue->urgent_package !='') { ?>
					<div class="featured-badge">
					</div>
					<?php } ?>
					<div class="img-hover view_img">
						<img src="<?php echo base_url(); ?>pictures/<?php echo $pvalue->img_name; ?>" alt="img_1" title="img_1" class="img-responsive">
						<div class="overlay"><a href="description_view/details/<?php echo $pvalue->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
					</div>
					<div class="">
						<div class="price11">
							<span></span><b>
							<img src="<?php echo base_url(); ?>img/icons/thumb.png" class="pull-right" alt="thumb" title="thumb Icon"></b>
						</div>
					</div>
				</div>
				<div class="col-sm-8 middle_text">
					<div class="row">
						<div class="col-sm-8">
							<div class="row">
								<div class="col-xs-10">
									<h3 class="list_title"><?php echo substr($pvalue->deal_tag, 0,20); ?></h3>
								</div>
								<div class="col-xs-2">
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
										<img src="<?php echo base_url(); ?>img/icons/location_map.png" title="Location" alt="map" class="map_icon">
										<a href="javascript:void(0);" class="location loc_map" id="<?php echo $pvalue->latt.','.$pvalue->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $pvalue->loc_name; ?>"> <?php echo $city_name; ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php if ($pvalue->ad_type != 'consumer') {
							if ($pvalue->bus_logo != '') { ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $pvalue->bus_logo; ?>" alt="<?php echo $pvalue->bus_logo; ?>" title="business logo" class="img-responsive">
						</div>
						<?php	}
							else{ ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt="trader.png" title="business logo" class="img-responsive">
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
								<?php if ($pvalue->category_id != '1') { ?>
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
			<!-- End Row-->
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="post-meta list_view_bottom gold_bgcolor">
					<ul>
						<li><i class="fa fa-camera"></i><a href="#"><?php echo $pvalue->img_count; ?></a></li>
						<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
						<li><i class="fa fa-user"></i><a href="#"><?php echo $log_name; ?></a></li>
						<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($pvalue->created_on)); ?></span></li>
						<li><span>Deal ID : <?php echo $pvalue->ad_prefix.$pvalue->ad_id; ?></span></li>
					</ul>
				</div>
			</div>
		</div>
		<hr class="separator">
	</div>
	<?php } ?>
	<!-- gold+urgent package end -->
	<!-- gold package starts -->
	<?php 
		if (($pvalue->package_type == '2' || $pvalue->package_type == '5') && $pvalue->urgent_package == '0'){
		 ?>
	<div class="col-md-12 <?php echo "del".$pvalue->ad_id.$this->session->userdata('login_id'); ?>">
		<div class="first_list gold_bgcolor">
			<div class="row">
				<div class="col-sm-4 ">
					<div class="img-hover view_img">
						<img src="<?php echo base_url(); ?>pictures/<?php echo $pvalue->img_name; ?>" alt="no_image.png" title="significant" class="img-responsive">
						<div class="overlay"><a href="description_view/details/<?php echo $pvalue->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
					</div>
					<div class="">
						<div class="price11">
							<span></span><b>
							<img src="<?php echo base_url(); ?>img/icons/thumb.png" class="pull-right" alt="thumb" title="thumb Icon"></b>
						</div>
					</div>
				</div>
				<div class="col-sm-8 middle_text">
					<div class="row">
						<div class="col-sm-8">
							<div class="row">
								<div class="col-xs-10">
									<h3 class="list_title"><?php echo substr($pvalue->deal_tag, 0,20); ?></h3>
								</div>
								<div class="col-xs-2">
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
										<img src="<?php echo base_url(); ?>img/icons/location_map.png" title="Location" alt="map" class="map_icon">
										<a href="javascript:void(0);" class="location loc_map" id="<?php echo $pvalue->latt.','.$pvalue->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $pvalue->loc_name; ?>"> <?php echo $city_name; ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php if ($pvalue->ad_type != 'consumer') {
							if ($pvalue->bus_logo != '') { ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $pvalue->bus_logo; ?>" alt="<?php echo $pvalue->bus_logo; ?>" title="business logo" class="img-responsive">
						</div>
						<?php	}
							else{ ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt="trader.png" title="business logo" class="img-responsive">
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
								<?php if ($pvalue->category_id != '1') { ?>
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
			<!-- End Row-->
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="post-meta list_view_bottom gold_bgcolor">
					<ul>
						<li><i class="fa fa-camera"></i><a href="#"><?php echo $pvalue->img_count; ?></a></li>
						<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
						<li><i class="fa fa-user"></i><a href="#"><?php echo $log_name; ?></a></li>
						<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($pvalue->created_on)); ?></span></li>
						<li><span>Deal ID : <?php echo $pvalue->ad_prefix.$pvalue->ad_id; ?></span></li>
					</ul>
				</div>
			</div>
		</div>
		<hr class="separator">
	</div>
	<?php } ?>
	<!-- gold package end -->
	<!-- free+urgent package starts -->
	<?php 
		if (($pvalue->package_type == '1' || $pvalue->package_type == '4') && $pvalue->urgent_package != '0'){
		 ?>
	<div class="col-md-12 <?php echo "del".$pvalue->ad_id.$this->session->userdata('login_id'); ?>">
		<div class="first_list">
			<div class="row">
				<div class="col-sm-4 view_img">
					<?php if ($pvalue->urgent_package !='') { ?>
					<div class="featured-badge">
					</div>
					<?php } ?>
					<div class="img-hover">
						<img src="<?php echo base_url(); ?>pictures/<?php echo $pvalue->img_name; ?>" alt="img_1" title="img_1" class="img-responsive">
						<div class="overlay"><a href="description_view/details/<?php echo $pvalue->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
					</div>
				</div>
				<div class="col-sm-8 middle_text">
					<div class="row">
						<div class="col-sm-8">
							<div class="row">
								<div class="col-xs-10">
									<h3 class="list_title"><?php echo substr($pvalue->deal_tag, 0,20); ?></h3>
								</div>
								<div class="col-xs-2">
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
										<img src="<?php echo base_url(); ?>img/icons/location_map.png" title="Location" alt="map" class="map_icon">
										<a href="javascript:void(0);" class="location loc_map" id="<?php echo $pvalue->latt.','.$pvalue->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $pvalue->loc_name; ?>"> <?php echo $city_name; ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php if ($pvalue->ad_type != 'consumer') {
							if ($pvalue->bus_logo != '') { ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $pvalue->bus_logo; ?>" alt="<?php echo $pvalue->bus_logo; ?>" title="business logo" class="img-responsive">
						</div>
						<?php	}
							else{ ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt="trader.png" title="business logo" class="img-responsive">
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
								<?php if ($pvalue->category_id != '1') { ?>
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
			<!-- End Row-->
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="post-meta list_view_bottom" >
					<ul>
						<li><i class="fa fa-camera"></i><a href="#"><?php echo $pvalue->img_count; ?></a></li>
						<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
						<li><i class="fa fa-user"></i><a href="#"><?php echo $log_name; ?></a></li>
						<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($pvalue->created_on)); ?></span></li>
						<li><span>Deal ID : <?php echo $pvalue->ad_prefix.$pvalue->ad_id; ?></span></li>
					</ul>
				</div>
			</div>
		</div>
		<hr class="separator">
	</div>
	<?php } ?>
	<!-- free+urgent package ends -->
	<!-- free package starts -->
	<?php 
		if (($pvalue->package_type == '1' || $pvalue->package_type == '4') && $pvalue->urgent_package == '0'){
		 ?>
	<div class="col-md-12 <?php echo "del".$pvalue->ad_id.$this->session->userdata('login_id'); ?>">
		<div class="first_list">
			<div class="row">
				<div class="col-sm-4 view_img">
					<div class="img-hover">
						<img src="<?php echo base_url(); ?>pictures/<?php echo $pvalue->img_name; ?>" alt="img_1" title="img_1" class="img-responsive">
						<div class="overlay"><a href="description_view/details/<?php echo $pvalue->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
					</div>
				</div>
				<div class="col-sm-8 middle_text">
					<div class="row">
						<div class="col-sm-8">
							<div class="row">
								<div class="col-xs-10">
									<h3 class="list_title"><?php echo substr($pvalue->deal_tag, 0,20); ?></h3>
								</div>
								<div class="col-xs-2">
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
										<img src="<?php echo base_url(); ?>img/icons/location_map.png" title="Location" alt="map" class="map_icon">
										<a href="javascript:void(0);" class="location loc_map" id="<?php echo $pvalue->latt.','.$pvalue->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $pvalue->loc_name; ?>"> <?php echo $city_name; ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php if ($pvalue->ad_type != 'consumer') {
							if ($pvalue->bus_logo != '') { ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $pvalue->bus_logo; ?>" alt="<?php echo $pvalue->bus_logo; ?>" title="business logo" class="img-responsive">
						</div>
						<?php	}
							else{ ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt="trader.png" title="business logo" class="img-responsive">
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
								<?php if ($pvalue->category_id != '1') { ?>
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
			<!-- End Row-->
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="post-meta list_view_bottom" >
					<ul>
						<li><i class="fa fa-camera"></i><a href="#"><?php echo $pvalue->img_count; ?></a></li>
						<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
						<li><i class="fa fa-user"></i><a href="#"><?php echo $log_name; ?></a></li>
						<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($pvalue->created_on)); ?></span></li>
						<li><span>Deal ID : <?php echo $pvalue->ad_prefix.$pvalue->ad_id; ?></span></li>
					</ul>
				</div>
			</div>
		</div>
		<hr class="separator">
	</div>
	<?php } ?>
	<!-- free package ends -->
	<?php } ?>
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