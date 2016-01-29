	<title>365 Deals :: PostaDeal</title>
	<link rel='stylesheet' type='text/css' href='imgupload/free.css' />
	<link rel='stylesheet' type='text/css' href='imgupload/freeurgent.css' />
	<link rel='stylesheet' type='text/css' href='imgupload/gold.css' />
	<link rel='stylesheet' type='text/css' href='imgupload/goldurgent.css' />
	<link rel='stylesheet' type='text/css' href='imgupload/platinum.css' />
	<!-- <link rel='stylesheet' type='text/css' href='imgupload/jquery.fancybox.min.css' /> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
	<script src="https://dl.dropboxusercontent.com/u/2241077/jquery.dragbetter.js"></script>
	<script src="imgupload/imageupload.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
	<script type="text/javascript">
		/*packages selection */
		$(function(){
			$('.select_pack').change(function(){
				var ch = $('input[name="select_packge"]:checked').val();
				if(ch == 'freepackage'){
					$(".free_pck").css("display", 'block');
					$(".gold_pck").css("display", 'none');
					$(".platinum_pck").css("display", 'none');
					document.getElementById("package_type").value = 'free';
					$(".freeurgent").attr('checked', false);	
					$(".platinumurgent").attr('checked', false);
					$(".goldurgent").attr('checked', false);
					document.getElementById("package_urgent").value = '';
				}
				if(ch == 'goldpackage'){
					$(".free_pck").css("display", 'none');
					$(".gold_pck").css("display", 'block');
					$(".platinum_pck").css("display", 'none');
					document.getElementById("package_type").value = 'gold';
					$(".freeurgent").attr('checked', false);
					$(".goldurgent").attr('checked', false);	
					$(".platinumurgent").attr('checked', false);
					document.getElementById("package_urgent").value = '';
				}
				if(ch == 'platinumpackage'){
					$(".free_pck").css("display", 'none');
					$(".gold_pck").css("display", 'none');
					$(".platinum_pck").css("display", 'block');
					document.getElementById("package_type").value = 'platinum';
					$(".freeurgent").attr('checked', false);
					$(".goldurgent").attr('checked', false);
					$(".platinumurgent").attr('checked', false);	
					document.getElementById("package_urgent").value = '';			
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
				var pck_type = $("#package_type").val();
		
				/*free type image validation*/
				if(pck_type == 'free'){
				if (img_count == 0) {
					$(".free_img_error").css('display', 'block'); return false;
				}
				else if(pck_type == 'free' && (img_count > 5 || img_count < 3)){
					$(".free_img_error").css('display', 'block'); return false;
				}
				else{
					$(".free_img_error").css('display', 'none'); return true;
				}
			}
		
			/*free+urgent type image validation*/
			if(pck_type == 'free_urgent'){
				if (img_count == 0) {
					$(".freeurgent_img_error").css('display', 'block'); return false;
				}
				else if(pck_type == 'free_urgent' && img_count > 9){
					$(".freeurgent_img_error").css('display', 'block'); return false;
				}
				else{
					$(".freeurgent_img_error").css('display', 'none'); return true;
				}
			}
		
			/*gold type image validation*/
			if(pck_type == 'gold'){
				if (img_count == 0) {
					$(".gold_img_error").css('display', 'block'); return false;
				}
				else if(pck_type == 'gold' && img_count > 9){
					$(".gold_img_error").css('display', 'block'); return false;
				}
				else{
					$(".gold_img_error").css('display', 'none'); return true;
				}
			}
		
			/*gold+urgent image validation*/
			if(pck_type == 'gold_urgent'){
				if (img_count == 0) {
					$(".goldurgent_img_error").css('display', 'block'); return false;
				}
				else if(pck_type == 'gold_urgent' && img_count > 12){
					$(".goldurgent_img_error").css('display', 'block'); return false;
				}
				else{
					$(".goldurgent_img_error").css('display', 'none'); return true;
				}
			}
		
			/*platinum image validation*/
				if(pck_type == 'platinum'){
				if (img_count == 0) {
					$(".platinum_img_error").css('display', 'block'); return false;
				}
				else if(pck_type == 'platinum' && img_count > 12){
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
		height: 273px;
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
			<img src="img/img-theme/shp.png" class="img-responsive" alt="">
		</div>
		<!-- content info - Blog-->
		<div class="content_info">
			<div class="paddings-mini">
				<!-- content-->
				<div class="container">
					<div class="row">
						<div class="wrapper wrapper-640" style="padding-top: 0px;">
							<form action="<?php echo base_url(); ?>postad_create_cloths" method="post" class="j-forms j-multistep tooltip-hover" id="j-forms" enctype="multipart/form-data" novalidate>
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
														<b><?php echo ucfirst(@$cat); ?></b>
														<input type='hidden' name='login_id' id='login_id' value="<?php echo @$login_id; ?>" />
														<input type='hidden' name='category_id' id='category_id' value="<?php echo str_replace(" ","_",@$cat); ?>" />
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
													<li><a href="" data-toggle="modal" data-target="#Cloths" ><b>Change Category</b></a></li>
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
															<img src="img/icons/i.png" alt="Help" title="Help Label">
															</sup>
															</label>
															<label class="radio">
															<input type="radio" name="checkbox_toggle" class='bus_consumer'  value="No">
															<i></i>Consumer 
															<sup data-toggle="tooltip" title="" data-original-title="Consumer">
															<img src="img/icons/i.png" alt="Help" title="Help Label">
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
													<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
													</label>
													<div class="input">
														<label class="icon-right" for="email">
														<i class="fa fa-bookmark-o"></i>
														</label>
														<input type="text" id="postalcode" name="postalcode" placeholder="(e.g. EH14 4AB)" >
													</div>
												</div>
												<div class="span6 unit">
													<label class="label">Location 
													<sup data-toggle="tooltip" title="" data-original-title="Location">
													<img src="img/icons/i.png" alt="Help" title="Help Label">
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
													<img src="img/icons/i.png" alt="Help" title="Help Label">
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
													<img id="blah" src="#" alt='blah' title="blah"/>
												</div>
												<div class="span2 unit" class='del_img'>
													<a href='javascript:void(0);' id="del_img" style='display:none;'><img src="ad_images/delete.png" alt=''/></a>
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
															<input type="radio" name="checkbox_wmcloth" id="next-step-radio" value="Seller">
															<i></i>Seller
															<sup data-toggle="tooltip" title="" data-original-title="Seller">
															<img src="img/icons/i.png" alt="Help" title="Help Label">
															</sup>
															</label>
															<label class="radio">
															<input type="radio" name="checkbox_wmcloth"  value="Needed">
															<i></i>Needed
															<sup data-toggle="tooltip" title="" data-original-title="Needed">
															<img src="img/icons/i.png" alt="Help" title="Help Label">
															</sup>
															</label>
															<label class="radio">
															<input type="radio" name="checkbox_wmcloth"  value="Charity">
															<i></i>Charity
															<sup data-toggle="tooltip" title="" data-original-title="Charity">
															<img src="img/icons/i.png" alt="Help" title="Help Label">
															</sup>
															</label>
														</div>
													</div>
												</div>
											</div>
											<div class="j-row">
												<div class="span6 unit">
													<label class="label">Deal Tag / Caption 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Tag / Caption">
													<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
													</label>
													<div class="input">
														<label class="icon-right" for="dealtag">
														<img src="j-folder/img/dealtag.png" alt="dealtag" title="Dealtag">
														</label>
														<input type="text" id="dealtag" name="dealtag" placeholder="Enter Deal Tag">
													</div>
												</div>
											</div>
											<div class="j-row">
												<div class="span12 unit">
													<label class="label">Deal Description 
													<sup data-toggle="tooltip" title="" data-original-title="Deal Description ">
													<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
													</label>
													<div class="input">
														<textarea type="text" id="dealdescription" name="dealdescription" cols="40" placeholder="Enter Deal Description"></textarea>
														<input type='hidden' name='text_hide' id='text_hide' value='' />
													</div>
												</div>
											</div>
											<?php if (@$sub_sub_name == 'Clothing') { ?>
											<div id="women_cloths">
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Size 
														<sup data-toggle="tooltip" title="" data-original-title="Size">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<label class="input select">
															<?php if (@$sub_sub_id == '363' || @$sub_sub_id == '367' || @$sub_sub_id == '370' || @$sub_sub_id == '373' || @$sub_sub_id == '375') { ?>
															<input type="text" id="Size" name="Size" placeholder="Enter Size" onkeypress="return isNumber(event)">
															<?php	}
																if (@$sub_sub_id == '359') { ?>
															<select name="Size">
																<option value="none" selected disabled="">Select Size</option>
																<option value="1size">1 Size</option>
																<option value="2size">2 Size</option>
																<option value="4size">4 Size</option>
																<option value="6size">6 Size</option>
																<option value="8size">8 Size</option>
																<option value="10size">10 Size</option>
																<option value="12size">12 Size</option>
																<option value="14size">14 Size</option>
																<option value="16size">16 Size</option>
																<option value="18size">18 Size</option>
																<option value="20size">20 Size</option>
																<option value="21size">22 Size</option>
																<option value="24size">24 Size</option>
																<option value="26size">26 Size</option>
																<option value="8lsize">8L Size</option>
																<option value="10lsize">10L Size</option>
																<option value="12lsize">12L Size</option>
																<option value="14lsize">14L Size</option>
																<option value="16lsize">16L Size</option>
																<option value="18lsize">18L Size</option>
																<option value="xsmallsize">X-Small Size</option>
																<option value="smallsize">Small Size</option>
																<option value="largesize">Large Size</option>
																<option value="xlargesize">X-large Size</option>
																<option value="mediumsize">Medium Size</option>
																<option value="othersize">Other</option>
															</select>
															<i></i>
															<?php	}
																?>
														</label>
													</div>
													<div class="span6 unit">
														<label class="label">Color 
														<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<label class="input select">
															<select name="Color">
																<option value="none" selected disabled="">Select Color</option>
																<option value="Brown">Brown Color</option>
																<option value="Gray">Gray Color</option>
																<option value="Green">Green Color</option>
																<option value="Cream">Cream Color</option>
																<option value="White">White Color</option>
																<option value="Navy">Navy Color</option>
																<option value="Pink">Pink Color</option>
																<option value="Red">Red Color</option>
																<option value="Natural">Natural Color</option>
																<option value="Tan">Tan Color</option>
																<option value="Orange">Orange Color</option>
																<option value="Yellow">Yellow Color</option>
																<option value="Bronze">Bronze Color</option>
																<option value="Nude">Nude Color</option>
																<option value="Purple">Purple Color</option>
																<option value="teal">teal Color</option>
																<option value="Others">Other Color</option>
															</select>
															<i></i>
														</label>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Brand Name 
														<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Brand">
															<img src="j-folder/img/brand.png" alt="Brand" title="Brand Icon" class="img-responsive">
															</label>
															<input type="text" id="brand" name="brand" placeholder="Enter Brand">
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">No of Items 
														<sup data-toggle="tooltip" title="" data-original-title="No of Items">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Items">
															<img src="j-folder/img/items.png" alt="Items" title="Items Icon" class="img-responsive">
															</label>
															<input type="text" id="noofitem" name="noofitem" placeholder="Enter Item" onkeypress="return isNumber(event)">
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Fit 
														<sup data-toggle="tooltip" title="" data-original-title="Fit">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<label class="input select">
															<!-- women clothing -->
															<?php if (@$sub_sub_id == '359') { ?>
															<select name="Fit">
																<option value="none" selected disabled="">Select Fit</option>
																<option value="Regular">Regular</option>
																<option value="Slim-fit">Slim-fit</option>
																<option value="Long-line">Long-line</option>
																<option value="Tailored">Tailored</option>
																<option value="Baggy">Baggy</option>
																<option value="Oversize">Oversize</option>
																<option value="Other">Other</option>
															</select>
															<i></i>
															<?php }
																/*men, boy, girl, kid boy, kid girl*/
																if (@$sub_sub_id == '363' || @$sub_sub_id == '367' || @$sub_sub_id == '370' || @$sub_sub_id == '373' || @$sub_sub_id == '375') { ?>
															<input type="text" placeholder="Enter Fit" name="Fit" id="Fit">
															<?php	}
																?>
														</label>
													</div>
													<div class="span6 unit">
														<label class="label">Made In 
														<sup data-toggle="tooltip" title="" data-original-title="Made In ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Made In">
															<img src="j-folder/img/madein.png" alt="Made In" title="Made In Icon" class="img-responsive">
															</label>
															<input type="text" id="madein" name="madein" placeholder="Enter Made in">
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Material
														<sup data-toggle="tooltip" title="" data-original-title="Material">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Material">
															<img src="j-folder/img/material.png" alt="Material" title="Material Icon" class="img-responsive">
															</label>
															<input type="text" id="material" name="material" placeholder="Enter Material">
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Washing Instructions 
														<sup data-toggle="tooltip" title="" data-original-title="Washing Instructions ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<textarea type="text" id="washinst" name="washinst" placeholder="Enter Washing Instructions"></textarea>
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Length
														<sup data-toggle="tooltip" title="" data-original-title="Length">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Length">
															<img src="j-folder/img/length.png" alt="Length" title="Length Icon" class="img-responsive">
															</label>
															<input type="text" id="length" name="length" placeholder="Enter Length">
														</div>
													</div>
												</div>
											</div>
											<?php	} ?>
											<?php if (@$sub_sub_name == 'Shoes') { ?>
											<div id="women_shoes">
												<div class="j-row">
													<div class="span6 unit">
														<!-- start Deal Tag -->
														<label class="label">Size 
														<sup data-toggle="tooltip" title="" data-original-title="Size">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Size">
															<img src="j-folder/img/size.png" alt="Size" title="Size Icon" class="img-responsive">
															</label>
															<input type="text" id="size" name="size" placeholder="Enter Size" onkeypress="return isNumber(event)">
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Color 
														<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="input select">
																<select name="color">
																	<option value="none" selected disabled="">Select Color</option>
																	<option value="Brown">Brown Color</option>
																	<option value="Gray">Gray Color</option>
																	<option value="Green">Green Color</option>
																	<option value="Cream">Cream Color</option>
																	<option value="White">White Color</option>
																	<option value="Navy">Navy Color</option>
																	<option value="Pink">Pink Color</option>
																	<option value="Red">Red Color</option>
																	<option value="Natural">Natural Color</option>
																	<option value="Tan">Tan Color</option>
																	<option value="Orange">Orange Color</option>
																	<option value="Yellow">Yellow Color</option>
																	<option value="Bronze">Bronze Color</option>
																	<option value="Nude">Nude Color</option>
																	<option value="Purple">Purple Color</option>
																	<option value="teal">teal Color</option>
																	<option value="Others">Other Color</option>
																</select>
																<i></i>
															</label>
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Brand Name
														<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Brand">
															<img src="j-folder/img/brand.png" alt="Brand" title="Brand Icon" class="img-responsive">
															</label>
															<input type="text" id="brand" name="brand" placeholder="Enter Brand">
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">No of Items 
														<sup data-toggle="tooltip" title="" data-original-title="No of Items">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Items">
															<img src="j-folder/img/items.png" alt="Items" title="Items Icon" class="img-responsive">
															</label>
															<input type="text" id="noofitem" name="noofitem" placeholder="Enter Item" onkeypress="return isNumber(event)">
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Shoes Material 
														<sup data-toggle="tooltip" title="" data-original-title="Shoes Material">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Shoes">
															<img src="j-folder/img/shoes.png" alt="Shoes" title="Shoes Icon" class="img-responsive">
															</label>
															<input type="text" id="shoesmaterial" name="shoesmaterial" placeholder="Enter Shoes Material">
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Shoes Styles 
														<sup data-toggle="tooltip" title="" data-original-title="Shoes Styles">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Shoes">
															<img src="j-folder/img/shoes.png" alt="Shoes" title="Shoes Icon" class="img-responsive">
															</label>
															<input type="text" id="shoestyle" name="shoestyle" placeholder="Enter Shoes Styles">
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Made In 
														<sup data-toggle="tooltip" title="" data-original-title="Made In ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Made In">
															<img src="j-folder/img/madein.png" alt="Made In" title="Made In Icon" class="img-responsive">
															</label>
															<input type="text" id="madein" name="madein" placeholder="Enter Made in">
														</div>
													</div>
													<?php if (@$sub_sub_id == '360') { ?>
													<div class="span6 unit">
														<label class="label">Heel Details 
														<sup data-toggle="tooltip" title="" data-original-title="Heel Details">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Heel details">
															<img src="j-folder/img/heeldetails.png" alt="Heel details" title="Heel details Icon" class="img-responsive">
															</label>
															<input type="text" id="Heeldetails" name="Heeldetails" placeholder="Enter Heel Details">
														</div>
													</div>
													<?php	}
														else{ ?>
													<div class="span6 unit">
														<div class="input">
															<input type="hidden" id="Heeldetails" name="Heeldetails" value='' placeholder="Enter Heel Details">
														</div>
													</div>
													<?php	} ?>
												</div>
											</div>
											<?php } ?>
											<?php if (@$sub_sub_name == 'Accessories') { ?>		
											<div id="women_accessories">
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Color 
														<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="input select">
																<select name="color">
																	<option value="none" selected disabled="">Select Color</option>
																	<option value="Brown">Brown Color</option>
																	<option value="Gray">Gray Color</option>
																	<option value="Green">Green Color</option>
																	<option value="Cream">Cream Color</option>
																	<option value="White">White Color</option>
																	<option value="Navy">Navy Color</option>
																	<option value="Pink">Pink Color</option>
																	<option value="Red">Red Color</option>
																	<option value="Natural">Natural Color</option>
																	<option value="Tan">Tan Color</option>
																	<option value="Orange">Orange Color</option>
																	<option value="Yellow">Yellow Color</option>
																	<option value="Bronze">Bronze Color</option>
																	<option value="Nude">Nude Color</option>
																	<option value="Purple">Purple Color</option>
																	<option value="teal">teal Color</option>
																	<option value="Others">Other Color</option>
																</select>
																<i></i>
															</label>
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Brand Name
														<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Brand">
															<img src="j-folder/img/brand.png" alt="Brand" title="Brand Icon" class="img-responsive">
															</label>
															<input type="text" id="brand" name="brand" placeholder="Enter Brand">
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">No of Items 
														<sup data-toggle="tooltip" title="" data-original-title="No of Items">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Items">
															<img src="j-folder/img/items.png" alt="Items" title="Items Icon" class="img-responsive">
															</label>
															<input type="text" id="noofitem" name="noofitem" placeholder="Enter Item" onkeypress="return isNumber(event)">
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Material 
														<sup data-toggle="tooltip" title="" data-original-title="Material">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="material">
															<img src="j-folder/img/material.png" alt="Material" title="Material Icon" class="img-responsive">
															</label>
															<input type="text" id="shoesmaterial" name="shoesmaterial" placeholder="Enter Shoes Material">
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Made In 
														<sup data-toggle="tooltip" title="" data-original-title="Made In ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Made In">
															<img src="j-folder/img/madein.png" alt="Made In" title="Made In Icon" class="img-responsive">
															</label>
															<input type="text" id="madein" name="madein" placeholder="Enter Made in">
														</div>
													</div>
												</div>
											</div>
											<?php } ?>
											<?php if (@$sub_sub_name == 'Wedding') { ?>
											<div id="women_Wedding">
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Size 
														<sup data-toggle="tooltip" title="" data-original-title="Size">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Size">
															<img src="j-folder/img/size.png" alt="Size" title="Size Icon" class="img-responsive">
															</label>
															<input type="text" id="size" name="size" placeholder="Enter Size" onkeypress="return isNumber(event)">
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Color 
														<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="input select">
																<select name="color">
																	<option value="none" selected disabled="">Select Color</option>
																	<option value="Brown">Brown Color</option>
																	<option value="Gray">Gray Color</option>
																	<option value="Green">Green Color</option>
																	<option value="Cream">Cream Color</option>
																	<option value="White">White Color</option>
																	<option value="Navy">Navy Color</option>
																	<option value="Pink">Pink Color</option>
																	<option value="Red">Red Color</option>
																	<option value="Natural">Natural Color</option>
																	<option value="Tan">Tan Color</option>
																	<option value="Orange">Orange Color</option>
																	<option value="Yellow">Yellow Color</option>
																	<option value="Bronze">Bronze Color</option>
																	<option value="Nude">Nude Color</option>
																	<option value="Purple">Purple Color</option>
																	<option value="teal">teal Color</option>
																	<option value="Others">Other Color</option>
																</select>
																<i></i>
															</label>
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Brand Name
														<sup data-toggle="tooltip" title="" data-original-title="Brand">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Brand">
															<img src="j-folder/img/brand.png" alt="Brand" title="Brand Icon" class="img-responsive">
															</label>
															<input type="text" id="brand" name="brand" placeholder="Enter Brand">
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">No of Items 
														<sup data-toggle="tooltip" title="" data-original-title="No of Items">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Items">
															<img src="j-folder/img/items.png" alt="Items" title="Items Icon" class="img-responsive">
															</label>
															<input type="text" id="noofitem" name="noofitem" placeholder="Enter Item" onkeypress="return isNumber(event)">
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Material
														<sup data-toggle="tooltip" title="" data-original-title="Material">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Material">
															<img src="j-folder/img/material.png" alt="Material" title="Material Icon" class="img-responsive">
															</label>
															<input type="text" id="material" name="material" placeholder="Enter Material">
														</div>
													</div>
													<div class="span6 unit">
														<label class="label">Washing Instructions 
														<sup data-toggle="tooltip" title="" data-original-title="Washing Instructions ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<textarea type="text" id="washinst" name="washinst" placeholder="Enter Washing Instructions"></textarea>
														</div>
													</div>
												</div>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Length
														<sup data-toggle="tooltip" title="" data-original-title="Length">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<div class="input">
															<label class="icon-right" for="Length">
															<img src="j-folder/img/length.png" alt="Length" title="Length Icon" class="img-responsive">
															</label>
															<input type="text" id="length" name="length" placeholder="Enter Length">
														</div>
													</div>
												</div>
											</div>
											<?php } ?>
											<div class="j-row">
												<div class="span6 unit">
													<label class="label">Price 
													<sup data-toggle="tooltip" title="" data-original-title="Price">
													<img src="img/icons/i.png" alt="Help" title="Help Label">
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
																<img src="j-folder/img/price.png" alt="price" title="Price">
																</label>
																<input type="text" id="priceamount" name="priceamount" placeholder="Enter Amount" onkeypress="return isNumber(event)">
															</div>
														</div>
														<div class="span6 unit">
															<!-- start Deal Tag -->
															<label class="label">Price Type 
															<sup data-toggle="tooltip" title="" data-original-title="Price Type ">
															<img src="img/icons/i.png" alt="Help" title="Help Label">
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
													<!-- end service -->
												</div>
											</div>
										</div>
									</fieldset>
									<fieldset>
										<div class="divider gap-bottom-25"></div>
										<!-- start name -->
										<div class="j-row">
											<div class="span4">
												<!-- promotion-box-->
												<div class="promotion-box">
													<div class="promotion-box-center color-2">
														<div class="prince">
															Free
														</div>
													</div>
													<!-- End promotion-box-center-->
													<!-- promotion-box-info-->
													<div class="promotion-box-info">
														<ul class="list-styles">
															<li><i class="fa fa-check"></i> Validity : 30 days</li>
															<li><i class="fa fa-check"></i> Up to 5 photos</li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<li><i class="fa fa-check"></i> Includes 20% VAT</li>
															<div class="free_bg text_center free_pound" style="display:none;">
																<h3 class="price_amt">£0</h3>
															</div>
															<div class="free_bg text_center free_euro" style="display:none;">
																<h3 class="price_amt">€0</h3>
															</div>
														</ul>
														<div class="hot_deal_rad check">
															<label class="radio">
															<input type="radio" id='free_pck' name="select_packge" class='select_pack' value="freepackage" data-price="5">
															<i></i>
															Select Free 
															</label>
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
															<li><i class="fa fa-check"></i> Validity : 30 days</li>
															<li><i class="fa fa-check"></i> Up to 9 photos</li>
															<li><i class="fa fa-check"></i> Bump up to 7days in result</li>
															<li><i class="fa fa-check"></i> It Will High Light</li>
															<li><i class="fa fa-check"></i> It will be display homepage  most valued ads for 7days <a href="img/gold.png" class="fancybox">Example</a></li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<li><i class="fa fa-check"></i> Thumps Up Symbol</li>
															<div class="gold_bg text_center free_pound" style="display:none;">
																<h3 class="price_amt">£2.99</h3>
															</div>
															<div class="gold_bg text_center free_euro" style="display:none;">
																<h3 class="price_amt">€3.95</h3>
															</div>
														</ul>
														<div class="hot_deal_rad check">
															<label class="radio">
															<input type="radio" id='gold_pck' name="select_packge" class='select_pack' value="goldpackage" data-price="5">
															<i></i>
															Select Gold 
															</label>
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
															<li><i class="fa fa-check"></i> Validity : 30 days</li>
															<li><i class="fa fa-check"></i> Up to 12 Images</li>
															<li><i class="fa fa-check"></i> Bump up to 14days in result</li>
															<li><i class="fa fa-check"></i>Ad will display 3D rotation for 5days </li>
															<li><i class="fa fa-check"></i> It will be display Home page significant ads for 7days <a href="img/platinum.png" class="fancybox">Example</a></li>
															<li><i class="fa fa-check"></i> Image will be display as Slide by Slide</li>
															<li><i class="fa fa-check"></i> Video 30sec can upload </li>
															<li><i class="fa fa-check"></i> Title displayed in Hot deals Marquee <a href="img/marqueimg.png" class="fancybox"> Example</a></li>
															<li><i class="fa fa-check"></i> Crown Symbol  </li>
															<div class="platinum_bg text_center free_pound" style="display:none;">
																<h3 class="price_amt">£4.99</h3>
															</div>
															<div class="platinum_bg text_center free_euro" style="display:none;">
																<h3 class="price_amt">€6.59</h3>
															</div>
														</ul>
														<div class="hot_deal_rad check">
															<label class="radio">
															<input type="radio" id='platinum_pck' name="select_packge" class='select_pack' value="platinumpackage" data-price="5">
															<i></i>
															Select Platinum 
															</label>
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
															<div class="promotion-box-info free_pound" style='display:none;'>
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i> £0.99-7Days (Exclusive VAT)</li>
																	<div class="free_bg text_center">
																		<h3 class="price_amt">£0.99</h3>
																	</div>
																</ul>
																<div class="hot_deal_rad">
																	<label class="radio">
																	<input type="radio" id='freeurgent' name="select_urgent" class='select_urgent_pack freeurgent' value="7daysurgent"  data-price="5">
																	<i></i>
																	Urgent
																	</label>
																</div>
															</div>
															<div class="promotion-box-info free_euro" style='display:none;'>
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i> €1.31-7Days (Exclusive VAT)</li>
																	<div class="free_bg text_center">
																		<h3 class="price_amt">€1.31</h3>
																	</div>
																</ul>
																<div class="hot_deal_rad">
																	<label class="radio">
																	<input type="radio" id='freeurgent' name="select_urgent" class='select_urgent_pack freeurgent' value="7daysurgent"  data-price="5">
																	<i></i>
																	Urgent
																	</label>
																</div>
															</div>
														</div>
														<div class="span4 bor_right">
															<!-- promotion-box-info-->
															<div class="promotion-box-info free_pound" style='display:none;'>
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i> £1.49 -14 days (Exclusive VAT)</li>
																	<div class="free_bg text_center">
																		<h3 class="price_amt">£1.49</h3>
																	</div>
																</ul>
																<div class="hot_deal_rad">
																	<label class="radio">
																	<input type="radio" id='goldurgent' name="select_urgent" class='select_urgent_pack goldurgent' value="14daysurgent"  data-price="5">
																	<i></i>
																	Urgent 
																	</label>
																</div>
															</div>
															<div class="promotion-box-info free_euro" style='display:none;'>
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i> €1.97 -14 days (Exclusive VAT)</li>
																	<div class="free_bg text_center">
																		<h3 class="price_amt">€1.97</h3>
																	</div>
																</ul>
																<div class="hot_deal_rad">
																	<label class="radio">
																	<input type="radio" id='goldurgent' name="select_urgent" class='select_urgent_pack goldurgent' value="14daysurgent"  data-price="5">
																	<i></i>
																	Urgent 
																	</label>
																</div>
															</div>
														</div>
														<div class="span4">
															<!-- promotion-box-info-->
															<div class="promotion-box-info free_pound" style='display:none;'>
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i> £1.99-30 Days(Exclusive VAT)</li>
																	<div class="free_bg text_center">
																		<h3 class="price_amt">£1.99</h3>
																	</div>
																</ul>
																<div class="hot_deal_rad">
																	<label class="radio">
																	<input type="radio" id='platinumurgent' name="select_urgent" class='select_urgent_pack platinumurgent' value="30daysurgent"  data-price="5">
																	<i></i>
																	Urgent
																	</label>
																</div>
															</div>
															<div class="promotion-box-info free_euro" style='display:none;'>
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i> €2.63-30 Days(Exclusive VAT)</li>
																	<div class="free_bg text_center">
																		<h3 class="price_amt">€2.63</h3>
																	</div>
																</ul>
																<div class="hot_deal_rad">
																	<label class="radio">
																	<input type="radio" id='platinumurgent' name="select_urgent" class='select_urgent_pack platinumurgent' value="30daysurgent"  data-price="5">
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
									</fieldset>
									<fieldset>
										<div class="divider gap-bottom-25"></div>
										<!-- free__pck Start -->
										<div class="j-row free_pck" style='display: none;'>
											<div class="alert alert-danger free_img_error" style='display:none;' >
												<!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
												<strong>Error!</strong> Please upload upto 3-5 images only
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
															<h3>Upload Images ( 3-5 images ) :</h3>
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
												<label class="label">Video Link 
												<sup data-toggle="tooltip" title="" data-original-title="Video Link">
												<img src="img/icons/i.png" alt="Help" title="Help Label">
												</sup>
												</label>
												<div class="unit">
													<input type="file" name="file_video_free" id='file_video_free' >
												</div>
											</div>
											<div class="span12 unit">
												<label class="label">Website Link 
												<sup data-toggle="tooltip" title="" data-original-title="Website Link">
												<img src="img/icons/i.png" alt="Help" title="Help Label">
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
												<strong>Error!</strong> Please upload upto 9 images only
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
															<h3>Upload Images ( 9 images ) :</h3>
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
												<img src="img/icons/i.png" alt="Help" title="Help Label">
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
												<label class="label">Video Link 
												<sup data-toggle="tooltip" title="" data-original-title="Video Link">
												<img src="img/icons/i.png" alt="Help" title="Help Label">
												</sup>
												</label>
												<div class="unit">
													<input type="file" name="goldurgent_video" id='goldurgent_video' />
												</div>
											</div>
											<div class="span12 unit">
												<label class="label">Website Link 
												<sup data-toggle="tooltip" title="" data-original-title="Website Link">
												<img src="img/icons/i.png" alt="Help" title="Help Label">
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
												<strong>Error!</strong> Please upload upto 12 images only
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
															<h3>Upload Images ( 12 images ) :</h3>
															<div id="output_platinum">
																<ul id="free"></ul>
															</div>
														</div>
														<div style="clear:both;"></div>
													</div>
												</div>
											</div>
											<div class="span12 unit">
												<label class="label">Video Upload 
												<sup data-toggle="tooltip" title="" data-original-title="Video upload">
												<img src="img/icons/i.png" alt="Help" title="Help Label">
												</sup>
												</label>
												<div class="unit">
													<label class="input append-big-btn">
														<input type="file" name="file_video_platinum" id='file_video_platinum' />
														<video controls width="200px" id="vid" style="display:block"></video>
														<span class="hint">Only: MP4  Allow upto 30-Seconds video</span>
													</label>
												</div>
												<div class="alert alert-danger platinum_video_error" style='display:none'; >
													<strong>Error!</strong> Please upload upto 30-Seconds video(mp4 format)
												</div>
											</div>
											<div class="span12 unit">
												<label class="label">Website Link 
												<sup data-toggle="tooltip" title="" data-original-title="Website Link">
												<img src="img/icons/i.png" alt="Help" title="Help Label">
												</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Video">
													<i class="fa fa-briefcase"></i>
													</label>
													<input type="text" id="platinum_weblink" name="platinum_weblink" placeholder="">
												</div>
											</div>
											<div class="span12 unit">
												<label class="label">Marquee Title 
												<sup data-toggle="tooltip" title="" data-original-title="Marquee Title">
												<img src="img/icons/i.png" alt="Help" title="Help Label">
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
												<b>Contact Information</b>
											</div>
										</div>
										<div class="j-row">
											<div class="span12" id='business_form'>
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Business Name 
														<sup data-toggle="tooltip" title="" data-original-title="Business Name">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
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
														<img src="img/icons/i.png" alt="Help" title="Help Label">
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
														<img src="img/icons/i.png" alt="Help" title="Help Label">
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
														<img src="img/icons/i.png" alt="Help" title="Help Label">
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
														<img src="img/icons/i.png" alt="Help" title="Help Label">
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
														<img src="img/icons/i.png" alt="Help" title="Help Label">
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
														<img src="img/icons/i.png" alt="Help" title="Help Label">
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
											<div class="span12">
												<div class="j-row">
													<div class="span6 unit">
														<label class="label">Terms & Conditions 
														<sup data-toggle="tooltip" title="" data-original-title="Terms & Conditions">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
														</sup>
														</label>
														<label class="checkbox">
														<input type="checkbox" id='terms_condition' name="terms_condition" value="terms_condition" checked onclick="return false">
														<i></i>
														I accept Terms & Conditions 
														</label>
													</div>
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
								<div class="footer">
									<input type="submit" class="primary-btn multi-submit-btn video_validate" name='post_create_ad_cloths' Value="Post Deal">
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
	<form method='post' action="<?php echo base_url(); ?>postad_create_cloths" id='edit_cloths_cat'>
		<div class="modal fade" id="Cloths" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2>Cloths <span>Category </span></h2>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12 post_deal_bor">
								<div class="row">
									<div class="col-md-4 clearfix">
										<input type='hidden' name='cloths_cat' id='cloths_cat' value='clothing & lifestyles' />
										<input type='hidden' name='cloths_sub' id='cloths_sub' value='' />
										<input type='hidden' name='cloths_sub_sub' id='cloths_sub_sub' value='' />
										<h3>Women</h3>
										<?php foreach ($cloths_women as $c_val) { ?>
										<h4><a id="<?php echo  $c_val['sub_category_id'].','.$c_val['sub_subcategory_id']; ?>" class="edit_cloths_women"  href="javascript:void(0);"  ><?php echo $c_val['sub_subcategory_name']; ?></a></h4>
										<?php	} ?>
									</div>
									<div class="col-md-4 clearfix">
										<h3>Men</h3>
										<?php foreach ($cloths_men as $c_men) { ?>
										<h4><a id="<?php echo  $c_men['sub_category_id'].','.$c_men['sub_subcategory_id']; ?>" class="edit_cloths_men"  href="javascript:void(0);"  ><?php echo $c_men['sub_subcategory_name']; ?></a></h4>
										<?php	} ?>
									</div>
									<div class="col-md-4 clearfix">
										<h3>Boy</h3>
										<?php foreach ($cloths_boy as $c_boy) { ?>
										<h4><a id="<?php echo  $c_boy['sub_category_id'].','.$c_boy['sub_subcategory_id']; ?>" class="edit_cloths_boy"  href="javascript:void(0);"  ><?php echo $c_boy['sub_subcategory_name']; ?></a></h4>
										<?php	} ?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 clearfix">
										<h3>Girls</h3>
										<?php foreach ($cloths_girls as $c_girl) { ?>
										<h4><a id="<?php echo  $c_girl['sub_category_id'].','.$c_girl['sub_subcategory_id']; ?>" class="edit_cloths_girl"  href="javascript:void(0);"  ><?php echo $c_girl['sub_subcategory_name']; ?></a></h4>
										<?php	} ?>
									</div>
									<div class="col-md-4 clearfix">
										<h3>Baby Boy</h3>
										<?php foreach ($cloths_baby_boy as $c_bboy) { ?>
										<h4><a id="<?php echo  $c_bboy['sub_category_id'].','.$c_bboy['sub_subcategory_id']; ?>" class="edit_cloths_bboy"  href="javascript:void(0);"  ><?php echo $c_bboy['sub_subcategory_name']; ?></a></h4>
										<?php	} ?>
									</div>
									<div class="col-md-4 clearfix">
										<h3>Baby Girl</h3>
										<?php foreach ($cloths_baby_girl as $c_bgirl) { ?>
										<h4><a id="<?php echo  $c_bgirl['sub_category_id'].','.$c_bgirl['sub_subcategory_id']; ?>" class="edit_cloths_bgirl"  href="javascript:void(0);"  ><?php echo $c_bgirl['sub_subcategory_name']; ?></a></h4>
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