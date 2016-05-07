<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui.1.10.4.min.js"></script>                
<script type="text/javascript" src="<?php echo base_url(); ?>js/nav/jquery.sticky.js" type="text/javascript"></script>    
<script type="text/javascript" src="<?php echo base_url(); ?>js/totop/jquery.ui.totop.js" ></script>  
<script type="text/javascript" src="<?php echo base_url(); ?>js/accordion/accordion.js" ></script>  
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
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-10142508-2']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
	  
<script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
var switchery = new Switchery(html);
});
</script>

<!-- business consumer details automatically comes from here -->
<script type="text/javascript">
$(function(){
$('.bus_consumer').click(function(){
var ch = $("input[name='checkbox_toggle']:checked").val();
if(ch == 'Yes'){
var login_id = $('#login_id').val();
$.ajax({
type: "POST",
url: "<?php echo base_url(); ?>postad_create_services/get_details" ,
dataType: 'json',
data: {log_id: login_id},
success: function(res) {
/*business*/
$("#busname").val(res.busname);
$("#buscontname").val(res.cont_name);
$("#bussmblno").val(res.mobile);
$("#busemail").val(res.email);
/*consumer*/
$("#conscontname").val(res.cont_name);
$("#conssmblno").val(res.mobile);
$("#consemail").val(res.email);
}
});
$('#bus_logo').show(1000);
$('#business_form').show();
$('#consumer_form').hide();
$("#blah").hide();

}
if(ch == 'No'){
var login_id = $('#login_id').val();
$.ajax({
type: "POST",
url: "<?php echo base_url(); ?>postad_create_services/get_details" ,
dataType: 'json',
data: {log_id: login_id},
success: function(res) {
/*business*/
$("#busname").val(res.busname);
$("#buscontname").val(res.cont_name);
$("#bussmblno").val(res.mobile);
$("#busemail").val(res.email);
/*consumer*/
$("#conscontname").val(res.cont_name);
$("#conssmblno").val(res.mobile);
$("#consemail").val(res.email);
}
});
$('#bus_logo').hide(1000);
$('#business_form').hide();
$('#consumer_form').show();
}
});

});
</script>
		
<script type="text/javascript">
$(function(){
$(".send_now_show").click(function(){
$('#fdbkads').val($(this).attr('id'));
});
});
</script>