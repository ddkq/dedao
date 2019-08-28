$(function() {
	var mySwiper = new Swiper('.swiper-container', {
		autoplay: true,//可选选项，自动滑动
		loop: true,
	})
	setTimeout(function() {
		$('.content-1').fadeIn();
	}, 500)
	setTimeout(function() {
		$('.content-2').fadeIn();
	}, 2000)
})
$('.swt-btn input').focus(function(){
  	window.location.replace("http://swt.szddkqyy.com/LR/chatwin.aspx?id=MTI57225838");
});