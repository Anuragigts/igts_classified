
<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">contact details </a></li>
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
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Contact details</h2>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Sno</th>
							<th>User name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Mobile</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach ($nl_data as $nl_dataval) { ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td style='word-break: break-all;'><?php echo $nl_dataval->cname; ?></td>
								<td style='word-break: break-all;'><?php echo $nl_dataval->email; ?></td>
								<td style='word-break: break-all;'><?php echo $nl_dataval->msg; ?></td>
								<td style='word-break: break-all;'><?php echo $nl_dataval->mobile; ?></td>
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