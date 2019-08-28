$(function(){
	$(".menu_box").height($(window).height());
	$(".menu-tab-left").height($(window).height() - $('.menu-head').height() - $('.menu-tabs').height());
	$(".menu-tab-right").height($(window).height() - $('.menu-head').height() - $('.menu-tabs').height());
	$(window).bind("scroll",function() { 
		if ($(document).scrollTop() >=50 ) {
			$(".btn-top").css("display","block");
		}else{
			$(".btn-top").css("display","none");
		}
	})
	$(".btn-top").click(function(){
		$("html, body").animate({
			"scroll-top":0
		},"fast");
	});
	$(".submenu").click(function(){
		$(".menu_box").animate({right:'0px'});
	})
	$(".menu-head-close").click(function(){
		$(".menu_box").animate({right:'-100%'});
	});
	
	TouchSlide({slideCell:"#leftTabBox"});
	var rn = Math.floor(Math.random()*(100-41)+40);
	$('#radNum').text(rn);
	if($("#shareBtn").length > 0){
		document.getElementById('shareBtn').addEventListener('click', function() {
		    soshm.popIn({
		    	title: '弹窗分享',
		    	sites: ['weixin', 'weixintimeline', 'weibo', 'yixin', 'qzone', 'tqq', 'qq']
		    });
		}, false);	
	}
});




$(".show_child").click(function(){
	$(".termchild_list").slideToggle();
});


//跟踪地址
var alinks = document.getElementsByTagName('a');
var localhref = window.location.href.split('#');
if (localhref.length >1&& localhref[1] != '') {
    for (var index in alinks) {
        if (typeof(alinks[index].href)=='string' && alinks[index].href.substr(0, 10).toLowerCase() != 'javascript' && alinks[index].href.substr(0, 3).toLowerCase() != 'tel') {
            if (alinks[index].href.indexOf("#") == -1) {
                alinks[index].href = alinks[index].href + '#' + localhref[1];
            } else {
                alinks[index].href = alinks[index].href + '&' + localhref[1];
            }
        }
    }
}