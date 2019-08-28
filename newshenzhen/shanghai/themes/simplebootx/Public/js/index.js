$(function() {
	$('.banner-bottom-msg li').on('mouseenter', function() {
		$(this).addClass('banner-bottom-active').siblings().removeClass('banner-bottom-active');
	})
	$('.doctor-list li').on('mouseenter', function() {
		$(this).children('div').children('.doctor-detail').css({'top': 0, 'opacity': 1});
	})
	$('.doctor-list li').on('mouseleave', function() {
		$(this).children('div').children('.doctor-detail').css({'top': 100 + '%', 'opacity': 0});
	})
	$("img").lazyload();
})
$(function() {
	var mySwiper = new Swiper('.banner', {
		autoplay: {
			 delay: 10000,
		},
		width: window.innerWidth,
		loop : true,
		simulateTouch : false,
		navigation: {
		   nextEl: '.next',
		   prevEl: '.prev',
		},
		pagination: {
		    el: '.swiper-pagination',
		    clickable :true,
	  	},
	})

	var mySwiper2 = new Swiper('.content4-1', {
		simulateTouch : false,
	})
	$('.content4-tab li').on('click', function() {
		var inx = $(this).index();
		$(this).addClass('content4-tab-active').siblings().removeClass('content4-tab-active');
		mySwiper2.slideTo(inx, 500, false);
	})


	var sedondTab1 = new Swiper('.content4-2', {
		simulateTouch : false,
	})
	$('.content4-second-tab1 li').on('click', function() {
		var inx = $(this).index();
		$(this).addClass('content4-second-active').siblings().removeClass('content4-second-active');
		sedondTab1.slideTo(inx, 500, false);
	})
	var sedondTab2 = new Swiper('.content4-3', {
		simulateTouch : false,
	})
	$('.content4-second-tab2 li').on('click', function() {
		var inx = $(this).index();
		$(this).addClass('content4-second-active').siblings().removeClass('content4-second-active');
		sedondTab2.slideTo(inx, 500, false);
	})
	var sedondTab3 = new Swiper('.content4-4', {
		simulateTouch : false,
	})
	$('.content4-second-tab3 li').on('click', function() {
		var inx = $(this).index();
		$(this).addClass('content4-second-active').siblings().removeClass('content4-second-active');
		sedondTab3.slideTo(inx, 500, false);
	})
	var sedondTab4 = new Swiper('.content4-5', {
		simulateTouch : false,
	})
	$('.content4-second-tab4 li').on('click', function() {
		var inx = $(this).index();
		$(this).addClass('content4-second-active').siblings().removeClass('content4-second-active');
		sedondTab4.slideTo(inx, 500, false);
	})
	var sedondTab5 = new Swiper('.content4-6', {
		simulateTouch : false,
	})
	$('.content4-second-tab5 li').on('click', function() {
		var inx = $(this).index();
		$(this).addClass('content4-second-active').siblings().removeClass('content4-second-active');
		sedondTab5.slideTo(inx, 500, false);
	})


	var mySwiper4 = new Swiper('.content5-doctor', {
		loop : true,
		simulateTouch : false,
		slidesPerView : 4,
		slidesPerGroup : 4,
		spaceBetween : 27,
		pagination: {
		    el: '.doctor-banner-nav',
		    clickable : true,
		},
		autoplay: {
			delay: 3000,
		}
	})
	
	var mySwiper5 = new Swiper('.content3-cases', {
		loop : true,
		navigation: {
		   nextEl: '.next2',
		   prevEl: '.prev2',
		},
		pagination: {
		    el: '.case-banner-nav',
		    clickable : true,
		},
	})

	certifySwiper = new Swiper('#certify .swiper-container', {
		watchSlidesProgress: true,
		slidesPerView: 'auto',
		centeredSlides: true,
		loop: true,
		loopedSlides: 5,
		navigation: {
			nextEl: '.content6-right-btn',
			prevEl: '.content6-left-btn',
		},
		on: {
			progress: function(progress) {
				for (i = 0; i < this.slides.length; i++) {
					var slide = this.slides.eq(i);
					var slideProgress = this.slides[i].progress;
					modify = 1;
					if (Math.abs(slideProgress) > 1) {
						modify = (Math.abs(slideProgress) - 1) * 0.3 + 1;
					}
					translate = slideProgress * modify * 260 + 'px';
					scale = 1 - Math.abs(slideProgress) / 5 + .5;
					zIndex = 999 - Math.abs(Math.round(10 * slideProgress));
					slide.transform('translateX(' + translate + ') scale(' + scale + ')');
					slide.css('zIndex', zIndex);
					slide.css('opacity', 1);
					if (Math.abs(slideProgress) > 3) {
						slide.css('opacity', 0);
					}
				}
			},
			setTransition: function(transition) {
				for (var i = 0; i < this.slides.length; i++) {
					var slide = this.slides.eq(i)
					slide.transition(transition);
				}

			}
		}
	})
})