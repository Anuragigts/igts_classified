	<div id="content" class="span9">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="">Reports Details</a></li>
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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Generate Reports</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" id="validate" method="post" action='<?php echo base_url()?>Report/Get_report/'>
					<fieldset>
						<div class='span6'>
							<div class="control-group">
								<label class="control-label" for="focusedInput">Date Start</label>
								<div class="controls">
								 <input type="text" name="start_date" value="" class="form-control" placeholder="Start Date"/> 
                            <?php echo form_error("start_date");?>
								</div>
							</div>
						</div>
						<div class='span6'>
							<div class="control-group">
								<label class="control-label" for="typeahead">Group By <span class="text-red">*</span></label>
								<div class="controls">
								<select name='groupt_by'>
									<option> Select </option>
									<option value='day'> Daily</option>
									<option value='week'> Weekly</option>
									<option value='month'> Monthly</option>
								</select>
                            <?php echo form_error("group_by");?>    
								</div>
							</div>
						</div>
						<div class='span6'>
							<div class="control-group">
								<label class="control-label" for="typeahead">Date End <span class="text-red">*</span></label>
								<div class="controls">
									 <input type="text" name="end_date" value="" class="form-control" placeholder="End Date"/>
                            <?php echo form_error("end_date");?>   
								</div>
							</div>
						</div>
						<div class='span6' style='margint:0px;'>
							<div class="control-group">
							<label class="control-label" for="typeahead">Ads Status<span class="text-red">*</span></label>
								<div class="controls">
									<select name='ord_status'>
									<option> Select </option>
									<?php foreach()$?>
									<option value='day'> Daily</option>
									<option value='week'> Weekly</option>
									<option value='month'> Monthly</option>
								</select>
                            <?php echo form_error("ord_status");?>
								</div>
							</div>
						</div>
						 <div class="form-group">
							<div class="col-lg-5"></div>
							<div class="col-lg-2">
								<input type="submit" name="get_details" value="Get Details" class="btn btn-default"/> 
							</div>
							<div class="col-lg-5"></div>                        
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
$(document).ready(function() {
    $("#phone").keydown(function (e) {
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
</script>