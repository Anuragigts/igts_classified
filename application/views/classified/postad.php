<div class="inner-head ">
                <div class="container">
                   <!--  <h1 class="entry-title">Post Ad</h1>
                    <p class="description">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.
                    </p>
                    <div class="breadcrumb">
                        <ul class="clearfix">
                            <li class="ib"><a href="">Home</a></li>
                            <li class="ib current-page"><a href="">Post Ad</a></li>
                        </ul>
                    </div> -->
                </div><!-- End container -->
            </div><!-- End Inner Page Head -->
<div class="main-container">
	<div class="container">
		<div class="row">
			<div class="col-md-9 page-content">
				<div class="inner-box category-content">
					<h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post a Free Classified Ad</strong> </h2>
					<div class="row">
						<div class="col-sm-12">
                                                    <?php $this->load->view("classified_layout/success_error");?>
                                                    <form class="form-horizontal" method="post" novalidate="" enctype="multipart/form-data">
								<fieldset>
									<div class="form-group">
                                                                            <label class="col-md-3 control-label">Category <span class="text-red">*</span></label>
										<div class="col-md-8">
                                                                                    <select name="cat" class="form-control cat_chage">
                                                                                        <option value=""> -- Select Category -- </option>
                                                                                        <?php foreach($cat as $ct){ ?>
                                                                                        <option value="<?php echo $ct->category_id;?>"><?php echo ucfirst($ct->category_name);?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                    <?php echo form_error("cat");?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Sub Category <span class="text-red">*</span></label>
										<div class="col-md-8">
                                                                                    <select name="scat" class="form-control scat_chage">
                                                                                        <option value=""> -- Select Sub Category -- </option>
                                                                                        <?php foreach($scat as $cst){ ?>
                                                                                        <option value="<?php echo $cst->sub_category_id;?>"><?php echo ucfirst($cst->sub_category_name);?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                    <?php echo form_error("scat");?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Sub Sub Category <span class="text-red">*</span></label>
										<div class="col-md-8">
                                                                                    <select name="sscat" class="form-control sscat_chage">
                                                                                        <option value=""> -- Select Sub Sub Category -- </option>
                                                                                        <?php foreach($sscat as $csst){ ?>
                                                                                        <option value="<?php echo $csst->sub_subcategory_id;?>"><?php echo ucfirst($csst->sub_subcategory_name);?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                    <?php echo form_error("sscat");?>
										</div>
									</div>
                                                                        <!--
									<div class="form-group">
										<label class="col-md-3 control-label">Add Type</label>
										<div class="col-md-8">
											<label class="radio-inline" for="radios-0">
											<input name="radios" id="radios-0" value="Private" checked="checked" type="radio">
											Private </label>
											<label class="radio-inline" for="radios-1">
											<input name="radios" id="radios-1" value="Business" type="radio">
											Business </label>
										</div>
									</div>
                                                                        -->
									<div class="form-group">
										<label class="col-md-3 control-label" for="Adtitle">Ad title <span class="text-red">*</span></label>
										<div class="col-md-8">
											<input id="Adtitle" name="ad_title" placeholder="Ad title" value="<?php echo set_value("ad_title");?>" class="form-control input-md" required="" type="text">
											<?php echo form_error("ad_title");?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="textarea">Describe ad <span class="text-red">*</span> </label>
										<div class="col-md-8">
                                                                                    <textarea class="form-control" id="textarea" name="desc" placeholder="Describe what makes your ad unique"><?php echo set_value("desc");?></textarea>
                                                                                        <?php echo form_error("desc");?>
										</div>
									</div>
                                                                        <div class="form-group">
										<label class="col-md-3 control-label" for="Ad Url">Ad URL </label>
										<div class="col-md-8">
											<input id="Adurl" name="ad_url" placeholder="Ad URL" value="<?php echo set_value("ad_url");?>" class="form-control input-md" required="" type="text">
											<?php echo form_error("ad_url");?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="Price">Price <span class="text-red">*</span></label>
										<div class="col-md-4">
											<div class="input-group"> <span class="input-group-addon">&#8377;</span>
                                                                                            <input id="Price" name="price" class="form-control" placeholder="Price" required="" type="text" value="<?php echo set_value("price");?>">
											</div>
                                                                                        <?php echo form_error("price");?>
										</div>
										<div class="col-md-4">
											<div class="checkbox">
												<!--<label><input type="checkbox">Negotiable </label>-->
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="textarea"> Picture </label>
										<div class="col-md-8">
											<div class="mb10">
												<input id="input-upload-img1" name="files1" type="file" class="file" data-preview-file-type="text">
											</div>
											<div class="mb10">
												<input id="input-upload-img2" name="files2" type="file" class="file" data-preview-file-type="text">
											</div>
											<div class="mb10">
												<input id="input-upload-img3" name="files3" type="file" class="file" data-preview-file-type="text">
											</div>
											<div class="mb10">
												<input id="input-upload-img4" name="files4" type="file" class="file" data-preview-file-type="text">
											</div>
											<div class="mb10">
												<input id="input-upload-img5" name="files5"type="file" class="file" data-preview-file-type="text">
											</div>
											<div class="mb10">
												<input id="input-upload-img6" name="files6"type="file" class="file" data-preview-file-type="text">
											</div>
											<div class="mb10">
												<input id="input-upload-img7" name="files7"type="file" class="file" data-preview-file-type="text">
											</div>
											<div class="mb10">
												<input id="input-upload-img8" name="files8"type="file" class="file" data-preview-file-type="text">
											</div>
											<div class="mb10">
												<input id="input-upload-img9" name="files9"type="file" class="file" data-preview-file-type="text">
											</div>
											<p class="help-block">Add up to 9 photos. Use a real image of your product, not catalogs.</p>
										</div>
									</div>
									<div class="content-subheading"> <i class="icon-user fa"></i> <strong>Seller information</strong> </div>
                                                                        <div class="form-group">
										<label class="col-md-3 control-label" for="textinput-name">Address</label>
										<div class="col-md-8">
                                                                                        <?php 
                                                                                        if(count($address) > 0){
                                                                                            echo "These are the Addresses that we found from our records based on your Email Id.If you want to use any of them please check them for your Ad";
                                                                                        }
                                                                                        foreach ($address as $ad){ ?>
                                                                                            <div class="col-md-6" style="padding-bottom: 20px;">                                                                                                 
                                                                                                <?php  if($ad->is_default == 1){ ?>
                                                                                                        <div class="checkbox-inline">
                                                                                                            <input type="checkbox" name="checkaddr" class="checkbox checkaddr" value="<?php echo $ad->address_id;?>"/>
                                                                                                            <h4 class='text-16A085'>Default Address</h4>
                                                                                                        </div>
                                                                                                <?php }else{ ?>
                                                                                                        <div class="checkbox-inline">
                                                                                                            <input type="checkbox" name="checkaddr" class="checkbox checkaddr" value="<?php echo $ad->address_id;?>"/>
                                                                                                            <h4>Other Address</h4>
                                                                                                        </div>
                                                                                                <?php } ?>  
                                                                                                <br/>
                                                                                                    <?php echo "<b>City :</b> ".$ad->City_name;?><br/>
                                                                                                    <?php echo "<b>State :</b> ".$ad->State_name;?><br/>
                                                                                                    <?php echo "<b>Country :</b> ".$ad->Country_name;?><br/>
                                                                                                    <?php echo "<b>Zip code :</b> ".$ad->zip_code;?><br/>
                                                                                            </div>
                                                                                        <?php 
                                                                                        }
                                                                                        ?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="seller-email"> Seller Email</label>
										<div class="col-md-8">
                                                                                    <input id="seller-email" name="seller-email" class="form-control" placeholder="Email" value="<?php echo $this->session->userdata("login_email");?>" required="" type="text">
											<?php echo form_error("seller-email");?>
                                                                                        <div class="checkbox">
												<label>
												<input type="checkbox" value="">
												<small> Hide the phone number on this ads.</small> </label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="seller-Number">Phone Number </label>
										<div class="col-md-8">
											<input id="seller-Number" name="seller-number" value="<?php echo set_value("seller-number");?>" placeholder="Phone Number" class="form-control input-md"  required="" type="text" ruleset="[^0-9]" onkeyup="validateR(this, '')"  maxlength="10">
                                                                                        <?php echo form_error("seller-number");?>
                                                                                </div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="zipcode">Zip Code <span class="text-red">*</span></label>
										<div class="col-md-8">
                                                                                    <input type="text" class="form-control zip" value="<?php echo set_value("zipcode");?>" name="zipcode" placeholder="Zip Code"  ruleset="[^0-9]" onkeyup="validateR(this, '')"  maxlength="6">
                                                                                        <?php echo form_error("zipcode");?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="seller-area">Country <span class="text-red">*</span></label>
										<div class="col-md-8">
											<select class="form-control country" name="cty">
                                                                                            <option value="">-- Select Country --</option>
                                                                                            <?php foreach ($cty as $ct){ ?>
                                                                                                    <option value="<?php echo $ct->Country_id;?>"><?php echo ucfirst(strtolower($ct->Country_name));?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                        <?php echo form_error("cty");?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="seller-area">State <span class="text-red">*</span></label>
										<div class="col-md-8">
											<select class="form-control state" name="state">
                                                                                            <option value="">-- Select State --</option>
                                                                                            <?php foreach ($scty as $sct){ ?>
                                                                                                    <option value="<?php echo $sct->State_id;?>"><?php echo $sct->State_name;?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                        <?php echo form_error("state");?>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="seller-area">City <span class="text-red">*</span></label>
										<div class="col-md-8">
                                                                                    <select class="form-control city" name="city">
                                                                                        <option value="">-- Select City --</option>
                                                                                        <?php foreach ($city as $cti){ ?>
                                                                                                <option value="<?php echo $cti->City_id;?>"><?php echo $cti->City_name;?></option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                    <?php echo form_error("city");?>
										</div>
									</div>
									<div class="well">
										<h3><i class=" icon-certificate icon-color-1"></i> Make your Ad Premium </h3>
										<p>Premium ads help sellers promote their product or service by getting their ads more visibility with more
											buyers and sell what they want faster. <a href="help.html">Learn more</a>
										</p>
										<div class="form-group">
                                                                                    <?php echo form_error("pay_check[]");?>
											<table class="table table-hover checkboxtable">
												<?php 
                                                                                                foreach ($avid as $ad){ ?>
                                                                                                <tr>
                                                                                                    <td>
                                                                                                        <!--<div class="radio">-->
                                                                                                            <label>
                                                                                                                <input type="checkbox" name="pay_check[]" value="<?php echo $ad->ad_valid_name;?>" <?php  if(strtolower($ad->ad_valid_name) == "free"){ echo "checked='checked' readonly = 'readonly'";} else{ echo set_checkbox('pay_check[]', $ad->ad_valid_id); }?> price="<?php echo $ad->price;?>" class="checkbox-inline pay_check">
                                                                                                            <strong><?php echo $ad->ad_valid_name;?> </strong> </label>
                                                                                                        <!--</div>-->
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        No. of Days : <?php echo $ad->days; ?>
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        <p>&#8377; <?php echo $ad->price;?></p>
                                                                                                    </td>
												</tr>
                                                                                                <?php } ?>
												<tr>
													<td>
														<div class="form-group">
															<div class="col-md-8">
																<select class="form-control" name="Method" id="PaymentMethod">
																	<option value="2">Select Payment Method</option>
																	<option value="3">Credit / Debit Card </option>
																	<option value="5">Paypal</option>
																</select>
															</div>
														</div>
													</td>
                                                                                                        <td>
                                                                                                            
                                                                                                        </td>
													<td>
                                                                                                            <p> <strong>Payable Amount : &#8377; <span class='pay'>0.00</span></strong></p>
													</td>
												</tr>
											</table>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Terms</label>
										<div class="col-md-8">
											<label class="checkbox-inline" for="checkboxes-0">
											<input name="checkboxes" id="checkboxes-0" value="Remember above contact information." type="checkbox">
											Remember above contact information. </label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label"></label>
                                                                                <div class="col-md-8"> <input  type="submit" name="postad" id="button1id" class="btn btn-success btn-lg" value="Submit">
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="col-md-3 reg-sidebar">
				<div class="reg-sidebar-inner text-center">
					<div class="promo-text-box">
						<i class=" icon-picture fa fa-4x icon-color-1"></i>
						<h3><strong>Post a Free Classified</strong></h3>
						<p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
					</div>
					<div class="panel sidebar-panel">
						<div class="panel-heading uppercase"><small><strong>How to sell quickly?</strong></small></div>
						<div class="panel-content">
							<div class="panel-body text-left">
								<ul class="list-check">
									<li> Use a brief title and description of the item </li>
									<li> Make sure you post in the correct category</li>
									<li> Add nice photos to your ad</li>
									<li> Put a reasonable price</li>
									<li> Check the item before publish</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</div>