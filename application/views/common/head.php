
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="shortcut icon" href="<?php echo base_url(); ?>img/icons/icon.png" type="image/x-icon">
		<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" media="screen"/>
        <link href="<?php echo base_url(); ?>css/theme-responsive.css" rel="stylesheet" media="screen">
        <script src="<?php echo base_url(); ?>js/modernizr.js"></script>
		<script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		
		<script type="text/javascript">

			/*currency change*/
			$(function(){
				$(".currency").change(function(){
					var cur = $(this).val();
					// alert(cur);
					if (cur == 'euro') {
						$(".free_euro").css('display', 'block');
						$(".free_pound").css('display', 'none');
					}
					else if (cur == 'pound'){
						$(".free_pound").css('display', 'block');
						$(".free_euro").css('display', 'none');
					}
				});
			});

			/*video upload platinum*/
			$(document).ready(function(){    
				$("#file_video_platinum").change(function(e){    
				var file = e.currentTarget.files[0];    
				objectUrl = URL.createObjectURL(file);    
				$("#vid").prop("src", objectUrl);    
				});    
				    
				$('.video_validate').click(function(){
				if ($("#vid").attr('src')) {
				var seconds = $("#vid")[0].duration;    
				if(seconds > 30){
				$(".platinum_video_error").css('display', 'block');
				return false;  
				}
				else{
					$(".platinum_video_error").css('display', 'none');
					return true;
				}    
				
					}
				else{
					$(".platinum_video_error").css('display', 'none');
					return true;
				}
				});    
			    
			});    


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

				/*signup type*/
				$(function(){
					$('.sign_type').click(function(){
                        var ch = $("input[name='signup_type']:checked").val();
                        if(ch == 'business'){
                            $("#signup_business").css('display', 'block');
                            $("#signup_consumer").css('display', 'none');
                        }else{
                            $("#signup_business").css('display', 'none');
                            $("#signup_consumer").css('display', 'block');
	                        }
	                });
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
				
				$(".reasonname").change(function(){
					var val = $(this).val();
					if (val == 'I_found_my_deal_with_99_Right_Deals') {
						$("#other_reason_hide").hide(1000);
					 	$("#other_reasonurl_hide").hide(1000);
					}
					else if (val == 'I_Found_My_deals_with_another_website') {
						$("#other_reasonurl_hide").show(1000);
					 	$("#other_reason_hide").hide(1000);
					}
					else if (val == 'I_am_unhappy_about_services' || val == 'Other_Reasons')  {
						$("#other_reason_hide").show(1000);
					 	$("#other_reasonurl_hide").hide(1000);
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
			/*services category*/
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
	
			/*pets category*/

			$(".pets_others").click(function(){
				var sub = $(this).attr('id');
				document.getElementById('pets_sub').value = sub;
				document.getElementById('pets_form').submit();
			});


			$(".pets_big").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('pets_sub').value = sub1[0];
				document.getElementById('pets_sub_sub').value = sub1[1];
				document.getElementById('pets_form').submit();
			});

			$(".pets_small").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('pets_sub').value = sub1[0];
				document.getElementById('pets_sub_sub').value = sub1[1];
				document.getElementById('pets_form').submit();
			});

			$(".pets_accessories").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('pets_sub').value = sub1[0];
				document.getElementById('pets_sub_sub').value = sub1[1];
				document.getElementById('pets_form').submit();
			});

			/*edit model pets*/	

			$(".edit_pets_others").click(function(){
				var sub = $(this).attr('id');
				document.getElementById('pets_sub').value = sub;
				document.getElementById('edit_pets_cat').submit();
			});

			$(".edit_pets_big").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('pets_sub').value = sub1[0];
				document.getElementById('pets_sub_sub').value = sub1[1];
				document.getElementById('edit_pets_cat').submit();
			});

			$(".edit_pets_small").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('pets_sub').value = sub1[0];
				document.getElementById('pets_sub_sub').value = sub1[1];
				document.getElementById('edit_pets_cat').submit();
			});

			$(".edit_pets_accessories").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('pets_sub').value = sub1[0];
				document.getElementById('pets_sub_sub').value = sub1[1];
				document.getElementById('edit_pets_cat').submit();
			});


			/*cloths & lifestyles*/
			/*women*/
			$(".cloths_women").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('cloths_sub').value = sub1[0];
				document.getElementById('cloths_sub_sub').value = sub1[1];
				document.getElementById('cloths_form').submit();
			});

			/*men*/
			$(".cloths_men").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('cloths_sub').value = sub1[0];
				document.getElementById('cloths_sub_sub').value = sub1[1];
				document.getElementById('cloths_form').submit();
			});

			/*boy*/
			$(".cloths_boy").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('cloths_sub').value = sub1[0];
				document.getElementById('cloths_sub_sub').value = sub1[1];
				document.getElementById('cloths_form').submit();
			});

			/*girl*/
			$(".cloths_girl").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('cloths_sub').value = sub1[0];
				document.getElementById('cloths_sub_sub').value = sub1[1];
				document.getElementById('cloths_form').submit();
			});

			/*baby boy*/
			$(".cloths_bboy").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('cloths_sub').value = sub1[0];
				document.getElementById('cloths_sub_sub').value = sub1[1];
				document.getElementById('cloths_form').submit();
			});

			/*baby girl*/
			$(".cloths_bgirl").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('cloths_sub').value = sub1[0];
				document.getElementById('cloths_sub_sub').value = sub1[1];
				document.getElementById('cloths_form').submit();
			});

			/*edit women*/
			$(".edit_cloths_women").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('cloths_sub').value = sub1[0];
				document.getElementById('cloths_sub_sub').value = sub1[1];
				document.getElementById('edit_cloths_cat').submit();
			});

			/*edit men*/
			$(".edit_cloths_men").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('cloths_sub').value = sub1[0];
				document.getElementById('cloths_sub_sub').value = sub1[1];
				document.getElementById('edit_cloths_cat').submit();
			});

			/*edit boy*/
			$(".edit_cloths_boy").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('cloths_sub').value = sub1[0];
				document.getElementById('cloths_sub_sub').value = sub1[1];
				document.getElementById('edit_cloths_cat').submit();
			});

			/*edit girls*/
			$(".edit_cloths_girl").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('cloths_sub').value = sub1[0];
				document.getElementById('cloths_sub_sub').value = sub1[1];
				document.getElementById('edit_cloths_cat').submit();
			});

			/*edit baby boy*/
			$(".edit_cloths_bboy").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('cloths_sub').value = sub1[0];
				document.getElementById('cloths_sub_sub').value = sub1[1];
				document.getElementById('edit_cloths_cat').submit();
			});

			/*edit baby girls*/
			$(".edit_cloths_bgirl").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('cloths_sub').value = sub1[0];
				document.getElementById('cloths_sub_sub').value = sub1[1];
				document.getElementById('edit_cloths_cat').submit();
			});

			/*motor point*/

			/*cars*/
			$(".cars_cars").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('motorpoint_form').submit();
			});

			/*edit cars*/
			$(".edit_cars_cars").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('edit_motor_cat').submit();
			});

			/*bike and scooter*/
			$(".bike_scooters").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('motorpoint_form').submit();
			});

			/*edit bike and scooter*/
			$(".edit_bike_scooters").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('edit_motor_cat').submit();
			});

				/*motor_caravans*/
			$(".motor_caravans").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('motorpoint_form').submit();
			});

			/*edit motor_caravans*/
			$(".edit_motor_caravans").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('edit_motor_cat').submit();
			});

			/*motor_vans_trucks*/
			$(".motor_vans_trucks").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('motorpoint_form').submit();
			});

			/*edit motor_vans_trucks*/
			$(".edit_motor_vans_trucks").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('edit_motor_cat').submit();
			});

			/*motor_coach_bus*/
			$(".motor_coach_bus").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('motorpoint_form').submit();
			});

			/*edit motor_coach_bus*/
			$(".edit_motor_coach_bus").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('edit_motor_cat').submit();
			});

			/*motor_plant_machinery*/
			$(".motor_plant_machinery").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('motor_sub_sub_sub').value = sub1[2];
				document.getElementById('motorpoint_form').submit();
			});

			/*edit motor_plant_machinery*/
			$(".edit_plant_machinery").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('motor_sub_sub_sub').value = sub1[2];
				document.getElementById('edit_motor_cat').submit();
			});

			/*motor_farming vehicles*/
			$(".motor_farming").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('motor_sub_sub_sub').value = sub1[2];
				document.getElementById('motorpoint_form').submit();
			});

			/*edit motor_farming vehicles*/
			$(".edit_motor_farming").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('motor_sub_sub_sub').value = sub1[2];
				document.getElementById('edit_motor_cat').submit();
			});

			/*motor_boats */
			$(".motor_boats").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('motor_sub_sub_sub').value = sub1[2];
				document.getElementById('motorpoint_form').submit();
			});

			/*edit motor_boats*/
			$(".edit_motor_boats").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('motor_sub').value = sub1[0];
				document.getElementById('motor_sub_sub').value = sub1[1];
				document.getElementById('motor_sub_sub_sub').value = sub1[2];
				document.getElementById('edit_motor_cat').submit();
			});

			/*find a proprty */
			$(".propertyforsale").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('property_sub').value = sub1[0];
				document.getElementById('property_sub_sub').value = sub1[1];
				document.getElementById('property_form').submit();
			});

			/*edit find a proprty */
			$(".edit_propertyforsale").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('property_sub').value = sub1[0];
				document.getElementById('property_sub_sub').value = sub1[1];
				document.getElementById('edit_property_form').submit();
			});

			/*Job Category*/
			$(".job_detail").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('jobs_sub').value = sub1[0];
				document.getElementById('jobs_sub_sub').value = sub1[1];
				document.getElementById('jobs_form').submit();
			});

			$(".edit_job_detail").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('jobs_sub').value = sub1[0];
				document.getElementById('jobs_sub_sub').value = sub1[1];
				document.getElementById('edit_jobs_form').submit();
			});

			/*Ezone Category*/
			$(".ezone_detail").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('ezone_sub').value = sub1[0];
				document.getElementById('ezone_sub_sub').value = sub1[1];
				document.getElementById('ezone_form').submit();
			});

			/*edit ezone category*/
			$(".edit_ezone_detail").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('ezone_sub').value = sub1[0];
				document.getElementById('ezone_sub_sub').value = sub1[1];
				document.getElementById('edit_ezone_cat').submit();
			});

			/*kitchen detail Category*/
			$(".kitchen_detail").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('kitchen_sub').value = sub1[0];
				document.getElementById('kitchen_sub_sub').value = sub1[1];
				document.getElementById('kitchen_form').submit();
			});

			/*edit kitchen detail Category*/
			$(".edit_kitchen_detail").click(function(){
				var sub = $(this).attr('id');
				var sub1 = sub.split(",");
				document.getElementById('kitchen_sub').value = sub1[0];
				document.getElementById('kitchen_sub_sub').value = sub1[1];
				document.getElementById('edit_kitchen_form').submit();
			});



		});
		</script>


		<script type="text/javascript">
		/*view more and view less form motor point*/
		$(function(){
			/*cars*/
			$("#car_viewmore").click(function(){
				$("#car_sec_part").css('display', 'block');
				$("#car_viewmore").hide();
				$('#car_viewless').show();
			});
		
			$("#car_viewless").click(function(){
				$("#car_sec_part").css('display', 'none');
				$("#car_viewmore").show();
				$('#car_viewless').hide();
			});
		
			/*bikes*/
			$("#bike_viewmore").click(function(){
				$("#bike_sec_part").css('display', 'block');
				$("#bike_viewmore").hide();
				$("#bike_viewless").show();
			});
		
			$("#bike_viewless").click(function(){
				$("#bike_sec_part").css('display', 'none');
				$("#bike_viewmore").show();
				$("#bike_viewless").hide();
			});
		
			/*e-zone*/
			$("#ezone_viewmore").click(function(){
				$("#ezone_sec_part").css('display', 'block');
				$("#ezone_viewless").show();
				$("#ezone_viewmore").hide();
			});
		
			$("#ezone_viewless").click(function(){
				$("#ezone_sec_part").css('display', 'none');
				$("#ezone_viewless").hide();
				$("#ezone_viewmore").show();
			});
			
		});
	</script>
		