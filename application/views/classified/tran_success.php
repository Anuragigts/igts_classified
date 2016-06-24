<!DOCTYPE html>
<html>
<head>

<title>Success | 99 Right Deals</title>

<!-- xxx Head Content xxx -->
<?php echo $this->load->view('common/head');?> 
<!-- xxx End xxx -->

<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>libs/slider.css">
<script type="text/javascript" src="<?php echo base_url(); ?>js/jssor.slider.min.js"></script>

<script type="text/javascript">
$(function(){
$(".loc_map").click(function(){
var val = $(".loc_map").attr("id");
var val1 = val.split(",");
$(".map_show").html('<iframe src = "https://maps.google.com/maps?q='+val1[0]+','+val1[1]+'&hl=es;z=5&amp;output=embed" width="950px" height="300px"></iframe>');
});
});
</script>

<script type="text/javascript">
$(function(){
/*search ato z / A to Z*/
$(".dealtitle_sort").change(function(){
var dealtitle = $(".dealtitle_sort option:selected").val();
var dealprice = $(".price_sort option:selected").val();
$.ajax({
type: "POST",
url: "<?php echo base_url();?>deals_administrator/my_ads_search",
data: {
dealtitle: dealtitle,
dealprice: dealprice
},
success: function (data) {
$(".deals_search_result").html(data);
}
})
});
/*search price asc / desc*/
$(".price_sort").change(function(){
var dealprice = $(".price_sort option:selected").val();
var dealtitle = $(".dealtitle_sort option:selected").val();
$.ajax({
type: "POST",
url: "<?php echo base_url();?>deals-administrator/my_ads_search",
data: {
dealtitle: dealtitle,
dealprice: dealprice
},
success: function (data) {
$(".deals_search_result").html(data);
}
})
});
});
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

<section class="content-central">
<div class="semiboxshadow text-center">
<img src="<?php echo base_url(); ?>img/img-theme/shp-1090x457.png" class="img-responsive" alt="Shadow" title="Shadow view">
</div>

<div class="content_info">
<div class="paddings">
<div class="container">
<div class="row">
<div class="col-sm-3">
<div class="item-table">
<div class="header-table color-red">
<img src="<?php echo base_url(); ?>img/icons/user_pro.png" alt="user_pro" title="Profile" class="img-responsive pvt-no-img">
<h2><?php echo @$log_name; ?></h2> 
</div>
<ul class="dashboard_tag">
<li><img src="<?php echo base_url(); ?>img/icons/admin.png" alt="admin" title="admin image"><a href='deals_Status'>Deals Status</a></li>
<li><img src="<?php echo base_url(); ?>img/icons/admin.png" alt="admin" title="admin image"><a href='deals_administrator'>Deals Administrator</a></li>
<li><img src="<?php echo base_url(); ?>img/icons/pickup.png" alt="pickup" title="pickup image"><a href='pickup-deals'>Pickup deals</a></li>
<li><img src="<?php echo base_url(); ?>img/icons/seaked.png" alt="seaked" title="seaked image"><a href='my-wishes'>Reserved Searches</a></li>
<li><img src="<?php echo base_url(); ?>img/icons/updateprofile.png" alt="updateprofile" title="updateprofile image"> <a href='update-profile'>Update Profile</a></li>
</ul>
<a class="btn color-red" href="<?php echo base_url(); ?>login/logout">Logout</a>
</div>
</div>
<!-- End Item Table-->
<?php //echo '<pre>';print_r($my_ads_details[2]);echo '</pre>';?>
<div class="col-md-9">
<div class="row row-fluid">
<div class="col-sm-12">
<h2>Deals Status</h2>
<label>Hi <?php echo $log_name; ?></label><hr>
</div>
</div>

