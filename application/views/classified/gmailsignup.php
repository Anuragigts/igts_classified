<!DOCTYPE html>
<html>
<head>

<title>Right Deals :: SignUp</title>

<!-- xxx Head Content xxx -->
<?php echo $this->load->view('common/head');?> 
<!-- xxx End xxx -->

<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>css/signreg.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />

<script type="text/javascript">
function isNumber(e){e=e?e:window.event;var r=e.which?e.which:e.keyCode;return r>31&&(48>r||r>57)?!1:!0}$(function(){$(".sign_type").change(function(){var e=$("input[name='signup_type']:checked").val();6==e?($("#signup_business").css("display","block"),$("#signup_consumer").css("display","none")):7==e&&($("#signup_business").css("display","none"),$("#signup_consumer").css("display","block"))}),$.validator.addMethod("pwcheck",function(e){return/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/.test(e)}),jQuery.validator.addMethod("character",function(e){return/^[a-zA-Z\s]+$/.test(e)}),$("#register_form").validate({rules:{con_fname:{required:!0,character:!0,minlength:3},con_lname:{required:!0,character:!0,minlength:3},con_mobile:{required:!0,minlength:11},con_email:{required:!0,email:!0},bus_fname:{required:!0,character:!0,minlength:3},bus_lname:{required:!0,character:!0,minlength:3},bus_name:{required:!0,character:!0,minlength:5},bus_address:{required:!0,minlength:5},bus_mobile:{required:!0,minlength:11},bus_email:{required:!0,email:!0},bus_password:{required:!0,pwcheck:!0},con_password:{required:!0,pwcheck:!0}},messages:{con_fname:{required:"Please enter your First name",character:"please Enter characters",minlength:"Enter atleast 3 characters"},con_lname:{required:"Please enter your Last name",character:"please Enter characters",minlength:"Enter atleast 3 characters"},con_mobile:{required:"Please enter your 11 Digit Mobile No",minlength:"Mobile number Should be 11 digits"},bus_fname:{required:"Please enter your First name",character:"please Enter characters",minlength:"Enter atleast 3 characters"},bus_lname:{required:"Please enter your Last name",character:"please Enter characters",minlength:"Enter atleast 3 characters"},bus_name:{required:"Please enter your Business name",character:"please Enter characters",minlength:"Enter atleast 5 characters"},bus_address:{required:"Please enter your Business Address",minlength:"Enter atleast 5 characters"},bus_mobile:{required:"Please enter your 11 Digit Mobile No",minlength:"Mobile number Should be 11 digits"},bus_password:{required:"Please provide a password",pwcheck:"minimum 8 characters(Should Include atleast one lowercase, one uppercase, one digit)"},con_password:{required:"Please provide a password",pwcheck:"minimum 8 characters(Should Include atleast one lowercase, one uppercase, one digit)"},con_email:"Please enter a valid email address",bus_email:"Please enter a valid email address"},submitHandler:function(e){return!0}})});
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
<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="">
</div>

<div class="content_info">
<div class="paddings-mini">
<div class="container">
<div class="row ">
<div class="col-sm-10 col-sm-offset-1">
<div class="login-title">
<?php echo $this->view("classified_layout/success_error"); ?>
</div>
<div class="row login_totpad">
<div class="col-sm-12">
<div class="row login_left">
<div class="col-md-8">
<div class=" pull-left">
<a href="<?php echo base_url(); ?>index.php"><img src="<?php echo base_url(); ?>img/maillogo.png"  class="" alt="Logo" title="99 Right Deals">  </a> 
</div>
</div>
<?php 

$gid = $gmail_data['oauth_uid'];
$gfname = $gmail_data['first_name'];
$glname = $gmail_data['last_name'];
$gemail = $gmail_data['email'];
?>
<div class="col-md-4">
<h2 class="login_name">SignUp</h2>
</div>
</div>
<div class="login-form">
<form  method="post" class="log_form" action="" id="register_form" novalidate="novalidate">
<div class="col-1">
<label class="radio-inline">
<input type="radio" name="signup_type" value='7' class='sign_type'  checked /> Consumer
<input type="hidden" id="gmid" name="gmid" value="<?php echo $gid; ?>">
</label>
<label class="radio-inline">
<input type="radio" name="signup_type" value='6' class='sign_type' /> Business
</label>
</div>
<div class="form" id='signup_consumer'>
<div class="col-2">
<label>First Name <sup style='color:red;'>*</sup>    
<input placeholder="Enter First Name" id="con_fname" name="con_fname" value="<?php echo $gfname; ?>" tabindex="1">

</label>
</div>
<div class="col-2">
<label>Last Name <sup style='color:red;'>*</sup>
<input placeholder="Enter Last Name" id="con_lname" name="con_lname" value="<?php echo $glname; ?>" tabindex="2">

</label>
</div>
<div class="col-2">
<label>Email <sup style='color:red;'>*</sup>
<input placeholder="Enter Email" id="con_email" value="<?php echo $gemail; ?>" name="con_email" tabindex="3" readonly>

</label>
</div>
<div class="col-2">
<label>Phone Number <sup style='color:red;'>*</sup>
<input placeholder="Enter Mobile number" id="con_mobile" name="con_mobile" tabindex="5" maxlength='11' onkeypress="return isNumber(event)" >

</label>
</div>
</div>
<div class="form" style='display:none;' id='signup_business'>
<div class="col-2">
<label>First Name <sup style='color:red;'>*</sup>    
<input placeholder="Enter First Name" id="bus_fname" name="bus_fname" value="<?php echo $gfname; ?>" tabindex="1">
</label>
</div>
<div class="col-2">
<label>Last Name <sup style='color:red;'>*</sup>
<input placeholder="Enter Last Name" id="bus_lname" name="bus_lname" value="<?php echo $glname; ?>" tabindex="2">
</label>
</div>
<div class="col-2">
<label>Business Name <sup style='color:red;'>*</sup>    
<input placeholder="Enter Business name" id="bus_name" name="bus_name" tabindex="3">
</label>
</div>
<div class="col-2">
<label>Business Address <sup style='color:red;'>*</sup>
<input placeholder="Enter Business Address" id="bus_address" name="bus_address" tabindex="4">
</label>
</div>
<div class="col-2">
<label>Email <sup style='color:red;'>*</sup>
<input placeholder="Enter Email" id="bus_email" name="bus_email" tabindex="5" value="<?php echo $gemail; ?>" readonly>
</label>
</div>
<div class="col-2">
<label>Phone Number <sup style='color:red;'>*</sup>
<input placeholder="Enter Mobile number" id="bus_mobile" name="bus_mobile"  maxlength='11' onkeypress="return isNumber(event)" tabindex="7">
</label>
</div>
<div class="col-2">
<label>VAT Number
<input placeholder="Enter VAT number" id="vat_number" name="vat_number" tabindex="8" >
</label>
</div>
</div>
<div class="col-submit">
<input type="submit" id="submit" name='submit' class="btn btn-primary" value="Register">
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

<script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>

<!-- xxx footerscript Content xxx -->
<?php echo $this->load->view('common/footerscript');?> 
<!-- xxx footerscript End xxx -->

</body>
</html>