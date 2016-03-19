<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>99 Right Deals :: Admin</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="<?php echo base_url();?>admin_template_files/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>admin_template_files/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="<?php echo base_url();?>admin_template_files/css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="<?php echo base_url();?>admin_template_files/css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	
	<link rel="shortcut icon" href="<?php echo base_url();?>img/icons/icon.png">
<style>
//.name,.welcome {align:center;color:#ffffff;}
.name,.side-user .welcome {
    color: #ffffff;
    font-style: italic;
    margin: 0;
}
.navbar-side .side-user .name .last-name {
    color: #fff;
    font-weight: 400;
}
.side-user img{
	max-width:70%;
}
.container-fluid-full,.row-fluid .span10 {
    min-height: 1200px;
}
.row-fluid #content {
    width: 85.578%;
    padding: 28px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
    margin-left: 19.422% !important
}

.row-fluid .span3 {
    width: 19.077%;
}
.row-fluid #content {
    margin-bottom: 0;
    margin-left: 19.422% !important;
    margin-right: 0;
    margin-top: 0;
    padding: 28px;
    width: 81.578%;
}
td a.btn{
	padding:0px 0px 1px 1px;!important;
}
.halflings-icon{
	width:12px !important;
	height:14px !important;
	margin-top:0px;
}
.btn i{margin:0px;}
td a.btn{line-height:15px;}
</style>	
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand"  style='padding: 0px 20px;' href="<?php echo base_url()?>admin_dashboard"><span><img src='<?php echo base_url()?>img/99_logo.png' alt="99 RightDeals" title="99 RightDeals"></img></span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-bell"></i>
								<span class="badge red">
								<?php echo $this->session->userdata('new');?> </span>
							</a>
							<ul class="dropdown-menu notifications">
								<!--<li class="dropdown-menu-title">
 									<span>You have 11 notifications</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	-->
                            	<li>
                                    <a href="<?php echo base_url()?>ads/listAdsbyStatus/0/">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">New Ads</span>
										<span class="time"><?php echo $this->session->userdata('new');?></span> 
                                    </a>
                                </li>
								<li>
                                    <a href="<?php echo base_url()?>ads/listAdsbyStatus/3/" >
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">Pending Ads</span>
										<span class="time"><?php echo $this->session->userdata('ad_pending');?></span> 
                                    </a>
                                </li>
								<li>
                                    <a href="<?php echo base_url()?>ads/listAdsbyStatus/4/">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">Rejected Ads</span>
										<span class="time"><?php echo $this->session->userdata('ad_reject');?></span> 
                                    </a>
                                </li>
								<li>
                                    <a href="<?php echo base_url()?>ads/listAdsbyStatus/2/">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">On Hold Ads</span>
										<span class="time"><?php echo $this->session->userdata('ad_hold');?></span> 
                                    </a>
                                </li>
								<li>
                                    <a href="<?php echo base_url()?>ads/listAdsbyStatus/1/">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">Active Ads</span>
										<span class="time"><?php echo $this->session->userdata('active_ad');?></span> 
                                    </a>
                                </li>
								<!--<li>
                                    <a href="#">
										<span class="icon yellow"><i class="icon-shopping-cart"></i></span>
										<span class="message">2 items sold</span>
										<span class="time">1 hour</span> 
                                    </a>
                                </li>
								<li class="warning">
                                    <a href="#">
										<span class="icon red"><i class="icon-user"></i></span>
										<span class="message">User deleted account</span>
										<span class="time">2 hour</span> 
                                    </a>
                                </li>
								<li class="warning">
                                    <a href="#">
										<span class="icon red"><i class="icon-shopping-cart"></i></span>
										<span class="message">New comment</span>
										<span class="time">6 hour</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon green"><i class="icon-comment-alt"></i></span>
										<span class="message">New comment</span>
										<span class="time">yesterday</span> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="icon blue"><i class="icon-user"></i></span>
										<span class="message">New user registration</span>
										<span class="time">yesterday</span> 
                                    </a>
                                </li>
                                <li class="dropdown-menu-sub-footer">
                            		<a>View all notifications</a>
								</li>	-->
							</ul>
						</li>
						<li class="dropdown notifications">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-envelope"></i>
								<span class="badge red">
								4 </span>
							</a>
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>Feedbacks & Reports</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
								<li>
                                    <a href="<?php echo base_url()?>admin/AllFeedbacks/1">
									
									<span class="icon green"><i class="icon-comment-alt"></i></span>
									<span class="header">
											<span class="from">
										    	Active Feedbacks
										     </span>
											<span class="time"><?php echo $this->session->userdata('a_feedback').' Feedbacks';?></span>
										</span>
										 
                                    </a>
                                </li>
								<li>
                                    <a href="<?php echo base_url()?>admin/AllFeedbacks/0">
									<span class="icon green"><i class="icon-comment-alt"></i></span>
									<span class="header">
											<span class="from"> In Active Feedbacks</span>
										<span class="time"><?php echo $this->session->userdata('ina_feedback').' Feedbacks';?></span> 
										</span>
                                    </a>
                                </li>
								<li>
                                    <a href="<?php echo base_url()?>admin/AllReports/1">
									<span class="icon green"><i class="icon-comment-alt"></i></span>
									<span class="header">
											<span class="from">Active Reports</span>
										<span class="time"><?php echo $this->session->userdata('a_reports').' Reports';?></span> 
										</span>
                                    </a>
                                </li>
								<li>
                                    <a href="<?php echo base_url()?>admin/AllReports/0">
									<span class="icon green"><i class="icon-comment-alt"></i></span>
									<span class="header">
											<span class="from">In Active Reports</span>
										<span class="time"><?php echo $this->session->userdata('ina_reports').' Reports';?></span> 
										</span>
                                    </a>
                                </li>
							</ul>
						</li>
						<!-- start: Notifications Dropdown -->
						<!--<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-calendar"></i>
								<span class="badge red">
								5 </span>
							</a>
							<ul class="dropdown-menu tasks">
								<li class="dropdown-menu-title">
 									<span>You have 17 tasks in progress</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">iOS Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim red">80</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">Android Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim green">47</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">ARM Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim yellow">32</div> 
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="header">
											<span class="title">ARM Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim greenLight">63</div> 
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="header">
											<span class="title">ARM Development</span>
											<span class="percent"></span>
										</span>
                                        <div class="taskProgress progressSlim orange">80</div> 
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all tasks</a>
								</li>	
							</ul>
						</li>-->
						<!-- end: Notifications Dropdown -->
						<!-- start: Message Dropdown -->
						<!--<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-envelope"></i>
								<span class="badge red">
								4 </span>
							</a>
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>You have 9 messages</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	6 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	56 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	3 hours
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	yesterday
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	Dennis Ji
										     </span>
											<span class="time">
										    	Jul 25, 2012
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all messages</a>
								</li>	
							</ul>
						</li>-->
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?php echo $this->session->userdata("first_name");?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="<?php echo base_url()?>admin/profile"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="<?php echo base_url()?>admin/logout"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>