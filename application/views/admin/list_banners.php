<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">Banners </a></li>
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
	<?php //echo '<pre>';print_r($all_banners[0]);echo '</pre>';?>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit Adds in Each Category</h2>
				<div class="box-icon">
				
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Category Id</th>
							<th>Category Name </th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
							foreach($all_banners as $banner){$i++; ?>
						<tr class="odd gradeX">
							<td> <?php echo $banner->category_id;?></td>
							<td> <?php echo ucwords($banner->category_name);?></td>
							<!--<td> <?php echo $banner->sidead_one;?></td>
								<td> <?php echo $banner->topad;?></td>
								<td> <?php echo $banner->mid_ad;?></td>
								<td> <?php echo $banner->mid_ad;?></td>-->
							<td><?php if($banner->b_status == 1)echo "Active"; else echo 'In-Active';?></td>
							<td><a class="btn btn-success edit_postadd"  href="<?php echo base_url();?>settings/get_banner/<?php echo $banner->id;?>" title="Edit">
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
</div>

<script type="text/javascript">
	setTimeout(function(){
		$(".alert").hide();
	},5000);
</script>