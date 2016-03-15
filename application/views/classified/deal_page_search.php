						
						<?php foreach ($result as $rs) {
							/*location*/
							/* $latt = $rs->latt;
			                $longg = $rs->longg;
			                $url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$latt.",".$longg."&sensor=false";
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
			                $city_name = $json_response['results'][0]['address_components'][2]['short_name'];*/

							/*currency symbol*/ 
                                    	if ($rs->currency == 'pound') {
                                    		$currency = '£';
                                    	}
                                    	else if ($rs->currency == 'euro') {
                                    		$currency = '€';
                                    	}
                            $personname = $rs->first_name;
                            ?>
                        <!-- free+urgent package starts -->
										<?php 
										if (($rs->package_type == '1' || $rs->package_type == '4') && $rs->urgent_package != '0') {
										 ?>
										<div class="col-md-12">
											<div class="first_list gold_bgcolor">
												<div class="row">
													<div class="col-sm-4">
														<div class="featured-badge">
															
														</div>
														<div class="img-hover view_img">
															<img src="<?php echo base_url(); ?>pictures/<?php echo $rs->img_name; ?>" alt="img_1" title="img_1" class="img-responsive">
															<div class="overlay"><a href="description_view/details/<?php echo $rs->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
														</div>
													</div>
													<div class="col-sm-8 middle_text">
														<div class="row">
															<div class="col-sm-8">
																<div class="row">
																	<div class="col-xs-12">
																		<h3 class="list_title"><?php echo $rs->deal_tag; ?></h3>
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
																			<a href="javascript:void(0);" class="location loc_map" id="<?php echo $rs->latt.','.$rs->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $rs->loc_name; ?>"> Location</a>
																		</div>
																	</div>
																</div>
															</div>
															
															<?php if ($rs->ad_type != 'consumer') {
																if ($rs->bus_logo != '') { ?>
																	<div class="col-xs-4 serch_bus_logo">
																<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $rs->bus_logo; ?>" alt="<?php echo $rs->bus_logo; ?>" title="business logo" class="img-responsive">
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
																		<p class=""><?php echo substr(strip_tags($rs->deal_desc),1, 46); ?></p>
																	</div>
																	<div class="col-xs-12">
																		<a href="description_view/details/<?php echo $rs->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																	</div>
																</div>
															</div>
															<div class="col-xs-4">
																<div class="row">
																	<?php if ($rs->category_id != '1') { ?>
																	<div class="col-xs-10 col-xs-offset-1 amt_bg">
																		<h3 class="view_price"><?php echo $currency.number_format($rs->price); ?></h3>
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
															<li><i class="fa fa-camera"></i><a href="#"><?php echo $rs->img_count; ?></a></li>
															<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
															<li><i class="fa fa-user"></i><a href="#"><?php echo $personname; ?></a></li>
															<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($rs->created_on)); ?></span></li>
															<li><span>Deal ID : <?php echo $rs->ad_prefix.$rs->ad_id; ?></span></li>
														</ul>                      
													</div>
												</div>
											</div><hr class="separator">	
										</div>
										<!-- free+urgent package end -->
										<?php } ?>
										<!-- free package starts -->
										<?php 
										if (($rs->package_type == '1' || $rs->package_type == '4') && $rs->urgent_package == '0') {
										 ?>
										<div class="col-md-12">
											<div class="first_list gold_bgcolor">
												<div class="row">
													<div class="col-sm-4">
														<div class="img-hover view_img">
															<img src="<?php echo base_url(); ?>pictures/<?php echo $rs->img_name; ?>" alt="img_1" title="img_1" class="img-responsive">
															<div class="overlay"><a href="description_view/details/<?php echo $rs->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
														</div>
													</div>
													<div class="col-sm-8 middle_text">
														<div class="row">
															<div class="col-sm-8">
																<div class="row">
																	<div class="col-xs-12">
																		<h3 class="list_title"><?php echo $rs->deal_tag; ?></h3>
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
																			<a href="javascript:void(0);" class="location loc_map" id="<?php echo $rs->latt.','.$rs->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $rs->loc_name; ?>"> Location</a>
																		</div>
																	</div>
																</div>
															</div>
															
															<?php if ($rs->ad_type != 'consumer') {
																if ($rs->bus_logo != '') { ?>
																	<div class="col-xs-4 serch_bus_logo">
																<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $rs->bus_logo; ?>" alt="<?php echo $rs->bus_logo; ?>" title="business logo" class="img-responsive">
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
																		<p class=""><?php echo substr(strip_tags($rs->deal_desc),1, 46); ?></p>
																	</div>
																	<div class="col-xs-12">
																		<a href="description_view/details/<?php echo $rs->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																	</div>
																</div>
															</div>
															<div class="col-xs-4">
																<div class="row">
																	<?php if ($rs->category_id != '1') { ?>
																	<div class="col-xs-10 col-xs-offset-1 amt_bg">
																		<h3 class="view_price"><?php echo $currency.number_format($rs->price); ?></h3>
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
															<li><i class="fa fa-camera"></i><a href="#"><?php echo $rs->img_count; ?></a></li>
															<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
															<li><i class="fa fa-user"></i><a href="#"><?php echo $personname; ?></a></li>
															<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($rs->created_on)); ?></span></li>
															<li><span>Deal ID : <?php echo $rs->ad_prefix.$rs->ad_id; ?></span></li>
														</ul>                      
													</div>
												</div>
											</div><hr class="separator">	
										</div>
										<!-- free package end -->
										<?php } ?>
										<!-- gold package starts -->
										<?php 
										if (($rs->package_type == '2' || $rs->package_type == '5') && $rs->urgent_package == '0') {
										 ?>
										<div class="col-md-12">
											<div class="first_list gold_bgcolor">
												<div class="row">
													<div class="col-sm-4">
														<div class="img-hover view_img">
															<img src="<?php echo base_url(); ?>pictures/<?php echo $rs->img_name; ?>" alt="img_1" title="img_1" class="img-responsive">
															<div class="overlay"><a href="description_view/details/<?php echo $rs->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
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
																		<h3 class="list_title"><?php echo $rs->deal_tag; ?></h3>
																	</div>
																	<!--div class="col-xs-4 ">
																		<div class="add-to-compare-list pull-right">
																			<span class="gold_icon"></span>
																		</div>
																	</div-->
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
																			<a href="javascript:void(0);" class="location loc_map" id="<?php echo $rs->latt.','.$rs->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $rs->loc_name; ?>"> Location</a>
																		</div>
																	</div>
																</div>
															</div>
															
															<?php if ($rs->ad_type != 'consumer') {
																if ($rs->bus_logo != '') { ?>
																	<div class="col-xs-4 serch_bus_logo">
																<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $rs->bus_logo; ?>" alt="<?php echo $rs->bus_logo; ?>" title="business logo" class="img-responsive">
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
																		<p class=""><?php echo substr(strip_tags($rs->deal_desc),1, 46); ?></p>
																	</div>
																	<div class="col-xs-12">
																		<a href="description_view/details/<?php echo $rs->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																	</div>
																</div>
															</div>
															<div class="col-xs-4">
																<div class="row">
																	<?php if ($rs->category_id != '1') { ?>
																	<div class="col-xs-10 col-xs-offset-1 amt_bg">
																		<h3 class="view_price"><?php echo $currency.number_format($rs->price); ?></h3>
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
															<li><i class="fa fa-camera"></i><a href="#"><?php echo $rs->img_count; ?></a></li>
															<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
															<li><i class="fa fa-user"></i><a href="#"><?php echo $personname; ?></a></li>
															<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($rs->created_on)); ?></span></li>
															<li><span>Deal ID : <?php echo $rs->ad_prefix.$rs->ad_id; ?></span></li>
														</ul>                      
													</div>
												</div>
											</div><hr class="separator">	
										</div>
										<!-- gold package end -->
										<?php
											} ?>
                            <?php
							if (($rs->package_type == '3' || $rs->package_type == '6') && $rs->urgent_package != '0') {
						 ?>
						 <!-- platinum+urgent package start -->
										<div class="col-md-12">
											<div class="first_list">
												<div class="row">
													<div class="col-sm-4">
														<div class="featured-badge">
															
														</div>
														<div class="xuSlider">
															<ul class="sliders">
																<?php 
															$pic = mysql_query("select * from ad_img WHERE ad_id = '$rs->ad_id'");
															while ($res = mysql_fetch_object($pic)) { ?>
															<li><img src="<?php echo base_url(); ?>pictures/<?php echo $res->img_name; ?>" class="img-responsive" alt="Slider1" title="<?php echo $res->img_name; ?>"></li>
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
																		<h3 class="list_title"><?php echo $rs->deal_tag; ?></h3>
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
																			<a href="javascript:void(0);" class="location loc_map" id="<?php echo $rs->latt.','.$rs->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $rs->loc_name; ?>"> Location</a>
																		</div>
																	</div>
																</div>
															</div>
															<?php if ($rs->ad_type != 'consumer') {
																if ($rs->bus_logo != '') { ?>
																	<div class="col-xs-4 serch_bus_logo">
																<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $rs->bus_logo; ?>" alt="<?php echo $rs->bus_logo; ?>" title="business logo" class="img-responsive">
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
																		<p class=""><?php echo substr(strip_tags($rs->deal_desc),1, 46); ?></p>
																	</div>
																	<div class="col-xs-12">
																		<a href="description_view/details/<?php echo $rs->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																	</div>
																</div>
															</div>
															<div class="col-xs-4">
																<div class="row">
																	<?php if ($rs->category_id != '1') { ?>
																	<div class="col-xs-10 col-xs-offset-1 amt_bg">
																		<h3 class="view_price"><?php echo $currency.number_format($rs->price); ?></h3>
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
															<li><i class="fa fa-camera"></i><a href="#"><?php echo $rs->img_count; ?></a></li>
															<li><i class="fa fa-video-camera"></i><a href="#">1</a></li>
															<li><i class="fa fa-user"></i><a href="#"><?php echo $personname; ?></a></li>
															<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($rs->created_on)); ?></span></li>
															<li><span>Deal ID : <?php echo $rs->ad_prefix.$rs->ad_id; ?></span></li>
														</ul>                      
													</div>
												</div>
											</div><hr class="separator">	
											<!-- End Item Gallery List View-->
										</div>
										<?php } ?>
										<!-- platinum+urgent package end -->

										<!-- platinum  starts -->
										<?php if (($rs->package_type == '3' || $rs->package_type == '6') && $rs->urgent_package == '0') { ?>
										<div class="col-md-12">
											<div class="first_list">
												<div class="row">
													<div class="col-sm-4">
														<div class="xuSlider">
															<ul class="sliders">
																<?php 
															$pic = mysql_query("select * from ad_img WHERE ad_id = '$rs->ad_id'");
															while ($res = mysql_fetch_object($pic)) { ?>
															<li><img src="<?php echo base_url(); ?>pictures/<?php echo $res->img_name; ?>" class="img-responsive" alt="Slider1" title="<?php echo $res->img_name; ?>"></li>
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
																		<h3 class="list_title"><?php echo $rs->deal_tag; ?></h3>
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
																			<a href="javascript:void(0);" class="location loc_map" id="<?php echo $rs->latt.','.$rs->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $rs->loc_name; ?>"> Location</a>
																		</div>
																	</div>
																</div>
															</div>
															<?php if ($rs->ad_type != 'consumer') {
																if ($rs->bus_logo != '') { ?>
																	<div class="col-xs-4 serch_bus_logo">
																<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $rs->bus_logo; ?>" alt="<?php echo $rs->bus_logo; ?>" title="business logo" class="img-responsive">
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
																		<p class=""><?php echo substr(strip_tags($rs->deal_desc),1, 46); ?></p>
																	</div>
																	<div class="col-xs-12">
																		<a href="description_view/details/<?php echo $rs->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																	</div>
																</div>
															</div>
															<div class="col-xs-4">
																<div class="row">
																	<?php if ($rs->category_id != '1') { ?>
																	<div class="col-xs-10 col-xs-offset-1 amt_bg">
																		<h3 class="view_price"><?php echo $currency.number_format($rs->price); ?></h3>
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
															<li><i class="fa fa-camera"></i><a href="#"><?php echo $rs->img_count; ?></a></li>
															<li><i class="fa fa-video-camera"></i><a href="#">1</a></li>
															<li><i class="fa fa-user"></i><a href="#"><?php echo $personname; ?></a></li>
															<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($rs->created_on)); ?></span></li>
															<li><span>Deal ID : <?php echo $rs->ad_prefix.$rs->ad_id; ?></span></li>
														</ul>                      
													</div>
												</div>
											</div><hr class="separator">	
											<!-- End Item Gallery List View-->
										</div>
										<?php } ?>
										<!-- pltinum ends -->
										
										<!-- gold+urgent package starts -->
										<?php 
										if (($rs->package_type == '2' || $rs->package_type == '5') && $rs->urgent_package != '0') {
										 ?>
										<div class="col-md-12">
											<div class="first_list gold_bgcolor">
												<div class="row">
													<div class="col-sm-4">
														<div class="featured-badge">
															
														</div>
														<div class="img-hover view_img">
															<img src="<?php echo base_url(); ?>pictures/<?php echo $rs->img_name; ?>" alt="img_1" title="img_1" class="img-responsive">
															<div class="overlay"><a href="description_view/details/<?php echo $rs->ad_id; ?>"><i class="top_20 fa fa-link"></i></a></div>
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
																		<h3 class="list_title"><?php echo $rs->deal_tag; ?></h3>
																	</div>
																	<!--div class="col-xs-4 ">
																		<div class="add-to-compare-list pull-right">
																			<span class="gold_icon"></span>
																		</div>
																	</div-->
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
																			<a href="javascript:void(0);" class="location loc_map" id="<?php echo $rs->latt.','.$rs->longg; ?>" data-toggle="modal" data-target="#map_location" title="<?php echo $rs->loc_name; ?>"> Location</a>
																		</div>
																	</div>
																</div>
															</div>
															
															<?php if ($rs->ad_type != 'consumer') {
																if ($rs->bus_logo != '') { ?>
																	<div class="col-xs-4 serch_bus_logo">
																<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $rs->bus_logo; ?>" alt="<?php echo $rs->bus_logo; ?>" title="business logo" class="img-responsive">
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
																		<p class=""><?php echo substr(strip_tags($rs->deal_desc),1, 46); ?></p>
																	</div>
																	<div class="col-xs-12">
																		<a href="description_view/details/<?php echo $rs->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																	</div>
																</div>
															</div>
															<div class="col-xs-4">
																<div class="row">
																	<?php if ($rs->category_id != '1') { ?>
																	<div class="col-xs-10 col-xs-offset-1 amt_bg">
																		<h3 class="view_price"><?php echo $currency.number_format($rs->price); ?></h3>
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
															<li><i class="fa fa-camera"></i><a href="#"><?php echo $rs->img_count; ?></a></li>
															<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
															<li><i class="fa fa-user"></i><a href="#"><?php echo $personname; ?></a></li>
															<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($rs->created_on)); ?></span></li>
															<li><span>Deal ID : <?php echo $rs->ad_prefix.$rs->ad_id; ?></span></li>
														</ul>                      
													</div>
												</div>
											</div><hr class="separator">	
										</div>
										<!-- gold+urgent package end -->
										<?php
											}
										 } ?>
										 <div class=''>
											<div class='col-md-12'>
												<?php echo $paging_links; ?>
											</div>
										</div>

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

	<link rel="stylesheet" href="<?php echo base_url(); ?>libs/slider.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jssor.slider.min.js"></script>
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
	