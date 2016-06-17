<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">New Staff</a></li>
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
	<?php //echo '<pre>';print_r($user_status);echo '</pre>';?>
	<?php //echo '<pre>';print_r($urgent_label);echo '</pre>';?>
	<?php //echo '<pre>';print_r($category_list[0]);echo '</pre>';?>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>New Staff</h2>
				<div class="box-icon">
				
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action='<?php echo current_url();?>' method='post' id='addnewstaff'>
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="staff_f_name"> First Name</label>
							<div class="controls">
								<input type="text" id="staff_f_name" name="staff_f_name" value='<?php echo set_value('staff_f_name'); ?>' >
								<span><?php echo form_error('staff_f_name'); ?></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="staff_l_name"> Last Name</label>
							<div class="controls">
								<input type="text" id="staff_l_name" name="staff_l_name" value='<?php echo set_value('staff_l_name'); ?>'><span><?php echo form_error('staff_l_name'); ?></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="login_email"> Email Id</label>
							<div class="controls">
								<input type="text" id="login_email" name="login_email" value='<?php echo set_value('login_email'); ?>'>
								<span><?php echo form_error('login_email'); ?></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="con_number">Contact Number</label>
							<div class="controls">
								<input type="text" id="con_number" name="con_number" value='<?php echo set_value('con_number'); ?>'maxlength="11"  > 
								<span><?php echo form_error('con_number'); ?></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="staff_dur"> Staff Type</label>
							<div class="controls">
								<select name='staff_type' class ='staff_type' >
									<option value=''>Select Staff Type</option>
									<?php $sess_user_type = $this->session->userdata('user_type');
										foreach($staff_type as $s_type){
										 if($s_type->user_type_id !=1 && $s_type->user_type_id !=7 && $s_type->user_type_id !=6){
										  if($sess_user_type < $s_type->user_type_id){ ?>
									<option value='<?php echo $s_type->user_type_id; ?>'><?php echo ucwords($s_type->user_type_name); ?></option>
									<?php }
										}
										}?>
								</select>
								<span><?php echo form_error('staff_type'); ?></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="staff_status1">Staff Status </label>
							<div class="controls">
								<select id="staff_status" name='staff_status'>
									<option value=''>Select Staff Status</option>
									<?php foreach($user_status as $s_status){
										if($s_status->user_status_id <= 3){?>
									<option value='<?php echo $s_status->user_status_id; ?>'> <?php echo ucwords($s_status->user_status); ?></option>
									<?php }}?>
								</select>
								<span><?php echo form_error('staff_status'); ?></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="staff_dur"> Password</label>
							<div class="controls">
								<input type='password' name='staff_pw' id='staff_pw' class='staff_pw' value=''> <span><?php echo form_error('staff_pw'); ?></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="c_staff_pw"> Confirm Password</label>
							<div class="controls">
								<input type='password' name='c_staff_pw' class='c_staff_pw' value=''><span id='pw_err' style='color:red'><?php echo form_error('c_staff_pw'); ?></span>
							</div>
						</div>
						<div class="form-actions">
							<input type="submit" class="btn btn-primary" name='new_staff_detail' value='Save'>
							<a href='<?php echo SITE_URL;?>users/staff/5' class="btn">Cancel</a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>
<script>
	$(document).ready(function() {
	    $("#con_number").keydown(function (e) {
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
	$('.c_staff_pw').blur(function() {
		var nw_pw = $('.staff_pw').val();
		var c_nw_pw = $('.c_staff_pw').val();
		if(nw_pw !== c_nw_pw){
			$('#pw_err' ).text( 'Password and Confirm password should be same' );
		}else{
			$('#pw_err' ).text( '' );
		}
	});


	$(function(){

		 jQuery.validator.addMethod("email1", function (value, element) {
         var regtag = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
         if(regtag.test(value)){
                  return true;
                 }
                else{
                 return false;
                 };
        }, "Enter a valid email id");


		$("#addnewstaff").validate({
			rules: {
				staff_f_name: {
					required: true,
					minlength: 3,
					maxlength: 12
				},
				login_email: {
					required: true,
					email1: true
				},
				con_number: {
					required: true,
					minlength: 11
				},
				staff_type: {
					required: true
				},
				staff_status: {
					required: true
				},
				staff_pw: {
					required: true
				},
				c_staff_pw: {
					required: true,
					equalTo : "#staff_pw"
				}
			},
		
			messages: {
				staff_f_name: {
					required: "Please Enter First Name",
					minlength: "First Name contains atleast 3 characters",
					maxlength: "First Name contains maximum 12 characters Only"
				},
				login_email: {
					required: "Please Enter Email",
					email1: "Enter a valid email id"
				},
				con_number: {
					required: 'Please Enter mobile number',
					minlength: "11 digit mobile number allowed"
				},
				staff_type: {
					required: 'Please Select staff type'
				},
				staff_status: {
					required: 'Please Select staff Status'
				},
				staff_pw: {
					required: 'Please Enter password'
				},
				c_staff_pw: {
					required: 'Please Enter Confirm password'
				}
			},
		
			submitHandler: function(form) {
				return true;
			}
		});
	});
</script>