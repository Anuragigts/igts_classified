	
	<link rel="stylesheet" href="j-folder/css/demo.css">
	<link rel="stylesheet" href="j-folder/css/font-awesome.min.css">
	<link rel="stylesheet" href="j-folder/css/j-forms.css">
	
	<!-- Section Title-->    
	<div class="section-title-01">
		<!-- Parallax Background -->
		<div class="bg_parallax image_01_parallax"></div>
		<!-- Parallax Background -->

		<!-- Content Parallax-->
		<div class="opacy_bg_02">
			 <div class="container">
				<h1>Blog read</h1>
				<div class="crumbs">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li>/</li>
						<li>Screens</li>                                       
					</ul>    
				</div>
			</div>  
		</div>  
		<!-- End Content Parallax--> 
	</div>   
	<!-- End Section Title-->
	
	<!--Content Central -->
	<section class="content-central">
		<!-- Shadow Semiboxed -->
		<div class="semiboxshadow text-center">
			<img src="img/img-theme/shp.png" class="img-responsive" alt="">
		</div>
		
		<!-- content info - Blog-->
		<div class="content_info" style="background-color: rgb(244, 244, 244);">
			<div class="paddings-mini">
				<!-- content-->
				<div class="container">
					<div class="row">
						<div class="wrapper wrapper-640">

							<form action="http://lazy-coding.com/j-forms-advanced/forms/order_multistep_with_steps/j-folder/php/demo.php" method="post" class="j-forms j-multistep" id="j-forms" enctype="multipart/form-data" novalidate>

								<!--<div class="header">
									<p>Order service</p>
								</div>
								 end /.header-->

								<div class="content">
									<!-- start steps -->
									<div class="j-row">
										<div class="span2 step">
											<div class="steps">
												<span>Step 1:</span>
												<p>1st Screen</p>
											</div>
										</div>
										<div class="span2 step">
											<div class="steps">
												<span>Step 2:</span>
												<p>2nd Screen</p>
											</div>
										</div>
										<div class="span2 step">
											<div class="steps">
												<span>Step 3:</span>
												<p>Packages</p>
											</div>
										</div>
										<div class="span3 step">
											<div class="steps">
												<span>Step 4:</span>
												<p>Contact Details</p>
											</div>
										</div>
										<div class="span3 step">
											<div class="steps">
												<span>Step 5:</span>
												<p>Terms & Conditions</p>
											</div>
										</div>
									</div>
									<!-- end steps -->

									<fieldset>

										<div class="divider gap-bottom-25"></div>

										<!-- start name -->
										<div class="j-row">
											<div class="span12 unit">
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="bus_conumer" id="next-step-radio" value="Yes">
															<i></i>Business
														</label>
														<label class="radio">
															<input type="radio" name="bus_conumer"  value="No">
															<i></i>Consumer
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Business Logo</label>
												<div class="unit">
													<label class="input append-big-btn">
														<div class="file-button">
															Browse
															<input type="file" name="file" onchange="document.getElementById('file_input').value = this.value;">
														</div>
														<input type="text" id="file_input" readonly="" placeholder="no file selected">
														<span class="hint">Only: jpg / png / pdf / doc Size: less 1 Mb</span>
													</label>
												</div>
											</div>
											<div class="span6 unit">
											
											</div>
										</div>
										<!-- end Business Logo -->

										<!-- start Postal Code -->
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Postal Code</label>
												<div class="input">
													<label class="icon-right" for="email">
														<i class="fa fa-bookmark-o"></i>
													</label>
													<input type="text" id="postalcode" name="postalcode" placeholder="Enter Postal Code">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Area</label>
												<div class="input">
													<label class="icon-right" for="phone">
														<i class="fa fa-building-o"></i>
													</label>
													<input type="text" id="area" name="area" placeholder="Enter Area">
												</div>
											</div>
										</div>
										<!-- end  Area -->

									</fieldset>

									<fieldset>

										<div class="divider gap-bottom-25"></div>
										
										<div class="j-row">
											<div class="span6 unit"><!-- start Deal Tag -->
												<label class="label">Deal Tag</label>
												<div class="input">
													<label class="icon-right" for="dealtag">
														<img src="j-folder/img/dealtag.png">
													</label>
													<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
												</div>
											</div><!-- end Deal Tag -->
											<div class="span6 unit"><!-- start Deal Description -->
												<label class="label">Deal Description </label>
												<div class="input">
													<textarea type="text" id="dealdescription" name="dealdescription" placeholder="Enter Deal Description"></textarea>
												</div>
											</div><!-- end Deal Description -->
										</div>
										
										<div class="j-row">
											<div class="span6 unit"><!-- start service -->
												<label class="label">Price</label>
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="select_price" id="next-step-radio" value="Yes">
															<i></i>£ ( Pound ) 
														</label>
														<label class="radio">
															<input type="radio" name="select_price"  value="No">
															<i></i> € ( Euro )
														</label>
													</div>
												</div>
											</div><!-- end service -->
											<div class="span6 unit"><!-- start Family Race -->
												<label class="label">Family Race</label>
												<div class="input">
													<label class="icon-right" for="phone">
														<i class="fa fa-home"></i>
													</label>
													<input type="text" id="familyrace" name="familyrace" placeholder="Enter Family Race">
												</div>
											</div><!-- end Family Race -->
										</div>
										
										<div class="j-row">
											<div class="span6 unit"><!-- start Type -->
												<label class="label">Type</label>
												<div class="input">
													<label class="icon-right" for="phone">
														<img src="j-folder/img/type.png">
													</label>
													<input type="text" id="type" name="type" placeholder="Enter Type">
												</div>
											</div><!-- end Type -->
											
											<div class="span6 unit"><!-- start Age -->
												<label class="label">Age</label>
												<label class="input select">
													<select name="Age">
														<option value="none" selected disabled="">select Age</option>
														<option value="3months">0 to 3 Months</option>
														<option value="6months">3 to 6 Months</option>
														<option value="9months">6 to 9 Months</option>
														<option value="12months">9 to 12 Months</option>
														<option value="2years"> > 1 Year - < 2 Years</option>
														<option value="3years"> > 2 Years - < 3 Years</option>
														<option value="4years"> > 3 Years - < 4 Years</option>
														<option value="5years"> > 4 Years - < 5 Years</option>
													</select>
													<i></i>
												</label>
											</div><!-- end Age -->
										</div>
										
										<div class="j-row">
											<div class="span6 unit"><!-- start Height -->
												<label class="label">Height</label>
												<div class="input">
													<label class="icon-right" for="phone">
														<img src="j-folder/img/height.png">
													</label>
													<input type="text" id="height" name="height" placeholder="Enter Height">
												</div>
											</div><!-- end Height -->
											<div class="span6 unit"><!-- start Gender -->
												<label class="label">Gender</label>
												<div class="input">
													<label class="icon-right" for="phone">
														<i class="fa fa-male"></i>
													</label>
													<input type="text" id="gender" name="gender" placeholder="Enter Gender">
												</div>
											</div><!-- end Gender -->
										</div>

									</fieldset>

									<fieldset>

										<div class="divider gap-bottom-25"></div>

											<!-- start name -->
										<div class="j-row">
											<div class="span4">
												<!-- promotion-box-->
												<div class="promotion-box">
													<div class="promotion-box-center color-2">
														<div class="prince">
															Free
														</div>
													</div>
													<!-- End promotion-box-center-->

													<!-- promotion-box-info-->
													<div class="promotion-box-info">
														<ul class="list-styles">
															<li><i class="fa fa-arrow-right"></i> 3-5 Images Upload</li>
															<li><i class="fa fa-arrow-right"></i> No Video</li>
															<li><i class="fa fa-arrow-right"></i> No Visibility</li>
															<li><i class="fa fa-arrow-right"></i> No Website link</li>
														</ul>
														<label class="checkbox">
															<input type="checkbox" name="candles" value="candles-5$" data-price="5">
															<i></i>
															is Urgent
														</label>
														<ul class="list-styles free_hide" style="display:none;">
															<li><i class="fa fa-arrow-right"></i> 9 Images</li>
															<li><i class="fa fa-arrow-right"></i> Video Link</li>
															<li><i class="fa fa-arrow-right"></i> Website link</li>
														</ul>
														<a href="#four" data-toggle="tab" class="btn btn-primary">Select Package</a>
													</div>
													
													<!-- End promotion-box-info-->
												</div>
												<!-- End promotion-box-->
											</div>

											<div class="span4">
												<!-- promotion-box-->
												<div class="promotion-box">
													<div class="promotion-box-center color-1">
														<div class="prince">
															Gold
														</div>
													</div>
													<!-- End promotion-box-center-->

													<!-- promotion-box-info-->
													<div class="promotion-box-info">
														<ul class="list-styles">
															<li><i class="fa fa-arrow-right"></i> Upload 9 Images</li>
															<li><i class="fa fa-arrow-right"></i> Video link</li>
															<li><i class="fa fa-arrow-right"></i> More Visibility</li>
															<li><i class="fa fa-arrow-right"></i> Website link</li>
														</ul>
														<label class="checkbox">
															<input type="checkbox" name="candles" value="candles-5$" data-price="5">
															<i></i>
															is Urgent
														</label>
														<ul class="list-styles gold_hide" style="display:none;">
															<li><i class="fa fa-arrow-right"></i> 12 Images</li>
														</ul>
														<a href="#four" data-toggle="tab" class="btn btn-primary">Select Package</a>
													</div>
													
													<!-- End promotion-box-info-->
												</div>
												<!-- End promotion-box-->
											</div>
											
											<div class="span4">
												<!-- promotion-box-->
												<div class="promotion-box">
													<div class="promotion-box-center color-3">
														<div class="prince">
															Platinum
														</div>
													</div>
													<!-- End promotion-box-center-->

													<!-- promotion-box-info-->
													<div class="promotion-box-info">
														<ul class="list-styles">
															<li><i class="fa fa-arrow-right"></i> Upload 15 Images</li>
															<li><i class="fa fa-arrow-right"></i> Video Upload</li>
															<li><i class="fa fa-arrow-right"></i> Top Visibility</li>
															<li><i class="fa fa-arrow-right"></i> Website link</li>
															<li><i class="fa fa-arrow-right"></i> Marquee Title</li>
														</ul>
														<a href="#four" data-toggle="tab" class="btn btn-primary">Select Package</a>
													</div>
													
													<!-- End promotion-box-info-->
												</div>
												<!-- End promotion-box-->
											</div>
										</div>
								
									</fieldset>
									
									<fieldset>

										<div class="divider gap-bottom-25"></div>

										<!-- start name -->
										<div class="j-row">
											<div class="span6">
												<div class="j-row">
													<div class="span12 unit">
														<label class="label">Business Name</label>
														<div class="input">
															<label class="icon-right" for="company">
																<i class="fa fa-briefcase"></i>
															</label>
															<input type="text" id="busname" name="busname" placeholder="Enter  Name ">
														</div>
													</div>
													<div class="span12 unit">
														<label class="label">Contact Person Name </label>
														<div class="input">
															<label class="icon-right" for="name">
																<i class="fa fa-user"></i>
															</label>
															<input type="text" id="buscontname" name="buscontname" placeholder="Enter Contact Person Name ">
														</div>
													</div>
													<div class="span12 unit">
														<label class="label">Mobile Number</label>
														<div class="input">
															<label class="icon-right" for="phone">
																<i class="fa fa-phone"></i>
															</label>
															<input type="text" id="bussmblno" name="bussmblno" placeholder="Enter Your Mobile Number ">
														</div>
													</div>
													<div class="span12 unit">
														<label class="label">Email</label>
														<div class="input">
															<label class="icon-right" for="email">
																<i class="fa fa-envelope-o"></i>
															</label>
															<input type="email" id="busemail" name="busemail" placeholder="Enter Your Email">
														</div>
													</div>
												</div>
											</div>
											
											<div class="span6">
												<div class="j-row">
													<div class="span12 unit">
														<label class="label">Contact Name </label>
														<div class="input">
															<label class="icon-right" for="name">
																<i class="fa fa-user"></i>
															</label>
															<input type="text" id="conscontname" name="conscontname" placeholder="Enter Contact Person Name ">
														</div>
													</div>
													<div class="span12 unit">
														<label class="label">Mobile Number</label>
														<div class="input">
															<label class="icon-right" for="phone">
																<i class="fa fa-phone"></i>
															</label>
															<input type="text" id="conssmblno" name="conssmblno" placeholder="Enter Your Mobile Number ">
														</div>
													</div>
													<div class="span12 unit">
														<label class="label">Email</label>
														<div class="input">
															<label class="icon-right" for="email">
																<i class="fa fa-envelope-o"></i>
															</label>
															<input type="email" id="consemail" name="consemail" placeholder="Enter Your Email">
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- end name -->

									</fieldset>
									
									
									<fieldset>

										<div class="divider gap-bottom-25"></div>

										<!-- start textarea -->
										<div class="unit">
											<label class="label">Message or comment</label>
											<div class="input">
												<textarea spellcheck="false" name="message"></textarea>
											</div>
										</div>
										<!-- end textarea -->

										
										<!-- start response from server -->
										<div id="response"></div>
										<!-- end response from server -->

									</fieldset>

								</div>
								<!-- end /.content -->

								<div class="footer">
									<button type="submit" class="primary-btn multi-submit-btn">Order</button>
									<button type="button" class="primary-btn multi-next-btn">Next</button>
									<button type="button" class="secondary-btn multi-prev-btn">Back</button>
								</div>
								<!-- end /.footer -->

							</form>
						</div>
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