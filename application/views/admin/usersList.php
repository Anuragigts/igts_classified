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
			 <?php //echo '<pre>';print_r($user_list[0]);echo '</pre>';?>
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>List of Users</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
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
								<?php if($user_type == 'business'){?>
                                <th>Business Name</th>
								<th>Business Address</th>
								<?php }?>
								<th>Status</th>
                                <th style='width:55px;'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach($user_list as $users){$i++; ?>
                            <tr class="odd gradeX">
                                <td><input type='checkbox' name='user_id[]' class='user_id' id='user_id<?php echo $users->login_id; ?>' value='<?php echo $users->login_id; ?>' onclick='select_user_id(<?php echo $users->login_id;?>)'></td>
								<td><?php echo ucwords($users->first_name).'&nbsp;'.ucwords($users->lastname);?></td>
								<td><?php echo $users->login_email;?></td>
								<td><?php echo $users->mobile;?></td>
								<?php if($user_type == 'business'){?>
                               <td title='<?php echo $users->bus_name; ?>'><?php echo $users->bus_name;?></td>
								<td title='<?php echo $users->bus_name; ?>'><?php echo ucwords(substr($users->bus_name, '0', '20'));?></td>
								<?php }?>
								<td><?php if($users->login_status == 1)echo 'Active';
								else if($users->login_status == 0)echo 'New User';
								else if($users->login_status == 2)echo 'In-Active';
								else if($users->login_status == 4)echo 'Blocked';?></td>
								
								<td>
									<a class="btn btn-success edit_postadd"  href="<?php echo base_url();?>ads/aprovals/<?php echo $users->login_id;?>" title="Edit User Details">
											<i class="halflings-icon edit white"></i> 
									</a>
									<!--<a href="javascript:void(0);" class="deactivate btn btn-info" title="View"><i class='halflings-icon ok-circle' style='color:red'></i></a>-->&nbsp;
									<a class="btn btn-danger" href="<?php echo base_url();?>ads/aprovals/<?php echo $users->login_id;?>" title="Delete Ad Content" style=''>
									<i class="halflings-icon white trash" style='width:10px; height:12px'></i> 
									</a>
								</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
					<form name='change_status' method='post' action='<?php echo base_url()?>users/change_user_status' >
					<select name='change_status'>
						<option>Select status </option>
						<option value='0'>New</option>
						<option value='1'>Active</option>
						<option value='2'>In-Active</option>
						<option value='4'>Block</option>
					</select>
					<input type='hidden' name='cur_url' class='cur_url' id='cur_url' value='<?php echo current_url();?>'>
					<input type='hidden' name='selected_users' class='selected_users' id='selected_users' value=''>
					<input type='submit' name='active' class='btn success'value='Change Status' >
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
function select_user_id(user_id){
	var users_list = $('#selected_users').val();
	var selected_users='';
	 if (document.getElementById('user_id'+user_id).checked) {
		 selected_users = users_list+user_id+',';
	} else {
		users_list = users_list.substring(0, users_list.length - 1);
		var arr = users_list.split(',');
		for(i = 0; i < arr.length; i++){
			arr[i] = arr[i].replace(/^\s*/, "").replace(/\s*$/, "");
			if(arr[i] == user_id){
			}else{
				selected_users =selected_users + arr[i]+',';	
			}
		}
	}
	document.getElementById('selected_users').value = selected_users;
}

</script>
<!-- end DASHBOARD CIRCLE TILES -->