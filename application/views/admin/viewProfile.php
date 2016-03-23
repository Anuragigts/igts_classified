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
					<!-- <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a> -->
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action='<?php echo current_url();?>' method='post'>
					<fieldset>
						<table class="table table-striped table-bordered">
							<tbody>
								<tr>
									<th>First Name</th>
									<td><?php echo ucwords($profile->first_name); ?></td>
								</tr>
								<tr>
									<th>Last Name</th>
									<td><?php echo ucwords($profile->lastname); ?></td>
								</tr>
								<tr>
									<th>Email Id</th>
									<td><?php echo ucwords($profile->login_email); ?></td>
								</tr>
								<tr>
									<th>Contact Number</th>
									<td><?php echo ucwords($profile->mobile); ?></td>
								</tr>
							</tbody>
						</table>
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