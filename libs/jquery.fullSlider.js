;(function ( $, window, document, undefined ) {
    // Create the defaults once
    var pluginName = 'fullSlider',
        defaults = {
            animateTime: 1000
        };

    function Plugin( element, options ) {
        this.element = element;
        this.options = $.extend( {}, defaults, options) ;
        
        this._defaults = defaults;
        this._name = pluginName;
        
        this.init();
    }

    Plugin.prototype.init = function () {
        // Place initialization logic here
        var $el = $(this.element);

        this.$sliderContainer = $el.find('ul');
        this.$directionNav = $el.find('.direction-nav');
        this.$sliders = this.$sliderContainer.find('li');
        this.slidersNum = this.$sliders.length;                 // 展示内容个数
        this.sliderContainerWidth = this.$sliderContainer.width();
        this.sliderUnit = $(window).width();
        // 如果不能铺屏
        if(this.sliderContainerWidth < this.sliderUnit) return false;
        // 在原基础上左右插入
        this.$firstSliders = this.$sliders.clone();
        this.$lastSliders = this.$sliders.clone();
        this.$sliderContainer
            .append(this.$lastSliders)
            .prepend(this.$firstSliders)
            .css({ 
                position: 'absolute', 
                width: 3 * this.sliderContainerWidth 
            });
        this.directionNav();
    };
    // 为左右箭头添加监听事件
    Plugin.prototype.directionNav = function() {
        var self = this, $sliderContainer = self.$sliderContainer;
        self.$directionNav.on('click', 'a', function() {
            var curLeft = parseInt($sliderContainer[0].style.left) || 0;
            var callback = null;
            if(-1 !== this.className.indexOf('next')) {
                console.log(curLeft - self.sliderUnit, -self.sliderContainerWidth * 2);
                // curLeft - self.sliderUnit 此时slider显示的最右边
                // 然后判断下一次滑动是否出界。
                if( curLeft - 2 * self.sliderUnit < -self.sliderContainerWidth * 3) {
                    // 如果右边要出边界，把最左边的区域补到右边用于显示，此时用的是相对位置
                    self.$firstSliders.css({ position: 'relative', left: self.sliderContainerWidth * 3 });
                    callback = function() {
                        // 显示后，取消相对位置设置
                        self.$firstSliders.removeAttr('style');
                        // 此时的curLeft为运动以后的位置
                        // 让整个slider向左平移2 * self.sliderContainerWidth
                        $sliderContainer[0].style.left = self.sliderContainerWidth + curLeft;
                    }
                }
                curLeft = curLeft - self.sliderUnit;
            }else {
                if(curLeft + self.sliderUnit > 0) {
                    self.$lastSliders.css({ position: 'relative', left: -self.sliderContainerWidth * 3 });
                    callback = function() {
                        self.$lastSliders.removeAttr('style');
                        // 让整个slider向右平移2 * self.sliderContainerWidth
                        $sliderContainer[0].style.left = curLeft - self.sliderContainerWidth * 2;
                    };
                }
                curLeft = curLeft + self.sliderUnit;
            }
            self.animate(curLeft, callback);
        });
    };
    Plugin.prototype.animate = function(end, callback) {
        var self = this;
        self.$sliderContainer.animate({ left: end | 0 }, self.animateTime, 'linear', function() {
            callback && callback();
        });
    };

    // A really lightweight plugin wrapper around the constructor, 
    // preventing against multiple instantiations
    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName, new Plugin( this, options ));
            }
        });
    }

})(jQuery, window);