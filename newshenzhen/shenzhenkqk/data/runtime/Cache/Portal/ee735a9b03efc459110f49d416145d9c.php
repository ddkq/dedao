<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon" />
<link href="/themes/simplebootx_mobile/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/base.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://swt.szddkqyy.com/JS/LsJS.aspx?siteid=MTI57225838&lng=cn"></script>
	<link rel="stylesheet" href="/themes/simplebootx_mobile/Public/css/swiper.min.css">
	<link href="/themes/simplebootx_mobile/Public/css/index.css" rel="stylesheet" type="text/css">
	<meta content="<?php echo ($site_seo_keywords); ?>" name="keywords" />
	<meta name="description" content="<?php echo ($site_seo_description); ?> " />
	<script src="/themes/simplebootx_mobile/Public/js/swiper.min.js"></script>
	
	<title><?php echo ($site_seo_title); ?></title>
	</head>
	<body>

	
		<div class="header d-flex justify-content-between">
	<div class="home d-flex align-items-center">
		<a href="/"></a>
	</div>
	<div class="logo d-flex align-items-center">
		<a href="/">
			<img src="/themes/simplebootx_mobile/Public/images/article_logo.png" alt="">
		</a>
	</div>
	<p class="header_phone d-flex align-items-center"><a href="tel:400-800-6161"><i class="header-icon-phone"></i></a></p>
</div>
<nav class="header-nav position-fixed">
	<ul class="d-flex justify-content-between">
		<li><a href="/about.html" target="_blank">关于德道</a></li>
		<li class="porject-nav"><a href="/list/62.html">牙科项目</a></li>
		<li><a href="#" target="_blank">真人案例</a></li>
		<li><a href="/department/7.html" target="_blank">种植名医</a></li>
	</ul>
