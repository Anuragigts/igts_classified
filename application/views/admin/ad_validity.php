
<div class="row">
	<div class="col-lg-12">
		<div class="page-title">
			<h1>Ad Validity  & Price
				<small>Ad Validity  &  Price</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?= base_url();?>admin_dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li class="active">Ad Validity  & Price</li>
			</ol>
		</div>
	</div>
</div>

<div class="row">
	<div class="portlet portlet-default">
		<div class="portlet-heading">
			<div class="portlet-title">
				<h4>Ad Validity Price</h4>
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
							<label>Ad Type  <span class="text-red">*</span></label>
							<input type="text" name="ad_name" value="<?php echo set_value("ad_name");?>" class="form-control" placeholder="Ad Name" onkeypress="return onlyAlpha(event);" maxlength="100"/> 
							<?php echo form_error("ad_name");?>
						</div>
						<div class="col-lg-6">
							<label>Days <span class="text-red">*</span></label>
							<select class="form-control" name="days">
								<option value="">-- Select Days --</option>
								<?php 
									$i = 0;
									while($i < 180){                                    
									    $i = $i+7; 
									    ?>
								<option value="<?php echo $i;?>"> <?php echo $i;?> days </option>
								<?php                                
									} ?>
							</select>
							<?php echo form_error("days");?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-6">
							<label>Price In Rupees <span class="text-red">*</span></label>
							<input type="text" name="price" value="<?php echo set_value("price");?>" class="form-control" placeholder="Price" ruleset="[^0-9.]" onkeyup="validateR(this, '')"  maxlength="10"/> 
							<?php echo form_error("price");?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-5"></div>
						<div class="col-lg-2">
							<input type="submit" name="ad_validity" value="Create Ad Validity & Price" class="btn btn-default"/> 
						</div>
						<div class="col-lg-5"></div>
					</div>
				</form>
				<div class="row"></div>
				<h3>List Ad Validity & Price</h3>
				<div class="table-responsive tb-row">
					<table id="example-table" class="table table-striped table-bordered table-hover table-default">
						<thead>
							<tr>
								<th>S.No.</th>
								<th>Ad Type</th>
								<th>Days</th>
								<th>Price In Rupees</th>
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
									$val = ucfirst($vw->ad_valid_name);
									echo $val;?></td>
								<td><?php echo $vw->days;?></td>
								<td><?php echo $vw->price;?></td>
								<td>
									<a href="javascript:void(0);" vid="<?php echo $vw->ad_valid_id;?>" class="edvd" data-toggle="modal" data-target="#flexModal" title="Edit Ad Validity & Price"><i class='fa fa-edit text-blue'></i></a>
									<a href="<?php echo base_url();?>ad_validity/delete/<?php echo $vw->ad_valid_id;?>" title="Delete Ad Validity & Price"><i class='fa fa-trash-o text-red'></i></a>
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
				<h4 class="modal-title" id="flexModalLabel">Edit Ad Validity & Price</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="post">
					<div class="htname">
					</div>
					<div class="form-group">
						<div class="col-lg-2"></div>
						<div class="col-lg-8">
							<label>Ad Name <span class="text-red">*</span></label>
							<input type="text" name="ad_name" class="form-control ad_name" placeholder="Ad Name" onkeypress="return onlyAlpha(event);" maxlength="100"/> 
							<span class="ad-err text-red"></span>
						</div>
						<div class="col-lg-2"></div>
					</div>
					<div class="form-group">
						<div class="col-lg-2"></div>
						<div class="col-lg-8">
							<label>Days <span class="text-red">*</span></label>
							<select class="form-control days1" name="days">
								<option value="">-- Select Days --</option>
								<?php 
									$i = 0;
									while($i < 180){                                    
									    $i = $i+7; 
									    ?>
								<option value="<?php echo $i;?>"> <?php echo $i;?> days </option>
								<?php                                
									} ?>
							</select>
							<span class="dy-err text-red"></span>
						</div>
						<div class="col-lg-2"></div>
					</div>
					<div class="form-group">
						<div class="col-lg-2"></div>
						<div class="col-lg-8">
							<label>Price <span class="text-red">*</span></label>
							<input type="text" name="price" class="form-control prices" placeholder="Price" ruleset="[^0-9.]" onkeyup="validateR(this, '')"  maxlength="10"/> 
							<span class="pr-err text-red"></span>
						</div>
						<div class="col-lg-2"></div>
					</div>
					<div class="form-group">
						<div class="col-lg-4"></div>
						<div class="col-lg-4">
							<button type="button" class="btn btn-default update_ca btn_cat" edvid="">Update Ad Validity & Price</button>
						</div>
						<div class="col-lg-4"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	$(".edvd").click(function(){
	        var vid   =   $(this).attr("vid");
	        $.post( "<?php echo base_url();?>ad_validity/ead_validity" , { vid: vid } ,function( data ) {
	                var dop = data.split("@");
	                $(".ad_name").val(dop['0']);
	                $(".prices").val(dop['1']);
	                $(".days1").val(dop['2']);
	                $(".btn_cat").attr("edvid",vid);
	        });
	});       
	$(".update_ca").click(function(){
	             var ad  = $(".ad_name").val();
	             var pr  = $(".prices").val();
	             var dy  = $(".days1").val();
	             var vid = $(".btn_cat").attr("edvid");
	             if(ad == ""){
	                    $(".ad-err").html("Ad Name is required");
	             }
	             if(pr == ""){
	                    $(".pr-err").html("Price is required");
	             }
	             if(dy == ""){
	                    $(".dy-err").html("Days is required");
	             }
	             if(ad != "" && pr != "" && dy != ""){
	                    $.post( "<?php echo base_url();?>ad_validity/uad_validity" , { vid: vid ,ad:ad,pr:pr,dy:dy } ,function( data ) {
	                            if(data > 0 ){
	                                    $(".ad-err").html("");
	                                    $(".pr-err").html("");
	                                    $(".dy-err").html("");
	                                    $(".htname").html('<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Updated  Ad Validity Price successfully</div>');
	                            }else{
	                                    $(".ad-err").html("");
	                                    $(".pr-err").html("");
	                                    $(".dy-err").html("");
	                                    $(".htname").html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Internal error occured while updating ad validity price</div>');
	                            }    
	                    });
	             }
	});
	$(".md-close").click(function(){ 
	        location.reload();
	});
</script>