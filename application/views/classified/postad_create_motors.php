<!DOCTYPE html>
<html>
<head>

<title>Post a Deal Motor Point | 99 Right Deals</title>

<!-- xxx Head Content xxx -->
<?php echo $this->load->view('common/head');?> 
<!-- xxx End xxx -->

<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>js/jquery.cleditor.css" />
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>imgupload/free.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>imgupload/freeurgent.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>imgupload/gold.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>imgupload/goldurgent.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>imgupload/platinum.css' />
<script src="<?php echo base_url(); ?>imgupload/jquery.fancybox.min.js"></script>
<script src="<?php echo base_url(); ?>imgupload/imageupload.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>

<style>
.pound_sym_black{background: url("./img/icons/pound_sym_black.png") no-repeat left !important;}
</style>

<script type="text/javascript">
$(function(){$(".find_vrm").click(function(){$(".manualentry").text(""),$(".pleasewait").css("display","block"),$.ajax({type:"POST",url:"<?php echo base_url();?>postad_create_motors/vrm_api",dataType:"json",data:{vrm:$(".veh_regno").val()},success:function(e){if(""!=e.make){$(".res_manufacture").parent().removeClass("error-view"),$(".res_manufacture").parent().addClass("success-view"),$(".res_manufacture").css("display","block"),$(".manufacture").css("display","none"),$(".res_manufacture").val(e.make),$(".res_model").parent().removeClass("error-view"),$(".res_model").parent().addClass("success-view"),$(".car_model").css("display","none"),$(".res_model").val(e.model),$(".res_model").css("display","block"),$("#color").val(e.colour),$("#reg_year").val(e.manufacture_year),$(".fueltype option[value="+e.fuel_type+"]").attr("selected","selected");var a=e.engine_size,t=a.split("cc");$("#eng_size").val(t[0]),$("#mot_status").val(e.mot),$("#road_tax").val(e.road_tax)}else $(".manualentry").text("Enter Manually");$(".pleasewait").css("display","none")}})}),$(".find_bikevrm").click(function(){$(".manualentry_bike").text(""),$(".pleasewait_bike").css("display","block"),$.ajax({type:"POST",url:"<?php echo base_url();?>postad_create_motors/bikesvrm_api",dataType:"json",data:{vrm:$(".bikeveh_regno").val()},success:function(e){if(""!=e.make){$(".manufacture_bike").parent().removeClass("error-view"),$(".manufacture_bike").parent().addClass("success-view"),$(".manufacture_bike").css("display","block"),$(".bike_manufacture").css("display","none"),$(".manufacture_bike").val(e.make),$(".model_bike").parent().removeClass("error-view"),$(".model_bike").parent().addClass("success-view"),$(".bike_model").css("display","none"),$(".model_bike").val(e.model),$(".model_bike").css("display","block"),$(".bike_type1").parent().removeClass("error-view"),$(".bike_type1").parent().addClass("success-view"),$(".bike_type1").val("bike"),$(".bike_type1").css("display","block"),$(".bike_type").css("display","none"),$("#color").val(e.colour),$("#reg_year").val(e.manufacture_year),$(".fueltype option[value="+e.fuel_type+"]").attr("selected","selected");var a=e.engine_size,t=a.split("cc");$("#eng_size").val(t[0]),$("#road_tax").val(e.road_tax)}else $(".manualentry_bike").text("Enter Manually");$(".pleasewait_bike").css("display","none")}})})}),$(function(){$(".select_pack").change(function(){var e=$('input[name="select_packge"]:checked').val();if(1==e){var a=$("#fimg_pck_count").val();$(".free_pck").css("display","block"),$(".gold_pck").css("display","none"),$(".platinum_pck").css("display","none"),document.getElementById("package_type").value="1",$(".freeurgent").removeAttr("disabled"),$(".platinumurgent").attr("checked",!1),$(".goldurgent").attr("checked",!1),document.getElementById("package_urgent").value="0",document.getElementById("image_count").value="0",document.getElementById("pck_img_limit").value=a}if(2==e){var t=$("#gimg_pck_count").val();$(".free_pck").css("display","none"),$(".gold_pck").css("display","block"),$(".platinum_pck").css("display","none"),document.getElementById("package_type").value="2",$(".freeurgent").attr("checked",!1),$(".goldurgent").removeAttr("disabled"),$(".platinumurgent").attr("checked",!1),document.getElementById("package_urgent").value="0",document.getElementById("image_count").value="0",document.getElementById("pck_img_limit").value=t}if(3==e){var l=$("#pimg_pck_count").val();$(".free_pck").css("display","none"),$(".gold_pck").css("display","none"),$(".platinum_pck").css("display","block"),document.getElementById("package_type").value="3",$(".freeurgent").attr("checked",!1),$(".goldurgent").attr("checked",!1),$(".platinumurgent").removeAttr("disabled"),document.getElementById("package_urgent").value="0",document.getElementById("image_count").value="0",document.getElementById("pck_img_limit").value=l}}),$(".select_urgent_pack").change(function(){var e=$(this).val();$("#package_urgent").val(e)})});


$(function(){
$(".bike_manufacture").change(function(){
var bikeid = <?php echo @$sub_id ?>;
if (bikeid == '13') {
var id = $(".bike_manufacture").val();
$.post( "<?php echo base_url();?>postad_create_motors/get_bike_types",{id:id},function( data ) {
$(".bike_type").html(data);});}});});

$(function(){
$(".bike_type").change(function(){
var id = $(this).val();
$.post( "<?php echo base_url();?>postad_create_motors/get_bike_models",{id:id},function( data ) {
$(".bike_model").html(data);});});});

$(function(){
$(".manufacture").change(function(){
var id = $(".manufacture option:selected").val();
$.post( "<?php echo base_url();?>postad_create_motors/get_car_models",{id:id},function( data ) {
$(".car_model").html(data);});});

$(".plant_manufacture").change(function(){
var id = $(".plant_manufacture option:selected").val();
$.post( "<?php echo base_url();?>postad_create_motors/get_plant_models",{id:id},function( data ) {
$(".plant_model").html(data);});});});

function isNumber(i){i=i?i:window.event;var r=i.which?i.which:i.keyCode;return r>31&&(48>r||r>57)?!1:!0}$(function(){$(".multi-submit-btn").click(function(){var i=$("#image_count").val(),r=parseInt($("#package_type").val()),e=parseInt($("#pck_img_limit").val());return 1==r?0==i?($(".free_img_error").css("display","block"),!1):"1"==r&&i>e?($(".free_img_error").css("display","block"),!1):($(".free_img_error").css("display","none"),!0):2==r?0==i?($(".gold_img_error").css("display","block"),!1):"2"==r&&i>e?($(".gold_img_error").css("display","block"),!1):($(".gold_img_error").css("display","none"),!0):3==r?0==i?($(".platinum_img_error").css("display","block"),!1):"3"==r&&i>e?($(".platinum_img_error").css("display","block"),!1):($(".platinum_img_error").css("display","none"),!0):void 0})}),$(function(){$("#del_img").click(function(){$("#file_input").val(""),$("#file").val(""),$("#file_remove").removeClass("error-view"),$("span#file-error").hide(),$("img#blah").css("display","none"),$("#blah").css("border","none"),$("#blah").css("border-radius","none"),$("#del_img").css("display","none")})});
</script>

<script type='text/javascript'>
jQuery(document).ready(function($){var outputHandlerFunc=function(e){var a=function(e,a,n,t){var o,i,l=document.createElement("canvas");return e.width<a&&e.height<n&&void 0==t?(o=e.width,i=e.height):(o=a,i=parseInt(e.height*(a/e.width)),i>n&&(i=n,o=parseInt(e.width*(n/e.height)))),l.width=o,l.height=i,l.getContext("2d").drawImage(e,0,0,o,i),$(l).attr("title","Original size: "+e.width+"x"+e.height),l};$(new Image).on("load",function(n){console.log("imgobj",n);var t=$('<li class="new-item"><div class="list-content"><span class="preview"></span><span class="options"><span class="imagedelete" title="Remove image"></span></span></div></li>').appendTo("#output_free ul");$(".imagedelete",t).one("click",function(e){var a=document.getElementById("image_count").value;document.getElementById("image_count").value=parseInt(a)-1,t.toggleClass("new-item").addClass("removed-item"),t.one("animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd",function(e){t.remove()})});var o=a(n.target,50,50),i="<input type='hidden' name='pic_hide[]' id='pic_hide' value='"+e.imgSrc+"'>";$('<a rel="fancybox">').attr({target:"_blank",href:e.imgSrc}).append(o).append(i).appendTo($(".preview",t))}).attr("src",e.imgSrc)};$("a[rel=fancybox]").fancybox();var fileReaderAvailable="undefined"!=typeof FileReader,clipBoardAvailable=window.clipboardData!==!1,pasteAvailable=Boolean(clipBoardAvailable&fileReaderAvailable&!eval("/*@cc_on !@*/false"));fileReaderAvailable?($("#dropzone_free").imageUpload({errorContainer:$("span","#errormessages_free"),trigger:"dblclick",enableCliboardCapture:pasteAvailable,onBeforeUpload:function(){$("body").css("background-color","green"),console.log("start",Date.now())},onAfterUpload:function(){$("body").css("background-color","#eee"),console.log("end",Date.now())},outputHandler:outputHandlerFunc}),$("#dropzone_free").prev("#free_wrapper").find("#textbox_free").append('<p class="large">Drag and Drop<br>Image File here</p><p class="small">Doubleclick<br>for file requester</p>')):$("body").addClass("nofilereader"),pasteAvailable||$("body").addClass("nopaste")});
</script>

