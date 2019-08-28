$(function() {
	var mySwiper = new Swiper('.right-img .swiper-container', {
		autoplay: true,//可选选项，自动滑动
		on: {
		    slideChangeTransitionEnd: function(){
		      	$('.tab li').eq(this.activeIndex).addClass('active').siblings('li').removeClass('active');
		      	$('.lef-text h2').eq(this.activeIndex).css('display', 'block').siblings('h2').css('display', 'none');
		      	$('.banner-text p').eq(this.activeIndex).fadeIn().siblings('p').css('display', 'none');
		    },
	  	},
	})

	$('.tab li').on('click', function() {
		var inx = $(this).index();
		$(this).addClass('active').siblings('li').removeClass('active');
		mySwiper.slideTo(inx, 500, false);
	})

	var mySwiper2 = new Swiper('.content-5 .swiper-container', {
		autoplay: true,//可选选项，自动滑动
		navigation: {
	      	nextEl: '.swiper-button-next',
	      	prevEl: '.swiper-button-prev',
	    },
	})

	var mySwiper3 = new Swiper('.last', {
		autoplay: true,//可选选项，自动滑动
		loop: true,
	})
})