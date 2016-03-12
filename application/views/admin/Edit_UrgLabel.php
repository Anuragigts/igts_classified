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
	<?php //echo '<pre>';print_r($category_list[0]);echo '</pre>';?>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Add New Urgent Lable</h2>
				<div class="box-icon">
				
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" action='<?php echo current_url();?>' method='post'>
					<fieldset>
						<input type='hidden' name='u_pkg_id' value='<?php echo $urg_label->u_pkg_id; ?>'>
						<div class="control-group">
							<label class="control-label" for="urg_name">Package Name</label>
							<div class="controls">
								<input type="text" id="urg_name" name="urg_name" value='<?php echo $urg_label->u_pkg_name; ?>'>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="urg_dur">Package Duration</label>
							<div class="controls">
								<input type="number" id="urg_dur" name="urg_dur" value='<?php echo $urg_label->u_pkg_days; ?>'>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="pound_price">Pound Price</label>
							<div class="controls">
								<input type="text" id="pound_price" name="pound_price" value='<?php echo $urg_label->u_pkg__pound_cost; ?>'>
								&nbsp;&nbsp;<b style='font-family: ""; vertical-align:middle; font-size:35px;'>£</b>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="euro_price">Euro Price</label>
							<div class="controls">
								<input type="text" id="euro_price" name="euro_price" value='<?php echo $urg_label->u_pkg_euro_cost; ?>'>
								<i class='glyphicons-icon euro' style='vertical-align:bottom; height:38px;'></i>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="add_type">Package Category</label>
							<div class="controls">
								<input type="checkbox" id="is_top_cat" name='is_top_cat' value='1'  <?php if($urg_label->is_top_cat == 1)echo 'checked'; ?>> Check the box if it is Top Category
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="selectError3">Change Status</label>
							<div class="controls">
								<select id="urg_status" name='urg_status'>
									<option value='0' <?php if($urg_label->status == 0) echo 'selected';?>> In Active</option>
									<option value='1' <?php if($urg_label->status == 1) echo 'selected';?>>  Activate </option>
								</select>
							</div>
						</div>
						<input type='hidden' value='<?php echo current_url();?>' name='curr_url'>
						<div class="form-actions">
							<input type="submit" class="btn btn-primary" name='update_urgLabel' value='Update'>
							<a href='<?php echo SITE_URL; ?>category/urgLabel' class="btn">Cancel</a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
</div>