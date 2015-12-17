<?php 
//echo "<pre>"; print_r(@$most_ads); exit; 
// echo "<pre>";
// $outer_array = array_chunk(@$most_ads, 3);
?>   

        <!DOCTYPE html>
        <html>
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <title>365 Deals</title>
    
    <!-- xxx Head Content xxx -->
    <?php echo $this->load->view('common/head');?> 
    <!-- xxx End xxx -->
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
        <?php echo $this->load->view("classified/".$content);?>



        <!-- xxx footer Content xxx -->
        <?php echo $this->load->view('common/footer');?> 
        <!-- xxx footer End xxx -->
        
    </div>
    <!-- End Entire Wrap -->

    
    <!-- xxx footerscript Content xxx -->
    <?php echo $this->load->view('common/footerscript');?> 
    <!-- xxx footerscript End xxx -->
    
        
</body>
</html>
