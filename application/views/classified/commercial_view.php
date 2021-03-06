<!DOCTYPE html>
<html>
<head>

<title>Right Deals :: Commercial View</title>

<!-- xxx Head Content xxx -->
<?php echo $this->load->view('common/head');?> 
<!-- xxx End xxx -->

<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>js/filter.css"> 
<link rel="stylesheet" href="<?php echo base_url(); ?>libs/slider.css">
<script type="text/javascript" src="<?php echo base_url(); ?>js/jssor.slider.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
$('.cd-filter-content').niceScroll({
autohidemode: 'false',     
cursorborderradius: '0px', 
background: '#f4f4f4',     
cursorwidth: '8px',       
cursorcolor: '#E95413'     
});
});
</script>

</head>

<body id="home">

<div class="preloader"><div class="status">&nbsp;</div></div> 

<div id="layout">

<!-- xxx tophead Content xxx -->
<?php echo $this->load->view('common/tophead'); ?> 
<!-- xxx End tophead xxx -->

<div class="section-title-01"><div class="bg_parallax image_01_parallax"></div></div>   

<section class="content-central">
<div class="semiboxshadow text-center">
<img src="<?php echo base_url(); ?>img/img-theme/shp-1090x457.png" class="img-responsive" alt="Shadow" title="Shadow view">
</div>
<form id="j-forms" action="#" class="j-forms" method="post" style="background-color: rgb(255, 255, 255) !important;">
<div class="content_info">
<div class="paddings">
<div class="container pad_bott_50">
<div class="row">
<div class="col-md-10 col-sm-8 col-md-offset-1">
<img src="<?php echo base_url(); ?>img/slide/ban5.jpg" alt="add" title="Adds">
</div>
</div>
</div>
<div class="container">
<div class="row">

<div class="col-sm-3">
<div class="container-by-widget-filter bg-dark color-white">
<h3 class="title-widget">Property Filter</h3>
<div class="cd-filter-block">
<h4 class="title-widget">Property</h4>
<div class="cd-filter-content">
<div class="filters_categories">	
<ul class="list-styles">
<li><i class="fa fa-arrow-circle-o-right"></i> <a href="residential_view">Residential</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i> <a href="commercial_view" class="active_filter">Commercial </a></li>
</ul>
</div>
</div>
</div> 

<div class="cd-filter-block">
<h4 class="title-widget">No. of Rooms</h4>
<div class="cd-filter-content">
<div>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> 1 BHK 
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> 2 BHK
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> 3 BHK
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> 4 BHK
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> 4+ BHK
</label>
</div>
</div>
</div>

<div class="cd-filter-block">
<h4 class="title-widget closed"> Price Range</h4>
<div class="range1">
<input type="range" name="range" min="0" max="25000" step="50" value="5000">
<output for="range" class="price_output"></output>
</div>
</div>

<div class="cd-filter-block">
<h4 class="title-widget closed"> Posted By</h4>

<div class="cd-filter-content" style="overflow: hidden; display: none;">
<div>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Individual
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Broker
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Builder
</label>
</div>
</div> 
</div>

<div class="cd-filter-block">
<h4 class="title-widget closed"> Furnished</h4>

<div class="cd-filter-content" style="overflow: hidden; display: none;">
<div>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Fully Furnished
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Semi-Furnished
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Unfurnished
</label>
</div>
</div> 
</div>

<div class="cd-filter-block">
<h4 class="title-widget closed"> Area (Sq Ft)</h4>

<div class="cd-filter-content" style="overflow: hidden; display: none;">
<div>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Less than 500
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> 500 - 1000
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> 1000 - 1500
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> 1500 - 2000
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> More than 2000
</label>
</div>
</div> 
</div>

<div class="cd-filter-block">
<h4 class="title-widget closed">Seller Type</h4>

<div class="cd-filter-content" style="overflow: hidden; display: none;">
<div>
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
</div>
</div>
</div>

<div class="cd-filter-block">
<h4 class="title-widget closed">Deals posted in</h4>

<div class="cd-filter-content" style="overflow: hidden; display: none;">
<div id="limit_scrol">
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i>Last 24 Hours
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Last 3 Days
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Last 7 Days
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Last 14 Days
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Last 1 Month
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Last 2 Month
</label>
</div>
</div>
</div> 

<div class="cd-filter-block">
<h4 class="title-widget closed">Location</h4>

<div class="cd-filter-content" style="overflow: hidden; display: none;">
<div id="limit_scrol">
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Madhapur
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Banjara Hills
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> madhapur
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Secunderabad 
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Kachiguda 
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> JNTU 
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> KPHP 
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Jubilee Hills 
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Lakdikapul
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Khairatabad
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Dilsukhnagar
</label>
<label class="checkbox">
<input type="checkbox" name="" value="" >
<i></i> Others
</label>
</div>
</div>
</div> 

