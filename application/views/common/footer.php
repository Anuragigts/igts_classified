
<!--Footer---->
<footer id="footer" class="footer-v1"><div class="container"><div class="row"><div class="col-sm-12"><div class="row"> <div class="col-sm-6"><h3>QUICK LINKS</h3><div class="row"> <div class="col-sm-4"><ul class="social"><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>">Home</a></li><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>about-us">About US</a></li><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>terms-conditions">Terms & Conditions</a></li></ul></div><div class="col-sm-4"><ul class="social"><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>cookies-policy">Cookies Policy</a></li><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>privacy-policy">Privacy Policy</a></li><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>blog">Blog</a></li></ul></div><div class="col-sm-4"><ul class="social"><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>safety-tips">Assistance</a></li><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>">FAQ's</a></li><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>contact-us">Contact us</a></li></ul></div></div></div><div class="col-sm-6"><h3>EXPLORE BY CATEGORY</h3><div class="row"> <div class="col-sm-4"><ul class="social"><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>hot-deals-post-classifieds-ads">Hot Deals</a></li><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>e-zone-phones-tablets-sale">E-Zone</a></li><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>motor-point-used-cars-sale">Motor Point</a></li></ul></div><div class="col-sm-4"><ul class="social"><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>clothes-for-sale-uk">Clothing & LifeStyles</a></li><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>household-services-london-uk">Services</a></li><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>residential-commercial-property-for-sale">Find a Property</a></li></ul></div><div class="col-sm-4"><ul class="social"><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>home-kitchen-services-uk">Home & Kitchen</a></li><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>pet-for-sale-online">Pets</a></li><li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>part-full-time-jobs-london">Jobs</a></li></ul></div></div></div></div><div class="divisor"></div><div class="row"><div class="col-md-6"><h3>NEWSLETTER SIGN UP</h3> <div class="row"><div class="col-md-4"><div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span><input class="form-control" placeholder="Your Name" name="name" id="name" type="text" onkeypress="isChar(evt);"></div><div class="error letter_name">Enter Your Name</div><div class="error letter_min">Enter minimum 3 characters</div><div class="error letter_max">Maximum 12 characters allowed</div></div><div class="col-md-4"><div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span><input class="form-control" placeholder="Your Email" name="email" id="email" type="text"><input name="result" class='result' type="hidden"></div><div class="error letter_email">Enter A valid Email ID</div></div><div class="col-md-2"><span class="input-group-btn"><button class="btn btn-primary newsletter" type="button" name="subscribe">SIGN UP</button></span></div></div><div class="row"><div class="col-md-12 letter_success">You have subscribed Successfully</div><div class="col-md-12 error letter_emailerr" >Email Id Already Exist</div></div><div id="result-newsletter"></div></div><div class="col-md-6"><h3 class="">SOCIAL MEDIA LINKS</h3> <div class="set-2"><ul><li><a href="https://www.facebook.com/99rightdeals" target="_blank" class="facebook-big"> Like</a></li><li><a href="https://twitter.com/99rightdealsuk" target="_blank" class="twitter-big"> Tweet</a></li><li><a href="https://plus.google.com/105335235432554926026" target="_blank" class="gplus-big"> GPlus</a></li><li><a href="https://uk.linkedin.com/in/right-deals-2388a4116" target="_blank" class="linkedin-big"> in</a></li><li><a href="https://in.pinterest.com/99rightdealslim/" target="_blank" class="pinterest-big"> Pin It</a></li></ul></div></div></div></div></div></div><div class="footer-down"><div class="container"><div class="row"><div class="col-md-12 text_center"><p>Copyright @ 2016.All Rights Reserved to <strong> <a href="http://99rightdeals.com/" target="_blanks">99 Right Deals</a> </strong></p></div></div></div></div></footer>      

<script type="text/javascript">
$(function(){
$(".letter_name").css('display','none');
$(".letter_email").css('display','none');
$(".letter_success").css('display','none');
$(".letter_emailerr").css('display','none');
$(".letter_min").css('display','none');
$(".letter_max").css('display','none');
});

