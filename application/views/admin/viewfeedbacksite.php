<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">View feedback for Website</a></li>
	</ul>
	
	
	<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>View feedback for Website</h2>
				
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>
							<td>Which category are you most interested in ?</td>
							<td><?php echo $all_feedbacks->cname; ?></td>
						</tr>
						<tr>
							<td>How likely are you to return to 99 right Deals ?</td>
							<td><?php echo $all_feedbacks->site_return; ?></td>
						</tr>
						<tr>
							<td>Would you recommend the site to a friend ?</td>
							<td><?php echo $all_feedbacks->frnd_refer; ?></td>
						</tr>
						<tr>
							<td>Feedback</td>
							<td><?php echo $all_feedbacks->fdk_msg; ?></td>
						</tr>
						<tr>
							<td>Mobile Number</td>
							<td><?php echo $all_feedbacks->fdk_mobile; ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $all_feedbacks->fdk_mail; ?></td>
						</tr>
						<tr>
							<td>How would you rate the following?</td>
							<td> Easy to Use 		: <?php echo $all_feedbacks->easytouse." / 5"; ?><br>
								Stability and Speed : <?php echo $all_feedbacks->stability." / 5"; ?><br>
								Design 				: <?php echo $all_feedbacks->design." / 5"; ?><br>
								Overall 			: <?php echo $all_feedbacks->overall." / 5"; ?>
							</td>
						</tr>
					</tbody>
				</table>
				<div>
					<a href='<?php echo SITE_URL; ?>admin/feedbackforsite' class="btn">Cancel</a>
				</div>
			</div>

		</div>
</div>
</div>
</div>
<script>
	function view_comment()
	{
		val = document.getElementById('ad_status').value; 
		if(val != 1)
			$('.admin_comment').show();
		else 
			$('.admin_comment').hide();
	}
	
</script>
<!-- end DASHBOARD CIRCLE TILES -->