<script type='text/javascript'>
jQuery(document).ready(function($){var outputHandlerFunc=function(e){var a=function(e,a,n,t){var o,i,r=document.createElement("canvas");return e.width<a&&e.height<n&&void 0==t?(o=e.width,i=e.height):(o=a,i=parseInt(e.height*(a/e.width)),i>n&&(i=n,o=parseInt(e.width*(n/e.height)))),r.width=o,r.height=i,r.getContext("2d").drawImage(e,0,0,o,i),$(r).attr("title","Original size: "+e.width+"x"+e.height),r};$(new Image).on("load",function(n){console.log("imgobj",n);var t=$('<li class="new-item"><div class="list-content"><span class="preview"></span><span class="options"><span class="imagedelete" title="Remove image"></span></span></div></li>').appendTo("#output_free_urgent ul");$(".imagedelete",t).one("click",function(e){var a=document.getElementById("image_count").value;document.getElementById("image_count").value=parseInt(a)-1,t.toggleClass("new-item").addClass("removed-item"),t.one("animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd",function(e){t.remove()})});var o=a(n.target,50,50),i="<input type='hidden' name='pic_hide[]' id='pic_hide' value='"+e.imgSrc+"'>";$('<a rel="fancybox">').attr({target:"_blank",href:e.imgSrc}).append(o).append(i).appendTo($(".preview",t))}).attr("src",e.imgSrc)};$("a[rel=fancybox]").fancybox();var fileReaderAvailable="undefined"!=typeof FileReader,clipBoardAvailable=window.clipboardData!==!1,pasteAvailable=Boolean(clipBoardAvailable&fileReaderAvailable&!eval("/*@cc_on !@*/false"));fileReaderAvailable?($("#dropzone_free_urgent").imageUpload({errorContainer:$("span","#errormessages_free_urgent"),trigger:"dblclick",enableCliboardCapture:pasteAvailable,onBeforeUpload:function(){$("body").css("background-color","green"),console.log("start",Date.now())},onAfterUpload:function(){$("body").css("background-color","#eee"),console.log("end",Date.now())},outputHandler:outputHandlerFunc}),$("#dropzone_free_urgent").prev("#free_urgent_wrapper").find("#textbox_free_urgent").append('<p class="large">Drag and Drop<br>Image File here</p><p class="small">Doubleclick<br>for file requester</p>')):$("body").addClass("nofilereader"),pasteAvailable||$("body").addClass("nopaste")});
</script>

<script type='text/javascript'>
jQuery(document).ready(function($){var outputHandlerFunc=function(e){var a=function(e,a,n,o){var t,i,l=document.createElement("canvas");return e.width<a&&e.height<n&&void 0==o?(t=e.width,i=e.height):(t=a,i=parseInt(e.height*(a/e.width)),i>n&&(i=n,t=parseInt(e.width*(n/e.height)))),l.width=t,l.height=i,l.getContext("2d").drawImage(e,0,0,t,i),$(l).attr("title","Original size: "+e.width+"x"+e.height),l};$(new Image).on("load",function(n){console.log("imgobj",n);var o=$('<li class="new-item"><div class="list-content"><span class="preview"></span><span class="options"><span class="imagedelete" title="Remove image"></span></span></div></li>').appendTo("#output_gold ul");$(".imagedelete",o).one("click",function(e){var a=document.getElementById("image_count").value;document.getElementById("image_count").value=parseInt(a)-1,o.toggleClass("new-item").addClass("removed-item"),o.one("animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd",function(e){o.remove()})});var t=a(n.target,50,50),i="<input type='hidden' name='pic_hide[]' id='pic_hide' value='"+e.imgSrc+"'>";$('<a rel="fancybox">').attr({target:"_blank",href:e.imgSrc}).append(t).append(i).appendTo($(".preview",o))}).attr("src",e.imgSrc)};$("a[rel=fancybox]").fancybox();var fileReaderAvailable="undefined"!=typeof FileReader,clipBoardAvailable=window.clipboardData!==!1,pasteAvailable=Boolean(clipBoardAvailable&fileReaderAvailable&!eval("/*@cc_on !@*/false"));fileReaderAvailable?($("#dropzone_gold").imageUpload({errorContainer:$("span","#errormessages_gold"),trigger:"dblclick",enableCliboardCapture:pasteAvailable,onBeforeUpload:function(){$("body").css("background-color","green"),console.log("start",Date.now())},onAfterUpload:function(){$("body").css("background-color","#eee"),console.log("end",Date.now())},outputHandler:outputHandlerFunc}),$("#dropzone_gold").prev("#gold_wrapper").find("#textbox_gold").append('<p class="large">Drag and Drop<br>Image File here</p><p class="small">Doubleclick<br>for file requester</p>')):$("body").addClass("nofilereader"),pasteAvailable||$("body").addClass("nopaste")});
</script>

<script type='text/javascript'>
jQuery(document).ready(function($){var outputHandlerFunc=function(e){var a=function(e,a,n,t){var o,i,l=document.createElement("canvas");return e.width<a&&e.height<n&&void 0==t?(o=e.width,i=e.height):(o=a,i=parseInt(e.height*(a/e.width)),i>n&&(i=n,o=parseInt(e.width*(n/e.height)))),l.width=o,l.height=i,l.getContext("2d").drawImage(e,0,0,o,i),$(l).attr("title","Original size: "+e.width+"x"+e.height),l};$(new Image).on("load",function(n){console.log("imgobj",n);var t=$('<li class="new-item"><div class="list-content"><span class="preview"></span><span class="options"><span class="imagedelete" title="Remove image"></span></span></div></li>').appendTo("#output_gold_urgent ul");$(".imagedelete",t).one("click",function(e){var a=document.getElementById("image_count").value;document.getElementById("image_count").value=parseInt(a)-1,t.toggleClass("new-item").addClass("removed-item"),t.one("animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd",function(e){t.remove()})});var o=a(n.target,50,50),i="<input type='hidden' name='pic_hide[]' id='pic_hide' value='"+e.imgSrc+"'>";$('<a rel="fancybox">').attr({target:"_blank",href:e.imgSrc}).append(o).append(i).appendTo($(".preview",t))}).attr("src",e.imgSrc)};$("a[rel=fancybox]").fancybox();var fileReaderAvailable="undefined"!=typeof FileReader,clipBoardAvailable=window.clipboardData!==!1,pasteAvailable=Boolean(clipBoardAvailable&fileReaderAvailable&!eval("/*@cc_on !@*/false"));fileReaderAvailable?($("#dropzone_gold_urgent").imageUpload({errorContainer:$("span","#errormessages_gold_urgent"),trigger:"dblclick",enableCliboardCapture:pasteAvailable,onBeforeUpload:function(){$("body").css("background-color","green"),console.log("start",Date.now())},onAfterUpload:function(){$("body").css("background-color","#eee"),console.log("end",Date.now())},outputHandler:outputHandlerFunc}),$("#dropzone_gold_urgent").prev("#gold_urgent_wrapper").find("#textbox_gold_urgent").append('<p class="large">Drag and Drop<br>Image File here</p><p class="small">Doubleclick<br>for file requester</p>')):$("body").addClass("nofilereader"),pasteAvailable||$("body").addClass("nopaste")});
</script>

<script type='text/javascript'>
jQuery(document).ready(function($){var outputHandlerFunc=function(e){var a=function(e,a,n,t){var i,l,o=document.createElement("canvas");return e.width<a&&e.height<n&&void 0==t?(i=e.width,l=e.height):(i=a,l=parseInt(e.height*(a/e.width)),l>n&&(l=n,i=parseInt(e.width*(n/e.height)))),o.width=i,o.height=l,o.getContext("2d").drawImage(e,0,0,i,l),$(o).attr("title","Original size: "+e.width+"x"+e.height),$(o).attr("name","file_img[]"),o};$(new Image).on("load",function(n){console.log("imgobj",n);var t=$('<li class="new-item"><div class="list-content"><span class="preview"></span><span class="options"><span class="imagedelete" title="Remove image"></span></span></div></li>').appendTo("#output_platinum ul");$(".imagedelete",t).one("click",function(e){var a=document.getElementById("image_count").value;document.getElementById("image_count").value=parseInt(a)-1,t.toggleClass("new-item").addClass("removed-item"),t.one("animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd",function(e){t.remove()})});var i=a(n.target,50,50),l="<input type='hidden' name='pic_hide[]' id='pic_hide' value='"+e.imgSrc+"'>";$('<a rel="fancybox">').attr({target:"_blank",href:e.imgSrc}).append(i).append(l).appendTo($(".preview",t))}).attr("src",e.imgSrc)};$("a[rel=fancybox]").fancybox();var fileReaderAvailable="undefined"!=typeof FileReader,clipBoardAvailable=window.clipboardData!==!1,pasteAvailable=Boolean(clipBoardAvailable&fileReaderAvailable&!eval("/*@cc_on !@*/false"));fileReaderAvailable?($("#dropzone_platinum").imageUpload({errorContainer:$("span","#errormessages_platinum"),trigger:"dblclick",enableCliboardCapture:pasteAvailable,onBeforeUpload:function(){$("body").css("background-color","green"),console.log("start",Date.now())},onAfterUpload:function(){$("body").css("background-color","#eee"),console.log("end",Date.now())},outputHandler:outputHandlerFunc}),$("#dropzone_platinum").prev("#platinum_wrapper").find("#textbox_platinum").append('<p class="large">Drag and Drop<br>Image File here</p><p class="small">Doubleclick<br>for file requester</p>')):$("body").addClass("nofilereader"),pasteAvailable||$("body").addClass("nopaste")});
</script>

<script type="text/javascript">
function setup_map(e,n){var o={lat:e,lng:n},a={zoom:12,center:o},t=new google.maps.Map(document.getElementById("map"),a);new google.maps.Marker({position:a.center,map:t})}window.onload=function(){setup_map(51.5073509,-.12775829999998223)};
</script>

