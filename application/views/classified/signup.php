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
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="login-form">
                                        <div class="login-title">
                                            <h2 class="text1 text_center">Register</h2>
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
                                                <label>Confirm Email <sup style='color:red;'>*</sup>
                                                    <input placeholder="Enter Confirm email" id="conf-email" name="conf-email" tabindex="4">
                                                    <?php echo form_error("conf-email");?>
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <label>Password <sup style='color:red;'>*</sup>
                                                    <input type="password" placeholder="Enter password" id="password" name="password" tabindex="5">
                                                    <?php echo form_error("password");?>
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <label>Confirm Password <sup style='color:red;'>*</sup>
                                                    <input type="password" placeholder="Enter Confirm password" id="conf-password" name="conf-password" tabindex="6">
                                                    <?php echo form_error("conf-password");?>
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <label>Phone Number <sup style='color:red;'>*</sup>
                                                    <input placeholder="Enter Mobile number" id="mobile" name="mobile" tabindex="7" maxlength='10' onkeypress="return isNumber(event)" >
                                                    <?php echo form_error("mobile");?>
                                                </label>
                                            </div>
                                            <div class="col-submit">
                                                <input type="submit" id="signup" name='signup' class="btn btn-primary" value="Register">
                                            </div>
                                        </form><!-- End form -->
                                    </div><!-- end login form -->
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