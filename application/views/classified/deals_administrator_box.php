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
									<li><img src="img/icons/admin.png"><a href='deals_administrator'>Deals Administrator</a></li>
									<li><img src="img/icons/conversation.png"><a href='converse'>Converse</a></li>
									<li><img src="img/icons/pickup.png"><a href='pickup_deals'>Pickup deals</a></li>
									<li><img src="img/icons/seaked.png"><a href='seeked_searches'>Seeked Searches</a></li>
									<li><img src="img/icons/updateprofile.png"> <a href='update_profile'>Update Profile</a></li>
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

                                <div class="row">
                                    <!-- Item Gallery-->
                                    <div class="col-xs-12 col-sm-6 col-md-4 grid_view">
										<div class="featured-badge">
											<span>special</span>
										</div>
										<div class="img-hover">
                                            <img src="img/hotel-img/1.jpg" alt="" class="img-responsive">
                                            <div class="overlay"><a href="img/hotel-img/1.jpg" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
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
                                            <a href="#">
												<center><img src="img/icons/viewdetail.png" alt="" class="img-responsive"></center>
											</a>
                                            <div class="price"><b>From</b>125 £</div>
                                        </div>
                                    </div>
                                    <!-- End Item Gallery-->

                                    <!-- Item Gallery-->
                                    <div class="col-xs-12 col-sm-6 col-md-4 grid_view">
										<div class="featured-badge">
											<span>special</span>
										</div>
										<div class="img-hover">
                                            <img src="img/hotel-img/1.jpg" alt="" class="img-responsive">
                                            <div class="overlay"><a href="img/hotel-img/1.jpg" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
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
                                            <a href="#">
												<center><img src="img/icons/viewdetail.png" alt="" class="img-responsive"></center>
											</a>
                                            <div class="price"><b>From</b>125 £</div>
                                        </div>
                                    </div>
                                    <!-- End Item Gallery-->

                                    <!-- Item Gallery-->
                                    <div class="col-xs-12 col-sm-6 col-md-4 grid_view">
										<div class="featured-badge">
											<span>special</span>
										</div>
										<div class="img-hover">
                                            <img src="img/hotel-img/1.jpg" alt="" class="img-responsive">
                                            <div class="overlay"><a href="img/hotel-img/1.jpg" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
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
                                            <a href="#">
												<center><img src="img/icons/viewdetail.png" alt="" class="img-responsive"></center>
											</a>
                                            <div class="price"><b>From</b>125 £</div>
                                        </div>
                                    </div>
                                    <!-- End Item Gallery-->
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
	
	<script>
		jssor_1_slider_init();
	</script>
	<script src="j-folder/js/jquery.maskedinput.min.js"></script>
	<script src="j-folder/js/jquery.validate.min.js"></script>
	<script src="j-folder/js/additional-methods.min.js"></script>
	<script src="j-folder/js/jquery.form.min.js"></script>
	<script src="j-folder/js/j-forms.min.js"></script>
	<script src="j-folder/js/jquery-cloneya.min.js"></script>

        