<script>
$(document).ready(function(){$("#postalcode").autocomplete({source:"<?php echo base_url(); ?>classified/postalcode_search",minLength:1,messages:{noResults:"No Data Found"}}),$("#postalcode").on("autocompletechange change",function(){$.ajax({type:"POST",url:"<?php echo base_url();?>postad_create_services/getloc_details",data:{postalcode:$(this).val()},success:function(a){data1=JSON.parse(a),""!=data1?($("#location").val(data1[0].district+", "+data1[0].town+", "+data1[0].county+", "+data1[0].postcode+", "+data1[0].country),$("#lattitude").val(data1[0].latitude),$("#longtitude").val(data1[0].longitude),$("#loc_city").val(data1[0].town),$("#location_name").val(data1[0].district+", "+data1[0].town+", "+data1[0].county+", "+data1[0].country),setup_map(parseFloat(data1[0].latitude),parseFloat(data1[0].longitude)),$("#pcode_error").hide(),$("#pcode_status").val(0)):($("#location").val(""),$("#lattitude").val(""),$("#longtitude").val(""),$("#loc_city").val(""),$("#location_name").val(""),$("#postalcode").change(function(){setTimeout(function(){return""!=$("#postalcode").val()&&""!=$("#location").val()?!0:($("#pcode_status").val(1),$("#pcode_error").show(),!1)},3e3)}))}})}).change()});
</script>

</head>

<body id="home">

<div class="preloader"><div class="status">&nbsp;</div></div> 

<div id="layout">

<!-- xxx tophead Content xxx -->
<?php echo $this->load->view('common/tophead'); ?> 
<!-- xxx End tophead xxx -->

<div class="section-title-01"><div class="bg_parallax image_02_parallax"></div></div>   

<section class="content-central">
<div class="semiboxshadow text-center">
<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
</div>

<div class="content_info">
<div class="paddings-mini">
<div class="container">
<div class="row">
<div class="wrapper wrapper-640" style="padding-top: 0px;">

<form action="<?php echo base_url(); ?>postad_create_motors" method="post" class="j-forms j-multistep tooltip-hover" id="j-forms" enctype="multipart/form-data" novalidate>

<div class="header">
<a href="<?php echo base_url(); ?>post-a-deal" class="pull-left post_ad_back"><i class="fa fa-mail-reply-all fa-3x"></i></a><p>Post a Deal</p>
</div>

<div class="content">
<div class="top-head">
<div class="j-row">
<div class="col-sm-8 pad_bottm">
<ul class="social-team pull-left">
<li>
<b><?php
$cat11 = @mysql_result(mysql_query("SELECT category_name FROM catergory WHERE category_id = '$cat'"), 0, 'category_name');
echo ucfirst(@$cat11); ?></b>
<input type='hidden' name='login_id' id='login_id' value="<?php echo @$login_id; ?>" />
<input type='hidden' name='category_id' id='category_id' value="<?php echo @$cat; ?>" />
<input type='hidden' name='sub_id' id='sub_id' value="<?php echo @$sub_id; ?>" />
<input type='hidden' name='sub_sub_id' id='sub_sub_id' value="<?php echo @$sub_sub_id; ?>" />
<input type='hidden' name='sub_sub_sub_id' id='sub_sub_sub_id' value="<?php echo @$sub_sub_sub_id; ?>" />
/</li>
<li><b><?php echo ucfirst(@$sub_name); ?></b>  <?php if ($sub_sub_name != '') { ?> /<?php	} ?></li>
<li><b><?php echo ucfirst(@$sub_sub_name); ?></b> <?php if ($sub_sub_sub_name != '') { ?>  /<?php	} ?></li>
<li><b><?php echo ucfirst(@$sub_sub_sub_name); ?></b></li>
</ul>                 
</div>
<div class="col-sm-4 pad_bottm">
<ul class="social-team pull-left">
<li><a href="" data-toggle="modal" data-target="#motorpoint" ><b>Change Category</b></a></li>
</ul>                 
</div>
</div> 
</div>

<div class="j-row">
<div class="span4 step">
<div class="steps">
<span>Step 1:</span>
<p>1st Screen</p>
</div>
</div>
<div class="span4 step">
<div class="steps">
<span>Step 2:</span>
<p>Packages</p>
</div>
</div>

<div class="span4 step">
<div class="steps">
<span>Step 3:</span>
<p>Terms & Conditions</p>
</div>
</div>
</div>

<fieldset>

<div class="divider gap-bottom-25"></div>

<div class="post_deal_bor">	

<div class="j-row">
<div class="span5 unit">
<div class="unit check logic-block-radio">
<div class="inline-group">
<label class="radio">
<input type="radio" name="checkbox_toggle" id="next-step-radio" class='bus_consumer' value="Yes">
<i></i>Business 
<sup data-toggle="tooltip" title="" data-original-title="Business">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="radio">
<input type="radio" name="checkbox_toggle" class='bus_consumer'  value="No">
<i></i>Consumer 
<sup data-toggle="tooltip" title="" data-original-title="Consumer">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
</div>
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Postal Code 
<sup data-toggle="tooltip" title="" data-original-title="Postal Code">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-left" for="email">
<i class="fa fa-search"></i>
</label>
<input type="text" id="postalcode" name="postalcode" placeholder="" >
<span id="pcode_error" class="error" style="color: #b71c1c !important; display:none;">Please Enter Your Location (or) Nearest Location</span>
<input type="hidden" id="pcode_status" name="pcode_status" value="0" >
</div>
</div>
<div class="span6 unit">
<label class="label">Location 
<sup data-toggle="tooltip" title="" data-original-title="Location">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="phone">
<i class="fa fa-building-o"></i>
</label>
<input id="location" name='location' readonly type="text" placeholder="Type in an address" size="90" />
<input id="lattitude" name='lattitude' readonly type="hidden"  size="90" />
<input id="longtitude" name='longtitude' readonly type="hidden"  size="90" />
<input id="loc_city" name='loc_city' type="hidden"  size="90" />
<input id="location_name" name='location_name' type="hidden"  size="90" />
</div>
</div>
</div>
<div class="j-row">
<div class="span2 unit">

</div>
<div class="span8 unit">
<div id="map"></div>
</div>
<div class="span2 unit">

</div>
</div>

</div>

<div class="post_deal_bor top_10" id='bus_logo' style='display:none;margin-top: 20px;'>	
<div class="j-row"  > 
<div class="span6 unit">
<label class="label">Business Logo 
<sup data-toggle="tooltip" title="" data-original-title="Logo creates a brand image of various business products">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="unit">
<label id='file_remove' class="input append-big-btn">
<div class="file-button">
Browse
<input type="file" name="file" id='file' onchange="document.getElementById('file_input').value = this.value; fileupload(this);">
</div>
<input type="text" id="file_input" readonly="" placeholder="no file selected">
<span class="hint">Only: jpg / png  Size: less 1 Mb</span>
</label>
</div>
</div>
<div class="span4 unit" class='img_hide'>
<img id="blah" src="#" alt=''/>
</div>
<div class="span2 unit" class='del_img'>
<a href='javascript:void(0);' id="del_img" style='display:none;'>
<img src="<?php echo base_url(); ?>img/delete.png" alt='delete' title="Delete"/></a>
</div>
</div>
</div>

<div class="post_deal_bor top_10" style='margin-top: 20px;'>	
<div class="j-row">
<div class="span12 unit">
<div class="unit check logic-block-radio">
<div class="inline-group">
<label class="radio">
<input type="radio" name="checkbox_motbike" id="next-step-radio" value="Seller">
<i></i>Seller
<sup data-toggle="tooltip" title="" data-original-title="Seller">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="radio">
<input type="radio" name="checkbox_motbike"  value="Needed">
<i></i>Needed
<sup data-toggle="tooltip" title="" data-original-title="Needed">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="radio">
<input type="radio" name="checkbox_motbike"  value="ForHire">
<i></i>For Hire
<sup data-toggle="tooltip" title="" data-original-title="For Hire">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
</div>
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Deal Tag / Caption 
<sup data-toggle="tooltip" title="" data-original-title="A good and a catchy caption will be a great source to attract more buyers to your deals. Keywords in the caption will play a major role   to list your deals in search result while buyers searching for deals. hence it is advised to chose the caption wisely.">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="dealtag">
<img src="<?php echo base_url(); ?>j-folder/img/dealtag.png" alt="dealtag" title="Dealtag">
</label>
<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
</div>
</div>
</div>

<div class="j-row">
<div class="span12 unit">
<label class="label">Deal Description 
<sup data-toggle="tooltip" title="" data-original-title="It is ideal to be creative in explaining about your deal in a much detailed way so it enables the buyers to understand and meet their needs as per their requirements. when  the buyer hits the deal page, the creative story about the deal will give more chances to sell the products which also forms a road to success. Also the pictures and the competitive prices of the products will play a vital role in order to hold the buyer.">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<textarea type="text" id="dealdescription" name="dealdescription" cols="40" placeholder="Enter Deal Description"></textarea>
<input type='hidden' name='text_hide' id='text_hide' value='' />
</div>
</div>
</div>

