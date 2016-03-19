	<title>Right Deals ::  Pick-up deals</title>
	<style>
		.section-title-01{
			height: 220px;
			background-color: #262626;
			text-align: center;
			position: relative;
			width: 100%;
			overflow: hidden;
		}
	</style>
	<link rel="stylesheet" href="<?php echo base_url(); ?>libs/slider.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jssor.slider.min.js"></script>
	
	<script type="text/javascript">
		$(function(){
			/*search ato z / A to Z*/
				$(".dealtitle_sort").change(function(){
					var dealtitle = $(".dealtitle_sort option:selected").val();
					var dealprice = $(".price_sort option:selected").val();
					$.ajax({
						type: "POST",
						url: "<?php echo base_url();?>pickup_deals/pickup_deals_search",
						data: {
							dealtitle: dealtitle,
							dealprice: dealprice
						},
						success: function (data) {
							$(".pickup_result").html(data);
						}
					})
				});
			/*search price asc / desc*/
				$(".price_sort").change(function(){
					var dealprice = $(".price_sort option:selected").val();
					var dealtitle = $(".dealtitle_sort option:selected").val();
					$.ajax({
						type: "POST",
						url: "<?php echo base_url();?>pickup_deals/pickup_deals_search",
						data: {
							dealtitle: dealtitle,
							dealprice: dealprice
						},
						success: function (data) {
							$(".pickup_result").html(data);
						}
					})
				});
		});
	</script>
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css">
	
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
						
						<form action="#" method="post" class="j-forms">
							<div class="col-sm-9 list-view">
								<div class="row">
									<div class="col-sm-12">
										<h2>Pickup deals</h2>
										<label>Hi <?php echo @$log_name; ?>, you have <?php echo count(@$pickup_deals); ?> Pickup deals</label><hr>
									</div>
								</div>
								
								<div class="sort-by-container tooltip-hover">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <strong>Sort by:</strong>
                                            <ul>                            
                                                <li>
													<div class="top_bar_top">
														<label class="input select">
															<select name="star">
																<option value="none" selected disabled="">Select Star</option>
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
												<li>
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
												<li>
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
                                    </div>
                                </div>
                               
								<div class="row list_view_searches pickup_result">
                                   <?php echo $this->load->view('classified/pickup_deals_search'); ?>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<div class="modal fade" id="map_location" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2>Map Location</h2>
				</div>
				<div class="modal-body map_show">
					
				</div>
			</div>
		</div>
	</div>
	
	<script src="http://maps.googleapis.com/maps/api/js"></script>

	<script>
		var myCenter=new google.maps.LatLng(51.508742,-0.120850);

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

		google.maps.event.addListener(marker,'click',function() {
		  map.setZoom(9);
		  map.setCenter(marker.getPosition());
		  });
			 
		google.maps.event.addListener(map,'center_changed',function() {
		 window.setTimeout(function() {
			map.panTo(marker.getPosition());
		  },3000);
		  });
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	
	<script src="<?php echo base_url(); ?>js/jquery.js"></script> 
	
	<script type="text/javascript" src="<?php echo base_url(); ?>libs/jquery.xuSlider.js"></script>
	
	<script>
		$('.xuSlider').xuSlider();
	</script>
	
	<script src="<?php echo base_url(); ?>js/jquery.nicescroll.js"></script> 

	<script src="<?php echo base_url(); ?>libs/jquery.mixitup.min.js"></script>
	<script src="<?php echo base_url(); ?>libs/main.js"></script>

	<script type="text/javascript">
		$(function(){
			$(".loc_map").click(function(){
				var val = $(".loc_map").attr("id");
				var val1 = val.split(",");
				$(".map_show").html('<iframe src = "https://maps.google.com/maps?q='+val1[0]+','+val1[1]+'&hl=es;z=5&amp;output=embed" width="950px" height="300px"></iframe>');
			});
		});
	</script>