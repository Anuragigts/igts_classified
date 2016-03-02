	<style>
	.right_mark{
		content: "\2713";
		 font-size: 14px;
	}
	.wrong_mark{
		content:"\00D7";
		 font-size: 20px;
	}
	</style>
	<div id="content" class="span9">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url();?>admin_dashboard">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="">Images List</a></li>
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
			 <?php //echo '<pre>';print_r($ads_images);echo '</pre>';?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>List of Ad Images</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content" style="margin:0 auto;">
					<?php foreach($ads_images as $a_img){?>
						<div class="box-content span3" style='margin-left: 2.5641%;' >
							<img src='<?php echo base_url().'ad_images/'.$a_img->img_name; ?>'style='height:100px;'/><br/>
							<div class='img_<?php echo $a_img->ad_img_id; ?>'>
							<span id='img_<?php echo $a_img->ad_img_id; ?>' class="btn btn-success <?php if($a_img->status == 1)echo 'in_active_img';else echo 'acivate_img'; ?> " title="In Active Image">
					<!--<i class="halflings-icon edit white"></i>--> 
					
					<span class="<?php if($a_img->status == 1)echo 'wrong_mark';else echo 'right_mark';?>"><?php if($a_img->status == 1)echo '&#215;';else echo '&#10003;';?> </span>
									</span>
								<?php /*if($a_img->status == 1){?>
									<span id='img_<?php echo $a_img->ad_img_id; ?>' class="btn btn-success in_active_img" title="In Active Image">
									<!--<i class="halflings-icon edit white"></i>--> <span class='right_mark'>&#10003;</span>
									</span>
								<?php }else{?>
									<span id='img_<?php echo $a_img->ad_img_id; ?>' class="btn btn-success acivate_img" title="Active Image">
									<!--<i class="halflings-icon edit red"></i>--> <span class='wrong_mark'></span> 
									</span>
								<?php } */?>
								&nbsp;
								<span class="btn btn-danger" id="<?php echo 'img'.$a_img->ad_img_id;?>" title="Delete Image">
									<i class="halflings-icon white trash"></i> 
								</span>
							</div>
						</div>
					<?php }?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('.in_active_img').click(function(){
	var img = this.id;
	var img_ary = img.split("_");
	var id = img_ary[1];
	$.ajax({
		type: "POST",
		url: "<?php echo base_url();?>ads/in_active_img",
		data: {
			img_id: id,
			status: 0
		},
		success: function (data) {
			if(!data){
				
			}
			else{
				$( "."+img ).html(data );
				/*$(img).removeClass("in_active_img");
				$(img).addClass("acivate_img");
				$(img+' span').removeClass("right_mark");
				$(img+' span').addClass("wrong_mark");*/
			}
		}
	});	
});

$('.acivate_img').click(function(){
	var img = this.id;
	var img_ary = img.split("_");
	var id = img_ary[1];
	$.ajax({
		type: "POST",
		url: "<?php echo base_url();?>ads/in_active_img",
		data: {
			img_id: id,
			status: 1
		},
		success: function (data) {
			if(!data){
				
			}
			else{
				$( "."+img ).html(data );
				/*$(img).removeClass("in_active_img");
				$(img).addClass("acivate_img");
				$(img+' span').removeClass("right_mark");
				$(img+' span').addClass("wrong_mark");*/
			}
		}
		/*success: function (data) {
			$(img).removeClass("acivate_img");
			$(img).addClass("in_active_img");
			$(img+' span').removeClass("wrong_mark");
			$(img+' span').addClass("right_mark");
		}*/
	});	
});
</script>
<!-- end DASHBOARD CIRCLE TILES -->