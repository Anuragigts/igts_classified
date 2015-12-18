 <!-- Slide And Filter Section-->    
            <section class="tp-banner-container">
                <!-- SLIDE  -->
                <div class="tp-banner">
                   <img src="img/slide/2.jpg"  alt="fullslide1"> 
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
                                    <option value="1">Motors</option>
                                    <option value="2">For Sale</option>
                                    <option value="3">Property</option>
                                    <option value="4">Jobs</option>
                                    <option value="5">Services</option>
                                </select>
                                <span class="custom-select">All Categories</span>
                            </div>
							<input type="text" required="required" placeholder="Location" class="input-large">
                            <i class="fa fa-map-marker fa-2x" style="padding: 8px;"></i>
							<input class="date-input" id="slider-range" type="text"  value="" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="5"//> 
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
								<section class="wrapper">
								   <ul  class="typing">
								   	<?php foreach (@$news as $n_val) { ?>
								   	<li><?php echo rtrim(implode(",", $n_val), ",") ?></li>
								   	<?php } ?>
								        	<!-- <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
								            <li>CONTEMPORY 2 BED FLAT TO RENT IN GANTS HILL</li>
								            <li>Cockerel free to good home</li>
								            <li>Piaggio typhoon 125 reg as 50</li>> -->
								        </ul>
								      </section>
								  </div>
							<!-- <div class="col-md-9 marque_text">
								<span id="mymark1" style="display:none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.consectetur adipiscing elit consectetur adipiscing elit.</span>
								<span id="mymark2" style="display:none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.consectetur adipiscing elit consectetur adipiscing elit.</span>
								<span id="mymark3" style="display:none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.consectetur adipiscing elit consectetur adipiscing elit.</span>
								<span id="mymark"></span>
							
							</div>  -->                   
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
										<h2><span>SIGNIFICANT </span>ADS</h2>
										<hr class="tall">
									</div>                    
								</div>                    
                            </div>
                        </div>
						<div class="container">
							<div class="row">
								<div class="col-md-8">
									<ul class="services-lines full-services">
										<li>
											<div class="item-service-line">
												<img src="img/featured/jobs.png" class="fa fa-plane img-responsive" alt="">
												<h5>Jobs</h5>
											</div>
										</li>
										 <li>
											<div class="item-service-line">
												<img src="img/featured/services.png" class="fa fa-plane img-responsive" alt="">
												<h5>Services</h5>
											</div>
										</li>
										<li>
											<div class="item-service-line">
												<img src="img/featured/motorpoint.png" class="fa fa-plane img-responsive" alt="">
												<h5>Motor Point</h5>
											</div>
										</li>
										<li>
											<div class="item-service-line">
												<img src="img/featured/property.png" class="fa fa-plane img-responsive" alt="">
												<h5>Find a Property</h5>
											</div>
										</li>
										<li>
											<div class="item-service-line">
												<img src="img/featured/pets.png" class="fa fa-plane img-responsive" alt="">
												<h5>Pets</h5>
											</div>
										</li>
										<li>
											<div class="item-service-line">
												<img src="img/featured/lifestyle.png" class="fa fa-plane img-responsive" alt="">
												<h5>Clothing & LifeStyles</h5>
											</div>
										</li>
										<li>
											<div class="item-service-line">
												<img src="img/featured/kitchen.png" class="fa fa-plane img-responsive" alt="">
												<h5>Home & Kitchen</h5>
											</div>
										</li>
										<li>
											<div class="item-service-line">
												<img src="img/featured/ezone.png" class="fa fa-plane img-responsive" alt="">
												<h5>E-Zone</h5>
											</div>
										</li>
										<li>
											<div class="item-service-line">
												<img src="img/featured/deals.png" class="fa fa-plane img-responsive" alt="">
												<h5>Deals</h5>
											</div>
										</li>
									</ul>
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
								<h2>MOST <span>VALUE </span>ADS</h2>
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
                                
                                <!-- End Item Gallery-->
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
                                <h2><span>RECENT </span>ADS</h2>
                            </div>
                        </div>
                        <!-- End Title-->
						
						<div class="container">
                            <div class="row">
                                <div class="col-sm-3">
									<img src="img/recentad.png" alt="" style="height:368px;" class="img-responsive">
								</div>
								 <?php foreach (@$free_ads as $f_ads) {
                            	?>
								<div class="col-sm-3">
									<?php if($f_ads->img_name == ''){
													?>
									<div class="img-hover">
										<img src="ad_images/no_image.png" alt="" class="img-responsive">
										<div class="overlay"><a href="ad_images/no_image.png" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>
									 <?php 	}
												else{ ?>
												<div class="img-hover">
										<img src="ad_images/<?php echo $f_ads->img_name; ?>" alt="" class="img-responsive">
										<div class="overlay"><a href="ad_images/<?php echo $f_ads->img_name; ?>" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>
												<?php	} ?>
									<div class="info-gallery">
										<h3><?php echo substr($f_ads->title, 0, 20); ?></h3>
										<hr class="separator">
										<p><?php echo substr($f_ads->ad_desc, 0, 20); ?> </p>
										<div class="content-btn top_10"><a href="#" class="btn btn-primary">View Details</a></div>
										<div class="price"><span></span><b><i class="fa fa-fire"></i></b></div>
									</div>
								</div>
								 <?php	} ?>
								
								
                            </div>
                        </div>
                       <!-- End boxes-carousel-->
					   
					   <div class="container">
							<div class="titles recen_ad">
                                <h2><span>Business </span>ADS</h2>
                            </div>
                        </div>
                        <!-- End Title-->
						
						<div class="container">
                            <div class="row">
                                <div class="col-sm-3">
									<div class="img-hover">
										<img src="img/mostvalue/sample5.JPG" alt="" class="img-responsive">
										<div class="overlay"><a href="img/mostvalue/sample5.JPG" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>

									<div class="info-gallery">
										<h3>Sample Text Here</h3>
										<hr class="separator">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="img-hover">
										<img src="img/mostvalue/sample5.JPG" alt="" class="img-responsive">
										<div class="overlay"><a href="img/mostvalue/sample5.JPG" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>

									<div class="info-gallery">
										<h3>Sample Text Here</h3>
										<hr class="separator">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="img-hover">
										<img src="img/mostvalue/sample7.JPG" alt="" class="img-responsive">
										<div class="overlay"><a href="img/mostvalue/sample7.JPG" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>

									<div class="info-gallery">
										<h3>Sample Text Here</h3>
										<hr class="separator">
									</div>
								</div>
								<div class="col-sm-3">
									<div class="img-hover">
										<img src="img/mostvalue/sample8.JPG" alt="" class="img-responsive">
										<div class="overlay"><a href="img/mostvalue/sample8.JPG" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
									</div>

									<div class="info-gallery">
										<h3><a href="#">Sample Text Here</a></h3>
										<hr class="separator">
									</div>
								</div>
                            </div>
                        </div>
						
						<div class="container">
                            <div class="row">
								<div id="m1" class="marquee">	
						
								</div>
                               <!--- <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 980px; height: 100px; overflow: hidden; visibility: hidden;">
									<!-- Loading Screen --
									<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
										<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
										<div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
									</div>
									<div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 980px; height: 100px; overflow: hidden;">
										<div style="display: none;">
											<img data-u="image" src="img/amazon.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/android.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/bitly.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/blogger.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/dnn.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/drupal.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/ebay.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/facebook.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/google.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/ibm.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/ios.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/joomla.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/linkedin.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/mac.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/magento.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/pinterest.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/samsung.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/twitter.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/windows.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/wordpress.jpg" />
										</div>
										<div style="display: none;">
											<img data-u="image" src="img/youtube.jpg" />
										</div>
									</div>
								</div>--->
                            </div>
                        </div>
                    </div>
                </section>
			
			</section>