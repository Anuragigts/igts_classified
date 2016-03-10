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
                     <button data-dismiss="alert" class="close" type="button"> × </button>
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
								<th>User Name</th>
								<th>E-Mail</th>
                                <th>Contact No</th>
								<th>User Type</th>
								<th>Ads Count</th>
								<th>Status</th>
								
                                <th style='width:55px;'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach($user_list as $users){$i++; ?>
                            <tr class="odd gradeX">
                               <td><?php echo ucwords($users->first_name).'&nbsp;'.ucwords($users->lastname);?></td>
								<td><?php echo $users->login_email;?></td>
								<td><?php echo $users->mobile;?></td>
								<td><?php if($users->user_type == 6)echo 'Business';else echo 'Consumer';?></td>
								<td><?php echo $users->pkg_count.' Ads';?></td>
								<td><?php if($users->login_status == 1)echo 'Active';
								else if($users->login_status == 0)echo 'New User';
								else if($users->login_status == 2)echo 'In-Active';
								else if($users->login_status == 4)echo 'Blocked';?></td>
								<td>
									<a class="btn btn-success edit_postadd"  href="<?php echo base_url();?>ads/get_adsuser/<?php echo $users->login_id;?>" title="Get List of Ads">
											<i class="halflings-icon edit white"></i> 
									</a>
									<!--<a href="javascript:void(0);" class="deactivate btn btn-info" title="View"><i class='halflings-icon ok-circle' style='color:red'></i></a>-->&nbsp;
									<!--<a class="btn btn-danger" href="<?php echo base_url();?>ads/aprovals/<?php echo $users->login_id;?>" title="Delete Ad Content" style=''>
									<i class="halflings-icon white trash" style='width:10px; height:12px'></i> 
									</a>-->
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