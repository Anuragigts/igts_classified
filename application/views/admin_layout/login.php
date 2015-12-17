<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.startbootstrap.com/flex-admin-v1.2/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2015 07:01:56 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Classifieds :: Admin Login</title>

    <!-- GLOBAL STYLES -->
    <link href="<?php echo $this->config->item('admin_assets_url');?>css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <link href="icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- PAGE LEVEL PLUGIN STYLES -->

    <!-- THEME STYLES -->
    <link href="<?php echo $this->config->item('admin_assets_url');?>css/style.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('admin_assets_url');?>css/plugins.css" rel="stylesheet">

    <!-- THEME DEMO STYLES -->
    <link href="<?php echo $this->config->item('admin_assets_url');?>css/demo.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-banner text-center">
                    <h1><i class="fa fa-gears"></i>Classifieds</h1>
                </div>
                <div class="portlet portlet-green">
                    <div class="portlet-heading login-heading">
                        <div class="portlet-title">
                            <h4><strong>Login to Classifieds</strong>
                            </h4>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                        <form accept-charset="UTF-8" role="form" method='post' action="">
                            <fieldset>
                                <?php $this->load->view("admin/success_error");?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" value="<?php echo set_value('email');?>">
                                    <?php echo form_error('email');?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    <?php echo form_error('password');?>
                                </div>
                                <!--
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>                                
                                -->
                                <br>
                                <input type="submit" class="btn btn-lg btn-green btn-block"  value="Sign In" name='sign_in'/>
                            </fieldset>
                            <br>
                            <p class="small">
                                <a href="#">Forgot your password?</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- GLOBAL SCRIPTS -->
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/jquery.min.js"></script>
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- HISRC Retina Images -->
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/hisrc/hisrc.js"></script>

    <!-- PAGE LEVEL PLUGIN SCRIPTS -->

    <!-- THEME SCRIPTS -->
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/flex.js"></script>
    
    <script>
        $(function(){
            /*  Not to allow special characters for email */
            $('input[type="email"]').keyup(function()
            {
                    var yourInput = $(this).val();
                    re = /[` ~!#$%^&*()|+\-=?;:'",<>\{\}\[\]\\\/]/gi;
                    var isSplChar = re.test(yourInput);
                    if(isSplChar)
                    {
                            var no_spl_char = yourInput.replace(/[` ~!#$%^&*()|+\-=?;:'",<>\{\}\[\]\\\/]/gi, '');
                            $(this).val(no_spl_char);
                    }
            });
        });
    </script>
</body>


<!-- Mirrored from themes.startbootstrap.com/flex-admin-v1.2/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2015 07:01:56 GMT -->
</html>
