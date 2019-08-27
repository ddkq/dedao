<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>罗君_<?php echo ($site_name); ?></title>
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
	<link href="/themes/simplebootx/Zt/2019-01-08-lj/index.css" rel="stylesheet" type="text/css">
	<script src="/themes/simplebootx/Zt/2019-01-08-lj/index.js"></script>
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
	
	<section class="banner text-center position-relative">
		<a onclick="openJesongChatByGroup(16524,20125);"><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/banner.jpg" alt=""></a>
		<a onclick="openJesongChatByGroup(16524,20125);" class="swt-btn text-white position-absolute font-weight-bold">立 即 预 约</a>
	</section>

	<section class="content-1 pt-5 pb-5">
		<div class="container mt-5 mb-5">
			<h1 class="content-title text-center mb-3">
				<span class="pl-5 pr-5 pt-2 pb-2 d-inline-block position-relative">走进罗君的医学世界</span>
			</h1>
			<p class="red text-center font-24">从 医 而 “ 从 一 ”，恪 守 初 心 十 年 不 变</p>
			<div class="d-flex justify-content-between pl-4 pr-4">
				<div><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-1.jpg" alt=""></div>
				<div class="pt-4">
					<p class="introduce pb-5 position-relative">“AI+即刻用”种植牙西南研发组组长<br>原四川大学华西口腔医院种植牙专家<br>中华口腔医学会会员<br>ICOI(国际种植牙专科医师学会)会员<br>国际口腔种植学会(ITI)会员<br>诺贝尔种植体中国区讲师<br>德国ICX植体特聘研究员</p>
					<div class="w-50">
						<h4 class="mt-5 be-good pb-3 mb-3">擅 长 项 目</h4>
						<p class="mb-5">即刻用3.0种植，上颌窦提升术，骨移植术等复杂种植手术，各口腔临床疑难病例。</p>
					</div>
					<a onclick="openJesongChatByGroup(16524,20125);" class="swt-btn text-white pl-5 pr-5 pt-1 pb-1 font-24">立 即 预 约</a>
				</div>
			</div>
		</div>
	</section>

	<section class="content-2 pt-5 pb-5">
		<div class="container mt-5">
			<h1 class="content-title text-center mb-3">
				<span class="pl-5 pr-5 pt-2 pb-2 d-inline-block position-relative text-white">荣誉：对个人的高度负责</span>
			</h1>
			<p class="text-white font-24 text-center mb-5">多 次 受 邀 参 与 国 际 口 腔 学 术 研 讨 会，与 国 际 口 腔 大 师 交 流</p>
			<div class="swiper-container text-center mb-4">
				<div class="arrow-left"><i class="arrow"></i></div>
				<div class="swiper-wrapper">
					<div class="swiper-slide"><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-2-1.jpg" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-2-2.jpg" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-2-3.jpg" alt=""></div>
				</div>
				<div class="arrow-right"><i class="arrow"></i></div>
			</div>
			<div class="d-flex justify-content-between pl-4 pr-4 content-banner-tab">
				<div style="width: 23%;"><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-2-tab-1.jpg" alt=""></div>
				<div style="width: 23%;"><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-2-tab-2.jpg" alt=""></div>
				<div style="width: 23%;"><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-2-tab-3.jpg" alt=""></div>
				<div style="width: 23%;"><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-2-tab-5.jpg" alt=""></div>
			</div>
			<p class="text-center font-24 text-white mt-5" style="line-height: 2;">第六届“榜样中国.我心目中的名医”五官科十大名医<br>上海交通大学附属第九人民医院“第二届颧骨种植技术”高级资格认证<br>德国口腔发展和研究领域至高级别协会——德国口腔颌面外科协会（DGMKG）颁发中德种植硕士<br>.......</p>
		</div>
	</section>

	<section class="content-3 mt-5 pt-5 pb-5">
		<div class="container">
			<h1 class="content-title text-center mb-3">
				<span class="pl-5 pr-5 pt-2 pb-2 d-inline-block position-relative">技术：对即刻用的高度负责</span>
			</h1>
			<p class="red font-24 text-center mb-5">师 从 中 国 种 植 领 域 导 师 人 物 ，特 组 建 即 刻 用 技 术 小 组</p>
			<ul>
				<li class="mb-5">
					<img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-3-1.png" alt="">
					<p class="text-indent font-24 mt-3">罗君带领团队开展即刻用3.0种植，在北京、上海、深圳充分对技术进行试验，并合力创办成都即刻用种植牙研究院，不断改良“即拔、即种、即用”的技术。</p>
				</li>
				<li class="mb-5">
					<img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-3-2.png" alt="">
					<p class="text-indent font-24 mt-3">即刻用对医生的种植技巧和种植体位置及把握的稳定性有很高的要求，罗君也以此作为自己的高要求标准，常参加专业性的口腔研讨会，学习新的技术和理念。</p>
				</li>
				<li class="mb-5">
					<img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-3-3.png" alt="">
					<p class="text-indent font-24 mt-3">罗君着重对现代缺牙者不同的疑难案例进行分析研究，现场演示并临床操作，从多角度针对种植牙疑难适应症提出行之有效的技术方案，让即刻用种植在大数据分析下更精准。</p>
				</li>
				<li class="mb-5">
					<img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-3-4.png" alt="">
					<p class="text-indent font-24 mt-3">通过云上专家智库，罗君与众多种植牙专家会诊，或远程视频会议，为更多的疑难缺牙者提供更合理、科学的种植牙解决方案，让“即刻用”技术更充分验证。</p>
				</li>
			</ul>
			<div class="text-center">
				<a onclick="openJesongChatByGroup(16524,20125);" class="swt-btn text-white pl-5 pr-5 pt-1 pb-1 font-24">预约罗君看牙>></a>
			</div>
		</div>
	</section>

	<section class="content-4 mt-5 pt-5 pb-5">
		<div class="container">
			<h1 class="content-title text-center mb-3">
				<span class="pl-5 pr-5 pt-2 pb-2 d-inline-block position-relative">医职：对患者的高度负责</span>
			</h1>
			<p class="red font-24 text-center mb-5">对 每 一 位 患 者 负 责 ， 对 每 一 次 手 术 过 程 负 责</p>
			<p class="text-indent pl-5 mb-5 pr-5" style="font-size: 18px;">罗君表示，“即刻用”技术的实施不仅是需要专业的团队，还必须严格执行规范，无论是术前的把握研究、术中的操作标准，还是术后的康复即及修复，做好每一步每一细节，减少手术的误差，这才是真心对缺牙者负责。</p>
			<div class="content-banner ml-5 mr-5 pt-5 pb-4 position-relative">
				<h3 class="position-absolute text-center content-banner-title">
					<span>术前的把握研究</span>
					<span style="display: none;">术中的操作标准</span>
					<span style="display: none;">术后的康复与修复</span>
				</h3>
				<div class="swiper-container text-center">
					<div class="arrow-left"><i class="arrow"></i></div>
					<div class="swiper-wrapper">
						<div class="swiper-slide"><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-4-1.jpg" width="75%"></div>
						<div class="swiper-slide"><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-4-2.jpg" width="75%"></div>
						<div class="swiper-slide"><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-4-3.jpg" width="75%"></div>
					</div>
					<div class="arrow-right"><i class="arrow"></i></div>
				</div>
				<div class="content-banner-text mt-3">
					<div>
						<ul class="d-flex flex-wrap">
							<li class="w-50">· 认真咨询患者身体每一细节情况</li>
							<li class="w-50">· 在千万级案例数据库中进行匹配</li>
							<li class="w-50 mt-2">· 与权威专家商讨合适方案</li>
							<li class="w-50 mt-2">· 给患者演示种植过程，手术更精准</li>
						</ul>
					</div>
					<div style="display: none;">
						<ul class="d-flex flex-wrap">
							<li class="w-50">· 提前对患者进行安抚，解除忧虑</li>
							<li class="w-50">· 精准确定种植位置、深度等</li>
							<li class="w-50 mt-2">· 操作手法娴熟，力争短时间内完成</li>
							<li class="w-50 mt-2">· 帮助患者大大减少手术痛苦</li>
						</ul>
					</div>
					<div style="display: none;">
						<ul class="d-flex flex-wrap">
							<li class="w-50">· 安排护士对患者进行跟踪后期情况</li>
							<li class="w-50">· 分析患者每一阶段状态，提前预测</li>
							<li class="w-50 mt-2">· 细心讲解护理指导或治疗建议</li>
							<li class="w-50 mt-2">· 耐心解答患者术后的疑问</li>
						</ul>
					</div>
				</div>
				<ul class="point w-50 m-auto text-center">
					<li class="d-inline-block point-active"></li>
					<li class="d-inline-block ml-2 mr-2"></li>
					<li class="d-inline-block"></li>
				</ul>
			</div>
			<div class="text-center mt-5">
				<a onclick="openJesongChatByGroup(16524,20125);" class="swt-btn text-white pl-5 pr-5 pt-1 pb-1 font-24">预约罗君看牙>></a>
			</div>
		</div>
	</section>

	<section class="content-5 mt-5 pt-5">
		<div class="container">
			<h1 class="content-title text-center mb-3">
				<span class="pl-5 pr-5 pt-2 pb-2 d-inline-block position-relative">医者责任感的诠释</span>
			</h1>
			<p class="red font-24 text-center mb-5">让 更 多 人 能 够 体 验 现 代 口 腔 诊 疗，让 中 国 口 腔 医 疗 产 业 更 健 康 发 展</p>
			<p class="text-indent w-75 m-auto">罗君，人如其名，是一个宽厚善良的君子。他始终将患者放在前面，希望患者可以得到更贴心的医疗体验、更全面的医疗服务，希望建立更友好亲切的医患关系。</p>
		</div>
		<div class="mt-4">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide"><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-5-1.jpg" alt=""></div>
					<div class="swiper-slide"><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-5-2.jpg" alt=""></div>
					<!--<div class="swiper-slide"><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-5-3.jpg" alt=""></div>-->
					<div class="swiper-slide"><img src="/themes/simplebootx/Zt/2019-01-08-lj/imgs/content-5-4.jpg" alt=""></div>
				</div>
			</div>
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
</html>