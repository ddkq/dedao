<?php if (!defined('THINK_PATH')) exit();?><!--牙齿治疗-->
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

	<link href="/themes/simplebootx/Public/css/style.css" rel="stylesheet" type="text/css">
	<title><?php echo ($seo_title); ?></title>
	<meta name="keywords" content="<?php echo ($seo_keywords); ?>"/>
	<meta name="description" content="<?php echo ($seo_description); ?>" />
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
		<div class="main_img">
			<?php $slide = sp_getslide("treatment_banner"); ?>
			<div class="hd">
				<ul>
					<?php if(is_array($slide)): $k = 0; $__LIST__ = $slide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li><?php echo ($k); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="bd">
				<ul>
					<?php if(is_array($slide)): $i = 0; $__LIST__ = $slide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["slide_url"]); ?>" target="_blank"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		
		<ol class="breadcrumb">
			<i class="fa fa-home"></i>
			<li>您现在在的位置</li>
			<li class="active"><?php echo ($name); ?></li>
		</ol>
		
		<div class="symptom">
			<h2>牙齿综合治疗常见症状</h2>
			<ul class="clearfix">
				<li>
					<img src="/themes/simplebootx/Public/images/treatment/symptom_img01.png" alt="...">
					<p>牙周炎</p>
				</li>
				<li>
					<img src="/themes/simplebootx/Public/images/treatment/symptom_img02.png" alt="...">
					<p>牙齿疼痛</p>
				</li>
				<li>
					<img src="/themes/simplebootx/Public/images/treatment/symptom_img03.png" alt="...">
					<p>牙龈出血</p>
				</li>
				<li>
					<img src="/themes/simplebootx/Public/images/treatment/symptom_img04.png" alt="...">
					<p>龋齿蛀牙</p>
				</li>
				<li>
					<img src="/themes/simplebootx/Public/images/treatment/symptom_img05.png" alt="...">
					<p>智齿</p>
				</li>
			</ul>
			<a onclick="openJesongChatByGroup(16524,20125);" class="swt_btn">更多适应症状 咨询专业医生>></a>
		</div>
		
		<div class="understand">
			<h2>了解口腔病变 及时预防治疗</h2>
			<p class="title">牙周病变史</p>
			<ul>
				<li class="thumbnail">
					<h4><span>01</span></h4>
					<img src="/themes/simplebootx/Public/images/treatment/understand_img01.jpg" />
					<div class="caption">
						<h3>健康的牙齿</h3>
						<p>坚韧致密、紧贴牙面</p>
					</div>
				</li>
				<li class="thumbnail">
					<h4><span>02</span></h4>
					<img src="/themes/simplebootx/Public/images/treatment/understand_img02.jpg" />
					<div class="caption">
						<h3>牙龈炎</h3>
						<p>刷牙、咬东西偶尔出血<br/>牙龈早期被炎症侵犯</p>
					</div>
				</li>
				<li class="thumbnail">
					<h4><span>03</span></h4>
					<img src="/themes/simplebootx/Public/images/treatment/understand_img03.jpg" />
					<div class="caption">
						<h3>初期牙周病</h3>
						<p>牙龈形成牙周袋，并伴有红肿、流脓等症状</p>
					</div>
				</li>
				<li class="thumbnail">
					<h4><span>04</span></h4>
					<img src="/themes/simplebootx/Public/images/treatment/understand_img04.jpg" />
					<div class="caption">
						<h3>中期牙周病</h3>
						<p>牙齿反复疼痛、<br/>往牙龈深处发展</p>
					</div>
				</li>
				<li class="thumbnail">
					<h4><span>05</span></h4>
					<img src="/themes/simplebootx/Public/images/treatment/understand_img05.jpg" />
					<div class="caption">
						<h3>晚期牙周病</h3>
						<p>牙齿脱落、牙周骨和<br/>牙槽骨进一步破坏</p>
					</div>
				</li>
			</ul>
		</div>
		
		<div class="process">
			<h2>牙齿病变史</h2>
			<ul>
				<li class="thumbnail">
					<img src="/themes/simplebootx/Public/images/treatment/process_pic1.jpg">
					<div class="caption">
						<h3>健康的牙齿</h3>
						<p>牙齿病变</p>
					</div>
					<img class="synthesise_narrow" src="/themes/simplebootx/Public/images/treatment/synthesise_narrow.png" >
				</li>
				<li class="thumbnail">
					<img src="/themes/simplebootx/Public/images/treatment/process_pic2.jpg">
					<div class="caption">
						<h3>牙髓炎</h3>
						<p>自发性、阵发性疼痛冷热刺激痛、夜晚疼痛</p>
					</div>
					<img class="synthesise_narrow" src="/themes/simplebootx/Public/images/treatment/synthesise_narrow.png" >
				</li>
				<li class="thumbnail">
					<img src="/themes/simplebootx/Public/images/treatment/process_pic3.jpg">
					<div class="caption">
						<h3>牙根炎</h3>
						<p>自发性、持续性疼痛吃东西疼痛、甚至牙齿长脓包</p>
					</div>
					<img class="synthesise_narrow" src="/themes/simplebootx/Public/images/treatment/synthesise_narrow.png" >
				</li>
				<li class="thumbnail">
					<img src="/themes/simplebootx/Public/images/treatment/process_pic4.jpg">
					<div class="caption">
						<h3>牙齿拔除</h3>
						<p>持续发展、牙根尖和牙槽骨完全破坏</p>
					</div>
				</li>
			</ul>
		</div>
		
		<div class="cure">
			<h2>牙齿综合治疗技术推荐</h2>
			<ul class="clearfix">
				<li class="thumbnail">
					<img src="/themes/simplebootx/Public/images/treatment/cure_pic1.jpg">
					<div class="caption">
						<h3>360°气动洁牙</h3>
						<p>1年保证两次洁牙为佳</p>
					</div>
				</li>
				<li class="thumbnail">
					<img src="/themes/simplebootx/Public/images/treatment/cure_pic2.jpg">
					<div class="caption">
						<h3>根管治疗</h3>
						<p>根治多种牙齿病症</p>
					</div>
				</li>
				<li class="thumbnail">
					<img src="/themes/simplebootx/Public/images/treatment/cure_pic3.jpg">
					<div class="caption">
						<h3>3M纳米树脂补牙</h3>
						<p>色泽逼真坚固牙齿</p>
					</div>
				</li>
				<li class="thumbnail">
					<img src="/themes/simplebootx/Public/images/treatment/cure_pic4.jpg">
					<div class="caption">
						<h3>轻柔舒适刮治</h3>
						<p>引导牙组织重生</p>
					</div>
				</li>
			</ul>
		</div>
		
		<div class="case case7 clearfix">
			<h2>案例展示</h2>
			<ul>
				<li class="col-md-6">
					<img src="/themes/simplebootx/Public/images/treatment/case_img01.png"/>
				</li>
				<li class="col-md-6">
					<img src="/themes/simplebootx/Public/images/treatment/case_img02.png"/>
				</li>
				<li class="col-md-6">
					<img src="/themes/simplebootx/Public/images/treatment/case_img03.png"/>
				</li>
				<li class="col-md-6">
					<img src="/themes/simplebootx/Public/images/treatment/case_img04.png"/>
				</li>
			</ul>
		</div>
		
		<div class="doctor">
			<h2>
				智能口腔专家团
			</h2>
			<div id="slideBox" class="slideBox">
				<div class="hd"></div>
				<div class="bd">
					<ul>
						<?php if(is_array($doctor)): $i = 0; $__LIST__ = $doctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $extend = json_decode($vo['post_extend'],true); ?>
							<li>
								<img src="<?php echo ($vo["main_img"]); ?>" />
								<div>
									<h4><?php echo ($vo["name"]); ?><span><?php echo ($vo["job"]); ?></span></h4>
									<?php if(is_array($vo['experience'])): $i = 0; $__LIST__ = array_slice($vo['experience'],0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><p><?php echo ($vo1); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
									<h5>擅长项目</h5>
									<p><?php echo ($vo["item"]); ?></p>
									<a onclick="openJesongChatByGroup(16524,20125);" class="swt_btn">在线预约>></a>	
								</div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="pnBtn prev"> <span class="blackBg"></span> <span class="arrow"></span> </div>
				<div class="pnBtn next"> <span class="blackBg"></span> <span class="arrow"></span> </div>
			</div>

		</div>

		<div class="wiki wiki8">
			<h2><?php echo ($name); ?><span>百科科普</span></h2>
			<div class="wikiTxtBox">
				<div class="hd">
					<ul class="clearfix">
						<?php if(is_array($term_child)): $i = 0; $__LIST__ = $term_child;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/list/<?php echo ($vo["term_id"]); ?>.html" target="_blank"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="bd">
					<?php if(is_array($tab_text)): $i = 0; $__LIST__ = $tab_text;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="clearfix">
							<li class="col-md-8">
								<ul class="media-list">
									<li class="media">
										<div class="media-left media-middle">
											<a href="<?php echo get_article_url($vo['pic_recommend'][0]['tid'],$vo['pic_recommend'][0]['link_type'],$vo['pic_recommend'][0]['post_url']);;?>">
												<?php $smeta = json_decode($vo['pic_recommend'][0]['smeta'],true); ?>
												<img class="media-object" src="<?php echo ($smeta["thumb"]); ?>">
											</a>
										</div>
										<div class="media-body">
											<ul>
												<?php if(is_array($vo['art_recommend'])): $i = 0; $__LIST__ = array_slice($vo['art_recommend'],0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><li>
														<a href="<?php echo get_article_url($vo1['tid'],$vo1['link_type'],$vo1['post_url']);;?>">
															<h4 class="media-heading"><?php echo ($vo1["post_title"]); ?><span></span></h4>
															<?php echo ($vo1["post_excerpt"]); ?>
														</a>
													</li><?php endforeach; endif; else: echo "" ;endif; ?>
											</ul>
										</div>
									</li>
									<li class="media">
										<div class="media-body">
											<ul>
												<?php if(is_array($vo['art_recommend'])): $i = 0; $__LIST__ = array_slice($vo['art_recommend'],2,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><li>
														<a href="<?php echo get_article_url($vo1['tid'],$vo1['link_type'],$vo1['post_url']);;?>">
															<h4 class="media-heading"><?php echo ($vo1["post_title"]); ?><span></span></h4>
															<?php echo ($vo1["post_excerpt"]); ?>
														</a>
													</li><?php endforeach; endif; else: echo "" ;endif; ?>
											</ul>
										</div>
										<div class="media-right media-middle">
											<a href="<?php echo get_article_url($vo['pic_recommend'][1]['tid'],$vo['pic_recommend'][1]['link_type'],$vo['pic_recommend'][1]['post_url']);;?>">
												<?php $smeta = json_decode($vo['pic_recommend'][1]['smeta'],true); ?>
												<img class="media-object" src="<?php echo ($smeta["thumb"]); ?>">
											</a>
										</div>
									</li>
								</ul>
							</li>
							<li class="col-md-4">
								<dl>
									<?php if(is_array($vo['question'])): $i = 0; $__LIST__ = $vo['question'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><dd><a href="/qa/<?php echo ($vo2["id"]); ?>"><i class="fa fa-newspaper-o"></i><?php echo ($vo2["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
								</dl>
								<a class="red_btn" onclick="openJesongChatByGroup(16524,20125);">我要提问>></a>
								<a class="yel_btn" onclick="openJesongChatByGroup(16524,20125);">在线咨询>></a>
							</li>
						</ul><?php endforeach; endif; else: echo "" ;endif; ?>
					
				</div>
			</div>
		</div>
	
	
	</body>
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


	<script type="text/javascript">
		jQuery(".main_img").slide({mainCell:".bd ul",autoPlay:true});
		jQuery(".tech4_box1").slide();
		jQuery(".tech4_box2").slide();
		jQuery(".caseBox2").slide({mainCell:".bd ul",autoPlay:true});
		jQuery(".wikiTxtBox").slide({autoPlay:true});
		jQuery(".slideBox .bd li").first().before(jQuery(".slideBox .bd li").last());
		jQuery(".slideBox").slide({
			mainCell: ".bd ul",
			effect: "leftLoop",
			autoPlay: true,
			vis: 3,
			mouseOverStop: false
		});
	</script>
</html>