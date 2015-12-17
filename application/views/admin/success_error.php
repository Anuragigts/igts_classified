<?php if($this->session->flashdata("msg") != ""){ ?>
<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $this->session->flashdata("msg");?>
</div>
<?php } ?>
<?php if($this->session->flashdata("err") != ""){ ?>
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
   <?php echo $this->session->flashdata("err");?>
</div>
<?php }?>