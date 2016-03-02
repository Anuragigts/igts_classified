	<div id="content" class="span9">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="">Edit Package </a></li>
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
<?php //echo '<pre>';print_r($ads_details);echo '</pre>';?>
<?php //echo '<pre>';print_r($urgent_label);echo '</pre>';?>
<?php //echo '<pre>';print_r($category_list[0]);echo '</pre>';?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit Package Details</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method='post'>
							<fieldset>
							<input type='hidden' name='pkg_dur_id' value='<?php echo $packages_details->pkg_dur_id; ?>'>
							  <div class="control-group">
								<label class="control-label" for="pkg_name">Package Name</label>
								<div class="controls">
								  <input type="text" id="pkg_name" name="pkg_name" value='<?php echo $packages_details->pkg_dur_name?>'>
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="pkg_dur">Package Duration</label>
								<div class="controls">
								  <input type="number" id="pkg_dur" name="pkg_dur" value='<?php echo $packages_details->dur_days?>'>
								 	
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="img_count">Image Count</label>
								<div class="controls">
								  <input type="number" id="img_count" name="img_count" value='<?php echo $packages_details->img_count?>'>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="like_count">Likes Count</label>
								<div class="controls">
								  <input type="number" id="like_count" name='like_count' value='1' <?php echo $packages_details->likes_count; ?>> 
								</div>
							  </div>
							  
							     <div class="control-group">
								<label class="control-label" for="bump_home">Bump Home</label>
								<div class="controls">
								  <input type="number" id="bump_home" name="bump_home" value='<?php echo $packages_details->bump_home?>'>
								
								</div>
							  </div>
							  
							     <div class="control-group">
								<label class="control-label" for="bump_search">Bump Search</label>
								<div class="controls">
								  <input type="number" id="bump_search" name="bump_search" value='<?php echo $packages_details->bump_search?>'>
								</div>
							  </div>							  
							   
							  <div class="control-group">
								<label class="control-label" for="pound_price">Pound Price</label>
								<div class="controls">
								  <input type="text" id="pound_price" name="pound_price" value='<?php echo $packages_details->cost_pound?>'>
									&nbsp;&nbsp;<b style='font-family: ""; vertical-align:middle; font-size:35px;'>£</b>
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="euro_price">Euro Price</label>
								<div class="controls">
								  <input type="text" id="euro_price" name="euro_price" value='<?php echo $packages_details->cost_euro?>'>
								 <i class='glyphicons-icon euro' style='vertical-align:bottom; height:38px;'></i>
								
								</div>
							  </div>
							  
							   <div class="control-group">
								<label class="control-label" for="add_type">Package Category</label>
								<div class="controls">
								  <input type="checkbox" id="is_top_cat" name='is_top_cat' value='1' <?php if($packages_details->is_top == 1)echo 'checked'; ?>> Check the box if the Package is Top Category
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="selectError3">Change Status</label>
								<div class="controls">
								  <select id="pkg_status" name='pkg_status'>
									<option value='0' <?php if($packages_details->status == 0) echo 'selected';?>> In Active</option>
									<option value='1' <?php if($packages_details->status == 1) echo 'selected';?>>  Activate </option>
								  </select>
								</div>
							  </div>
							  
							  <input type='hidden' value='<?php echo current_url();?>' name='curr_url'>
							 
							  <div class="form-actions">
								<input type="submit" class="btn btn-primary" name='update_pkg' value='Update'>
								<button class="btn">Cancel</button>
							  </div>
							</fieldset>
						  </form>
					</div>
				</div><!--/span-->
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
<!-- end DASHBOARD CIRCLE TILES -->