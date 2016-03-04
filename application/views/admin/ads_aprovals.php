	<style>
	fieldset .span4{
		margin-left:1.5641% !important;
	}
	</style>
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
			  //echo '<pre>';print_r($ads_list[2]);echo '</pre>';?>
			  <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white edit"></i><span class="break"></span>Filter Details</h2>
					<div class="box-icon">
					<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>-->
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
					</div>
					</div>
					<div class="box-content">
						<fieldset>
						<form name='ads_filter' method='post' action='<?php echo base_url()?>ads/aprovals' >
							<div class="control-group span4">
								<label class="control-label" for="pkg_type">Package Type</label>
								<div class="controls">
									<select id="pkg_type" name='pkg_type' >
									<option value='' >Select Package</option>
									<?php foreach($packages_details as $pkgs){if($pkgs->status == 1){?>
									<option value='<?php echo $pkgs->pkg_dur_id; ?>'<?php if(isset($filter_details)&& ($filter_details['pkg_type'] == $pkgs->pkg_dur_id)) echo 'selected';?>><?php echo ucwords($pkgs->pkg_dur_name); ?></option>
									<?php }}?>
									</select>
								</div>
							</div>
							<div class="control-group span4">
								<label class="control-label" for="cat_type">Category Type</label>
								<div class="controls">
									<select id="cat_type" name='cat_type' >
									<option value=''>Select Category</option>
									<?php foreach($category_list as $cats){?>
									<option value='<?php echo $cats->category_id; ?>'<?php if(isset($filter_details)&& ($filter_details['cat_type'] == $cats->category_id)) echo 'selected';?>><?php echo ucwords($cats->category_name); ?></option>
									<?php }?>
									</select>
								</div>
							</div>
							<div class="control-group span4">
								<label class="control-label" for="ad_status">Status</label>
								<div class="controls">
									<select id="ad_status" name='ad_status' >
									<option value=''>Select Status</option>
									<?php foreach($ad_status as $status){?>
							<option value='<?php echo $status->id; ?>'<?php if(isset($filter_details)&& ($filter_details['ad_status'] == $status->id)) echo 'selected';?>><?php echo ucwords($status->status_name); ?></option>
							<?php }?>
									</select>
								</div>
							</div>
							<div class="control-group span4">
								<label class="control-label" for="focusedInput">Date Start</label>
								<div class="controls">
									 <input type="text" name="start_date" value="<?php if(isset($filter_details)&& ($filter_details['start_date'] !=''))echo $filter_details['start_date']; ?>" class="datepicker form-control start_date" placeholder="Start Date" /> 
								</div>
							</div>
							
						<div class='control-group span4'>
								<label class="control-label" for="typeahead">End Date</label>
								<div class="controls">
									 <input type="text" name="end_date" value="<?php if(isset($filter_details)&& ($filter_details['end_date'] !=''))echo $filter_details['end_date']; ?>" class="datepicker form-control end_date" placeholder="End Date" />
								</div>
						</div>
						<?php if(isset($user_type)){?>
						<input type="hidden" name="user_type" value="<?php echo $user_type; ?>" readonly/>
						<?php }?>
						<div class='control-group span4'>
								<label class="control-label" for="focusedInput">&nbsp;</label>
								<div class="controls">
								<input type='submit' name='ads_filter' class='btn btn-success' value='Submit' >
								</div>
						</div>
							<input type='hidden' value='<?php echo current_url();?>' name='curr_url'>
							</form>
						</fieldset>
					</div>
				</div>
			</div>
			<div class='row-fluid sortable filtered_ads'>
			
			</div>
			<div class="row-fluid sortable listallads">
				<?php /*$this->load->view('admin/selected_ads_filter',$ads_list);*/?>
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>List of Adds</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>-->
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                            <tr>
								<th>Select</th>
								<th>Deal Tag</th>
                                <th>Package Type</th>
                                <th>Category</th>
								<th>Price</th>
								<th>Posted On</th>
								<th>Expire On</th>
                                <!--<th>Description</th>-->
								<th>Gallery</th>
								<th>Status</th>
								<th>View</th>
								<th>Buy</th>
                                <th style='width:55px;'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach($ads_list as $ads){$i++; ?>
                            <tr class="odd gradeX <?php echo 'cat_'.$ads->category_id; ?> <?php echo 'pkg_'.$ads->package_type; ?> <?php echo 'cat_'.$ads->category_id.'pkg_'.$ads->package_type; ?>">
                                <td id='<?php echo 'td_'.$ads->ad_id?>' class='<?php if($ads->ad_status != 1)echo 'td_class_uncheck'?>'><?php if($ads->ad_status != 1){?>
								<input type='checkbox' name='deal_id[]' class='deal_id' id='deal_id<?php echo $ads->ad_id; ?>' value='<?php echo $ads->ad_id; ?>' onclick='select_post_ad(<?php echo $ads->ad_id;?>)'><?php }?></td>
								<td><?php echo ucwords($ads->deal_tag);?></td>
								<td><?php echo ucwords($ads->pkg_name);?></td>
								<td><?php echo ucwords($ads->category_name);?></td>
								<td><?php echo $ads->price;?></td>
								<td><?php echo $ads->created_on;?></td>
								<td><?php echo $ads->expire_data;?></td>
								<!--<td title ='<?php echo $ads->deal_desc?>'><?php echo substr($ads->deal_desc, '0', '20');?></td>-->
								<td><a href='<?php echo base_url();?>ads/multimedia/<?php echo $ads->ad_id.'/';?>'>Images</a>
								<td><?php if($ads->ad_status == 1)echo 'Approved'; 
								else if($ads->ad_status == 0)echo 'New';
								else if($ads->ad_status == 2)echo 'InProgress';
								else if($ads->ad_status == 3)echo 'On-Hold';
								else echo 'Rejected';?>
								</td>
								<td>
									<a class="" href="<?php echo base_url();?>description_view/details/<?php echo $ads->ad_id.'/';?>" target='_blank'title="View Ad Content" style=''>View</a>
								</td>
								<td><a class="" href="<?php echo base_url();?>products/buy/<?php echo $ads->ad_id.'/'.'pound';?>" title="Buy The Package" style=''>Buy</a>
								</td>
								<td>
									<a class="btn btn-success edit_postadd"  href="<?php echo base_url();?>ads/aprovals/<?php echo $ads->ad_id.'/edit/';?>" title="Edit Ad Details">
											<i class="halflings-icon edit white"></i> 
									</a>
									<!--<a href="javascript:void(0);" class="deactivate btn btn-info" title="View"><i class='halflings-icon ok-circle' style='color:red'></i></a>&nbsp;
									<a class="btn btn-danger" href="<?php echo base_url();?>ads/aprovals/<?php echo $ads->ad_id;?>" title="Delete Ad Content" style=''>
									<i class="halflings-icon white trash" style='width:10px; height:12px'></i> -->
									</a>
								</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
					<?php // echo '<pre>';print_r($ad_status); echo '</pre>';?>
					<form name='change_status' method='post' action='<?php echo base_url()?>ads/change_status' >
						<select name='change_status'>
							<option>Select status </option>
							<?php foreach($ad_status as $status){if($status->id != 1){?>
							<option value='<?php echo $status->id; ?>'><?php echo ucwords($status->status_name); ?></option>
							<?php }}?>
						</select>
						<input type='hidden' name='selected_ads' class='selected_ads' id='selected_ads' value=''>
						<input type='submit' name='active' class='btn success'value='Change Status' >
					</form>
                </div>
            </div><?php /**/?>
        </div>
    </div>
</div>
</div>
<script>
function select_post_ad(ad_id){
	var adds_list = $('#selected_ads').val();
	var selected_ads='';
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
/*
$("#pkg_type").change(function () {
	
	var cat_type = $("#cat_type").val();
	var pkg_type = $("#pkg_type").val();
	//alert(cat_type+'---'+pkg_type);
	$("tbody tr").hide();
	if(cat_type >0 && pkg_type >0){
		//alert("tr.cat_"+cat_type+"pkg_"+pkg_type);
		$("tr.cat_"+cat_type+"pkg_"+pkg_type).show();
	}
	else{
		if(cat_type >0){
			$("tr.cat_"+cat_type).show();
		}
		else if(pkg_type >0){
			$("tr.pkg_"+pkg_type).show();
		}else{
			$("tr").show();
		}
	}
});
$("#cat_type").change(function () {
	var pkg_type = $("#pkg_type").val();
	var cat_type = $("#cat_type").val();
	//alert(cat_type+'---'+pkg_type);
	//alert("tr.cat_"+cat_type+"pkg_"+pkg_type);
	$("tbody tr").hide();
	if(cat_type > 0 && pkg_type >0){
		//alert("tr.cat_"+cat_type+"pkg_"+pkg_type);
		$("tr.cat_"+cat_type+"pkg_"+pkg_type).show();
		//$("tr.cat_"+cat_type, "tr.pkg_"+pkg_type).show();
		//$("tr.cat_"+cat_type).show();
		//$("tr.cat_"+pkg_type).show();
	}
	else{
		if(cat_type >0){
			$("tr.cat_"+cat_type).show();
		}
		else if(pkg_type >0){
			$("tr.pkg_"+pkg_type).show();
		}else{
			$("tr").show();
		}
	}
	
		$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>ads/getselected_filterads",
				data: {
					ad_type: $("#ad_type").val(),
					cat_type: $("#cat_type").val()
				},
				success: function (data) {
					alert('success');
					//alert(data);
					 //$('#listallads').html();
					$(".listallads").hide();
					 //$('#listallads').display('');
					 $('.filtered_ads').html(data);
					  //$('#listallads').html(data);
				}
			});
		
			
});*/
</script>
<!-- end DASHBOARD CIRCLE TILES -->