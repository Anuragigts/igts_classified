<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">Likes Details List</a></li>
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
		<a href='<?php echo base_url();?>category/edit_likes' class='btn btn-success'>Manage Likes</a>
	</div>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>List of Likes Details</h2>
				<div class="box-icon">
				
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>S.No.</th>
							<th>Package Name</th>
							<th>Is Top</th>
							<th>Likes Count</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$i = 0;
							foreach($likes_details as $pkg){$i++; ?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo ucwords($pkg->package_type);?></td>
							<td><?php echo $pkg->is_top;?></td>
							<td><?php echo $pkg->likes_count;?></td>
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
<!-- end DASHBOARD CIRCLE TILES -->
<script type="text/javascript">
$(function(){
	setTimeout(function(){
		$(".alert").hide();
	},5000);
});
</script>