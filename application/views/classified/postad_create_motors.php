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
				$(".freeurgent").removeAttr('disabled');	
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
				$(".goldurgent").removeAttr('disabled');	
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
				$(".platinumurgent").removeAttr('disabled');	
				document.getElementById("package_urgent").value = '';			
			}
		});

		$(".select_urgent_pack").change(function(){
				var va = $(this).val();
				$("#package_urgent").val(va);
			
		});
	});



	/*onload bike model dropdown*/
	$(function(){
		var bikeid = <?php echo @$sub_id ?>;
		if (bikeid == '13') {
		var id = <?php echo @$sub_sub_id; ?>;
		$.post( "<?php echo base_url();?>postad_create_motors/get_bike_types",{id:id},function( data ) {
			$(".bike_type").html(data);
                        
            });
		}
	});

	$(function(){
		$(".bike_type").change(function(){
			var id = $(this).val();
		$.post( "<?php echo base_url();?>postad_create_motors/get_bike_models",{id:id},function( data ) {
			$(".bike_model").html(data);
                        
            });
		});

	});

	/*onload car and vans, trucks, coachs, buses, boats dropdown*/
	$(function(){
		var carid = <?php echo @$sub_id ?>;
		if (carid == '12' || carid == '14' || carid == '15' || carid == '16' || carid == '19') {
		var id = <?php echo @$sub_sub_id; ?>;
		$.post( "<?php echo base_url();?>postad_create_motors/get_car_models",{id:id},function( data ) {
			$(".car_model").html(data);
                        
            });
		}
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
			<img src="img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
		</div>
		
		<!-- content info - Blog-->
		<div class="content_info">
			<div class="paddings-mini">
				<!-- content-->
				<div class="container">
					<div class="row">
						<div class="wrapper wrapper-640" style="padding-top: 0px;">

							<form action="<?php echo base_url(); ?>postad_create_motors" method="post" class="j-forms j-multistep tooltip-hover" id="j-forms" enctype="multipart/form-data" novalidate>

								<div class="header">
									<a href="postad" class="pull-left post_ad_back"><i class="fa fa-mail-reply-all fa-3x"></i></a><p>Post a Deal</p>
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
														<input type='hidden' name='category_id' id='category_id' value="<?php echo @$cat; ?>" />
														<input type='hidden' name='sub_id' id='sub_id' value="<?php echo @$sub_id; ?>" />
														<input type='hidden' name='sub_sub_id' id='sub_sub_id' value="<?php echo @$sub_sub_id; ?>" />
														<input type='hidden' name='sub_sub_sub_id' id='sub_sub_sub_id' value="<?php echo @$sub_sub_sub_id; ?>" />
														 /</li>
													<li><b><?php echo ucfirst(@$sub_name); ?></b>  /</li>
													<li><b><?php echo ucfirst(@$sub_sub_name); ?></b> <?php if ($sub_sub_sub_name != '') { ?>  /<?php	} ?></li>
													<li><b><?php echo ucfirst(@$sub_sub_sub_name); ?></b></li>
												</ul>                 
											</div>
											<div class="col-sm-4 pad_bottm">
												<ul class="social-team pull-left">
													<li><a href="" data-toggle="modal" data-target="#motorpoint" ><b>Change Category</b></a></li>
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
														<!-- lattitude and longtitude -->
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
													<img id="blah" src="#" alt=''/>
												</div>
												<div class="span2 unit" class='del_img'>
												<a href='javascript:void(0);' id="del_img" style='display:none;'>
												<img src="ad_images/delete.png" alt='delete' title="Delete"/></a>
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
																<input type="radio" name="checkbox_motbike" id="next-step-radio" value="Seller">
																<i></i>Seller
																<sup data-toggle="tooltip" title="" data-original-title="Seller">
																	<img src="img/icons/i.png" alt="Help" title="Help Label">
																</sup>
															</label>
															<label class="radio">
																<input type="radio" name="checkbox_motbike"  value="Needed">
																<i></i>Needed
																<sup data-toggle="tooltip" title="" data-original-title="Needed">
																	<img src="img/icons/i.png" alt="Help" title="Help Label">
																</sup>
															</label>
															<label class="radio">
																<input type="radio" name="checkbox_motbike"  value="For Hire">
																<i></i>For Hire
																<sup data-toggle="tooltip" title="" data-original-title="For Hire">
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
												</div><!-- end Deal Tag -->
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
												</div><!-- end Deal Description -->
											</div>
											
											<!-- bike form -->
											<?php if (@$sub_id == '13') { ?>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Vehicle Registration  Number 
													<sup data-toggle="tooltip" title="" data-original-title="Vehicle Registration  Number ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="veh_regno">
														<img src="j-folder/img/regno.png" alt="regno" title="Reg No Icon" class="img-responsive">
													</label>
													<input type="text" id="veh_regno" name="veh_regno" placeholder="Enter Vehicle Registration  Number ">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Manufacture 
													<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="manufacture">
														<img src="j-folder/img/manufacture.png" alt="manufacture" title="manufacture Icon" class="img-responsive">
													</label>
													<input type="text" id="manufacture" name="manufacture" placeholder="Enter Manufacture" value='<?php echo ucfirst(@$sub_sub_name); ?>' readonly>
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Bike Type 
													<sup data-toggle="tooltip" title="" data-original-title="Bike Type ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Type" class='bike_type'>
														<option value="none" selected disabled="">Select Type</option>
														<option value="">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Model 
													<sup data-toggle="tooltip" title="" data-original-title="Model ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Model" class='bike_model'>
														<option value="none" selected disabled="">Select Model</option>
														<option value="">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Color
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Registration Year
													<sup data-toggle="tooltip" title="" data-original-title="Registration Year">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="reg_year">
														<img src="j-folder/img/reg.png" alt="Reg" title="Reg Icon" class="img-responsive">
													</label>
													<input type="text" id="reg_year" name="reg_year" placeholder="Enter Registration Year" onkeypress="return isNumber(event)">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Fuel Type  
													<sup data-toggle="tooltip" title="" data-original-title="Fuel Type">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="FuelType">
														<option value="none" selected disabled="">Select fuel</option>
														<option value="Petrol">Petrol</option>
														<option value="Diesel">Diesel</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">No of Miles Covered 
													<sup data-toggle="tooltip" title="" data-original-title="No of Miles Covered ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="No of Miles Covered ">
														<img src="j-folder/img/miles.png" alt="Miles" title="Miles Icon" class="img-responsive">
													</label>
													<input type="text" id="tot_miles" name="tot_miles" placeholder="Enter No of Miles Covered" onkeypress="return isNumber(event)">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Engine Size 
													<sup data-toggle="tooltip" title="" data-original-title="Engine Size ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Engine Sise">
														<img src="j-folder/img/engsize.png" alt="Miles" title="Engine Icon" class="img-responsive">
													</label>
													<input type="text" id="eng_size" name="eng_size" placeholder="Enter Engine Size " onkeypress="return isNumber(event)">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Road TAX status  
													<sup data-toggle="tooltip" title="" data-original-title="Road TAX status ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="road_tax">
														<img src="j-folder/img/roadtax.png" alt="Road TAX" title="Road TAX Icon" class="img-responsive">
													</label>
													<input type="text" id="road_tax" name="road_tax" placeholder="Enter Road TAX status ">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Condition 
													<sup data-toggle="tooltip" title="" data-original-title="Condition">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Condition">
														<option value="none" selected disabled="">Select condition</option>
														<option value="Excellent">Excellent</option>
														<option value="Good">Good</option>
														<option value="Average">Average</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<?php		} ?>
										<!-- cars, vans, coaches, buses form -->
										<?php if (@$sub_id == '12' || @$sub_id == '15' || @$sub_id == '16') { ?>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Vehicle Registration  Number 
													<sup data-toggle="tooltip" title="" data-original-title="Vehicle Registration  Number ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="veh_regno">
														<img src="j-folder/img/regno.png" alt="regno" title="Reg No Icon" class="img-responsive">
													</label>
													<input type="text" id="veh_regno" name="veh_regno" placeholder="Enter Vehicle Registration  Number ">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Manufacture 
													<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="manufacture">
														<img src="j-folder/img/manufacture.png" alt="manufacture" title="manufacture Icon" class="img-responsive">
													</label>
													<input type="text" id="manufacture" name="manufacture" placeholder="Enter Manufacture" value='<?php echo ucfirst(@$sub_sub_name); ?>' readonly >
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Model 
													<sup data-toggle="tooltip" title="" data-original-title="Model ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Model" class='car_model'>
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Color
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Registration Year
													<sup data-toggle="tooltip" title="" data-original-title="Registration Year">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="reg_year">
														<img src="j-folder/img/reg.png" alt="Reg" title="Reg Icon" class="img-responsive">
													</label>
													<input type="text" id="reg_year" name="reg_year" placeholder="Enter Registration Year" onkeypress="return isNumber(event)">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Fuel Type  
													<sup data-toggle="tooltip" title="" data-original-title="Fuel Type">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="FuelType">
														<option value="none" selected disabled="">Select Fuel</option>
														<option value="Petrol">Petrol</option>
														<option value="Diesel">Diesel</option>
														<option value="Electric">Electric</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Transmission   
													<sup data-toggle="tooltip" title="" data-original-title="Transmission ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Transmission">
														<option value="none" selected disabled="">Select Transmission</option>
														<option value="Manual">Manual</option>
														<option value="Semi-Automatic">Semi-Automatic</option>
														<option value="Automatic">Automatic</option>
														<option value="Others">Others</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Engine Size 
													<sup data-toggle="tooltip" title="" data-original-title="Engine Size ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Engine Sise">
														<img src="j-folder/img/engsize.png" alt="Miles" title="Engine Icon" class="img-responsive">
													</label>
													<input type="text" id="eng_size" name="eng_size" placeholder="Enter Engine Size" onkeypress="return isNumber(event)">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">No of Doors    
													<sup data-toggle="tooltip" title="" data-original-title="No of Doors  ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="NoofDoors">
														<option value="none" selected disabled="">Select doors</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="others">others</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">No of Seats    
													<sup data-toggle="tooltip" title="" data-original-title="No of Seats  ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="NoofSeats">
														<option value="none" selected disabled="">Select No of seats</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">No of Miles Covered 
													<sup data-toggle="tooltip" title="" data-original-title="No of Miles Covered ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="No of Miles Covered ">
														<img src="j-folder/img/miles.png" alt="Miles" title="Miles Icon" class="img-responsive">
													</label>
													<input type="text" id="tot_miles" name="tot_miles" placeholder="Enter No of Miles Covered" onkeypress="return isNumber(event)">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">MOT Status 
													<sup data-toggle="tooltip" title="" data-original-title="MOT Status ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="MOT Status ">
														<img src="j-folder/img/status.png" alt="MOT Status" title="MOT Status Icon" class="img-responsive">
													</label>
													<input type="text" id="mot_status" name="mot_status" placeholder="Enter MOT Status">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Road TAX status  
													<sup data-toggle="tooltip" title="" data-original-title="Road TAX status ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="road_tax">
														<img src="j-folder/img/roadtax.png" alt="Road TAX" title="Road TAX Icon" class="img-responsive">
													</label>
													<input type="text" id="road_tax" name="road_tax" placeholder="Enter Road TAX status ">
												</div>
											</div>
										</div>	
										<?php	} ?>
										<!-- boats -->
										<?php if (@$sub_id == '19') { ?>
											<div class="j-row">
											<div class="span6 unit">
												<label class="label">Manufacture 
													<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="manufacture">
														<img src="j-folder/img/manufacture.png" alt="manufacture" title="manufacture Icon" class="img-responsive">
													</label>
													<input type="text" id="manufacture" name="manufacture" placeholder="Enter Manufacture" value='<?php echo ucfirst(@$sub_sub_name); ?>' readonly>
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Year
													<sup data-toggle="tooltip" title="" data-original-title="Year">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="year_boat">
														<img src="j-folder/img/reg.png" alt="year" title="year Icon" class="img-responsive">
													</label>
													<input type="text" id="year_boat" name="year_boat" placeholder="Enter Year" onkeypress="return isNumber(event)">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Model 
													<sup data-toggle="tooltip" title="" data-original-title="Model ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Model" class='car_model'>
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Color
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Fuel Type  
													<sup data-toggle="tooltip" title="" data-original-title="Fuel Type">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="FuelType">
														<option value="none" selected disabled="">Select FuelType</option>
														<option value="Diesel">Diesel</option>
														<option value="Petrol">Petrol</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Condition 
													<sup data-toggle="tooltip" title="" data-original-title="Condition">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Condition">
														<option value="none" selected disabled="">Select Condition</option>
														<option value="Excellent">Excellent</option>
														<option value="good">good</option>
														<option value="average">average</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<?php } ?>
										<!-- motor homes and caravans -->
										<?php if (@$sub_id == '14') { ?>
											<div class="j-row">
												<div class="span6 unit">
													<div class="unit check logic-block-radio">
														<div class="inline-group">
															<label class="radio">
																<input type="radio" name="Caravans" id="next-step-radio"  value="Caravans">
																<i></i> Caravans 
																<sup data-toggle="tooltip" title="" data-original-title="Caravans">
																	<img src="img/icons/i.png" alt="Help" title="Help Label">
																</sup>
															</label>
															<label class="radio">
																<input type="radio" name="Caravans"  value="Motorhomes">
																<i></i> Motorhomes
																<sup data-toggle="tooltip" title="" data-original-title="Motorhomes">
																	<img src="img/icons/i.png" alt="Help" title="Help Label">
																</sup>
															</label>
														</div>
													</div>
												</div>
											</div>
											<div class="j-row">
											<div class="span6 unit">
												<label class="label">Vehicle Registration  Number 
													<sup data-toggle="tooltip" title="" data-original-title="Vehicle Registration  Number ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="veh_regno">
														<img src="j-folder/img/regno.png" alt="regno" title="Reg No Icon" class="img-responsive">
													</label>
													<input type="text" id="veh_regno" name="veh_regno" placeholder="Enter Vehicle Registration  Number ">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Manufacture 
													<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="manufacture">
														<img src="j-folder/img/manufacture.png" alt="manufacture" title="manufacture Icon" class="img-responsive">
													</label>
													<input type="text" id="manufacture" name="manufacture" placeholder="Enter Manufacture" value='<?php echo ucfirst(@$sub_sub_name); ?>' readonly >
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Model 
													<sup data-toggle="tooltip" title="" data-original-title="Model ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Model" class='car_model'>
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Color
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Registration Year
													<sup data-toggle="tooltip" title="" data-original-title="Registration Year">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="reg_year">
														<img src="j-folder/img/reg.png" alt="Reg" title="Reg Icon" class="img-responsive">
													</label>
													<input type="text" id="reg_year" name="reg_year" placeholder="Enter Registration Year" onkeypress="return isNumber(event)">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">Fuel Type  
													<sup data-toggle="tooltip" title="" data-original-title="Fuel Type">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="FuelType">
														<option value="none" selected disabled="">Select Fuel</option>
														<option value="Petrol">Petrol</option>
														<option value="Diesel">Diesel</option>
														<option value="Electric">Electric</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Transmission   
													<sup data-toggle="tooltip" title="" data-original-title="Transmission ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Transmission">
														<option value="none" selected disabled="">Select Transmission</option>
														<option value="Manual">Manual</option>
														<option value="Semi-Automatic">Semi-Automatic</option>
														<option value="Automatic">Automatic</option>
														<option value="Others">Others</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Engine Size 
													<sup data-toggle="tooltip" title="" data-original-title="Engine Size ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Engine Sise">
														<img src="j-folder/img/engsize.png" alt="Miles" title="Engine Icon" class="img-responsive">
													</label>
													<input type="text" id="eng_size" name="eng_size" placeholder="Enter Engine Size " onkeypress="return isNumber(event)">
												</div>
											</div>
										</div>
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">No of Doors    
													<sup data-toggle="tooltip" title="" data-original-title="No of Doors  ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="NoofDoors">
														<option value="none" selected disabled="">Select doors</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="others">others</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">No of Seats    
													<sup data-toggle="tooltip" title="" data-original-title="No of Seats  ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="NoofSeats">
														<option value="none" selected disabled="">Select No of seats</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
													</select>
													<i></i>
												</label>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">No of Miles Covered 
													<sup data-toggle="tooltip" title="" data-original-title="No of Miles Covered ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="No of Miles Covered ">
														<img src="j-folder/img/miles.png" alt="Miles" title="Miles Icon" class="img-responsive">
													</label>
													<input type="text" id="tot_miles" name="tot_miles" placeholder="Enter No of Miles Covered" onkeypress="return isNumber(event)">
												</div>
											</div>
											<div class="span6 unit">
												<label class="label">MOT Status 
													<sup data-toggle="tooltip" title="" data-original-title="MOT Status ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="MOT Status ">
														<img src="j-folder/img/status.png" alt="MOT Status" title="MOT Status Icon" class="img-responsive">
													</label>
													<input type="text" id="mot_status" name="mot_status" placeholder="Enter MOT Status">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Road TAX status  
													<sup data-toggle="tooltip" title="" data-original-title="Road TAX status ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="road_tax">
														<img src="j-folder/img/roadtax.png" alt="Road TAX" title="Road TAX Icon" class="img-responsive">
													</label>
													<input type="text" id="road_tax" name="road_tax" placeholder="Enter Road TAX status ">
												</div>
											</div>
										</div>	
										<?php } ?>

										<!-- plant machinery and farming vehicles -->
										<?php if (@$sub_id == '17' || @$sub_id == '18') { ?>
											<div class="j-row">
											<div class="span6 unit">
												<label class="label">Manufacture 
													<sup data-toggle="tooltip" title="" data-original-title="Manufacture ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<?php if (@$sub_id == '17') { ?>
												<div class="input">
													<label class="icon-right" for="manufacture">
														<img src="j-folder/img/manufacture.png" alt="manufacture" title="manufacture Icon" class="img-responsive">
													</label>
													<input type="text" id="manufacture" name="manufacture" placeholder="Enter Manufacture" value='<?php echo ucfirst(@$sub_sub_sub_name); ?>' readonly>
												</div>
												<?php }
												else{ ?>
												<div class="input">
													<label class="icon-right" for="manufacture">
														<img src="j-folder/img/manufacture.png" alt="manufacture" title="manufacture Icon" class="img-responsive">
													</label>
													<input type="text" id="manufacture" name="manufacture" placeholder="Enter Manufacture" value='' >
												</div>
												<?php } ?>
												
											</div>
											<div class="span6 unit">
												<label class="label">Year
													<sup data-toggle="tooltip" title="" data-original-title="Year">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="year_boat">
														<img src="j-folder/img/reg.png" alt="year" title="year Icon" class="img-responsive">
													</label>
													<input type="text" id="year_boat" name="year_boat" placeholder="Enter Year" onkeypress="return isNumber(event)">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Model 
													<sup data-toggle="tooltip" title="" data-original-title="Model ">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Model" class='car_model'>
														<option value="none" selected disabled="">Select Age</option>
														<option value="3months">Sample</option>
													</select>
													<i></i>
												</label>
											</div>
											<div class="span6 unit">
												<label class="label">Color
													<sup data-toggle="tooltip" title="" data-original-title="Color">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="Color">
														<img src="j-folder/img/color.png" alt="Color" title="Color Icon" class="img-responsive">
													</label>
													<input type="text" id="color" name="color" placeholder="Enter Color">
												</div>
											</div>
										</div>
										
										<div class="j-row">
											<div class="span6 unit">
												<label class="label">Condition 
													<sup data-toggle="tooltip" title="" data-original-title="Condition">
														<img src="img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<label class="input select">
													<select name="Condition">
														<option value="none" selected disabled="">Select condition</option>
														<option value="Excellent">Excellent</option>
														<option value="Good">Good</option>
														<option value="Average">Average</option>
													</select>
													<i></i>
												</label>
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
																<input type="radio" name="checkbox_toggle1" class='currency' value="euro">
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
														<div class="span6 unit"><!-- start Deal Tag -->
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
													</div><!-- end service -->
												
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
															<li><i class="fa fa-check"></i> Up to 5 Images</li>
															<li><i class="fa fa-check"></i>Initially displayed in recent ads on Homepage <a href="img/free.png" class="fancybox"><strong>Example</strong></a></li>
															<li><i class="fa fa-check"></i> Includes 20% VAT</li>
															<li class="text_center"> <br> </li>
															<li class="text_center"><br></li>
															<li class="text_center"> <br></li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
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
															<li><i class="fa fa-check"></i> Up to 9 Images</li>
															<li><i class="fa fa-check"></i> Bump up to 7days in result</li>
															<li><i class="fa fa-check"></i> Deal will Highlight in result</li>
															<li><i class="fa fa-check"></i> Displayed at Most valued deals on Home Page for 7days <a href="img/gold.png" class="fancybox"><strong>Example</strong></a></li>
															<li><i class="fa fa-check"></i> Thumps Up  Symbol will attach</li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<li class="text_center"> <br> </li>
															<div class="gold_bg text_center free_pound" style="display:none;">
																<h3 class="price_amt">£4.99</h3>
															</div>
															<div class="gold_bg text_center free_euro" style="display:none;">
																<h3 class="price_amt">€6.59</h3>
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
															<li><i class="fa fa-check"></i> Image will be display as Slide by Slide</li>
															<li><i class="fa fa-check"></i> Displayed in 3D rotation as vertical banner  on Homepage for 7days <a href="img/platinum.png" class="fancybox"><strong><strong>Example</strong></strong></a></li>
															<li><i class="fa fa-check"></i> Video 30sec can upload </li>
															<li><i class="fa fa-check"></i> Title displayed in Hot deals Marquee <a href="img/marqueimg.png" class="fancybox"> <strong>Example</strong></a></li>
															<li><i class="fa fa-check"></i> Crown symbol will attach </li>
															<div class="platinum_bg text_center free_pound" style="display:none;">
																<h3 class="price_amt">£9.99</h3>
															</div>
															<div class="platinum_bg text_center free_euro" style="display:none;">
																<h3 class="price_amt">€13.20</h3>
															</div>
														</ul>
														
														<div class="hot_deal_rad check">
															<label class="radio">
															<input type="radio" id='platinum_pck' name="select_packge" class='select_pack' value="platinumpackage" data-price="5">
															<i></i>
															Select Platinum 
															</label>
															<!-- <label class="radio">
																<input type="radio" name="platinum_pck" id="platinum_pck" class='bus_consumer' value="platinumpackage">
																<i></i>Select Platinum 
															</label> -->
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
																	<li><i class="fa fa-check"></i> £0.99-7Days (Exclusive VAT)</li>
																	<div class="free_bg text_center " >
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
															<div class="promotion-box-info free_euro" style="display:none;">
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i> €1.31-7Days (Exclusive VAT)</li>
																	<div class="free_bg text_center " >
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
															<div class="promotion-box-info free_pound" style="display:none;">
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i> £1.49 -14 days (Exclusive VAT)</li>
																	<div class="free_bg text_center " >
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
															<div class="promotion-box-info free_euro" style="display:none;">
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i> €1.97 -14 days (Exclusive VAT)</li>
																	<div class="free_bg text_center " >
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
															<div class="promotion-box-info free_pound" style="display:none;">
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i> £1.99-30 Days(Exclusive VAT)</li>
																	<div class="free_bg text_center " >
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
															<div class="promotion-box-info free_euro" style="display:none;">
																<ul class="list-styles">
																	<li><i class="fa fa-check"></i>€2.63-30 Days(Exclusive VAT)</li>
																	<div class="free_bg text_center " >
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
										<!-- Business to Customer End-->
										
										
									</fieldset>
									
									<fieldset>

										<div class="divider gap-bottom-25"></div>

											<!-- free__pck Start -->
											<div class="j-row free_pck" style='display: none;'>
												<div class="alert alert-danger free_img_error" style='display:none;' >
												    <strong>Error!</strong> Please upload upto 3-5 images only
												  </div>
												<div class="span4 unit">
													<div style="width:240px;">
														<div id="dropzone-wrapper">
															<div id="free_wrapper"><div id=textbox_free></div></div>
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
																<div id="output_free"><ul id="free"></ul></div>
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
															<div id="free_urgent_wrapper"><div id=textbox_free_urgent></div></div>
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
																<div id="output_free_urgent"><ul id="free"></ul></div>
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
															<div id="gold_wrapper"><div id=textbox_gold></div></div>
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
																<div id="output_gold"><ul id="free"></ul></div>
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
															<div id="gold_urgent_wrapper"><div id=textbox_gold_urgent></div></div>
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
																<div id="output_gold_urgent"><ul id="free"></ul></div>
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
															<div id="platinum_wrapper"><div id=textbox_platinum></div></div>
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
																<div id="output_platinum"><ul id="free"></ul></div>
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
														<label class="icon-right" for="platinum_weblink">
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
														<label class="icon-right" for="marquee_title">
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
											<!-- end name -->
										
										<!-- start response from server -->
										<div id="response"></div>
										<!-- end response from server -->

									</fieldset>

								</div>
								<!-- end /.content -->

								<div class="footer">
									<input type="submit" class="primary-btn multi-submit-btn video_validate" name='post_create_ad_motors' Value="Post Deal">
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
	<form method='post' action="<?php echo base_url(); ?>postad_create_motors" id='edit_motor_cat'>
		<div class="modal fade" id="motorpoint" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2>Motor Point <span>Category </span></h2>
					</div>
					<div class="modal-body tabs-detailed">
						<div class="row ezone_h3 mod_pad">
							<div class="row">
								<div class="col-sm-12">
									<ul class="nav nav-tabs" id="myTab">
										<li class="active">
											<a href="#cars" data-toggle="tab"> Cars
												<input type='hidden' name='motor_cat' id='motor_cat' value='motorpoint' />
											<input type='hidden' name='motor_sub' id='motor_sub' value='' />
											<input type='hidden' name='motor_sub_sub' id='motor_sub_sub' value='' />
											<input type='hidden' name='motor_sub_sub_sub' id='motor_sub_sub_sub' value='' />
											</a>
										</li>
										<li>
											<a href="#bike_scooter"  data-toggle="tab"> Bikes & Scooters</a>
										</li>
										<li>
											<a href="#Motorhomes_Caravans"  data-toggle="tab"> Motorhomes & Caravans</a>
										</li>
										<li>
											<a href="#Vans_Trucks"  data-toggle="tab">Vans, Trucks & SUV's</a>
										</li>
										<li>
											<a href="#coaches_bus"  data-toggle="tab">Coaches & Busses</a>
										</li>
										<li>
											<a href="#plant_mach"  data-toggle="tab">Plant Machinery</a>
										</li>
										<li>
											<a href="#farming_veh"  data-toggle="tab">Farming Vehicles</a>
										</li>
										<li>
											<a href="#Boats"  data-toggle="tab">Boats</a>
										</li>
									</ul>
									<!-- End Nav Tabs-->
								</div>
							</div>
							<!--All Tabs-->
							<div class="tab-content">
								<!--Tab1 Cars-->
								<div class="tab-pane active" id="cars">
									<div class="col-md-12 post_deal_bor">
										<div class="row">
											<?php $cars_fst1 = array_chunk(@$cars_fst, 6);
												foreach ($cars_fst1 as $car_val) {
													foreach ($car_val as $c_val) { ?>
											<div class="col-md-2 clearfix">
												<h4><a class='edit_cars_cars' id="<?php echo  $c_val['sub_category_id'].','.$c_val['sub_subcategory_id'].',0'; ?>" href="javascript:void(0);"><?php echo $c_val['sub_subcategory_name']; ?></a></h4>
											</div>
											<?php	 	}
												}
												?>
										</div>
										<div class="row col-md-12" >
											<button type="button" id='car_viewmore' class="pull-right btn_v btn-4 btn-4a">View More</button>
										</div>
										<div class="row" id='car_sec_part' style='display:none;'>
											<?php $cars_sec1 = array_chunk(@$cars_sec, 6);
												foreach ($cars_sec1 as $car_sec) {
													foreach ($car_sec as $c_sec) { ?>
											<div class="col-md-2 clearfix">
												<h4><a class='edit_cars_cars' id="<?php echo  $c_sec['sub_category_id'].','.$c_sec['sub_subcategory_id'].',0'; ?>" href="javascript:void(0);"><?php echo $c_sec['sub_subcategory_name']; ?></a></h4>
											</div>
											<?php	 	}
												}
												?>
										</div>
										<div class="row col-md-12" >
											<button type="button" id='car_viewless' style='display:none'; class="pull-right btn_v btn-4 btn-4a">View Less</button>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="bike_scooter">
									<div class="col-md-12 post_deal_bor">
										<div class="row">
											<?php $bikes_fst1 = array_chunk(@$bikes_fst, 6);
												foreach ($bikes_fst1 as $bike_val) {
													foreach ($bike_val as $b_val) { ?>
											<div class="col-md-2 clearfix">
												<h4><a class='edit_bike_scooters' id="<?php echo  $b_val['sub_category_id'].','.$b_val['sub_subcategory_id'].',0'; ?>" href="javascript:void(0);"><?php echo $b_val['sub_subcategory_name']; ?></a></h4>
											</div>
											<?php	 	}
												}
												?>
										</div>
										<div class="row col-md-12" >
											<button type="button" id='bike_viewmore' class="pull-right btn_v btn-4 btn-4a">View More</button>
										</div>
										<div class="row" id='bike_sec_part' style='display:none;'>
											<?php $bikes_sec1 = array_chunk(@$bikes_sec, 6);
												foreach ($bikes_sec1 as $bike_sec) {
													foreach ($bike_sec as $b_sec) { ?>
											<div class="col-md-2 clearfix">
												<h4><a class='edit_bike_scooters' id="<?php echo  $b_sec['sub_category_id'].','.$b_sec['sub_subcategory_id'].',0'; ?>" href="javascript:void(0);"><?php echo $b_sec['sub_subcategory_name']; ?></a></h4>
											</div>
											<?php	 	}
												}
												?>
										</div>
										<div class="row col-md-12" >
											<button type="button" id='bike_viewless' style='display:none'; class="pull-right btn_v btn-4 btn-4a">View Less</button>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="Motorhomes_Caravans">
									<div class="col-md-12 post_deal_bor">
										<div class="row">
											<?php $caravans_fst1 = array_chunk(@$caravans_fst, 6);
												foreach ($caravans_fst1 as $caravans_val) {
													foreach ($caravans_val as $cara_val) { ?>
											<div class="col-md-2 clearfix">
												<h4><a class='edit_motor_caravans' id="<?php echo  $cara_val['sub_category_id'].','.$cara_val['sub_subcategory_id'].',0'; ?>" href="javascript:void(0);"><?php echo $cara_val['sub_subcategory_name']; ?></a></h4>
											</div>
											<?php	 	}
												}
												?>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="Vans_Trucks">
									<div class="col-md-12 post_deal_bor">
										<div class="row">
											<?php $vans_sub_cat_fst1 = array_chunk(@$vans_sub_cat_fst, 6);
												foreach ($vans_sub_cat_fst1 as $vans_val) {
													foreach ($vans_val as $vans_val1) { ?>
											<div class="col-md-2 clearfix">
												<h4><a class='edit_motor_vans_trucks' id="<?php echo  $vans_val1['sub_category_id'].','.$vans_val1['sub_subcategory_id'].',0'; ?>" href="javascript:void(0);"><?php echo $vans_val1['sub_subcategory_name']; ?></a></h4>
											</div>
											<?php	 	}
												}
												?>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="coaches_bus">
									<div class="col-md-12 post_deal_bor">
										<div class="row">
											<?php $coach_sub_cat_fst1 = array_chunk(@$coach_sub_cat_fst, 6);
												foreach ($coach_sub_cat_fst1 as $coach_val) {
													foreach ($coach_val as $coach_val1) { ?>
											<div class="col-md-2 clearfix">
												<h4><a class='edit_motor_coach_bus' id="<?php echo  $coach_val1['sub_category_id'].','.$coach_val1['sub_subcategory_id'].',0'; ?>" href="javascript:void(0);"><?php echo $coach_val1['sub_subcategory_name']; ?></a></h4>
											</div>
											<?php	 	}
												}
												?>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="plant_mach">
									<div class='col-md-12 post_deal_bor'>
										<div class="row">
											<div class="col-md-3 clearfix">
												<h3>Tractor Unit</h3>
												<?php foreach ($tractor_sub_cat_fst as $tractor_sub_cat_fst1) { ?>
												<h4><a class='edit_plant_machinery' id="<?php echo  $tractor_sub_cat_fst1['sub_category_id'].','.$tractor_sub_cat_fst1['sub_subcategory_id'].','.$tractor_sub_cat_fst1['sub_sub_subcategory_id']; ?>" href="javascript:void(0)" ><?php echo ucfirst($tractor_sub_cat_fst1['sub_sub_subcategory_name']); ?></a></h4>
												<?php	} ?>
											</div>
											<div class="col-md-3 clearfix">
												<h3>Rigid Trucks</h3>
												<?php foreach ($rigid_sub_cat_fst as $rigid_sub_cat_fst1) { ?>
												<h4><a class='edit_plant_machinery' id="<?php echo  $rigid_sub_cat_fst1['sub_category_id'].','.$rigid_sub_cat_fst1['sub_subcategory_id'].','.$rigid_sub_cat_fst1['sub_sub_subcategory_id']; ?>" href="javascript:void(0)" ><?php echo ucfirst($rigid_sub_cat_fst1['sub_sub_subcategory_name']); ?></a></h4>
												<?php	} ?>
											</div>
											<div class="col-md-3 clearfix">
												<h3>Trailers</h3>
												<?php foreach ($trailer_sub_cat_fst as $trailer_sub_cat_fst1) { ?>
												<h4><a class='edit_plant_machinery' id="<?php echo  $trailer_sub_cat_fst1['sub_category_id'].','.$trailer_sub_cat_fst1['sub_subcategory_id'].','.$trailer_sub_cat_fst1['sub_sub_subcategory_id']; ?>" href="javascript:void(0)" ><?php echo ucfirst($trailer_sub_cat_fst1['sub_sub_subcategory_name']); ?></a></h4>
												<?php	} ?>
											</div>
											<div class="col-md-3 clearfix">
												<h3>Plant Equipment</h3>
												<?php foreach ($equip_sub_cat_fst as $equip_sub_cat_fst1) { ?>
												<h4><a class='edit_plant_machinery' id="<?php echo  $equip_sub_cat_fst1['sub_category_id'].','.$equip_sub_cat_fst1['sub_subcategory_id'].','.$equip_sub_cat_fst1['sub_sub_subcategory_id']; ?>" href="javascript:void(0)" ><?php echo ucfirst($equip_sub_cat_fst1['sub_sub_subcategory_name']); ?></a></h4>
												<?php	} ?>																				
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="farming_veh">
									<div class='col-md-12 post_deal_bor'>
										<div class="row">
											<?php $farm_sub_cat_fst1 = array_chunk(@$farm_sub_cat_fst, 6);
												foreach ($farm_sub_cat_fst1 as $farm_val) {
													foreach ($farm_val as $farm_val1) { ?>
											<div class="col-md-2 clearfix">
												<h4><a class='edit_motor_farming' id="<?php echo  $farm_val1['sub_category_id'].','.$farm_val1['sub_subcategory_id'].',0'; ?>" href="javascript:void(0);"><?php echo $farm_val1['sub_subcategory_name']; ?></a></h4>
											</div>
											<?php	 	}
												}
												?>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="Boats">
									<div class='col-md-12 post_deal_bor'>
										<div class="row">
											<?php $boat_sub_cat_fst1 = array_chunk(@$boat_sub_cat_fst, 6);
												foreach ($boat_sub_cat_fst1 as $boat_val) {
													foreach ($boat_val as $boat_val1) { ?>
											<div class="col-md-2 clearfix">
												<h4><a class='edit_motor_boats' id="<?php echo  $boat_val1['sub_category_id'].','.$boat_val1['sub_subcategory_id'].',0'; ?>" href="javascript:void(0);"><?php echo $boat_val1['sub_subcategory_name']; ?></a></h4>
											</div>
											<?php	 	}
												}
												?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- Services content End-->

