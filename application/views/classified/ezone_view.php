<!DOCTYPE html>
<html>
<head>

<title>E-Zone | Free Ads UK | UK Classifieds | Classifieds Ads | 99 Right Deals</title>

<meta name="description" content="Place free classified ads online for electronic products on 99 Right Deals like phones & tablets, home appliances,small appliances, laptop and computer for online buying and selling. " />
<meta name="keywords" content="electronics classified ads,used electronics classified,Electronics in the UK,Elelctronic free ads, phones & tables, tablets & ipods, air conditioners & refigerators,microwave ovens & mixer grinder," />

<!-- xxx Head Content xxx -->
<?php echo $this->load->view('common/head');?> 
<!-- xxx End xxx -->

<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>libs/slider.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>js/filter.css"> 
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

<script type="text/javascript">
$(function(){
$(".loc_map").click(function(){
var val = $(this).attr("id");
var val1 = val.split(",");
$(".map_show").html('<iframe src = "https://maps.google.com/maps?q='+val1[0]+','+val1[1]+'&hl=es;z=5&amp;output=embed" width="950px" height="300px"></iframe>');
});
});
</script>

<script type="text/javascript">
$(document).ready(
function()
{
$("input:checkbox").change(
function()
{
$("form.jforms").submit();
}
)
$('.search_bustype').click(function() {
$("form.jforms").submit();
}
)
$('.dealtitle_sort').change(function() {
$("form.jforms").submit();
}
)
$('.price_sort').change(function() {
$("form.jforms").submit();
}
)
$('.recentdays_sort').change(function() {
$("form.jforms").submit();
}
)
$(".clear_location").click(function(){
$('#latt').val('');
$('#longg').val('');
$('#find_loc').val('');
$("form.jforms").submit();
});
}
);
</script>

<?php 
$allbustype = $busconcount['allbustype'];
$business = $busconcount['business'];
$consumer = $busconcount['consumer'];

$urgentcnt = $deals_pck['urgentcount'];
$platinumcnt = $deals_pck['platinumcount'];
$goldcnt = $deals_pck['goldcount'];
$freecnt = $deals_pck['freecount'];

foreach ($public_adview as $publicview) {
$left_ad1 = $publicview->sidead_one;
$topad = $publicview->topad;
$mid_ad = $publicview->mid_ad;
}

$seller = $sellerneededcount['seller'];
$needed = $sellerneededcount['needed'];

$seller_deals = $this->session->userdata('seller_deals');
$dealurgent = $this->session->userdata('dealurgent');
$dealtitle = $this->session->userdata('dealtitle');
$dealprice = $this->session->userdata('dealprice');
$recentdays = $this->session->userdata('recentdays');
$search_bustype = $this->session->userdata('search_bustype');
$location = $this->session->userdata('location');
$latt = $this->session->userdata('latt');
$longg = $this->session->userdata('longg');
?>
</head>

<body id="home">

<div class="preloader"><div class="status">&nbsp;</div></div> 

<div id="layout">

<!-- xxx tophead Content xxx -->
<?php echo $this->load->view('common/tophead'); ?> 
<!-- xxx End tophead xxx -->

<div class="section-title-01">
<div class="bg_parallax image_01_parallax"></div>
</div>   

<section class="content-central">

<div class="semiboxshadow text-center">
<img src="<?php echo base_url(); ?>img/img-theme/shp-1090x457.png" class="img-responsive" alt="Shadow" title="Shadow view">
</div>
<form id="j-forms2" action="<?php echo base_url(); ?>ezone_view/search_filters" method='post' class="j-forms jforms" style="background-color: rgb(255, 255, 255) !important;">
<div class="content_info">
<div class="paddings">
<div class="container pad_bott_50">
<div class="row">
<div class="col-md-10 col-sm-8 col-md-offset-1 add_top">
<?php echo $topad; ?>
</div>
</div>
</div>
<div class="container">
<div class="row">

<div class="col-md-3 col-sm-3">
<div class="container-by-widget-filter bg-dark color-white">

<a href="<?php echo base_url(); ?>e-zone-phones-tablets-sale"><h3 class="title-widget">Ezone Filter</h3></a>

