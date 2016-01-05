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
	<script>
		$(document).ready(function(){
			$(".remove1").click(function(){
				$("#div1").remove();
			});
		});
	</script>
	
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
			<img src="img/img-theme/shp.png" class="img-responsive" alt="">
		</div>
		
		<div class="content_info">
			<div class="paddings">
				<div class="container">
					<div class="row">
						<!-- Item Table-->
						<div class="col-sm-4">
							<div class="item-table">
								<div class="header-table color-red">
									 <img src="img/icons/people.png">
									<h2>User Name</h2>
									<!--<span>$ 99 / per month</span> -->
								</div>
								<ul class="dashboard_tag">
									<li><i class="fa fa-home"></i> <a href='deals_administrator'>Deals Administrator</a></li>
									<li><i class="fa fa-home"></i> <a href='converse'>Converse</a></li>
									<li><i class="fa fa-star"></i> <a href='pickup_deals'>Pickup deals</a></li>
									<li><i class="fa fa-home"></i> <a href='seeked_searches'>Seeked Searches</a></li>
									<li><i class="fa fa-home"></i> <a href='update_profile'>Update Profile</a></li>
								</ul>
								<a class="btn color-red" href="<?php echo base_url(); ?>login/logout">Logout</a>
							</div>
						</div>
						<!-- End Item Table-->

						<form id="j-forms" action="#" class="j-forms" method="post">
							<!-- Item Table-->
							<div class="col-md-8">
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
                                                <li>
                                                    <div class="selector">
                                                        <select>
                                                            <option value="1">A To Z</option>
                                                            <option value="2">Z To A</option>
                                                        </select>
                                                        <span class="custom-select">Name</span>
                                                    </div>
                                                </li>  

                                                <li>
                                                    <div class="selector">
                                                        <select>
                                                            <option value="1">Sort Ascending</option>
                                                            <option value="2">Sort Descending</option>
                                                        </select>
                                                        <span class="custom-select">Price</span>
                                                    </div>
                                                </li>                            
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <ul class="style-view">
                                                <li data-toggle="tooltip" title="" data-original-title="BOX VIEW">
                                                    <a href="hotel-grid-view.html">
                                                        <i class="fa fa-th-large"></i>
                                                    </a>
                                                </li>
                                                <li data-toggle="tooltip" title="" data-original-title="LIST VIEW" class="active">
                                                    <a href="hotel-list-view.html">
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
												<div class="col-sm-4">
													<div class="featured-badge">
														<span>special</span>
													</div>
													<img src="img/hotel-img/2.jpg" alt="" class="img-responsive">
												</div>
												<div class="col-sm-5 middle_text">
													<div class="row">
														<div class="col-xs-10">
															<h4 class="list_title">Sample text Here</h4>
														</div>
														<div class="col-xs-2">
															<!--div class="add-to-compare-list">
																<span class="compared-category"></span>
															</div-->
															<h4 class="list_title"><i class="fa fa-star"></i></h4>
														</div>
													</div>
													<div class="ratings pull-left">
														<input id="5q" type="radio" name="quality-rating" value="5">
														<label for="5q">
															<i class="fa fa-star"></i>
														</label>
														<input id="4q" type="radio" name="quality-rating" value="4">
														<label for="4q">
															<i class="fa fa-star"></i>
														</label>
														<input id="3q" type="radio" name="quality-rating" value="3">
														<label for="3q">
															<i class="fa fa-star"></i>
														</label>
														<input id="2q" type="radio" name="quality-rating" value="2">
														<label for="2q">
															<i class="fa fa-star"></i>
														</label>
														<input id="1q" type="radio" name="quality-rating" value="1" checked="">
														<label for="1q">
															<i class="fa fa-star"></i>
														</label>
													</div>
													<div class="row">
														<div class="col-xs-12">
															<p class=""><i class="fa fa-map-marker"></i> Location</p>
														</div>
														<div class="col-xs-12">
															<p class="">The Holiday Inn Bilbao is in a prime location next to the Basilica of  and the </p>
															<p class=""><a href="#">Full Details</a></p>
														</div>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="row">
														<div class="col-xs-12 serch_bus_logo">
															<img src="img/brand/intel.png" alt="" class="img-responsive">
														</div>
														<div class="col-xs-8 col-xs-offset-2 amt_bg ">
															<h4 class="search_price text_center">£218</h4>
														</div>
														<div class="col-xs-10 col-xs-offset-1">
															<a href="#"><img src="img/icons/viewdetail.png" alt="" class="img-responsive"></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
                                    <!-- End Item Gallery List View-->
									
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
	<script src="j-folder/js/jquery-cloneya.min.js"></script>

        