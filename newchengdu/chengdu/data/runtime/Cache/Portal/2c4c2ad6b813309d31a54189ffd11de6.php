<?php if (!defined('THINK_PATH')) exit();?><!--品牌诠释-->
<!DOCTYPE html>
<html>
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
<link href="/themes/simplebootx/Public/css/about.css" rel="stylesheet" type="text/css">
<title><?php echo ($post_title); ?>_<?php echo ($site_name); ?></title>
<meta name="keywords" content="<?php echo ($post_keywords); ?>"/>
<meta name="description" content="<?php echo ($post_excerpt); ?>" />
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=NRSdUGWelRPGWYobbVE3bm3kq3KLMGpl"></script>
<script src="/themes/simplebootx/Public/js/about.js"></script>
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
		
	<div class="banner text-center"><img src="/themes/simplebootx/Public/images/about/banner.jpg" alt=""></div>
	
	<section class="container content-1 text-center mt-5 pb-5">
		<h1 class="content-title position-relative font-weight-bold pb-3">关 &nbsp; 于 &nbsp; 德 &nbsp; 道</h1>
		<h3 class="mt-3 content-1-line-height">“希望让更多人能够体验现代口腔诊疗”<br>“希望中国口腔医疗产业更健康发展”</h3>
		<p class="text-center content1-text">成都青羊德道口腔医院有限公司，为口腔医疗产业升级而来。3年投资200亿进行中国10个一线大型城市的口腔医疗产业升级，<br/>以医疗本质为德，以科技发展为道，致力于未来中国口腔医疗产业平台的建立，帮助全国十个城市进行口腔医疗产业革命，培养医生，完善医疗体验。<br>每一个城市的德道口腔，都不仅仅只是作为一家服务当地口腔需求者的医院，还要承担为整个城市的口腔医疗行业进行升级的责任，成为一家集<br>教学、培训、医疗于一体的专业化口腔医院，而德道口腔这个全新的口腔产业平台，将为所有城市的产业升级提供三个城市的产业集群合力作为支撑。</p>
		<div class="swiper-container" style="width: 787px;">
			<div class="swiper-wrapper">
				<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/content-1-1.jpg" alt=""></div>
				<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/content-1-2.jpg" alt=""></div>
				<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/content-1-3.jpg" alt=""></div>
			</div>
		</div>
		<div class="mt-4"><img src="/themes/simplebootx/Public/images/about/content-1.png" alt=""></div>
	</section>

	<section class="container content-2 mt-5 pb-5">
		<h1 class="content-title position-relative font-weight-bold pb-3 text-center">三大产业集群支撑的现代医疗产业升级平台</h1>
		<div class="d-flex mt-5 pl-5 pr-5 mb-4">
			<div class="d-flex city-left w-100">
				<ul class="city-tab text-center mb-0">
					<li class="text-white position-relative tab-active">成都</li>
					<li class="text-white position-relative">深圳</li>
					<li class="text-white position-relative">上海</li>
				</ul>
				<ul class="w-100">
					<li class="position-relative cd-point">
						<img src="/themes/simplebootx/Public/images/about/cd.jpg" alt="">
						<ul class="point position-absolute">
							<li class="d-inline-block point-active"></li>
							<li class="d-inline-block ml-2 mr-2"></li>
							<li class="d-inline-block"></li>
						</ul>
					</li>
					<li class="position-relative sz-point">
						<img src="/themes/simplebootx/Public/images/about/sz.jpg" alt="">
						<ul class="point position-absolute">
							<li class="d-inline-block point-active"></li>
							<li class="d-inline-block ml-2 mr-2"></li>
							<li class="d-inline-block"></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="mb-0 swiper-container city-right cd">
				<div class="swiper-wrapper">
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/cd-1.jpg" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/cd-2.jpg" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/cd-3.jpg" alt=""></div>
				</div>
			</div>
			<div class="mb-0 swiper-container city-right sz">
				<div class="swiper-wrapper">
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/sz-1.jpg" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/sz-2.jpg" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/sz-3.jpg" alt=""></div>
				</div>
			</div>
		</div>
		<p class="text-indent pl-5 pr-5 content-2-text mb-5">德道口腔在全国口腔产业升级开始的时候率先选择成都，并在成都创建中国人口腔病理情况大数据中心，一个可扩展的大数据平台，容纳各类疾病特征、病例、指标数据，为全国各地的口腔医院提供最全面的口腔数据资料和最丰富的口腔病例，这是中国百年口腔医疗的智慧结晶，也是让我们未来的口腔诊疗风险规避的重要依据。</p>
		<div class="d-flex swt-btn text-center justify-content-center">
			<a onclick="openJesongChatByGroup(16524,20125);" class="pt-2 pb-1 text-white mr-4 ml-4 w-45">全国爱牙热线400-800-6161/028-67696635</a>
			<a onclick="openJesongChatByGroup(16524,20125);" class="pt-2 pb-1 text-white mr-4 ml-4">有牙齿问题？在线预约专家</a>
		</div>
	</section>

	<section>
		<div class="container content-3 mt-5 text-center">
			<h1 class="content-title content-title position-relative font-weight-bold pb-3">
				即刻3.0口腔诊疗体系
				<p class="mb-0 mt-2 font-weight-normal">· &nbsp; 数字化 &nbsp; · &nbsp; 科技化 &nbsp; · &nbsp; 智能化 &nbsp; ·</p>
			</h1>
		</div>
		<div class="content-3-bcg pb-5 pt-5 mt-5">
			<div class="container">
				<div class="row">
					<div class="col-md-6 gif-list">
						<div><img src="/themes/simplebootx/Public/images/index-content2.gif" alt=""></div>
						<div class="unshow"><img src="/themes/simplebootx/Public/images/about/gif-2.gif" alt=""></div>
						<div class="unshow"><img src="/themes/simplebootx/Public/images/about/gif-3.gif" alt=""></div>
					</div>
					<ul class="col-md-6 text-center content-3-list pr-5 pl-5 mb-0">
						<li class="d-flex content-3-active position-relative">
							<div class="about-icon"><b class="text-white">01</b></div>
							<div class="content-3-text pt-3">
								<p class="red mb-2">即刻用3. 0 种牙技术</p>
								<!-- <p>当天种牙  当天用</p> -->
							</div>
							<div class="content-3-list-bcg"></div>
						</li>
						<li class="d-flex position-relative">
							<div class="about-icon"><b class="text-white">02</b></div>
							<div class="content-3-text pt-3">
								<p class="red mb-2">即刻正3. 0 矫牙技术</p>
								<p>矫出好颜值  好前程</p>
							</div>
							<div class="content-3-list-bcg"></div>
						</li>
						<li class="d-flex position-relative">
							<div class="about-icon"><b class="text-white">03</b></div>
							<div class="content-3-text pt-3">
								<p class="red mb-2">即刻美3. 0 美牙技术</p>
								<p>亮白笑容的加油站</p>
							</div>
							<div class="content-3-list-bcg"></div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="container content-4 mt-5 text-center">
		<h1 class="content-title position-relative font-weight-bold pb-3">德道口腔品牌十大研发支持</h1>
		<div class="position-relative mt-5">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/content-4-1.png" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/content-4-2.png" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/content-4-3.png" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/content-4-4.png" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/content-4-5.png" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/content-4-6.png" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/content-4-7.png" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/content-4-8.png" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/content-4-9.png" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Public/images/about/content-4-10.png" alt=""></div>
				</div>
			</div>
			<div class="content-4-tab-list position-absolute">
				<ul class="content-4-tab d-flex mb-0 position-relative">
					<li class="w-25 pt-5 pb-5 content-4-active">
						<h5 class="font-weight-bold text-white mb-0 pl-3 pr-3">即刻用3.0 <br>种植牙研究中心</h5>
					</li>
					<li class="w-25 pt-5 pb-5">
						<h5 class="font-weight-bold text-white mb-0 list-line-height pl-3 pr-3">VR儿童诊疗中心</h5>
					</li>
					<li class="w-25 pt-5 pb-5">
						<h5 class="font-weight-bold text-white mb-0 pl-3 pr-3">区域链医疗风险 <br>控制研究中心</h5>
					</li>
					<li class="w-25 pt-5 pb-5">
						<h5 class="font-weight-bold text-white mb-0 pl-3 pr-3">国际口腔技术研究 <br>及引进中心</h5>
					</li>
					<li class="w-25 pt-5 pb-5">
						<h5 class="font-weight-bold text-white mb-0 list-line-height pl-3 pr-3">VR宣教中心</h5>
					</li>
					<li class="w-25 pt-5 pb-5">
						<h5 class="font-weight-bold text-white mb-0 pl-3 pr-3">大数据库百年口腔案例及云存储系统</h5>
					</li>
					<li class="w-25 pt-5 pb-5">
						<h5 class="font-weight-bold text-white mb-0 pl-3 pr-3">美学设计及3D打印中心</h5>
					</li>
					<li class="w-25 pt-5 pb-5">
						<h5 class="font-weight-bold text-white mb-0 pl-3 pr-3">人工智能数字化植牙中心</h5>
					</li>
					<li class="w-25 pt-5 pb-5">
						<h5 class="font-weight-bold text-white mb-0 list-line-height pl-3 pr-3">咬合力测试实验室</h5>
					</li>
					<li class="w-25 pt-5 pb-5">
						<h5 class="font-weight-bold text-white mb-0 pl-3 pr-3">云端专家智库及远程诊疗中心</h5>
					</li>
				</ul>
			</div>
			<a href="javascript:;" class="arrow-left arrow"></a>
			<a href="javascript:;" class="arrow-right arrow"></a>
		</div>
		<div class="d-flex swt-btn justify-content-center mt-5">
			<a onclick="openJesongChatByGroup(16524,20125);" class="pt-2 pb-1 text-white mr-4 ml-4 w-45">全国爱牙热线400-800-6161/028-67696635</a>
			<a onclick="openJesongChatByGroup(16524,20125);" class="pt-2 pb-1 text-white mr-4 ml-4">有牙齿问题？在线预约专家</a>
		</div>
	</section>

	<section class="container content-5 text-center mt-5">
		<h1 class="content-title position-relative font-weight-bold pb-3">
			智能口腔专家团
			<p class="mb-0 mt-2 font-weight-normal">精于医术 &nbsp; 汇于德道</p>
		</h1>
		<div class="banner-list">
			<div class="position-relative inx-0">
				<a href="javascript:;" class="arrow-left arrow"></a>
				<div class="content-5-banner mt-5 position-relative">
					<ul class="d-flex position-relative">
						
					</ul>
				</div>
				<a href="javascript:;" class="arrow-right arrow"></a>
			</div>
			<div class="inx-1 position-relative">
				<a href="javascript:;" class="arrow-left arrow"></a>
				<div class="inx-1-banner mt-5">
					<ul class="d-flex position-relative">
						<li><img src="/themes/simplebootx/Public/images/about/serve-1.png" alt=""></li>
						<li class="inx-active"><img src="/themes/simplebootx/Public/images/about/serve-2.png" alt=""></li>
						<li><img src="/themes/simplebootx/Public/images/about/serve-3.png" alt=""></li>
						<li><img src="/themes/simplebootx/Public/images/about/serve-4.png" alt=""></li>
						<li><img src="/themes/simplebootx/Public/images/about/serve-5.png" alt=""></li>
					</ul>
				</div>
				<a href="javascript:;" class="arrow-right arrow"></a>
			</div>
			<div class="inx-2 position-relative">
				<a href="javascript:;" class="arrow-left arrow"></a>
				<div class="inx-2-banner mt-5">
					<ul class="d-flex position-relative">
						<li><img src="/themes/simplebootx/Public/images/about/environment-1.png" alt=""></li>
						<li class="inx-active"><img src="/themes/simplebootx/Public/images/about/environment-2.png" alt=""></li>
						<li><img src="/themes/simplebootx/Public/images/about/environment-3.png" alt=""></li>
						<li><img src="/themes/simplebootx/Public/images/about/environment-4.png" alt=""></li>
						<li><img src="/themes/simplebootx/Public/images/about/environment-5.png" alt=""></li>
						<li><img src="/themes/simplebootx/Public/images/about/environment-6.png" alt=""></li>
					</ul>
				</div>
				<a href="javascript:;" class="arrow-right arrow"></a>
			</div>
			<div class="inx-3 position-relative">
				<a href="javascript:;" class="arrow-left arrow"></a>
				<div class="inx-3-banner mt-5">
					<ul class="d-flex position-relative">
						<li><img src="/themes/simplebootx/Public/images/about/equipment-1.png" alt=""></li>
						<li class="inx-active"><img src="/themes/simplebootx/Public/images/about/equipment-2.png" alt=""></li>
						<li><img src="/themes/simplebootx/Public/images/about/equipment-3.png" alt=""></li>
						<li><img src="/themes/simplebootx/Public/images/about/equipment-4.png" alt=""></li>
						<li><img src="/themes/simplebootx/Public/images/about/equipment-5.png" alt=""></li>
						<li><img src="/themes/simplebootx/Public/images/about/equipment-6.png" alt=""></li>
						<li><img src="/themes/simplebootx/Public/images/about/equipment-7.png" alt=""></li>
						<li><img src="/themes/simplebootx/Public/images/about/equipment-8.png" alt=""></li>
						<li><img src="/themes/simplebootx/Public/images/about/equipment-9.png" alt=""></li>
						<li><img src="/themes/simplebootx/Public/images/about/equipment-10.png" alt=""></li>
					</ul>
				</div>
				<a href="javascript:;" class="arrow-right arrow"></a>
			</div>
		</div>
		<ul class="d-flex content-5-tab-list pl-5 pr-5 mt-5 mb-4 justify-content-between">
			<li class="content-5-tab pt-2 pb-2 text-white content-5-tab-active">医疗团队</li>
			<li class="content-5-tab pt-2 pb-2 text-white">优质服务</li>
			<li class="content-5-tab pt-2 pb-2 text-white">诊疗环境</li>
			<li class="content-5-tab pt-2 pb-2 text-white">先进设备</li>
		</ul>
	</section>

	<section class="content-6 text-center mt-5">
		<div class="container">
			<h1 class="content-title mb-4 position-relative font-weight-bold pb-3">德 国 麦 哲 伦 <i class="ai d-inline-block position-relative"></i> 数 字 化 中 心</h1>
			<h3 class="mb-4">集 现 代 数 字 化 科 技 与 人 工 智 能 大 成 的 系 统</h3>
		</div>
		<div><img src="/themes/simplebootx/Public/images/about/content-6.jpg" alt=""></div>
	</section>

	<section class="container content-7 text-center mt-5 mb-5">
		<h1 class="content-title position-relative font-weight-bold pb-3 mb-4">来 院 路 线</h1>
		<h3 class="mb-5">成 都 青 羊 德 道 口 腔 医 院</h3>
		<div class="d-flex ml-5 mr-5 flex-wrap justify-content-between">
			<div class="map-msg p-5">
				<p class="">【医院地址】 成都市青羊区金凤路19号附1号</p>
				<p class="">【服务时间】 9:00-18:00</p>
				<p class="">【联系电话】 400-800-6161 / 028-67696635</p>
				<p class="pb-1 w-50 border-red">地铁线路</p>
				<p>7号线金沙博物馆站C出口</p>
			</div>
			<div id="allmap" style="height: 386px; width: 460px;"></div>
		</div>
	</section>

	<div class="flaot_b">
	<div class="cont">
		<div class="tsxm">
			<div class="if_pop" style="overflow: hidden; height: 0px;">
				<ul>
					<li class="lcli01">
						<a onclick="openJesongChatByGroup(16524,20125);"></a>
					</li>
					<li class="lcli02">
						<a onclick="openJesongChatByGroup(16524,20125);"></a>
					</li>
					<li class="lcli03">
						<a onclick="openJesongChatByGroup(16524,20125);"></a>
					</li>
					<li class="lcli04">
						<a onclick="openJesongChatByGroup(16524,20125);"></a>
					</li>
					<li class="lcli05">
						<a onclick="openJesongChatByGroup(16524,20125);"></a>
					</li>
				</ul>
			</div>
		</div>
		<a onclick="openJesongChatByGroup(16524,20125);" class="a1" title="在线挂号"></a>
		<a href="/list/180.html" target="_blank" class="a2" title="当月特惠活动"></a>
		<a href="#" class="downup" target="_self" title="返回顶部"></a>
	</div>
