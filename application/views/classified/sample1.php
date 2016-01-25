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
										<div class="span6 step">
											<div class="steps">
												<span>Step 1:</span>
												<p>1st Screen</p>
											</div>
										</div>
										<div class="span6 step">
											<div class="steps">
												<span>Step 2:</span>
												<p>Terms & Conditions</p>
											</div>
										</div>
									</div>
									<!-- end steps -->

									<fieldset>

										<div class="divider gap-bottom-25"></div>
										
										<h3>E- Zone</h3>
										
										<div class="j-row">
											<div class="span6 unit"><!-- start Deal Tag -->
												<label class="label">Deal Tag / Caption 
													<sup data-toggle="tooltip" title="" data-original-title="Postal">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="dealtag">
														<img src="j-folder/img/dealtag.png">
													</label>
													<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
												</div>
											</div><!-- end Deal Tag -->
										</div>
										
										<div class="j-row">
											<div class="span12 unit"><!-- start Deal Description -->
												<label class="label">Deal Description 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Description ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<textarea type="text" id="dealdescription" name="dealdescription" cols="40" placeholder="Enter Deal Description"></textarea>
													<input type='hidden' name='text_hide' id='text_hide' value='' />
												</div>
											</div><!-- end Deal Description -->
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Price 
													<sup data-toggle="tooltip" title="" data-original-title="Price">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
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
															<label class="icon-right" for="dealtag">
																<img src="j-folder/img/price.png">
															</label>
															<input type="text" id="priceamount" name="priceamount" placeholder="Enter Amount" onkeypress="return isNumber(event)">
														</div>
													</div>
													<div class="span6 unit"><!-- start Deal Tag -->
														<label class="label">Price Type 
															<sup data-toggle="tooltip" title="" data-original-title="Price Type ">
																<img src="img/icons/i.png" alt="Help" title="Help Label">
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
										
										<hr class="separator">
										
										<h3> Mobiles ,Tablets & iPads</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Screen Size 
													<sup data-toggle="tooltip" title="" data-original-title="Screen Size ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="screensize">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="screensize" name="screensize" placeholder="Enter Screen Size">
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
										</div>
										
										<div class="j-row">
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
											<div class="span6 unit">
												<label class="label">Internal Memory
													<sup data-toggle="tooltip" title="" data-original-title="Internal Memory">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="memory">
														<img src="j-folder/img/ram.png" alt="Memory" title="Memory Icon">
													</label>
													<input type="text" id="memory" name="memory" placeholder="Enter Internal Memory">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										<h3>Powerbanks</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Capacity
													<sup data-toggle="tooltip" title="" data-original-title="Capacity">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="batterybcup">
														<img src="j-folder/img/battery.png" alt="Capacity" title="Capacity Icon">
													</label>
													<input type="text" id="batterybcup" name="batterybcup" placeholder="Enter Capacity">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										<h3>Adaptors & Connectors</h3>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Memory Capacity
													<sup data-toggle="tooltip" title="" data-original-title="Memory Capacity">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="memory">
														<img src="j-folder/img/ram.png" alt="Memory" title="Memory Icon">
													</label>
													<input type="text" id="memory" name="memory" placeholder="Enter Memory Capacity">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Blue-tooth Devices</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Blue-tooth version
													<sup data-toggle="tooltip" title="" data-original-title="Blue-tooth version">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="blueversion">
														<img src="j-folder/img/opesys.png" alt="Version" title="Version Icon">
													</label>
													<input type="text" id="blueversion" name="blueversion" placeholder="Enter Blue-tooth version">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Range
													<sup data-toggle="tooltip" title="" data-original-title="Range">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="range">
														<img src="j-folder/img/range.png" alt="Range" title="Range Icon">
													</label>
													<input type="text" id="range" name="range" placeholder="Enter Range">
												</div>
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
										<h2>Home Appliances</h2>
										<h3>Air Conditioners</h3>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Capacity
													<sup data-toggle="tooltip" title="" data-original-title="Capacity">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="capacity">
														<img src="j-folder/img/ram.png" alt="Memory" title="Memory Icon">
													</label>
													<input type="text" id="capacity" name="capacity" placeholder="Enter Capacity Capacity">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Power Consumption
													<sup data-toggle="tooltip" title="" data-original-title="Power Consumption">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="batterybcup">
														<img src="j-folder/img/battery.png" alt="Battery" title="Battery Icon">
													</label>
													<input type="text" id="batterybcup" name="batterybcup" placeholder="Enter Power Consumption">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Display Type
													<sup data-toggle="tooltip" title="" data-original-title="Display Type">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="displaytype">
														<img src="j-folder/img/displayty.png" alt="displaytype" title="Display type Icon">
													</label>
													<input type="text" id="displaytype" name="displaytype" placeholder="Enter Display Type">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Air Direction 
													<sup data-toggle="tooltip" title="" data-original-title="Air Direction">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="airdirection">
														<option value="none" selected disabled="">Select Air Direction</option>
														<option value="">1 Way</option>
														<option value="">2 Way</option>
														<option value="">3 Way</option>
														<option value="">4 Way</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										
										<h3>Property Residential Category</h3>
										
										<div class="j-row">
											<div class="span6 unit"><!-- start Deal Tag -->
												<label class="label">Deal Tag / Caption 
													<sup data-toggle="tooltip" title="" data-original-title="Postal">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="dealtag">
														<img src="j-folder/img/dealtag.png">
													</label>
													<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
												</div>
											</div><!-- end Deal Tag -->
										</div>
										
										<div class="j-row">
											<div class="span12 unit"><!-- start Deal Description -->
												<label class="label">Deal Description 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Description ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<textarea type="text" id="dealdescription" name="dealdescription" cols="40" placeholder="Enter Deal Description"></textarea>
													<input type='hidden' name='text_hide' id='text_hide' value='' />
												</div>
											</div><!-- end Deal Description -->
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Price 
													<sup data-toggle="tooltip" title="" data-original-title="Price">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
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
															<label class="icon-right" for="dealtag">
																<img src="j-folder/img/price.png">
															</label>
															<input type="text" id="priceamount" name="priceamount" placeholder="Enter Amount" onkeypress="return isNumber(event)">
														</div>
													</div>
													<div class="span6 unit"><!-- start Deal Tag -->
														<label class="label">Price Type 
															<sup data-toggle="tooltip" title="" data-original-title="Price Type ">
																<img src="img/icons/i.png" alt="Help" title="Help Label">
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
											<div class="span6 unit"><!-- Bedrooms Tag -->
												<label class="label">Bedrooms 
													<sup data-toggle="tooltip" title="" data-original-title="Bedrooms">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Bedrooms">
														<option value="none" selected disabled="">Select Bedrooms</option>
														<option value="">1 Bedroom</option>
														<option value="">2 Bedrooms</option>
														<option value="">3 Bedrooms</option>
														<option value="">4 Bedrooms</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Bathrooms
													<sup data-toggle="tooltip" title="" data-original-title="Bathrooms">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Bathrooms">
														<option value="none" selected disabled="">Select Bathrooms</option>
														<option value="">1 Bathroom</option>
														<option value="">2 Bathrooms</option>
														<option value="">3 Bathrooms</option>
														<option value="">4 Bathrooms</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Super built-up area
													<sup data-toggle="tooltip" title="" data-original-title="Super built-up area">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="area">
														<img src="j-folder/img/area.png" alt="Area" title="area">
													</label>
													<input type="text" id="area" name="area" placeholder="Enter Super built-up area">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Possession 
													<sup data-toggle="tooltip" title="" data-original-title="Possession">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Possession">
														<option value="none" selected disabled="">Select Possession</option>
														<option value="">Immediate</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Property Age
													<sup data-toggle="tooltip" title="" data-original-title="Super built-up area">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="propertyge">
														<option value="none" selected disabled="">Select Property Age</option>
														<option value="">1 to 5 Years Old</option>
														<option value="">5 to 10 Years Old</option>
														<option value="">10 to 15 Years Old</option>
														<option value="">15 to 20 Years Old</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Property Ownership 
													<sup data-toggle="tooltip" title="" data-original-title="Property Ownership">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Ownership">
														<img src="j-folder/img/property.png" alt="Property" title="Property Icon">
													</label>
													<input type="text" id="Ownership" name="Ownership" placeholder="Enter Property Ownership">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h4>Agricultural flot sale</h4>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Plot area
													<sup data-toggle="tooltip" title="" data-original-title="Plot area">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="area">
														<img src="j-folder/img/area.png" alt="Area" title="area">
													</label>
													<input type="text" id="area" name="area" placeholder="Enter Plot area">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Possession 
													<sup data-toggle="tooltip" title="" data-original-title="Possession">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Possession">
														<option value="none" selected disabled="">Select Possession</option>
														<option value="">Immediate</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<hr class="separator">
										
										<h4>Commercial office</h4>
										<div class="j-row">
											<div class="span6 unit"><!-- start Deal Tag -->
												<label class="label">Wash rooms
													<sup data-toggle="tooltip" title="" data-original-title="Wash rooms">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="washrooms">
														<option value="none" selected disabled="">Select Wash rooms</option>
														<option value="">1 washroom</option>
														<option value="">2 washrooms</option>
														<option value="">3 washrooms</option>
														<option value="">4 washrooms</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Built-Up area
													<sup data-toggle="tooltip" title="" data-original-title="Built-Up area">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="area">
														<img src="j-folder/img/area.png" alt="Area" title="area">
													</label>
													<input type="text" id="area" name="area" placeholder="Enter Built-Up area">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Possession 
													<sup data-toggle="tooltip" title="" data-original-title="Possession">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Possession">
														<option value="none" selected disabled="">Select Possession</option>
														<option value="">Immediate</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Property Age
													<sup data-toggle="tooltip" title="" data-original-title="Super built-up area">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="propertyge">
														<option value="none" selected disabled="">Select Property Age</option>
														<option value="">1 to 5 Years Old</option>
														<option value="">5 to 10 Years Old</option>
														<option value="">10 to 15 Years Old</option>
														<option value="">15 to 20 Years Old</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Property Ownership 
													<sup data-toggle="tooltip" title="" data-original-title="Property Ownership">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Ownership">
														<img src="j-folder/img/property.png" alt="Property" title="Property Icon">
													</label>
													<input type="text" id="Ownership" name="Ownership" placeholder="Enter Property Ownership">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h4>Residential Land</h4>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Plot area
													<sup data-toggle="tooltip" title="" data-original-title="Plot area">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="area">
														<img src="j-folder/img/area.png" alt="Area" title="area">
													</label>
													<input type="text" id="area" name="area" placeholder="Enter Plot area">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Possession 
													<sup data-toggle="tooltip" title="" data-original-title="Possession">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Possession">
														<option value="none" selected disabled="">Select Possession</option>
														<option value="">Immediate</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Property Ownership 
													<sup data-toggle="tooltip" title="" data-original-title="Property Ownership">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Ownership">
														<img src="j-folder/img/property.png" alt="Property" title="Property Icon">
													</label>
													<input type="text" id="Ownership" name="Ownership" placeholder="Enter Property Ownership">
												</div>
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
															<label class="icon-right" for="busname">
																<i class="fa fa-briefcase"></i>
															</label>
															<input type="text" id="busname" name="busname" placeholder="Enter  Name ">
														</div>
													</div>
													<div class="span12 unit">
														<label class="label">Contact Person Name </label>
														<div class="input">
															<label class="icon-right" for="buscontname">
																<i class="fa fa-user"></i>
															</label>
															<input type="text" id="buscontname" name="buscontname" placeholder="Enter Contact Person Name ">
														</div>
													</div>
													<div class="span12 unit">
														<label class="label">Mobile Number</label>
														<div class="input">
															<label class="icon-right" for="bussmblno">
																<i class="fa fa-phone"></i>
															</label>
															<input type="text" id="bussmblno" name="bussmblno" placeholder="Enter Your Mobile Number ">
														</div>
													</div>
													<div class="span12 unit">
														<label class="label">Email</label>
														<div class="input">
															<label class="icon-right" for="busemail">
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
															<label class="icon-right" for="conssmblno">
																<i class="fa fa-phone"></i>
															</label>
															<input type="text" id="conssmblno" name="conssmblno" placeholder="Enter Your Mobile Number ">
														</div>
													</div>
													<div class="span12 unit">
														<label class="label">Email</label>
														<div class="input">
															<label class="icon-right" for="consemail">
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

        