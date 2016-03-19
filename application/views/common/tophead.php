	<!-- Header-->
	
	<div class="top_head">
		<div class="container">
			<div class="row">
				<div class="top-head">
					<div class="col-sm-12">
						                
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
					<a href="<?php echo base_url(); ?>home-page"><img src="<?php echo base_url(); ?>img/99deals.png"  alt="Logo" title="99 Right Deals">  </a> 
				</li>
				<?php $lid  =$this->session->userdata("login_id");
				if($lid == ''){ ?>
				<li style="margin-top: 8px;"><a href="<?php echo base_url(); ?>login" class="bor_log">LOGIN</a></li>
				<li style="margin-top: 8px;"><a href="<?php echo base_url(); ?>signup" class="bor_reg">REGISTER</a></li>
				<li style="margin-top: 8px;"><a href="<?php echo base_url(); ?>how_it_works" class="bor_reg">HOW IT WORKS</a></li>
				<?php }
				else{ ?>
				<li style="margin-top: 8px;"><a href="<?php echo base_url(); ?>deals_administrator" class="bor_log">My Dashboard</a></li>
				<li style="margin-top: 8px;"><a href="<?php echo base_url(); ?>login/logout" class="bor_log">Logout</a></li>
				<li style="margin-top: 8px;"><a href="<?php echo base_url(); ?>how_it_works" class="bor_reg">HOW IT WORKS</a></li>
			  <?php  }
				 ?>
				<!-- <li style="margin-top: 8px;"><a href="login" class="bor_log">LOGIN</a></li>
				<li style="margin-top: 8px;"><a href="signup" class="bor_reg">REGISTER</a></li> -->
				<li class=" pull-right"><a href="<?php echo base_url(); ?>post-a-deal"><img src="<?php echo base_url(); ?>img/postanad.png"  alt="postanad" title="Post Deal"> </a></li>
			</ul>
		</nav>
		<!-- Main Nav -->
	</header>
	<!-- End Header-->

   <style>
		#feedback {

			position: fixed;

			top: 75%;

			right: 0;

			z-index: 151;

			display: inline-block;

		}

		#aa {

			background: url(<?php echo base_url(); ?>img/icons/feedback.png) no-repeat;

			width: 40px;

			height: 144px;

			border: none;

			outline: none;

			
		}
	</style>

	<div id="feedback">
		<div id="aa" data-toggle="modal" data-target="#feedback_1"></div>
	</div>