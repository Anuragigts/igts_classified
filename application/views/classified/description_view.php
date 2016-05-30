<!DOCTYPE html>
<html>
	<head>
		
		<title>Product View | 99 Right Deals</title>
		
		<style>
			.section-title-01{
				height: 220px;
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
			.owl-item{
				width: 283px !important;
			}
			.nav-bottom .fade{
				display:none;
			}
		</style>
		
		<!-- xxx Head Content xxx -->
		<?php echo $this->load->view('common/head');?> 
		<!-- xxx End xxx -->
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
		<link href="<?php echo base_url(); ?>/unitegallery/thumbnail-slider.css" rel="stylesheet" type="text/css" />
	    <link href="<?php echo base_url(); ?>/unitegallery/ninja-slider.css" rel="stylesheet" type="text/css" />
	    <script src="<?php echo base_url(); ?>/unitegallery/thumbnail-slider.js" type="text/javascript"></script>
	    <script src="<?php echo base_url(); ?>/unitegallery/ninja-slider.js" type="text/javascript"></script>
		<link href="<?php echo base_url(); ?>src/easy-responsive-tabs.css" rel="stylesheet" type="text/css">
		
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
				var fav_count = <?php echo count($ads_favourite); ?>;
				if (fav_count != 0) {
					$(".favourite_label1").addClass('active');
					$(".favourite_label1").attr("title",'Remove from Pickup Deals');
				}
				else{
					$(".favourite_label1").removeClass('active');
					$(".favourite_label1").attr("title",'Add to Pickup Deals');
				}
				
				$(".favourite_label").click(function(){
					var log = $("#login_id").val();
					if (log == '') {
						window.location.href = "<?php echo base_url(); ?>login";
					}
					var val = $(".favourite_label1").hasClass('active');
					
					if (val == false) {
						$.ajax({
						type: "POST",
						url: "<?php echo base_url();?>description_view/add_favourite",
						data: {
							ad_id: $("#ad_id").val(), 
							login_id: $("#login_id").val()
						},
						
						success: function (data) {
							$(".favourite_label1").addClass('active');
							$(".favourite_label1").attr("title",'Remove from Pickup Deals');
						}
					})
						
					}
					else{
						
						$.ajax({
						type: "POST",
						url: "<?php echo base_url();?>description_view/remove_favourite",
						data: {
							ad_id: $("#ad_id").val(), 
							login_id: $("#login_id").val()
						},
						
						success: function (data) {
							$(".favourite_label1").removeClass('active');
							$(".favourite_label1").attr("title",'Add to Pickup Deals');
						}
					})
						
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
					var log = $("#login_id").val();
					if (log == '') {
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
							
							success: function (data) {
								$(".likes_count").html(data);
								$('.bg_clr1').attr('title', 'Dislike Deal');
							}
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
						
						success: function (data) {
							$(".likes_count").html(data);
							$('.bg_clr1').attr('title', 'Like Deal');
						}
					})
						$(this).css('color', '#727272');
					}
					
				});
			});
		</script>
		
		<script type="text/javascript">
			$(function(){
				
				var ads_likes = <?php echo count($ads_likes); ?>;
				if (ads_likes > 0) {
					$('.bg_clr1').css('color', '#E24A14');
					$('.bg_clr1').attr('title', 'Dislike Deal');
				}
				else{
					$('.bg_clr1').css('color', '#727272');
					$('.bg_clr1').attr('title', 'Like Deal');
				}
			});
		</script>
		
	</head>
	
	<body id="home">
		
		<!--Preloader-->
		<div class="preloader">
			<div class="status">&nbsp;</div>
		</div> 
			   
		<!-- Start Entire Wrap-->
		<div id="layout">
			
			<!-- xxx tophead Content xxx -->
			<?php echo $this->load->view('common/tophead'); ?> 
			<!-- xxx End tophead xxx -->
			
			<!-- Inner Page Content Start-->
			<div class="section-title-01">
				<div class="bg_parallax image_01_parallax"></div>
			</div>
			
			<section class="content-central">
				<div class="semiboxshadow text-center">
					<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
				</div>
				<?php 
					/* ad video details */
					if ($ad_video != '0') {
						$video_name = explode("https://www.youtube.com/watch?v=",$ad_video->video_name);
					}
					/*if (isset($ad_video->video_name)) {
						if ($ad_video->video_name != '') {
					$video_name = explode("https://www.youtube.com/watch?v=",$ad_video->video_name);
					}
					else{
						$video_name = 	'';
					}
					};*/
					
					foreach ($ads_desc as $ads_desc_val) {
						$qry = mysql_query("select ad_id,COUNT(*) AS no_ratings, SUM(rating) AS rating_sum FROM review_rating WHERE ad_id = '$ads_desc_val->ad_id' AND status = 1 GROUP BY ad_id");
					 	if (mysql_num_rows($qry) > 0) {
					 		$no_ratings = mysql_result($qry,0,'no_ratings');
					 		$rating_sum = mysql_result($qry,0,'rating_sum');
					 	}
					 	else{
					 		$no_ratings = 0;
					 		$rating_sum = 0;
					 	}
					 	if ($no_ratings != 0) {
					 		$avg_per = ($rating_sum/($no_ratings*5))*100;
					 		$total_rating = round(($avg_per/100)*5);
					 	}
					 	else{
					 		$total_rating = 0;
					 	}	
						
						$catid = $ads_desc_val->category_id;
						$ad_id_no = $ads_desc_val->adid;
						$isbustype = $ads_desc_val->ad_type;
						/*like count*/
						$likes_count = $ads_desc_val->likes_count;
						
						$package_type = $ads_desc_val->package_type;
						$urgent_pack = $ads_desc_val->urg;
						/*currency symbol*/ 
							if ($ads_desc_val->currency == 'pound') {
								$currency = '<span class="pound_sym"></span>';
							}
							else if ($ads_desc_val->currency == 'euro') {
								$currency = '<span class="euro_sym"></span>';
							}
						$tag = $ads_desc_val->deal_tag;
						$desc = $ads_desc_val->deal_desc;
							$name = @mysql_result(mysql_query("SELECT first_name FROM login WHERE login_id = (SELECT login_id FROM postad WHERE ad_id = '$ads_desc_val->adid')"), 0, 'first_name');
							$mobile = @mysql_result(mysql_query("SELECT mobile FROM login WHERE login_id = (SELECT login_id FROM postad WHERE ad_id = '$ads_desc_val->adid')"), 0, 'mobile');
							$posted_on = date("M d, Y H:i:s", strtotime($ads_desc_val->created_on));
							$dealid = $ads_desc_val->ad_prefix.$ads_desc_val->adid;
							if ($catid !='1') {
							$price = $currency.number_format($ads_desc_val->price);
							$ptype = $ads_desc_val->price_type;
							}
							
					
						if ($ads_desc_val->web_link != '') {
							$web_url = $ads_desc_val->web_link;
						}
						else{
							$web_url = '';
						}
					
					}
					 ?>
				
				<div class="content_info">
					<div class="paddings-mini">
						<div class="container pad_bott_50">
							<div class="row">
								<div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-1 col-sm-offset-1 desc_top_img">
									<img src="http://99rightdeals.com/img/adds/c_top.jpg" alt="add" title="Adds">
								</div>
							</div>
						</div>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<a href="javascript:window.history.go(-2);"><i class="fa fa-mail-reply-all fa-2x"></i></a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-9 col-sm-12 single-blog">
									<div class="post-item">
										<div class="row">
											<div class="col-md-9 col-sm-9 col-xs-12">
												<?php if ($urgent_pack != '') { ?>
												<div class="featured_badge_view">
												</div>
												<?php	} ?>
												<div class="post-header">
													<?php if ($package_type == 3 || $package_type == 6) { ?>
													<div class="hidden-xs post-format-icon post-format-standard">
														<img src="<?php echo base_url(); ?>img/icons/crown.png" alt="Crown" title="Best Deal">
													</div>
													<?php	} ?>
													<?php if ($package_type == 2 || $package_type == 5) { ?>
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
																<!-- <li>
																	<?php if ($total_rating == 0) { ?>
																		<ul class="starts">
																			<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
																		</ul>
																	<?php } ?>
																	<?php if ($total_rating == 1) { ?>
																		<ul class="starts">
																			<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
																		</ul>
																	<?php } ?>
																	<?php if ($total_rating == 2) { ?>
																		<ul class="starts">
																			<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
																		</ul>
																	<?php } ?>
																	<?php if ($total_rating == 3) { ?>
																		<ul class="starts">
																			<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
																		</ul>
																	<?php } ?>
																	<?php if ($total_rating == 4) { ?>
																		<ul class="starts">
																			<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star-o"></i></a></li>
																		</ul>
																	<?php } ?>
																	<?php if ($total_rating == 5) { ?>
																		<ul class="starts">
																			<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
																			<li><a href="javascript:void(0);"><i class="fa fa-star"></i></a></li>
																		</ul>
																	<?php } ?>
																</li> -->
															</ul>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-3 col-sm-3 col-xs-12  post-header1">
												<div class="add-to-compare-list pull-left">
													<input type="hidden" name="ad_id" id="ad_id" value="<?php echo $ad_id_no; ?>" />
													<input type="hidden" name="login_id" id="login_id" value="<?php echo @$login; ?>" />
													<a href="javascript:void(0);" class="favourite_label">
													<span class="favourite_label1" title="Add to Pickup Deals"></span>
													</a>
												</div>
												<div class="pull-right">
													<i class="fa fa-thumbs-o-up fa-2x like_symbol_size bg_clr1" title="Like Ad" ></i> <span class="likes_count" ><?php echo $total_likes; ?></span>
												</div>
											</div>
											
											<div class="col-sm-12 col-xs-12">
												<div id='ninja-slider'>
											        <div>
											            <div class="slider-inner">
											                <ul>
											                    <li><a class="ns-img" href="<?php echo base_url(); ?>img/featured/cars.jpg"></a></li>
											                </ul>
											                <div class="fs-icon" title="Expand/Close"></div>
											            </div>
											            <div id="thumbnail-slider">
											                <div class="inner">
											                    <ul>
											                        <li>
											                            <a class="thumb" href="<?php echo base_url(); ?>img/featured/cars.jpg"></a>
											                        </li>
											                    </ul>
											                </div>
											            </div>
											        </div>
											    </div>
											</div>
											
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
															<p><?php echo $desc; ?></p>
															<br>
															<p>
															
															<div class="row">
																<?php
																	if (!empty($body_content)) {
																	$body_content1 = array_chunk($body_content, 2, true);
																	 foreach ($body_content1 as $val) {
																		foreach ($val as $k => $value) { ?>
																<div class="col-sm-6 view_page_table">
																	<table class="table">
																		<tbody>
																			<tr>
																				<th><?php echo $k; ?></th>
																				<td style="word-break: break-all;"><?php echo $value; ?></td>
																			</tr>
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
																<iframe src = "https://maps.google.com/maps?q=<?php echo $ads_loc->latt; ?>,<?php echo $ads_loc->longg; ?>&hl=es;z=11&amp;output=embed" width="500px" height="500px"></iframe>
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
											
											<div class="col-sm-12 col-xs-12">
												<div class="post-footer">
													<ul class="post-social tooltip-hover">
														<li>
															<a href="javascript:void(0);" class="social-facebook fb_share" data-toggle="tooltip" title="" data-original-title="Share on Facebook">
																<i class="fa fa-facebook"></i>
																<i class="fa fa-facebook facebook"></i>
															</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="social-twitter twitter_share" data-toggle="tooltip" title="" data-original-title="Share on Twitter">
																<i class="fa fa-twitter"></i>
																<i class="fa fa-twitter twitter"></i>
															</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="social-google-plus gmail_share" data-toggle="tooltip" title="" data-original-title="Share on Google">
																<i class="fa fa-google-plus"></i>
																<i class="fa fa-google-plus google-plus"></i>
															</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="social-pinterest pin_share" data-toggle="tooltip" title="" data-original-title="Share on pinterest">
																<i class="fa fa-pinterest"></i>
																<i class="fa fa-pinterest pinterest"></i>
															</a>
														</li>
														<li>
															<a href="javascript:void(0);" class="social-linkedin linkdin_share" data-toggle="tooltip" title="" data-original-title="Share on linkedin">
																<i class="fa fa-linkedin"></i>
																<i class="fa fa-linkedin linkedin"></i>
															</a>
														</li>
														<?php if ($package_type != 1 && $package_type != 4) { ?>
															<li>
																<a href="<?php echo "http://".$web_url; ?>" target="_blank" class="social-globe">
																	<i class="">Weblink</i>
																	<i class="whit_e"> Weblink</i>
																</a>
															</li>
														<?php } ?>
														
													</ul>
												</div>
											</div>
										</div>
									</div>
									
									<?php echo $this->view("classified_layout/success_error"); ?>
									<a class="review_show btn_v btn-4 btn-4a fa fa-arrow-right" style="padding: 10px 41px 12px 18px;"><span>Write a Review</span></a>
									
									<style type="text/css">
										.error{
											color: red !important;
										}
									</style>
									
									<script>
										$(function() {
										
											$("#rating_form").validate({
											
												rules: {
													review_title: {
														required: true,
														minlength: 5,
														maxlength: 25
													},
													review_msg: {
														required: true,
														minlength: 12,
														maxlength: 60
													},
													review_name: {
														required: true,
														minlength: 3
													},
													user_rating: {
														required: true
													}
												},
											
												messages: {
													review_title: {
														required: "Please Enter review title",
														minlength: "Title contains atleast 5 characters",
														maxlength: "Title contains maximum 25 characters Only"
													},
													review_msg: {
														required: "Please Enter review message",
														minlength: "review contains atleast 12 characters",
														maxlength: "review contains maximum 60 characters Only"
													},
													review_name: {
														required: "Please Enter Name",
														minlength: "Name contains atleast 3 characters"
													},
													user_rating: {
														required: "Please give review"
													}
												},
											
												submitHandler: function(form) {
													return true;
												}
											});
										
											$("#send_now_desc").validate({
											
												rules: {
													fbkcontname: {
														required: true,
														minlength: 3
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
														required: true,
														minlength:11
													}
												},
											
												messages: {
													fbkcontname: {
														required: "Please Enter contact name",
														minlength: "Enter atleast 3 characters"
													},
													feedbackmsg: {
														required: "Please Enter Your Message",
														minlength: "message contains atleast 60 characters"
													},
													busemail: {
														required: "Please Enter valid mail id"
													},
													feedbackno: {
														required: "Please Enter Mobile Number",
														minlength: "Enter 11 digit Mobile Number"
													}
												},
											
												submitHandler: function(form) {
													return true;
												}
											});
										
											$("#reportforads").validate({
											
												rules: {
													reportmsg: {
														required: true,
														minlength: 60
													}
												},
											
												messages: {
													reportmsg: {
														required: "Please Enter feedback message",
														minlength: "message contains atleast 60 characters"
													}
												},
												
												submitHandler: function(form) {
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
								<div class="col-md-3 col-sm-5 col-xs-12">
									<aside class="widget view_sidebar text_center">
										<?php if ($isbustype == 'business') { 
											if ($busimg != '') { ?>
										<img src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $busimg; ?>" alt="<?php echo $busimg; ?>" class="img-responsive business_logo_height">
										<hr>
										<?php }
											else{ ?>
										<img src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt="trader" class="img-responsive business_logo_height">
										<hr>
										<?php }
											?>
										<?php } ?>
										<img src="<?php echo base_url(); ?>img/icons/user_pro.png" alt="user_pro" title="user_pro" class="img-responsive pvt-no-img1">
										<h3> <?php echo $name; ?></h3>
										<hr>
										<h4 class="loc_view"><i class="fa fa-map-marker "></i> <i><?php 
											echo $city_name = $ads_loc->town.",".$ads_loc->county;
											?></i></h4>
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
										<a class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right"><span>Send Message</span></a>
									</div>
									<!-- feedback message alert -->
									<?php //if($this->session->flashdata("feedbackmsg") != ""){ ?>
									<!-- <div class="alert">
									    <h3 style='color: red;'>
									        <?php echo $this->session->flashdata("feedbackmsg");?>
									    </h3>
									</div> -->
									<?php //} ?>
									<form action="<?php echo base_url(); ?>description_view/feedbackforads" method="post" class="j-forms tooltip-hover" id="send_now_desc">
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
														<input type="text" id="feedbackno" name="feedbackno" maxlength='11' onkeypress="return isNumber(event)" placeholder="Enter Your Mobile Number ">
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
														<textarea type="text" id="feedbackmsg" name="feedbackmsg" placeholder="Enter Your Message"></textarea>
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
											<?php  if(($package_type == '3' || $package_type == '6') && $ad_video != '0'){
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
										<p class="text_center imp">To learn more, visit the <a href="<?php echo base_url(); ?>safety-tips" class="imp"><strong>Click Here</strong></a> to report this listing.</p>
									</aside>
								</div>
							</div>
						</div>
						
						<div class="container top_20">
							<div class="titles recen_ad">
								<h2><span>RECOMMENDED </span>DEALS</h2>
							</div>
						</div>
						
						<div class="container">
							<div class="row">
								<div class="col-sm-3">
									<img src="<?php echo base_url(); ?>img/recommended.jpg" alt="recommended" title="RECOMMENDED Deals" class="des_rec_heig img-responsive">
								</div>
								<div class="col-sm-9">
									<div id="boxes-carousel">
										<!-- Item carousel Boxed-->
										<?php foreach ($recommanded_ads as $b_ads) {
											/*currency symbol*/ 
										if ($b_ads->currency == 'pound') {
											$currency = '<span class="pound_sym"></span>';
										}
										else if ($b_ads->currency == 'euro') {
											$currency = '<span class="euro_sym"></span>';
										}	
											?>
										<div>
											<?php if ($b_ads->urg != '') { ?>
											<div class="bus_rec_badge">
											</div>
											<?php } ?>
											<div class="img-hover related_ads">
												<img src="<?php echo base_url(); ?>pictures/<?php echo $b_ads->img_name; ?>" alt="<?php echo $b_ads->img_name; ?>" title="business-image1" class="img-responsive">
												<div class="overlay"><a href="<?php echo base_url(); ?>description_view/details/<?php echo $b_ads->ad_id; ?>" ><i class="fa fa-link"></i></a></div>
											</div>
											<div class="info-gallery recommanded">
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
												<?php if ($b_ads->package_type == '3' || $b_ads->package_type == '6') { ?>
												<div class="business_crown">
													<span></span><b>
													<img src="<?php echo base_url(); ?>img/icons/crown.png" class="pull-right" alt="Crown" title="Best Deal"></b>
												</div>
												<?php	 } ?>
												<?php if ($b_ads->package_type == '2' || $b_ads->package_type == '5') { ?>
												<div class="business_crown">
													<span></span><b>
													<img src="<?php echo base_url(); ?>img/icons/thumb.png" class="pull-right" alt="Thumb" title="Right Deal"></b>
												</div>
												<?php	 } ?>
												
												<?php if ($b_ads->category_id != '1') { ?>
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
									</div>
								</div>
							</div>
						</div>
						
						<div class="container">
							<div class="row">
								<div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-1 col-sm-offset-1 desc_bot_img">
									<img src="http://99rightdeals.com/img/adds/c_top.jpg" alt="add" title="Adds">
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Inner Page Content End-->
			
			<!-- xxx footer Content xxx -->
			<?php echo $this->load->view('common/footer');?> 
			<!-- xxx footer End xxx -->
			
		</div>
		<!-- End Entire Wrap -->
		
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

		<script type="text/javascript">
			$(function(){
				/*facebook share*/
				$(".fb_share").click(function(){
					   window.open('http://www.facebook.com/share.php?u=<?php echo $req_url; ?>/&title=Deal Description', "Deal Description", '_blank', "width=400, height=400");
				});
				/*twitter_share share*/
				$(".twitter_share").click(function(){
					   window.open('http://twitter.com/home?status=Deal Description+<?php echo $req_url; ?>', "Deal Description", '_blank', "width=400, height=400");
				});
				/*gmail_share share*/
				$(".gmail_share").click(function(){
					   window.open('https://plus.google.com/share?url=<?php echo $req_url; ?>', "Deal Description", '_blank', "width=400, height=400");
				});
				/*pin_share share*/
				$(".pin_share").click(function(){
					   window.open('http://pinterest.com/pin/create/bookmarklet/?media=http://99rightdeals.com/img/99rightdeal.png&amp;url=<?php echo $req_url; ?>&amp;is_video=false&amp;description=Deal Description', "Deal Description", '_blank', "width=400, height=400");
				});
				/*linkdin_share share*/
				$(".linkdin_share").click(function(){
					   window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $req_url; ?>&amp;title=[Deal Description]&amp;source=[SOURCE/DOMAIN]', "Deal Description", '_blank', "width=400, height=400");
				});
			});
		</script>
		
		<!-- xxx footerscript Content xxx -->
		<?php echo $this->load->view('common/footerscript');?> 
		<!-- xxx footerscript End xxx -->
			
	</body>
</html>
