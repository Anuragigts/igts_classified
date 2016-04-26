<!DOCTYPE html>
<html>
	<head>
		
		<title>My Wishes | 99 Right Deals</title>
		
		<!-- xxx Head Content xxx -->
		<?php echo $this->load->view('common/head');?> 
		<!-- xxx End xxx -->
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
		
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
				<!-- Shadow Semiboxed -->
				<div class="semiboxshadow text-center">
					<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
				</div>
				<div class="content_info">
					<div class="paddings">
						<div class="container">
							<div class="row">
								<!-- Item Table-->
								<div class="col-sm-3">
									<div class="item-table">
										<div class="header-table color-red">
											<img src="<?php echo base_url(); ?>img/icons/user_pro.png" alt="user_pro" title="Profile" class="img-responsive pvt-no-img">
											<h2><?php echo @$log_name; ?></h2> 
										</div>
										<ul class="dashboard_tag">
											<a href='<?php echo base_url(); ?>deals-status'>
												<li><img src="<?php echo base_url(); ?>img/icons/status.png" alt="status" title="Deals">Deals Status</li>
											</a>
											<a href='<?php echo base_url(); ?>deals-administrator'>
												<li><img src="<?php echo base_url(); ?>img/icons/admin.png" alt="admin" title="Admin">Deals Administrator</li>
											</a>
											<a href='<?php echo base_url(); ?>pickup-deals'>
												<li><img src="<?php echo base_url(); ?>img/icons/pickup.png" alt="pickup" title="Pickup">Pickup deals</li>
											</a>
											<a href='<?php echo base_url(); ?>reserved_searches'>
												<li><img src="<?php echo base_url(); ?>img/icons/seaked.png" alt="favourites" title="Favourites">My Wishes</li>
											</a>
											<a href='<?php echo base_url(); ?>update-profile'>
												<li><img src="<?php echo base_url(); ?>img/icons/updateprofile.png" alt="Update Profile" title="<?php echo base_url(); ?>updateprofile image"> Update Profile</li>
											</a>
										</ul>
										<a class="btn color-red" href="<?php echo base_url(); ?>login/logout">Logout</a>
									</div>
								</div>
								<!-- End Item Table-->
								<form id="j-forms" action="#" class="j-forms" method="post">
									<!-- Item Table-->
									<div class="col-sm-9">
										<div class="row">
											<div class="col-sm-12">
												<h2>My Wishes</h2>
												<label>Hi <?php echo @$log_name; ?>, you have <?php echo $search_count; ?> my wishes</label>
												<hr>
												<!-- start cloned right side buttons element -->
												<?php
												 foreach ($search_list as $search_listval) {
													if ($search_listval->search_cat != 'all') {
														$scat = @mysql_result(mysql_query("SELECT category_name FROM `catergory` WHERE category_id = '$search_listval->search_cat' "), 0, 'category_name');
													}
													else{
														$scat = 'All';
													}
												 ?>
													<div id="div1" class="<?php echo "del".$search_listval->id.$search_listval->login_id; ?>">
														<div class="row">
																<div class="col-sm-10">
																	<h5>
																		<?php if ($search_listval->search_title != '') { ?>
																			<a href="<?php echo $search_listval->save_search; ?>" target="_blank"><?php echo $search_listval->search_title; ?></a> in
																		<?php } ?>
																	<a href="<?php echo $search_listval->save_search; ?>" target="_blank"><?php echo $scat." categories"; ?></a>
																	</h5>
																	<p>
																		<?php if ($search_listval->search_loc != '') { ?>
																		<img src="<?php echo base_url(); ?>img/icons/location_map.png" class="my_wishes" alt="map" class="map_icon"> 
																		<?php 
																		echo $search_listval->search_loc;
																		}  ?>
																	</p>
																</div>
																<div class="col-sm-2">
																	<div class="my_wish_delete">
																		<a href="javascript:void(0);" id="<?php echo $search_listval->id.",".$search_listval->login_id; ?>"  class="delete-bg"> Delete</a>
																	</div>
																</div>
														</div><hr class="separator">
													</div>
												<?php } ?>
											</div>
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
		
		<script src="<?php echo base_url(); ?>js/jquery.js"></script> 
		<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>
		
		<script type="text/javascript">
			$(function(){
				$(".delete-bg").click(function(){
					var id = $(this).attr('id');
					var id1 = id.split(',');
						$.ajax({
							type: "POST",
							url: "<?php echo base_url();?>searchview/deletesave_search",
							data: {
								s_id: id1[0], 
								login_id: id1[1]
							},
							success: function (data) {
									$("div .del"+id1[0]+id1[1]).remove();
							}
						});
				});
			});
		</script>
		
		<!-- xxx footerscript Content xxx -->
		<?php echo $this->load->view('common/footerscript');?> 
		<!-- xxx footerscript End xxx -->
			
	</body>
</html>
