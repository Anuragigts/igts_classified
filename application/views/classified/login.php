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
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="login-form">
                                        <div class="login-title pad_bottm">
                                            <h2 class="text1 text_center ">Login</h2>
                                        </div>
                                        <div class="row login_totpad" style="border: 2px solid #5EC3A3;">
                                            <div class="col-md-4 login_left">
                                                <div class="log_leftpad text_center">
                                                    <a href="index.php"><img src="img/365deal.png" class="log_logo" alt="Logo"></a> 
                                                    <h4 class="log_side top_20"><a href="#">Create New Account</a></h4>
                                                    <h4 class="log_side"><a href="#">Forgot Password</a></h4>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
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
                                                <div class="login_form">
                                                    <form  method="post" class="log_form" action="#" id="register-form">
                                                        <div class="col-1">
                                                            <label>Email
                                                                <input placeholder="Enter Email" id="email" name="email" tabindex="1">
                                                            </label>
                                                        </div>
                                                        <div class="col-1">
                                                            <label>Password
                                                                <input type="password" placeholder="Enter password" id="password" name="password" tabindex="2">
                                                            </label>
                                                        </div>
                                                        <div class="col-1">
                                                            <label> Want to Post an Ad without Login</label>
                                                            <center style="position:relative; margin-bottom:8px;">
                                                                <input type="checkbox" id='w_check' name='w_check' onclick='check()' class="js-switch">
                                                            </center>
                                                        </div>
                                                        <div class="col-submit">
                                                            <button class="submitbtn">Login</button>
                                                        </div>
                                                        <div class="col-1">
                                                            <label> Remember Password</label>
                                                            <center style="position:relative; margin-bottom:8px;margin-top:-43px;"><input type="checkbox" class="js-switch"></center>
                                                        </div>
                                                        
                                                    </form><!-- End form -->
                                                </div>
                                            </div>
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



//         $(function(){
//     $('#w_check').click(function(){
//         if($(this).is(':checked'))
//             alert('checked');
//         else
//             alert('unchecked');
//     });

// });
            </script>