$(function() {
	$(".newsletter").click(function(){
				var name = $("#name").val();
				var email = $("#email").val();
				if (name == '') {
					$(".letter_name").show();
					$(".letter_success").hide();
					$(".letter_emailerr").hide();
					$(".result").val(1);
					return false;
				}

				if (name != '' && name.length < 3) {
					$(".letter_name").hide();
					$(".letter_success").hide();
					$(".letter_emailerr").hide();
					$(".letter_min").show();
					$(".letter_max").hide();
					$(".result").val(1);
					return false;
				}
				if (name != '' && name.length > 12) {
					$(".letter_name").hide();
					$(".letter_success").hide();
					$(".letter_emailerr").hide();
					$(".letter_max").show();
					$(".letter_min").hide();
					$(".result").val(1);
					return false;
				}

				if (email == '') {
					$(".letter_email").show();
					$(".letter_success").hide();
					$(".letter_emailerr").hide();
					$(".letter_max").hide();
					$(".letter_min").hide();
					$(".result").val(1);
					return false;
				}
				if (email != '') {
					var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
					if (pattern.test(email)) {
						$(".letter_email").hide();
						$(".letter_success").hide();
						$(".letter_emailerr").hide();
						$(".letter_max").hide();
						$(".letter_min").hide();
						$(".result").val(0);
					}
					else{
						$(".letter_email").show();
						$(".letter_success").hide();
						$(".letter_emailerr").hide();
						$(".letter_max").hide();
						$(".letter_min").hide();
						$(".result").val(1);
						return false;
					}					
				}

				if ($(".result").val() == 0) {
					$.ajax({
						type: "POST",
						url: "<?php echo base_url();?>searchview/subscribe_news",
						data: {
							name : name,
							email : email
						},
						success: function (data) {
							if (data == 0) {
								/*success*/
								$(".letter_success").show();
								$(".letter_emailerr").hide();
								$("#name").val('');
								$("#email").val('');
								setTimeout(function() {
				                    $(".letter_success").hide();
				                }, 5000);
							}
							else if(data == 1){
								/*email exists*/
								$(".letter_emailerr").show();
								$(".letter_success").hide();
								setTimeout(function() {
				                    $(".letter_emailerr").hide();
				                }, 5000);
							}
						}
					});
				}
				
			});
			$('#name').keydown(function (e) {
				if (e.shiftKey || e.ctrlKey || e.altKey) {
				e.preventDefault();
				} else {
				var key = e.keyCode;
					if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
					e.preventDefault();
					}
				}
			});
});
</script>

<script type="text/javascript">
$(function(){$("#feedbackads").validate({rules:{fbkcontname:{required:!0,minlength:3,maxlength:12},feedbackmsg:{required:!0,minlength:60,maxlength:200},busemail:{required:!0,email:!0},feedbackno:{required:!0,minlength:11}},messages:{fbkcontname:{required:"Please Enter contact name"},feedbackmsg:{required:"Please Enter feedback message",minlength:"message contains atleast 60 characters",maxlength:"Maximum 200 characters allowed"},busemail:{required:"Please Enter valid mail id"},feedbackno:{required:"Please Enter Mobile Number",minlength:"Enter 11 digit Mobile Number"}},submitHandler:function(e){return!0}})});
</script>

