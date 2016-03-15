	<title>Right Deals :: Checkout</title>
	<style>
		.section-title-01{
		height: 220px;
		background-color: #262626;
		text-align: center;
		position: relative;
		width: 100%;
		overflow: hidden;
		}
		.disc_info{
			//display:none;
		}
	</style>

	<div class="section-title-01">
		<div class="bg_parallax image_01_parallax"></div>
	</div>
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css" />
	
	<section class="content-central">
		<div class="semiboxshadow text-center">
			<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
		</div>
		
		<form id="j-forms" action="<?php echo base_url();?>payments/pay/" class="j-forms" method="post" style="background-color:#fff;">
			<div class="content_info">
				<div class="paddings">
					<div class="container about_text">
						<div class="row">
							<div class="col-md-12">
								<div class="titles">
									<h2>Checkout <span> </span></h2>
									<hr class="tall">
								</div>
							</div>
						</div>
						<?php //echo '<pre>';print_r($tran_details);echo '</pre>';?>
						<div class="row check_out">
							<div class="col-md-8 col-sm-10 col-xs-12 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
								<table class="table table-responsive">
									<thead>
										<tr>
											<th class="preview">Preview</th>
											<th class="product">Add Title</th>
											<th class="price">Price</th>
											<th class="total">Total</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="preview cart_image">
												<img src="<?php echo base_url(); ?>img/<?php echo $tran_details->img_name; ?>"  alt="image" title="Image">
											</td>
											<td class="product">
												<?php echo ucwords($tran_details->deal_tag); ?>
											</td>
											<td class="price">
												<?php echo $tran_details->cost_pound+$tran_details->u_pkg__pound_cost; ?>
											</td>
											<td class="total">
												<?php echo $tran_details->cost_pound+$tran_details->u_pkg__pound_cost; ?>
											</td>
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
													<input type="text" class="c_code" name="c_code" placeholder="Enter Coupon Code" value="COUP9176" >
													<input type="hidden" name="ad_id" id="ad_id" value='<?php echo $tran_details->ad_id;?>' >
													<input type="hidden" id="pkg_disc_amt" value='' >
												</div>
												<span class="btn btn-primary btn1 pull-left c_check" id='' >Apply</span>
											</th>
											<th class="tot_top">Total :</th>
											<th class="tot_top total_amt"><?php echo $tran_details->cost_pound+$tran_details->u_pkg__pound_cost; ?></th>
										</tr>
										<tr>
											<td  colspan='4'class='response_coupon'></td>
										</tr>
									</thead>
								</table>
							</div>
						</div>
						<div class="row top_20">
							<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1">
								<button class="btn btn-primary btn1 pull-right chck_bg_clr" type='submit'>Checkout</button>
								<button class="btn btn-primary btn1 pull-right">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</form>			
	</section>
	<script>
		$(function(){
			$(".c_check").click(function(){
				var c_code = $(".c_code").val();
				//var post_ad_amt = $("#post_ad_amt").val();
				var ad_id = $("#ad_id").val();
				if(c_code != ''){

					$.ajax({
						type: "POST",
						url: "<?php echo base_url();?>coupons/get_c_result",
						data: {
							c_code: c_code,
							ad_id: ad_id
						},
						success: function (data) {
							//alert(data);
							var c_details = JSON.parse(data);
							var c_value = c_details['c_value'];
							var pkg_disc_amt = c_details['pkg_disc_amt'];
							$(".disc_val").html(c_details['disc']);
							$(".response_coupon").html(c_details['c_responce']);
							$(".total_amt").html(pkg_disc_amt);
							document.getElementById('pkg_disc_amt').value = pkg_disc_amt;
						}
					});
				}else{
					alert('Please Enter Coupoun Code If Any');
				}
        	});
	});
	</script>
	<script src="<?php echo base_url(); ?>js/jquery.js"></script>