</div>

<div class="fixed-left" style="width: 12%;">
	<div>
		<a onclick="openJesongChatByGroup(16524,20125);"><img src="/themes/simplebootx/Public/images/activity1.png" alt=""></a>
		<i class="fa fa-close fixed-close"></i>
	</div>
</div>
<div class="fixed-right">
	<div>
		<a onclick="openJesongChatByGroup(16524,20125);"><img src="/themes/simplebootx/Public/images/activity3.gif" alt=""></a>
		<i class="fa fa-close fixed-close"></i>
	</div>
</div>


<div id="footer">
	<div class="footer">
		<div class="footer_left">
			<img src="/themes/simplebootx/Public/images/footer_logo.png" />
		</div>
		<div class="footer_middle">
			<div class="list">
				<ul>
					<h3>关于我们</h3>
					<li><a href="/about.html">德道品牌</a></li>
					<li><a href="/department/7.html">专家团队</a></li>
					<li><a href="/list/105.html">前沿技术</a></li>
					<li><a href="/list/146.html">德道资讯</a></li>
					<li><a href="/traffic.html">联系我们</a></li>
					<li><a href="/traffic.html">来院路线</a></li>
				</ul>
				<ul>
					<h3>口腔项目</h3>
					<li><a href="/zt/2018-12-27-jky">种植中心</a></li>
					<li><a href="/zt/correct">正畸中心</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">牙齿修复</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">根管治疗</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">牙病治疗</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">儿童齿科</a></li>
				</ul>
				<ul>
					<h3>热门关注</h3>
					<li><a href="/zt/s-missing">门牙缺失</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">牙齿拥挤</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">牙齿稀疏</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">牙齿缺损</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">龋齿(蛀牙)</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">牙周炎</a></li>
				</ul>
			</div>
		</div>-->
		<div class="footer_right">
			<!--<h3>官方微信</h3>
			<div class="qrcode clearfix">
				<img src="/themes/simplebootx/Public/images/qrcode.png" />
				<div class="text">
					<p>[扫一扫]</p>
					<p>关注德道官方微信<br/>资讯优惠尽在掌握</p>
					<img src="/themes/simplebootx/Public/images/shake.png" />
				</div>
			</div>-->
			<div class="tel">
				<font><i>医院地址：</i><b>成都市青羊区金凤路19号附1号</b></font>
				<font>电话：400-800-6161 / 028-67696635</font>
			</div>
		</div>
	</div>
