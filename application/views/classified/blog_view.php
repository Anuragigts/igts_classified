<!DOCTYPE html>
<html>
<head>

<title>Blog View | 99 Right Deals</title>

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

<div class="section-title-01"><div class="bg_parallax image_01_parallax"></div></div>

<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />

<section class="content-central">
<div class="semiboxshadow text-center">
<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
</div>
<div class="content_info">
<form action="" id="comment_form" method="post" class="j-forms tooltip-hover" style="background-color:#ffffff !important;">
<div class="content_info">
<div class="paddings-mini">
<div class="container">
<div class="blog row">
<div class="col-md-8">
<div class="blog-item">
<div class="imgblog">
<img class="img-responsive img-blog" src="<?php echo base_url(); ?>pictures/blogs/<?php echo $blogdetails->blog_image; ?>" width="100%" alt="" />
</div>

<div class="row">  
<div class="col-xs-12 col-sm-12 blog-content">
<h2><?php echo ucwords($blogdetails->blog_title); ?></h2>
<p align="justify"><?php echo $blogdetails->blog_desc; ?></p>
</div>
</div>

<div class="row">  

</div>
<?php if($this->session->flashdata("msg") != ""){ ?>
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>        
<h4>
<?php echo $this->session->flashdata("msg");?>
</h4>
</div>
<?php } ?>
</div>
</div>


<aside class="col-md-4">
<div class="widget archieve">
<h3>Categories</h3>
<div class="row">
<div class="col-sm-12">
<ul class="blog_archieve">
<?php foreach ($allcategory as $val) { ?>
<li><a href="<?php echo base_url(); ?>blog/blogcat/<?php echo $val->category_id; ?>"> <?php echo $val->category_name; ?> <span class="pull-right">(<?php echo $val->no_blogs; ?>)</span></a></li>
<?php } ?>
</ul>
</div>
</div>                     
</div>
</aside>     
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.6&appId=455502441327582";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="fb-root"></div>
<div class="fb-comments" data-href="" data-numposts="5"></div>

<div class="fb-comment-embed"
data-href="https://99rightdeals.com"
data-width="500"></div>
</div>
</div>
</div>  
</form>
</div>   
</section>

<!-- xxx footer Content xxx -->
<?php echo $this->load->view('common/footer');?> 
<!-- xxx footer End xxx -->

</div>

<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>

<script type="text/javascript">
$(function(){
$("#comment_form").validate({
rules: {
name: {
required: true,
},
email: {
required: true,
email: true,
},
comment: {
required: true,
minlength: 5,
maxlength: 25,
},
},

messages: {
review_title: {
required: "Please Enter your name",
},
email: {
required: "Please Enter email id",
},
comment: {
required: "Please Enter your comment",
minlength: "Title contains atleast 5 characters",
maxlength: "Title contains maximum 25 characters"
},
},

submitHandler: function(form) {
return true;
}
});
});
</script>

<!-- xxx footerscript Content xxx -->
<?php echo $this->load->view('common/footerscript');?> 
<!-- xxx footerscript End xxx -->

</body>
</html>