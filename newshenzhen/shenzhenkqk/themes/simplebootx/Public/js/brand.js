
//左侧导航
$(function(){
	if($('.brand_left').length>0){
        var bleftHeight = $('.brand_left').height();
        var footTop = $('#footer').offset().top;
        $(window).scroll(function () {
            footTop = $('#footer').offset().top;
            if ($(window).scrollTop() + bleftHeight >= footTop -80) {
                $('.brand_left').css({'position': 'absolute', 'bottom': '50px' ,'top':'auto'});
            } else if ($(window).scrollTop() > $('.brand_main').offset().top - 100) {
                $('.brand_left').css({'position': 'fixed', 'top': '180px'});
            }
            else {
                $('.brand_left').css({'position': 'relative', 'top': '-70px'});
            }
        });
    }
});