<div class="cd-filter-block">
<h4 class="title-widget">Search Only</h4>

<div class="cd-filter-content">
<div>
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
</div>
</div> 
</div>
</div>
<div class="row top_20">
<div class="col-sm-12">
<img src="<?php echo base_url(); ?>img/slide/right_ad.jpg" alt="add" title="Adds">
</div>
</div>
<div class="row top_20">
<div class="col-sm-12">
<img src="<?php echo base_url(); ?>img/slide/right_ad.jpg" alt="add" title="Adds">
</div>
</div>
</div>

<div class="col-md-9">
<div class="sort-by-container tooltip-hover">
<div class="row">
<div class="col-md-9">
<strong>Sort by:</strong>
<ul>                            
<li>
<div class="top_bar_top">
<label class="input select">
<select name="star">
<option value="none" selected disabled="">Select Name</option>
<option value="5">A to Z</option>
<option value="4">Z to A</option>
</select>
<i></i>
</label>
</div>
</li>
<li>
<div class="top_bar_top">
<label class="input select">
<select name="star">
<option value="none" selected disabled="">Select Price</option>
<option value="5">Sort Ascending</option>
<option value="4">Sort Descending</option>
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
<a href="">
<i class="fa fa-th-large"></i>
</a>
</li>
<li data-toggle="tooltip" title="" data-original-title="LIST VIEW" class="active">
<a href="commercial_view">
<i class="fa fa-list"></i>
</a>
</li> 
</ul>
</div>
</div>
</div>

<div class="row list_view_searches">
<div class="col-md-12">
<div class="first_list">
<div class="row">
<div class="col-sm-4">
<div class="featured-badge">
<span>Urgent</span>
</div>
<div class="xuSlider">
<ul class="sliders">
<li><img src="img/blog/002.jpg" class="img-responsive" alt="Slider1" title="Sliders"></li>
<li><img src="img/blog/003.jpg" class="img-responsive" alt="Slider2" title="Sliders"></li>
<li><img src="img/blog/004.jpg" class="img-responsive" alt="Slider3" title="Sliders"></li>
<li><img src="img/blog/005.jpg" class="img-responsive" alt="Slider4" title="Sliders"></li>
<li><img src="img/blog/006.jpg" class="img-responsive" alt="Slider5" title="Sliders"></li>
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
<div class="">
<div class="price11">
<span></span><b>
<img src="img/icons/crown-35x35.png" class="pull-right" alt="Crown" title="Crown Icon"></b>
</div>
</div>
</div>
<div class="col-sm-8 middle_text">
<div class="row">
<div class="col-sm-8">
<div class="row">
<div class="col-xs-12">
<h3 class="list_title">Sample text Here</h3>
</div>
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
<img src="img/brand/intel.png" alt="intel" title="intel logo" class="img-responsive">
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
<div class="col-xs-10 col-xs-offset-1 amt_bg">
<h3 class="view_price">£1106</h3>
</div>
<div class="col-xs-12">
<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Message</span></a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="post-meta list_view_bottom" >
<ul>
<li><i class="fa fa-camera"></i><a href="#">2</a></li>
<li><i class="fa fa-video-camera"></i><a href="#">3</a></li>
<li><i class="fa fa-user"></i><a href="#">Person Name</a></li>
<li><i class="fa fa-clock-o"></i><span>April 23, 2015</span></li>
<li><i class="fa fa-eye"></i><span>234 Views</span></li>
<li><span>Deal ID : 112457856</span></li>
<li><i class="fa fa-star"></i><span><a href="#">Saved</a></span></li>
<li><i class="fa fa-edit"></i></li>
<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
</ul>                      
</div>
</div>
</div><hr class="separator">	
</div>

<div class="col-md-12">
<div class="first_list">
<div class="row">
<div class="col-sm-4">
<div class="xuSlider">
<ul class="sliders">
<li><img src="img/blog/002.jpg" class="img-responsive" alt="Slider1" title="Sliders"></li>
<li><img src="img/blog/003.jpg" class="img-responsive" alt="Slider2" title="Sliders"></li>
<li><img src="img/blog/004.jpg" class="img-responsive" alt="Slider3" title="Sliders"></li>
<li><img src="img/blog/005.jpg" class="img-responsive" alt="Slider4" title="Sliders"></li>
<li><img src="img/blog/006.jpg" class="img-responsive" alt="Slider5" title="Sliders"></li>
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
<div class="">
<div class="price11">
<span></span><b>
<img src="img/icons/crown-35x35.png" class="pull-right" alt="Crown" title="Crown Icon"></b>
</div>
</div>
</div>
<div class="col-sm-8 middle_text">
<div class="row">
<div class="col-sm-8">
<div class="row">
<div class="col-xs-12">
<h3 class="list_title">Sample text Here</h3>
</div>
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
<img src="img/brand/intel.png" alt="intel" title="intel logo" class="img-responsive">
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
<div class="col-xs-10 col-xs-offset-1 amt_bg">
<h3 class="view_price">£1106</h3>
</div>
<div class="col-xs-12">
<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Message</span></a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="post-meta list_view_bottom" >
<ul>
<li><i class="fa fa-camera"></i><a href="#">2</a></li>
<li><i class="fa fa-video-camera"></i><a href="#">3</a></li>
<li><i class="fa fa-user"></i><a href="#">Person Name</a></li>
<li><i class="fa fa-clock-o"></i><span>April 23, 2015</span></li>
<li><i class="fa fa-eye"></i><span>234 Views</span></li>
<li><span>Deal ID : 112457856</span></li>
<li><i class="fa fa-star"></i><span><a href="#">Saved</a></span></li>
<li><i class="fa fa-edit"></i></li>
<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
</ul>                      
</div>
</div>
</div><hr class="separator">	
</div>

