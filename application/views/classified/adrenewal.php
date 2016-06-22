<!DOCTYPE html>
<html>
<head>

<title>Ad Renewal | 99 Right Deals</title>

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

<section class="content-central">
<div class="semiboxshadow text-center">
<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
</div>

<form id="j-forms" action="<?php echo base_url();?>payments/adrenewal_pay/" class="j-forms" method="post" style="background-color:#fff;">
<div class="content_info">
<div class="paddings">
<div class="container about_text">
<div class="row check_out">
<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 col-sm-offset-0 col-xs-offset-0">
<div class="checkout_h3">
<h2>Ad Renewal</h2>
<?php 
if($tran_details->u_pkg__pound_cost != ''){
$price = ($tran_details->u_pkg__pound_cost + $tran_details->cost_pound);
$vat = $price*0.2;
$price1 = $price + $vat;
}
else{
$price = ($tran_details->cost_pound);
$vat = $price*0.2;
$price1 = $price + $vat;
}
?>
</div>
<table>
	<tr>
	<td colspan='4'>
		<table id='imgcontent'>
			<?php 
				$img_details1 = array_chunk($img_details, 6);
				foreach ($img_details1 as $val) {
			 ?>
			<tr>
				<?php foreach ($val as $value) { ?>
					<td class='del<?php echo $value->ad_img_id ?>'>
						<div class="img_hover_renuval">
							<img src="<?php echo base_url(); ?>pictures/<?php echo $value->img_name ?>" alt='<?php echo $value->img_name ?>'>
							<div class="overlay">
								<a href="javascript:void(0);" class='delimg' id='<?php echo $value->ad_img_id ?>'><i class="fa fa-minus-circle"></i></a>
							</div>
						</div>
					</td>
				<?php } ?>
			</tr>	
			<?php } ?>
		</table>
	</td>
</tr>
<tr>
	<td colspan='4' class='add_renu_a'>
		<a href="javascript:void(0);" class='btn btn-primary btn1 pull-left' data-toggle="modal" data-target="#adrenewal_img">Add More Images</a> 
	</td>
</tr>
<tr>
	<td colspan='4'>
		<div class='deleteimgs'>
			
		</div>
	</td>
</tr>
</table>
<table class="table table-responsive">

<tbody>
<tr>
<td colspan='2' class="package_ckech">
<label class="label">Package Type</label>
<label class="input select">
<select name="pcktype" class='pcktype'>
<option value="" selected disabled="">Select Package</option>
<?php foreach ($pcktype as $pcktypeval) { ?>
<option value="<?php echo $pcktypeval->pkg_dur_id ?>" <?php if ($tran_details->package_type == $pcktypeval->pkg_dur_id) { echo "selected=selected"; } ?> ><?php echo ucwords($pcktypeval->pkg_dur_name); ?></option>
<?php } ?>
</select>
<i></i>
</label>
</td>
<td colspan='2' class="product">
<label class="label">Urgent Label</label>
<label class="input select">
<select name="urglbl" class='urglbl'>
<option value="">None</option>
<?php foreach ($urg_label as $urg_labelval) { ?>
<option value="<?php echo $urg_labelval->u_pkg_id ?>" <?php if ($tran_details->urgent_package == $urg_labelval->u_pkg_id) { echo "selected=selected"; } ?> ><?php echo $urg_labelval->u_pkg_name; ?></option>
<?php } ?>
</select>
<i></i>
</label>
</td>

</tr>
<tr>
<td colspan='4'>
	<div class='hotdeals pad_bot_10'>
		<label class="label">HotDeal Title</label>
		<input type="text" name="hotdeal" id='hotdeal' placeholder="Enter Hotdeals Title" value="<?php echo $tran_details->marquee; ?>" >
	</div>
	<div class='youtubelink pad_bot_10'>
		<label class="label">Youtube Link</label>
		<input type="text" name="youtubelink" id='youtubelink' placeholder="Enter youtube link" value="<?php echo $tran_details->video_name; ?>" >
	</div>
	<div class='weblink pad_bot_10'>
		<label class="label">Web Link</label>
		<input type="text" name="weblink" id='weblink' placeholder="Enter web link" value="<?php echo $tran_details->web_link; ?>" >
		<input type="hidden" name="adid" id='adid' value="<?php echo $tran_details->adid; ?>" >
	</div>
</td>
</tr>
</tbody>
</table>

