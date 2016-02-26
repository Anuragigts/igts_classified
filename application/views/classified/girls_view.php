	<title>Right Deals :: Girls View</title>
	
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
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>js/filter.css"> 
	<script type="text/javascript">
		$(document).ready(function() {
		  $('.cd-filter-content').niceScroll({
			autohidemode: 'false',     
			cursorborderradius: '0px', 
			background: '#f4f4f4',     
			cursorwidth: '8px',       
			cursorcolor: '#E95413'     
		  });
		});
	</script>
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>libs/slider.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jssor.slider.min.js"></script>
	<!-- use jssor.slider.debug.js instead for debug -->
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
	  	/*a toz search*/
	  	$(".dealtitle_sort").change(function(){
	  		var girls_list = [];
				$("input[name='girls_list[]']:checked").each( function () {
					 var girls = $(this).val();
					 	 girls_list.push(girls);
					 
				});
	  			var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
				});
				var latt = $("#latt").val();
				var longg = $("#longg").val();
				var recentdays = $(".recentdays_sort option:selected").val();
				var dealtitle = $(".dealtitle_sort option:selected").val();
				var dealprice = $(".price_sort option:selected").val();
        		var pckg_list = [];
        		var urgent = '';
        		$("input[name='dealurgent[]']:checked").each( function () {
					 var pck = $(this).val();
					 if (pck == 'urgent') {
					 	urgent = pck;
					 }
					 else{
					 	 pckg_list.push(pck);
					 }
				     
				});
				var bustype = $("input[name=search_bustype]:checked").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>girls_view/search_filters",
					data: {
						girls_list: girls_list,
						seller_deals: seller_deals,
						bustype: bustype,
						pckg_list: pckg_list,
						urgent: urgent,
						dealtitle: dealtitle,
						dealprice: dealprice,
						recentdays: recentdays,
						latt: latt,
						longg: longg
					},
					success: function (data) {
						$(".girls_result").html(data);
					}
				})
        	});
		/*price asc / desc search*/
	  	$(".price_sort").change(function(){
	  		var girls_list = [];
				$("input[name='girls_list[]']:checked").each( function () {
					 var girls = $(this).val();
					 	 girls_list.push(girls);
					 
				});
	  			var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
				});
				var latt = $("#latt").val();
				var longg = $("#longg").val();
				var recentdays = $(".recentdays_sort option:selected").val();
				var dealtitle = $(".dealtitle_sort option:selected").val();
				var dealprice = $(".price_sort option:selected").val();
        		var pckg_list = [];
        		var urgent = '';
        		$("input[name='dealurgent[]']:checked").each( function () {
					 var pck = $(this).val();
					 if (pck == 'urgent') {
					 	urgent = pck;
					 }
					 else{
					 	 pckg_list.push(pck);
					 }
				     
				});
				var bustype = $("input[name=search_bustype]:checked").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>girls_view/search_filters",
					data: {
						girls_list: girls_list,
						seller_deals: seller_deals,
						bustype: bustype,
						pckg_list: pckg_list,
						urgent: urgent,
						dealtitle: dealtitle,
						dealprice: dealprice,
						recentdays: recentdays,
						latt: latt,
						longg: longg
					},
					success: function (data) {
						$(".girls_result").html(data);
					}
				})
        	});
		/*recent days*/
		$(".recentdays_sort").change(function(){
			var girls_list = [];
				$("input[name='girls_list[]']:checked").each( function () {
					 var girls = $(this).val();
					 	 girls_list.push(girls);
					 
				});
				var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
				});
				var latt = $("#latt").val();
				var longg = $("#longg").val();
				var recentdays = $(".recentdays_sort option:selected").val();
				var dealtitle = $(".dealtitle_sort option:selected").val();
				var dealprice = $(".price_sort option:selected").val();
        		var pckg_list = [];
        		var urgent = '';
        		$("input[name='dealurgent[]']:checked").each( function () {
					 var pck = $(this).val();
					 if (pck == 'urgent') {
					 	urgent = pck;
					 }
					 else{
					 	 pckg_list.push(pck);
					 }
				     
				});
				var bustype = $("input[name=search_bustype]:checked").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>girls_view/search_filters",
					data: {
						girls_list: girls_list,
						seller_deals: seller_deals,
						bustype: bustype,
						pckg_list: pckg_list,
						urgent: urgent,
						dealtitle: dealtitle,
						dealprice: dealprice,
						recentdays: recentdays,
						latt: latt,
						longg: longg
					},
					success: function (data) {
						$(".girls_result").html(data);
					}
				})
        	});
		/*bus/consumer search*/
		$(".search_bustype").change(function(){
			var girls_list = [];
				$("input[name='girls_list[]']:checked").each( function () {
					 var girls = $(this).val();
					 	 girls_list.push(girls);
					 
				});
			var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
				});
				var latt = $("#latt").val();
				var longg = $("#longg").val();
				var recentdays = $(".recentdays_sort option:selected").val();
				var dealtitle = $(".dealtitle_sort option:selected").val();
				var dealprice = $(".price_sort option:selected").val();
        		var pckg_list = [];
        		var urgent = '';
        		$("input[name='dealurgent[]']:checked").each( function () {
					 var pck = $(this).val();
					 if (pck == 'urgent') {
					 	urgent = pck;
					 }
					 else{
					 	 pckg_list.push(pck);
					 }
				     
				});
				var bustype = $("input[name=search_bustype]:checked").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>girls_view/search_filters",
					data: {
						girls_list: girls_list,
						seller_deals: seller_deals,
						bustype: bustype,
						pckg_list: pckg_list,
						urgent: urgent,
						dealtitle: dealtitle,
						dealprice: dealprice,
						recentdays: recentdays,
						latt: latt,
						longg: longg
					},
					success: function (data) {
						$(".girls_result").html(data);
					}
				})
        	});
		/*seller search*/
		$(".seller_deals").change(function(){
			var girls_list = [];
				$("input[name='girls_list[]']:checked").each( function () {
					 var girls = $(this).val();
					 	 girls_list.push(girls);
					 
				});
				var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
				});
				var latt = $("#latt").val();
				var longg = $("#longg").val();
				var recentdays = $(".recentdays_sort option:selected").val();
				var dealtitle = $(".dealtitle_sort option:selected").val();
				var dealprice = $(".price_sort option:selected").val();
        		var pckg_list = [];
        		var urgent = '';
        		$("input[name='dealurgent[]']:checked").each( function () {
					 var pck = $(this).val();
					 if (pck == 'urgent') {
					 	urgent = pck;
					 }
					 else{
					 	 pckg_list.push(pck);
					 }
				     
				});
				var bustype = $("input[name=search_bustype]:checked").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>girls_view/search_filters",
					data: {
						girls_list: girls_list,
						seller_deals: seller_deals,
						bustype: bustype,
						pckg_list: pckg_list,
						urgent: urgent,
						dealtitle: dealtitle,
						dealprice: dealprice,
						recentdays: recentdays,
						latt: latt,
						longg: longg
					},
					success: function (data) {
						$(".girls_result").html(data);
					}
				})
        	});
		/*deal urgent*/
		$(".dealurgent").click(function(){
			var girls_list = [];
				$("input[name='girls_list[]']:checked").each( function () {
					 var girls = $(this).val();
					 	 girls_list.push(girls);
					 
				});
				var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
				});
				var latt = $("#latt").val();
				var longg = $("#longg").val();
				var recentdays = $(".recentdays_sort option:selected").val();
				var dealtitle = $(".dealtitle_sort option:selected").val();
				var dealprice = $(".price_sort option:selected").val();
        		var pckg_list = [];
        		var urgent = '';
        		$("input[name='dealurgent[]']:checked").each( function () {
					 var pck = $(this).val();
					 if (pck == 'urgent') {
					 	urgent = pck;
					 }
					 else{
					 	 pckg_list.push(pck);
					 }
				     
				});
				var bustype = $("input[name=search_bustype]:checked").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>girls_view/search_filters",
					data: {
						girls_list: girls_list,
						seller_deals: seller_deals,
						bustype: bustype,
						pckg_list: pckg_list,
						urgent: urgent,
						dealtitle: dealtitle,
						dealprice: dealprice,
						recentdays: recentdays,
						latt: latt,
						longg: longg
					},
					success: function (data) {
						$(".girls_result").html(data);
					}
				})
        	});
			/*women list*/
			$(".girls_list").click(function(){
				var girls_list = [];
				$("input[name='girls_list[]']:checked").each( function () {
					 var girls = $(this).val();
					 	 girls_list.push(girls);
					 
				});
				var latt = $("#latt").val();
				var longg = $("#longg").val();
				var recentdays = $(".recentdays_sort option:selected").val();
				var dealprice = $(".price_sort option:selected").val();
				var dealtitle = $(".dealtitle_sort option:selected").val();
        		var pckg_list = [];
        		var urgent = '';
        		$("input[name='dealurgent[]']:checked").each( function () {
					 var pck = $(this).val();
					 if (pck == 'urgent') {
					 	urgent = pck;
					 }
					 else{
					 	 pckg_list.push(pck);
					 }
				     
				});
				var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
				});
				var bustype = $("input[name=search_bustype]:checked").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>girls_view/search_filters",
					data: {
						girls_list: girls_list,
						seller_deals: seller_deals,
						bustype: bustype,
						pckg_list: pckg_list,
						urgent: urgent,
						dealtitle: dealtitle,
						dealprice: dealprice,
						recentdays: recentdays,
						latt: latt,
						longg: longg
					},
					success: function (data) {
						$(".girls_result").html(data);
					}
				})
        	});
			/*search location */
			$("#find_location").click(function(){
				var girls_list = [];
				$("input[name='girls_list[]']:checked").each( function () {
					 var girls = $(this).val();
					 	 girls_list.push(girls);
					 
				});
				var latt = $("#latt").val();
				var longg = $("#longg").val();
				var recentdays = $(".recentdays_sort option:selected").val();
				var dealprice = $(".price_sort option:selected").val();
				var dealtitle = $(".dealtitle_sort option:selected").val();
        		var pckg_list = [];
        		var urgent = '';
        		$("input[name='dealurgent[]']:checked").each( function () {
					 var pck = $(this).val();
					 if (pck == 'urgent') {
					 	urgent = pck;
					 }
					 else{
					 	 pckg_list.push(pck);
					 }
				     
				});
				var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
				});
				var bustype = $("input[name=search_bustype]:checked").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>girls_view/search_filters",
					data: {
						girls_list: girls_list,
						seller_deals: seller_deals,
						bustype: bustype,
						pckg_list: pckg_list,
						urgent: urgent,
						dealtitle: dealtitle,
						dealprice: dealprice,
						recentdays: recentdays,
						latt: latt,
						longg: longg
					},
					success: function (data) {
						$(".girls_result").html(data);
					}
				})
        	});
	/*clear search location */
			$("#clear_location").click(function(){
				var girls_list = [];
				$("input[name='girls_list[]']:checked").each( function () {
					 var girls = $(this).val();
					 	 girls_list.push(girls);
					 
				});
				$("#find_loc").val('');
				var latt = '';
				var longg = '';
				var recentdays = $(".recentdays_sort option:selected").val();
				var dealprice = $(".price_sort option:selected").val();
				var dealtitle = $(".dealtitle_sort option:selected").val();
        		var pckg_list = [];
        		var urgent = '';
        		$("input[name='dealurgent[]']:checked").each( function () {
					 var pck = $(this).val();
					 if (pck == 'urgent') {
					 	urgent = pck;
					 }
					 else{
					 	 pckg_list.push(pck);
					 }
				     
				});
				var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
				});
				var bustype = $("input[name=search_bustype]:checked").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>girls_view/search_filters",
					data: {
						girls_list: girls_list,
						seller_deals: seller_deals,
						bustype: bustype,
						pckg_list: pckg_list,
						urgent: urgent,
						dealtitle: dealtitle,
						dealprice: dealprice,
						recentdays: recentdays,
						latt: latt,
						longg: longg
					},
					success: function (data) {
						$(".girls_result").html(data);
					}
				})
        	});
	  });
	  </script>
	<?php foreach ($busconcount as $countval) {
	  	$allbustype = $countval->allbustype;
	  	$business = $countval->business;
	  	$consumer = $countval->consumer;
	  }
	  foreach ($deals_pck as $pckval) {
	  	$urgentcnt = $pckval->urgentcount;
	  	$platinumcnt = $pckval->platinumcount;
	  	$goldcnt = $pckval->goldcount;
	  	$freecnt = $pckval->freecount;
	  }
	  foreach ($sellerneededcount as $sncnt) {
	  	$offered = $sncnt->offered;
	  	$needed = $sncnt->needed;
	  	$charity = $sncnt->charity;
	  }
	  foreach ($public_adview as $publicview) {
	  	$left_ad1 = $publicview->sidead_one;
	  	$topad = $publicview->topad;
	  	$mid_ad = $publicview->mid_ad;
	  }
	  foreach ($girls_list_count as $girls_list_countval) {
	  	$cloths = $girls_list_countval->clothes;
	  	$shoes = $girls_list_countval->shoes;
	  	$accessories = $girls_list_countval->accessories;
	  }

	  ?>
	  
	<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css">
	
	<!-- Section Title-->    
	<div class="section-title-01">
		<!-- Parallax Background -->
		<div class="bg_parallax image_01_parallax"></div>
	</div>   
	<!-- End Section Title-->
	
	<!--Content Central -->
	<section class="content-central">
		<!-- Shadow Semiboxed -->
		<div class="semiboxshadow text-center">
			<img src="img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
		</div>
		<form id="j-forms" action="#" class="j-forms" method="post" style="background-color: rgb(255, 255, 255) !important;">
			<div class="content_info">
				<div class="paddings">
					<div class="container pad_bott_50">
						<div class="row">
							<div class="col-md-10 col-sm-8 col-md-offset-1">
								<?php echo $topad; ?>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<!-- Item Table-->
							<div class="col-sm-3">
								<div class="container-by-widget-filter bg-dark color-white">
									<!-- Widget Filter -->
									<h3 class="title-widget">Clothing & LifeStyle </h3>
									
									<div class="cd-filter-block">
										<h4 class="title-widget">Girls</h4>
										<div class="cd-filter-content">
											<div>
												<label class="checkbox">
													<input type="checkbox" class='girls_list' name="girls_list[]" value="370" >
													<i></i> Clothing (<?php echo $cloths; ?>)
												</label>
												<label class="checkbox">
													<input type="checkbox" class='girls_list' name="girls_list[]" value="371" >
													<i></i> Shoes (<?php echo $shoes; ?>)
												</label>
												<label class="checkbox">
													<input type="checkbox" class='girls_list' name="girls_list[]" value="372" >
													<i></i> Accessories (<?php echo $accessories; ?>)
												</label>
											</div>
										</div>
									</div>
									
									<div class="cd-filter-block">
										<h4 class="title-widget closed">Seller Type</h4>

										<div class="cd-filter-content" style="overflow: hidden; display: none;">
											<div>
												<label class="checkbox">
													<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Offered" >
													<i></i> Offered (<?php echo $offered; ?>)
												</label>
												<label class="checkbox">
													<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Needed" >
													<i></i> Needed (<?php echo $needed; ?>)
												</label>
												<label class="checkbox">
													<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Charity" >
													<i></i> Charity (<?php echo $charity; ?>)
												</label>
											</div>
										</div> 
									</div>
									<div class="cd-filter-block">
										<h4 class="title-widget closed">Deal Type</h4>

										<div class="cd-filter-content" style="overflow: hidden; display: none;">
											<div>
												<label class="radio">
													<input type="radio" name="search_bustype" class="search_bustype" value="all" checked >
													<i></i> All (<?php echo $allbustype; ?>)
												</label>
												<label class="radio">
													<input type="radio" name="search_bustype" class="search_bustype" value="business" >
													<i></i> Business (<?php echo $business; ?>)
												</label>
												<label class="radio">
													<input type="radio" name="search_bustype" class="search_bustype" value="consumer" >
													<i></i> Consumer (<?php echo $consumer; ?>)
												</label>
											</div>
										</div>
									</div>
									
									<div class="cd-filter-block">
										<h4 class="title-widget closed">Location</h4>

										<div class="cd-filter-content" style="overflow: hidden; display: none;">
											<div class="input">
												<input type="text" placeholder="Enter Location" id="find_loc" class="find_loc_search" name="find_loc">
												<input type='hidden' name='latt' id='latt' value='' >
												<input type='hidden' name='longg' id='longg' value='' >
												<button class="btn btn-primary sm-btn pull-right find_location" id='find_location' >Find</button>
												<button class="btn btn-primary sm-btn pull-right clear_location" id='clear_location' >Clear</button>
											</div>
										</div>
									</div> 
									
									<div class="cd-filter-block">
										<h4 class="title-widget">Search Only</h4>

										<div class="cd-filter-content">
											<div>
												<label class="checkbox">
													<input type="checkbox" name="dealurgent[]" class="dealurgent"  value="urgent" >
													<i></i> Urgent Deals (<?php echo $urgentcnt; ?>)
												</label>
												<label class="checkbox">
													<input type="checkbox" name="dealurgent[]" class="dealurgent" value="platinum" >
													<i></i> Significant Deals (<?php echo $platinumcnt; ?>)
												</label>
												<label class="checkbox">
													<input type="checkbox" name="dealurgent[]" class="dealurgent" value="gold" >
													<i></i> Most Valued Deals (<?php echo $goldcnt; ?>)
												</label>
												<label class="checkbox">
													<input type="checkbox" name="dealurgent[]" class="dealurgent" value="free" >
													<i></i> Recent Deals (<?php echo $freecnt; ?>)
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row top_20">
									<div class="col-sm-12">
										<?php echo $left_ad1; ?>
									</div>
								</div>
							</div>
							<!-- End Item Table-->

							<!-- Item Table-->
							<div class="col-md-9">
                                <div class="sort-by-container tooltip-hover">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <strong>Sort by:</strong>
                                            <ul>                            
                                                <li>
													<div class="top_bar_top">
														<label class="input select">
															<select name="star">
																<option value="none" selected disabled="">Select Star</option>
																<option value="5">5 Starts</option>
																<option value="4">4 Starts</option>
																<option value="3">3 Starts</option>
																<option value="2">2 Starts</option>
																<option value="1">1 Starts</option>
															</select>
															<i></i>
														</label>
													</div>
                                                </li>
												<li>
													<div class="top_bar_top">
														<label class="input select">
															<select name="dealtitle_sort" class="dealtitle_sort">
																<option value="Any">Any</option>
																<option value="atoz">A to Z</option>
																<option value="ztoa">Z to A</option>
															</select>
															<i></i>
														</label>
													</div>
                                                </li>
												<li>
													<div class="top_bar_top">
														<label class="input select">
															<select name="price_sort" class="price_sort">
																<option value="Any">Any(Pricing)</option>
																<option value="lowtohigh">Low to High</option>
																<option value="hightolow">High to Low</option>
															</select>
															<i></i>
														</label>
													</div>
                                                </li>
                                                <li>
													<div class="top_bar_top">
														<label class="input select">
																<select name="recentdays_sort" class="recentdays_sort">
																	<option value="Any">Any(posted on)</option>
																	<option value="last24hours">Last 24 Hours</option>
																	<option value="last3days">Last 3 Days</option>
																	<option value="last7days">Last 7 Days</option>
																	<option value="last14days">Last 14 Days</option>
																	<option value="last1month">Last 1 month</option>
																</select>
																<i></i>
															</label>
													</div>
												</li>
											</ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- sort-by-container-->

                                <div class="row list_view_searches girls_result">
                                	<?php echo $this->load->view("classified/girls_view_search"); ?> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
	
	<!-- End Shadow Semiboxed -->
	<script src="<?php echo base_url(); ?>js/jquery.js"></script> 
	
	<script src="<?php echo base_url(); ?>j-folder/js/jquery.maskedinput.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/additional-methods.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/jquery.form.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/j-forms.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>libs/jquery.xuSlider.js"></script>
	<script>
		$('.xuSlider').xuSlider();
	</script>
	
	<script src="<?php echo base_url(); ?>js/jquery.nicescroll.js"></script> 

	<script src="<?php echo base_url(); ?>libs/jquery.mixitup.min.js"></script>
	<script src="<?php echo base_url(); ?>libs/main.js"></script>