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
										
										<hr class="separator">
										
										<h3>Air Coolers</h3>
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
												<label class="label">Water Level Indicator
													<sup data-toggle="tooltip" title="" data-original-title="Water Level Indicator">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="waterlevind">
														<option value="none" selected disabled="">Select Air Direction</option>
														<option value="">Yes</option>
														<option value="">No</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Cooling Area (sq.ft.)
													<sup data-toggle="tooltip" title="" data-original-title="Cooling Area (sq.ft.)">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="coolarea">
														<option value="none" selected disabled="">Select Air Direction</option>
														<option value="">Up to 100 Sq Ft</option>
														<option value="">Up to 150 Sq Ft</option>
														<option value="">Up to 200 Sq Ft</option>
														<option value="">Up to 250 Sq Ft</option>
														<option value="">Up to 300 Sq Ft</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Weight & Dimensions
													<sup data-toggle="tooltip" title="" data-original-title="Weight & Dimensions">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Weight">
														<img src="j-folder/img/weight.png" alt="Weight" title="Weight Icon">
													</label>
													<input type="text" id="weight" name="weight" placeholder="Enter Weight & Dimensions">
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
										
										<hr class="separator">
										
										<h3>Fans</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Regulator Included
													<sup data-toggle="tooltip" title="" data-original-title="Regulator Included">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="regulator">
														<option value="none" selected disabled="">Select Regulator Included</option>
														<option value="">Yes</option>
														<option value="">No</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">No. of Blades
													<sup data-toggle="tooltip" title="" data-original-title="No. of Blades">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="blades">
														<option value="none" selected disabled="">Select Air Direction</option>
														<option value="">1 Blade</option>
														<option value="">2 Blade</option>
														<option value="">3 Blade</option>
														<option value="">4 Blade</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Refrigerators</h3>
										
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
												<label class="label">Door Lock
													<sup data-toggle="tooltip" title="" data-original-title="Door Lock">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="doorlock">
														<option value="none" selected disabled="">Select Door Lock</option>
														<option value="">Yes</option>
														<option value="">No</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Vegetable Basket
													<sup data-toggle="tooltip" title="" data-original-title="Cooling Area (sq.ft.)">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="vegitablebasket">
														<option value="none" selected disabled="">Select Vegetable Basket</option>
														<option value="">Yes</option>
														<option value="">No</option>
													</select>
													<i></i>
												</label>
											</div>
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
										
										<h3>Washing Machines</h3>
										
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
											<div class="span6 unit"><!-- start Deal Tag -->
												<label class="label">Wash Load 
													<sup data-toggle="tooltip" title="" data-original-title="Wash Load">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="washload">
														<img src="j-folder/img/wash.png" alt="wash" title="wash Icon" class="img-responsive">
													</label>
													<input type="text" id="washload" name="washload" placeholder="Enter Wash Load">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Heavy Wash
													<sup data-toggle="tooltip" title="" data-original-title="Heavy Wash">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="heavywash">
														<option value="none" selected disabled="">Select Heavy Wash</option>
														<option value="">Yes</option>
														<option value="">No</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Buzzer
													<sup data-toggle="tooltip" title="" data-original-title="Buzzer">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="buzzer">
														<option value="none" selected disabled="">Select Buzzer</option>
														<option value="">Yes</option>
														<option value="">No</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Electric Iron</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Power Consumption
													<sup data-toggle="tooltip" title="" data-original-title="Power Consumption">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="powerconsumption">
														<option value="none" selected disabled="">Select Power Consumption</option>
														<option value="">500 W</option>
														<option value="">800 W</option>
														<option value="">1000 W</option>
														<option value="">1200 W</option>
														<option value="">1500 W</option>
														<option value="">2000 W</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Plate Type
													<sup data-toggle="tooltip" title="" data-original-title="Plate Type">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="platetype">
														<option value="none" selected disabled="">Select Plate Type</option>
														<option value="">Non-stick sole</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Vacuum Cleaners</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Suction Power
													<sup data-toggle="tooltip" title="" data-original-title="Suction Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="suctionpower">
														<option value="none" selected disabled="">Select Suction Power</option>
														<option value="">500 W</option>
														<option value="">800 W</option>
														<option value="">1000 W</option>
														<option value="">1200 W</option>
														<option value="">1500 W</option>
														<option value="">2000 W</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Dust Level Indicator
													<sup data-toggle="tooltip" title="" data-original-title="Dust Level Indicator">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="dustlevelind">
														<option value="none" selected disabled="">Select Dust Level Indicator</option>
														<option value="">Yes</option>
														<option value="">No</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Water Heaters & Room Heaters</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Power
													<sup data-toggle="tooltip" title="" data-original-title="Suction Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="suctionpower">
														<option value="none" selected disabled="">Select Suction Power</option>
														<option value="">500 W</option>
														<option value="">800 W</option>
														<option value="">1000 W</option>
														<option value="">1200 W</option>
														<option value="">1500 W</option>
														<option value="">2000 W</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Capacity
													<sup data-toggle="tooltip" title="" data-original-title="Capacity">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="capacityheat">
														<option value="none" selected disabled="">Select Dust Level Indicator</option>
														<option value="">1 Litre</option>
														<option value="">2 Litre</option>
														<option value="">3 Litre</option>
														<option value="">4 Litre</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Sewing Machine</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Weight
													<sup data-toggle="tooltip" title="" data-original-title="Suction Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="weight">
														<option value="none" selected disabled="">Select Weight</option>
														<option value="">Light weight</option>
														<option value="">Normal weight</option>
														<option value="">Heavy weight</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Dryers</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Drying Capacity
													<sup data-toggle="tooltip" title="" data-original-title="Suction Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="drycap">
														<option value="none" selected disabled="">Select Drying Capacity</option>
														<option value="">1 Kg</option>
														<option value="">2 Kg</option>
														<option value="">3 Kg</option>
														<option value="">4 Kg</option>
														<option value="">5 Kg</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Emergency Light</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Battery
													<sup data-toggle="tooltip" title="" data-original-title="Suction Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="lightbattery">
														<option value="none" selected disabled="">Select Battery</option>
														<option value="">1-2 hours</option>
														<option value="">2-3 hours</option>
														<option value="">3-4 hours</option>
														<option value="">4-5 hours</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<hr class="separator">
										
										<h2>Small Appliances</h2>
										<h3>Microwave Ovens & OTG</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Capacity
													<sup data-toggle="tooltip" title="" data-original-title="Capacity">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="capacityheat">
														<option value="none" selected disabled="">Select Capacity</option>
														<option value="">4 Litre</option>
														<option value="">8 Litre</option>
														<option value="">10 Litre</option>
														<option value="">12 Litre</option>
														<option value="">14 Litre</option>
														<option value="">16 Litre</option>
														<option value="">18 Litre</option>
														<option value="">20 Litre</option>
														<option value="">22 Litre</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Power
													<sup data-toggle="tooltip" title="" data-original-title="Suction Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="suctionpower">
														<option value="none" selected disabled="">Select Suction Power</option>
														<option value="">500 W</option>
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
												<label class="label">Maximum Cooking Time
													<sup data-toggle="tooltip" title="" data-original-title="Maximum Cooking Time">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="cooktime">
														<option value="none" selected disabled="">Select Cooking Time</option>
														<option value="">15min</option>
														<option value="">20min</option>
														<option value="">25min</option>
														<option value="">30min</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Power
													<sup data-toggle="tooltip" title="" data-original-title="Suction Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="suctionpower">
														<option value="none" selected disabled="">Select Suction Power</option>
														<option value="">500 W</option>
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
										
										<hr class="separator">
										
										<h3>Food Processors</h3>
										
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
											<div class="span6 unit">
												<label class="label">Speed Controls
													<sup data-toggle="tooltip" title="" data-original-title="Speed Controls">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="speedctrl">
														<option value="none" selected disabled="">Select Speed Controls</option>
														<option value="">2 Speed</option>
														<option value="">3 Speed</option>
														<option value="">4 Speed</option>
														<option value="">5 Speed</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Power
													<sup data-toggle="tooltip" title="" data-original-title="Suction Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="suctionpower">
														<option value="none" selected disabled="">Select Suction Power</option>
														<option value="">500 W</option>
														<option value="">600 W</option>
														<option value="">700 W</option>
														<option value="">800 W</option>
														<option value="">900 W</option>
														<option value="">1000 W</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Food processing Bowl
													<sup data-toggle="tooltip" title="" data-original-title="Food processing Bowl">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="foodbowl">
														<option value="none" selected disabled="">Select Food processing Bowl</option>
														<option value="">1.5 Lit</option>
														<option value="">1.6 Lit</option>
														<option value="">1.7 Lit</option>
														<option value="">1.8 Lit</option>
														<option value="">2 Lit</option>
														<option value="">2.2 Lit</option>
														<option value="">2.5 Lit</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Mixer Grinder Juicers</h3>
										
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
											<div class="span6 unit">
												<label class="label">Speed Controls
													<sup data-toggle="tooltip" title="" data-original-title="Speed Controls">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="speedctrl">
														<option value="none" selected disabled="">Select Speed Controls</option>
														<option value="">2 Speed</option>
														<option value="">3 Speed</option>
														<option value="">4 Speed</option>
														<option value="">5 Speed</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Power Indicator
													<sup data-toggle="tooltip" title="" data-original-title="Power Indicator">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="powerind">
														<option value="none" selected disabled="">Select Power Indicator</option>
														<option value="">Yes</option>
														<option value="">No</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Food processing Bowl
													<sup data-toggle="tooltip" title="" data-original-title="Food processing Bowl">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="foodbowl">
														<option value="none" selected disabled="">Select Food processing Bowl</option>
														<option value="">1.5 Lit</option>
														<option value="">1.6 Lit</option>
														<option value="">1.7 Lit</option>
														<option value="">1.8 Lit</option>
														<option value="">2 Lit</option>
														<option value="">2.2 Lit</option>
														<option value="">2.5 Lit</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Cookers & Steamers ,Grills & Tandooris</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Capacity
													<sup data-toggle="tooltip" title="" data-original-title="Capacity">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="capacity">
														<option value="none" selected disabled="">Select Capacity</option>
														<option value="">2 Slice</option>
														<option value="">3 Slice</option>
														<option value="">4 Slice</option>
														<option value="">5 Slice</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Power
													<sup data-toggle="tooltip" title="" data-original-title="Suction Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="suctionpower">
														<option value="none" selected disabled="">Select Suction Power</option>
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
										
										<hr class="separator">
										
										<h3>Toasters & Sandwich Makers</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Capacity
													<sup data-toggle="tooltip" title="" data-original-title="Capacity">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="capacity">
														<option value="none" selected disabled="">Select Capacity</option>
														<option value="">1.5 Lit</option>
														<option value="">1.6 Lit</option>
														<option value="">1.7 Lit</option>
														<option value="">1.8 Lit</option>
														<option value="">2 Lit</option>
														<option value="">2.2 Lit</option>
														<option value="">2.5 Lit</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Power
													<sup data-toggle="tooltip" title="" data-original-title="Suction Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="suctionpower">
														<option value="none" selected disabled="">Select Suction Power</option>
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
										
										<hr class="separator">
										
										<h3>Blenders & Choppers</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Power
													<sup data-toggle="tooltip" title="" data-original-title="Suction Power">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="suctionpower">
														<option value="none" selected disabled="">Select Suction Power</option>
														<option value="">500 W</option>
														<option value="">600 W</option>
														<option value="">700 W</option>
														<option value="">800 W</option>
														<option value="">900 W</option>
														<option value="">1000 W</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Transparent Bowl 
													<sup data-toggle="tooltip" title="" data-original-title="Transparent Bowl">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="transparentbowl">
														<option value="none" selected disabled="">Select Transparent Bowl</option>
														<option value="">1 Lit</option>
														<option value="">1.5 Lit</option>
														<option value="">2 Lit</option>
														<option value="">2.5 Lit</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Coffee Tea Makers & Kettles</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Capacity
													<sup data-toggle="tooltip" title="" data-original-title="Capacity">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="capacity">
														<option value="none" selected disabled="">Select Capacity</option>
														<option value="">2-3 Cups</option>
														<option value="">3-4 Cups</option>
														<option value="">4-5 Cups</option>
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
										
										
										<hr class="separator">
										
										<h3>Fryers & Snack makers</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Capacity
													<sup data-toggle="tooltip" title="" data-original-title="Capacity">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="capacity">
														<option value="none" selected disabled="">Select Capacity</option>
														<option value="">1 Lit</option>
														<option value="">1.5 Lit</option>
														<option value="">2 Lit</option>
														<option value="">2.5 Lit</option>
														<option value="">3 Lit</option>
														<option value="">3.5 Lit</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Timer
													<sup data-toggle="tooltip" title="" data-original-title="Timer">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="timer">
														<option value="none" selected disabled="">Select Timer</option>
														<option value="">upto 20 min</option>
														<option value="">upto 25 min</option>
														<option value="">upto 30 min</option>
														<option value="">upto 35 min</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Power Indicator
													<sup data-toggle="tooltip" title="" data-original-title="Power Indicator">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="powerind">
														<option value="none" selected disabled="">Select Power Indicator</option>
														<option value="">Yes</option>
														<option value="">No</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Temperature Control
													<sup data-toggle="tooltip" title="" data-original-title="Temperature Control">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="temperature">
														<option value="none" selected disabled="">Select Temperature</option>
														<option value="">80 - 120 Degree Celsius</option>
														<option value="">120 - 160 Degree Celsius</option>
														<option value="">160 - 200 Degree Celsius</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Water Purifiers</h3>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Capacity
													<sup data-toggle="tooltip" title="" data-original-title="Capacity">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="capacity">
														<option value="none" selected disabled="">Select Capacity</option>
														<option value="">2 Lit</option>
														<option value="">3 Lit</option>
														<option value="">4 Lit</option>
														<option value="">5 Lit</option>
														<option value="">6 Lit</option>
														<option value="">8 Lit</option>
														<option value="">10 Lit</option>
														<option value="">12 Lit</option>
														<option value="">14 Lit</option>
													</select>
													<i></i>
												</label>
											</div>
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
										
										<h3>Dishwashers</h3>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Noise Level
													<sup data-toggle="tooltip" title="" data-original-title="Noise Level">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Weight">
														<img src="j-folder/img/noise.png" alt="Noise" title="Noise Icon">
													</label>
													<input type="text" id="noise" name="noise" placeholder="Enter Noise Level">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Voltage
													<sup data-toggle="tooltip" title="" data-original-title="Voltage">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Voltage">
														<img src="j-folder/img/voltage.png" alt="Voltage" title="Voltage Icon">
													</label>
													<input type="text" id="weight" name="weight" placeholder="Enter Voltage">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Indicator
													<sup data-toggle="tooltip" title="" data-original-title="Power Indicator">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="powerind">
														<option value="none" selected disabled="">Select Power Indicator</option>
														<option value="">Yes</option>
														<option value="">No</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Weight
													<sup data-toggle="tooltip" title="" data-original-title="Weight & Dimensions">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Weight">
														<img src="j-folder/img/weight.png" alt="Weight" title="Weight Icon">
													</label>
													<input type="text" id="weight" name="weight" placeholder="Enter Weight & Dimensions">
												</div>
											</div>
										</div>
										
										<hr class="separator">
										
										<h3>Laptop & Computers</h3>
										
										<h3>Laptops</h3>
										
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

        