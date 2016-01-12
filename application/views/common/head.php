
		<meta name="identifier-url" content="http://class.igravitas.in" />
		<meta name="title" content="99 Right Deals" />
		<meta name="description" content="365 Great Deals is a marketplace where users come and post about their unwanted/used goods which the needy buyers keep looking at." />
		<meta name="abstract" content="365 Great Deals is a marketplace where users come and post about their unwanted/used goods which the needy buyers keep looking at." />
		<meta name="keywords" content="Hot deals, E-Zone, Motor Point, Clothing & LifeStyles , Services, Find a Property, Home & Kitchen, Pets, Jobs" />
		<meta name="author" content="iGravitas" />
		<meta name="revisit-after" content="1" />
		<meta name="language" content="EN" />
		<meta name="copyright" content="© 2016, All right reserved." />
		<meta name="robots" content="All" />
		<!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="identifier-url" content="http://class.igravitas.in" />
		<meta name="title" content="99 Right Deals" />
		<meta name="description" content="365 Great Deals is a marketplace where users come and post about their unwanted/used goods which the needy buyers keep looking at." />
		<meta name="abstract" content="365 Great Deals is a marketplace where users come and post about their unwanted/used goods which the needy buyers keep looking at." />
		<meta name="keywords" content="Hot deals, E-Zone, Motor Point, Clothing & LifeStyles , Services, Find a Property, Home & Kitchen, Pets, Jobs" />
		<meta name="author" content="iGravitas" />
		<meta name="revisit-after" content="1" />
		<meta name="language" content="EN" />
		<meta name="copyright" content="© 2016, All right reserved." />
		<meta name="robots" content="All" />
        <!-- Theme CSS -->
        <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" media="screen">
        <!-- Responsive CSS -->
        <link href="<?php echo base_url(); ?>css/theme-responsive.css" rel="stylesheet" media="screen">
        <!-- Skins Theme -->
        
		       
        <script src="<?php echo base_url(); ?>js/modernizr.js"></script>
		
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
				
				$("#bu_cust_urpackage").click(function(){
					 var ch = document.getElementById('bu_cust_urpackage').checked;
					 if (ch) {
					 	$(".b_customer_hide").show(1000);
					 }
					 else{
					 	$(".b_customer_hide").hide(1000);
					 }
					

				});
				
				$("#bu_cust_urpackage1").click(function(){
					 var ch = document.getElementById('bu_cust_urpackage1').checked;
					 if (ch) {
					 	$(".b_customer_hide1").show(1000);
					 }
					 else{
					 	$(".b_customer_hide1").hide(1000);
					 }
					

				});
				
				$("#pec_free_package").click(function(){
					 var ch = document.getElementById('pec_free_package').checked;
					 if (ch) {
					 	$(".pec_free_hide").show(1000);
					 }
					 else{
					 	$(".pec_free_hide").hide(1000);
					 }
					

				});
				
				$("#pec_goldur_package").click(function(){
					 var ch = document.getElementById('pec_goldur_package').checked;
					 if (ch) {
					 	$(".pec_goldur_hide").show(1000);
					 }
					 else{
					 	$(".pec_goldur_hide").hide(1000);
					 }
					

				});

				/*free+urgent package*/
				$("#free_urgent").click(function(){
					 var ch = document.getElementById('free_package').checked;
					 if (ch) {
					 	$(".free_urgent_pck").show();
					 	$(".free_pck").hide();
					 	$(".platinum_pck").hide();
					 	$(".gold_urgent_pck").hide();
					 	$(".gold_pck").hide();
					 	$('#package_type').val('free_urgent');
					 }
					 else{
					 	$(".free_urgent_pck").hide();
					 	$(".free_pck").show();
					 	$(".platinum_pck").hide();
					 	$(".gold_urgent_pck").hide();
					 	$(".gold_pck").hide();
					 	$('#package_type').val('free');
					 }
					

				});

				/*gold+urgent package*/
				$("#gold_urgent").click(function(){
					 var ch = document.getElementById('gold_package').checked;
					 if (ch) {
					 	$(".gold_urgent_pck").show();
					 	$(".gold_pck").hide();
					 	$(".platinum_pck").hide();
					 	$(".free_urgent_pck").hide();
					 	$(".free_pck").hide();
					 	$('#package_type').val('gold_urgent');
					 }
					 else{
					 	$(".gold_urgent_pck").hide();
					 	$(".gold_pck").show();
					 	$(".platinum_pck").hide();
					 	$(".free_urgent_pck").hide();
					 	$(".free_pck").hide();
					 	$('#package_type').val('gold');
					 }
					

				});

				/*platinum package*/
				$("#platinum_urgent").click(function(){
					 	$(".platinum_pck").show();
					 	$(".free_urgent_pck").hide();
					 	$(".free_pck").hide();
					 	$(".gold_urgent_pck").hide();
					 	$(".gold_pck").hide();
					 	$('#package_type').val('platinum');
				});

				/*file upload limit*/
				$("#img_len").click(function(){
				alert("Minimum 3 images should Upload");
				});
			});
		</script>


		<script type="text/javascript">
			function fileupload(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('.img_hide').show();
						$('#del_img').css('display', 'block');
						$('#blah')
							.show()
							.attr('src', e.target.result)
							.width(250)
							.height(150)
							.css('border', '2px solid rgba(48,63,159,.9)')
							.css('border-radius', '10px');
					};

					reader.readAsDataURL(input.files[0]);
				}
			}

			/*free image upload*/
			function free_fileupload(input) {
				var str = input.name;
				var res = str.charAt(str.length-1);
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						// $('.img_hide').show();
						$("#free_del"+res).show();
						$('#free_pre'+res)
							.show()
							.attr('src', e.target.result)
							.width(250)
							.height(150)
							.css('border', '2px solid rgba(48,63,159,.9)')
							.css('border-radius', '10px');
					};

					reader.readAsDataURL(input.files[0]);
				}
			}

			$(document).on('click', '.remove_freepic', function () {
			    // alert(this.id);
			    var str = this.id;
			    var res = str.charAt(str.length-1);
			    document.getElementById("free_upload"+res).value = '';
			    var reader = new FileReader();
			    $('#free_pre'+res).css('display', 'none');
			    $("#free_del"+res).hide();
			});
		</script>

		<script type="text/javascript">
			$(function(){
				$('.bus_consumer').click(function(){
						var ch = $("input[name='checkbox_toggle']:checked").val();
						if(ch == 'Yes'){
							$('#bus_logo').show(1000);
							$('#business_form').show();
							$('#consumer_form').hide();
							$("#blah").hide();

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

			/*edit open model*/
		$(".edit_service_prof").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('services_sub').value = sub1[0];
				document.getElementById('services_sub_sub').value = sub1[1];
				document.getElementById('edit_service_cat').submit();
			});

		$(".edit_service_pop").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('services_sub').value = sub1[0];
				document.getElementById('services_sub_sub').value = sub1[1];
				document.getElementById('edit_service_cat').submit();
			});
	
		});
		</script>
		