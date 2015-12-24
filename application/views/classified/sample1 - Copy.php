	<script>
        jssor_1_slider_init = function() {
            
            var jssor_1_options = {
              $AutoPlay: true,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 9,
                $SpacingX: 3,
                $SpacingY: 3,
                $Align: 260
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 600);
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
	<link href="src/easy-responsive-tabs.css" rel="stylesheet" type="text/css">
	<style>
        
        /* jssor slider arrow navigator skin 02 css */
        /*
        .jssora02l                  (normal)
        .jssora02r                  (normal)
        .jssora02l:hover            (normal mouseover)
        .jssora02r:hover            (normal mouseover)
        .jssora02l.jssora02ldn      (mousedown)
        .jssora02r.jssora02rdn      (mousedown)
        */
        .jssora02l, .jssora02r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 55px;
            height: 55px;
            cursor: pointer;
            background: url('img/blog/a02.png') no-repeat;
            overflow: hidden;
        }
        .jssora02l { background-position: -3px -33px; }
        .jssora02r { background-position: -63px -33px; }
        .jssora02l:hover { background-position: -123px -33px; }
        .jssora02r:hover { background-position: -183px -33px; }
        .jssora02l.jssora02ldn { background-position: -3px -33px; }
        .jssora02r.jssora02rdn { background-position: -63px -33px; }

        /* jssor slider thumbnail navigator skin 03 css */
        /*
        .jssort03 .p            (normal)
        .jssort03 .p:hover      (normal mouseover)
        .jssort03 .pav          (active)
        .jssort03 .pdn          (mousedown)
        */
        
        .jssort03 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 62px;
            height: 32px;
        }
        
        .jssort03 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .jssort03 .w, .jssort03 .pav:hover .w {
            position: absolute;
            width: 60px;
            height: 30px;
            border: white 1px dashed;
            box-sizing: content-box;
        }
        
        .jssort03 .pdn .w, .jssort03 .pav .w {
            border-style: solid;
        }
        
        .jssort03 .c {
            position: absolute;
            top: 0;
            left: 0;
            width: 62px;
            height: 32px;
            background-color: #000;
        
            filter: alpha(opacity=45);
            opacity: .45;
            transition: opacity .6s;
            -moz-transition: opacity .6s;
            -webkit-transition: opacity .6s;
            -o-transition: opacity .6s;
        }
        
        .jssort03 .p:hover .c, .jssort03 .pav .c {
            filter: alpha(opacity=0);
            opacity: 0;
        }
        
        .jssort03 .p:hover .c {
            transition: none;
            -moz-transition: none;
            -webkit-transition: none;
            -o-transition: none;
        }
        
        * html .jssort03 .w {
            width /**/: 62px;
            height /**/: 32px;
        }
		#jssor_1{
			width:748px !important;
		}
		
    </style>
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
						<li>Templates</li>  
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
						<div class="col-md-8 single-blog">
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
												<div class="post-meta">
													<ul>
														<li>
															<i class="fa fa-user"></i>
															<a href="#">Iwthemes</a>
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
															<a href="#" title="Like">
																<i class="fa fa-heart-o"></i>
															</a>
														</li>

														<li>
															<i class="fa fa-comments"></i>
															<a href="#" title="Comment on Post Format: Standard">Leave a comment
															</a>
														</li>
													</ul>                      
												</div>
											</div>
										</div>
									</div>
									<!-- Post Header-->

									<!-- Post Media-->
									<div class="col-sm-12 col-xs-12">
										<!-- Single Carousel-->
										<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
											<!-- Loading Screen -->
											<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
												<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
												<div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
											</div>
											<div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
												<div data-p="112.50" style="display: none;">
													<img data-u="image" src="img/blog/002.jpg" />
													<img data-u="thumb" src="img/blog/thumb-002.jpg" />
												</div>
												<div data-p="112.50" style="display: none;">
													<img data-u="image" src="img/blog/003.jpg" />
													<img data-u="thumb" src="img/blog/thumb-003.jpg" />
												</div>
												<div data-p="112.50" style="display: none;">
													<img data-u="image" src="img/blog/004.jpg" />
													<img data-u="thumb" src="img/blog/thumb-004.jpg" />
												</div>
												<div data-p="112.50" style="display: none;">
													<img data-u="image" src="img/blog/005.jpg" />
													<img data-u="thumb" src="img/blog/thumb-005.jpg" />
												</div>
												<div data-p="112.50" style="display: none;">
													<img data-u="image" src="img/blog/006.jpg" />
													<img data-u="thumb" src="img/blog/thumb-006.jpg" />
												</div>
											</div>
											<!-- Thumbnail Navigator -->
											<div u="thumbnavigator" class="jssort03" style="position:absolute;left:0px;bottom:0px;width:600px;height:60px;" data-autocenter="1">
												<div style="position: absolute; top: 0; left: 0; width: 100%; height:100%; background-color: #000; filter:alpha(opacity=30.0); opacity:0.3;"></div>
												<!-- Thumbnail Item Skin Begin -->
												<div u="slides" style="cursor: default;">
													<div u="prototype" class="p">
														<div class="w">
															<div u="thumbnailtemplate" class="t"></div>
														</div>
														<div class="c"></div>
													</div>
												</div>
												<!-- Thumbnail Item Skin End -->
											</div>
											<!-- Arrow Navigator -->
											<span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
											<span data-u="arrowright" class="jssora02r" style="top:0px;right:30px;width:55px;height:55px;" data-autocenter="2"></span>
										</div>
										<!-- End Single Carousel-->
									</div>
									<!-- Post Media-->

									<!-- Post Content-->
									<div class="col-md-12">
										<div class="post-content">
											<h3>HTML Ipsum Presents</h3>
   
											<p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. in turpis pulvinar facilisis. Ut felis.</p>

										</div>                                          
									</div>
									<!-- Post Content-->
									
									<div class="col-md-12">
										<div id="parentHorizontalTab">
											<ul class="resp-tabs-list hor_1">
												<li>Description</li>
												<li>Comments</li>
												<li>Reviews</li>
												<li>Floorplans</li>
												<li>Market</li>
											</ul>
											<div class="resp-tabs-container hor_1">
												<div>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.</p>
												</div>
												<div>
													<p>
														<div id="ChildVerticalTab_1">
															<ul class="resp-tabs-list ver_1">
																<li>Free</li>
																<li>Gold</li>
																<li>Platinum</li>
															</ul>
															<div class="resp-tabs-container ver_1">
																<div>
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nibh urna, euismod ut ornare non, volutpat vel tortor. Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravida mollis.</p>
																</div>
																<div>
																	<p>This tab has icon in it.</p>
																</div>
																<div>
																	<p>Suspendisse blandit velit Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis Integer laoreet placerat suscipit. Sed sodales scelerisque commodo. Nam porta cursus lectus. Proin nunc erat, gravida a facilisis quis, ornare id lectus. Proin consectetur nibh quis urna gravid urna gravid eget erat suscipit in malesuada odio venenatis.</p>
																</div>
															</div>
														</div>
													</p>
													<p>Default Tab Content </p>
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
			
           