<table class="table table-striped table-bordered">
<thead>
<tr>
<th>Deal Tag</th>
<th>Category</th>
<th>Package Type</th>
<th>Urgent Label</th>
<th>Amount</th>
<th>Ad Status</th>
<th>Payment Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php foreach($my_ads_details as $ads){?>
<tr>
<td><?php echo ucwords($ads->deal_tag);?></td>
<td><?php echo ucwords($ads->category_name);?></td>
<td><?php echo ucwords($ads->pkg_dur_name);?></td>
<td><?php if($ads->u_pkg_id == 0) echo 'Normal';else {echo ucwords($ads->u_pkg_name);}?></td>
<td><?php $t_cost = $ads->cost_pound+$ads->u_pkg__pound_cost;
echo $t_cost;//$ads->cost_pound.'&'.$ads->u_pkg__pound_cost.'&'.;?></td>
<td><?php echo ucwords($ads->status_name);?></td>
<td><?php if($ads->payment_status == 1) echo 'No Pending';else {echo 'hello';?>
<a href="javascript:void(0);" ad_id="<?php echo $ads->ad_id;?>" ad_cost='<?php echo $t_cost;?>' data-toggle="modal" data-target="#flexModal" title="Pay Now" class="paynow">Pay</a>
<!--
<a href="javascript:void(0);" ad_id="<?php echo $ads->ad_id;?>" ad_cost='<?php echo $t_cost;?>' data-toggle="modal" data-target="#flexModal" title="Pay Now" class= "paynow('<?php echo $ads->ad_id;?>','<?php echo $t_cost;?>')">Pay</a>--><?php }?></td>
<td><?php echo ucwords($ads->deal_tag);?></td>
</tr>
<?php }?>
</tbody>
</table>
</div>

</div>
</div>
</div>
</div>
<div class="modal modal-flex fade" id="flexModal" tabindex="-1" role="dialog" aria-labelledby="flexModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close md-close edit_close2" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id="flexModalLabel">Pay for Posting Ad</h4>
</div>
<div class="modal-body">
<form class="form-horizontal" method="post" action ='<?php echo base_url()?>payments/Pay'>
<div class="htname">
<input type='hidden' id='post_ad_id' name='post_ad_id'>
<input type='hidden' id='post_ad_amt' name='post_ad_amt'>
<input type='text' id='coup_ad_amt' name='coup_ad_amt'>
</div>                    
<div class="form-group">
<div class="span4"></div>
<div class="span4">
<label for ='c_code'>Coupon Code</label>
<input type='text' name='c_code' class='c_code' value='COUP7303' placeholder = 'Coupon Code'  ><span class='c_check'>Apply</span><span class='c_responce' style='color:green'></span>
</div>                       
</div>
<div class="form-group">
<div class="span4"></div>
<div class="span4">
<button type="button" class="btn btn-default update_cad btn_cat" category="">Pay Now</button>
</div>
<div class="span4"></div>                        
</div>
</form>
</div>
</div>
</div>
</div>
</section>
<!-- Inner Page Content End-->

<!-- xxx footer Content xxx -->
<?php echo $this->load->view('common/footer');?> 
<!-- xxx footer End xxx -->

</div>
<!-- End Entire Wrap -->

<script>
$('.paynow').click(function(){
var ad_cost = $( this ).attr( "ad_cost" );
var ad_id = $( this ).attr( "ad_id" );
document.getElementById('post_ad_id').value = ad_id;
document.getElementById('post_ad_amt').value = ad_cost;
$(".c_responce").html('');
});
function paynow(adid, cost){
alert(adid+'----'+cost);
document.getElementById('post_ad_id').value = adid;
document.getElementById('post_ad_amt').value = cost;
}
$(function(){
$(".c_check").click(function(){
var c_code = $(".c_code").val();
var post_ad_amt = $("#post_ad_amt").val();
if(c_code != ''){
$.ajax({
type: "POST",
url: "<?php echo base_url();?>coupons/get_c_result",
data: {
c_code: c_code,
post_ad_amt: post_ad_amt
},
success: function (data) {
var c_details = JSON.parse(data);
var c_value = c_details['c_value'];
var pkg_disc_amt = c_details['pkg_disc_amt'];
$(".c_responce").html(c_details['c_responce']);
document.getElementById('coup_ad_amt').value = pkg_disc_amt;
}
});
}else{
alert('Please Enter Coupoun Code If Any');
}
});
});
</script>

<!-- End Shadow Semiboxed -->
<script src="<?php echo base_url(); ?>js/jquery.js"></script> 

<script src="<?php echo base_url(); ?>j-folder/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/additional-methods.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/jquery.form.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/j-forms.min.js"></script>   

<script type="text/javascript" src="<?php echo base_url(); ?>libs/jquery.xuSlider.js"></script>

<!-- xxx footerscript Content xxx -->
<?php echo $this->load->view('common/footerscript');?> 
<!-- xxx footerscript End xxx -->

</body>
</html>