</nav>
		<div id="focus" class="focus">
			<div class="banner swiper-container" id="banner">
				<ul class="swiper-wrapper">
					<?php if(is_array($slides)): $i = 0; $__LIST__ = $slides;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="swiper-slide">
							<a href="<?php echo ($vo["slide_url"]); ?>" target="_blank" class="<?php echo ($vo["slide_des"]); ?>">
								<img src="<?php echo ($vo["slide_pic"]); ?>">
								<?php echo htmlspecialchars_decode($vo[slide_content]);?>
							</a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<div class="swiper-pagination"></div>
			</div>
		</div>
		
		
		
		<div class="content2">
			<div class="index_service">
				<ul class="flex service-list">
					<li>
						<a href="/swt" target="_blank">
							<p><span><i class="icon"></i></span></p>
							<p>缺牙种牙</p>
						</a>
					</li>
					<li>
						<a href="/department/7.html" target="_blank">
							<p><span><i class="icon"></i></span></p>
							<p>种植名医</p>
						</a>
					</li>
					<li>
						<a href="/zt/correct">
							<p><span><i class="icon"></i></span></p>
							<p>牙齿矫正</p>
						</a>
					</li>
					<li>
						<a href="/zt/jkm" target="_blank">
							<p><span><i class="icon"></i></span></p>
							<p>牙齿修复</p>
						</a>
					</li>
					<li>
						<a href="/zt/data-all" target="_blank">
							<p><span><i class="icon"></i></span></p>
							<p>智能体验</p>
						</a>
					</li>
					<li>
						<a href="/zt/assess" target="_blank">
							<p><span><i class="icon"></i></span></p>
							<p>价格估算</p>
						</a>
					</li>
					<li>
						<a href="/swt/" target="_blank">
							<p><span><i class="icon"></i></span></p>
							<p>预约挂号</p>
						</a>
					</li>
					<li>
						<a href="/list/146.html" target="_blank">
							<p><span><i class="icon"></i></span></p>
							<p>德道头条</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
		

		<div class="index-case">
			<div class="title-img"><img src="/themes/simplebootx_mobile/Public/images/bar-b.jpg" alt=""></div>
			<ul class="case-list mt-4 pl-2 pr-2">
				<li>
					<a href="/swt/">
						<h6 class="case-title">【案例】老伯种好牙  满口好牙吃饭香</h6>
						<div class="mb-4">
							<img src="/themes/simplebootx_mobile/Zt/myqs/imgs/case01.jpg" alt="">
						</div>	
					</a>
				</li>
				<li>
					<a href="/swt/">
						<h6 class="case-title">【案例】职场女士不敢开怀大笑  修补门牙找回自信 </h6>
						<div class="mb-4">
							<img src="/themes/simplebootx_mobile/Zt/myqs/imgs/case02.jpg" alt="">
						</div>	
					</a>
				</li>
				<li>
					<a href="/swt/">
						<h6 class="case-title">【案例】老大爷不愿戴假牙 种植上一口好牙</h6>
						<div class="mb-4">
							<img src="/themes/simplebootx_mobile/Zt/myqs/imgs/case03.jpg" alt="">
						</div>	
					</a>
				</li>
				<li>
					<a href="/swt/">
						<h6 class="case-title">【案例】中年男士种上多颗牙  吃遍酸甜苦辣</h6>
						<div class="mb-4">
							<img src="/themes/simplebootx_mobile/Zt/myqs/imgs/case04.jpg" alt="">
						</div>	
					</a>
				</li>
				<li>
					<a href="/swt/">
						<h6 class="case-title">【案例】商务人士种上牙齿 自信笑容回来了</h6>
						<div class="mb-4">
							<img src="/themes/simplebootx_mobile/Zt/myqs/imgs/case05.jpg" alt="">
						</div>	
					</a>
				</li>
				<li>
					<a href="/swt/">
						<h6 class="case-title">【案例】奶奶重获整口牙   告别喝粥重圆美食梦 </h6>
						<div class="mb-4">
							<img src="/themes/simplebootx_mobile/Zt/myqs/imgs/case06.jpg" alt="">
						</div>	
					</a>
				</li>
			</ul>
			<div class="check-more-case">
				<a href="#">查看更多案例</a>
			</div>
		</div>

		<div class="index_doctor">
			<h2><b>智能口腔专家团</b> <span></span></h2>
			<div class="doctorBox swiper-container" id="doctorBox" style="background: #fff;">
				<ul class="swiper-wrapper">
					<?php if(is_array($doctor)): $i = 0; $__LIST__ = $doctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="swiper-slide">
							<div style="width: 80%;margin: auto;"><img src="<?php echo ($vo["main_img"]); ?>" /></div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="hd">
				<ul class="clearfix">
					<?php if(is_array($case)): $i = 0; $__LIST__ = $case;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>

		<div class="index_news">
			<h2>德道头条<span></span></h2>
			<ul>
				<?php if(is_array($brand)): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<div class="compatible-flex">
							<?php $smeta = json_decode($vo['smeta'],true); ?>
							<div class="news-img-box"><img src="<?php echo ($smeta["thumb_phone"]); ?>"></div>
							<a href="<?php echo get_article_url($vo[tid],$vo[link_type],$vo[post_murl]);?>" target="_blank" class="brand_info">
								<h3><?php echo ($vo["post_title"]); ?></h3>
								<p><?php echo ($vo["post_excerpt"]); ?></p>
							</a>
						</div>
						<div><a href="/list/<?php echo ($vo["term_id"]); ?>.html" class="news-type"><?php echo ($vo["name"]); ?></a></div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<a class="more" href="/list/145.html">+更多资讯</a>
		</div>
		
		<div class="index_brand">
			<h2>服务保障<span></span></h2>
			<div id="brandTabBox" class="tabBox">
				<div class="hd">
					<ul class="clearfix">
						<li class="col-xs-3"><a href="javascript:void(0);">全国连锁</a></li>
						<li class="col-xs-3"><a href="javascript:void(0);">高端环境</a></li>
						<li class="col-xs-3"><a href="javascript:void(0);">服务质量</a></li>
						<li class="col-xs-3"><a href="javascript:void(0);">来院地址</a></li>
					</ul>
				</div>
				<div class="bd">
					<ul class=" clearfix">
						<img src="/themes/simplebootx_mobile/Public/images/bdgy1.jpg" alt="">
						<p class="brand-msg">经过多年发展，全面引进来自国外先进的齿科理念和高端齿科运营模式，共享全国数字化口腔大数据库，逐步发展成为国内的高端连锁品牌。</p>
					</ul>
					<ul class=" clearfix">
						<img src="/themes/simplebootx_mobile/Public/images/bdjj2.jpg" alt="">
						<p class="brand-msg">德道口腔作为具有影响力的齿科连锁机构，从机构环境上，尽可能的做到精益求精，提供更舒适的就医环境，更有VIP 尊享的顾客服务，让看牙成为一种享受！</p>
					</ul>
					<ul class=" clearfix">
						<img src="/themes/simplebootx_mobile/Public/images/bdry3.jpg" alt="">
						<p class="brand-msg">德道为顾客提供品质的服务，用心每一天。以精益求精的优良品质达成顾客的直接服务。同时全方位提供良好的间接服务。</p>
					</ul>
					<ul class=" clearfix address">
						<img src="/themes/simplebootx_mobile/Public/images/bdhj4.jpg" alt="">
						<div class="brand-msg">
							<p><b>门诊时间：</b>09:00-18:00</p>
							<p>
								<b>医院地址：</b>深圳市南山区桂庙路南侧5号龙意成大楼8/9楼
								<a href="/contact.html" class="checkMap-btn">查看地图</a>
							</p>
						</div>
					</ul>
				</div>
			</div>
		</div>
		
    	<a href="tel:028-67696635" style="display:block"><img src="/themes/simplebootx_mobile/Public/images/index/index-phone.png" style="padding: 0 5% 5%;" /></a>
		
		
		<div class="copy">
	<p>CopyRight © 2017 成都青羊德道口腔医院 版权所有
		<br /> ICP备案号：<a href="http://www.miitbeian.gov.cn" target="_blank">蜀ICP备18017345号-1</a>
		<br /> <a target="_blank" class="d-flex justify-content-center"
			href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=51010502010725"><img
				src="/themes/simplebootx_mobile/Public/images/ga-icon.png" style="float:left;" />川公网安备 51010502010725号</a>
		广审号：（成青） 医广【2019】第03-12-510105020号
	</p>
