	<title>365 Deals :: Product View</title>
	
	<style>
		.section-title-01{
			height: 273px;
			background-color: #262626;
			text-align: center;
			position: relative;
			width: 100%;
			overflow: hidden;
		}
		.j-forms{
			box-shadow:none !important;
		}
	</style>
	
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-common-libraries.js"></script>	
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-functions.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-thumbsgeneral.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-thumbsstrip.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-touchthumbs.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-panelsbase.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-strippanel.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-gridpanel.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-thumbsgrid.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-tiles.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-tiledesign.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-avia.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-slider.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-sliderassets.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-touchslider.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-zoomslider.js"></script>	
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-video.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-gallery.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-lightbox.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-carousel.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-api.js"></script>

	<link rel='stylesheet' href="<?php echo base_url(); ?>unitegallery/css/unite-gallery.css" type='text/css' />
	
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/themes/default/ug-theme-default.js"></script>
	<link rel='stylesheet' 		  href="<?php echo base_url(); ?>unitegallery/themes/default/ug-theme-default.css" type='text/css' />
	
	<link href="<?php echo base_url(); ?>src/easy-responsive-tabs.css" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css">
	
	<!-- Section Title-->    
	<div class="section-title-01">
		<!-- Parallax Background -->
		<div class="bg_parallax image_01_parallax"></div>
		<!-- Parallax Background -->

	</div>   
	<!-- End Section Title-->
	
	<!--Content Central -->
	<section class="content-central">
		<!-- Shadow Semiboxed -->
		<div class="semiboxshadow text-center">
			<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
		</div>
		<?php 
		/*ad_ description details*/
		foreach ($ads_desc as $ads_desc_val) {
			/*ad id*/
			$ad_id_no = $ads_desc_val->ad_id;
			/*package type and urgent*/
			$package_type = $ads_desc_val->package_type;
			$urgent_pack = $ads_desc_val->urgent_package;
			/*currency symbol*/ 
	        	if ($ads_desc_val->currency == 'pound') {
	        		$currency = '£';
	        	}
	        	else if ($ads_desc_val->currency == 'euro') {
	        		$currency = '€';
	        	}
			$tag = $ads_desc_val->deal_tag;
			$desc = $ads_desc_val->deal_desc;
				if($ads_desc_val->ad_type == 'consumer'){
					$name = @mysql_result(mysql_query("SELECT contact_name FROM contactinfo_consumer WHERE ad_id = '$ads_desc_val->ad_id'"), 0, 'contact_name');
					$mobile = @mysql_result(mysql_query("SELECT mobile FROM contactinfo_consumer WHERE ad_id = '$ads_desc_val->ad_id'"), 0, 'mobile');
				}
				if($ads_desc_val->ad_type == 'business'){
					$name = @mysql_result(mysql_query("SELECT contact_person FROM contactinfo_business WHERE ad_id = '$ads_desc_val->ad_id'"), 0, 'contact_person');
					$mobile = @mysql_result(mysql_query("SELECT mobile FROM contactinfo_business WHERE ad_id = '$ads_desc_val->ad_id'"), 0, 'mobile');
				}
				$posted_on = date("M d, Y H:i:s", strtotime($ads_desc_val->created_on));
				$dealid = $ads_desc_val->ad_prefix.$ads_desc_val->ad_id;
				$price = $currency.$ads_desc_val->price;

				/*weblink*/
			if ($ads_desc_val->web_link != '') {
				$web_url = $ads_desc_val->web_link;
			}
			else{
				$web_url = '';
			}

		}
		 ?>
		<!-- content info - Blog-->
			<div class="content_info">
				<div class="paddings-mini">
					<div class="container">
						<div class="row">
							<div class="col-md-9  single-blog">
								<!-- Post Item Gallery-->
								<div class="post-item">
									<div class="row">
										<!-- Post Header-->
										<div class="col-sm-9 col-xs-8">
											<?php if ($urgent_pack != "") { ?>
												<div class="featured-badge pull-right">
												<span>Urgent</span>
											</div>
											<?php	} ?>
											<div class="post-header">
												<?php if ($package_type == 'platinum') { ?>
													<div class="hidden-xs post-format-icon post-format-standard">
														<img src="<?php echo base_url(); ?>img/icons/crown.png" alt="Crown" title="Crown Icon">
													</div>
												<?php	} ?>

												<?php if ($package_type == 'gold') { ?>
													<div class="hidden-xs post-format-icon post-format-standard">
														<img src="<?php echo base_url(); ?>img/icons/thumb.png" alt="Thumb" title="Thumb Icon">
													</div>
												<?php	} ?>

												<?php if ($package_type == 'free') { ?>
													<div class="hidden-xs post-format-icon post-format-standard">
														<img src="<?php echo base_url(); ?>img/icons/fire.png" alt="Fire" title="Fire Icon">
													</div>
												<?php	} ?>
												
												<div class="post-info-wrap">
													<h2 class="post-title"><a href="#"><?php echo $tag; ?></a></h2>
													<div class="post-meta" style="padding-top: 8px;">
														<ul>
															<li>
																<i class="fa fa-user"></i>
																<a href="#"><?php echo $name; ?></a>
															</li>

															<li>
																<i class="fa fa-clock-o"></i>
																<span><?php echo $posted_on; ?></span>
															</li>

															<li>
																<i class="fa fa-eye"></i>
																<span>234 Views</span>
															</li>
															
															<li>
																<span>Deal ID : <?php echo $dealid; ?></span>
															</li>
														</ul>                      
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-3 col-xs-4  post-header1">
											
										</div>
										<!-- Post Header-->

										<!-- Post Media-->
										<div class="col-sm-12 col-xs-12">
											<div id="gallery" style="display:none;">
												<?php foreach ($ads_pics as $ads_pics_val) {

												 ?>
													<img alt="Preview Image 1"
													 src="<?php echo base_url(); ?>ad_images/<?php echo $ads_pics_val->img_name; ?>" class="img-responsive" title="<?php echo $ads_pics_val->img_name; ?>"
													 data-image="<?php echo base_url(); ?>ad_images/<?php echo $ads_pics_val->img_name; ?>">
												<?php } ?>
											</div>
										</div>	
										<!-- Post Media-->

										
										<div class="col-sm-12 col-xs-12 top_20">
											<div id="parentHorizontalTab">
												<ul class="resp-tabs-list hor_1">
													<li>Description</li>
													<li>Reviews</li>
													<li>Map View</li>
												</ul>
												<div class="resp-tabs-container hor_1">
													<div>
														<p><?php echo $desc; ?></p><br>
														
														<p>
															<!-- body content for services -->
															<div class="row">
																<?php
																$body_content1 = array_chunk($body_content, 2, true);
																 foreach ($body_content1 as $val) {
																 	foreach ($val as $k => $value) { ?>
																 		<div class="col-sm-6">
																			<table class="table table-bordered">
																				<tbody>
																					<tr><th><?php echo $k; ?></th><td><?php echo $value; ?></td></tr>
																				</tbody>
																			</table>
																		</div>
																 <?php	}
																  	} ?>
															</div>
														</p>
														
													</div>
													<div>
														<div class="comments-container">
															<ul id="comments-list" class="comments-list">
																<?php foreach ($ads_review as $r_val) { ?>
																	<li>
																	<div class="comment-main-level">
																		<!-- Avatar 
																			<tr><th>Weblink</th>
																			<td><a href="http://365deals.igravitas.in/" target="_blank">99 Deals</a></td>
																		</tr>-->
																		<!-- <div class="comment-avatar"><img src="<?php echo base_url(); ?>img/icons/man.png" alt="man" title="man"></div> -->
																		<!-- Contenedor del Comentario -->
																		<div class="comment-box">
																			<div class="comment-head">
																				<h6 class="comment-name"><a href=""><?php echo $r_val->review_title; ?></a></h6>
																				<span><?php echo date("M d, Y", strtotime($r_val->review_time)); ?></span>
																				<p class="reting_view">
																					<?php echo $r_val->rating; ?> Ratings
																				</p>
																			</div>
																			<div class="comment-content">
																				<?php echo $r_val->review_msg; ?>
																			</div>
																		</div>
																	</div>
																	<!-- Respuestas de los comentarios -->
																</li>
																<?php	} ?>
															</ul>
														</div>
													</div>
													<div>
														<p><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3852170.942842486!2d-3.127523422083684!3d54.755797801367365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1452233071813" width="600" height="350" frameborder="0" style="border:0" allowfullscreen></iframe></p>
													</div>
												</div>
											</div>
										</div>

										<!-- Post Footer-->
										<div class="col-sm-12 col-xs-12">
											<div class="post-footer">
												<!-- Post Social-->
												<ul class="post-social tooltip-hover">
													<li>
														<a href="#" class="social-facebook" data-toggle="tooltip" title="" data-original-title="Share on Facebook">
															<i class="fa fa-facebook"></i>
															<i class="fa fa-facebook facebook"></i>
														</a>
													</li>

													<li>
														<a href="#" class="social-twitter" data-toggle="tooltip" title="" data-original-title="Share on Twitter">
															<i class="fa fa-twitter"></i>
															<i class="fa fa-twitter twitter"></i>
														</a>
													</li>

													<li>
														<a href="#" class="social-google-plus" data-toggle="tooltip" title="" data-original-title="Share on Google">
															<i class="fa fa-google-plus"></i>
															<i class="fa fa-google-plus google-plus"></i>
														</a>
													</li>

													<li>
														<a href="#" class="social-pinterest" data-toggle="tooltip" title="" data-original-title="Share on pinterest">
															<i class="fa fa-pinterest"></i>
															<i class="fa fa-pinterest pinterest"></i>
														</a>
													</li>

													<li>
														<a href="#" class="social-linkedin" data-toggle="tooltip" title="" data-original-title="Share on linkedin">
															<i class="fa fa-linkedin"></i>
															<i class="fa fa-linkedin linkedin"></i>
														</a>
													</li>

													<li>
														<a href="https://<?php echo $web_url; ?>" target="_blank" class="social-globe" data-toggle="tooltip" title="" data-original-title="Weblink">
															<i class="fa fa-globe"></i>
															<i class="fa fa-globe globe"></i>
														</a>
													</li>
												</ul>
												<!-- Post Social-->
											</div>
										</div>
										<!-- Post Footer-->
								   </div>
								</div>
								<!-- End Post Item Gallery-->
								<?php echo $this->view("classified_layout/success_error"); ?>
								<a class="review_show btn_v btn-4 btn-4a fa fa-arrow-right"><span>Write a Review</span></a>
								<!-- jQuery Form Validation code -->
								<style type="text/css">
								.error{
									color: red !important;
								}
								</style>
								<script>
								  
								  // When the browser is ready...
								  $(function() {
								  
									// Setup form validation on the #register-form element
									$("#rating_form").validate({
									
										// Specify the validation rules
										rules: {
											review_title: {
												required: true,
												minlength: 20
											},
											review_msg: {
												required: true,
												minlength: 60
											},
											review_name: {
												required: true
											},
											user_rating: {
												required: true
											}
										},
										
										// Specify the validation error messages
										messages: {
											review_title: {
												required: "Please Enter review title",
												minlength: "Title contains atleast 20 characters"
											},
											review_msg: {
												required: "Please Enter review message",
												minlength: "Title contains atleast 60 characters"
											},
											review_name: {
												required: "Please Enter review name"
											},
											user_rating: {
												required: "Please give review rating"
											}
										},
										
										submitHandler: function(form) {
											// form.submit();
											return true;
										}
									});

								  });
								  
								  </script>
								<form action="<?php echo base_url(); ?>description_view/review" id="rating_form" method="post" class="j-forms">
								<div class="widget view_sidebar review_hide" style="display:none;">
									<div class="j-row">
										<div class="span12 unit">
											<label class="label">Review Title :</label>
											<div class="input">
												<label class="icon-right" for="review_title">
													<i class="fa fa-compass"></i>
												</label>
												<input type="text" id="review_title" name="review_title" placeholder="Enter Review Title">
												<input type="hidden" name="ad_id" value="<?php echo $ad_id_no; ?>">
											</div>
										</div>
										<div class="span12 unit">
											<label class="label">Your Review :</label>
											<div class="input">
												<textarea type="text" id="review_msg" name="review_msg" placeholder="Enter Your Review"></textarea>
											</div>
										</div>
										<div class="span12 unit">
											<label class="label">Name :</label>
											<div class="input">
												<label class="icon-right" for="name">
													<i class="fa fa-user"></i>
												</label>
												<input type="text" id="review_name" name="review_name" placeholder="Enter Name">
											</div>
										</div>
										<div class="span4 rating-group">
											<label class="label">Your Rating</label>
											<div class="ratings">
												<input id="5acc" type="radio" name="user_rating" value="5">
												<label for="5acc">
													<i class="fa fa-smile-o"></i>
												</label>
												<input id="4acc" type="radio" name="user_rating" value="4">
												<label for="4acc">
													<i class="fa fa-smile-o"></i>
												</label>
												<input id="3acc" type="radio" name="user_rating" value="3">
												<label for="3acc">
													<i class="fa fa-smile-o"></i>
												</label>
												<input id="2acc" type="radio" name="user_rating" value="2">
												<label for="2acc">
													<i class="fa fa-smile-o"></i>
												</label>
												<input id="1acc" type="radio" name="user_rating" value="1" checked="">
												<label for="1acc">
													<i class="fa fa-smile-o"></i>
												</label>
											</div>
										</div>
										<div class="span12 unit clearfix top_20">													
											<input type="submit" class="btn btn-primary" name="add_review" id='add_review' value="Add Review"> 
										</div>
									</div>
								</div>
								</form>
							</div>
							
							<div class="col-md-3">
								<aside class="widget view_sidebar text_center">
									<!--<img src="img/brand/intel.png" alt="Logo" title="Business Logo" class="img-responsive"><hr>-->
									<img src="<?php echo base_url(); ?>img/icons/user_pro.png" alt="user_pro" title="user_pro" class="img-responsive pvt-no-img">
									<h3> <?php echo $name; ?></h3><hr>
									<h4 class="loc_view"><i class="fa fa-map-marker "></i> <i><?php foreach ($ads_loc as $ads_loc_val) {
										echo $ads_loc_val->loc_name;
									} ?></i></h4>
									<img src="<?php echo base_url(); ?>img/icons/contact.png" alt="contact" title="Contact Details" class="contact_now_show img-responsive">
									<ul class="list-styles contact_now_hide" style="display:none;">
										<li><i class="fa fa-phone phn"></i><strong> <?php echo $mobile; ?></strong></li>
									</ul>
									<div class="top_5">
										<div class="amt_bg">
											<h3 class="view_price_1"><?php echo $price; ?></h3>
										</div>
									</div>
								</aside>
								<div class="">
									<a class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right"><span>Send Now</span></a>
									<a class="report_show btn_v btn-4 btn-4a fa fa-arrow-right"><span>Report</span></a>
								</div>
								<form action="#" method="post" class="j-forms">
								<aside class="widget view_sidebar send_now_hide" style="display:none;">
									<div class="j-row">
										<div class="unit">
											<label class="label">Contact Name :</label>
											<div class="input">
												<label class="icon-right" for="name">
													<i class="fa fa-user"></i>
												</label>
												<input type="text" id="buscontname" name="buscontname" placeholder="Enter Contact Person Name ">
											</div>
										</div>
										<div class="unit">
											<label class="label">Mobile Number :</label>
											<div class="input">
												<label class="icon-right" for="phone">
													<i class="fa fa-phone"></i>
												</label>
												<input type="text" id="bussmblno" name="bussmblno" placeholder="Enter Your Mobile Number ">
											</div>
										</div>
										<div class="unit">
											<label class="label">Email :</label>
											<div class="input">
												<label class="icon-right" for="email">
													<i class="fa fa-envelope-o"></i>
												</label>
												<input type="email" id="busemail" name="busemail" placeholder="Enter Your Email">
											</div>
										</div>
										<div class="unit">
											<label class="label">Message :</label>
											<div class="input">
												<textarea type="text" id="" name="" placeholder="Enter Your Feedback "></textarea>
											</div>
										</div>
										<div class="unit">													
											<button class="btn btn-primary " id='change_pwd'>Send Now</button>
										</div>
									</div>
								</aside>
								</form>
								<form action="#" method="post" class="j-forms">
								<aside class="widget view_sidebar report_hide" style="display:none;">
									<div class="j-row">
										<label class="radio">
											<input type="radio" name="report_view" value="" checked="">
											<i></i> This is illegal/fraudulent
										</label>
										<label class="radio">
											<input type="radio" name="report_view" value="">
											<i></i> This deal is spam
										</label>
										<label class="radio">
											<input type="radio" name="report_view" value="">
											<i></i> This deal is a duplicate
										</label>
										<label class="radio">
											<input type="radio" name="report_view" value="">
											<i></i> This deal is in the wrong category
										</label>
										<div class="unit">
											<div class="input">
												<textarea type="text" id="" name="" placeholder="Please Provide more Information"></textarea>
											</div>
										</div>
										<div class="unit">													
											<button class="btn btn-primary " id='change_pwd'>Send Report</button>
										</div>
									</div>
								</aside>
							</form>
								<aside class="widget view_sidebar1">
									<h3 class="imp_tant1">Important Safety Tips</h3>
									<ul class="list-styles">
										<li><i class="fa fa-check imp"></i> <a href="#">Really cheap prices</a></li>
										<li><i class="fa fa-check imp"></i> <a href="#">Irregular email addresses</a></li>
										<li><i class="fa fa-check imp"></i> <a href="#">Contact info in pictures</a></li>
									</ul>
									<p class="text_center imp">To learn more, visit the <a href="#" class="imp"> click here</a> to report this listing.</p>
								</aside>
								
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
		<!-- End Shadow Semiboxed -->
	 
	<script src="<?php echo base_url(); ?>src/jquery.easyResponsiveTabs.js"></script>
	
	<script src="<?php echo base_url(); ?>j-folder/js/jquery.maskedinput.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/additional-methods.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/jquery.form.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/j-forms.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function () {
		
			$('#parentHorizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				tabidentify: 'hor_1', // The tab groups identifier
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#nested-tabInfo');
					var $name = $('span', $info);
		
					$name.text($tab.text());
		
					$info.show();
				}
			});
		
			$('#ChildVerticalTab_1').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true,
				tabidentify: 'ver_1', // The tab groups identifier
				activetab_bg: '#fff', // background color for active tabs in this group
				inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
				active_border_color: '#c1c1c1', // border color for active tabs heads in this group
				active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
			});
		
		});
	</script>
	
	<script type="text/javascript">

		jQuery(document).ready(function(){

			jQuery("#gallery").unitegallery();

		});
		
	</script>
	<script>
		setTimeout(function(){
			 $(".alert").hide();
		},5000);
		
	</script>
	
	 
			
           