<!-- begin PAGE TITLE AREA -->
<!-- Use this section for each page's title and breadcrumb layout. In this example a date range picker is included within the breadcrumb. -->
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>Change Password
                <small>Change Password</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url();?>admin_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Change Password</li>
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
                <h4>Change Password</h4>
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
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <label>Password <span class="text-red">*</span></label>
                            <input type="password" name="password" class="form-control" placeholder="Password"/> 
                            <?php echo form_error("password");?>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                     <div class="form-group">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <label>Confirm Password <span class="text-red">*</span></label>
                            <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password"/>
                            <?php echo form_error("cpassword");?>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-default" value="Save" name="change"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>