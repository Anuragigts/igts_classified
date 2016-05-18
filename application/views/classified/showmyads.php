 <div class="content_info">
	<div class="paddings-mini">
		<div class="container">
			
				<div class="titles">
					<h2>MOST <span>VALUE </span>ADS</h2>
					<hr class="tall">
				</div>                    
			<!-- Nav Filters -->
			<!-- <div class="portfolioFilter">
				<a href="#" data-filter="*" class="current">Show All</a>
				<a href="#jobs" data-filter=".jobs">jobs</a>
				<a href="#services" data-filter=".services">Services</a>
				<a href="#pets" data-filter=".pets">Pets</a>
				<a href="#deals" data-filter=".deals">Deals</a>
				<a href="#ezone" data-filter=".ezone">E-Zone</a>
			</div> -->
			<!-- End Nav Filters -->

			<!-- Items Gallery filters-->
			<div class="portfolioContainer">
				
				<?php foreach ($most_list as $m_list){
					?>
			 <div class="col-xs-12 col-sm-6 col-md-3 jobs">
				<?php if($m_list->img == ''){
													?>
													<div class="img-hover">
						<img src="pictures/no_image.png" alt="" class="img-responsive">
						<div class="overlay"><a href="pictures/no_image.png" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
					</div>
												<?php }
												else{ ?>
												<div class="img-hover">
						<img src="pictures/<?php echo $m_list->img; ?>" alt="" class="img-responsive">
						<div class="overlay"><a href="pictures/<?php echo $m_list->img; ?>" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
					</div>
											<?php	} ?>
					

					<div class="info-gallery">
						<h3><?php echo substr($m_list->title, 0, 20); ?></h3>
						<hr class="separator">
						<p><?php echo substr($m_list->ad_desc, 0, 20); ?></p>
						<ul class="starts">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
						</ul>
						<div class="content-btn"><a href="#" class="btn btn-primary">View Details</a></div>
						<div class="price"><span></span><b><i class="fa fa-hand-o-right"></i></b></div>
					</div>
				</div>

				<?php } ?>
		   </div>   
			<!-- End Items Gallery filters-->       
		</div>
	</div>
</div>

<div class="content_info">
	<div class="paddings-mini">
		<div class="container">
			
				<div class="titles">
					<h2><span>SIGNIFICANT </span>ADS</h2>
					<hr class="tall">
				</div>                    
		   <!-- Nav Filters -->
			<!-- <div class="portfolioFilter">
				<a href="#" data-filter="*" class="current">Show All</a>
				<a href="#jobs" data-filter=".jobs">jobs</a>
				<a href="#services" data-filter=".services">Services</a>
				<a href="#pets" data-filter=".pets">Pets</a>
				<a href="#deals" data-filter=".deals">Deals</a>
				<a href="#ezone" data-filter=".ezone">E-Zone</a>
			</div> -->
			<!-- End Nav Filters -->

			<!-- Items Gallery filters-->
			<div class="portfolioContainer">
				
				<?php foreach ($sig_ads as $s_ads){
					?>
			 <div class="col-xs-12 col-sm-6 col-md-3 jobs">
				<?php if($s_ads->img == ''){
													?>
													<div class="img-hover">
						<img src="pictures/no_image.png" alt="" class="img-responsive">
						<div class="overlay"><a href="pictures/no_image.png" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
					</div>
												<?php }
												else{ ?>
												<div class="img-hover">
						<img src="pictures/<?php echo $s_ads->img; ?>" alt="" class="img-responsive">
						<div class="overlay"><a href="pictures/<?php echo $s_ads->img; ?>" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
					</div>
											<?php   } ?>
					

					<div class="info-gallery">
						<h3><?php echo substr($s_ads->title, 0, 20); ?></h3>
						<hr class="separator">
						<p><?php echo substr($s_ads->ad_desc, 0, 20); ?></p>
						<ul class="starts">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
						</ul>
						<div class="content-btn"><a href="#" class="btn btn-primary">View Details</a></div>
						<div class="price"><span></span><b><i class="fa fa-hand-o-right"></i></b></div>
					</div>
				</div>

				<?php } ?>
		   </div>   
			<!-- End Items Gallery filters-->       
		</div>
	</div>
</div>

