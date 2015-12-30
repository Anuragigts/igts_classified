	<title>365 Deals :: PostaDeal</title>
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
                <div class="bg_parallax image_02_parallax"></div>
                <!-- Parallax Background -->
			</div>   
            <!-- End Section Title-->
    <section class="content-central">
		<!-- Shadow Semiboxed -->
		<div class="semiboxshadow text-center">
			<img src="img/img-theme/shp.png" class="img-responsive" alt="">
		</div>
		
		<!-- content info - Blog-->
		<div class="content_info">
			<div class="paddings-mini">
				<!-- content-->
				<div class="container">
					<div class="row">
						<div class="wrapper wrapper-640" style="padding-top: 0px;">

							<form action="http://lazy-coding.com/j-forms-advanced/forms/order_multistep_with_steps/j-folder/php/demo.php" method="post" class="j-forms j-multistep" id="j-forms" enctype="multipart/form-data" novalidate>

								<div class="header">
									<a href="postad" class="pull-left post_ad_back"><i class="fa fa-mail-reply-all fa-3x"></i></a><p>Post a Deal</p>
								</div>
								 <!--end /.header-->

								<div class="content">
									<div class="top-head">
										<div class="col-sm-12 text_center pad_bottm">
											<ul class="social-team text_center">
												<li><?php echo ucfirst(@$cat); ?> /</li>
												<li><?php echo ucfirst(@$sub_name); ?> /</li>
												<li><?php echo ucfirst(@$sub_sub_name); ?></li>
											</ul>                 
										</div> 
									</div>

									<!-- start steps -->
									<div class="j-row">
										<div class="span4 step">
											<div class="steps">
												<span>Step 1:</span>
												<p>1st Screen</p>
											</div>
										</div>
										<div class="span4 step">
											<div class="steps">
												<span>Step 2:</span>
												<p>Packages</p>
											</div>
										</div>
										
										<div class="span4 step">
											<div class="steps">
												<span>Step 3:</span>
												<p>Terms & Conditions</p>
											</div>
										</div>
									</div>
									<!-- end steps -->

									<fieldset>

										<div class="divider gap-bottom-25"></div>

										<div class="post_deal_bor">	
											<!-- start name -->
											<div class="j-row">
												<div class="span12 unit">
													<div class="unit check logic-block-radio">
														<div class="inline-group">
															<label class="radio">
																<input type="radio" name="checkbox_toggle" id="next-step-radio" class='bus_consumer' value="Yes">
																<i></i>Business <sup style='color:red;'>?</sup>
															</label>
															<label class="radio">
																<input type="radio" name="checkbox_toggle" class='bus_consumer'  value="No">
																<i></i>Consumer <sup style='color:red;'>?</sup>
															</label>
														</div>
													</div>
												</div>
											</div>
											<!-- start Postal Code -->
											<div class="j-row">
												<div class="span6 unit">
													<label class="label">Postal Code <sup style='color:red;'>?</sup></label>
													<div class="input">
														<label class="icon-right" for="email">
															<i class="fa fa-bookmark-o"></i>
														</label>
														<input type="text" id="postalcode" name="postalcode" placeholder="(e.g. EH14 4AB)" >
														<span class="tooltip tooltip-right-top">Enter Postal Code</span>
													</div>
												</div>
												<div class="span6 unit">
													<label class="label">Location <sup style='color:red;' id="right-top">?</sup></label>
													<div class="input">
														<label class="icon-right" for="phone">
															<i class="fa fa-building-o"></i>
														</label>
														<!-- <input type="text" id="area" name="area" placeholder="Enter Area"> -->
														<input id="location" name='location' type="text" placeholder="Type in an address" size="90" />
														<span class="tooltip tooltip-right-top">Enter Your Location</span>
													</div>
												</div>
											</div>
											<!-- end  Area -->
											<div class="j-row">
												<div class="span2 unit">
													
												</div>
												<div class="span8 unit">
													<!--  Map here -->
													 <div class="map_canvas"></div>
												</div>
												<div class="span2 unit">
													
												</div>
											</div>
										
										</div>
										
										<div class="post_deal_bor top_10" id='bus_logo' style='display:none;margin-top: 20px;'>	
											<div class="j-row"  > 
												<div class="span6 unit">
													<label class="label">Business Logo <sup style='color:red;'>?</sup></label>
													<div class="unit">
														<label class="input append-big-btn">
															<div class="file-button">
																Browse
																<input type="file" name="file" onchange="document.getElementById('file_input').value = this.value; fileupload(this);">
															</div>
															<input type="text" id="file_input" readonly="" placeholder="no file selected">
															<span class="hint">Only: jpg / png / pdf / doc Size: less 1 Mb</span>
														</label>
													</div>
												</div>
												<div class="span6 unit" class='img_hide'>
													<img id="blah" src="#" alt=''/>
												</div>
											</div>
										</div>
										<!-- end Business Logo -->
										
										<div class="post_deal_bor top_10" style='margin-top: 20px;'>	
											<div class="j-row">
												<div class="span12 unit">
													<div class="unit check logic-block-radio">
														<div class="inline-group">
															<label class="radio">
																<input type="radio" name="checkbox_services" id="next-step-radio" value="Yes">
																<i></i>Service Provider
															</label>
															<label class="radio">
																<input type="radio" name="checkbox_services"  value="No">
																<i></i>Service needed
															</label>
														</div>
													</div>
												</div>
											</div>
											<div class="j-row">
												<div class="span6 unit"><!-- start Deal Tag -->
													<label class="label">Deal Tag / Caption <sup style='color:red;' id="right-top">?</sup></label>
													<div class="input">
														<label class="icon-right" for="dealtag">
															<img src="j-folder/img/dealtag.png">
														</label>
														<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
														<span class="tooltip tooltip-right-top">Enter your Deal tag</span>
													</div>
												</div><!-- end Deal Tag -->
												<div class="span6 unit"><!-- start Deal Description -->
													<label class="label">Deal Description <sup style='color:red;' id="right-top">?</sup> </label>
													<div class="input">
														<textarea type="text" id="dealdescription" name="dealdescription" placeholder="Enter Deal Description"></textarea>
														<span class="tooltip tooltip-right-top">enter your Deal Description</span>
													</div>
												</div><!-- end Deal Description -->
											</div>
											<div class="j-row">
												<div class="span6"><!-- start service -->
													<div class="j-row">
														<div class="span7 unit">
															<label class="label">Price <sup style='color:red;'>?</sup></label>
															<div class="unit check logic-block-radio">
																<div class="inline-group">
																	<label class="radio">
																		<input type="radio" name="checkbox_toggle1" id="next-step-radio" value="Yes">
																		<i></i>£(Pound) 
																	</label>
																	<label class="radio">
																		<input type="radio" name="checkbox_toggle1"  value="No">
																		<i></i> €(Euro)
																	</label>
																</div>
															</div>
														</div>
														<div class="span5 unit top_20">
															<div class="input">
																<label class="icon-right" for="dealtag">
																	<img src="j-folder/img/price.png">
																</label>
																<input type="text" id="priceamount" name="priceamount" placeholder="Enter Amount">
																<span class="tooltip tooltip-right-top">enter your Amount</span>
															</div>
														</div>
													</div><!-- end service -->
												</div>
												<div class="span6 unit"><!-- start Deal Tag -->
													<label class="label">Type of Service <sup style='color:red;' id="right-top">?</sup></label>
													<div class="input">
														<label class="icon-right" for="dealtag">
															<img src="j-folder/img/dealtag.png">
														</label>
														<input type="text" id="typeservice" name="typeservice" placeholder="Type of Service">
														<span class="tooltip tooltip-right-top">Enter Type of Service</span>
													</div>
												</div>
											</div>
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
															<input type="checkbox" name="candles" id='free_package' value="candles-5$" data-price="5">
															<i></i>
															is Urgent
														</label>
														<ul class="list-styles free_hide" style="display:none;">
															<li><i class="fa fa-arrow-right"></i> 9 Images</li>
															<li><i class="fa fa-arrow-right"></i> Video Link</li>
															<li><i class="fa fa-arrow-right"></i> Website link</li>
														</ul>
														<a href="#four" data-toggle="tab" class="btn btn-primary multi-next-btn">Select Package</a>
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
															<input type="checkbox" id='gold_package' name="candles" value="candles-5$" data-price="5">
															<i></i>
															is Urgent
														</label>
														<ul class="list-styles gold_hide" style="display:none;">
															<li><i class="fa fa-arrow-right"></i> 12 Images</li>
														</ul>
														<a href="#four" data-toggle="tab" class="btn btn-primary multi-next-btn">Select Package</a>
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
														</ul>
														<label class="checkbox">
															<input type="checkbox" id='platinum_package' name="candles" value="candles-5$" data-price="5">
															<i></i>
															 Marquee Title
														</label>
														<div class="input marquetitle_hide"  style='display:none;'>
															<textarea type="text" id="marquetit" name="marquetit" placeholder="Enter Marquee Title"></textarea>
														</div>
														<a href="#four" data-toggle="tab" class="btn btn-primary multi-next-btn">Select Package</a>
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
											<div class="span12" id='business_form'>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Business Name <sup style='color:red;' id="right-top">?</sup></label>
														<div class="input">
															<label class="icon-right" for="company">
																<i class="fa fa-briefcase"></i>
															</label>
															<input type="text" id="busname" name="busname" placeholder="Enter  Name ">
															<span class="tooltip tooltip-right-top">Enter Your Name</span>
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Contact Person Name <sup style='color:red;' id="right-top">?</sup> </label>
														<div class="input">
															<label class="icon-right" for="name">
																<i class="fa fa-user"></i>
															</label>
															<input type="text" id="buscontname" name="buscontname" placeholder="Enter Contact Person Name ">
															<span class="tooltip tooltip-right-top">Enter Contact Person Name</span>
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Mobile Number <sup style='color:red;' id="right-top">?</sup></label>
														<div class="input">
															<label class="icon-right" for="phone">
																<i class="fa fa-phone"></i>
															</label>
															<input type="text" id="bussmblno" name="bussmblno" placeholder="Enter Your Mobile Number ">
															<span class="tooltip tooltip-right-top">Enter Your Mobile Number</span>
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Email <sup style='color:red;' id="right-top">?</sup></label>
														<div class="input">
															<label class="icon-right" for="email">
																<i class="fa fa-envelope-o"></i>
															</label>
															<input type="email" id="busemail" name="busemail" placeholder="Enter Your Email">
															<span class="tooltip tooltip-right-top">Enter Your Email</span>
														</div>
													</div>
												</div>
											</div>
											
											<div class="span12" id='consumer_form'>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Contact Name <sup style='color:red;' id="right-top">?</sup> </label>
														<div class="input">
															<label class="icon-right" for="name">
																<i class="fa fa-user"></i>
															</label>
															<input type="text" id="conscontname" name="conscontname" placeholder="Enter Contact Person Name ">
															<span class="tooltip tooltip-right-top">Enter Your Name</span>
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Mobile Number <sup style='color:red;' id="right-top">?</sup></label>
														<div class="input">
															<label class="icon-right" for="phone">
																<i class="fa fa-phone"></i>
															</label>
															<input type="text" id="conssmblno" name="conssmblno" placeholder="Enter Your Mobile Number ">
															<span class="tooltip tooltip-right-top">Enter Your Mobile Number</span>
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Email <sup style='color:red;' id="right-top">?</sup></label>
														<div class="input">
															<label class="icon-right" for="email">
																<i class="fa fa-envelope-o"></i>
															</label>
															<input type="email" id="consemail" name="consemail" placeholder="Enter Your Email">
															<span class="tooltip tooltip-right-top">Enter Your Email</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- end name -->
										
										
										
										<!-- start textarea --
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

	<script src="js/jquery.js"></script> 
	<script src="j-folder/js/jquery.maskedinput.min.js"></script>
	<script src="j-folder/js/jquery.validate.min.js"></script>
	<script src="j-folder/js/additional-methods.min.js"></script>
	<script src="j-folder/js/jquery.form.min.js"></script>
	<script src="j-folder/js/j-forms.min.js"></script>
		
