<!-- begin PAGE TITLE AREA -->
<!-- Use this section for each page's title and breadcrumb layout. In this example a date range picker is included within the breadcrumb. -->
	<div id="content" class="span9">
		<ul class="breadcrumb">
			<li><a href="<?= base_url();?>admin_dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
			<li class="active">Change Password</li>
		</ul>
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white user"></i><span class="break"></span>Change Password</h2>
					<div class="box-icon">
						<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
					</div>
				</div>
				<div class="portlet portlet-default">
					<div id="defaultPortlet" class="panel-collapse collapse in">
						<div id="validationExamples" class="portlet-body">
							<?php $this->load->view("admin/success_error");?>
							<form class="form-horizontal" id="validate" method="post">
							<fieldset>
							   <div class="control-group">
							  <div class="span4" style='height:55px;'></div>
								<div class="span4">
								<label class='control-label' >Password <span class="text-red">*</span></label>
								<input type="password" name="password" class="input-xlarge focused" placeholder="Password"/> 
								</div>
							  </div>
							  
								 <div class="control-group">
									<div class="span4" style='height:55px;'></div>
									<div class="span4">
										<label class='control-label'>Confirm Password <span class="text-red">*</span></label>
										<input type="password" name="cpassword" placeholder="Confirm Password"/>
										<?php echo form_error("cpassword");?>
									</div>
									<div class="span4" style='height:55px;'></div>
								</div>
								<div class="control-group text-center">
									<input type="submit" class="btn btn-default" value="Save" name="change"/>
								</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