<div class="col-md-12">
<div class="first_list gold_bgcolor">
<div class="row">
<div class="col-sm-4">
<div class="featured-badge">
<span>Urgent</span>
</div>
<div class="img-hover view_img">
<img src="img/blog/005.jpg" alt="img_1" title="img_1" class="img-responsive">
<div class="overlay"><a href="description_view"><i class="top_20 fa fa-link"></i></a></div>
</div>
<div class="">
<div class="price11">
<span></span><b>
<img src="img/icons/thumb.png" class="pull-right" alt="thumb" title="thumb Icon"></b>
</div>
</div>
</div>
<div class="col-sm-8 middle_text">
<div class="row">
<div class="col-sm-8">
<div class="row">
<div class="col-xs-12">
<h3 class="list_title">Sample text Here</h3>
</div>
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
<img src="img/brand/intel.png" alt="intel" title="intel logo" class="img-responsive">
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
<div class="col-xs-10 col-xs-offset-1 amt_bg">
<h3 class="view_price">£1106</h3>
</div>
<div class="col-xs-12">
<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Message</span></a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="post-meta list_view_bottom gold_bgcolor">
<ul>
<li><i class="fa fa-camera"></i><a href="#">2</a></li>
<li><i class="fa fa-video-camera"></i><a href="#">3</a></li>
<li><i class="fa fa-user"></i><a href="#">Person Name</a></li>
<li><i class="fa fa-clock-o"></i><span>April 23, 2015</span></li>
<li><i class="fa fa-eye"></i><span>234 Views</span></li>
<li><span>Deal ID : 112457856</span></li>
<li><i class="fa fa-star"></i><span><a href="#">Saved</a></span></li>
<li><i class="fa fa-edit"></i></li>
<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
</ul>                      
</div>
</div>
</div><hr class="separator">	
</div>

<div class="col-md-12">
<div class="first_list gold_bgcolor">
<div class="row">
<div class="col-sm-4 ">
<div class="img-hover view_img">
<img src="pictures/no_image.png" alt="no_image.png" title="significant" class="img-responsive">
<div class="overlay"><a href="description_view"><i class="top_20 fa fa-link"></i></a></div>
</div>
<div class="">
<div class="price11">
<span></span><b>
<img src="img/icons/thumb.png" class="pull-right" alt="thumb" title="thumb Icon"></b>
</div>
</div>
</div>
<div class="col-sm-8 middle_text">
<div class="row">
<div class="col-sm-8">
<div class="row">
<div class="col-xs-12">
<h3 class="list_title">Sample text Here</h3>
</div>
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
<img src="img/brand/intel.png" alt="intel" title="intel logo" class="img-responsive">
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
<div class="col-xs-10 col-xs-offset-1 amt_bg">
<h3 class="view_price">£1106</h3>
</div>
<div class="col-xs-12">
<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Message</span></a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="post-meta list_view_bottom gold_bgcolor">
<ul>
<li><i class="fa fa-camera"></i><a href="#">2</a></li>
<li><i class="fa fa-video-camera"></i><a href="#">3</a></li>
<li><i class="fa fa-user"></i><a href="#">Person Name</a></li>
<li><i class="fa fa-clock-o"></i><span>April 23, 2015</span></li>
<li><i class="fa fa-eye"></i><span>234 Views</span></li>
<li><span>Deal ID : 112457856</span></li>
<li><i class="fa fa-star"></i><span><a href="#">Saved</a></span></li>
<li><i class="fa fa-edit"></i></li>
<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
</ul>                      
</div>
</div>
</div><hr class="separator">	
</div>