<table class="table table-bordered">
	<thead>
		<tr>
			<th class="product">Ad Title</th>
			<th class="price">Price</th>
			<th class="total">Total</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="product">
			<h4><?php echo substr(ucwords($tran_details->deal_tag),0,25); ?></h4>
			</td>
			<td class="price">
			<?php echo $price; ?>
			</td>
			<td class="total">
			<?php echo $price; ?>
			</td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>VAT</th>
			<th class='vat_tax'><?php echo substr($vat, 0,strpos($vat,".")+3); ?></th>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<th>Discount :</th>
			<th class='disc_val'>0.00</th>
		</tr>
		<tr>
			<th>
				<div class="input pull-left">
				<input type="text" class="c_code" name="c_code" placeholder="Enter Coupon Code" value="" >
				<input type="hidden" name="ad_id" id="ad_id" value='<?php echo $tran_details->ad_id; ?>' >
				<input type="hidden" id="pkg_disc_amt" value='' >
				</div>
				<span class="btn btn-primary btn1 pull-left c_check" id='' >Apply</span>
			</th>
			<th class="tot_top">Total :</th>
			<th class="tot_top total_amt"><?php echo substr($price1, 0,strpos($price1,".")+3); ?></th>
		</tr>
	</tbody>
</table>
<div class='response_coupon'></div>
</div>
</div>
<div class="row top_20">
<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1 cancel_ahover">
<button class="btn btn-primary btn1 pull-right chck_bg_clr" type='submit'>Checkout</button>
<a class="btn btn-primary btn1 pull-right adrenewal_cancelad" href="javascript:void(0);">Cancel</a>
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
<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>
<script type="text/javascript">
$(function(){
$(".pcktype").change(function(){
var pckid = $(this).val();
var urgid = $(".urglbl").val();
$.ajax({
type: "POST",
url: "<?php echo base_url();?>payments/getpckcost",
data: {
pckid: pckid,
urgid: urgid
},
success: function (data) {
var data1 = JSON.parse(data);
$(".vat_tax").html(data1['vat_tax']);
$(".price").html(data1['cost']);
$(".total").html(data1['cost']);
$(".total_amt").html(data1['cost1']);
}
});
});
$(".urglbl").change(function(){
var pckid = $(".pcktype").val();
var urgid = $(this).val();
$.ajax({
type: "POST",
url: "<?php echo base_url();?>payments/geturgcost",
data: {
urgid: urgid,
pckid: pckid
},
success: function (data) {
var data1 = JSON.parse(data);
$(".vat_tax").html(data1['vat_tax']);
$(".price").html(data1['cost']);
$(".total").html(data1['cost']);
$(".total_amt").html(data1['cost1']);
}
});
});
$(".c_check").click(function(){
var c_code = $(".c_code").val();
var pckid = $(".pcktype").val();
var urgid = $(".urglbl").val();
$.ajax({
type: "POST",
url: "<?php echo base_url();?>payments/getcouponcost",
data: {
urgid: urgid,
pckid: pckid,
c_code: c_code
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
});

$(".adrenewal_cancelad").click(function(){
$.ajax({
type: "POST",
url: "<?php echo base_url();?>coupons/adrenewal_cancelad",
success: function (data) {
if (data == 1) {
window.location.href= "<?php echo base_url(); ?>deals-status";	
}
}
})
});
$.ajax({
type: "POST",
url: "<?php echo base_url();?>payments/adrenewal_limit",
data: {pckid: $(".pcktype").val() },
success: function (data) {
	$("#imglimit").val(data);
	if ($(".pcktype").val() == 3 || $(".pcktype").val() == 6) {
	$(".hotdeals").css('display','block');
	$(".hotdeals").css('padding-bottom','10px');
	$(".youtubelink").css('display','block');
	$(".youtubelink").css('padding-bottom','10px');
	$(".weblink").css('display','block');
	};
	if ($(".pcktype").val() == 2 || $(".pcktype").val() == 5) {
		$(".hotdeals").css('display','none');
		$(".youtubelink").css('display','none');
		$(".weblink").css('display','block');
	};
	if ($(".pcktype").val() == 1 || $(".pcktype").val() == 4) {
		$(".hotdeals").css('display','none');
		$(".youtubelink").css('display','none');
		$(".weblink").css('display','none');
	};
}
})

$(".pcktype").change(function(){
	$.ajax({
type: "POST",
url: "<?php echo base_url();?>payments/adrenewal_limit",
data: {pckid: $(".pcktype").val() },
success: function (data) {
	$("#imglimit").val(data);
	if ($(".pcktype").val() == 3 || $(".pcktype").val() == 6) {
	$(".hotdeals").css('display','block');
	$(".youtubelink").css('display','block');
	$(".weblink").css('display','block');
	};
	if ($(".pcktype").val() == 2 || $(".pcktype").val() == 5) {
		$(".hotdeals").css('display','none');
		$(".youtubelink").css('display','none');
		$(".weblink").css('display','block');
	};
	if ($(".pcktype").val() == 1 || $(".pcktype").val() == 4) {
		$(".hotdeals").css('display','none');
		$(".youtubelink").css('display','none');
		$(".weblink").css('display','none');
	};
}
})
});

$(".upload").click(function(){
	var img = $("#imglimit").val();
	var flen = $("#adrenewalimgs")[0].files.length;
	if (flen == 0) {
		$('.noimage').show();
		return false;
	};
	var maxlen = parseInt($("#imglimit").val())-parseInt($("#existimgcount").val());
	 if (flen > maxlen) {
		$("div.errorimg").html('<div class="alert alert-danger gold_img_error"><strong>Error!</strong> Please upload '+maxlen+' images only </div>');
		$(".jpgpng").hide();
        $('.noimage').hide();	
		return false;
	 };
	
});

setTimeout(function(){
	$(".alert").hide(1000);
},5000);

$(".delimg").click(function(){
	$.ajax({
	type: "POST",
	url: "<?php echo base_url();?>payments/adrenewal_imgdelete",
	data: {id: $(this).attr('id') },
	success: function (data) {
		window.location.reload();
	}
	})
});

$(".chck_bg_clr").click(function(){
	var ex = $("#existimgcount").val();
	var limit = $("#imglimit").val();
	if (parseInt(ex) == 0) {
		$("div.deleteimgs").html("<div class='alert1 alert-danger'><strong>Error!</strong> please upload atleast one image </div>");
		return false;
	}
	if (parseInt(ex) > parseInt(limit)) {
		$("div.deleteimgs").html("<div class='alert1 alert-danger'><strong>Error!</strong> Maximum "+limit+" images allowed, please delete some images </div>");
		return false;
	}
	// else{
		$(".deleteimgs").html('');
	// }

	

	if ($(".pcktype").val() == 3 || $(".pcktype").val() == 6) {
		$.ajax({
		type: "POST",
		url: "<?php echo base_url();?>payments/adrenewal_data",
		data: {hotdeal: $("#hotdeal").val(),youtubelink: $("#youtubelink").val(),weblink:$("#weblink").val(), adid: $("#adid").val() },
		success: function (data) {
		}
		})
	}
	if ($(".pcktype").val() == 2 || $(".pcktype").val() == 5) {
		$.ajax({
		type: "POST",
		url: "<?php echo base_url();?>payments/adrenewal_data",
		data: {weblink:$("#weblink").val(), adid: $("#adid").val() },
		success: function (data) {
		}
		})
	}
});

});
</script>

<!-- xxx footerscript Content xxx -->
<?php echo $this->load->view('common/footerscript');?> 
<!-- xxx footerscript End xxx -->

</body>
</html>
<div class="modal dialog3" id="adrenewal_img" role="dialog">
<div class="modal-dialog3">
<form action="<?php echo base_url(); ?>payments/adrenewal_img" method="post" id='adrenewalimg' class="j-forms tooltip-hover" enctype="multipart/form-data" onsubmit="return Validate(this);" >
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h2>Adrenewal Images</h2>
		</div>
		<div class="modal-body footer_pad_length ad_ren_heig">
			<div class='errorimg'>
			</div>
			<div class='alert alert-danger noimage' style='display:none;'><strong>Error!</strong>Please upload alteast one image</div>
			<div class='alert alert-danger jpgpng' style='display:none;' ><strong>Error!</strong>Images should be jpg or png</div>
			<div class="">
				<input type="file" name="adrenewalimgs[]" id='adrenewalimgs' multiple='multiple' />
				<input type="hidden" name="existimgcount" id='existimgcount' value='<?php echo count($img_details); ?>' />
				<input type="hidden" name="imglimit" id='imglimit' value='' />
				<input type='hidden' name='adid' id='adid' value='<?php echo $tran_details->adid; ?>'>
				<div class='up_load_height'>
					<button name='upload' class="upload btn btn-primary btn1 pull-left" type='submit'>Upload</button>
				</div>
			</div>
		</div>
	</div>
</form>
</div>
</div>


<script type="text/javascript">
var _validFileExtensions = [".jpg", ".jpeg", ".png"];    
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    $(".jpgpng").show();
                    $('.noimage').hide();
                    return false;
                }
            }
        }
    }
  
    return true;
}
</script>