	<?php foreach ($prof_data as $prof_val) {
		$prof_id = $prof_data['login_id'];
		$fname = $prof_data['first_name'];
		$lname = $prof_data['lastname'];
		$mail_id = $prof_data['login_email'];
		$mobile = $prof_data['mobile'];
		} ?>
	<title>99 Right Deals :: Deals Administrator</title>
	
	<style>
		.section-title-01{
		height: 273px;
		background-color: #262626;
		text-align: center;
		position: relative;
		width: 100%;
		overflow: hidden;
		}
	</style>
	
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
				// alert(fname+'-'+lname+'-'+mobile);
				// var coll = new Array(fname : fname, lname : lname, mobile : mobile);
				  $.ajax({
				  type : 'post',
				  url  : '<?php echo base_url()?>update_profile/up_profile',
				  data : {prof_id1: prof_id, fname1 : fname, lname1 : lname, mobile1 : mobile},
				  dataType : 'json',
				  success : function(res) {
				   window.location.href = "<?php echo base_url(); ?>update_profile";
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
				   window.location.href = "<?php echo base_url(); ?>update_profile";
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
				var mail = $('#email').val();
				$.ajax({
				  type : 'post',
				  url  : '<?php echo base_url()?>update_profile/deactivate_account',
				  data : {mail: mail},
				  dataType : 'json',
				  success : function(res) {
					if (res == 0){
				window.location.href = "<?php echo base_url(); ?>login";
					}
					else{
			window.location.href = "<?php echo base_url(); ?>update_profile";      		
					}
				   
				  }
				});
			});
		});
	</script>
	
	<link rel="stylesheet" href="j-folder/css/j-forms.css">
	
	<!-- Section Title-->    
	<div class="section-title-01">
		<!-- Parallax Background -->
		<div class="bg_parallax image_01_parallax"></div>
	</div>
	<!-- End Section Title-->
	<!--Content Central -->
	<section class="content-central">
		<!-- Shadow Semiboxed -->
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
									<li><img src="<?php echo base_url(); ?>img/icons/admin.png" alt="admin" title="admin image"><a href='deals_administrator'>Deals Administrator</a></li>
									<li><img src="<?php echo base_url(); ?>img/icons/pickup.png" alt="pickup" title="pickup image"><a href='pickup_deals'>Pickup deals</a></li>
									<li><img src="<?php echo base_url(); ?>img/icons/seaked.png" alt="seaked" title="seaked image"><a href='reserved_searches'>Reserved Searches</a></li>
									<li><img src="<?php echo base_url(); ?>img/icons/updateprofile.png" alt="updateprofile" title="updateprofile image"> <a href='update_profile'>Update Profile</a></li>
								</ul>
								<a class="btn color-red" href="<?php echo base_url(); ?>login/logout">Logout</a>
							</div>
						</div>
						<!-- End Item Table-->
						<!-- Item Table-->
						<form id="j-forms" action="#" class="j-forms tooltip-hover change_pwd" method="post">
							<div class="col-sm-9">
								<div class="row">
									<div class="col-sm-12">
										<h2>Update Profile</h2>
										<hr>
									</div>
								</div>
								<?php echo $this->view("classified_layout/success_error"); ?>		
								<div class="row">
									<!-- contact details-->
									<div class="col-sm-6">
										<div class="row">
											<div class="col-sm-12 unit">
												<h3>Update Profile</h3>
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
													<input type="text" id="contactnopost" name="contactnopost" placeholder="Enter Contact Number" value="<?php echo $mobile; ?>" maxlength='10' onkeypress="return isNumber(event)" >
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
								<hr class="separator">
								<div class="row">
									<div class="col-sm-12 unit">
										<h3>Deactivate account</h3>
										<div class="unit check">
											<p><strong>Please don't leave us! </strong></p>
											<p><strong>Every time an account is deactivated, one of the team cries and it takes hours to get them talking again :</strong></p>
											<p><strong>If you 're really sure...</strong></p>
											<p><strong>Please help us improve Classified by letting us know why you're leaving:</strong></p>
											<label class="radio">
											<input type="radio" name="you_make_it" value="Yeah" checked="">
											<i></i>I don't have any more stuff to put on Classified
											</label>
											<label class="radio">
											<input type="radio" name="you_make_it" value="Maybe">
											<i></i>I didn't get enough response to my Deals on Classified
											</label>
											<label class="radio">
											<input type="radio" name="you_make_it" value="I can't">
											<i></i>I got too many spam emails from my Deals
											</label>
											<label class="radio">
											<input type="radio" name="you_make_it" value="I can't">
											<i></i>I'd rather not say
											</label>
											<label class="radio">
											<input type="radio" name="you_make_it" value="I can't">
											<i></i>Other
											</label>
										</div>
										<button class="btn btn-primary " id='deactivate_account'>Deactivate Account</button>
									</div>
								</div>
								<hr class="separator">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shadow Semiboxed -->
	<script src="js/jquery.js"></script> 
	<script src="j-folder/js/jquery.maskedinput.min.js"></script>
	<script src="j-folder/js/jquery.validate.min.js"></script>
	<script src="j-folder/js/additional-methods.min.js"></script>
	<script src="j-folder/js/jquery.form.min.js"></script>
	<script src="j-folder/js/j-forms.min.js"></script>
	<script>
		setTimeout(function(){
			 $(".alert").hide();
		},5000);
	</script>