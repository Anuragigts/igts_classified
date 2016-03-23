	<link rel="stylesheet" href="libs/slider.css">
	<script type="text/javascript" src="js/jssor.slider.min.js"></script>
	<!-- use jssor.slider.debug.js instead for debug -->
	
	<div class="row">
		<?php
		 foreach ($my_ads_details as $m_details) {
		/*currency symbol*/ 
		if ($m_details->currency == 'pound') {
			$currency = '<span class="pound_sym"></span>';
		}
		else if ($m_details->currency == 'euro') {
			$currency = '<span class="euro_sym"></span>';
		}

		if ($m_details->category_id == '1') {
			$jobtype = mysql_result(mysql_query("select jobtype from job_details WHERE ad_id = '$m_details->ad_id'"),0,'jobtype');
		}
	?>
		<!-- platinum+urgent starts -->
		<?php 
		if (($m_details->package_type == '3' || $m_details->package_type == '6') && $m_details->urgent_package != '0') {
		 ?>
		<div class="col-xs-12 col-sm-6 col-md-4">
			<div class="featured-badge">
				
			</div>
			<div class="xuSlider xuSlider_plat_urgtnt">
				<ul class="sliders">
					<?php 
						$pic = mysql_query("select * from ad_img WHERE ad_id = '$m_details->ad_id'");
						while ($res = mysql_fetch_object($pic)) { ?>
						<li><img src="<?php echo base_url(); ?>pictures/<?php echo $res->img_name; ?>" class="img-responsive" alt="<?php echo $res->img_name; ?>" title="<?php echo $res->img_name; ?>"></li>
						<?php	
							}
						 ?>
				</ul>
				<div class="direction-nav">
					<a href="javascript:;" class="prev icon-circle-arrow-left icon-4x"><i>Previous</i></a>
					<a href="javascript:;" class="next icon-circle-arrow-right icon-4x"><i>Next</i></a>
				</div>
				<div class="control-nav">
					<li data-id="1"><a href="javascript:;">1</a></li>
					<li data-id="2"><a href="javascript:;">2</a></li>
					<li data-id="3"><a href="javascript:;">3</a></li>
					<li data-id="4"><a href="javascript:;">4</a></li>
					<li data-id="5"><a href="javascript:;">5</a></li>
				</div>	
			</div>
			<div class="info-gallery">
				<h3><?php echo substr($m_details->deal_tag,0,18); ?></h3>
				<hr class="separator">
				<?php if ($m_details->category_id != '1') { ?>
				<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
				<?php }
				else{ ?>
					<h3 class="home_price"><?php echo $jobtype; ?></h3>		
				<?php	}
				?>
				<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
				<div class="price">
					<b><img src="<?php echo base_url(); ?>img/icons/crown.png" alt="crown" title="Best Deal"></b> 
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- platinum+urgent ends -->
		
		<!-- platinum starts -->
		<?php 
		if (($m_details->package_type == 3 || $m_details->package_type == 6) && $m_details->urgent_package == 0) {
		 ?>
		<div class="col-xs-12 col-sm-6 col-md-4">
			<div class="xuSlider xuSlider_plat">
				<ul class="sliders">
					<?php 
					$pic = mysql_query("select * from ad_img WHERE ad_id = '$m_details->ad_id'");
					while ($res = mysql_fetch_object($pic)) { ?>
					<li><img src="<?php echo base_url(); ?>pictures/<?php echo $res->img_name; ?>" class="img-responsive" alt="<?php echo $res->img_name; ?>" title="<?php echo $res->img_name; ?>"></li>
					<?php	
						}
					 ?>
				</ul>
				<div class="direction-nav">
					<a href="javascript:;" class="prev icon-circle-arrow-left icon-4x"><i>Previous</i></a>
					<a href="javascript:;" class="next icon-circle-arrow-right icon-4x"><i>Next</i></a>
				</div>
				<div class="control-nav">
					<li data-id="1"><a href="javascript:;">1</a></li>
					<li data-id="2"><a href="javascript:;">2</a></li>
					<li data-id="3"><a href="javascript:;">3</a></li>
					<li data-id="4"><a href="javascript:;">4</a></li>
					<li data-id="5"><a href="javascript:;">5</a></li>
				</div>	
			</div>
			<div class="info-gallery">
				<h3><?php echo substr($m_details->deal_tag,0,18); ?></h3>
				<hr class="separator">
				<?php if ($m_details->category_id != '1') { ?>
				<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
				<?php }
				else{ ?>
					<h3 class="home_price"><?php echo $jobtype; ?></h3>		
				<?php	}
				?>
				<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
				<div class="price">
					<b><img src="<?php echo base_url(); ?>img/icons/crown.png" alt="crown" title="Best Deal"></b>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- platinum ends -->
		
		<!-- gold+urgent starts -->
		<?php 
		if (($m_details->package_type == 2 || $m_details->package_type == 5) && $m_details->urgent_package != 0) {
		 ?>
		<div class="col-xs-12 col-sm-6 col-md-4">
			<div class="featured-badge">
				
			</div>
			<div class="img-hover box_img">
				<img src="<?php echo base_url(); ?>pictures/<?php echo $m_details->img_name; ?>" alt="" class="img-responsive">
				<div class="overlay">
					<a href="description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a>
				</div>
			</div>
			<div class="info-gallery gold_bgcolor">
				<h3><?php echo substr($m_details->deal_tag,0,18); ?></h3>
				<hr class="separator">
				<?php if ($m_details->category_id != '1') { ?>
				<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
				<?php }
				else{ ?>
					<h3 class="home_price"><?php echo $jobtype; ?></h3>		
				<?php	}
				?>
				<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
				<div class="price">
					<b><img src="<?php echo base_url(); ?>img/icons/thumb.png" alt="Thumb" title="Right Deal"></b>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- gold+urgent starts -->
	
		<!-- gold starts -->
		<?php 
	if (($m_details->package_type == 2 || $m_details->package_type == 5) && $m_details->urgent_package == 0) {
	 ?>
		<div class="col-xs-12 col-sm-6 col-md-4">
			<div class="img-hover box_img">
				<img src="<?php echo base_url(); ?>pictures/<?php echo $m_details->img_name; ?>" alt="" class="img-responsive">
				<div class="overlay">
					<a href="description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a>
				</div>
			</div>
			<div class="info-gallery gold_bgcolor">
				<h3><?php echo substr($m_details->deal_tag,0,18); ?></h3>
				<hr class="separator">
				<?php if ($m_details->category_id != '1') { ?>
				<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
				<?php }
				else{ ?>
					<h3 class="home_price"><?php echo $jobtype; ?></h3>		
				<?php	}
				?>
				<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
				<div class="price">
					<b><img src="<?php echo base_url(); ?>img/icons/thumb.png" alt="Thumb" title="Right Deal"></b>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- gold ends-->
		
		<!-- free+urgent starts-->
		<?php 
	if (($m_details->package_type == 1 || $m_details->package_type == 4) && $m_details->urgent_package != 0) {
	 ?>
		<div class="col-xs-12 col-sm-6 col-md-4">
			<div class="featured-badge">
				
			</div>
			<div class="img-hover box_img">
				<img src="<?php echo base_url(); ?>pictures/<?php echo $m_details->img_name; ?>" alt="" class="img-responsive">
				<div class="overlay">
					<a href="description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a>
				</div>
			</div>
			<div class="info-gallery">
				<h3><?php echo substr($m_details->deal_tag,0,18); ?></h3>
				<hr class="separator">
				<?php if ($m_details->category_id != '1') { ?>
				<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
				<?php }
				else{ ?>
					<h3 class="home_price"><?php echo $jobtype; ?></h3>		
				<?php	}
				?>
				<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
			</div>
		</div>
		<?php } ?>
		<!-- free+urgent ends-->
		
		<!-- free starts-->
		<?php 
	if (($m_details->package_type == 1 || $m_details->package_type == 4) && $m_details->urgent_package == 0) {
	 ?>
		<div class="col-xs-12 col-sm-6 col-md-4">
			<div class="img-hover box_img">
				<img src="<?php echo base_url(); ?>pictures/<?php echo $m_details->img_name; ?>" alt="" class="img-responsive">
				<div class="overlay">
					<a href="description_view/details/<?php echo $m_details->ad_id; ?>"><i class="top_20 fa fa-link"></i></a>
				</div>
			</div>
			<div class="info-gallery">
				<h3><?php echo substr($m_details->deal_tag,0,18); ?></h3>
				<hr class="separator">
				<?php if ($m_details->category_id != '1') { ?>
				<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
				<?php }
				else{ ?>
					<h3 class="home_price"><?php echo $jobtype; ?></h3>		
				<?php	}
				?>
				<a href="description_view/details/<?php echo $m_details->ad_id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
			</div>
		</div>
		<?php } ?>
		<!-- free ends-->
		<?php } ?>

		<div class=''>
			<div class='col-md-12'>
				<?php echo $paging_links; ?>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="<?php echo base_url(); ?>libs/jquery.xuSlider.js"></script>
	
	<script>
		$('.xuSlider').xuSlider();
	</script>