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
                       <?php echo ($this->session->flashdata('msg'))?$this->session->flashdata('msg'):''?>
                     </p>
                 </div>
             <br>
             <?php }
			  //echo '<pre>';print_r($user_details);echo '</pre>';?>
			  <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>User Details</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>-->
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action='<?php echo base_url()?>ads/update' method='post'>
							<fieldset>
							<div class="control-group">
								<label class="control-label" for="user_name">User Name</label>
								<div class="controls">
								  <input type="text" id="user_name" name="user_name" value='<?php echo $user_details->first_name.' '. $user_details->lastname; ?>' readonly>
								</div>
							  </div>
							 
							<?php if($this->session->userdata('user_type') == 1){?>
							<div class="control-group">
								<label class="control-label" for="user_id">User Id</label>
								<div class="controls">
								  <input type="text" id="user_id" name="user_id" value='<?php echo $user_details->login_id ?>' readonly>
								</div>
							  </div>
							<?php }?>							
							<input type='hidden' name='ad_id' value='<?php echo $user_details->login_id; ?>'>
							   <div class="control-group">
								<label class="control-label" for="cat_type">E Mail Id</label>
								<div class="controls">
								  <input type="text" id="email_id" name="email_id" value='<?php echo $user_details->login_email; ?>' readonly>
								</div>
							  </div>
							 
							  <div class="control-group">
								<label class="control-label" for="ad_type">Ad Type</label>
								<div class="controls">
								  <select id="ad_type" name='ad_type' disabled>
									<option value='<?php echo $user_details->user_type; ?>' <?php if($user_details->user_type == '6')echo 'selected'; ?>>Business</option>
									<option value='<?php echo $user_details->user_type; ?>'<?php if($user_details->user_type == '7')echo 'selected'; ?>>Consumer</option>
								  </select>
								</div>
							  </div>
							  <input type='hidden' value='<?php echo current_url();?>' name='curr_url'>
							</fieldset>
						  </form>
						  </div>
						  </div>
						  </div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>List of User Ads</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>-->
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					<form name='change_status' method='post' action='<?php echo base_url()?>ads/change_status' >
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                            <tr>
								<th>Select<!--<input type='checkbox' name='checkAll' class='checkAll' id='checkAll'>-->	</th>
								<th>Deal Tag</th>
                                <th>Package Type</th>
                                <th>Category</th>
								<th>Price</th>
								<th>Posted On</th>
								<th>Expire On</th>
                                <!--<th>Description</th>-->
								<th>Status</th>
								<th>View</th>
                                <th style='width:55px;'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach($ads_list as $ads){$i++; ?>
                            <tr class="odd gradeX">
								 <td id='<?php echo 'td_'.$ads->ad_id?>' class='<?php if($ads->ad_status != 1)echo 'td_class_uncheck'?>'><?php if($ads->ad_status != 1){?>
								<input type='checkbox' name='deal_id[]' class='checkbox1' value='<?php echo $ads->ad_id; ?>' onclick='select_post_ad(<?php echo $ads->ad_id;?>)'><?php }?></td>
								
								<td><?php echo ucwords($ads->deal_tag);?></td>
								<td><?php echo ucwords($ads->pkg_name);?></td>
								<td><?php echo ucwords($ads->category_name);?></td>
								<td><?php echo $ads->price;?></td>
								<td><?php echo $ads->created_on;?></td>
								<td><?php echo $ads->expire_data;?></td>
								<!--<td title ='<?php echo $ads->deal_desc?>'><?php echo substr($ads->deal_desc, '0', '20');?></td>-->
								<td><?php if($ads->ad_status == 1)echo 'Active'; 
								else if($ads->ad_status == 0)echo 'New';
								else if($ads->ad_status == 2)echo 'In-Progress';
								else if($ads->ad_status == 3)echo 'On Hold';
								else echo 'Rejected';?>
								</td>
								<td>
									<a class="" href="<?php echo base_url();?>description_view/details/<?php echo $ads->ad_id.'/';?>" target='_blank'title="View Ad Content" style=''>View</a>
								</td>
								<td>
									<a class="btn btn-success edit_postadd"  href="<?php echo base_url();?>ads/aprovals/<?php echo $ads->ad_id.'/edit/';?>" title="Edit Ad Details">
											<i class="halflings-icon edit white"></i> 
									</a>
									<!--<a href="javascript:void(0);" class="deactivate btn btn-info" title="View"><i class='halflings-icon ok-circle' style='color:red'></i></a>-->&nbsp;
									<a class="btn btn-danger" href="<?php echo base_url();?>ads/aprovals/<?php echo $ads->ad_id;?>" title="Delete Ad Content" style=''>
									<i class="halflings-icon white trash" style='width:10px; height:12px'></i> 
									</a>
								</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
					
						<select name='change_status'>
							<option>Select status </option>
							<option value='0'>New</option>
							<option value='1'>Active</option>
							<option value='2'>On-Hold</option>
							<option value='3'>In-progress</option>
							<option value='4'>Rejected</option>
						</select>
						<input type='hidden' name='selected_ads' class='selected_ads' id='selected_ads' value=''>
						<input type='submit' name='active' class='btn success'value='Change Status' >
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>

$(document).ready(function() {
    $('#checkAll5').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
		

    });
    
	$('#checkAll').on('change', function() {
    if (!$(this).is(':checked')) {
        $('.checkbox1').attr('checked', false);   
    } else {
        $('.checkbox1').attr('checked', true);
    }
});
});

$(document).ready(function(){ 
    $("#checkAll4").change(function(){
      $(".checkbox1").prop('checked', $(this).prop("checked"));
      });
});
$("#checkAll2").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
	/*$("input[type=checkbox]").each(function() {
	  if(this).is(':checked')) {
		somethingChecked = true;
	  }
	});*/
		
$("#checkAll3").change(function () {
	
	if(this.checked){
		alert('hello');
		
   /* $(".deal_id").addClass('ad_selected');
	$(this).toggleClass( "ad_selected", the_input.get(0).checked );
	*/
	
	//$("input.ad_selected:checkbox");
	//$('tr td input[type=checkbox]').prop('checked', true);
	
	 /* $("input:checkbox[class=ad_selected]").each(function () {
            alert("Id: " + $(this).attr("id") + " Value: " + 1 + " Checked: " + $(this).is(":checked"));
	*/		
			
	$('td .ad_selected').each(function () {            
        $(this).prop('checked', true);
    });
    } else {
		$(".deal_id").removeClass('ad_selected');
		$("input.ad_selected:checkbox")
    }
	
	
    //$(".deal_id").prop('checked', $(this).prop("checked"));
});


function select_post_ad(ad_id){
	var adds_list = $('#selected_ads').val();
	var selected_ads=''
	 if (document.getElementById('deal_id'+ad_id).checked) {
		 selected_ads = adds_list+ad_id+',';
	} else {
		var strLen = adds_list.length;
		adds_list = adds_list.slice(0,strLen-1);
		arr = adds_list.split(',');
		for(i = 0; i < arr.length; i++){
			if(arr[i].match(ad_id)){
			}else{
				selected_ads =selected_ads + arr[i]+',';
			}
		}
	}
	document.getElementById('selected_ads').value = selected_ads;
}
</script>