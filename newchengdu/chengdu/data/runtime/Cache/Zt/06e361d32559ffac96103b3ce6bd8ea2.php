<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>华夏行_<?php echo ($site_name); ?></title>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon"/>
<link href="/themes/simplebootx/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx/Public/css/bootstrap4.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/themes/simplebootx/Public/css/swiper.min.css">
<link href="/themes/simplebootx/Public/css/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<link href="/themes/simplebootx/Public/css/base.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/themes/simplebootx/Public/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/themes/simplebootx/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/themes/simplebootx/Public/js/jquery.SuperSlide.2.1.1.js"></script>
<script src="/themes/simplebootx/Public/js/swiper.min.js"></script>
<!--<script language="javascript" src="http://swt.cdddkqyy.com/JS/LsJS.aspx?siteid=MRW75183048&lng=cn"></script>-->
<script language="javascript" src="//scripts.easyliao.com/js/easyliao.js"></script>
<script>
	var script=document.createElement("script");
	script.type="text/javascript";
	script.src="//scripts.easyliao.com/16524/27486/lazy.js";
	document.getElementsByTagName('head')[0].appendChild(script);
	script.onload=function(){}
</script>

	<link rel="stylesheet" href="/themes/simplebootx/Public/css/bootstrap4.min.css">
	<link href="/themes/simplebootx/Public/css/swiper.min.css" rel="stylesheet" type="text/css">
	<script src="/themes/simplebootx/Public/js/swiper.min.js"></script>
	<link href="/themes/simplebootx/Zt/huaxia/index.css" rel="stylesheet" type="text/css">
</head>
<body>
	<header class="header">
	<div class="header-bcg">
		<div class="content-width">
			<div class="flex header-content">
				<div class="header-left">
					<i class="header-icon map-marker"></i>
					<span>德道口腔连锁：</span>
					<span class="chengdu">成都</span>
					<i class="vertical"></i>
					<span class="shenzhen">深圳</span>
					<i class="vertical"></i>
					<span class="shanghai">上海</span>
					<i class="vertical"></i>
					<span class="guangzhou">广州</span>
				</div>
				<div class="header-right flex">
					<div class="time">
						<i class="header-icon"></i>
						<span>门诊时间: 09:00-18:00</span>
					</div>
					<i class="vertical"></i>
					<div class="phone-num">
						<i class="header-icon"></i>
						<span>健康热线: 400-800-6161 / 028-67696635</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="content-width">
		<div class="header-logo flex">
			<div>
				<a href="/"><img src="/themes/simplebootx/Public/images/new-logo.png" alt=""></a>
				<div class="header-title"><img src="/themes/simplebootx/Public/images/header-title.gif" alt=""></div>
			</div>
			<div class="flex">
				<div class="header-logo-first flex align-items-center">
					<i class="header-icon"></i>
					<span>成都即刻用<br/>种植牙研究院</span>
				</div>
				<i class="vertical"></i>
				<div class="header-logo-second flex align-items-center">
					<i class="header-icon"></i>
					<span>麦哲伦<br/>数字化中心</span>
				</div>
				<i class="vertical"></i>
				<div class="header-logo-third flex align-items-center">
					<i class="header-icon"></i>
					<span>市医保<br/>定点单位</span>
				</div>
			</div>
		</div>
	</div>
	
	

	<div class="header-nav">
		<div class="content-width">
			<ul class="flex header-nav-list mb-0">
				<li>
					<div class="header-nav-active"><a href="/">网站首页</a></div>
				</li>
				<li>
					<div><a href="/about.html">德道品牌</a></div>
				</li>
				<li>
					<div><a href="#">种牙项目</a></div>
				</li>
				<li>
					<div><a onclick="openJesongChatByGroup(16524,20125);">种牙案例</a></div>
				</li>
				<li>
					<div><a href="/department/7.html">种牙专家</a></div>
				</li>
				<li>
					<div><a href="/list/105.html">种牙设备</a></div>
				</li>
				<li>
					<div><a href="/zt/correct">牙齿矫正</a></div>
				</li>
				<li>
					<div><a onclick="openJesongChatByGroup(16524,20125);">牙齿修复</a></div>
				</li>
			</ul>
		</div>
	</div>
</header>
<script src="/themes/simplebootx/Public/js/moveline.js"></script>
<script>
	$('.header-nav-list').moveline({color: '#c11820', position: 'inner', height: 100+'%'});

	$('.header-nav-list li').on('mouseenter', function() {
		$(this).children().addClass('header-nav-active');
		$(this).siblings().children().removeClass('header-nav-active');
	})
	$('.header-nav-list li').on('mouseleave', function() {
		$('.header-nav-list li').children().removeClass('header-nav-active');
		$('.header-nav-list li').eq(0).children().addClass('header-nav-active');
	})
