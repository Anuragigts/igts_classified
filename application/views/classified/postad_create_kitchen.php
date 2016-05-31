<!DOCTYPE html>
<html>
<head>

<title>Post a Deal Home & Kitchen | 99 Right Deals</title>

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

<script type="text/javascript">
function isNumber(e){e=e?e:window.event;var c=e.which?e.which:e.keyCode;return c>31&&(48>c||c>57)?!1:!0}$(function(){$(".select_pack").change(function(){var e=$('input[name="select_packge"]:checked').val();if(4==e){var c=$("#fimg_pck_count").val();$(".free_pck").css("display","block"),$(".gold_pck").css("display","none"),$(".platinum_pck").css("display","none"),document.getElementById("package_type").value="4",$(".freeurgent").attr("checked",!1),$(".platinumurgent").attr("checked",!1),$(".goldurgent").attr("checked",!1),document.getElementById("package_urgent").value="0",document.getElementById("image_count").value="0",document.getElementById("pck_img_limit").value=c}if(5==e){var t=$("#gimg_pck_count").val();$(".free_pck").css("display","none"),$(".gold_pck").css("display","block"),$(".platinum_pck").css("display","none"),document.getElementById("package_type").value="5",$(".freeurgent").attr("checked",!1),$(".goldurgent").attr("checked",!1),$(".platinumurgent").attr("checked",!1),document.getElementById("package_urgent").value="0",document.getElementById("image_count").value="0",document.getElementById("pck_img_limit").value=t}if(6==e){var n=$("#pimg_pck_count").val();$(".free_pck").css("display","none"),$(".gold_pck").css("display","none"),$(".platinum_pck").css("display","block"),document.getElementById("package_type").value="6",$(".freeurgent").attr("checked",!1),$(".goldurgent").attr("checked",!1),$(".platinumurgent").attr("checked",!1),document.getElementById("package_urgent").value="0",document.getElementById("image_count").value="0",document.getElementById("pck_img_limit").value=n}}),$(".select_urgent_pack").change(function(){var e=$(this).val();$("#package_urgent").val(e)})}),$(function(){$(".multi-submit-btn").click(function(){var e=$("#image_count").val(),c=parseInt($("#package_type").val()),t=parseInt($("#pck_img_limit").val());return 4==c?0==e?($(".free_img_error").css("display","block"),!1):4==c&&e>t?($(".free_img_error").css("display","block"),!1):($(".free_img_error").css("display","none"),!0):5==c?0==e?($(".gold_img_error").css("display","block"),!1):5==c&&e>t?($(".gold_img_error").css("display","block"),!1):($(".gold_img_error").css("display","none"),!0):6==c?0==e?($(".platinum_img_error").css("display","block"),!1):6==c&&e>t?($(".platinum_img_error").css("display","block"),!1):($(".platinum_img_error").css("display","none"),!0):void 0})}),$(function(){$("#del_img").click(function(){$("#file_input").val(""),$("#file").val(""),$("#file_remove").removeClass("error-view"),$("span#file-error").hide(),$("img#blah").css("display","none"),$("#blah").css("border","none"),$("#blah").css("border-radius","none"),$("#del_img").css("display","none")})});
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

