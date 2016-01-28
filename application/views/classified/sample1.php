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
		
	<link rel="stylesheet" href="j-folder/css/demo.css">
	<link rel="stylesheet" href="j-folder/css/font-awesome.min.css">
	<link rel="stylesheet" href="j-folder/css/j-forms.css">
	
	<!-- Section Title-->    
	<div class="section-title-01">
		<!-- Parallax Background -->
		<div class="bg_parallax image_01_parallax"></div>
		<!-- Parallax Background -->
	</div>   
	<!-- End Section Title-->
	
	<!--Content Central -->
	<section class="content-central">
		<!-- Shadow Semiboxed -->
		<div class="semiboxshadow text-center">
			<img src="img/img-theme/shp.png" class="img-responsive" alt="">
		</div>
		
		<!-- content info - Blog-->
		<div class="content_info" style="background-color: rgb(244, 244, 244);">
			<div class="paddings-mini">
				<!-- content-->
				<div class="container">
					<div class="row">
						<div class="wrapper wrapper-640">

							<form action="" method="post" class="j-forms j-multistep tooltip-hover" id="j-forms" enctype="multipart/form-data" novalidate>

								<div class="header">
									<p>Post a deal</p>
								</div>
								 <!--end /.header-->

								<div class="content">
									<!-- start steps -->
									<div class="j-row">
										<div class="span2 step">
											<div class="steps">
												<span>Step 1:</span>
												<p>1st Screen</p>
											</div>
										</div>
										<div class="span2 step">
											<div class="steps">
												<span>Step 2:</span>
												<p>2nd Screen</p>
											</div>
										</div>
										<div class="span2 step">
											<div class="steps">
												<span>Step 3:</span>
												<p>Packages</p>
											</div>
										</div>
										<div class="span3 step">
											<div class="steps">
												<span>Step 4:</span>
												<p>Contact Details</p>
											</div>
										</div>
										<div class="span3 step">
											<div class="steps">
												<span>Step 5:</span>
												<p>Terms & Conditions</p>
											</div>
										</div>
									</div>
									<!-- end steps -->

									<fieldset>

										<div class="divider gap-bottom-25"></div>
										<h3>Motor Point Category Application _Motor Bikes and Scooters</h3>
										
										<div class="j-row">
											<div class="span12 unit">
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_motbike" id="next-step-radio" value="Yes">
															<i></i>Seller
															<sup data-toggle="tooltip" title="" data-original-title="Seller">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="No">
															<i></i>Needed
															<sup data-toggle="tooltip" title="" data-original-title="Needed">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="No">
															<i></i>For Hire
															<sup data-toggle="tooltip" title="" data-original-title="For Hire">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
													</div>
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Deal Tag 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Tag ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="dealtag">
														<img src="j-folder/img/dealtag.png" alt="Dealtag" title="Dealtag Icon" class="img-responsive">
													</label>
													<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Deal Description 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Description ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<textarea type="text" id="dealdescription" name="dealdescription" placeholder="Enter Deal Description"></textarea>
												</div>
											</div><!-- end Deal Description -->
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Price 
													<sup data-toggle="tooltip" title="" data-original-title="Price">
														<img src="img/icons/i.png">
													</sup>
												</label>
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_toggle1" id="next-step-radio" value="Pound">
															<i></i> £ (Pound) 
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_toggle1"  value="Euro">
															<i></i> € (Euro)
														</label>
													</div>
												</div>
											</div>
											<div class="span6 unit">
												<div class="j-row">
													<div class="span6 unit top_20">
														<div class="input">
															<label class="icon-right" for="priceamount">
																<img src="j-folder/img/price.png">
															</label>
															<input type="text" id="priceamount" name="priceamount" placeholder="Enter Amount" onkeypress="return isNumber(event)">
														</div>
													</div>
													<div class="span6 unit"><!-- start Deal Tag -->
														<label class="label">Price Type 
															<sup data-toggle="tooltip" title="" data-original-title="Price Type ">
																<img src="img/icons/i.png">
															</sup>
														</label>
														<label class="input select">
															<select name="price_type">
																<option value="none" selected disabled="">Select type</option>
																<option value="Negotiable">Negotiable</option>
																<option value="Fixed">Fixed</option>
															</select>
															<i></i>
														</label>
													</div>
												</div><!-- end service -->
											
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Vehicle Registration  Number 
													<sup data-toggle="tooltip" title="" data-original-title="Vehicle Registration  Number ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="veh_regno">
														<img src="j-folder/img/regno.png" alt="regno" title="Reg No Icon" class="img-responsive">
													<label class="icon-right" for="screensize">
														<img src="j-folder/img/screensize.png" alt="Screen" title="Screen Icon">
													</label>
													<input type="text" id="veh_regno" name="veh_regno" placeholder="Enter Vehicle Registration  Number ">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Manufacture 
													<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="manufacture">
														<img src="j-folder/img/manufacture.png" alt="manufacture" title="manufacture Icon" class="img-responsive">
													</label>
													<input type="text" id="manufacture" name="manufacture" placeholder="Enter Manufacture">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Model 
													<sup data-toggle="tooltip" title="" data-original-title="Model ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="Model">
														<option value="none" selected disabled="">Select Model</option>
														<option value="">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Bike Type 
													<sup data-toggle="tooltip" title="" data-original-title="Type ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="Type">
														<option value="none" selected disabled="">Select Type</option>
														<option value="">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Color
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Registration Year
													<sup data-toggle="tooltip" title="" data-original-title="Registration Year">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="reg_year">
														<img src="j-folder/img/reg.png" alt="Reg" title="Reg Icon" class="img-responsive">
													</label>
													<input type="text" id="reg_year" name="reg_year" placeholder="Enter Registration Year">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Fuel Type  
													<sup data-toggle="tooltip" title="" data-original-title="Fuel Type">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="FuelType">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">No of Miles Covered 
													<sup data-toggle="tooltip" title="" data-original-title="No of Miles Covered ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="No of Miles Covered ">
														<img src="j-folder/img/miles.png" alt="Miles" title="Miles Icon" class="img-responsive">
													</label>
													<input type="text" id="tot_miles" name="tot_miles" placeholder="Enter No of Miles Covered">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Engine Size 
													<sup data-toggle="tooltip" title="" data-original-title="Engine Size ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Engine Sise">
														<img src="j-folder/img/engsize.png" alt="Miles" title="Engine Icon" class="img-responsive">
													</label>
													<input type="text" id="eng_size" name="eng_size" placeholder="Enter Engine Size ">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Road TAX status  
													<sup data-toggle="tooltip" title="" data-original-title="Road TAX status ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="road_tax">
														<img src="j-folder/img/roadtax.png" alt="Road TAX" title="Road TAX Icon" class="img-responsive">
													</label>
													<input type="text" id="road_tax" name="road_tax" placeholder="Enter Road TAX status ">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Condition 
													<sup data-toggle="tooltip" title="" data-original-title="Condition">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="Condition">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										
										<h3>Motor Point Category Application _Boats</h3>
										
										<div class="j-row">
											<div class="span12 unit">
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_motbike" id="next-step-radio" value="Yes">
															<i></i>Seller
															<sup data-toggle="tooltip" title="" data-original-title="Seller">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="No">
															<i></i>Needed
															<sup data-toggle="tooltip" title="" data-original-title="Needed">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="No">
															<i></i>For Hire
															<sup data-toggle="tooltip" title="" data-original-title="For Hire">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
													</div>
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Deal Tag 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Tag ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="dealtag">
														<img src="j-folder/img/dealtag.png" alt="Dealtag" title="Dealtag Icon" class="img-responsive">
													</label>
													<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Deal Description 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Description ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<textarea type="text" id="dealdescription" name="dealdescription" placeholder="Enter Deal Description"></textarea>
												</div>
											</div><!-- end Deal Description -->
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Price 
													<sup data-toggle="tooltip" title="" data-original-title="Price">
														<img src="img/icons/i.png">
													</sup>
												</label>
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_toggle1" id="next-step-radio" value="Pound">
															<i></i> £ (Pound) 
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_toggle1"  value="Euro">
															<i></i> € (Euro)
														</label>
													</div>
												</div>
											</div>
											<div class="span6 unit">
												<div class="j-row">
													<div class="span6 unit top_20">
														<div class="input">
															<label class="icon-right" for="priceamount">
																<img src="j-folder/img/price.png">
															</label>
															<input type="text" id="priceamount" name="priceamount" placeholder="Enter Amount" onkeypress="return isNumber(event)">
														</div>
													</div>
													<div class="span6 unit"><!-- start Deal Tag -->
														<label class="label">Price Type 
															<sup data-toggle="tooltip" title="" data-original-title="Price Type ">
																<img src="img/icons/i.png">
															</sup>
														</label>
														<label class="input select">
															<select name="price_type">
																<option value="none" selected disabled="">Select type</option>
																<option value="Negotiable">Negotiable</option>
																<option value="Fixed">Fixed</option>
															</select>
															<i></i>
														</label>
													</div>
												</div><!-- end service -->
											
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Manufacture 
													<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="manufacture">
														<img src="j-folder/img/manufacture.png" alt="manufacture" title="manufacture Icon" class="img-responsive">
													</label>
													<input type="text" id="manufacture" name="manufacture" placeholder="Enter Manufacture">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Year
													<sup data-toggle="tooltip" title="" data-original-title="Year">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="year_boat">
														<img src="j-folder/img/reg.png" alt="year" title="year Icon" class="img-responsive">
													</label>
													<input type="text" id="year_boat" name="year_boat" placeholder="Enter Year">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Model 
													<sup data-toggle="tooltip" title="" data-original-title="Model ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="Model">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Boats Type 
													<sup data-toggle="tooltip" title="" data-original-title="Boats Type ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="type">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Color
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Fuel Type  
													<sup data-toggle="tooltip" title="" data-original-title="Fuel Type">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="FuelType">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Condition 
													<sup data-toggle="tooltip" title="" data-original-title="Condition">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="Condition">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										
										<h3>Motor Point Category Application _Campervans and Motor homes</h3>
										
										<div class="j-row">
											<div class="span12 unit">
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_motbike" id="next-step-radio" value="Yes">
															<i></i>Seller
															<sup data-toggle="tooltip" title="" data-original-title="Seller">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="No">
															<i></i>Needed
															<sup data-toggle="tooltip" title="" data-original-title="Needed">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="No">
															<i></i>For Hire
															<sup data-toggle="tooltip" title="" data-original-title="For Hire">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
													</div>
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Deal Tag 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Tag ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="dealtag">
														<img src="j-folder/img/dealtag.png" alt="Dealtag" title="Dealtag Icon" class="img-responsive">
													</label>
													<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Deal Description 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Description ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<textarea type="text" id="dealdescription" name="dealdescription" placeholder="Enter Deal Description"></textarea>
												</div>
											</div><!-- end Deal Description -->
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Price 
													<sup data-toggle="tooltip" title="" data-original-title="Price">
														<img src="img/icons/i.png">
													</sup>
												</label>
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_toggle1" id="next-step-radio" value="Pound">
															<i></i> £ (Pound) 
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_toggle1"  value="Euro">
															<i></i> € (Euro)
														</label>
													</div>
												</div>
											</div>
											<div class="span6 unit">
												<div class="j-row">
													<div class="span6 unit top_20">
														<div class="input">
															<label class="icon-right" for="priceamount">
																<img src="j-folder/img/price.png">
															</label>
															<input type="text" id="priceamount" name="priceamount" placeholder="Enter Amount" onkeypress="return isNumber(event)">
														</div>
													</div>
													<div class="span6 unit"><!-- start Deal Tag -->
														<label class="label">Price Type 
															<sup data-toggle="tooltip" title="" data-original-title="Price Type ">
																<img src="img/icons/i.png">
															</sup>
														</label>
														<label class="input select">
															<select name="price_type">
																<option value="none" selected disabled="">Select type</option>
																<option value="Negotiable">Negotiable</option>
																<option value="Fixed">Fixed</option>
															</select>
															<i></i>
														</label>
													</div>
												</div><!-- end service -->
											
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Vehicle Registration  Number 
													<sup data-toggle="tooltip" title="" data-original-title="Vehicle Registration  Number ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="veh_regno">
														<img src="j-folder/img/regno.png" alt="regno" title="Reg No Icon" class="img-responsive">
													</label>
													<input type="text" id="veh_regno" name="veh_regno" placeholder="Enter Vehicle Registration  Number ">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Manufacture 
													<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="manufacture">
														<img src="j-folder/img/manufacture.png" alt="manufacture" title="manufacture Icon" class="img-responsive">
													</label>
													<input type="text" id="manufacture" name="manufacture" placeholder="Enter Manufacture">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Model 
													<sup data-toggle="tooltip" title="" data-original-title="Model ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="Model">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Type 
													<sup data-toggle="tooltip" title="" data-original-title="Boats Type ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="type">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Color
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Registration Year
													<sup data-toggle="tooltip" title="" data-original-title="Registration Year">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="reg_year">
														<img src="j-folder/img/reg.png" alt="Reg" title="Reg Icon" class="img-responsive">
													</label>
													<input type="text" id="reg_year" name="reg_year" placeholder="Enter Registration Year">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Fuel Type  
													<sup data-toggle="tooltip" title="" data-original-title="Fuel Type">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="FuelType">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Transmission   
													<sup data-toggle="tooltip" title="" data-original-title="Transmission ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="Transmission ">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Engine Size 
													<sup data-toggle="tooltip" title="" data-original-title="Engine Size ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Engine Sise">
														<img src="j-folder/img/engsize.png" alt="Miles" title="Engine Icon" class="img-responsive">
													</label>
													<input type="text" id="eng_size" name="eng_size" placeholder="Enter Engine Size ">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">No of Doors    
													<sup data-toggle="tooltip" title="" data-original-title="No of Doors  ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="NoofDoors  ">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">No of Seats    
													<sup data-toggle="tooltip" title="" data-original-title="No of Seats  ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="NoofSeats  ">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">No of Miles Covered 
													<sup data-toggle="tooltip" title="" data-original-title="No of Miles Covered ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="No of Miles Covered ">
														<img src="j-folder/img/miles.png" alt="Miles" title="Miles Icon" class="img-responsive">
													</label>
													<input type="text" id="tot_miles" name="tot_miles" placeholder="Enter No of Miles Covered">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">MOT Status 
													<sup data-toggle="tooltip" title="" data-original-title="MOT Status ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="MOT Status ">
														<img src="j-folder/img/status.png" alt="MOT Status" title="MOT Status Icon" class="img-responsive">
													</label>
													<input type="text" id="tot_miles" name="tot_miles" placeholder="Enter No of Miles Covered">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Road TAX status  
													<sup data-toggle="tooltip" title="" data-original-title="Road TAX status ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="road_tax">
														<img src="j-folder/img/roadtax.png" alt="Road TAX" title="Road TAX Icon" class="img-responsive">
													</label>
													<input type="text" id="road_tax" name="road_tax" placeholder="Enter Road TAX status ">
												</div>
											</div>
										</div>
										
										
										
										<h3>Motor Point Category Application _Caravans</h3>
										
										<div class="j-row">
											<div class="span12 unit">
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_motbike" id="next-step-radio" value="Yes">
															<i></i>Seller
															<sup data-toggle="tooltip" title="" data-original-title="Seller">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="No">
															<i></i>Needed
															<sup data-toggle="tooltip" title="" data-original-title="Needed">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="No">
															<i></i>For Hire
															<sup data-toggle="tooltip" title="" data-original-title="For Hire">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
													</div>
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Deal Tag 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Tag ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="dealtag">
														<img src="j-folder/img/dealtag.png" alt="Dealtag" title="Dealtag Icon" class="img-responsive">
													</label>
													<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Deal Description 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Description ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<textarea type="text" id="dealdescription" name="dealdescription" placeholder="Enter Deal Description"></textarea>
												</div>
											</div><!-- end Deal Description -->
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Price 
													<sup data-toggle="tooltip" title="" data-original-title="Price">
														<img src="img/icons/i.png">
													</sup>
												</label>
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_toggle1" id="next-step-radio" value="Pound">
															<i></i> £ (Pound) 
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_toggle1"  value="Euro">
															<i></i> € (Euro)
														</label>
													</div>
												</div>
											</div>
											<div class="span6 unit">
												<div class="j-row">
													<div class="span6 unit top_20">
														<div class="input">
															<label class="icon-right" for="priceamount">
																<img src="j-folder/img/price.png">
															</label>
															<input type="text" id="priceamount" name="priceamount" placeholder="Enter Amount" onkeypress="return isNumber(event)">
														</div>
													</div>
													<div class="span6 unit"><!-- start Deal Tag -->
														<label class="label">Price Type 
															<sup data-toggle="tooltip" title="" data-original-title="Price Type ">
																<img src="img/icons/i.png">
															</sup>
														</label>
														<label class="input select">
															<select name="price_type">
																<option value="none" selected disabled="">Select type</option>
																<option value="Negotiable">Negotiable</option>
																<option value="Fixed">Fixed</option>
															</select>
															<i></i>
														</label>
													</div>
												</div><!-- end service -->
											
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Manufacture 
													<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="manufacture">
														<img src="j-folder/img/manufacture.png" alt="manufacture" title="manufacture Icon" class="img-responsive">
													</label>
													<input type="text" id="manufacture" name="manufacture" placeholder="Enter Manufacture">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Model 
													<sup data-toggle="tooltip" title="" data-original-title="Model ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="Model">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Type 
													<sup data-toggle="tooltip" title="" data-original-title="Boats Type ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="type">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Registration Year
													<sup data-toggle="tooltip" title="" data-original-title="Registration Year">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="reg_year">
														<img src="j-folder/img/reg.png" alt="Reg" title="Reg Icon" class="img-responsive">
													</label>
													<input type="text" id="reg_year" name="reg_year" placeholder="Enter Registration Year">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Color
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">No of Doors    
													<sup data-toggle="tooltip" title="" data-original-title="No of Doors  ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="NoofDoors  ">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Condition 
													<sup data-toggle="tooltip" title="" data-original-title="Condition">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="Condition">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<h3>Motor Point Category Application _Cars</h3>
										
										<div class="j-row">
											<div class="span12 unit">
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_motbike" id="next-step-radio" value="Yes">
															<i></i>Seller
															<sup data-toggle="tooltip" title="" data-original-title="Seller">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="No">
															<i></i>Needed
															<sup data-toggle="tooltip" title="" data-original-title="Needed">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="No">
															<i></i>For Hire
															<sup data-toggle="tooltip" title="" data-original-title="For Hire">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
													</div>
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Deal Tag 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Tag ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="dealtag">
														<img src="j-folder/img/dealtag.png" alt="Dealtag" title="Dealtag Icon" class="img-responsive">
													</label>
													<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Deal Description 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Description ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<textarea type="text" id="dealdescription" name="dealdescription" placeholder="Enter Deal Description"></textarea>
												</div>
											</div><!-- end Deal Description -->
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Price 
													<sup data-toggle="tooltip" title="" data-original-title="Price">
														<img src="img/icons/i.png">
													</sup>
												</label>
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_toggle1" id="next-step-radio" value="Pound">
															<i></i> £ (Pound) 
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_toggle1"  value="Euro">
															<i></i> € (Euro)
														</label>
													</div>
												</div>
											</div>
											<div class="span6 unit">
												<div class="j-row">
													<div class="span6 unit top_20">
														<div class="input">
															<label class="icon-right" for="priceamount">
																<img src="j-folder/img/price.png">
															</label>
															<input type="text" id="priceamount" name="priceamount" placeholder="Enter Amount" onkeypress="return isNumber(event)">
														</div>
													</div>
													<div class="span6 unit"><!-- start Deal Tag -->
														<label class="label">Price Type 
															<sup data-toggle="tooltip" title="" data-original-title="Price Type ">
																<img src="img/icons/i.png">
															</sup>
														</label>
														<label class="input select">
															<select name="price_type">
																<option value="none" selected disabled="">Select type</option>
																<option value="Negotiable">Negotiable</option>
																<option value="Fixed">Fixed</option>
															</select>
															<i></i>
														</label>
													</div>
												</div><!-- end service -->
											
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Vehicle Registration  Number 
													<sup data-toggle="tooltip" title="" data-original-title="Vehicle Registration  Number ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="veh_regno">
														<img src="j-folder/img/regno.png" alt="regno" title="Reg No Icon" class="img-responsive">
													</label>
													<input type="text" id="veh_regno" name="veh_regno" placeholder="Enter Vehicle Registration  Number ">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Manufacture 
													<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="manufacture">
														<img src="j-folder/img/manufacture.png" alt="manufacture" title="manufacture Icon" class="img-responsive">
													</label>
													<input type="text" id="manufacture" name="manufacture" placeholder="Enter Manufacture">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Model 
													<sup data-toggle="tooltip" title="" data-original-title="Model ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="Model">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Type 
													<sup data-toggle="tooltip" title="" data-original-title="Boats Type ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="type">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Color
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Registration Year
													<sup data-toggle="tooltip" title="" data-original-title="Registration Year">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="reg_year">
														<img src="j-folder/img/reg.png" alt="Reg" title="Reg Icon" class="img-responsive">
													</label>
													<input type="text" id="reg_year" name="reg_year" placeholder="Enter Registration Year">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Fuel Type  
													<sup data-toggle="tooltip" title="" data-original-title="Fuel Type">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="FuelType">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Transmission   
													<sup data-toggle="tooltip" title="" data-original-title="Transmission ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="Transmission ">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Engine Size 
													<sup data-toggle="tooltip" title="" data-original-title="Engine Size ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Engine Sise">
														<img src="j-folder/img/engsize.png" alt="Miles" title="Engine Icon" class="img-responsive">
													</label>
													<input type="text" id="eng_size" name="eng_size" placeholder="Enter Engine Size ">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">No of Doors    
													<sup data-toggle="tooltip" title="" data-original-title="No of Doors  ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="NoofDoors  ">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">No of Seats    
													<sup data-toggle="tooltip" title="" data-original-title="No of Seats  ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="NoofSeats  ">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">No of Miles Covered 
													<sup data-toggle="tooltip" title="" data-original-title="No of Miles Covered ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="No of Miles Covered ">
														<img src="j-folder/img/miles.png" alt="Miles" title="Miles Icon" class="img-responsive">
													</label>
													<input type="text" id="tot_miles" name="tot_miles" placeholder="Enter No of Miles Covered">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">MOT Status 
													<sup data-toggle="tooltip" title="" data-original-title="MOT Status ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="MOT Status ">
														<img src="j-folder/img/status.png" alt="MOT Status" title="MOT Status Icon" class="img-responsive">
													</label>
													<input type="text" id="tot_miles" name="tot_miles" placeholder="Enter No of Miles Covered">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Road TAX status  
													<sup data-toggle="tooltip" title="" data-original-title="Road TAX status ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="road_tax">
														<img src="j-folder/img/roadtax.png" alt="Road TAX" title="Road TAX Icon" class="img-responsive">
													</label>
													<input type="text" id="road_tax" name="road_tax" placeholder="Enter Road TAX status ">
												</div>
											</div>
										</div>
										
										<h3>Motor Point Category Application _Motor Accessories</h3>
										
										<div class="j-row">
											<div class="span12 unit">
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_motbike" id="next-step-radio" value="Yes">
															<i></i>Seller
															<sup data-toggle="tooltip" title="" data-original-title="Seller">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="No">
															<i></i>Needed
															<sup data-toggle="tooltip" title="" data-original-title="Needed">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="No">
															<i></i>For Hire
															<sup data-toggle="tooltip" title="" data-original-title="For Hire">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
													</div>
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Deal Tag 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Tag ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="dealtag">
														<img src="j-folder/img/dealtag.png" alt="Dealtag" title="Dealtag Icon" class="img-responsive">
													</label>
													<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Deal Description 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Description ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<textarea type="text" id="dealdescription" name="dealdescription" placeholder="Enter Deal Description"></textarea>
												</div>
											</div><!-- end Deal Description -->
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Price 
													<sup data-toggle="tooltip" title="" data-original-title="Price">
														<img src="img/icons/i.png">
													</sup>
												</label>
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_toggle1" id="next-step-radio" value="Pound">
															<i></i> £ (Pound) 
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_toggle1"  value="Euro">
															<i></i> € (Euro)
														</label>
													</div>
												<div class="input">
													<label class="icon-right" for="screensize">
														<img src="j-folder/img/screensize.png" alt="Screen" title="Screen Icon">
													</label>
													<input type="text" id="screensize" name="screensize" placeholder="Enter Screen Size">
												</div>
											</div>
											<div class="span6 unit">
												<div class="j-row">
													<div class="span6 unit top_20">
														<div class="input">
															<label class="icon-right" for="priceamount">
																<img src="j-folder/img/price.png">
															</label>
															<input type="text" id="priceamount" name="priceamount" placeholder="Enter Amount" onkeypress="return isNumber(event)">
														</div>
													</div>
													<div class="span6 unit"><!-- start Deal Tag -->
														<label class="label">Price Type 
															<sup data-toggle="tooltip" title="" data-original-title="Price Type ">
																<img src="img/icons/i.png">
															</sup>
														</label>
														<label class="input select">
															<select name="price_type">
																<option value="none" selected disabled="">Select type</option>
																<option value="Negotiable">Negotiable</option>
																<option value="Fixed">Fixed</option>
															</select>
															<i></i>
														</label>
													</div>
												</div><!-- end service -->
											
												<label class="label">Weight
													<sup data-toggle="tooltip" title="" data-original-title="Weight">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Weight">
														<img src="j-folder/img/weight.png" alt="Weight" title="Weight Icon">
													</label>
													<input type="text" id="weight" name="weight" placeholder="Enter Weight">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">RAM
													<sup data-toggle="tooltip" title="" data-original-title="RAM">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="ram">
														<img src="j-folder/img/ram.png" alt="RAM" title="RAM Icon">
													</label>
													<input type="text" id="ram" name="ram" placeholder="Enter RAM">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Battery
													<sup data-toggle="tooltip" title="" data-original-title="Battery">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="batterybcup">
														<img src="j-folder/img/battery.png" alt="Battery" title="Battery Icon">
													</label>
													<input type="text" id="batterybcup" name="batterybcup" placeholder="Enter Battery Backup">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">HDD Capacity
													<sup data-toggle="tooltip" title="" data-original-title="HDD Capacity">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="memory">
														<img src="j-folder/img/ram.png" alt="Memory" title="Memory Icon">
													</label>
													<input type="text" id="memory" name="memory" placeholder="Enter HDD Capacity">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>All In One</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Operating System
													<sup data-toggle="tooltip" title="" data-original-title="Operating System">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Version">
														<img src="j-folder/img/opesys.png" alt="Version" title="Version Icon">
													</label>
													<input type="text" id="opersys" name="opersys" placeholder="Enter Operating System">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Manufacture 
													<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
												<label class="label">Screen Size 
													<sup data-toggle="tooltip" title="" data-original-title="Screen Size ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="screensize">
														<img src="j-folder/img/screensize.png" alt="Screen" title="Screen Icon">
													</label>
													<input type="text" id="screensize" name="screensize" placeholder="Enter Screen Size">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Weight
													<sup data-toggle="tooltip" title="" data-original-title="Weight">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="manufacture">
														<img src="j-folder/img/manufacture.png" alt="manufacture" title="manufacture Icon" class="img-responsive">
													</label>
													<input type="text" id="manufacture" name="manufacture" placeholder="Enter Manufacture">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Model 
													<sup data-toggle="tooltip" title="" data-original-title="Model ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="Model">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Type 
													<sup data-toggle="tooltip" title="" data-original-title="Boats Type ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="type">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Year
													<sup data-toggle="tooltip" title="" data-original-title="Registration Year">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="reg_year">
														<img src="j-folder/img/reg.png" alt="Reg" title="Reg Icon" class="img-responsive">
													</label>
													<input type="text" id="reg_year" name="reg_year" placeholder="Enter Registration Year">
												</div>
											</div>
										</div>
										
										<h3>Motor Point Category Application _Bus_Truks_Coatch_Vans</h3>
										
										<div class="j-row">
											<div class="span12 unit">
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_motbike" id="next-step-radio" value="Yes">
															<i></i>Seller
															<sup data-toggle="tooltip" title="" data-original-title="Seller">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="No">
															<i></i>Needed
															<sup data-toggle="tooltip" title="" data-original-title="Needed">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="No">
															<i></i>For Hire
															<sup data-toggle="tooltip" title="" data-original-title="For Hire">
																<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
															</sup>
														</label>
													</div>
												</div>
											</div>
										</div>
										<h3>Printers</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Print Speed Mono
													<sup data-toggle="tooltip" title="" data-original-title="Print Speed Mono">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="printspeedmono">
														<option value="none" selected disabled="">Select Print Speed Mono</option>
														<option value="">5PPM</option>
														<option value="">6PPM</option>
														<option value="">7PPM</option>
														<option value="">8PPM</option>
														<option value="">9PPM</option>
														<option value="">10PPM</option>
														<option value="">11PPM</option>
														<option value="">12PPM</option>
														<option value="">13PPM</option>
														<option value="">14PPM</option>
														<option value="">15PPM</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Weight
													<sup data-toggle="tooltip" title="" data-original-title="Weight">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Weight">
														<img src="j-folder/img/weight.png" alt="Weight" title="Weight Icon">
													</label>
													<input type="text" id="weight" name="weight" placeholder="Enter Weight">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Color 
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Wi-Fi Devices</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Wireless Speed
													<sup data-toggle="tooltip" title="" data-original-title="Wireless Speed">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="wirelesspeed">
														<option value="none" selected disabled="">Select Print Speed Mono</option>
														<option value="">100 Mbps</option>
														<option value="">150 Mbps</option>
														<option value="">200 Mbps</option>
														<option value="">250 Mbps</option>
														<option value="">300 Mbps</option>
														<option value="">350 Mbps</option>
														<option value="">400 Mbps</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Frequency
													<sup data-toggle="tooltip" title="" data-original-title="Frequency">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="frequency">
														<option value="none" selected disabled="">Select Frequency</option>
														<option value="">2.4835 GHz</option>
														<option value="">3.6 GHz</option>
														<option value="">4.9 GHz</option>
														<option value="">5 GHz</option>
														<option value="">5.9 GHz</option>
														<option value="">60 GHz</option>
														<option value="">900 MHz</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Network
													<sup data-toggle="tooltip" title="" data-original-title="Network">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="network">
														<option value="none" selected disabled="">Select Network</option>
														<option value="">2G Network</option>
														<option value="">3G Network</option>
														<option value="">4G Network	</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Number of LAN Ports
													<sup data-toggle="tooltip" title="" data-original-title="Number of LAN Ports">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="lanports">
														<option value="none" selected disabled="">Select LAN Ports</option>
														<option value="">2 Ports</option>
														<option value="">3 Ports</option>
														<option value="">4 Ports</option>
														<option value="">5 Ports</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										
										<hr class="separator">
										
										<h3>External Hard Drives & Pen Drives</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Capacity
													<sup data-toggle="tooltip" title="" data-original-title="Capacity">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="capacity">
														<option value="none" selected disabled="">Select Capacity</option>
														<option value="">512 MB</option>
														<option value="">1GB</option>
														<option value="">2GB</option>
														<option value="">4GB</option>
														<option value="">8GB</option>
														<option value="">16GB</option>
														<option value="">32GB</option>
														<option value="">64GB</option>
														<option value="">128GB</option>
														<option value="">500GB</option>
														<option value="">1TB</option>
														<option value="">2TB</option>
														<option value="">4Tb</option>
														<option value="">8TB</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Connectivity
													<sup data-toggle="tooltip" title="" data-original-title="Connectivity">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="connectivity">
														<option value="none" selected disabled="">Select Connectivity</option>
														<option value="">USB 1.1 - 12 Mbps</option>
														<option value="">USB 2.0 - 480 Mbps</option>
														<option value="">USB 3.0 - 4.8 Gbps</option>
														<option value="">Firewire 400 Mbps - 800 Mbps</option>
														<option value="">(e) SATA 2.0/3.0 - 3 Gbps/6Gbps</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Color 
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Keyboards</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Interface
													<sup data-toggle="tooltip" title="" data-original-title="Interface">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="interface">
														<option value="none" selected disabled="">Select Interface</option>
														<option value="">USB</option>
														<option value="">Wireless</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Color 
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Mouse</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Interface
													<sup data-toggle="tooltip" title="" data-original-title="Interface">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="interface">
														<option value="none" selected disabled="">Select Interface</option>
														<option value="">USB</option>
														<option value="">Wireless</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Buttons
													<sup data-toggle="tooltip" title="" data-original-title="Buttons">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="buttons">
														<option value="none" selected disabled="">Select Buttons</option>
														<option value="">2 Buttons</option>
														<option value="">3 Buttons</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Color 
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Headsets</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Color 
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Headsets</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Length
													<sup data-toggle="tooltip" title="" data-original-title="Charity">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Length">
														<img src="j-folder/img/length.png" alt="Length" title="Length Icon" class="img-responsive">
													</label>
													<input type="text" id="length" name="length" placeholder="Enter Length">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Ink & Toner</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Color 
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Softwares</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Softwares
													<sup data-toggle="tooltip" title="" data-original-title="Softwares">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="softwares">
														<option value="none" selected disabled="">Select Softwares</option>
														<option value="">Operating System</option>
														<option value="">Security & Utilities</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Color 
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h2>Personal Care</h2>
										
										<h3>Shavers</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Power
													<sup data-toggle="tooltip" title="" data-original-title="Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="power">
														<option value="none" selected disabled="">Select Power</option>
														<option value="">50 V - 150 V</option>
														<option value="">100 V - 240 V</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Color 
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Shavers</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Cutting Length
													<sup data-toggle="tooltip" title="" data-original-title="Cutting Length">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="cutlength">
														<option value="none" selected disabled="">Select Cutting Length</option>
														<option value="">0.2 - 6 mm</option>
														<option value="">0.3 - 8 mm</option>
														<option value="">0.4 - 10 mm</option>
														<option value="">0.5 - 13 mm</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Blade Type
													<sup data-toggle="tooltip" title="" data-original-title="Blade Type">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="bladetype">
														<option value="none" selected disabled="">Select Blade Type</option>
														<option value="">Self-Sharpening High-Carbon Steel</option>
														<option value="">Stainless Steel</option>
														<option value="">Precise Blade</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Color 
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
										</div>
										
										<h3>Body Groomers & Epilators & Pedometers</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Battery
													<sup data-toggle="tooltip" title="" data-original-title="Battery">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="batterybcup">
														<img src="j-folder/img/battery.png" alt="Battery" title="Battery Icon">
													</label>
													<input type="text" id="batterybcup" name="batterybcup" placeholder="Enter Battery Backup">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Hair Dryers & Hair Stylers</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Power Consumption
													<sup data-toggle="tooltip" title="" data-original-title="Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="power">
														<option value="none" selected disabled="">Select Power Consumption</option>
														<option value="">400 W</option>
														<option value="">600 W</option>
														<option value="">800 W</option>
														<option value="">1000 W</option>
														<option value="">1200 W</option>
														<option value="">1500 W</option>
														<option value="">2000 W</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Length
													<sup data-toggle="tooltip" title="" data-original-title="Cutting Length">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="cutlength">
														<option value="none" selected disabled="">Select Cutting Length</option>
														<option value="">1 Meter</option>
														<option value="">1.5 Meter</option>
														<option value="">2 Meter</option>
														<option value="">2.5 Meter</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Color 
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Monitors</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Screen Size 
													<sup data-toggle="tooltip" title="" data-original-title="Screen Size ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="screensize">
														<img src="j-folder/img/screensize.png" alt="Screen" title="Screen Icon">
													</label>
													<input type="text" id="screensize" name="screensize" placeholder="Enter Screen Size">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Screen type
													<sup data-toggle="tooltip" title="" data-original-title="Screen type">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="screentype">
														<option value="none" selected disabled="">Select Screen type</option>
														<option value="">LED</option>
														<option value="">LCD</option>
														<option value="">Normal</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<hr class="separator">
										
										<h2>Home Entertainment</h2>
										
										<h3>LCD LED Televisions</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Screen Size 
													<sup data-toggle="tooltip" title="" data-original-title="Screen Size ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="screensize">
														<img src="j-folder/img/screensize.png" alt="Screen" title="Screen Icon">
													</label>
													<input type="text" id="screensize" name="screensize" placeholder="Enter Screen Size">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Screen type
													<sup data-toggle="tooltip" title="" data-original-title="Screen type">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="screentype">
														<option value="none" selected disabled="">Select Screen type</option>
														<option value="">LED</option>
														<option value="">LCD</option>
														<option value="">Normal</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Power Consumption
													<sup data-toggle="tooltip" title="" data-original-title="Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="power">
														<option value="none" selected disabled="">Select Power Consumption</option>
														<option value="">25 W</option>
														<option value="">50 W</option>
														<option value="">60 W</option>
														<option value="">70 W</option>
														<option value="">80 W</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Aspect Ratio
													<sup data-toggle="tooltip" title="" data-original-title="Aspect Ratio">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="aspectratio">
														<option value="none" selected disabled="">Select Aspect Ratio</option>
														<option value="">4:3</option>
														<option value="">16:9</option>
														<option value="">21:9</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
											
										<hr class="separator">
										
										<h3>Home Theatre Systems & Audio Systems</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Power Consumption
													<sup data-toggle="tooltip" title="" data-original-title="Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="power">
														<option value="none" selected disabled="">Select Power Consumption</option>
														<option value="">500 W</option>
														<option value="">800 W</option>
														<option value="">1000 W</option>
														<option value="">1200 W</option>
														<option value="">1500 W</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Channel
													<sup data-toggle="tooltip" title="" data-original-title="Channel">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="channel">
														<option value="none" selected disabled="">Select Channel</option>
														<option value="">5.1</option>
														<option value="">7.1</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">USB
													<sup data-toggle="tooltip" title="" data-original-title="Channel">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="usb">
														<option value="none" selected disabled="">Select USB</option>
														<option value="">Yes</option>
														<option value="">No</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>DVD & Blue-Ray Players</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Power Consumption
													<sup data-toggle="tooltip" title="" data-original-title="Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="power">
														<option value="none" selected disabled="">Select Power Consumption</option>
														<option value="">6 W</option>
														<option value="">8 W</option>
														<option value="">10 W</option>
														<option value="">12 W</option>
														<option value="">15 W</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Channel
													<sup data-toggle="tooltip" title="" data-original-title="Channel">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="channel">
														<option value="none" selected disabled="">Select Channel</option>
														<option value="">5.1</option>
														<option value="">7.1</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Dolby Digital Plus
													<sup data-toggle="tooltip" title="" data-original-title="Dolby Digital Plus">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="digitalplus">
														<option value="none" selected disabled="">Select Dolby Digital Plus</option>
														<option value="">Yes</option>
														<option value="">No</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Musical Instruments</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand
													<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Brand">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brand" name="brand" placeholder="Enter Brand">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Keys
													<sup data-toggle="tooltip" title="" data-original-title="Keys">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="keys">
														<option value="none" selected disabled="">Select Keys</option>
														<option value="">32 Keys</option>
														<option value="">44 Keys</option>
														<option value="">49 Keys</option>
														<option value="">61 Keys</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Built-in Tones
													<sup data-toggle="tooltip" title="" data-original-title="Built-in Tones">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="builttones">
														<option value="none" selected disabled="">Select Built-in Tones</option>
														<option value="">50 built-in tones</option>
														<option value="">100 built-in tones</option>
														<option value="">200 built-in tones</option>
														<option value="">300 built-in tones</option>
														<option value="">400 built-in tones</option>
														<option value="">500 built-in tones</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Built-in Rhythms
													<sup data-toggle="tooltip" title="" data-original-title="Built-in Rhythms">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="builtrhythms">
														<option value="none" selected disabled="">Select Built-in Rhythms</option>
														<option value="">30 built-in rhythms</option>
														<option value="">50 built-in rhythms</option>
														<option value="">100 built-in rhythms</option>
														<option value="">120 built-in rhythms</option>
														<option value="">150 built-in rhythms</option>
														<option value="">180 built-in rhythms</option>
														<option value="">200 built-in rhythms</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Dimensions
													<sup data-toggle="tooltip" title="" data-original-title="Dimensions">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Weight">
														<img src="j-folder/img/weight.png" alt="Weight" title="Weight Icon">
													</label>
													<input type="text" id="weight" name="weight" placeholder="Enter  Dimensions">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Property Residential Category</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Deal Tag 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Tag ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="dealtag">
														<img src="j-folder/img/dealtag.png" alt="Dealtag" title="Dealtag Icon" class="img-responsive">
													</label>
													<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Deal Description 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Description ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<textarea type="text" id="dealdescription" name="dealdescription" placeholder="Enter Deal Description"></textarea>
												</div>
											</div><!-- end Deal Description -->
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Price 
													<sup data-toggle="tooltip" title="" data-original-title="Price">
														<img src="img/icons/i.png">
													</sup>
												</label>
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_toggle1" id="next-step-radio" value="Pound">
															<i></i> £ (Pound) 
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_toggle1"  value="Euro">
															<i></i> € (Euro)
														</label>
													</div>
												</div>
											</div>
											<div class="span6 unit">
												<div class="j-row">
													<div class="span6 unit top_20">
														<div class="input">
															<label class="icon-right" for="priceamount">
																<img src="j-folder/img/price.png">
															</label>
															<input type="text" id="priceamount" name="priceamount" placeholder="Enter Amount" onkeypress="return isNumber(event)">
														</div>
													</div>
													<div class="span6 unit"><!-- start Deal Tag -->
														<label class="label">Price Type 
															<sup data-toggle="tooltip" title="" data-original-title="Price Type ">
																<img src="img/icons/i.png">
															</sup>
														</label>
														<label class="input select">
															<select name="price_type">
																<option value="none" selected disabled="">Select type</option>
																<option value="Negotiable">Negotiable</option>
																<option value="Fixed">Fixed</option>
															</select>
															<i></i>
														</label>
													</div>
												</div><!-- end service -->
											
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Vehicle Registration  Number 
													<sup data-toggle="tooltip" title="" data-original-title="Vehicle Registration  Number ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="veh_regno">
														<img src="j-folder/img/regno.png" alt="regno" title="Reg No Icon" class="img-responsive">
													</label>
													<input type="text" id="veh_regno" name="veh_regno" placeholder="Enter Vehicle Registration  Number ">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Manufacture 
													<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="manufacture">
														<img src="j-folder/img/manufacture.png" alt="manufacture" title="manufacture Icon" class="img-responsive">
													</label>
													<input type="text" id="manufacture" name="manufacture" placeholder="Enter Manufacture">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Model 
													<sup data-toggle="tooltip" title="" data-original-title="Model ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="Model">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Type 
													<sup data-toggle="tooltip" title="" data-original-title="Boats Type ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="type">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Color
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Registration Year
													<sup data-toggle="tooltip" title="" data-original-title="Registration Year">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="reg_year">
														<img src="j-folder/img/reg.png" alt="Reg" title="Reg Icon" class="img-responsive">
													</label>
													<input type="text" id="reg_year" name="reg_year" placeholder="Enter Registration Year">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Fuel Type  
													<sup data-toggle="tooltip" title="" data-original-title="Fuel Type">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="FuelType">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Transmission   
													<sup data-toggle="tooltip" title="" data-original-title="Transmission ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="Transmission ">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Engine Size 
													<sup data-toggle="tooltip" title="" data-original-title="Engine Size ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Engine Sise">
														<img src="j-folder/img/engsize.png" alt="Miles" title="Engine Icon" class="img-responsive">
													</label>
													<input type="text" id="eng_size" name="eng_size" placeholder="Enter Engine Size ">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">No of Doors    
													<sup data-toggle="tooltip" title="" data-original-title="No of Doors  ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="NoofDoors  ">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">No of Seats    
													<sup data-toggle="tooltip" title="" data-original-title="No of Seats  ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<label class="input select">
													<select name="NoofSeats  ">
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">No of Miles Covered 
													<sup data-toggle="tooltip" title="" data-original-title="No of Miles Covered ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="No of Miles Covered ">
														<img src="j-folder/img/miles.png" alt="Miles" title="Miles Icon" class="img-responsive">
													</label>
													<input type="text" id="tot_miles" name="tot_miles" placeholder="Enter No of Miles Covered">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">MOT Status 
													<sup data-toggle="tooltip" title="" data-original-title="MOT Status ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="MOT Status ">
														<img src="j-folder/img/status.png" alt="MOT Status" title="MOT Status Icon" class="img-responsive">
													</label>
													<input type="text" id="tot_miles" name="tot_miles" placeholder="Enter No of Miles Covered">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Road TAX status  
													<sup data-toggle="tooltip" title="" data-original-title="Road TAX status ">
														<img src="img/icons/i.png" title="I Error" alt="I" class="img-responsive">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="road_tax">
														<img src="j-folder/img/roadtax.png" alt="Road TAX" title="Road TAX Icon" class="img-responsive">
													</label>
													<input type="text" id="road_tax" name="road_tax" placeholder="Enter Road TAX status ">
												</div>
											</div>
										</div>
									
									</fieldset>

									<fieldset>

										<div class="divider gap-bottom-25"></div>
										
										<div class="j-row">
											<div class="span6 unit"><!-- start Deal Tag -->
												<label class="label">Deal Tag</label>
												<div class="input">
													<label class="icon-right" for="dealtag">
														<img src="j-folder/img/dealtag.png">
													</label>
													<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
												</div>
											</div><!-- end Deal Tag -->
											<div class="span6 unit"><!-- start Deal Description -->
												<label class="label">Deal Description </label>
												<div class="input">
													<textarea type="text" id="dealdescription" name="dealdescription" placeholder="Enter Deal Description"></textarea>
												</div>
											</div><!-- end Deal Description -->
										</div>
										
										<div class="j-row">
											<div class="span6 unit"><!-- start service -->
												<label class="label">Price</label>
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_toggle1" id="next-step-radio" value="Yes">
															<i></i>£ ( Pound ) 
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_toggle1"  value="No">
															<i></i> € ( Euro )
														</label>
													</div>
												</div>
											</div><!-- end service -->
											<div class="span6 unit"><!-- start Family Race -->
												<label class="label">Family Race</label>
												<div class="input">
													<label class="icon-right" for="phone">
														<i class="fa fa-home"></i>
													</label>
													<input type="text" id="familyrace" name="familyrace" placeholder="Enter Family Race">
												</div>
											</div><!-- end Family Race -->
										</div>
										
										<div class="j-row">
											<div class="span6 unit"><!-- start Type -->
												<label class="label">Type</label>
												<div class="input">
													<label class="icon-right" for="phone">
														<img src="j-folder/img/type.png">
													</label>
													<input type="text" id="type" name="type" placeholder="Enter Type">
												</div>
											</div><!-- end Type -->
											
											<div class="span6 unit"><!-- start Age -->
												<label class="label">Age</label>
												<label class="input select">
													<select name="Age">
														<option value="none" selected disabled="">select Age</option>
														<option value="3months">0 to 3 Months</option>
														<option value="6months">3 to 6 Months</option>
														<option value="9months">6 to 9 Months</option>
														<option value="12months">9 to 12 Months</option>
														<option value="2years"> > 1 Year - < 2 Years</option>
														<option value="3years"> > 2 Years - < 3 Years</option>
														<option value="4years"> > 3 Years - < 4 Years</option>
														<option value="5years"> > 4 Years - < 5 Years</option>
													</select>
													<i></i>
												</label>
											</div><!-- end Age -->
										</div>
										
										<div class="j-row">
											<div class="span6 unit"><!-- start Height -->
												<label class="label">Height</label>
												<div class="input">
													<label class="icon-right" for="phone">
														<img src="j-folder/img/height.png">
													</label>
													<input type="text" id="height" name="height" placeholder="Enter Height">
												</div>
											</div><!-- end Height -->
											<div class="span6 unit"><!-- start Gender -->
												<label class="label">Gender</label>
												<div class="input">
													<label class="icon-right" for="phone">
														<i class="fa fa-male"></i>
													</label>
													<input type="text" id="gender" name="gender" placeholder="Enter Gender">
												</div>
											</div><!-- end Gender -->
										</div>

									</fieldset>

									<fieldset>

										<div class="divider gap-bottom-25"></div>

											<!-- start name -->
										<div class="j-row">
											<div class="span4">
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
														<label class="checkbox">
															<input type="checkbox" name="candles" value="candles-5$" data-price="5">
															<i></i>
															is Urgent
														</label>
														<ul class="list-styles free_hide" style="display:none;">
															<li><i class="fa fa-arrow-right"></i> 9 Images</li>
															<li><i class="fa fa-arrow-right"></i> Video Link</li>
															<li><i class="fa fa-arrow-right"></i> Website link</li>
														</ul>
														<a href="#four" data-toggle="tab" class="btn btn-primary">Select Package</a>
													</div>
													
													<!-- End promotion-box-info-->
												</div>
												<!-- End promotion-box-->
											</div>

											<div class="span4">
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
														<label class="checkbox">
															<input type="checkbox" name="candles" value="candles-5$" data-price="5">
															<i></i>
															is Urgent
														</label>
														<ul class="list-styles gold_hide" style="display:none;">
															<li><i class="fa fa-arrow-right"></i> 12 Images</li>
														</ul>
														<a href="#four" data-toggle="tab" class="btn btn-primary">Select Package</a>
													</div>
													
													<!-- End promotion-box-info-->
												</div>
												<!-- End promotion-box-->
											</div>
											
											<div class="span4">
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
														<a href="#four" data-toggle="tab" class="btn btn-primary">Select Package</a>
													</div>
													
													<!-- End promotion-box-info-->
												</div>
												<!-- End promotion-box-->
											</div>
										</div>
								
									</fieldset>
									
									<fieldset>

										<div class="divider gap-bottom-25"></div>

										<!-- start name -->
										<div class="j-row">
											<div class="span6">
												<div class="j-row">
													<div class="span12 unit">
														<label class="label">Business Name</label>
														<div class="input">
															<label class="icon-right" for="company">
																<i class="fa fa-briefcase"></i>
															</label>
															<input type="text" id="busname" name="busname" placeholder="Enter  Name ">
														</div>
													</div>
													<div class="span12 unit">
														<label class="label">Contact Person Name </label>
														<div class="input">
															<label class="icon-right" for="name">
																<i class="fa fa-user"></i>
															</label>
															<input type="text" id="buscontname" name="buscontname" placeholder="Enter Contact Person Name ">
														</div>
													</div>
													<div class="span12 unit">
														<label class="label">Mobile Number</label>
														<div class="input">
															<label class="icon-right" for="phone">
																<i class="fa fa-phone"></i>
															</label>
															<input type="text" id="bussmblno" name="bussmblno" placeholder="Enter Your Mobile Number ">
														</div>
													</div>
													<div class="span12 unit">
														<label class="label">Email</label>
														<div class="input">
															<label class="icon-right" for="email">
																<i class="fa fa-envelope-o"></i>
															</label>
															<input type="email" id="busemail" name="busemail" placeholder="Enter Your Email">
														</div>
													</div>
												</div>
											</div>
											
											<div class="span6">
												<div class="j-row">
													<div class="span12 unit">
														<label class="label">Contact Name </label>
														<div class="input">
															<label class="icon-right" for="name">
																<i class="fa fa-user"></i>
															</label>
															<input type="text" id="conscontname" name="conscontname" placeholder="Enter Contact Person Name ">
														</div>
													</div>
													<div class="span12 unit">
														<label class="label">Mobile Number</label>
														<div class="input">
															<label class="icon-right" for="phone">
																<i class="fa fa-phone"></i>
															</label>
															<input type="text" id="conssmblno" name="conssmblno" placeholder="Enter Your Mobile Number ">
														</div>
													</div>
													<div class="span12 unit">
														<label class="label">Email</label>
														<div class="input">
															<label class="icon-right" for="email">
																<i class="fa fa-envelope-o"></i>
															</label>
															<input type="email" id="consemail" name="consemail" placeholder="Enter Your Email">
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- end name -->

									</fieldset>
									
									
									<fieldset>

										<div class="divider gap-bottom-25"></div>

										<!-- start textarea -->
										<div class="unit">
											<label class="label">Message or comment</label>
											<div class="input">
												<textarea spellcheck="false" name="message"></textarea>
											</div>
										</div>
										<!-- end textarea -->

										
										<!-- start response from server -->
										<div id="response"></div>
										<!-- end response from server -->

									</fieldset>

								</div>
								<!-- end /.content -->

								<div class="footer">
									<button type="submit" class="primary-btn multi-submit-btn">Order</button>
									<button type="button" class="primary-btn multi-next-btn">Next</button>
									<button type="button" class="secondary-btn multi-prev-btn">Back</button>
								</div>
								<!-- end /.footer -->

							</form>
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

        