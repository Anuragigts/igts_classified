<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">Review List</a></li>
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
	<?php }
		//echo '<pre>';print_r($ReviewList[0]);echo '</pre>';?>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>List of Reviews</h2>
				<div class="box-icon">
				
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Deal Tag</th>
							<th>Review Title</th>
							<th>Reviewer Name</th>
							<th>Rating</th>
							<th>Date</th>
							<th>Description</th>
							<th>Status</th>
							<th>Action</th>
							<!-- -->
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
							foreach($ReviewList as $ads){$i++; ?>
						<tr class="odd gradeX">
							<td><?php echo ucwords($ads->deal_tag);?></td>
							<td><?php echo ucwords($ads->review_title);?></td>
							<td><?php echo ucwords($ads->review_name);?></td>
							<td><?php echo $ads->rating;?></td>
							<td><?php echo $ads->review_time;?></td>
							<td title='<?php echo $ads->review_msg;?>'>
								<div class="review_desc">
									<?php echo substr($ads->review_msg,0,25); ?>
								</div>
							</td>
							<td id='act_status<?php echo $ads->id;?>' style="width:150px !important;"><?php if($ads->status == 1)echo 'Active'; 
								else echo 'InActive';?>
							</td>
							<td id='status<?php echo $ads->id; ?>'>
								<?php if($ads->status == 1){?><span class='btn btn-success'><i class="halflings-icon minus-sign active_review  white" id='review_<?php echo $ads->id; ?>'title="In-Activate Review "></i></span>
								<?php }else{?>
								<span class='btn btn-danger'><i class="halflings-icon plus-sign inactive_review white" id='review_<?php echo $ads->id; ?>'title="Activate Review "></i></span>
								<?php }?>
								&nbsp;
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
<script>
	$('.inactive_review').click(function(){
		var r_id = this.id;
		var r_array = r_id.split("_");
		var review = r_array[1];
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>Reviews/change_status",
			data: {
				review: review,
				status: 1,
			},
			success: function (data) {
				$('#status'+review).html(data);
				$('#act_status'+review).html('Active');
				$('.msg').html('<div class="alert alert-block alert-info fade in"><button data-dismiss="alert" class="close" type="button">×</button><p>Coupoun Code has successfully Activated </p></div>');   
				window.location.reload();
			}
		});
	});
	$('.active_review').click(function(){
		var r_id = this.id;
		var r_array = r_id.split("_");
		var review = r_array[1];
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>Reviews/change_status",
			data: {
				review: review,
				status: 0,
			},
			success: function (data) {
				$('#status'+review).html(data);
				$('#act_status'+review).html('InActive');
				$('.msg').html('<div class="alert alert-block alert-info fade in"><button data-dismiss="alert" class="close" type="button">×</button><p>Coupoun Code has successfully De-Activated </p></div>');   
				window.location.reload();
			}
		});
	});
</script>