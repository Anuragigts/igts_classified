		<script src="<?php echo base_url(); ?>js/jquery-ui.1.10.4.min.js"></script>                
		<script src="<?php echo base_url(); ?>js/nav/jquery.sticky.js" type="text/javascript"></script>    
		<script type="text/javascript" src="<?php echo base_url(); ?>js/totop/jquery.ui.totop.js" ></script>  
        <script type="text/javascript" src="<?php echo base_url(); ?>js/accordion/accordion.js" ></script>  
        <script type="text/javascript" src="<?php echo base_url(); ?>js/rs-plugin/js/jquery.themepunch.tools.min.js" ></script>      
        <script type='text/javascript' src='<?php echo base_url(); ?>js/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>    
       
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
		
		<script src="js/index.js"></script>
		
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
				$("#e_zone_fil_show").click(function(){
					$("#e_zone_fil_hide").toggle(1000);
				});
			});
		</script>
		<script>
			$(document).ready(function(){
				$("#motor_fil_show").click(function(){
					$("#motor_fil_hide").toggle(1000);
				});
			});
		</script>
		<script>
			$(document).ready(function(){
				$("#clot_fil_show").click(function(){
					$("#clot_fil_hide").toggle(1000);
				});
			});
		</script>
		<script>
			$(document).ready(function(){
				$("#service_fil_show").click(function(){
					$("#service_fil_hide").toggle(1000);
				});
			});
		</script>
		<script>
			$(document).ready(function(){
				$("#property_fil_show").click(function(){
					$("#property_fil_hide").toggle(1000);
				});
			});
		</script>
		<script>
			$(document).ready(function(){
				$("#home_fil_show").click(function(){
					$("#home_fil_hide").toggle(1000);
				});
			});
		</script>
		<script>
			$(document).ready(function(){
				$("#pets_fil_show").click(function(){
					$("#pets_fil_hide").toggle(1000);
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
				$(".review_show").click(function(){
					$(".review_hide").toggle(1000);

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
	
	<div class="modal dialog3" id="feedback_1" role="dialog">
		<div class="modal-dialog3">
			<script type="text/javascript">
				$(function(){
					$("#site_feedback").validate({
				
						// Specify the validation rules
						rules: {
							category: {
								required: true
							},
							return_site: {
								required: true
							},
							frnd_ref:{
								required: true
							},
							fdbk_mail: {
								required: true,
								email: true
							},
							Feedback:{
								required: true
							},
							fdbk_mobile:{
								required: true
							},
						},
						
						// Specify the validation error messages
						messages: {
							category: {
								required: 'Please select category'
							},
							return_site: {
								required: 'Please select option'
							},
							frnd_ref:{
								required: 'Please select option'
							},
							fdbk_mail: {
								required: 'Enter email id',
								email: 'Please enter a valid email id'
							},
							Feedback:{
								required: 'Enter feedback message'
							},
							fdbk_mobile:{
								required: 'Enter Mobile number'
							},
						},
						
						submitHandler: function(form) {
							return true;
							//form.submit();
						}
					});
				});
				function isNumber(evt) {
					evt = (evt) ? evt : window.event;
					var charCode = (evt.which) ? evt.which : evt.keyCode;
					if (charCode > 31 && (charCode < 48 || charCode > 57)) {
						return false;
					}
					return true;
				}
			</script>
			<!-- Modal content-->
			<form action="<?php echo base_url(); ?>classified/feedback_site" method="post" id='site_feedback' class="j-forms tooltip-hover" >
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2>Your feedback of 99 Right Deal</h2>
					</div>
					<div class="modal-body" style="padding: 10px 20px 20px 20px;">
						<div class="fead_back_modal">
							<div class="row">
								<div class="col-sm-6 unit">
									<div class="row">
										<div class="col-sm-12 unit">
											<label class="label">Which category were you most interested in ?</label>
											<label class="input select">
												<select name="category">
													<option value="none" selected disabled="">Please select an option</option>
													<option value="1">Jobs</option>
													<option value="2">Services</option>
													<option value="3">Motor Point</option>
													<option value="4">Find A Property</option>
													<option value="5">Pets</option>
													<option value="6">Clothing & Lifestyles</option>
													<option value="7">Home & Kitchen</option>
													<option value="8">E-zone</option>
												</select>
												<i></i>
											</label>
										</div>
										<div class="col-sm-12 unit">
											<label class="label">How likely are you to return to to 99 right Deals ?</label>
											<label class="input select">
												<select name="return_site">
													<option value="none" selected disabled="">Please select an option</option>
													<option value="Highly Yes">Highly Yes</option>
													<option value="Likely">Likely</option>
													<option value="Not sure">Not sure</option>
													<option value="Unlikely">Unlikely</option>
													<option value="Never">Never</option>
												</select>
												<i></i>
											</label>
										</div>
										<div class="col-sm-12 unit">
											<label class="label">Would you recommend the site to a friend ?</label>
											<label class="input select">
												<select name="frnd_ref">
													<option value="none" selected disabled="">Please select an option</option>
													<option value="Definitely Yes">Definitely Yes</option>
													<option value="Likely">Likely</option>
													<option value="Not Sure">Not Sure</option>
													<option value="UnLikely">UnLikely</option>
													<option value="Never">Never</option>
												</select>
												<i></i>
											</label>
										</div>
									</div>
								</div>
									
								<div class="col-sm-6 unit">
									<strong>How would you rate the following?</strong>
									<div class="bot_10 clearfix"></div>
									<label class="rating_wise">(1 - Very poor   &nbsp;&nbsp;&nbsp;&nbsp;   5 - Very good) :</label>
									<div class="rating-group">
										<label class="label">Easy to Use :</label>
										<div class="ratings">
											<input id="5acc" type="radio" name="easytouse" value='5'>
											<label for="5acc">
												<i class="fa fa-smile-o"></i>
											</label>
											<input id="4acc" type="radio" name="easytouse" value='4'>
											<label for="4acc">
												<i class="fa fa-smile-o"></i>
											</label>
											<input id="3acc" type="radio" name="easytouse" value='3'>
											<label for="3acc">
												<i class="fa fa-smile-o"></i>
											</label>
											<input id="2acc" type="radio" name="easytouse" value='2'>
											<label for="2acc">
												<i class="fa fa-smile-o"></i>
											</label>
											<input id="1acc" type="radio" name="easytouse" value='1' checked>
											<label for="1acc">
												<i class="fa fa-smile-o"></i>
											</label>
										</div>
									</div>
									<div class="rating-group">
										<label class="label">Stability and Speed :</label>
										<div class="ratings">
											<input id="5Stab" type="radio" name="Stability-rating" value='5' >
											<label for="5Stab">
												<i class="fa fa-smile-o"></i>
											</label>
											<input id="4Stab" type="radio" name="Stability-rating" value='4'>
											<label for="4Stab">
												<i class="fa fa-smile-o"></i>
											</label>
											<input id="3Stab" type="radio" name="Stability-rating" value='3'>
											<label for="3Stab">
												<i class="fa fa-smile-o"></i>
											</label>
											<input id="2Stab" type="radio" name="Stability-rating" value='2'>
											<label for="2Stab">
												<i class="fa fa-smile-o"></i>
											</label>
											<input id="1Stab" type="radio" name="Stability-rating" value='1' checked>
											<label for="1Stab">
												<i class="fa fa-smile-o"></i>
											</label>
										</div>
									</div>
									<div class="rating-group">
										<label class="label">Design :</label>
										<div class="ratings">
											<input id="5price" type="radio" name="Design-rating" value='5' >
											<label for="5price">
												<i class="fa fa-smile-o"></i>
											</label>
											<input id="4price" type="radio" name="Design-rating" value='4'>
											<label for="4price">
												<i class="fa fa-smile-o"></i>
											</label>
											<input id="3price" type="radio" name="Design-rating" value='3'>
											<label for="3price">
												<i class="fa fa-smile-o"></i>
											</label>
											<input id="2price" type="radio" name="Design-rating" value='2'>
											<label for="2price">
												<i class="fa fa-smile-o"></i>
											</label>
											<input id="1price" type="radio" name="Design-rating" value='1' checked>
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
											<input id="1overl" type="radio" value='1' name="Overall-rating" checked>
											<label for="1overl">
												<i class="fa fa-smile-o"></i>
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 unit">
									<label class="label">Feedback 
										<sup data-toggle="tooltip" title="" data-original-title="Feedback">
											<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
										</sup>
									</label>
									<div class="input">
										<textarea type="text" id="Feedback" name="Feedback" placeholder="Enter Your Feedback "></textarea>
									</div>
								</div>
								<div class="col-sm-6 unit">
									<label class="label">Email 
										<sup data-toggle="tooltip" title="" data-original-title="Email">
											<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
										</sup>
									</label>
									<div class="input">
										<label class="icon-right" for="email">
											<i class="fa fa-envelope-o"></i>
										</label>
										<input type="email" id="fdbk_mail" name="fdbk_mail" placeholder="Enter Your Email">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6 unit">
									<label class="label">Mobile Number 
										<sup data-toggle="tooltip" title="" data-original-title="Mobile Number ">
											<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
										</sup>
									</label>
									<div class="input">
										<label class="icon-right" for="phone">
											<i class="fa fa-phone"></i>
										</label>
										<input type="text" id="fdbk_mobile" name="fdbk_mobile" maxlength='11' onkeypress="return isNumber(event)" placeholder="Enter Your Mobile Number ">
									</div>
								</div>
								<div class="col-sm-12 unit">													
									<button class="btn_v btn-4 btn-4a fa fa-arrow-right pull-right"><span>Submit</span></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	
	<script type="text/javascript">
		$(function(){
			$("#feedbackads").validate({
					// Specify the validation rules
				rules: {
					fbkcontname: {
						required: true
					},
					feedbackmsg: {
						required: true,
						minlength: 60
					},
					busemail: {
						required: true,
						email: true
					},
					feedbackno: {
						required: true
					}
				},
				
				// Specify the validation error messages
				messages: {
					fbkcontname: {
						required: "Please Enter contact name"
					},
					feedbackmsg: {
						required: "Please Enter feedback message",
						minlength: "message contains atleast 60 characters"
					},
					busemail: {
						required: "Please Enter valid mail id"
					},
					feedbackno: {
						required: "Please Enter Mobile Number"
					}
				},
				
				submitHandler: function(form) {
					return true;
				}
			});
		});
	</script>
	
	<!-- Modal -->
	<div class="modal dialog1 fade" id="sendnow" role="dialog">
		<div class="modal-dialog1">
			<form action="<?php echo base_url(); ?>description_view/feedbackforads" method="post" class="j-forms tooltip-hover" id="feedbackads" >
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2>Send <span>NOW </span></h2>
					</div>
					<div class="modal-body">
						<div class="j-row">
							<div class="unit">
								<label class="label">Contact Name
								<sup data-toggle="tooltip" title="" data-original-title="Contact Name">
								<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
								</sup>
								</label>
								<div class="input">
									<label class="icon-right" for="name">
									<i class="fa fa-user"></i>
									</label>
									<input type="text" id="fbkcontname" name="fbkcontname" placeholder="Enter Contact Person Name ">
									<input type='hidden' class='curr_url' name='curr_url' value='<?php echo current_url();?>'>
									<input type="hidden" name="ad_id" id='fdbkads' value="">
								</div>
							</div>
							<div class="unit">
								<label class="label">Mobile Number
								<sup data-toggle="tooltip" title="" data-original-title="Mobile Number">
								<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
								</sup>
								</label>
								<div class="input">
									<label class="icon-right" for="phone">
									<i class="fa fa-phone"></i>
									</label>
									<input type="text" id="feedbackno" name="feedbackno" maxlength='11' onkeypress="return isNumber(event)" placeholder="Enter Your Mobile Number ">
								</div>
							</div>
							<div class="unit">
								<label class="label">Email
								<sup data-toggle="tooltip" title="" data-original-title="Email">
								<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
								</sup>
								</label>
								<div class="input">
									<label class="icon-right" for="email">
									<i class="fa fa-envelope-o"></i>
									</label>
									<input type="email" id="busemail" name="busemail" placeholder="Enter Your Email">
								</div>
							</div>
							<div class="unit">
								<label class="label">Message
								<sup data-toggle="tooltip" title="" data-original-title="Message">
								<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
								</sup>
								</label>
								<div class="input">
									<textarea type="text" id="feedbackmsg" name="feedbackmsg" placeholder="Enter Your Feedback "></textarea>
								</div>
							</div>
							<div class="unit">													
								<button class="btn btn-primary " id='change_pwd'>Send Now</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	