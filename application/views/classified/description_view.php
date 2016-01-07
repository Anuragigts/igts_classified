	<title>365 Deals :: Product View</title>
	
	<script>
        jssor_1_slider_init = function() {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 10,
                $SpacingX: 8,
                $SpacingY: 8,
                $Align: 360
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 845);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>
	 <script type="text/javascript" src="js/jssor.slider.min.js"></script>
    <style>
        
        /* jssor slider arrow navigator skin 05 css */
        /*
        .jssora05l                  (normal)
        .jssora05r                  (normal)
        .jssora05l:hover            (normal mouseover)
        .jssora05r:hover            (normal mouseover)
        .jssora05l.jssora05ldn      (mousedown)
        .jssora05r.jssora05rdn      (mousedown)
        */
        .jssora05l, .jssora05r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 40px;
            cursor: pointer;
            background: url('img/a17.png') no-repeat;
            overflow: hidden;
        }
        .jssora05l { background-position: -10px -40px; }
        .jssora05r { background-position: -70px -40px; }
        .jssora05l:hover { background-position: -130px -40px; }
        .jssora05r:hover { background-position: -190px -40px; }
        .jssora05l.jssora05ldn { background-position: -250px -40px; }
        .jssora05r.jssora05rdn { background-position: -310px -40px; }

        /* jssor slider thumbnail navigator skin 01 css */
        /*
        .jssort01 .p            (normal)
        .jssort01 .p:hover      (normal mouseover)
        .jssort01 .p.pav        (active)
        .jssort01 .p.pdn        (mousedown)
        */
        .jssort01 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 72px;
            height: 72px;
        }
        
        .jssort01 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .jssort01 .w {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
        }
        
        .jssort01 .c {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
            box-sizing: content-box;
            background: url('img/t01.png') -800px -800px no-repeat;
            _background: none;
        }
        
        .jssort01 .pav .c {
            top: 2px;
            _top: 0px;
            left: 2px;
            _left: 0px;
            width: 68px;
            height: 68px;
            border: #000 0px solid;
            _border: #fff 2px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p:hover .c {
            top: 0px;
            left: 0px;
            width: 70px;
            height: 70px;
            border: #fff 1px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p.pdn .c {
            background-position: 50% 50%;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
        }
        
        * html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
            /* ie quirks mode adjust */
            width /**/: 72px;
            height /**/: 72px;
        }
        
    </style>
	
	
	<link href="src/easy-responsive-tabs.css" rel="stylesheet" type="text/css">
	
	<!-- Section Title-->    
	<div class="section-title-01">
		<!-- Parallax Background -->
		<div class="bg_parallax image_01_parallax"></div>
		<!-- Parallax Background -->

		<!-- Content Parallax-->
		<div class="opacy_bg_02">
			 <div class="container">
				<h1>Blog read</h1>
				<div class="crumbs">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li>/</li>
						<li>Features</li>  
						<li>/</li>
						<li>Blog read</li>                                       
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
		
		<!-- content info - Blog-->
		<div class="content_info">
			<div class="paddings-mini">
				<!-- content-->
				<div class="container">
					<div class="row">
						<div class="col-md-9 single-blog">
							<!-- Post Item Gallery-->
							<div class="post-item">
								<div class="row">
									<!-- Post Header-->
									<div class="col-md-12">
										<div class="post-header">
											<div class="post-format-icon post-format-standard">
												<i class="fa fa-image"></i>
											</div>
											<div class="post-info-wrap">
												<h2 class="post-title"><a href="#" title="Post Format: Standard" rel="bookmark">POST FORMAT: GALLERY</a></h2>
												<div class="post-meta" style="padding-top: 8px;">
													<ul>
														<li>
															<i class="fa fa-user"></i>
															<a href="#">User Name</a>
														</li>

														<li>
															<i class="fa fa-clock-o"></i>
															<span>April 23, 2015</span>
														</li>

														<li>
															<i class="fa fa-eye"></i>
															<span>234 Views</span>
														</li>
														
														<li>
															<span>Deal ID : 11554785514</span>
														</li>

													</ul>                      
												</div>
											</div>
										</div>
									</div>
									<!-- Post Header-->

									<!-- Post Media-->
									<div class="col-sm-12 col-xs-12">
										<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 900px; height: 356px; overflow: hidden; visibility: hidden; background-color: #24262e;">
											<!-- Loading Screen -->
											<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
												<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
												<div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
											</div>
											<div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 900px; height: 356px; overflow: hidden;">
												<div data-p="144.50" style="display: none;">
													<img data-u="image" src="img/01.jpg" />
													<img data-u="thumb" src="img/thumb-01.jpg" />
												</div>
												<div data-p="144.50" style="display: none;">
													<img data-u="image" src="img/02.jpg" />
													<img data-u="thumb" src="img/thumb-02.jpg" />
												</div>
												<div data-p="144.50" style="display: none;">
													<img data-u="image" src="img/03.jpg" />
													<img data-u="thumb" src="img/thumb-03.jpg" />
												</div>
												<div data-p="144.50" style="display: none;">
													<img data-u="image" src="img/04.jpg" />
													<img data-u="thumb" src="img/thumb-04.jpg" />
												</div>
												<div data-p="144.50" style="display: none;">
													<img data-u="image" src="img/05.jpg" />
													<img data-u="thumb" src="img/thumb-05.jpg" />
												</div>
												<div data-p="144.50" style="display: none;">
													<img data-u="image" src="img/06.jpg" />
													<img data-u="thumb" src="img/thumb-06.jpg" />
												</div>
												<div data-p="144.50" style="display: none;">
													<img data-u="image" src="img/07.jpg" />
													<img data-u="thumb" src="img/thumb-07.jpg" />
												</div>
												<div data-p="144.50" style="display: none;">
													<img data-u="image" src="img/08.jpg" />
													<img data-u="thumb" src="img/thumb-08.jpg" />
												</div>
												<div data-p="144.50" style="display: none;">
													<img data-u="image" src="img/09.jpg" />
													<img data-u="thumb" src="img/thumb-09.jpg" />
												</div>
												<div data-p="144.50" style="display: none;">
													<img data-u="image" src="img/10.jpg" />
													<img data-u="thumb" src="img/thumb-10.jpg" />
												</div>
												<div data-p="144.50" style="display: none;">
													<img data-u="image" src="img/11.jpg" />
													<img data-u="thumb" src="img/thumb-11.jpg" />
												</div>
												<div data-p="144.50" style="display: none;">
													<img data-u="image" src="img/12.jpg" />
													<img data-u="thumb" src="img/thumb-12.jpg" />
												</div>
											</div>
											<!-- Thumbnail Navigator -->
											<div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
												<!-- Thumbnail Item Skin Begin -->
												<div data-u="slides" style="cursor: default;">
													<div data-u="prototype" class="p">
														<div class="w">
															<div data-u="thumbnailtemplate" class="t"></div>
														</div>
														<div class="c"></div>
													</div>
												</div>
												<!-- Thumbnail Item Skin End -->
											</div>
											<!-- Arrow Navigator -->
											<span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
											<span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
										</div>
										<script>
											jssor_1_slider_init();
										</script>
									</div>
									<!-- Post Media-->

									<!-- Post Content-->
									<div class="col-md-12">
										<div class="post-content">
											<h3>HTML Ipsum Presents</h3>
   
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.</p>

										</div>                                          
									</div>
									<!-- Post Content-->
									
									<div class="col-md-12">
										<div id="parentHorizontalTab">
											<ul class="resp-tabs-list hor_1">
												<li>Description</li>
												<li>Comments</li>
												<li>Reviews</li>
												<li>Map View</li>
												<li>Market</li>
											</ul>
											<div class="resp-tabs-container hor_1">
												<div>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.</p>
												</div>
												<div>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.</p>
												</div>
												<div>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.</p>
												</div>
												<div>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.</p>
												</div>
												<div>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.</p>
												</div>
											</div>
										</div>
									</div>

									<!-- Post Footer-->
									<div class="col-md-12">
										<div class="post-footer">
											<!-- Post Social-->
											<ul class="post-social tooltip-hover">
												<li>
													<a href="#" class="social-facebook" data-toggle="tooltip" title="" data-original-title="Share on Facebook">
														<i class="fa fa-facebook"></i>
														<i class="fa fa-facebook"></i>
													</a>
												</li>

												<li>
													<a href="#" class="social-twitter" data-toggle="tooltip" title="" data-original-title="Share on Twitter">
														<i class="fa fa-twitter"></i>
														<i class="fa fa-twitter"></i>
													</a>
												</li>

												<li>
													<a href="#" class="social-google-plus" data-toggle="tooltip" title="" data-original-title="Share on Google">
														<i class="fa fa-google-plus"></i>
														<i class="fa fa-google-plus"></i>
													</a>
												</li>

												<li>
													<a href="#" class="social-pinterest" data-toggle="tooltip" title="" data-original-title="Share on pinterest">
														<i class="fa fa-pinterest"></i>
														<i class="fa fa-pinterest"></i>
													</a>
												</li>

												<li>
													<a href="#" class="social-linkedin" data-toggle="tooltip" title="" data-original-title="Share on linkedin">
														<i class="fa fa-linkedin"></i>
														<i class="fa fa-linkedin"></i>
													</a>
												</li>

												<li>
													<a href="#" class="social-email" data-toggle="tooltip" title="" data-original-title="Share on envelope">
														<i class="fa fa-envelope-o"></i>
														<i class="fa fa-envelope-o"></i>
													</a>
												</li>
											</ul>
											<!-- Post Social-->
										</div>
									</div>
									<!-- Post Footer-->
							   </div>
							</div>
							<!-- End Post Item Gallery-->

							<h4><i class="fa fa-comments"></i>Comments <a href="#">( 4 )</a></h4>

							<div class="info-testimonial">
							   <ul id="testimonials">
									<li>
										<p><i class="fa fa-quote-left"></i>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, est.<i class="fa fa-quote-right"></i></p>

										<div class="image-testimonials">
											<img src="img/testimonials/1.jpg" alt="">                        
										</div>   
										<h4>Jeniffer Martinez</h4>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									</li>

									<li>
										<p><i class="fa fa-quote-left"></i>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, est.<i class="fa fa-quote-right"></i></p>

										<div class="image-testimonials">
											<img src="img/testimonials/2.jpg" alt="">                        
										</div>   
										<h4>Jeniffer Martinez</h4>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									</li>
									
									<li>
										<p><i class="fa fa-quote-left"></i>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, est.<i class="fa fa-quote-right"></i></p>

										<div class="image-testimonials">
											<img src="img/testimonials/1.jpg" alt="">                        
										</div>   
										<h4>Jeniffer Martinez</h4>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									</li>
									
									<li>
										<p><i class="fa fa-quote-left"></i>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, est.<i class="fa fa-quote-right"></i></p>

										<div class="image-testimonials">
											<img src="img/testimonials/1.jpg" alt="">                        
										</div>   
										<h4>Jeniffer Martinez</h4>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									</li>
							   </ul>
							</div>

							<h4><i class="fa fa-pencil"></i>New Comment</h4>

							<form action="#" class="form-theme">
								<div class="row">
									<div class="form-group">
										<div class="col-md-6 form-theme">
											<label>Your name *</label>
											<input type="text" required="required" value="" placeholder="Please Enter Your Name" class="form-control" name="name">
										</div>
										<div class="col-md-6 form-theme">
											<label>Your email address *</label>
											<input type="email" required="required" value="" placeholder="Please Enter Your Email" class="form-control" name="email" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>Comment *</label>
											<textarea placeholder="Please Enter Your Comment" class="form-control" name="comment"  required="required"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="submit" value="Post Comment" class="btn btn-primary">
									</div>
								</div>
							</form>
						</div>
						
						<div class="col-md-3">
							<aside class="widget view_sidebar">
								<h3>Business Logo</h3>
								<img src="images/sliders0.jpg" class="img-responsive" alt="">
								<h3 class="top_10">Contact Details</h3>
								<ul class="list-styles">
									<li><i class="fa fa-user"></i> <a href="#">User Name</a></li>
									<li><i class="fa fa-map-marker "></i> <a href="#">Location</a></li>
									<li><i class="fa fa-envelope"></i> <a href="#">Sample.mail.com</a></li>
									<li><i class="fa fa-phone"></i> <a href="#">+91-8885458785</a></li>
								</ul>
								
								<center>
									<div class="amt_bg">
										<h3 style="color:white;padding-top:10px;">£1106</h3>
									</div>
									<a href="#"><img src="img/icons/chatnow.png" alt="" class="img-responsive"></a>
								</center>
							</aside>
							<!--<h4><i class="fa fa-pencil"></i> New Comment</h4>
							<form action="#" class="form-theme">
								<div class="row">
									<div class="form-group">
										<div class="col-sm-12 form-theme">
											<label>Your name *</label>
											<input type="text" required="required" value="" placeholder="Please Enter Your Name" class="form-control" name="name">
										</div>
										<div class="col-sm-12 form-theme">
											<label>Your email address *</label>
											<input type="email" required="required" value="" placeholder="Please Enter Your Email" class="form-control" name="email" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<div class="col-md-12">
											<label>Comment *</label>
											<textarea placeholder="Please Enter Your Comment" class="form-control" name="comment"  required="required"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input type="submit" value="Post Comment" class="btn btn-primary">
									</div>
								</div>
							</form>-->
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
		<!-- End Shadow Semiboxed -->
	<script src="js/jquery.js"></script> 
	<script src="src/jquery.easyResponsiveTabs.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function () {
		
			$('#parentHorizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				tabidentify: 'hor_1', // The tab groups identifier
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#nested-tabInfo');
					var $name = $('span', $info);
		
					$name.text($tab.text());
		
					$info.show();
				}
			});
		
			$('#ChildVerticalTab_1').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true,
				tabidentify: 'ver_1', // The tab groups identifier
				activetab_bg: '#fff', // background color for active tabs in this group
				inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
				active_border_color: '#c1c1c1', // border color for active tabs heads in this group
				active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
			});
		
		});
	</script>
			
           