<?php if (@$sub_id == '13') { ?>
<div class="j-row">
<div class="span4 unit">
<label class="label">Vehicle Registration  Number 
<sup data-toggle="tooltip" title="" data-original-title="Vehicle Registration  Number ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="veh_regno">
<img src="<?php echo base_url(); ?>j-folder/img/regno.png" alt="regno" title="Reg No Icon" class="img-responsive">
</label>
<input type="text" id="veh_regno" class="bikeveh_regno" name="veh_regno" placeholder="Enter Vehicle Registration  Number ">
</div>
<span class='pleasewait_bike' style='color:blue;display:none;'>Please Wait...</span>
<span class='manualentry_bike' style='color: red;'></span>
</div>
<div class='span2 unit top_20'>
<button class="primary-btn find_bikevrm" type="button">Find Details</button>
</div>
<div class="span6 unit">
<label class="label">Manufacture 
<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="input select">
<select name="manufacture" class='bike_manufacture'>
<option value="none" selected disabled="">Select manufacture</option>
<?php foreach ($cars_list as $carval) { ?>
<option value="<?php echo $carval['sub_subcategory_id']; ?>"><?php echo $carval['sub_subcategory_name']; ?></option>
<?php } ?>
</select>
<input type="text" name="manufacture1" value="" class='manufacture_bike' style='display: none;' >
<i></i>
</label>
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Bike Type 
<sup data-toggle="tooltip" title="" data-original-title="Bike Type ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="Type" class='bike_type'>
<option value="none" selected disabled="">Select Type</option>
<option value="">Sample</option>
</select>
<input type="text" name="Type1" value="" class='bike_type1' style='display: none;' >
<i></i>
</label>
</div>
<div class="span6 unit">
<label class="label">Model 
<sup data-toggle="tooltip" title="" data-original-title="Model ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="Model" class='bike_model'>
<option value="none" selected disabled="">Select Model</option>
<option value="">Sample</option>
</select>
<input type="text" name="Model1" value="" class='model_bike' style='display: none;' >
<i></i>
</label>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Colour
<sup data-toggle="tooltip" title="" data-original-title="Colour">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="Colour">
<img src="<?php echo base_url(); ?>j-folder/img/color.png" alt="Colour" title="Colour Icon" class="img-responsive">
</label>
<input type="text" id="color" name="color" placeholder="Enter Colour">
</div>
</div>
<div class="span6 unit">
<label class="label">Registration Year
<sup data-toggle="tooltip" title="" data-original-title="Registration Year">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="reg_year">
<img src="<?php echo base_url(); ?>j-folder/img/reg.png" alt="Reg" title="Reg Icon" class="img-responsive">
</label>
<input type="text" id="reg_year" name="reg_year" placeholder="Enter Registration Year" onkeypress="return isNumber(event)">
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Fuel Type  
<sup data-toggle="tooltip" title="" data-original-title="Fuel Type">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="FuelType" class="fueltype">
<option value="none" selected disabled="">Select fuel</option>
<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
</select>
<i></i>
</label>
</div>
<div class="span6 unit">
<label class="label">No of Miles Covered 
<sup data-toggle="tooltip" title="" data-original-title="No of Miles Covered ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="No of Miles Covered ">
<img src="<?php echo base_url(); ?>j-folder/img/miles.png" alt="Miles" title="Miles Icon" class="img-responsive">
</label>
<input type="text" id="tot_miles" name="tot_miles" placeholder="Enter No of Miles Covered" onkeypress="return isNumber(event)">
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Engine Size 
<sup data-toggle="tooltip" title="" data-original-title="Engine Size ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="Engine Sise">
<img src="<?php echo base_url(); ?>j-folder/img/engsize.png" alt="Miles" title="Engine Icon" class="img-responsive">
</label>
<input type="text" id="eng_size" name="eng_size" placeholder="Enter Engine Size " onkeypress="return isNumber(event)">
</div>
</div>
<div class="span6 unit">
<label class="label">Road TAX status  
<sup data-toggle="tooltip" title="" data-original-title="Road TAX status ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="road_tax">
<img src="<?php echo base_url(); ?>j-folder/img/roadtax.png" alt="Road TAX" title="Road TAX Icon" class="img-responsive">
</label>
<input type="text" id="road_tax" name="road_tax" placeholder="Enter Road TAX status ">
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Condition 
<sup data-toggle="tooltip" title="" data-original-title="Condition">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="Condition">
<option value="none" selected disabled="">Select condition</option>
<option value="Excellent">Excellent</option>
<option value="Good">Good</option>
<option value="Average">Average</option>
</select>
<i></i>
</label>
</div>
</div>
<?php		} ?>
<?php if (@$sub_id == '12' || @$sub_id == '15' || @$sub_id == '16') { ?>
<div class="j-row">
<div class="span4 unit">
<label class="label">Vehicle Registration  Number 
<sup data-toggle="tooltip" title="" data-original-title="Vehicle Registration  Number ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="veh_regno">
<img src="<?php echo base_url(); ?>j-folder/img/regno.png" alt="regno" title="Reg No Icon" class="img-responsive">
</label>
<input type="text" class='veh_regno' id="veh_regno" name="veh_regno" placeholder="Enter Vehicle Registration  Number ">
</div>
<span class='pleasewait' style='color:blue;display:none;'>Please Wait...</span>
<span class='manualentry' style='color: red;'></span>
</div>
<div class='span2 unit top_20'>
<button class="primary-btn find_vrm" type="button">Find Details</button>
</div>
<div class="span6 unit">
<label class="label">Manufacture 
<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="input select">
<select name="manufacture" class='manufacture'>
<option value="none" selected disabled="">Select manufacture</option>
<?php foreach ($cars_list as $carval) { ?>
<option value="<?php echo $carval['sub_subcategory_id']; ?>"><?php echo $carval['sub_subcategory_name']; ?></option>
<?php } ?>
</select>
<input type="text" name="manufacture1" value="" class='res_manufacture' style='display: none;' >
<i></i>
</label>
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Model 
<sup data-toggle="tooltip" title="" data-original-title="Model ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="Model" class='car_model'>
<option value="none" selected disabled="">Select Model</option>
<option value="3months">Sample</option>
</select>
<input type="text" name="Model1" value="" class='res_model' style='display: none;' >
<i></i>
</label>
</div>
<div class="span6 unit">
<label class="label">Colour
<sup data-toggle="tooltip" title="" data-original-title="Colour">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="Colour">
<img src="<?php echo base_url(); ?>j-folder/img/color.png" alt="Colour" title="Colour Icon" class="img-responsive">
</label>
<input type="text" id="color" name="color" placeholder="Enter Colour">
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Registration Year
<sup data-toggle="tooltip" title="" data-original-title="Registration Year">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="reg_year">
<img src="<?php echo base_url(); ?>j-folder/img/reg.png" alt="Reg" title="Reg Icon" class="img-responsive">
</label>
<input type="text" id="reg_year" name="reg_year" placeholder="Enter Registration Year" onkeypress="return isNumber(event)">
</div>
</div>
<div class="span6 unit">
<label class="label">Fuel Type  
<sup data-toggle="tooltip" title="" data-original-title="Fuel Type">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="FuelType" class="fueltype">
<option value="none" selected disabled="">Select Fuel</option>
<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
<option value="Electric">Electric</option>
</select>
<i></i>
</label>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Transmission   
<sup data-toggle="tooltip" title="" data-original-title="Transmission ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="Transmission">
<option value="none" selected disabled="">Select Transmission</option>
<option value="Manual">Manual</option>
<option value="Semi-Automatic">Semi-Automatic</option>
<option value="Automatic">Automatic</option>
<option value="Others">Others</option>
</select>
<i></i>
</label>
</div>
<div class="span6 unit">
<label class="label">Engine Size 
<sup data-toggle="tooltip" title="" data-original-title="Engine Size ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="Engine Sise">
<img src="<?php echo base_url(); ?>j-folder/img/engsize.png" alt="Miles" title="Engine Icon" class="img-responsive">
</label>
<input type="text" id="eng_size" name="eng_size" placeholder="Enter Engine Size" onkeypress="return isNumber(event)">
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">No of Doors    
<sup data-toggle="tooltip" title="" data-original-title="No of Doors  ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="NoofDoors">
<option value="none" selected disabled="">Select doors</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="others">others</option>
</select>
<i></i>
</label>
</div>
<div class="span6 unit">
<label class="label">No of Seats    
<sup data-toggle="tooltip" title="" data-original-title="No of Seats  ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="NoofSeats">
<option value="none" selected disabled="">Select No of seats</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6-15">6-15</option>
<option value="16-25">16-25</option>
<option value="26-35">26-35</option>
<option value="36-45">36-45</option>
<option value="46-55">46-55</option>
<option value="56-65">56-65</option>
</select>
<i></i>
</label>
</div>
</div>

<div class="j-row">
<div class="span6 unit">
<label class="label">No of Miles Covered 
<sup data-toggle="tooltip" title="" data-original-title="No of Miles Covered ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="No of Miles Covered ">
<img src="<?php echo base_url(); ?>j-folder/img/miles.png" alt="Miles" title="Miles Icon" class="img-responsive">
</label>
<input type="text" id="tot_miles" name="tot_miles" placeholder="Enter No of Miles Covered" onkeypress="return isNumber(event)">
</div>
</div>
<div class="span6 unit">
<label class="label">MOT Status 
<sup data-toggle="tooltip" title="" data-original-title="MOT Status ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="MOT Status ">
<img src="<?php echo base_url(); ?>j-folder/img/status.png" alt="MOT Status" title="MOT Status Icon" class="img-responsive">
</label>
<input type="text" id="mot_status" name="mot_status" placeholder="Enter MOT Status">
</div>
</div>
</div>

<div class="j-row">
<div class="span6 unit">
<label class="label">Road TAX status  
<sup data-toggle="tooltip" title="" data-original-title="Road TAX status ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="road_tax">
<img src="<?php echo base_url(); ?>j-folder/img/roadtax.png" alt="Road TAX" title="Road TAX Icon" class="img-responsive">
</label>
<input type="text" id="road_tax" name="road_tax" placeholder="Enter Road TAX status ">
</div>
</div>
</div>	
<?php	} ?>
<?php if (@$sub_id == '19') { ?>
<div class="j-row">
<div class="span6 unit">
<label class="label">Type of Boat 
<sup data-toggle="tooltip" title="" data-original-title="Type of Boat ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="input">
<input type="text" id="typeofBoat" name="typeofBoat" placeholder="Enter type of Boat" >
<i></i>
</label>
</div>
</div>
<div class="span6 unit">
<label class="label">Year
<sup data-toggle="tooltip" title="" data-original-title="Year">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="year_boat">
<img src="<?php echo base_url(); ?>j-folder/img/reg.png" alt="year" title="year Icon" class="img-responsive">
</label>
<input type="text" id="year_boat" name="year_boat" placeholder="Enter Year" onkeypress="return isNumber(event)">
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Manufacturer 
<sup data-toggle="tooltip" title="" data-original-title="Manufacturer">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input">
<label class="input">
<input type="text" id="Manufacturer" name="Manufacturer" placeholder="Enter Manufacturer" >
<i></i>
</label>
<i></i>
</label>
</div>
<div class="span6 unit">
<label class="label">Colour
<sup data-toggle="tooltip" title="" data-original-title="Colour">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="Colour">
<img src="<?php echo base_url(); ?>j-folder/img/color.png" alt="Colour" title="Colour Icon" class="img-responsive">
</label>
<input type="text" id="boatcolor" name="boatcolor" placeholder="Enter Boat Colour">
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Fuel Type  
<sup data-toggle="tooltip" title="" data-original-title="Fuel Type">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="FuelType">
<option value="none" selected disabled="">Select FuelType</option>
<option value="Diesel">Diesel</option>
<option value="Petrol">Petrol</option>
</select>
<i></i>
</label>
</div>
<div class="span6 unit">
<label class="label">Condition 
<sup data-toggle="tooltip" title="" data-original-title="Condition">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="Condition">
<option value="none" selected disabled="">Select Condition</option>
<option value="Excellent">Excellent</option>
<option value="good">good</option>
<option value="average">average</option>
</select>
<i></i>
</label>
</div>
</div>

<?php } ?>

