$(function() {
	var clickTime = 0;
	var mySwiper = new Swiper('.content-4 .swiper-container', {
		
	})
	$('.doctor-tab>div').on('click', function() {
		var inx = $(this).index();
		mySwiper.slideTo(inx, 500, false);
		$(this).addClass('active-doctor').siblings('div').removeClass('active-doctor');
		clickTime = inx;
		move(inx);
	})
	$('.w-430px>div').on('click', function() {
		var inx = $(this).index();
		$(this).addClass('active').siblings('div').removeClass('active');
		$('.w-32>div').eq(inx).css('display', 'block').siblings('div').css('display', 'none');
		$('.w-30>div').eq(inx).css('display', 'block').siblings('div').css('display', 'none');
	})
	$('.arrow-right').on('click', function() {
		if(clickTime == 3) {
			return;
		}
		clickTime++;
		mySwiper.slideTo(clickTime, 500, false);

		move(clickTime);
		$('.doctor-tab>div').eq(clickTime).addClass('active-doctor').siblings('div').removeClass('active-doctor');
	})
	$('.arrow-left').on('click', function() {
		if(clickTime == 0) {
			return;
		}
		clickTime--;
		mySwiper.slideTo(clickTime, 500, false);

		move(clickTime);
		$('.doctor-tab>div').eq(clickTime).addClass('active-doctor').siblings('div').removeClass('active-doctor');
	})

	function move(clickTime) {
		if(clickTime == 1) {
			$('.left-text>div').eq(0).css({'left': '-100%', 'opacity': 0});
			$('.right-text>div').eq(0).css({'right': '100%', 'opacity': 0});

			$('.left-text>div').eq(1).css({'left': '0%', 'opacity': 1});
			$('.right-text>div').eq(1).css({'right': '0%', 'opacity': 1});

			$('.left-text>div').eq(2).css({'left': '100%', 'opacity': 0});
			$('.right-text>div').eq(2).css({'right': '-100%', 'opacity': 0});

			$('.left-text>div').eq(3).css({'left': '200%', 'opacity': 0});
			$('.right-text>div').eq(3).css({'right': '-200%', 'opacity': 0});

			$('.doctor-tab').css('right', '-84.5%');
		}
		else if(clickTime == 0) {
			$('.left-text>div').eq(0).css({'left': '0%', 'opacity': 1});
			$('.right-text>div').eq(0).css({'right': '0%', 'opacity': 1});

			$('.left-text>div').eq(1).css({'left': '100%', 'opacity': 0});
			$('.right-text>div').eq(1).css({'right': '-100%', 'opacity': 0});

			$('.left-text>div').eq(2).css({'left': '200%', 'opacity': 0});
			$('.right-text>div').eq(2).css({'right': '-200%', 'opacity': 0});

			$('.left-text>div').eq(3).css({'left': '300%', 'opacity': 0});
			$('.right-text>div').eq(3).css({'right': '-300%', 'opacity': 0});
		}
		else if(clickTime == 2) {
			$('.left-text>div').eq(0).css({'left': '-200%', 'opacity': 0});
			$('.right-text>div').eq(0).css({'right': '200%', 'opacity': 0});

			$('.left-text>div').eq(1).css({'left': '-100%', 'opacity': 0});
			$('.right-text>div').eq(1).css({'right': '100%', 'opacity': 0});

			$('.left-text>div').eq(2).css({'left': '0%', 'opacity': 1});
			$('.right-text>div').eq(2).css({'right': '0%', 'opacity': 1});

			$('.left-text>div').eq(3).css({'left': '100%', 'opacity': 0});
			$('.right-text>div').eq(3).css({'right': '-100%', 'opacity': 0});

			$('.doctor-tab').css('right', 0);
		}
		else if(clickTime == 3) {
			$('.left-text>div').eq(0).css({'left': '-300%', 'opacity': 0});
			$('.right-text>div').eq(0).css({'right': '300%', 'opacity': 0});

			$('.left-text>div').eq(1).css({'left': '-200%', 'opacity': 0});
			$('.right-text>div').eq(1).css({'right': '200%', 'opacity': 0});

			$('.left-text>div').eq(2).css({'left': '-100%', 'opacity': 0});
			$('.right-text>div').eq(2).css({'right': '100%', 'opacity': 0});

			$('.left-text>div').eq(3).css({'left': '0%', 'opacity': 1});
			$('.right-text>div').eq(3).css({'right': '0%', 'opacity': 1});
		}
	}
})