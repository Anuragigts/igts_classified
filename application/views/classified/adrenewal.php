<!DOCTYPE html>
<html>
	<head>
		
		<title>Right Deals :: Ad Renewal</title>
		
		<!-- xxx Head Content xxx -->
		<?php echo $this->load->view('common/head');?> 
		<!-- xxx End xxx -->
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/innerpagestyles.css" />
		
	</head>
	<body id="home">
		<!--Preloader-->
		<div class="preloader">
			<div class="status">&nbsp;</div>
		</div> 
		<!-- layout-->
		<div id="layout">
			<!-- xxx tophead Content xxx -->
			<?php echo $this->load->view('common/tophead'); ?> 
			<!-- xxx End tophead xxx -->
		
			<div class="section-title-01">
				<!-- Parallax Background -->
				<div class="bg_parallax image_01_parallax"></div>
			</div>
		
			<!--Content Central -->
			<section class="content-central">
				<div class="semiboxshadow text-center">
					<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
				</div>
				
				<form id="j-forms" action="<?php echo base_url();?>payments/adrenewal_pay/" class="j-forms" method="post" style="background-color:#fff;">
					<div class="content_info">
						<div class="paddings">
							<div class="container about_text">
								<div class="row check_out">
									<div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 col-sm-offset-0 col-xs-offset-0">
										<div class="checkout_h3">
											<h2>Ad Renewal</h2>
											<?php 
											if($tran_details->u_pkg__pound_cost != ''){
												$price = ($tran_details->u_pkg__pound_cost + $tran_details->cost_pound);
												$vat = $price*0.2;
												$price1 = $price + $vat;
											}
											else{
												$price = ($tran_details->cost_pound);
												$vat = $price*0.2;
												$price1 = $price + $vat;
											}
											 ?>
										</div>
										<table class="table table-responsive">
											<thead>
												<tr>
													<th class="preview">Preview</th>
													<th class="product">Ad Title</th>
													<th class="price">Price</th>
													<th class="total">Total</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="preview cart_image">
														<img src="<?php echo base_url(); ?>pictures/<?php echo $tran_details->img_name; ?>"  alt="<?php echo $tran_details->img_name; ?>" title="<?php echo $tran_details->img_name; ?>">
													</td>
													<td class="product">
														<h4><?php echo substr(ucwords($tran_details->deal_tag),0,20); ?></h4>
														<p align="justify">
															<?php echo substr(strip_tags(ucwords($tran_details->deal_desc)), 0,46); ?>
														</p>
													</td>
													<td class="price">
														<?php echo $price; ?>
													</td>
													<td class="total">
														<?php echo $price; ?>
													</td>
												</tr>
												<tr>
													<td class="package_ckech">
														<label class="label">Package Type</label>
														<label class="input select">
															<select name="pcktype" class='pcktype'>
																<option value="" selected disabled="">Select Package</option>
																<?php foreach ($pcktype as $pcktypeval) { ?>
																<option value="<?php echo $pcktypeval->pkg_dur_id ?>" <?php if ($tran_details->package_type == $pcktypeval->pkg_dur_id) { echo "selected=selected"; } ?> ><?php echo ucwords($pcktypeval->pkg_dur_name); ?></option>
																<?php } ?>
															</select>
															<i></i>
														</label>
													</td>
													<td class="product">
														<label class="label">Urgent Label</label>
														<label class="input select">
															<select name="urglbl" class='urglbl'>
																<option value="">None</option>
																<?php foreach ($urg_label as $urg_labelval) { ?>
																<option value="<?php echo $urg_labelval->u_pkg_id ?>" <?php if ($tran_details->urgent_package == $urg_labelval->u_pkg_id) { echo "selected=selected"; } ?> ><?php echo $urg_labelval->u_pkg_name; ?></option>
																<?php } ?>
															</select>
															<i></i>
														</label>
													</td>
													<th>VAT</th>
													<th class='vat_tax'><?php echo substr($vat, 0,strpos($vat,".")+3); ?></th>
												</tr>
											</tbody>
											<thead>
												<tr class='disc_info'>
													<th colspan="2">&nbsp;</th>
													<th>Discount :</th>
													<th class='disc_val'>0.00</th>
												</tr>
												<tr>
													<th colspan="2">
														<div class="input pull-left">
															<input type="text" class="c_code" name="c_code" placeholder="Enter Coupon Code" value="" >
															<input type="hidden" name="ad_id" id="ad_id" value='<?php echo $tran_details->ad_id; ?>' >
															<input type="hidden" id="pkg_disc_amt" value='' >
														</div>
														<span class="btn btn-primary btn1 pull-left c_check" id='' >Apply</span>
													</th>
													<th class="tot_top">Total :</th>
													<th class="tot_top total_amt"><?php echo substr($price1, 0,strpos($price1,".")+3); ?></th>
												</tr>
												<tr>
													<td  colspan='4'class='response_coupon'></td>
												</tr>
											</thead>
										</table>
									</div>
								</div>
								<div class="row top_20">
									<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1 cancel_ahover">
										<button class="btn btn-primary btn1 pull-right chck_bg_clr" type='submit'>Checkout</button>
										<a class="btn btn-primary btn1 pull-right adrenewal_cancelad" href="javascript:void(0);">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div> 
				</form>			
			</section>
		<!-- End Shadow Semiboxed -->
		
			<!-- xxx footer Content xxx -->
			<?php echo $this->load->view('common/footer');?> 
			<!-- xxx footer End xxx -->
			
		</div>
		<!-- End Entire Wrap -->
		
		<script src="<?php echo base_url(); ?>js/jquery.js"></script>
		<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$(".pcktype").change(function(){
					var pckid = $(this).val();
					var urgid = $(".urglbl").val();
					 $.ajax({
						type: "POST",
						url: "<?php echo base_url();?>payments/getpckcost",
						data: {
							pckid: pckid,
							urgid: urgid
						},
						success: function (data) {
							var data1 = JSON.parse(data);
							$(".vat_tax").html(data1['vat_tax']);
							$(".price").html(data1['cost']);
							$(".total").html(data1['cost']);
							$(".total_amt").html(data1['cost1']);
						}
				    });
				});
				$(".urglbl").change(function(){
					var pckid = $(".pcktype").val();
					var urgid = $(this).val();
						 $.ajax({
							type: "POST",
							url: "<?php echo base_url();?>payments/geturgcost",
							data: {
								urgid: urgid,
								pckid: pckid
							},
							success: function (data) {
								var data1 = JSON.parse(data);
							$(".vat_tax").html(data1['vat_tax']);
							$(".price").html(data1['cost']);
							$(".total").html(data1['cost']);
							$(".total_amt").html(data1['cost1']);
							}
					    });
				});
				$(".c_check").click(function(){
					var c_code = $(".c_code").val();
					var pckid = $(".pcktype").val();
					var urgid = $(".urglbl").val();
						 $.ajax({
							type: "POST",
							url: "<?php echo base_url();?>payments/getcouponcost",
							data: {
								urgid: urgid,
								pckid: pckid,
								c_code: c_code
							},
							success: function (data) {
								var c_details = JSON.parse(data);
								var c_value = c_details['c_value'];
								var pkg_disc_amt = c_details['pkg_disc_amt'];
								$(".disc_val").html(c_details['disc']);
								$(".response_coupon").html(c_details['c_responce']);
								$(".total_amt").html(pkg_disc_amt);
								document.getElementById('pkg_disc_amt').value = pkg_disc_amt;
							}
					    });
				});

				$(".adrenewal_cancelad").click(function(){
					$.ajax({
						type: "POST",
						url: "<?php echo base_url();?>coupons/adrenewal_cancelad",
							success: function (data) {
								if (data == 1) {
								window.location.href= "<?php echo base_url(); ?>deals-status";	
							}
						}
					})
				});
			});
		</script>
		<!-- xxx footerscript Content xxx -->
		<?php echo $this->load->view('common/footerscript');?> 
		<!-- xxx footerscript End xxx -->
			
	</body>
</html>
