	<title>Right Deals :: Converse</title>
	<style>
		.section-title-01{
			height: 273px;
			background-color: #262626;
			text-align: center;
			position: relative;
			width: 100%;
			overflow: hidden;
		}
	</style>
	<script>
		$(document).ready(function(){
			$(".remove1").click(function(){
				$("#div1").remove();
			});
		});
	</script>
	
	<link rel="stylesheet" href="j-folder/css/demo.css">
	<link rel="stylesheet" href="j-folder/css/font-awesome.min.css">
	<link rel="stylesheet" href="j-folder/css/j-forms.css">
	
	<!-- Section Title-->    
	<div class="section-title-01">
		<!-- Parallax Background -->
		<div class="bg_parallax image_01_parallax"></div>
	</div>   
	<!-- End Section Title-->
	
	<!--Content Central -->
	<section class="content-central">
		<!-- Shadow Semiboxed -->
		<div class="semiboxshadow text-center">
			<img src="img/img-theme/shp.png" class="img-responsive" alt="">
		</div>
		
		<div class="content_info">
                    <div class="paddings">
                        <div class="container">
                            <div class="row">
                                <!-- Item Table-->
                                <div class="col-sm-4">
                                    <div class="item-table">
                                        <div class="header-table color-red">
                                             <img src="img/icons/people.png">
                                            <h2>User Name</h2>
                                            <!--<span>$ 99 / per month</span> -->
                                        </div>
                                        <ul class="dashboard_tag">
											<li><img src="img/icons/admin.png"><a href='deals_administrator'>Deals Administrator</a></li>
											<li><img src="img/icons/conversation.png"><a href='converse'>Converse</a></li>
											<li><img src="img/icons/pickup.png"><a href='pickup_deals'>Pickup deals</a></li>
											<li><img src="img/icons/seaked.png"><a href='seeked_searches'>Seeked Searches</a></li>
											<li><img src="img/icons/updateprofile.png"> <a href='update_profile'>Update Profile</a></li>
										</ul>
										<a class="btn color-red" href="<?php echo base_url(); ?>login/logout">Logout</a>
									</div>
                                </div>
                                <!-- End Item Table-->

                                <!-- Item Table-->
                                <div class="col-sm-8">
									<div class="row">
										<div class="col-sm-12">
											<h2>Converse</h2>
											<label>Hi User Name, you have 0 Converse</label><hr>
										</div>
									</div>
										
									<div class="row">
										<div class="col-sm-8">
											<div class="panel panel-default">
												<div class="panel-heading"> 
													<h3 class="panel-title">Chat</h3> 
												</div> 
												<div class="panel-body"> 
													<div class="chat-conversation">
														<ul class="conversation-list nicescroll">
															<li class="clearfix">
																<div class="chat-avatar">
																	<img src="images/avatar-1.jpg" alt="male">
																	<i>10:00</i>
																</div>
																<div class="conversation-text">
																	<div class="ctext-wrap">
																		<i>John Deo</i>
																		<p>
																			Hello!
																		</p>
																	</div>
																</div>
															</li>
															<li class="clearfix odd">
																<div class="chat-avatar">
																	<img src="images/users/avatar-5.jpg" alt="Female">
																	<i>10:01</i>
																</div>
																<div class="conversation-text">
																	<div class="ctext-wrap">
																		<i>Smith</i>
																		<p>
																			Hi, How are you? What about our next meeting?
																		</p>
																	</div>
																</div>
															</li>
															<li class="clearfix">
																<div class="chat-avatar">
																	<img src="images/avatar-1.jpg" alt="male">
																	<i>10:01</i>
																</div>
																<div class="conversation-text">
																	<div class="ctext-wrap">
																		<i>John Deo</i>
																		<p>
																			Yeah everything is fine
																		</p>
																	</div>
																</div>
															</li>
															<li class="clearfix odd">
																<div class="chat-avatar">
																	<img src="images/users/avatar-5.jpg" alt="male">
																	<i>10:02</i>
																</div>
																<div class="conversation-text">
																	<div class="ctext-wrap">
																		<i>Smith</i>
																		<p>
																			Wow that's great
																		</p>
																	</div>
																</div>
															</li>
														</ul>
														<div class="row">
															<div class="col-sm-9 chat-inputbar">
																<input type="text" class="form-control chat-input" placeholder="Enter your text">
															</div>
															<div class="col-sm-3 chat-send">
																<button type="submit" class="btn btn-info btn-block waves-effect waves-light">Send</button>
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
	
	<!-- End Shadow Semiboxed -->
	<script src="js/jquery.js"></script> 
	
	
	<script src="j-folder/js/jquery.maskedinput.min.js"></script>
	<script src="j-folder/js/jquery.validate.min.js"></script>
	<script src="j-folder/js/additional-methods.min.js"></script>
	<script src="j-folder/js/jquery.form.min.js"></script>
	<script src="j-folder/js/j-forms.min.js"></script>
	<script src="j-folder/js/jquery-cloneya.min.js"></script>

        