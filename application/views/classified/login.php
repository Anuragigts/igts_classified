<!DOCTYPE html>
<html>
<head>

<title>Login | 99 Right Deals</title>

<!-- xxx Head Content xxx -->
<?php echo $this->load->view('common/head');?> 
<!-- xxx End xxx -->

<style>
#feedback {position: absolute !important;top: 55% !important;}textarea{height:0px !important;}
</style>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/logreg.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />

<script>
$(function(){$("#login_form").validate({rules:{email:{required:!0,email:!0},password:{required:!0,minlength:5}},messages:{password:{required:"Please provide a password",minlength:"Your password must be at least 5 characters long"},email:"Please enter a valid email address"},submitHandler:function(e){return!0}})});
</script>

</head>

<body id="home">

<div class="preloader"><div class="status">&nbsp;</div></div> 

<div id="layout">

<!-- xxx tophead Content xxx -->
<?php echo $this->load->view('common/tophead'); ?> 
<!-- xxx End tophead xxx -->

<div class="section-title-01"><div class="bg_parallax image_02_parallax"></div></div>

<section class="content-central">
<?php 
?>
<div class="semiboxshadow text-center">
<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
</div>

<div class="content_info">
<div class="paddings-mini">
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="login-form">
<?php echo $this->view("classified_layout/success_error"); ?>
<div class="row login_totpad">
<div class="col-md-12">
<script type="text/javascript">
function check(){var e=document.getElementById("w_check").checked;e?document.getElementById("password").disabled=!0:document.getElementById("password").disabled=!1}$(function(){$("#wo_login .switchery").click(function(){var e=$(".switchery").css("box-shadow");"rgb(223, 223, 223) 0px 0px 0px 0px inset"==e?(document.getElementById("password").disabled=!0,document.getElementById("w_login").value=1):(document.getElementById("password").disabled=!1,document.getElementById("w_login").value=0)}),$("#remember .switchery").click(function(){var e=$(".switchery").css("box-shadow");"rgb(223, 223, 223) 0px 0px 0px 0px inset"==e?document.getElementById("remember").value=1:document.getElementById("remember").value=0})});
</script>
<div class="">
<div class="row login_left">
<div class="col-md-8">
<div class=" pull-left">
<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/maillogo.png"  class="" alt="Logo" title="99 Right Deals">  </a> 
</div>
</div>
<div class="col-md-4"><h2 class="login_name">Login</h2></div>
</div>
<div class="login_form">
<form  method="post" class="log_form" action="" id="login_form">
<div class="col-1">
<label>Email <sup style='color:red;'>*</sup>
<input placeholder="Enter Email" id="email" name="email" tabindex="1" required>
</label>
</div>
<div class="col-1">
<label>Password <sup style='color:red;'>*</sup>
<input type="password" placeholder="Enter password" id="password" name="password" tabindex="2" required>
</label>
</div>
<div class="col-1" id='wo_login'>
<label> <a href="<?php echo base_url(); ?>register" class="signup_clr">Sign Up</a>
</label>
</div>
<div class="col-submit">
<input type='submit' id="submit" name='submit' class="pull-left btn btn-primary" value='Login' />
<h4 class="log_side pull-right"><a href="forgot-password" class="signup_clr">Forgot Password</a></h4>
</div>
</form>
<div class="row social_icons">
<div class="col-md-6">
<div class="login-options">
<a href="javascript: void(0);" class="login-op-btn grad-btn ln-tr fb">Login with Facebook</a>
</div>
</div>
<div class="col-md-6">
<div class=" login-options">
<a href="<?php echo $authUrl; ?>" class="login-op-btn grad-btn ln-tr gp">Login with Google</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<!-- xxx footer Content xxx -->
<?php echo $this->load->view('common/footer');?> 
<!-- xxx footer End xxx -->

</div>

<script src="<?php echo base_url(); ?>js/jquery.js"></script> 
<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>

<script type="text/javascript">
$(function(){$(".fb").click(function(){return window.open("<?= $login_url ?>","Facebook API","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=300, left=400,right=400, width=400, height=400"),!1}),$(".gp").click(function(){$.ajax({type:"POST",url:"<?php echo base_url();?>login/set_gf",success:function(e){}})})});
</script>

<script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>

<script>
setTimeout(function(){$(".alert").hide();},5000);
</script>

<!-- xxx footerscript Content xxx -->
<?php echo $this->load->view('common/footerscript');?> 
<!-- xxx footerscript End xxx -->

</body>
</html>
