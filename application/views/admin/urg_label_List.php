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
			 <?php //echo '<pre>';print_r($urg_pkg_details[0]);echo '</pre>';?>
			 	 <div style='margin-bottom:10px;margin-right:25px; float:right;' > 
			 <a href='<?php echo base_url();?>category/addNewUrglabel' class='btn btn-success'>Add New</a></div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>List of Adds</h2>
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
                                <th>S.No.</th>
								<th>Urgent Label Name</th>
                                <th>Package Days</th>
                                <th>Category</th>
								<th>Euro Price</th>
								<th>Pound Price</th>
								<th>Added On</th>
								<th>Status</th>
                                <th style='width:55px;'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach($urg_pkg_details as $urg){$i++; ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i;?></td> 
								<td><?php echo ucwords($urg->u_pkg_name);?></td>
								<td><?php echo $urg->u_pkg_days;?></td>
								<td><?php if($urg->is_top_cat == 1) echo 'Top'; else echo 'Normal'; ?></td>
								<td><?php echo $urg->u_pkg_euro_cost;?></td>
								<td><?php echo $urg->u_pkg__pound_cost ;?></td>
								<td><?php echo $urg->added_on ;?></td>
								
								<td><?php if($urg->status == 1)echo 'Active'; 
								else echo 'In Active';?>
								</td>
								
								<td>
									<a class="btn btn-success edit_postadd"  href="<?php echo base_url();?>category/EditUrglabel/<?php echo $urg->u_pkg_id;?>" title="Edit Ad Details">
											<i class="halflings-icon edit white"></i> 
									</a>
									&nbsp;
									<a class="btn btn-danger" href="<?php echo base_url();?>category/EditUrglabel/<?php echo $urg->u_pkg_id;?>" title="Delete Ad Content" style=''>
											<i class="halflings-icon white trash" style='width:10px; height:12px'></i> 
									</a>
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
<!-- end DASHBOARD CIRCLE TILES -->