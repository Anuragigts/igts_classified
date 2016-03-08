	<title>Right Deals :: Checkout</title>
	<style>
		.section-title-01{
		height: 273px;
		background-color: #262626;
		text-align: center;
		position: relative;
		width: 100%;
		overflow: hidden;
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
		
		<form id="j-forms" action="#" class="j-forms" method="post" style="background-color:#fff;">
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
												<img src="<?php echo base_url(); ?>img/cart.jpg"  alt="image" title="Image">
											</td>
											<td class="product">
												Battery screwdriver
											</td>
											<td class="price">
												$25
											</td>
											<td class="total">
												$25
											</td>
										</tr>
									</tbody>
									<thead>
										<tr>
											<th colspan="2">&nbsp;</th>
											<th>Discount :</th>
											<th>$5</th>
										</tr>
										<tr>
											<th colspan="2">
												<div class="input pull-left">
													<input type="text" id="lastnamepost" name="lastnamepost" placeholder="Enter Last Name" value="" >
												</div>
												<button class="btn btn-primary btn1 pull-left" id='' >Apply</button>
											</th>
											<th class="tot_top">Total :</th>
											<th class="tot_top">$20</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
						<div class="row top_20">
							<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1">
								<button class="btn btn-primary btn1 pull-right chck_bg_clr">Checkout</button>
								<button class="btn btn-primary btn1 pull-right">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</form>			
	</section>
	
	<script src="<?php echo base_url(); ?>js/jquery.js"></script>