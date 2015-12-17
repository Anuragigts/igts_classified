<!-- begin PAGE TITLE AREA -->
<!-- Use this section for each page's title and breadcrumb layout. In this example a date range picker is included within the breadcrumb. -->
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>Customer Care
                <small>Customer Care</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url();?>admin_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Customer Care</li>
            </ol>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<!-- end PAGE TITLE AREA -->

<!-- begin DASHBOARD CIRCLE TILES -->
<div class="row">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>Customer Care</h4>
            </div>
            <div class="portlet-widgets">
                <span class="divider"></span>
                <a data-toggle="collapse" data-parent="#accordion" href="#defaultPortlet"><i class="fa fa-chevron-down"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="defaultPortlet" class="panel-collapse collapse in">
            <div class="portlet-body">
                <?php $this->load->view("admin/success_error");?>
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <select class="form-control getall" cust="2">
                            <option value="">All</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>
                    <div class="col-lg-4"><a href="<?php echo base_url();?>customercare/create" class="btn btn-green pull-right">Create Customer Care</a></div>
                </div>
                <div class="row"><br/></div>
                <h3>List Customer Care</h3>
                <div class="table-responsive tb-row">
                    <table id="example-table" class="table table-striped table-bordered table-hover table-default">
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
                                <td>
                                    <a href="<?php echo base_url();?>customercare/edit/<?php echo $ct->login_id;?>" title="Edit Customer Care"><i class='fa fa-edit text-blue'></i></a>
                                    <?php if($ct->login_status == 0){ ?>
                                        <a href="javascript:void(0);" class="activate" title="Activate" lname="<?php  echo $lname;?>" login="<?php echo $ct->login_id;?>"><i class='fa fa-check-circle-o text-green'></i></a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0);" class="deactivate" title="Deactivate" lname="<?php  echo $lname;?>" login="<?php echo $ct->login_id;?>"><i class='fa fa-times-circle-o text-red'></i></a>
                                    <?php } ?>
                                    <a href="<?php echo base_url();?>customercare/delete/<?php echo $ct->login_id;?>" title="Delete Customer Care"><i class='fa fa-trash-o text-red'></i></a>
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