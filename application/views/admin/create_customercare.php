<div class="row">
	<div class="col-lg-12">
		<div class="page-title">
			<h1>Create Customer Care
				<small>Create Customer Care</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?= base_url();?>admin_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="<?= base_url();?>customercare"> Customer Care</a></li>
				<li class="active">Create Customer Care</li>
			</ol>
		</div>
	</div>
</div>
<div class="row">
	<div class="portlet portlet-default">
		<div class="portlet-heading">
			<div class="portlet-title">
				<h4>Create Customer Care</h4>
			</div>
			<div class="portlet-widgets">
				<span class="divider"></span>
				<a data-toggle="collapse" data-parent="#accordion" href="#defaultPortlet"><i class="fa fa-chevron-down"></i></a>
			</div>
			<div class="clearfix"></div>
		</div>
		<div id="defaultPortlet" class="panel-collapse collapse in">
			<div id="validationExamples" class="portlet-body">
				<?php $this->load->view("admin/success_error");?>
				<form class="form-horizontal" id="validate" method="post">
					<div class="form-group">
						<div class="col-lg-6">
							<label>First Name <span class="text-red">*</span></label>
							<input type="text" name="first_name" value="<?php echo set_value("first_name");?>" class="form-control" placeholder="First Name" onkeypress="return onlyAlpha(event);"/> 
							<?php echo form_error("first_name");?>
						</div>
						<div class="col-lg-6">
							<label>Last Name <span class="text-red">*</span></label>
							<input type="text" name="last_name" value="<?php echo set_value("last_name");?>" class="form-control" placeholder="Last Name" onkeypress="return onlyAlpha(event);"/>
							<?php echo form_error("last_name");?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-6">
							<label>Email Id <span class="text-red">*</span></label>
							<input type="email" name="email" value="<?php echo set_value("email");?>" class="form-control cemail" placeholder="Email Id"/>
							<?php echo form_error("email");?><span class="text-red namrem"></span>
						</div>
						<div class="col-lg-6">
							<label>Mobile No.</label>
							<input type="text" name="mobile" value="<?php echo set_value("mobile");?>" class="form-control" placeholder="Mobile No." ruleset="[^0-9]" onkeyup="validateR(this, '')"  maxlength="10"/>
							<?php echo form_error("mobile");?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-6">
							<label>Password <span class="text-red">*</span></label>
							<input type="password" name="password" class="form-control" placeholder="Password"/>
							<?php echo form_error("password");?>
						</div>
						<div class="col-lg-6">
							<label>Confirm Password <span class="text-red">*</span></label>
							<input type="password" name="con_password"  class="form-control" placeholder="Confirm Password"/>
							<?php echo form_error("con_password");?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-6">
							<label>House No. <span class="text-red">*</span></label>
							<input type="text" name="houseno" value="<?php echo set_value("houseno");?>" class="form-control" placeholder="House No."/>
							<?php echo form_error("houseno");?>
						</div>
						<div class="col-lg-6">
							<label>Street</label>
							<input type="text" name="street" value="<?php echo set_value("street");?>" class="form-control" placeholder="Street"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-6">
							<label>Land Mark</label>
							<input type="text" name="landmark" value="<?php echo set_value("landmark");?>" class="form-control" placeholder="Land Mark"/>
						</div>
						<div class="col-lg-6">
							<label>Telephone No.</label>
							<input type="text" name="phone" value="<?php echo set_value("phone");?>" class="form-control" placeholder="Telephone No." ruleset="[^0-9]" onkeyup="validateR(this, '')"  maxlength="12"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-6">
							<label>Zip Code <span class="text-red">*</span></label>
							<input type="text" name="zipcode" value="<?php echo set_value("zipcode");?>" class="form-control" placeholder="Zip Code" ruleset="[^0-9]" onkeyup="validateR(this, '')"  maxlength="6"/>
							<?php echo form_error("zipcode");?>
						</div>
						<div class="col-lg-6">
							<label>Country <span class="text-red">*</span></label>
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
						<div class="col-lg-6">
							<label>State <span class="text-red">*</span></label>
							<select class="form-control state" name="state">
								<option value="">-- Select State --</option>
								<?php foreach ($scty as $sct){ ?>
								<option value="<?php echo $sct->State_id;?>"><?php echo $sct->State_name;?></option>
								<?php } ?>
							</select>
							<?php echo form_error("state");?>
						</div>
						<div class="col-lg-6">
							<label>City <span class="text-red">*</span></label>
							<select class="form-control city" name="city">
								<option value="">-- Select City --</option>
								<?php foreach ($city as $cti){ ?>
								<option value="<?php echo $cti->City_id;?>"><?php echo $cti->City_name;?></option>
								<?php } ?>
							</select>
							<?php echo form_error("city");?>
						</div>
					</div>
					<div class="form-group text-center">
						<input type="submit" class="btn btn-default" value="Save" name="create_customer"/>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>