	<div id="content" class="span9">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>List Customer Care</h2>
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
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email Id</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            foreach($gt as $ct){ ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i++;?></td>
                                <td><?php 
                                $lname = ucfirst($ct->first_name)." ".ucfirst($ct->last_name);
                                echo $lname;?></td>
                                <td><?php echo $ct->mobile;?></td>
                                <td><?php echo $ct->login_email;?></td>
                                <td><?php echo $ct->house_no.", ".$ct->City_name.",<br/> ".$ct->State_name.", ". ucfirst(strtolower($ct->Country_name));?></td>
								<td class="center">
									<a class="btn btn-success"  href="<?php echo base_url();?>customercare/edit/<?php echo $ct->login_id;?>" title="Edit Customer Care">
										<i class="halflings-icon edit white"></i>                                            
									</a>
									<?php if($ct->login_status == 0){ ?>
                                        <a href="javascript:void(0);" class="btn btn-info activate" title="Activate" lname="<?php  echo $lname;?>" login="<?php echo $ct->login_id;?>"><i class='icon-ok-circle ' style='color:darkgreen'></i></a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0);" class="deactivate btn btn-info" title="Deactivate" lname="<?php  echo $lname;?>" login="<?php echo $ct->login_id;?>"><i class='icon-remove-circle' style='color:red'></i></a>
                                    <?php } ?>
																		
									<a class="btn btn-danger" href="<?php echo base_url();?>customercare/delete/<?php echo $ct->login_id;?>" title="Delete Customer Care">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
								
                               <!-- <td>
                                    <a href="<?php echo base_url();?>customercare/edit/<?php echo $ct->login_id;?>" title="Edit Customer Care"><i class='fa fa-edit text-blue'></i></a>
                                    <?php if($ct->login_status == 0){ ?>
                                        <a href="javascript:void(0);" class="activate" title="Activate" lname="<?php  echo $lname;?>" login="<?php echo $ct->login_id;?>"><i class='fa fa-check-circle-o text-green'></i></a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0);" class="deactivate" title="Deactivate" lname="<?php  echo $lname;?>" login="<?php echo $ct->login_id;?>"><i class='fa fa-times-circle-o text-red'></i></a>
                                    <?php } ?>
                                    <a href="<?php echo base_url();?>customercare/delete/<?php echo $ct->login_id;?>" title="Delete Customer Care"><i class='fa fa-trash-o text-red'></i></a>
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
<!-- end DASHBOARD CIRCLE TILES -->