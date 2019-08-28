$(function() {
	$('.arrow-left').on('click', function() {
		var inx = $('.content-banner .content-banner-show').index();
		inx == 0 ? ($('.content-banner .content-banner-show').css('display', 'none').removeClass('content-banner-show') | $('.content-banner>div').eq(-1).fadeIn().addClass('content-banner-show')) : $('.content-banner .content-banner-show').css('display', 'none').removeClass('content-banner-show').prev().addClass('content-banner-show').fadeIn();
	});
	$('.arrow-right').on('click', function() {
		var inx = $('.content-banner .content-banner-show').index();
		inx == 3 ? ($('.content-banner .content-banner-show').css('display', 'none').removeClass('content-banner-show') | $('.content-banner>div').eq(0).fadeIn().addClass('content-banner-show')) : $('.content-banner .content-banner-show').css('display', 'none').removeClass('content-banner-show').next().addClass('content-banner-show').fadeIn();
	});
	var mySwiper = new Swiper('.doctor', {
		simulateTouch : false,
	});
	$('.doctor-tab>div').on('click', function() {
		var inx = $(this).index();
		$(this).children('div').addClass('doctor-tab-active');
		$(this).siblings('div').children('div').removeClass('doctor-tab-active');
		mySwiper.slideTo(inx, 500, false);
	});
})