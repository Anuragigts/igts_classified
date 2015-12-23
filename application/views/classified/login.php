 <!-- Section Title-->    
            <div class="section-title-01">
                <!-- Parallax Background -->
                <div class="bg_parallax image_02_parallax"></div>
                <!-- Parallax Background -->

                <!-- Content Parallax-->
                <div class="opacy_bg_02">
                    <div class="container">
                        <h1>Login</h1>
                        <div class="crumbs">
                            <ul>
                                <li><a href="index.php" class='home'>Home</a></li>
                                <li>/</li>
                                <li>Login Page</li>                                       
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
                               <?php echo $this->view("classified_layout/success_error"); ?>
                                <div class="col-md-4 col-md-offset-4 login_padd">
                                    <div class="login-form">
                                        <div class="login-title">
                                            <h2 class="text1">Login</h2>
                                        </div><!-- End Title -->
                                        <form method="post" class="" action="" id="login-form">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input form-theme">
                                                        <label for="username-input">User Name<sup class="star_valid">*</sup>:</label>
                                                        <input type="text" id="email" name='email' class="username-input" placeholder="User Name" >
                                                        <?php echo form_error("email");?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="input form-theme">
                                                        <label for="password-input">Password<sup class="star_valid">*</sup>:</label>
                                                        <input type="password" id="password" name='password' class="password-input" placeholder="Password" >
                                                        <?php echo form_error("password");?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 ">
                                                    <script type="text/javascript">
                                                    function check(){
                                                        var ch = document.getElementById('w_check').checked;
                                                        if(ch){
                                                            document.getElementById('password').disabled = true;
                                                        }
                                                        else{
                                                         document.getElementById('password').disabled = false;
                                                        }
                                                    }
                                                    </script>
                                                    <div class="custom-checkbox">
                                                        <input type="checkbox" id="w_check" name='w_check' value='1' class="checkbox-input" onclick='check()'>
                                                        <label for="withoutlogin_remember">Want to Post an Ad without Login</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 form-theme">
                                                    <div class="input clearfix">
                                                        <input type="submit" id="login" name='login' class="btn btn-primary" value="Login">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 clearfix">
                                                    <div class="custom-checkbox fl">
                                                        <input type="checkbox" id="login_remember" class="checkbox-input" checked>
                                                        <label for="login_remember">Remember Password</label>
                                                    </div>
                                                </div><!-- end remember -->
                                                <div class="col-md-12  clearfix">
                                                    <div class="forgot fr">
                                                        <a href="signup" class="new-user">Create New Account</a> / <a href="#" class="reset">Forget Password ?</a>
                                                    </div>
                                                </div><!-- end forgot password -->
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
	<script src="js/jquery.js"></script> 

            <script>
       setTimeout(function(){
            $(".alert").hide();
       },5000);



//         $(function(){
//     $('#w_check').click(function(){
//         if($(this).is(':checked'))
//             alert('checked');
//         else
//             alert('unchecked');
//     });

// });
            </script>