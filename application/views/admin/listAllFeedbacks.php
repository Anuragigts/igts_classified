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
		<li><a href="">Reports for Ads</a></li>
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
	
	<?php if(isset($ad_feedbacks)){
		//echo '<pre>';print_r($result[0]);echo '</pre>';?>
	<div class="row-fluid sortable2">
		<div class="box span12">
			<div class="box-header" data-original-title style='height:32px;padding:5px;'>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>List of Reports</h2>
				<div class="box-icon" >
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Ad ID</th>
							<th>Deal Tag</th>
							<th>Created On</th>
							<th>Expire On</th>
							<th>Price</th>
							<th>Package Name</th>
							<!--<th>Action</th>-->
						</tr>
					</thead>
					<tbody>
						<?php 
							$i = 1;
							foreach($ad_feedbacks as $list){?>
						<tr>
							<td><?php echo $list->ad_prefix.str_pad($list->ad_id, 7, "0", STR_PAD_LEFT);?></td>
							<td><?php  
								$vasl = ucfirst($list->deal_tag);
								echo $vasl;?></td>
							<td><?php  
								$val2 = $list->created_on;
								echo $val2;?></td>
							<td><?php  
								$val = $list->expire_data;
								echo $val;?></td>
							<td><?php  
								$val = $list->price;
								echo $val;?></td>
							<td><?php  
								$val = ucfirst($list->pkg_dur_name);
								echo $val;?></td>
							<!--<td>
								sdfas
							</td>-->
						</tr>
						<?php 
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