<!DOCTYPE html>
<html>
<head>

<title>Property For Sale UK | Property For Rent UK, Property In London | 99 Right Deals</title>

<meta name="description" content="Free Ads for Apartments , Villas and Flats For Sale in United Kingdom. Find property for sale UK, property for rent, flat for sale, commercial property for rent on 99 Right Deals." />
<meta name="keywords" content="flat for sale, property for rent uk, online property for sale, houses for sale in uk, find property to rent, houses for rent in uk, houses for sale uk, property for sale in uk, house for sale by owner, property in london, homes for sale in uk, property for sale uk, land for sale, commercial property for rent" />

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

<script type="text/javascript">
$(function(){
$(".loc_map").click(function(){
var val = $(".loc_map").attr("id");
var val1 = val.split(",");
$(".map_show").html('<iframe src = "https://maps.google.com/maps?q='+val1[0]+','+val1[1]+'&hl=es;z=5&amp;output=embed" width="950px" height="300px"></iframe>');
});
});
</script>

<?php foreach ($busconcount as $countval) {
$allbustype = $countval->allbustype;
$business = $countval->business;
$consumer = $countval->consumer;
}

$urgentcnt = $deals_pck['urgentcount'];
$platinumcnt = $deals_pck['platinumcount'];
$goldcnt = $deals_pck['goldcount'];
$freecnt = $deals_pck['freecount'];

