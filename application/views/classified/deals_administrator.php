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
							<div class="col-sm-8 list-view">
								<div class="row">
									<div class="col-sm-12">
										<h2>Deals Administrator</h2>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<label>Hi User Name, you have 0 Deals Administrator</label>
									</div>
									<div class="col-sm-6">
										<label class="input select">
											<select name="Size">
												<option value="active">Active Deals</option>
												<option value="deactive">Deactive Deals</option>
											</select>
											<i></i>
										</label>
									</div>
								</div><hr>
									
								<div class="row">
									 <!-- Item Gallery List View-->
									<div class="col-md-12" style="height: 215px;">
										<div class="img-hover">
											<img src="img/hotel-img/1.jpg" alt="" class="img-responsive">
											<div class="overlay"><a href="img/hotel-img/1.jpg" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
										</div>

										<div class="info-gallery">
											<h3>The Large Everest Mount</h3>
											<hr class="separator clearfix">
											<p style="float: left;">Location </p>
											<div class="clearfix"></div>
											<div class=""><b>Rs :10000/-</b></div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="post-meta">
											<ul>
												<li>
													<i class="fa fa-user"></i>
													<a href="#">Person Name</a>
												</li>
												
												<li>
													<i class="fa fa-map-marker"></i>
													<a href="#">Location</a>
												</li>

												<li>
													<i class="fa fa-clock-o"></i>
													<span>April 23, 2015</span>
												</li>

												<li>
													<i class="fa fa-eye"></i>
													<span>234 Views</span>
												</li>
												
												<li>
													<span>Deal ID : 112457856</span>
												</li>

												<li>
													<i class="fa fa-comments"></i>
													<a href="#" title="Comment on Post Format: Standard">Leave a comment
													</a>
												</li>
											</ul>                      
										</div>
									</div>
										
									<!-- End Item Gallery List View-->	
								</div>
								<hr class="separator clearfix">
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

        