	<title>365 Deals :: Motor_car_search</title>
	
	<style>
		.section-title-01{
			height: 273px;
			background-color: #262626;
			text-align: center;
			position: relative;
			width: 100%;
			overflow: hidden;
		}
		.checkbox{
			color:#fff !important;
		}
	</style>
	<script>
			!function ($) {
			
			// Le left-menu sign
			/* for older jquery version
			$('#left ul.nav li.parent > a > span.sign').click(function () {
				$(this).find('i:first').toggleClass("icon-minus");
			}); */
			
			$(document).on("click","#left ul.nav li.parent > a > span.sign", function(){          
				$(this).find('i:first').toggleClass("fa-minus");      
			}); 
			
			// Open Le current menu
			$("#left ul.nav li.parent.active > a > span.sign").find('i:first').addClass("fa-minus");
			$("#left ul.nav li.current").parents('ul.children').addClass("in");

		}(window.jQuery);
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
			<img src="img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
		</div>
		<form id="j-forms" action="#" class="j-forms" method="post" style="background-color: rgb(255, 255, 255) !important;">
		<div class="content_info">
			<div class="paddings">
				<div class="container">
					<div class="row">
						<!-- Item Table-->
						<div class="col-sm-3">
							<div class="container-by-widget-filter bg-dark color-white">
								<!-- Widget Filter -->
								<aside class="widget">
									<h3 class="title-widget">Cars Filter</h3>
									<div id="left">
										
										<ul class="nav menu" >  
											<li id="filter_4" class="item-8 deeper parent">
												<a class="" href="#">
													<span data-toggle="collapse" data-parent="#filter_4" href="#filter_sub_4" class="sign"><i class="fa fa-plus"></i></span>
													<span class="lbl">Body Type</span>                      
												</a>
												<ul class="children nav-child unstyled small collapse filt_bor" id="filter_sub_4" >
													<li class="item-9 deeper parent ver_scoler">
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> All 
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> 2 Door Saloon
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> 4 Door Saloon
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Saloon
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Convertible
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Coupe 
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Estate
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> 3 Door Hatchback
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> 5 Door Hatchback 
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Sports
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Light 4x4 Utility
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> MPV
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Others
														</label>
													</li>
												</ul>
											</li>
										</ul>
										<ul class="nav menu top_10">  
											<li id="filter_1" class="item-8 deeper parent">
												<a class="" href="#">
													<span data-toggle="collapse" data-parent="#filter_1" href="#filter_sub_1" class="sign"><i class="fa fa-plus"></i></span>
													<span class="lbl">Fuel type</span>                      
												</a>
												<ul class="children nav-child unstyled small collapse filt_bor" id="filter_sub_1">
													<li class="deeper parent">
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i>Petrol
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Diesel
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Other
														</label>
													</li>
												</ul>
											</li>
										</ul> 
										<ul  class="nav menu top_10">  
											<li id="filter_2" class="item-8 deeper parent">
												<a class="" href="#">
													<span data-toggle="collapse" data-parent="#filter_2" href="#filter_sub_2" class="sign"><i class="fa fa-plus"></i></span>
													<span class="lbl">Mileage</span>                      
												</a>
												<ul class="children nav-child unstyled small collapse filt_bor" id="filter_sub_2">
													<li class="item-9 deeper parent">
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> All 
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Up to 15,000 miles 
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Up to 30,000 miles
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Up to 60,000 miles
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Up to 80,000 miles
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Over 80,000 miles
														</label>
													</li>
												</ul>
											</li>
										</ul>
										<ul  class="nav menu top_10">  
											<li id="filter_3" class="item-8 deeper parent">
												<a class="" href="#">
													<span data-toggle="collapse" data-parent="#filter_3" href="#filter_sub_3" class="sign"><i class="fa fa-plus"></i></span>
													<span class="lbl">Seller Type</span>                      
												</a>
												<ul class="children nav-child unstyled small collapse filt_bor" id="filter_sub_3">
													<li class="item-9 deeper parent">
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> All 
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Trade
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Private
														</label>
													</li>
												</ul>
											</li>
										</ul>
										
										<ul  class="nav menu top_10">  
											<li id="filter_5" class="item-8 deeper parent">
												<a class="" href="#">
													<span data-toggle="collapse" data-parent="#filter_5" href="#filter_sub_5" class="sign"><i class="fa fa-plus"></i></span>
													<span class="lbl">Transmission</span>                      
												</a>
												<ul class="children nav-child unstyled small collapse filt_bor" id="filter_sub_5">
													<li class="item-9 deeper parent">
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Any 
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Manual
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Automatic
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Others
														</label>
													</li>
												</ul>
											</li>
										</ul>
										<ul  class="nav menu top_10">  
											<li id="filter_6" class="item-8 deeper parent">
												<a class="" href="#">
													<span data-toggle="collapse" data-parent="#filter_6" href="#filter_sub_6" class="sign"><i class="fa fa-plus"></i></span>
													<span class="lbl">Engine Size</span>                      
												</a>
												<ul class="children nav-child unstyled small collapse filt_bor" id="filter_sub_6">
													<li class="item-9 deeper parent ver_scoler">
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Any
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Up to 999 cc 
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> 1,000 - 1,999 cc
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> 2,000 - 2,999 cc
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> 3,000 - 3,999 cc
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> 4,000 - 4,999 cc
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Over 4,999 cc
														</label>
													</li>
												</ul>
											</li>
										</ul>
										<ul  class="nav menu top_10">  
											<li id="filter_7" class="item-8 deeper parent">
												<a class="" href="#">
													<span data-toggle="collapse" data-parent="#filter_7" href="#filter_sub_7" class="sign"><i class="fa fa-plus"></i></span>
													<span class="lbl">Search Only</span>                      
												</a>
												<ul class="children nav-child unstyled small collapse filt_bor" id="filter_sub_7">
													<li class="item-9 deeper parent">
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Urgent Deals 
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Feature Deals
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Deals With Pictures
														</label>
														<label class="checkbox">
															<input type="checkbox" name="" value="" >
															<i></i> Others
														</label>
													</li>
												</ul>
											</li>
										</ul>
									</div>
								</aside>
								<!-- Widget Filter -->
							</div>
						</div>
						<!-- End Item Table-->

						<!-- Item Table-->
						<div class="col-md-9">
							<!-- sort-by-container-->
							<div class="sort-by-container tooltip-hover">
								<div class="row">
									<div class="col-md-9">
										<strong>Sort by:</strong>
										<ul>                            
											<li>
												<div class="selector">
													<select>
														<option value="5">5 Starts</option>
														<option value="4">4 Starts</option>
														<option value="3">3 Starts</option>
														<option value="2">2 Starts</option>
														<option value="1">1 Starts</option>
													</select>
													<span class="custom-select">Users Rating</span>
												</div>
											</li>
											<li>
												<div class="selector">
													<select>
														<option value="1">Sort Ascending</option>
														<option value="2">Sort Descending</option>
													</select>
													<span class="custom-select">Product</span>
												</div>
											</li>                            
										</ul>
									</div>
									<div class="col-md-3">
										<ul class="style-view">
											<li data-toggle="tooltip" title="" data-original-title="BOX VIEW">
												<a href="searchview">
													<i class="fa fa-th-large"></i>
												</a>
											</li>
											<li data-toggle="tooltip" title="" data-original-title="LIST VIEW" class="active">
												<a href="searchview">
													<i class="fa fa-list"></i>
												</a>
											</li> 
										</ul>
									</div>
								</div>
							</div>
							<!-- sort-by-container-->

							<div class="row list_view_searches">
								
								<!-- Item Gallery List View-->
								<div class="col-md-12">
									<div class="first_list">
										<div class="row">
											<div class="col-sm-4 view_img">
												<div class="featured-badge">
													<span>Urgent</span>
												</div>
												<div class="img-hover">
													<img src="img/hotel-img/1.jpg" alt="img_1" title="img_1" class="img-responsive">
													<div class="overlay"><a href="description_view"><i class="top_20 fa fa-link"></i></a></div>
												</div>
											</div>
											<div class="col-sm-8 middle_text">
												<div class="row">
													<div class="col-sm-8">
														<div class="row">
															<div class="col-xs-12">
																<h3 class="list_title">Sample text Here</h3>
															</div>
															<!--div class="col-xs-4 ">
																<div class="add-to-compare-list pull-right">
																	<span class="compared-category"></span>
																</div>
															</div-->
														</div>
														<div class="row">
															<div class="col-xs-4">
																<ul class="starts">
																	<li><a href="#"><i class="fa fa-star"></i></a></li>
																	<li><a href="#"><i class="fa fa-star"></i></a></li>
																	<li><a href="#"><i class="fa fa-star"></i></a></li>
																	<li><a href="#"><i class="fa fa-star"></i></a></li>
																	<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
																</ul>
															</div>
															<div class="col-xs-8">
																<div class="location pull-right ">
																	<i class="fa fa-map-marker "></i> 
																	<a href="" class="location"> Location</a> ,<a href="" class="location">Place</a>
																</div>
															</div>
														</div>
													</div>
													
													<div class="col-xs-4 serch_bus_logo">
														<img src="img/brand/intel.png" alt="intel" title="intel" class="img-responsive">
													</div>
												</div>
												<hr class="separator">
												<div class="row">
													<div class="col-xs-8">
														<div class="row">
															<div class="col-xs-12">
																<p class="">The Holiday Inn Bilbao is in a prime location next to the Basilica of  and the </p>
															</div>
															<div class="col-xs-12">
																<a href="description_view" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
															</div>
														</div>
													</div>
													<div class="col-xs-4">
														<div class="row">
															<div class="col-xs-8 col-xs-offset-1 amt_bg">
																<h3 style="color:white;margin-top:5px;">£1106</h3>
															</div>
															<div class="col-xs-12">
																<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Now</span></a>
															</div>
														</div>
														
													</div>
												</div>
											</div>
										</div><!-- End Row-->
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="post-meta list_view_bottom" >
												<ul>
													<li><i class="fa fa-user"></i><a href="#">Person Name</a></li>
													<li><i class="fa fa-clock-o"></i><span>April 23, 2015</span></li>
													<li><i class="fa fa-eye"></i><span>234 Views</span></li>
													<li><span>Deal ID : 112457856</span></li>
													<li><i class="fa fa-comments"></i><a href="#" title="Comment on Post Format: Standard">Leave a comment</a></li>
													<li><i class="fa fa-star"></i><span><a href="#">Saved</a></span></li>
													<li><i class="fa fa-edit"></i></li>
													<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
												</ul>                      
											</div>
										</div>
									</div><hr class="separator">	
									<!-- End Item Gallery List View-->
								</div>
								
								<div class="col-md-12">
									<div class="first_list">
										<div class="row">
											<div class="col-sm-4 view_img">
												<div class="featured-badge">
													<span>Urgent</span>
												</div>
												<div class="img-hover">
													<img src="img/hotel-img/1.jpg" alt="img_1" title="img_1" class="img-responsive">
													<div class="overlay"><a href="description_view"><i class="top_20 fa fa-link"></i></a></div>
												</div>
											</div>
											<div class="col-sm-8 middle_text">
												<div class="row">
													<div class="col-sm-8">
														<div class="row">
															<div class="col-xs-12">
																<h3 class="list_title">Sample text Here</h3>
															</div>
															<!--div class="col-xs-4 ">
																<div class="add-to-compare-list pull-right">
																	<span class="compared-category"></span>
																</div>
															</div-->
														</div>
														<div class="row">
															<div class="col-xs-4">
																<ul class="starts">
																	<li><a href="#"><i class="fa fa-star"></i></a></li>
																	<li><a href="#"><i class="fa fa-star"></i></a></li>
																	<li><a href="#"><i class="fa fa-star"></i></a></li>
																	<li><a href="#"><i class="fa fa-star"></i></a></li>
																	<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
																</ul>
															</div>
															<div class="col-xs-8">
																<div class="location pull-right ">
																	<i class="fa fa-map-marker "></i> 
																	<a href="" class="location"> Location</a> ,<a href="" class="location">Place</a>
																</div>
															</div>
														</div>
													</div>
													
													<div class="col-xs-4 serch_bus_logo">
														<img src="img/brand/intel.png" alt="intel" title="intel" class="img-responsive">
													</div>
												</div>
												<hr class="separator">
												<div class="row">
													<div class="col-xs-8">
														<div class="row">
															<div class="col-xs-12">
																<p class="">The Holiday Inn Bilbao is in a prime location next to the Basilica of  and the </p>
															</div>
															<div class="col-xs-12">
																<a href="description_view" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
															</div>
														</div>
													</div>
													<div class="col-xs-4">
														<div class="row">
															<div class="col-xs-8 col-xs-offset-1 amt_bg">
																<h3 style="color:white;margin-top:5px;">£1106</h3>
															</div>
															<div class="col-xs-12">
																<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Now</span></a>
															</div>
														</div>
														
													</div>
												</div>
											</div>
										</div><!-- End Row-->
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="post-meta list_view_bottom" >
												<ul>
													<li><i class="fa fa-user"></i><a href="#">Person Name</a></li>
													<li><i class="fa fa-clock-o"></i><span>April 23, 2015</span></li>
													<li><i class="fa fa-eye"></i><span>234 Views</span></li>
													<li><span>Deal ID : 112457856</span></li>
													<li><i class="fa fa-comments"></i><a href="#" title="Comment on Post Format: Standard">Leave a comment</a></li>
													<li><i class="fa fa-star"></i><span><a href="#">Saved</a></span></li>
													<li><i class="fa fa-edit"></i></li>
													<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
												</ul>                      
											</div>
										</div>
									</div><hr class="separator">	
									<!-- End Item Gallery List View-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</section>
	
	<!-- End Shadow Semiboxed -->
	<script src="js/jquery.js"></script> 
	
	<script>
		jssor_1_slider_init();
	</script>
	
	<script src="j-folder/js/jquery.maskedinput.min.js"></script>
	<script src="j-folder/js/jquery.validate.min.js"></script>
	<script src="j-folder/js/additional-methods.min.js"></script>
	<script src="j-folder/js/jquery.form.min.js"></script>
	<script src="j-folder/js/j-forms.min.js"></script>
	<script src="j-folder/js/jquery-cloneya.min.js"></script>
	
	
	
	<script type="text/javascript" src="libs/jquery.xuSlider.js"></script>
	<script>
		$('.xuSlider').xuSlider();
	</script>
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-36251023-1']);
	  _gaq.push(['_setDomainName', 'jqueryscript.net']);
	  _gaq.push(['_trackPageview']);

	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
	
	
	<script>
		$(document).ready(function(){
			// Range value slider
			$(function() {
				$( '#slider-2-h' ).slider({
					range: true,
					min: 0,
					max: 500,
					values: [ 75, 300 ],
					slide: function( event, ui ) {
						$( '#2-h' ).html( '$' + ui.values[ 0 ] + ' - $' + ui.values[ 1 ] );
					}
				});
				$( '#2-h' ).html('$' + $('#slider-2-h' ).slider( 'values', 0 ) +
					' - $' + $( '#slider-2-h' ).slider( 'values', 1 ) );
			});

		});
	</script>

        