</div>
<div class="footer_height"></div>
<div class="footer">
	<!-- <img src="/themes/simplebootx_mobile/Public/images/footer.png" />
	<a href="/" class="col-xs-2"></a>
	<a href="/about.html" class="col-xs-2"></a>
	<a href="javascript:swtClick();" class="col-xs-2">
		<span class="spadvis zkbtn"><t id="advisoryNum">18</t>+</span>
	</a>
	<a href="tel:028-67696635;" class="col-xs-2"></a>
	<a href="/traffic.html" class="col-xs-2"></a> -->
	<ul class="flex w-100">
		<li class="d-inline-block" style="width: 36%;">
			<a onclick="javascript:openJesongChatByGroup(16524,20125);">
				<div><i class="footer-icon"></i></div>
				<div>预约挂号</div>
			</a>
		</li>
		<li class="d-inline-block">
			<a onclick="javascript:openJesongChatByGroup(16524,20125);">
				<div><i class="footer-icon"></i></div>
				<div>立即咨询</div>
				<i class="footer-line"></i>
			</a>
		</li>
		<li class="d-inline-block" style="width: 36%;">
			<a href="tel:028-67696635">
				<div><i class="footer-icon"></i></div>
				<div>免费热线</div>
			</a>
		</li>
	</ul>
</div>

<div class="wrap-ripple" style="top: 40%; right: 0px;">
	<a onclick="javascript:openJesongChatByGroup(16524,20125);" class="s-ripple" id="s-ripple">
		<i class="ripple-a"></i>
		<i class="ripple">点击<br>咨询</i>
		<i class="ripple-b"></i>
	</a>
</div>

<!-- <div class="prompt-box">
	<img src="/themes/simplebootx_mobile/Public/images/swt.jpg" alt="">
	<div class="prompt-box-close-btn"><i class="prompt-box-close"></i></div>
	<div class="flex">
		<a href="tel:028-67696635"><i class="fa fa-phone"></i>在线咨询</a>
		<a href="javascript:swtClick();"><i class="fa fa-commenting-o"></i>立即报名</a>
	</div>
