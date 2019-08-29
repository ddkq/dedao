$(function() {
	var content1Banner = new Swiper('.content-1 .swiper-container', {
		loop: true,
		autoplay: true,
	})
	var city = new Swiper('.cd', {
		loop: true,
		autoplay: true,
		on: {
		    slideChangeTransitionEnd: function(){
		    	var inx = this.activeIndex;
		    	inx == 4 ? inx = 1 : '';
		      	$('.cd-point .point li').eq(inx - 1).addClass('point-active').siblings('li').removeClass('point-active');
		    },
	  	},
	  	observer: true,
  		observeParents: true
	})
	var city2 = new Swiper('.sz', {
		loop: true,
		autoplay: true,
		on: {
		    slideChangeTransitionEnd: function(){
		    	var inx = this.activeIndex;
		    	inx == 4 ? inx = 1 : '';
		      	$('.sz-point .point li').eq(inx - 1).addClass('point-active').siblings('li').removeClass('point-active');
		    },
	  	},
	  	observer: true,
  		observeParents: true
	})
	$('.cd-point .point li').on('click', function() {
		var inx = $(this).index() + 1;
		$(this).addClass('point-active').siblings('li').removeClass('point-active');
		city.slideTo(inx, 1000, false);
	})
	$('.sz-point .point li').on('click', function() {
		var inx = $(this).index() + 1;
		$(this).addClass('point-active').siblings('li').removeClass('point-active');
		city2.slideTo(inx, 1000, false);
	})
	$('.city-tab li').on('click', function() {
		var inx = $(this).index();
		if(inx == 0) {
			$('.sz').css('display', 'none');
			$('.cd').css('display', 'block');
			$('.sz-point').css('display', 'none');
			$('.cd-point').css('display', 'block');
			$(this).addClass('tab-active').siblings('li').removeClass('tab-active');
		}
		else if(inx == 1) {
			$('.sz').css('display', 'block');
			$('.cd').css('display', 'none');
			$('.cd-point').css('display', 'none');
			$('.sz-point').css('display', 'block');
			$(this).addClass('tab-active').siblings('li').removeClass('tab-active');
		}
	})

	$('.content-3-list li').hover(function() {
		var inx = $(this).index();
		$(this).addClass('content-3-active').siblings('li').removeClass('content-3-active');
		$('.gif-list div').eq(inx).css('display', 'block').siblings('div').css('display', 'none');
	}, function() {
		/* Stuff to do when the mouse leaves the element */
	});

	var content4Banner = new Swiper('.content-4 .swiper-container', {
		on: {
		    slideChangeTransitionEnd: function(){
		      	$('.content-4-tab li').eq(this.activeIndex).addClass('content-4-active').siblings('li').removeClass('content-4-active');
		    },
	  	},
	})
	var content4Click = 0;
	$('.content-4-tab li').on('click', function() {
		var inx = $(this).index();
		$(this).addClass('content-4-active').siblings('li').removeClass('content-4-active');
		content4Banner.slideTo(inx, 1000, false);
		content4Click = inx;
	})

	$('.content-4 .arrow-left').on('click', function() {
		if(content4Click == 0) {
			return;
		}
		if(content4Click == 5) {
			$('.content-4-tab').css('right', '0%');
		}
		content4Click--;
		$('.content-4-active').removeClass('content-4-active').prev().addClass('content-4-active');
		var inx = $('.content-4-active').index();
		content4Banner.slideTo(inx, 1000, false);
	});

	$('.content-4 .arrow-right').on('click', function() {
		var liLength = $('.content-4-tab li').length - 1;
		if(content4Click == liLength) {
			return;
		}
		if(content4Click == 4) {
			$('.content-4-tab').css('right', '100%');
		}
		content4Click++;
		$('.content-4-active').removeClass('content-4-active').next().addClass('content-4-active');
		var inx = $('.content-4-active').index();
		content4Banner.slideTo(inx, 1000, false);
	});

	var length = Number;
	var clickTime = Number;
	var bannerUl = $('.content-5-banner ul');
	$.post('http://www.cdddkqyy.com/api/Ajaxdata/ajax_doctor', {}, function(data) {
		length = data.length;
		clickTime = length - 2;
		var html = '';
		for(var i = 0; i < data.length; i++) {
			html += '<li class="position-relative">'+
						'<a href="'+ data[i].post_url +'">'+
							'<img src="'+ data[i].smeta +'" alt="">'+
							'<div class="position-absolute">'+
								'<h4 class="text-white font-weight-bold mb-1 pt-3">'+ data[i].name +'</h4>'+
								'<p class="text-white mb-2">'+ data[i].duties +'</p>'+
							'</div>'+
						'</a>'+
					'</li>'
		}
		bannerUl.html(html);
		$('.content-5-banner ul li').eq(-1).after(html);
		$('.content-5-banner ul li').eq(-1).after(html);
		$('.content-5-banner ul li').eq(data.length - 1).addClass('doctor-active-prev');
		$('.content-5-banner ul li').eq(data.length).addClass('doctor-active');
		$('.content-5-banner ul li').eq(data.length + 1).addClass('doctor-active-next');
		bannerUl.css('right', (data.length - 2) * 16 + '%');
	});

	var canClick = true;
	$('.content-5 .inx-0 .arrow-right').on('click', function() {
		if(canClick) {
			canClick = false;
			if(clickTime == length*2 - 3) {
				bannerUl.css('right', clickTime * 16 + '%');
				setTimeout(function() {
					bannerUl.css('transition', 'none');
					$('.content-5-banner ul li').css('transition', 'none');
					bannerUl.css('right', (length - 2) * 16 + '%');
					$('.doctor-active-prev').removeClass('doctor-active-prev');
					$('.doctor-active').removeClass('doctor-active');
					$('.doctor-active-next').removeClass('doctor-active-next');
					$('.content-5-banner ul li').eq(length - 1).addClass('doctor-active-prev');
					$('.content-5-banner ul li').eq(length).addClass('doctor-active');
					$('.content-5-banner ul li').eq(length + 1).addClass('doctor-active-next');
					setTimeout(function() {
						bannerUl.css('transition', 'all .5s ease');
						$('.content-5-banner ul li').css('transition', 'all .5s ease');
						clickTime = length - 2;
					}, 50)
				}, 500)
			}
			clickTime++;
			$('.doctor-active-prev').removeClass('doctor-active-prev').next().addClass('doctor-active-prev');
			$('.doctor-active').removeClass('doctor-active').next().addClass('doctor-active');
			$('.doctor-active-next').removeClass('doctor-active-next').next().addClass('doctor-active-next');
			bannerUl.css('right', clickTime * 16 + '%');
			setTimeout(function() {
				canClick = true;
			}, 500)
		}
	})
	$('.content-5 .inx-0 .arrow-left').on('click', function() {
		if(canClick) {
			canClick = false;
			if(clickTime == length - 3) {
				bannerUl.css('right', clickTime * 16 + '%');
				setTimeout(function() {
					bannerUl.css('transition', 'none');
					$('.content-5-banner ul li').css('transition', 'none');
					bannerUl.css('right', (length*2 - 4) * 16 + '%');
					$('.doctor-active-prev').removeClass('doctor-active-prev');
					$('.doctor-active').removeClass('doctor-active');
					$('.doctor-active-next').removeClass('doctor-active-next');
					$('.content-5-banner ul li').eq(length*2 - 3).addClass('doctor-active-prev');
					$('.content-5-banner ul li').eq(length*2 - 2).addClass('doctor-active');
					$('.content-5-banner ul li').eq(length*2 - 1).addClass('doctor-active-next');
					setTimeout(function() {
						bannerUl.css('transition', 'all .5s ease');
						$('.content-5-banner ul li').css('transition', 'all .5s ease');
						clickTime = length*2 - 4;
					}, 50)
				}, 500)
			}
			clickTime--;
			$('.doctor-active-prev').removeClass('doctor-active-prev').prev().addClass('doctor-active-prev');
			$('.doctor-active').removeClass('doctor-active').prev().addClass('doctor-active');
			$('.doctor-active-next').removeClass('doctor-active-next').prev().addClass('doctor-active-next');
			bannerUl.css('right', clickTime * 16 + '%');
			setTimeout(function() {
				canClick = true;
			}, 500)
		}
	})

	$('.content-5-tab-list li').on('click', function() {
		var inx = $(this).index();
		$('.banner-list>div').eq(inx).fadeIn().siblings('div').css('display', 'none');
		$(this).addClass('content-5-tab-active').siblings('li').removeClass('content-5-tab-active');
	})

	var inx1Click = 0;
	$('.inx-1 .arrow-left').on('click', function() {
		if(inx1Click == -1) {
			return;
		}
		inx1Click--;
		$('.inx-1 .inx-active').removeClass('inx-active').prev().addClass('inx-active');
		$('.inx-1-banner ul').css('right', inx1Click * 362);
	})
	$('.inx-1 .arrow-right').on('click', function() {
		if(inx1Click == 3) {
			return;
		}
		inx1Click++;
		$('.inx-1 .inx-active').removeClass('inx-active').next().addClass('inx-active');
		$('.inx-1-banner ul').css('right', inx1Click * 362);
	})


	var inx2Click = 0;
	$('.inx-2 .arrow-left').on('click', function() {
		if(inx2Click == -1) {
			return;
		}
		inx2Click--;
		$('.inx-2 .inx-active').removeClass('inx-active').prev().addClass('inx-active');
		$('.inx-2-banner ul').css('right', inx2Click * 362);
	})
	$('.inx-2 .arrow-right').on('click', function() {
		if(inx2Click == 4) {
			return;
		}
		inx2Click++;
		$('.inx-2 .inx-active').removeClass('inx-active').next().addClass('inx-active');
		$('.inx-2-banner ul').css('right', inx2Click * 362);
	})

	var inx3Click = 0;
	$('.inx-3 .arrow-left').on('click', function() {
		if(inx3Click == -1) {
			return;
		}
		inx3Click--;
		$('.inx-3 .inx-active').removeClass('inx-active').prev().addClass('inx-active');
		$('.inx-3-banner ul').css('right', inx3Click * 362);
	})
	$('.inx-3 .arrow-right').on('click', function() {
		if(inx3Click == 8) {
			return;
		}
		inx3Click++;
		$('.inx-3 .inx-active').removeClass('inx-active').next().addClass('inx-active');
		$('.inx-3-banner ul').css('right', inx3Click * 362);
	})



})