<?php if (@$sub_id == '73') { ?>
<div class="j-row">
<div class="span6 unit">
<label class="label">Manufacture 
<sup data-toggle="tooltip" title="" data-original-title="Manufacture">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="input">
<input type="text" id="access_Manufacture" name="access_Manufacture" placeholder="Enter Manufacture" >
<i></i>
</label>
</div>
</div>
<div class="span6 unit">
<label class="label">Model
<sup data-toggle="tooltip" title="" data-original-title="Model">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<input type="text" id="access_model" name="access_model" placeholder="Enter Model" onkeypress="return isNumber(event)">
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Part Type 
<sup data-toggle="tooltip" title="" data-original-title="Part Type">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input">
<label class="input">
<input type="text" id="access_type" name="access_type" placeholder="Enter Part Type" >
<i></i>
</label>
<i></i>
</label>
</div>
<div class="span6 unit">
<label class="label">Year
<sup data-toggle="tooltip" title="" data-original-title="Year">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<input type="text" id="access_year" name="access_year" placeholder="Enter Year">
</div>
</div>
</div>
<?php } ?>

<?php if (@$sub_id == '14') { ?>
<div class="j-row">
<div class="span6 unit">
<div class="unit check logic-block-radio">
<div class="inline-group">
<label class="radio">
<input type="radio" name="Caravans" id="next-step-radio"  value="Caravans">
<i></i> Caravans 
<sup data-toggle="tooltip" title="" data-original-title="Caravans">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="radio">
<input type="radio" name="Caravans"  value="Motorhomes">
<i></i> Motorhomes
<sup data-toggle="tooltip" title="" data-original-title="Motorhomes">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
</div>
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Vehicle Registration  Number 
<sup data-toggle="tooltip" title="" data-original-title="Vehicle Registration  Number ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="veh_regno">
<img src="<?php echo base_url(); ?>j-folder/img/regno.png" alt="regno" title="Reg No Icon" class="img-responsive">
</label>
<input type="text" id="veh_regno" name="veh_regno" placeholder="Enter Vehicle Registration  Number ">
</div>
</div>
<div class="span6 unit">
<label class="label">Manufacture 
<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="input select">
<select name="manufacture" class='manufacture'>
<option value="none" selected disabled="">Select manufacture</option>
<?php foreach ($cars_list as $carval) { ?>
<option value="<?php echo $carval['sub_subcategory_id']; ?>"><?php echo $carval['sub_subcategory_name']; ?></option>
<?php } ?>
</select><i></i>
</label>
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Model 
<sup data-toggle="tooltip" title="" data-original-title="Model ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="Model" class='car_model'>
<option value="none" selected disabled="">Select Age</option>
<option value="3months">Sample</option>
</select>
<i></i>
</label>
</div>
<div class="span6 unit">
<label class="label">Colour
<sup data-toggle="tooltip" title="" data-original-title="Colour">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="Colour">
<img src="<?php echo base_url(); ?>j-folder/img/color.png" alt="Colour" title="Colour Icon" class="img-responsive">
</label>
<input type="text" id="color" name="color" placeholder="Enter Colour">
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Registration Year
<sup data-toggle="tooltip" title="" data-original-title="Registration Year">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="reg_year">
<img src="<?php echo base_url(); ?>j-folder/img/reg.png" alt="Reg" title="Reg Icon" class="img-responsive">
</label>
<input type="text" id="reg_year" name="reg_year" placeholder="Enter Registration Year" onkeypress="return isNumber(event)">
</div>
</div>
<div class="span6 unit">
<label class="label">Fuel Type  
<sup data-toggle="tooltip" title="" data-original-title="Fuel Type">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="FuelType">
<option value="none" selected disabled="">Select Fuel</option>
<option value="Petrol">Petrol</option>
<option value="Diesel">Diesel</option>
<option value="Electric">Electric</option>
</select>
<i></i>
</label>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Transmission   
<sup data-toggle="tooltip" title="" data-original-title="Transmission ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="Transmission">
<option value="none" selected disabled="">Select Transmission</option>
<option value="Manual">Manual</option>
<option value="Semi-Automatic">Semi-Automatic</option>
<option value="Automatic">Automatic</option>
<option value="Others">Others</option>
</select>
<i></i>
</label>
</div>
<div class="span6 unit">
<label class="label">Engine Size 
<sup data-toggle="tooltip" title="" data-original-title="Engine Size ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="Engine Sise">
<img src="<?php echo base_url(); ?>j-folder/img/engsize.png" alt="Miles" title="Engine Icon" class="img-responsive">
</label>
<input type="text" id="eng_size" name="eng_size" placeholder="Enter Engine Size " onkeypress="return isNumber(event)">
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">No of Doors    
<sup data-toggle="tooltip" title="" data-original-title="No of Doors  ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="NoofDoors">
<option value="none" selected disabled="">Select doors</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="others">others</option>
</select>
<i></i>
</label>
</div>
<div class="span6 unit">
<label class="label">No of Seats    
<sup data-toggle="tooltip" title="" data-original-title="No of Seats  ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="NoofSeats">
<option value="none" selected disabled="">Select No of seats</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6-15">6-15</option>
<option value="16-25">16-25</option>
<option value="26-35">26-35</option>
<option value="36-45">36-45</option>
<option value="46-55">46-55</option>
<option value="56-65">56-65</option>
</select>
<i></i>
</label>
</div>
</div>

<div class="j-row">
<div class="span6 unit">
<label class="label">No of Miles Covered 
<sup data-toggle="tooltip" title="" data-original-title="No of Miles Covered ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="No of Miles Covered ">
<img src="<?php echo base_url(); ?>j-folder/img/miles.png" alt="Miles" title="Miles Icon" class="img-responsive">
</label>
<input type="text" id="tot_miles" name="tot_miles" placeholder="Enter No of Miles Covered" onkeypress="return isNumber(event)">
</div>
</div>
<div class="span6 unit">
<label class="label">MOT Status 
<sup data-toggle="tooltip" title="" data-original-title="MOT Status ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="MOT Status ">
<img src="<?php echo base_url(); ?>j-folder/img/status.png" alt="MOT Status" title="MOT Status Icon" class="img-responsive">
</label>
<input type="text" id="mot_status" name="mot_status" placeholder="Enter MOT Status">
</div>
</div>
</div>

<div class="j-row">
<div class="span6 unit">
<label class="label">Road TAX status  
<sup data-toggle="tooltip" title="" data-original-title="Road TAX status ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="road_tax">
<img src="<?php echo base_url(); ?>j-folder/img/roadtax.png" alt="Road TAX" title="Road TAX Icon" class="img-responsive">
</label>
<input type="text" id="road_tax" name="road_tax" placeholder="Enter Road TAX status ">
</div>
</div>
</div>	
<?php } ?>

<?php if (@$sub_id == '17' || @$sub_id == '18') { ?>
<div class="j-row">
<div class="span6 unit">
<?php if (@$sub_id == '17') { ?>
<label class="label">Type of Plant-Machinery
<sup data-toggle="tooltip" title="" data-original-title="Type of Plant-Machinery">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<?php } ?>
<?php if (@$sub_id == '18') { ?>
<label class="label">Type of Farming Vehicle 
<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<?php } ?>
<?php if (@$sub_id == '17') { ?>
<div class="input select">
<select name="manufacture_plant" class='plant_manufacture'>
<option value="none" selected disabled="">Select Plant-Machinery type</option>
<?php foreach ($plants as $plantsval) { ?>
<option value="<?php echo $plantsval->sub_subcategory_id; ?>"><?php echo $plantsval->sub_subcategory_name; ?></option>
<?php } ?>
</select>
<i></i>
</div>
<?php }
else{ ?>
<div class="input">
<label class="input select">
<select name="manufacture_farming">
<option value="none" selected disabled="">Select Farming Vehicle Type</option>
<?php foreach ($farming as $farmval) { ?>
<option value="<?php echo $farmval->sub_subcategory_id; ?>"><?php echo $farmval->sub_subcategory_name; ?></option>
<?php } ?>
</select>
<i></i>
</label>
</div>
<?php } ?>

</div>
<div class="span6 unit">
<label class="label">Year
<sup data-toggle="tooltip" title="" data-original-title="Year">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="year_boat">
<img src="<?php echo base_url(); ?>j-folder/img/reg.png" alt="year" title="year Icon" class="img-responsive">
</label>
<input type="text" id="year_boat" name="year_boat" placeholder="Enter Year" onkeypress="return isNumber(event)">
</div>
</div>
</div>

<div class="j-row">
<div class="span6 unit">
<?php if (@$sub_id == '17') { ?>
<label class="label">Manufacture 
<sup data-toggle="tooltip" title="" data-original-title="Manufacture">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<?php }
else{ ?>
<label class="label">Manufacture 
<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<?php } ?>
<label class="input">
<?php if (@$sub_id == '17') { ?>
<label class="input select">
<select name="plant_model1" class='plant_model'>
<option value="none" selected disabled="">Select Manufacture</option>
<option value="">Sample</option>
</select>
<i></i>
</label>
<?php }
else{ ?>
<input type="text" id="Model" name="plant_model" placeholder="Enter Manufacture">
<?php	} ?>


<i></i>
</label>
</div>
<div class="span6 unit">
<label class="label">Colour
<sup data-toggle="tooltip" title="" data-original-title="Colour">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="Colour">
<img src="<?php echo base_url(); ?>j-folder/img/color.png" alt="Colour" title="Colour Icon" class="img-responsive">
</label>
<input type="text" id="color" name="color" placeholder="Enter Colour">
</div>
</div>
</div>

<div class="j-row">
<div class="span6 unit">
<label class="label">Condition 
<sup data-toggle="tooltip" title="" data-original-title="Condition">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="Condition">
<option value="none" selected disabled="">Select condition</option>
<option value="Excellent">Excellent</option>
<option value="Good">Good</option>
<option value="Average">Average</option>
</select>
<i></i>
</label>
</div>
</div>
<?php } ?>