<!-- Modal SendNow-->
<div class="modal dialog1 fade send_now_top_100" id="sendnow" role="dialog"><div class="modal-dialog1"><form action="<?php echo base_url(); ?>description_view/feedbackforads" method="post" class="j-forms tooltip-hover" id="feedbackads" ><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h2>Send <span>NOW </span></h2></div><div class="modal-body"><div class="j-row"><div class="unit"><label class="label">Contact Name<sup data-toggle="tooltip" title="" data-original-title="Contact Name"><img src="<?php echo base_url(); ?>img/icons/i-16x16.png" alt="Help" title="Help Label"></sup></label><div class="input"><label class="icon-right" for="name"><i class="fa fa-user"></i></label><input type="text" id="fbkcontname" name="fbkcontname" placeholder="Enter Contact Person Name "><input type='hidden' class='curr_url' name='curr_url' value='<?php echo current_url();?>'><input type="hidden" name="ad_id" id='fdbkads' value=""></div></div><div class="unit"><label class="label">Mobile Number<sup data-toggle="tooltip" title="" data-original-title="Mobile Number"><img src="<?php echo base_url(); ?>img/icons/i-16x16.png" alt="Help" title="Help Label"></sup></label><div class="input"><label class="icon-right" for="phone"><i class="fa fa-phone"></i></label><input type="text" id="feedbackno" name="feedbackno" maxlength='11' onkeypress="return isNumber(event)" placeholder="Enter Your Mobile Number "></div></div><div class="unit"><label class="label">Email<sup data-toggle="tooltip" title="" data-original-title="Email"><img src="<?php echo base_url(); ?>img/icons/i-16x16.png" alt="Help" title="Help Label"></sup></label><div class="input"><label class="icon-right" for="email"><i class="fa fa-envelope-o"></i></label><input type="email" id="busemail" name="busemail" placeholder="Enter Your Email"></div></div><div class="unit"><label class="label">Message<sup data-toggle="tooltip" title="" data-original-title="Message"><img src="<?php echo base_url(); ?>img/icons/i-16x16.png" alt="Help" title="Help Label"></sup></label><div class="input"><textarea type="text" id="feedbackmsg" name="feedbackmsg" placeholder="Enter Your Feedback "></textarea></div></div><div class="unit"><button class="btn btn-primary " id='change_pwd'>Send Now</button></div></div></div></div></form></div></div>

<!-- Modal Feedback-->
<div class="modal dialog3" id="feedback_1" role="dialog">
<div class="modal-dialog3">
<script type="text/javascript">
function isNumber(e){e=e?e:window.event;var r=e.which?e.which:e.keyCode;return r>31&&(48>r||r>57)?!1:!0}$(function(){$("#site_feedback").validate({rules:{category:{required:!0},return_site:{required:!0},frnd_ref:{required:!0},fdbk_mail:{required:!0,email:!0},Feedback:{required:!0,minlength: 12,maxlength: 60},fdbk_mobile:{required:!0,minlength:11}},messages:{category:{required:"Please select a category"},return_site:{required:"Please select an option"},frnd_ref:{required:"Please select an option"},fdbk_mail:{required:"Please Enter your email id",email:"Please Enter a valid email id"},Feedback:{required:"Please Enter your feedback",minlength: "Enter minimum 12 characters",maxlength: "Enter Less than 60 characters"},fdbk_mobile:{required:"Please Enter Your Mobile number",minlength:'Enter 11 digit Mobile Number'}},submitHandler:function(e){return!0}})});
</script>