<style>
.section-title-01{height:220px;background-color:#262626;text-align:center;position:relative;width: 100%;overflow: hidden;}
ul#free,ul#free li {margin: 0;padding: 0;}
ul#free li {display: inline-block;vertical-align: top;margin-left: 10px;}
</style>

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
<form action="<?php echo base_url(); ?>postad_create_kitchen" method="post" class="j-forms j-multistep tooltip-hover" id="j-forms" enctype="multipart/form-data" novalidate>
<div class="header">
<a href="<?php echo base_url(); ?>post-a-deal" class="pull-left post_ad_back"><i class="fa fa-mail-reply-all fa-3x"></i></a>
<p>Post a Deal</p>
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
/
</li>
<li><b><?php echo ucfirst(@$sub_name); ?></b> /</li>
<li><b><?php echo ucfirst(@$sub_sub_name); ?></b></li>
</ul>
</div>
<div class="col-sm-4 pad_bottm">
<ul class="social-team pull-left">
<li><a href="" data-toggle="modal" data-target="#Kitchen" ><b>Change Category</b></a></li>
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
<input type="radio" name="checkbox_motbike"  value="Needed">
<i></i>Charity
<sup data-toggle="tooltip" title="" data-original-title="Charity">
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
<!-- end Deal Tag -->
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
<div class="j-row">
<div class="span6 unit">
<label class="label">Brand Name
<sup data-toggle="tooltip" title="" data-original-title="Brand Name">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="brandname">
<i class="fa fa-laptop"></i>
</label>
<input type="text" id="brandname" name="brandname" placeholder="Enter Brand Name">
</div>
</div>
<div class="span6 unit">
<label class="label">Material
<sup data-toggle="tooltip" title="" data-original-title="Material">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="Material">
<img src="<?php echo base_url(); ?>j-folder/img/material.png" alt="Material" title="Material Icon" class="img-responsive">
</label>
<input type="text" id="material" name="material" placeholder="Enter Material">
</div>
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
<input type="text" id="hcolor" name="hcolor" placeholder="Enter Colour">
</div>
</div>
<div class="span6 unit">
<label class="label">Assembly
<sup data-toggle="tooltip" title="" data-original-title="Assembly">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<textarea id="assembly" name="assembly" placeholder="Enter Assembly"></textarea>
</div>
</div>
</div>

<div class="j-row">
<div class="span6 unit">
<label class="label">Dimensions
<sup data-toggle="tooltip" title="" data-original-title="Dimensions">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="Weight">
<img src="<?php echo base_url(); ?>j-folder/img/weight.png" alt="Weight" title="Weight Icon">
</label>
<input type="text" id="weight" name="weight" placeholder="Enter  Dimensions">
</div>
</div>
<div class="span6 unit">
<label class="label">Capacity
<sup data-toggle="tooltip" title="" data-original-title="Capacity">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<label class="icon-right" for="capacity">
<img src="<?php echo base_url(); ?>j-folder/img/ram.png" alt="Memory" title="Memory Icon">
</label>
<input type="text" id="capacity" name="capacity" placeholder="Enter Capacity">
</div>
</div>
</div>

<div class="j-row">
<div class="span6 unit">
<label class="label">Item Conditions 
<sup data-toggle="tooltip" title="" data-original-title="Item Conditions ">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<label class="input select">
<select name="itemconditions">
<option value="none" selected disabled="">Select Item Conditions </option>
<option value="Good">Good</option>
<option value="Bad">Bad</option>
</select>
<i></i>
</label>
</div>
<div class="span6 unit">
<label class="label">Warranty 
<sup data-toggle="tooltip" title="" data-original-title="Warranty">
<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
</sup>
</label>
<div class="input">
<textarea id="warranty" name="warranty" placeholder="Enter Warranty"></textarea>
</div>
</div>
</div>
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
<i></i> <span class="pound_sym"></span> (Pound) 
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
<div class="span6 unit">
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
<input type="radio" id='free_pck' name="select_packge" class='select_pack' value="4" data-price="5">
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
<li><i class="fa fa-check"></i> Displayed at Most valued deals on Home Page <a href="" class='exam_ple' data-toggle='modal' data-target='#mostvalued_modal'><strong>Example</strong></a></li>
<li><i class="fa fa-check"></i> Deal will be HOT Deals with <?php echo $gold_likes; ?> Likes</li>
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
<input type="radio" id='gold_pck' name="select_packge" class='select_pack' value="5" data-price="5">
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
<input type="radio" id='platinum_pck' name="select_packge" class='select_pack' value="6" data-price="5">
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
<div class="promotion-box-info free_pound" style='display:none;'>
<ul class="list-styles">
<li><i class="fa fa-check"></i> <span class="pound_sym"></span> <?php echo $u_pkg_pound_cost1 ?> - <?php echo $u_pkg_days1 ?> Days (Exclusive VAT)</li>
<div class="free_bg text_center " >
<h3 class="price_amt"><span class="pound_sym"></span> <?php echo $u_pkg_pound_cost1 ?> </h3>
</div>
</ul>
<div class="hot_deal_rad">
<label class="radio">
<input type="radio" id='freeurgent' name="select_urgent" class='select_urgent_pack freeurgent' value="4"  data-price="5">
<i></i>
Urgent
</label>
</div>
</div>
<div class="promotion-box-info free_euro" style='display:none;'>
<ul class="list-styles">
<li><i class="fa fa-check"></i> <span class="euro_sym"></span><?php echo $u_pkg_euro_cost1 ?>-<?php echo $u_pkg_days1 ?>Days (Exclusive VAT)</li>
<div class="free_bg text_center " >
<h3 class="price_amt"><span class="euro_sym"></span><?php echo $u_pkg_euro_cost1 ?></h3>
</div>
</ul>
<div class="hot_deal_rad">
<label class="radio">
<input type="radio" id='freeurgent' name="select_urgent" class='select_urgent_pack freeurgent' value="4"  data-price="5">
<i></i>
Urgent
</label>
</div>
</div>
</div>
<div class="span4 bor_right">

<div class="promotion-box-info free_pound" style='display:none;'>
<ul class="list-styles">
<li><i class="fa fa-check"></i> <span class="pound_sym"></span><?php echo $u_pkg_pound_cost2 ?> -<?php echo $u_pkg_days2; ?> days (Exclusive VAT)</li>
<div class="free_bg text_center " >
<h3 class="price_amt"><span class="pound_sym"></span><?php echo $u_pkg_pound_cost2 ?></h3>
</div>
</ul>
<div class="hot_deal_rad">
<label class="radio">
<input type="radio" id='goldurgent' name="select_urgent" class='select_urgent_pack goldurgent' value="5"  data-price="5">
<i></i>
Urgent 
</label>
</div>
</div>
<div class="promotion-box-info free_euro" style='display:none;'>
<ul class="list-styles">
<li><i class="fa fa-check"></i> <span class="euro_sym"></span><?php echo $u_pkg_euro_cost2 ?> -<?php echo $u_pkg_days2; ?> days (Exclusive VAT)</li>
<div class="free_bg text_center " >
<h3 class="price_amt"><span class="euro_sym"></span><?php echo $u_pkg_euro_cost2 ?></h3>
</div>
</ul>
<div class="hot_deal_rad">
<label class="radio">
<input type="radio" id='goldurgent' name="select_urgent" class='select_urgent_pack goldurgent' value="5"  data-price="5">
<i></i>
Urgent 
</label>
</div>
</div>
</div>
<div class="span4">
<div class="promotion-box-info free_pound" style='display:none;'>
<ul class="list-styles">
<li><i class="fa fa-check"></i> <span class="pound_sym"></span><?php echo $u_pkg_pound_cost3 ?>-<?php echo $u_pkg_days3; ?> Days(Exclusive VAT)</li>
<div class="free_bg text_center " >
<h3 class="price_amt"><span class="pound_sym"></span><?php echo $u_pkg_pound_cost3; ?></h3>
</div>
</ul>
<div class="hot_deal_rad">
<label class="radio">
<input type="radio" id='platinumurgent' name="select_urgent" class='select_urgent_pack platinumurgent' value="6"  data-price="5">
<i></i>
Urgent
</label>
</div>
</div>
<div class="promotion-box-info free_euro" style='display:none;'>
<ul class="list-styles">
<li><i class="fa fa-check"></i><span class="euro_sym"></span><?php echo $u_pkg_euro_cost3 ?>-<?php echo $u_pkg_days3; ?> Days(Exclusive VAT)</li>
<div class="free_bg text_center " >
<h3 class="price_amt"><span class="euro_sym"></span><?php echo $u_pkg_euro_cost3 ?></h3>
</div>
</ul>
<div class="hot_deal_rad">
<label class="radio">
<input type="radio" id='platinumurgent' name="select_urgent" class='select_urgent_pack platinumurgent' value="6"  data-price="5">
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
<div class="divider_space"></div>
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
<div id="free_wrapper">
<div id=textbox_free></div>
</div>
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
<div id="output_free">
<ul id="free"></ul>
</div>
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
<div id="free_urgent_wrapper">
<div id=textbox_free_urgent></div>
</div>
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
<div id="output_free_urgent">
<ul id="free"></ul>
</div>
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
<div id="gold_wrapper">
<div id=textbox_gold></div>
</div>
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
<div id="output_gold">
<ul id="free"></ul>
</div>
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
<div id="gold_urgent_wrapper">
<div id=textbox_gold_urgent></div>
</div>
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
<div id="output_gold_urgent">
<ul id="free"></ul>
</div>
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
<div id="platinum_wrapper">
<div id=textbox_platinum></div>
</div>
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
<div id="output_platinum">
<ul id="free"></ul>
</div>
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
<label class="icon-right" for="Video">
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
<label class="icon-right" for="Video">
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
<div class="alert alert-danger terms_error" style='display:none'; >
<strong>Error!</strong> Please accept Terms & Conditions
</div>
</div>
</div>

<div id="response"></div>
</fieldset>
</div>
<div class="footer text_center">
<input type="submit" class="primary-btn multi-submit-btn video_validate" name='post_create_ad' Value="Continue">
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
<div class="modal fade" id="Kitchen" role="dialog">
<div class="modal-dialog">
<form method='post' id='edit_kitchen_form' action="<?php echo base_url(); ?>postad_create_kitchen">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h2>Home & Kitchen Category
<input type='hidden' name='kitchen_cat' id='kitchen_cat' value='7' />
<input type='hidden' name='kitchen_sub' id='kitchen_sub' value='' />
<input type='hidden' name='kitchen_sub_sub' id='kitchen_sub_sub' value='' />
</h2>
</div>
<div class="modal-body">
<div class="row">
<div class="col-md-12 post_deal_bor">
<div class="row">
<div class="col-md-4 col-sm-4 clearfix">
<h3>Kitchen Essentials</h3>
<?php foreach ($kitchen_essentials as $kitchen_essentials_val) { ?>
<h4><a href="javascript:void(0);" class="edit_kitchen_detail" id="<?php echo  $kitchen_essentials_val['sub_category_id'].','.$kitchen_essentials_val['sub_subcategory_id'].',0'; ?>" ><?php echo $kitchen_essentials_val['sub_subcategory_name']; ?></a></h4>
<?php	} ?>
</div>
<div class="col-md-4 col-sm-4 clearfix">
<h3>Home Essentials</h3>
<?php foreach ($kitchen_home as $kitchen_home_val) { ?>
<h4><a href="javascript:void(0);" class="edit_kitchen_detail" id="<?php echo  $kitchen_home_val['sub_category_id'].','.$kitchen_home_val['sub_subcategory_id'].',0'; ?>" ><?php echo $kitchen_home_val['sub_subcategory_name']; ?></a></h4>
<?php	} ?>
</div>
<div class="col-md-4 col-sm-4 clearfix">
<h3>Decor</h3>
<?php foreach ($kitchen_decor as $kitchen_decor_val) { ?>
<h4><a href="javascript:void(0);" class="edit_kitchen_detail" id="<?php echo  $kitchen_decor_val['sub_category_id'].','.$kitchen_decor_val['sub_subcategory_id'].',0'; ?>" ><?php echo $kitchen_decor_val['sub_subcategory_name']; ?></a></h4>
<?php	} ?>
</div>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn_v btn-4 btn-4a" data-dismiss="modal">Close</button>
</div>
</div>
</form>
</div>
</div>

<!-- xxx footerscript Content xxx -->
<?php echo $this->load->view('common/footerscript');?> 
<!-- xxx footerscript End xxx -->

</body>
</html>
