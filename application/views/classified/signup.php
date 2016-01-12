		<title>365 Deals :: SignUp</title>
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
		<link rel="stylesheet" type="text/css" media="all" href="logreg.css">
        <link rel="stylesheet" type="text/css" media="all" href="switchery.min.css">
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
            $('#fname').keydown(function (e) {
                    if (e.shiftKey || e.ctrlKey || e.altKey) {
                    e.preventDefault();
                    } else {
                    var key = e.keyCode;
                        if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                        e.preventDefault();
                        }
                    }
                });

            $('#lname').keydown(function (e) {
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
            
            });
        </script>
 <!-- Section Title-->    
            <div class="section-title-01">
                <!-- Parallax Background -->
                <div class="bg_parallax image_02_parallax"></div>
                <!-- Parallax Background -->

                <!-- Content Parallax--
                <div class="opacy_bg_02">
                    <div class="container">
                        <h1>Register</h1>
                        <div class="crumbs">
                            <ul>
                                <li><a href="index.php" class='home'>Home</a></li>
                                <li>/</li>
                                <li>Register Page</li>                                       
                            </ul>    
                        </div>
                    </div>  
                </div>  
                <!-- End Content Parallax--> 
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
                            <div class="row">
								<div class="col-sm-10 col-sm-offset-1">
                                    <div class="col-sm-4 sign_bg">
										<img src="img/ebook.png" class="img-responsive" style="height:366px;" alt="">
									</div>
                                    <label class="radio-inline">
                                      <input type="radio" name="signup_type" value='consumer' class='sign_type'  checked />Consumer
                                    </label>
                                    <label class="radio-inline">
                                      <input type="radio" name="signup_type" value='business' class='sign_type' />Business
                                    </label>
									<div class="col-sm-8" id='signup_consumer'>
										<div class="login-form">
											<div class="login-title">
												<?php echo $this->view("classified_layout/success_error"); ?>
											</div><!-- End Title -->

											<form  method="post" class="log_form" action="" id="register-form">
												<div class="col-2">
													<label>First Name <sup style='color:red;'>*</sup>    
														<input placeholder="Enter First Name" id="fname" name="fname" tabindex="1">
														 <?php echo form_error("fname");?>
													</label>
												</div>
												<div class="col-2">
													<label>Last Name <sup style='color:red;'>*</sup>
														<input placeholder="Enter Last Name" id="lname" name="lname" tabindex="2">
														<?php echo form_error("lname");?>
													</label>
												</div>
												<div class="col-2">
													<label>Email <sup style='color:red;'>*</sup>
														<input placeholder="Enter Email" id="email" name="email" tabindex="3">
														<?php echo form_error("email");?>
													</label>
												</div>
												<div class="col-2">
													<label>Password <sup style='color:red;'>*</sup>
														<input type="password" placeholder="Enter password" id="password" name="password" tabindex="4">
														<?php echo form_error("password");?>
													</label>
												</div>
												<div class="col-1">
													<label>Phone Number <sup style='color:red;'>*</sup>
														<input placeholder="Enter Mobile number" id="mobile" name="mobile" tabindex="5" maxlength='10' onkeypress="return isNumber(event)" >
														<?php echo form_error("mobile");?>
													</label>
												</div>
												<div class="col-submit">
													<input type="submit" id="signup" name='signup' class="btn btn-primary" value="Register">
												</div>
											</form><!-- End form -->
										</div><!-- end login form -->
									</div>
                                    <div class="col-sm-8" style='display:none;' id='signup_business'>
                                        <div class="login-form">
                                            <div class="login-title">
                                                <?php echo $this->view("classified_layout/success_error"); ?>
                                            </div><!-- End Title -->

                                            <form  method="post" class="log_form" action="" id="register-form">
                                                <div class="col-2">
                                                    <label>First Name <sup style='color:red;'>*</sup>    
                                                        <input placeholder="Enter First Name" id="fname" name="fname" tabindex="1">
                                                         <?php echo form_error("fname");?>
                                                    </label>
                                                </div>
                                                <div class="col-2">
                                                    <label>Last Name <sup style='color:red;'>*</sup>
                                                        <input placeholder="Enter Last Name" id="lname" name="lname" tabindex="2">
                                                        <?php echo form_error("lname");?>
                                                    </label>
                                                </div>
                                                <div class="col-2">
                                                    <label>Business Name <sup style='color:red;'>*</sup>    
                                                        <input placeholder="Enter Business name" id="busname" name="busname" tabindex="1">
                                                         <?php echo form_error("busname");?>
                                                    </label>
                                                </div>
                                                <div class="col-2">
                                                    <label>Business Address <sup style='color:red;'>*</sup>
                                                        <input placeholder="Enter Business Address" id="busaddr" name="busaddr" tabindex="2">
                                                        <?php echo form_error("busaddr");?>
                                                    </label>
                                                </div>
                                                <div class="col-2">
                                                    <label>Email <sup style='color:red;'>*</sup>
                                                        <input placeholder="Enter Email" id="email" name="email" tabindex="3">
                                                        <?php echo form_error("email");?>
                                                    </label>
                                                </div>
                                                <div class="col-2">
                                                    <label>Password <sup style='color:red;'>*</sup>
                                                        <input type="password" placeholder="Enter password" id="password" name="password" tabindex="4">
                                                        <?php echo form_error("password");?>
                                                    </label>
                                                </div>
                                                <div class="col-2">
                                                    <label>Phone Number <sup style='color:red;'>*</sup>
                                                        <input placeholder="Enter Mobile number" id="mobile" name="mobile" tabindex="5" maxlength='10' onkeypress="return isNumber(event)" >
                                                        <?php echo form_error("mobile");?>
                                                    </label>
                                                </div>
                                                <div class="col-2">
                                                    <label>VAT Number
                                                        <input placeholder="Enter VAT number" id="vat_number" name="vat_number" tabindex="5" >
                                                        <?php echo form_error("vat_number");?>
                                                    </label>
                                                </div>
                                                <div class="col-submit">
                                                    <input type="submit" id="signup" name='signup' class="btn btn-primary" value="Register">
                                                </div>
                                            </form><!-- End form -->
                                        </div><!-- end login form -->
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