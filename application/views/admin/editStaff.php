<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">Staff Details</a></li>
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
	<?php //echo '<pre>';print_r($staff_types[0]);echo '</pre>';?>
	<?php //echo '<pre>';print_r($staff);echo '</pre>';?>
	<?php //echo '<pre>';print_r($category_list[0]);echo '</pre>';?>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit Staff</h2>
				<div class="box-icon">
				
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action='<?php echo current_url(); ?>' method='post'>
					<fieldset>
						<div class="control-group">
							<input type='hidden' name=''>
							<label class="control-label" for="first_name">First Name</label>
							<div class="controls">
								<input type="text" id="first_name" name="first_name" value='<?php echo $staff->first_name; ?>' >
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="last_name">Last Name</label>
							<div class="controls">
								<input type="text" id="last_name" name="last_name" value='<?php echo $staff->lastname; ?>' >
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="phone">Mobile Number</label>
							<div class="controls">
								<input type="text" id="phone" name="phone" value='<?php echo $staff->mobile; ?>' maxlength="10">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="login_email">Email Id</label>
							<div class="controls">
								<input type="text" id="login_email" name="login_email" value='<?php echo $staff->login_email; ?>' >
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="ad_type">Staff Type</label>
							<div class="controls">
								<select id="user_type" name='user_type'>
									<option>Select User Type</option>
									<?php $sess_user_type = $this->session->userdata('user_type');
										foreach($staff_types as $usertype){
										  if($sess_user_type < $usertype->user_type_id && $usertype->user_type_id !=7){ ?>
									<option value='<?php echo $usertype->user_type_id; ?>'<?php if($usertype->user_type_id == $staff->user_type)echo 'selected';?>>
										<?php echo ucwords($usertype->user_type_name); ?>
									</option>
									<?php }
										}?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="staff_status">Staff Status </label>
							<div class="controls">
								<select id="staff_status" name='staff_status'>
									<option>Select Staff Status</option>
									<?php foreach($user_status as $u_status){?>
									<option value='<?php echo $u_status->user_status_id; ?>' <?php if($u_status->user_status_id == $staff->login_status) echo 'selected';?>> <?php echo $u_status->user_status; ?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-actions">
							<input  type="submit" class="btn btn-primary" name='update_staff' value='Update Changes'>
							<a href='<?php echo SITE_URL; ?>users/staff/<?php echo $staff->user_type; ?>' class="btn">Cancel</a>
						</div>
						<input type='hidden' value='<?php echo current_url();?>' name=''>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<script>
	$(document).ready(function() {
	    $("#phone").keydown(function (e) {
	        // Allow: backspace, delete, tab, escape, enter and .
	        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
	             // Allow: Ctrl+A, Command+A
	            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
	             // Allow: home, end, left, right, down, up
	            (e.keyCode >= 35 && e.keyCode <= 40)) {
	                 // let it happen, don't do anything
	                 return;
	        }
	        // Ensure that it is a number and stop the keypress
	        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
	            e.preventDefault();
	        }
	    });
	});
</script>