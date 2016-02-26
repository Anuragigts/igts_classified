	<title>Right Deals :: Kitchen Essentials View</title>
	
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
	
	<link rel="stylesheet" href="<?php echo base_url();?>js/filter.css"> 
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
	
	<link rel="stylesheet" href="<?php echo base_url();?>libs/slider.css">
	<script type="text/javascript" src="<?php echo base_url();?>js/jssor.slider.min.js"></script>
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
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
	<script type="text/javascript">
	google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('find_loc'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();
                $("#latt").val(latitude);
                $("#longg").val(longitude);
            });
        });
	</script>
	 <!-- map on model -->
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
			/*sub categories of kitchen home*/
			$(".kitchen_search").change(function(){
				var kitchen_sub = [];
				$("input[name='kitchen_search[]']:checked").each( function () {
					 var kitchen = $(this).val();
					 	 kitchen_sub.push(kitchen);
					 
				});
				var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
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
				
				var bustype = $("input[name=search_bustype]:checked").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>home_kitchen_view/search_filters",
					data: {
						kitchen_sub: kitchen_sub,
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
						$(".kitchen_search_result").html(data);
					}
				})
        	});
			/* seller or needed deals*/
		$(".seller_deals").change(function(){
			var kitchen_sub = [];
				$("input[name='kitchen_search[]']:checked").each( function () {
					 var kitchen = $(this).val();
					 	 kitchen_sub.push(kitchen);
					 
				});
			var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
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
				
				var bustype = $("input[name=search_bustype]:checked").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>home_kitchen_view/search_filters",
					data: {
						kitchen_sub: kitchen_sub,
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
						$(".kitchen_search_result").html(data);
					}
				})
        	});
		/*business type */
        	$(".search_bustype").click(function(){
        		var kitchen_sub = [];
				$("input[name='kitchen_search[]']:checked").each( function () {
					 var kitchen = $(this).val();
					 	 kitchen_sub.push(kitchen);
					 
				});
        		var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
				});
        		var latt = $("#latt").val();
				var longg = $("#longg").val();
        		var recentdays = $(".recentdays_sort option:selected").val();
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
        		if ($("input:radio[name=search_bustype]").is(":checked")){
        			var bustype = $("input[name=search_bustype]:checked").val();
        		}
				
				var dealtitle = $(".dealtitle_sort option:selected").val();
				var dealprice = $(".price_sort option:selected").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>home_kitchen_view/search_filters",
					data: {
						kitchen_sub: kitchen_sub,
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
						$(".kitchen_search_result").html(data);
					}
				})
        	});
        	/*search only urgent / platinum / gold / free*/
        	$(".dealurgent").click(function(){
        		var kitchen_sub = [];
				$("input[name='kitchen_search[]']:checked").each( function () {
					 var kitchen = $(this).val();
					 	 kitchen_sub.push(kitchen);
					 
				});
        		var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
				});
        		var latt = $("#latt").val();
				var longg = $("#longg").val();
        		var recentdays = $(".recentdays_sort option:selected").val();
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
				var dealtitle = $(".dealtitle_sort option:selected").val();
				var dealprice = $(".price_sort option:selected").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>home_kitchen_view/search_filters",
					data: {
						kitchen_sub: kitchen_sub,
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
						$(".kitchen_search_result").html(data);
					}
				})
        	});

		/*search ato z / A to Z*/
			$(".dealtitle_sort").change(function(){
				var kitchen_sub = [];
				$("input[name='kitchen_search[]']:checked").each( function () {
					 var kitchen = $(this).val();
					 	 kitchen_sub.push(kitchen);
					 
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
					url: "<?php echo base_url();?>home_kitchen_view/search_filters",
					data: {
						kitchen_sub: kitchen_sub,
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
						$(".kitchen_search_result").html(data);
					}
				})
        	});
		/*search price asc / desc*/
			$(".price_sort").change(function(){
				var kitchen_sub = [];
				$("input[name='kitchen_search[]']:checked").each( function () {
					 var kitchen = $(this).val();
					 	 kitchen_sub.push(kitchen);
					 
				});
				var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
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
				
				var bustype = $("input[name=search_bustype]:checked").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>home_kitchen_view/search_filters",
					data: {
						kitchen_sub: kitchen_sub,
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
						$(".kitchen_search_result").html(data);
					}
				})
        	});
		/*search price asc / desc*/
			$(".recentdays_sort").change(function(){
				var kitchen_sub = [];
				$("input[name='kitchen_search[]']:checked").each( function () {
					 var kitchen = $(this).val();
					 	 kitchen_sub.push(kitchen);
					 
				});
				var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
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
				
				var bustype = $("input[name=search_bustype]:checked").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>home_kitchen_view/search_filters",
					data: {
						kitchen_sub: kitchen_sub,
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
						$(".kitchen_search_result").html(data);
					}
				})
        	});
	/*search location */
			$("#find_location").click(function(){
				var kitchen_sub = [];
				$("input[name='kitchen_search[]']:checked").each( function () {
					 var kitchen = $(this).val();
					 	 kitchen_sub.push(kitchen);
					 
				});
				var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
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
				
				var bustype = $("input[name=search_bustype]:checked").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>home_kitchen_view/search_filters",
					data: {
						kitchen_sub: kitchen_sub,
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
						$(".kitchen_search_result").html(data);
					}
				})
        	});

	/*clear location*/
	$("#clear_location").click(function(){
		var kitchen_sub = [];
				$("input[name='kitchen_search[]']:checked").each( function () {
					 var kitchen = $(this).val();
					 	 kitchen_sub.push(kitchen);
					 
				});
			$("#find_loc").val('');
				var seller_deals = [];
				$("input[name='seller_deals[]']:checked").each( function () {
					 var seller = $(this).val();
					 	 seller_deals.push(seller);
					 
				});
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
				
				var bustype = $("input[name=search_bustype]:checked").val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url();?>home_kitchen_view/search_filters",
					data: {
						kitchen_sub: kitchen_sub,
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
						$(".kitchen_search_result").html(data);
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
		  foreach ($public_adview as $publicview) {
		  	$left_ad1 = $publicview->sidead_one;
		  	$topad = $publicview->topad;
		  	$mid_ad = $publicview->mid_ad;
		  }
		  foreach ($sellerneededcount as $sncnt) {
		  	$seller = $sncnt->seller;
		  	$needed = $sncnt->needed;
		  }
	   ?>
	  
	<link rel="stylesheet" href="<?php echo base_url();?>j-folder/css/j-forms.css">
	
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
			<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
		</div>
		<form id="j-forms" action="#" class="j-forms" method="post" style="background-color: rgb(255, 255, 255) !important;">
			<div class="content_info">
				<div class="paddings">
					<div class="container pad_bott_50">
						<div class="row">
							<div class="col-md-10 col-sm-8 col-md-offset-1">
								<img src="<?php echo base_url(); ?>img/slide/ban5.jpg" alt="add" title="Adds">
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<!-- Item Table-->
							<div class="col-sm-3">
								<div class="container-by-widget-filter bg-dark color-white">
									<!-- Widget Filter -->
									<h3 class="title-widget"> Filter</h3>
									<div class="cd-filter-block">
										<h4 class="title-widget">Kitchen Essentials</h4>
										<div class="cd-filter-content">
											<div id="limit_scrol">
												<?php foreach ($kitchen_view as $kval) { ?>
												<label class="checkbox">
												<input type="checkbox" name="kitchen_search[]" class="kitchen_search" value="<?php echo $kval->sub_subcategory_id; ?>" >
												<i></i>  <?php echo ucwords($kval->sub_subcategory_name)."(".$kval->no_ads.")"; ?> 
												</label>
												<?php } ?>
											</div>
										</div>
									</div>

									<div class="cd-filter-block">
										<h4 class="title-widget">Home Essentials</h4>
										<div class="cd-filter-content" style="overflow: hidden; display: none;">
											<div id="limit_scrol">
												<?php foreach ($home_view as $hval) { ?>
												<label class="checkbox">
												<input type="checkbox" name="kitchen_search[]" class="kitchen_search" value="<?php echo $hval->sub_subcategory_id; ?>" >
												<i></i>  <?php echo ucwords($hval->sub_subcategory_name)."(".$hval->no_ads.")"; ?> 
												</label>
												<?php } ?>
											</div>
										</div>
									</div>

									<div class="cd-filter-block">
										<h4 class="title-widget">Decor</h4>
										<div class="cd-filter-content" style="overflow: hidden; display: none;">
											<div id="limit_scrol">
												<?php foreach ($decor_view as $dval) { ?>
												<label class="checkbox">
												<input type="checkbox" name="kitchen_search[]" class="kitchen_search" value="<?php echo $dval->sub_subcategory_id; ?>" >
												<i></i>  <?php echo ucwords($dval->sub_subcategory_name)."(".$dval->no_ads.")"; ?> 
												</label>
												<?php } ?>
											</div>
										</div>
									</div>
									<div class="cd-filter-block">
										<h4 class="title-widget closed">Seller Type</h4>

										<div class="cd-filter-content" style="overflow: hidden; display: none;">
											<div>
												<label class="checkbox">
													<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Seller" >
													<i></i> Seller Deals (<?php echo $seller; ?>)
												</label>
												<label class="checkbox">
													<input type="checkbox" name="seller_deals[]" class='seller_deals' value="Needed" >
													<i></i> Needed Deals (<?php echo $needed; ?>)
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
									<div class="col-sm-12 left_ad1">
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

                                <div class="row list_view_searches kitchen_search_result">
                                	<?php echo $this->load->view("classified/kitchen_view_search"); ?>
								</div>
								<div class='row'>
									<div class='col-md-12'>
										<?php echo $paging_links; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>

	<!--MAP Modal -->
	<div class="modal fade" id="map_location" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<!-- <form action="#" method="post" class="j-forms " > -->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2>Map Location</h2>
					</div>
					<div class="modal-body map_show">
						
					</div>
				</div>
			<!-- </form> -->
		</div>
	</div>
	
	<!-- End Shadow Semiboxed -->
	<script src="<?php echo base_url();?>js/jquery.js"></script> 
	
	<script src="<?php echo base_url();?>j-folder/js/jquery.maskedinput.min.js"></script>
	<script src="<?php echo base_url();?>j-folder/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url();?>j-folder/js/additional-methods.min.js"></script>
	<script src="<?php echo base_url();?>j-folder/js/jquery.form.min.js"></script>
	<script src="<?php echo base_url();?>j-folder/js/j-forms.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url();?>libs/jquery.xuSlider.js"></script>
	<script>
		$('.xuSlider').xuSlider();
	</script>
	
	<script src="<?php echo base_url();?>js/jquery.nicescroll.js"></script> 

	<script src="<?php echo base_url();?>libs/jquery.mixitup.min.js"></script>
	<script src="<?php echo base_url();?>libs/main.js"></script>	