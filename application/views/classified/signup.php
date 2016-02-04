		<title>99 Right Deals :: SignUp</title>
			<style>
				.section-title-01{
					height: 315px;
					background-color: #262626;
					text-align: center;
					position: relative;
					width: 100%;
					overflow: hidden;
				}
			</style>
		<link rel="stylesheet" type="text/css" media="all" href="signreg.css">
		<link rel="stylesheet" href="j-folder/css/j-forms.css">
		<script type="text/javascript" src="switchery.min.js"></script>
        <script type="text/javascript">
        /*accept number only*/
    function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

      

        $(function(){
                $('.sign_type').click(function(){
                        var ch = $("input[name='signup_type']:checked").val();
                        if(ch == 'business'){
                            $("#signup_business").css('display', 'block');
                            $("#signup_consumer").css('display', 'none');
                        }else{
                            $("#signup_business").css('display', 'none');
                            $("#signup_consumer").css('display', 'block');
                        }
                });

                $.validator.addMethod("pwcheck", function(value) {
				   return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/.test(value); // consists of only these
				});

				 jQuery.validator.addMethod("character", function (value) {
			         return /^[a-zA-Z\s]+$/.test(value);
			        });

                $("#register_form").validate({
			
				// Specify the validation rules
				rules: {
					con_fname: {
						required: true,
						character:true
					},
					con_lname: {
						required: true,
						character:true
					},
					con_mobile: "required",
					con_email: {
						required: true,
						email: true
					},
					bus_fname: "required",
					bus_lname: "required",
					bus_name: "required",
					bus_address: "required",
					bus_mobile: "required",
					bus_email: {
						required: true,
						email: true
					},
					bus_password: {
						required: true,
						// minlength: 8,
						pwcheck: true
					},
					con_password: {
						required: true,
						// minlength: 8,
						pwcheck: true
					},
				},
				
				// Specify the validation error messages
				messages: {
					con_fname: {
						required: "Please enter your first name",
						character: "please Enter characters"
					},
					con_lname: {
						required: "Please enter your first name",
						character: "please Enter characters"
					},
					con_mobile: "Please enter your 10 Digit Mobile No",
					bus_fname: "Please enter your first name",
					bus_lname: "Please enter your last name",
					bus_name: "Please enter your Business name",
					bus_address: "Please enter your Business Address",
					bus_mobile: "Please enter your 10 Digit Mobile No",
					bus_password: {
						required: "Please provide a password",
						// minlength: "Your password must be at least 8 characters long",
						pwcheck: "minimum 8 characters(Should Include atleast one lowercase, one uppercase, one digit, one special character)"
					},
					con_password: {
						required: "Please provide a password",
						// minlength: "Your password must be at least 8 characters long",
						pwcheck: "minimum 8 characters(Should Include atleast one lowercase, one uppercase, one digit, one special character)"
					},
					con_email: "Please enter a valid email address",
					bus_email: "Please enter a valid email address",
				},
				
				submitHandler: function(form) {
					return true;
					//form.submit();
				}
			});
            
            });
        </script>
		
		
		<!-- jQuery Form Validation code -->
		  <script>
		  
		  // When the browser is ready...
		  $(function() {
		  
			// Setup form validation on the #register-form element
			

		  });
		  
		  </script>
		  
			<!-- Section Title-->    
            <div class="section-title-01">
                <!-- Parallax Background -->
                <div class="bg_parallax image_02_parallax"></div>
                <!-- Parallax Background -->

             </div>   
            <!-- End Section Title-->

            <!--Content Central -->
            <section class="content-central">
                <!-- Shadow Semiboxed -->
                <div class="semiboxshadow text-center">
                    <img src="img/img-theme/shp.png" class="img-responsive" alt="">
                </div>
                <!-- End Shadow Semiboxed -->

                <!-- End content info - page Fill with -->
                <div class="content_info">
                    <div class="paddings-mini">
                        <div class="container">
                            <div class="row ">
								<div class="col-sm-10 col-sm-offset-1">
									<div class="login-title pad_bottm">
										<h2 class="text1 text_center ">Sign UP</h2>
									</div>
									<div class="row login_totpad">
									   <div class="col-md-3 signup_left">
											<div class="text_center">
												<a href="index.php"><img src="img/99rightdeal.png" class="log_logo" alt="Logo" title="Logo 365 Deals"></a> 
												<h4 class="log_side top_20"><a href="signup">Create New Account</a></h4>
												<h4 class="log_side"><a href="forgot_password">Forgot Password</a></h4>
											</div>
										</div>
                                    
										<div class="col-sm-9">
											<div class="login-form">
												<div class="login-title">
													<?php echo $this->view("classified_layout/success_error"); ?>
												</div><!-- End Title -->

												<form  method="post" class="log_form" action="" id="register_form" novalidate="novalidate">
													<div class="col-1">
														<label class="radio-inline">
															<input type="radio" name="signup_type" value='consumer' class='sign_type'  checked /> Consumer
														</label>
														<label class="radio-inline">
															<input type="radio" name="signup_type" value='business' class='sign_type' /> Business
														</label>
													</div>
													<div class="form" id='signup_consumer'>
														<div class="col-2">
															<label>First Name <sup style='color:red;'>*</sup>    
																<input placeholder="Enter First Name" id="con_fname" name="con_fname" tabindex="1">
																 
															</label>
														</div>
														<div class="col-2">
															<label>Last Name <sup style='color:red;'>*</sup>
																<input placeholder="Enter Last Name" id="con_lname" name="con_lname" tabindex="2">
																
															</label>
														</div>
														<div class="col-2">
															<label>Email <sup style='color:red;'>*</sup>
																<input placeholder="Enter Email" id="con_email" name="con_email" tabindex="3">
																
															</label>
														</div>
														<div class="col-2">
															<label>Password <sup style='color:red;'>*</sup>
																<input type="password" placeholder="Enter password" id="con_password" name="con_password" tabindex="4">
																
															</label>
														</div>
														<div class="col-1">
															<label>Phone Number <sup style='color:red;'>*</sup>
																<input placeholder="Enter Mobile number" id="con_mobile" name="con_mobile" tabindex="5" maxlength='10' onkeypress="return isNumber(event)" >
																
															</label>
														</div>
													</div>
													<div class="form" style='display:none;' id='signup_business'>
														<div class="col-2">
															<label>First Name <sup style='color:red;'>*</sup>    
																<input placeholder="Enter First Name" id="bus_fname" name="bus_fname" tabindex="1">
															</label>
														</div>
														<div class="col-2">
															<label>Last Name <sup style='color:red;'>*</sup>
																<input placeholder="Enter Last Name" id="bus_lname" name="bus_lname" tabindex="2">
															</label>
														</div>
														<div class="col-2">
															<label>Business Name <sup style='color:red;'>*</sup>    
																<input placeholder="Enter Business name" id="bus_name" name="bus_name" tabindex="3">
															</label>
														</div>
														<div class="col-2">
															<label>Business Address <sup style='color:red;'>*</sup>
																<input placeholder="Enter Business Address" id="bus_address" name="bus_address" tabindex="4">
															</label>
														</div>
														<div class="col-2">
															<label>Email <sup style='color:red;'>*</sup>
																<input placeholder="Enter Email" id="bus_email" name="bus_email" tabindex="5">
															</label>
														</div>
														<div class="col-2">
															<label>Password <sup style='color:red;'>*</sup>
																<input type="password" placeholder="Enter password" id="bus_password" name="bus_password" tabindex="6">
																
															</label>
														</div>
														<div class="col-2">
															<label>Phone Number <sup style='color:red;'>*</sup>
																<input placeholder="Enter Mobile number" id="bus_mobile" name="bus_mobile"  maxlength='10' onkeypress="return isNumber(event)" tabindex="7">
															</label>
														</div>
														<div class="col-2">
															<label>VAT Number
																<input placeholder="Enter VAT number" id="vat_number" name="vat_number" tabindex="8" >
															</label>
														</div>
													</div>
													<div class="col-submit">
														<input type="submit" id="submit" name='submit' class="btn btn-primary" value="Register">
													</div>
												</form><!-- End form -->
											</div><!-- end login form -->
										</div>
									</div>
                                </div><!-- end col-md-8/offset -->
                            </div><!-- end row -->
                        </div>
                    </div>
                </div>   
                <!-- End content info - page Fill with  --> 

            </section>
	<script src="js/jquery.js"></script> 
    <script>
       setTimeout(function(){
            $(".alert").hide();
       },5000);
	</script>
	<script src="j-folder/js/jquery.validate.min.js"></script>