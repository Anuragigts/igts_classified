<!DOCTYPE html>
<html>
<head>

<title>404 Error page | 99 Right Deals</title>

<meta name="description" content="99 Right Deals provides free classifieds ads for new or used and buy or sell goods or products and services in United Kingdom. And create own free ads on 99 Right Deals." />

<!-- xxx Head Content xxx -->
<?php echo $this->load->view('common/head');?> 
<!-- xxx End xxx -->

<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />

</head>
<body id="home">

<div class="preloader"><div class="status">&nbsp;</div></div> 

<div id="layout">

<!-- xxx tophead Content xxx -->
<?php echo $this->load->view('common/tophead'); ?> 
<!-- xxx End tophead xxx -->

<div class="section-title-01">
<div class="bg_parallax image_01_parallax"></div>
</div>

<section class="content-central">
<div class="semiboxshadow text-center">
<img src="<?php echo base_url(); ?>img/img-theme/shp-1090x457.png" class="img-responsive" alt="Shadow" title="Shadow view">
</div>
<div class="content_info">
<div class="paddings">
<div class="container">
<div class="page-error page_four_error">
<h1>404 <i class="fa fa-unlink"></i></h1>
<hr class="tall">
<p class="lead">We're sorry, but the page you were looking for doesn't exist.</p>
<a href="<?php echo base_url(); ?>">Go To Home Page</a>       
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

<!-- xxx footerscript Content xxx -->
<?php echo $this->load->view('common/footerscript');?> 
<!-- xxx footerscript End xxx -->

</body>
</html>
