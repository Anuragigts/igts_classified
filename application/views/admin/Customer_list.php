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
	<div style='margin-bottom:10px;margin-right:25px; float:right;' > 
		<a href='<?php echo base_url();?>users/addStaff' class='btn btn-success'>Add New</a>
	</div>
	<?php echo '<pre>';print_r($user_list[0]);echo '</pre>';?>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white user"></i><span class="break"></span>List of Adds</h2>
				<div class="box-icon">
				
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Select</th>
							<th>User Name</th>
							<th>E-Mail</th>
							<th>Contact No</th>
							<th>Status</th>
							<th style='width:55px;'>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
							foreach($user_list as $users){$i++; ?>
						<tr class="odd gradeX">
							<td><input type='checkbox' name='deal_id[]' class='deal_id' id='deal_id<?php echo $users->ad_id; ?>' value='<?php echo $users->ad_id; ?>' onclick='select_post_ad(<?php echo $users->ad_id;?>)'></td>
							<td><?php echo ucwords($users->first_name).'&nbsp;'.ucwords($users->last_name);?></td>
							<td><?php echo $users->login_email;?></td>
							<td><?php echo $users->mobile;?></td>
							<td><?php if($users->is_confirm == 'confirm')echo 'Active'; else echo 'In-Active';?></td>
							<td>
								<a class="btn btn-success edit_postadd"  href="<?php echo base_url();?>ads/aprovals/<?php echo $users->login_id.'/edit/';?>" title="Edit User Details">
								<i class="halflings-icon edit white"></i> 
								</a>
								&nbsp;
								<a class="btn btn-danger" href="<?php echo base_url();?>ads/aprovals/<?php echo $users->login_id;?>" title="Delete Ad Content" style=''>
								<i class="halflings-icon white trash" style='width:10px; height:12px'></i> 
								</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<form name='change_status' method='post' action='<?php echo base_url()?>ads/change_status' >
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
</script>