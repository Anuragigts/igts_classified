<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.1.10.4.min.js"></script>                
<script type="text/javascript" src="<?php echo base_url(); ?>js/nav/jquery.sticky.js" type="text/javascript"></script>    
<script type="text/javascript" src="<?php echo base_url(); ?>js/totop/jquery.ui.totop.js" ></script>  
<script type="text/javascript" src="<?php echo base_url(); ?>js/rs-plugin/js/jquery.themepunch.tools.min.js" ></script>      
<script type='text/javascript' src='<?php echo base_url(); ?>js/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>    
<script type="text/javascript" src="<?php echo base_url(); ?>js/fancybox/jquery.fancybox.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/carousel/carousel.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/filters/jquery.isotope.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/twitter/jquery.tweet.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/flickr/jflickrfeed.min.js"></script>    
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap/bootstrap.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap/bootstrap-slider.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/main.js"></script>
<script type='text/javascript' src="<?php echo base_url(); ?>js/inewsticker.js"></script>
		
<script type="text/javascript">
var _gaq=_gaq||[];_gaq.push(["_setAccount","UA-10142508-2"]),_gaq.push(["_trackPageview"]),function(){var t=document.createElement("script");t.type="text/javascript",t.async=!0,t.src=("https:"==document.location.protocol?"https://ssl":"http://www")+".google-analytics.com/ga.js";var e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e)}();
</script>
	  
<script type="text/javascript">
var elems=Array.prototype.slice.call(document.querySelectorAll(".js-switch"));elems.forEach(function(e){new Switchery(e)});
</script>

<script type="text/javascript">
$(function(){$(".bus_consumer").click(function(){var e=$("input[name='checkbox_toggle']:checked").val();if("Yes"==e){var a=$("#login_id").val();$.ajax({type:"POST",url:"<?php echo base_url(); ?>postad_create_services/get_details",dataType:"json",data:{log_id:a},success:function(e){$("#busname").val(e.busname),$("#buscontname").val(e.cont_name),$("#bussmblno").val(e.mobile),$("#busemail").val(e.email),$("#conscontname").val(e.cont_name),$("#conssmblno").val(e.mobile),$("#consemail").val(e.email)}}),$("#bus_logo").show(1e3),$("#business_form").show(),$("#consumer_form").hide(),$("#blah").hide()}if("No"==e){var a=$("#login_id").val();$.ajax({type:"POST",url:"<?php echo base_url(); ?>postad_create_services/get_details",dataType:"json",data:{log_id:a},success:function(e){$("#busname").val(e.busname),$("#buscontname").val(e.cont_name),$("#bussmblno").val(e.mobile),$("#busemail").val(e.email),$("#conscontname").val(e.cont_name),$("#conssmblno").val(e.mobile),$("#consemail").val(e.email)}}),$("#bus_logo").hide(1e3),$("#business_form").hide(),$("#consumer_form").show()}})});
</script>
		
<script type="text/javascript">
$(function(){$(".send_now_show").click(function(){$("#fdbkads").val($(this).attr("id"));var path = window.location.href;$(".curr_url").val(path);})});
</script>


<script type="text/javascript">
$(".descurl").click(function(){
	var pathname = window.location.href;
	$.ajax({
     type: "POST",
     url: "<?php echo base_url(); ?>classified/getcurrent_url",
     data:{path:pathname},
   }).done(function( msg ) {});
});
</script>