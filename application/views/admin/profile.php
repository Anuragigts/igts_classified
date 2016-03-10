<div class="row">
	<div class="col-lg-12">
		<div class="page-title">
			<h1>My Profile
				<small>My Profile</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?= base_url();?>admin_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">My Profile</li>
			</ol>
		</div>
	</div>
</div>

<div class="row">
	<div class="portlet portlet-default">
		<div class="portlet-heading">
			<div class="portlet-title">
				<h4>My Profile</h4>
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
				
			</div>
		</div>
	</div>
</div>