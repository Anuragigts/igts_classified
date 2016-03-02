	<div id="content" class="span9">
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url();?>admin_dashboard">Dashboard</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="">Categories List</a></li>
			</ul>

			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>List Main Category</h2>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //echo'<pre>';print_r($view[0]);echo '</pre>';
                            $i = 1;
                            foreach($view as $ct){ ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i++;?></td>
                                <td><?php echo ucfirst($ct->category_name);?></td>
								<td class="center">
									 <a href="javascript:void(0);" category="<?php echo $ct->category_id;?>"  class="edcategory" data-toggle="modal" data-target="#flexModal" title="Edit Category"><i class='halflings-icon edit '></i></a>
									<?php if($ct->category_status == 0){ ?>
										<a href="javascript:void(0);" class="cactivate" title="Activate" cname="<?php echo $ct->category_name;?>" category="<?php echo $ct->category_id;?>"><i class='halflings-icon ok-circle'></i></a>
									<?php } else { ?>
										<a href="javascript:void(0);" class="cdeactivate" title="Deactivate" cname="<?php echo $ct->category_name;?>" category="<?php echo $ct->category_id;?>"><i class='icon-remove-circle text-red'></i></a>
									<?php } ?>
									<a href="<?php echo base_url();?>subsubcategory/delete/<?php echo $ct->category_id;?>" title="Delete  Category"><i class='halflings-icon trash text-red'></i></a>
								</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- end DASHBOARD CIRCLE TILES -->
<!--
<div class='span9'>

<!-- /.row -->
<!-- end PAGE TITLE AREA -->

<!-- begin DASHBOARD CIRCLE TILES -->

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
</div>
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