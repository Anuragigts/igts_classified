<!DOCTYPE html>
<html>
<head>

<title>Right Deals :: Checkout</title>

<!-- xxx Head Content xxx -->
<?php echo $this->load->view('common/head');?> 
<!-- xxx End xxx -->

<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />

</head>

<body id="home">

<div class="preloader"><div class="status">&nbsp;</div></div> 

<div id="layout">

<!-- xxx tophead Content xxx -->
<?php echo $this->load->view('common/tophead'); ?> 
<!-- xxx End tophead xxx -->

<div class="section-title-01"><div class="bg_parallax image_01_parallax"></div></div>

<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />

<section class="content-central">
<div class="semiboxshadow text-center">
<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
</div>

<form id="j-forms" action="<?php echo base_url();?>payments/pay/" class="j-forms" method="post" style="background-color:#fff;">
<div class="content_info">
<div class="paddings">
<div class="container about_text">
<?php //echo '<pre>';print_r($tran_details);echo '</pre>';?>
<div class="row check_out">
<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 col-sm-offset-0 col-xs-offset-0">
<div class="checkout_h3">
<h2>Checkout</h2>
</div>
<table class="table table-responsive">
<thead>
<tr>
<th class="preview">Preview</th>
<th class="product">Ad Title</th>
<th class="price">Price</th>
<th class="total">Total</th>
</tr>
</thead>
<tbody>
<tr>
<td class="preview cart_image">
<img src="<?php echo base_url(); ?>pictures/<?php echo $tran_details->img_name; ?>"  alt="<?php echo $tran_details->img_name; ?>" title="<?php echo $tran_details->img_name; ?>">
</td>
<td class="product">
<h4><?php echo substr(ucwords($tran_details->deal_tag),0,25); ?></h4>
</td>
<td class="price">
<?php echo $tran_details->cost_pound+$tran_details->u_pkg__pound_cost; ?>
</td>
<td class="total">
<?php echo $tran_details->cost_pound+$tran_details->u_pkg__pound_cost; ?>
</td>
</tr>
</tbody>
<thead>
<?php if (!(($tran_details->package_type == '1' || $tran_details->package_type == '4') && $tran_details->urgent_package == '0')) {
?>
<tr>
<th colspan="2">&nbsp;</th>
<th class="dis_width">VAT TAX</th>
<th><?php
$vat = ($tran_details->cost_pound+$tran_details->u_pkg__pound_cost)*(20/100);
echo "+".substr($vat,0,strpos($vat,".") + 3);
?></th>
</tr>
<tr>
<th colspan="2">&nbsp;</th>
<th class="dis_width">Discount</th>
<th class='disc_val'>0.00</th>
</tr>
<?php } ?>
<tr>
<?php if (!(($tran_details->package_type == '1' || $tran_details->package_type == '4') && $tran_details->urgent_package == '0')) {
?>
<th colspan="2">
<div class="input pull-left">
<input type="text" class="c_code" name="c_code" placeholder="Enter Coupon Code" value="" >
<input type="hidden" name="ad_id" id="ad_id" value='<?php echo $tran_details->ad_id;?>' >
<input type="hidden" id="pkg_disc_amt" value='' >
</div>
<span class="btn btn-primary btn1 pull-left c_check" >Apply</span>
</th>
<?php
}
else{ ?>
<th colspan="2">
<div class="input pull-left">
<input type="hidden" class="c_code" name="c_code" placeholder="Enter Coupon Code" value="" >
<input type="hidden" name="ad_id" id="ad_id" value='<?php echo $tran_details->ad_id;?>' >
<input type="hidden" id="pkg_disc_amt" value='' >
</div>
</th>
<?php } ?>
<th class="tot_top">Total :</th>
<th class="tot_top total_amt"><?php 
$t_amt = ($tran_details->cost_pound+$tran_details->u_pkg__pound_cost)+(($tran_details->cost_pound+$tran_details->u_pkg__pound_cost)*(20/100));
echo substr($t_amt, 0, strpos($t_amt, ".")+3);
?></th>
</tr>
<tr>
<td  colspan='4'class='response_coupon'></td>
</tr>
</thead>
</table>
</div>
</div>
<div class="row top_20">
<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1 cancel_ahover">
<button class="btn btn-primary btn1 pull-right chck_bg_clr" type='submit'>Checkout</button>
<a class="btn btn-primary btn1 pull-right cancel_ad" href="javascript:void(0);">Cancel</a>
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

<script>
$(function(){
$(".c_check").click(function(){
var c_code = $(".c_code").val();
var ad_id = $("#ad_id").val();
if(c_code != ''){
$.ajax({
type: "POST",
url: "<?php echo base_url();?>coupons/get_c_result",
data: {
c_code: c_code,
ad_id: ad_id
},
success: function (data) {
var c_details = JSON.parse(data);
var c_value = c_details['c_value'];
var pkg_disc_amt = c_details['pkg_disc_amt'];
$(".disc_val").html(c_details['disc']);
$(".response_coupon").html(c_details['c_responce']);
$(".total_amt").html(pkg_disc_amt);
document.getElementById('pkg_disc_amt').value = pkg_disc_amt;
}
});
}else{
alert('Please Enter Coupoun Code If Any');
}
});

$(".cancel_ad").click(function(){
$.ajax({
type: "POST",
url: "<?php echo base_url();?>coupons/cancel_adv",
data: {
ad_id: $("#ad_id").val()
},
success: function (data) {
if (data == 1) {
window.location.href= "<?php echo base_url(); ?>post-a-deal";	
}
}
})
});
});
</script>

<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>

<!-- xxx footerscript Content xxx -->
<?php echo $this->load->view('common/footerscript');?> 
<!-- xxx footerscript End xxx -->

</body>
</html>