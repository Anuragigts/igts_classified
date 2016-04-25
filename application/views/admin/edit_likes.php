<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">Edit Likes</a></li>
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
	<?php //echo '<pre>';print_r($edlikestop);echo '</pre>';?>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit Likes</h2>
				<div class="box-icon">
				
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action='<?php echo current_url();?>' method='post'>
					<fieldset>
						<h4 class='text-center'>Top categories like Jobs, Services, Motor Point, Find a property</h4>
						<?php foreach ($edlikestop as $val) { ?>
							<div class="control-group">
								<label class="control-label" for="<?php echo ucfirst($val->package_type); ?>"><?php echo ucfirst($val->package_type); ?></label>
								<div class="controls">
									<input type="number" id="top_<?php echo ucfirst($val->package_type); ?>" name="top_<?php echo ucfirst($val->package_type); ?>" value='<?php echo $val->likes_count; ?>'>
								</div>
							</div>	
						<?php } ?><!-- 
						<div class="control-group">
							<label class="control-label" for="pkg_name">Free</label>
							<div class="controls">
								<input type="number" id="top_free" name="top_free" value=''>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="pkg_dur">Free Urgent</label>
							<div class="controls">
								<input type="number" id="top_free_urgent" name="top_free_urgent" value=''>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="img_count">gold</label>
							<div class="controls">
								<input type="number" id="top_gold" name="top_gold" value=''>
							</div>
						</div> -->
						<h4 class='text-center'>Low categories like Pets, Cloths & lifestyles, Home & kitchen, E-zone</h4>
						<?php foreach ($edlikeslow as $val) { ?>
							<div class="control-group">
								<label class="control-label" for="<?php echo ucfirst($val->package_type); ?>"><?php echo ucfirst($val->package_type); ?></label>
								<div class="controls">
									<input type="number" id="low_<?php echo ucfirst($val->package_type); ?>" name="low_<?php echo ucfirst($val->package_type); ?>" value='<?php echo $val->likes_count; ?>'>
								</div>
							</div>	
						<?php } ?>
						<div class="form-actions">
							<input type="submit" class="btn btn-primary" name='edit_likes' value='Save'>
							<a class='btn' href="<?php echo base_url();?>category/manage_likes">Cancel</a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
<script>
	$("#pound_price").blur(function(){
	    alert("This input field has lost its focus.");
	});
	
	function view_comment()
	{
		val = document.getElementById('ad_status').value; 
		if(val != 1)
			$('.admin_comment').show();
		else 
			$('.admin_comment').hide();
	}

	
	
</script>