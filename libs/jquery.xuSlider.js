;(function ( $, window, document, undefined ) {
    'use strict';
    // Create the defaults once
    var pluginName = 'xuSlider',
        defaults = {
            controlNav: true,
            directionNav: true,
            startAt: 0,
            animateTime: 700,
            slideshowSpeed: 2000,
            pauseOnHover: true,
            autoSlide: true
        };

    // The actual plugin constructor
    function Plugin( element, options ) {
        this.element = element;
        this.options = $.extend( {}, defaults, options);
        
        this._defaults = defaults;
        this._name = pluginName;
        
        this.init();
    }

    Plugin.prototype = {
        init: function() {
            var $el = this.$el = $(this.element);
            var options = this.options; 
            this.$sliders = $el.find('ul');
            this.unit = -$el.width();               // 每次动作的滚动长度单位
            this.autoTimer = null;
            // 点击事件类型
            this.evType = window.ontouchstart ? 'touchstart' : 'click';                  
            // 调整结构和样式
            var $slidersAll = this.$slidersAll = this.$sliders.find('li');
            this.slidersNum = $slidersAll.length;
            
            // 绘制配置的样式
            $slidersAll.css({ width: -this.unit, height: $el.height() });
            this.slideRender();
            // 标记当前活动帧
            $slidersAll.eq(options.startAt).addClass('slider-active');
            options.controlNav && this.controlNav();        // 添加原点图标
            options.directionNav && this.directionNav();    // 添加左右箭头
            options.autoSlide && this.autoSlide();          // 默认自动slide
            options.pauseOnHover && this.pauseOnHover();
        },
        // 如果动画效果为slide，重新渲染结构
        slideRender: function() {
            this.$slidersAll.css({ float: 'left' });
            // 复制前后节点，并添加样式
            this.$sliders.remove().append(this.$slidersAll.eq(0).clone(true).addClass('clone'))
                .prepend(this.$slidersAll.eq(-1).clone(true).addClass('clone'))
                .css({ left: (this.options.startAt + 1) * this.unit, width: -(this.slidersNum + 2) * this.unit });
            // 用新的div包裹ul
            this.$el.html($('<div class="viewport">').css({ position: 'relative', overflow: 'hidden' }).append(this.$sliders));
        },
        directionNav: function() {
            var self = this, delay = 200;
            self.$directionNav = $('<div class="direction-nav"><a href="javascript:;" class="prev"><i>Previous</i></a><a href="javascript:;" class="next"><i>next</i></a></div>');
            self.$directionNav.appendTo(self.$el)
                .on(self.evType, 'a', function() {
                    var el = this;
                    // 取消自动播放
                    self.clearAutoSlideTimer();
                    if(el.className.indexOf('next') !== -1) {
                        // 向后移动
                        el.timer != null && clearTimeout(el.timer);                 // 添加点击延迟，默认200ms
                        el.timer = setTimeout(function() { self.next(); }, delay);
                    }else {
                        // 向前移动
                        el.timer != null && clearTimeout(el.timer);
                        el.timer = setTimeout(function() {
                            self.options.startAt -= 1;
                            self.move(function() {
                                // 当第一帧再次向前点击时, 显示第0帧, 调整到最后一帧
                                -1 === self.options.startAt && (self.options.startAt = self.slidersNum - 1);
                            });
                        }, delay);
                    }
                });
        },
        controlNav: function() {
            var self = this, controlNav = '<ol class="control-nav">';
            for(var i = 0; i < this.slidersNum; i++) {
                controlNav += (self.options.startAt === i ? '<li class="active"' : '<li');
                controlNav += ' data-id="'+ i +'"><a href="javascript:;">'+ i +'</a></li>';
            }
            var $controlNav = $(controlNav).on(self.evType, 'li', function() {
                self.clearAutoSlideTimer();
                // 利用原生api: dataset, 返回的是字符串类型
                self.options.startAt = +this.dataset.id;
                self.move();
            }).appendTo(self.$el);
            self.$controlNavs = $controlNav.find('li');
        },
        move: function(callback, autoEmit) {
            var self = this, curr = self.options.startAt;
            // 移动的向量
            self.$sliders.animate({
                left: (curr + 1) * self.unit
            }, self.options.animateTime, function() {
                if(typeof callback === 'function') {
                    callback(), curr = self.options.startAt;     // 回调函数会更新options.startAt
                    self.$sliders.css('left', (curr + 1) * self.unit);
                }
                self.$slidersAll.removeClass('slider-active').eq(curr).addClass('slider-active');
                self.$controlNavs.removeClass('active')[curr].className = 'active';
                // 如果配置是自动播放, 手动滑动后, 继续自动播放
                !autoEmit && self.options.autoSlide && self.autoSlide();
            });
        },
        next: function(autoEmit) {
            var self = this;
            self.options.startAt += 1;
            self.move(function() {
                // 当最后一帧再次向后点击时
                self.slidersNum === self.options.startAt && (self.options.startAt = 0);
            }, autoEmit);
        },
        autoSlide: function() { 
            var self = this;
            self.clearAutoSlideTimer();
            self.autoTimer = setInterval(function() {
                // 由于自动播放和下一帧动作同时走next(), 用参数做区分
                self.next(true);
            }, self.options.slideshowSpeed); 
        },
        clearAutoSlideTimer: function() {
            this.autoTimer != null && clearInterval(this.autoTimer);
        },
        pauseOnHover: function() {
            // 鼠标在展示区时，暂停播放直到鼠标离开
            var self = this, options = self.options;
            // hover时停止自动播放
            self.$el.on('mouseenter', function() {
                options.pauseOnHover && self.clearAutoSlideTimer();
            }).on('mouseleave', function() {
                // 此处会开启新的自动滑动定时器
                // 当手动控制方向时，也会开启新的定时器
                // 解决方法，在每次开启定时器时，先清楚已有定时器
                options.pauseOnHover && options.autoSlide && self.autoSlide();
            });
            
        }
    };

    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            // 避免重复提添加监听事件
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName, new Plugin( this, options ));
            }
        });
    };

})(jQuery, window);