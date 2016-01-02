			<!-- Header-->
            
			<div class="top_head">
				<div class="container">
					<div class="row">
						<div class="top-head">
							<div class="col-sm-12">
								<ul class="social-team  pull-right">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-skype"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-youtube"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>                 
							</div> 
						</div>				
					</div>
				</div>
			</div>
			
			<header id="header" class="header-v1">
                <!-- Main Nav -->
                <nav class="flat-mega-menu">            
                    <!-- flat-mega-menu class -->
                    <label for="mobile-button"> <i class="fa fa-bars"></i></label><!-- mobile click button to show menu -->
                    <input id="mobile-button" type="checkbox">                          
					
					<ul class="collapse"><!-- collapse class for collapse the drop down -->
                        <!-- website title - Logo class -->
                        <li class="title">
                            <a href="index.php"><img src="<?php echo base_url(); ?>img/365deal.png"  alt="Logo">  </a> 
                        </li>
                        <?php $lid  =$this->session->userdata("login_id");
                        if($lid == ''){ ?>
                        <li style="margin-top: 8px;"><a href="<?php echo base_url(); ?>login" class="bor_log">LOGIN</a></li>
                        <li style="margin-top: 8px;"><a href="<?php echo base_url(); ?>signup" class="bor_reg">REGISTER</a></li>
                        <?php }
                        else{ ?>
                        <li style="margin-top: 8px;"><a href="<?php echo base_url(); ?>deals_administrator" class="bor_log">My Dashboard</a></li>
                        <li style="margin-top: 8px;"><a href="<?php echo base_url(); ?>login/logout" class="bor_log">Logout</a></li>
                      <?php  }
                         ?>
						<!-- <li style="margin-top: 8px;"><a href="login" class="bor_log">LOGIN</a></li>
						<li style="margin-top: 8px;"><a href="signup" class="bor_reg">REGISTER</a></li> -->
						<li class=" pull-right"><a href="postad"><img src="<?php echo base_url(); ?>img/postanad.png"  alt="postanad"> </a></li>
                    </ul>
                </nav>
                <!-- Main Nav -->
            </header>
            <!-- End Header-->

           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>