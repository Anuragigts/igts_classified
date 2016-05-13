<div id="content" class="span9">
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="">Add New Blog</a></li>
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
			<?php echo ($this->session->flashdata('err'))?$this->session->flashdata('err'):''?>
		</p>
	</div>
	<br>
	<?php }?>
	<div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon white edit"></i><span class="break"></span>Add New Blog</h2>
				<div class="box-icon">
				
				</div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" id='blogform' action='' method='post' enctype="multipart/form-data">
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="blog_title">Blog Title</label>
							<div class="controls">
								<input type="text" id="blog_title" name="blog_title" value=''>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="blog_desc">Blog Description</label>
							<div class="controls">
								<textarea id="blog_desc" name="blog_desc" value='' rows='10' cols='80'></textarea>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="blog_cat">Categories</label>
							<div class="controls">
								<select name='blog_cat' id="blog_cat">
									<option value="">Select</option>
									<?php foreach ($allcategory as $catval) {	?>
										<option value="<?php echo $catval->category_id; ?>"><?php echo $catval->category_name; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="file">Blog Image</label>
							<div class="controls">
								<input type='file' name='file' id='file' onchange="fileupload(this);">
							</div>
							<label id="file-error" class="error" for="file" style='display:none;'>Please upload image</label>
							<div class="span4 unit top_10 img_hide">
								<img id="blah" src="#" alt='Blash'/>
							</div>
						</div>
						<div class="form-actions">
							<input type="submit" class="btn btn-primary" name='new_pkg_detail' value='Save'>
							<a href="<?php echo base_url(); ?>settings/blog" class="btn">Cancel</a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
	</div>
</div>
<script>
	$(function(){
		$("#blah").css('display','none');
	});

	function view_comment()
	{
		val = document.getElementById('ad_status').value; 
		if(val != 1)
			$('.admin_comment').show();
		else 
			$('.admin_comment').hide();
	}

	function fileupload(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('.img_hide').show();
						$('#del_img').css('display', 'block');
						$('#blah')
							.show()
							.attr('src', e.target.result)
							.width(250)
							.height(150)
							.css('border', '2px solid rgba(48,63,159,.9)')
							.css('border-radius', '10px');
					};

					reader.readAsDataURL(input.files[0]);
				}
			}

	$(function(){
		$('#del_img').click(function(){
			$('.img_hide').hide();
			$("#blog_img").val("");
			$('img#blah').css('display', 'none');
			 $('#blah').css('border', 'none')
			$('#blah').css('border-radius', 'none');
			$('#del_img').css('display', 'none');
		});
	});


	
</script>
<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>
<script>
			$(function() {
			
				$("#blogform").validate({
					rules: {
						blog_title: {
							required: true,
							minlength: 5,
							maxlength: 21,
						},
						blog_desc: {
							required: true,
							minlength: 20,
						},
						blog_cat: {
							required: true,
						},
						file: {
			                required: !0,
			                extension: "jpg|png"
			            },
					},
				
					messages: {
						blog_title: {
							required: "Please Enter Blog Title",
							minlength: "Your blog title must be at least 5 characters",
							maxlength: "Maximum 21 characters"
						},
						blog_desc: {
							required: "Please Enter Blog Title",
							minlength: "Your Blog Description must be at least 20 characters",
						},
						blog_cat: {
							required: "Please Select any category",
						},
						file: {
			                required: "Please upload blog image",
			                extension: "Incorrect file format"
			            },
					},
					
					submitHandler: function(form) {
						// return true;
						form.submit();
					}
				});
				
			});
			
		</script>