	<title>Right Deals :: Product View</title>
	
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
		.add-to-compare-list {
			position: absolute;
			left: auto;
		}
		.add-to-compare-list span.favourite_label1 {
			background: url(<?php echo base_url(); ?>img/icons/favinactive.png);
			width: 31px;
			height: 31px;
			display: block;
			cursor: pointer;
		}
		.add-to-compare-list span.favourite_label1.active {
			background: url(<?php echo base_url(); ?>img/icons/favactive.png);
			width: 31px;
			height: 31px;
			display: block;
			cursor: pointer !important;
		}
		.jgallery[data-jgallery-id="1"] .jgallery-thumbnails a {
			width: 100px !important;
			height:60px;
		}
		.jgallery {
			height:480px !important;
		}
	</style>
	
	<script type="text/javascript">
	function isNumber(evt) {
	    evt = (evt) ? evt : window.event;
	    var charCode = (evt.which) ? evt.which : evt.keyCode;
	    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	        return false;
	    }
	    return true;
	}
	$(function(){
		/*favourite ad display */
		var fav_count = <?php echo count($ads_favourite); ?>;
		if (fav_count != 0) {
			$(".favourite_label1").addClass('active');
		}
		else{
			$(".favourite_label1").removeClass('active');
		}
		
		$(".favourite_label").click(function(){
			var log = $("#login_status").val();
			if (log == 'no') {
				window.location.href = "<?php echo base_url(); ?>login";
			}
			var val = $(".favourite_label1").hasClass('active');
			/*adding to favourite*/
			if (val == false) {
				$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>description_view/add_favourite",
				data: {
					ad_id: $("#ad_id").val(), 
					login_id: $("#login_id").val()
				},
				// dataType: "json",
				success: function (data) {
				}
			})
				$(".favourite_label1").addClass('active');
			}
			else{
				/*deleting from favourite*/
				$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>description_view/remove_favourite",
				data: {
					ad_id: $("#ad_id").val(), 
					login_id: $("#login_id").val()
				},
				// dataType: "json",
				success: function (data) {
				}
			})
				$(".favourite_label1").removeClass('active');
			}
		});
		function rgb2hex(rgb){
		 rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
		 return (rgb && rgb.length === 4) ? "#" +
		  ("0" + parseInt(rgb[1],10).toString(16)).slice(-2) +
		  ("0" + parseInt(rgb[2],10).toString(16)).slice(-2) +
		  ("0" + parseInt(rgb[3],10).toString(16)).slice(-2) : '';
		}
		$('.bg_clr1').click( function() {
			var log = $("#login_status").val();
			if (log == 'no') {
				window.location.href = "<?php echo base_url(); ?>login";
			}
			if (rgb2hex($(this).css('color')) == '#727272') {
				$(this).css('color', '#E24A14');
				$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>description_view/add_likes",
				data: {
					ad_id: $("#ad_id").val(), 
					login_id: $("#login_id").val()
				},
				// dataType: "json",
				success: function (data) {}
			})
			}
			else{
				$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>description_view/remove_likes",
				data: {
					ad_id: $("#ad_id").val(), 
					login_id: $("#login_id").val()
				},
				// dataType: "json",
				success: function (data) {}
			})
				$(this).css('color', '#727272');
			}
			
		});
	});
	</script>

	<script type="text/javascript">
	$(function(){
		/*likes display*/
		var ads_likes = <?php echo count($ads_likes); ?>;
		if (ads_likes > 0) {
			$('.bg_clr1').css('color', '#E24A14');
		}
		else{
			$('.bg_clr1').css('color', '#727272');
		}
	});
	</script>
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>unitegallery/jgallery.min.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>unitegallery/jgallery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>unitegallery/touchswipe.min.js"></script>
	
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
		/* ad video details */
		if (isset($ad_video->video_name)) {
			if ($ad_video->video_name != '') {
		$video_name = explode("https://www.youtube.com/watch?v=",$ad_video->video_name);
		}
		else{
			$video_name = 	'';
		}
		};
		
		
		
		/*ad_ description details*/
		foreach ($ads_desc as $ads_desc_val) {
			/*ad id*/
			$catid = $ads_desc_val->category_id;
			$ad_id_no = $ads_desc_val->ad_id;
			$isbustype = $ads_desc_val->ad_type;
			
			/*login_id*/
			//$login_id = $ads_desc_val->login_id;
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
				if ($catid !='1') {
				$price = $currency.number_format($ads_desc_val->price);
				$ptype = $ads_desc_val->price_type;
				}
				

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
					<div class="container pad_bott_50">
						<div class="row">
							<div class="col-md-10 col-sm-10 col-md-offset-1">
								<img src="<?php echo base_url(); ?>img/slide/adds.jpg" alt="add" title="Adds">
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<div class="bread_ccrumbs">
								<div class="container">
									<div class="crumbs">
										<ul>
											<li><a href="<?php echo base_url(); ?>index.php">
												Home
												<input type='hidden' name="login_status" id="login_status" value="<?php echo @$login_status; ?>" />
												<input type='hidden' name="req_url" id="req_url" value="<?php echo @$req_url; ?>" />
											</a></li>
											<li>/</li>
											<li><a href="<?php echo base_url(); ?>deals_administrator">Deal Administrator</a></li>  
											<li></li>
										</ul>    
									</div>
								</div>  
							</div> 
						</div> 
						<div class="row">
							<div class="col-md-9 col-sm-8 single-blog">
								<!-- Post Item Gallery-->
								<div class="post-item">
									<div class="row">
										<!-- Post Header-->
										<div class="col-sm-9 col-xs-12">
											<?php if ($urgent_pack != 0) { ?>
												<div class="featured_badge_view">
												
												</div>
											<?php	} ?>
											<div class="post-header">
												<?php if ($package_type == 3) { ?>
													<div class="hidden-xs post-format-icon post-format-standard">
														<img src="<?php echo base_url(); ?>img/icons/crown.png" alt="Crown" title="Best Deal">
													</div>
												<?php	} ?>

												<?php if ($package_type == 2) { ?>
													<div class="hidden-xs post-format-icon post-format-standard">
														<img src="<?php echo base_url(); ?>img/icons/thumb.png" alt="Thumb" title="Right Deal">
													</div>
												<?php	} ?>

												<div class="post-info-wrap">
													<h2 class="post-title"><a href="#"><?php echo $tag; ?></a></h2>
													<div class="post-meta top_10">
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
																<span>Deal ID : <?php echo $dealid; ?></span>
															</li>
														</ul>                      
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-3 col-xs-6  post-header1">
											<div class="add-to-compare-list pull-left">
												<input type="hidden" name="ad_id" id="ad_id" value="<?php echo $ad_id_no; ?>" />
												<input type="hidden" name="login_id" id="login_id" value="<?php echo @$login; ?>" />
												<a href="javascript:void(0);" class="favourite_label">
													<span class="favourite_label1" title="Add to favourites"></span>
												</a>
											</div>
											<div class="pull-right">
												<i class="fa fa-thumbs-o-up fa-2x bg_clr1" title="Like Ad" ></i>
											</div>
										</div>
										<!-- Post Header-->

										<!-- Post Media-->
										<div class="col-sm-12 col-xs-12">
											<script type="text/javascript">
												$( function() {
													$( '#gallery' ).jGallery();
												} );
											</script>
											<div id="gallery">
												<div class="album" data-jgallery-album-title="Album 1">
												<?php foreach ($ads_pics as $ads_pics_val) {
													$busimg = $ads_pics_val->bus_logo;
												 ?>
													<a href="<?php echo base_url(); ?>pictures/<?php echo $ads_pics_val->img_name; ?>"><img src="<?php echo base_url(); ?>pictures/<?php echo $ads_pics_val->img_name; ?>" alt="Photo 1" /></a>
											
												<?php }	 ?>
												</div>
											</div>
										</div>	
										<!-- Post Media-->

										
										<div class="col-sm-12 col-xs-12 top_20">
											<div id="parentHorizontalTab">
												<ul class="resp-tabs-list hor_1">
													<li>Description</li>
													<li>Reviews</li>
													<li>Map View</li>
													<li>Report</li>
												</ul>
												<div class="resp-tabs-container hor_1">
													<div>
														<p><?php echo $desc; ?></p><br>
														
														<p>
															<!-- body content for services -->
															<div class="row">
																<?php
																if (!empty($body_content)) {
																$body_content1 = array_chunk($body_content, 2, true);
																 foreach ($body_content1 as $val) {
																 	foreach ($val as $k => $value) { ?>
																 		<div class="col-sm-6 view_page_table">
																			<table class="table">
																				<tbody>
																					<tr><th><?php echo $k; ?></th><td><?php echo $value; ?></td></tr>
																				</tbody>
																			</table>
																		</div>
																 <?php	}
																  	}
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
																			<div class="comment-avatar">
																				<i class="fa fa-user fa-3x"></i>
																			</div>
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
																	</li>
																<?php	} ?>
															</ul>
														</div>
													</div>
													<div>
														<p>
															<?php foreach ($ads_loc as $ads_loc_val) { ?>
														 <iframe src = "https://maps.google.com/maps?q=<?php echo $ads_loc_val->latt; ?>,<?php echo $ads_loc_val->longg; ?>&hl=es;z=5&amp;output=embed" width="500px" height="500px"></iframe>
														 <?php } ?>
														</p>
													</div>
													<div>
														<form action="<?php echo base_url(); ?>description_view/reportforads" method="post" id='reportforads' class="j-forms tooltip-hover">
															<aside class="widget view_sidebar">
																<div class="j-row">
																	<label class="radio">
																		<input type='hidden' class='curr_url' name='curr_url' value='<?php echo current_url();?>'>
																		<input type="hidden" name="ad_id" value="<?php echo $ad_id_no; ?>">
																		<input type="hidden" name="cat_id" value="<?php echo $catid; ?>">
																		<input type="radio" name="report_view" value="This is illegal/fraudulent" checked>
																		<i></i> This is illegal/fraudulent
																	</label>
																	<label class="radio">
																		<input type="radio" name="report_view" value="This deal is spam">
																		<i></i> This deal is spam
																	</label>
																	<label class="radio">
																		<input type="radio" name="report_view" value="This deal is a duplicate">
																		<i></i> This deal is a duplicate
																	</label>
																	<label class="radio">
																		<input type="radio" name="report_view" value="This deal is in the wrong category">
																		<i></i> This deal is in the wrong category
																	</label>
																	<div class="unit">
																		<div class="input">
																			<textarea type="text" id="reportmsg" name="reportmsg" placeholder="Please Provide more Information"></textarea>
																		</div>
																	</div>
																	<div class="unit">													
																		<button class="btn btn-primary " id='change_pwd'>Send Report</button>
																	</div>
																</div>
															</aside>
														</form>
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
														<a href="<?php echo "http://".$web_url; ?>" target="_blank" class="social-globe">
															<i class="">Weblink</i>
															<i class="whit_e"> Weblink</i>
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

							$("#feedbackads").validate({
								// Specify the validation rules
										rules: {
											fbkcontname: {
												required: true
											},
											feedbackmsg: {
												required: true,
												minlength: 60
											},
											busemail: {
												required: true,
												email: true
											},
											feedbackno: {
												required: true
											}
										},
										
										// Specify the validation error messages
										messages: {
											fbkcontname: {
												required: "Please Enter contact name"
											},
											feedbackmsg: {
												required: "Please Enter feedback message",
												minlength: "message contains atleast 60 characters"
											},
											busemail: {
												required: "Please Enter valid mail id"
											},
											feedbackno: {
												required: "Please Enter Mobile Number"
											}
										},
										
										submitHandler: function(form) {
											// form.submit();
											return true;
										}
									});

							$("#reportforads").validate({
								// Specify the validation rules
										rules: {
											reportmsg: {
												required: true,
												minlength: 60
											}
										},
										
										// Specify the validation error messages
										messages: {
											reportmsg: {
												required: "Please Enter feedback message",
												minlength: "message contains atleast 60 characters"
											}
										},
										
										submitHandler: function(form) {
											// form.submit();
											return true;
										}
									});

								  });
								  
								</script>
								<form action="<?php echo base_url(); ?>description_view/review" id="rating_form" method="post" class="j-forms tooltip-hover">
								<div class="widget view_sidebar review_hide" style="display:none;">
									<div class="j-row">
										<div class="span12 unit">
											<label class="label">Review Title 
												<sup data-toggle="tooltip" title="" data-original-title="Review Title">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
												</sup>
											</label>
											<div class="input">
												<label class="icon-right" for="review_title">
													<i class="fa fa-compass"></i>
												</label>
												<input type="text" id="review_title" name="review_title" placeholder="Enter Review Title">
												<input type="hidden" name="ad_id" value="<?php echo $ad_id_no; ?>">
											</div>
										</div>
										<div class="span12 unit">
											<label class="label">Your Review 
												<sup data-toggle="tooltip" title="" data-original-title="Your Review ">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
												</sup>
											</label>
											<div class="input">
												<textarea type="text" id="review_msg" name="review_msg" placeholder="Enter Your Review"></textarea>
											</div>
										</div>
										<div class="span12 unit">
											<label class="label">Name 
												<sup data-toggle="tooltip" title="" data-original-title="Name">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
												</sup>
											</label>
											<div class="input">
												<label class="icon-right" for="name">
													<i class="fa fa-user"></i>
												</label>
												<input type="text" id="review_name" name="review_name" placeholder="Enter Name">
											</div>
										</div>
										<div class="span4 rating-group">
											<label class="label">Your Rating
												<sup data-toggle="tooltip" title="" data-original-title="Your Rating">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
												</sup>
											</label>
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
							
							<div class="col-md-3 col-sm-4 col-xs-12">
								<aside class="widget view_sidebar text_center">
									<?php if ($isbustype == 'business') { 
										if ($busimg != '') { ?>
											<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $busimg; ?>" alt="" class="img-responsive"><hr>
										<?php }
										else{ ?>
											<img src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt="" class="img-responsive"><hr>
										<?php }
										 ?>
									
									<?php } ?>
									
									<img src="<?php echo base_url(); ?>img/icons/user_pro.png" alt="user_pro" title="user_pro" class="img-responsive pvt-no-img1">
									<h3> <?php echo $name; ?></h3><hr>
									<h4 class="loc_view"><i class="fa fa-map-marker "></i> <i><?php foreach ($ads_loc as $ads_loc_val) {
										echo implode(",", array_slice(explode(",", $ads_loc_val->loc_name),0,2));
									} ?></i></h4>
									<img src="<?php echo base_url(); ?>img/icons/contact.png" alt="contact" title="Contact Details" class="contact_now_show img-responsive">
									<ul class="list-styles contact_now_hide" style="display:none;">
										<li><i class="fa fa-phone phn"></i><strong> <?php echo $mobile; ?></strong></li>
									</ul>
									<div class="bot_pad_10">
										<div class="amt_bg">
											<?php if ($catid != '1') { ?>
											<h3 class="view_price_1"><?php echo $price; ?></h3>
											<?php } ?>
										</div>
										<?php if ($catid != '1') { ?>
										<div>
											<?php if ($ptype == 'Negotiable') { ?>
												<img src="<?php echo base_url(); ?>img/icons/negotiable.png" alt="negotiable" title="Negotiable">
											<?php }
											else if ($ptype == 'Fixed'){ ?>
												<img src="<?php echo base_url(); ?>img/icons/fixed.png" alt="fixed" title="Fixed">
											<?php } ?>
										</div>
										<?php } ?>
									</div>
								</aside>
								<div class="text_center">
									<a class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right"><span>Send Now</span></a>
								</div>
								<?php echo $this->view("classified_layout/success_error"); ?>
								<form action="<?php echo base_url(); ?>description_view/feedbackforads" method="post" class="j-forms tooltip-hover" id="feedbackads">
									<aside class="widget view_sidebar send_now_hide" style="display:none;">
										<div class="j-row">
											<div class="unit">
												<label class="label">Contact Name
													<sup data-toggle="tooltip" title="" data-original-title="Contact Name">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="name">
														<i class="fa fa-user"></i>
													</label>
													<input type="text" id="fbkcontname" name="fbkcontname" placeholder="Enter Contact Person Name ">
													<input type='hidden' class='curr_url' name='curr_url' value='<?php echo current_url();?>'>
													<input type="hidden" name="ad_id" value="<?php echo $ad_id_no; ?>">
												</div>
											</div>
											<div class="unit">
												<label class="label">Mobile Number
													<sup data-toggle="tooltip" title="" data-original-title="Mobile Number">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="phone">
														<i class="fa fa-phone"></i>
													</label>
													<input type="text" id="feedbackno" name="feedbackno" maxlength='10' onkeypress="return isNumber(event)" placeholder="Enter Your Mobile Number ">
												</div>
											</div>
											<div class="unit">
												<label class="label">Email
													<sup data-toggle="tooltip" title="" data-original-title="Email">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="email">
														<i class="fa fa-envelope-o"></i>
													</label>
													<input type="email" id="busemail" name="busemail" placeholder="Enter Your Email">
												</div>
											</div>
											<div class="unit">
												<label class="label">Message
													<sup data-toggle="tooltip" title="" data-original-title="Message">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<textarea type="text" id="feedbackmsg" name="feedbackmsg" placeholder="Enter Your Feedback "></textarea>
												</div>
											</div>
											<div class="unit">													
												<button class="btn btn-primary " id='change_pwd'>Send Now</button>
											</div>
										</div>
									</aside>
								</form>
								
								<aside class="widget top_20">
									<p>
										<?php  if($package_type == 'platinum' && $ad_video->video_name != ''){
										?>
											<iframe height="215" src="https://www.youtube.com/embed/<?php echo $video_name[1]; ?>" frameborder="0" allowfullscreen></iframe>
										<?php } ?>
									</p>
								</aside>
								
								<aside class="widget view_sidebar1">
									<h3 class="imp_tant1">Important Safety Tips</h3>
									<ul class="list-styles">
										<li><i class="fa fa-check imp"></i> <a href="#">Really cheap prices</a></li>
										<li><i class="fa fa-check imp"></i> <a href="#">Irregular email addresses</a></li>
										<li><i class="fa fa-check imp"></i> <a href="#">Contact info in pictures</a></li>
									</ul>
									<p class="text_center imp">To learn more, visit the <a href="<?php echo base_url(); ?>assistance" class="imp"> click here</a> to report this listing.</p>
								</aside>
								
							</div>
						</div>
					</div>
					
					<!-- Title -->
					<div class="container top_20">
						<div class="titles recen_ad">
							<h2><span>RECOMMENDED </span>DEALS</h2>
						</div>
					</div>
					<!-- End Title-->
					
					<div class="container">
							<div class="row">
								<div class="col-sm-3">
								<a href="business_deals_view">
									<img src="<?php echo base_url(); ?>img/recommended.jpg" alt="recommended" title="RECOMMENDED Deals" class="des_rec_heig img-responsive">
								</a>
								</div>
								<div class="col-sm-9">
									<div id="boxes-carousel">
										<!-- Item carousel Boxed-->
										<?php foreach ($recommanded_ads as $b_ads) {
											/*currency symbol*/ 
		                                    	if ($b_ads->currency == 'pound') {
		                                    		$currency = '£';
		                                    	}
		                                    	else if ($b_ads->currency == 'euro') {
		                                    		$currency = '€';
		                                    	}	
										 ?>
										<div>
											<?php if ($b_ads->urgent_package != '') { ?>
											<div class="bus_rec_badge">
												
											</div>
											<?php } ?>
											<div class="img-hover related_ads">
												<img src="<?php echo base_url(); ?>pictures/<?php echo $b_ads->img_name; ?>" alt="<?php echo $b_ads->img_name; ?>" title="business-image1" class="img-responsive">
												<div class="overlay"><a href="<?php echo base_url(); ?>description_view/details/<?php echo $b_ads->ad_id; ?>" ><i class="fa fa-link"></i></a></div>
											</div>
											<div class="info-gallery">
												<h3><?php echo substr($b_ads->deal_tag,0,20); ?></h3>
												<hr class="separator">
												<?php if ($b_ads->ad_type != 'consumer') { ?>
												<?php if ($b_ads->bus_logo != '') { ?>
													<div class="bus_logo"><span></span><b><img data-u="image" src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $b_ads->bus_logo; ?>" alt="business_logo1" title="business-logo1" /></b></div>
												<?php	}
												else{ ?>
												<div class="bus_logo"><span></span><b><img data-u="image" src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt="business_logo1" title="business-logo1" /></b></div>
											<?php	}
												}
												 ?>
												 <?php if ($b_ads->package_type == 'platinum') { ?>
												 	<div class="business_crown">
													<span></span><b>
													<img src="<?php echo base_url(); ?>img/icons/crown.png" class="pull-right" alt="Crown" title="Best Deal"></b>
													</div>
												<?php	 } ?>
												 <?php if ($b_ads->package_type == 'gold') { ?>
												 	<div class="business_crown">
													<span></span><b>
													<img src="<?php echo base_url(); ?>img/icons/thumb.png" class="pull-right" alt="Crown" title="Right Deal"></b>
													</div>
												<?php	 } ?>
												<p><?php echo substr(strip_tags($b_ads->deal_desc),0,44); ?> </p>
												<?php if ($b_ads->category_id != 'jobs') { ?>
												<h3 class="home_price"><?php echo $currency.number_format($b_ads->price); ?></h3>
												<?php }
												else{ ?>
													<h3 class="home_price"></h3>		
												<?php	}
												?>
												<a href="<?php echo base_url(); ?>description_view/details/<?php echo $b_ads->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
											</div>
											
											
										</div>
										<?php	} ?>
										<!-- End Item carousel Boxed-->
									</div>
								</div>
						</div>
					</div>
					<!-- End boxes-carousel-->

				    <!-- Free Google Ads Start-->
					<div class="container">
						<div class="row">
							<div class="col-md-10 col-sm-10 col-md-offset-1">
								<img src="<?php echo base_url(); ?>img/slide/adds.jpg" alt="add" title="Adds">
							</div>
						</div>
					</div>
					<!-- Free Google Ads End-->

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
	
	<script>
		setTimeout(function(){
			 $(".alert").hide();
		},5000);
		
	</script>
	
	 
			
           