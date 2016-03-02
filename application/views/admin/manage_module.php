	<div id="content" class="span9">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href=""> Category Management</a></li>
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
             <?php }
			// echo '<pre>';print_r($m_manage);echo '</pre>';//exit;
			 ?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Manage Category</h2>
						<div class="box-icon">
						<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action='<?php echo current_url();?>' method='post'>
							<fieldset>
							<?php if(!empty($assigned_cats)){?>
								<input type='hidden' value='<?php echo $m_manage->m_manage_id; ?>' name='m_manage_id'>
							<?php }?>
							<input type='hidden' value='<?php echo $s_id;?>' name='staff_id'>
							<?php foreach($m_cat as $cat){
								if($cat->category_status == 1){?>
								<div class='span3'>
								<div class="control-group">
								  <label class="checkbox">
									<input type="checkbox" id="optionsCheckbox2" name='cats[]' value="<?php echo $cat->category_id; ?>" <?php if(in_array($cat->category_id, $assigned_cats))echo 'checked';?>>
									<?php echo ucwords($cat->category_name); ?>
								  </label>
								</div>
								
								</div>
								<!--<div class='span2' style='height:50px;'>
							<input type='checkbox' value='<?php echo $cat->category_id; ?>'<?php if(in_array($cat->category_id, $assigned_cats))echo 'checked';?>><?php echo ucwords($cat->category_name); ?>
							</div>-->
								<?php }}?>
								
								<div class='span12'>
								<div class="control-group">
									<div class='span3'>
									  <label class="checkbox"> Management Status  </label>
									 </div>
									<div class='span9'>
										<select name='status'>
											<option value=''>Select Status</option>
											<option value='0' <?php if(!empty($m_manage) && $m_manage->status == 0)echo 'selected'?>>In Active</option>
											<option value='1' <?php if(!empty($m_manage) && $m_manage->status == 1)echo 'selected'?>>Active</option>
										</select>
								  </div>
								</div>
								</div>
								<div class='span12' style='margin-left:0px;'>
							  <div class="form-actions">
								<input type="submit" class="btn btn-primary" name='manage_module' value="<?php if(!empty($assigned_cats))echo 'Update'; else echo 'Save';?>">
								<button class="btn">Cancel</button>
							  </div>
							  </div>
							</fieldset>
						  </form>
					</div>
				</div><!--/span-->
			</div>
    </div>
</div>
<!-- end DASHBOARD CIRCLE TILES -->