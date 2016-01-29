		<script src="<?php echo base_url(); ?>js/jquery-ui.1.10.4.min.js"></script>                
		<script src="<?php echo base_url(); ?>js/nav/jquery.sticky.js" type="text/javascript"></script>    
		<script type="text/javascript" src="<?php echo base_url(); ?>js/totop/jquery.ui.totop.js" ></script>  
        <script type="text/javascript" src="<?php echo base_url(); ?>js/accordion/accordion.js" ></script>  
        <script type="text/javascript" src="<?php echo base_url(); ?>js/rs-plugin/js/jquery.themepunch.tools.min.js" ></script>      
        <script type='text/javascript' src='<?php echo base_url(); ?>js/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>    
        <script src="js/maps/gmap3.js"></script> 
        
		<!--<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>-->
    
		<script type="text/javascript" src="<?php echo base_url(); ?>js/fancybox/jquery.fancybox.js"></script> 
        <script src="<?php echo base_url(); ?>js/carousel/carousel.js"></script>
        <script src="<?php echo base_url(); ?>js/filters/jquery.isotope.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/twitter/jquery.tweet.js"></script> 
        <script src="<?php echo base_url(); ?>js/flickr/jflickrfeed.min.js"></script>    
        
		<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap/bootstrap.js"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap/bootstrap-slider.js"></script> 
       <script type="text/javascript" src="<?php echo base_url(); ?>js/main.js"></script>
        <script type='text/javascript' src="<?php echo base_url(); ?>js/inewsticker.js"></script>

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
            }); 
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
				$(".send_now_show").click(function(){
					$(".send_now_hide").toggle(1000);

				});
			});
		</script>
		
		<script>
			$(document).ready(function(){
				$(".report_show").click(function(){
					$(".report_hide").toggle(1000);

				});
			});
		</script>
		
		<script>
			$(document).ready(function(){
				$(".contact_now_show").click(function(){
					$(".contact_now_hide").toggle(1000);

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
       
		
      <script src="js/box-slider-all.jquery.min.js"></script>
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

		
	<!-- Modal -->
	<div class="modal dialog1 fade" id="sendnow" role="dialog">
		<div class="modal-dialog1">
			<!-- Modal content-->
			<form action="#" method="post" class="j-forms " >
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2>Send <span>NOW </span></h2>
					</div>
					<div class="modal-body">
						<div class="j-row">
							<div class="span12 unit">
								<label class="label">Contact Name :</label>
								<div class="input">
									<label class="icon-right" for="buscontname">
										<i class="fa fa-user"></i>
									</label>
									<input type="text" id="buscontname" name="buscontname" placeholder="Enter Contact Person Name ">
								</div>
							</div>
							<div class="span12 unit">
								<label class="label">Mobile Number :</label>
								<div class="input">
									<label class="icon-right" for="bussmblno">
										<i class="fa fa-phone"></i>
									</label>
									<input type="text" id="bussmblno" name="bussmblno" placeholder="Enter Your Mobile Number ">
								</div>
							</div>
							<div class="span12 unit">
								<label class="label">Email :</label>
								<div class="input">
									<label class="icon-right" for="busemail">
										<i class="fa fa-envelope-o"></i>
									</label>
									<input type="email" id="busemail" name="busemail" placeholder="Enter Your Email">
								</div>
							</div>
							<div class="span12 unit">
								<label class="label">Message :</label>
								<div class="input">
									<textarea type="text" id="" name="" placeholder="Enter Your Feedback "></textarea>
								</div>
							</div>
							<div class="col-sm-12 unit">													
								<button class="btn btn-primary " id='change_pwd'>Send Now</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div> 
	
	<div class="modal fade" id="feedback_1" role="dialog">
		<div class="modal-dialog feedback_wid">
			<!-- Modal content-->
			<form action="#" method="post" class="j-forms tooltip-hover" >
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2>Your feedback of classified.com</h2>
					</div>
					<div class="modal-body">
						<div class="j-row">
							<div class="span6 unit">
								<div class="j-row">
									<div class="span12 unit">
										<label class="label">Which category were you most interested in ?</label>
										<label class="input select">
											<select name="classified">
												<option value="none" selected disabled="">Please select an option</option>
												<option value="">Holidays</option>
												<option value="">City Breaks</option>
												<option value="">Hotel Only</option>
												<option value="">Other</option>
											</select>
											<i></i>
										</label>
									</div>
									<div class="span12 unit">
										<label class="label">How likely are you to return to to 99 right Deals ?</label>
										<label class="input select">
											<select name="classified">
												<option value="none" selected disabled="">Please select an option</option>
												<option value="">Highly likely</option>
												<option value="">Somewhat likely</option>
												<option value="">Unsure</option>
												<option value="">Somewhat unlikely</option>
												<option value="">Highly unlikely</option>
											</select>
											<i></i>
										</label>
									</div>
									<div class="span12 unit">
										<label class="label">Would you recommend the site to a friend ?</label>
										<label class="input select">
											<select name="classified">
												<option value="none" selected disabled="">Please select an option</option>
												<option value="">Yes</option>
												<option value="">No</option>
											</select>
											<i></i>
										</label>
									</div>
								</div>
							</div>
								
							<div class="span6 unit">
								<strong>How would you rate the following?</strong>
								<div class="bot_10 clearfix"></div>
								<label class="label">(1 - Very poor; 5 - Very good) :</label>
								<div class="rating-group">
									<label class="label">Easy to Use :</label>
									<div class="ratings">
										<input id="5acc" type="radio" name="easytouse">
										<label for="5acc">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="4acc" type="radio" name="easytouse">
										<label for="4acc">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="3acc" type="radio" name="easytouse">
										<label for="3acc">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="2acc" type="radio" name="easytouse">
										<label for="2acc">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="1acc" type="radio" name="easytouse">
										<label for="1acc">
											<i class="fa fa-smile-o"></i>
										</label>
									</div>
								</div>
								<div class="rating-group">
									<label class="label">Stability and Speed :</label>
									<div class="ratings">
										<input id="5Stab" type="radio" name="Stability-rating">
										<label for="5Stab">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="4Stab" type="radio" name="Stability-rating">
										<label for="4Stab">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="3Stab" type="radio" name="Stability-rating">
										<label for="3Stab">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="2Stab" type="radio" name="Stability-rating">
										<label for="2Stab">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="1Stab" type="radio" name="Stability-rating">
										<label for="1Stab">
											<i class="fa fa-smile-o"></i>
										</label>
									</div>
								</div>
								<div class="rating-group">
									<label class="label">Design :</label>
									<div class="ratings">
										<input id="5price" type="radio" name="Design-rating">
										<label for="5price">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="4price" type="radio" name="Design-rating">
										<label for="4price">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="3price" type="radio" name="Design-rating">
										<label for="3price">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="2price" type="radio" name="Design-rating">
										<label for="2price">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="1price" type="radio" name="Design-rating">
										<label for="1price">
											<i class="fa fa-smile-o"></i>
										</label>
									</div>
								</div>
								<div class="rating-group">
									<label class="label">Overall :</label>
									<div class="ratings">
										<input id="5overl" type="radio" value='5' name="Overall-rating">
										<label for="5overl">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="4overl" type="radio" value='4' name="Overall-rating">
										<label for="4overl">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="3overl" type="radio" value='3' name="Overall-rating">
										<label for="3overl">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="2overl" type="radio" value='2' name="Overall-rating">
										<label for="2overl">
											<i class="fa fa-smile-o"></i>
										</label>
										<input id="1overl" type="radio" value='1' name="Overall-rating">
										<label for="1overl">
											<i class="fa fa-smile-o"></i>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="j-row">
							<div class="span6 unit">
								<label class="label">Feedback 
									<sup data-toggle="tooltip" title="" data-original-title="Feedback">
										<img src="img/icons/i.png" alt="Help" title="Help Label">
									</sup>
								</label>
								<div class="input">
									<textarea type="text" id="Feedback" name="Feedback" placeholder="Enter Your Feedback "></textarea>
								</div>
							</div>
							<div class="span6 unit">
								<label class="label">Email 
									<sup data-toggle="tooltip" title="" data-original-title="Email">
										<img src="img/icons/i.png" alt="Help" title="Help Label">
									</sup>
								</label>
								<div class="input">
									<label class="icon-right" for="email">
										<i class="fa fa-envelope-o"></i>
									</label>
									<input type="email" id="consemail" name="consemail" placeholder="Enter Your Email">
								</div>
							</div>
						</div>
						<div class="j-row">
							<div class="span6 unit">
								<label class="label">Mobile Number 
									<sup data-toggle="tooltip" title="" data-original-title="Mobile Number ">
										<img src="img/icons/i.png" alt="Help" title="Help Label">
									</sup>
								</label>
								<div class="input">
									<label class="icon-right" for="phone">
										<i class="fa fa-phone"></i>
									</label>
									<input type="text" id="conssmblno" name="conssmblno" placeholder="Enter Your Mobile Number ">
								</div>
							</div>
							<div class="span6 unit">
								<label class="label">Category
									<sup data-toggle="tooltip" title="" data-original-title="Category">
										<img src="img/icons/i.png" alt="Help" title="Help Label">
									</sup>
								</label>
								<label class="input select">
									<select name="Category">
										<option value="none" selected disabled="">Select Category</option>
										<option value="">E-Zone</option>
										<option value="">Motor Point</option>
										<option value="">Clothing & LifeStyles</option>
										<option value="">Services</option>
										<option value="">Find a Property</option>
										<option value="">Home & Kitchen</option>
										<option value="">Pets</option>
										<option value="">Jobs</option>
									</select>
									<i></i>
								</label>
							</div>
							<div class="col-sm-12 unit">													
								<button class="btn_v btn-4 btn-4a fa fa-arrow-right pull-right"><span>Submit</span></button>
							</div><hr class="separator">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	
	