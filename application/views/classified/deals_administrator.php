<!DOCTYPE html>
<html>
	<head>
		
		<title>Right Deals :: Deals Administrator</title>
		
		<!-- xxx Head Content xxx -->
		<?php echo $this->load->view('common/head');?> 
		<!-- xxx End xxx -->
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>libs/slider.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>js/jssor.slider.min.js"></script>
		
		<script type="text/javascript">
			$(function(){
				$(".loc_map").click(function(){
					var val = $(".loc_map").attr("id");
					var val1 = val.split(",");
					$(".map_show").html('<iframe src = "https://maps.google.com/maps?q='+val1[0]+','+val1[1]+'&hl=es;z=5&amp;output=embed" width="950px" height="300px"></iframe>');
				});
			});
		</script>
		<script type="text/javascript">
			$(function(){
				/*search ato z / A to Z*/
					$(".dealtitle_sort").change(function(){
						var dealtitle = $(".dealtitle_sort option:selected").val();
						var dealprice = $(".price_sort option:selected").val();
						$.ajax({
							type: "POST",
							url: "<?php echo base_url();?>deals_administrator/my_ads_search",
							data: {
								dealtitle: dealtitle,
								dealprice: dealprice
							},
							success: function (data) {
								$(".deals_search_result").html(data);
							}
						})
					});
				/*search price asc / desc*/
					$(".price_sort").change(function(){
						var dealprice = $(".price_sort option:selected").val();
						var dealtitle = $(".dealtitle_sort option:selected").val();
						$.ajax({
							type: "POST",
							url: "<?php echo base_url();?>deals_administrator/my_ads_search",
							data: {
								dealtitle: dealtitle,
								dealprice: dealprice
							},
							success: function (data) {
								$(".deals_search_result").html(data);
							}
						})
					});
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
				
				<div class="content_info">
					<div class="paddings">
						<div class="container">
							<div class="row">
								<div class="col-sm-3">
									<div class="item-table">
										<div class="header-table color-red">
											<img src="<?php echo base_url(); ?>img/icons/user_pro.png" alt="user_pro" title="Profile" class="img-responsive pvt-no-img">
											<h2><?php echo @$log_name; ?></h2> 
										</div>
										<ul class="dashboard_tag">
											<li><img src="<?php echo base_url(); ?>img/icons/status.png" alt="status" title="Deals"><a href='deals_status'>Deals Status</a></li>
											<li><img src="<?php echo base_url(); ?>img/icons/admin.png" alt="admin" title="Admin"><a href='deals_administrator'>Deals Administrator</a></li>
											<li><img src="<?php echo base_url(); ?>img/icons/pickup.png" alt="pickup" title="Pickup"><a href='pickup_deals'>Pickup deals</a></li>
											<li><img src="<?php echo base_url(); ?>img/icons/seaked.png" alt="favourites" title="Favourites"><a href='reserved_searches'>My Wishes</a></li>
											<li><img src="<?php echo base_url(); ?>img/icons/updateprofile.png" alt="Update Profile" title="updateprofile image"> <a href='update_profile'>Update Profile</a></li>
										</ul>
										<a class="btn color-red" href="<?php echo base_url(); ?>login/logout">Logout</a>
									</div>
								</div>
								<!-- End Item Table-->

								<form id="j-forms" action="#" class="j-forms" method="post">
									<!-- Item Table-->
									<div class="col-md-9">
										<div class="row">
											<div class="col-sm-12">
												<h2>Deals Administrator</h2>
												<label>Hi <?php echo $log_name; ?></label><hr>
											</div>
										</div>
										
										<!-- sort-by-container-->
										<div class="sort-by-container tooltip-hover">
											<div class="row">
												<div class="col-md-9">
													<strong>Sort by:</strong>
													<ul>                            
														<li class="deal_admin_top">
															<div class="top_bar_top">
																<label class="input select">
																	<select name="star">
																		<option value="none" selected disabled="">Stars</option>
																		<option value="5">5 Starts</option>
																		<option value="4">4 Starts</option>
																		<option value="3">3 Starts</option>
																		<option value="2">2 Starts</option>
																		<option value="1">1 Starts</option>
																	</select>
																	<i></i>
																</label>
															</div>
														</li>
														<li class="deal_admin_top">
															<div class="top_bar_top">
																<label class="input select">
																	<select name="dealtitle_sort" class="dealtitle_sort">
																		<option value="Any">Title</option>
																		<option value="atoz">A to Z</option>
																		<option value="ztoa">Z to A</option>
																	</select>
																	<i></i>
																</label>
															</div>
														</li>
														<li class="deal_admin_top">
															<div class="top_bar_top">
																<label class="input select">
																	<select name="price_sort" class="price_sort">
																		<option value="Any">Pricing</option>
																		<option value="lowtohigh">Low to High</option>
																		<option value="hightolow">High to Low</option>
																	</select>
																	<i></i>
																</label>
															</div>
														</li>
													</ul>
												</div>
												<div class="col-md-3">
													<ul class="style-view">
														<li data-toggle="tooltip" title="" data-original-title="BOX VIEW">
															<a href="deals_administrator_box">
																<i class="fa fa-th-large"></i>
															</a>
														</li>
														<li data-toggle="tooltip" title="" data-original-title="LIST VIEW" class="active">
															<a href="deals_administrator">
																<i class="fa fa-list"></i>
															</a>
														</li> 
													</ul>
												</div>
											</div>
										</div>
										<!-- sort-by-container-->
										<div class="row list_view_searches deals_search_result">
											<?php echo $this->load->view('classified/deals_administrator_search'); ?>
												<div class='text_center col-md-12'>
													<?php echo $paging_links; ?>
												</div>
										</div>
								</form>
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
		
		<!--MAP Modal -->
		<div class="modal fade" id="map_location" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<!-- <form action="#" method="post" class="j-forms " > -->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2>Map Location</h2>
						</div>
						<div class="modal-body map_show">
							
						</div>
					</div>
				<!-- </form> -->
			</div>
		</div>
		
		<!-- End Shadow Semiboxed -->
		<script src="<?php echo base_url(); ?>js/jquery.js"></script> 
		
		<script type="text/javascript" src="<?php echo base_url(); ?>libs/jquery.xuSlider.js"></script>
		
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

		<script src="http://maps.googleapis.com/maps/api/js"></script>

		<script>
			var myCenter=new google.maps.LatLng(55.8558347,-3.3274721000000227);

			function initialize()
			{
			var mapProp = {
			  center: myCenter,
			  zoom:5,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			  };

			var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

			var marker = new google.maps.Marker({
			  position: myCenter,
			  title:'Click to zoom'
			  });

			marker.setMap(map);

			// Zoom to 9 when clicking on marker
			google.maps.event.addListener(marker,'click',function() {
			  map.setZoom(9);
			  map.setCenter(marker.getPosition());
			  });
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
		
		<!-- xxx footerscript Content xxx -->
		<?php echo $this->load->view('common/footerscript');?> 
		<!-- xxx footerscript End xxx -->
			
	</body>
</html>
