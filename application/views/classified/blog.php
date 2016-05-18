<!DOCTYPE html>
<html>
<head>

<title>Right Deals :: Blog</title>

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

<section class="content-central">
<div class="semiboxshadow text-center">
<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
</div>
<div class="content_info">
<div class="">
<div class="content_info">
<div class="paddings-mini">
<div class="container">
<div class="blog row">

<div class="col-md-8">
<?php foreach ($blogslist as $val) { ?>
<div class="blog-item">
<div class="row">
<div class="col-xs-12 col-sm-2 text-center">
<div class="entry-meta">
<span id="publish_date"><?php echo date("d M Y", strtotime($val->blog_created)); ?></span>
<span><i class="fa fa-user"></i> <?php echo ucfirst($val->first_name); ?></span>
</div>
</div>

<div class="col-xs-12 col-sm-10 ">
<a href="<?php echo base_url(); ?>blog/blog_view/<?php echo $val->id; ?>" class="imgblog">
<img class="img-responsive img-blog" src="<?php echo base_url(); ?>pictures/blogs/<?php echo $val->blog_image; ?>" width="100%" alt="" />
</a>
<h3 class="post-title">
<a href="#" class="title"><?php echo $val->blog_title; ?></a>
</h3>
<p align="justify"><?php echo $val->blog_desc; ?></p>

<div>
<ul class="social-team  pull-right">
<li><a href="javascript:void(0);"><i class="fa fa-facebook fb_share" id='<?php echo $val->id; ?>'></i></a></li>
<li><a href="javascript:void(0);"><i class="fa fa-google-plus gmail_share"></i></a></li>
<li><a href="javascript:void(0);"><i class="fa fa-twitter twitter_share"></i></a></li>
<li><a href="javascript:void(0);"><i class="fa fa-linkedin linkdin_share"></i></a></li>
</ul>                 
</div> 

<div class="read-more pull-left">
<a href="<?php echo base_url(); ?>blog/blog_view/<?php echo $val->id; ?>" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>Read More</span></a>
</div>

</div>
</div>    
</div>
<?php } ?>
</div>

<aside class="col-md-4">
<div class="widget archieve">
<h3> <a href="<?php echo base_url(); ?>blog">All Categories</a></h3>
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
<div class='row'>
<div class='col-md-12'>
<?php echo $paging_links; ?>
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
$(function(){
$(".fb_share").click(function(){
window.open('http://www.facebook.com/share.php?u=<?php echo base_url(); ?>blog/blog_view/'+$(this).attr('id')+'/&title=Blog View', "Blog View", '_blank', "width=400, height=400");
});

$(".twitter_share").click(function(){
window.open('http://twitter.com/home?status=Blog View+<?php echo base_url(); ?>blog/blog_view/'+$(this).attr('id'), "Blog View", '_blank', "width=400, height=400");
});

$(".gmail_share").click(function(){
window.open('https://plus.google.com/share?url=<?php echo base_url(); ?>blog/blog_view/'+$(this).attr('id'), "Blog View", '_blank', "width=400, height=400");
});

$(".linkdin_share").click(function(){
window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo base_url(); ?>blog/blog_view/'+$(this).attr('id')+'&amp;title=[Blog View]&amp;source=[SOURCE/DOMAIN]', "Blog View", '_blank', "width=400, height=400");
});
$(".catid").click(function(){

var id   =   $(this).attr("id");
$.post( "<?php echo base_url();?>blog/blogcat" , { id: id} ,function( data ) {
location.reload();
});
});
});
</script>

<!-- xxx footerscript Content xxx -->
<?php echo $this->load->view('common/footerscript');?> 
<!-- xxx footerscript End xxx -->

</body>
</html>