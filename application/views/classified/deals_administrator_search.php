	<!-- platinum package start-->
	<?php foreach ($my_ads_details as $m_details) {
		$qry = mysql_query("select ad_id,COUNT(*) AS no_ratings, SUM(rating) AS rating_sum FROM review_rating WHERE ad_id = '$m_details->ad_id' AND status = 1 GROUP BY ad_id");
		 	if (mysql_num_rows($qry) > 0) {
		 		$no_ratings = mysql_result($qry,0,'no_ratings');
		 		$rating_sum = mysql_result($qry,0,'rating_sum');
		 	}
		 	else{
		 		$no_ratings = 0;
		 		$rating_sum = 0;
		 	}
		 	if ($no_ratings != 0) {
		 		$avg_per = ($rating_sum/($no_ratings*5))*100;
		 		$total_rating = round(($avg_per/100)*5);
		 	}
		 	else{
		 		$total_rating = 0;
		 	}
		/*location*/
		$city_name = $m_details->loc_city;
		/*person name*/
		if ($m_details->ad_type == 'business') {
		$person_name = @mysql_result(mysql_query("SELECT `contact_person` FROM `contactinfo_business` WHERE ad_id = '$m_details->ad_id'"), 0,'contact_person');
		}
		else if ($m_details->ad_type == 'consumer') {
		$person_name = @mysql_result(mysql_query("SELECT `contact_name` FROM `contactinfo_consumer` WHERE ad_id = '$m_details->ad_id'"), 0,'contact_name');
		}
		
		/*currency symbol*/ 
		if ($m_details->currency == 'pound') {
			$currency = '<span class="pound_sym"></span>';
		}
		else if ($m_details->currency == 'euro') {
			$currency = '<span class="euro_sym"></span>';
		}
		
		if (($m_details->package_type == 3 || $m_details->package_type == 6) && $m_details->urgent_package == 0) {
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
							<img src="<?php echo base_url(); ?>img/icons/crown.png" class="pull-right" alt="Crown" title="Best Deal"></b>
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
								<?php if ($total_rating == 0) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 1) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 2) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 3) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 4) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 5) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<div class="col-xs-8">
									<div class="location pull-right ">
										<img src="<?php echo base_url(); ?>img/icons/location_map.png" title="Location" alt="map" class="map_icon">
										<a href="javascript:void(0);" class="location loc_map" id="<?php echo $m_details->latt.','.$m_details->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $m_details->location_name; ?>"> <?php echo $city_name; ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php
							if ($m_details->ad_type == 'business') {
								if ($m_details->bus_logo != '') { ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $m_details->bus_logo; ?>" alt="<?php echo $m_details->bus_logo; ?>" title="busniess logo" class="img-responsive">
						</div>
						<?php }
							else{ ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt="intel" title="intel logo" class="img-responsive">
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
									<p class=""><?php echo substr(strip_tags($m_details->deal_desc), 0, 90); ?></p>
								</div>
								<div class="col-xs-12">
									<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
								</div>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="row">
								<?php if ($m_details->category_id != '1') { ?>
								<div class="col-xs-10 col-xs-offset-1 amt_bg">
									<h3 class="view_price"><?php echo $currency.number_format($m_details->price); ?></h3>
								</div>
								<?php }
									else{ ?>
								<div class="col-xs-10 col-xs-offset-1">
									<h3 class="top_31"></h3>
								</div>
								<?php	}
									?>
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
					</ul>
				</div>
			</div>
		</div>
		<hr class="separator">
	</div>
	<?php } ?>
	<!-- platinum package end -->
	<?php 
		if (($m_details->package_type == 3 || $m_details->package_type == 6) && $m_details->urgent_package != 0) {
		 ?>
	<!-- platinum+urgent package start -->
	<div class="col-md-12">
		<div class="first_list">
			<div class="row">
				<div class="col-sm-4">
					<?php if ($m_details->urg != '') { ?>
						<div class="featured-badge">
						</div>
					 <?php } ?>
					<div class="xuSlider">
						<ul class="sliders">
							<?php 
								$pic = mysql_query("select * from ad_img WHERE ad_id = '$m_details->ad_id'");
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
							<img src="<?php echo base_url(); ?>img/icons/crown.png" class="pull-right" alt="Crown" title="Best Deal"></b>
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
								<?php if ($total_rating == 0) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 1) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 2) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 3) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 4) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 5) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<div class="col-xs-8">
									<div class="location pull-right ">
										<img src="<?php echo base_url(); ?>img/icons/location_map.png" title="Location" alt="map" class="map_icon">
										<a href="javascript:void(0);" class="location loc_map" id="<?php echo $m_details->latt.','.$m_details->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $m_details->location_name; ?>"> <?php echo $city_name; ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php
							if ($m_details->ad_type == 'business') {
								if ($m_details->bus_logo != '') { ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $m_details->bus_logo; ?>" alt="<?php echo $m_details->bus_logo; ?>" title="busniess logo" class="img-responsive">
						</div>
						<?php }
							else{ ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt="intel" title="intel logo" class="img-responsive">
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
									<p class=""><?php echo substr(strip_tags($m_details->deal_desc), 0, 90); ?></p>
								</div>
								<div class="col-xs-12">
									<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
								</div>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="row">
								<?php if ($m_details->category_id != '1') { ?>
								<div class="col-xs-10 col-xs-offset-1 amt_bg">
									<h3 class="view_price"><?php echo $currency.number_format($m_details->price); ?></h3>
								</div>
								<?php }
									else{ ?>
								<div class="col-xs-10 col-xs-offset-1">
									<h3 class="top_31"></h3>
								</div>
								<?php	}
									?>
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
						<li><i class="fa fa-camera"></i><a href="#"><?php echo $m_details->img_count; ?></a></li>
						<li><i class="fa fa-video-camera"></i><a href="#">1</a></li>
						<li><i class="fa fa-user"></i><a href="#"><?php echo $person_name; ?></a></li>
						<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($m_details->created_on)); ?></span></li>
						<li><span>Deal ID : <?php echo $m_details->ad_prefix.$m_details->ad_id; ?></span></li>
					</ul>
				</div>
			</div>
		</div>
		<hr class="separator">
		<!-- End Item Gallery List View-->
	</div>
	<?php } ?>
	<!-- platinum+urgent package end -->
	<?php 
		if (($m_details->package_type == 2 || $m_details->package_type == 5) && $m_details->urgent_package == 0) {
		 ?>
	<!-- gold package starts -->
	<div class="col-md-12">
		<div class="first_list gold_bgcolor">
			<div class="row">
				<div class="col-sm-4 ">
					<div class="img-hover view_img">
						<img src="<?php echo base_url(); ?>pictures/<?php echo $m_details->img_name; ?>" alt="<?php echo $m_details->img_name; ?>" title="<?php echo $m_details->img_name; ?>" class="img-responsive">
						<div class="overlay"><a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
					</div>
					<div class="">
						<div class="price11">
							<span></span><b>
							<img src="<?php echo base_url(); ?>img/icons/thumb.png" class="pull-right" alt="thumb" title="Right Deal"></b>
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
								<?php if ($total_rating == 0) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 1) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 2) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 3) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 4) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 5) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<div class="col-xs-8">
									<div class="location pull-right ">
										<img src="<?php echo base_url(); ?>img/icons/location_map.png" title="Location" alt="map" class="map_icon">
										<a href="javascript:void(0);" class="location loc_map" id="<?php echo $m_details->latt.','.$m_details->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $m_details->location_name; ?>"> <?php echo $city_name; ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php
							if ($m_details->ad_type == 'business') {
								if ($m_details->bus_logo != '') { ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $m_details->bus_logo; ?>" alt="<?php echo $m_details->bus_logo; ?>" title="busniess logo" class="img-responsive">
						</div>
						<?php }
							else{ ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt="intel" title="intel logo" class="img-responsive">
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
									<p class=""><?php echo substr(strip_tags($m_details->deal_desc), 0, 90); ?> </p>
								</div>
								<div class="col-xs-12">
									<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
								</div>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="row">
								<?php if ($m_details->category_id != '1') { ?>
								<div class="col-xs-10 col-xs-offset-1 amt_bg">
									<h3 class="view_price"><?php echo $currency.number_format($m_details->price); ?></h3>
								</div>
								<?php }
									else{ ?>
								<div class="col-xs-10 col-xs-offset-1">
									<h3 class="top_31"></h3>
								</div>
								<?php	}
									?>
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
						<li><i class="fa fa-camera"></i><a href="#"><?php echo $m_details->img_count; ?></a></li>
						<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
						<li><i class="fa fa-user"></i><a href="#"><?php echo $person_name; ?></a></li>
						<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($m_details->created_on)); ?></span></li>
						<li><span>Deal ID : <?php echo $m_details->ad_prefix.$m_details->ad_id; ?></span></li>
					</ul>
				</div>
			</div>
		</div>
		<hr class="separator">
	</div>
	<?php } ?>
	<!-- gold package end -->
	<?php 
		if (($m_details->package_type == 2 || $m_details->package_type == 5) && $m_details->urgent_package != 0) {
		 ?>
	<!-- gold+urgent package starts -->
	<div class="col-md-12">
		<div class="first_list gold_bgcolor">
			<div class="row">
				<div class="col-sm-4">
					<?php if ($m_details->urg != '') { ?>
						<div class="featured-badge">
						</div>
					 <?php } ?>
					<div class="img-hover view_img">
						<img src="<?php echo base_url(); ?>pictures/<?php echo $m_details->img_name; ?>" alt="<?php echo $m_details->img_name; ?>" title="<?php echo $m_details->img_name; ?>" class="img-responsive">
						<div class="overlay"><a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
					</div>
					<div class="">
						<div class="price11">
							<span></span><b>
							<img src="<?php echo base_url(); ?>img/icons/thumb.png" class="pull-right" alt="thumb" title="Right Deal"></b>
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
								<?php if ($total_rating == 0) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 1) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 2) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 3) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 4) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 5) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<div class="col-xs-8">
									<div class="location pull-right ">
										<img src="<?php echo base_url(); ?>img/icons/location_map.png" title="Location" alt="map" class="map_icon">
										<a href="javascript:void(0);" class="location loc_map" id="<?php echo $m_details->latt.','.$m_details->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $m_details->location_name; ?>"> <?php echo $city_name; ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php
							if ($m_details->ad_type == 'business') {
								if ($m_details->bus_logo != '') { ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $m_details->bus_logo; ?>" alt="<?php echo $m_details->bus_logo; ?>" title="busniess logo" class="img-responsive">
						</div>
						<?php }
							else{ ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt="intel" title="intel logo" class="img-responsive">
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
									<p class=""><?php echo substr(strip_tags($m_details->deal_desc), 0, 90); ?></p>
								</div>
								<div class="col-xs-12">
									<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
								</div>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="row">
								<?php if ($m_details->category_id != '1') { ?>
								<div class="col-xs-10 col-xs-offset-1 amt_bg">
									<h3 class="view_price"><?php echo $currency.number_format($m_details->price); ?></h3>
								</div>
								<?php }
									else{ ?>
								<div class="col-xs-10 col-xs-offset-1">
									<h3 class="top_31"></h3>
								</div>
								<?php	}
									?>
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
						<li><i class="fa fa-camera"></i><a href="#"><?php echo $m_details->img_count; ?></a></li>
						<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
						<li><i class="fa fa-user"></i><a href="#"><?php echo $person_name; ?></a></li>
						<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($m_details->created_on)); ?></span></li>
						<li><span>Deal ID : <?php echo $m_details->ad_prefix.$m_details->ad_id; ?></span></li>
					</ul>
				</div>
			</div>
		</div>
		<hr class="separator">
	</div>
	<?php } ?>
	<!-- gold+urgent package end -->
	<!-- free package starts -->
	<?php 
		if (($m_details->package_type == 1 || $m_details->package_type == 4) && $m_details->urgent_package == 0) {
		 ?>
	<div class="col-md-12">
		<div class="first_list">
			<div class="row">
				<div class="col-sm-4">
					<div class="img-hover view_img">
						<img src="<?php echo base_url(); ?>pictures/<?php echo $m_details->img_name; ?>" alt="<?php echo $m_details->img_name; ?>" title="<?php echo $m_details->deal_tag; ?>" class="img-responsive">
						<div class="overlay"><a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
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
								<?php if ($total_rating == 0) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 1) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 2) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 3) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 4) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 5) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<div class="col-xs-8">
									<div class="location pull-right ">
										<img src="<?php echo base_url(); ?>img/icons/location_map.png" title="Location" alt="map" class="map_icon">
										<a href="javascript:void(0);" class="location loc_map" id="<?php echo $m_details->latt.','.$m_details->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $m_details->location_name; ?>"> <?php echo $city_name; ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php
							if ($m_details->ad_type == 'business') {
								if ($m_details->bus_logo != '') { ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $m_details->bus_logo; ?>" alt="<?php echo $m_details->bus_logo; ?>" title="busniess logo" class="img-responsive">
						</div>
						<?php }
							else{ ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt="intel" title="intel logo" class="img-responsive">
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
									<p class=""><?php echo substr(strip_tags($m_details->deal_desc), 0, 90); ?> </p>
								</div>
								<div class="col-xs-12">
									<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
								</div>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="row">
								<?php if ($m_details->category_id != '1') { ?>
								<div class="col-xs-10 col-xs-offset-1 amt_bg">
									<h3 class="view_price"><?php echo $currency.number_format($m_details->price); ?></h3>
								</div>
								<?php }
									else{ ?>
								<div class="col-xs-10 col-xs-offset-1">
									<h3 class="top_31"></h3>
								</div>
								<?php	}
									?>
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
						<li><i class="fa fa-camera"></i><a href="#"><?php echo $m_details->img_count; ?></a></li>
						<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
						<li><i class="fa fa-user"></i><a href="#"><?php echo $person_name; ?></a></li>
						<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($m_details->created_on)); ?></span></li>
						<li><span>Deal ID : <?php echo $m_details->ad_prefix.$m_details->ad_id; ?></span></li>
					</ul>
				</div>
			</div>
		</div>
		<hr class="separator">
	</div>
	<?php } ?>
	<!-- free package ends -->
	<!-- free+urgent package starts -->
	<?php 
		if (($m_details->package_type == 1 || $m_details->package_type == 4) && $m_details->urgent_package != 0) {
		 ?>
	<div class="col-md-12">
		<div class="first_list">
			<div class="row">
				<div class="col-sm-4">
					<?php if ($m_details->urg != '') { ?>
						<div class="featured-badge">
						</div>
					 <?php } ?>
					<div class="img-hover view_img">
						<img src="<?php echo base_url(); ?>pictures/<?php echo $m_details->img_name; ?>" alt="<?php echo $m_details->img_name; ?>" title="<?php echo $m_details->deal_tag; ?>" class="img-responsive">
						<div class="overlay"><a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
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
								<?php if ($total_rating == 0) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 1) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 2) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 3) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 4) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<?php if ($total_rating == 5) { ?>
									<div class="col-xs-4">
										<ul class="starts">
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
										</ul>
									</div>
								<?php } ?>
								<div class="col-xs-8">
									<div class="location pull-right ">
										<img src="<?php echo base_url(); ?>img/icons/location_map.png" title="Location" alt="map" class="map_icon">
										<a href="javascript:void(0);" class="location loc_map" id="<?php echo $m_details->latt.','.$m_details->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $m_details->location_name; ?>"> <?php echo $city_name; ?></a>
									</div>
								</div>
							</div>
						</div>
						<?php
							if ($m_details->ad_type == 'business') {
								if ($m_details->bus_logo != '') { ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $m_details->bus_logo; ?>" alt="<?php echo $m_details->bus_logo; ?>" title="busniess logo" class="img-responsive">
						</div>
						<?php }
							else{ ?>
						<div class="col-xs-4 serch_bus_logo">
							<img src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt="intel" title="intel logo" class="img-responsive">
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
									<p class=""><?php echo substr(strip_tags($m_details->deal_desc), 0, 90); ?> </p>
								</div>
								<div class="col-xs-12">
									<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
								</div>
							</div>
						</div>
						<div class="col-xs-4">
							<div class="row">
								<?php if ($m_details->category_id != '1') { ?>
								<div class="col-xs-10 col-xs-offset-1 amt_bg">
									<h3 class="view_price"><?php echo $currency.number_format($m_details->price); ?>	</h3>
								</div>
								<?php }
									else{ ?>
								<div class="col-xs-10 col-xs-offset-1">
									<h3 class="top_31"></h3>
								</div>
								<?php	}
									?>
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
				<div class="post-meta list_view_bottom">
					<ul>
						<li><i class="fa fa-camera"></i><a href="#"><?php echo $m_details->img_count; ?></a></li>
						<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
						<li><i class="fa fa-user"></i><a href="#"><?php echo $person_name; ?></a></li>
						<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($m_details->created_on)); ?></span></li>
						<li><span>Deal ID : <?php echo $m_details->ad_prefix.$m_details->ad_id; ?></span></li>
					</ul>
				</div>
			</div>
		</div>
		<hr class="separator">
	</div>
	<?php 
		}
		} ?>
	
	<div class=''>
		<div class='col-md-12'>
			<?php echo $paging_links; ?>
		</div>
	</div>
	<!-- free+urgent package ends -->