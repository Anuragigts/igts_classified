<!DOCTYPE html>
<html>
<head>

<title>Deals Status | 99 Right Deals</title>

<!-- xxx Head Content xxx -->
<?php echo $this->load->view('common/head');?> 
<!-- xxx End xxx -->

<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>libs/slider.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>js/jssor.slider.min.js"></script>

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
$(function(){

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

$(".price_sort").change(function(){
var dealprice = $(".price_sort option:selected").val();
var dealtitle = $(".dealtitle_sort option:selected").val();
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
<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
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
<a href='<?php echo base_url(); ?>deals-status'>
<li><img src="<?php echo base_url(); ?>img/icons/status.png" alt="status" title="Deals">Deals Status</li>
</a>
<a href='<?php echo base_url(); ?>deals-administrator'>
<li><img src="<?php echo base_url(); ?>img/icons/admin.png" alt="admin" title="Admin">Deals Administrator</li>
</a>
<a href='<?php echo base_url(); ?>pickup-deals'>
<li><img src="<?php echo base_url(); ?>img/icons/pickup.png" alt="pickup" title="Pickup">Pickup deals</li>
</a>
<a href='<?php echo base_url(); ?>my-wishes'>
<li><img src="<?php echo base_url(); ?>img/icons/seaked.png" alt="favourites" title="Favourites">My Wishes</li>
</a>
<a href='<?php echo base_url(); ?>update-profile'>
<li><img src="<?php echo base_url(); ?>img/icons/updateprofile.png" alt="Update Profile" title="<?php echo base_url(); ?>updateprofile image"> Update Profile</li>
</a>
</ul>
<a class="btn color-red" href="<?php echo base_url(); ?>login/logout">Logout</a>
</div>
</div>

<div class="col-md-9">
<?php echo $this->view("classified_layout/success_error"); ?>
<div class="row row-fluid">
<div class="col-sm-12">
<h2>Deals Status</h2>
<label>Hi <?php echo $log_name; ?></label><hr>
</div>
</div>

<table id='deal_status' class="table table-striped table-bordered bootstrap-datatable datatable">
<thead>
<tr>
<th>Deal Tag</th>
<th>Urgent Label</th>
<th>Expiry Date</th>
<th>Ad Status</th>
<th>Ad Renewal</th>
</tr>
</thead>
<tbody>
<?php foreach($my_ads_details as $ads){?>
<tr>
<td><?php echo ucwords(substr($ads->deal_tag,0,20));?></td>
<!-- <td><?php echo ucwords($ads->pkg_dur_name);?></td> -->
<td><?php if($ads->u_pkg_id == 0) echo 'No';else echo 'Yes';?></td>
<td><?php 
if ($ads->expire_data != '0000-00-00 00:00:00') {
echo $exp_data = date("d-m-Y H:i:s", strtotime($ads->expire_data));
}
else{
echo $exp_data = '';
}

?></td>
<td><?php 
if ($ads->ad_status == '0') {
echo "Pending";
}
else if ($ads->ad_status == '1'){
echo "Approved";
}
else if ($ads->ad_status == '2'){
echo "In progress";
}
else if ($ads->ad_status == '3'){
echo "On hold";
}
else if ($ads->ad_status == '4'){
echo "Rejected";
}
?></td>
<td class="pay_btn"><?php 
if (($ads->expire_data > date('Y-m-d H:i:s')) && $ads->ad_status == 1) {
$date_diff =  (strtotime($ads->expire_data) - time())/(60*60*24);
if ($date_diff <= 10) { ?>
<a href="<?php base_url();?>payments/adrenewal/<?php echo $ads->ad_id;?>" class='adrenewal' title="Ad Renewal" >Ad Renewal</a>
<?php	}
}
?></td>
</tr>
<?php }?>
</tbody>
</table>
</div>

</div>
</div>
</div>
</div>
</section>

<!-- xxx footer Content xxx -->
<?php echo $this->load->view('common/footer');?> 
<!-- xxx footer End xxx -->

</div>

<script>
setTimeout(function(){
$(".alert").hide();
},15000);
</script>

<script type="text/javascript">
$(function(){
$(".adrenewal").click(function(){
function sendajax() {
$.post('<?php echo base_url();?>coupons/adrenewalsession', {}, function(response) {
console.log(response);
});
}
});
});
</script>

<script src="<?php echo base_url(); ?>js/jquery.js"></script> 
<script src="<?php echo base_url(); ?>j-folder/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/additional-methods.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/jquery.form.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/j-forms.min.js"></script>   
<script type="text/javascript" src="<?php echo base_url(); ?>libs/jquery.xuSlider.js"></script>
<script src='<?php echo base_url(); ?>admin_template_files/js/jquery.dataTables.min.js'></script>
<script type="text/javascript">
	$(document).ready(function(){
	    $('#deal_status').DataTable({
	    	"aaSorting": []
	    });
	});
</script>
<!-- xxx footerscript Content xxx -->
<?php echo $this->load->view('common/footerscript');?> 
<!-- xxx footerscript End xxx -->

</body>
</html>