<style>
	.spanform{min-height:250px !important;}
</style>
<div id="content" class="span9 spanform">
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
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Filters for Ad Reports</h2>
				<div class="box-icon">
					<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>-->
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" id="validate" method="post" action='<?php echo base_url()?>admin/AllReports/'>
					<fieldset>
						<div class='span6'>
							<div class="control-group">
								<label class="control-label" for="focusedInput">Date Start</label>
								<div class="controls">
									<input type="text" name="start_date" value="<?php if(isset($posted_data)) echo $posted_data['start_date'] ?>" class="datepicker form-control start_date" placeholder="Start Date"/> 
									<?php echo form_error("start_date");?>
								</div>
							</div>
						</div>
						<div class='span6'>
							<div class="control-group">
								<label class="control-label" for="typeahead">Date End <span class="text-red">*</span></label>
								<div class="controls">
									<input type="text" name="end_date" value="<?php if(isset($posted_data)) echo $posted_data['end_date']; ?>" class="datepicker form-control end_date" placeholder="End Date"/>
									<?php echo form_error("end_date");?>   
								</div>
							</div>
						</div>
						<?php //echo '<pre>';print_r($pkg_types);echo '</pre>';?>
						<!-- <div class='span6' style='margint:0px;'>
							<div class="control-group">
								<label class="control-label" for="typeahead">Package Type <span class="text-red">*</span></label>
								<div class="controls">
									<select name='pkg_type' class='pkg_type'>
										<option value='0'> Select Status Type </option>
										<?php foreach($pkg_types as $a_status){?>
										<option value='<?php echo $a_status->pkg_dur_id;?>'<?php if(isset($posted_data) && $posted_data['pkg_type'] == $a_status->pkg_dur_id)echo 'selected';?>><?php echo ucwords($a_status->pkg_dur_name);?> </option>
										<?php }?>
									</select>
									<?php echo form_error("pkg_type");?>
								</div>
							</div>
						</div> -->
						<div class='span6' style='margint:0px;'>
							<div class="control-group">
								<label class="control-label" for="typeahead">Category Type <span class="text-red">*</span></label>
								<div class="controls">
									<select name='cat_type' class='cat_type'>
										<option value='0'> Select Status Type </option>
										<?php foreach($categories as $cat){?>
										<option value='<?php echo $cat->category_id?>'<?php if(isset($posted_data) && $posted_data['cat_type'] == $cat->category_id)echo 'selected';?>><?php echo ucwords($cat->category_name);?> </option>
										<?php }?>
									</select>
									<?php echo form_error("cat_type");?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-5"></div>
							<div class="col-lg-2">
								<input type="submit" name="get_details" value="Get Details" class="btn btn-default"/> 
							</div>
							<div class="col-lg-5"></div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<?php if(isset($ad_reports)){
		// echo '<pre>';print_r($ad_reports[0]);echo '</pre>';?>
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
							<th>Report Title</th>
							<th>Report Message</th>
							<th>Category</th>
							<th>Created on</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$i = 1;
							foreach($ad_reports as $list){?>
						<tr>
							<td><?php echo $list->ad_prefix.str_pad($list->ad_id, 7, "0", STR_PAD_LEFT);?></td>
							<td><?php  
								$vasl = ucfirst($list->deal_tag);
								echo $vasl;?></td>
							<td><?php  
								$name = ucfirst($list->name);
								echo $name;?></td>
							<td style='word-break: break-all;'><?php  
								$val2 = $list->message;
								echo $val2;?></td>
							<td><?php  
								echo ucwords($list->category_name);?></td>
							<td><?php  
								$val = date("d-m-Y H:i:s", strtotime($list->r_created));
								echo $val;?></td>
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