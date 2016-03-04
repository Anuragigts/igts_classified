	<div id="content" class="span9">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li>
				<?php if($staff_type == 2) $u_type = 'Admin Incharge';
				else if($staff_type == 3) $u_type = 'Managers';
				else if($staff_type == 4) $u_type = 'Supervisors';
				else if($staff_type == 5) $u_type = 'CallCenter Executives';
				//echo '<pre>';print_r($this->session->all_userdata());echo '</pre>';
				?>
				<a href=""><?php echo $u_type; ?> List</a></li>
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
			 <a href='<?php echo base_url();?>users/addStaff' class='btn btn-success'>Add New</a></div>
			 
			 <?php //echo '<pre>';print_r($users);echo '</pre>';?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>List of <?php echo $u_type; ?></h2>
						<div class="box-icon">
							<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
						</div>
					</div>
					<?php //echo '<pre>';print_r($Staff_list[0]);echo '</pre>';?>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                            <tr>
								<th>User Name</th>
								<th>E-Mail</th>
                                <th>Contact No</th>
								<?php $sess_user_type = $this->session->userdata('user_type');
								if( $sess_user_type != '1'){?>
								<?php }else{?>
									<th>Module Management</th>
								<?php }?>
								<th>Status</th>
                                <th style='width:55px;'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach($Staff_list as $users){$i++; ?>
                            <tr class="odd gradeX">
								<td><?php echo ucwords($users->first_name).'&nbsp;'.ucwords($users->lastname);?></td>
								<td><?php echo $users->login_email;?></td>
								<td><?php echo $users->mobile;?></td>
								<?php if( $sess_user_type != '1'){?>
								<?php }else{?>
									<td><a href='<?php echo base_url().'admin/manage_module/'.$users->login_id; ?>'>Mange</td>
								<?php }?>
								<td><?php echo ucwords($users->user_status);?></td>
								<td>
									<a class="btn btn-success edit_postadd"  href="<?php echo base_url();?>users/editStaff/<?php echo $users->login_id;?>" title="Edit Staff Details">
											<i class="halflings-icon edit white"></i> 
									</a>
									<!--<a href="javascript:void(0);" class="deactivate btn btn-info" title="View"><i class='halflings-icon ok-circle' style='color:red'></i></a>-->&nbsp;
								</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
					
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- end DASHBOARD CIRCLE TILES -->