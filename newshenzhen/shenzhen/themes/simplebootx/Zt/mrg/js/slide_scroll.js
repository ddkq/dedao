// JavaScript Document
//bannerÐ§¹û·â×°

(function($) {
	$.fn.banner = function(o) {
		$.extend({
			time: 400,
			animStyle: true,
			addclass:addclass,
			isAllScreen:false,
			marginOffset:0,
			autoPlay:true
		},
		o || {});
		var iNow = 0;
		var timer = null;
		var oDiv = $(this);
		var oUl = oDiv.find('ul');
		var aLi = $('li', oUl);	
		var marginOffset = o.marginOffset;	
		var oneSize = aLi.eq(0).outerWidth();
		var animStyle = o.animStyle ? 'left': 'opacity';
		var addclass=o.addclass;
		var time = o.time;
		var $win=$(window);
		var $ulWidth ;
		var focus_btn = $(".focus_btn ");
		oDiv.css({
			'position': 'relative'
		});
		$('<a href="javascript:void(0)" class="pre_btn"></a><a href="javascript:void(0)" class="next_btn"></a>').appendTo(oDiv);
		function _winCenter(){
				if(o.isAllScreen){
					oneSize = 	parseInt($win.outerWidth(),10);	
					}
				else {
						oneSize =oneSize;					
					}
		};
		oneSize = oneSize+marginOffset;
		$ulWidth = aLi.size()*oneSize;
		oUl.css({width:oneSize*aLi.size()});
		$(window).resize(function(){
			_winCenter();
		});
		_winCenter();
		
		aLi.each(function(i) {
			
			$(this).index=i;
			if (animStyle == 'opacity') {
				if ($(this).index() == 0) {
					$(this).css({
						'opacity': 1
					});
				
				} else {
					$(this).css({
						'opacity': 0
					});
					
				}
				$(this).css({
					'position': 'absolute',
					'left': 0,
					'top': 0
				});
			} else {
				oUl.css({
					'width': oneSize * aLi.size(),
					'position': 'absolute',
					'left': 0
				});
			}

		});    			
		aLi.eq(iNow).addClass(addclass);
		
		var _this = aLi;
		function fnNext(iNow) {
			_this.eq(iNow).addClass(addclass).siblings('li').removeClass(addclass);
			if (!o.animStyle) {
				for (var i = 0; i < _this.length; i++) {
					if (i > iNow) {
						_this.eq(i).stop(true, true).animate({
							'opacity': 0,
							'zIndex':1
						},
						time);
					} else if (i < iNow) {
						_this.eq(i).stop(true, true).animate({
							'opacity': 0,
							'zIndex':1
						},
						time);
					} else {
						_this.eq(i).stop(true, true).animate({

							'opacity': 1,
							'zIndex':2
						},
						time);
					}
				}
			} else {
				oUl.stop().animate({
					'left': -iNow * oneSize
				});
			}

		};

		timer=setInterval(toRun,5000);
		function toRun() {
			iNow == _this.length - 1?iNow = 0:iNow++;
			fnNext(iNow);
		};
	if(!o.autoPlay){
		clearInterval(timer);
		$('a', focus_btn).each(function() {

			$(this).mouseover(function() {
				$(this).addClass("active").siblings().removeClass("active");
				iNow = $(this).index();
				fnNext(iNow);
				autoPlay=false;
			});
		});
	}
	else {
			$('a', focus_btn).each(function() {

			$(this).mouseover(function() {
				clearInterval(timer);
				iNow = $(this).index();
				fnNext(iNow);

			});
			$(this).mouseout(function() {
				clearInterval(timer);
				timer = setInterval(function() {
					if (iNow == _this.length - 1) {
						iNow = 0
					} else {
						iNow++;

					}
					fnNext(iNow);
				},
				7000);
			});

		});
		_this.mouseover(function(e) {
        clearInterval(timer);
    });
	_this.mouseover(function(e) {
        timer=setInterval(toRun,5000);
    });
	$(".pre_btn").click(function(e) {
			clearInterval(timer);
			iNow==0?iNow=_this.length - 1:iNow--;
			fnNext(iNow);
			timer=setInterval(toRun,5000);
        });
	$(".next_btn").click(function(e) {
			clearInterval(timer);
			iNow == _this.length - 1?iNow = 0:iNow++;
			fnNext(iNow);
			timer=setInterval(toRun,5000);
        });
		}
	
	
	
	}
})(jQuery);
$('#scroll_pic').banner({time:800,animStyle:false,addclass:'bannerdh',isAllScreen:true,marginOffset:0,autoPlay:false});
