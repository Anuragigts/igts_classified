 <!-- Section Title-->    
            <div class="section-title-01">
                <!-- Parallax Background -->
                <div class="bg_parallax image_02_parallax"></div>
                <!-- Parallax Background -->

                <!-- Content Parallax-->
                <div class="opacy_bg_02">
                    <div class="container">
                        <h1>Post a Deal</h1>
                        <div class="crumbs">
                            <ul>
                                <li><a href="index.php" class='home'>Home</a></li>
                                <li>/</li>
                                <li>Post a Deal</li>                                       
                            </ul>    
                        </div>
                    </div>  
                </div>  
                <!-- End Content Parallax--> 
            </div>   
            <!-- End Section Title-->
            <section class="content-central">
				<div class="content_info">
                    <div class="content_resalt paddings-mini tabs-detailed">
                        <div class="container wow fadeInUp">
                            <form method="post" class="" action="" id="postanad">
								<div class="row">
									<div class="col-md-10 col-md-offset-1 col-sm-12  col-xs-12  login_padd">
										<!-- Nav Tabs-->
										<ul class="nav nav-tabs" id="myTab">
										   <li class="active screen1">
												<a href="#one" data-toggle="tab"><i class="fa fa-home"></i> 1st Screen</a>
											</li>
											<li class='screen2'>
												<a href="#two" data-toggle="tab"><i class="fa fa-camera"></i> 2nd Screen</a>
											</li>
											<li class='screen3'>
												<a href="#three" data-toggle="tab"><i class="fa fa-check"></i>Packages</a>
											</li>
											<li class='screen4'>
												<a href="#four" data-toggle="tab"><i class="fa fa-check"></i>Contact</a>
											</li>
											<li class='screen5'>
												<a href="#five" data-toggle="tab"><i class="fa fa-check"></i>Terms & Conditions</a>
											</li>
										</ul>
										<!-- End Nav Tabs-->

										<div class="tab-content ">
											<!-- Tab One - Hotel -->
											<div class="tab-pane active" id="one">                                        
												<div class="row">
													<div class="col-sm-1"></div> 
													<div class="col-sm-10">
														<div class="row">
															<div class="col-sm-12 top_10"> 
																<label class="radio-inline ">
																	<input type="radio" class="bus_image" name="optradio" id="Business" value='b'> Business<sup class='text-red'>*</sup>
																</label>
																<label class="radio-inline">
																	<input type="radio" class="con_image" name="optradio" id="Consumer" value='c'> Consumer<sup class='text-red'>*</sup>
																	<span class="postad_error">Select The type</span>
																</label>
															</div>
														</div>
														<div class="row">
															<div class="col-sm-6">
																<div class="row">
																	<div class="input form-theme bus_img" style="display:none;">
																		<div class="col-xs-4 top_10"><label for="business_logo" class="">BusinesLogo:</label></div>
																		<div class="col-xs-8"><input type="file" id="bus_img" name="bus_img" onchange="fileupload(this);" ></div>
																		<span id="lblError" style="color: red;"></span>
																	</div>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="col-sm-2">
																	<div class='img_hide' style='display: none;'>
																		 <img id="blah" src="#" />
																	</div>
																</div> 
															</div> 
														</div>
														<div class="row">
															<div class="col-sm-6">
																<div class="input form-theme">
																	<label for="postal_code">PostalCode<sup class='text-red'>*</sup> :</label>
																	<input type="text" id="postal_code" name="code" placeholder="Enter PostalCode" maxlength='6' >
																	<span class="postad_error">PostalCode is required</span>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="input form-theme">
																	<label for="postal_area">Area<sup class='text-red'>*</sup> :</label>
																	<input type="text" id="postal_area" name="area" placeholder="Enter Area" >
																	<span class="postad_error">Area is required</span>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12 text_center top_10">
																<div class="input clearfix">
																	<a href="#two" data-toggle="tab" id='check_file'>
																		<input type="button" id="frst_screen" name='frst_screen' class="btn btn-primary" value="Next Process">
																	</a>
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-1"></div> 
												</div>
											</div>
											<!-- end Tab One - Hotel -->

											<!-- Tab Two - Preferences -->
											<div class="tab-pane" id="two">
												<div class="row">
													<div class="col-sm-6">
														<div class="input form-theme">
															<label for="deal_tag">Deal Tag <sup class='text-red'>*</sup> :</label>
															<input type="text" id="deal_tag" name="deal_tag" placeholder="Enter Deal Tag" >
															<span class="postad_error">Deal Tag is required</span>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="input form-theme">
															<label for="deal_description">Deal Description <sup class='text-red'>*</sup> :</label>
															<textarea type="text" id="deal_description" name="deal_description" placeholder="Enter Deal Description" row="0"></textarea>
															<span class="postad_error">Deal Description is required</span>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6 top_10"> 
														<label for="family_race">Price <sup class='text-red'>*</sup> :</label></br>
														<label class="radio-inline">
															<input type="radio" name="currency" id="Pound" value='pound' checked /> £ ( Pound )
														</label>
														<label class="radio-inline">
															<input type="radio" name="currency" id="Euro" value='euro' /> € ( Euro )
														</label>
													</div>
													<div class="col-sm-6">
														<div class="input form-theme">
															<label for="family_race">Family Race <sup class='text-red'>*</sup> :</label>
															<input type="text" id="family_race" name="family_race" placeholder="Enter Family Race" >
															<span class="postad_error">Family Race is required</span>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6">
														<div class="input form-theme">
															<label for="type">Type <sup class='text-red'>*</sup> :</label>
															<input type="text" id="type" name="type" placeholder="Enter Type" >
															<span class="postad_error">Type is required</span>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="input form-theme">
															<label for="age">Age <sup class='text-red'>*</sup> :</label>
															<select class="form-control" id="sel1">
																<option value=''>Select Age</option>
																<option value='0-3'>0 to 3 Months</option>
																<option value='3-6'>3 to 6 Months</option>
																<option value='6-9'>6 to 9 Months</option>
																<option value='9-12'>9 to 12 Months</option>
																<option value='1-2'> 1 Year < 2 Years</option>
																<option value='2-3'> 2 Year < 3 Years</option>
																<option value='3-4'> 3 Year < 4 Years</option>
																<option value='4-5'> 4 Year < 5 Years</option>
															</select>
															<span class="postad_error">Age is required</span>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6">
														<div class="input form-theme">
															<label for="height">Height <sup class='text-red'>*</sup> :</label>
															<input type="text" id="height" name="height" placeholder="Enter Height" >
															<span class="postad_error">Height is required</span>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="input form-theme">
															<label for="gender">Gender <sup class='text-red'>*</sup> :</label>
															<input type="text" id="gender" name="gender" placeholder="Enter Gender" >
															<span class="postad_error">Gender is required</span>
														</div>
													</div>
												</div>
												<div class="row">
												<div class="col-md-6 text_center top_10">
													<div class="input clearfix">
														<a href="#one" data-toggle="tab">
														<input type="button" id="login" name='login' class="btn btn-primary" value="Back">
													</a>
													</div>
												</div>
												<div class="col-md-6 text_center top_10">
													<div class="input clearfix">
														<a href="#three" data-toggle="tab" id='deal_form'>
														<input type="button" id="login" name='login' class="btn btn-primary" value="Next Process">
													</a>
													</div>
												</div>
											</div>
											</div>
											<!-- end Tab Two - Preferences -->

											<!-- Tab Theree - faq -->
											<div class="tab-pane" id="three">
												<div class="row">
													<div class="col-sm-4 col-xs-12">
														<!-- promotion-box-->
														<div class="promotion-box">
															<div class="promotion-box-center color-2">
																<div class="prince">
																	Free
																</div>
															</div>
															<!-- End promotion-box-center-->

															<!-- promotion-box-info-->
															<div class="promotion-box-info">
																<ul class="list-styles">
																	<li><i class="fa fa-arrow-right"></i> 3-5 Images Upload</li>
																	<li><i class="fa fa-arrow-right"></i> No Video</li>
																	<li><i class="fa fa-arrow-right"></i> No Visibility</li>
																	<li><i class="fa fa-arrow-right"></i> No Website link</li>
																</ul>
																<div class="custom-checkbox text_center pad_bottm">
																	<input type="checkbox" id="free_check" name='free_check' value='1' class="free_check checkbox-input" onclick='check()'>
																	<label for="withoutlogin_remember">is Urgent</label>
																</div>
																<ul class="list-styles free_hide" style="display:none;">
																	<li><i class="fa fa-arrow-right"></i> 9 Images</li>
																	<li><i class="fa fa-arrow-right"></i> Video Link</li>
																	<li><i class="fa fa-arrow-right"></i> Website link</li>
																</ul>
																<a href="#four" data-toggle="tab" class="btn btn-primary select_package">Select Package</a>
															</div>
															
															<!-- End promotion-box-info-->
														</div>
														<!-- End promotion-box-->
													</div>

													<div class="col-sm-4 col-xs-12">
														<!-- promotion-box-->
														<div class="promotion-box">
															<div class="promotion-box-center color-1">
																<div class="prince">
																	Gold
																</div>
															</div>
															<!-- End promotion-box-center-->

															<!-- promotion-box-info-->
															<div class="promotion-box-info">
																<ul class="list-styles">
																	<li><i class="fa fa-arrow-right"></i> Upload 9 Images</li>
																	<li><i class="fa fa-arrow-right"></i> Video link</li>
																	<li><i class="fa fa-arrow-right"></i> More Visibility</li>
																	<li><i class="fa fa-arrow-right"></i> Website link</li>
																</ul>
																<div class="custom-checkbox fl text_center pad_bottm">
																	<input type="checkbox" id="gold_check" name='gold_check' class="gold_check checkbox-input" >
																	<label for="gold_check">is Urgent</label>
																</div>
																<ul class="list-styles gold_hide" style="display:none;">
																	<li><i class="fa fa-arrow-right"></i> 12 Images</li>
																</ul>
																<a href="#four" data-toggle="tab" class="btn btn-primary select_package">Select Package</a>
															</div>
															
															<!-- End promotion-box-info-->
														</div>
														<!-- End promotion-box-->
													</div>
													
													<div class="col-sm-4 col-xs-12">
														<!-- promotion-box-->
														<div class="promotion-box">
															<div class="promotion-box-center color-3">
																<div class="prince">
																	Platinum
																</div>
															</div>
															<!-- End promotion-box-center-->

															<!-- promotion-box-info-->
															<div class="promotion-box-info">
																<ul class="list-styles">
																	<li><i class="fa fa-arrow-right"></i> Upload 15 Images</li>
																	<li><i class="fa fa-arrow-right"></i> Video Upload</li>
																	<li><i class="fa fa-arrow-right"></i> Top Visibility</li>
																	<li><i class="fa fa-arrow-right"></i> Website link</li>
																	<li><i class="fa fa-arrow-right"></i> Marquee Title</li>
																</ul>
																<a href="#four" data-toggle="tab" class="btn btn-primary select_package">Select Package</a>
															</div>
															
															<!-- End promotion-box-info-->
														</div>
														<!-- End promotion-box-->
													</div>
												</div>
											</div>
											<!-- Tend ab Theree - faq -->
											
											<div class="tab-pane " id="four">                                        
												<div class="row">
													<div class="col-sm-6" id='business_form'> 
														<div class="input form-theme ">
															<label for="bus_name">Business Name <sup class='text-red'>*</sup> :</label>
															<input type="text" id="bus_name" class="" name="bus_name" placeholder="Enter Business Name">
															<span class="postad_error">Business Name is required</span>
														</div>
														<div class="input form-theme ">
															<label for="cnt_per_bus">Contact Person Name <sup class='text-red'>*</sup> :</label>
															<input type="text" id="cnt_per_bus" class="" name="cnt_per_bus" placeholder="Enter Contact Person Name">
															<span class="postad_error">Contact Person Name is required</span>
														</div>
														<div class="input form-theme ">
															<label for="mbl_no_bus">Mobile Number <sup class='text-red'>*</sup> :</label>
															<input type="text" id="mbl_no_bus" class="" name="mbl_no_bus" placeholder="Enter Mobile Number" maxlength='10'>
															<span class="postad_error">Mobile Number is required</span>
														</div>
														<div class="input form-theme">
															<label for="email_id_bus">Email Id <sup class='text-red'>*</sup> :</label>
															<input type="email" id="email_id_bus" name="email_id_bus" placeholder="Enter Email" >
															<span class="postad_error">Email Id is required</span>
														</div>
													</div>
													<div class="col-sm-6" id='consumer_form'>
														<div class="input form-theme ">
															<label for="cnt_per_consu">Contact Name <sup class='text-red'>*</sup> :</label>
															<input type="text" id="cnt_per_consu" class="" name="cnt_per_consu" placeholder="Enter Contact Person Name">
															<span class="postad_error">Contact Name is required</span>
														</div>
														<div class="input form-theme ">
															<label for="mbl_no_cons">Mobile Number <sup class='text-red'>*</sup> :</label>
															<input type="text" id="mbl_no_cons" class="" name="mbl_no_cons" placeholder="Enter Mobile Number" maxlength='10'>
															<span class="postad_error">Mobile Number is required</span>
														</div>
														<div class="input form-theme">
															<label for="email_id_consu">Email Id <sup class='text-red'>*</sup> :</label>
															<input type="email" id="email_id_consu" name="email_id_consu" placeholder="Enter Email" >
															<span class="postad_error">Email Id is required</span>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6 text_center top_10">
														<div class="input clearfix">
															<input type='hidden' name='type_ads' id='type_ads' value='' />
															<input type="submit" id="contact_screen" name='contact_screen' class="btn btn-primary" value="Next Process">
														</div>
													</div>
												</div>
											</div>
											
											<div class="tab-pane " id="five">                                        
												<div class="row">
													<div class="col-sm-6 top_10"> 
													
													</div>
												</div>
											</div>
										</div>  
									</div>                 
								</div>
							</form>
                        </div>
                    </div>
				</div>

				</section>

				<script src="js/jquery.js"></script> 
			</section>
