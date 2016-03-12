<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">Profile </a></li>
	</ul>
	<?php if($this->session->flashdata('err') != ''){?>
	<div class="alert alert-block alert-danger fade in">
		<button data-dismiss="alert" class="close" type="button">
		×
		</button>
		<p>
			<?php echo ($this->session->flashdata('err'))?$this->session->flashdata('err'):''?>
		</p>
	</div>
	<br>
	<?php }?>
	<?php if($this->session->flashdata('msg') != ''){?>
	<div class="alert alert-block alert-info fade in no-margin">
		<button data-dismiss="alert" class="close" type="button">
		×
		</button>
		<p>
			<?php echo ($this->session->flashdata('err'))?$this->session->flashdata('err'):''?>
		</p>
	</div>
	<br>
	<?php }?>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>View Profile</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action='<?php echo current_url();?>' method='post'>
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="staff_f_name"> First Name</label>
							<div class="controls">
								<label class="control-label" for="login_email"><?php echo ucwords($profile->first_name); ?></label>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="staff_l_name"> Last Name</label>
							<div class="controls">
								<label class="control-label" for="login_email"><?php echo ucwords($profile->lastname); ?></label>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="login_email"> Email Id</label>
							<div class="controls">
								<label class="control-label" for="login_email"><?php echo $profile->login_email; ?></label>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="con_number">Contact Number</label>
							<div class="controls">
								<label class="control-label" for="login_email"><?php echo $profile->mobile; ?></label>
							</div>
						</div>
						<div class="form-actions">
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