<div class="j-row">
<div class="span6 unit">
<label class="label">Price 
<sup data-toggle="tooltip" title="" data-original-title="It notifies the symbol of the currency ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="unit check logic-block-radio">
<div class="inline-group">
<label class="radio">
<input type="radio" name="checkbox_toggle1" id="next-step-radio" class='currency' value="pound">
<i></i> <span class="pound_sym pound_sym_black"></span> (Pound) 
</label>

</div>
</div>
</div>
<div class="span6 unit">
<div class="j-row">
<div class="span6 unit top_20">
<div class="input">
<label class="icon-right" for="price">
<img src="<?php echo base_url(); ?>j-folder/img/price.png" alt="price" title="Price">
</label>
<input type="text" id="priceamount" name="priceamount" placeholder="Enter Amount" onkeypress="return isNumber(event)">
</div>
</div>
<div class="span6 unit"><!-- start Deal Tag -->
<label class="label">Price Type 
<sup data-toggle="tooltip" title="" data-original-title="It indicates if the product price is fixed or negotiable">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="price_type">
<option value="none" selected disabled="">Select type</option>
<option value="Negotiable">Negotiable</option>
<option value="Fixed">Fixed</option>
</select>
<i></i>
</label>
</div>
</div>

</div>
</div>
</div>
</fieldset>

<fieldset>

<div class="divider gap-bottom-25"></div>
<?php 
foreach ($free_pkg_list as $pack_val) {
$free_duration = $pack_val->dur_days;
$freepck_img = $pack_val->img_count;
$free_bump_home = $pack_val->bump_home;
$free_bump_search = $pack_val->bump_search;
$c_euro = $pack_val->cost_euro;
$c_pund = $pack_val->cost_pound;
}
foreach ($gold_pkg_list as $pack_val) {
$gold_duration = $pack_val->dur_days;
$goldpck_img = $pack_val->img_count;
$gold_bump_home = $pack_val->bump_home;
$gold_bump_search = $pack_val->bump_search;
$gc_euro = $pack_val->cost_euro;
$gc_pund = $pack_val->cost_pound;
}
foreach ($ptm_pkg_list as $pack_val) {
$ptm_duration = $pack_val->dur_days;
$ptmpck_img = $pack_val->img_count;
$ptm_bump_home = $pack_val->bump_home;
$ptm_bump_search = $pack_val->bump_search;
$ptm_euro = $pack_val->cost_euro;
$ptm_pound = $pack_val->cost_pound;
}

foreach ($urgentlabel1 as $pack_val) {
$u_pkg_days1 = $pack_val->u_pkg_days;
$u_pkg_euro_cost1 = $pack_val->u_pkg_euro_cost;
$u_pkg_pound_cost1 = $pack_val->u_pkg__pound_cost;
}
foreach ($urgentlabel2 as $pack_val) {
$u_pkg_days2 = $pack_val->u_pkg_days;
$u_pkg_euro_cost2 = $pack_val->u_pkg_euro_cost;
$u_pkg_pound_cost2 = $pack_val->u_pkg__pound_cost;
}
foreach ($urgentlabel3 as $pack_val) {
$u_pkg_days3 = $pack_val->u_pkg_days;
$u_pkg_euro_cost3 = $pack_val->u_pkg_euro_cost;
$u_pkg_pound_cost3 = $pack_val->u_pkg__pound_cost;
}
?>

<div class="j-row">
<div class="span4">
<div class="promotion-box">
<div class="promotion-box-center color-2">
<div class="prince">
Free
</div>
</div>

<div class="promotion-box-info">
<ul class="list-styles">
<li><i class="fa fa-check"></i> Validity : <?php echo $free_duration; ?> days</li>
<li><i class="fa fa-check"></i> Up to <?php echo $freepck_img; ?> Images</li>
<li><i class="fa fa-check"></i>Initially displayed in recent ads on Homepage <a href="" class='exam_ple' data-toggle='modal' data-target='#recent_modal'><strong>Example</strong></a></li>
<li><i class="fa fa-check"></i>Deal will be HOT Deal with <?php echo $free_likes; ?> Likes </li>
<li class="text_center"> <br> </li>
<li class="text_center"><br></li>
<li class="text_center"> <br></li>
<li class="text_center"> <br> </li>
<li class="text_center"> <br> </li>
<li class="text_center"> <br> </li>
<li class="text_center"> <br> </li>
<div class="free_bg text_center free_pound" style="display:none;">
<h3 class="price_amt"><span class="pound_sym"></span><?php echo $c_pund; ?></h3>
</div>
<div class="free_bg text_center free_euro" style="display:none;">
<h3 class="price_amt"><span class="euro_sym"></span><?php echo $c_euro; ?></h3>
</div>
</ul>
<div class="hot_deal_rad check">
<label class="radio">
<input type="radio" id='free_pck' name="select_packge" class='select_pack' value="1" data-price="5">
<i></i>
Select Free 
</label>
<input type = 'hidden' name='fimg_pck_count' id='fimg_pck_count' value ="<?php echo $freepck_img; ?>">
</div>
</div>

</div>
</div>

<div class="span4">
<div class="promotion-box">
<div class="promotion-box-center color-1">
<div class="prince">
Gold
</div>
</div>

<div class="promotion-box-info">
<ul class="list-styles">
<li><i class="fa fa-check"></i> Validity : <?php echo $gold_duration; ?> days</li>
<li><i class="fa fa-check"></i> Up to <?php echo $goldpck_img; ?> Images</li>
<li><i class="fa fa-check"></i> Bump up to <?php echo $gold_bump_search; ?>days in result <a href="" class='exam_ple' data-toggle='modal' data-target='#bump_modal'><strong>Example</strong></a></li>
<li><i class="fa fa-check"></i> Deal will Highlight in search result <a href="" class='exam_ple' data-toggle='modal' data-target='#gold_deal_modal'><strong>Example</strong></a></li>
<li><i class="fa fa-check"></i> Deal will be HOT Deals with <?php echo $gold_likes; ?> Likes</li>
<li><i class="fa fa-check"></i> Displayed at Most valued deals on Home Page <a href="" class='exam_ple' data-toggle='modal' data-target='#mostvalued_modal'><strong>Example</strong></a></li>
<li><i class="fa fa-check"></i> Thumps Up  Symbol will attach</li>
<li class="text_center"> <br> </li>
<li class="text_center"> <br> </li>
<li class="text_center"> <br> </li>
<div class="gold_bg text_center free_pound" style="display:none;">
<h3 class="price_amt"><span class="pound_sym"></span><?php echo $gc_pund; ?></h3>
</div>
<div class="gold_bg text_center free_euro" style="display:none;">
<h3 class="price_amt"><span class="euro_sym"></span><?php echo $gc_euro; ?></h3>
</div>
</ul>

<div class="hot_deal_rad check">
<label class="radio">
<input type="radio" id='gold_pck' name="select_packge" class='select_pack' value="2" data-price="5">
<i></i>
Select Gold 
</label>
<input type = 'hidden' name='gimg_pck_count' id='gimg_pck_count' value ="<?php echo $goldpck_img; ?>">
</div>
</div>
</div>
</div>

<div class="span4">
<div class="promotion-box">
<div class="promotion-box-center color-3">
<div class="prince">
Platinum
</div>
</div>

<div class="promotion-box-info">
<ul class="list-styles">
<li><i class="fa fa-check"></i> Validity : <?php echo $ptm_duration; ?> days</li>
<li><i class="fa fa-check"></i> Up to <?php echo $ptmpck_img; ?> Images</li>
<li><i class="fa fa-check"></i> Bump up to <?php echo $ptm_bump_search; ?>days in result <a href="" class='exam_ple' data-toggle='modal' data-target='#bump_modal'><strong>Example</strong></a></li>
<li><i class="fa fa-check"></i> Ad will display on Homepage Significant Ads for <?php echo $ptm_bump_home; ?> days <a href="" class='exam_ple' data-toggle='modal' data-target='#sign_modal'><strong>Example</strong></a></li>
<li><i class="fa fa-check"></i> Image will be display as Slide by Slide in Result <a href="" class='exam_ple' data-toggle='modal' data-target='#slide_by_slide_modal'><strong>Example</strong></a></li>
<li><i class="fa fa-check"></i> Youtube Video can provide <a href="" class='exam_ple' data-toggle='modal' data-target='#youtube_modal'><strong>Example</strong></a></li>
<li><i class="fa fa-check"></i> Title displayed in Hot deals Marquee <a href="" class='exam_ple' data-toggle='modal' data-target='#hot_deals_modal'><strong>Example</strong></a></li>
<li><i class="fa fa-check"></i> Crown symbol will attach  </li>
<li><i class="fa fa-check"></i> Deal will automatically in HOT Deals</li>
<div class="platinum_bg text_center free_pound" style="display:none;">
<h3 class="price_amt"><span class="pound_sym"></span><?php echo $ptm_pound; ?></h3>
</div>
<div class="platinum_bg text_center free_euro" style="display:none;">
<h3 class="price_amt"><span class="euro_sym"></span><?php echo $ptm_euro; ?></h3>
</div>
</ul>

