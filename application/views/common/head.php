
		<meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="World Cup - Responsive HTML5 Template soccer and sports">
        <meta name="author" content="iwthemes.com">  

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Theme CSS -->
        <link href="css/style.css" rel="stylesheet" media="screen">
        <!-- Responsive CSS -->
        <link href="css/theme-responsive.css" rel="stylesheet" media="screen">
        <!-- Skins Theme -->
        <link href="#" rel="stylesheet" media="screen" class="skin">

       
        <script src="js/modernizr.js"></script>
		
		<script type="text/javascript" src="js/marquee.js"></script>
		
		<script type="text/javascript" src="js/jssor.slider.min.js"></script>
		<!-- use jssor.slider.debug.js instead for debug -->
		<script>
			jssor_1_slider_init = function() {
				
				var jssor_1_options = {
				  $AutoPlay: true,
				  $Idle: 0,
				  $AutoPlaySteps: 4,
				  $SlideDuration: 1600,
				  $SlideEasing: $Jease$.$Linear,
				  $PauseOnHover: 4,
				  $SlideWidth: 180,
				  $Cols: 7
				};
				
				var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
				
				//responsive code begin
				//you can remove responsive code if you don't want the slider scales while window resizing
				function ScaleSlider() {
					var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
					if (refSize) {
						refSize = Math.min(refSize, 809);
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$(".bus_image").click(function(){
					$(".bus_img").show(1000);

				});
			});
		</script>
		<script>
			$(document).ready(function(){
				$(".con_image").click(function(){
					$(".bus_img").hide(1000);

				});
			});
		</script>