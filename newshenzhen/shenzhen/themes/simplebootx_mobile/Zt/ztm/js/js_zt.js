
// 评价滚动
function marquee(i, direction){
	var obj = document.getElementById("marquee" + i);
	var obj1 = document.getElementById("marquee" + i + "_1");
	var obj2 = document.getElementById("marquee" + i + "_2");
	if (direction == "up"){
		if (obj2.offsetTop - obj.scrollTop <= 0){
			obj.scrollTop -= (obj1.offsetHeight + 20);
		}else{
			var tmp = obj.scrollTop;
			obj.scrollTop++;
			if (obj.scrollTop == tmp){
				obj.scrollTop = 1;
			}
		}
	}else{
		if (obj2.offsetWidth - obj.scrollLeft <= 0){
			obj.scrollLeft -= obj1.offsetWidth;
		}else{
			obj.scrollLeft++;
		}
	}
}

function marqueeStart(i, direction){
	var obj = document.getElementById("marquee" + i);
	var obj1 = document.getElementById("marquee" + i + "_1");
	var obj2 = document.getElementById("marquee" + i + "_2");

	obj2.innerHTML = obj1.innerHTML;
	var marqueeVar = window.setInterval("marquee("+ i +", '"+ direction +"')", 20);
	obj.onmouseover = function(){
		window.clearInterval(marqueeVar);
	}
	obj.onmouseout = function(){
		marqueeVar = window.setInterval("marquee("+ i +", '"+ direction +"')", 20);
	}
}
// 图片切换
$(function () {
		$('#home_slider').flexslider({
			animation : 'slide',
			controlNav : true,
			directionNav : true,
			animationLoop : true,
			slideshow : true,
			useCSS : false
		});
		$('#home_slider2').flexslider({
			animation : 'slide',
			controlNav : true,
			directionNav : true,
			animationLoop : true,
			slideshow : true,
			useCSS : false
		});
		$('#home_slider3').flexslider({
			animation : 'slide',
			controlNav : true,
			directionNav : true,
			animationLoop : true,
			slideshow : true,
			useCSS : false
		});
		$('#home_slider4').flexslider({
			animation : 'slide',
			controlNav : true,
			directionNav : true,
			animationLoop : true,
			slideshow : true,
			useCSS : false
		});
		$('#home_slider5').flexslider({
			animation : 'slide',
			controlNav : true,
			directionNav : true,
			animationLoop : true,
			slideshow : true,
			useCSS : false
		});
		$('#home_slider6').flexslider({
			animation : 'slide',
			controlNav : false,
			directionNav : false,
			animationLoop : true,
			slideshow : true,
			useCSS : false
		});
		$('#home_slider7').flexslider({
			animation : 'slide',
			controlNav : false,
			directionNav : true,
			animationLoop : true,
			slideshow : true,
			useCSS : false
		});
		$('#home_slider8').flexslider({
			animation : 'slide',
			controlNav : false,
			directionNav : false,
			animationLoop : true,
			slideshow : true,
			useCSS : false
		});
		$('#home_slider9').flexslider({
			animation : 'slide',
			controlNav : true,
			directionNav : false,
			animationLoop : true,
			slideshow : true,
			useCSS : false
		});
		$('#home_slider10').flexslider({
			animation : 'slide',
			controlNav : false,
			directionNav : false,
			animationLoop : true,
			slideshow : true,
			useCSS : false
		});
		$('#home_slider11').flexslider({
			animation : 'slide',
			controlNav : true,
			directionNav : true,
			animationLoop : true,
			slideshow : true,
			useCSS : false
		});
		$('#home_slider12').flexslider({
			animation : 'slide',
			controlNav : true,
			directionNav : true,
			animationLoop : true,
			slideshow : true,
			useCSS : false
		});
			$('#home_slider13').flexslider({
			animation : 'slide',
			controlNav : false,
			directionNav : true,
			animationLoop : true,
			slideshow : true,
			useCSS : true
		});
		$('#home_slider14').flexslider({
			animation : 'slide',
			controlNav : false,
			directionNav : true,
			animationLoop : true,
			slideshow : true,
			useCSS : true
		});
		$('#home_slider15').flexslider({
			animation : 'slide',
			controlNav : true,
			directionNav : false,
			animationLoop : true,
			slideshow : true,
			useCSS : true
		});
		$('#home_slider16').flexslider({
			animation : 'slide',
			controlNav : true,
			directionNav : false,
			animationLoop : true,
			slideshow : true,
			useCSS : true
		});
		$('#home_slider17').flexslider({
			animation : 'slide',
			controlNav : true,
			directionNav : false,
			animationLoop : true,
			slideshow : true,
			useCSS : true
		});
		$('#home_slider18').flexslider({
			animation : 'slide',
			controlNav : false,
			directionNav : true,
			animationLoop : true,
			slideshow : true,
			useCSS : true
		});
			$('#home_slider19').flexslider({
			animation : 'slide',
			controlNav : false,
			directionNav : false,
			animationLoop : true,
			slideshow : true,
			useCSS : true
		});
		$('#home_slider20').flexslider({
			animation : 'slide',
			controlNav : false,
			directionNav : true,
			animationLoop : true,
			slideshow : true,
			useCSS : true
		});
		$('#home_slider21').flexslider({
			animation : 'slide',
			controlNav : false,
			directionNav : true,
			animationLoop : true,
			slideshow : true,
			useCSS : true
		});
		$('#home_slider22').flexslider({
			animation : 'slide',
			controlNav : false,
			directionNav : true,
			animationLoop : true,
			slideshow : true,
			useCSS : true
		});
		
		$('#home_slider23').flexslider({
			animation : 'slide',
			controlNav : false,
			directionNav : true,
			animationLoop : true,
			slideshow : true,
			useCSS : true
		});
		
	});
