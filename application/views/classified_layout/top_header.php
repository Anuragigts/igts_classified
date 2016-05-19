<div class="header">
    <nav class="navbar   navbar-site navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> 
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span> 
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <a href="<?php echo base_url();?>" class="navbar-brand logo logo-title">
                    <span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> <span>CLASSIFIED </span>
                </a> 
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php if($this->session->userdata("login_id") != ""){ ?>
                        <li><a href="<?php echo base_url();?>login/logout">Logout</a></li>
                    <?php } else { ?>
                        <li><a href="<?php echo base_url();?>login">Login</a></li>
                        <li><a href="<?php echo base_url(); ?>register">Signup</a></li>
                    <?php } ?>
                        <li class="postadd"><a class="btn btn-block   btn-border btn-post btn-danger" href="<?php echo base_url();?>postad">Post Free Add</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>