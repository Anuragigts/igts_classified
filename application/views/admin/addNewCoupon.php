<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">Coupons</a></li>
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
	<?php //echo '<pre>';print_r($staff_type);echo '</pre>';?>
	<?php //echo '<pre>';print_r($urgent_label);echo '</pre>';?>
	<?php //echo '<pre>';print_r($category_list[0]);echo '</pre>';?>
	<div class="row-fluid ">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>New Coupon</h2>
				<div class="box-icon">
				
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action='<?php echo current_url();?>' method='post'>
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="c_value"> Coupon Prefix</label>
							<div class="controls">
								<input type="text" id="c_prefix" name="c_prefix" value='<?php echo set_value('c_prefix'); ?>'maxlength = "6" style="text-transform:uppercase" >
								<span class="code_exist error"></span>
								<span><?php echo form_error('c_prefix'); ?></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="c_value"> Coupon Value</label>
							<div class="controls">
								<input type="text" id="c_value" name="c_value" value='<?php echo set_value('c_value'); ?>'onkeypress="return isNumber(event)" maxlength = "2"><span><?php echo form_error('c_value'); ?></span>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="c_status">Coupon Status </label>
							<div class="controls">
								<select id="c_status" name='c_status'>
									<option value='0' > In-Active</option>
									<option value='1' > Active</option>
								</select>
							</div>
						</div>
						<div class="form-actions">
							<input type="submit" class="btn btn-primary coupon_exist" name='new_coupon' value='Create'>
							<a href='<?php base_url()?>ListCoupons' class="btn">Cancel</a>
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
	function isNumber(evt) {
	    evt = (evt) ? evt : window.event;
	    var charCode = (evt.which) ? evt.which : evt.keyCode;
	    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	        return false;
	    }
	    return true;
	}
	
</script>

<script type="text/javascript">
	$(function(){
		/*$("#c_prefix").change(function(){
			var cval = $("#c_prefix").val();
			if (cval != '') {
					 $.ajax({
					type: "POST",
					url: "<?php echo base_url();?>coupons/coupon_codeexist",
					data: {
						cval : cval
					},
					success: function (data) {
						if (data == 1) {
							$(".code_exist").html("Coupon code is Already Exist");
							return false;
						}
						else{
							$(".code_exist").html("");
							return true;
						}
					}
	    		});
			};
			
		});*/

		/*$(".coupon_exist").click(function(){
			var cval = $("#c_prefix").val();
			if (cval != '') {
					 $.ajax({
					type: "POST",
					url: "<?php echo base_url();?>coupons/coupon_codeexist",
					data: {
						cval : cval
					},
					success: function (data) {
						if (data == 1) {
							$(".code_exist").html("Coupon code is Already Exist");
							return false;
						}
						else{
							$(".code_exist").html("");
							return true;
						}
					}
	    		});
			};
			
		});*/
	});
</script>