<nav class="navbar-top" role="navigation">

    <!-- begin BRAND HEADING -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".sidebar-collapse">
            <i class="fa fa-bars"></i> Menu
        </button>
        <div class="navbar-brand">
            <a href="<?php echo base_url(); ?>admin_dashboard">
                <img src="<?php echo $this->config->item('admin_assets_url');?>img/flex-admin-logo.png" data-1x="<?php echo $this->config->item('admin_assets_url');?>img/flex-admin-logo.png" data-2x="img/flex-admin-logo.png" class="hisrc img-responsive" alt="">
            </a>
        </div>
    </div>
    <!-- end BRAND HEADING -->

    <div class="nav-top">

        <!-- begin LEFT SIDE WIDGETS -->
        <ul class="nav navbar-left">
            <li class="tooltip-sidebar-toggle">
                <a href="#" id="sidebar-toggle" data-toggle="tooltip" data-placement="right" title="Sidebar Toggle">
                    <i class="fa fa-bars"></i>
                </a>
            </li>
            <!-- You may add more widgets here using <li> -->
        </ul>
        <!-- end LEFT SIDE WIDGETS -->

        <!-- begin MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->
        <ul class="nav navbar-right">

            <!-- begin ALERTS DROPDOWN -->
            <li class="dropdown">
                <a href="#" class="alerts-link dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell"></i> 
                    <span class="number">9</span><i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-scroll dropdown-alerts">

                    <!-- Alerts Dropdown Heading -->
                    <li class="dropdown-header">
                        <i class="fa fa-bell"></i> 9 New Alerts
                    </li>

                    <!-- Alerts Dropdown Body - This is contained within a SlimScroll fixed height box. You can change the height using the SlimScroll jQuery features. -->
                    <li id="alertScroll">
                        <ul class="list-unstyled">
                            <li>
                                <a href="#">
                                    <div class="alert-icon green pull-left">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    Order #2931 Received
                                    <span class="small pull-right">
                                        <strong>
                                            <em>3 minutes ago</em>
                                        </strong>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="alert-icon blue pull-left">
                                        <i class="fa fa-comment"></i>
                                    </div>
                                    New Comments
                                    <span class="badge blue pull-right">15</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="alert-icon orange pull-left">
                                        <i class="fa fa-wrench"></i>
                                    </div>
                                    Crawl Errors Detected
                                    <span class="badge orange pull-right">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="alert-icon yellow pull-left">
                                        <i class="fa fa-question-circle"></i>
                                    </div>
                                    Server #2 Not Responding
                                    <span class="small pull-right">
                                        <strong>
                                            <em>5:25 PM</em>
                                        </strong>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="alert-icon red pull-left">
                                        <i class="fa fa-bolt"></i>
                                    </div>
                                    Server #4 Crashed
                                    <span class="small pull-right">
                                        <strong>
                                            <em>3:34 PM</em>
                                        </strong>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="alert-icon green pull-left">
                                        <i class="fa fa-plus-circle"></i>
                                    </div>
                                    New Users
                                    <span class="badge green pull-right">5</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="alert-icon orange pull-left">
                                        <i class="fa fa-download"></i>
                                    </div>
                                    Downloads
                                    <span class="badge orange pull-right">16</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="alert-icon purple pull-left">
                                        <i class="fa fa-cloud-upload"></i>
                                    </div>
                                    Server #8 Rebooted
                                    <span class="small pull-right">
                                        <strong>
                                            <em>12 hours ago</em>
                                        </strong>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="alert-icon red pull-left">
                                        <i class="fa fa-bolt"></i>
                                    </div>
                                    Server #8 Crashed
                                    <span class="small pull-right">
                                        <strong>
                                            <em>12 hours ago</em>
                                        </strong>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Alerts Dropdown Footer -->
                    <li class="dropdown-footer">
                        <a href="#">View All Alerts</a>
                    </li>

                </ul>
                <!-- /.dropdown-menu -->
            </li>

            <!-- begin USER ACTIONS DROPDOWN -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-user"></i>  <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <a href="<?php echo base_url();?>settings/profile">
                            <i class="fa fa-user"></i> My Profile
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo base_url();?>settings/change_password">
                            <i class="fa fa-gear"></i> Settings
                        </a>
                    </li>
                    <li>
                        <a class="logout_open" href="#logout">
                            <i class="fa fa-sign-out"></i> Logout
                            <strong><?php echo $this->session->userdata("first_name")." ".$this->session->userdata("last_name");?></strong>
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-menu -->
            </li>
            <!-- /.dropdown -->
            <!-- end USER ACTIONS DROPDOWN -->

        </ul>
        <!-- /.nav -->
        <!-- end MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->

    </div>
    <!-- /.nav-top -->
</nav>