<div class="col-md-12">
<div class="first_list">
<div class="row">
<div class="col-sm-4 view_img">
<div class="featured-badge">
<span>Urgent</span>
</div>
<div class="img-hover">
<img src="img/blog/004.jpg" alt="img_1" title="img_1" class="img-responsive">
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
<img src="img/brand/intel.png" alt="intel" title="intel logo" class="img-responsive">
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
<div class="col-xs-10 col-xs-offset-1 amt_bg">
<h3 class="view_price">£1106</h3>
</div>
<div class="col-xs-12">
<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Message</span></a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="post-meta list_view_bottom" >
<ul>
<li><i class="fa fa-camera"></i><a href="#">2</a></li>
<li><i class="fa fa-video-camera"></i><a href="#">3</a></li>
<li><i class="fa fa-user"></i><a href="#">Person Name</a></li>
<li><i class="fa fa-clock-o"></i><span>April 23, 2015</span></li>
<li><i class="fa fa-eye"></i><span>234 Views</span></li>
<li><span>Deal ID : 112457856</span></li>
<li><i class="fa fa-star"></i><span><a href="#">Saved</a></span></li>
<li><i class="fa fa-edit"></i></li>
<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
</ul>                      
</div>
</div>
</div><hr class="separator">	
</div>

<div class="col-md-12">
<div class="first_list">
<div class="row">
<div class="col-sm-4 view_img">
<div class="img-hover">
<img src="img/blog/002.jpg" alt="img_1" title="img_1" class="img-responsive">
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
<img src="img/brand/intel.png" alt="intel" title="intel logo" class="img-responsive">
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
<div class="col-xs-10 col-xs-offset-1 amt_bg">
<h3 class="view_price">£1106</h3>
</div>
<div class="col-xs-12">
<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Message</span></a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="post-meta list_view_bottom" >
<ul>
<li><i class="fa fa-camera"></i><a href="#">2</a></li>
<li><i class="fa fa-video-camera"></i><a href="#">3</a></li>
<li><i class="fa fa-user"></i><a href="#">Person Name</a></li>
<li><i class="fa fa-clock-o"></i><span>April 23, 2015</span></li>
<li><i class="fa fa-eye"></i><span>234 Views</span></li>
<li><span>Deal ID : 112457856</span></li>
<li><i class="fa fa-star"></i><span><a href="#">Saved</a></span></li>
<li><i class="fa fa-edit"></i></li>
<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
</ul>                      
</div>
</div>
</div><hr class="separator">	
</div>

<div class="col-md-8 col-md-col-2" style="height: 110px;">
<img src="<?php echo base_url(); ?>img/slide/adds.jpg" alt="add" title="Adds">
</div>

<div class="col-md-12">
<div class="first_list">
<div class="row">
<div class="col-sm-4 view_img">
<div class="img-hover">
<img src="img/blog/002.jpg" alt="img_1" title="img_1" class="img-responsive">
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
<img src="img/brand/intel.png" alt="intel" title="intel logo" class="img-responsive">
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
<div class="col-xs-10 col-xs-offset-1 amt_bg">
<h3 class="view_price">£1106</h3>
</div>
<div class="col-xs-12">
<a href="#" data-toggle="modal" data-target="#sendnow" class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right top_4"><span>Send Message</span></a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="post-meta list_view_bottom" >
<ul>
<li><i class="fa fa-camera"></i><a href="#">2</a></li>
<li><i class="fa fa-video-camera"></i><a href="#">3</a></li>
<li><i class="fa fa-user"></i><a href="#">Person Name</a></li>
<li><i class="fa fa-clock-o"></i><span>April 23, 2015</span></li>
<li><i class="fa fa-eye"></i><span>234 Views</span></li>
<li><span>Deal ID : 112457856</span></li>
<li><i class="fa fa-star"></i><span><a href="#">Saved</a></span></li>
<li><i class="fa fa-edit"></i></li>
<li><img src="img/icons/delete.png" alt="delete" title="delete" class="img-responsive"></li>
</ul>                      
</div>
</div>
</div><hr class="separator">	
</div>
<!-- free package ends -->
</div>
</div>
</div>
</div>
</div>
</div>
</form>
</section>

<!-- xxx footer Content xxx -->
<?php echo $this->load->view('common/footer');?> 
<!-- xxx footer End xxx -->

</div>

<script src="<?php echo base_url(); ?>js/jquery.js"></script> 

<script src="<?php echo base_url(); ?>j-folder/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/additional-methods.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/jquery.form.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/j-forms.min.js"></script>

<script type="text/javascript" src="libs/jquery.xuSlider.js"></script>
<script>
$('.xuSlider').xuSlider();
</script>

<script src="<?php echo base_url();?>libs/jquery.mixitup.min.js"></script>
<script src="<?php echo base_url();?>libs/main.js"></script>

<!-- xxx footerscript Content xxx -->
<?php echo $this->load->view('common/footerscript');?> 
<!-- xxx footerscript End xxx -->

</body>
</html>