!function(t,i,e,s){"use strict";function n(i,e){this.element=i,this.options=t.extend({},a,e),this._defaults=a,this._name=o,this.init()}var o="xuSlider",a={controlNav:!0,directionNav:!0,startAt:0,animateTime:700,slideshowSpeed:2e3,pauseOnHover:!0,autoSlide:!0};n.prototype={init:function(){var e=this.$el=t(this.element),s=this.options;this.$sliders=e.find("ul"),this.unit=-e.width(),this.autoTimer=null,this.evType=i.ontouchstart?"touchstart":"click";var n=this.$slidersAll=this.$sliders.find("li");this.slidersNum=n.length,n.css({width:-this.unit,height:e.height()}),this.slideRender(),n.eq(s.startAt).addClass("slider-active"),s.controlNav&&this.controlNav(),s.directionNav&&this.directionNav(),s.autoSlide&&this.autoSlide(),s.pauseOnHover&&this.pauseOnHover()},slideRender:function(){this.$slidersAll.css({"float":"left"}),this.$sliders.remove().append(this.$slidersAll.eq(0).clone(!0).addClass("clone")).prepend(this.$slidersAll.eq(-1).clone(!0).addClass("clone")).css({left:(this.options.startAt+1)*this.unit,width:-(this.slidersNum+2)*this.unit}),this.$el.html(t('<div class="viewport">').css({position:"relative",overflow:"hidden"}).append(this.$sliders))},directionNav:function(){var i=this,e=200;i.$directionNav=t('<div class="direction-nav"><a href="javascript:;" class="prev"><i>Previous</i></a><a href="javascript:;" class="next"><i>next</i></a></div>'),i.$directionNav.appendTo(i.$el).on(i.evType,"a",function(){var t=this;i.clearAutoSlideTimer(),-1!==t.className.indexOf("next")?(null!=t.timer&&clearTimeout(t.timer),t.timer=setTimeout(function(){i.next()},e)):(null!=t.timer&&clearTimeout(t.timer),t.timer=setTimeout(function(){i.options.startAt-=1,i.move(function(){-1===i.options.startAt&&(i.options.startAt=i.slidersNum-1)})},e))})},controlNav:function(){for(var i=this,e='<ol class="control-nav">',s=0;s<this.slidersNum;s++)e+=i.options.startAt===s?'<li class="active"':"<li",e+=' data-id="'+s+'"><a href="javascript:;">'+s+"</a></li>";var n=t(e).on(i.evType,"li",function(){i.clearAutoSlideTimer(),i.options.startAt=+this.dataset.id,i.move()}).appendTo(i.$el);i.$controlNavs=n.find("li")},move:function(t,i){var e=this,s=e.options.startAt;e.$sliders.animate({left:(s+1)*e.unit},e.options.animateTime,function(){"function"==typeof t&&(t(),s=e.options.startAt,e.$sliders.css("left",(s+1)*e.unit)),e.$slidersAll.removeClass("slider-active").eq(s).addClass("slider-active"),e.$controlNavs.removeClass("active")[s].className="active",!i&&e.options.autoSlide&&e.autoSlide()})},next:function(t){var i=this;i.options.startAt+=1,i.move(function(){i.slidersNum===i.options.startAt&&(i.options.startAt=0)},t)},autoSlide:function(){var t=this;t.clearAutoSlideTimer(),t.autoTimer=setInterval(function(){t.next(!0)},t.options.slideshowSpeed)},clearAutoSlideTimer:function(){null!=this.autoTimer&&clearInterval(this.autoTimer)},pauseOnHover:function(){var t=this,i=t.options;t.$el.on("mouseenter",function(){i.pauseOnHover&&t.clearAutoSlideTimer()}).on("mouseleave",function(){i.pauseOnHover&&i.autoSlide&&t.autoSlide()})}},t.fn[o]=function(i){return this.each(function(){t.data(this,"plugin_"+o)||t.data(this,"plugin_"+o,new n(this,i))})}}(jQuery,window);