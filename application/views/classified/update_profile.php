<!DOCTYPE html>
<html>
	<head>
		
		<title>Update Profile | 99 Right Deals</title>
		
		<!-- xxx Head Content xxx -->
		<?php echo $this->load->view('common/head');?> 
		<!-- xxx End xxx -->
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
		
		<script>
			function isNumber(evt) {
				evt = (evt) ? evt : window.event;
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode > 31 && (charCode < 48 || charCode > 57)) {
					return false;
				}
				return true;
			}
			
			$(function(){
				$('#firstnamepost').keydown(function (e) {
						if (e.shiftKey || e.ctrlKey || e.altKey) {
						e.preventDefault();
						} else {
						var key = e.keyCode;
							if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
							e.preventDefault();
							}
						}
					});
				$('#lastnamepost').keydown(function (e) {
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
			
			/*save changes*/
			$(function(){
				$("#save_changes").click(function(){
					var prof_id = $("#profile_id").val();
					var fname = $("#firstnamepost").val();
					var lname = $("#lastnamepost").val();
					var mobile = $("#contactnopost").val();
					  $.ajax({
					  type : 'post',
					  url  : '<?php echo base_url()?>update_profile/up_profile',
					  data : {prof_id1: prof_id, fname1 : fname, lname1 : lname, mobile1 : mobile},
					  dataType : 'json',
					  success : function(res) {
					   window.location.href = "<?php echo base_url(); ?>update-profile";
					  }
					});
				});
			});
			
			/*Change Password*/
			$(function(){
				$("#change_pwd").click(function(){
					var cur_pwd = $("#currentpasspost").val();
					var pwd = $("#newpasspost").val();
					var conf_pwd = $("#confirmpasspost").val();
					var prof_id = $("#profile_id").val();
					hasError = true;
					if(cur_pwd == '') {
					$("#currentpasspost").prop('required',true);
					  hasError = false;
					}
					if(cur_pwd.length < 5){
						$('span#currentpasspost-error').text('incorrect format');
						$("#currentpasspost").prop('required',true);
					   hasError = false;
						}
			
			
			
					if(pwd == '') {
					  $("#newpasspost").prop('required',true);
					  hasError = false;
					}
			
					if(conf_pwd == '') {
					  $("#confirmpasspost").prop('required',true);
					  hasError = false;
					}
					if(hasError == true){
					  $.ajax({
					  type : 'post',
					  url  : '<?php echo base_url()?>update_profile/change_pwd',
					  data : {cur_pwd1: cur_pwd, pwd1 : pwd, conf_pwd1 : conf_pwd, prof_id1: prof_id},
					  dataType : 'json',
					  success : function(res) {
					   window.location.href = "<?php echo base_url(); ?>update-profile";
					  }
					});
				}
				});
			});
			
			/*deactivation account*/
			$(function(){
				$("#deactivate_account").click(function(){
					 $("#deactivate_account").text("Please Wait");
					$('#deactivate_account').attr("disabled", true);
					var reason_msg;
					var mail = $('#email').val();
					var id = $('#profile_id').val();
					var fname = $("#firstnamepost").val();
					var reasonname = $(".reasonname").val();
					if (reasonname == 'I_Found_My_deals_with_another_website') {
						reason_msg = $("#reasonurl").val();
					}
					else if (reasonname == 'I_am_unhappy_about_services' || reasonname == 'Other_Reasons'){
						reason_msg = $("#reason").val();
					}
					else{
						reason_msg = '';
					}
					$.ajax({
					  type : 'post',
					  url  : '<?php echo base_url()?>update_profile/deactivate_account',
					  data : {
						  	mail: mail,
						  	id: id,
						  	fname: fname,
						  	reasonname: reasonname,
						  	reason_msg: reason_msg},
					  dataType : 'json',
					  success : function(res) {
						if (res == 0){
					window.location.href = "<?php echo base_url(); ?>login";
						}
						else{
				window.location.href = "<?php echo base_url(); ?>update-profile";      		
						}
					   
					  }
					});
				});
			});
		</script>
		<?php foreach ($prof_data as $prof_val) {
			$prof_id = $prof_data['login_id'];
			$fname = $prof_data['first_name'];
			$lname = $prof_data['lastname'];
			$mail_id = $prof_data['login_email'];
			$mobile = $prof_data['mobile'];
			} ?>
	</head>
	
	<body id="home">
		
		<!--Preloader-->
		<div class="preloader">
			<div class="status">&nbsp;</div>
		</div> 
			   
		<!-- Start Entire Wrap-->
		<div id="layout">
			
			<!-- xxx tophead Content xxx -->
			<?php echo $this->load->view('common/tophead'); ?> 
			<!-- xxx End tophead xxx -->
			
			<!-- Inner Page Content Start-->
			<div class="section-title-01">
				<div class="bg_parallax image_01_parallax"></div>
			</div>
			
			<section class="content-central">
				<div class="semiboxshadow text-center">
					<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
				</div>
				<div class="content_info">
					<div class="paddings">
						<div class="container">
							<div class="row">
								<!-- Item Table-->
								<div class="col-sm-3">
									<div class="item-table">
										<div class="header-table color-red">
											<img src="<?php echo base_url(); ?>img/icons/user_pro.png" alt="user_pro" title="Profile" class="img-responsive pvt-no-img">
											<h2><?php echo @$log_name; ?></h2> 
										</div>
										<ul class="dashboard_tag">
											<a href='<?php echo base_url(); ?>deals-status'>
												<li><img src="<?php echo base_url(); ?>img/icons/status.png" alt="status" title="Deals">Deals Status</li>
											</a>
											<a href='<?php echo base_url(); ?>deals-administrator'>
												<li><img src="<?php echo base_url(); ?>img/icons/admin.png" alt="admin" title="Admin">Deals Administrator</li>
											</a>
											<a href='<?php echo base_url(); ?>pickup-deals'>
												<li><img src="<?php echo base_url(); ?>img/icons/pickup.png" alt="pickup" title="Pickup">Pickup deals</li>
											</a>
											<a href='<?php echo base_url(); ?>reserved_searches'>
												<li><img src="<?php echo base_url(); ?>img/icons/seaked.png" alt="favourites" title="Favourites">My Wishes</li>
											</a>
											<a href='<?php echo base_url(); ?>update-profile'>
												<li><img src="<?php echo base_url(); ?>img/icons/updateprofile.png" alt="Update Profile" title="<?php echo base_url(); ?>updateprofile image"> Update Profile</li>
											</a>
										</ul>
										<a class="btn color-red" href="<?php echo base_url(); ?>login/logout">Logout</a>
									</div>
								</div>
								<!-- End Item Table-->
								<!-- Item Table-->
								<form id="j-forms" action="#" class="j-forms tooltip-hover change_pwd" method="post">
									<div class="col-sm-9">
										<?php echo $this->view("classified_layout/success_error"); ?>		
										<div class="accrodation">
											<span class="acc-trigger"><a href="#">UPDATE PROFILE</a></span>
											<div class="acc-container">
												<div class="active">
													<div class="row top_20">
														<!-- contact details-->
														<div class="col-sm-6">
															<div class="row">
																<div class="col-sm-12 unit">
																	<h3>Change Profile</h3>
																	<label class="label">First Name 
																	<sup data-toggle="tooltip" title="" data-original-title="First Name">
																	<img src="<?php echo base_url(); ?>img/icons/i.png" alt="I Error" title="Error view">
																	</sup>
																	</label>
																	<div class="input">
																		<label class="icon-right" for="firstnamepost">
																		<i class="fa fa-user"></i>
																		</label>
																		<input type="hidden" id="profile_id" name="profile_id" value="<?php echo $prof_id; ?>"  >
																		<input type="text" id="firstnamepost" name="firstnamepost" placeholder="Enter First Name" value="<?php echo $fname; ?>"  >
																	</div>
																</div>
																<div class="col-sm-12 unit">
																	<label class="label">Last Name 
																	<sup data-toggle="tooltip" title="" data-original-title="Last Name">
																	<img src="<?php echo base_url(); ?>img/icons/i.png" alt="I Error" title="Error view">
																	</sup>
																	</label>
																	<div class="input">
																		<label class="icon-right" for="lastnamepost">
																		<i class="fa fa-user"></i>
																		</label>
																		<input type="text" id="lastnamepost" name="lastnamepost" placeholder="Enter Last Name" value="<?php echo $lname; ?>" >
																	</div>
																</div>
																<div class="col-sm-12 unit">
																	<label class="label">Contact Number 
																	<sup data-toggle="tooltip" title="" data-original-title="Contact Number">
																	<img src="<?php echo base_url(); ?>img/icons/i.png" alt="I Error" title="Error view">
																	</sup>
																	</label>
																	<div class="input">
																		<label class="icon-right" for="phone">
																		<i class="fa fa-phone"></i>
																		</label>
																		<input type="text" id="contactnopost" name="contactnopost" placeholder="Enter Contact Number" value="<?php echo $mobile; ?>" maxlength='11' onkeypress="return isNumber(event)" >
																	</div>
																</div>
																<div class="col-sm-12 unit">													
																	<button class="btn btn-primary " id='save_changes' >Save Changes</button>
																</div>
															</div>
														</div>
														<!-- Change password-->
														<div class="col-sm-6">
															<div class="row">
																<div class="col-sm-12 unit">
																	<h3>Change password</h3>
																	<label class="label">Current Password 
																	<sup data-toggle="tooltip" title="" data-original-title="Current Password ">
																	<img src="<?php echo base_url(); ?>img/icons/i.png" alt="I Error" title="Error view">
																	</sup>
																	</label>
																	<div class="input">
																		<label class="icon-right" for="currentpasspost">
																		<i class="fa fa-lock"></i>
																		</label>
																		<input type="password" id="currentpasspost" name="currentpasspost" placeholder="Enter Current Password" >
																		<?php echo form_error("currentpasspost");?>
																	</div>
																</div>
																<div class="col-sm-12 unit">
																	<label class="label">New password 
																	<sup data-toggle="tooltip" title="" data-original-title="Atleast 8 characters, one uppercase, one lowercase and one special character">
																	<img src="<?php echo base_url(); ?>img/icons/i.png" alt="I Error" title="Error view">
																	</sup>
																	</label>
																	<div class="input">
																		<label class="icon-right" for="newpasspost">
																		<i class="fa fa-lock"></i>
																		</label>
																		<input type="password" id="newpasspost" name="newpasspost" placeholder="Enter New password" >
																		<?php echo form_error("newpasspost");?>
																	</div>
																</div>
																<div class="col-sm-12 unit">
																	<label class="label">Confirm password 
																	<sup data-toggle="tooltip" title="" data-original-title="Should match with new password">
																	<img src="<?php echo base_url(); ?>img/icons/i.png" alt="I Error" title="Error view">
																	</sup>
																	</label>
																	<div class="input">
																		<label class="icon-right" for="confirmpasspost">
																		<i class="fa fa-lock"></i>
																		</label>
																		<input type="password" id="confirmpasspost" name="confirmpasspost" placeholder="Enter Confirm password" >
																		<?php echo form_error("confirmpasspost");?>
																	</div>
																</div>
																<div class="col-sm-12 unit">													
																	<button class="btn btn-primary " id='change_pwd'>Change Password</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<span class="acc-trigger"><a href="#">DEACTIVATE ACCOUNT</a></span>
											<div class="acc-container">
												<div class="active top_20">
													<p>Are you sure to Deactivate your Account ...?? If you are really decided it then We will miss you.</p>
													<p>Please tell Us why you taken this decision, So that we can improve it.</p>
													<div class="row">
														<div class="col-sm-8 unit">
															<label class="input select">
																<select name="reasonname" class="reasonname">
																	<option value="I_found_my_deal_with_99_Right_Deals" class="remove_text_box">I found my deal with 99 Right Deals.</option>
																	<option value="I_Found_My_deals_with_another_website" class="other_reasonurl_show">I Found My deals with another website</option>
																	<option value="I_am_unhappy_about_services" class="other_reason_show">I am unhappy about services</option>
																	<option value="Other_Reasons" class="other_reason_show">Other Reasons</option>
																</select>
																<input type="hidden" id="email" name="email" value="<?php echo $mail_id; ?>" >
																<i></i>
															</label>
															<div class="unit" id="other_reason_hide" style="display:none;">
																<div class="input">
																	<textarea type="text" id="reason" name="reason" placeholder="Enter Your Reason" ></textarea>
																</div>
															</div>
															<div class="unit" id="other_reasonurl_hide" style="display:none;">
																<div class="input top_10">
																	<input type="text" id="reasonurl" name="reasonurl" placeholder="Enter Your URL" >
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-6">
															<button class="btn btn-primary" id='deactivate_account'>Deactivate Account</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Inner Page Content End-->
		
			<!-- xxx footer Content xxx -->
			<?php echo $this->load->view('common/footer');?> 
			<!-- xxx footer End xxx -->
			
		</div>
		<!-- End Entire Wrap -->
		
		<!-- End Shadow Semiboxed -->
		<script src="<?php echo base_url(); ?>js/jquery.js"></script> 
		<script src="<?php echo base_url(); ?>j-folder/js/jquery.maskedinput.min.js"></script>
		<script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(); ?>j-folder/js/additional-methods.min.js"></script>
		<script src="<?php echo base_url(); ?>j-folder/js/jquery.form.min.js"></script>
		<script src="<?php echo base_url(); ?>j-folder/js/j-forms.min.js"></script>
		<script>
			setTimeout(function(){
				 $(".alert").hide();
			},5000);
		</script>
		
		<!-- xxx footerscript Content xxx -->
		<?php echo $this->load->view('common/footerscript');?> 
		<!-- xxx footerscript End xxx -->
			
	</body>
</html>
