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

	        <!-- tinymce editor 

        <script type="text/javascript" src="js/nicEdit.js"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(function() { new nicEditor().panelInstance('dealdescription'); });
		</script>-->

		 <link rel="stylesheet" href="js/jquery.cleditor.css" />
    
    


		<!-- google map by postal code -->		
		 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJPl18cl1woQc2OYOkugwisxSdaqEX3qw"></script>
		<script type="text/javascript">

          function getPosition(callback) {
            var geocoder = new google.maps.Geocoder();
            var postcode = document.getElementById("postalcode").value;

            geocoder.geocode({'address': postcode}, function(results, status) 
            {   
              if (status == google.maps.GeocoderStatus.OK) 
              {
                callback({
                  latt: results[0].geometry.location.lat(),
                  long: results[0].geometry.location.lng()
                });
              }
            });
          }

          function setup_map(latitude, longitude) { 
            var _position = { lat: latitude, lng: longitude};
            
            var mapOptions = {
              zoom: 12,
              center: _position
            }

            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            var marker = new google.maps.Marker({
              position: mapOptions.center,
              map: map
            });
          }
		  
		  function address(latt, long1){
		  $.ajax({ url:'http://maps.googleapis.com/maps/api/geocode/json?latlng='+latt+','+long1+'&sensor=true',
         success: function(data){
			 $('#location').val(data.results[0].formatted_address);
			 
             /*or you could iterate the components for only the city and state*/
         }
			});
			}

          window.onload = function() {
            setup_map(51.5073509, -0.12775829999998223);

            document.getElementById("postalcode").onchange = function() {
              getPosition(function(position){
                setup_map(position.latt, position.long);
				address(position.latt, position.long);
              });
            }
          }
      </script> 

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
						<div class="wrapper wrapper-640 tooltip-hover" style="padding-top: 0px;">

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
																<i></i>Business 
																<sup>
																	<span data-toggle="tooltip" title="" data-original-title="Business">
																		<a href="#"><img src="img/icons/i.png"></a>
																	</span>
																</sup>
															</label>
															<label class="radio">
																<input type="radio" name="checkbox_toggle" class='bus_consumer'  value="No">
																<i></i>Consumer 
																<sup>
																	<span data-toggle="tooltip" title="" data-original-title="Consumer">
																		<a href="#"><img src="img/icons/i.png"></a>
																	</span>
																</sup>
															</label>
														</div>
													</div>
												</div>
											</div>
											<!-- start Postal Code -->
											<div class="j-row">
												<div class="span6 unit">
													<label class="label">Postal Code 
														<sup>
															<span data-toggle="tooltip" title="" data-original-title="Postal Code">
																<a href="#"><img src="img/icons/i.png"></a>
															</span>
														</sup>
													</label>
													<div class="input">
														<label class="icon-right" for="email">
															<i class="fa fa-bookmark-o"></i>
														</label>
														<input type="text" id="postalcode" name="postalcode" placeholder="(e.g. EH14 4AB)" >
													</div>
												</div>
												<div class="span6 unit">
													<label class="label">Location 
														<sup>
															<span data-toggle="tooltip" title="" data-original-title="Location">
																<a href="#"><img src="img/icons/i.png"></a>
															</span>
														</sup>
													</label>
													<div class="input">
														<label class="icon-right" for="phone">
															<i class="fa fa-building-o"></i>
														</label>
														<!-- <input type="text" id="area" name="area" placeholder="Enter Area"> -->
														<input id="location" name='location' readonly type="text" placeholder="Type in an address" size="90" />
													</div>
												</div>
											</div>
											<!-- end  Area -->
											<div class="j-row">
												<div class="span2 unit">
													
												</div>
												<div class="span8 unit">
													<!--  Map here -->
													 <!-- <div class="map_canvas"></div> -->
													 <div id="map"></div>
												</div>
												<div class="span2 unit">
													
												</div>
											</div>
										
										</div>
										
										<div class="post_deal_bor top_10" id='bus_logo' style='display:none;margin-top: 20px;'>	
											<div class="j-row"  > 
												<div class="span6 unit">
													<label class="label">Business Logo
														<sup>
															<span data-toggle="tooltip" title="" data-original-title="Business Logo">
																<a href="#"><img src="img/icons/i.png"></a>
															</span>
														</sup>
													</label>
													<div class="unit">
														<label class="input append-big-btn">
															<div class="file-button">
																Browse
																<input type="file" name="file" onchange="document.getElementById('file_input').value = this.value; fileupload(this);">
															</div>
															<input type="text" id="file_input" readonly="" placeholder="no file selected">
															<span class="hint">Only: jpg / png  Size: less 1 Mb</span>
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
																	<sup>
																		<span data-toggle="tooltip" title="" data-original-title="Service Provider">
																			<a href="#"><img src="img/icons/i.png"></a>
																		</span>
																	</sup>
															</label>
															<label class="radio">
																<input type="radio" name="checkbox_services"  value="No">
																<i></i>Service needed
																	<sup>
																		<span data-toggle="tooltip" title="" data-original-title="Service Needed">
																			<a href="#"><img src="img/icons/i.png"></a>
																		</span>
																	</sup>
															</label>
														</div>
													</div>
												</div>
											</div>
											<div class="j-row">
												<div class="span6 unit"><!-- start Deal Tag -->
													<label class="label">Deal Tag / Caption 
														<sup>
															<span data-toggle="tooltip" title="" data-original-title="Deal Tag / Caption">
																<a href="#"><img src="img/icons/i.png"></a>
															</span>
														</sup>
													</label>
													<div class="input">
														<label class="icon-right" for="dealtag">
															<img src="j-folder/img/dealtag.png">
														</label>
														<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
													</div>
												</div><!-- end Deal Tag -->
												<div class="span6 unit"><!-- start Deal Description -->
													<label class="label">Deal Description 
														<sup>
															<span data-toggle="tooltip" title="" data-original-title="Deal Description">
																<a href="#"><img src="img/icons/i.png"></a>
															</span>
														</sup>
													</label>
													<div class="input">
														<textarea type="text" id="dealdescription" name="dealdescription" cols="40" placeholder="Enter Deal Description"></textarea>
													</div>
												</div><!-- end Deal Description -->
											</div>
											<div class="j-row">
												<div class="span6"><!-- start service -->
													<label class="label">Price 
														<sup>
															<span data-toggle="tooltip" title="" data-original-title="Price">
																<a href="#"><img src="img/icons/i.png"></a>
															</span>
														</sup>
													</label>
													<div class="unit check logic-block-radio">
														<div class="inline-group">
															<label class="radio">
																<input type="radio" name="checkbox_toggle1" id="next-step-radio" value="Yes">
																<i></i>£ (Pound) 
															</label>
															<label class="radio">
																<input type="radio" name="checkbox_toggle1"  value="No">
																<i></i> € (Euro)
															</label>
														</div>
													</div>
												</div><!-- end service -->
												<div class="span4 unit top_20">
													<div class="input">
														<label class="icon-right" for="dealtag">
															<img src="j-folder/img/price.png">
														</label>
														<input type="text" id="priceamount" name="priceamount" placeholder="Enter Amount">
													</div>
												</div>
												<div class="span2 unit top_30">
													<div class="input">
														<label class="checkbox">
															<input type="checkbox" name="candles" id='free_package' value="candles-5$">
															<i></i>
															 Negotiable 
														</label>
													</div>
												</div>
											</div>
											<div class="j-row">
												<div class="span6 unit"><!-- start Deal Tag -->
													<label class="label">Type of Service 
														<sup>
															<span data-toggle="tooltip" title="" data-original-title="Type of Service">
																<a href="#"><img src="img/icons/i.png"></a>
															</span>
														</sup>
													</label>
													<div class="input">
														<label class="icon-right" for="dealtag">
															<img src="j-folder/img/dealtag.png">
														</label>
														<input type="text" id="typeservice" name="typeservice" placeholder="Type of Service">
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
															<textarea type="text" id="marquetit" name="marquetit" placeholder="Enter Marquee Title" ></textarea>
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
														<label class="label">Business Name 
															<sup>
																<span data-toggle="tooltip" title="" data-original-title="Business Name ">
																	<a href="#"><img src="img/icons/i.png"></a>
																</span>
															</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="company">
																<i class="fa fa-briefcase"></i>
															</label>
															<input type="text" id="busname" name="busname" placeholder="Enter  Name ">
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Contact Person Name 
															<sup>
																<span data-toggle="tooltip" title="" data-original-title="Contact Person Name">
																	<a href="#"><img src="img/icons/i.png"></a>
																</span>
															</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="name">
																<i class="fa fa-user"></i>
															</label>
															<input type="text" id="buscontname" name="buscontname" placeholder="Enter Contact Person Name ">
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Mobile Number 
															<sup>
																<span data-toggle="tooltip" title="" data-original-title="Mobile Number ">
																	<a href="#"><img src="img/icons/i.png"></a>
																</span>
															</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="phone">
																<i class="fa fa-phone"></i>
															</label>
															<input type="text" id="bussmblno" name="bussmblno" placeholder="Enter Your Mobile Number ">
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Email 
															<sup>
																<span data-toggle="tooltip" title="" data-original-title="Email">
																	<a href="#"><img src="img/icons/i.png"></a>
																</span>
															</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="email">
																<i class="fa fa-envelope-o"></i>
															</label>
															<input type="email" id="busemail" name="busemail" placeholder="Enter Your Email">
														</div>
													</div>
												</div>
											</div>
											
											<div class="span12" id='consumer_form'>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Contact Name 
															<sup>
																<span data-toggle="tooltip" title="" data-original-title="Contact Name ">
																	<a href="#"><img src="img/icons/i.png"></a>
																</span>
															</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="name">
																<i class="fa fa-user"></i>
															</label>
															<input type="text" id="conscontname" name="conscontname" placeholder="Enter Contact Person Name ">
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Mobile Number 
															<sup>
																<span data-toggle="tooltip" title="" data-original-title="Mobile Number">
																	<a href="#"><img src="img/icons/i.png"></a>
																</span>
															</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="phone">
																<i class="fa fa-phone"></i>
															</label>
															<input type="text" id="conssmblno" name="conssmblno" placeholder="Enter Your Mobile Number ">
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Email 
															<sup>
																<span data-toggle="tooltip" title="" data-original-title="Email">
																	<a href="#"><img src="img/icons/i.png"></a>
																</span>
															</sup>
														</label>
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
										
										<!-- start response from server -->
										<div id="response"></div>
										<!-- end response from server -->

									</fieldset>

								</div>
								<!-- end /.content -->

								<div class="footer">
									<button type="submit" class="primary-btn multi-submit-btn">Order</button>
									<button type="button" class="primary-btn multi-next-btn" onclick='len()' >Next</button>
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
		
		<script src="js/jquery.cleditor.min.js"></script>
		<script src="js/jquery.cleditor.js"></script>
    <script>
        $(document).ready(function () { 
		$("#dealdescription").cleditor({ controls: "bold italic underline | bullets numbering | font size style | color highlight" })[0].focus(); 
		});
    </script>

    <script type="text/javascript">
   
    	// 	function len(){
    	// 		alert('len');
    	//  var len = document.body.textContent;
    	//  alert(len); return false;
    	// }
    	
    </script>
