<?php if($this->session->flashdata("msg") != ""){ ?>
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>        
    <h4>
        <?php echo $this->session->flashdata("msg");?>
    </h4>
</div>
<?php } ?>
<?php if($this->session->flashdata("err") != ""){ ?>
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><?php echo $this->session->flashdata("err");?></h4>
</div>
<?php }?>
<?php  
if($this->session->userdata("chebox") == 1 && $this->session->userdata("info") != "" ){ ?>
    <div class="alert alert-info">
        <h4>Do you want to post an another Ad....?</h4>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <button type="button"  data-dismiss="alert" aria-hidden="true" class="btn btn-warning btn-yes">Yes</button>
        <button type="button" class="btn btn-danger btn-nop">No</button>
    </div>
<?php } ?>

<?php if($this->session->userdata("postad_success") != ""){ ?>
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>        
    <h4>
        <?php echo $this->session->userdata("postad_success");?>
    </h4>
</div>
<?php } ?>

<!-- report message alert -->
<?php if($this->session->flashdata("reportmsg") != ""){ ?>
<div class="alert">
    <h3 style='color: #88C425;'>
        <?php echo $this->session->flashdata("reportmsg");?>
    </h3>
</div>
<?php } ?>

<?php if($this->session->flashdata("payment") != ""){ ?>
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>        
    <h4>
        <?php echo $this->session->flashdata("payment");?>
    </h4>
</div>
<?php } ?>

<?php if($this->session->userdata("cancelad") != ""){ ?>
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>        
    <h4>
        <?php echo $this->session->userdata("cancelad");?>
    </h4>
</div>
<?php } ?>