<form action="<?php echo base_url(); ?>classified/feedback_site" method="post" id='site_feedback' class="j-forms tooltip-hover" >
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h2>Your feedback of 99 Right Deal</h2>
</div>
<div class="modal-body footer_pad_length">
<div class="fead_back_modal">
<div class="row">
<div class="col-sm-6 unit">
<div class="row">
<div class="col-sm-12 unit">
<label class="label">Which category are you most interested in ?</label>
<label class="input select">
<select name="category">
<option value="none" selected disabled="">Please select a Category</option>
<option value="1">Jobs</option>
<option value="2">Services</option>
<option value="3">Motor Point</option>
<option value="4">Find A Property</option>
<option value="5">Pets</option>
<option value="6">Clothing & Lifestyles</option>
<option value="7">Home & Kitchen</option>
<option value="8">E-zone</option>
</select>
<input type='hidden' name='lastfeedbackpage' id='lastfeedbackpage' value='' />
<i></i>
</label>
</div>
<div class="col-sm-12 unit">
<label class="label">How likely are you to return to 99 right Deals ?</label>
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
<label class="rating_wise">(1 - Very poor &nbsp;&nbsp;&nbsp;&nbsp; 5 - Very good) :</label>
<div class="rating-group">
<label class="label">Easy to Use :</label>
<div class="ratings"><input id="5easy" type="radio" name="easytouse" value='5'><label for="5easy"><i class="fa fa-smile-o"></i></label><input id="4easy" type="radio" name="easytouse" value='4'><label for="4easy"><i class="fa fa-smile-o"></i></label><input id="3easy" type="radio" name="easytouse" value='3'><label for="3easy"><i class="fa fa-smile-o"></i></label><input id="2easy" type="radio" name="easytouse" value='2'><label for="2easy"><i class="fa fa-smile-o"></i></label><input id="1easy" type="radio" name="easytouse" value='1' checked><label for="1easy"><i class="fa fa-smile-o"></i></label></div>
</div>
<div class="rating-group">
<label class="label">Stability and Speed :</label>
<div class="ratings"><input id="5Stab" type="radio" name="Stability-rating" value='5' ><label for="5Stab"><i class="fa fa-smile-o"></i></label><input id="4Stab" type="radio" name="Stability-rating" value='4'><label for="4Stab"><i class="fa fa-smile-o"></i></label><input id="3Stab" type="radio" name="Stability-rating" value='3'><label for="3Stab"><i class="fa fa-smile-o"></i></label><input id="2Stab" type="radio" name="Stability-rating" value='2'><label for="2Stab"><i class="fa fa-smile-o"></i></label><input id="1Stab" type="radio" name="Stability-rating" value='1' checked><label for="1Stab"><i class="fa fa-smile-o"></i></label></div>
</div>
<div class="rating-group">
<label class="label">Design :</label>
<div class="ratings"><input id="5price" type="radio" name="Design-rating" value='5' ><label for="5price"><i class="fa fa-smile-o"></i></label><input id="4price" type="radio" name="Design-rating" value='4'><label for="4price"><i class="fa fa-smile-o"></i></label><input id="3price" type="radio" name="Design-rating" value='3'><label for="3price"><i class="fa fa-smile-o"></i></label><input id="2price" type="radio" name="Design-rating" value='2'><label for="2price"><i class="fa fa-smile-o"></i></label><input id="1price" type="radio" name="Design-rating" value='1' checked><label for="1price"><i class="fa fa-smile-o"></i></label></div>
</div>
<div class="rating-group">
<label class="label">Overall :</label>
<div class="ratings"><input id="5overl" type="radio" value='5' name="Overall-rating"><label for="5overl"><i class="fa fa-smile-o"></i></label><input id="4overl" type="radio" value='4' name="Overall-rating"><label for="4overl"><i class="fa fa-smile-o"></i></label><input id="3overl" type="radio" value='3' name="Overall-rating"><label for="3overl"><i class="fa fa-smile-o"></i></label><input id="2overl" type="radio" value='2' name="Overall-rating"><label for="2overl"><i class="fa fa-smile-o"></i></label><input id="1overl" type="radio" value='1' name="Overall-rating" checked><label for="1overl"><i class="fa fa-smile-o"></i></label></div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 unit">
<label class="label">Feedback <sup data-toggle="tooltip" title="" data-original-title="Feedback"><img src="<?php echo base_url(); ?>img/icons/i-16x16.png" alt="Help" title="Help Label"></sup></label>
<div class="input"><textarea type="text" id="Feedback" name="Feedback" placeholder="Enter Your Feedback "></textarea></div>
</div>
<div class="col-sm-6 unit">
<label class="label">Email <sup data-toggle="tooltip" title="" data-original-title="Email"><img src="<?php echo base_url(); ?>img/icons/i-16x16.png" alt="Help" title="Help Label"></sup></label>
<div class="input"><label class="icon-right" for="email"><i class="fa fa-envelope-o"></i></label><input type="email" id="fdbk_mail" name="fdbk_mail" placeholder="Enter Your Email"></div>
</div>
</div>
<div class="row">
<div class="col-sm-6 unit">
<label class="label">Mobile Number <sup data-toggle="tooltip" title="" data-original-title="Mobile Number "><img src="<?php echo base_url(); ?>img/icons/i-16x16.png" alt="Help" title="Help Label"></sup></label>
<div class="input"><label class="icon-right" for="phone"><i class="fa fa-phone"></i></label><input type="text" id="fdbk_mobile" name="fdbk_mobile" maxlength='11' onkeypress="return isNumber(event)" placeholder="Enter Your Mobile Number "></div>
</div>
<div class="col-sm-12 unit"><button class="btn_v btn-4 btn-4a fa fa-arrow-right pull-right"><span>Submit</span></button></div>
</div>
</div>
</div>
</div>
</form>

</div>
</div>

<div class="modal" id="recent_modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h2>Recent Deal Example</h2>
</div>
<div class="modal-body">
<div class="row">
<div class="col-sm-12 modal_img">
<img src="<?php echo base_url(); ?>img/recentdeal 613x1579.jpg" class="img-responsive" alt="Recent Deal">
</div>
</div>
</div>
</div>
</div>
</div>

