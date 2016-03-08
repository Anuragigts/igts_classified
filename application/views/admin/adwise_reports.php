	<div id="content" class="span9">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="">Add Wise Report List</a></li>
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
			 // echo '<pre>';print_r($adwise_reports[0]);echo '</pre>';?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Reviews by Ads</h2>
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
								<th>Deal Tag</th>
                                <th>Category Name</th>
								<th>Package </th>
								<th>Count</th>
                               <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach($adwise_reports as $ads){$i++; ?>
                            <tr class="odd gradeX">
                               <td><?php echo ucwords($ads->deal_tag);?></td>
								<td><?php echo ucwords($ads->category_name);?></td>
								<td><?php echo ucwords($ads->pkg_name);?></td>
								<td><?php echo $ads->report_count;?></td>
								<td>
									<a class="" href="<?php echo base_url();?>admin/getAdReports/<?php echo $ads->ad_id.'/';?>" title="View All Reports " style=''>View</a>
								</td><!---->
								<!--<td>
									<a class="btn btn-success edit_postadd"  href="<?php echo base_url();?>s" title="Ad Reviews  Details">
											<i class="halflings-icon edit white"></i> 
									</a>
									<a href="javascript:void(0);" class="deactivate btn btn-info" title="View"><i class='halflings-icon ok-circle' style='color:red'></i></a>&nbsp;
									<a class="btn btn-danger" href="<?php echo base_url();?>ads/aprovals/<?php echo $ads->ad_id;?>" title="Delete Ad Content" style=''>
									<i class="halflings-icon white trash" style='width:10px; height:12px'></i> 
									</a>
								</td>-->
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
