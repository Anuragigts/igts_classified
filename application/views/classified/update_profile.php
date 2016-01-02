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
									<!--<span>$ 99 / per month</span>
									<ul class="dashboard_tag">
										<li><img src="img/icons/i.png"><a href='deals_administrator'>Deals Administrator</a></li>
										<li><img src="img/icons/i.png"><a href='converse'>Converse</a></li>
										<li><img src="img/icons/favourite.png"><a href='pickup_deals'>Pickup deals</a></li>
										<li><img src="img/icons/searches.png"><a href='seeked_searches'>Seeked Searches</a></li>
										<li><img src="img/icons/profile.png"><a href='update_profile'>Update Profile</a></li>
									</ul>
									-->
								</div>
								<ul class="dashboard_tag">
									<li><i class="fa fa-home"></i> <a href='deals_administrator'>Deals Administrator</a></li>
									<li><i class="fa fa-home"></i> <a href='converse'>Converse</a></li>
									<li><i class="fa fa-star"></i> <a href='pickup_deals'>Pickup deals</a></li>
									<li><i class="fa fa-home"></i> <a href='seeked_searches'>Seeked Searches</a></li>
									<li><i class="fa fa-home"></i> <a href='update_profile'>Update Profile</a></li>
								</ul>
								<a class="btn" style="background: #E1483F none repeat scroll 0% 0% !important;" href="<?php echo base_url(); ?>login/logout">Logout</a>
							</div>
						</div>
						<!-- End Item Table-->
						
						<!-- Item Table-->
						<form id="j-forms" action="#" class="j-forms" method="post">
							<div class="col-sm-8">
								<div class="row">
									<div class="col-sm-12">
										<h2>Update Profile</h2><hr>
									</div>
								</div>
									
								<div class="row">
									<!-- contact details-->
									<div class="col-sm-6">
										<div class="row">
											<div class="col-sm-12 unit">
												<h3>Update Profile</h3>
												<label class="label">First Name <sup style='color:red;'>?</sup></label>
												<div class="input">
													<label class="icon-right" for="firstnamepost">
														<i class="fa fa-user"></i>
													</label>
													<input type="text" id="firstnamepost" name="firstnamepost" placeholder="Enter First Name">
												</div>
											</div>
											<div class="col-sm-12 unit">
												<label class="label">Last Name <sup style='color:red;'>?</sup></label>
												<div class="input">
													<label class="icon-right" for="lastnamepost">
														<i class="fa fa-user"></i>
													</label>
													<input type="text" id="lastnamepost" name="lastnamepost" placeholder="Enter Last Name">
												</div>
											</div>
											<div class="col-sm-12 unit">
												<label class="label">Contact Number <sup style='color:red;'>?</sup></label>
												<div class="input">
													<label class="icon-right" for="phone">
														<i class="fa fa-phone"></i>
													</label>
													<input type="text" id="contactnopost" name="contactnopost" placeholder="Enter Contact Number">
												</div>
											</div>
											<div class="col-sm-12 unit">													
												<button class="btn btn-primary ">Save Changes</button>
											</div>								
										</div>								
									</div>
									<!-- Change password-->
									<div class="col-sm-6">
										<div class="row">
											<div class="col-sm-12 unit">
												<h3>Change password</h3>
												<label class="label">Current Password <sup style='color:red;'>?</sup></label>
												<div class="input">
													<label class="icon-right" for="currentpasspost">
														<i class="fa fa-lock"></i>
													</label>
													<input type="password" id="currentpasspost" name="currentpasspost" placeholder="Enter Current Password">
												</div>
											</div>
											<div class="col-sm-12 unit">
												<label class="label">New password <sup style='color:red;'>?</sup></label>
												<div class="input">
													<label class="icon-right" for="newpasspost">
														<i class="fa fa-lock"></i>
													</label>
													<input type="password" id="newpasspost" name="newpasspost" placeholder="Enter New password">
												</div>
											</div>
											<div class="col-sm-12 unit">
												<label class="label">Confirm password <sup style='color:red;'>?</sup></label>
												<div class="input">
													<label class="icon-right" for="confirmpasspost">
														<i class="fa fa-lock"></i>
													</label>
													<input type="password" id="confirmpasspost" name="confirmpasspost" placeholder="Enter Confirm password">
												</div>
											</div>
											<div class="col-sm-12 unit">													
												<button class="btn btn-primary ">Change Password</button>
											</div>								
										</div>								
									</div>
								</div><hr class="separator">	
								
								<div class="row">
									<div class="col-sm-12 unit">
										<h3>Manage contact email</h3>
										<label>Login with: samplemail@yahoo.com</label>
									</div>
								</div><hr class="separator">
								
								<div class="row">
									<div class="col-sm-12 unit">
										<h3>Marketing preferences</h3>
										<label class="checkbox-toggle">
											<input type="checkbox">
											<i></i>
											I would like to receive news, offers and promotions from Classified
										</label>
									</div>
								</div><hr class="separator">
								
								<div class="row">
									<div class="col-sm-12 unit">
										<h3>Deactivate account</h3>
										<div class="unit check">
											<p>Please don't leave us!</p>
											<p>Every time an account is deactivated, one of the team cries and it takes hours to get them talking again :(</p>
											<p>If you 're really sure...</p>
											<p>Please help us improve Classified by letting us know why you're leaving:</p>
											<label class="radio">
												<input type="radio" name="you_make_it" value="Yeah" checked="">
												<i></i>I don't have any more stuff to put on Classified
											</label>
											<label class="radio">
												<input type="radio" name="you_make_it" value="Maybe">
												<i></i>I didn't get enough response to my Deals on Classified
											</label>
											<label class="radio">
												<input type="radio" name="you_make_it" value="I can't">
												<i></i>I got too many spam emails from my Deals
											</label>
											<label class="radio">
												<input type="radio" name="you_make_it" value="I can't">
												<i></i>I'd rather not say
											</label>
											<label class="radio">
												<input type="radio" name="you_make_it" value="I can't">
												<i></i>Other
											</label>
										</div>
										<button class="btn btn-primary ">Deactivate Account</button>
									</div>
								</div><hr class="separator">
								
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

        