<div class="content_info">
	<div class="paddings-mini">
		<div class="container">
			
				<div class="titles">
					<h2><span>CRUCIAL </span>ADS</h2>
					<hr class="tall">
				</div>                    
		   <!-- Nav Filters -->
			<!-- <div class="portfolioFilter">
				<a href="#" data-filter="*" class="current">Show All</a>
				<a href="#jobs" data-filter=".jobs">jobs</a>
				<a href="#services" data-filter=".services">Services</a>
				<a href="#pets" data-filter=".pets">Pets</a>
				<a href="#deals" data-filter=".deals">Deals</a>
				<a href="#ezone" data-filter=".ezone">E-Zone</a>
			</div> -->
			<!-- End Nav Filters -->

			<!-- Items Gallery filters-->
			<div class="portfolioContainer">
				
				<?php foreach ($crucial_ads as $cru_ads){
					?>
			 <div class="col-xs-12 col-sm-6 col-md-3 jobs">
				<?php if($cru_ads->img == ''){
													?>
													<div class="img-hover">
						<img src="pictures/no_image.png" alt="" class="img-responsive">
						<div class="overlay"><a href="pictures/no_image.png" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
					</div>
												<?php }
												else{ ?>
												<div class="img-hover">
						<img src="pictures/<?php echo $cru_ads->img; ?>" alt="" class="img-responsive">
						<div class="overlay"><a href="pictures/<?php echo $cru_ads->img; ?>" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
					</div>
											<?php   } ?>
					

					<div class="info-gallery">
						<h3><?php echo substr($cru_ads->title, 0, 20); ?></h3>
						<hr class="separator">
						<p><?php echo substr($cru_ads->ad_desc, 0, 20); ?></p>
						<ul class="starts">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
						</ul>
						<div class="content-btn"><a href="#" class="btn btn-primary">View Details</a></div>
						<div class="price"><span></span><b><i class="fa fa-hand-o-right"></i></b></div>
					</div>
				</div>

				<?php } ?>
		   </div>   
			<!-- End Items Gallery filters-->       
		</div>
	</div>
</div>

 <div class="content_info">
	<div class="paddings-mini">
		<div class="container">
			
				<div class="titles">
					<h2><span>RECENT </span>ADS</h2>
					<hr class="tall">
				</div>                    
		   <!-- Nav Filters -->
			<!-- <div class="portfolioFilter">
				<a href="#" data-filter="*" class="current">Show All</a>
				<a href="#jobs" data-filter=".jobs">jobs</a>
				<a href="#services" data-filter=".services">Services</a>
				<a href="#pets" data-filter=".pets">Pets</a>
				<a href="#deals" data-filter=".deals">Deals</a>
				<a href="#ezone" data-filter=".ezone">E-Zone</a>
			</div> -->
			<!-- End Nav Filters -->

			<!-- Items Gallery filters-->
			<div class="portfolioContainer">
				
				<?php foreach ($free_ads as $f_ads){
					?>
			 <div class="col-xs-12 col-sm-6 col-md-3 jobs">
				<?php if($f_ads->img_name == ''){
													?>
													<div class="img-hover">
						<img src="pictures/no_image.png" alt="" class="img-responsive">
						<div class="overlay"><a href="pictures/no_image.png" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
					</div>
												<?php }
												else{ ?>
												<div class="img-hover">
						<img src="pictures/<?php echo $f_ads->img_name; ?>" alt="" class="img-responsive">
						<div class="overlay"><a href="pictures/<?php echo $f_ads->img_name; ?>" class="fancybox"><i class="fa fa-plus-circle"></i></a></div>
					</div>
											<?php   } ?>
					

					<div class="info-gallery">
						<h3><?php echo substr($f_ads->title, 0, 20); ?></h3>
						<hr class="separator">
						<p><?php echo substr($f_ads->ad_desc, 0, 20); ?></p>
						<ul class="starts">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
						</ul>
						<div class="content-btn"><a href="#" class="btn btn-primary">View Details</a></div>
						<div class="price"><span></span><b><i class="fa fa-hand-o-right"></i></b></div>
					</div>
				</div>

				<?php } ?>
		   </div>   
			<!-- End Items Gallery filters-->       
		</div>
	</div>
</div>