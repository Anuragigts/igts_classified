<!-- begin PAGE TITLE AREA -->
<!-- Use this section for each page's title and breadcrumb layout. In this example a date range picker is included within the breadcrumb. -->
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>Sub Sub Categories
                <small>Sub Sub Categories</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url();?>admin_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Sub Sub Categories</li>
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
                <h4>Sub Sub Categories</h4>
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
                        <div class="col-lg-6">
                            <label>Category Name <span class="text-red">*</span></label>
                            <select name="cat_name" class="form-control cat_chage">
                                <option value="">-- Select Category --</option>
                                <?php foreach ($view as $vt){ ?>
                                <option value="<?php echo $vt->category_id;?>" <?php echo set_select("cat_name",$vt->category_id);?>><?php echo ucfirst($vt->category_name);?></option>
                                <?php } ?>
                            </select>
                            <?php echo form_error("cat_name");?>
                        </div>
                        <div class="col-lg-6">
                           <label>Sub Category Name <span class="text-red">*</span></label>
                           <select name="scat_name" class="form-control scat_chage">
                                <option value="">-- Select Sub Category --</option>
                                <?php foreach ($bview as $vt){ ?>
                                <option value="<?php echo $vt->sub_category_id;?>" <?php echo set_select("scat_name",$vt->sub_category_id);?>><?php echo ucfirst($vt->sub_category_name);?></option>
                                <?php } ?>
                            </select>
                            <?php echo form_error("scat_name");?>                           
                        </div>                
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6">
                           <label>Sub Sub Category Name <span class="text-red">*</span></label>
                           <input type="text" name="sscat_name" value="<?php echo set_value("sscat_name");?>" class="form-control sscat_name sct-ret" placeholder="Sub Sub Category Name" maxlength="100"/> 
                            <?php echo form_error("sscat_name");?>
                        </div>  
                    </div>  
                    <div class="form-group">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-2">
                            <input type="submit" name="create_ssubcategory" value="Create Sub Sub Category" class="btn btn-default"/> 
                        </div>
                        <div class="col-lg-5"></div>                        
                    </div>
                </form>
                <div class="row"></div>
                <h3>List Sub Sub Categories</h3>
                <div class="table-responsive tb-row">
                    <table id="example-table" class="table table-striped table-bordered table-hover table-default">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Sub Sub Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                $i = 1;
                                foreach($sview as $vw){?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php  
                                        $vasl = ucfirst($vw->category_name);
                                        echo $vasl;?></td>
                                        <td><?php  
                                        $val2 = ucfirst($vw->sub_category_name);
                                        echo $val2;?></td>
                                        <td><?php  
                                        $val = ucfirst($vw->sub_subcategory_name);
                                        echo $val;?></td>
                                        <td>
                                            <a href="javascript:void(0);" scategory="<?php echo $vw->sub_subcategory_id;?>" scat="<?php echo $vw->sub_category_id;?>" cat="<?php echo $vw->category_id;?>" class="edcategory" data-toggle="modal" data-target="#flexModal" title="Edit Sub Sub Category"><i class='fa fa-edit text-blue'></i></a>
                                            <?php if($vw->sub_substatus == 0){ ?>
                                                <a href="javascript:void(0);" class="sactivate" title="Activate" cname="<?php echo $val;?>" scategory="<?php echo $vw->sub_subcategory_id;?>"><i class='fa fa-check-circle-o text-green'></i></a>
                                            <?php } else { ?>
                                                <a href="javascript:void(0);" class="sdeactivate" title="Deactivate" cname="<?php echo $val;?>" scategory="<?php echo $vw->sub_subcategory_id;?>"><i class='fa fa-times-circle-o text-red'></i></a>
                                            <?php } ?>
                                            <a href="<?php echo base_url();?>subsubcategory/delete/<?php echo $vw->sub_subcategory_id;?>" title="Delete Sub Sub Category"><i class='fa fa-trash-o text-red'></i></a>
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
<div class="modal modal-flex fade" id="flexModal" tabindex="-1" role="dialog" aria-labelledby="flexModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="flexModalLabel">Edit Sub Sub Category</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    <div class="htname">
                        
                    </div>                    
                    <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <label>Category Name <span class="text-red">*</span></label>
                            <select name="scat_name" class="form-control cat-val cat_chage">
                                <option value="">-- Select Category --</option>
                                <?php foreach ($view as $vt){ ?>
                                <option value="<?php echo $vt->category_id;?>"><?php echo ucfirst($vt->category_name);?></option>
                                <?php } ?>
                            </select>
                            <span class="err-cat text-red"></span>
                        </div>
                        <div class="col-lg-2"></div>  
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <label>Sub Category Name <span class="text-red">*</span></label>
                            <select name="scat_name" class="form-control scat-val scat_chage">
                                <option value="">-- Select Sub Category --</option>
                                <?php foreach ($bview as $vt){ ?>
                                <option value="<?php echo $vt->sub_category_id;?>"><?php echo ucfirst($vt->sub_category_name);?></option>
                                <?php } ?>
                            </select>
                            <span class="err-scat text-red"></span>
                        </div>
                        <div class="col-lg-2"></div>  
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                           <label>Sub Sub Category Name <span class="text-red">*</span></label>
                           <input type="text" name="sscat_name" class="form-control ctname" placeholder="Sub Sub Category Name" onkeypress="return onlyAlpha(event);" maxlength="100"/> 
                           <span class="err-sscat text-red"></span>
                        </div>
                        <div class="col-lg-2"></div>                        
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <button type="button" class="btn btn-default update_cad btn_cat" category="">Update Sub Sub Category</button>
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
    $(".sactivate").click(function(){
            var  ssubcat    =   $(this).attr("scategory");
            var name        =   $(this).attr("cname");
            $.post( "<?php echo base_url();?>subsubcategory/scategoryActDea" , { ssubcat: ssubcat , status : 1} ,function( data ) {
                    if(data > 0){
                            alert(name + " is activated");
                            location.reload();
                    }else{
                             alert(name + " is Not activated");
                    }
            });
    });
    $(".sdeactivate").click(function(){
            var  ssubcat    =   $(this).attr("scategory");
            var name        =   $(this).attr("cname");
            $.post( "<?php echo base_url();?>subsubcategory/scategoryActDea" , { ssubcat: ssubcat , status : 0} ,function( data ) {
                    if(data > 0){
                            alert(name + " is Deactivated");
                            location.reload();
                    }else{
                             alert(name + " is Not Deactivated");
                    }
            });
    });
    $(".edcategory").click(function(){
            var ssubcat    =   $(this).attr("scategory");
            var scat         =   $(this).attr("scat");
            var cat         =   $(this).attr("cat");
            $.post( "<?php echo base_url();?>subsubcategory/edcategory" , { ssubcat: ssubcat} ,function( data ) {
                   $(".cat-val").val(cat);
                   $(".scat-val").val(scat);
                   $(".ctname").val(data);
                   $(".btn_cat").attr("category",ssubcat);
            });
    });
    $(".update_cad").click(function(){
            var scat =  $(this).attr("category");
            var sscat_name =   $(".ctname").val();
            var scat_name =   $(".scat-val").val();
            var cat_name =   $(".cat-val").val();
            if(cat_name == "") {
                    $(".err-cat").html("Category is required");
            }
            if(scat_name ==  ""){
                    $(".err-scat").html("Sub Category is required")
            }
            if(sscat_name ==  ""){
                    $(".err-sscat").html("Sub Sub Category is required")
            }
            if(sscat_name != "" && scat_name != "" && cat_name != ""){
                    $.post( "<?php echo base_url();?>subsubcategory/update", { scat: scat ,sscat_name:sscat_name,scat_name:scat_name,cat_name:cat_name} ,function( data ) {
                            if(data > 0){
                                    $(".err-cat").html("");
                                    $(".err-scat").html("");
                                    $(".err-sscat").html("");
                                    $(".htname").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Updated Sub Sub category successfully</div>');
                            }else{
                                    $(".err-cat").html("");
                                    $(".err-scat").html("");
                                    $(".err-sscat").html("");
                                    $(".htname").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Internal error occured while updating sub sub category</div>');
                            }    
                    });
            }
    });
    $(".md-close").click(function(){ 
            location.reload();
    });
</script>