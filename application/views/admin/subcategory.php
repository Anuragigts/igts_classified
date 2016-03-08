<!-- begin PAGE TITLE AREA -->
<!-- Use this section for each page's title and breadcrumb layout. In this example a date range picker is included within the breadcrumb. -->

<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">SubCategory List</a></li>
	</ul>
	
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>List Sub Categories</h2>
				<div class="box-icon">
					<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
						<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
						<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" id="validate" method="post">
					<fieldset>
						<div class='span6'>
							<div class="control-group">
								<label class="control-label" for="focusedInput">Category Name</label>
								<div class="controls">
									<select name="cat_name" class="form-control cat_chage">
										<option value="">-- Select Category --</option>
										<?php foreach ($view as $vt){ ?>
										<option value="<?php echo $vt->category_id;?>" <?php echo set_select("cat_name",$vt->category_id);?>><?php echo ucfirst($vt->category_name);?></option>
										<?php } ?>
									</select>
									 <?php echo form_error("cat_name");?>
								</div>
							</div>
						</div>
						<div class='span6'>
							<div class="control-group">
								<label class="control-label" for="typeahead">Sub Category Name <span class="text-red">*</span></label>
								<div class="controls">
									<input type="text" name="scat_name" value="<?php echo set_value("scat_name");?>" class="form-control sct-ret" placeholder="Sub Category Name" maxlength="100"/> 
                            <?php echo form_error("scat_name");?>
								</div>
							</div>
						</div>
						
						 <div class="form-group">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-2">
                           <input type="submit" name="create_subcategory" value="Create Sub Category" class="btn btn-default"/> 
                        </div>
                        <div class="col-lg-5"></div>                        
                    </div>
					</fieldset>
				</form>
			</div>
		</div>
		<!--/span-->
	</div>
	<!--/row-->

		<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>List of Sub Categories</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                            <tr>
                               <th>S.No.</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  $i = 1; foreach($sview as $vw){?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php  
                                        $vasl = ucfirst($vw->category_name);
                                        echo $vasl;?></td>
                                        <td><?php  
                                        $val = ucfirst($vw->sub_category_name);
                                        echo $val;?></td>
										
									
								
								
                                        <td>
                                            <a href="javascript:void(0);" category="<?php echo $vw->sub_category_id;?>" cat="<?php echo $vw->category_id;?>" class="edcategory" data-toggle="modal" data-target="#flexModal" title="Edit Sub Category"><i class="halflings-icon edit"></i></a>
                                            <?php if($vw->sub_category_status == 0){ ?>
                                                <a href="javascript:void(0);" class="cactivate" title="Activate" cname="<?php echo $val;?>" category="<?php echo $vw->sub_category_id;?>"><i class='icon-ok-circle text-green'></i></a>
                                            <?php } else { ?>
                                                <a href="javascript:void(0);" class="cdeactivate" title="Deactivate" cname="<?php echo $val;?>" category="<?php echo $vw->sub_category_id;?>"><i class=' icon-remove-circle text-red'></i></a>
                                            <?php } ?>
                                            <a href="<?php echo base_url();?>subcategory/delete/<?php echo $vw->sub_category_id;?>" title="Delete  Sub Category"><i class="icon-trash" style='width:10px; height:12px'></i> </a>
                                        </td>
                                    </tr>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
		
		
	</div>	

<!-- /.row -->
<!-- end PAGE TITLE AREA -->

<!-- begin DASHBOARD CIRCLE TILES -->
<div class="modal modal-flex fade" id="flexModal" tabindex="-1" role="dialog" aria-labelledby="flexModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="flexModalLabel">Edit Sub Category</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    <div class="htname">
                        
                    </div>                    
                    <div class="form-group">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <label>Category Name <span class="text-red">*</span></label>
                            <select name="cat_name" class="form-control cat-val">
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
                           <input type="text" name="cat_name" class="form-control ctname" placeholder="Sub Category Name" onkeypress="return onlyAlpha(event);" maxlength="100"/> 
                           <span class="err-scat text-red"></span>
                        </div>
                        <div class="col-lg-2"></div>                        
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <button type="button" class="btn btn-default update_cad btn_cat" category="">Update Sub Category</button>
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

</div>
</div>
<script>
    $(".cactivate").click(function(){
            var scategory   =   $(this).attr("category");
            var name   =   $(this).attr("cname");
            $.post( "<?php echo base_url();?>subcategory/scategoryActDea" , { scategory: scategory , status : 1} ,function( data ) {
                    if(data > 0){
                            alert(name + " is activated");
                            location.reload();
                    }else{
                             alert(name + " is Not activated");
                    }
            });
    });
    $(".cdeactivate").click(function(){
            var scategory   =   $(this).attr("category");
            var name   =   $(this).attr("cname");
            $.post( "<?php echo base_url();?>subcategory/scategoryActDea" , { scategory: scategory , status : 0} ,function( data ) {
                    if(data > 0){
                            alert(name + " is Deactivated");
                            location.reload();
                    }else{
                             alert(name + " is Not Deactivated");
                    }
            });
    }); 
    $(".edcategory").click(function(){
            var category    =   $(this).attr("category");
            var cat         =   $(this).attr("cat");
            $.post( "<?php echo base_url();?>subcategory/edcategory" , { category: category} ,function( data ) {
                   $(".cat-val").val(cat);
                   $(".ctname").val(data);
                   $(".btn_cat").attr("category",category);
            });
    });
    $(".update_cad").click(function(){
            var ct          =   $(".ctname").val();
            var cat         =   $(".cat-val").val();            
            var category    =   $(".btn_cat").attr("category");  
            if(cat == ""){
                    $(".err-cat").html("Category Name is required");
            }
            if(ct == ""){
                    $(".err-scat").html("Sub Category Name is required");
            }
            if(ct != "" && cat != ""){ 
                $.post( "<?php echo base_url();?>subcategory/update" , { ct: ct,cat:cat,category:category} ,function( data ) {
                        if(data > 0){                                
                                $(".err-cat").html("");
                                $(".err-scat").html("");
                                $(".htname").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Updated Sub category successfully</div>');
                        }else{
                                $(".err-cat").html("");
                                $(".err-scat").html("");
                                $(".htname").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Internal error occured while updating sub category</div>');
                        }
                });
            }
    });
    $(".md-close").click(function(){ 
            location.reload();
    });
</script>