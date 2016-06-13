<link rel="stylesheet" href="libs/slider.css">
<script type="text/javascript" src="js/jssor.slider.min.js"></script>
<style>
.pound_sym_recomended{padding-right: 25px !important;background: url("<?php echo base_url(); ?>img/icons/pound_safarin.png") no-repeat left !important;}
</style>

<div class="row">
<?php
foreach ($my_ads_details as $m_details) {

if ($m_details->currency == 'pound') {
$currency = '<span class="pound_sym pound_sym_recomended"></span>';
}
else if ($m_details->currency == 'euro') {
$currency = '<span class="euro_sym"></span>';
}

if ($m_details->category_id == '1') {
$jobtype = mysql_result(mysql_query("select jobtype from job_details WHERE ad_id = '$m_details->ad_id'"),0,'jobtype');
}
?>

<?php 
if (($m_details->package_type == '3' || $m_details->package_type == '6') && $m_details->urgent_package != '0') {
?>
<div class="col-xs-12 col-sm-6 col-md-4">
	<div class="most_valued_badge">
	</div>
<div class="img-hover box_img">
<img src="<?php echo base_url(); ?>pictures/<?php echo $m_details->img_name; ?>" alt="<?php echo $m_details->img_name; ?>" title="jobs" class="img-responsive">
<div class="overlay descurl"><a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>/<?php echo str_replace(" ", "-", str_replace("&", "", $m_details->deal_tag)); ?>" ><i class="fa fa-link"></i></a></div>
</div>
<div class="info-gallery">
<h3><?php echo substr($m_details->deal_tag,0,17); ?></h3>
<hr class="separator">
<?php if ($m_details->category_id != '1') { ?>
<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
<?php }
else{?>
<h3 class="job_price"><?php echo "<span class='pound_sym'></span>".$jobtype."-<span class='pound_sym'></span>".$jobmax; ?></h3>
<?php } ?>
<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>/<?php echo str_replace(" ", "-", str_replace("&", "", $m_details->deal_tag)); ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right descurl"><span>View Details</span></a>
<?php
if($m_details->ad_type == 'business'){
if ($m_details->bus_logo != '') { ?>
<div class="bus_logo">
<span></span><b><img data-u="image" src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $m_details->bus_logo; ?>" alt='<?php echo $m_details->bus_logo; ?>'/></b>
</div>
<?php }
else{ ?>
<div class="bus_logo">
<span></span><b><img data-u="image" src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt='trader' title="Business Logo" /></b>
</div>
<?php } 
}
?>
<div class="sig_price">
<span></span><b>
<img src="<?php echo base_url(); ?>img/icons/crown.png" class="pull-right" alt="Crown" title="Best Deal"></b>
</div>
</div>
</div>
<?php } ?>


<?php 
if (($m_details->package_type == 3 || $m_details->package_type == 6) && $m_details->urgent_package == 0) {
?>
<div class="col-xs-12 col-sm-6 col-md-4">
<div class="img-hover box_img">
<img src="<?php echo base_url(); ?>pictures/<?php echo $m_details->img_name; ?>" alt="<?php echo $m_details->img_name; ?>" title="jobs" class="img-responsive">
<div class="overlay descurl"><a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>/<?php echo str_replace(" ", "-", str_replace("&", "", $m_details->deal_tag)); ?>" ><i class="fa fa-link"></i></a></div>
</div>
<div class="info-gallery">
<h3><?php echo substr($m_details->deal_tag,0,17); ?></h3>
<hr class="separator">
<?php if ($m_details->category_id != '1') { ?>
<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
<?php }
else{?>
<h3 class="job_price"><?php echo "<span class='pound_sym'></span>".$jobtype."-<span class='pound_sym'></span>".$jobmax; ?></h3>
<?php } ?>
<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>/<?php echo str_replace(" ", "-", str_replace("&", "", $m_details->deal_tag)); ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right descurl"><span>View Details</span></a>
<?php
if($m_details->ad_type == 'business'){
if ($m_details->bus_logo != '') { ?>
<div class="bus_logo">
<span></span><b><img data-u="image" src="<?php echo base_url(); ?>pictures/business_logos/<?php echo $m_details->bus_logo; ?>" alt='<?php echo $m_details->bus_logo; ?>'/></b>
</div>
<?php }
else{ ?>
<div class="bus_logo">
<span></span><b><img data-u="image" src="<?php echo base_url(); ?>pictures/business_logos/trader.png" alt='trader' title="Business Logo" /></b>
</div>
<?php } 
}
?>
<div class="sig_price">
<span></span><b>
<img src="<?php echo base_url(); ?>img/icons/crown.png" class="pull-right" alt="Crown" title="Best Deal"></b>
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
<div class="overlay descurl">
<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>/<?php echo str_replace(" ", "-", str_replace("&", "", $m_details->deal_tag)); ?>"><i class="top_20 fa fa-link"></i></a>
</div>
</div>
<div class="info-gallery gold_bgcolor">
<h3><?php echo substr($m_details->deal_tag,0,21); ?></h3>
<hr class="separator">
<?php if ($m_details->category_id != '1') { ?>
<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
<?php }
else{ ?>
<h3 class="home_price"><?php echo $jobtype; ?></h3>		
<?php	}
?>
<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>/<?php echo str_replace(" ", "-", str_replace("&", "", $m_details->deal_tag)); ?>" class="btn_v btn-3 btn-3d descurl fa fa-arrow-right"><span>View Details</span></a>
<div class="price">
<b><img src="<?php echo base_url(); ?>img/icons/thumb.png" alt="Thumb" title="Right Deal"></b>
</div>
</div>
</div>
<?php } ?>

<?php 
if (($m_details->package_type == 2 || $m_details->package_type == 5) && $m_details->urgent_package == 0) {
?>
<div class="col-xs-12 col-sm-6 col-md-4">
<div class="img-hover box_img">
<img src="<?php echo base_url(); ?>pictures/<?php echo $m_details->img_name; ?>" alt="" class="img-responsive">
<div class="overlay descurl">
<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>/<?php echo str_replace(" ", "-", str_replace("&", "", $m_details->deal_tag)); ?>"><i class="top_20 fa fa-link"></i></a>
</div>
</div>
<div class="info-gallery gold_bgcolor">
<h3><?php echo substr($m_details->deal_tag,0,21); ?></h3>
<hr class="separator">
<?php if ($m_details->category_id != '1') { ?>
<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
<?php }
else{ ?>
<h3 class="home_price"><?php echo $jobtype; ?></h3>		
<?php	}
?>
<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>/<?php echo str_replace(" ", "-", str_replace("&", "", $m_details->deal_tag)); ?>" class="btn_v btn-3 btn-3d descurl fa fa-arrow-right"><span>View Details</span></a>
<div class="price">
<b><img src="<?php echo base_url(); ?>img/icons/thumb.png" alt="Thumb" title="Right Deal"></b>
</div>
</div>
</div>
<?php } ?>


<?php 
if (($m_details->package_type == 1 || $m_details->package_type == 4) && $m_details->urgent_package != 0) {
?>
<div class="col-xs-12 col-sm-6 col-md-4">
<div class="featured-badge">
</div>
<div class="img-hover box_img">
<img src="<?php echo base_url(); ?>pictures/<?php echo $m_details->img_name; ?>" alt="" class="img-responsive">
<div class="overlay descurl">
<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>/<?php echo str_replace(" ", "-", str_replace("&", "", $m_details->deal_tag)); ?>"><i class="top_20 fa fa-link"></i></a>
</div>
</div>
<div class="info-gallery">
<h3><?php echo substr($m_details->deal_tag,0,21); ?></h3>
<hr class="separator">
<?php if ($m_details->category_id != '1') { ?>
<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
<?php }
else{ ?>
<h3 class="home_price"><?php echo $jobtype; ?></h3>		
<?php	}
?>
<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>/<?php echo str_replace(" ", "-", str_replace("&", "", $m_details->deal_tag)); ?>" class="btn_v btn-3 btn-3d descurl fa fa-arrow-right"><span>View Details</span></a>
</div>
</div>
<?php } ?>


<?php 
if (($m_details->package_type == 1 || $m_details->package_type == 4) && $m_details->urgent_package == 0) {
?>
<div class="col-xs-12 col-sm-6 col-md-4">
<div class="img-hover box_img">
<img src="<?php echo base_url(); ?>pictures/<?php echo $m_details->img_name; ?>" alt="" class="img-responsive">
<div class="overlay descurl">
<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>/<?php echo str_replace(" ", "-", str_replace("&", "", $m_details->deal_tag)); ?>"><i class="top_20 fa fa-link"></i></a>
</div>
</div>
<div class="info-gallery">
<h3><?php echo substr($m_details->deal_tag,0,21); ?></h3>
<hr class="separator">
<?php if ($m_details->category_id != '1') { ?>
<h3 class="home_price"><?php echo $currency.number_format($m_details->price); ?></h3>
<?php }
else{ ?>
<h3 class="home_price"><?php echo $jobtype; ?></h3>		
<?php	}
?>
<a href="<?php echo base_url(); ?>description_view/details/<?php echo $m_details->ad_id; ?>/<?php echo str_replace(" ", "-", str_replace("&", "", $m_details->deal_tag)); ?>" class="btn_v btn-3 btn-3d descurl fa fa-arrow-right"><span>View Details</span></a>
</div>
</div>
<?php } ?>

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