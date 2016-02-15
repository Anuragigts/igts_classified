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
<?php //echo '<pre>';print_r($urgent_label);echo '</pre>';?>
<?php //echo '<pre>';print_r($category_list[0]);echo '</pre>';?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Add New Urgent Lable</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action='<?php echo current_url();?>' method='post'>
							<fieldset>
							<input type='hidden' name='pkg_dur_id' value=''>
							  
							  <div class="control-group">
								<label class="control-label" for="urg_name">Package Name</label>
								<div class="controls">
								  <input type="text" id="urg_name" name="urg_name" value=''>
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="urg_dur">Package Duration</label>
								<div class="controls">
								  <input type="number" id="urg_dur" name="urg_dur" value=''>
								 	
								</div>
							  </div>
							   
							  <div class="control-group">
								<label class="control-label" for="pound_price">Pound Price</label>
								<div class="controls">
								  <input type="text" id="pound_price" name="pound_price" value=''>
									&nbsp;&nbsp;<b style='font-family: ""; vertical-align:middle; font-size:35px;'>£</b>
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="euro_price">Euro Price</label>
								<div class="controls">
								  <input type="text" id="euro_price" name="euro_price" value=''>
								 <i class='glyphicons-icon euro' style='vertical-align:bottom; height:38px;'></i>
								
								</div>
							  </div>
							  
							  
							   <div class="control-group">
								<label class="control-label" for="add_type">Package Category</label>
								<div class="controls">
								  <input type="checkbox" id="is_top_cat" name='is_top_cat' value='1' > Check the box if the Package is Top Category
								</div>
							  </div>
							  <input type='hidden' value='<?php echo current_url();?>' name='curr_url'>
							 
							  <div class="form-actions">
								<input type="submit" class="btn btn-primary" name='new_pkg_urgLabel' value='Save'>
								<button class="btn">Cancel</button>
							  </div>
							</fieldset>
						  </form>
					</div>
				</div><!--/span-->
			</div>
    </div>
</div>
<!-- end DASHBOARD CIRCLE TILES -->