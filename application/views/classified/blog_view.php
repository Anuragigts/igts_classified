<!DOCTYPE html>
<html>
	<head>
		
		<title>Right Deals :: Blog View</title>
		
		<!-- xxx Head Content xxx -->
		<?php echo $this->load->view('common/head');?> 
		<!-- xxx End xxx -->
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
	
	</head>
	
	<body id="home">
		
		<!--Preloader-->
		<div class="preloader">
			<div class="status">&nbsp;</div>
		</div> 
			   
		<!-- Start Entire Wrap-->
		<div id="layout">
			
			<!-- xxx tophead Content xxx -->
			<?php echo $this->load->view('common/tophead'); ?> 
			<!-- xxx End tophead xxx -->
			
			<!-- Inner Page Content Start-->
			<div class="section-title-01">
				<div class="bg_parallax image_01_parallax"></div>
			</div>
			
			<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
			
			<!--Content Central -->
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
												<!-- <div class="row top_10">  
													<div class="col-sm-12"><h4>New Comment</h4><hr></div>
													<div class="col-sm-6 unit">
														<label class="label">Name
															<sup data-toggle="tooltip" title="" data-original-title="Name">
																<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
															</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="name">
																<i class="fa fa-user"></i>
															</label>
															<input type="text" id="name" name="name" placeholder="Enter Your Name " >
															<input type="hidden" id="current_url" name="current_url" value="<?php echo current_url(); ?>" >
														</div>
													</div>
													<div class="col-sm-6 unit">
														<label class="label">Email
															<sup data-toggle="tooltip" title="" data-original-title="Email">
																<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
															</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="name">
																<i class="fa fa-user"></i>
															</label>
															<input type="text" id="email" name="email" placeholder="Enter Your Email " >
														</div>
													</div>
													<div class="col-sm-12 unit">
														<label class="label">Comment
															<sup data-toggle="tooltip" title="" data-original-title="Comment">
																<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
															</sup>
														</label>
														<div class="input">
															<textarea type="text" name="comment" placeholder="Enter Comment " ></textarea>
														</div>
													</div>
													<div class="col-sm-12 unit">													
														<button class="btn btn-primary " id='change_pwd'>Add Comment</button>
													</div>
												</div> -->
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
									<!-- Load Facebook SDK for JavaScript -->
									<div id="fb-root"></div>
									<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#99rightdeals.com" data-numposts="5"></div>

									<!-- Your embedded comments code -->
									<div class="fb-comment-embed"
									   data-href="https://99rightdeals.com"
									   data-width="500"></div>
								</div>
							</div>
						</div>  
					</form>
				</div>   
			</section>
			<!-- Inner Page Content End-->
		
			<!-- xxx footer Content xxx -->
			<?php echo $this->load->view('common/footer');?> 
			<!-- xxx footer End xxx -->
			
		</div>
		<!-- End Entire Wrap -->
		
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
