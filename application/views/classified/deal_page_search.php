						<!-- platinum+urgent package start -->
						<?php foreach ($result as $rs) {
							/*currency symbol*/ 
                                    	if ($rs->currency == 'pound') {
                                    		$currency = '£';
                                    	}
                                    	else if ($rs->currency == 'euro') {
                                    		$currency = '€';
                                    	}
                            $personname = mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM login WHERE login_id =(SELECT login_id FROM postad WHERE ad_id = '$rs->ad_id'))"), 0, 'first_name');
							if ($rs->package_type == 'platinum' && $rs->urgent_package != '') {
						 ?>
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
															$pic = mysql_query("select * from ad_img WHERE ad_id = '$rs->ad_id'");
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
																			<i class="fa fa-map-marker "></i> 
																			<a href="" class="location"> Location</a> ,<a href="" class="location">Place</a>
																		</div>
																	</div>
																</div>
															</div>
															<?php if ($rs->ad_type != 'consumer') {
																if ($rs->bus_logo != '') { ?>
																	<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos<?php echo $rs->bus_logo; ?>" alt="<?php echo $rs->bus_logo; ?>" title="business logo" class="img-responsive">
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
																		<p class=""><?php echo substr(strip_tags($rs->deal_desc), 20); ?></p>
																	</div>
																	<div class="col-xs-12">
																		<a href="description_view" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																	</div>
																</div>
															</div>
															<div class="col-xs-4">
																<div class="row">
																	<div class="col-xs-10 col-xs-offset-1 amt_bg">
																		<h3 class="view_price"><?php echo $currency.$rs->price; ?></h3>
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
															<li><i class="fa fa-camera"></i><a href="#"><?php echo $rs->img_count; ?></a></li>
															<li><i class="fa fa-video-camera"></i><a href="#">1</a></li>
															<li><i class="fa fa-user"></i><a href="#"><?php echo $personname; ?></a></li>
															<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($rs->created_on)); ?></span></li>
															<li><i class="fa fa-eye"></i><span>0 Views</span></li>
															<li><span>Deal ID : <?php echo $rs->ad_prefix.$rs->ad_id; ?></span></li>
														</ul>                      
													</div>
												</div>
											</div><hr class="separator">	
											<!-- End Item Gallery List View-->
										</div>
										<?php } ?>
										<!-- platinum+urgent package end -->
										
										<!-- gold+urgent package starts -->
										<?php 
										if ($rs->package_type == 'gold' && $rs->urgent_package != '') {
										 ?>
										<div class="col-md-12">
											<div class="first_list gold_bgcolor">
												<div class="row">
													<div class="col-sm-4">
														<div class="featured-badge">
															<span>Urgent</span>
														</div>
														<div class="img-hover view_img">
															<img src="img/blog/005.jpg" alt="img_1" title="img_1" class="img-responsive">
															<div class="overlay"><a href="description_view"><i class="top_20 fa fa-link"></i></a></div>
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
																			<i class="fa fa-map-marker "></i> 
																			<a href="" class="location"> Location</a> ,<a href="" class="location">Place</a>
																		</div>
																	</div>
																</div>
															</div>
															
															<?php if ($rs->ad_type != 'consumer') {
																if ($rs->bus_logo != '') { ?>
																	<div class="col-xs-4 serch_bus_logo">
																<img src="ad_images/business_logos<?php echo $rs->bus_logo; ?>" alt="<?php echo $rs->bus_logo; ?>" title="business logo" class="img-responsive">
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
																		<p class=""><?php echo substr(strip_tags($rs->deal_desc), 20); ?></p>
																	</div>
																	<div class="col-xs-12">
																		<a href="description_view" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																	</div>
																</div>
															</div>
															<div class="col-xs-4">
																<div class="row">
																	<div class="col-xs-10 col-xs-offset-1 amt_bg">
																		<h3 class="view_price"><?php echo $currency.$rs->price; ?></h3>
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
													<div class="post-meta list_view_bottom gold_bgcolor">
														<ul>
															<li><i class="fa fa-camera"></i><a href="#"><?php echo $rs->img_count; ?></a></li>
															<li><i class="fa fa-video-camera"></i><a href="#">0</a></li>
															<li><i class="fa fa-user"></i><a href="#"><?php echo $personname; ?></a></li>
															<li><i class="fa fa-clock-o"></i><span><?php echo date("M d, Y H:i:s", strtotime($rs->created_on)); ?></span></li>
															<li><i class="fa fa-eye"></i><span>0 Views</span></li>
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