foreach ($public_adview as $publicview) {
$left_ad1 = $publicview->sidead_one;
$topad = $publicview->topad;
$mid_ad = $publicview->mid_ad;
}
foreach ($sellerneededcount as $sncnt) {
$offered = $sncnt->offered;
$wanted = $sncnt->wanted;
}
$proptype = $this->session->userdata('proptype');
$bed_rooms = $this->session->userdata('bed_rooms');
$bathroom = $this->session->userdata('bathroom');
$area_square = $this->session->userdata('area_square');
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
$('input:radio').click(function() {
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

<!--Content Central -->
<section class="content-central">
<div class="semiboxshadow text-center">
<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
</div>
<form id="j-forms2" action="<?php echo base_url(); ?>residential_view/search_filters" class="j-forms jforms" method="post" style="background-color: rgb(255, 255, 255) !important;">
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
<div class="container-by-widget-filter bg-dark color-white">
<!-- Widget Filter -->
<a href="<?php echo base_url(); ?>residential-commercial-property-for-sale"><h3 class="title-widget">Property Filter</h3></a>
<div class="cd-filter-block">
<h4 class="title-widget">Property</h4>
<div class="cd-filter-content">
<div class="filters_categories">	
<ul class="list-styles">
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>flats-villas-apartment-property-for-sale"> Residential (<?php echo $resi_comm_count->residential; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>commercial-property-for-sale"> Commercial (<?php echo $resi_comm_count->commercial; ?>)</a></li>
</ul>
</div>
</div>
</div> 

<div class="cd-filter-block">
<h4 class="title-widget">No. of BedRooms</h4>
<div class="cd-filter-content" >
<div>
<label class="checkbox">
<input type="checkbox" name="bed_rooms[]" class='bed_rooms' value="1" <?php if(isset($bed_rooms) && in_array(1,$bed_rooms)){ echo 'checked = checked';}?> >
<i></i> 1 (<?php echo $bedroomcount->one1; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="bed_rooms[]" class='bed_rooms' value="2" <?php if(isset($bed_rooms) && in_array(2,$bed_rooms)){ echo 'checked = checked';}?> >
<i></i> 2 (<?php echo $bedroomcount->secon2; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="bed_rooms[]" class='bed_rooms' value="3" <?php if(isset($bed_rooms) && in_array(3,$bed_rooms)){ echo 'checked = checked';}?> >
<i></i> 3 (<?php echo $bedroomcount->third3; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="bed_rooms[]" class='bed_rooms' value="4" <?php if(isset($bed_rooms) && in_array(4,$bed_rooms)){ echo 'checked = checked';}?> >
<i></i> 4+ (<?php echo $bedroomcount->four4; ?>)
</label>
</div>
</div>
</div>
<div class="cd-filter-block">
<h4 class="title-widget">No. of BathRooms</h4>
<div class="cd-filter-content" >
<div>
<label class="checkbox">
<input type="checkbox" name="bathroom[]" class='bathroom' value="1" <?php if(isset($bathroom) && in_array(1,$bathroom)){ echo 'checked = checked';}?> >
<i></i> 1 (<?php echo $bathroomcount->one1; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="bathroom[]" class='bathroom' value="2" <?php if(isset($bathroom) && in_array(2,$bathroom)){ echo 'checked = checked';}?> >
<i></i> 2 (<?php echo $bathroomcount->secon2; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="bathroom[]" class='bathroom' value="3" <?php if(isset($bathroom) && in_array(3,$bathroom)){ echo 'checked = checked';}?> >
<i></i> 3 (<?php echo $bathroomcount->third3; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="bathroom[]" class='bathroom' value="4" <?php if(isset($bathroom) && in_array(4,$bathroom)){ echo 'checked = checked';}?> >
<i></i> 4+ (<?php echo $bathroomcount->four4; ?>)
</label>
</div>
</div>
</div>

<div class="cd-filter-block">
<h4 class="title-widget "> Area (Sq Ft)</h4>

<div class="cd-filter-content" >
<div>
<label class="checkbox">
<input type="checkbox" name="area_square[]" class='area_square' value="<500" <?php if(isset($area_square) && in_array('<500',$area_square)){ echo 'checked = checked';}?> >
<i></i> Less than 500 (<?php echo $areacount->less500; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="area_square[]" class='area_square' value="500-1000" <?php if(isset($area_square) && in_array("500-1000",$area_square)){ echo 'checked = checked';}?> >
<i></i> 500 - 1000 (<?php echo $areacount->plus500; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="area_square[]" class='area_square' value="1000-1500" <?php if(isset($area_square) && in_array("1000-1500",$area_square)){ echo 'checked = checked';}?> >
<i></i> 1000 - 1500 (<?php echo $areacount->plus1000; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="area_square[]" class='area_square' value="1500-2000" <?php if(isset($area_square) && in_array("1500-2000",$area_square)){ echo 'checked = checked';}?> >
<i></i> 1500 - 2000 (<?php echo $areacount->plus1500; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="area_square[]" class='area_square' value=">2000" <?php if(isset($area_square) && in_array(">2000",$area_square)){ echo 'checked = checked';}?> >
<i></i> More than 2000 (<?php echo $areacount->plus2000; ?>)
</label>
</div>
</div> 
</div>

<div class="cd-filter-block">
<h4 class="title-widget ">Seller Type</h4>

<div class="cd-filter-content" >
<div>
<label class="checkbox">
<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Offered" <?php if(isset($seller_deals) && in_array('Offered',$seller_deals)) echo 'checked = checked';?> >
<i></i> Offered Deals (<?php echo $offered; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Wanted" <?php if(isset($seller_deals) && in_array('Wanted',$seller_deals)) echo 'checked = checked';?> >
<i></i> Wanted Deals (<?php echo $wanted; ?>)
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
<input type="text" placeholder="Enter Location" id="find_loc" class="find_loc_search" name="find_loc" value="<?php echo $location; ?>">
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
<input type="checkbox" name="dealurgent[]" class="dealurgent"  value="0"<?php if(isset($dealurgent) && in_array('0',$dealurgent)){ echo 'checked = checked';}?> >
<i></i> Urgent Deals (<?php echo $urgentcnt; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="dealurgent[]" class="dealurgent" value="3"<?php if(isset($dealurgent) && in_array('3',$dealurgent)){ echo 'checked = checked';}?> >
<i></i> Significant Deals (<?php echo $platinumcnt; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="dealurgent[]" class="dealurgent" value="2"<?php if(isset($dealurgent) && in_array('2',$dealurgent)){ echo 'checked = checked';}?> >
<i></i> Most Valued Deals (<?php echo $goldcnt; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="dealurgent[]" class="dealurgent" value="1"<?php if(isset($dealurgent) && in_array('1',$dealurgent)){ echo 'checked = checked';}?> >
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
<option value="Any" <?php if($dealprice == 'Any') echo 'selected = selected';?>>Pricing</option>
<option value="lowtohigh" <?php if($dealprice == 'lowtohigh') echo 'selected = selected';?>>Low to High</option>
<option value="hightolow" <?php if($dealprice == 'hightolow') echo 'selected = selected';?>>High to Low</option>
</select>
<i></i>
</label>
</div>
</li>
<li>
<div class="top_bar_top">
<label class="input select">
<select name="recentdays_sort" class="recentdays_sort">
<option value="Any" <?php if($recentdays == 'Any') echo 'selected = selected';?>>Posted On</option>
<option value="last24hours" <?php if($recentdays == 'last24hours') echo 'selected = selected';?>>Last 24 Hours</option>
<option value="last3days" <?php if($recentdays == 'last3days') echo 'selected = selected';?>>Last 3 Days</option>
<option value="last7days" <?php if($recentdays == 'last7days') echo 'selected = selected';?>>Last 7 Days</option>
<option value="last14days" <?php if($recentdays == 'last14days') echo 'selected = selected';?>>Last 14 Days</option>
<option value="last1month" <?php if($recentdays == 'last1month') echo 'selected = selected';?>>Last 1 month</option>
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

<div class="row list_view_searches residential_result">
<?php echo $this->load->view('classified/residential_view_search') ?>
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

<!--MAP Modal -->
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

<script src="<?php echo base_url(); ?>j-folder/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/additional-methods.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/jquery.form.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/j-forms.min.js"></script>

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
