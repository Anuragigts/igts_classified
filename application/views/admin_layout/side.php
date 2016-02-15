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
						<li><a href="<?php echo base_url();?>users/"><i class="icon-user"></i><span class="hidden-tablet"> User</span></a></li>
						<li><a href="<?php echo base_url();?>customercare"><i class="icon-headphones"></i><span class="hidden-tablet"> Customer Care </span></a></li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-cogs"></i><span class="hidden-tablet"> Advertisements &nbsp;</span><span class=""> <i class="icon-sort-down white"></i> </span></a>
							<ul>
								<li>
									<a class="submenu" href="<?php echo base_url();?>ads/aprovals">
										<i class="fa fa-angle-double-right"></i> Ad-Approvals
									</a>
								</li>
								<li>
									<a class="submenu" href="<?php echo base_url();?>subcategory">
										<i class="fa fa-angle-double-right"></i> Sub Category
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
								 <li>
									<a class="submenu" href="<?php echo base_url();?>subsubcategory">
										<i class="fa fa-angle-double-right"></i> Hot-Deals Likes
									</a>
								</li>
							</ul>	
						</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-cogs"></i><span class="hidden-tablet"> User Management &nbsp;</span><span class=""> <i class="icon-sort-down white"></i> </span></a>
							<ul>
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
						<li><a href="#"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>
					</ul>
				</div>
			</div>
		