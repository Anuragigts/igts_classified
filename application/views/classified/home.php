<!-- Slide And Filter Section-->    
            <section class="tp-banner-container">
                <!-- SLIDE  -->
                <div class="tp-banner">
                   <img src="img/slide/ban5.jpg"  alt="fullslide1"> 
				   <div class="tp-bannertimer"></div>  
                </div>
                <!-- SLIDE CONTENT-->

                <!-- FILTER HEADER - TITLE HEADER-->
                <div class="filter-title">
                    <!-- TITLE HEADER-->
                    <div class="title-header">
                        <h1>Find Your Category</h1>
                        <p class="lead">Book cheap hotels and make payment facilities, free cancellation when the hotel so provides, compare prices and find all the options for your vacation.</p>
                    </div>
                    <!-- END TITLE HEADER-->

                    <!-- FILTER HEADER-->
                    <div class="filter-header">
                        <form action="#">
                            <input type="text" required="required" placeholder="I'm looking for" class="input-large">
                            <div class="selector">
                                <select class="guests-input">
                                	<?php foreach ($show_all as $show_val) { ?>
                                		 <option value="<?php echo $show_val->category_id; ?>"><?php echo ucwords($show_val->category_name); ?></option>
                                <?php	} ?>
<!--                                     <option value="1">Jobs</option>
                                    <option value="2">Services</option>
                                    <option value="3">Motor Point</option>
                                    <option value="4">Find A property</option>
                                    <option value="5">Pets</option>
                                    <option value="6">Clothing & LifeStyles</option>
                                    <option value="7">Home & Kitchen</option>
                                    <option value="8">E-Zone</option>
                                    <option value="9">Deals</option> -->
                                </select>
                                <span class="custom-select">All Categories</span>
                            </div>
							<input type="text" required="required" placeholder="Location" class="input-large">
                            <i class="fa fa-map-marker fa-2x" style="padding: 8px;"></i>
							<input class="date-input" id="slider-range" type="text"  value="" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="20"//> 
							<input type="submit" class="pull-right" value="Search">
                        </form>
                    </div>
                    <!-- END FILTER HEADER-->
                </div>
                <!-- END FILTERHEADER - TITLE HEADER -->
            </section>       
            <!-- End Slide And Filter Section-->

            <!--Content Central -->
            <section class="content-central">
                <!-- Shadow Semiboxed Layout -->
                <div class="semiboxshadow text-center">
                    <img src="img/img-theme/shp.png" class="img-responsive" alt="">
                </div>
                <!-- End Shadow Semiboxed Layout -->

               <section class="content_info">
                    <!-- Info Resalt-->
                    <div class="">
						<div class="row marque_sty">
							<div class="col-md-3">
								<img src="img/marquee.png" class="fa fa-plane img-responsive" alt="">
							</div> 
							<div class="col-md-9 marque_text">
								<div class="ticker3 modern-ticker mt-round">
									<div class="mt-body">
										<div class="mt-news">
											<ul>
												<li><a href="#" target="_self">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a pharetra lectus. </a></li>
												<li><a href="#" target="_self">Consectetur adipiscing elit. Ut a pharetra lectus Lorem ipsum dolor sit amet, consectetur adipiscin</a></li>
												<li><a href="#" target="_self">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a pharetra lectus.</a></li>
												<li><a href="#" target="_self">Consectetur adipiscing elit. Ut a pharetra lectus Lorem ipsum dolor sit amet, consectetur adipiscin</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>                    
						</div>
					</div>
                </section>
				
				
				<!-- End content info - Services Items-->
                <section class="content_info">
                    <!-- Info Resalt-->
                    <div class="">
                        <!-- Title -->
						<div class="container">
                            <div class="row">
                                <div class="col-md-8">
									<div class="titles">
										<h2>TOP <span>CATEGORIES </span></h2>
										<hr class="tall">
									</div>                    
								</div> 
								<div class="col-md-4">
									<div class="titles">
										<h2><span>SIGNIFICANT </span>DEAL</h2>
										<hr class="tall">
									</div>                    
								</div>                    
                            </div>
                        </div>
						<div class="container">
							<div class="row">
								<div class="col-md-8">
									<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-12">
											<div class="hovereffect">
												<img class="img-responsive" src="img/featured/jobs.jpg"  alt="">
												<div class="overlay">
												   <h2>Jobs</h2>
												   <div><a class="info" href="#">View Details</a></div>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<div class="hovereffect">
												<img class="img-responsive" src="img/featured/services.jpg" alt="">
												<div class="overlay">
												   <h2>Services</h2>
												   <a class="info" href="#">View Details</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<div class="hovereffect">
												<img class="img-responsive" src="img/featured/cars.jpg" alt="">
												<div class="overlay">
												   <h2>Motor Point</h2>
												   <a class="info" href="#">View Details</a>
												</div>
											</div>
										</div>
									</div>
									<div class="row top_13">
										<div class="col-md-4 col-sm-4 col-xs-12">
											<div class="hovereffect">
												<img class="img-responsive" src="img/featured/property.jpg" alt="">
												<div class="overlay">
												   <h2>Find a Property</h2>
												   <a class="info" href="#">View Details</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<div class="hovereffect">
												<img class="img-responsive" src="img/featured/pets.jpg" alt="">
												<div class="overlay">
												   <h2>Pets</h2>
												   <a class="info" href="#">View Details</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<div class="hovereffect">
												<img class="img-responsive" src="img/featured/clothing.jpg" alt="">
												<div class="overlay">
												   <h2>Clothing & LifeStyles</h2>
												   <a class="info" href="#">View Details</a>
												</div>
											</div>
										</div>
									</div>
									<div class="row top_13">
										<div class="col-md-4 col-sm-4 col-xs-12">
											<div class="hovereffect">
												<img class="img-responsive" src="img/featured/kitchen.jpg" alt="">
												<div class="overlay">
												   <h2>Home & Kitchen</h2>
												   <a class="info" href="#">View Details</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<div class="hovereffect">
												<img class="img-responsive" src="img/featured/ezone.jpg" alt="">
												<div class="overlay">
												   <h2>E-Zone</h2>
												   <a class="info" href="#">View Details</a>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12">
											<div class="hovereffect">
												<img class="img-responsive" src="img/featured/deals.jpg" alt="">
												<div class="overlay">
												   <h2>Deals</h2>
												   <a class="info" href="#">View Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div id="page">
										<div id="viewport">
											<div id="box">
												<?php
											$i=1;
											 foreach ($sig_ads as $sig_val) { ?>
												<figure class="slide jbs-current">
													<?php if($sig_val->img_name == ''){
													?>
													<div class="img-hover significant_ad">
														<img src="ad_images/no_image.png" alt="" class="img-responsive">
														<div class="overlay"><a href="ad_images/no_image.png" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
													</div>
													<?php
													}else{
														?>
														<div class="img-hover significant_ad">
														<img src="ad_images/<?php echo $sig_val->img_name; ?>" alt="" class="img-responsive">
														<div class="overlay"><a href="ad_images/<?php echo $sig_val->img_name; ?>" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
													</div>
													<?php	} ?>
													<div class="info-gallery slider_bg">
														<h3><?php echo substr($sig_val->title, 0, 20); ?></h3>
														<hr class="separator">
														<ul class="nav nav-tabs" id="myTab">
															<li class="active">
																<a href="#description1" data-toggle="tab"> DESCRIPTION</a>
															</li>
															<li>
																<a href="#contact1" data-toggle="tab"> Contact</a>
															</li>
														</ul>
														<!-- End Nav Tabs-->

														<div class="tab-content">
															<!-- Tab One - DESCRIPTION -->
															<div class="tab-pane active paddi_ng" id="description<?php echo $i; ?>">                                        
																<p><?php echo substr($sig_val->ad_desc, 0, 60); ?> </p>
															</div>
															<!-- end Tab One - DESCRIPTION -->
															<!-- Tab Two - contact -->
															<div class="tab-pane paddi_ng" id="contact<?php echo $i; ?>">
																<p> <?php echo $sig_val->number; ?></p>
															</div>
															<!-- end Tab Two - contact -->
														</div><div class="content-btn"><a href="#" class="btn btn-primary">Reply</a></div>
														<div class="price"><span></span><b><i class="fa fa-fire"></i></b><b><i class="fa fa-hand-o-right"></i></b></div>
													</div>
												</figure>
										<?php 
											$i++;
										} ?>
											
											</div>
										</div>
										<!-- <footer>
											<nav class="slider-controls top_10">
												<a class="increment-control" href="#" id="prev" title="go to the next slide">&laquo; Prev</a>
												<a class="increment-control" href="#" id="next" title="go to the next slide">Next &raquo;</a>
												<ul id="controls">
													<li><a class="goto-slide current" href="#" data-slideindex="0"></a></li>
													<li><a class="goto-slide" href="#" data-slideindex="1"></a></li>
													<li><a class="goto-slide" href="#" data-slideindex="2"></a></li>
													<li><a class="goto-slide" href="#" data-slideindex="3"></a></li>
													<li><a class="goto-slide" href="#" data-slideindex="4"></a></li>
												</ul>
											</nav>
										</footer> -->
									</div>                 
								</div>                    
							</div>
						</div>
                        <!-- End Title-->
					</div>
                </section>   
                <!-- End content info - Services Items --> 
				
				
				<!-- End content info - White Section-->
                <div class="content_info">
                    <div class="paddings-mini">
                        <div class="container">
                            <div class="titles recen_ad">
								<h2>MOST <span>VALUE </span>DEAL</h2>
							</div>                    
                           <!-- Nav Filters -->
                            <div class="portfolioFilter">
                                <a href="#" data-filter="*" class="current">Show All</a>
                                <a href="#jobs" data-filter=".jobs">jobs</a>
                                <a href="#services" data-filter=".services">Services</a>
                                <a href="#pets" data-filter=".pets">Pets</a>
                                <a href="#deals" data-filter=".deals">Deals</a>
                                <a href="#ezone" data-filter=".ezone">E-Zone</a>
                            </div>
                            <!-- End Nav Filters -->

                            <!-- Items Gallery filters-->
                            <div class="portfolioContainer">
                                
                                <!-- Item Gallery-->
                                <!-- Item Gallery-->
                                <!-- most valued ads for jobs -->
                                 <?php foreach ($most_ads as $m_ads){
                            		?>
                                <div class="col-xs-12 col-sm-6 col-md-3 jobs">
                                	<?php if($m_ads->img_name == ''){
																	?>
                                    <div class="img-hover">
										<img src="ad_images/no_image.png" alt="" class="img-responsive">
										<div class="overlay"><a href="ad_images/no_image.png" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>
									<?php }
																else{ ?>
						<div class="img-hover">
										<img src="ad_images/<?php echo $m_ads->img_name; ?>" alt="" class="img-responsive">
										<div class="overlay"><a href="ad_images/<?php echo $m_ads->img_name; ?>" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>
									<?php	} ?>

									<div class="info-gallery">
										<h3><?php echo substr($m_ads->title, 0, 20); ?></h3>
										<hr class="separator">
										<p><?php echo substr($m_ads->ad_desc, 0, 20); ?> </p>
										<ul class="starts">
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
										</ul>
										<div class="content-btn"><a href="#" class="btn btn-primary">View Details</a></div>
										<div class="price"><span></span><b><i class="fa fa-fire"></i></b><b><i class="fa fa-hand-o-right"></i></b></div>
									</div>
                                </div>
                                <?php } ?>


                                <!-- most valued ads for services -->
                                 <?php foreach ($most_ads_services as $m_ads_services){
                            		?>
                                <div class="col-xs-12 col-sm-6 col-md-3 services">
                                	<?php if($m_ads_services->img_name == ''){
																	?>
                                    <div class="img-hover">
										<img src="ad_images/no_image.png" alt="" class="img-responsive">
										<div class="overlay"><a href="ad_images/no_image.png" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>
									<?php }
																else{ ?>
						<div class="img-hover">
										<img src="ad_images/<?php echo $m_ads_services->img_name; ?>" alt="" class="img-responsive">
										<div class="overlay"><a href="ad_images/<?php echo $m_ads_services->img_name; ?>" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>
									<?php	} ?>

									<div class="info-gallery">
										<h3><?php echo substr($m_ads_services->title, 0, 20); ?></h3>
										<hr class="separator">
										<p><?php echo substr($m_ads_services->ad_desc, 0, 20); ?> </p>
										<ul class="starts">
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
										</ul>
										<div class="content-btn"><a href="#" class="btn btn-primary">View Details</a></div>
										<div class="price"><span></span><b><i class="fa fa-fire"></i></b><b><i class="fa fa-hand-o-right"></i></b></div>
									</div>
                                </div>
                                <?php } ?>

                                 <!-- most valued ads for pets -->
                                 <?php foreach ($most_ads_pets as $m_ads_pets){
                            		?>
                                <div class="col-xs-12 col-sm-6 col-md-3 pets">
                                	<?php if($m_ads_pets->img_name == ''){
																	?>
                                    <div class="img-hover">
										<img src="ad_images/no_image.png" alt="" class="img-responsive">
										<div class="overlay"><a href="ad_images/no_image.png" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>
									<?php }
																else{ ?>
						<div class="img-hover">
										<img src="ad_images/<?php echo $m_ads_pets->img_name; ?>" alt="" class="img-responsive">
										<div class="overlay"><a href="ad_images/<?php echo $m_ads_pets->img_name; ?>" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>
									<?php	} ?>

									<div class="info-gallery">
										<h3><?php echo substr($m_ads_pets->title, 0, 20); ?></h3>
										<hr class="separator">
										<p><?php echo substr($m_ads_pets->ad_desc, 0, 20); ?> </p>
										<ul class="starts">
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
										</ul>
										<div class="content-btn"><a href="#" class="btn btn-primary">View Details</a></div>
										<div class="price"><span></span><b><i class="fa fa-fire"></i></b><b><i class="fa fa-hand-o-right"></i></b></div>
									</div>
                                </div>
                                <?php } ?>

                                <!-- most valued ads for deals -->
                                 <?php foreach ($most_ads_deals as $m_ads_deals){
                            		?>
                                <div class="col-xs-12 col-sm-6 col-md-3 deals">
                                	<?php if($m_ads_deals->img_name == ''){
																	?>
                                    <div class="img-hover">
										<img src="ad_images/no_image.png" alt="" class="img-responsive">
										<div class="overlay"><a href="ad_images/no_image.png" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>
									<?php }
																else{ ?>
						<div class="img-hover">
										<img src="ad_images/<?php echo $m_ads_deals->img_name; ?>" alt="" class="img-responsive">
										<div class="overlay"><a href="ad_images/<?php echo $m_ads_deals->img_name; ?>" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>
									<?php	} ?>

									<div class="info-gallery">
										<h3><?php echo substr($m_ads_deals->title, 0, 20); ?></h3>
										<hr class="separator">
										<p><?php echo substr($m_ads_deals->ad_desc, 0, 20); ?> </p>
										<ul class="starts">
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
										</ul>
										<div class="content-btn"><a href="#" class="btn btn-primary">View Details</a></div>
										<div class="price"><span></span><b><i class="fa fa-fire"></i></b><b><i class="fa fa-hand-o-right"></i></b></div>
									</div>
                                </div>
                                <?php } ?>

                                <!-- most valued ads for ezone -->
                                 <?php foreach ($most_ads_ezone as $m_ads_ezone){
                            		?>
                                <div class="col-xs-12 col-sm-6 col-md-3 ezone">
                                	<?php if($m_ads_ezone->img_name == ''){
																	?>
                                    <div class="img-hover">
										<img src="ad_images/no_image.png" alt="" class="img-responsive">
										<div class="overlay"><a href="ad_images/no_image.png" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>
									<?php }
																else{ ?>
						<div class="img-hover">
										<img src="ad_images/<?php echo $m_ads_ezone->img_name; ?>" alt="" class="img-responsive">
										<div class="overlay"><a href="ad_images/<?php echo $m_ads_ezone->img_name; ?>" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>
									<?php	} ?>

									<div class="info-gallery">
										<h3><?php echo substr($m_ads_ezone->title, 0, 20); ?></h3>
										<hr class="separator">
										<p><?php echo substr($m_ads_ezone->ad_desc, 0, 20); ?> </p>
										<ul class="starts">
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
										</ul>
										<div class="content-btn"><a href="#" class="btn btn-primary">View Details</a></div>
										<div class="price"><span></span><b><i class="fa fa-fire"></i></b><b><i class="fa fa-hand-o-right"></i></b></div>
									</div>
                                </div>
                                <?php } ?>
                            </div>   
                            <!-- End Items Gallery filters-->       
                        </div>
                    </div>
                </div>   
                <!-- End content info - White Section--> 
				<section class="content_info">
                    <!-- Info Resalt-->
                    <div class="padding-bottom">
                        <!-- Title -->
                        <div class="container">
							<div class="titles recen_ad">
                                <h2><span>RECENT </span>DEAL</h2>
                            </div>
                        </div>
                        <!-- End Title-->
						
						<div class="container">
                            <div class="row">
                                <div class="col-sm-3">
									<img src="img/recentad.jpg" alt="" style="height:413px;" class="img-responsive">
								</div>
								<div class="col-sm-9">
									<div id="boxes-carousel1">
										<!-- Item carousel Boxed-->
											<?php 
										// echo "<pre>"; print_r(@$free_ads);
										foreach ($free_ads as $free_val) { ?>
										<div>
											<?php if ($free_val->img_name == '') { ?>
											<div class="img-hover">
												<img src="ad_images/no_image.png" alt="" class="img-responsive">
												<div class="overlay"><a href="ad_images/no_image.png" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
											</div>	
									<?php		}
											else{ ?>
											<div class="img-hover">
												<img src="ad_images/<?php echo $free_val->img_name; ?>" alt="" class="img-responsive">
												<div class="overlay"><a href="ad_images/<?php echo $free_val->img_name; ?>" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
											</div>
										<?php	} ?>
											<div class="info-gallery">
												<h3><?php echo substr($free_val->title, 0, 20); ?></h3>
												<hr class="separator">
												<p><?php echo substr($free_val->ad_desc, 0, 50); ?> </p>
												<ul class="starts">
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star"></i></a></li>
													<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
												</ul>
												<div class="content-btn"><a href="#" class="btn btn-primary">View Details</a></div>
												<div class="price"><span></span><b><i class="fa fa-fire"></i></b></div>
											</div>
										</div>	
									<?php	}
										 ?>
										
										<!-- End Item carousel Boxed-->
									</div>
								</div>
							</div>
                        </div>
                       <!-- End boxes-carousel-->
					   
					   <div class="container">
							<div class="titles recen_ad">
                                <h2><span>Business </span>DEAL</h2>
                            </div>
                        </div>
                        <!-- End Title-->
						
						<div class="container">
                            <div class="row">
                                <div class="col-sm-9">
									<div id="boxes-carousel">
										<!-- Item carousel Boxed-->
										<?php foreach ($business_ads as $b_ads) { ?>
										<div>
											<?php if($b_ads->img_name == ''){ ?>
											<div class="img-hover">
												<img src="ad_images/no_image.png" alt="" class="img-responsive">
												<div class="overlay"><a href="ad_images/no_image.png" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
											</div>
										<?php	}
											else{ ?>
											<div class="img-hover">
												<img src="ad_images/<?php echo $b_ads->img_name; ?>" alt="" class="img-responsive">
												<div class="overlay"><a href="ad_images/<?php echo $b_ads->img_name; ?>" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
											</div>
										<?php	} ?>
											

											<div class="info-gallery">
												<h3><?php echo substr($b_ads->title, 0, 20); ?></h3>
												<hr class="separator">
											</div>
										</div>	
										<?php	} ?>
										<!-- End Item carousel Boxed-->
									</div>
								</div>
								<div class="col-sm-3">
									<img src="img/recentad.jpg" alt="" style="height:306px;" class="img-responsive">
								</div>
							</div>
						</div>
						
						<style>
								#jssor_1{
									width:1124px !important;
									 height: 40px !important;
								}
						</style>
						
						<div class="container">
                            <div class="row">
								<!--<div id="m1" class="marquee">	
						
								</div>-->
								<div  id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 980px; height: 40px; overflow: hidden; visibility: hidden;">
									<!-- Loading Screen -->
									<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
										<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
										<div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
									</div>
									<div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 980px; height: 40px; overflow: hidden;">
										<div style="display: none;">
											<img data-u="image" src="img/brand/acer.png" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/brand/canon.png" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/brand/casio.png" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/brand/dell.png" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/brand/htc.png" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/brand/intel.png" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/brand/iPhone.png" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/brand/lenevo.png" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/brand/lg.png" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/brand/motorola.png" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/brand/nexus.png" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/brand/nokia.png" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/brand/ricoh.png" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/brand/samsung.png" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/brand/Windows.png" />
										</div>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </section>
			
			</section>
            <!-- End Content Central -->
			
			   
       <script type="text/javascript" src="js/jssor.slider.min.js"></script>
		<!-- use jssor.slider.debug.js instead for debug -->
		<script>
			jQuery(document).ready(function ($) {
				
				var jssor_1_options = {
				  $AutoPlay: true,
				  $Idle: 0,
				  $AutoPlaySteps: 4,
				  $SlideDuration: 1600,
				  $SlideEasing: $Jease$.$Linear,
				  $PauseOnHover: 4,
				  $SlideWidth: 115,
				  $Cols: 8
				};
				
				var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
				
				//responsive code begin
				//you can remove responsive code if you don't want the slider scales while window resizing
				function ScaleSlider() {
					var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
					if (refSize) {
						refSize = Math.min(refSize, 1124);
						jssor_1_slider.$ScaleWidth(refSize);
					}
					else {
						window.setTimeout(ScaleSlider, 50);
					}
				}
				ScaleSlider();
				$(window).bind("load", ScaleSlider);
				$(window).bind("resize", ScaleSlider);
				$(window).bind("orientationchange", ScaleSlider);
				//responsive code end
			});
		</script>