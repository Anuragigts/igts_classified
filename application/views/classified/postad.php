<!DOCTYPE html>
<html>
	<head>
		
		<title>Post Free Classified Ads In UK | 99 Right Deals</title>
		
		<meta name="description" content="99 Right Deals gives an opportunity to post free classifieds ads for buying and selling wide range of products and services in United Kingdom." />
		<meta name="keywords" content="Post a Deal" />
		
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
				<div class="bg_parallax image_02_parallax"></div>
			</div>
			
			<section class="content-central">
				<div class="semiboxshadow text-center">
					<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
				</div>
				
				<div class="content_info">
					<div class="paddings-mini">
						<div class="container">
							<div class="row">
								<div class="col-md-10 col-md-offset-1 col-sm-12  col-xs-12  login_padd">
									<?php echo $this->view("classified_layout/success_error"); ?>
									<div class="titles">
										<h2>Post <span>YOUR </span>Deal</h2>
										<hr class="tall">
									</div>
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-4 col-sm-4 col-xs-12">
												<div class="hovereffect">
													<img class="img-responsive" src="<?php echo base_url(); ?>img/featured/deals.jpg" alt="hot deals uk" title="Hot Deals Category">
													<div class="overlay">
														<h2>Hot Deals</h2>
														<a class="info" href="hot-deals">View Details</a>
													</div>
												</div>
											</div>
											<div class="col-md-4 col-sm-4 col-xs-12 top_pad_10">
												<div class="hovereffect">
													<img class="img-responsive" src="<?php echo base_url(); ?>img/featured/ezone.jpg" alt="electronics in the uk " title="ezone Category">
													<div class="overlay">
														<h2>E-Zone</h2>
														<a class="info" href="#" data-toggle="modal" data-target="#Zone">View Details</a>
													</div>
												</div>
											</div>
											
											<div class="modal fade" id="Zone" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<form method='post' id='ezone_form' action="<?php echo base_url(); ?>postad_create_ezone">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h2>E-Zone Category
																	<input type='hidden' name='ezone_cat' id='ezone_cat' value='8' />
																	<input type='hidden' name='ezone_sub' id='ezone_sub' value='' />
																	<input type='hidden' name='ezone_sub_sub' id='ezone_sub_sub' value='' />
																	<input type='hidden' name='ezone_sub_sub_sub' id='ezone_sub_sub_sub' value='' />
																</h2>
															</div>
															<div class="modal-body">
																<div class="row ezone_h3 mod_pad">
																	<div class="col-md-12 post_deal_bor">
																		<div class="row">
																			<div class="col-md-3 clearfix">
																				<h3>Phones & Tablets</h3>
																				<?php foreach ($ezone_phones as $ezone_phones_val) { ?>
																				<h4><a href="javascript:void(0);" class="ezone_detail" id="<?php echo  $ezone_phones_val['sub_category_id'].','.$ezone_phones_val['sub_subcategory_id'].',0'; ?>" ><?php echo $ezone_phones_val['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																			<div class="col-md-3 clearfix">
																				<h3>Home Appliances</h3>
																				<?php foreach ($ezone_home as $ezone_home_val) { ?>
																				<h4><a href="javascript:void(0);" class="ezone_detail" id="<?php echo  $ezone_home_val['sub_category_id'].','.$ezone_home_val['sub_subcategory_id'].',0'; ?>" ><?php echo $ezone_home_val['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																			<div class="col-md-3 clearfix">
																				<h3>Small Appliances</h3>
																				<?php foreach ($ezone_small as $ezone_small_val) { ?>
																				<h4><a href="javascript:void(0);" class="ezone_detail" id="<?php echo  $ezone_small_val['sub_category_id'].','.$ezone_small_val['sub_subcategory_id'].',0'; ?>" ><?php echo $ezone_small_val['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																			<div class="col-md-3 clearfix">
																				<h3>Laptop & Computers</h3>
																				<?php foreach ($ezone_laptops as $ezone_laptops_val) { ?>
																				<h4><a href="javascript:void(0);" class="ezone_detail" id="<?php echo  $ezone_laptops_val['sub_category_id'].','.$ezone_laptops_val['sub_subcategory_id'].',0'; ?>" ><?php echo $ezone_laptops_val['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																		</div>
																		<div class="row col-md-12" >
																			<button type="button" id='ezone_viewmore' class="pull-right btn_v btn-4 btn-4a">View More</button>
																		</div>
																		<div class="row ezone_h3" id='ezone_sec_part' style='display:none';>
																			<div class="col-md-3 clearfix">
																				<h3>Accessories</h3>
																				<?php foreach ($ezone_accesories as $ezone_accesories_val) { ?>
																				<h4><a href="javascript:void(0);" class="ezone_detail" id="<?php echo  $ezone_accesories_val['sub_category_id'].','.$ezone_accesories_val['sub_subcategory_id'].',0'; ?>" ><?php echo $ezone_accesories_val['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																			<div class="col-md-3 clearfix">
																				<h3>Personal Care</h3>
																				<?php foreach ($ezone_pcare as $ezone_pcare_val) { ?>
																				<h4><a href="javascript:void(0);" class="ezone_detail" id="<?php echo  $ezone_pcare_val['sub_category_id'].','.$ezone_pcare_val['sub_subcategory_id'].',0'; ?>" ><?php echo $ezone_pcare_val['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																			<div class="col-md-3 clearfix">
																				<h3>Home Entertainment</h3>
																				<?php foreach ($ezone_entertainment as $ezone_entertainment_val) { ?>
																				<h4><a href="javascript:void(0);" class="ezone_detail" id="<?php echo  $ezone_entertainment_val['sub_category_id'].','.$ezone_entertainment_val['sub_subcategory_id'].',0'; ?>" ><?php echo $ezone_entertainment_val['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																			<div class="col-md-3 clearfix">
																				<h3>Photography</h3>
																				<?php foreach ($ezone_photo as $ezone_photo_val) { ?>
																				<h4><a href="javascript:void(0);" class="ezone_detail" id="<?php echo  $ezone_photo_val['sub_category_id'].','.$ezone_photo_val['sub_subcategory_id'].',0'; ?>" ><?php echo $ezone_photo_val['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																		</div>
																		<div class="row col-md-12" >
																			<button type="button" id='ezone_viewless' style='display:none'; class="pull-right btn_v btn-4 btn-4a">View Less</button>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn_v btn-4 btn-4a" data-dismiss="modal">Close</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											
											<div class="col-md-4 col-sm-4 col-xs-12 top_pad_10">
												<div class="hovereffect">
													<img class="img-responsive" src="<?php echo base_url(); ?>img/featured/cars.jpg" alt="buy and sell new and used cars" title="Motor Point Category">
													<div class="overlay">
														<h2>Motor Point</h2>
														<a class="info" href="#" data-toggle="modal" data-target="#Motor">View Details</a>
													</div>
												</div>
											</div>
											
											<div class="modal fade" id="Motor" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h2>Motor Point Category</h2>
														</div>
														<form method='post' id='motorpoint_form' action="<?php echo base_url(); ?>postad_create_motors">
															<div class="modal-body tabs-detailed">
																<div class="row ezone_h3 ">
																	<div class='col-md-12 post_deal_bor'>
																		<div class="row">
																			<div class="col-md-3 clearfix">
																				<h3>
																					<input type='hidden' name='motor_cat' id='motor_cat' value='3' />
																					<input type='hidden' name='motor_sub' id='motor_sub' value='' />
																					<input type='hidden' name='motor_sub_sub' id='motor_sub_sub' value='' />
																					<input type='hidden' name='motor_sub_sub_sub' id='motor_sub_sub_sub' value='' />
																					<a href="javascript:void(0);" id="12,0,0" class="cars_cars">Cars</a>
																				</h3>
																			</div>
																			<div class="col-md-3 clearfix">
																				<h3><a href="javascript:void(0);" id="13,0,0" class="bike_scooters">
																					Bikes & Scooters</a>
																				</h3>
																			</div>
																			<div class="col-md-3 clearfix">
																				<h3>
																					<a href="javascript:void(0);" id="17,0,0" class="motor_plant_machinery">
																					Plant Machinery</a>
																				</h3>
																			</div>
																			<div class="col-md-3 clearfix">
																				<h3><a href="javascript:void(0);" id="15,0,0" class="motor_vans_trucks">Vans, Trucks & SUV's</a></h3>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-3 clearfix">
																				<h3><a href="javascript:void(0);" id="16,0,0" class="motor_coach_bus">Coaches & Busses</a></h3>
																			</div>
																			<div class="col-md-3 clearfix">
																				<h3><a href="javascript:void(0);" id="14,0,0" class="motor_caravans">Motorhomes & Caravans</a></h3>
																			</div>
																			<div class="col-md-3 clearfix">
																				<h3><a href="javascript:void(0);" id="18,0,0" class="motor_farming">Farming Vehicles</a></h3>
																			</div>
																			<div class="col-md-3 clearfix">
																				<h3><a href="javascript:void(0);" id="19,0,0" class="motor_boats">Boats</a></h3>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn_v btn-4 btn-4a" data-dismiss="modal">Close</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
										<div class="row top_13">
											<div class="col-md-4 col-sm-4 col-xs-12">
												<div class="hovereffect">
													<img class="img-responsive" src="<?php echo base_url(); ?>img/featured/clothing.jpg" alt="buy and sell clothes online uk" title="Clothing & LifeStyles">
													<div class="overlay">
														<h2 class="cloth_head_font">Clothing & LifeStyles</h2>
														<a class="info" href="#" data-toggle="modal" data-target="#LifeStyles">View Details</a>
													</div>
												</div>
											</div>
											
											<div class="modal fade" id="LifeStyles" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h2>Clothing & LifeStyles Category</h2>
														</div>
														<form method='post' id='cloths_form' action="<?php echo base_url(); ?>postad_create_cloths">
															<div class="modal-body">
																<div class="row">
																	<div class="col-md-12 post_deal_bor">
																		<div class="row">
																			<div class="col-md-4 clearfix">
																				<input type='hidden' name='cloths_cat' id='cloths_cat' value='6' />
																				<input type='hidden' name='cloths_sub' id='cloths_sub' value='' />
																				<input type='hidden' name='cloths_sub_sub' id='cloths_sub_sub' value='' />
																				<h3>Women</h3>
																				<?php foreach ($cloths_women as $c_val) { ?>
																				<h4><a id="<?php echo  $c_val['sub_category_id'].','.$c_val['sub_subcategory_id']; ?>" class="cloths_women"  href="javascript:void(0);"  ><?php echo $c_val['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																			<div class="col-md-4 clearfix">
																				<h3>Men</h3>
																				<?php foreach ($cloths_men as $c_men) { ?>
																				<h4><a id="<?php echo  $c_men['sub_category_id'].','.$c_men['sub_subcategory_id']; ?>" class="cloths_men"  href="javascript:void(0);"  ><?php echo $c_men['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																			<div class="col-md-4 clearfix">
																				<h3>Boy</h3>
																				<?php foreach ($cloths_boy as $c_boy) { ?>
																				<h4><a id="<?php echo  $c_boy['sub_category_id'].','.$c_boy['sub_subcategory_id']; ?>" class="cloths_boy"  href="javascript:void(0);"  ><?php echo $c_boy['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-4 clearfix">
																				<h3>Girls</h3>
																				<?php foreach ($cloths_girls as $c_girl) { ?>
																				<h4><a id="<?php echo  $c_girl['sub_category_id'].','.$c_girl['sub_subcategory_id']; ?>" class="cloths_girl"  href="javascript:void(0);"  ><?php echo $c_girl['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																			<div class="col-md-4 clearfix">
																				<h3>Baby Boy</h3>
																				<?php foreach ($cloths_baby_boy as $c_bboy) { ?>
																				<h4><a id="<?php echo  $c_bboy['sub_category_id'].','.$c_bboy['sub_subcategory_id']; ?>" class="cloths_bboy"  href="javascript:void(0);"  ><?php echo $c_bboy['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																			<div class="col-md-4 clearfix">
																				<h3>Baby Girl</h3>
																				<?php foreach ($cloths_baby_girl as $c_bgirl) { ?>
																				<h4><a id="<?php echo  $c_bgirl['sub_category_id'].','.$c_bgirl['sub_subcategory_id']; ?>" class="cloths_bgirl"  href="javascript:void(0);"  ><?php echo $c_bgirl['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn_v btn-4 btn-4a" data-dismiss="modal">Close</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											
											<div class="col-md-4 col-sm-4 col-xs-12 top_pad_10">
												<div class="hovereffect">
													<img class="img-responsive" src="<?php echo base_url(); ?>img/featured/services.jpg" alt="free services ads" title="Services Category">
													<div class="overlay">
														<h2>Services</h2>
														<a class="info" href="#" data-toggle="modal" data-target="#Services" >View Details</a>
													</div>
												</div>
											</div>
											
											<div class="modal fade" id="Services" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h2>Services Category</h2>
														</div>
														<form method='post' id='services_form' action="<?php echo base_url(); ?>postad_create_services">
															<div class="modal-body">
																<div class="row">
																	<div class="col-md-12 post_deal_bor">
																		<div class="row">
																			<div class="col-md-6 clearfix">
																				<h3>Professional
																					<input type='hidden' name='services_cat' id='services_cat' value='2' />
																					<input type='hidden' name='services_sub' id='services_sub' value='' />
																					<input type='hidden' name='services_sub_sub' id='services_sub_sub' value='' />
																				</h3>
																				<?php foreach ($services_sub_prof as $serv_prof) { ?>
																				<h4><a href="javascript:void(0)" id="<?php echo  $serv_prof['sub_category_id'].','.$serv_prof['sub_subcategory_id']; ?>" class='service_prof'><?php echo ucfirst($serv_prof['sub_subcategory_name']); ?></a></h4>
																				<?php	} ?>
																			</div>
																			<div class="col-md-4 clearfix">
																				<h3>Popular</h3>
																				<?php foreach ($services_sub_pop as $serv_pop) { ?>
																				<h4><a href="javascript:void(0)" id="<?php echo  $serv_pop['sub_category_id'].','.$serv_pop['sub_subcategory_id']; ?>" class='service_pop'><?php echo ucfirst($serv_pop['sub_subcategory_name']); ?></a></h4>
																				<?php	} ?>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn_v btn-4 btn-4a" data-dismiss="modal">Close</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											
											<div class="col-md-4 col-sm-4 col-xs-12 top_pad_10">
												<div class="hovereffect">
													<img class="img-responsive" src="<?php echo base_url(); ?>img/featured/property.jpg" alt="residential or commercial property for sale" title="Find a Property Category">
													<div class="overlay">
														<h2>Find a Property</h2>
														<a class="info" href="#" data-toggle="modal" data-target="#Property">View Details</a>
													</div>
												</div>
											</div>
											
											<form method='post' id='property_form' action="<?php echo base_url(); ?>postad_create_property">
												<div class="modal dialog1 fade" id="Property" role="dialog">
													<div class="modal-dialog1">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h2>Find a Property Category</h2>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="col-md-12 post_deal_bor">
																		<div class="row">
																			<div class="col-md-12 text_center clearfix">
																				<h3><a href="javascript:void(0)" id="11,0" class='propertyforsale'>Residential</a>
																					<input type='hidden' name='property_cat' id='property_cat' value='4' />
																					<input type='hidden' name='property_sub' id='property_sub' value='' />
																					<input type='hidden' name='property_sub_sub' id='property_sub_sub' value='' />
																				</h3>
																			</div>
																			<div class="col-md-12 text_center clearfix">
																				<h3>
																					<a href="javascript:void(0)" id="26,0" class='propertyforsale'>Commercial</a>
																				</h3>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn_v btn-4 btn-4a" data-dismiss="modal">Close</button>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
										<div class="row top_13">
											<div class="col-md-4 col-sm-4 col-xs-12">
												<div class="hovereffect">
													<img class="img-responsive" src="<?php echo base_url(); ?>img/featured/kitchen.jpg" alt="home cleaning services" title="Home & Kitchen Category">
													<div class="overlay">
														<h2>Home & Kitchen</h2>
														<a class="info" href="#" data-toggle="modal" data-target="#Kitchen">View Details</a>
													</div>
												</div>
											</div>
											
											<div class="modal fade" id="Kitchen" role="dialog">
												<div class="modal-dialog">
													<form method='post' id='kitchen_form' action="<?php echo base_url(); ?>postad_create_kitchen">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h2>Home & Kitchen Category
																	<input type='hidden' name='kitchen_cat' id='kitchen_cat' value='7' />
																	<input type='hidden' name='kitchen_sub' id='kitchen_sub' value='' />
																	<input type='hidden' name='kitchen_sub_sub' id='kitchen_sub_sub' value='' />
																</h2>
															</div>
															<div class="modal-body">
																<div class="row">
																	<div class="col-md-12 post_deal_bor">
																		<div class="row">
																			<div class="col-md-4 clearfix">
																				<h3>Kitchen Essentials</h3>
																				<?php foreach ($kitchen_essentials as $kitchen_essentials_val) { ?>
																				<h4><a href="javascript:void(0);" class="kitchen_detail" id="<?php echo  $kitchen_essentials_val['sub_category_id'].','.$kitchen_essentials_val['sub_subcategory_id'].',0'; ?>" ><?php echo $kitchen_essentials_val['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																			<div class="col-md-4 clearfix">
																				<h3>Home Essentials</h3>
																				<?php foreach ($kitchen_home as $kitchen_home_val) { ?>
																				<h4><a href="javascript:void(0);" class="kitchen_detail" id="<?php echo  $kitchen_home_val['sub_category_id'].','.$kitchen_home_val['sub_subcategory_id'].',0'; ?>" ><?php echo $kitchen_home_val['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																			<div class="col-md-4 clearfix">
																				<h3>Decor</h3>
																				<?php foreach ($kitchen_decor as $kitchen_decor_val) { ?>
																				<h4><a href="javascript:void(0);" class="kitchen_detail" id="<?php echo  $kitchen_decor_val['sub_category_id'].','.$kitchen_decor_val['sub_subcategory_id'].',0'; ?>" ><?php echo $kitchen_decor_val['sub_subcategory_name']; ?></a></h4>
																				<?php	} ?>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn_v btn-4 btn-4a" data-dismiss="modal">Close</button>
															</div>
														</div>
													</form>
												</div>
											</div>
											
											<div class="col-md-4 col-sm-4 col-xs-12 top_pad_10">
												<div class="hovereffect">
													<img class="img-responsive" src="<?php echo base_url(); ?>img/featured/pets.jpg" alt="free online pet ads" title="Pets Category">
													<div class="overlay">
														<h2>Pets</h2>
														<a class="info" href="#" data-toggle="modal" data-target="#Pets">View Details</a>
													</div>
												</div>
											</div>
											
											<div class="modal fade" id="Pets" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h2>Pets Category</h2>
														</div>
														<form method='post' id='pets_form' action="<?php echo base_url(); ?>postad_create_pets">
															<div class="modal-body">
																<div class="row">
																	<div class="col-md-12 post_deal_bor">
																		<div class="row">
																			<div class="col-md-2 clearfix">
																				<input type='hidden' name='pets_cat' id='pets_cat' value='5' />
																				<input type='hidden' name='pets_sub' id='pets_sub' value='' />
																				<input type='hidden' name='pets_sub_sub' id='pets_sub_sub' value='' />
																				<?php foreach ($pets_sub_cat as $p_sub) { ?>
																				<h3><a id="<?php echo $p_sub['sub_category_id']; ?>" href="javascript:void(0);" class="pets_others"  ><?php echo ucfirst($p_sub['sub_category_name']); ?></a></h3>
																				<?php	} ?>
																			</div>
																			<div class="col-md-3 clearfix">
																				<h3>Big Animals</h3>
																				<?php foreach ($pets_big_animal as $p_animal) { ?>
																				<h4><a class="pets_big" id="<?php echo  $p_animal['sub_category_id'].','.$p_animal['sub_subcategory_id']; ?>" href="javascript:void(0);"><?php echo ucfirst($p_animal['sub_subcategory_name']); ?></a></h4>
																				<?php	} ?>
																			</div>
																			<div class="col-md-3 clearfix">
																				<h3>Small Animals</h3>
																				<?php foreach ($pets_small_animal as $p_sanimal) { ?>
																				<h4><a class="pets_small" id="<?php echo  $p_sanimal['sub_category_id'].','.$p_sanimal['sub_subcategory_id']; ?>" href="javascript:void(0);"><?php echo ucfirst($p_sanimal['sub_subcategory_name']); ?></a></h4>
																				<?php	} ?>
																			</div>
																			<div class="col-md-4 clearfix">
																				<h3>Pet Accessories</h3>
																				<?php foreach ($pets_accessories as $p_accessories) { ?>
																				<h4><a class="pets_accessories" id="<?php echo  $p_accessories['sub_category_id'].','.$p_accessories['sub_subcategory_id']; ?>" href="javascript:void(0);"><?php echo ucfirst($p_accessories['sub_subcategory_name']); ?></a></h4>
																				<?php	} ?>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn_v btn-4 btn-4a" data-dismiss="modal">Close</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											
											<div class="col-md-4 col-sm-4 col-xs-12 top_pad_10">
												<div class="hovereffect">
													<img class="img-responsive" src="<?php echo base_url(); ?>img/featured/jobs.jpg" alt="classified jobs ads" title="Jobs Category">
													<div class="overlay">
														<h2>Jobs</h2>
														<div><a class="info" href="#" data-toggle="modal" data-target="#Jobs">View Details</a></div>
													</div>
												</div>
											</div>
											
											<div class="modal fade" id="Jobs" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h2>Jobs Category</h2>
														</div>
														<form method='post' id='jobs_form' action="<?php echo base_url(); ?>postad_create_jobs">
															<div class="modal-body">
																<div class="row">
																	<div class="col-md-12  post_deal_bor">
																		<div class="row">
																			<input type='hidden' name='jobs_cat' id='jobs_cat' value='1' />
																			<input type='hidden' name='jobs_sub' id='jobs_sub' value='' />
																			<input type='hidden' name='jobs_sub_sub' id='jobs_sub_sub' value='' />
																			<?php foreach ($jobs as $j_val) { ?>
																			<div class="col-md-4 clearfix">
																				<h4><a href="javascript:void(0)" class='job_detail' id='<?php echo $j_val['sub_category_id'].",0"; ?>' ><?php echo $j_val['sub_category_name']; ?></a></h4>
																			</div>
																			<?php } ?>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn_v btn-4 btn-4a" data-dismiss="modal">Close</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
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
		
		<script src="<?php echo base_url();?>js/jquery.js"></script> 
		<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>
		<script>
			setTimeout(function(){
				 $(".alert").hide();
			},5000);
			
		</script>
		
		<!-- xxx footerscript Content xxx -->
		<?php echo $this->load->view('common/footerscript');?> 
		<!-- xxx footerscript End xxx -->
			
	</body>
</html>
