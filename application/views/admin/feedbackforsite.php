<style>
	.spanform{min-height:250px !important;}
</style>
<div id="content" class="span9 spanform">
	<?php // echo '<pre>';print_r($posted_data);echo '</pre>'; //exit;?>
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">Feedbacks for Website</a></li>
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
	
	<?php if(isset($all_feedbacks)){
		 // echo '<pre>';print_r($all_feedbacks);echo '</pre>'; exit; ?> 
	<div class="row-fluid sortable2">
		<div class="box span12">
			<div class="box-header" data-original-title style='height:32px;padding:5px;'>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>List of Feedbacks</h2>
				<div class="box-icon" >
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>S No</th>
							<th>Category</th>
							<th>Mobile</th>
							<th>Created on</th>
							<th>Overall rating</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$i = 1;
							foreach($all_feedbacks as $list){?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $list->cname;?></td>
							<td><?php echo $list->fdk_mobile; ?></td>
							<td><?php echo $list->created_on; ?></td>
							<td><?php echo $list->overall; ?></td>
							<td><a href="<?php echo base_url(); ?>admin/view_feedbacksite/<?php echo $list->id; ?>">View</a></td>
						</tr>
						<?php $i++;
							}
							?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php }?>
</div>
</div>
</div>
<script>
	$(document).ready(function() {
	    $(".generate_report").click(function () {
			 var report_type = $('.report_type').val();
			 var start_date = $('.start_date').val();
			 var pkg_type = $('.pkg_type').val();
			 var cat_type = $('.cat_type').val();
			 var end_date = $('.end_date').val();
			 
			 $.ajax({
			type: "POST",
			url: "<?php echo base_url();?>Reports/Get_report",
			data: {
				report_type: report_type,
				start_date: start_date,
				pkg_type: pkg_type,
				cat_type: cat_type,
				end_date: end_date
			},
			success: function (data) {
				
			}
	    });
	});
	});
</script>