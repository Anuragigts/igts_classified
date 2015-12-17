<!-- begin PAGE TITLE AREA -->
<!-- Use this section for each page's title and breadcrumb layout. In this example a date range picker is included within the breadcrumb. -->
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>Report Type
                <small>Report Type</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?= base_url();?>admin_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Report Type</li>
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
                <h4>Report Type</h4>
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
                           <label>Report Type <span class="text-red">*</span></label>
                           <input type="text" name="rtype" value="<?php echo set_value("rtype");?>" class="form-control" onkeypress="return onlyAlpha(event);" placeholder="Report Type" maxlength="100"/> 
                            <?php echo form_error("rtype");?>
                        </div>
                        <div class="col-lg-4"></div>                        
                    </div>
                    <div class="form-group">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-2">
                            <input type="submit" name="report_type" value="Create Report Type" class="btn btn-default"/> 
                        </div>
                        <div class="col-lg-5"></div>                        
                    </div>
                </form>
                <div class="row"></div>
                <h3>List Report Type</h3>
                <div class="table-responsive tb-row">
                    <table id="example-table" class="table table-striped table-bordered table-hover table-default">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Report Type</th>
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
                                        $val = ucfirst($vw->report_type);
                                        echo $val;?></td>
                                        <td>
                                            <a href="javascript:void(0);" type="<?php echo $val;?>" vid="<?php echo $vw->report_type_id;?>" class="edvd2" data-toggle="modal" data-target="#flexModal" title="Edit Report Category"><i class='fa fa-edit text-blue'></i></a>
                                            <a href="<?php echo base_url();?>report_category/delete/<?php echo $vw->report_type_id;?>" title="Delete Report Category"><i class='fa fa-trash-o text-red'></i></a>
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
                <h4 class="modal-title" id="flexModalLabel">Edit Report Type</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    <div class="htname"> </div>
                    <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <label>Report Type <span class="text-red">*</span></label>
                            <input type="text" name="rtype" class="form-control rtyp1" onkeypress="return onlyAlpha(event);" placeholder="Report Type" maxlength="100"/> 
                            <span class="ty-err text-red"></span>
                        </div>
                        <div class="col-lg-2"></div>                        
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <button type="button" class="btn btn-default update_cay btn_cat" pdvid="">Update Report Type</button>
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
        $(".edvd2").click(function(){
                var ci = $(this).attr("vid");
                var ct = $(this).attr("type"); 
                $.post( "<?php echo base_url();?>report_category/ereport_category" , { ci: ci } ,function(data) {
                        var vpo = data.split("@");
                        $(".rtyp1").val(vpo['0']);
                        $(".update_cay").attr("pdvid",vpo['1']);
                });
        });
        $(".update_cay").click(function(){
                var stype    =   $(".rtyp1").val();
                var rid      =   $(".update_cay").attr("pdvid");  
                if(stype == ""){
                                $(".ty-err").html("Report Type is required");
                }
                if(stype != ""){
                        $.post("<?php echo base_url();?>report_category/uareport_category/"+rid,{'stype': stype,rid:rid},function(data) {
                                //document.write(data);
                                if(data > 0){
                                        $(".ty-err").html("");
                                        $(".htname").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Updated  Report Type successfully</div>');
                                }else{
                                        $(".ty-err").html("");
                                        $(".htname").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Internal error occured while updating report type</div>');
                                }      
                        });
                }
        });     
        $(".md-close").click(function(){ 
                location.reload();
        });           
</script>