<div class="cd-filter-block">
<h4 class="title-widget">All Ezone</h4>
<div class="cd-filter-content">
<div class="filters_categories">	
<ul class="list-styles">
<?php foreach ($ezone_sub as $ezone_sub1) {
$phonescnt = $ezone_sub1->phones;
$homescnt = $ezone_sub1->homes;
$smallcnt = $ezone_sub1->small;
$lappycnt = $ezone_sub1->lappy;
$accesscnt = $ezone_sub1->access;
$pcarecnt = $ezone_sub1->pcare;
$entertaincnt = $ezone_sub1->entertain;
$grapycnt = $ezone_sub1->grapy;
$computercnt = $ezone_sub1->computer;
$networkcnt = $ezone_sub1->network;
$softwarecnt = $ezone_sub1->software;
} ?>
<li><i class="fa fa-arrow-circle-o-right"></i> <a href="<?php echo base_url(); ?>used-phones-tablets">Phones & Tablets (<?php echo $phonescnt; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i> <a href="<?php echo base_url(); ?>home-appliances-for-sale">Home Appliances (<?php echo $homescnt; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i> <a href="<?php echo base_url(); ?>used-secondhand-small-appliances">Small Appliances (<?php echo $smallcnt; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i> <a href="<?php echo base_url(); ?>used-secondhand-laptop-sale">Laptop & Computers (<?php echo $lappycnt; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i> <a href="<?php echo base_url(); ?>phones-ipods-camera-accessories-sale">Accessories (<?php echo $accesscnt; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i> <a href="<?php echo base_url(); ?>body-care-stuff-for-sale">Personal Care (<?php echo $pcarecnt; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i> <a href="<?php echo base_url(); ?>home-entertainment-items-sale">Home Entertainment (<?php echo $entertaincnt; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i> <a href="<?php echo base_url(); ?>used-digital-camera-for-sale">Photography (<?php echo $grapycnt; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i> <a href="<?php echo base_url(); ?>computer-peripherals-for-sale">Computer peripherals (<?php echo $computercnt; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i> <a href="<?php echo base_url(); ?>network-component-for-sale">Network Component (<?php echo $networkcnt; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i> <a href="<?php echo base_url(); ?>softwares-sale-london-canterbury">Software (<?php echo $softwarecnt; ?>)</a></li></ul>
</div>
</div>
</div> 

<div class="cd-filter-block">
<h4 class="title-widget ">Seller Type</h4>

<div class="cd-filter-content" >
<div>
<label class="checkbox">
<input type="checkbox" name="seller_deals[]" class='seller_deals' <?php if(isset($seller_deals) && in_array('Seller',$seller_deals)) echo 'checked = checked';?> value="Seller" >
<i></i> Seller Deals (<?php echo $seller; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="seller_deals[]" class='seller_deals' <?php if(isset($seller_deals) && in_array('Needed',$seller_deals)) echo 'checked = checked';?> value="Needed" >
<i></i> Needed Deals (<?php echo $needed; ?>)
</label>
</div>
</div> 
</div>

<div class="cd-filter-block">
<h4 class="title-widget ">Deal Type</h4>

<div class="cd-filter-content" >
<div>
<label class="radio">
<input type="radio" name="search_bustype" class="search_bustype" value="all" <?php if($search_bustype == 'all') echo 'checked = checked';?> checked >
<i></i> All (<?php echo $allbustype; ?>)
</label>
<label class="radio">
<input type="radio" name="search_bustype" class="search_bustype" value="business" <?php if($search_bustype == 'business') echo 'checked = checked';?> >
<i></i> Business (<?php echo $business; ?>)
</label>
<label class="radio">
<input type="radio" name="search_bustype" class="search_bustype" value="consumer" <?php if($search_bustype == 'consumer') echo 'checked = checked';?> >
<i></i> Consumer (<?php echo $consumer; ?>)
</label>
</div>
</div>
</div>

<div class="cd-filter-block">
<h4 class="title-widget ">Location</h4>

<div class="cd-filter-content" >
<div class="input">
<input type="text" placeholder="Enter Location" id="find_loc" class="find_loc_search" value="<?php echo $location; ?>" name="find_loc">
<input type='hidden' name='latt' id='latt' value='' >
<input type='hidden' name='longg' id='longg' value='' >
<button class="btn btn-primary sm-btn pull-right find_location" id='find_location' >Find</button>
<button class="btn btn-primary sm-btn pull-right clear_location" id='clear_location' >Clear</button>
</div>
</div>
</div> 

<div class="cd-filter-block">
<h4 class="title-widget">Search Only</h4>

<div class="cd-filter-content">
<div>
<label class="checkbox">
<input type="checkbox" name="dealurgent[]" class="dealurgent"  value="0" <?php if(isset($dealurgent) && in_array('0',$dealurgent)){ echo 'checked = checked';}?> >
<i></i> Urgent Deals (<?php echo $urgentcnt; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="dealurgent[]" class="dealurgent" value="6" <?php if(isset($dealurgent) && in_array('6',$dealurgent)){ echo 'checked = checked';}?> >
<i></i> Significant Deals (<?php echo $platinumcnt; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="dealurgent[]" class="dealurgent" value="5" <?php if(isset($dealurgent) && in_array('5',$dealurgent)){ echo 'checked = checked';}?> >
<i></i> Most Valued Deals (<?php echo $goldcnt; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="dealurgent[]" class="dealurgent" value="4" <?php if(isset($dealurgent) && in_array('4',$dealurgent)){ echo 'checked = checked';}?> >
<i></i> Recent Deals (<?php echo $freecnt; ?>)
</label>
</div>
</div>
</div> 




</div>
<div class="row top_20">
<div class="col-sm-12 add_left">
<?php echo $left_ad1; ?>
</div>
</div>
</div>

<div class="col-md-9 col-sm-9">
<div class="sort-by-container tooltip-hover">
<div class="row">
<div class="col-md-12">
<strong>Sort by:</strong>
<ul>                            
<li>
<div class="top_bar_top">
<label class="input select">
<select name="dealtitle_sort" class="dealtitle_sort">
<option value="Any" <?php if($dealtitle == 'Any') echo 'selected = selected';?> >Title</option>
<option value="atoz" <?php if($dealtitle == 'atoz') echo 'selected = selected';?> >A to Z</option>
<option value="ztoa" <?php if($dealtitle == 'ztoa') echo 'selected = selected';?> >Z to A</option>
</select>
<i></i>
</label>
</div>
</li>
<li>
<div class="top_bar_top">
<label class="input select">
<select name="price_sort" class="price_sort">
<option value="Any" <?php if($dealprice == 'Any') echo 'selected = selected';?> >Pricing</option>
<option value="lowtohigh" <?php if($dealprice == 'lowtohigh') echo 'selected = selected';?> >Low to High</option>
<option value="hightolow" <?php if($dealprice == 'hightolow') echo 'selected = selected';?> >High to Low</option>
</select>
<i></i>
</label>
</div>
</li>
<li>
<div class="top_bar_top">
<label class="input select">
<select name="recentdays_sort" class="recentdays_sort">
<option value="Any" <?php if($recentdays == 'Any') echo 'selected = selected';?> >Posted On</option>
<option value="last24hours" <?php if($recentdays == 'last24hours') echo 'selected = selected';?> >Last 24 Hours</option>
<option value="last3days" <?php if($recentdays == 'last3days') echo 'selected = selected';?> >Last 3 Days</option>
<option value="last7days" <?php if($recentdays == 'last7days') echo 'selected = selected';?> >Last 7 Days</option>
<option value="last14days" <?php if($recentdays == 'last14days') echo 'selected = selected';?> >Last 14 Days</option>
<option value="last1month" <?php if($recentdays == 'last1month') echo 'selected = selected';?> >Last 1 month</option>
</select>
<i></i>
</label>
</div>
</li>
</ul>
</div>
</div>
</div>

<div class="row list_view_searches motor_result">
<?php echo $this->load->view("classified/ezone_view_search"); ?>
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

<script src="<?php echo base_url(); ?>js/jquery.js"></script> 
<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>libs/jquery.xuSlider.js"></script>

<script>
$('.xuSlider').xuSlider();
</script>

<script>
$(document).ready(function(){
$('#find_loc').autocomplete({
source: '<?php echo base_url(); ?>classified/search_autocomplete',
minLength: 1,
messages: {
noResults:'No Data Found'
}
});
});
</script>

<script src="<?php echo base_url(); ?>js/jquery.nicescroll.js"></script> 
<script src="<?php echo base_url();?>libs/jquery.mixitup.min.js"></script>
<script src="<?php echo base_url();?>libs/main.js"></script>

<!-- xxx footerscript Content xxx -->
<?php echo $this->load->view('common/footerscript');?> 
<!-- xxx footerscript End xxx -->

</body>
</html>