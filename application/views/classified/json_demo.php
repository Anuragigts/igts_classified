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
	<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script type="text/javascript">
	$(function() {
		$(".json_demo").change(function(){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>sample1/json_demo",
				dataType: "json",
				data: {
					vrm: $(".json_demo").val()
				},
				success: function (data) {
					alert(data.make);	
					// alert(data);	
				}
			})
		});
	});
		</script>

	
	
	



	
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
		
		<div class='content_info'>
			<div class='paddings-mini'>
				<!-- content-->
				<div class='container'>
					<div class='row'>
						<div class='col-sm-8 col-md-offset-2 activate_signup'>
							<div class='row'>
								<div class="col-sm-6">
									<img src="<?php echo base_url(); ?>img/99rightdeal.png"  class="" alt="Logo" title="99 Right Deals">
								</div>
								<div class="col-sm-6">
									<div class='titles pull-right'>
										<h2><span>WELCOME </span></h2>
										<input type="text" class="json_demo" name="json_demo" placeholder="Enter json_demo">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
										
										<h4>Home and Kitchen Category Application</h4>
										
										<div class="j-row">
											<div class="span12 unit">
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_motbike" id="next-step-radio" value="Seller">
															<i></i>Seller
															<sup data-toggle="tooltip" title="" data-original-title="Seller">
																<img src="img/icons/i.png" alt="Help" title="Help Label">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="Needed">
															<i></i>Needed
															<sup data-toggle="tooltip" title="" data-original-title="Needed">
																<img src="img/icons/i.png" alt="Help" title="Help Label">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="Needed">
															<i></i>Charity
															<sup data-toggle="tooltip" title="" data-original-title="Charity">
																<img src="img/icons/i.png" alt="Help" title="Help Label">
															</sup>
														</label>
													</div>
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand Name
													<sup data-toggle="tooltip" title="" data-original-title="Brand Name">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="brandname">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brandname" name="brandname" placeholder="Enter Brand Name">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Material
													<sup data-toggle="tooltip" title="" data-original-title="Material">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Material">
														<img src="j-folder/img/material.png" alt="Material" title="Material Icon" class="img-responsive">
													</label>
													<input type="text" id="material" name="material" placeholder="Enter Material">
												</div>
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
											<div class="span6 unit">
												<label class="label">Assembly
													<sup data-toggle="tooltip" title="" data-original-title="Assembly">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="assembly">
														<img src="j-folder/img/assembly.png" alt="assembly" title="Assembly Icon" class="img-responsive">
													</label>
													<input type="text" id="assembly" name="assembly" placeholder="Enter Assembly">
												</div>
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
													<input type="text" id="capacity" name="capacity" placeholder="Enter Capacity">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Item Conditions 
													<sup data-toggle="tooltip" title="" data-original-title="Item Conditions ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="itemconditions">
														<option value="none" selected disabled="">Select Item Conditions </option>
														<option value="">Good</option>
														<option value="">Bad</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Warranty 
													<sup data-toggle="tooltip" title="" data-original-title="Warranty">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="warranty">
														<img src="j-folder/img/warranty.png" alt="warranty" title="warranty" class="img-responsive">
													</label>
													<input type="text" id="warranty" name="warranty" placeholder="Enter Warranty">
												</div>
											</div>
										</div>
										
										<h4>E-Zone Category</h4>
										
										<div class="j-row">
											<div class="span12 unit">
												<div class="unit check logic-block-radio">
													<div class="inline-group">
														<label class="radio">
															<input type="radio" name="checkbox_motbike" id="next-step-radio" value="Seller">
															<i></i>Seller
															<sup data-toggle="tooltip" title="" data-original-title="Seller">
																<img src="img/icons/i.png" alt="Help" title="Help Label">
															</sup>
														</label>
														<label class="radio">
															<input type="radio" name="checkbox_motbike"  value="Needed">
															<i></i>Needed
															<sup data-toggle="tooltip" title="" data-original-title="Needed">
																<img src="img/icons/i.png" alt="Help" title="Help Label">
															</sup>
														</label>
													</div>
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Brand Name
													<sup data-toggle="tooltip" title="" data-original-title="Brand Name">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="brandname">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="brandname" name="brandname" placeholder="Enter Brand Name">
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
												<label class="label">Model Name 
													<sup data-toggle="tooltip" title="" data-original-title="Model Name">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="modelname">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="modelname" name="modelname" placeholder="Enter Model Name">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Operating System
													<sup data-toggle="tooltip" title="" data-original-title="Operating System">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="opersys">
														<i class="fa fa-laptop"></i>
													</label>
													<input type="text" id="opersys" name="opersys" placeholder="Enter Operating System">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Made In 
													<sup data-toggle="tooltip" title="" data-original-title="Made In ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Made In">
														<img src="j-folder/img/madein.png" alt="Made In" title="Made In Icon" class="img-responsive">
													</label>
													<input type="text" id="madein" name="madein" placeholder="Enter Made in">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Storage
													<sup data-toggle="tooltip" title="" data-original-title="Storage">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="storage">
														<option value="none" selected disabled="">Select Storage</option>
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
											<div class="span6 unit">
												<label class="label">Warranty 
													<sup data-toggle="tooltip" title="" data-original-title="Warranty">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="warranty">
														<img src="j-folder/img/warranty.png" alt="warranty" title="warranty" class="img-responsive">
													</label>
													<input type="text" id="warranty" name="warranty" placeholder="Enter Warranty">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Manufacturer part number 
													<sup data-toggle="tooltip" title="" data-original-title="Manufacturer part number ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="manufacture">
														<img src="j-folder/img/manufacture.png" alt="manufacture" title="Manufacture" class="img-responsive">
													</label>
													<input type="text" id="manufacture" name="manufacture" placeholder="Enter Manufacturer part number ">
												</div>
											</div>
										</div>
										
										<h4>Motor Point Category Application _Farming and Plant Michinary</h4>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Manufacture 
													<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="manufacture">
														<img src="j-folder/img/manufacture.png" alt="manufacture" title="manufacture Icon" class="img-responsive">
													</label>
													<input type="text" id="manufacture" name="manufacture" placeholder="Enter Manufacture" value='' readonly>
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Year
													<sup data-toggle="tooltip" title="" data-original-title="Year">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="year_boat">
														<img src="j-folder/img/reg.png" alt="year" title="year Icon" class="img-responsive">
													</label>
													<input type="text" id="year_boat" name="year_boat" placeholder="Enter Year" onkeypress="return isNumber(event)">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Model 
													<sup data-toggle="tooltip" title="" data-original-title="Model ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Model" class='car_model'>
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
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
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Condition 
													<sup data-toggle="tooltip" title="" data-original-title="Condition">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Condition">
														<option value="none" selected disabled="">Select condition</option>
														<option value="Excellent">Excellent</option>
														<option value="Good">Good</option>
														<option value="Average">Average</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										
										<h3>Jobs Category</h3>
										
										<div class="j-row">
											<div class="span6 unit"><!-- start Deal Tag -->
												<label class="label">Job Tag / Caption 
													<sup data-toggle="tooltip" title="" data-original-title="Postal">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="dealtag">
														<img src="j-folder/img/dealtag.png" alt="dealtag" title="Dealtag">
													</label>
													<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
												</div>
											</div><!-- end Deal Tag -->
										</div>
										
										<div class="j-row">
											<div class="span12 unit"><!-- start Deal Description -->
												<label class="label">Job Description 
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
																<img src="j-folder/img/price.png" alt="price" title="Price">
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
											<div class="span6 unit">
												<label class="label">Type of Job
													<sup data-toggle="tooltip" title="" data-original-title="Type of Job">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="typeofjob">
														<option value="none" selected disabled="">Select Type of Job</option>
														<option value="Negotiable">Java</option>
														<option value="Fixed">Phone gap</option>
														<option value="Fixed">Web Developer</option>
														<option value="Fixed">Web Designer</option>
														<option value="Fixed">Software Developer</option>
														<option value="Fixed">Graphic Designer</option>
														<option value="Fixed">Tester</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Salary Min
													<sup data-toggle="tooltip" title="" data-original-title="Salary Min">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="salarymin">
														<img src="j-folder/img/price.png" alt="price" title="Price">
													</label>
													<input type="text" id="salarymin" name="salarymin" placeholder="Enter Salary Min">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Salary Max
													<sup data-toggle="tooltip" title="" data-original-title="Salary Max">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="salarymax">
														<img src="j-folder/img/price.png" alt="price" title="Price">
													</label>
													<input type="text" id="salarymax" name="salarymax" placeholder="Enter Salary Max">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Salary type
													<sup data-toggle="tooltip" title="" data-original-title="Salary type">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="salarytype">
														<option value="none" selected disabled="">Select Salary type</option>
														<option value="">Year</option>
														<option value="">Month</option>
														<option value="">Hour</option>
														<option value="">Week</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Suitable skill
													<sup data-toggle="tooltip" title="" data-original-title="Suitable skill">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="suitableskils">
														<img src="j-folder/img/skill.png" alt="skill" title="Skill">
													</label>
													<input type="text" id="suitableskils" name="suitableskils" placeholder="Enter Suitable skill">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Position  for
													<sup data-toggle="tooltip" title="" data-original-title="Position  for">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="positionfor">
														<option value="none" selected disabled="">Select Position  for</option>
														<option value="">Fresher</option>
														<option value="">Experience</option>
														<option value="">Internship</option>
														<option value="">Contract</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Company Name
													<sup data-toggle="tooltip" title="" data-original-title="Company Name">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="companyname">
														<img src="j-folder/img/company.png" alt="company" title="Company Name">
													</label>
													<input type="text" id="companyname" name="companyname" placeholder="Enter Company Name">
												</div>
											</div>
										</div>
										
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
														<img src="j-folder/img/dealtag.png" alt="dealtag" title="Dealtag">
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
														<img src="j-folder/img/screensize.png" alt="Screen" title="Screen Icon">
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
											<div class="span6 unit"><!-- start Deal Tag -->
												<label class="label">Deal Tag / Caption 
													<sup data-toggle="tooltip" title="" data-original-title="Postal">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="dealtag">
														<img src="j-folder/img/dealtag.png" alt="dealtag" title="Dealtag">
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

        