<nav class="navbar-side" role="navigation">
    <div class="navbar-collapse sidebar-collapse collapse">
        <ul id="side" class="nav navbar-nav side-nav">
            <!-- begin SIDE NAV USER PANEL -->
            <li class="side-user hidden-xs">
                <img class="img-circle" src="<?php echo base_url();?>profiles/<?php echo $this->session->userdata("profile_img");?>" alt="">
                <p class="welcome">
                    <i class="fa fa-key"></i> Logged in as
                </p>
                <p class="name tooltip-sidebar-logout">
                    <?php echo $this->session->userdata("first_name");?>
                    <span class="last-name"><?php echo $this->session->userdata("last_name");?></span> <a style="color: inherit" class="logout_open" href="#logout" data-toggle="tooltip" data-placement="top" title="Logout"><i class="fa fa-sign-out"></i></a>
                </p>
                <div class="clearfix"></div>
            </li>

            <li>
                <a class="admin_dashboard" href="<?php echo base_url();?>admin_dashboard">
                    <i class="fa fa-dashboard"></i> Dashboard
                </a>
            </li>
            <li>
                <a  href="<?php echo base_url();?>users" class="users">
                    <i class="fa fa-user"></i> Users
                </a>
            </li>
             <li>
                <a  href="<?php echo base_url();?>ads" class="ads">
                    <i class="fa fa-bullhorn"></i> Advertisements
                </a>
            </li>
            <li>
                <a href="<?php echo base_url();?>customercare" class="customercare">
                    <i class="fa fa-users"></i> Customer Care
                </a>
            </li>
            <!-- end CALENDAR LINK -->
            <!-- begin TABLES DROPDOWN -->
            <li class="panel">
                <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle category" data-target="#settings">
                    <i class="fa fa-cog"></i> Settings <i class="fa fa-caret-down"></i>
                </a>
                <ul class="collapse nav navcategory navsubcategory navsubsubcategory navadmin navsettings navad_validity navreport_category" id="settings">
                    <li>
                        <a href="<?php echo base_url();?>category">
                            <i class="fa fa-angle-double-right"></i> Category
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url();?>subcategory">
                            <i class="fa fa-angle-double-right"></i> Sub Category
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo base_url();?>subsubcategory">
                            <i class="fa fa-angle-double-right"></i> Sub Sub Category
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo base_url();?>admin/banner">
                            <i class="fa fa-angle-double-right"></i> Banner
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo base_url();?>settings/profile">
                            <i class="fa fa-angle-double-right"></i> Update Profile
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo base_url();?>settings/change_password">
                            <i class="fa fa-angle-double-right"></i> Change Password
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo base_url();?>ad_validity">
                            <i class="fa fa-angle-double-right"></i> Ad Validity  & Price
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo base_url();?>report_category">
                            <i class="fa fa-angle-double-right"></i> Report Category
                        </a>
                    </li>
                </ul>
            </li>
            <!-- end TABLES DROPDOWN -->
        </ul>
        <!-- /.side-nav -->
    </div>
    <!-- /.navbar-collapse -->
</nav>