<div class="hot_deal_rad check">
<label class="radio">
<input type="radio" id='platinum_pck' name="select_packge" class='select_pack' value="3" data-price="5">
<i></i>
Select Platinum 
</label>
<input type = 'hidden' name='pimg_pck_count' id='pimg_pck_count' value ="<?php echo $ptmpck_img; ?>">
</div>
</div>
</div>

</div>
</div>
<div class="divider_space"></div>

<div class="alert alert-danger pack_error" style='display:none;' >
<strong>Error!</strong> Please select one package
</div>

<div class="divider_space"></div>
<div class="j-row">
<div class="span12">
<div class="promotion-box">
<div class="promotion-box-center color-2">
<div class="prince">
URGENT LABLE 
</div>
<div class="pull-right view_example">
<a href="" class='exam_ple' data-toggle='modal' data-target='#urgent_label_modal'> View Example</a>
</div>
</div>
<div class="j-row">
<div class="span4 bor_right">
<div class="promotion-box-info free_pound" style="display:none;">
<ul class="list-styles">
<li><i class="fa fa-check"></i> <span class="pound_sym pound_sym_black"></span> <?php echo $u_pkg_pound_cost1 ?> - <?php echo $u_pkg_days1 ?> Days (Exclusive VAT)</li>
<div class="free_bg text_center " >
<h3 class="price_amt"><span class="pound_sym"></span> <?php echo $u_pkg_pound_cost1 ?> </h3>
</div>
</ul>
<div class="hot_deal_rad">
<label class="radio">
<input type="radio" id='freeurgent' name="select_urgent" class='select_urgent_pack freeurgent' value="1"  data-price="5">
<i></i>
Urgent
</label>
</div>
</div>
<div class="promotion-box-info free_euro" style="display:none;">
<ul class="list-styles">
<li><i class="fa fa-check"></i> <span class="euro_sym"></span><?php echo $u_pkg_euro_cost1 ?>-<?php echo $u_pkg_days1 ?>Days (Exclusive VAT)</li>
<div class="free_bg text_center " >
<h3 class="price_amt"><span class="euro_sym"></span><?php echo $u_pkg_euro_cost1 ?></h3>
</div>
</ul>
<div class="hot_deal_rad">
<label class="radio">
<input type="radio" id='freeurgent' name="select_urgent" class='select_urgent_pack freeurgent' value="1"  data-price="5">
<i></i>
Urgent
</label>
</div>
</div>
</div>
<div class="span4 bor_right">
<div class="promotion-box-info free_pound" style="display:none;">
<ul class="list-styles">
<li><i class="fa fa-check"></i> <span class="pound_sym pound_sym_black"></span><?php echo $u_pkg_pound_cost2 ?> -<?php echo $u_pkg_days2; ?> days (Exclusive VAT)</li>
<div class="free_bg text_center " >
<h3 class="price_amt"><span class="pound_sym"></span><?php echo $u_pkg_pound_cost2 ?></h3>
</div>
</ul>
<div class="hot_deal_rad">
<label class="radio">
<input type="radio" id='goldurgent' name="select_urgent" class='select_urgent_pack goldurgent' value="2"  data-price="5">
<i></i>
Urgent 
</label>
</div>
</div>
<div class="promotion-box-info free_euro" style="display:none;">
<ul class="list-styles">
<li><i class="fa fa-check"></i> <span class="euro_sym"></span><?php echo $u_pkg_euro_cost2 ?> -<?php echo $u_pkg_days2; ?> days (Exclusive VAT)</li>
<div class="free_bg text_center " >
<h3 class="price_amt"><span class="euro_sym"></span><?php echo $u_pkg_euro_cost2 ?></h3>
</div>
</ul>
<div class="hot_deal_rad">
<label class="radio">
<input type="radio" id='goldurgent' name="select_urgent" class='select_urgent_pack goldurgent' value="2"  data-price="5">
<i></i>
Urgent 
</label>
</div>
</div>
</div>
<div class="span4">
<div class="promotion-box-info free_pound" style="display:none;">
<ul class="list-styles">
<li><i class="fa fa-check"></i> <span class="pound_sym pound_sym_black"></span><?php echo $u_pkg_pound_cost3 ?>-<?php echo $u_pkg_days3; ?> Days(Exclusive VAT)</li>
<div class="free_bg text_center " >
<h3 class="price_amt"><span class="pound_sym"></span><?php echo $u_pkg_pound_cost3; ?></h3>
</div>
</ul>
<div class="hot_deal_rad">
<label class="radio">
<input type="radio" id='platinumurgent' name="select_urgent" class='select_urgent_pack platinumurgent' value="3"  data-price="5">
<i></i>
Urgent
</label>
</div>
</div>
<div class="promotion-box-info free_euro" style="display:none;">
<ul class="list-styles">
<li><i class="fa fa-check"></i><span class="euro_sym"></span><?php echo $u_pkg_euro_cost3 ?>-<?php echo $u_pkg_days3; ?> Days(Exclusive VAT)</li>
<div class="free_bg text_center " >
<h3 class="price_amt"><span class="euro_sym"></span><?php echo $u_pkg_euro_cost3 ?></h3>
</div>
</ul>
<div class="hot_deal_rad">
<label class="radio">
<input type="radio" id='platinumurgent' name="select_urgent" class='select_urgent_pack platinumurgent' value="3"  data-price="5">
<i></i>
Urgent
</label>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


</fieldset>

<fieldset>

<div class="divider gap-bottom-25"></div>

<div class="j-row free_pck" style='display: none;'>
<div class="alert alert-danger free_img_error" style='display:none;' >
<strong>Error!</strong> Please upload upto <?php echo $freepck_img; ?> images only
</div>
<div class="span4 unit">
<div style="width:240px;">
<div id="dropzone-wrapper">
<div id="free_wrapper"><div id=textbox_free></div></div>
<div id="dropzone_free"></div>
</div>

<div id="overlay_free"></div>
</div>
</div>
<div class="span8 unit">
<div class="j-row">
<div class="span12">
<div>
<h3>Upload Images ( <?php echo $freepck_img; ?> images ) :</h3>
<div id="output_free"><ul id="free"></ul></div>
</div>
<div style="clear:both;"></div>
</div>
</div>
</div>
</div>

<div class="j-row free_urgent_pck" style='display: none;'>
<div class="alert alert-danger freeurgent_img_error" style='display:none;' >
<strong>Error!</strong> Please upload upto 9 images only
</div>
<div class="span4 unit">
<div style="width:240px;">
<div id="dropzone-wrapper">
<div id="free_urgent_wrapper"><div id=textbox_free_urgent></div></div>
<div id="dropzone_free_urgent"></div>
</div>

<div id="overlay_free_urgent"></div>
</div>
</div>
<div class="span8 unit">
<div class="j-row">
<div class="span12">
<div>
<h3>Upload Images ( 9 images ) :</h3>
<div id="output_free_urgent"><ul id="free"></ul></div>
</div>
<div style="clear:both;"></div>
</div>
</div>
</div>
<div class="span12 unit">
<label class="label">Video Link 
<sup data-toggle="tooltip" title="" data-original-title="Video Link">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="unit">
<input type="file" name="file_video_free" id='file_video_free' >
</div>
</div>
<div class="span12 unit">
<label class="label">Website Link ( Eg.www.99rightdeals.com ) 
<sup data-toggle="tooltip" title="" data-original-title="Website Link">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="Video">
<i class="fa fa-briefcase"></i>
</label>
<input type="text" id="freeurgent_weblink" name="freeurgent_weblink" placeholder="">
</div>
</div>
</div>

<div class="j-row gold_pck" style='display: none;'>
<div class="alert alert-danger gold_img_error" style='display:none;' >
<strong>Error!</strong> Please upload upto <?php echo $goldpck_img; ?> images only
</div>
<div class="span4 unit">
<div style="width:240px;">
<div id="dropzone-wrapper">
<div id="gold_wrapper"><div id=textbox_gold></div></div>
<div id="dropzone_gold"></div>
</div>

<div id="overlay_gold"></div>
</div>
</div>
<div class="span8 unit">
<div class="j-row">
<div class="span12">
<div>
<h3>Upload Images ( <?php echo $goldpck_img; ?> images ) :</h3>
<div id="output_gold"><ul id="free"></ul></div>
</div>
<div style="clear:both;"></div>
</div>
</div>
</div>
<div class="span12 unit">
<label class="label">Website Link ( Eg.www.99rightdeals.com ) 
<sup data-toggle="tooltip" title="" data-original-title="Website Link">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="Video">
<i class="fa fa-briefcase"></i>
</label>
<input type="text" id="gold_weblink" name="gold_weblink" placeholder="">
</div>
</div>
</div>

<div class="j-row gold_urgent_pck" style='display: none;'>
<div class="alert alert-danger goldurgent_img_error" style='display:none;' >
<strong>Error!</strong> Please upload upto 12 images only
</div>
<div class="span4 unit">
<div style="width:240px;">
<div id="dropzone-wrapper">
<div id="gold_urgent_wrapper"><div id=textbox_gold_urgent></div></div>
<div id="dropzone_gold_urgent"></div>
</div>

