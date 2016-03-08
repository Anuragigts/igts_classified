	 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<div id="content" class="span9">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="">Ads Staff</a></li>
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
							<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action='<?php echo current_url();?>' method='post'>
							<fieldset>
							 <!-- <div class="control-group">
								<label class="control-label" for="c_code"> Coupon Code</label>
								<div class="controls">
								  <input type="text" id="c_code" name="c_code" value='<?php echo set_value('c_code'); ?>'required >
								  <span><?php echo form_error('c_code'); ?></span>
								</div>
							  </div>-->
							   <div class="control-group">
								<label class="control-label" for="c_value"> Coupon Prefix</label>
								<div class="controls">
								  <input type="text" id="c_prefix" name="c_prefix" value='<?php echo set_value('c_prefix'); ?>'maxlength = "6" style="text-transform:uppercase" ><span><?php echo form_error('c_prefix'); ?></span>
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="c_value"> Coupon Value</label>
								<div class="controls">
								  <input type="text" id="c_value" name="c_value" value='<?php echo set_value('c_value'); ?>'onkeypress="return isNumber(event)" maxlength = "2"><span><?php echo form_error('c_value'); ?></span>
								</div>
							  </div>
							  <!-- <div class="control-group">
								<label class="control-label" for="c_type"> Coupon Type</label>
								<div class="controls">
								  <label class="radio">
								<input type="radio" class="c_type" name="c_type" value='p' checked> Percentage
								</label>
								<label class="radio">
								<input type="radio" class="c_type" name="c_type" value='d'> Discount
								</label>
								<span><?php echo form_error('c_type'); ?></span>
								</div>
							  </div>-->
							  <!-- <div class="control-group">
								<label class="control-label" for="max_disc">Max Discount</label>
								<div class="controls">
								  <input type="text" id="max_disc" name="max_disc" value='<?php echo set_value('max_disc'); ?>' maxlength="10" required > 
								  <span><?php echo form_error('max_disc'); ?></span>
								</div>
							  </div>
							    <div class="control-group">
								<label class="control-label" for="c_count">No Of Coupons</label>
								<div class="controls">
								 <input type="number" id="c_count" name="c_count" value='<?php echo set_value('c_count'); ?>' maxlength="5"  min="1"required > 
								  <span><?php echo form_error('c_count'); ?></span>
								</div>
							  </div>-->
							 
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
								<input type="submit" class="btn btn-primary" name='new_coupon' value='Create'>
								<button class="btn">Cancel</button>
							  </div>
							</fieldset>
						  </form>
					</div>
				</div><!--/span-->
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
<!-- end DASHBOARD CIRCLE TILES -->