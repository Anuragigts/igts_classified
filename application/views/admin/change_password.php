<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li>Change Password</li>
	</ul>
	<div class="row-fluid sortable2">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>Change Password</h2>
				<div class="box-icon">
				
				</div>
			</div>
			<div class="portlet portlet-default">
				<div id="defaultPortlet" class="panel-collapse collapse in">
					<div id="validationExamples" class="portlet-body">
						<?php $this->load->view("admin/success_error");?>
						<form class="form-horizontal" id="validate" method="post" action = "<?php echo current_url(); ?>">
							<fieldset>
								<div class="control-group">
									<div class="span4" style='height:55px;'></div>
									<div class="span4">
										<label class='control-label'> Old Password <span class="text-red">*</span></label>
										<input type="password" name="old_password" placeholder="Old Password"/>
										<span style='color:red'><?php echo form_error("old_password");?></span>
									</div>
									<div class="span4" style='height:55px;'></div>
								</div>
								<div class="control-group">
									<div class="span4" style='height:55px;'></div>
									<div class="span4">
										<label class='control-label'> New Password <span class="text-red">*</span></label>
										<input type="password" name="password" placeholder="Password"/>
										<span style='color:red'><?php echo form_error("password");?></span>
									</div>
									<div class="span4" style='height:55px;'></div>
								</div>
								<div class="control-group">
									<div class="span4" style='height:55px;'></div>
									<div class="span4">
										<label class='control-label'>Confirm Password <span class="text-red">*</span></label>
										<input type="password" name="cpassword" placeholder="Confirm Password"/>
										<span style='color:red'><?php echo form_error("cpassword");?></span>
									</div>
									<div class="span3" style='height:55px;'></div>
								</div>
								<div class="control-group text-center">
									<input type="submit" class="btn btn-default" value="Update" name="change"/>
									<a href='<?php echo SITE_URL; ?>admin_dashboard' class="btn">Cancel</a>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>