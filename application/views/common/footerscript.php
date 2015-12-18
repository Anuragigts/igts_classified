<!-- ======================= JQuery libs =========================== -->
        <!-- jQuery local--> 
        <script src="js/jquery.js"></script>  
        <script src="js/jquery-ui.1.10.4.min.js"></script>                
        <!--Nav-->
        <script src="js/nav/jquery.sticky.js" type="text/javascript"></script>    
        <!--Totop-->
        <script type="text/javascript" src="js/totop/jquery.ui.totop.js" ></script>  
         <!--Accorodion-->
        <script type="text/javascript" src="js/accordion/accordion.js" ></script>  
        <!--Slide Revolution-->
        <script type="text/javascript" src="js/rs-plugin/js/jquery.themepunch.tools.min.js" ></script>      
        <script type='text/javascript' src='js/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>    
        <!-- Maps -->
        <script src="js/maps/gmap3.js"></script>            
        <!--Ligbox--> 
        <script type="text/javascript" src="js/fancybox/jquery.fancybox.js"></script> 
        <!-- carousel.js-->
        <script src="js/carousel/carousel.js"></script>
        <!-- Filter -->
        <script src="js/filters/jquery.isotope.js" type="text/javascript"></script>
        <!-- Twitter Feed-->
        <script src="js/twitter/jquery.tweet.js"></script> 
        <!-- flickr Feed-->
        <script src="js/flickr/jflickrfeed.min.js"></script>    
        <!--Theme Options-->
        <script type="text/javascript" src="js/theme-options/theme-options.js"></script>
        <script type="text/javascript" src="js/theme-options/jquery.cookies.js"></script> 
        <!-- Bootstrap.js-->
        <script type="text/javascript" src="js/bootstrap/bootstrap.js"></script> 
        <script type="text/javascript" src="js/bootstrap/bootstrap-slider.js"></script> 
        <!--MAIN FUNCTIONS-->
        <script type="text/javascript" src="js/main.js"></script>
        <!-- <script type="text/javascript" src="marquee.js"></script> -->
        <!-- ======================= End JQuery libs =========================== -->
		<script>
			var showText = function (target, message, index, interval) {   
			  if (index < message.length) {
				$(target).append(message[index++]);
				setTimeout(function () { showText(target, message, index, interval); }, interval);
			  }
			}
			$(function () {
				var i = $('#mymark1').html();
				showText("#mymark", i, 0, 100);   
			});
		</script>
        <!--Slider Function-->
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
		
        <!--End Slider Function-->
		
		<script>window.jQuery || document.write('<script src="js1/lib/jquery-1.7.2.min.js"><\/script>')</script>
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
	  
	  <script>
		jssor_1_slider_init();
		</script>