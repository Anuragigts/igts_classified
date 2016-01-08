<!-- ======================= JQuery libs =========================== -->
        <!-- jQuery local--> 
      
        <script src="<?php echo base_url(); ?>js/jquery-ui.1.10.4.min.js"></script>                
        <!--Nav-->
        <script src="<?php echo base_url(); ?>js/nav/jquery.sticky.js" type="text/javascript"></script>    
        <!--Totop-->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/totop/jquery.ui.totop.js" ></script>  
         <!--Accorodion-->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/accordion/accordion.js" ></script>  
        <!--Slide Revolution-->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/rs-plugin/js/jquery.themepunch.tools.min.js" ></script>      
        <script type='text/javascript' src='<?php echo base_url(); ?>js/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>    
        <!-- Maps -->
        <script src="js/maps/gmap3.js"></script> 
        
     <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
    
    <!--<script src="js/maps/jquery.geocomplete.js"></script>-->

    <style type="text/css">
    .map_canvas { 
      /*width: 300px; 
      height: 200px; */
      margin: 10px 20px 10px 0;
    }
    </style>
     
      <!--Ligbox--> 
        <script type="text/javascript" src="<?php echo base_url(); ?>js/fancybox/jquery.fancybox.js"></script> 
        <!-- carousel.js-->
        <script src="<?php echo base_url(); ?>js/carousel/carousel.js"></script>
        <!-- Filter -->
        <script src="<?php echo base_url(); ?>js/filters/jquery.isotope.js" type="text/javascript"></script>
        <!-- Twitter Feed-->
        <script src="<?php echo base_url(); ?>js/twitter/jquery.tweet.js"></script> 
        <!-- flickr Feed-->
        <script src="<?php echo base_url(); ?>js/flickr/jflickrfeed.min.js"></script>    
        <!--Theme Options
        <script type="text/javascript" src="js/theme-options/theme-options.js"></script>
        <script type="text/javascript" src="js/theme-options/jquery.cookies.js"></script> 
        <!-- Bootstrap.js-->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap/bootstrap.js"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap/bootstrap-slider.js"></script> 
        <!--MAIN FUNCTIONS-->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/main.js"></script>
        <script type='text/javascript' src="<?php echo base_url(); ?>js/inewsticker.js"></script>

        <!-- <script type="text/javascript" src="marquee.js"></script> -->
        <!-- ======================= End JQuery libs =========================== -->
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('.tp-banner').show().revolution({
                    dottedOverlay:"none",
                    delay:5000,
                    startwidth:1170,
                    startheight:925,
                    minHeight:500,
                    navigationType:"none",
                    navigationArrows:"solo",
                    navigationStyle:"preview1"
                });             
            }); //ready
        </script>
		<script>
			$(document).ready(function(){
				$(".bus_image").click(function(){
					$(".bus_img").show(1000);

				});
			});
		</script>
		
		<script>
			$(document).ready(function(){
				$(".con_image").click(function(){
					$(".bus_img").hide(1000);

				});
			});
		</script>
		
		<script>
			$(document).ready(function(){
				$(".free_check").click(function(){
					$(".free_hide").show(1000);

				});
			});
		</script>
		<script>
			$(document).ready(function(){
				$(".gold_check").click(function(){
					$(".gold_hide").show(1000);

				});
			});
		</script>
        <!--End Slider Function-->
		
		
      <script src="js1/box-slider-all.jquery.min.js"></script>
      <script>
         $(function () {
             // This function runs before the slide transition starts
             var switchIndicator = function ($c, $n, currIndex, nextIndex) {
               // kills the timeline by setting it's width to zero
               $timeIndicator.stop().css('width', 0);
               // Highlights the next slide pagination control
               $indicators.removeClass('current').eq(nextIndex).addClass('current');
             };
         
             // This function runs after the slide transition finishes
             var startTimeIndicator = function () {
               // start the timeline animation
               $timeIndicator.animate({width: '100%'}, slideInterval);
             };
         
             var $box = $('#box')
               , $indicators = $('.goto-slide')
               , $effects = $('.effect')
               , $timeIndicator = $('#time-indicator')
               , slideInterval = 5000
               , defaultOptions = {
                     speed: 1200
                   , autoScroll: true
                   , timeout: slideInterval
                   , next: '#next'
                   , prev: '#prev'
                   , pause: '#pause'
                   , onbefore: switchIndicator
                   , onafter: startTimeIndicator
                 }
               , effectOptions = {
                   'blindLeft': {blindCount: 15}
                 , 'blindDown': {blindCount: 15}
                 , 'tile3d': {tileRows: 6, rowOffset: 80}
                 , 'tile': {tileRows: 6, rowOffset: 80}
               };
         
             // initialize the plugin with the desired settings
             $box.boxSlider(defaultOptions);
             // start the time line for the first slide
             startTimeIndicator();
         
             // Paginate the slides using the indicator controls
             $('#controls').on('click', '.goto-slide', function (ev) {
               $box.boxSlider('showSlide', $(this).data('slideindex'));
               ev.preventDefault();
             });
         
             // This is for demo purposes only, kills the plugin and resets it with
             // the newly selected effect
             $('#effect-list').on('click', '.effect', function (ev) {
               var $effect = $(this)
                 , fx = $effect.data('fx')
                 , extraOptions = effectOptions[fx];
         
               $effects.removeClass('current');
               $effect.addClass('current');
               switchIndicator(null, null, 0, 0);
               $box
                 .boxSlider('destroy')
                 .boxSlider($.extend({effect: fx}, defaultOptions, extraOptions));
               startTimeIndicator();
         
               ev.preventDefault();
             });
         });
      </script>
      <!-- ---------------- do not copy below this line !! ------------------- -->
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
	  
		

   <!-- news updates -->
   
		<script type="text/javascript">
			var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

			elems.forEach(function(html) {
			  var switchery = new Switchery(html);
			});
		</script>

		
    