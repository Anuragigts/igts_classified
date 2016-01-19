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

        