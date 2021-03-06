<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">Adrenewals History</a></li>
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
			<?php echo ($this->session->flashdata('msg'))?$this->session->flashdata('msg'):''?>
		</p>
	</div>
	<br>
	<?php }?>
	<div style='margin-bottom:10px;margin-right:25px; float:right; width: 100%;' >
		<div class="row-fluid ">
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white user"></i><span class="break"></span>Adrenewals History</h2>
				</div>
				<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
							<tr>
								<th>S NO</th>
								<th>AD ID</th>
								<th>Package From</th>
								<th>Package to</th>
								<th>Urgent label to</th>
								<th>Urgent label to</th>
								<th>Paid</th>
								<th>Updated on</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 0;
								foreach($ad_details as $val){$i++; ?>
								<tr class="odd gradeX">
									<td> <?php echo $i;?></td>
									<td> <?php echo $val->ad_id;?></td>
									<td> <?php echo $val->pckfrom;?></td>
									<td> <?php echo $val->pckto;?></td>
									<td> <?php echo $val->urgfrom;?></td>
									<td> <?php echo $val->urgto;?></td>
									<td> <?php echo $val->transid;?></td>
									<td> <?php echo $val->updatedon;?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>