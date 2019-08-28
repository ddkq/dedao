(function($) {
$.fn.coveringBad = function(options) {
	var settings = $.extend({
		marginY : 30 ,
		marginX : 30 ,
		setX  : 30,
		setY  : 30,
		direction   : "horizontal"
	} , options);
/*
本代码由素材家园收集并编辑整理;
尊重他人劳动成果;
转载请保留素材家园链接 - www.sucaijiayuan.com
*/
	return this.each(function() {
		var $this = $(this),
				$changeable = $this.find('>.changeable'),
				$handle = $this.find('>.handle'),
				width  = $this.innerWidth(),
				height = $this.innerHeight(),
				pos_x  = null,
				pos_y  = null,
				startX = null,
				startY = null,
				min_left = settings.marginX,
				max_left = width - settings.marginX,
				min_top  = settings.marginY,
				max_top  = height - settings.marginY,
				setX = settings.setX,
				setY = settings.setY;
		$changeable.height($this.height());
		if(setX < min_left) {
			setX = min_left;
		}
		if(setY < min_top) {
			setY = min_top;
		}
		$handle.append('<span class="left icon-chevron-left">&lt;</span><span class="right icon-chevron-right"/>&gt;</span>')
		$handle.css('left', setX);
		$handle.css('top', setY);
		// Direction
		//////////////////////////////////
		if(settings.direction === "horizontal" ) {
			$changeable.width(setX);
			$changeable.css('border-right', '1px dashed #FFF');
		} 
		else if(settings.direction === "vertical" ) {
					$this.height($changeable.height());        		
					$changeable.height(setY);        		
					$changeable.css('border-bottom', '1px dashed #FFF');
					$handle.addClass('vertical');
		}
		// Dragging Bad
		//////////////////////////////////
		$handle.on('mousedown', function(event) {
			event.preventDefault();
			$handle.addClass('draggable');
			pos_x  = parseInt($handle.css('left'));
			startX = event.pageX;
			pos_y  = parseInt($handle.css('top'));
			startY = event.pageY;
		});
		$(document).on('mouseup' , function(event) {
			 $handle.removeClass('draggable');
		});
		$this.bind('mousemove', dragger);
		function dragger(e) {
			var left = pos_x + (e.pageX - startX);
			if (left < min_left) left = min_left;
			else if (left > max_left) left = max_left;
			$('.draggable').css('left', left);
			var top = pos_y + (e.pageY - startY);
			if (top < min_top) top = min_top;
			else if (top > max_top) top = max_top;
			$('.draggable').css('top', top);
			if($('.draggable').length) {
				changeWidth(left , top);
			}
		}
		// Changing width or height
		//////////////////////////////////////
		function changeWidth(w , h) {
			if(settings.direction === "horizontal" ) {
				$changeable.width(w);
			} 
			else if(settings.direction === "vertical" ) {
				$changeable.height(h);
			}
		}
	});
}
})(jQuery);
