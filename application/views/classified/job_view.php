<!DOCTYPE html>
<html>
<head>

<title>Freelance Jobs In UK | Jobs Classified Ads | 99 Right Deals</title>

<meta name="description" content="99 Right Deals website assits you finding full time, part time jobs, home based work, Freelancer related job in United Kingdom and free post ads for relevant profile jobs on 99 Right Deals." />
<meta name="keywords" content="freelancing job ads, employment classified ads,full time job ads,freelance job in united kingdom,job advertisements uk,home based job classified, home base work uk,part time home based jobs,part-time job ads online,freelance jobs online" />

<!-- xxx Head Content xxx -->
<?php echo $this->load->view('common/head');?> 
<!-- xxx End xxx -->

<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
<link rel="stylesheet" href="<?php echo base_url();?>js/filter.css"> 
<link rel="stylesheet" href="<?php echo base_url();?>libs/slider.css">
<script type="text/javascript" src="<?php echo base_url();?>js/jssor.slider.min.js"></script>
<style type="text/css">
#limit_scrol{
height: 400px !important;
}
</style>
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
$jobsearch = $this->session->userdata('job_search');
$positionfor = $this->session->userdata('positionfor');
$seller_deals = $this->session->userdata('seller_deals');
$dealurgent = $this->session->userdata('dealurgent');
$dealtitle = $this->session->userdata('dealtitle');
// echo "<pre>"; print_r($seller_deals);echo "</pre>";
$recentdays = $this->session->userdata('recentdays');
$search_bustype = $this->session->userdata('search_bustype');
$location = $this->session->userdata('location');
$latt = $this->session->userdata('latt');
$longg = $this->session->userdata('longg');
foreach ($public_adview as $publicview) {
$left_ad1 = $publicview->sidead_one;
$topad = $publicview->topad;
$mid_ad = $publicview->mid_ad;
}
foreach ($busconcount as $countval) {
$allbustype = $countval->allbustype;
$business = $countval->business;
$consumer = $countval->consumer;
}

$urgentcnt = $deals_pck['urgentcount'];
$platinumcnt = $deals_pck['platinumcount'];
$goldcnt = $deals_pck['goldcount'];
$freecnt = $deals_pck['freecount'];

foreach ($jobpositioncnt as $posval) {
$students = $posval->students;
$entrylevel = $posval->entrylevel;
$nonmanager = $posval->nonmanager;
$manager = $posval->manager;
$executive = $posval->executive;
}
foreach ($sellerneededcount as $sncnt) {
$company = $sncnt->company;
$agency = $sncnt->agency;
$other = $sncnt->other;
}

foreach ($jobscnt as $val) {
$acnts = $val->acnts;
$constr = $val->constr;
$finan = $val->finan;
$bank = $val->bank;
$build = $val->build;
$sales = $val->sales;
$news = $val->news;
$retail = $val->retail;
$supp = $val->supp;
$it = $val->it;
$hard = $val->hard;
$health = $val->health;
$human = $val->human;
$office = $val->office;
$drive = $val->drive;
$pa = $val->pa;
$archi = $val->archi;
$cater = $val->cater;
$front = $val->front;
$plumb = $val->plumb;
$chem = $val->chem;
$engg = $val->engg;
$logi = $val->logi;
$mech = $val->mech;
$dent = $val->dent;
$manage = $val->manage;
$tele = $val->tele;
$petrol = $val->petrol;
$powerengg = $val->powerengg;
$grad = $val->grad;
$nurse = $val->nurse;
$misc = $val->misc;
}
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

