	<div id="content" class="span9">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="">Banners </a></li>
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
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit Banners</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action='<?php echo current_url(); ?>' method='post'>
							<fieldset>
							<input type='hidden' value='<?php echo $all_banners->id;?>' name='b_id'>
							<div class="control-group">
								<label class="control-label" for="user_name">Side Banner:</label>
								<div class="controls">
								<textarea name='banner_side'><?php echo htmlspecialchars($all_banners->sidead_one);?></textarea>
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="user_name">Top Banner Name:</label>
								<div class="controls">
								<textarea name='banner_top'><?php echo htmlspecialchars($all_banners->topad);?></textarea>
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="user_name">Middle Banner:</label>
								<div class="controls">
								<textarea name='banner_mid'><?php echo htmlspecialchars($all_banners->mid_ad);?></textarea>
								</div>
							  </div>
							   <div class="form-actions">
								<input type="submit" class="btn btn-primary" name='update_banner' value='Update Banners'>
								<button class="btn">Cancel</button>
							  </div>
						  </fieldset>
						</form>
							 
					</div>
			</div>								  
		</div>	
    </div>
</div>
</div>
<!-- end DASHBOARD CIRCLE TILES -->