</script>
	<section class="banner">
		<img src="/themes/simplebootx/Zt/huaxia/imgs/banner.jpg" />
	</section>
	
	<section class="content-1 container mt-4 pl-3 pr-3">
		<div class="content-1-text d-flex">
			<h4 class="text-white text-center p-2 font-weight-bold mb-0">活动背景</h4>
			<p class="p-2 pt-3 mb-0 text-indent">口腔健康是全身健康的重要组成部分。2019年1月31日，国家卫生健康委办公厅印发<font class="font-weight-bold">《健康口腔行动方案（2019—2025年）》</font>，提出要进行全人群、全周期口腔健康管理优化行动。在国家政策号召下，以“发展前沿技术，推动产业升级”为办院方针的德道口腔，积极快速行动，聚焦行动方案中特别关注的中老年群体，集成都、深圳、上海三城之力，并联合权威媒体举办<font class="font-weight-bold">“健康口腔，惠民成都”2019中老年口腔健康华夏行活动。</font></p>
		</div>
	</section>
	
	<section class="content-2 mt-3 pt-5 pb-5">
		<div class="text-center"><img src="/themes/simplebootx/Zt/huaxia/imgs/content-2-title.png" /></div>
		<div class="content-2-text container mt-3">
			<p class="text-indent">3月4日，由成都广播电视台、中老年口腔健康华夏行组委会主办的“2019中老年口腔健康华夏行”在成都市全面启动，活动通过科普宣传、免费口腔检查、先进种植技术推广，公益免费种牙补贴等惠民政策，提升中老年的口腔健康意识和防治知识，让更多缺牙中老年享受到先进种植牙技术，拥有健康晚年。</p>
		</div>
	</section>
	
	<section class="content-name mt-5 container d-flex p-5 justify-content-between">
		<div class="text-white text-center pt-3">
			<h2 class="font-weight-bold mt-2 mb-3">50岁以上<span class="yellow">缺牙市民</span></h2>
			<h2 class="font-weight-bold mb-3">符合条件者获</h2>
			<h1 class="yellow font-weight-bold mb-3">公益免费种牙名额</h1>
			<a class="swt-btn mt-3 pt-2 pb-2 w-50" href="/swt/" target="_blank">立即申请</a>
		</div>
		<div class="name-lists text-center pt-3">
			<p class="text-center m-auto p-2 text-white">已有<span class="yellow"><?php echo ($code = mt_rand(100,300)); ?></span>名市民参与报名</p>
			<div class="name-list pt-4 pb-2">
				<div class="swiper-container data-list swiper-no-swiping" style="height: 200px;">
					<div class="swiper-wrapper">
						
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="content-other pt-5 pb-5 mt-5">
		<div class="container">
			<div class="text-center"><img src="/themes/simplebootx/Zt/huaxia/imgs/content-other-title.png" alt=""></div>
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide"><img src="/themes/simplebootx/Zt/huaxia/imgs/content-other1.png" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Zt/huaxia/imgs/content-other2.png" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Zt/huaxia/imgs/content-other3.png" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Zt/huaxia/imgs/content-other4.png" alt=""></div>
				</div>
			</div>
		</div>
	</section>

	<section class="content-4 mt-5 mb-5">
		<div class="container text-center">
			<div><img src="/themes/simplebootx/Zt/huaxia/imgs/content-4-title.png" alt=""></div>
			<p class="content-4-text mt-4">自“即刻用”种植牙落户蓉城一年以来，其“即拔、即种、即用”<br>的技术特性深受市民信赖，已成功为7000多缺牙患者恢复咀嚼，拥有口福生活。</p>
			<div class="mt-4"><img src="/themes/simplebootx/Zt/huaxia/imgs/content-4.png" alt=""></div>
		</div>
	</section>

	<section class="content-5 pt-5 pb-5">
		<div class="container">
			<div class="text-center"><img src="/themes/simplebootx/Zt/huaxia/imgs/content-5-title.png" alt=""></div>
			<p class="text-indent content-5-text mt-4">德道口腔凭借成都百年口腔医疗技术沉淀，联合上海的国际化、深圳的智能化，三大平台合力打造“智能牙科”。成都德道口<br>腔专注中老年即刻用种植牙，一直在数字化和人工智能方面大力投入，积极对接口腔诊疗的世界前沿技术会和设备，开创智能牙科<br>3.0，实施精准医疗，不断满足人民群众日益增长的医疗卫生健康需求。</p>
			<div class="swiper-container content-5-banner-1 mt-4">
				<div class="swiper-wrapper">
					<div class="swiper-slide"><img src="/themes/simplebootx/Zt/huaxia/imgs/content5-banner-1-1.png" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Zt/huaxia/imgs/content5-banner-1-2.png" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Zt/huaxia/imgs/content5-banner-1-3.png" alt=""></div>
				</div>
			</div>
			<div class="mt-4"><img src="/themes/simplebootx/Zt/huaxia/imgs/content-5.png" alt=""></div>
			<div class="swiper-container content-5-banner-2 mt-4">
				<div class="swiper-wrapper">
					<div class="swiper-slide"><img src="/themes/simplebootx/Zt/huaxia/imgs/content5-banner-2-1.png" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Zt/huaxia/imgs/content5-banner-2-2.png" alt=""></div>
				</div>
			</div>
		</div>
	</section>

	<section class="last text-center w-100" onclick="openJesongChatByGroup(16524,20125);">
		<a href="javascript:;" class="pt-3 pb-3">
			<img src="/themes/simplebootx/Zt/huaxia/imgs/last.png" alt="">
		</a>
	</section>
	<div class="fixed-left">
		<div>
			<a onclick="openJesongChatByGroup(16524,20125);"><img src="/themes/simplebootx/Public/images/fixed.jpg" alt=""></a>
			<i class="fa fa-close fixed-close"></i>
		</div>
	</div>
	<div class="fixed-right">
		<div>
			<a onclick="openJesongChatByGroup(16524,20125);"><img src="/themes/simplebootx/Public/images/activity2.gif" alt=""></a>
			<i class="fa fa-close fixed-close"></i>
		</div>
	</div>
	<div id="copy" style="padding-bottom: 14rem;">
		<div class="copy">
			<p class="mb-0">CopyRight © 2017 成都青羊德道口腔医院 版权所有</p>
			<p class="mb-0">
				<a href="http://www.miitbeian.gov.cn" target="_blank">ICP备案号：蜀ICP备18017345号-1</a>
				<a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=51010502010725">
					<img src="/themes/simplebootx/Public/images/ga-icon.png" style="float:left;" />川公网安备 51010502010725号
				</a>
				广审号：（成青） 医广【2018】第06-05-510105045号
			</p>
			<p class="mb-0">声明：网站信息仅供参考，不能作为诊断及医疗依据。</p>
		</div>
	</div>
	<div id="new_swt">
		<a href="javascript:void(0)" target="_self" class="swt-close"></a>
		<div class="swtslide swiper-container">
			<div class="swiper-wrapper">
				<?php if(is_array($ad_slides)): $i = 0; $__LIST__ = $ad_slides;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="swiper-slide"><a href="<?php echo ($vo["slide_url"]); ?>" target="_blank"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="swiper-pagination swiper-pagination-progressbar" id="swtslide-pagination3">
				<span class="swiper-pagination-progressbar-fill"></span>
			</div>
		</div>
		<div class="swt_mid">
			<p class="mb-0"><img src="/themes/simplebootx/Public/images/swt/phone.png"/></p>
			<a class="inputc" onclick="openJesongChatByGroup(16524,20125);"></a>
			<a class="swtfs" onclick="openJesongChatByGroup(16524,20125);">发送</a>
		</div>
	</div>
	<script>
	
	/*function openJesongChatByGroup(m,n){
		window.open('http://swt.cdddkqyy.com/LR/chatwin.aspx?id=MRW75183048');
	}*/
	
	
	$(function() {
	
		$('.first-nav>li.sick-nav').on('mouseenter', function() {
			$('.second-nav').slideDown(250);
			$('.third-nav').removeClass('nav-line');
			$(this).find('.arrow-icon').css('display','block');
			$(this).find('.arrow-line').css('display','block');
		})
		$('.first-nav>li.sick-nav').on('mouseleave', function() {
			$('.second-nav').slideUp(250);
			$('.third-nav').addClass('nav-line');
			$(this).find('.arrow-icon').css('display','none');
			$(this).find('.arrow-line').css('display','none');
		})
		$('.second-nav>li').on('mouseenter', function() {
			$(this).children('a').addClass('second-nav-active');
			$(this).children('.third-nav').removeClass('unshow');
			$(this).siblings().children('a').removeClass('second-nav-active');
			$(this).siblings().children('.third-nav').addClass('unshow');
		})
		$('.second-nav>li').on('mouseleave', function() {
			$('.second-nav>li').siblings().children('a').removeClass('second-nav-active');
			$('.second-nav>li').siblings().children('.third-nav').addClass('unshow');
			$('.second-nav>li:first-child>a').addClass('second-nav-active');
			$('.second-nav>li:first-child>.third-nav').removeClass('unshow');
		})
		
		$('.first-nav>li.brand-nav').on('mouseenter', function() {
			$('.second-nav2').slideDown(100);
			$('.third-nav').removeClass('nav-line');
			$(this).find('.arrow-icon').css('display','block');
			$(this).find('.arrow-line').css('display','block');
		})
		$('.first-nav>li.brand-nav').on('mouseleave', function() {
			$('.second-nav2').slideUp(100);
			$('.third-nav').addClass('nav-line');
			$(this).find('.arrow-icon').css('display','none');
			$(this).find('.arrow-line').css('display','none');
		})
		
		var swtslide = new Swiper('.swtslide',{
			pagination: {
			    el: '#swtslide-pagination3',
			    type: 'progressbar',
			},
			loop : false,
			autoplay: {
			    delay: 3000,
		  	},
		  	observer: true, 
        	observerParents: true,
		  	simulateTouch : false,
		})
		
		setTimeout(function() {
			$('#new_swt').css('visibility', 'visible');
		}, 5000)

		function time() {
			var ref = setTimeout(function(){
				$('#new_swt').css('visibility', 'visible');
			}, 15000);
		}
			
		$('.swt-close').click(function(){
			$('#new_swt').css('visibility', 'hidden');
			time();
		});
	})
    
    
	
	
	jQuery(".ad_tech").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:4,prevCell:'.prev1',nextCell:'.next1'});
	jQuery("#nav1").slide({ type:"menu", titCell:".nLi", targetCell:".sub",effect:"slideDown",delayTime:300,triggerTime:0,returnDefault:true});
	jQuery(".header_nav").slide({ type:"menu", titCell:".nLi", targetCell:".sub",effect:"slideDown",delayTime:300,triggerTime:0,returnDefault:true});
	jQuery(".banner_top ul").slide({ type:"menu", titCell:".nLi", targetCell:".sub",effect:"slideDown",delayTime:300,triggerTime:0,returnDefault:true});
	$('.fix_main').find('.btn').click(function(){
		if($(this).find('i').hasClass('fa-reorder')){
			$(this).find('i').removeClass('fa-reorder').addClass('fa-times');
		}else{
			$(this).find('i').removeClass('fa-times').addClass('fa-reorder');
		}
	});
	var rn = Math.floor(Math.random()*(100-41)+40);
	$('#radNum').text(rn);
	
	jQuery(".right_advBox").slide({mainCell:".bd ul",autoPlay:true});
	jQuery(".right_doctorBox").slide({mainCell:".bd ul",autoPlay:true});
	jQuery(".right_caseBox").slide({mainCell:".bd ul",autoPlay:true});
	jQuery(".right_hotsBox").slide({mainCell:".bd ul",autoPlay:true});
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
	

	
	//百度统计代码
	var _hmt = _hmt || [];
	(function() {
	  var hm = document.createElement("script");
	  hm.src = "https://hm.baidu.com/hm.js?4cacc15b117be8562b33d04284b6d5d7";
	  var s = document.getElementsByTagName("script")[0]; 
	  s.parentNode.insertBefore(hm, s);
	})();
	
	
	
	
