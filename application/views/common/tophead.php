<!-- Header-->
            <header id="header" class="header-v1">
                <!-- Main Nav -->
                <nav class="flat-mega-menu">            
                    <!-- flat-mega-menu class -->
                    <label for="mobile-button"> <i class="fa fa-bars"></i></label><!-- mobile click button to show menu -->
                    <input id="mobile-button" type="checkbox">                          

                    <ul class="collapse"><!-- collapse class for collapse the drop down -->
                        <!-- website title - Logo class -->
                        <li class="title">
                            <a href="index.php">
								<img src="img/365deal.png"  alt="Logo"> 
							</a> 
                        </li>
					</ul>
					<ul class="collapse pull-right login_bor">
                        <li class="social-bar"> <a href="#">FOLLOW US</a> 
                            <ul class="drop-down hover-zoom">
                                <li> <a href="#" target="_blank"><i class="fa fa-flickr" ></i> </a> </li>
                                <li> <a href="#" target="_blank"><i class="fa fa-instagram"></i> </a> </li>
                                <li> <a href="#" target="_blank"><i class="fa fa-youtube"></i> </a> </li>
                                <li> <a href="#" target="_blank"><i class="fa fa-facebook"></i> </a> </li>
                                <li> <a href="#" target="_blank"><i class="fa fa-google-plus"></i> </a> </li>
                                <li> <a href="#" target="_blank"><i class="fa fa-pinterest"></i> </a> </li>
                            </ul>
                        </li>
                        <?php $lid  =$this->session->userdata("login_id");
                        if($lid == ''){ ?>
                        <li><a href="login">LOGIN</a></li>
                        <li><a href="signup">REGISTER</a></li>
                        <?php }
                        else{ ?>
                        <li><a href="login/logout">Logout</a></li>
                        <li><a href="showmyads">Showmyads</a></li>
                      <?php  }
                         ?>
						
						<li class="title pull-right"><a href="postad"><img src="img/postanad.png"  alt="postanad"> </a></li>
                    </ul>
                </nav>
                <!-- Main Nav -->
            </header>
            <!-- End Header-->