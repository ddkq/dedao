$(function() {
	var swiper = new Swiper('.content-box-7-banner', {
		loop : true,
		pagination: {
			el: '.content-box-7 .swiper-pagination',
		},
		initialSlide : 6,
	})
	var mySwiper = new Swiper('.content-5-text', {
		pagination: {
		    el: '.content-5-text .swiper-pagination',
	  	},
	  	on: {
		    slideChangeTransitionStart: function(){
		      	$('.content-5-icon li').eq(this.activeIndex).addClass('content-check').siblings().removeClass('content-check');
		    },
	  	},
	})
	$('.content-5-icon li').on('click', function() {
		var inx = $(this).index();
		$(this).addClass('content-check').siblings().removeClass('content-check');
		mySwiper.slideTo(inx, 800, false);
	})
})