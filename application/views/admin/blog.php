<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">Banners </a></li>
	</ul>
	<?php if($this->session->flashdata('err') != ''){?>
	<div class="alert alert-block alert-danger fade in">
		<button data-dismiss="alert" class="close" type="button">
		×
		</button>
		<p>
			<?php echo ($this->session->flashdata('err'))?$this->session->flashdata('err'):''?>
		</p>
	</div>
	<br>
	<?php }?>
	<?php if($this->session->flashdata('msg') != ''){?>
	<div class="alert alert-block alert-info fade in no-margin">
		<button data-dismiss="alert" class="close" type="button">
		×
		</button>
		<p>
			<?php echo ($this->session->flashdata('msg'))?$this->session->flashdata('msg'):''?>
		</p>
	</div>
	<br>
	
	<?php }?>
	<div style='margin-bottom:10px;margin-right:25px; float:right;' > 
		<a href='<?php echo base_url();?>settings/addblog' class='btn btn-success'>Add New Blog</a>
	</div>
	<?php //echo '<pre>';print_r($all_banners[0]);echo '</pre>';?>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit Adds in Each Category</h2>
				<div class="box-icon">
				
				</div>
			</div>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Blog Id</th>
							<th>Blog Title </th>
							<th>Created on</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0;
						 foreach ($bloglist as $val) { $i++; ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $val->blog_title; ?></td>
								<td><?php echo $val->blog_created; ?></td>
								<td class="center ">
								<a href="<?php echo base_url();?>settings/editblog/<?php echo $val->id; ?>" title="Edit Blog"><i class="halflings-icon edit "></i></a> | 
								<a href="javascript:void(0);" class="delblog" id="<?php echo $val->id; ?>" title="Delete Blog"><i class="halflings-icon trash text-red"></i></a>
							</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<script type="text/javascript">
	setTimeout(function(){
		$(".alert").hide();
	},5000);
	$(function(){
		$(".delblog").click(function(){
		        var id   =   $(this).attr("id");
		        $.post( "<?php echo base_url();?>settings/delblog" , { id: id} ,function( data ) {
		                location.reload();
		        });
		});
	});
</script>