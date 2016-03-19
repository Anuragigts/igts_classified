	<title>Right Deals :: Deals Administrator</title>
	
	<style>
		.section-title-01{
			height: 220px;
			background-color: #262626;
			text-align: center;
			position: relative;
			width: 100%;
			overflow: hidden;
		}
	</style>
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>libs/slider.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jssor.slider.min.js"></script>
	
	<script>
		jssor_1_slider_init = function() {
			
			var jssor_1_SlideshowTransitions = [
			  {$Duration:1200,$Zoom:1,$Easing:{$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
			  {$Duration:1000,$Zoom:11,$SlideOut:true,$Easing:{$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear},$Opacity:2},
			  {$Duration:1200,$Zoom:1,$Rotate:1,$During:{$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
			  {$Duration:1000,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
			  {$Duration:1200,x:0.5,$Cols:2,$Zoom:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
			  {$Duration:1200,x:4,$Cols:2,$Zoom:11,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear},$Opacity:2},
			  {$Duration:1200,x:0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Left:$Jease$.$Swing,$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
			  {$Duration:1000,x:-4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
			  {$Duration:1200,x:-0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Left:$Jease$.$Swing,$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
			  {$Duration:1000,x:4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
			  {$Duration:1200,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},
			  {$Duration:1000,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InExpo,$Top:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.7}},
			  {$Duration:1200,x:-4,y:2,$Rows:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:28},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},
			  {$Duration:1200,x:1,y:2,$Cols:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:19},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.8}}
			];
			
			var jssor_1_options = {
			  $AutoPlay: true,
			  $SlideshowOptions: {
				$Class: $JssorSlideshowRunner$,
				$Transitions: jssor_1_SlideshowTransitions,
				$TransitionsOrder: 1
			  },
			  $ArrowNavigatorOptions: {
				$Class: $JssorArrowNavigator$
			  },
			  $ThumbnailNavigatorOptions: {
				$Class: $JssorThumbnailNavigator$,
				$Rows: 2,
				$Cols: 6,
				$SpacingX: 14,
				$SpacingY: 12,
				$Orientation: 2,
				$Align: 156
			  }
			};
			
			var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
			
			//responsive code begin
			//you can remove responsive code if you don't want the slider scales while window resizing
			function ScaleSlider() {
				var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
				if (refSize) {
					refSize = Math.min(refSize, 242);
					refSize = Math.max(refSize, 238);
					jssor_1_slider.$ScaleWidth(refSize);
				}
				else {
					window.setTimeout(ScaleSlider, 30);
				}
			}
			ScaleSlider();
			$Jssor$.$AddEvent(window, "load", ScaleSlider);
			$Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
			$Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
			//responsive code end
		};
	</script>
	
	<script type="text/javascript">
	$(function(){
		$(".loc_map").click(function(){
			var val = $(".loc_map").attr("id");
			var val1 = val.split(",");
			$(".map_show").html('<iframe src = "https://maps.google.com/maps?q='+val1[0]+','+val1[1]+'&hl=es;z=5&amp;output=embed" width="950px" height="300px"></iframe>');
		});
	});
	</script>
	<script type="text/javascript">
	$(function(){
		/*search ato z / A to Z*/
			$(".dealtitle_sort").change(function(){
				var dealtitle = $(".dealtitle_sort option:selected").val();
				var dealprice = $(".price_sort option:selected").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>deals_administrator/my_ads_search",
					data: {
						dealtitle: dealtitle,
						dealprice: dealprice
					},
					success: function (data) {
						$(".deals_search_result").html(data);
					}
				})
        	});
		/*search price asc / desc*/
			$(".price_sort").change(function(){
				var dealprice = $(".price_sort option:selected").val();
				var dealtitle = $(".dealtitle_sort option:selected").val();
        		$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>deals_administrator/my_ads_search",
					data: {
						dealtitle: dealtitle,
						dealprice: dealprice
					},
					success: function (data) {
						$(".deals_search_result").html(data);
					}
				})
        	});
	});
	</script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css">
	
	<div class="section-title-01">
		<div class="bg_parallax image_01_parallax"></div>
	</div>   
	
	<section class="content-central">
		<div class="semiboxshadow text-center">
			<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
		</div>
		
		<div class="content_info">
			<div class="paddings">
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							<div class="item-table">
								<div class="header-table color-red">
									<img src="<?php echo base_url(); ?>img/icons/user_pro.png" alt="user_pro" title="Profile" class="img-responsive pvt-no-img">
									<h2><?php echo @$log_name; ?></h2> 
								</div>
								<ul class="dashboard_tag">
									<li><img src="<?php echo base_url(); ?>img/icons/admin.png" alt="admin" title="admin image"><a href='deals_status'>Deals Status</a></li>
									<li><img src="<?php echo base_url(); ?>img/icons/admin.png" alt="admin" title="admin image"><a href='deals_administrator'>Deals Administrator</a></li>
									<li><img src="<?php echo base_url(); ?>img/icons/pickup.png" alt="pickup" title="pickup image"><a href='pickup_deals'>Pickup deals</a></li>
									<li><img src="<?php echo base_url(); ?>img/icons/seaked.png" alt="seaked" title="seaked image"><a href='reserved_searches'>My Wishes</a></li>
									<li><img src="<?php echo base_url(); ?>img/icons/updateprofile.png" alt="updateprofile" title="updateprofile image"> <a href='update_profile'>Update Profile</a></li>
								</ul>
								<a class="btn color-red" href="<?php echo base_url(); ?>login/logout">Logout</a>
							</div>
						</div>
						<!-- End Item Table-->
						<div class="col-md-9">
							<?php echo $this->view("classified_layout/success_error"); ?>
							<div class="row row-fluid">
								<div class="col-sm-12">
									<h2>Deals Status</h2>
									<label>Hi <?php echo $log_name; ?></label><hr>
								</div>
							</div>
							
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Deal Tag</th>
										<!-- <th>Package Type</th> -->
										<th>Urgent Label</th>
										<th>Expiry Date</th>
										<th>Ad Status</th>
										<th>Ad Renewal</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach($my_ads_details as $ads){?>
									<tr>
										<td><?php echo ucwords($ads->deal_tag);?></td>
										<!-- <td><?php echo ucwords($ads->pkg_dur_name);?></td> -->
										<td><?php if($ads->u_pkg_id == 0) echo 'No';else echo 'Yes';?></td>
										<td><?php 
										if ($ads->expire_data != '0000-00-00 00:00:00') {
											echo $exp_data = date("d-m-Y H:i:s", strtotime($ads->expire_data));
										}
										else{
											echo $exp_data = '';
										}

										?></td>
										<td><?php 
										if ($ads->status_name == 'new') {
											echo "Pending";
										}
										else{
											echo ucwords($ads->status_name);
										}
										?></td>
										<td class="pay_btn"><?php 
										if ($ads->expire_data != '0000-00-00 00:00:00') {
											?>
										<a href="<?php base_url();?>payments/checkout/<?php echo $ads->ad_id;?>" title="Ad Renewal" >Ad Renewal</a>
											<?php 
											}
										?></td>
									</tr>
								<?php }?>
								</tbody>
							</table>
							<?php echo $paging_links; ?>
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
						<h4 class="modal-title" id="flexModalLabel">Pay for Posting Ad</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="post" action ='<?php echo base_url()?>payments/Pay'>
							<div class="htname">
								<input type='hidden' id='post_ad_id' name='post_ad_id'>
								<input type='hidden' id='post_ad_amt' name='post_ad_amt'>
								<input type='text' id='coup_ad_amt' name='coup_ad_amt'>
							</div>                    
							<div class="form-group">
								<div class="span4"></div>
								<div class="span4">
								<label for ='c_code'>Coupon Code</label>
								<input type='text' name='c_code' class='c_code' value='COUP7303' placeholder = 'Coupon Code'  ><span class='c_check'>Apply</span><span class='c_responce' style='color:green'></span>
								</div>                       
							</div>
							<div class="form-group">
								<div class="span4"></div>
								<div class="span4">
									<button type="submit" class="btn btn-default update_cad btn_cat" >Pay Now</button>
								</div>
								<div class="span4"></div>                        
							</div>
						</form>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
	</section>
	<script>
	$('.paynow').click(function(){
		var ad_cost = $( this ).attr( "ad_cost" );
			var ad_id = $( this ).attr( "ad_id" );
		document.getElementById('post_ad_id').value = ad_id;
		document.getElementById('post_ad_amt').value = ad_cost;
		$(".c_responce").html('');
	});
	function paynow(adid, cost){
		alert(adid+'----'+cost);
		document.getElementById('post_ad_id').value = adid;
		document.getElementById('post_ad_amt').value = cost;
	}
	/*$(function(){
			$(".c_check").click(function(){
				var c_code = $(".c_code").val();
				var post_ad_amt = $("#post_ad_amt").val();
				if(c_code != ''){
					$.ajax({
						type: "POST",
						url: "<?php echo base_url();?>coupons/get_c_result",
						data: {
							c_code: c_code,
							post_ad_amt: post_ad_amt
						},
						success: function (data) {
							var c_details = JSON.parse(data);
							var c_value = c_details['c_value'];
							var pkg_disc_amt = c_details['pkg_disc_amt'];
							$(".c_responce").html(c_details['c_responce']);
							document.getElementById('coup_ad_amt').value = pkg_disc_amt;
						}
					});
				}else{
					alert('Please Enter Coupoun Code If Any');
				}
        	});
	});*/
	</script>
	<script>
		setTimeout(function(){
			 $(".alert").hide();
		},15000);
		
	</script>

	<!-- End Shadow Semiboxed -->
	<script src="<?php echo base_url(); ?>js/jquery.js"></script> 
	
	<script src="<?php echo base_url(); ?>j-folder/js/jquery.maskedinput.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/additional-methods.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/jquery.form.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/j-forms.min.js"></script>   

	<script type="text/javascript" src="<?php echo base_url(); ?>libs/jquery.xuSlider.js"></script>
	