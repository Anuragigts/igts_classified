	
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>List of Filtered Ads</h2>
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
								<th>Deal Tag</th>
                                <th>Package Type</th>
                                <th>Category</th>
								<th>Price</th>
								<th>Posted On</th>
								<th>Expire On</th>
                                <th>Description</th>
								<th>Status</th>
								<th>View</th>
                                <th style='width:55px;'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach($ads_list as $ads){$i++; ?>
                            <tr class="odd gradeX">
                                <td><input type='checkbox' name='deal_id[]' class='deal_id' id='deal_id<?php echo $ads->ad_id; ?>' value='<?php echo $ads->ad_id; ?>' onclick='select_post_ad(<?php echo $ads->ad_id;?>)'></td>
								<td><?php echo ucwords($ads->deal_tag);?></td>
								<td><?php echo ucwords($ads->pkg_name);?></td>
								<td><?php echo ucwords($ads->category_name);?></td>
								<td><?php echo $ads->price;?></td>
								<td><?php echo $ads->created_on;?></td>
								<td><?php echo $ads->expire_data;?></td>
								<td title ='<?php echo $ads->deal_desc; ?>'><?php echo substr($ads->deal_desc, '0', '15');?></td>
								<td><?php if($ads->ad_status == 1)echo 'Approved'; 
								else if($ads->ad_status == 0)echo 'New';
								else if($ads->ad_status == 2)echo 'On Hold';
								else if($ads->ad_status == 3)echo 'Pending';
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