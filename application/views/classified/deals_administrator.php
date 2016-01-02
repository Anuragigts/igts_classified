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
								<a class="btn color-red" href="#">Logout</a>
							</div>
						</div>
						<!-- End Item Table-->

						<form id="j-forms" action="#" class="j-forms" method="post">
							<!-- Item Table-->
							<div class="col-sm-8">
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
									
								<div class="">	
									<div class="row">
										<div class="col-sm-9 col-xs-12">
											<h4>Puppies in Pets for Sale</h4>
											<p>Place</p>
											<p>Amount</p>
										</div>
										<div class="col-sm-3 col-xs-6">
											<div class="row">
												<div class="col-sm-12 favourites_img">
													<img src="img/dashboard/pets.jpg" class="img-responsive">
												</div>	
											</div>	
										</div>
									</div>
									<div class="row">
										<div class="col-sm-1">	
											Deleted
										</div>
										<div class="col-sm-4">	
											Last posted : 3 days ago
										</div>
										<div class="col-sm-4">	
											Ad ID: 1148051000
										</div>
										<div class="col-sm-2">	
											Views
										</div>
									</div>								
								</div><hr>
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

        