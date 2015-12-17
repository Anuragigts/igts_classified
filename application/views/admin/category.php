<!-- begin PAGE TITLE AREA -->
<!-- Use this section for each page's title and breadcrumb layout. In this example a date range picker is included within the breadcrumb. -->
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>Categories
                <small>Categories</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url();?>admin_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Categories</li>
            </ol>
        </div>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<!-- end PAGE TITLE AREA -->

<!-- begin DASHBOARD CIRCLE TILES -->
<div class="row">
    <div class="portlet portlet-default">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h4>Categories</h4>
            </div>
            <div class="portlet-widgets">
                <span class="divider"></span>
                <a data-toggle="collapse" data-parent="#accordion" href="#defaultPortlet"><i class="fa fa-chevron-down"></i></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div id="defaultPortlet" class="panel-collapse collapse in">
            <div class="portlet-body">
                 <?php $this->load->view("admin/success_error");?>
                <form class="form-horizontal" id="validate" method="post">
                    <div class="form-group">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                           <label>Category Name <span class="text-red">*</span></label>
                           <input type="text" name="cat_name" value="<?php echo set_value("cat_name");?>" class="form-control sct-ret" placeholder="Category Name" maxlength="100"/> 
                            <?php echo form_error("cat_name");?>
                        </div>
                        <div class="col-lg-4"></div>                        
                    </div>
                    <div class="form-group">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-2">
                            <input type="submit" name="create_category" value="Create Category" class="btn btn-default"/> 
                        </div>
                        <div class="col-lg-5"></div>                        
                    </div>
                </form>
                <div class="row"></div>
                <h3>List Categories</h3>
                <div class="table-responsive tb-row">
                    <table id="example-table" class="table table-striped table-bordered table-hover table-default">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                $i = 1;
                                foreach($view as $vw){?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php  
                                        $val = ucfirst($vw->category_name);
                                        echo $val;?></td>
                                        <td>
                                            <a href="javascript:void(0);" category="<?php echo $vw->category_id;?>" class="edcategory" data-toggle="modal" data-target="#flexModal" title="Edit Category"><i class='fa fa-edit text-blue'></i></a>
                                            <?php if($vw->category_status == 0){ ?>
                                                <a href="javascript:void(0);" class="cactivate" title="Activate" cname="<?php echo $val;?>" category="<?php echo $vw->category_id;?>"><i class='fa fa-check-circle-o text-green'></i></a>
                                            <?php } else { ?>
                                                <a href="javascript:void(0);" class="cdeactivate" title="Deactivate" cname="<?php echo $val;?>" category="<?php echo $vw->category_id;?>"><i class='fa fa-times-circle-o text-red'></i></a>
                                            <?php } ?>
                                            <a href="<?php echo base_url();?>category/delete/<?php echo $vw->category_id;?>" title="Delete Category"><i class='fa fa-trash-o text-red'></i></a>
                                        </td>
                                    </tr>
                                <?php 
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end DASHBOARD CIRCLE TILES -->
<div class="modal modal-flex fade" id="flexModal" tabindex="-1" role="dialog" aria-labelledby="flexModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="flexModalLabel">Edit Category</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    <div class="htname">
                        
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                           <label>Category Name <span class="text-red">*</span></label>
                           <input type="text" name="cat_name" class="form-control ctname" placeholder="Category Name" onkeypress="return onlyAlpha(event);" maxlength="100"/> 
                           <span class="err-cat text-red"></span>
                        </div>
                        <div class="col-lg-2"></div>                        
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <button type="button" class="btn btn-default update_ca btn_cat" category="">Update Category</button>
                        </div>
                        <div class="col-lg-4"></div>                        
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $(".cactivate").click(function(){
            var category   =   $(this).attr("category");
            var name   =   $(this).attr("cname");
            $.post( "<?php echo base_url();?>category/categoryActDea" , { category: category , status : 1} ,function( data ) {
                    if(data > 0){
                            alert(name + " is activated");
                            location.reload();
                    }else{
                             alert(name + " is Not activated");
                    }
            });
    });
    $(".cdeactivate").click(function(){
            var category   =   $(this).attr("category");
            var name   =   $(this).attr("cname");
            $.post( "<?php echo base_url();?>category/categoryActDea" , { category: category , status : 0} ,function( data ) {
                    if(data > 0){
                            alert(name + " is Deactivated");
                            location.reload();
                    }else{
                             alert(name + " is Not Deactivated");
                    }
            });
    }); 
    $(".edcategory").click(function(){
            var category   =   $(this).attr("category");
            $.post( "<?php echo base_url();?>category/edcategory" , { category: category} ,function( data ) {
                   $(".ctname").val(data);
                   $(".btn_cat").attr("category",category);
            });
    });       
    $(".update_ca").click(function(){
            var ct = $(".ctname").val();
            var category = $(".btn_cat").attr("category");            
            if(ct == ""){
                    $(".err-cat").html("Category Name is required");
            }
            else{ 
                $.post( "<?php echo base_url();?>category/update" , { ct: ct,category:category} ,function( data ) {
                        if(data > 0){                                
                                $(".err-cat").html("");
                                $(".htname").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Updated category successfully</div>');
                        }else{
                                $(".err-cat").html("");
                                $(".htname").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Internal error occured while updating category</div>');
                        }
                });
            }
    });
    $(".md-close").click(function(){ 
            location.reload();
    });
</script>