<!--Content Central -->
<section class="content-central">
<div class="semiboxshadow text-center">
<img src="<?php echo base_url(); ?>img/img-theme/shp-1090x457.png" class="img-responsive" alt="Shadow" title="Shadow view">
</div>
<form id="j-forms2" action="<?php echo base_url(); ?>job_view/search_filters" class="j-forms jforms" method="post" style="background-color: rgb(255, 255, 255) !important;">
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
<a href="<?php echo base_url(); ?>part-full-time-jobs-london"><h3 class="title-widget">Jobs Filter</h3></a>
<h4 class="title-widget">Search Filter</h4>
<div class="cd-filter-content">
<div id='limit_scrol' class="filters_categories">	
<ul class="list-styles">
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>accounting-finance-jobs-london"> Accounting & Finance (<?php echo $acnts; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>real-state-construction-jobs"> Construction (<?php echo $constr; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>income-tex-banking-financial-jobs-london"> Financial Services (<?php echo $finan; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>retail-banking-jobs-vacancy-london"> Banking (<?php echo $bank; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>real-state-building-services-jobs"> Building Services (<?php echo $build; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>sales-marketing-jobs-vacancies-birmingham"> Sales & Marketing (<?php echo $sales; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>news-media-jobs-london"> News & Media (<?php echo $news; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>retails-marketing-sales-jobs"> Retail (<?php echo $retail; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>purchasing-supply-logistic-jobs-london-wells"> Purchasing & Supply (<?php echo $supp; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>it-telecom-jobs-london-manchester"> IT & Telecom (<?php echo $it; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>computer-hardware-networking-jobs"> Hardware & Networking (<?php echo $hard; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>healthcare-old-age-care-services-jobs-london"> Healthcare & Old Age Care (<?php echo $health; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>hr-and-training-jobs-london"> Human Resource & Training (<?php echo $human; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>office-administrative-jobs"> Office Administrative Jobs (<?php echo $office; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>part-full-time-driving-jobs-london"> Driving (<?php echo $drive; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>company-pa-secretarial-jobs-london"> P.A. & Secretarial (<?php echo $pa; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>architecture-jobs-london-birmingham"> Architecture (<?php echo $archi; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>outdoor-indoor-catering-jobs-london"> Catering Jobs (<?php echo $cater; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>front-desk-office-help-desk-jobs"> Front Office & Help Desk (<?php echo $front; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>electrician-plumbing-jobs-birmingham"> Electrician & Plumbing Tools (<?php echo $plumb; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>chemical-engineering-jobs-london-birmingham"> Chemical Engineering (<?php echo $chem; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>electronics-electrical-civil-engineering-jobs"> Electronics & Electrical Engineering (<?php echo $engg; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>logistics-supply-chain-management-jobs"> Logistics & Supply Chain Management (<?php echo $logi; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>mechanical-engineering-london-birmingham-wells"> Mechanical Engineering (<?php echo $mech; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>dentist-jobs-services-london"> Dentists (<?php echo $dent; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>marketing-finance-hr-management-jobs"> Management Jobs (<?php echo $manage; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>telesales-marketing-telecalling-jobs-london"> Telesales (<?php echo $tele; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>petroleum-chemical-engineering-jobs-london"> Petroleum Engineering (<?php echo $petrol; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>power-engineering-jobs-london-birmingham"> Power Engineering (<?php echo $powerengg; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>fresher-experience-graduate-Jobs-london"> Graduate Jobs (<?php echo $grad; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>hospitality-and-staff-nursing-jobs"> Nursing Jobs (<?php echo $nurse; ?>)</a></li>
<li><i class="fa fa-arrow-circle-o-right"></i><a href="<?php echo base_url(); ?>miscelleneous-jobs-vacancy-birmingham-london"> Miscelleneous (<?php echo $misc; ?>)</a></li>
</ul>
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
<h4 class="title-widget ">Seller Type</h4>

<div class="cd-filter-content" >
<div>
<label class="checkbox">
<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Company" <?php if(isset($seller_deals) && in_array('Company',$seller_deals)){ echo 'checked = checked';}?> >
<i></i> Company Deals (<?php echo $company; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Agency" <?php if(isset($seller_deals) && in_array('Agency',$seller_deals)){ echo 'checked = checked';}?> >
<i></i> Agency Deals (<?php echo $agency; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Other" <?php if(isset($seller_deals) && in_array('Other',$seller_deals)){ echo 'checked = checked';}?> >
<i></i> Other Deals (<?php echo $other; ?>)
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
<input type="checkbox" name="dealurgent[]" class="dealurgent"  value="0" <?php if(isset($dealurgent) && in_array('0',$dealurgent)){ echo 'checked = checked';}?> >
<i></i> Urgent Deals (<?php echo $urgentcnt; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="dealurgent[]" class="dealurgent" value="3" <?php if(isset($dealurgent) && in_array('3',$dealurgent)){ echo 'checked = checked';}?> >
<i></i> Significant Deals (<?php echo $platinumcnt; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="dealurgent[]" class="dealurgent" value="2" <?php if(isset($dealurgent) && in_array('2',$dealurgent)){ echo 'checked = checked';}?> >
<i></i> Most Valued Deals (<?php echo $goldcnt; ?>)
</label>
<label class="checkbox">
<input type="checkbox" name="dealurgent[]" class="dealurgent" value="1" <?php if(isset($dealurgent) && in_array('1',$dealurgent)){ echo 'checked = checked';}?> >
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
<option value="Any" <?php if($dealtitle == 'Any') echo 'selected';?> >Title</option>
<option value="atoz" <?php if($dealtitle == 'atoz') echo 'selected';?> >A to Z</option>
<option value="ztoa" <?php if($dealtitle == 'ztoa') echo 'selected';?> >Z to A</option>
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
<!-- sort-by-container-->

<div class="row list_view_searches jobs_search_result">
<?php echo $this->load->view("classified/jobs_view_search"); ?> 
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

<script src="<?php echo base_url();?>js/jquery.js"></script> 
<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>libs/jquery.xuSlider.js"></script>
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

<script src="<?php echo base_url();?>js/jquery.nicescroll.js"></script> 

<script src="<?php echo base_url();?>libs/jquery.mixitup.min.js"></script>
<script src="<?php echo base_url();?>libs/main.js"></script>	

<script type="text/javascript">
$(function(){
$(".loc_map").click(function(){
var val = $(this).attr("id");
var val1 = val.split(",");
$(".map_show").html('<iframe src = "https://maps.google.com/maps?q='+val1[0]+','+val1[1]+'&hl=es;z=5&amp;output=embed" width="950px" height="300px"></iframe>');
});
});
</script>

<!-- xxx footerscript Content xxx -->
<?php echo $this->load->view('common/footerscript');?> 
<!-- xxx footerscript End xxx -->

</body>
</html>