</div>
<div id="copy">
	<div class="copy">
		<p class="mb-0">CopyRight © 2017 成都青羊德道口腔医院 版权所有</p>
		<p class="mb-0">
			<a href="http://www.miitbeian.gov.cn" target="_blank">ICP备案号：蜀ICP备18017345号-1</a>
			<a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=51010502010725">
				<img src="/themes/simplebootx/Public/images/ga-icon.png" style="float:left;" />川公网安备 51010502010725号
			</a>
			广审号：（成青） 医广【2019】第03-12-510105020号
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
		<p class="mb-0 font-weight-bold"><img class="mr-1" src="/themes/simplebootx/Public/images/swt/phone.png"/>400-800-6161 / 028-67696635</p>
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


</body>
<script>
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	// 创建地址解析器实例
	var myGeo = new BMap.Geocoder();
	// 将地址解析结果显示在地图上,并调整地图视野
	var point  = new BMap.Point(104.016731,30.688926)
	map.centerAndZoom(point, 18);

	map.addOverlay(new BMap.Marker(point));
	//var myIcon = new BMap.Icon("/APP/Public/images/map-logo.png", new BMap.Size(80,49));
	map.clearOverlays();
	var marker2 = new BMap.Marker(point,"成都市青羊区金凤路19号附1号德道口腔医院");  // 创建标注
	map.addOverlay(marker2);              // 将标注添加到地图中
	map.addControl(new BMap.MapTypeControl({ anchor: BMAP_ANCHOR_TOP_RIGHT, offset: new BMap.Size(15, 15) }));
	map.addControl(new BMap.OverviewMapControl({ anchor: BMAP_ANCHOR_BOTTOM_RIGHT, isOpen: 1 }));  
	var sContent =  
		"<h4 style='margin:0 0 5px 0;padding:0.2em 0'>成都市德道口腔医院</h4>" +  
		"<p style='margin:0;line-height:1.5;font-size:13px;'>地址：成都市青羊区金凤路19号附1号德道口腔医院<br/>电话：400-800-6161/ 028-67696635</p>" +  
		"</div>";  
	var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象  
  	marker2.openInfoWindow(infoWindow, map.getCenter());      // 打开信息窗口 
	marker2.addEventListener('click', function() {   //点击标注显示信息窗口
		marker2.openInfoWindow(infoWindow, map.getCenter());
	})

	var end = "成都市德道口腔医院";
	var routePolicy = [BMAP_TRANSIT_POLICY_LEAST_TIME,BMAP_TRANSIT_POLICY_LEAST_TRANSFER,BMAP_TRANSIT_POLICY_LEAST_WALKING,BMAP_TRANSIT_POLICY_AVOID_SUBWAYS];
	var transit = new BMap.TransitRoute(map, {
	    renderOptions: {map: map},
	    policy: 0
	});
</script>
</html>