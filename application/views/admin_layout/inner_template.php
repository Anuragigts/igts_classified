<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.startbootstrap.com/flex-admin-v1.2/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2015 06:59:35 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $metadesc;?>">
    <meta name="author" content="<?php echo $metakey;?>">

    <title><?php echo $title;?></title>

    <!-- PACE LOAD BAR PLUGIN - This creates the subtle load bar effect at the top of the page. -->
    <link href="<?php echo $this->config->item('admin_assets_url');?>css/plugins/pace/pace.css" rel="stylesheet">
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/pace/pace.js"></script>

    <!-- GLOBAL STYLES - Include these on every page. -->
    <link href="<?php echo $this->config->item('admin_assets_url');?>css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <link href="<?php echo $this->config->item('admin_assets_url');?>icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- PAGE LEVEL PLUGIN STYLES -->
    <link href="<?php echo $this->config->item('admin_assets_url');?>css/plugins/messenger/messenger.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('admin_assets_url');?>css/plugins/messenger/messenger-theme-flat.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('admin_assets_url');?>css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('admin_assets_url');?>css/plugins/morris/morris.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('admin_assets_url');?>css/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('admin_assets_url');?>css/plugins/datatables/datatables.css" rel="stylesheet">

    <!-- THEME STYLES - Include these on every page. -->
    <link href="<?php echo $this->config->item('admin_assets_url');?>css/style.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('admin_assets_url');?>css/plugins.css" rel="stylesheet">

    <!-- THEME DEMO STYLES - Use these styles for reference if needed. Otherwise they can be deleted. -->
    <link href="<?php echo $this->config->item('admin_assets_url');?>css/demo.css" rel="stylesheet">
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/jquery.min.js"></script>
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- begin TOP NAVIGATION -->
        <?php $this->load->view("admin_layout/top_header");?>
        <!-- /.navbar-top -->
        <!-- end TOP NAVIGATION -->

        <!-- begin SIDE NAVIGATION -->
        <?php $this->load->view("admin_layout/side");?>
        <!-- /.navbar-side -->
        <!-- end SIDE NAVIGATION -->

        <!-- begin MAIN PAGE CONTENT -->
        <div id="page-wrapper">

            <div class="page-content">
                    <?php echo $this->load->view("admin/".$content);?>
            </div>
            <!-- /.page-content -->

        </div>
        <!-- /#page-wrapper -->
        <!-- end MAIN PAGE CONTENT -->

    </div>
    <!-- /#wrapper -->

    <!-- GLOBAL SCRIPTS -->
    
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/popupoverlay/jquery.popupoverlay.js"></script>
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/popupoverlay/defaults.js"></script>
    <!-- Logout Notification Box -->
    <div id="logout">
        <div class="logout-message">
            <img class="img-circle img-logout" src="<?php echo base_url();?>profiles/avatar.jpg" alt="">
            <h3>
                <i class="fa fa-sign-out text-green"></i> Ready to go?
            </h3>
            <p>Select "Logout" below if you are ready<br> to end your current session.</p>
            <ul class="list-inline">
                <li>
                    <a href="<?php echo base_url();?>admin/logout" class="btn btn-green">
                        <strong>Logout</strong>
                    </a>
                </li>
                <li>
                    <button class="logout_close btn btn-green">Cancel</button>
                </li>
            </ul>
        </div>
    </div>
    <!-- /#logout -->
    <!-- Logout Notification jQuery -->
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/popupoverlay/logout.js"></script>
    <!-- HISRC Retina Images -->
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/hisrc/hisrc.js"></script>

    <!-- PAGE LEVEL PLUGIN SCRIPTS -->
    <!-- HubSpot Messenger -->
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/messenger/messenger.min.js"></script>
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/messenger/messenger-theme-flat.js"></script>
    <!-- Date Range Picker -->
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/daterangepicker/moment.js"></script>
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Easy Pie Chart -->
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/easypiechart/jquery.easypiechart.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/plugins/datatables/datatables-bs3.js"></script>

    <!-- THEME SCRIPTS -->
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/flex.js"></script>
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/demo/dashboard-demo.js"></script>
    
    <script src="<?php echo $this->config->item('admin_assets_url');?>js/demo/advanced-tables-demo.js"></script>
    <script>
        var ads = "<?php echo $this->uri->segment(1);?>";
        $("."+ads).addClass("active");
        $(".nav"+ads).addClass("in");
    </script>
    <?php $this->load->view("admin_layout/script");?>
</body>


<!-- Mirrored from themes.startbootstrap.com/flex-admin-v1.2/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Sep 2015 07:00:33 GMT -->
</html>
