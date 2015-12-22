
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
        <style type="text/css">
        .postad_error{
			display: none;
			margin-left: 10px;
		}

		.postad_error1{
			display: none;
			margin-left: 10px;
		}		
		
		.postad_error_show{
			color: red;
			margin-left: 10px;
		}

		.deal_error{
			display: none;
			margin-left: 10px;
		}
		.deal_error_show{
			color: red;
			margin-left: 10px;
		}

		.busi_error{
			display: none;
			margin-left: 10px;
		}
		.busi_error_show{
			color: red;
			margin-left: 10px;
		}
		.consum_error{
			display: none;
			margin-left: 10px;
		}
		.consum_error_show{
			color: red;
			margin-left: 10px;
		}

		input.invalid, textarea.invalid{
			border: 1px solid red;
		}
		
		input.valid, textarea.valid{
			border: 0px solid green;
		}

        </style>
       
        <script src="js/modernizr.js"></script>
		
		<script type="text/javascript" src="js/marquee.js"></script>
		
		<script type="text/javascript" src="js/jssor.slider.min.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<!-- use jssor.slider.debug.js instead for debug -->
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



		<!-- postad validation number only-->

		<script type="text/javascript">
		function fileupload(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                	$('.img_hide').show();
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		</script>


		<script type="text/javascript">
		$(function(){
		 $('#postal_code').keypress(function(event){
            console.log(event.which);
		        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
		            event.preventDefault();
		        }
    		});
		 /*cosumer mobile no*/
		 $('#mbl_no_cons').keypress(function(event){
            console.log(event.which);
		        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
		            event.preventDefault();
		        }
    		});
		 /*business mobile no*/
		 $('#mbl_no_bus').keypress(function(event){
            console.log(event.which);
		        if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
		            event.preventDefault();
		        }
    		});
		 });
		</script>
		<script type="text/javascript">
		$(function(){
			$('#check_file').click(function(){
				/*postal code validation for 1st screen*/
				 var element=$("#postal_code");
				var val = $("#postal_code").val();
				var error_element=$("span", element.parent());
				if(val == ''){
					error_element.removeClass("postad_error").addClass("postad_error_show"); 
					return false;
				}
				else{
						error_element.removeClass("postad_error_show").addClass("postad_error");

				}
					
				/*business or cosumer validation*/
				var radio = $("input[name='optradio']").is(':checked');
				var element1 = $("#Consumer");
				var error_element1 = $("span", element1.parent());
				var type = $("input[name='optradio']:checked").val();
				if(radio == false){
					error_element1.removeClass("postad_error1").addClass("postad_error_show"); 
					return false;
				}
				else{
					error_element1.addClass("postad_error1").removeClass("postad_error_show");
				}
				

				if( type == 'b'){

						var allowedFiles = [".jpg", ".jpeg", ".png"];
			            var fileUpload = document.getElementById("bus_img");
			            var lblError = document.getElementById("lblError");
			            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
			            if (!regex.test(fileUpload.value.toLowerCase())) {
			                lblError.innerHTML = "Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.";
			                return false;
			            }
			            lblError.innerHTML = "";
			            $('#consumer_form').hide();
			            $('#business_form').show();
			            $('#type_ads').val(type);
			            return true;
				}
				else{
					$('#type_ads').val(type);
					$('#business_form').hide();
					$('#consumer_form').show();
				}
				 
			});

		/*deal form validation-- 2nd screen*/
		

		$("#deal_form").click(function(event){

			$('#deal_tag').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

		$('#deal_description').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

		$('#type').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

		$('#family_race').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

		$('#height').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

		$('#gender').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

		/*$('#sel1').on('select', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});*/



				var form_data=$("#postanad").serializeArray();
					// var error_free=true;
					// alert(form_data);
					var array = new Array('deal_tag', 'deal_description', 'family_race', 'type','sel1', 'height', 'gender');
					for (var i = 0; i < array.length; i++) {
						var element2=$("#"+array[i]);
					var valid1=element2.val();
					var error_element2=$("span", element2.parent());
						if (valid1 == ''){
							error_element2.removeClass("deal_error").addClass("deal_error_show"); 
							// error_free=false;
							return false;
						}
						else{
							error_element2.removeClass("deal_error_show").addClass("deal_error");
						}
					}
					



					/*for (var input in form_data){
					var element2=$("#"+form_data[input]['name']);
					// var valid1=element2.hasClass("valid");
					// alert(valid1);
					var valid1=element2.val();
					var error_element2=$("span", element2.parent());
					if (valid1 == ''){error_element2.removeClass("deal_error").addClass("deal_error_show"); error_free=false;}
					else{error_element2.removeClass("deal_error_show").addClass("deal_error");}
					}*/
					
				});


		/*contact screen*/

			$('#contact_screen').click(function(){
					var t1 = $('#type_ads').val();
					if(t1 == 'c'){

				$('#cnt_per_consu').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

				$('#mbl_no_cons').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

				$('#email_id_consu').on('input', function() {
					var input=$(this);
					var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
					var is_email=re.test(input.val());
					// var is_name=input.val();
					if(is_email){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});


					// 	var form_data=$("#postanad").serializeArray();
					// var error_free=true;

					var con_array = new Array('cnt_per_consu', 'mbl_no_cons', 'email_id_consu');
					for (var i = 0; i < con_array.length; i++) {
					
					var element2 = $('#'+con_array[i]);
					var valid1=element2.val();
						var error_element2=$("span", element2.parent());
							if (valid1 == ''){
								error_element2.removeClass("consum_error").addClass("consum_error_show"); 
								return false;
							}
							else{
								error_element2.removeClass("consum_error_show").addClass("consum_error");
							}
						}
					
						/*for (var input in form_data){
						var element2=$("#"+form_data[input]['name']);
						// var valid1=element2.hasClass("valid");
						var valid1=element2.val();
						var error_element2=$("span", element2.parent());
						if (valid1 == ''){error_element2.removeClass("consum_error").addClass("consum_error_show"); error_free=false;}
						else{error_element2.removeClass("consum_error_show").addClass("consum_error");}
						}*/
					}
					else{

			$('#bus_name').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

			$('#cnt_per_bus').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

			$('#mbl_no_bus').on('input', function() {
					var input=$(this);
					var is_name=input.val();
					if(is_name){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});

			$('#email_id_bus').on('input', function() {
					var input=$(this);
					var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
					var is_email=re.test(input.val());
					
					if(is_email){input.removeClass("invalid").addClass("valid");}
					else{input.removeClass("valid").addClass("invalid");}
				});


				var bus_array = new Array('bus_name', 'cnt_per_bus', 'mbl_no_bus', 'email_id_bus');
					for (var i = 0; i < bus_array.length; i++) {
					
					var element2 = $('#'+bus_array[i]);
					var valid1=element2.val();
						var error_element2=$("span", element2.parent());
							if (valid1 == ''){
								error_element2.removeClass("busi_error").addClass("busi_error_show");
								return false;
							}
							else{
								error_element2.removeClass("busi_error_show").addClass("busi_error");
							}
						}
						/*var form_data=$("#postanad").serializeArray();
						var error_free=true;
						for (var input in form_data){
						var element2=$("#"+form_data[input]['name']);
						// var valid1=element2.hasClass("valid");
						var valid1=element2.val();
						var error_element2=$("span", element2.parent());
						if (valid1 == ''){error_element2.removeClass("busi_error").addClass("busi_error_show"); error_free=false;}
						else{error_element2.removeClass("busi_error_show").addClass("busi_error");}
						}*/
				}
					//return false;

		});







		});
		</script>




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
		
		<script>
			$(document).ready(function(){
				$(".free_check").click(function(){
					 var ch = document.getElementById('free_check').checked;
					 if (ch) {
					 	$(".free_hide").show(1000);
					 }
					 else{
					 	$(".free_hide").hide(1000);
					 }
					

				});
			});
		</script>

		<script>
			$(document).ready(function(){
				$(".gold_check").click(function(){
					 var ch = document.getElementById('gold_check').checked;
					 if (ch) {
					$(".gold_hide").show(1000);
					 }
					 else{
					$(".gold_hide").hide(1000);					 	
					 }


				});
			});



		</script>
		
		<!-- use jssor.slider.debug.js instead for debug -->
		<script>
			jQuery(document).ready(function ($) {
				
				var jssor_1_options = {
				  $AutoPlay: true,
				  $Idle: 0,
				  $AutoPlaySteps: 4,
				  $SlideDuration: 1600,
				  $SlideEasing: $Jease$.$Linear,
				  $PauseOnHover: 4,
				  $SlideWidth: 80,
				  $Cols: 8
				};
				
				var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
				
				//responsive code begin
				//you can remove responsive code if you don't want the slider scales while window resizing
				function ScaleSlider() {
					var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
					if (refSize) {
						refSize = Math.min(refSize, 1124);
						jssor_1_slider.$ScaleWidth(refSize);
					}
					else {
						window.setTimeout(ScaleSlider, 50);
					}
				}
				ScaleSlider();
				$(window).bind("load", ScaleSlider);
				$(window).bind("resize", ScaleSlider);
				$(window).bind("orientationchange", ScaleSlider);
				//responsive code end
			});
		</script>

		