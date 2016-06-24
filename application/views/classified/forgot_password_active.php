<!DOCTYPE html>
<html>
<head>

<title>Forgot Password Active | 99 Right Deals</title>

<!-- xxx Head Content xxx -->
<?php echo $this->load->view('common/head');?> 
<!-- xxx End xxx -->

<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/logreg.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
<script type="text/javascript" src="switchery.min.js"></script>

<script type="text/javascript">
$(function(){
$.validator.addMethod("pwcheck", function(value) {
return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/.test(value); // consists of only these
});
$("#forgot-form").validate({

rules: {
password: {
required: true,
minlength: 8,
pwcheck: true
},
conf_password:{
required: true,
minlength: 8,
equalTo : "#password",
pwcheck: true
},
},

messages: {
password: {
required: "Please enter a new password",
pwcheck: "Should Include atleast one lowercase, one uppercase, one digit"
},
conf_password:{
required: "Please enter a confirm password",
pwcheck: "Should Include atleast one lowercase, one uppercase, one digit"
},
},

submitHandler: function(form) {
return true;
}
});
});
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
<div class="semiboxshadow text-center">
<img src="<?php echo base_url(); ?>img/img-theme/shp-1090x457.png" class="img-responsive" alt="Shadow" title="Shadow view">
</div>

<div class="content_info">
<div class="paddings-mini">
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="row login_totpad">
<div class="col-sm-12">		
<div class="row login_left">
<div class="col-md-6">
<div class=" pull-left">
<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/maillogo.png"  class="" alt="Logo" title="99 Right Deals">  </a> 
</div>
</div>
<div class="col-md-6">
<h2 class="login_name">Forgot Password</h2>
</div>
</div>
<div class="login-form">

<?php echo $this->view("classified_layout/success_error"); ?>
<form  method="post" class="log_form" action="<?php echo base_url(); ?>common/forgot/<?php echo @$rcode; ?>" id="forgot-form">
<div class="col-12">
<label>New Password <sup style='color:red;'>*</sup>
<input type='password' placeholder="Enter Password" id="password" name="password" tabindex="1" >
<input type="hidden" id="random" name="random" value='<?php echo @$rcode; ?>' tabindex="1">
<?php echo form_error("password");?>
</label>
</div>
<div class="col-12">
<label>Confirm Password <sup style='color:red;'>*</sup>
<input type='password' placeholder="Enter password" id="conf_password" name="conf_password" tabindex="1" >
<?php echo form_error("conf_password");?>
</label>
</div>
<div class="col-submit">
<input type="submit" id="forgot_pwd" name='forgot_pwd' class="btn btn-primary" value="Submit">
</div>
</form>
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

<script>
setTimeout(function(){$(".alert").hide();},5000);
</script>

<!-- xxx footerscript Content xxx -->
<?php echo $this->load->view('common/footerscript');?> 
<!-- xxx footerscript End xxx -->

</body>
</html>
