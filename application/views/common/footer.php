<!-- footer-->
<footer id="footer" class="footer-v1">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">                             
					<div class="col-sm-6">
						<h3>QUICK LINKS</h3>
						<div class="row"> 
							<div class="col-sm-4">
								<ul class="social">
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>home-page">Home</a></li>
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>about-us">About US</a></li>
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>terms-conditions">Terms & Conditions</a></li>
								</ul>
							</div>
							<div class="col-sm-4">
								<ul class="social">
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>cookies-policy">Cookies Policy</a></li>
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>privacy-policy">Privacy Policy</a></li>
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>blog">Blog</a></li>
								</ul>
							</div>
							<div class="col-sm-4">
								<ul class="social">
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>safety-tips">Assistance</a></li>
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>">Faq</a></li>
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>contact-us">Contact us</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6">
						<h3>EXPLORE BY CATEGORY</h3>
						<div class="row"> 
							<div class="col-sm-4">
								<ul class="social">
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>hot-deals">Hot Deals</a></li>
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>e-zone">E-Zone</a></li>
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>motor-point">Motor Point</a></li>
								</ul>
							</div>
							<div class="col-sm-4">
								<ul class="social">
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>clothing-lifestyles">Clothing & LifeStyles</a></li>
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>services">Services</a></li>
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>find-a-property">Find a Property</a></li>
								</ul>
							</div>
							<div class="col-sm-4">
								<ul class="social">
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>home-kitchen">Home & Kitchen</a></li>
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>pet-deals">Pets</a></li>
									<li><i class="fa fa-check"></i> <a href="<?php echo base_url(); ?>free-job-ads">Jobs</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>  

				<div class="divisor"></div>
				
				<div class="row">
					<!-- Newsletter-->
					<div class="col-md-6">
						<h3>NEWSLETTER SIGN UP</h3>  
						<!-- <form id="newsletterForm" action="http://html.iwthemes.com/travelia/run/php/mailchip/newsletter-subscribe.php"> -->
							<div class="row">
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-user"></i>
										</span>
										<input class="form-control" placeholder="Your Name" name="name" id="name" type="text" onkeypress="isChar(evt);">
									</div>
									<div class="error letter_name" style="display:none;">Enter Your Name</div>
								</div>
								<div class="col-md-4">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-envelope"></i>
										</span>
										<input class="form-control" placeholder="Your  Email" name="email" id="email" type="text">
										<input name="result" class='result' type="hidden">
									</div>
									<div class="error letter_email" style="display:none;">Enter A valid Email ID</div>
								</div>
								<div class="col-md-2">
									<span class="input-group-btn">
										<button class="btn btn-primary newsletter" type="button" name="subscribe">SIGN UP</button>
									</span>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 error letter_success" style="display:none;" >
									You have subscribed Successfully
								</div>
								<div class="col-md-12 error letter_emailerr" style="display:none;" >
									Email Id Already Exist
								</div>
							</div>
						<!-- </form>    -->
						<div id="result-newsletter"></div>
					</div>
					<div class="col-md-6">
						<h3 class="">SOCIAL MEDIA LINKS</h3>  
						<div class="set-2">
							<ul>
								<li><a href="https://en-gb.facebook.com/people/Right-Deals/100011496817255" target="_blank" class="facebook-big"> Like</a></li>
								<li><a href="https://twitter.com/99rightdealsuk" target="_blank" class="twitter-big"> Tweet</a></li>
								<li><a href="https://plus.google.com/105335235432554926026" target="_blank" class="gplus-big"> GPlus</a></li>
								<li><a href="" target="_blank" class="linkedin-big"> Link In</a></li>
								<li><a href="https://in.pinterest.com/99rightdealslim/" target="_blank" class="pinterest-big"> Pin It</a></li>
							</ul>
						</div>
					</div>
					<!-- end Newsletter-->
				</div>                      
			</div>
		</div>
	</div>

	<!-- footer Down-->
	<div class="footer-down">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text_center">
				   <p>Copyright @ 2016.All Right Reserved to <strong> <a href="http://99rightdeals.com/" target="_blanks">99 Right Deals</a> </strong></p>
				</div>
			</div>
		</div>
	</div>
	<!-- footer Down-->
</footer>      
<!-- End footer-->

<script type="text/javascript">
		$(function(){
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

				if (name != '') {
					$(".letter_name").hide();
					$(".letter_success").hide();
					$(".letter_emailerr").hide();
					$(".result").val(0);
				}

				if (email == '') {
					$(".letter_email").show();
					$(".letter_success").hide();
					$(".letter_emailerr").hide();
					$(".result").val(1);
					return false;
				}
				if (email != '') {
					var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
					if (pattern.test(email)) {
						$(".letter_email").hide();
						$(".letter_success").hide();
						$(".letter_emailerr").hide();
						$(".result").val(0);
					}
					else{
						$(".letter_email").show();
						$(".letter_success").hide();
						$(".letter_emailerr").hide();
						$(".result").val(1);
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
							}
							else if(data == 1){
								/*email exists*/
								$(".letter_emailerr").show();
								$(".letter_success").hide();
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
	<div class="modal dialog1 fade" id="sendnow" role="dialog" style="padding-top: 100px;">
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
	