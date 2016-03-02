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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit Post Ad</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action='<?php echo current_url();?>' method='post'>
							<fieldset>
							<input type='hidden' name='pkg_dur_id' value=''>
							  <div class="control-group">
								<label class="control-label" for="pkg_name">Package Name</label>
								<div class="controls">
								  <input type="text" id="pkg_name" name="pkg_name" value=''>
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="pkg_dur">Package Duration</label>
								<div class="controls">
								  <input type="number" id="pkg_dur" name="pkg_dur" value=''>
								 	
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="img_count">Image Count</label>
								<div class="controls">
								  <input type="number" id="img_count" name="img_count" value=''>
								 
								</div>
							  </div>
							     <div class="control-group">
								<label class="control-label" for="bump_home">Bump Home</label>
								<div class="controls">
								  <input type="number" id="bump_home" name="bump_home" value=''>
								
								</div>
							  </div>
							  
							     <div class="control-group">
								<label class="control-label" for="bump_search">Bump Search</label>
								<div class="controls">
								  <input type="number" id="bump_search" name="bump_search" value=''>
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
								<input type="submit" class="btn btn-primary" name='new_pkg_detail' value='Save'>
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