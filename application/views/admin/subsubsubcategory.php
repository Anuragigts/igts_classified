<style>
	.spanform{min-height:250px !important;}
</style>
<?php $main_cat = $view; ?>
<div id="content" class="span9 spanform">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">Sub Category Level-3</a></li>
	</ul>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>List Sub Sub Sub Categories</h2>
				<div class="box-icon">
					<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
						<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
						<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" id="validate" method="post" action='<?php echo base_url()?>subsubsubcategory/'>
					<fieldset>
						<div class='span6'>
							<div class="control-group">
								<label class="control-label" for="focusedInput">Category Name</label>
								<div class="controls">
									<select name="cat_name" class="form-control cat_chage">
										<option value="">-- Select Category --</option>
										<?php foreach ($main_cat as $vt){ ?>
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
									<select name="scat_name" class="form-control scat_chage">
										<option value="">-- Select Sub Category --</option>
										<?php foreach ($bview as $vt){ ?>
										<option value="<?php echo $vt->sub_category_id;?>" <?php echo set_select("scat_name",$vt->sub_category_id);?>><?php echo ucfirst($vt->sub_category_name);?></option>
										<?php } ?>
									</select>
									<?php echo form_error("scat_name");?>    
								</div>
							</div>
						</div>
						<div class='span6'>
							<div class="control-group">
								<label class="control-label" for="typeahead">Sub Category Name <span class="text-red">*</span></label>
								<div class="controls">
									<select name="sscat_name" class="form-control sscat_chage">
										<option value="">-- Select Sub Sub Category --</option>
										<?php foreach ($bbview as $vt){ ?>
										<option value="<?php echo $vt->sub_subcategory_id;?>" <?php echo set_select("scat_name",$vt->sub_subcategory_id);?>><?php echo ucfirst($vt->sub_subcategory_name);?></option>
										<?php } ?>
									</select>
									<?php echo form_error("sscat_name");?>   
								</div>
							</div>
						</div>
						<div class='span6' style='margint:0px;'>
							<div class="control-group">
								<label class="control-label" for="typeahead">New Sub Category Name<span class="text-red">*</span></label>
								<div class="controls">
									<input type="text" name="ssscat_name" value="<?php echo set_value("ssscat_name");?>" class="form-control ssscat_name sct-ret" placeholder="Sub Sub Sub Category Name" maxlength="100"/> 
									<?php echo form_error("ssscat_name");?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-5"></div>
							<div class="col-lg-2">
								<input type="submit" name="create_sssubcategory" value="Create Sub Sub Category" class="btn btn-default"/> 
							</div>
							<div class="col-lg-5"></div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<div id="content" class="span9" style='min-height: 300px;'>
	<div class="row-fluid sortable">
		<div class="span12">
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>List Sub Sub Sub Categories</h2>
						<div class="box-icon">
							<!--<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
								<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
								<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>-->
						</div>
					</div>
					<div class="row"></div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
								<tr>
									<th>S.No.</th>
									<th>Category Name</th>
									<th>Sub Category Name</th>
									<th>Sub Sub Category Name</th>
									<th>Sub Sub Sub Category Name</th>
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
									<td><?php  
										$val = ucfirst($vw->sub_sub_subcategory_name);
										echo $val;?></td>
									<td>
										<a href="javascript:void(0);" ssscat="<?php echo $vw->sub_sub_subcategory_id;?>" scategory="<?php echo $vw->sub_subcategory_id;?>" scat="<?php echo $vw->sub_category_id;?>" cat="<?php echo $vw->category_id;?>" class="edcategory" data-toggle="modal" data-target="#flexModal" title="Edit Sub Sub Sub Category"><i class='halflings-icon edit '></i></a>
										<?php if($vw->sub_substatus == 0){ ?>
										<a href="javascript:void(0);"  class="sactivate" title="Activate" cname="<?php echo $val;?>" scategory="<?php echo $vw->sub_subcategory_id;?>" sscategory="<?php echo $vw->sub_sub_subcategory_id;?>"><i class='halflings-icon edit green'></i></a>
										<?php } else { ?>
										<a href="javascript:void(0);" class="sdeactivate" title="Deactivate" cname="<?php echo $val;?>" scategory="<?php echo $vw->sub_subcategory_id;?>" sscategory="<?php echo $vw->sub_sub_subcategory_id;?>"><i class='icon-remove-circle text-red'></i></a>
										<?php } ?>
										<a href="<?php echo base_url();?>subsubsubcategory/delete/<?php echo $vw->sub_sub_subcategory_id;?>" title="Delete Sub Sub Category"><i class='halflings-icon trash text-red'></i></a>
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
</div>
<div class="modal modal-flex fade" id="flexModal" tabindex="-1" role="dialog" aria-labelledby="flexModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close md-close edit_close2" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="flexModalLabel">Edit Sub Sub Sub Category</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="post">
					<div class="htname">
					</div>
					<div class="form-group">
						<div class="span2" style='height:55px'></div>
						<div class="span8">
							<label>Category Name <span class="text-red">*</span></label>
							<select name="scat_name" class="form-control cat-val cat_chage">
								<option value="">-- Select Category --</option>
								<?php foreach ($view as $vt){ ?>
								<option value="<?php echo $vt->category_id;?>"><?php echo ucfirst($vt->category_name);?></option>
								<?php } ?>
							</select>
							<span class="err-cat text-red"></span>
						</div>
						<div class="span2" style='height:55px'></div>
					</div>
					<div class="form-group">
						<div class="span2" style='height:55px'></div>
						<div class="span8">
							<label>Sub Category Name <span class="text-red">*</span></label>
							<select name="scat_name" class="form-control scat-val scat_chage">
								<option value="">-- Select Sub Category --</option>
								<?php foreach ($bview as $vt){ ?>
								<option value="<?php echo $vt->sub_category_id;?>"><?php echo ucfirst($vt->sub_category_name);?></option>
								<?php } ?>
							</select>
							<span class="err-scat text-red"></span>
						</div>
						<div class="span2" style='height:55px'></div>
					</div>
					<div class="form-group">
						<div class="span2" style='height:55px'></div>
						<div class="span8">
							<label>Sub Sub Category Name <span class="text-red">*</span></label>
							<select name="sscat_name" class="form-control sscat-val sscat_chage">
								<option value="">-- Select Sub Sub Category --</option>
								<?php foreach ($bbview as $vt){ ?>
								<option value="<?php echo $vt->sub_subcategory_id;?>"><?php echo ucfirst($vt->sub_subcategory_name);?></option>
								<?php } ?>
							</select>
							<span class="err-scat text-red"></span>
						</div>
						<div class="span2" style='height:55px'></div>
					</div>
					<div class="form-group">
						<div class="span2" style='height:55px'></div>
						<div class="span8">
							<label>Sub Sub Sub Category Name <span class="text-red">*</span></label>
							<input type="text" name="ssscat_name" class="form-control ctname" placeholder="Sub Sub Category Name" onkeypress="return onlyAlpha(event);" maxlength="100"/> 
							<span class="err-sscat text-red"></span>
						</div>
						<div class="span2" style='height:55px'></div>
					</div>
					<div class="form-group">
						<div class="span4"></div>
						<div class="span4">
							<button type="button" class="btn btn-default update_cad btn_cat" category="">Update Sub Sub Sub Category</button>
						</div>
						<div class="span4"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(".sactivate").click(function(){
	        var  sssubcat    =   $(this).attr("sscategory");
	        var name        =   $(this).attr("cname");
	        $.post( "<?php echo base_url();?>subsubsubcategory/scategoryActDea" , { sssubcat: sssubcat , status : 1} ,function( data ) {
	                if(data > 0){
	                        alert(name + " is activated");
	                        location.reload();
	                }else{
	                         alert(name + " is Not activated");
	                }
	        });
	});
	$(".sdeactivate").click(function(){
	        var  sssubcat    =   $(this).attr("sscategory");
	        var name        =   $(this).attr("cname");
	        $.post( "<?php echo base_url();?>subsubsubcategory/scategoryActDea" , { sssubcat: sssubcat , status : 0} ,function( data ) {
	                if(data > 0){
	                        alert(name + " is Deactivated");
	                        location.reload();
	                }else{
	                         alert(name + " is Not Deactivated");
	                }
	        });
	});
	$(".edcategory").click(function(){
	        var sssubcat    =   $(this).attr("ssscat");
	        var ssubcat    =   $(this).attr("scategory");
	        var scat         =   $(this).attr("scat");
	        var cat         =   $(this).attr("cat");
	        $.post( "<?php echo base_url();?>subsubsubcategory/edcategory" , { sssubcat: sssubcat} ,function( data ) {
	               $(".cat-val").val(cat);
	               $(".scat-val").val(scat);
	               $(".sscat-val").val(ssubcat);
	               $(".ctname").val(data);
	               $(".btn_cat").attr("category",sssubcat);
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