	<title>365 Deals :: Product View</title>
	
	<style>
		.section-title-01{
			height: 273px;
			background-color: #262626;
			text-align: center;
			position: relative;
			width: 100%;
			overflow: hidden;
		}
		.j-forms{
			box-shadow:none !important;
		}
		.add-to-compare-list {
			position: absolute;
			left: auto;
		}
		.add-to-compare-list span.favourite_label1 {
			background: url(<?php echo base_url(); ?>img/icons/favinactive.png);
			width: 31px;
			height: 31px;
			display: block;
			cursor: pointer;
		}
		.add-to-compare-list span.favourite_label1.active {
			background: url(<?php echo base_url(); ?>img/icons/favactive.png);
			width: 31px;
			height: 31px;
			display: block;
			cursor: pointer !important;
		}
	</style>
	
	<script type="text/javascript">
	$(function(){
		/*favourite ad display*/
		var fav_count = <?php echo count($ads_favourite); ?>;
		if (fav_count != 0) {
			$(".favourite_label1").addClass('active');
		}
		else{
			$(".favourite_label1").removeClass('active');
		}
		$(".favourite_label").click(function(){
			var log = $("#login_status").val();
			if (log == 'no') {
				window.location.href = "<?php echo base_url(); ?>login";
			}
			var val = $(".favourite_label1").hasClass('active');
			/*adding to favourite*/
			if (val == false) {
				$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>description_view/add_favourite",
				data: {
					ad_id: $("#ad_id").val(), 
					login_id: $("#login_id").val()
				},
				// dataType: "json",
				success: function (data) {
				}
			})
				$(".favourite_label1").addClass('active');
			}
			else{
				/*deleting from favourite*/
				$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>description_view/remove_favourite",
				data: {
					ad_id: $("#ad_id").val(), 
					login_id: $("#login_id").val()
				},
				// dataType: "json",
				success: function (data) {
				}
			})
				$(".favourite_label1").removeClass('active');
			}
		});
	});
	</script>
	
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-common-libraries.js"></script>	
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-functions.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-thumbsgeneral.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-thumbsstrip.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-touchthumbs.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-panelsbase.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-strippanel.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-gridpanel.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-thumbsgrid.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-tiles.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-tiledesign.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-avia.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-slider.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-sliderassets.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-touchslider.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-zoomslider.js"></script>	
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-video.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-gallery.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-lightbox.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-carousel.js"></script>
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/js/ug-api.js"></script>

	<link rel='stylesheet' href="<?php echo base_url(); ?>unitegallery/css/unite-gallery.css" type='text/css' />
	
	<script type='text/javascript' src="<?php echo base_url(); ?>unitegallery/themes/default/ug-theme-default.js"></script>
	<link rel='stylesheet' 		  href="<?php echo base_url(); ?>unitegallery/themes/default/ug-theme-default.css" type='text/css' />
	
	<link href="<?php echo base_url(); ?>src/easy-responsive-tabs.css" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>j-folder/css/j-forms.css">
	
	<!-- Section Title-->    
	<div class="section-title-01">
		<!-- Parallax Background -->
		<div class="bg_parallax image_01_parallax"></div>
		<!-- Parallax Background -->

	</div>   
	<!-- End Section Title-->
	
	<!--Content Central -->
	<section class="content-central">
		<!-- Shadow Semiboxed -->
		<div class="semiboxshadow text-center">
			<img src="<?php echo base_url(); ?>img/img-theme/shp.png" class="img-responsive" alt="Shadow" title="Shadow view">
		</div>
		<?php 
		/*ad_ description details*/
		foreach ($ads_desc as $ads_desc_val) {
			/*ad id*/
			$ad_id_no = $ads_desc_val->ad_id;
			/*login_id*/
			//$login_id = $ads_desc_val->login_id;
			/*package type and urgent*/
			$package_type = $ads_desc_val->package_type;
			$urgent_pack = $ads_desc_val->urgent_package;
			/*currency symbol*/ 
	        	if ($ads_desc_val->currency == 'pound') {
	        		$currency = '£';
	        	}
	        	else if ($ads_desc_val->currency == 'euro') {
	        		$currency = '€';
	        	}
			$tag = $ads_desc_val->deal_tag;
			$desc = $ads_desc_val->deal_desc;
				if($ads_desc_val->ad_type == 'consumer'){
					$name = @mysql_result(mysql_query("SELECT contact_name FROM contactinfo_consumer WHERE ad_id = '$ads_desc_val->ad_id'"), 0, 'contact_name');
					$mobile = @mysql_result(mysql_query("SELECT mobile FROM contactinfo_consumer WHERE ad_id = '$ads_desc_val->ad_id'"), 0, 'mobile');
				}
				if($ads_desc_val->ad_type == 'business'){
					$name = @mysql_result(mysql_query("SELECT contact_person FROM contactinfo_business WHERE ad_id = '$ads_desc_val->ad_id'"), 0, 'contact_person');
					$mobile = @mysql_result(mysql_query("SELECT mobile FROM contactinfo_business WHERE ad_id = '$ads_desc_val->ad_id'"), 0, 'mobile');
				}
				$posted_on = date("M d, Y H:i:s", strtotime($ads_desc_val->created_on));
				$dealid = $ads_desc_val->ad_prefix.$ads_desc_val->ad_id;
				$price = $currency.$ads_desc_val->price;

				/*weblink*/
			if ($ads_desc_val->web_link != '') {
				$web_url = $ads_desc_val->web_link;
			}
			else{
				$web_url = '';
			}

		}
		 ?>
		<!-- content info - Blog-->
			<div class="content_info">
				<div class="paddings-mini">
					<div class="container pad_bott_140">
						<div class="row">
							<div class="col-md-8 col-sm-8 col-md-offset-2">
								<div id="google_image_div" style="height: 90px; width: 728px; overflow:hidden; position:absolute"><a id="aw0" target="_blank" href="http://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=Cf7LwJMO6VpHQBJO9oAOAr5WYCsznkrEIhNvL1sQCwI23ARABIIf53Bhg5erjA6ABxOqCvAPIAQKpAlrhooF8mE8-4AIAqAMByAOZBKoEmgJP0DxfPWF_oPrU-4uHuGEdwvgBtrD2nenG16YuL7WWz9IPiyroBBcy6h8H1mdIwkPyuhpcVBU6GENfO9whp64UFUu25xglRrZgXRovyjVKndImng7lJo2DAoIu8f6BHRZ8m3PPXiFlkdCrykt_hcO6hCrIay1chjFa4LSEMMwwAL__GWHpcJZamHoFHue79eruFoKqYQ_5qc_q-fwGW5DyLLhS95EMvSujU0JYCbAzV6-D2h88rtcTWi0o2roAKayo_T-4vXXCNTFbnfg6o00pVWwWfGr1ZPLZc7TYHXD-DBLik8WPB3z6_vpLnTxFkgRIAiV3D8iNjXymyzB1iLkL7QIwt24fQIklF-2qfyfXVeGLIkl-LcpKvJjgBAGIBgGgBgKAB6SV_UOoB6a-G9gHAQ&amp;num=1&amp;cid=5Gin6BFGPItI29raOJ8PNKku&amp;sig=AOD64_0LHtpBuQpKxVmPUEeu1KsOpnExIA&amp;client=ca-pub-5105067122536534&amp;nm=4&amp;nx=44&amp;ny=25&amp;mb=2&amp;adurl=http://madeofgreat.tatamotors.com/zica/%3Futm_Source%3DGoogle_GDN%26utm_model%3DZica%26utm_channel%3DSEM%26utm_medium%3DGTZ_Zica_GDN_Contextual_comp_Kuv100%26utm_campaign%3Dzica_jan16_mx%26utm_term%3DGDN_KUV_Contextual%26utm_adposition%3DTop%26utm_network%3DDisplay_Network%26utm_placement%3D489f5d964ffa4cc3.anonymous.google%26utm_placementcategory%3DGoogle_Adwords%26utm_bannersize%3D728x90.jpg%26utm_creative%3DGeneric" data-original-click-url="http://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=Cf7LwJMO6VpHQBJO9oAOAr5WYCsznkrEIhNvL1sQCwI23ARABIIf53Bhg5erjA6ABxOqCvAPIAQKpAlrhooF8mE8-4AIAqAMByAOZBKoEmgJP0DxfPWF_oPrU-4uHuGEdwvgBtrD2nenG16YuL7WWz9IPiyroBBcy6h8H1mdIwkPyuhpcVBU6GENfO9whp64UFUu25xglRrZgXRovyjVKndImng7lJo2DAoIu8f6BHRZ8m3PPXiFlkdCrykt_hcO6hCrIay1chjFa4LSEMMwwAL__GWHpcJZamHoFHue79eruFoKqYQ_5qc_q-fwGW5DyLLhS95EMvSujU0JYCbAzV6-D2h88rtcTWi0o2roAKayo_T-4vXXCNTFbnfg6o00pVWwWfGr1ZPLZc7TYHXD-DBLik8WPB3z6_vpLnTxFkgRIAiV3D8iNjXymyzB1iLkL7QIwt24fQIklF-2qfyfXVeGLIkl-LcpKvJjgBAGIBgGgBgKAB6SV_UOoB6a-G9gHAQ&amp;num=1&amp;cid=5Gin6BFGPItI29raOJ8PNKku&amp;sig=AOD64_0LHtpBuQpKxVmPUEeu1KsOpnExIA&amp;client=ca-pub-5105067122536534&amp;adurl=http://madeofgreat.tatamotors.com/zica/%3Futm_Source%3DGoogle_GDN%26utm_model%3DZica%26utm_channel%3DSEM%26utm_medium%3DGTZ_Zica_GDN_Contextual_comp_Kuv100%26utm_campaign%3Dzica_jan16_mx%26utm_term%3DGDN_KUV_Contextual%26utm_adposition%3DTop%26utm_network%3DDisplay_Network%26utm_placement%3D489f5d964ffa4cc3.anonymous.google%26utm_placementcategory%3DGoogle_Adwords%26utm_bannersize%3D728x90.jpg%26utm_creative%3DGeneric"><img src="https://tpc.googlesyndication.com/simgad/2844648695442786169" border="0" width="728" alt="" class="img_ad" onload=""></a><style>div,ul,li{margin:0;padding:0;}.abgc{height:15px;position:absolute;right:16px;text-rendering:geometricPrecision;top:0;width:15px;z-index:9020;}.abgb{height:15px;width:15px;}.abgc img{display:block;}.abgc svg{display:block;}.abgs{display:none;height:100%;}.abgl{text-decoration:none;}.abgi{fill-opacity:1.0;fill:#00aecd;stroke:none;}.abgbg{fill-opacity:1.0;fill:lightgray;stroke:none;}.abgtxt{fill:black;font-family:'Arial';font-size:100px;overflow:visible;stroke:none;}</style><div id="abgc" class="abgc" dir="ltr"><div id="abgb" class="abgb"><svg width="100%" height="100%"><rect class="abgbg" width="100%" height="100%"></rect><svg class="abgi" x="0px"><path d="M7.5,1.5a6,6,0,1,0,0,12a6,6,0,1,0,0,-12m0,1a5,5,0,1,1,0,10a5,5,0,1,1,0,-10ZM6.625,11l1.75,0l0,-4.5l-1.75,0ZM7.5,3.75a1,1,0,1,0,0,2a1,1,0,1,0,0,-2Z"></path></svg></svg></div><div id="abgs" class="abgs"><a id="abgl" class="abgl" href="https://www.google.com/url?ct=abg&amp;q=https://www.google.com/adsense/support/bin/request.py%3Fcontact%3Dabg_afc%26url%3Dhttps://www.gumtree.com/search%253Fsearch_category%253Dall%2526q%253Dcars%2526tq%253D%25257B%252522i%252522%25253A%252522cars%252522%25252C%252522s%252522%25253A%252522cars%252522%25252C%252522p%252522%25253A1%25252C%252522t%252522%25253A14%25257D%2526search_location%253D%26gl%3DIN%26hl%3Den%26client%3Dca-pub-5105067122536534%26ai0%3DCf7LwJMO6VpHQBJO9oAOAr5WYCsznkrEIhNvL1sQCwI23ARABIIf53Bhg5erjA6ABxOqCvAPIAQKpAlrhooF8mE8-4AIAqAMByAOZBKoEmgJP0DxfPWF_oPrU-4uHuGEdwvgBtrD2nenG16YuL7WWz9IPiyroBBcy6h8H1mdIwkPyuhpcVBU6GENfO9whp64UFUu25xglRrZgXRovyjVKndImng7lJo2DAoIu8f6BHRZ8m3PPXiFlkdCrykt_hcO6hCrIay1chjFa4LSEMMwwAL__GWHpcJZamHoFHue79eruFoKqYQ_5qc_q-fwGW5DyLLhS95EMvSujU0JYCbAzV6-D2h88rtcTWi0o2roAKayo_T-4vXXCNTFbnfg6o00pVWwWfGr1ZPLZc7TYHXD-DBLik8WPB3z6_vpLnTxFkgRIAiV3D8iNjXymyzB1iLkL7QIwt24fQIklF-2qfyfXVeGLIkl-LcpKvJjgBAGIBgGgBgKAB6SV_UOoB6a-G9gHAQ&amp;usg=AFQjCNFxkwIsu3wITVh_JTztWaKBt3pgOg" target="_blank"><svg width="100%" height="100%"><path class="abgbg" d="M0,0L96,0L96,15L4,15s-4,0,-4,-4z"></path><svg class="abgtxt" x="5px" y="11px" width="34px"><text>Ads by</text></svg><svg class="abgtxt" x="41px" y="11px" width="38px"><text>Google</text></svg><svg class="abgi" x="81px"><path d="M7.5,1.5a6,6,0,1,0,0,12a6,6,0,1,0,0,-12m0,1a5,5,0,1,1,0,10a5,5,0,1,1,0,-10ZM6.625,11l1.75,0l0,-4.5l-1.75,0ZM7.5,3.75a1,1,0,1,0,0,2a1,1,0,1,0,0,-2Z"></path></svg></svg></a></div></div><script>var abgp={elp:document.getElementById('abgcp'),el:document.getElementById('abgc'),ael:document.getElementById('abgs'),iel:document.getElementById('abgb'),hw:15,sw:96,hh:15,sh:15,himg:'https://tpc.googlesyndication.com'+'/pagead/images/abg/icon.png',simg:'https://tpc.googlesyndication.com/pagead/images/abg/en.png',alt:'Ads by Google',t:'Ads by',tw:34,t2:'Google',t2w:38,tbo:0,popuptext:'',att:'adsbygoogle',ff:'',halign:'right',fe:false,iba:false,lttp:true,umd:false,uic:false,uit:false,ict:document.getElementById('cbb'),icd:undefined,uaal:false};</script><script src="https://tpc.googlesyndication.com/pagead/js/r20160204/r20110914/abg.js"></script><style>.cbc{background-image: url('https://tpc.googlesyndication.com/pagead/images/x_button_blue2.png');background-position: right top;background-repeat: no-repeat;cursor:pointer;height:15px;right:0;top:0;margin:0;overflow:hidden;padding:0;position:absolute;transform: scaleX(1);width:16px;z-index:9010;}.cbc.cbc-hover {background-image: url('https://tpc.googlesyndication.com/pagead/images/x_button_dark.png');}.cbc > .cb-x{height: 15px;position:absolute;width: 16px;right:0;top:0;}.cb-x > .cb-x-svg{background-color: lightgray;position:absolute;}.cbc.cbc-hover > .cb-x > .cb-x-svg{background-color: #58585a;}.cb-x > .cb-x-svg > .cb-x-svg-path{fill : #00aecd;}.cbc.cbc-hover > .cb-x > .cb-x-svg > .cb-x-svg-path{fill : white;}.cb-x > .cb-x-svg > .cb-x-svg-s-path{fill : white;}</style><div id="cbc" class="cbc"><div id="cb-x" class="cb-x"></div> </div> <style>.ddmc{background:#ccc;color:#000;padding:0;position:absolute;z-index:9020;max-width:100%;box-shadow:2px 2px 3px #aaaaaa;}.ddmc.left{margin-right:0;left:0px;}.ddmc.right{margin-left:0;right:0px;}.ddmc.top{bottom:20px;}.ddmc.bottom{top:20px;}.ddmc .tip{border-left:4px solid transparent;border-right:4px solid transparent;height:0;position:absolute;width:0;font-size:0;line-height:0;}.ddmc.bottom .tip{border-bottom:4px solid #ccc;top:-4px;}.ddmc.top .tip{border-top:4px solid #ccc;bottom:-4px;}.ddmc.right .tip{right:3px;}.ddmc.left .tip{left:3px;}.ddmc .dropdown-content{display:block;}.dropdown-content{display:none;border-collapse:collapse;}.dropdown-item{font:12px Arial,sans-serif;cursor:pointer;padding:3px 7px;vertical-align:middle;}.dropdown-item-hover, a.dropdown-item.dropdown-item-hover {background:#58585a;color:#fff;}.dropdown-content > table{border-collapse:collapse;border-spacing:0;}.dropdown-content > table > tbody > tr > td{padding:0;}a.dropdown-item {color: inherit;cursor: inherit;display: block;text-decoration: inherit;}</style><div id="ddmc" style="display:none" class="ddmc right bottom"><div class="tip"></div><div class="dropdown-content"><table><tbody><tr><td><div id="pubmute" style="border-bottom:1px solid #999;" class="dropdown-item"><span>Ad covers the page</span></div></td></tr><tr><td><div id="admute" class="dropdown-item"><span>Stop seeing this ad</span></div></td></tr></tbody></table></div></div><script>(function(){var h=this,k=function(a,b){var c=a.split("."),d=h;c[0]in d||!d.execScript||d.execScript("var "+c[0]);for(var f;c.length&&(f=c.shift());)c.length||void 0===b?d=d[f]?d[f]:d[f]={}:d[f]=b},l=function(a,b,c){return a.call.apply(a.bind,arguments)},n=function(a,b,c){if(!a)throw Error();if(2<arguments.length){var d=Array.prototype.slice.call(arguments,2);return function(){var c=Array.prototype.slice.call(arguments);Array.prototype.unshift.apply(c,d);return a.apply(b,c)}}return function(){return a.apply(b,arguments)}},p=function(a,b,c){p=Function.prototype.bind&&-1!=Function.prototype.bind.toString().indexOf("native code")?l:n;return p.apply(null,arguments)};var r="undefined"!=typeof DOMTokenList,t=function(a,b){if(r){var c=a.classList;0==c.contains(b)&&c.toggle(b)}else if(c=a.className){for(var c=c.split(/\s+/),d=!1,f=0;f<c.length&&!d;++f)d=c[f]==b;d||(c.push(b),a.className=c.join(" "))}else a.className=b},x=function(a,b){if(r){var c=a.classList;1==c.contains(b)&&c.toggle(b)}else if((c=a.className)&&!(0>c.indexOf(b))){for(var c=c.split(/\s+/),d=0;d<c.length;++d)c[d]==b&&c.splice(d--,1);a.className=c.join(" ")}};var y=function(a,b,c){a.addEventListener?a.addEventListener(b,c,!1):a.attachEvent&&a.attachEvent("on"+b,c)};var z=String.prototype.trim?function(a){return a.trim()}:function(a){return a.replace(/^[\s\xa0]+|[\s\xa0]+$/g,"")},A=function(a,b){return a<b?-1:a>b?1:0};var B;a:{var C=h.navigator;if(C){var D=C.userAgent;if(D){B=D;break a}}B=""};var aa=-1!=B.indexOf("Opera")||-1!=B.indexOf("OPR"),E=-1!=B.indexOf("Trident")||-1!=B.indexOf("MSIE"),ba=-1!=B.indexOf("Edge"),F=-1!=B.indexOf("Gecko")&&!(-1!=B.toLowerCase().indexOf("webkit")&&-1==B.indexOf("Edge"))&&!(-1!=B.indexOf("Trident")||-1!=B.indexOf("MSIE"))&&-1==B.indexOf("Edge"),ca=-1!=B.toLowerCase().indexOf("webkit")&&-1==B.indexOf("Edge"),da=function(){var a=B;if(F)return/rv\:([^\);]+)(\)|;)/.exec(a);if(ba)return/Edge\/([\d\.]+)/.exec(a);if(E)return/\b(?:MSIE|rv)[: ]([^\);]+)(\)|;)/.exec(a);if(ca)return/WebKit\/(\S+)/.exec(a)},G=function(){var a=h.document;return a?a.documentMode:void 0},H=function(){if(aa&&h.opera){var a;var b=h.opera.version;try{a=b()}catch(c){a=b}return a}a="";(b=da())&&(a=b?b[1]:"");return E&&(b=G(),null!=b&&b>parseFloat(a))?String(b):a}(),I={},J=function(a){if(!I[a]){for(var b=0,c=z(String(H)).split("."),d=z(String(a)).split("."),f=Math.max(c.length,d.length),e=0;0==b&&e<f;e++){var m=c[e]||"",g=d[e]||"",u=RegExp("(\\d*)(\\D*)","g"),v=RegExp("(\\d*)(\\D*)","g");do{var q=u.exec(m)||["","",""],w=v.exec(g)||["","",""];if(0==q[0].length&&0==w[0].length)break;b=A(0==q[1].length?0:parseInt(q[1],10),0==w[1].length?0:parseInt(w[1],10))||A(0==q[2].length,0==w[2].length)||A(q[2],w[2])}while(0==b)}I[a]=0<=b}},K=h.document,ea=K&&E?G()||("CSS1Compat"==K.compatMode?parseInt(H,10):5):void 0;var L;if(!(L=!F&&!E)){var M;if(M=E)M=9<=Number(ea);L=M}L||F&&J("1.9.1");E&&J("9");var fa=function(a,b){if(!a||!b)return!1;if(a.contains&&1==b.nodeType)return a==b||a.contains(b);if("undefined"!=typeof a.compareDocumentPosition)return a==b||!!(a.compareDocumentPosition(b)&16);for(;b&&a!=b;)b=b.parentNode;return b==a};var ga=function(a,b,c){var d="mouseenter_custom"==b,f=N(b);return function(e){e||(e=window.event);if(e.type==f){if("mouseenter_custom"==b||"mouseleave_custom"==b){var m;if(m=d?e.relatedTarget||e.fromElement:e.relatedTarget||e.toElement)for(var g=0;g<a.length;g++)if(fa(a[g],m))return}c(e)}}},N=function(a){return"mouseenter_custom"==a?"mouseover":"mouseleave_custom"==a?"mouseout":a};var O=function(a,b,c,d,f,e,m,g,u,v){this.m=a;this.ca=b;this.K=c;this.aa=d;this.H=f;this.G=e;this.o=null;this.I=!1;this.F=v;this.T=u;this.j=document.getElementById("pubmute"+g);this.i=document.getElementById("admute"+g);this.l=document.getElementById("wta"+g);this.U=parseInt(g,10)||0;this.B();this.m.className=["ddmc",m&1?"left":"right",m&2?"top":"bottom"].join(" ")};O.prototype.B=function(){P(this.m,"mouseenter_custom",this,this.v);P(this.m,"mouseleave_custom",this,this.L);this.j&&(P(this.j,"mouseenter_custom",this,this.Z),P(this.j,"mouseleave_custom",this,this.A),y(this.j,"click",p(this.ba,this)));this.i&&(P(this.i,"mouseenter_custom",this,this.P),P(this.i,"mouseleave_custom",this,this.u),y(this.i,"click",p(this.$,this)));this.l&&(P(this.l,"mouseenter_custom",this,this.da),P(this.l,"mouseleave_custom",this,this.C),y(this.l,"click",p(this.Y,this)))};O.prototype.ba=function(){Q(this);R(this,0);var a=this.K;null!=a&&a();S(this,"user_feedback_menu_option","3",!0)};O.prototype.$=function(){Q(this);R(this,1);var a=this.K;null!=a&&a();S(this,"user_feedback_menu_option","1",!0)};var R=function(a,b){var c={type:b,close_button_token:a.G,creative_conversion_url:a.H,ablation_config:a.T,undo_callback:a.aa,creative_index:a.U};if(a.F)a.F.fireOnObject("mute_option_selected",c);else{var d;a:{d=["muteSurvey"];for(var f=h,e;e=d.shift();)if(null!=f[e])f=f[e];else{d=null;break a}d=f}d&&d.setupSurveyPage(c)}};O.prototype.Y=function(){Q(this);S(this,"closebutton_whythisad_click","1",!1)};var T=function(a,b){a.m.style.display=b?"":"none"};O.prototype.L=function(){this.o=h.setTimeout(p(function(){Q(this);this.o=null},this),500)};O.prototype.v=function(){null!=this.o&&(h.clearTimeout(this.o),this.o=null)};var Q=function(a){var b=a.ca;null!=b&&b();U(a)&&T(a,!1)};O.prototype.Z=function(){this.j&&t(this.j,"dropdown-item-hover");this.u();this.C()};O.prototype.A=function(){this.j&&x(this.j,"dropdown-item-hover")};O.prototype.P=function(){this.i&&t(this.i,"dropdown-item-hover");this.A();this.C()};O.prototype.u=function(){this.i&&x(this.i,"dropdown-item-hover")};O.prototype.da=function(){this.l&&t(this.l,"dropdown-item-hover");this.u();this.A()};O.prototype.C=function(){this.l&&x(this.l,"dropdown-item-hover")};var U=function(a){return"none"!==a.m.style.display};O.prototype.toggle=function(){U(this)?U(this)&&T(this,!1):(T(this,!0),this.I||(this.I=!0,S(this,"user_feedback_menu_interaction")))};var S=function(a,b,c,d){a=a.H+"&label="+b+(c?"&label_instance="+c:"")+(d?"&cbt="+a.G:"");b=window;b.google_image_requests||(b.google_image_requests=[]);c=b.document.createElement("img");c.src=a;b.google_image_requests.push(c)},P=function(a,b,c,d){d=ga([a],b,p(d,c));y(a,N(b),p(d,c))};var V=function(a,b,c,d,f,e,m,g,u,v,q,w,X){this.creativeConversionUrl=f;this.S=e;this.R=document.getElementById("cb-x"+q);f=p(this.w,this);e=p(this.J,this);var ha=p(this.M,this);d?(g=g?1:0,u&&(g|=2),d=new O(d,f,e,ha,this.creativeConversionUrl,this.S,g,q,w,X)):d=null;this.h=d;this.N=document.getElementById("pbc");this.g=a;this.O=b;this.D=c;this.s=X;"undefined"!=typeof SVGElement&&"undefined"!=typeof document.createElementNS&&v&&(this.g.style.backgroundImage="none",this.R.appendChild(ia(m)));this.B()},W;V.prototype.B=function(){y(this.g,"click",p(this.V,this));y(this.g,"mouseover",p(this.X,this));y(this.g,"mouseout",p(this.W,this))};V.prototype.V=function(){this.h&&(this.h.v(),this.h.toggle())};V.prototype.X=function(){this.h&&this.h.v();null!==this.g&&t(this.g,"cbc-hover")};V.prototype.W=function(){this.h&&U(this.h)?this.h.L():this.w()};var ia=function(a){var b=document.createElementNS("//www.w3.org/2000/svg","svg"),c=document.createElementNS("//www.w3.org/2000/svg","path"),d=document.createElementNS("//www.w3.org/2000/svg","path"),f=1.15/Math.sqrt(2),e=.2*a,f="M"+(e+f+1)+","+e+"L"+(a/2+1)+","+(a/2-f)+"L"+(a-e-f+1)+","+e+"L"+(a-e+1)+","+(e+f)+"L"+(a/2+f+1)+","+a/2+"L"+(a-e+1)+","+(a-e-f)+"L"+(a-e-f+1)+","+(a-e)+"L"+(a/2+1)+","+(a/2+f)+"L"+(e+f+1)+","+(a-e)+"L"+(e+1)+","+(a-e-f)+"L"+(a/2-f+1)+","+a/2+"L"+(e+1)+","+(e+f)+"Z",e="M0,0L1,0L1,"+a+"L0,"+a+"Z";b.setAttribute("class","cb-x-svg");b.setAttribute("width",a+1);b.setAttribute("height",a);b.appendChild(c);b.appendChild(d);c.setAttribute("d",f);c.setAttribute("class","cb-x-svg-path");d.setAttribute("d",e);d.setAttribute("class","cb-x-svg-s-path");return b},Y=function(a){a&&(a.style.display="block")},Z=function(a){a&&(a.style.display="none")};V.prototype.w=function(){null!==this.g&&x(this.g,"cbc-hover")};V.prototype.J=function(){this.w();this.s?this.s.showOnly(0):(Z(this.g),Z(this.D),Z(this.N),Y(this.O))};V.prototype.M=function(){this.s?this.s.resetAll():(Y(this.g),Y(this.D),Y(this.N),Z(this.O))};k("cbb",function(a,b,c,d,f,e,m,g,u,v){y(window,"load",function(){a&&(W=new V(a,document.getElementById("cbtf"),b,c,d,f,15,m,g,u,v,e,window.adSlot))})});k("cbbha",function(){W.J()});k("cbbsa",function(){W.M()});}).call(this);cbb(document.getElementById('cbc'),document.getElementById('google_image_div'),document.getElementById('ddmc'),'https://googleads.g.doubleclick.net/pagead/conversion/?ai\x3dCf7LwJMO6VpHQBJO9oAOAr5WYCsznkrEIhNvL1sQCwI23ARABIIf53Bhg5erjA6ABxOqCvAPIAQKpAlrhooF8mE8-4AIAqAMByAOZBKoEmgJP0DxfPWF_oPrU-4uHuGEdwvgBtrD2nenG16YuL7WWz9IPiyroBBcy6h8H1mdIwkPyuhpcVBU6GENfO9whp64UFUu25xglRrZgXRovyjVKndImng7lJo2DAoIu8f6BHRZ8m3PPXiFlkdCrykt_hcO6hCrIay1chjFa4LSEMMwwAL__GWHpcJZamHoFHue79eruFoKqYQ_5qc_q-fwGW5DyLLhS95EMvSujU0JYCbAzV6-D2h88rtcTWi0o2roAKayo_T-4vXXCNTFbnfg6o00pVWwWfGr1ZPLZc7TYHXD-DBLik8WPB3z6_vpLnTxFkgRIAiV3D8iNjXymyzB1iLkL7QIwt24fQIklF-2qfyfXVeGLIkl-LcpKvJjgBAGIBgGgBgKAB6SV_UOoB6a-G9gHAQ\x26sigh\x3dbrrDclAWOYs','9roku1nkFEUIhNvL1sQCEOTF-7EBGJST9kMiGHRhdGFtb3RvcnMuY29tL1RhdGFfWmljYTIICAUTGLi2ExRCF2NhLXB1Yi01MTA1MDY3MTIyNTM2NTM0SABYAnAB','{\x22key_value\x22:[]}',false,false,false,'');</script></div>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<div class="bread_ccrumbs">
								<div class="container">
									<div class="crumbs">
										<ul>
											<li><a href="<?php echo base_url(); ?>index.php">
												Home
												<input type='hidden' name="login_status" id="login_status" value="<?php echo @$login_status; ?>" />
												<input type='hidden' name="req_url" id="req_url" value="<?php echo @$req_url; ?>" />
											</a></li>
											<li>/</li>
											<li><a href="<?php echo base_url(); ?>deals_administrator">Deal Administrator</a></li>  
											<li></li>
										</ul>    
									</div>
								</div>  
							</div> 
						</div> 
						<div class="row">
							<div class="col-md-9 col-sm-8 single-blog">
								<!-- Post Item Gallery-->
								<div class="post-item">
									<div class="row">
										<!-- Post Header-->
										<div class="col-sm-9 col-xs-8">
											<?php if ($urgent_pack != "") { ?>
												<div class="featured-badge pull-right">
												<span>Urgent</span>
											</div>
											<?php	} ?>
											<div class="post-header">
												<?php if ($package_type == 'platinum') { ?>
													<div class="hidden-xs post-format-icon post-format-standard">
														<img src="<?php echo base_url(); ?>img/icons/crown.png" alt="Crown" title="Best Deal">
													</div>
												<?php	} ?>

												<?php if ($package_type == 'gold') { ?>
													<div class="hidden-xs post-format-icon post-format-standard">
														<img src="<?php echo base_url(); ?>img/icons/thumb.png" alt="Thumb" title="Right Deal">
													</div>
												<?php	} ?>

												<div class="post-info-wrap">
													<h2 class="post-title"><a href="#"><?php echo $tag; ?></a></h2>
													<div class="post-meta" style="padding-top: 8px;">
														<ul>
															<li>
																<i class="fa fa-user"></i>
																<a href="#"><?php echo $name; ?></a>
															</li>

															<li>
																<i class="fa fa-clock-o"></i>
																<span><?php echo $posted_on; ?></span>
															</li>

															<li>
																<i class="fa fa-eye"></i>
																<span>234 Views</span>
															</li>
															
															<li>
																<span>Deal ID : <?php echo $dealid; ?></span>
															</li>
														</ul>                      
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-2 col-xs-4  post-header1">
											<div class="add-to-compare-list">
												<input type="hidden" name="ad_id" id="ad_id" value="<?php echo $ad_id_no; ?>" />
												<input type="hidden" name="login_id" id="login_id" value="<?php echo @$login; ?>" />
												<a href="javascript:void(0);" class="favourite_label">
													<span class="favourite_label1" title="Add to favourites"></span>
												</a>
											</div>
										</div>
										<!-- Post Header-->

										<!-- Post Media-->
										<div class="col-sm-12 col-xs-12">
											<div id="gallery" style="display:none;">
												<?php foreach ($ads_pics as $ads_pics_val) {

												 ?>
													<img alt="Preview Image 1"
													 src="<?php echo base_url(); ?>ad_images/<?php echo $ads_pics_val->img_name; ?>" class="img-responsive" title="<?php echo $ads_pics_val->img_name; ?>"
													 data-image="<?php echo base_url(); ?>ad_images/<?php echo $ads_pics_val->img_name; ?>">
												<?php } ?>
											</div>
										</div>	
										<!-- Post Media-->

										
										<div class="col-sm-12 col-xs-12 top_20">
											<div id="parentHorizontalTab">
												<ul class="resp-tabs-list hor_1">
													<li>Description</li>
													<li>Reviews</li>
													<li>Map View</li>
												</ul>
												<div class="resp-tabs-container hor_1">
													<div>
														<p><?php echo $desc; ?></p><br>
														
														<p>
															<!-- body content for services -->
															<div class="row">
																<?php
																if (!empty($body_content)) {
																$body_content1 = array_chunk($body_content, 2, true);
																 foreach ($body_content1 as $val) {
																 	foreach ($val as $k => $value) { ?>
																 		<div class="col-sm-6">
																			<table class="table table-bordered">
																				<tbody>
																					<tr><th><?php echo $k; ?></th><td><?php echo $value; ?></td></tr>
																				</tbody>
																			</table>
																		</div>
																 <?php	}
																  	}
																  } ?>
															</div>
														</p>
														
													</div>
													<div>
														<div class="comments-container">
															<ul id="comments-list" class="comments-list">
																<?php foreach ($ads_review as $r_val) { ?>
																	<li>
																	<div class="comment-main-level">
																		<!-- Avatar 
																			<tr><th>Weblink</th>
																			<td><a href="http://365deals.igravitas.in/" target="_blank">99 Deals</a></td>
																		</tr>-->
																		<!-- <div class="comment-avatar"><img src="<?php echo base_url(); ?>img/icons/man.png" alt="man" title="man"></div> -->
																		<!-- Contenedor del Comentario -->
																		<div class="comment-box">
																			<div class="comment-head">
																				<h6 class="comment-name"><a href=""><?php echo $r_val->review_title; ?></a></h6>
																				<span><?php echo date("M d, Y", strtotime($r_val->review_time)); ?></span>
																				<p class="reting_view">
																					<?php echo $r_val->rating; ?> Ratings
																				</p>
																			</div>
																			<div class="comment-content">
																				<?php echo $r_val->review_msg; ?>
																			</div>
																		</div>
																	</div>
																	<!-- Respuestas de los comentarios -->
																</li>
																<?php	} ?>
															</ul>
														</div>
													</div>
													<div>
														<p>
															<?php foreach ($ads_loc as $ads_loc_val) { ?>
														 <iframe src = "https://maps.google.com/maps?q=<?php echo $ads_loc_val->latt; ?>,<?php echo $ads_loc_val->longg; ?>&hl=es;z=5&amp;output=embed" width="500px" height="500px"></iframe>
														 <?php } ?>
														</p>
													</div>
												</div>
											</div>
										</div>

										<!-- Post Footer-->
										<div class="col-sm-12 col-xs-12">
											<div class="post-footer">
												<!-- Post Social-->
												<ul class="post-social tooltip-hover">
													<li>
														<a href="#" class="social-facebook" data-toggle="tooltip" title="" data-original-title="Share on Facebook">
															<i class="fa fa-facebook"></i>
															<i class="fa fa-facebook facebook"></i>
														</a>
													</li>

													<li>
														<a href="#" class="social-twitter" data-toggle="tooltip" title="" data-original-title="Share on Twitter">
															<i class="fa fa-twitter"></i>
															<i class="fa fa-twitter twitter"></i>
														</a>
													</li>

													<li>
														<a href="#" class="social-google-plus" data-toggle="tooltip" title="" data-original-title="Share on Google">
															<i class="fa fa-google-plus"></i>
															<i class="fa fa-google-plus google-plus"></i>
														</a>
													</li>

													<li>
														<a href="#" class="social-pinterest" data-toggle="tooltip" title="" data-original-title="Share on pinterest">
															<i class="fa fa-pinterest"></i>
															<i class="fa fa-pinterest pinterest"></i>
														</a>
													</li>

													<li>
														<a href="#" class="social-linkedin" data-toggle="tooltip" title="" data-original-title="Share on linkedin">
															<i class="fa fa-linkedin"></i>
															<i class="fa fa-linkedin linkedin"></i>
														</a>
													</li>

													<li>
														<a href="<?php echo $web_url; ?>" target="_blank" class="social-globe">
															<i class="">Weblink</i>
															<i class="whit_e"> Weblink</i>
														</a>
													</li>
												</ul>
												<!-- Post Social-->
											</div>
										</div>
										<!-- Post Footer-->
									</div>
								</div>
								<!-- End Post Item Gallery-->
								<?php echo $this->view("classified_layout/success_error"); ?>
								<a class="review_show btn_v btn-4 btn-4a fa fa-arrow-right"><span>Write a Review</span></a>
								<!-- jQuery Form Validation code -->
								<style type="text/css">
								.error{
									color: red !important;
								}
								</style>
								<script>
								  
								  // When the browser is ready...
								  $(function() {
								  
									// Setup form validation on the #register-form element
									$("#rating_form").validate({
									
										// Specify the validation rules
										rules: {
											review_title: {
												required: true,
												minlength: 20
											},
											review_msg: {
												required: true,
												minlength: 60
											},
											review_name: {
												required: true
											},
											user_rating: {
												required: true
											}
										},
										
										// Specify the validation error messages
										messages: {
											review_title: {
												required: "Please Enter review title",
												minlength: "Title contains atleast 20 characters"
											},
											review_msg: {
												required: "Please Enter review message",
												minlength: "Title contains atleast 60 characters"
											},
											review_name: {
												required: "Please Enter review name"
											},
											user_rating: {
												required: "Please give review rating"
											}
										},
										
										submitHandler: function(form) {
											// form.submit();
											return true;
										}
									});

								  });
								  
								</script>
								<form action="<?php echo base_url(); ?>description_view/review" id="rating_form" method="post" class="j-forms tooltip-hover">
								<div class="widget view_sidebar review_hide" style="display:none;">
									<div class="j-row">
										<div class="span12 unit">
											<label class="label">Review Title 
												<sup data-toggle="tooltip" title="" data-original-title="Review Title">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
												</sup>
											</label>
											<div class="input">
												<label class="icon-right" for="review_title">
													<i class="fa fa-compass"></i>
												</label>
												<input type="text" id="review_title" name="review_title" placeholder="Enter Review Title">
												<input type="hidden" name="ad_id" value="<?php echo $ad_id_no; ?>">
											</div>
										</div>
										<div class="span12 unit">
											<label class="label">Your Review 
												<sup data-toggle="tooltip" title="" data-original-title="Your Review ">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
												</sup>
											</label>
											<div class="input">
												<textarea type="text" id="review_msg" name="review_msg" placeholder="Enter Your Review"></textarea>
											</div>
										</div>
										<div class="span12 unit">
											<label class="label">Name 
												<sup data-toggle="tooltip" title="" data-original-title="Name">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
												</sup>
											</label>
											<div class="input">
												<label class="icon-right" for="name">
													<i class="fa fa-user"></i>
												</label>
												<input type="text" id="review_name" name="review_name" placeholder="Enter Name">
											</div>
										</div>
										<div class="span4 rating-group">
											<label class="label">Your Rating
												<sup data-toggle="tooltip" title="" data-original-title="Your Rating">
													<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
												</sup>
											</label>
											<div class="ratings">
												<input id="5acc" type="radio" name="user_rating" value="5">
												<label for="5acc">
													<i class="fa fa-smile-o"></i>
												</label>
												<input id="4acc" type="radio" name="user_rating" value="4">
												<label for="4acc">
													<i class="fa fa-smile-o"></i>
												</label>
												<input id="3acc" type="radio" name="user_rating" value="3">
												<label for="3acc">
													<i class="fa fa-smile-o"></i>
												</label>
												<input id="2acc" type="radio" name="user_rating" value="2">
												<label for="2acc">
													<i class="fa fa-smile-o"></i>
												</label>
												<input id="1acc" type="radio" name="user_rating" value="1" checked="">
												<label for="1acc">
													<i class="fa fa-smile-o"></i>
												</label>
											</div>
										</div>
										<div class="span12 unit clearfix top_20">													
											<input type="submit" class="btn btn-primary" name="add_review" id='add_review' value="Add Review"> 
										</div>
									</div>
								</div>
								</form>
							</div>
							
							<div class="col-md-3 col-sm-4 col-xs-12">
								<aside class="widget view_sidebar text_center">
									<!--<img src="img/brand/intel.png" alt="Logo" title="Business Logo" class="img-responsive"><hr>-->
									<img src="<?php echo base_url(); ?>img/icons/user_pro.png" alt="user_pro" title="user_pro" class="img-responsive pvt-no-img">
									<h3> <?php echo $name; ?></h3><hr>
									<h4 class="loc_view"><i class="fa fa-map-marker "></i> <i><?php foreach ($ads_loc as $ads_loc_val) {
										echo $ads_loc_val->loc_name;
									} ?></i></h4>
									<img src="<?php echo base_url(); ?>img/icons/contact.png" alt="contact" title="Contact Details" class="contact_now_show img-responsive">
									<ul class="list-styles contact_now_hide" style="display:none;">
										<li><i class="fa fa-phone phn"></i><strong> <?php echo $mobile; ?></strong></li>
									</ul>
									<div class="top_5">
										<div class="amt_bg">
											<h3 class="view_price_1"><?php echo $price; ?></h3>
										</div>
									</div>
								</aside>
								<div class="">
									<a class="send_now_show btn_v btn-4 btn-4a fa fa-arrow-right"><span>Send Now</span></a>
									<a class="report_show btn_v btn-4 btn-4a fa fa-arrow-right"><span>Report</span></a>
								</div>
								<form action="#" method="post" class="j-forms tooltip-hover">
									<aside class="widget view_sidebar send_now_hide" style="display:none;">
										<div class="j-row">
											<div class="unit">
												<label class="label">Contact Name
													<sup data-toggle="tooltip" title="" data-original-title="Contact Name">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="name">
														<i class="fa fa-user"></i>
													</label>
													<input type="text" id="buscontname" name="buscontname" placeholder="Enter Contact Person Name ">
												</div>
											</div>
											<div class="unit">
												<label class="label">Mobile Number
													<sup data-toggle="tooltip" title="" data-original-title="Mobile Number">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="phone">
														<i class="fa fa-phone"></i>
													</label>
													<input type="text" id="bussmblno" name="bussmblno" placeholder="Enter Your Mobile Number ">
												</div>
											</div>
											<div class="unit">
												<label class="label">Email
													<sup data-toggle="tooltip" title="" data-original-title="Email">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<label class="icon-right" for="email">
														<i class="fa fa-envelope-o"></i>
													</label>
													<input type="email" id="busemail" name="busemail" placeholder="Enter Your Email">
												</div>
											</div>
											<div class="unit">
												<label class="label">Message
													<sup data-toggle="tooltip" title="" data-original-title="Message">
														<img src="<?php echo base_url(); ?>img/icons/i.png" alt="Help" title="Help Label">
													</sup>
												</label>
												<div class="input">
													<textarea type="text" id="" name="" placeholder="Enter Your Feedback "></textarea>
												</div>
											</div>
											<div class="unit">													
												<button class="btn btn-primary " id='change_pwd'>Send Now</button>
											</div>
										</div>
									</aside>
								</form>
								<form action="#" method="post" class="j-forms tooltip-hover">
									<aside class="widget view_sidebar report_hide" style="display:none;">
										<div class="j-row">
											<label class="radio">
												<input type="radio" name="report_view" value="" checked="">
												<i></i> This is illegal/fraudulent
											</label>
											<label class="radio">
												<input type="radio" name="report_view" value="">
												<i></i> This deal is spam
											</label>
											<label class="radio">
												<input type="radio" name="report_view" value="">
												<i></i> This deal is a duplicate
											</label>
											<label class="radio">
												<input type="radio" name="report_view" value="">
												<i></i> This deal is in the wrong category
											</label>
											<div class="unit">
												<div class="input">
													<textarea type="text" id="" name="" placeholder="Please Provide more Information"></textarea>
												</div>
											</div>
											<div class="unit">													
												<button class="btn btn-primary " id='change_pwd'>Send Report</button>
											</div>
										</div>
									</aside>
								</form>
								<aside class="widget view_sidebar1">
									<h3 class="imp_tant1">Important Safety Tips</h3>
									<ul class="list-styles">
										<li><i class="fa fa-check imp"></i> <a href="#">Really cheap prices</a></li>
										<li><i class="fa fa-check imp"></i> <a href="#">Irregular email addresses</a></li>
										<li><i class="fa fa-check imp"></i> <a href="#">Contact info in pictures</a></li>
									</ul>
									<p class="text_center imp">To learn more, visit the <a href="#" class="imp"> click here</a> to report this listing.</p>
								</aside>
								
							</div>
						</div>
					</div>
					
					<!-- Title -->
					<div class="container">
						<div class="titles recen_ad">
							<h2><span>RECOMMENDED </span>DEALS</h2>
						</div>
					</div>
					<!-- End Title-->
					
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div id="boxes-carousel112">
									<!-- Item carousel Boxed-->
									<div>
										<div class="img-hover similar_deal_bot">
											<img src="<?php echo base_url(); ?>img/featured/pets.jpg" alt="pets" title="pets" class="img-responsive">
											<div class="overlay"><a href=""><i class="fa fa-link"></i></a></div>
										</div>

										<div class="info-gallery">
											<h3>Sample Text Here</h3>
											<hr class="separator">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
											<ul class="starts">
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
											</ul>
											<a href="" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
											<div class="price"><span></span><b><i class="fa fa-fire"></i></b></div>
										</div>
									</div>
									<!-- End Item carousel Boxed-->
									
									<!-- Item carousel Boxed-->
									<div>
										<div class="img-hover similar_deal_bot">
											<img src="<?php echo base_url(); ?>img/featured/pets.jpg" alt="pets" title="pets" class="img-responsive">
											<div class="overlay"><a href=""><i class="fa fa-link"></i></a></div>
										</div>

										<div class="info-gallery">
											<h3>Sample Text Here</h3>
											<hr class="separator">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
											<ul class="starts">
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
											</ul>
											<a href="" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
											<div class="price"><span></span><b><i class="fa fa-fire"></i></b></div>
										</div>
									</div>
									<!-- End Item carousel Boxed-->
									<!-- Item carousel Boxed-->
									<div>
										<div class="img-hover similar_deal_bot">
											<img src="<?php echo base_url(); ?>img/featured/pets.jpg" alt="pets" title="pets" class="img-responsive">
											<div class="overlay"><a href=""><i class="fa fa-link"></i></a></div>
										</div>

										<div class="info-gallery">
											<h3>Sample Text Here</h3>
											<hr class="separator">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
											<ul class="starts">
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
											</ul>
											<a href="" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
											<div class="price"><span></span><b><i class="fa fa-fire"></i></b></div>
										</div>
									</div>
									<!-- End Item carousel Boxed-->

									<!-- Item carousel Boxed-->
									<div>
										<div class="img-hover similar_deal_bot">
											<img src="<?php echo base_url(); ?>img/featured/pets.jpg" alt="pets" title="pets" class="img-responsive">
											<div class="overlay"><a href=""><i class="fa fa-link"></i></a></div>
										</div>

										<div class="info-gallery">
											<h3>Sample Text Here</h3>
											<hr class="separator">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
											<ul class="starts">
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
											</ul>
											<a href="" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
										   <div class="price"><span></span><b><i class="fa fa-hand-o-right"></i></b></div>
										</div>
									</div>
									<!-- End Item carousel Boxed-->

									<!-- Item carousel Boxed-->
									<div>
										<div class="img-hover similar_deal_bot">
											<img src="<?php echo base_url(); ?>img/featured/pets.jpg" alt="pets" title="pets" class="img-responsive">
											<div class="overlay"><a href=""><i class="fa fa-link"></i></a></div>
										</div>

										<div class="info-gallery">
										<h3>Sample Text Here</h3>
											<hr class="separator">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
											<ul class="starts">
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
											</ul>
											<a href="" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
											<div class="price"><span></span><b><i class="fa fa-fire"></i></b><b><i class="fa fa-hand-o-right"></i></b></div>
										</div>
									</div>
									<!-- End Item carousel Boxed-->

									<!-- Item carousel Boxed-->
									<div>
										<div class="img-hover similar_deal_bot">
											<img src="<?php echo base_url(); ?>img/featured/pets.jpg" alt="pets" title="pets" class="img-responsive">
											<div class="overlay"><a href=""><i class="fa fa-link"></i></a></div>
										</div>

										<div class="info-gallery">
											<h3>Sample Text Here</h3>
											<hr class="separator">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
											<ul class="starts">
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
											</ul>
											<a href="" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
											<div class="price"><span></span><b><i class="fa fa-fire"></i></b><b><i class="fa fa-hand-o-right"></i></b></div>
										</div>
									</div>
									<!-- End Item carousel Boxed-->

									<!-- Item carousel Boxed-->
									<div>
										<div class="img-hover similar_deal_bot">
											<img src="<?php echo base_url(); ?>img/featured/pets.jpg" alt="pets" title="pets" class="img-responsive">
											<div class="overlay"><a href=""><i class="fa fa-link"></i></a></div>
										</div>

										<div class="info-gallery">
											<h3>Sample Text Here</h3>
											<hr class="separator">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
											<ul class="starts">
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star"></i></a></li>
												<li><a href="#"><i class="fa fa-star-half-empty"></i></a></li>
											</ul>
											<a href="" class="btn_v btn-3 btn-3d fa fa-arrow-right"><span>View Details</span></a>
											<div class="price"><span></span><b><i class="fa fa-fire"></i></b></div>
										</div>
									</div>
									<!-- End Item carousel Boxed-->
								</div>
							</div>
						</div>
					</div>
				   <!-- End boxes-carousel-->

				    <!-- Free Google Ads Start-->
				   <div class="container pad_bott_100">
						<div class="row">
							<div class="col-md-8 col-sm-8 col-md-offset-2">
								<div id="google_image_div" style="height: 90px; width: 728px; overflow:hidden; position:absolute"><a id="aw0" target="_blank" href="http://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=Cf7LwJMO6VpHQBJO9oAOAr5WYCsznkrEIhNvL1sQCwI23ARABIIf53Bhg5erjA6ABxOqCvAPIAQKpAlrhooF8mE8-4AIAqAMByAOZBKoEmgJP0DxfPWF_oPrU-4uHuGEdwvgBtrD2nenG16YuL7WWz9IPiyroBBcy6h8H1mdIwkPyuhpcVBU6GENfO9whp64UFUu25xglRrZgXRovyjVKndImng7lJo2DAoIu8f6BHRZ8m3PPXiFlkdCrykt_hcO6hCrIay1chjFa4LSEMMwwAL__GWHpcJZamHoFHue79eruFoKqYQ_5qc_q-fwGW5DyLLhS95EMvSujU0JYCbAzV6-D2h88rtcTWi0o2roAKayo_T-4vXXCNTFbnfg6o00pVWwWfGr1ZPLZc7TYHXD-DBLik8WPB3z6_vpLnTxFkgRIAiV3D8iNjXymyzB1iLkL7QIwt24fQIklF-2qfyfXVeGLIkl-LcpKvJjgBAGIBgGgBgKAB6SV_UOoB6a-G9gHAQ&amp;num=1&amp;cid=5Gin6BFGPItI29raOJ8PNKku&amp;sig=AOD64_0LHtpBuQpKxVmPUEeu1KsOpnExIA&amp;client=ca-pub-5105067122536534&amp;nm=4&amp;nx=44&amp;ny=25&amp;mb=2&amp;adurl=http://madeofgreat.tatamotors.com/zica/%3Futm_Source%3DGoogle_GDN%26utm_model%3DZica%26utm_channel%3DSEM%26utm_medium%3DGTZ_Zica_GDN_Contextual_comp_Kuv100%26utm_campaign%3Dzica_jan16_mx%26utm_term%3DGDN_KUV_Contextual%26utm_adposition%3DTop%26utm_network%3DDisplay_Network%26utm_placement%3D489f5d964ffa4cc3.anonymous.google%26utm_placementcategory%3DGoogle_Adwords%26utm_bannersize%3D728x90.jpg%26utm_creative%3DGeneric" data-original-click-url="http://www.googleadservices.com/pagead/aclk?sa=L&amp;ai=Cf7LwJMO6VpHQBJO9oAOAr5WYCsznkrEIhNvL1sQCwI23ARABIIf53Bhg5erjA6ABxOqCvAPIAQKpAlrhooF8mE8-4AIAqAMByAOZBKoEmgJP0DxfPWF_oPrU-4uHuGEdwvgBtrD2nenG16YuL7WWz9IPiyroBBcy6h8H1mdIwkPyuhpcVBU6GENfO9whp64UFUu25xglRrZgXRovyjVKndImng7lJo2DAoIu8f6BHRZ8m3PPXiFlkdCrykt_hcO6hCrIay1chjFa4LSEMMwwAL__GWHpcJZamHoFHue79eruFoKqYQ_5qc_q-fwGW5DyLLhS95EMvSujU0JYCbAzV6-D2h88rtcTWi0o2roAKayo_T-4vXXCNTFbnfg6o00pVWwWfGr1ZPLZc7TYHXD-DBLik8WPB3z6_vpLnTxFkgRIAiV3D8iNjXymyzB1iLkL7QIwt24fQIklF-2qfyfXVeGLIkl-LcpKvJjgBAGIBgGgBgKAB6SV_UOoB6a-G9gHAQ&amp;num=1&amp;cid=5Gin6BFGPItI29raOJ8PNKku&amp;sig=AOD64_0LHtpBuQpKxVmPUEeu1KsOpnExIA&amp;client=ca-pub-5105067122536534&amp;adurl=http://madeofgreat.tatamotors.com/zica/%3Futm_Source%3DGoogle_GDN%26utm_model%3DZica%26utm_channel%3DSEM%26utm_medium%3DGTZ_Zica_GDN_Contextual_comp_Kuv100%26utm_campaign%3Dzica_jan16_mx%26utm_term%3DGDN_KUV_Contextual%26utm_adposition%3DTop%26utm_network%3DDisplay_Network%26utm_placement%3D489f5d964ffa4cc3.anonymous.google%26utm_placementcategory%3DGoogle_Adwords%26utm_bannersize%3D728x90.jpg%26utm_creative%3DGeneric"><img src="https://tpc.googlesyndication.com/simgad/2844648695442786169" border="0" width="728" alt="" class="img_ad" onload=""></a><style>div,ul,li{margin:0;padding:0;}.abgc{height:15px;position:absolute;right:16px;text-rendering:geometricPrecision;top:0;width:15px;z-index:9020;}.abgb{height:15px;width:15px;}.abgc img{display:block;}.abgc svg{display:block;}.abgs{display:none;height:100%;}.abgl{text-decoration:none;}.abgi{fill-opacity:1.0;fill:#00aecd;stroke:none;}.abgbg{fill-opacity:1.0;fill:lightgray;stroke:none;}.abgtxt{fill:black;font-family:'Arial';font-size:100px;overflow:visible;stroke:none;}</style><div id="abgc" class="abgc" dir="ltr"><div id="abgb" class="abgb"><svg width="100%" height="100%"><rect class="abgbg" width="100%" height="100%"></rect><svg class="abgi" x="0px"><path d="M7.5,1.5a6,6,0,1,0,0,12a6,6,0,1,0,0,-12m0,1a5,5,0,1,1,0,10a5,5,0,1,1,0,-10ZM6.625,11l1.75,0l0,-4.5l-1.75,0ZM7.5,3.75a1,1,0,1,0,0,2a1,1,0,1,0,0,-2Z"></path></svg></svg></div><div id="abgs" class="abgs"><a id="abgl" class="abgl" href="https://www.google.com/url?ct=abg&amp;q=https://www.google.com/adsense/support/bin/request.py%3Fcontact%3Dabg_afc%26url%3Dhttps://www.gumtree.com/search%253Fsearch_category%253Dall%2526q%253Dcars%2526tq%253D%25257B%252522i%252522%25253A%252522cars%252522%25252C%252522s%252522%25253A%252522cars%252522%25252C%252522p%252522%25253A1%25252C%252522t%252522%25253A14%25257D%2526search_location%253D%26gl%3DIN%26hl%3Den%26client%3Dca-pub-5105067122536534%26ai0%3DCf7LwJMO6VpHQBJO9oAOAr5WYCsznkrEIhNvL1sQCwI23ARABIIf53Bhg5erjA6ABxOqCvAPIAQKpAlrhooF8mE8-4AIAqAMByAOZBKoEmgJP0DxfPWF_oPrU-4uHuGEdwvgBtrD2nenG16YuL7WWz9IPiyroBBcy6h8H1mdIwkPyuhpcVBU6GENfO9whp64UFUu25xglRrZgXRovyjVKndImng7lJo2DAoIu8f6BHRZ8m3PPXiFlkdCrykt_hcO6hCrIay1chjFa4LSEMMwwAL__GWHpcJZamHoFHue79eruFoKqYQ_5qc_q-fwGW5DyLLhS95EMvSujU0JYCbAzV6-D2h88rtcTWi0o2roAKayo_T-4vXXCNTFbnfg6o00pVWwWfGr1ZPLZc7TYHXD-DBLik8WPB3z6_vpLnTxFkgRIAiV3D8iNjXymyzB1iLkL7QIwt24fQIklF-2qfyfXVeGLIkl-LcpKvJjgBAGIBgGgBgKAB6SV_UOoB6a-G9gHAQ&amp;usg=AFQjCNFxkwIsu3wITVh_JTztWaKBt3pgOg" target="_blank"><svg width="100%" height="100%"><path class="abgbg" d="M0,0L96,0L96,15L4,15s-4,0,-4,-4z"></path><svg class="abgtxt" x="5px" y="11px" width="34px"><text>Ads by</text></svg><svg class="abgtxt" x="41px" y="11px" width="38px"><text>Google</text></svg><svg class="abgi" x="81px"><path d="M7.5,1.5a6,6,0,1,0,0,12a6,6,0,1,0,0,-12m0,1a5,5,0,1,1,0,10a5,5,0,1,1,0,-10ZM6.625,11l1.75,0l0,-4.5l-1.75,0ZM7.5,3.75a1,1,0,1,0,0,2a1,1,0,1,0,0,-2Z"></path></svg></svg></a></div></div><script>var abgp={elp:document.getElementById('abgcp'),el:document.getElementById('abgc'),ael:document.getElementById('abgs'),iel:document.getElementById('abgb'),hw:15,sw:96,hh:15,sh:15,himg:'https://tpc.googlesyndication.com'+'/pagead/images/abg/icon.png',simg:'https://tpc.googlesyndication.com/pagead/images/abg/en.png',alt:'Ads by Google',t:'Ads by',tw:34,t2:'Google',t2w:38,tbo:0,popuptext:'',att:'adsbygoogle',ff:'',halign:'right',fe:false,iba:false,lttp:true,umd:false,uic:false,uit:false,ict:document.getElementById('cbb'),icd:undefined,uaal:false};</script><script src="https://tpc.googlesyndication.com/pagead/js/r20160204/r20110914/abg.js"></script><style>.cbc{background-image: url('https://tpc.googlesyndication.com/pagead/images/x_button_blue2.png');background-position: right top;background-repeat: no-repeat;cursor:pointer;height:15px;right:0;top:0;margin:0;overflow:hidden;padding:0;position:absolute;transform: scaleX(1);width:16px;z-index:9010;}.cbc.cbc-hover {background-image: url('https://tpc.googlesyndication.com/pagead/images/x_button_dark.png');}.cbc > .cb-x{height: 15px;position:absolute;width: 16px;right:0;top:0;}.cb-x > .cb-x-svg{background-color: lightgray;position:absolute;}.cbc.cbc-hover > .cb-x > .cb-x-svg{background-color: #58585a;}.cb-x > .cb-x-svg > .cb-x-svg-path{fill : #00aecd;}.cbc.cbc-hover > .cb-x > .cb-x-svg > .cb-x-svg-path{fill : white;}.cb-x > .cb-x-svg > .cb-x-svg-s-path{fill : white;}</style><div id="cbc" class="cbc"><div id="cb-x" class="cb-x"></div> </div> <style>.ddmc{background:#ccc;color:#000;padding:0;position:absolute;z-index:9020;max-width:100%;box-shadow:2px 2px 3px #aaaaaa;}.ddmc.left{margin-right:0;left:0px;}.ddmc.right{margin-left:0;right:0px;}.ddmc.top{bottom:20px;}.ddmc.bottom{top:20px;}.ddmc .tip{border-left:4px solid transparent;border-right:4px solid transparent;height:0;position:absolute;width:0;font-size:0;line-height:0;}.ddmc.bottom .tip{border-bottom:4px solid #ccc;top:-4px;}.ddmc.top .tip{border-top:4px solid #ccc;bottom:-4px;}.ddmc.right .tip{right:3px;}.ddmc.left .tip{left:3px;}.ddmc .dropdown-content{display:block;}.dropdown-content{display:none;border-collapse:collapse;}.dropdown-item{font:12px Arial,sans-serif;cursor:pointer;padding:3px 7px;vertical-align:middle;}.dropdown-item-hover, a.dropdown-item.dropdown-item-hover {background:#58585a;color:#fff;}.dropdown-content > table{border-collapse:collapse;border-spacing:0;}.dropdown-content > table > tbody > tr > td{padding:0;}a.dropdown-item {color: inherit;cursor: inherit;display: block;text-decoration: inherit;}</style><div id="ddmc" style="display:none" class="ddmc right bottom"><div class="tip"></div><div class="dropdown-content"><table><tbody><tr><td><div id="pubmute" style="border-bottom:1px solid #999;" class="dropdown-item"><span>Ad covers the page</span></div></td></tr><tr><td><div id="admute" class="dropdown-item"><span>Stop seeing this ad</span></div></td></tr></tbody></table></div></div><script>(function(){var h=this,k=function(a,b){var c=a.split("."),d=h;c[0]in d||!d.execScript||d.execScript("var "+c[0]);for(var f;c.length&&(f=c.shift());)c.length||void 0===b?d=d[f]?d[f]:d[f]={}:d[f]=b},l=function(a,b,c){return a.call.apply(a.bind,arguments)},n=function(a,b,c){if(!a)throw Error();if(2<arguments.length){var d=Array.prototype.slice.call(arguments,2);return function(){var c=Array.prototype.slice.call(arguments);Array.prototype.unshift.apply(c,d);return a.apply(b,c)}}return function(){return a.apply(b,arguments)}},p=function(a,b,c){p=Function.prototype.bind&&-1!=Function.prototype.bind.toString().indexOf("native code")?l:n;return p.apply(null,arguments)};var r="undefined"!=typeof DOMTokenList,t=function(a,b){if(r){var c=a.classList;0==c.contains(b)&&c.toggle(b)}else if(c=a.className){for(var c=c.split(/\s+/),d=!1,f=0;f<c.length&&!d;++f)d=c[f]==b;d||(c.push(b),a.className=c.join(" "))}else a.className=b},x=function(a,b){if(r){var c=a.classList;1==c.contains(b)&&c.toggle(b)}else if((c=a.className)&&!(0>c.indexOf(b))){for(var c=c.split(/\s+/),d=0;d<c.length;++d)c[d]==b&&c.splice(d--,1);a.className=c.join(" ")}};var y=function(a,b,c){a.addEventListener?a.addEventListener(b,c,!1):a.attachEvent&&a.attachEvent("on"+b,c)};var z=String.prototype.trim?function(a){return a.trim()}:function(a){return a.replace(/^[\s\xa0]+|[\s\xa0]+$/g,"")},A=function(a,b){return a<b?-1:a>b?1:0};var B;a:{var C=h.navigator;if(C){var D=C.userAgent;if(D){B=D;break a}}B=""};var aa=-1!=B.indexOf("Opera")||-1!=B.indexOf("OPR"),E=-1!=B.indexOf("Trident")||-1!=B.indexOf("MSIE"),ba=-1!=B.indexOf("Edge"),F=-1!=B.indexOf("Gecko")&&!(-1!=B.toLowerCase().indexOf("webkit")&&-1==B.indexOf("Edge"))&&!(-1!=B.indexOf("Trident")||-1!=B.indexOf("MSIE"))&&-1==B.indexOf("Edge"),ca=-1!=B.toLowerCase().indexOf("webkit")&&-1==B.indexOf("Edge"),da=function(){var a=B;if(F)return/rv\:([^\);]+)(\)|;)/.exec(a);if(ba)return/Edge\/([\d\.]+)/.exec(a);if(E)return/\b(?:MSIE|rv)[: ]([^\);]+)(\)|;)/.exec(a);if(ca)return/WebKit\/(\S+)/.exec(a)},G=function(){var a=h.document;return a?a.documentMode:void 0},H=function(){if(aa&&h.opera){var a;var b=h.opera.version;try{a=b()}catch(c){a=b}return a}a="";(b=da())&&(a=b?b[1]:"");return E&&(b=G(),null!=b&&b>parseFloat(a))?String(b):a}(),I={},J=function(a){if(!I[a]){for(var b=0,c=z(String(H)).split("."),d=z(String(a)).split("."),f=Math.max(c.length,d.length),e=0;0==b&&e<f;e++){var m=c[e]||"",g=d[e]||"",u=RegExp("(\\d*)(\\D*)","g"),v=RegExp("(\\d*)(\\D*)","g");do{var q=u.exec(m)||["","",""],w=v.exec(g)||["","",""];if(0==q[0].length&&0==w[0].length)break;b=A(0==q[1].length?0:parseInt(q[1],10),0==w[1].length?0:parseInt(w[1],10))||A(0==q[2].length,0==w[2].length)||A(q[2],w[2])}while(0==b)}I[a]=0<=b}},K=h.document,ea=K&&E?G()||("CSS1Compat"==K.compatMode?parseInt(H,10):5):void 0;var L;if(!(L=!F&&!E)){var M;if(M=E)M=9<=Number(ea);L=M}L||F&&J("1.9.1");E&&J("9");var fa=function(a,b){if(!a||!b)return!1;if(a.contains&&1==b.nodeType)return a==b||a.contains(b);if("undefined"!=typeof a.compareDocumentPosition)return a==b||!!(a.compareDocumentPosition(b)&16);for(;b&&a!=b;)b=b.parentNode;return b==a};var ga=function(a,b,c){var d="mouseenter_custom"==b,f=N(b);return function(e){e||(e=window.event);if(e.type==f){if("mouseenter_custom"==b||"mouseleave_custom"==b){var m;if(m=d?e.relatedTarget||e.fromElement:e.relatedTarget||e.toElement)for(var g=0;g<a.length;g++)if(fa(a[g],m))return}c(e)}}},N=function(a){return"mouseenter_custom"==a?"mouseover":"mouseleave_custom"==a?"mouseout":a};var O=function(a,b,c,d,f,e,m,g,u,v){this.m=a;this.ca=b;this.K=c;this.aa=d;this.H=f;this.G=e;this.o=null;this.I=!1;this.F=v;this.T=u;this.j=document.getElementById("pubmute"+g);this.i=document.getElementById("admute"+g);this.l=document.getElementById("wta"+g);this.U=parseInt(g,10)||0;this.B();this.m.className=["ddmc",m&1?"left":"right",m&2?"top":"bottom"].join(" ")};O.prototype.B=function(){P(this.m,"mouseenter_custom",this,this.v);P(this.m,"mouseleave_custom",this,this.L);this.j&&(P(this.j,"mouseenter_custom",this,this.Z),P(this.j,"mouseleave_custom",this,this.A),y(this.j,"click",p(this.ba,this)));this.i&&(P(this.i,"mouseenter_custom",this,this.P),P(this.i,"mouseleave_custom",this,this.u),y(this.i,"click",p(this.$,this)));this.l&&(P(this.l,"mouseenter_custom",this,this.da),P(this.l,"mouseleave_custom",this,this.C),y(this.l,"click",p(this.Y,this)))};O.prototype.ba=function(){Q(this);R(this,0);var a=this.K;null!=a&&a();S(this,"user_feedback_menu_option","3",!0)};O.prototype.$=function(){Q(this);R(this,1);var a=this.K;null!=a&&a();S(this,"user_feedback_menu_option","1",!0)};var R=function(a,b){var c={type:b,close_button_token:a.G,creative_conversion_url:a.H,ablation_config:a.T,undo_callback:a.aa,creative_index:a.U};if(a.F)a.F.fireOnObject("mute_option_selected",c);else{var d;a:{d=["muteSurvey"];for(var f=h,e;e=d.shift();)if(null!=f[e])f=f[e];else{d=null;break a}d=f}d&&d.setupSurveyPage(c)}};O.prototype.Y=function(){Q(this);S(this,"closebutton_whythisad_click","1",!1)};var T=function(a,b){a.m.style.display=b?"":"none"};O.prototype.L=function(){this.o=h.setTimeout(p(function(){Q(this);this.o=null},this),500)};O.prototype.v=function(){null!=this.o&&(h.clearTimeout(this.o),this.o=null)};var Q=function(a){var b=a.ca;null!=b&&b();U(a)&&T(a,!1)};O.prototype.Z=function(){this.j&&t(this.j,"dropdown-item-hover");this.u();this.C()};O.prototype.A=function(){this.j&&x(this.j,"dropdown-item-hover")};O.prototype.P=function(){this.i&&t(this.i,"dropdown-item-hover");this.A();this.C()};O.prototype.u=function(){this.i&&x(this.i,"dropdown-item-hover")};O.prototype.da=function(){this.l&&t(this.l,"dropdown-item-hover");this.u();this.A()};O.prototype.C=function(){this.l&&x(this.l,"dropdown-item-hover")};var U=function(a){return"none"!==a.m.style.display};O.prototype.toggle=function(){U(this)?U(this)&&T(this,!1):(T(this,!0),this.I||(this.I=!0,S(this,"user_feedback_menu_interaction")))};var S=function(a,b,c,d){a=a.H+"&label="+b+(c?"&label_instance="+c:"")+(d?"&cbt="+a.G:"");b=window;b.google_image_requests||(b.google_image_requests=[]);c=b.document.createElement("img");c.src=a;b.google_image_requests.push(c)},P=function(a,b,c,d){d=ga([a],b,p(d,c));y(a,N(b),p(d,c))};var V=function(a,b,c,d,f,e,m,g,u,v,q,w,X){this.creativeConversionUrl=f;this.S=e;this.R=document.getElementById("cb-x"+q);f=p(this.w,this);e=p(this.J,this);var ha=p(this.M,this);d?(g=g?1:0,u&&(g|=2),d=new O(d,f,e,ha,this.creativeConversionUrl,this.S,g,q,w,X)):d=null;this.h=d;this.N=document.getElementById("pbc");this.g=a;this.O=b;this.D=c;this.s=X;"undefined"!=typeof SVGElement&&"undefined"!=typeof document.createElementNS&&v&&(this.g.style.backgroundImage="none",this.R.appendChild(ia(m)));this.B()},W;V.prototype.B=function(){y(this.g,"click",p(this.V,this));y(this.g,"mouseover",p(this.X,this));y(this.g,"mouseout",p(this.W,this))};V.prototype.V=function(){this.h&&(this.h.v(),this.h.toggle())};V.prototype.X=function(){this.h&&this.h.v();null!==this.g&&t(this.g,"cbc-hover")};V.prototype.W=function(){this.h&&U(this.h)?this.h.L():this.w()};var ia=function(a){var b=document.createElementNS("//www.w3.org/2000/svg","svg"),c=document.createElementNS("//www.w3.org/2000/svg","path"),d=document.createElementNS("//www.w3.org/2000/svg","path"),f=1.15/Math.sqrt(2),e=.2*a,f="M"+(e+f+1)+","+e+"L"+(a/2+1)+","+(a/2-f)+"L"+(a-e-f+1)+","+e+"L"+(a-e+1)+","+(e+f)+"L"+(a/2+f+1)+","+a/2+"L"+(a-e+1)+","+(a-e-f)+"L"+(a-e-f+1)+","+(a-e)+"L"+(a/2+1)+","+(a/2+f)+"L"+(e+f+1)+","+(a-e)+"L"+(e+1)+","+(a-e-f)+"L"+(a/2-f+1)+","+a/2+"L"+(e+1)+","+(e+f)+"Z",e="M0,0L1,0L1,"+a+"L0,"+a+"Z";b.setAttribute("class","cb-x-svg");b.setAttribute("width",a+1);b.setAttribute("height",a);b.appendChild(c);b.appendChild(d);c.setAttribute("d",f);c.setAttribute("class","cb-x-svg-path");d.setAttribute("d",e);d.setAttribute("class","cb-x-svg-s-path");return b},Y=function(a){a&&(a.style.display="block")},Z=function(a){a&&(a.style.display="none")};V.prototype.w=function(){null!==this.g&&x(this.g,"cbc-hover")};V.prototype.J=function(){this.w();this.s?this.s.showOnly(0):(Z(this.g),Z(this.D),Z(this.N),Y(this.O))};V.prototype.M=function(){this.s?this.s.resetAll():(Y(this.g),Y(this.D),Y(this.N),Z(this.O))};k("cbb",function(a,b,c,d,f,e,m,g,u,v){y(window,"load",function(){a&&(W=new V(a,document.getElementById("cbtf"),b,c,d,f,15,m,g,u,v,e,window.adSlot))})});k("cbbha",function(){W.J()});k("cbbsa",function(){W.M()});}).call(this);cbb(document.getElementById('cbc'),document.getElementById('google_image_div'),document.getElementById('ddmc'),'https://googleads.g.doubleclick.net/pagead/conversion/?ai\x3dCf7LwJMO6VpHQBJO9oAOAr5WYCsznkrEIhNvL1sQCwI23ARABIIf53Bhg5erjA6ABxOqCvAPIAQKpAlrhooF8mE8-4AIAqAMByAOZBKoEmgJP0DxfPWF_oPrU-4uHuGEdwvgBtrD2nenG16YuL7WWz9IPiyroBBcy6h8H1mdIwkPyuhpcVBU6GENfO9whp64UFUu25xglRrZgXRovyjVKndImng7lJo2DAoIu8f6BHRZ8m3PPXiFlkdCrykt_hcO6hCrIay1chjFa4LSEMMwwAL__GWHpcJZamHoFHue79eruFoKqYQ_5qc_q-fwGW5DyLLhS95EMvSujU0JYCbAzV6-D2h88rtcTWi0o2roAKayo_T-4vXXCNTFbnfg6o00pVWwWfGr1ZPLZc7TYHXD-DBLik8WPB3z6_vpLnTxFkgRIAiV3D8iNjXymyzB1iLkL7QIwt24fQIklF-2qfyfXVeGLIkl-LcpKvJjgBAGIBgGgBgKAB6SV_UOoB6a-G9gHAQ\x26sigh\x3dbrrDclAWOYs','9roku1nkFEUIhNvL1sQCEOTF-7EBGJST9kMiGHRhdGFtb3RvcnMuY29tL1RhdGFfWmljYTIICAUTGLi2ExRCF2NhLXB1Yi01MTA1MDY3MTIyNTM2NTM0SABYAnAB','{\x22key_value\x22:[]}',false,false,false,'');</script></div>
							</div>
						</div>
					</div>
					 <!-- Free Google Ads End-->

				</div>
			</div>
	</section>
		<!-- End Shadow Semiboxed -->
	 
	<script src="<?php echo base_url(); ?>src/jquery.easyResponsiveTabs.js"></script>
	
	<script src="<?php echo base_url(); ?>j-folder/js/jquery.maskedinput.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/additional-methods.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/jquery.form.min.js"></script>
	<script src="<?php echo base_url(); ?>j-folder/js/j-forms.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function () {
		
			$('#parentHorizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion
				width: 'auto', //auto or any width like 600px
				fit: true, // 100% fit in a container
				closed: 'accordion', // Start closed if in accordion view
				tabidentify: 'hor_1', // The tab groups identifier
				activate: function (event) { // Callback function if tab is switched
					var $tab = $(this);
					var $info = $('#nested-tabInfo');
					var $name = $('span', $info);
		
					$name.text($tab.text());
		
					$info.show();
				}
			});
		
			$('#ChildVerticalTab_1').easyResponsiveTabs({
				type: 'vertical',
				width: 'auto',
				fit: true,
				tabidentify: 'ver_1', // The tab groups identifier
				activetab_bg: '#fff', // background color for active tabs in this group
				inactive_bg: '#F5F5F5', // background color for inactive tabs in this group
				active_border_color: '#c1c1c1', // border color for active tabs heads in this group
				active_content_border_color: '#5AB1D0' // border color for active tabs contect in this group so that it matches the tab head border
			});
		
		});
	</script>
	
	<script type="text/javascript">

		jQuery(document).ready(function(){

			jQuery("#gallery").unitegallery();

		});
		
	</script>
	<script>
		setTimeout(function(){
			 $(".alert").hide();
		},5000);
		
	</script>
	
	 
			
           