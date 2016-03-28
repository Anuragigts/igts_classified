<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">De-activated Accounts </a></li>
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
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>De-activated Account Details</h2>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Sno</th>
							<th>User name</th>
							<th>Email</th>
							<th>Reason Title</th>
							<th>Message/URL</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach ($nl_data as $nl_dataval) { ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $nl_dataval->first_name; ?></td>
								<td><?php echo $nl_dataval->login_email; ?></td>
								<td><?php echo str_replace("_", " ", $nl_dataval->reason_title); ?></td>
								<td><?php
								if (strpos($nl_dataval->msg_url, "//")) { ?>
										<a href="<?php echo $nl_dataval->msg_url; ?>"><?php echo $nl_dataval->msg_url; ?></a> 
								<?php }
								else{
									 echo $nl_dataval->msg_url;
								}
								 ?></td>
							</tr>
						<?php $i++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
</div>