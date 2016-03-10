<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">Package Details List</a></li>
	</ul>
	<?php //echo '<pre>';print_r($packages_details[0]);echo '</pre>';?>
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
		<a href='<?php echo base_url();?>category/addNewPackage' class='btn btn-success'>Add New</a>
	</div>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>List of Packages Details</h2>
				<div class="box-icon">
				
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>S.No.</th>
							<th>Package Name</th>
							<th>Duration Days</th>
							<th>Image Count</th>
							<th>Bump Home</th>
							<th>Bump Search</th>
							<th>Price Type</th>
							<th>Cost Euro</th>
							<th>Cost Pound</th>
							<th>Likes Limit</th>
							<th>Created On</th>
							<th style='width:55px;'>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$i = 0;
							foreach($packages_details as $pkg){$i++; ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo ucwords($pkg->pkg_dur_name);?></td>
							<td><?php echo $pkg->dur_days.' Days';?></td>
							<td><?php echo $pkg->img_count;?></td>
							<td><?php echo $pkg->bump_home;?></td>
							<td><?php echo $pkg->bump_search;?></td>
							<td><?php if($pkg->is_top==1)echo 'High';else echo "Low"; ?></td>
							<td><?php echo $pkg->cost_euro;?></td>
							<td><?php echo $pkg->cost_pound;?></td>
							<td><?php echo $pkg->likes_count; ?></td>
							<td><?php echo $pkg->created_on;?></td>
							<td>
								<a class="btn btn-success edit_postadd"  href="<?php echo base_url();?>category/EditPackage/<?php echo $pkg->pkg_dur_id ;?>" title="Edit Package Details">
								<i class="halflings-icon edit white"></i> 
								</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
<!-- end DASHBOARD CIRCLE TILES -->