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
                                <li><a href="index.php">Home</a></li>
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
                                <div class="col-md-8 col-md-offset-2 login_padd">
                                     <?php echo $this->view("classified_layout/success_error"); ?>
                                    <div class="login-form">
                                        <div class="login-title">
                                            <h2 class="text1">Register</h2>
                                        </div><!-- End Title -->
                                        <form method="post" action="" id="sign-form">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="input form-theme">
                                                        <label for="firstname">First Name<sup class="star_valid">*</sup>:</label>
                                                        <input type="text" id="fname" name='fname' class="firstname" placeholder="First Name" >
                                                        <?php echo form_error("fname");?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input form-theme">
                                                        <label for="lastname">Last Name<sup class="star_valid">*</sup>:</label>
                                                        <input type="text" id="lname" name='lname' class="lastname" placeholder="Last Name" >
                                                        <?php echo form_error("lname");?>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="input form-theme">
                                                        <label for="emailid">Email<sup class="star_valid">*</sup>:</label>
                                                        <input type="email" id="email" name='email' class="emailid" placeholder="Email" >
                                                        <?php echo form_error("email");?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input form-theme">
                                                        <label for="conformemail">Conform Email<sup class="star_valid">*</sup>:</label>
                                                        <input type="email" id="conf-email" name='conf-email' class="conformemail" placeholder="Conform Email" >
                                                        <?php echo form_error("conf-email");?>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="input form-theme">
                                                        <label for="password">Password<sup class="star_valid">*</sup>:</label>
                                                        <input type="password" id="password" name='password' class="password" placeholder="Password" >
                                                        <?php echo form_error("password");?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input form-theme">
                                                        <label for="conformpassword">Conform Password<sup class="star_valid">*</sup>:</label>
                                                        <input type="password" id="conf-password" name='conf-password' class="conformpassword" placeholder="Conform Password" >
                                                        <?php echo form_error("conf-password");?>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="input form-theme">
                                                        <label for="mobileno">Mobile Number<sup class="star_valid">*</sup>:</label>
                                                        <input type="text" id="mobile" name='mobile' class="mobileno" placeholder="Mobile Number" maxlength='10' >
                                                        <?php echo form_error("mobile");?>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="row">
                                                <div class="col-md-12 form-theme">
                                                    <div class="input clearfix">
                                                        <input type="submit" id="signup" name='signup' class="btn btn-primary" value="Register">
                                                    </div>
                                                </div>
                                            </div><!-- end row -->
                                        </form><!-- End form -->
                                    </div><!-- end login form -->
                                </div><!-- end col-md-8/offset -->
                            </div><!-- end row -->
                        </div>
                    </div>
                </div>   
                <!-- End content info - page Fill with  --> 

            </section>

            <script>
       setTimeout(function(){
            $(".alert").hide();
       },5000);
</script>