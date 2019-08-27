$(function() {
	var mySwiper = new Swiper('.content-4 .swiper-container', {
		
	})
	$('.doctor-tab>div').on('click', function() {
		var inx = $(this).index();
		mySwiper.slideTo(inx, 500, false);
		$(this).addClass('active-doctor').siblings('div').removeClass('active-doctor');

		if(inx == 1) {
			$('.left-text>div').eq(0).css({'left': '-100%', 'opacity': 0});
			$('.right-text>div').eq(0).css({'right': '100%', 'opacity': 0});
			$('.left-text>div').eq(inx).css({'left': '0%', 'opacity': 1});
			$('.right-text>div').eq(inx).css({'right': '0%', 'opacity': 1});
		}
		else if(inx == 0) {
			$('.left-text>div').eq(inx).css({'left': '0%', 'opacity': 1});
			$('.right-text>div').eq(inx).css({'right': '0%', 'opacity': 1});
			$('.left-text>div').eq(1).css({'left': '100%', 'opacity': 0});
			$('.right-text>div').eq(1).css({'right': '-100%', 'opacity': 0});
		}
	})
})