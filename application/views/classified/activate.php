    <title>Right Deals :: Activate Account</title>
    <style>
        .section-title-01{
            height: 273px;
            background-color: #262626;
            text-align: center;
            position: relative;
            width: 100%;
            overflow: hidden;
        }
        .activate_bor{
            border: 1px solid rgb(244, 244, 244);
            padding: 51px;
        }
    </style>
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/demo.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css">
    
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
            <img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="">
        </div>
        
        <div class="content_info">
            <div class="paddings">
                <div class="container">
                    <div class="row">
                        <form action="<?php echo  base_url(); ?>update_profile/re_activate" method="post" class="j-forms tooltip-hover" >
                            <div class="col-md-6 col-md-offset-3 activate_bor">
                                <div class="j-row">
                                    <div class="span12 unit">
                                        <h3>Activate Account</h3>
                                        <label class="label">Email 
                                            <sup data-toggle="tooltip" title="" data-original-title="Email">
                                                <img src="<?php echo base_url(); ?>img/icons/i.png">
                                            </sup>
                                        </label>
                                        <div class="input">
                                            <label class="icon-right" for="company">
                                                <i class="fa fa-envelope"></i>
                                            </label>
                                            <input type="text" id="email" name="email" placeholder="Enter email" value="<?php echo $ve["login_email"];?>" readonly>
                                        </div>
                                    </div>
                                    <div class="span12 unit">
                                        <label class="label">Password 
                                            <sup data-toggle="tooltip" title="" data-original-title="Password">
                                                <img src="<?php echo base_url(); ?>img/icons/i.png">
                                            </sup>
                                        </label>
                                        <div class="input">
                                            <label class="icon-right" for="name">
                                                <i class="fa fa-lock"></i>
                                            </label>
                                            <input type="text" id="password" name="password" placeholder="Enter Password" value=''>
                                            <?php echo form_error("password");?>
                                        </div>
                                    </div>
                                    <div class="span12 unit">
                                        <label class="label">Confirm Password
                                            <sup data-toggle="tooltip" title="" data-original-title="Confirm Password ">
                                                <img src="<?php echo base_url(); ?>img/icons/i.png">
                                            </sup>
                                        </label>
                                        <div class="input">
                                            <label class="icon-right" for="name">
                                                <i class="fa fa-lock"></i>
                                            </label>
                                            <input type="text" id="conf_password" name="conf_password" placeholder="Enter Confirm Password" value=''>
                                            <?php echo form_error("conf_password");?>
                                        </div>
                                    </div>
                                    <div class="span12 unit">                                                   
                                        <button class="btn btn-primary" type='submit' id='act_account' name='act_account' >Submit</button>
                                    </div>  
                                </div>                  
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
    </section>
    
    <!-- End Shadow Semiboxed -->
    <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
    
    
    <script src="<?php echo base_url(); ?>j-folder/js/jquery.maskedinput.min.js"></script>
    <script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>j-folder/js/additional-methods.min.js"></script>
    <script src="<?php echo base_url(); ?>j-folder/js/jquery.form.min.js"></script>
    <script src="<?php echo base_url(); ?>j-folder/js/j-forms.min.js"></script>
    <script src="<?php echo base_url(); ?>j-folder/js/jquery-cloneya.min.js"></script>

        