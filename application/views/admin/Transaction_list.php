<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">Transaction List</a></li>
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
	<div style='margin-bottom:10px;margin-right:25px; float:right;' >
		<?php  echo '<pre>';print_r($tran_details[0]);echo '</pre>';?>
		<div class="row-fluid ">
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white user"></i><span class="break"></span>List of Transaction Done</h2>
					<div class="box-icon">
						<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
					</div>
				</div>
				<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
							<tr>
								<th>Transaction Id</th>
								<th>Deal Tag </th>
								<th>User id</th>
								<th>User Name</th>
								<th>Done On</th>
								<th>E-Mail</th>
								<th>Gross Amount</th>
								<!--<th>Transaction Charge</th>-->
								<th>Payment Status</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 0;
								foreach($tran_details as $users){$i++; ?>
							<tr class="odd gradeX">
								<td> <?php echo $users->txn_id;?></td>
								<td> <?php echo ucwords($users->deal_tag);?></td>
								<td> <?php echo $users->login_id;?></td>
								<td><?php echo ucwords($users->first_name).'&nbsp;'.ucwords($users->lastname);?></td>
								<td><?php echo$users->payment_date;?></td>
								<td><?php echo $users->login_email;?></td>
								<td><?php echo $users->gross_amt;?></td>
								<!--<td><?php echo $users->mc_fee;?></td>-->
								<td><?php if($users->payment_status == 'Completed')echo "<span style='color:green'>Success</span>"; else echo 'Pending';?></td>
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