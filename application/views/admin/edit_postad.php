	<div id="content" class="span9">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="">Ads List</a></li>
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
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit Post Ad</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action='<?php echo base_url()?>ads/update' method='post'>
							<fieldset>
							<div class="control-group">
								<label class="control-label" for="deal_tag">Deal Tag</label>
								<div class="controls">
								  <input type="text" id="deal_tag" name="deal_tag" value='<?php echo $ads_details->deal_tag; ?>' readonly>
								</div>
							  </div>
							  
							<input type='hidden' name='ad_id' value='<?php echo $ads_details->ad_id; ?>'>
							   <div class="control-group">
								<label class="control-label" for="cat_type">Category Type</label>
								<div class="controls">
								  <select id="cat_type" name='cat_type'>
								  <?php foreach($category_list as $cat){?>
									<option value='<?php echo $cat->category_id; ?>'<?php if($cat->category_id == $ads_details->sub_cat_id)echo 'selected';?>>
									<?php echo ucwords($cat->category_name); ?></option>
								  <?php }?>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="pkg_type">Package Type</label>
								<div class="controls">
								  <select id="pkg_type" name='pkg_type'>
								  <?php foreach($packages_details as $pkg){?>
									  <option value='<?php echo $pkg->pkg_dur_id; ?>' <?php if($pkg->status !=1 )echo 'disabled="true"'; if($pkg->pkg_dur_id == $ads_details->package_type)echo 'selected'; ?>><?php echo ucwords($pkg->pkg_dur_name); ?></option>
								  <?php }?>
								  </select>
								</div>
							  </div>
							  <!--<?php if($ads_details->package_type !=''){?>
							   <div class="control-group">
								<label class="control-label" for="urg_label_type">Urgent Label Type</label>
								<div class="controls">
								  <select id="urg_label_type" name='urg_label_type'>
									<option value='2' <?php if($ads_details->urgent_package == 'platinum'||$ads_details->package_type == 'platinum_urgent')echo 'selected'; ?>>Platinum</option>
									<option value='1'<?php if($ads_details->package_type == 'gold'||$ads_details->package_type == 'gold_urgent')echo 'selected'; ?>>Gold</option>
									<option value='0'<?php if($ads_details->package_type == 'free'||$ads_details->package_type == 'free_urgent')echo 'selected'; ?>>Free</option>
								  </select>
								</div>
							  </div>
							  <?php }?>-->
							  <div class="control-group">
								<label class="control-label" for="ad_type">Ad Type</label>
								<div class="controls">
								  <select id="ad_type" name='ad_type' disabled>
									<option value='2' <?php if($ads_details->ad_type == 'consumer')echo 'selected'; ?>>Consumer</option>
									<option value='1'<?php if($ads_details->package_type == 'business')echo 'selected'; ?>>Business</option>
								  </select>
								</div>
							  </div>
							 
							  <div class="control-group">
								<label class="control-label" for="pkg_price">Price</label>
								<div class="controls">
								  <input type="text" id="pkg_price" name="pkg_price"value='<?php echo $ads_details->price; ?>'>
								  <?php if($ads_details->currency=='euro'){?><i class='glyphicons-icon euro' style='vertical-align:bottom; height:38px;color:#999999'></i>
								  <?php } else{?>
									<b style='font-family: ""; vertical-align:middle; font-size:30px; color:#999999;'>£</b>
								  <?php }?>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="pkg_desc">Description</label>
								<div class="controls">
								<textarea style='width: 300px;height:100px;' name='pkg_desc'><?php echo $ads_details->deal_desc; ?>
								</textarea>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="pkg_web_link">WebLink</label>
								<div class="controls">
								  <input type="text" name='pkg_web_link' id="pkg_web_link" value='<?php echo $ads_details->web_link; ?>' readonly>
								</div>
							  </div> 
							  
							  <div class="control-group">
								<label class="control-label" for="service_type">Service Type</label>
								<div class="controls">
								  <input type="text" id="service_type" name="service_type" value='<?php echo $ads_details->service_type; ?>'>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="urg_type">Urgent Label Type</label>
								<div class="controls">
								  <select id="urg_type" name="urg_type" disabled>
								  <option> No label</option>
								  <?php foreach($urgent_label as $lab){?>
								  <option value='<?php echo $lab->u_pkg_id; ?>'<?php if($ads_details->urgent_package == $lab->u_pkg_id)echo 'selected'?>><?php echo ucwords($lab->u_pkg_name); ?></option>
								  <?php }?>
								  </select>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="ad_status">Ad Status</label>
								<div class="controls">
								  <select id="ad_status" name="ad_status" onchange="view_comment()">
								  <?php foreach($ad_status as $status){
									 if(($ads_details->is_free == 0) && ($ads_details->payment_status == 0 ) && ($status->id == 1 )){?>
									 <?php }else{ ?>
									<option value='<?php echo $status->id; ?>'<?php if($status->id == $ads_details->ad_status)echo 'selected'; ?>><?php echo ucwords($status->status_name);?></option>
								  <?php }}?>
								  </select>
								</div>
							  </div>
							   <div class="control-group admin_comment">
								<label class="control-label" for="pkg_comment_admin">Comment</label>
								<div class="controls">
								<textarea style='width: 300px;height:100px;' id='pkg_comment_admin' name='pkg_comment_admin'><?php echo $ads_details->admin_comment; ?></textarea>
								</div>
							  </div>
							  
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Update changes</button>
								<button class="btn">Cancel</button>
							  </div>
							  <input type='hidden' value='<?php echo current_url();?>' name='curr_url'>
							</fieldset>
						  </form>
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