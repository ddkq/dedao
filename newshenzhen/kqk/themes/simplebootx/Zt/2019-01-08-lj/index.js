$(function() {
	var mySwiper = new Swiper('.content-2 .swiper-container', {
	  	navigation: {
	      	nextEl: '.content-2 .arrow-right',
	      	prevEl: '.content-2 .arrow-left',
	    },
	    loop: true,
	    autoplay: true,
	})
	$('.content-banner-tab div').on('click', function() {
		var inx = $(this).index();
		$(this).addClass('active').siblings('div').removeClass('active');
		mySwiper.slideTo(inx, 500, false);
	})

	var mySwiper2 = new Swiper('.content-4 .swiper-container', {
		on: {
		    slideChangeTransitionEnd: function(){
		      	$('.point li').eq(this.activeIndex).addClass('point-active').siblings('li').removeClass('point-active');
		      	$('.content-banner-text div').eq(this.activeIndex).fadeIn().siblings('div').css('display', 'none');
		      	$('.content-banner-title span').eq(this.activeIndex).fadeIn().siblings('span').css('display', 'none');
		    },
	  	},
	  	navigation: {
	      	nextEl: '.content-4 .arrow-right',
	      	prevEl: '.content-4 .arrow-left',
	    },
	})
	$('.point li').on('click', function() {
		var inx = $(this).index();
		$(this).addClass('point-active').siblings('li').removeClass('point-active');
		mySwiper2.slideTo(inx, 500, false);
	})



	var swiper3 = new Swiper('.content-5 .swiper-container', {
      	slidesPerView : 3,
		loop: true,
		autoplay: true,
    });
})