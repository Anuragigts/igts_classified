	<title>Right Deals :: PostaDeal</title>
	<link rel='stylesheet' type='text/css' href='imgupload/free.css' />
	<link rel='stylesheet' type='text/css' href='imgupload/freeurgent.css' />
	<link rel='stylesheet' type='text/css' href='imgupload/gold.css' />
	<link rel='stylesheet' type='text/css' href='imgupload/goldurgent.css' />
	<link rel='stylesheet' type='text/css' href='imgupload/platinum.css' />
	<!-- <link rel='stylesheet' type='text/css' href='imgupload/jquery.fancybox.min.css' /> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
	<script src="imgupload/imageupload.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
	<script type="text/javascript">
		/*packages selection */
		$(function(){
			$('.select_pack').change(function(){
				var ch = $('input[name="select_packge"]:checked').val();
				if(ch == 1){
					var fimg = $("#fimg_pck_count").val();
					$(".free_pck").css("display", 'block');
					$(".gold_pck").css("display", 'none');
					$(".platinum_pck").css("display", 'none');
					document.getElementById("package_type").value = '1';
					$(".freeurgent").attr('checked', false);	
					$(".platinumurgent").attr('checked', false);
					$(".goldurgent").attr('checked', false);
					document.getElementById("package_urgent").value = '0';
					document.getElementById("image_count").value = '0';
					document.getElementById("pck_img_limit").value = fimg;
				}
				if(ch == 2){
					var gimg = $("#gimg_pck_count").val();
					$(".free_pck").css("display", 'none');
					$(".gold_pck").css("display", 'block');
					$(".platinum_pck").css("display", 'none');
					document.getElementById("package_type").value = '2';
					$(".freeurgent").attr('checked', false);
					$(".goldurgent").attr('checked', false);	
					$(".platinumurgent").attr('checked', false);
					document.getElementById("package_urgent").value = '0';
					document.getElementById("image_count").value = '0';
					document.getElementById("pck_img_limit").value = gimg;
				}
				if(ch == 3){
					var pimg = $("#pimg_pck_count").val();
					$(".free_pck").css("display", 'none');
					$(".gold_pck").css("display", 'none');
					$(".platinum_pck").css("display", 'block');
					document.getElementById("package_type").value = '3';
					$(".freeurgent").attr('checked', false);
					$(".goldurgent").attr('checked', false);
					$(".platinumurgent").attr('checked', false);	
					document.getElementById("package_urgent").value = '0';
					document.getElementById("image_count").value = '0';			
					document.getElementById("pck_img_limit").value = pimg;	
				}
			});
		
			$(".select_urgent_pack").change(function(){
					var va = $(this).val();
					$("#package_urgent").val(va);
				
			});
		});
		
		$(function(){
			$(".multi-submit-btn").click(function(){
				var img_count = $("#image_count").val();
				var pck_type = parseInt($("#package_type").val());
				var pckimglimit = parseInt($("#pck_img_limit").val());
		
				/*free type image validation*/
				if(pck_type == 1){
				if (img_count == 0) {
					$(".free_img_error").css('display', 'block'); return false;
				}
				else if(pck_type == 1 && (img_count > pckimglimit)){
					$(".free_img_error").css('display', 'block'); return false;
				}
				else{
					$(".free_img_error").css('display', 'none'); return true;
				}
			}
		
		
			/*gold type image validation*/
			if(pck_type == 2){
				if (img_count == 0) {
					$(".gold_img_error").css('display', 'block'); return false;
				}
				else if(pck_type == 2 && img_count > pckimglimit){
					$(".gold_img_error").css('display', 'block'); return false;
				}
				else{
					$(".gold_img_error").css('display', 'none'); return true;
				}
			}
		
		
			/*platinum image validation*/
				if(pck_type == 3){
				if (img_count == 0) {
					$(".platinum_img_error").css('display', 'block'); return false;
				}
				else if(pck_type == 3 && img_count > pckimglimit){
					$(".platinum_img_error").css('display', 'block'); return false;
				}
				else{
					$(".platinum_img_error").css('display', 'none'); return true;
				}
			}
			});
		});
		
		/*accept number only*/
		function isNumber(evt) {
				evt = (evt) ? evt : window.event;
				var charCode = (evt.which) ? evt.which : evt.keyCode;
				if (charCode > 31 && (charCode < 48 || charCode > 57)) {
					return false;
				}
				return true;
			}
		
			$(function(){
				$('#del_img').click(function(){
					$("#file_input").val(""); 
					$("#file").val(""); 
					$('#file_remove').removeClass('error-view');
					$('span#file-error').hide();
					$('img#blah').css('display', 'none');
					 $('#blah').css('border', 'none')
					$('#blah').css('border-radius', 'none');
					$('#del_img').css('display', 'none');
				});
			});
		
			$(document).ready(function(){
			 $('#content').bind("cut copy paste",function(e) {
				 e.preventDefault();
			 });
		   });
	</script>
	<script type='text/javascript'>
		/* Free */
		
		jQuery(document).ready(function($) {
		
			// Shared callback handler for processing output
			var outputHandlerFunc = function(imgObj) {
		
				var sizeInKB = function(bytes) {return (typeof bytes == 'number') ? (bytes/1024).toFixed(2) + 'Kb' : bytes;};
		
				var getThumbnail = function(original, maxWidth, maxHeight, upscale) {
					var canvas = document.createElement("canvas"), width, height;
					if (original.width<maxWidth && original.height<maxHeight && upscale == undefined) {
						width = original.width;
						height = original.height;
					}
					else {
						width = maxWidth;
						height = parseInt(original.height*(maxWidth/original.width));
						if (height>maxHeight) {
							height = maxHeight;
							width = parseInt(original.width*(maxHeight/original.height));
						}
					}
					canvas.width = width;
					canvas.height = height;
					canvas.getContext("2d").drawImage(original, 0, 0, width, height);
					$(canvas).attr('title','Original size: ' + original.width + 'x' + original.height);
					return canvas;
				}
		
		
		
				$(new Image()).on('load', function(e) {
		console.log('imgobj',e)
					var $wrapper = $('<li class="new-item"><div class="list-content"><span class="preview"></span><span class="options"><span class="imagedelete" title="Remove image"></span></span></div></li>').appendTo('#output_free ul');
					$('.imagedelete',$wrapper).one('click',function(e) {
		
						var f_count = document.getElementById('image_count').value;
					document.getElementById('image_count').value = parseInt(f_count) - 1;
		
						$wrapper.toggleClass('new-item').addClass('removed-item');
						$wrapper.one('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function(e) {
							$wrapper.remove();
						});
					});
		
					var thumb = getThumbnail(e.target,50,50);
					var input = "<input type='hidden' name='pic_hide[]' id='pic_hide' value='"+imgObj.imgSrc+"'>";
					var $link = $('<a rel="fancybox">').attr({
						target:"_blank",
						href: imgObj.imgSrc
					}).append(thumb).append(input).appendTo($('.preview', $wrapper));
		
				}).attr('src',imgObj.imgSrc);
		
			}
		
			$("a[rel=fancybox]").fancybox();
		
			var fileReaderAvailable = (typeof FileReader !== "undefined");
			var clipBoardAvailable = (window.clipboardData !== false);
			var pasteAvailable = Boolean(clipBoardAvailable & fileReaderAvailable & !eval('/*@cc_on !@*/false'));
		
			if (fileReaderAvailable) {
		
				// Enable drop area upload
				$('#dropzone_free').imageUpload({
					errorContainer: $('span','#errormessages_free'),
					trigger: 'dblclick',
					enableCliboardCapture: pasteAvailable,
					onBeforeUpload: function() {$('body').css('background-color','green');console.log('start',Date.now());},
					onAfterUpload: function() {$('body').css('background-color','#eee');console.log('end',Date.now());},
					outputHandler:outputHandlerFunc
				})
		
				$('#dropzone_free').prev('#free_wrapper').find('#textbox_free').append('<p class="large">Drag and Drop<br>Image File here</p><p class="small">Doubleclick<br>for file requester</p>');
			}
			else {
				$('body').addClass('nofilereader');
			}
		
			if (!pasteAvailable) {
				$('body').addClass('nopaste');
			}
		
		});
		
	</script>
	<script type='text/javascript'>
		/* Free + urgent */
		
		jQuery(document).ready(function($) {
		
			// Shared callback handler for processing output
			var outputHandlerFunc = function(imgObj) {
		
				var sizeInKB = function(bytes) {return (typeof bytes == 'number') ? (bytes/1024).toFixed(2) + 'Kb' : bytes;};
		
				var getThumbnail = function(original, maxWidth, maxHeight, upscale) {
					var canvas = document.createElement("canvas"), width, height;
					if (original.width<maxWidth && original.height<maxHeight && upscale == undefined) {
						width = original.width;
						height = original.height;
					}
					else {
						width = maxWidth;
						height = parseInt(original.height*(maxWidth/original.width));
						if (height>maxHeight) {
							height = maxHeight;
							width = parseInt(original.width*(maxHeight/original.height));
						}
					}
					canvas.width = width;
					canvas.height = height;
					canvas.getContext("2d").drawImage(original, 0, 0, width, height);
					$(canvas).attr('title','Original size: ' + original.width + 'x' + original.height);
					return canvas;
				}
		
		
		
				$(new Image()).on('load', function(e) {
		console.log('imgobj',e)
					var $wrapper = $('<li class="new-item"><div class="list-content"><span class="preview"></span><span class="options"><span class="imagedelete" title="Remove image"></span></span></div></li>').appendTo('#output_free_urgent ul');
					$('.imagedelete',$wrapper).one('click',function(e) {
		
						var f_count = document.getElementById('image_count').value;
					document.getElementById('image_count').value = parseInt(f_count) - 1;
		
						$wrapper.toggleClass('new-item').addClass('removed-item');
						$wrapper.one('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function(e) {
							$wrapper.remove();
						});
					});
		
					var thumb = getThumbnail(e.target,50,50);
					var input = "<input type='hidden' name='pic_hide[]' id='pic_hide' value='"+imgObj.imgSrc+"'>";
					var $link = $('<a rel="fancybox">').attr({
						target:"_blank",
						href: imgObj.imgSrc
					}).append(thumb).append(input).appendTo($('.preview', $wrapper));
		
				}).attr('src',imgObj.imgSrc);
		
			}
		
			$("a[rel=fancybox]").fancybox();
		
			var fileReaderAvailable = (typeof FileReader !== "undefined");
			var clipBoardAvailable = (window.clipboardData !== false);
			var pasteAvailable = Boolean(clipBoardAvailable & fileReaderAvailable & !eval('/*@cc_on !@*/false'));
		
			if (fileReaderAvailable) {
		
				// Enable drop area upload
				$('#dropzone_free_urgent').imageUpload({
					errorContainer: $('span','#errormessages_free_urgent'),
					trigger: 'dblclick',
					enableCliboardCapture: pasteAvailable,
					onBeforeUpload: function() {$('body').css('background-color','green');console.log('start',Date.now());},
					onAfterUpload: function() {$('body').css('background-color','#eee');console.log('end',Date.now());},
					outputHandler:outputHandlerFunc
				})
		
				$('#dropzone_free_urgent').prev('#free_urgent_wrapper').find('#textbox_free_urgent').append('<p class="large">Drag and Drop<br>Image File here</p><p class="small">Doubleclick<br>for file requester</p>');
			}
			else {
				$('body').addClass('nofilereader');
			}
		
			if (!pasteAvailable) {
				$('body').addClass('nopaste');
			}
		
		});
		
	</script>
	<script type='text/javascript'>
		/* Gold */
		
		jQuery(document).ready(function($) {
		
			// Shared callback handler for processing output
			var outputHandlerFunc = function(imgObj) {
		
				var sizeInKB = function(bytes) {return (typeof bytes == 'number') ? (bytes/1024).toFixed(2) + 'Kb' : bytes;};
		
				var getThumbnail = function(original, maxWidth, maxHeight, upscale) {
					var canvas = document.createElement("canvas"), width, height;
					if (original.width<maxWidth && original.height<maxHeight && upscale == undefined) {
						width = original.width;
						height = original.height;
					}
					else {
						width = maxWidth;
						height = parseInt(original.height*(maxWidth/original.width));
						if (height>maxHeight) {
							height = maxHeight;
							width = parseInt(original.width*(maxHeight/original.height));
						}
					}
					canvas.width = width;
					canvas.height = height;
					canvas.getContext("2d").drawImage(original, 0, 0, width, height);
					$(canvas).attr('title','Original size: ' + original.width + 'x' + original.height);
					return canvas;
				}
		
		
		
				$(new Image()).on('load', function(e) {
		console.log('imgobj',e)
					var $wrapper = $('<li class="new-item"><div class="list-content"><span class="preview"></span><span class="options"><span class="imagedelete" title="Remove image"></span></span></div></li>').appendTo('#output_gold ul');
					$('.imagedelete',$wrapper).one('click',function(e) {
		
						var f_count = document.getElementById('image_count').value;
						document.getElementById('image_count').value = parseInt(f_count) - 1;
		
						$wrapper.toggleClass('new-item').addClass('removed-item');
						$wrapper.one('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function(e) {
							$wrapper.remove();
						});
					});
		
					var thumb = getThumbnail(e.target,50,50);
					var input = "<input type='hidden' name='pic_hide[]' id='pic_hide' value='"+imgObj.imgSrc+"'>";
					var $link = $('<a rel="fancybox">').attr({
						target:"_blank",
						href: imgObj.imgSrc
					}).append(thumb).append(input).appendTo($('.preview', $wrapper));
		
				}).attr('src',imgObj.imgSrc);
		
			}
		
			$("a[rel=fancybox]").fancybox();
		
			var fileReaderAvailable = (typeof FileReader !== "undefined");
			var clipBoardAvailable = (window.clipboardData !== false);
			var pasteAvailable = Boolean(clipBoardAvailable & fileReaderAvailable & !eval('/*@cc_on !@*/false'));
		
			if (fileReaderAvailable) {
		
				// Enable drop area upload
				$('#dropzone_gold').imageUpload({
					errorContainer: $('span','#errormessages_gold'),
					trigger: 'dblclick',
					enableCliboardCapture: pasteAvailable,
					onBeforeUpload: function() {$('body').css('background-color','green');console.log('start',Date.now());},
					onAfterUpload: function() {$('body').css('background-color','#eee');console.log('end',Date.now());},
					outputHandler:outputHandlerFunc
				})
		
				$('#dropzone_gold').prev('#gold_wrapper').find('#textbox_gold').append('<p class="large">Drag and Drop<br>Image File here</p><p class="small">Doubleclick<br>for file requester</p>');
			}
			else {
				$('body').addClass('nofilereader');
			}
		
			if (!pasteAvailable) {
				$('body').addClass('nopaste');
			}
		
		});
		
	</script>
	<script type='text/javascript'>
		/* Gold + urgent */
		
		jQuery(document).ready(function($) {
		
			// Shared callback handler for processing output
			var outputHandlerFunc = function(imgObj) {
		
				var sizeInKB = function(bytes) {return (typeof bytes == 'number') ? (bytes/1024).toFixed(2) + 'Kb' : bytes;};
		
				var getThumbnail = function(original, maxWidth, maxHeight, upscale) {
					var canvas = document.createElement("canvas"), width, height;
					if (original.width<maxWidth && original.height<maxHeight && upscale == undefined) {
						width = original.width;
						height = original.height;
					}
					else {
						width = maxWidth;
						height = parseInt(original.height*(maxWidth/original.width));
						if (height>maxHeight) {
							height = maxHeight;
							width = parseInt(original.width*(maxHeight/original.height));
						}
					}
					canvas.width = width;
					canvas.height = height;
					canvas.getContext("2d").drawImage(original, 0, 0, width, height);
					$(canvas).attr('title','Original size: ' + original.width + 'x' + original.height);
					return canvas;
				}
		
		
		
				$(new Image()).on('load', function(e) {
		console.log('imgobj',e)
					var $wrapper = $('<li class="new-item"><div class="list-content"><span class="preview"></span><span class="options"><span class="imagedelete" title="Remove image"></span></span></div></li>').appendTo('#output_gold_urgent ul');
					$('.imagedelete',$wrapper).one('click',function(e) {
		
						var f_count = document.getElementById('image_count').value;
					document.getElementById('image_count').value = parseInt(f_count) - 1;
		
						$wrapper.toggleClass('new-item').addClass('removed-item');
						$wrapper.one('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function(e) {
							$wrapper.remove();
						});
					});
		
					var thumb = getThumbnail(e.target,50,50);
					var input = "<input type='hidden' name='pic_hide[]' id='pic_hide' value='"+imgObj.imgSrc+"'>";
					var $link = $('<a rel="fancybox">').attr({
						target:"_blank",
						href: imgObj.imgSrc
					}).append(thumb).append(input).appendTo($('.preview', $wrapper));
		
				}).attr('src',imgObj.imgSrc);
		
			}
		
			$("a[rel=fancybox]").fancybox();
		
			var fileReaderAvailable = (typeof FileReader !== "undefined");
			var clipBoardAvailable = (window.clipboardData !== false);
			var pasteAvailable = Boolean(clipBoardAvailable & fileReaderAvailable & !eval('/*@cc_on !@*/false'));
		
			if (fileReaderAvailable) {
		
				// Enable drop area upload
				$('#dropzone_gold_urgent').imageUpload({
					errorContainer: $('span','#errormessages_gold_urgent'),
					trigger: 'dblclick',
					enableCliboardCapture: pasteAvailable,
					onBeforeUpload: function() {$('body').css('background-color','green');console.log('start',Date.now());},
					onAfterUpload: function() {$('body').css('background-color','#eee');console.log('end',Date.now());},
					outputHandler:outputHandlerFunc
				})
		
				$('#dropzone_gold_urgent').prev('#gold_urgent_wrapper').find('#textbox_gold_urgent').append('<p class="large">Drag and Drop<br>Image File here</p><p class="small">Doubleclick<br>for file requester</p>');
			}
			else {
				$('body').addClass('nofilereader');
			}
		
			if (!pasteAvailable) {
				$('body').addClass('nopaste');
			}
		
		});
		
	</script>
	
	<script type='text/javascript'>
		jQuery(document).ready(function($) {
		
			// Shared callback handler for processing output
			var outputHandlerFunc = function(imgObj) {
		
				var sizeInKB = function(bytes) {return (typeof bytes == 'number') ? (bytes/1024).toFixed(2) + 'Kb' : bytes;};
		
				var getThumbnail = function(original, maxWidth, maxHeight, upscale) {
					var canvas = document.createElement("canvas"), width, height;
					if (original.width<maxWidth && original.height<maxHeight && upscale == undefined) {
						width = original.width;
						height = original.height;
					}
					else {
						width = maxWidth;
						height = parseInt(original.height*(maxWidth/original.width));
						if (height>maxHeight) {
							height = maxHeight;
							width = parseInt(original.width*(maxHeight/original.height));
						}
					}
					canvas.width = width;
					canvas.height = height;
					canvas.getContext("2d").drawImage(original, 0, 0, width, height);
					$(canvas).attr('title','Original size: ' + original.width + 'x' + original.height);
					$(canvas).attr('name','file_img[]');
					return canvas;
				}
		
		
		
				$(new Image()).on('load', function(e) {
				console.log('imgobj',e)
					var $wrapper = $('<li class="new-item"><div class="list-content"><span class="preview"></span><span class="options"><span class="imagedelete" title="Remove image"></span></span></div></li>').appendTo('#output_platinum ul');
					$('.imagedelete',$wrapper).one('click',function(e) {
		
						var f_count = document.getElementById('image_count').value;
					document.getElementById('image_count').value = parseInt(f_count) - 1;
		
						$wrapper.toggleClass('new-item').addClass('removed-item');
						$wrapper.one('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function(e) {
							$wrapper.remove();
						});
					});
		
					var thumb = getThumbnail(e.target,50,50);
					var input = "<input type='hidden' name='pic_hide[]' id='pic_hide' value='"+imgObj.imgSrc+"'>";
					var $link = $('<a rel="fancybox">').attr({
						target:"_blank",
						href: imgObj.imgSrc
					}).append(thumb).append(input).appendTo($('.preview', $wrapper));
		
				}).attr('src',imgObj.imgSrc);
		
			}
		
			$("a[rel=fancybox]").fancybox();
		
			var fileReaderAvailable = (typeof FileReader !== "undefined");
			var clipBoardAvailable = (window.clipboardData !== false);
			var pasteAvailable = Boolean(clipBoardAvailable & fileReaderAvailable & !eval('/*@cc_on !@*/false'));
		
			if (fileReaderAvailable) {
		
				// Enable drop area upload
				$('#dropzone_platinum').imageUpload({
					errorContainer: $('span','#errormessages_platinum'),
					trigger: 'dblclick',
					enableCliboardCapture: pasteAvailable,
					onBeforeUpload: function() {$('body').css('background-color','green');console.log('start',Date.now());},
					onAfterUpload: function() {$('body').css('background-color','#eee');console.log('end',Date.now());},
					outputHandler:outputHandlerFunc
				})
		
				$('#dropzone_platinum').prev('#platinum_wrapper').find('#textbox_platinum').append('<p class="large">Drag and Drop<br>Image File here</p><p class="small">Doubleclick<br>for file requester</p>');
			}
			else {
				$('body').addClass('nofilereader');
			}
		
			if (!pasteAvailable) {
				$('body').addClass('nopaste');
			}
		
		});
		
	</script>
	<style>
		.section-title-01{
		height: 220px;
		background-color: #262626;
		text-align: center;
		position: relative;
		width: 100%;
		overflow: hidden;
		}
		ul#free,
		ul#free li {
		/* Setting a common base */
		margin: 0;
		padding: 0;
		}
		ul#free li {
		display: inline-block;
		vertical-align: top;
		margin-left: 10px;
		}
	</style>
	<link rel="stylesheet" href="j-folder/css/j-forms.css">
	<link rel="stylesheet" href="js/jquery.cleditor.css" />
	<script type="text/javascript">
		function getPosition(callback) {
		  var geocoder = new google.maps.Geocoder();
		  var postcode = document.getElementById("postalcode").value;
		
		  geocoder.geocode({'address': postcode}, function(results, status) 
		  {   
			if (status == google.maps.GeocoderStatus.OK) 
			{
			  callback({
				latt: results[0].geometry.location.lat(),
				lng: results[0].geometry.location.lng()
			  });
			}
		  });
		}
		
		function setup_map(latitude, longitude) { 
		  var _position = { lat: latitude, lng: longitude};
		  
		  var mapOptions = {
			zoom: 12,
			center: _position
		  }
		
		  var map = new google.maps.Map(document.getElementById('map'), mapOptions);
		
		  var marker = new google.maps.Marker({
			position: mapOptions.center,
			map: map
		  });
		}
		
		function address(latt, long1){
		$.ajax({ url:'http://maps.googleapis.com/maps/api/geocode/json?latlng='+latt+','+long1+'&sensor=true',
		success: function(data){
		$('#location').val(data.results[0].formatted_address);
		$('#lattitude').val(latt);
		$('#longtitude').val(long1);
		
		   /*or you could iterate the components for only the city and state*/
		}
		});
		}
		
		window.onload = function() {
		  setup_map(51.5073509, -0.12775829999998223);
		
		  document.getElementById("postalcode").onchange = function() {
			getPosition(function(position){
			  setup_map(position.latt, position.lng);
				address(position.latt, position.lng);
			});
		  }
		}
	</script>
	<!-- Section Title-->    
	<div class="section-title-01">
		<!-- Parallax Background -->
		<div class="bg_parallax image_02_parallax"></div>
		<!-- Parallax Background -->
	</div>
	<!-- End Section Title-->
	<section class="content-central">
		<!-- Shadow Semiboxed -->
		<div class="semiboxshadow text-center">
			<img src="img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
		</div>
		<!-- content info - Blog-->
		<div class="content_info">
			<div class="paddings-mini">
				<!-- content-->
				<div class="container">
					<div class="row">
						<div class="wrapper wrapper-640" style="padding-top: 0px;">
							<form action="<?php echo base_url(); ?>postad_create_services" method="post" class="j-forms j-multistep tooltip-hover" id="j-forms" enctype="multipart/form-data" novalidate>
								<div class="header">
									<a href="postad" class="pull-left post_ad_back"><i class="fa fa-mail-reply-all fa-3x"></i></a>
									<p>Post a Deal</p>
								</div>
								<!--end /.header-->
								<div class="content">
									<div class="top-head">
										<div class="j-row">
											<div class="col-sm-8 pad_bottm">
												<ul class="social-team pull-left">
													<li>
														<b><?php
														$cat11 = @mysql_result(mysql_query("SELECT category_name FROM catergory WHERE category_id = '$cat'"), 0, 'category_name');
														 echo ucfirst($cat11); ?></b>
														<input type='hidden' name='login_id' id='login_id' value="<?php echo @$login_id; ?>" />
														<input type='hidden' name='category_id' id='category_id' value="<?php echo @$cat; ?>" />
														<input type='hidden' name='sub_id' id='sub_id' value="<?php echo @$sub_id; ?>" />
														<input type='hidden' name='sub_sub_id' id='sub_sub_id' value="<?php echo @$sub_sub_id; ?>" />
														/
													</li>
													<li><b><?php echo ucfirst(@$sub_name); ?></b> /</li>
													<li><b><?php echo ucfirst(@$sub_sub_name); ?></b></li>
												</ul>
											</div>
											<div class="col-sm-4 pad_bottm">
												<ul class="social-team pull-left">
													<li><a href="" data-toggle="modal" data-target="#Services" ><b>Change Category</b></a></li>
												</ul>
											</div>
										</div>
									</div>
									<!-- start steps -->
									<div class="j-row">
										<div class="span4 step">
											<div class="steps">
												<span>Step 1:</span>
												<p>1st Screen</p>
											</div>
										</div>
										<div class="span4 step">
											<div class="steps">
												<span>Step 2:</span>
												<p>Packages</p>
											</div>
										</div>
										<div class="span4 step">
											<div class="steps">
												<span>Step 3:</span>
												<p>Terms & Conditions</p>
											</div>
										</div>
									</div>
									<!-- end steps -->
									<fieldset>
										<div class="divider gap-bottom-25"></div>
										<div class="post_deal_bor">
											<div class="j-row">
												<div class="span5 unit">
													<div class="unit check logic-block-radio">
														<div class="inline-group">
															<label class="radio">
															<input type="radio" name="checkbox_toggle" id="next-step-radio" class='bus_consumer' value="Yes">
															<i></i>Business 
															<sup data-toggle="tooltip" title="" data-original-title="Business">
															<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
															</sup>
															</label>
															<label class="radio">
															<input type="radio" name="checkbox_toggle" class='bus_consumer'  value="No">
															<i></i>Consumer 
															<sup data-toggle="tooltip" title="" data-original-title="Consumer">
															<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
															</sup>
															</label>
														</div>
													</div>
												</div>
											</div>
											<!-- start Postal Code -->
											<div class="j-row">
												<div class="span6 unit">
													<label class="label">Postal Code 
													<sup data-toggle="tooltip" title="" data-original-title="Postal Code">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
													</label>
													<div class="input">
														<label class="icon-right" for="email">
														<i class="fa fa-bookmark-o"></i>
														</label>
														<input type="text" id="postalcode" name="postalcode" >
													</div>
												</div>
												<div class="span6 unit">
													<label class="label">Location 
													<sup data-toggle="tooltip" title="" data-original-title="Location">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
													</label>
													<div class="input">
														<label class="icon-right" for="phone">
														<i class="fa fa-building-o"></i>
														</label>
														<input id="location" name='location' readonly type="text" placeholder="Type in an address" size="90" />
														<input id="lattitude" name='lattitude' readonly type="hidden"  size="90" />
														<input id="longtitude" name='longtitude' readonly type="hidden"  size="90" />
													</div>
												</div>
											</div>
											<!-- end  Area -->
											<div class="j-row">
												<div class="span2 unit">
												</div>
												<div class="span8 unit">
													<div id="map"></div>
												</div>
												<div class="span2 unit">
												</div>
											</div>
										</div>
										<div class="post_deal_bor top_10" id='bus_logo' style='display:none;margin-top: 20px;'>
											<div class="j-row"  >
												<div class="span6 unit">
													<label class="label">Business Logo 
													<sup data-toggle="tooltip" title="" data-original-title="Business Logo ">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
													</label>
													<div class="unit">
														<label id='file_remove' class="input append-big-btn">
															<div class="file-button">
																Browse
																<input type="file" name="file" id='file' onchange="document.getElementById('file_input').value = this.value; fileupload(this);">
															</div>
															<input type="text" id="file_input" readonly="" placeholder="no file selected">
															<span class="hint">Only: jpg / png  Size: less 1 Mb</span>
														</label>
													</div>
												</div>
												<div class="span4 unit" class='img_hide'>
													<img id="blah" src="#" alt=''/>
												</div>
												<div class="span2 unit" class='del_img'>
													<a href='javascript:void(0);' id="del_img" style='display:none;'>
													<img src="<?php echo base_url(); ?>pictures/delete.png" alt='delete' title="Delete"/></a>
												</div>
											</div>
										</div>
										<!-- end Business Logo -->
										<div class="post_deal_bor top_10" style='margin-top: 20px;'>
											<div class="j-row">
												<div class="span12 unit">
													<div class="unit check logic-block-radio">
														<div class="inline-group">
															<label class="radio">
															<input type="radio" name="checkbox_services" id="next-step-radio" value="service_provider">
															<i></i>Service Provider
															<sup data-toggle="tooltip" title="" data-original-title="Service Provider">
															<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
															</sup>
															</label>
															<label class="radio">
															<input type="radio" name="checkbox_services"  value="service_needed">
															<i></i>Service needed
															<sup data-toggle="tooltip" title="" data-original-title="Service needed">
															<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
															</sup>
															</label>
														</div>
													</div>
												</div>
											</div>
											<div class="j-row">
												<div class="span6 unit">
													<!-- start Deal Tag -->
													<label class="label">Deal Tag / Caption 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Tag / Caption">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
													</label>
													<div class="input">
														<label class="icon-right" for="dealtag">
														<img src="<?php echo base_url(); ?>j-folder/img/dealtag.png" alt="dealtag" title="Dealtag">
														</label>
														<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
													</div>
												</div>
												<!-- end Deal Tag -->
												<div class="span6 unit">
													<!-- start Deal Tag -->
													<label class="label">Type of Service 
													<sup data-toggle="tooltip" title="" data-original-title="Type of Service">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
													</label>
													<div class="input">
														<label class="icon-right" for="dealtag">
														<img src="<?php echo base_url(); ?>j-folder/img/type.png" alt="type" title="Type">
														</label>
														<input type="text" id="typeservice" name="typeservice" placeholder="Type of Service">
													</div>
												</div>
											</div>
											<div class="j-row">
												<div class="span12 unit">
													<label class="label">Deal Description 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Description ">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
													</label>
													<div class="input">
														<textarea type="text" id="dealdescription" name="dealdescription" cols="40" placeholder="Enter Deal Description"></textarea>
														<input type='hidden' name='text_hide' id='text_hide' value='' />
													</div>
												</div>
											</div>
											<div class="j-row">
												<div class="span6 unit">
													<label class="label">Price 
													<sup data-toggle="tooltip" title="" data-original-title="Price">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
													</label>
													<div class="unit check logic-block-radio">
														<div class="inline-group">
															<label class="radio">
															<input type="radio" name="checkbox_toggle1" id="next-step-radio" class='currency' value="pound">
															<i></i> £ (Pound) 
															</label>
															<label class="radio">
															<input type="radio" name="checkbox_toggle1" class='currency'  value="euro">
															<i></i> € (Euro)
															</label>
														</div>
													</div>
												</div>
												<div class="span6 unit">
													<div class="j-row">
														<div class="span6 unit top_20">
															<div class="input">
																<label class="icon-right" for="price">
																<img src="<?php echo base_url(); ?>j-folder/img/price.png" alt="price" title="Price">
																</label>
																<input type="text" id="priceamount" name="priceamount" placeholder="Enter Amount" onkeypress="return isNumber(event)">
															</div>
														</div>
														<div class="span6 unit">
															<label class="label">Price Type 
															<sup data-toggle="tooltip" title="" data-original-title="Price Type ">
															<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
															</sup>
															</label>
															<label class="input select">
																<select name="price_type">
																	<option value="none" selected disabled="">Select type</option>
																	<option value="Negotiable">Negotiable</option>
																	<option value="Fixed">Fixed</option>
																</select>
																<i></i>
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset>
										<div class="divider gap-bottom-25"></div>
										<!-- start name -->
										<!-- SERVICES, JOBS, PROPERTY, MOTOR POINTS -->
										
										<div class="j-row">
											<?php foreach ($free_pkg_list as $pack_val) {
													$free_duration = $pack_val->dur_days;
													$freepck_img = $pack_val->img_count;
													$free_bump_home = $pack_val->bump_home;
													$free_bump_search = $pack_val->bump_search;
													$c_euro = $pack_val->cost_euro;
													$c_pund = $pack_val->cost_pound;
													$free_likes = $pack_val->likes_count;
												}
												foreach ($gold_pkg_list as $pack_val) {
													$gold_duration = $pack_val->dur_days;
													$goldpck_img = $pack_val->img_count;
													$gold_bump_home = $pack_val->bump_home;
													$gold_bump_search = $pack_val->bump_search;
													$gc_euro = $pack_val->cost_euro;
													$gc_pund = $pack_val->cost_pound;
													$gold_likes = $pack_val->likes_count;
												}
												foreach ($ptm_pkg_list as $pack_val) {
													$ptm_duration = $pack_val->dur_days;
													$ptmpck_img = $pack_val->img_count;
													$ptm_bump_home = $pack_val->bump_home;
													$ptm_bump_search = $pack_val->bump_search;
													$ptm_euro = $pack_val->cost_euro;
													$ptm_pound = $pack_val->cost_pound;
												}
												/*urgent lable list*/
												foreach ($urgentlabel1 as $pack_val) {
													$u_pkg_days1 = $pack_val->u_pkg_days;
													$u_pkg_euro_cost1 = $pack_val->u_pkg_euro_cost;
													$u_pkg_pound_cost1 = $pack_val->u_pkg__pound_cost;
												}
												foreach ($urgentlabel2 as $pack_val) {
													$u_pkg_days2 = $pack_val->u_pkg_days;
													$u_pkg_euro_cost2 = $pack_val->u_pkg_euro_cost;
													$u_pkg_pound_cost2 = $pack_val->u_pkg__pound_cost;
												}
												foreach ($urgentlabel3 as $pack_val) {
													$u_pkg_days3 = $pack_val->u_pkg_days;
													$u_pkg_euro_cost3 = $pack_val->u_pkg_euro_cost;
													$u_pkg_pound_cost3 = $pack_val->u_pkg__pound_cost;
												}
												 ?>
											<div class="span4">
												<!-- promotion-box-->
												<div class="promotion-box">
													<div class="promotion-box-center color-2">
														<div class="prince">
															Free
														</div>
													</div>
													<!-- End promotion-box-center X-->
													<!-- promotion-box-info-->
													<div class="promotion-box-info">
														<ul class="list-styles">
															<li><i class="fa fa-check"></i> Validity : <?php echo $free_duration; ?> days</li>
															<li><i class="fa fa-check"></i> Up to <?php echo $freepck_img; ?> Images</li>
															<li><i class="fa fa-check"></i>Initially displayed in recent ads on Homepage <a href="img/free.png" class="fancybox"><strong>Example</strong></a></li>
															<li><i class="fa fa-check"></i>Deal will be HOT Deal with <?php echo $free_likes; ?> Likes </li>
															<li class="text_center"> <br> </li>
															<li class="text_center"><br></li>
															<li class="text_center"> <br></li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<div class="free_bg text_center free_pound" style="display:none;">
																<h3 class="price_amt">£<?php echo $c_pund; ?></h3>
															</div>
															<div class="free_bg text_center free_euro" style="display:none;">
																<h3 class="price_amt">€<?php echo $c_euro; ?></h3>
															</div>
														</ul>
														<div class="hot_deal_rad check">
															<label class="radio">
															<input type="radio" id='free_pck' name="select_packge" class='select_pack' value="1" data-price="5">
															<i></i>
															Select Free 
															</label>
															<input type = 'hidden' name='fimg_pck_count' id='fimg_pck_count' value ="<?php echo $freepck_img; ?>">
														</div>
													</div>
													<!-- End promotion-box-info-->
												</div>
												<!-- End promotion-box-->
											</div>
											<div class="span4">
												<!-- promotion-box-->
												<div class="promotion-box">
													<div class="promotion-box-center color-1">
														<div class="prince">
															Gold
														</div>
													</div>
													<!-- End promotion-box-center-->
													<!-- promotion-box-info-->
													<div class="promotion-box-info">
														<ul class="list-styles">
															<li><i class="fa fa-check"></i> Validity : <?php echo $gold_duration; ?> days</li>
															<li><i class="fa fa-check"></i> Up to <?php echo $goldpck_img; ?> Images</li>
															<li><i class="fa fa-check"></i> Bump up to <?php echo $gold_bump_search; ?>days in result</li>
															<li><i class="fa fa-check"></i> Deal will Highlight in search result</li>
															<li><i class="fa fa-check"></i> Displayed at Most valued deals on Home Page <a href="img/gold.png" class="fancybox"><strong>Example</strong></a></li>
															<li><i class="fa fa-check"></i> Deal will be HOT Deals with <?php echo $gold_likes; ?> Likes</li>
															<li><i class="fa fa-check"></i> Thumps Up  Symbol will attach</li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<div class="gold_bg text_center free_pound" style="display:none;">
																<h3 class="price_amt">£<?php echo $gc_pund; ?></h3>
															</div>
															<div class="gold_bg text_center free_euro" style="display:none;">
																<h3 class="price_amt">€<?php echo $gc_euro; ?></h3>
															</div>
														</ul>
														<div class="hot_deal_rad check">
															<label class="radio">
															<input type="radio" id='gold_pck' name="select_packge" class='select_pack' value="2" data-price="5">
															<i></i>
															Select Gold 
															</label>
															<input type = 'hidden' name='gimg_pck_count' id='gimg_pck_count' value ="<?php echo $goldpck_img; ?>">
														</div>
													</div>
													<!-- End promotion-box-info-->
												</div>
												<!-- End promotion-box-->
											</div>
											<div class="span4">
												<!-- promotion-box-->
												<div class="promotion-box">
													<div class="promotion-box-center color-3">
														<div class="prince">
															Platinum
														</div>
													</div>
													<!-- End promotion-box-center-->
													<!-- promotion-box-info-->
													<div class="promotion-box-info">
														<ul class="list-styles">
															<li><i class="fa fa-check"></i> Validity : <?php echo $ptm_duration; ?> days</li>
															<li><i class="fa fa-check"></i> Up to <?php echo $ptmpck_img; ?> Images</li>
															<li><i class="fa fa-check"></i> Bump up to <?php echo $ptm_bump_search; ?>days in result</li>
															<li><i class="fa fa-check"></i> Ad will display on Homepage Significant Ads for <?php echo $ptm_bump_home; ?> days<a href="img/platinum.png" class="fancybox"><strong>Example</strong></a></li>
															<li><i class="fa fa-check"></i> Image will be display as Slide by Slide in Result</li>
															<li><i class="fa fa-check"></i> Youtube Video can provide </li>
															<li><i class="fa fa-check"></i> Title displayed in Hot deals Marquee <a href="img/marqueimg.png" class="fancybox"> <strong>Example</strong></a></li>
															<li><i class="fa fa-check"></i> Crown symbol will attach  </li>
															<li><i class="fa fa-check"></i> Deal will automatically in HOT Deals</li>
															<div class="platinum_bg text_center free_pound" style="display:none;">
																<h3 class="price_amt">£<?php echo $ptm_pound; ?></h3>
															</div>
															<div class="platinum_bg text_center free_euro" style="display:none;">
																<h3 class="price_amt">€<?php echo $ptm_euro; ?></h3>
															</div>
														</ul>
														<div class="hot_deal_rad check">
															<label class="radio">
															<input type="radio" id='platinum_pck' name="select_packge" class='select_pack' value="3" data-price="5">
															<i></i>
															Select Platinum 
															</label>
															<input type = 'hidden' name='pimg_pck_count' id='pimg_pck_count' value ="<?php echo $ptmpck_img; ?>">
														</div>
													</div>
													<!-- End promotion-box-info-->
												</div>
												<!-- End promotion-box-->
											</div>
										</div>
										<div class="divider_space"></div>
										<div class="alert alert-danger pack_error" style='display:none;' >
											<strong>Error!</strong> Please select one package
										</div>
										<div class="divider_space"></div>
										<!--Consumer to Consumer Start-->
										<div class="j-row">
											<div class="span12">
												<!-- promotion-box-->
												<div class="promotion-box">
													<div class="promotion-box-center color-2">
														<div class="prince">
															URGENT LABLE 
														</div>
													</div>
													<!-- End promotion-box-center-->
													<div class="j-row">
														<div class="span4 bor_right">
															<!-- promotion-box-info-->
															<div class="promotion-box-info free_pound" style="display:none;">
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i> £ <?php echo $u_pkg_pound_cost1 ?> - <?php echo $u_pkg_days1 ?> Days (Exclusive VAT)</li>
																	<div class="free_bg text_center " >
																		<h3 class="price_amt">£ <?php echo $u_pkg_pound_cost1 ?> </h3>
																	</div>
																</ul>
																<div class="hot_deal_rad">
																	<label class="radio">
																	<input type="radio" id='freeurgent' name="select_urgent" class='select_urgent_pack freeurgent' value="1"  data-price="5">
																	<i></i>
																	Urgent
																	</label>
																</div>
															</div>
															<div class="promotion-box-info free_euro" style="display:none;">
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i> €<?php echo $u_pkg_euro_cost1 ?>-<?php echo $u_pkg_days1 ?>Days (Exclusive VAT)</li>
																	<div class="free_bg text_center " >
																		<h3 class="price_amt">€<?php echo $u_pkg_euro_cost1 ?></h3>
																	</div>
																</ul>
																<div class="hot_deal_rad">
																	<label class="radio">
																	<input type="radio" id='freeurgent' name="select_urgent" class='select_urgent_pack freeurgent' value="1"  data-price="5">
																	<i></i>
																	Urgent
																	</label>
																</div>
															</div>
														</div>
														<div class="span4 bor_right">
															<!-- promotion-box-info-->
															<div class="promotion-box-info free_pound" style="display:none;">
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i> £<?php echo $u_pkg_pound_cost2 ?> -<?php echo $u_pkg_days2; ?> days (Exclusive VAT)</li>
																	<div class="free_bg text_center " >
																		<h3 class="price_amt">£<?php echo $u_pkg_pound_cost2 ?></h3>
																	</div>
																</ul>
																<div class="hot_deal_rad">
																	<label class="radio">
																	<input type="radio" id='goldurgent' name="select_urgent" class='select_urgent_pack goldurgent' value="2"  data-price="5">
																	<i></i>
																	Urgent 
																	</label>
																</div>
															</div>
															<div class="promotion-box-info free_euro" style="display:none;">
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i> €<?php echo $u_pkg_euro_cost2 ?> -<?php echo $u_pkg_days2; ?> days (Exclusive VAT)</li>
																	<div class="free_bg text_center " >
																		<h3 class="price_amt">€<?php echo $u_pkg_euro_cost2 ?></h3>
																	</div>
																</ul>
																<div class="hot_deal_rad">
																	<label class="radio">
																	<input type="radio" id='goldurgent' name="select_urgent" class='select_urgent_pack goldurgent' value="2"  data-price="5">
																	<i></i>
																	Urgent 
																	</label>
																</div>
															</div>
														</div>
														<div class="span4">
															<!-- promotion-box-info-->
															<div class="promotion-box-info free_pound" style="display:none;">
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i> £<?php echo $u_pkg_pound_cost3 ?>-<?php echo $u_pkg_days3; ?> Days(Exclusive VAT)</li>
																	<div class="free_bg text_center " >
																		<h3 class="price_amt">£<?php echo $u_pkg_pound_cost3; ?></h3>
																	</div>
																</ul>
																<div class="hot_deal_rad">
																	<label class="radio">
																	<input type="radio" id='platinumurgent' name="select_urgent" class='select_urgent_pack platinumurgent' value="3"  data-price="5">
																	<i></i>
																	Urgent
																	</label>
																</div>
															</div>
															<div class="promotion-box-info free_euro" style="display:none;">
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i>€<?php echo $u_pkg_euro_cost3 ?>-<?php echo $u_pkg_days3; ?> Days(Exclusive VAT)</li>
																	<div class="free_bg text_center " >
																		<h3 class="price_amt">€<?php echo $u_pkg_euro_cost3 ?></h3>
																	</div>
																</ul>
																<div class="hot_deal_rad">
																	<label class="radio">
																	<input type="radio" id='platinumurgent' name="select_urgent" class='select_urgent_pack platinumurgent' value="3"  data-price="5">
																	<i></i>
																	Urgent
																	</label>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- End promotion-box-->
											</div>
										</div>
										
										<!-- Consumer to Consumer End-->
										<div class="divider_space"></div>
										<!-- Consumer to Consumer End-->
									</fieldset>
									<fieldset>
										<div class="divider gap-bottom-25"></div>
										<!-- free__pck Start -->
										<div class="j-row free_pck" style='display: none;'>
											<div class="alert alert-danger free_img_error" style='display:none;' >
												<strong>Error!</strong> Please upload upto <?php echo $freepck_img; ?> images only
											</div>
											<div class="span4 unit">
												<div style="width:240px;">
													<div id="dropzone-wrapper">
														<div id="free_wrapper">
															<div id=textbox_free></div>
														</div>
														<div id="dropzone_free"></div>
													</div>
													<div id="errormessages_free"><span style="display: none;"></span></div>
													<div id="overlay_free"></div>
												</div>
											</div>
											<div class="span8 unit">
												<div class="j-row">
													<div class="span12">
														<div>
															<h3>Upload Images ( <?php echo $freepck_img; ?> images ) :</h3>
															<div id="output_free">
																<ul id="free"></ul>
															</div>
														</div>
														<div style="clear:both;"></div>
													</div>
												</div>
											</div>
										</div>
										<!-- free_pck End -->
										<!-- free_urgent_pck Start -->
										<div class="j-row free_urgent_pck" style='display: none;'>
											<div class="alert alert-danger freeurgent_img_error" style='display:none;' >
												<strong>Error!</strong> Please upload upto 9 images only
											</div>
											<div class="span4 unit">
												<div style="width:240px;">
													<div id="dropzone-wrapper">
														<div id="free_urgent_wrapper">
															<div id=textbox_free_urgent></div>
														</div>
														<div id="dropzone_free_urgent"></div>
													</div>
													<div id="errormessages_free_urgent"><span style="display: none;"></span></div>
													<div id="overlay_free_urgent"></div>
												</div>
											</div>
											<div class="span8 unit">
												<div class="j-row">
													<div class="span12">
														<div>
															<h3>Upload Images ( 9 images ) :</h3>
															<div id="output_free_urgent">
																<ul id="free"></ul>
															</div>
														</div>
														<div style="clear:both;"></div>
													</div>
												</div>
											</div>
											<div class="span12 unit">
												<label class="label">Website Link 
												<sup data-toggle="tooltip" title="" data-original-title="Website Link">
												<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
												</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Video">
													<i class="fa fa-briefcase"></i>
													</label>
													<input type="text" id="freeurgent_weblink" name="freeurgent_weblink" placeholder="">
												</div>
											</div>
										</div>
										<!-- free_urgent_pck End -->
										<!-- Gold package Start -->
										<div class="j-row gold_pck" style='display: none;'>
											<div class="alert alert-danger gold_img_error" style='display:none;' >
												<strong>Error!</strong> Please upload upto <?php echo $goldpck_img; ?> images only
											</div>
											<div class="span4 unit">
												<div style="width:240px;">
													<div id="dropzone-wrapper">
														<div id="gold_wrapper">
															<div id=textbox_gold></div>
														</div>
														<div id="dropzone_gold"></div>
													</div>
													<div id="errormessages_gold"><span style="display: none;"></span></div>
													<div id="overlay_gold"></div>
												</div>
											</div>
											<div class="span8 unit">
												<div class="j-row">
													<div class="span12">
														<div>
															<h3>Upload Images ( <?php echo $goldpck_img; ?> images ) :</h3>
															<div id="output_gold">
																<ul id="free"></ul>
															</div>
														</div>
														<div style="clear:both;"></div>
													</div>
												</div>
											</div>
											<div class="span12 unit">
												<label class="label">Website Link 
												<sup data-toggle="tooltip" title="" data-original-title="Website Link">
												<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
												</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Video">
													<i class="fa fa-briefcase"></i>
													</label>
													<input type="text" id="gold_weblink" name="gold_weblink" placeholder="">
												</div>
											</div>
										</div>
										<!--Gold package End -->
										<!-- gold_urgent_pck Start -->
										<div class="j-row gold_urgent_pck" style='display: none;'>
											<div class="alert alert-danger goldurgent_img_error" style='display:none;' >
												<strong>Error!</strong> Please upload upto 12 images only
											</div>
											<div class="span4 unit">
												<div style="width:240px;">
													<div id="dropzone-wrapper">
														<div id="gold_urgent_wrapper">
															<div id=textbox_gold_urgent></div>
														</div>
														<div id="dropzone_gold_urgent"></div>
													</div>
													<div id="errormessages_gold_urgent"><span style="display: none;"></span></div>
													<div id="overlay_gold_urgent"></div>
												</div>
											</div>
											<div class="span8 unit">
												<div class="j-row">
													<div class="span12">
														<div>
															<h3>Upload Images ( 12 images ) :</h3>
															<div id="output_gold_urgent">
																<ul id="free"></ul>
															</div>
														</div>
														<div style="clear:both;"></div>
													</div>
												</div>
											</div>
											<div class="span12 unit">
												<label class="label">Website Link 
												<sup data-toggle="tooltip" title="" data-original-title="Website Link">
												<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
												</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Video">
													<i class="fa fa-briefcase"></i>
													</label>
													<input type="text" id="goldurgent_weblink" name="goldurgent_weblink" placeholder="">
												</div>
											</div>
										</div>
										<!-- gold_urgent_pck End -->	
										<!-- platinum package Start -->
										<div class="j-row platinum_pck" style='display: none;'>
											<div class="alert alert-danger platinum_img_error" style='display:none'; >
												<strong>Error!</strong> Please upload upto <?php echo $ptmpck_img; ?> images only
											</div>
											<div class="span4 unit">
												<div style="width:240px;">
													<div id="dropzone-wrapper">
														<div id="platinum_wrapper">
															<div id=textbox_platinum></div>
														</div>
														<div id="dropzone_platinum"></div>
													</div>
													<div id="errormessages_platinum"><span style="display: none;"></span></div>
													<div id="overlay_platinum"></div>
												</div>
											</div>
											<div class="span8 unit">
												<div class="j-row">
													<div class="span12">
														<div>
															<h3>Upload Images ( <?php echo $ptmpck_img; ?> images ) :</h3>
															<div id="output_platinum">
																<ul id="free"></ul>
															</div>
														</div>
														<div style="clear:both;"></div>
													</div>
												</div>
											</div>
											
											<div class="span12 unit">
												<label class="label">YouTube Video Link
													<sup data-toggle="tooltip" title="" data-original-title="YouTube Video Link">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Video">
													<i class="fa fa-video-camera"></i>
													</label>
													<input type="text" id="file_video_platinum" name="file_video_platinum" placeholder="Enter YouTube Video Link">
												</div>
											</div>
											
											<div class="span12 unit">
												<label class="label">Website Link 
												<sup data-toggle="tooltip" title="" data-original-title="Website Link">
												<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
												</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Video">
														<i class="fa fa-external-link"></i>
													</label>
													<input type="text" id="platinum_weblink" name="platinum_weblink" placeholder="">
												</div>
											</div>
											<div class="span12 unit">
												<label class="label">Marquee Title 
												<sup data-toggle="tooltip" title="" data-original-title="Marquee Title">
												<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
												</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Video">
													<i class="fa fa-briefcase"></i>
													</label>
													<input type="text" id="marquee_title" name="marquee_title" placeholder="">
												</div>
											</div>
										</div>
										<!-- platinum package End -->
										<!-- Contact Information -->
										<div class="j-row">
											<div class="span12 unit">
												<input type='hidden' id='package_type' name='package_type' value='' />
												<input type='hidden' id='package_urgent' name='package_urgent' value='' />
												<input type='hidden' id='package_name' name='package_name' value='<?php echo @$package_name; ?>' />
												<input type='hidden' id='image_count' name='image_count' value='0' />
												<input type='hidden' id='pck_img_limit' name='pck_img_limit' value='0' />
												<b>Contact Information</b>
											</div>
										</div>
										<div class="j-row">
											<div class="span12" id='business_form'>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Business Name 
														<sup data-toggle="tooltip" title="" data-original-title="Business Name">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="busname">
															<i class="fa fa-briefcase"></i>
															</label>
															<input type="text" id="busname" name="busname" placeholder="Enter  Name ">
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Contact Person Name 
														<sup data-toggle="tooltip" title="" data-original-title="Contact Person Name ">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="buscontname">
															<i class="fa fa-user"></i>
															</label>
															<input type="text" id="buscontname" name="buscontname" placeholder="Enter Contact Person Name ">
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Mobile Number 
														<sup data-toggle="tooltip" title="" data-original-title="Mobile Number">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="bussmblno">
															<i class="fa fa-phone"></i>
															</label>
															<input type="text" id="bussmblno" name="bussmblno" placeholder="Enter Your Mobile Number ">
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Email 
														<sup data-toggle="tooltip" title="" data-original-title="Email">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="busemail">
															<i class="fa fa-envelope-o"></i>
															</label>
															<input type="email" id="busemail" name="busemail" placeholder="Enter Your Email">
														</div>
													</div>
												</div>
											</div>
											<div class="span12" id='consumer_form'>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Contact Name 
														<sup data-toggle="tooltip" title="" data-original-title="Contact Name">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="conscontname">
															<i class="fa fa-user"></i>
															</label>
															<input type="text" id="conscontname" name="conscontname" placeholder="Enter Contact Person Name ">
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Mobile Number 
														<sup data-toggle="tooltip" title="" data-original-title="Mobile Number ">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="conssmblno">
															<i class="fa fa-phone"></i>
															</label>
															<input type="text" id="conssmblno" name="conssmblno" placeholder="Enter Your Mobile Number ">
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Email 
														<sup data-toggle="tooltip" title="" data-original-title="Email">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="consemail">
															<i class="fa fa-envelope-o"></i>
															</label>
															<input type="email" id="consemail" name="consemail" placeholder="Enter Your Email">
														</div>
													</div>
												</div>
											</div>
											<div class="span6">
												<div class="unit">
													<label class="label">Terms & Conditions 
													<sup data-toggle="tooltip" title="" data-original-title="Terms & Conditions">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
													</label>
													<label class="checkbox">
													<input type="checkbox" id='terms_condition' name="terms_condition" value="terms_condition" checked onclick="return false">
													<i></i>
													I accept Terms & Conditions 
													</label>
												</div>
												<div class="alert alert-danger terms_error" style='display:none'; >
													<strong>Error!</strong> Please accept terms & condtions
												</div>
											</div>
										</div>
										<!-- end name -->
										<!-- start response from server -->
										<div id="response"></div>
										<!-- end response from server -->
									</fieldset>
								</div>
								<!-- end /.content -->
								<div class="footer text_center">
									<input type="submit" class="primary-btn multi-submit-btn video_validate" name='post_create_ad' Value="Post Deal">
									<button type="button" class="primary-btn multi-next-btn" >Next</button>
									<button type="button" class="secondary-btn multi-prev-btn">Back</button>
								</div>
								<!-- end /.footer -->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="js/jquery.js"></script> 
	<script src="j-folder/js/jquery.maskedinput.min.js"></script>
	<script src="j-folder/js/jquery.validate.min.js"></script>
	<script src="j-folder/js/additional-methods.min.js"></script>
	<script src="j-folder/js/jquery.form.min.js"></script>
	<script src="j-folder/js/j-forms.min.js"></script>
	<script src="js/jquery.cleditor.min.js"></script>
	<script src="js/jquery.cleditor.js"></script>
	<script>
		$(document).ready(function () { 
		$("#dealdescription").cleditor({ controls: "bold italic underline | bullets numbering | font size style | color highlight" })[0].focus(); 
		});
	</script>
	<!-- Modal -->
	<form method='post' action="<?php echo base_url(); ?>postad_create_services" id='edit_service_cat'>
		<div class="modal fade" id="Services" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2>Services <span>Category </span></h2>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12 post_deal_bor">
								<div class="row">
									<div class="col-md-6 clearfix">
										<h3>Professional
											<input type='hidden' name='services_cat' id='services_cat' value='2' />
											<input type='hidden' name='services_sub' id='services_sub' value='' />
											<input type='hidden' name='services_sub_sub' id='services_sub_sub' value='' />
										</h3>
										<?php foreach ($services_sub_prof as $serv_prof) { ?>
										<h4><a href="javascript:void(0)" id="<?php echo  $serv_prof['sub_category_id'].','.$serv_prof['sub_subcategory_id']; ?>" class='edit_service_prof'><?php echo ucfirst($serv_prof['sub_subcategory_name']); ?></a></h4>
										<?php	} ?>
									</div>
									<div class="col-md-6 clearfix">
										<h3>Popular</h3>
										<?php foreach ($services_sub_pop as $serv_pop) { ?>
										<h4><a href="javascript:void(0)" id="<?php echo  $serv_pop['sub_category_id'].','.$serv_pop['sub_subcategory_id']; ?>" class='edit_service_pop'><?php echo ucfirst($serv_pop['sub_subcategory_name']); ?></a></h4>
										<?php	} ?>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- Services content End-->