</div> -->

<div class="btn-top" style="display: none;"><i class="fa fa-arrow-up"> </i></div>
<script type="text/javascript" src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js" ></script>
<script type="text/javascript" src="/themes/simplebootx_mobile/Public/js/bootstrap.min.js" ></script>
<script type="text/javascript" src="/themes/simplebootx_mobile/Public/js/TouchSlide.1.1.js"></script>
<script type="text/javascript" src="/themes/simplebootx_mobile/Public/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="/themes/simplebootx_mobile/Public/js/soshm.min.js"></script>
<script type="text/javascript" src="/themes/simplebootx_mobile/Public/js/public.js"></script>
<script type="text/javascript" src="/themes/simplebootx_mobile/Public/js/ajax_data.js"></script>

<div style="display: none;"><?php echo ($site_tongji); ?> </div>
<script>
	TouchSlide({slideCell:"#leftTabBox"});
	//$('.menu_box').css('display','none');
	
	$('.header-bcg-000').height($(window).height())
	$('.fa-icon').on('click', function() {
		$('.header-bcg-000').css('display', 'blcok')
	})
	var rn = Math.floor(Math.random()*(100-41));
	$('#advisoryNum').text(rn);
	if($("#shareBtn").length > 0){
		document.getElementById('shareBtn').addEventListener('click', function() {
		    soshm.popIn({
		    	title: '弹窗分享',
		    	sites: ['weixin', 'weixintimeline', 'weibo', 'yixin', 'qzone', 'tqq', 'qq']
		    });
		}, false);	
	}
	
	
	$(".show_child").click(function(){
		$(".termchild_list").slideToggle();
	});
	
	$(function(){
		var footer_height = $('.footer').height();
		$('.footer_height').css('height',footer_height);
		
		var i = 0;
		var promptBox = setInterval(function() {
			$('.prompt-box').css('visibility', 'visible');
			i++;
			if(i == 2) {
				clearInterval(promptBox);
			}
		}, 20000)
		$('.prompt-box-close').on('click', function() {
			$('.prompt-box').css('visibility', 'hidden');
		})
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
	
	
	//百度统计代码
	var _hmt = _hmt || [];
	(function() {
	  var hm = document.createElement("script");
	  hm.src = "https://hm.baidu.com/hm.js?322d32dd7cecca6b5c9dd7460b3edf07";
	  var s = document.getElementsByTagName("script")[0]; 
	  s.parentNode.insertBefore(hm, s);
	})();
	
</script>

		<script type="text/javascript">
			
			TouchSlide({slideCell:"#brandTabBox",effect:"leftLoop"});
			
			var bannerSwiper = new Swiper('#banner',{
				pagination: {
				    el: '.swiper-pagination',
				},
				autoplay: true,
				loop : true,
			})

			var doctorSwiper = new Swiper('#doctorBox', {
				allowTouchMove: false,
				autoplay: true,
			});
			var tabsSwiper = new Swiper('.mySwiper2', {
				allowTouchMove: false,
			});
			var SwiperContent = new Swiper('#caseTabBox', {
				loop : true,
				pagination: {
				    el: '#caseTabBox .hd',
			  	}
			});
			var SwiperContent2 = new Swiper('#caseTabBox2', {
				loop : true,
				pagination: {
				    el: '#caseTabBox2 .hd',
			  	}
			});
			var SwiperContent3 = new Swiper('#caseTabBox3', {
				loop : true,
				pagination: {
				    el: '#caseTabBox3 .hd',
			  	}
			});
			$(".case-tab div").on('click', function() {
				$(".case-tab div").removeClass('case-tab-active');
				$(this).addClass('case-tab-active');
				tabsSwiper.slideTo($(this).index(), 500, false);
			});

			$('.case-ctr').on('click', function() {
				$(this).parent('.case-type').parent('.case-list').remove();
			})
		</script>
	</body>
</html>