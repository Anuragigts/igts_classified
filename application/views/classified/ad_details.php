	<div class="main-container">
		<div class="container">
			<ol class="breadcrumb pull-left">
				<li><a href="#"><i class="icon-home fa"></i></a></li>
				<li><a href="category.html">All Ads</a></li>
				<li><a href="sub-category-sub-location.html"><?php echo ucfirst($det_view['category_name']);?></a></li>
				<li><a href="sub-category-sub-location.html"><?php echo ucfirst($det_view['sub_category_name']);?></a></li>
				<li class="active"><?php echo ucfirst($det_view['sub_subcategory_name']);?></li>
			</ol>
			<div class="pull-right backtolist">
				<a href="sub-category-sub-location.html"> <i class="fa fa-angle-double-left"></i> Back to Results</a>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 page-content col-thin-right">
					<div class="inner inner-box ads-details-wrapper">
						<h2> <?php echo $det_view['title'];?> <small class="label label-default adlistingtype">Company ad</small> </h2>
						<span class="info-row"> <span class="date"><i class=" icon-clock"> </i>Today 1:21pm</span> - <span class="category"><?php echo ucfirst($det_view['category_name']);?> </span>- <span class="item-location"><i class="fa fa-map-marker"></i> <?php echo $det_view['Country_name'];?> </span> </span>
						<div class="ads-image">
							<h1 class="pricetag"> <i class="fa fa-inr"></i><?php echo $det_view['price'];?></h1>
							<ul class="bxslider">
								<?php 
									if(count($img_view) > 0){
										foreach ($img_view as $imw){?>
								<li><img src="<?php echo base_url();?>pictures/<?php echo $imw->img_name;?>" alt="img" class="img  img-responsive"/></li>
								<?php 
									}
									}?>
							</ul>
							<div id="bx-pager"> 
								<?php 
									if(count($img_view) > 0){
										$i = 0;
										foreach ($img_view as $imw){?>
								<a class="thumb-item-link" data-slide-index="<?php echo $i++;?>" href="#"><img src="<?php echo base_url();?>pictures/<?php echo $imw->img_name;?>" alt="img" /></a>
								<?php 
									}
									}?>
							</div>
						</div>
						<div class="Ads-Details">
							<h5 class="list-title"><strong>Ads Details</strong></h5>
							<div class="row">
								<div class="ads-details-info col-md-8">
									<?php echo $det_view['ad_desc'];?>
								</div>
								<div class="col-md-4">
									<aside class="panel panel-body panel-details">
										<ul>
											<li>
												<p class=" no-margin "><strong>Price:</strong> <i class="fa fa-inr"></i><?php echo $det_view['price'];?></p>
											</li>
											<li>
												<p class="no-margin"><strong>Type:</strong> <?php echo ucfirst($det_view['category_name']);?></p>
											</li>
											<li>
												<p class="no-margin"><strong>Location:</strong> <?php echo $det_view['Country_name'];?> </p>
											</li>
										</ul>
									</aside>
									<div class="ads-action">
										<ul class="list-border">
											<li><a href="#"> <i class=" fa fa-user"></i> More ads by User </a> </li>
											<li><a href="#"> <i class=" fa fa-heart"></i> Save ad </a> </li>
											<li><a href="#"> <i class="fa fa-share-alt"></i> Share ad </a> </li>
											<li><a href="#reportAdvertiser" data-toggle="modal"> <i class="fa icon-info-circled-alt"></i> Report abuse </a> </li>
										</ul>
									</div>
								</div>
							</div>
							<div class="content-footer text-left"> <a class="btn  btn-default" data-toggle="modal" href="#contactAdvertiser"><i class=" icon-mail-2"></i> Send a message </a> <a class="btn  btn-info"><i class=" icon-phone-1"></i> 01680 531 352 </a> </div>
						</div>
					</div>
				</div>
				<div class="col-sm-3  page-sidebar-right">
					<aside>
						<div class="panel sidebar-panel panel-contact-seller">
							<div class="panel-heading">Contact Seller</div>
							<div class="panel-content user-info">
								<div class="panel-body text-center">
									<div class="seller-info">
										<h3 class="no-margin"><?php echo $det_view['first_name']." ".$det_view['last_name'];?></h3>
										<p>Location: <strong><?php echo $det_view['Country_name'];?></strong></p>
										<p> Joined: <strong>12 Mar 2009</strong></p>
									</div>
									<div class="user-ads-action"> 
										<a href="#contactAdvertiser" data-toggle="modal" class="btn   btn-default btn-block"><i class=" icon-mail-2"></i> Send a message </a> 
										<a class="btn  btn-info btn-block"><i class=" icon-phone-1"></i> 01680 531 352 </a> 
									</div>
								</div>
							</div>
						</div>
						<div class="panel sidebar-panel">
							<div class="panel-heading">Safety Tips for Buyers</div>
							<div class="panel-content">
								<div class="panel-body text-left">
									<ul class="list-check">
										<li> Meet seller at a public place </li>
										<li> Check the item before you buy</li>
										<li> Pay only after collecting the item</li>
									</ul>
									<p><a class="pull-right" href="#"> Know more <i class="fa fa-angle-double-right"></i> </a></p>
								</div>
							</div>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>