</script>

</body>
<script>
	$(function() {
		var banner1 = new Swiper('.content-5-banner-1', {
			autoplay: true,
			loop: true,
		})
		var banner2 = new Swiper('.content-5-banner-2', {
			autoplay: true,
			loop: true,
		})
		
		var mySwiper = new Swiper('.name-list .swiper-container',{
		    autoplay: true,
		    observer: true,
		    loop: true,
		    direction : 'vertical',
		    height: 40,
	  	});

	  	var banner3 = new Swiper('.content-other .swiper-container', {
	  		autoplay: true,
	  		loop: true,
	  	})
		
		$.post('/api/form/formdata', {}, function(data) {
			// console.log(data)
			var html = '';
			for(var i = 0; i < data.length; i ++) {
				html += '<div class="swiper-slide text-center">'+
							'<span class="d-inline-block ml-3">'+ data[i].name +'</span>'+
							'<span class="d-inline-block ml-3">'+ data[i].phone +'</span>'+
							'<span class="d-inline-block ml-3">'+ data[i].time +'</span>'+
						'</div>';
			}
			$('.name-list .swiper-wrapper').html(html);
		});
	})
</script>
<script>
	$('.tsxm').hover(function(){
		$('.if_pop').animate({
			height: '256px'
		});
	},function(){
		$('.if_pop').animate({
			height: '0'
		});
	});
	$('.code').hover(function(){
		$('.smcode').animate({
			width: '200px',
			opacity: '1',
		});
	},function(){
		$('.smcode').animate({
			width: '0'
		});
	});

	$('.return-top').on('click', function() {
		$('html,body').animate({ scrollTop: 0 }, 500);
	})

	$(function() {
		$('.fixed-close').on('click', function() {
			$(this).parent().parent('div').fadeOut();
			setTimeout(function() {
				$('.fixed-left').css('display', 'block');
				$('.fixed-right').css('display', 'block');
			}, 20000)
		})
		
	})
</script>
</html>