<div class="modal" id="bump_modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h2>Bump Deal Example</h2>
</div>
<div class="modal-body">
<div class="row">
<div class="col-sm-12 modal_img">
<p align="justify">At 99rightdeals a BUMP will take your ad back to the top of the search results once again. When your ad as deal online since few days.</p>
<p align="justify"> Bumping will definite that more buyers see your ad. So you have better chance of selling your item.</p>
<img src="<?php echo base_url(); ?>img/bumpdeal-800x600.jpg" class="img-responsive" alt="Bump Deal">
</div>
</div>
</div>
</div>
</div>
</div>

<div class="modal" id="gold_deal_modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h2>Gold Deal Highlight Example</h2>
</div>
<div class="modal-body">
<div class="row">
<div class="col-sm-12 modal_img">
<img src="<?php echo base_url(); ?>img/golddeal-1280x923.jpg" class="img-responsive" alt="Gold Deal Highlight">
</div>
</div>
</div>
</div>
</div>
</div>

<div class="modal" id="mostvalued_modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h2>Most Valued Deal Example</h2>
</div>
<div class="modal-body">
<div class="row">
<div class="col-sm-12 modal_img">
<p align="justify"> This ad will highlight in search results which will draw buyers attention to it by having coloured background. So that it will give closer look at search results for potential buyer.</p>
<p align="justify"> Initially it will be appear on home page in the most valued deals.</p>
<p align="justify"> 5 * more Views and responses.</p>
<p align="justify"> More people read and reply to this ad.</p>
<img src="<?php echo base_url(); ?>img/mostvaluedeal.jpg" class="img-responsive" alt="Most Valued Deal">
</div>
</div>
</div>
</div>
</div>
</div>

<div class="modal" id="sign_modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h2>Significant Deal Example</h2>
</div>
<div class="modal-body">
<div class="row">
<div class="col-sm-12 modal_img">
<p align="justify"> The Search results is where potential buyer will first see your item.Our Slide rotation will draw the buyer attention it will certainly stand out among all the other ad and draw the buyers attention to it.</p>
<p align="justify"> It will be appear on home page in the significant deal.</p>
<p align="justify"> 9 * more Views and responses.</p>
<p align="justify"> Number of people read and reply to this ad. </p>
<img src="<?php echo base_url(); ?>img/significantdeal-613x863.jpg" class="img-responsive" alt="Significant Deal">
</div>
</div>
</div>
</div>
</div>
</div>

<div class="modal" id="slide_by_slide_modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h2>Slide By Slide Deal Example</h2>
</div>
<div class="modal-body">
<div class="row">
<div class="col-sm-12 modal_img">
<img src="<?php echo base_url(); ?>img/slidebyslidedeal-800x600.jpg" class="img-responsive" alt="Slide By Slide Deal">
</div>
</div>
</div>
</div>
</div>
</div>

<div class="modal" id="youtube_modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h2>You Tube Video Example</h2>
</div>
<div class="modal-body">
<div class="row">
<div class="col-sm-12 modal_img">
<img src="<?php echo base_url(); ?>img/video-800x600.jpg" class="img-responsive" alt="You Tube Video">
</div>
</div>
</div>
</div>
</div>
</div>

<div class="modal" id="hot_deals_modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h2>Hot Deals Title Example</h2>
</div>
<div class="modal-body">
<div class="row">
<div class="col-sm-12 modal_img">
<img src="<?php echo base_url(); ?>img/marqueedeal-613x1094.jpg" class="img-responsive" alt="Hot Deals Title">
</div>
</div>
</div>
</div>
</div>
</div>

<div class="modal" id="urgent_label_modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h2>Urgent Label Example</h2>
</div>
<div class="modal-body">
<div class="row">
<div class="col-sm-12 modal_img">
<p align="justify"> Urgent label indicates the buyer that you are eager to sell.</p>
<p align="justify"> This will attract potential Buyer to your ad.</p>
<p align="justify"> 3 * more Views and responses.</p>
<img src="<?php echo base_url(); ?>img/urgentlabeldeal-800x600.jpg" class="img-responsive" alt="Urgent Label">
</div>
</div>
</div>
</div>
</div>
</div>