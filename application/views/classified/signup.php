<link rel="stylesheet" type="text/css" media="all" href="logreg.css">
        <link rel="stylesheet" type="text/css" media="all" href="switchery.min.css">
        <script type="text/javascript" src="switchery.min.js"></script>
 <!-- Section Title-->    
            <div class="section-title-01">
                <!-- Parallax Background -->
                <div class="bg_parallax image_02_parallax"></div>
                <!-- Parallax Background -->

                <!-- Content Parallax-->
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
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="login-form">
                                        <div class="login-title">
                                            <h2 class="text1 text_center">Register</h2>
                                        </div><!-- End Title -->
                                        <form  method="post" class="log_form" action="" id="register-form">
                                            <div class="col-2">
                                                <label>First Name
                                                    <input placeholder="Enter First Name" id="fname" name="fname" tabindex="1">
                                                     <?php echo form_error("fname");?>
                                                </label>
                                            </div>
                                            <div class="col-2">
                                                <label>Last Name
                                                    <input placeholder="Enter Last Name" id="lname" name="lname" tabindex="2">
                                                    <?php echo form_error("lname");?>
                                                </label>
                                            </div>
                                            <div class="col-2">
                                                <label>Email
                                                    <input placeholder="Enter Email" id="email" name="email" tabindex="3">
                                                    <?php echo form_error("email");?>
                                                </label>
                                            </div>
                                            <div class="col-2">
                                                <label>Confirm Email
                                                    <input placeholder="Enter Confirm email" id="conf-email" name="conf-email" tabindex="4">
                                                    <?php echo form_error("conf-email");?>
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <label>Password
                                                    <input type="password" placeholder="Enter password" id="password" name="password" tabindex="5">
                                                    <?php echo form_error("password");?>
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <label>Confirm Password
                                                    <input type="password" placeholder="Enter Confirm password" id="conf-password" name="conf-password" tabindex="6">
                                                    <?php echo form_error("conf-password");?>
                                                </label>
                                            </div>
                                            <div class="col-3">
                                                <label>Phone Number
                                                    <input placeholder="Enter Mobile number" id="mobile" name="mobile" tabindex="7">
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