	<title>Right Deals ::  Seeked Searches</title>
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
	<script>
		$(document).ready(function(){
			$(".remove2").click(function(){
				$("#div2").remove();
			});
		});
	</script>
	<script>
		$(document).ready(function(){
			$(".remove3").click(function(){
				$("#div3").remove();
			});
		});
	</script>
	<script>
		$(document).ready(function(){
			$(".remove4").click(function(){
				$("#div4").remove();
			});
		});
	</script>
	
	<link rel="stylesheet" href="j-folder/css/j-forms.css">
	<!-- Section Title-->    
	<div class="section-title-01">
		<!-- Parallax Background -->
		<div class="bg_parallax image_01_parallax"></div>
	</div>
	
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
									<img src="<?php echo base_url(); ?>img/icons/user_pro.png" alt="user_pro" title="Profile" class="img-responsive pvt-no-img">
									<h2><?php echo @$log_name; ?></h2> 
								</div>
								<ul class="dashboard_tag">
									<li><img src="img/icons/admin.png" alt="admin" title="admin image"><a href='deals_administrator'>Deals Administrator</a></li>
									<li><img src="img/icons/pickup.png" alt="pickup" title="pickup image"><a href='pickup_deals'>Pickup deals</a></li>
									<li><img src="img/icons/seaked.png" alt="seaked" title="seaked image"><a href='reserved_searches'>Reserved Searches</a></li>
									<li><img src="img/icons/updateprofile.png" alt="updateprofile" title="updateprofile image"> <a href='update_profile'>Update Profile</a></li>
								</ul>
								<a class="btn color-red" href="<?php echo base_url(); ?>login/logout">Logout</a>
							</div>
						</div>
						<!-- End Item Table-->
						<form id="j-forms" action="#" class="j-forms" method="post">
							<!-- Item Table-->
							<div class="col-sm-9">
								<div class="row">
									<div class="col-sm-12">
										<h2>Reserved Searches</h2>
										<label>Hi User Name, you have 0 Reserved Deals</label>
										<hr>
										<!-- start cloned right side buttons element -->
										<div id="div1">
											<div class="row">
												<div class="col-sm-10">
													<h5>Puppies in Pets for Sale</h5>
													<p>Berkshire</p>
												</div>
												<div class="col-sm-2">
													<div class="dele_te remove1"><i class="fa fa-cut   pull-right"></i> Delete</div>
												</div>
											</div><hr class="separator">
										</div>
										<div id="div2">
											<div class="row">
												<div class="col-sm-10">
													<h5>Cloths</h5>
													<p>Hyderabad</p>
												</div>
												<div class="col-sm-2">
													<div class="dele_te remove2"><i class="fa fa-cut   pull-right"></i> Delete</div>
												</div>
											</div><hr class="separator">
										</div>
										<div id="div3">
											<div class="row">
												<div class="col-sm-10">
													<h5>Bikes</h5>
													<p>Bangalore</p>
												</div>
												<div class="col-sm-2">
													<div class="dele_te remove3"><i class="fa fa-cut   pull-right"></i> Delete</div>
												</div>
											</div><hr class="separator">
										</div>
										<div id="div4">
											<div class="row">
												<div class="col-sm-10">
													<h5>Cars</h5>
													<p>London</p>
												</div>
												<div class="col-sm-2">
													<div class="dele_te remove4"><i class="fa fa-cut   pull-right"></i> Delete</div>
												</div>
											</div><hr class="separator">
										</div>
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