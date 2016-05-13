<div class="top_head"></div>
<header id="header" class="header-v1">
<nav class="flat-mega-menu">            
<label for="mobile-button"> <i class="fa fa-bars"></i></label>
<input id="mobile-button" type="checkbox">                          

<ul class="collapse">
<li class="title">
<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/99deals.png"  alt="Logo" title="99 Right Deals"></a> 
</li>
<?php $lid  =$this->session->userdata("login_id");
if($lid == ''){ ?>
<li class="top_head_margin"><a href="<?php echo base_url(); ?>login" class="bor_log">LOGIN</a></li>
<li class="top_head_margin"><a href="<?php echo base_url(); ?>register" class="bor_reg">REGISTER</a></li>
<li class="top_head_margin"><a href="<?php echo base_url(); ?>how-it-works" class="bor_reg">HOW IT WORKS</a></li>
<?php }
else{ ?>
<li class="top_head_margin"><a href="<?php echo base_url(); ?>deals-administrator" class="bor_log">MY DASHBOARD</a></li>
<li class="top_head_margin"><a href="<?php echo base_url(); ?>login/logout" class="bor_log">LOGOUT</a></li>
<li class="top_head_margin"><a href="<?php echo base_url(); ?>how-it-works" class="bor_reg">HOW IT WORKS</a></li>
<?php  }
?>
<li class=" pull-right"><a href="<?php echo base_url(); ?>post-a-deal"><img src="<?php echo base_url(); ?>img/postanad.png"  alt="Free Classifieds Ads" title="Post A Deal"> </a></li>
</ul>

</nav>
</header>
	
<style>
#feedback {position: fixed;top: 75%;right: 0;z-index: 151;display: inline-block;}
#aa {background: url(<?php echo base_url(); ?>img/icons/feedback.png) no-repeat;width: 40px;height: 144px;
border: none;outline: none;}
</style>

<div id="feedback"><div id="aa" data-toggle="modal" data-target="#feedback_1"></div></div>