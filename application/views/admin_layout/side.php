		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span3">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
					 <li class="side-user hidden-xs text-center">
							<img class="img-circle" src="<?php echo base_url();?>profiles/<?php echo $this->session->userdata("profile_img");?>" alt="">
							<p class="welcome text-center">
								<i class="icon-key"></i> Logged in as
							</p>
							<p class="name tooltip-sidebar-logout text-center">
								<?php echo $this->session->userdata("first_name");?>
								<span class="last-name"><?php echo $this->session->userdata("last_name");?></span> <a style="color: inherit" class="logout_open" href="#logout" data-toggle="tooltip" data-placement="top" title="Logout"><i class="fa fa-sign-out"></i></a>
							</p>
							<div class="clearfix"></div>
						</li>
						<li><a href="<?php echo base_url();?>admin_dashboard"><i class="icon-dashboard"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
						<?php echo $sess_user_type = $this->session->userdata('user_type');
						if($sess_user_type !=5){?>
						<li>
							<a class="dropmenu" href="#"><i class="icon-cogs"></i><span class="hidden-tablet"> Staff Management &nbsp;</span><span class=""> <i class="icon-sort-down white"></i> </span></a>
							<ul style='margin-left:15px; color:green' >
							<?php
							if($sess_user_type == 1){?>
								<li>
									<a class="submenu" href="<?php echo base_url();?>users/staff/2">
										<i class="fa fa-angle-double-right"></i> Admin InCharge
									</a>
								</li>
							<?php }if($sess_user_type <= 2){?>
								<li>
									<a class="submenu" href="<?php echo base_url();?>users/staff/3">
										<i class="fa fa-angle-double-right"></i> Managers
									</a>
								</li>
								<?php }if($sess_user_type <= 3){?>
								<li>
									<a class="submenu" href="<?php echo base_url();?>users/staff/4">
										<i class="fa fa-angle-double-right"></i> Supervisors
									</a>
								</li>
								<?php }?>
								<li>
									<a class="submenu" href="<?php echo base_url();?>users/staff/5">
										<i class="fa fa-angle-double-right"></i> Customer Care
									</a>
								</li>
							</ul>
						</li>
						<?php }?>
						<li><a href="<?php echo base_url()?>settings/list_banners"><i class="icon-lock"></i><span class="hidden-tablet"> Banners </span></a></li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-cogs"></i><span class="hidden-tablet">Category Management &nbsp;</span><span class=""> <i class="icon-sort-down white"></i> </span></a>
							<ul style='margin-left:15px; color:green' >
								<li>
									<a class="submenu" href="<?php echo base_url();?>category">
										<i class="fa fa-angle-double-right"></i> Main Category
									</a>
								</li>
								<li>
									<a class="submenu" href="<?php echo base_url();?>subcategory">
										<i class="fa fa-angle-double-right"></i> Sub Category Level-1
									</a>
								</li>
								<li>
									<a class="submenu" href="<?php echo base_url();?>subsubcategory/">
										<i class="fa fa-angle-double-right"></i> Sub Category Level-2
									</a>
								</li>
								<li>
									<a class="submenu" href="<?php echo base_url();?>subsubsubcategory/">
										<i class="fa fa-angle-double-right"></i> Sub Category Level-3
									</a>
								</li>
							</ul>
						</li>
						<!--<li><a href="<?php echo base_url();?>users/CustomerCare"><i class="icon-user"></i><span class="hidden-tablet"> User</span></a></li>
						<li><a href="<?php echo base_url();?>ads/"><i class="icon-bullhorn"></i><span class="hidden-tablet"> Advertisements </span></a></li>-->
						<!--<li><a href="<?php echo base_url();?>customercare"><i class="icon-headphones"></i><span class="hidden-tablet"> Customer Care </span></a></li>
						<li><a href="widgets.html"><i class="icon-headphones"></i><span class="hidden-tablet"> Widgets</span></a></li>-->
						<li >
							<a class="dropmenu" href="#"><i class="icon-cogs"></i><span class="hidden-tablet"> Advertisements &nbsp;</span><span class=""> <i class="icon-sort-down white"></i> </span></a>
							<ul style='margin-left:15px; color:green' >
								<li>
									<a class="submenu" href="<?php echo base_url();?>users/list_userads">
										<i class="fa fa-angle-double-right"></i> User List Ads
									</a>
								</li>
								<li>
									<a class="submenu" href="<?php echo base_url();?>ads/aprovals">
										<i class="fa fa-angle-double-right"></i> Ad-Approvals
									</a>
								</li>
								<li>
									<a class="submenu" href="<?php echo base_url();?>ads/listAds/platinum/">
										<i class="fa fa-angle-double-right"></i> Platinum Package Ads
									</a>
								</li>
								 <li>
									<a class="submenu" href="<?php echo base_url();?>ads/listAds/gold/">
										<i class="fa fa-angle-double-right"></i> Gold Package Ads
									</a>
								</li>
								 <li>
									<a class="submenu" href="<?php echo base_url();?>ads/listAds/free/">
										<i class="fa fa-angle-double-right"></i> Free Package Ads
									</a>
								</li>
								<li>
									<a class="submenu" href="<?php echo base_url();?>category/listPackages">
										<i class="fa fa-angle-double-right"></i> Package List
									</a>
								</li>
								<li>
									<a class="submenu" href="<?php echo base_url();?>category/urgLabel">
										<i class="fa fa-angle-double-right"></i> Urgent Label
									</a>
								</li>
								
							</ul>	
						</li>
						<li >
							<a class="dropmenu" href="#"><i class="icon-cogs"></i><span class="hidden-tablet"> Reports &nbsp;</span><span class=""> <i class="icon-sort-down white"></i> </span></a>
							<ul style='margin-left:15px; color:green' >
								<li>
									<a class="submenu" href="<?php echo base_url();?>Reports/Ads">
										<i class="fa fa-angle-double-right"></i> Ads
									</a>
								</li>					
							</ul>	
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-cogs"></i><span class="hidden-tablet"> User Management &nbsp;</span><span class=""> <i class="icon-sort-down white"></i> </span></a>
							<ul style='margin-left:15px; color:green'>
								<li>
									<a class="submenu" href="<?php echo base_url();?>users/get_users/business">
										<i class="fa fa-angle-double-right"></i> Business
									</a>
								</li>
								<li>
									<a class="submenu" href="<?php echo base_url();?>users/get_users/consumer">
										<i class="fa fa-angle-double-right"></i> Consumers
									</a>
								</li>
							</ul>
						</li>
						
						<li><a href="<?php echo base_url()?>settings/change_password"><i class="icon-lock"></i><span class="hidden-tablet"> Change Password</span></a></li>
						
						<li><a href="<?php echo base_url()?>admin/logout"><i class="icon-lock"></i><span class="hidden-tablet"> LogOut</span></a></li>
					</ul>
				</div>
			</div>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>