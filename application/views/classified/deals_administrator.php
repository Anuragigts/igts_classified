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
	
	<link rel="stylesheet" href="j-folder/css/demo.css">
	<link rel="stylesheet" href="j-folder/css/font-awesome.min.css">
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
										<label>Hi User Name, you have 0 Pickup deals</label><hr>
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
                                    <!-- Item Gallery List View-->
                                    <div class="col-md-12">
										<div class="first_list">
											<div class="row">
												<div class="col-sm-4 view_img">
													<div class="featured-badge">
														<span>Urgent</span>
													</div>
													<div class="img-hover">
														<img src="img/hotel-img/1.jpg" alt="img_1" title="img_1" class="img-responsive">
														<div class="overlay"><a href="description_view"><i class="top_20 fa fa-link"></i></a></div>
													</div>
												</div>
												<div class="col-sm-8 middle_text">
													<div class="row">
														<div class="col-sm-8">
															<div class="row">
																<div class="col-xs-12">
																	<h3 class="list_title">Sample text Here</h3>
																</div>
																<!--div class="col-xs-4 ">
																	<div class="add-to-compare-list pull-right">
																		<span class="compared-category"></span>
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
														
														<div class="col-xs-4 serch_bus_logo">
															<img src="img/brand/intel.png" alt="intel" title="intel logo" class="img-responsive">
														</div>
													</div>
													<hr class="separator">
													<div class="row">
														<div class="col-xs-8">
															<div class="row">
																<div class="col-xs-12">
																	<p class="">The Holiday Inn Bilbao is in a prime location next to the Basilica of  and the </p>
																</div>
																<div class="col-xs-12">
																	<a href="description_view" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																</div>
															</div>
														</div>
														<div class="col-xs-4">
															<div class="row">
																<div class="col-xs-8 col-xs-offset-1 amt_bg">
																	<h3 style="color:white;margin-top:5px;">£1106</h3>
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
														<li><i class="fa fa-user"></i><a href="#">Person Name</a></li>
														<li><i class="fa fa-clock-o"></i><span>April 23, 2015</span></li>
														<li><i class="fa fa-eye"></i><span>234 Views</span></li>
														<li><span>Deal ID : 112457856</span></li>
														<li><i class="fa fa-comments"></i><a href="#" title="Comment on Post Format: Standard">Leave a comment</a></li>
														<li><i class="fa fa-star"></i><span><a href="#">Saved</a></span></li>
														<li><i class="fa fa-edit"></i></li>
														<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
													</ul>                      
												</div>
											</div>
										</div><hr class="separator">	
										<!-- End Item Gallery List View-->
									</div>
									
									<div class="col-md-12">
										<div class="first_list">
											<div class="row">
												<div class="col-sm-4 view_img">
													<div class="featured-badge">
														<span>Urgent</span>
													</div>
													<div class="img-hover">
														<img src="img/hotel-img/2.jpg" alt="img_1" title="img_1" class="img-responsive">
														<div class="overlay"><a href="description_view"><i class="top_20 fa fa-link"></i></a></div>
													</div>
												</div>
												<div class="col-sm-8 middle_text">
													<div class="row">
														<div class="col-sm-8">
															<div class="row">
																<div class="col-xs-12">
																	<h3 class="list_title">Sample text Here</h3>
																</div>
																<!--div class="col-xs-4 ">
																	<div class="add-to-compare-list pull-right">
																		<span class="compared-category"></span>
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
														
														<div class="col-xs-4 serch_bus_logo">
															<img src="img/brand/intel.png" alt="intel" title="intel logo" class="img-responsive">
														</div>
													</div>
													<hr class="separator">
													<div class="row">
														<div class="col-xs-8">
															<div class="row">
																<div class="col-xs-12">
																	<p class="">The Holiday Inn Bilbao is in a prime location next to the Basilica of  and the </p>
																</div>
																<div class="col-xs-12">
																	<a href="description_view" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
																</div>
															</div>
														</div>
														<div class="col-xs-4">
															<div class="row">
																<div class="col-xs-8 col-xs-offset-1 amt_bg">
																	<h3 style="color:white;margin-top:5px;">£1106</h3>
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
														<li><i class="fa fa-user"></i><a href="#">Person Name</a></li>
														<li><i class="fa fa-clock-o"></i><span>April 23, 2015</span></li>
														<li><i class="fa fa-eye"></i><span>234 Views</span></li>
														<li><span>Deal ID : 112457856</span></li>
														<li><i class="fa fa-comments"></i><a href="#" title="Comment on Post Format: Standard">Leave a comment</a></li>
														<li><i class="fa fa-star"></i><span><a href="#">Saved</a></span></li>
														<li><i class="fa fa-edit"></i></li>
														<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
													</ul>                      
												</div>
											</div>
										</div><hr class="separator">	
										<!-- End Item Gallery List View-->
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
	     