
		
		<meta name="keywords" content="365 Deals" />
        <meta name="description" content="365 Deals">
        <meta name="author" content="365 Deals">  

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Theme CSS -->
        <link href="css/style.css" rel="stylesheet" media="screen">
        <!-- Responsive CSS -->
        <link href="css/theme-responsive.css" rel="stylesheet" media="screen">
        <!-- Skins Theme -->
        
		       
        <script src="js/modernizr.js"></script>
		
		<!--<script type="text/javascript" src="js/marquee.js"></script>
		
		
	 use jssor.slider.debug.js instead for debug -->
		
		<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<!-- character only -->
		<script type="text/javascript">
			$(function () {
				$('#conscontname').keydown(function (e) {
					if (e.shiftKey || e.ctrlKey || e.altKey) {
					e.preventDefault();
					} else {
					var key = e.keyCode;
						if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
						e.preventDefault();
						}
					}
				});

				$('#busname').keydown(function (e) {
					if (e.shiftKey || e.ctrlKey || e.altKey) {
					e.preventDefault();
					} else {
					var key = e.keyCode;
						if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
						e.preventDefault();
						}
					}
				});

				$('#buscontname').keydown(function (e) {
					if (e.shiftKey || e.ctrlKey || e.altKey) {
					e.preventDefault();
					} else {
					var key = e.keyCode;
						if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
						e.preventDefault();
						}
					}
				});


			});
</script>
		
		<script type="text/javascript">
		

			$(function(){
				$('.footer button').click(function(){
					// alert('hihi'); return false;
					var regPostcode = /^([a-zA-Z]){1}([0-9][0-9]|[0-9]|[a-zA-Z][0-9][a-zA-Z]|[a-zA-Z][0-9][0-9]|[a-zA-Z][0-9]){1}([ ])([0-9][a-zA-z][a-zA-z]){1}$/;
					var postcode = $("#postalcode").val();
			if(regPostcode.test(postcode) == false)
			{
			//document.getElementById("status").innerHTML = "Postcode is not yet valid.";
			return false;
			}
			else
			{

			// document.getElementById("status").innerHTML = ""; 
			return true;
			}
				
				});
			});
		</script>

		<!-- google map -->
		 

		<!-- postad validation number only-->

		<script type="text/javascript">
		$(document).ready(function(){
				$("#free_package").click(function(){
					 var ch = document.getElementById('free_package').checked;
					 if (ch) {
					 	$(".free_hide").show(1000);
					 }
					 else{
					 	$(".free_hide").hide(1000);
					 }
					

				});

				$("#gold_package").click(function(){
					 var ch = document.getElementById('gold_package').checked;
					 if (ch) {
					 	$(".gold_hide").show(1000);
					 }
					 else{
					 	$(".gold_hide").hide(1000);
					 }
					

				});

				$("#platinum_package").click(function(){
					 var ch = document.getElementById('platinum_package').checked;
					 if (ch) {
					 	$(".marquetitle_hide").show(1000);
					 }
					 else{
					 	$(".marquetitle_hide").hide(1000);
					 }
					

				});
			});
		</script>


		<script type="text/javascript">
			function fileupload(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('.img_hide').show();
						$('#blah')
							.attr('src', e.target.result)
							.width(250)
							.height(150)
							.css('border', '2px solid rgba(48,63,159,.9)')
							.css('border-radius', '10px');
					};

					reader.readAsDataURL(input.files[0]);
				}
			}
		</script>

		<script type="text/javascript">
			$(function(){
				$('.bus_consumer').click(function(){
						var ch = $("input[name='checkbox_toggle']:checked").val();
						if(ch == 'Yes'){
							$('#bus_logo').show(1000);
							$('#business_form').show();
							$('#consumer_form').hide();

						}else{
							$('#bus_logo').hide(1000);
							$('#business_form').hide();
							$('#consumer_form').show();
						}
				});
			
			});
		</script>

		<script type="text/javascript">
		$(function(){
			$(".service_prof").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('services_sub').value = sub1[0];
				document.getElementById('services_sub_sub').value = sub1[1];
				document.getElementById('services_form').submit();
			});

			$(".service_pop").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('services_sub').value = sub1[0];
				document.getElementById('services_sub_sub').value = sub1[1];
				document.getElementById('services_form').submit();
			});
		});
		</script>


		<link href="modern-ticker/css/modern-ticker.css" type="text/css" rel="stylesheet">
		<link id="style-sheet" href="modern-ticker/themes/theme1/theme.css" type="text/css" rel="stylesheet">
		<script src="modern-ticker/js/jquery.modern-ticker.min.js" type="text/javascript"></script> 
		<script type="text/javascript">$(function(){$(".ticker1").modernTicker({effect:"scroll",scrollType:"continuous",scrollStart:"inside",scrollInterval:20,transitionTime:500,autoplay:true});$(".ticker2").modernTicker({effect:"fade",displayTime:4e3,transitionTime:300,autoplay:true});$(".ticker3").modernTicker({effect:"type",typeInterval:10,displayTime:4e3,transitionTime:300,autoplay:true});$(".ticker4").modernTicker({effect:"slide",slideDistance:100,displayTime:4e3,transitionTime:350,autoplay:true})})</script>
		<script src="modern-ticker/js/preview.js" type="text/javascript"></script>