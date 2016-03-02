<!-- begin PAGE TITLE AREA -->
<!-- Use this section for each page's title and breadcrumb layout. In this example a date range picker is included within the breadcrumb. -->
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>Edit Customer Care
                <small>Edit Customer Care</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url();?>admin_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?= base_url();?>customercare"> Customer Care</a></li>
                <li class="active">Edit Customer Care</li>
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
                <h4>Edit Customer Care</h4>
            </div>
            <div class="portlet-widgets">
                <span class="divider"></span>
                <a data-toggle="collapse" data-parent="#accordion" href="#defaultPortlet"><i class="fa fa-chevron-down"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="defaultPortlet" class="panel-collapse collapse in">
            <div id="validationExamples" class="portlet-body">
                <?php $this->load->view("admin/success_error");?>
                <form class="form-horizontal" id="validate" method="post">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label>First Name <span class="text-red">*</span></label>
                            <input type="text" name="first_name" value="<?php echo $edt['first_name'];?>" class="form-control" placeholder="First Name" onkeypress="return onlyAlpha(event);"/> 
                            <?php echo form_error("first_name");?>
                        </div>
                         <div class="col-lg-6">
                            <label>Last Name <span class="text-red">*</span></label>
                            <input type="text" name="last_name" value="<?php echo $edt['last_name'];?>" class="form-control" placeholder="Last Name" onkeypress="return onlyAlpha(event);"/>
                            <?php echo form_error("last_name");?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                            <label>Email Id <span class="text-red">*</span></label>
                            <input type="email" name="email" value="<?php echo $edt['login_email'];?>" class="form-control" placeholder="Email Id" readonly="readonly"/>
                            <?php echo form_error("email");?><span class="text-red namrem"></span>
                        </div>
                         <div class="col-lg-6">
                            <label>Mobile No.</label>
                            <input type="text" name="mobile" value="<?php echo $edt["mobile"];?>" class="form-control" placeholder="Mobile No." ruleset="[^0-9]" onkeyup="validateR(this, '')"  maxlength="10"/>
                            <?php echo form_error("mobile");?>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-default" value="Update Customer Care" name="update_customer"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>