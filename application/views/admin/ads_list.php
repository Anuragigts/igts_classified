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
	<?php }?>
	<style>
		fieldset .span4{
		margin-left:1.5641% !important;
		}
	</style>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Filter Details</h2>
				<div class="box-icon">
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
						<?php if(isset($ads_type)){?>
						<input type="hidden" name="ads_type" value="<?php echo $ads_type; ?>" readonly />
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
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>List of Ads</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th><input type="checkbox" id="selectall"/></th>
							<th>Deal Tag</th>
							<th>Package Type</th>
							<th>Category</th>
							<th>Price</th>
							<th>Posted On</th>
							<th>Expire On</th>
							<th>Status</th>
							<th>View</th>
							<th style=''>Action</th>
						</tr>
					</thead>
					<?php //echo '<pre>';print_r($ads_list[0]);?>
					<tbody>
						<?php $i = 0;
							foreach($ads_list as $ads){$i++; ?>
						<tr class="odd gradeX">
							<td><?php if($ads->ad_status != 1){?><input type='checkbox' name='deal_id[]' class='deal_id' id='deal_id<?php echo $ads->ad_id; ?>' value='<?php echo $ads->ad_id; ?>' onclick='select_post_ad(<?php echo $ads->ad_id;?>)'><?php }?></td>
							<td><?php echo ucwords($ads->deal_tag);?></td>
							<?php if ($ads->urgent_package != 0) { ?>
								<td><?php echo ucwords($ads->pkg_name)."+ Urgent";?></td>
							<?php }
							else{ ?>
								<td><?php echo ucwords($ads->pkg_name);?></td>
							<?php } ?>
							
							<td><?php echo ucwords($ads->category_name);?></td>
							<td><?php echo $ads->price;?></td>
							<td><?php echo $ads->created_on;?></td>
							<td><?php
							 if ($ads->expire_data != '0000-00-00 00:00:00') {
								echo date('d-m-Y H:i:s', strtotime($ads->expire_data));
							}
							 ?></td>
							<td><?php
							if ($ads->ad_status == 2) {
								echo "Pending";
							}
							else{
							 echo ucwords($ads->status_name);
							}
							?>
							</td>
							<td>
								<a class="" href="<?php echo base_url();?>description_view/details/<?php echo $ads->ad_id.'/';?>" target='_blank'title="View Ad Content" style=''>View</a>
							</td>
							<td>
								<a class="btn btn-success edit_postadd"  href="<?php echo base_url();?>ads/aprovals/<?php echo $ads->ad_id;?>" title="Edit Ad Details">
								<i class="halflings-icon edit white"></i> 
								</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<form name='change_status' method='post' action='<?php echo base_url()?>ads/change_status' >
					<select name='change_status' id='change_status' class='status_color'>
						<option value=''>Select status </option>
						<?php $sess_user_type = $this->session->userdata('user_type');
							if($sess_user_type == 1 || $sess_user_type == 2){?>
						<?php foreach($ad_status as $status){ ?>
						<option value='<?php echo $status->id; ?>'><?php echo ucwords($status->status_name); ?></option>
							<?php }
							}
							else{ foreach($regad_status as $status){ ?>
						<option value='<?php echo $status->id; ?>'><?php echo ucwords($status->status_name); ?></option>
							<?php }
							} ?>
					</select>
					<input type='hidden' name='selected_ads' class='selected_ads' id='selected_ads' value=''>
					<input type='submit' name='active' class='btn success change_status'value='Change Status' >
					<div class='status_error' style="color:red; display:none;">Please select status</div>
					<div class='select_error' style="color:red; display:none;">Please select Ads</div>
					<div style='display:none;' class='comment'>
						<textarea name='comment' id='comment' placeholder='Enter Reason' cols='40' rows='5'></textarea>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<script>
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
	
	function check_all_ads(){
			
		if($('.checkall').is(":checked")){
			
			 $("input:checkbox.check_adds").prop('checked','true');
			 
			
	            }else{
					alert('not checked');
				}
		
	}

	$(function(){
		$('.change_status').click(function(){
			var status = $("#change_status").val();
			var ads = $("#selected_ads").val();
			if (status == '') {
				$(".status_error").show();
				$(".select_error").hide();
				return false;
			}
			else if (ads == '') {
				$(".select_error").show();
				$(".status_error").hide();	
				return false;
			}
			else{
				return true;
			}
		});
		$("#selectall").click(function () {
			var checkedall = [];
			if(this.checked){
            $('.deal_id').each(function(){
                this.checked = true;
                $(this).parent().addClass('checked');
                checkedall.push($(this).val());
            });
        }else{
             $('.deal_id').each(function(){
                this.checked = false;
                $(this).parent().removeClass('checked');
            });
        }
        document.getElementById('selected_ads').value = checkedall;
	    });

	    /*color change for change status*/
	    $(".status_color").change(function(){
	    	if ($(this).val() != 0) {
	    		$(".change_status").css('background-color','#578EBE');
	    	}
	    	if ($(this).val() == 4) {
	    		$(".comment").show(1000);
	    	}else{
	    		$(".comment").hide(1000);
	    	}
	    });
	});
</script>