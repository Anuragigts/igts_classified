	<title>365 Deals :: PostaDeal</title>
	
	<link rel='stylesheet' type='text/css' href='imgupload/imgupload.css' />
	<script src="imgupload/jquery.fancybox.min.js"></script>
	<script src="imgupload/imageupload.js"></script>

	<script type='text/javascript'>
		/*
		jQuery Image upload
		Images can be uploaded using:
		* File requester (Double click on box)
		* Drag&Drop (Drag and drop image on box)
		* Pasting. (Copy an image or make a screenshot, then activate the page and paste in the image.)

		Works in Mozilla, Webkit & IE.
		*/

		jQuery(document).ready(function($) {

			// Shared callback handler for processing output
			var outputHandlerFunc = function(imgObj) {

				var sizeInKB = function(bytes) {return (typeof bytes == 'number') ? (bytes/1024).toFixed(2) + 'Kb' : bytes;};

				var getThumbnail = function(original, maxWidth, maxHeight, upscale) {
					var canvas = document.createElement("canvas"), width, height;
					if (original.width<maxWidth && original.height<maxHeight && upscale == undefined) {
						width = original.width;
						height = original.height;
					}
					else {
						width = maxWidth;
						height = parseInt(original.height*(maxWidth/original.width));
						if (height>maxHeight) {
							height = maxHeight;
							width = parseInt(original.width*(maxHeight/original.height));
						}
					}
					canvas.width = width;
					canvas.height = height;
					canvas.getContext("2d").drawImage(original, 0, 0, width, height);
					$(canvas).attr('title','Original size: ' + original.width + 'x' + original.height);
					return canvas;
				}



				$(new Image()).on('load', function(e) {
			console.log('imgobj',e)
					var $wrapper = $('<li class="new-item"><div class="list-content"><span class="preview"></span><span class="type">' + imgObj.type + '<br>' + (e.target.width + '&times;' + e.target.height) + '<br>' + sizeInKB(imgObj.size) + '</span><span class="name">' + imgObj.name +'</span><span class="options"><span class="imagedelete" title="Remove image"></span></span></div></li>').appendTo('#output ul');
					$('.imagedelete',$wrapper).one('click',function(e) {
						$wrapper.toggleClass('new-item').addClass('removed-item');
						$wrapper.one('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function(e) {
							$wrapper.remove();
						});
					});

					var thumb = getThumbnail(e.target,50,50);
					var $link = $('<a rel="fancybox">').attr({
						target:"_blank",
						href: imgObj.imgSrc
					}).append(thumb).appendTo($('.preview', $wrapper));

				}).attr('src',imgObj.imgSrc);

			}

			$("a[rel=fancybox]").fancybox();

			var fileReaderAvailable = (typeof FileReader !== "undefined");
			var clipBoardAvailable = (window.clipboardData !== false);
			var pasteAvailable = Boolean(clipBoardAvailable & fileReaderAvailable & !eval('/*@cc_on !@*/false'));

			if (fileReaderAvailable) {

				// Enable drop area upload
				$('#dropzone').imageUpload({
					errorContainer: $('span','#errormessages'),
					trigger: 'dblclick',
					enableCliboardCapture: pasteAvailable,
					onBeforeUpload: function() {$('body').css('background-color','green');console.log('start',Date.now());},
					onAfterUpload: function() {$('body').css('background-color','#eee');console.log('end',Date.now());},
					outputHandler:outputHandlerFunc
				})

				$('#dropzone').prev('#textbox-wrapper').find('#textbox').append('<p class="large">Drag and Drop<br>Image File here</p><p class="small">Doubleclick<br>for file requester</p>');
			}
			else {
				$('body').addClass('nofilereader');
			}

			if (!pasteAvailable) {
				$('body').addClass('nopaste');
			}

		});

	</script>

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
						<div class="wrapper wrapper-640" style="padding-top: 0px;">

							<form action="http://lazy-coding.com/j-forms-advanced/forms/order_multistep_with_steps/j-folder/php/demo.php" method="post" class="j-forms j-multistep tooltip-hover" id="j-forms" enctype="multipart/form-data" novalidate>

								<div class="header">
									<a href="postad" class="pull-left post_ad_back"><i class="fa fa-mail-reply-all fa-3x"></i></a><p>Post a Deal</p>
								</div>
								 <!--end /.header-->

								<div class="content">
									<div class="top-head">
										<div class="j-row">
											<div class="col-sm-8 pad_bottm">
												<ul class="social-team pull-left">
													<li><?php echo ucfirst(@$cat); ?> /</li>
													<li><?php echo ucfirst(@$sub_name); ?> /</li>
													<li><?php echo ucfirst(@$sub_sub_name); ?></li>
												</ul>                 
											</div>
											<div class="col-sm-4 pad_bottm">
												<ul class="social-team pull-left">
													<li><a href="" data-toggle="modal" data-target="#Services" >Use Different Category</a></li>
												</ul>                 
											</div>
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
											
											<div class="j-row">
												<div class="span5 unit">
													<div class="unit check logic-block-radio">
														<div class="inline-group">
															<label class="radio">
																<input type="radio" name="checkbox_toggle" id="next-step-radio" class='bus_consumer' value="Yes">
																<i></i>Business 
																<sup data-toggle="tooltip" title="" data-original-title="Business">
																	<img src="img/icons/i.png">
																</sup>
															</label>
															<label class="radio">
																<input type="radio" name="checkbox_toggle" class='bus_consumer'  value="No">
																<i></i>Consumer 
																<sup data-toggle="tooltip" title="" data-original-title="Postal Code">
																	<img src="img/icons/i.png">
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
														<sup data-toggle="tooltip" title="" data-original-title="Postal Code">
															<img src="img/icons/i.png">
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
														<sup data-toggle="tooltip" title="" data-original-title="Location">
															<img src="img/icons/i.png">
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
														<sup data-toggle="tooltip" title="" data-original-title="Business Logo ">
															<img src="img/icons/i.png">
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
																	<sup data-toggle="tooltip" title="" data-original-title="Service Provider">
																		<img src="img/icons/i.png">
																	</sup>
															</label>
															<label class="radio">
																<input type="radio" name="checkbox_services"  value="No">
																<i></i>Service needed
																<sup data-toggle="tooltip" title="" data-original-title="Service needed">
																	<img src="img/icons/i.png">
																</sup>
															</label>
														</div>
													</div>
												</div>
											</div>
											<div class="j-row">
												<div class="span6 unit"><!-- start Deal Tag -->
													<label class="label">Deal Tag / Caption 
														<sup data-toggle="tooltip" title="" data-original-title="Postal">
															<img src="img/icons/i.png">
														</sup>
													</label>
													<div class="input">
														<label class="icon-right" for="dealtag">
															<img src="j-folder/img/dealtag.png">
														</label>
														<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
													</div>
												</div><!-- end Deal Tag -->
												<div class="span6 unit"><!-- start Deal Tag -->
													<label class="label">Type of Service 
														<sup data-toggle="tooltip" title="" data-original-title="Type of Service">
															<img src="img/icons/i.png">
														</sup>
													</label>
													<div class="input">
														<label class="icon-right" for="dealtag">
															<img src="j-folder/img/type.png">
														</label>
														<input type="text" id="typeservice" name="typeservice" placeholder="Type of Service">
													</div>
												</div>
											</div>
											
											<div class="j-row">
												<div class="span12 unit"><!-- start Deal Description -->
													<label class="label">Deal Description 
														<sup data-toggle="tooltip" title="" data-original-title="Deal Description ">
															<img src="img/icons/i.png">
														</sup>
													</label>
													<div class="input">
														<textarea type="text" id="dealdescription" name="dealdescription" cols="40" placeholder="Enter Deal Description"></textarea>
														<input type='hidden' name='text_hide' id='text_hide' value='' />
													</div>
												</div><!-- end Deal Description -->
											</div>
											
											<div class="j-row">
												<div class="span6 unit">
													<label class="label">Price 
														<sup data-toggle="tooltip" title="" data-original-title="Price">
															<img src="img/icons/i.png">
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
												</div>
												<div class="span6 unit">
													<div class="j-row">
														<div class="span7 unit top_20">
															<div class="input">
																<label class="icon-right" for="dealtag">
																	<img src="j-folder/img/price.png">
																</label>
																<input type="text" id="priceamount" name="priceamount" placeholder="Enter Amount">
															</div>
														</div>
														<div class="span5 unit top_30">
															<label class="checkbox">
																<input type="checkbox" id='platinum_package' name="candles" value="candles-5$" data-price="5">
																<i></i>
																 Negotiable
															</label>
														</div>
													</div><!-- end service -->
												
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
														<a href="#four" data-toggle="tab" id='free_urgent' class="btn btn-primary multi-next-btn">Select Package</a>
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
														<a href="#four" data-toggle="tab" id='gold_urgent' class="btn btn-primary multi-next-btn">Select Package</a>
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
														
														<!-- <label class="checkbox">
															<input type="checkbox" id='platinum_package' name="candles" value="candles-5$" data-price="5">
															<i></i>
															 Marquee Title
														</label>
														<div class="input marquetitle_hide"  style='display:none;'>
															<textarea type="text" id="marquetit" name="marquetit" placeholder="Enter Marquee Title" ></textarea>
														</div> -->
														<a href="#four" data-toggle="tab" id='platinum_urgent' class="btn btn-primary multi-next-btn">Select Package</a>
													</div>
													<!-- End promotion-box-info-->
												</div>
												<!-- End promotion-box-->
											</div>
										</div>
										<div class="row">
											<div class="">
												<div class="unit check logic-block-radio">
													<div class="">
														<div class="row">
															<div class="span4 achor_hov1 unit text_center top_10">
																<h4 class=""><a href="img/free.png" class="fancybox">For More</a></h4>
															</div>
															<div class="span4 achor_hov2 unit text_center top_10">
																<h4><a href="img/gold.png" class="fancybox">For More</a></h4>
															</div>
															<div class="span4 achor_hov3 unit text_center top_10">
																<h4><a href="img/platinum.png" class="fancybox">For More</a></h4>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
									
									<fieldset>

										<div class="divider gap-bottom-25"></div>

											<!-- start name -->
											<div class="j-row">
												<div class="span4 unit">
													<div style="width:240px;">
														<div id="dropzone-wrapper">
															<div id="textbox-wrapper"><div id=textbox></div></div>
															<div id="dropzone"></div>
														</div>
														<div id="errormessages"><span style="display: none;"></span></div>

														<div id="overlay"></div>
													</div>
												</div>
												<div class="span8 unit">
													<div style="float: left;">
														<br /><br />
														<h3>Preview:</h3>
														<div id="output"><ul></ul></div>
													</div>
													<div style="clear:both;"></div>
												</div>
											</div>
											
												<!-- start name -->
												<!-- free -->
												<div class="j-row free_pck" style='display: none;'>
													<div class="span12 unit">
														<b>Upload Images (3-5 images)</b>
													</div>
													<div class="span12 unit">
														<input type='file' />
														<input type='file' />
														<input type='file' />
													</div>
												</div>
												<!-- free + urgent -->
												<div class="j-row free_urgent_pck" style='display: none;'>
													<div class="span12 unit">
														<b>Upload Images (9 images)</b>
													</div>
													<div class="span12 unit">
														<input type='file' />
														<input type='file' />
														<input type='file' />
													</div>
													<div class="span4 unit">
														Video Link
														
													</div>
													<div class="span8 unit">
														<input type='text' name='freeurgent_video' id='freeurgent_pck' value='' />
													</div>
													<div class="span4 unit">
														Website Link
														
													</div>
													<div class="span8 unit">
														<input type='text' name='freeurgent_weblink' id='freeurgent_weblink' value='' />
													</div>
												</div>

										<!-- Gold -->
												<div class="j-row gold_pck" style='display: none;'>
													<div class="span12 unit">
														<b>Upload Images (9 images)</b>
													</div>
													<div class="span12 unit">
														<input type='file' />
														<input type='file' />
														<input type='file' />
													</div>
													<div class="span4 unit">
														Video Link
														
													</div>
													<div class="span8 unit">
														<input type='text' name='gold_videolink' id='gold_videolink' value='' />
													</div>
													<div class="span4 unit">
														Website Link
														
													</div>
													<div class="span8 unit">
														<input type='text' name='gold_weblink' id='gold_weblink' value='' />
													</div>
												</div>

										<!-- Gold + urgent -->
												<div class="j-row gold_urgent_pck" style='display: none;'>
													<div class="span12 unit">
														<b>Upload Images (12 images)</b>
													</div>
													<div class="span12 unit">
														<input type='file' />
														<input type='file' />
														<input type='file' />
													</div>
													<div class="span4 unit">
														Video Link
														
													</div>
													<div class="span8 unit">
														<input type='text' name='goldurgent_videolink' id='goldurgent_videolink' value='' />
													</div>
													<div class="span4 unit">
														Website Link
														
													</div>
													<div class="span8 unit">
														<input type='text' name='goldurgent_weblink' id='goldurgent_weblink' value='' />
													</div>
												</div>

										<!-- Platinum -->
												<div class="j-row platinum_pck" style='display: none;'>
													<div class="span4 unit">
														<b>Marquee Title</b>
													</div>
													<div class="span8 unit">
														<input type='text' name='marquee_title' id='marquee_title' value='' />
													</div>
													<div class="span12 unit">
														<b>Upload Images (15 images)</b>
													</div>
													<div class="span12 unit">
														<input type='file' />
														<input type='file' />
														<input type='file' />
													</div>
													<div class="span4 unit">
														Video Upload
														
													</div>
													<div class="span8 unit">
														<input type='file' />
													</div>
													<div class="span4 unit">
														Website Link
														
													</div>
													<div class="span8 unit">
														<input type='text' name='platinum_weblink' id='platinum_weblink' value='' />
													</div>
												</div>

												<!-- Contact Information -->
												<div class="j-row">
													<div class="span12 unit">
														<b>Contact Information</b>
													</div>
												</div>
										<div class="j-row">
											<div class="span12" id='business_form'>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Business Name 
															<sup data-toggle="tooltip" title="" data-original-title="Business Name">
																<img src="img/icons/i.png">
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
															<sup data-toggle="tooltip" title="" data-original-title="Contact Person Name ">
																<img src="img/icons/i.png">
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
															<sup data-toggle="tooltip" title="" data-original-title="Mobile Number">
																<img src="img/icons/i.png">
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
															<sup data-toggle="tooltip" title="" data-original-title="Email">
																<img src="img/icons/i.png">
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
															<sup data-toggle="tooltip" title="" data-original-title="Contact Name">
																<img src="img/icons/i.png">
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
															<sup data-toggle="tooltip" title="" data-original-title="Mobile Number ">
																<img src="img/icons/i.png">
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
															<sup data-toggle="tooltip" title="" data-original-title="Email">
																<img src="img/icons/i.png">
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
									<button type="button" class="primary-btn multi-next-btn" >Next</button>
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
   
    		/*function len(){
    			
    	 var len = document.getElementById('text_hide').value;
    	 
	    	 if(len == '' || len == '<br>'){
	    	 	document.getElementById("deal_desc_error").style.display = "block";
	    	 	return false;
	    	 }
	   	 	else{
		   	 		if(len.length < 200 ){
		   	 		document.getElementById("deal_desc_error").style.display = "block";
		   	 		return false;
		   	 				}
		   	 				else{
		   	 		document.getElementById("deal_desc_error").style.display = "none";			
		   	 				}
				}
    	 
    	}*/
    	
    </script>
	
	
	<!-- Modal -->
	<form method='post' action="<?php echo base_url(); ?>postad_create_services" id='edit_service_cat'>
	<div class="modal fade" id="Services" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2>Services <span>Category </span></h2>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-10 col-md-offset-1 post_deal_bor">
							<div class="row">
								<div class="col-md-6 clearfix">
									<h3>Professional
										<input type='hidden' name='services_cat' id='services_cat' value='services' />
										<input type='hidden' name='services_sub' id='services_sub' value='' />
										<input type='hidden' name='services_sub_sub' id='services_sub_sub' value='' />
									</h3>
							<?php foreach ($services_sub_prof as $serv_prof) { ?>
									<h4><a href="javascript:void(0)" id="<?php echo  $serv_prof['sub_category_id'].','.$serv_prof['sub_subcategory_id']; ?>" class='edit_service_prof'><?php echo ucfirst($serv_prof['sub_subcategory_name']); ?></a></h4>
							<?php	} ?>
								</div>
								<div class="col-md-6 clearfix">
									<h3>Popular</h3>
									<?php foreach ($services_sub_pop as $serv_pop) { ?>
										<h4><a href="javascript:void(0)" id="<?php echo  $serv_pop['sub_category_id'].','.$serv_pop['sub_subcategory_id']; ?>" class='edit_service_pop'><?php echo ucfirst($serv_pop['sub_subcategory_name']); ?></a></h4>
									<?php	} ?>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
	<!-- Services content End-->