<div id="overlay_gold_urgent"></div>
</div>
</div>
<div class="span8 unit">
<div class="j-row">
<div class="span12">
<div>
<h3>Upload Images ( 12 images ) :</h3>
<div id="output_gold_urgent"><ul id="free"></ul></div>
</div>
<div style="clear:both;"></div>
</div>
</div>
</div>
<div class="span12 unit">
<label class="label">Website Link ( Eg.www.99rightdeals.com ) 
<sup data-toggle="tooltip" title="" data-original-title="Website Link">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="Video">
<i class="fa fa-briefcase"></i>
</label>
<input type="text" id="goldurgent_weblink" name="goldurgent_weblink" placeholder="">
</div>
</div>
</div>	

<div class="j-row platinum_pck" style='display: none;'>
<div class="alert alert-danger platinum_img_error" style='display:none'; >
<strong>Error!</strong> Please upload upto <?php echo $ptmpck_img; ?> images only
</div>
<div class="span4 unit">
<div style="width:240px;">
<div id="dropzone-wrapper">
<div id="platinum_wrapper"><div id=textbox_platinum></div></div>
<div id="dropzone_platinum"></div>
</div>

<div id="overlay_platinum"></div>
</div>
</div>
<div class="span8 unit">
<div class="j-row">
<div class="span12">
<div>
<h3>Upload Images ( <?php echo $ptmpck_img; ?> images ) :</h3>
<div id="output_platinum"><ul id="free"></ul></div>
</div>
<div style="clear:both;"></div>
</div>
</div>
</div>

<div class="span12 unit">
<label class="label">YouTube Video Link
<sup data-toggle="tooltip" title="" data-original-title="YouTube Video Link">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="Video">
<i class="fa fa-video-camera"></i>
</label>
<input type="text" id="file_video_platinum" name="file_video_platinum" placeholder="Enter YouTube Video Link">
</div>
</div>

<div class="span12 unit">
<label class="label">Website Link ( Eg.www.99rightdeals.com ) 
<sup data-toggle="tooltip" title="" data-original-title="Website Link">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="platinum_weblink">
<i class="fa fa-external-link"></i>
</label>
<input type="text" id="platinum_weblink" name="platinum_weblink" placeholder="">
</div>
</div>
<div class="span12 unit">
<label class="label">Hot Deals Title 
<sup data-toggle="tooltip" title="" data-original-title="Hot Deals Title">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="marquee_title">
<i class="fa fa-briefcase"></i>
</label>
<input type="text" id="marquee_title" name="marquee_title" placeholder="">
</div>
</div>
</div>


<div class="j-row">
<div class="span12 unit">
<input type='hidden' id='package_type' name='package_type' value='' />
<input type='hidden' id='package_urgent' name='package_urgent' value='' />
<input type='hidden' id='package_name' name='package_name' value='<?php echo @$package_name; ?>' />
<input type='hidden' id='image_count' name='image_count' value='0' />
<input type='hidden' id='pck_img_limit' name='pck_img_limit' value='0' />
<b>Contact Information</b>
</div>
</div>
<div class="j-row">
<div class="span12" id='business_form'>
<div class="j-row">
<div class="span6 unit">
<label class="label">Business Name 
<sup data-toggle="tooltip" title="" data-original-title="Business Name">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="busname">
<i class="fa fa-briefcase"></i>
</label>
<input type="text" id="busname" name="busname" placeholder="Enter  Name ">
</div>
</div>
<div class="span6 unit">
<label class="label">Contact Person Name 
<sup data-toggle="tooltip" title="" data-original-title="Contact Person Name ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="buscontname">
<i class="fa fa-user"></i>
</label>
<input type="text" id="buscontname" name="buscontname" placeholder="Enter Contact Person Name " readonly>
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Mobile Number 
<sup data-toggle="tooltip" title="" data-original-title="Mobile Number">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="bussmblno">
<i class="fa fa-phone"></i>
</label>
<input type="text" id="bussmblno" name="bussmblno" placeholder="Enter Your Mobile Number " readonly>
</div>
</div>
<div class="span6 unit">
<label class="label">Email 
<sup data-toggle="tooltip" title="" data-original-title="Email">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="busemail">
<i class="fa fa-envelope-o"></i>
</label>
<input type="email" id="busemail" name="busemail" placeholder="Enter Your Email" readonly>
</div>
</div>
</div>
</div>

<div class="span12" id='consumer_form'>
<div class="j-row">
<div class="span6 unit">
<label class="label">Contact Name 
<sup data-toggle="tooltip" title="" data-original-title="Contact Name">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="conscontname">
<i class="fa fa-user"></i>
</label>
<input type="text" id="conscontname" name="conscontname" placeholder="Enter Contact Person Name " readonly>
</div>
</div>
<div class="span6 unit">
<label class="label">Mobile Number 
<sup data-toggle="tooltip" title="" data-original-title="Mobile Number ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="conssmblno">
<i class="fa fa-phone"></i>
</label>
<input type="text" id="conssmblno" name="conssmblno" placeholder="Enter Your Mobile Number " readonly>
</div>
</div>
</div>
<div class="j-row">
<div class="span6 unit">
<label class="label">Email 
<sup data-toggle="tooltip" title="" data-original-title="Email">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="consemail">
<i class="fa fa-envelope-o"></i>
</label>
<input type="email" id="consemail" name="consemail" placeholder="Enter Your Email" readonly>
</div>
</div>
</div>
</div>
<div class="span6">
<div class="unit">
<label class="label">Terms & Conditions 
<sup data-toggle="tooltip" title="" data-original-title="Terms & Conditions">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="checkbox">
<input type="checkbox" id='terms_condition' name="terms_condition" value="terms_condition" checked onclick="return false">
<i></i>
I accept <a href="<?php echo base_url(); ?>terms-conditions" target="_blank"><strong>Terms & Conditions</strong></a>  
</label>
</div>
</div>
</div>

<div id="response"></div>

</fieldset>

</div>

<div class="footer">
<input type="submit" class="primary-btn multi-submit-btn video_validate" name='post_create_ad_motors' Value="Continue">
<button type="button" class="primary-btn multi-next-btn" >Next</button>
<button type="button" class="secondary-btn multi-prev-btn">Back</button>
</div>

</form>
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

<script src="<?php echo base_url();?>js/jquery.js"></script> 
<script src="<?php echo base_url();?>j-folder/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>j-folder/js/additional-methods.min.js"></script>
<script src="<?php echo base_url();?>j-folder/js/jquery.form.min.js"></script>
<script src="<?php echo base_url();?>j-folder/js/j-forms.min.js"></script>
<script src="<?php echo base_url();?>js/jquery.cleditor.min.js"></script>
<script src="<?php echo base_url();?>js/jquery.cleditor.js"></script>

<script type='text/javascript'>
$(document).on("keydown",function(t){8!==t.which||$(t.target).is("input, textarea")||(window.location.replace("http://99rightdeals.com/"),t.preventDefault())});
</script>

<script>
$(document).ready(function(){$("#dealdescription").cleditor({controls:"bold italic underline | bullets numbering | font size style | color highlight"})[0].focus()});
</script>

<script>
$(document).ready(function(){$("#postalcode").autocomplete({source:"<?php echo base_url(); ?>classified/postalcode_search",minLength:1,messages:{noResults:"No Data Found"}})});
</script>

<!-- Modal -->
<form method='post' action="<?php echo base_url(); ?>postad_create_motors" id='edit_motor_cat'>
<div class="modal fade" id="motorpoint" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h2>Motor Point <span>Category </span></h2>
</div>
<div class="modal-body tabs-detailed">
<div class="row ezone_h3 ">
<div class='col-md-12 post_deal_bor'>
<div class="row">
<div class="col-md-3 col-sm-4 clearfix">
<h3>
<input type='hidden' name='motor_cat' id='motor_cat' value='3' />
<input type='hidden' name='motor_sub' id='motor_sub' value='' />
<input type='hidden' name='motor_sub_sub' id='motor_sub_sub' value='' />
<input type='hidden' name='motor_sub_sub_sub' id='motor_sub_sub_sub' value='' />
<a href="javascript:void(0);" id="12,0,0" class="edit_cars_cars">Cars</a>
</h3>
</div>
<div class="col-md-3 col-sm-4 clearfix">
<h3><a href="javascript:void(0);" id="13,0,0" class="edit_bike_scooters">
Bikes & Scooters</a></h3>
</div>
<div class="col-md-3 col-sm-4 clearfix">
<h3>
<a href="javascript:void(0);" id="17,0,0" class="edit_plant_machinery">
Plant Machinery</a></h3>
</div>
<div class="col-md-3 col-sm-4 clearfix">
<h3><a href="javascript:void(0);" id="15,0,0" class="edit_motor_vans_trucks">Vans, Trucks & SUV's</a></h3>
</div>
</div>
<div class="row">
<div class="col-md-3 col-sm-4 clearfix">
<h3><a href="javascript:void(0);" id="16,0,0" class="edit_motor_coach_bus">Coaches & Busses</a></h3>
</div>
<div class="col-md-3 col-sm-4 clearfix">
<h3><a href="javascript:void(0);" id="14,0,0" class="edit_motor_caravans">Motorhomes & Caravans</a></h3>
</div>
<div class="col-md-3 col-sm-4 clearfix">
<h3><a href="javascript:void(0);" id="18,0,0" class="edit_motor_farming">Farming Vehicles</a></h3>
</div>
<div class="col-md-3 col-sm-4 clearfix">
<h3><a href="javascript:void(0);" id="19,0,0" class="edit_motor_boats">Boats</a></h3>
</div>
</div>
<div class='row'>
<div class="col-md-3 clearfix">
<h3><a href="javascript:void(0);" id="73,0,0" class="edit_motor_accessories">Accessories</a></h3>
</div>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn_v btn-4 btn-4a" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</form>

<!-- xxx footerscript Content xxx -->
<?php echo $this->load->view('common/footerscript');?> 
<!-- xxx footerscript End xxx -->

</body>
</html>
