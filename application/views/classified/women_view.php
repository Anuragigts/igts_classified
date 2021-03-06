<!DOCTYPE html>
<html>
<head>

<title>New & Used Women's Designer Clothes For Sale In London, UK | 99 Right Deals</title>

<meta name="description" content="Buy & Sell new and secondhand womens styles or designer and wedding clothes or dresses and accessories for sale in London, UK on 99 Right Deals at affordable price." />

<!-- xxx Head Content xxx -->
<?php echo $this->load->view('common/head');?> 
<!-- xxx End xxx -->

<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>js/filter.css"> 
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
<link rel="stylesheet" href="<?php echo base_url(); ?>libs/slider.css">
<script type="text/javascript" src="<?php echo base_url(); ?>js/jssor.slider.min.js"></script>


<?php foreach ($busconcount as $countval) {
$allbustype = $countval->allbustype;
$business = $countval->business;
$consumer = $countval->consumer;
}
$urgentcnt = $deals_pck['urgentcount'];
$platinumcnt = $deals_pck['platinumcount'];
$goldcnt = $deals_pck['goldcount'];
$freecnt = $deals_pck['freecount'];

foreach ($sellerneededcount as $sncnt) {
$seller = $sncnt->seller;
$needed = $sncnt->needed;
$charity = $sncnt->charity;
}
foreach ($public_adview as $publicview) {
$left_ad1 = $publicview->sidead_one;
$topad = $publicview->topad;
$mid_ad = $publicview->mid_ad;
}
foreach ($women_list_count as $women_list_countval) {
$cloths = $women_list_countval->clothes;
$shoes = $women_list_countval->shoes;
$accessories = $women_list_countval->accessories;
$wedding = $women_list_countval->wedding;
}
$sub_cat = $this->session->userdata('sub_cat');
$seller_deals = $this->session->userdata('seller_deals');
$dealurgent = $this->session->userdata('dealurgent');
$dealtitle = $this->session->userdata('dealtitle');
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
<div class="semiboxshadow text-center">
<img src="<?php echo base_url(); ?>img/img-theme/shp-1090x457.png" class="img-responsive" alt="Shadow" title="Shadow view">
</div>
<form id="j-forms2" action="<?php echo base_url(); ?>women_view/search_filters" class="j-forms jforms" method="post" style="background-color: rgb(255, 255, 255) !important;">
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
<!-- Item Table-->
<div class="col-md-3 col-sm-3">
<div class="container-by-widget-filter bg-dark color-white cloth_h3">
<!-- Widget Filter -->
<a href="<?php echo base_url(); ?>clothes-for-sale-uk"><h3 class="title-widget">Clothing & LifeStyle</h3></a>

<div class="cd-filter-block">
<h4 class="title-widget">Women</h4>
<div class="cd-filter-content">
<div class="filters_categories">	
<ul class="list-styles">
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>women-designer-clothing"> Clothing (<?php echo $cloths; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>women-footware-shoes"> Shoes (<?php echo $shoes; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>women-accessories-sale"> Accessories (<?php echo $accessories; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>women-wedding-party-accessories"> Wedding (<?php echo $wedding; ?>)</a></li>
</ul>
</div>
</div>
</div>

<div class="cd-filter-block">
<h4 class="title-widget">Seller Type</h4>

<div class="cd-filter-content">
<div>
<label class="checkbox">
<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Seller" <?php if(isset($seller_deals) && in_array('Seller',$seller_deals)) echo 'checked = checked';?> >
<i></i> Seller (<?php echo $seller; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Needed" <?php if(isset($seller_deals) && in_array('Needed',$seller_deals)) echo 'checked = checked';?> >
<i></i> Needed (<?php echo $needed; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Charity" <?php if(isset($seller_deals) && in_array('Charity',$seller_deals)) echo 'checked = checked';?> >
<i></i> Charity (<?php echo $charity; ?>)
</label>
</div>
</div> 
</div>
<div class="cd-filter-block">
<h4 class="title-widget">Deal Type</h4>

<div class="cd-filter-content">
<div>
<label class="radio">
<input type="radio" name="search_bustype" class="search_bustype" value="all" <?php if($search_bustype == 'all') echo 'checked = checked';?> >
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
<h4 class="title-widget">Location</h4>

<div class="cd-filter-content">
<div class="input">
<input type="text" placeholder="Enter Location" id="find_loc" class="find_loc_search" name="find_loc" value='<?php echo $location; ?>'>
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
<!-- End Item Table-->

<!-- Item Table-->
<div class="col-md-9 col-sm-9">
<div class="sort-by-container tooltip-hover">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
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
<option value="last7days" <?php if($recentdays == 'last7days') echo 'selected = selected';?>>Last 7 Days</option>
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
<!-- sort-by-container-->

<div class="row list_view_searches women_result">
<?php echo $this->load->view("classified/women_view_search"); ?> 
</div>
<div class='row'>
<div class='col-md-12 col-sm-12 col-xs-12'>
<?php echo $paging_links; ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
</section>
<!-- Inner Page Content End-->

<!-- xxx footer Content xxx -->
<?php echo $this->load->view('common/footer');?> 
<!-- xxx footer End xxx -->

</div>
<!-- End Entire Wrap -->

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

<!-- End Shadow Semiboxed -->
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
