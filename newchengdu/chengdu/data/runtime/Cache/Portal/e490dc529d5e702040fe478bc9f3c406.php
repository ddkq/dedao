<?php if (!defined('THINK_PATH')) exit();?><!--美齿修复-->
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
		
		<div class="main_img"><img src="/themes/simplebootx/Public/images/repari/banner.png"/></div>
		
		<ol class="breadcrumb">
			<i class="fa fa-home"></i>
			<li>您现在在的位置</li>
			<li><a href="/">首页</a></li>
			<li class="active"><?php echo ($name); ?></li>
		</ol>

		<div class="why">
			<h2>什么情况需要<span>牙齿修复</span><i></i></h2>
			<div class="info clearfix">
				<span class="col-md-2">
					<i>01</i>
					<font>导读</font><b>takeaway</b>
				</span>
				<p class="col-md-10">龅牙、氟斑牙、老鼠牙...难看的牙齿，往往让我们笑不露齿，自信心受损，严重影响工作和生活以及身体健康。德道修复中心融合了 DSD设计、颜面美学等牙科美学理念，结合现代先进的牙科技术，不仅追求传统的口腔保健及修复，更是从牙齿的形态、功能、色泽 等美观度进行综合性考虑和设计，重塑较美微笑线。</p>
			</div>
			<ul class="clearfix">
				<li>
					<a href="/list/75.html">
						<img src="/themes/simplebootx/Public/images/repari/aa_1.jpg"/>
						<p>龅牙</p>
					</a>
				</li>
				<li>
					<a href="/list/10.html">
						<img src="/themes/simplebootx/Public/images/repari/aa_4.jpg"/>
						<p>牙齿缺失</p>
					</a>
				</li>
				<li>
					<a href="/list/74.html">
						<img src="/themes/simplebootx/Public/images/repari/aa_2.jpg"/>
						<p>色素牙</p>
					</a>
					<a href="/list/162.html">
						<img src="/themes/simplebootx/Public/images/repari/aa_3.jpg"/>
						<p>牙齿过小</p>
					</a>
				</li>
				<li>
					<a href="/list/170.html">
						<img src="/themes/simplebootx/Public/images/repari/aa_5.jpg"/>
						<p>牙缝过大</p>
					</a>
				</li>
				<li>
					<a href="/list/99.html">
						<img src="/themes/simplebootx/Public/images/repari/aa_6.jpg"/>
						<p>牙釉质不全</p>
					</a>
				</li>
			</ul>
			<a onclick="openJesongChatByGroup(16524,20125);" class="swt_btn">立即咨询>></a>
		</div>

		<div class="advantage">
			<h2><span>牙齿修复</span> 不只是功能重建</h2>
			<div class="info">
				<p>许多人认为齿科修复无非就是填充龋洞或是做个烤瓷牙。对此，德道齿科医师指出：口腔修复不仅仅是功能重建。它不但包括了治疗恢复性修复、功能重建修复，同时更注重口腔的美学修复，而这也正是德道齿科美学修复中心一贯坚持的治疗标准。</p>
				<p>医师介绍说，人体面容的颌下三分之一是容貌结构中变化较丰富、较富于性别和审美特征的区域，因此，也是口腔修复的审美性设计的重点关注区域。在临床修复诊疗中，除了恢复牙齿的正常功能之外，一个负责任的口腔修复医生还应该就这一区域内的正面视觉、侧面弧度、微笑线条以及牙齿的色度、颌面的曲线等各种美学因素进行精心的设计，以确保患者在重新恢复牙齿咀嚼功能和基本的视觉完整性之外，还能获得更加和谐自然的颜面美观效果。</p>
			</div>
			<div class="main">
				<img class="main_img" src="/themes/simplebootx/Public/images/repari/7u-1.jpg" />
				<div class="text">
					<h3>牙齿修复</h3>
					<h4>改变的不仅仅是您的牙齿</h4>
					<p>牙齿美学修复崇尚的是自然美与个性美的有机结合，要求修复体在有效恢复患者咀嚼和语言功能的同时，更能体现出质朴、真实、自然和生动的个性美感。牙齿美是容貌美的重要内容，有健康美丽的牙齿支撑起唇颊部，面型才会丰满,口角轮廓及面部长度才会更加协调。口腔美容修复就是为了达到科学、艺术与自然的统一。</p>
					<ul class="clearfix">
						<li><span>1</span>颜色美观</li>
						<li><span>2</span>形态自然 </li>
						<li><span>3</span>边缘精密</li>
						<li><span>4</span>邻接关系好</li>
						<li><span>5</span>无疼痛等不适</li>
						<li><span>6</span>牙龈健康</li>
						<li><span>7</span>尽可能保留健康压根</li>
					</ul>
					<img class="bottom_img" src="/themes/simplebootx/Public/images/repari/advantage_img.png" />
				</div>
			</div>
		</div>
		
		
		<div class="problem">
			<h2>德道牙齿修复中心<br/>严格遵循现代口腔审美学标准<i></i></h2>
			<ul class="clearfix">
				<li>
					<h3>01</h3>
					<p>结合颜面美学、DSD微笑美学进行面部美学微笑设计</p>
					<img src="/themes/simplebootx/Public/images/repari/001.jpg"/>
				</li>
				<li>
					<h3>02</h3>
					<p>根据美学分析确定牙龈高度、长宽以及牙齿颜色，最终完成微笑线设计。</p>
					<img src="/themes/simplebootx/Public/images/repari/002.jpg"/>
				</li>
				<li>
					<h3>03</h3>
					<p>严密遵循3-3-4-4法则，51道工序，量身定做修复体</p>
					<img src="/themes/simplebootx/Public/images/repari/003.jpg"/>
				</li>
				<li>
					<h3>04</h3>
					<p>佩戴修复体，完成牙齿修复，较美微笑线成功打造</p>
					<img src="/themes/simplebootx/Public/images/repari/004.jpg"/>
				</li>
			</ul>
			<a class="swt_btn" onclick="openJesongChatByGroup(16524,20125);">立即咨询>></a>
		</div>

		<!--<div class="technology clearfix">
			<h2><span>牙齿修复</span>技术推荐</h2>
			<div class="tech_left hd">
				<ul>
					<li class="on">
						<span>01</span>
						<h3>3D瓷贴面</h3>
						<p>Recommendation 1</p>
					</li>
					<li>
						<span>02</span>
						<h3>防生美容冠</h3>
						<p>Recommendation 2</p>
					</li>
					<li>
						<span>02</span>
						<h3>树脂贴面</h3>
						<p>Recommendation 2</p>
					</li>
				</ul>
			</div>
			<div class="bd">
				<div class="tech_right">
					<div class="tech_main2">
						<h5>德道明星3D瓷贴面优势</h5>
						<p>根据牙齿高低厚薄进行3D精细化量齿定制，采用国际上最先进的粘结技术，在保存活髓、不磨牙的情况下，对牙体表面缺损、着色或变色牙和畸形牙等用高科技瓷修复材料粘结覆盖其表面，以恢复牙体的正常形态和改善其色泽。</p>
						   
						<ul class="cricle clearfix">
							<li>不磨牙<br>不伤牙体</li>
							<li>经久耐用<br>效果持久</li>
							<li>无异物感<br>舒适性佳</li>
							<li>色泽自然<br>逼真通透</li>
						</ul>
						<h5>适用人群</h5>
						<ul class="applicable clearfix">
							<li><i class="fa fa-check-square"></i>牙缝大</li>
							<li><i class="fa fa-check-square"></i>黑牙</li>
							<li><i class="fa fa-check-square"></i>黄牙</li>
							<li><i class="fa fa-check-square"></i>四环素牙</li>
							<li><i class="fa fa-check-square"></i>氟斑牙</li>
							<li><i class="fa fa-check-square"></i>牙缺损</li>
							<li><i class="fa fa-check-square"></i>牙釉质不全</li>
							
						</ul>
						<h5>推荐指数<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h5>
						<a href="/swt/" target="_blank" class="swt_btn">立刻咨询>></a>
					</div>
					<div class="tech_img clearfix">
						<img src="/themes/simplebootx/Public/images/repari/aqwe1.jpg" />
						<img src="/themes/simplebootx/Public/images/repari/brts-1.jpg" />
					</div>
				</div>
				<div class="tech_right">
					<div class="tech_main2">
						<h5>德道防生美容冠</h5>
						<p>德道仿生美容冠在扫描、设计、加工以及修复环节，全流程采用数字化修复方案，采用仿生材料，色泽逼真、通透自然，完全媲美真牙，独有齿雕工艺，持久耐用。</p>
						<ul class="cricle clearfix">
							<li>数字化<br>设计</li>
							<li>顶级<br>材料</li>
							<li>快速<br>变白变美</li>
							<li>持久<br>耐用</li>					
						</ul>
						<h5>适用人群</h5>
						<ul class="applicable clearfix">
							<li><i class="fa fa-check-square"></i>牙缝大</li>
							<li><i class="fa fa-check-square"></i>牙缺损</li>
							<li><i class="fa fa-check-square"></i>畸形牙</li>
							<li><i class="fa fa-check-square"></i>氟斑牙</li>
							<li><i class="fa fa-check-square"></i>牙釉质不全</li>
							<li><i class="fa fa-check-square"></i>牙脱落</li>
							<li><i class="fa fa-check-square"></i>黄牙/黑牙</li>
							<li><i class="fa fa-check-square"></i>烤瓷牙失败</li>
						</ul>
						<h5>推荐指数<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h5>
						<a href="/swt/" target="_blank" class="swt_btn">立刻咨询>></a>
					</div>
					<div class="tech_img clearfix">
						<img src="/themes/simplebootx/Public/images/repari/bbbcccw-1.jpg" />
						<img src="/themes/simplebootx/Public/images/repari/oirw-1.jpg" />
					</div>
				</div>
				<div class="tech_right">
					<div class="tech_main2">
						<h5>德道树脂贴面</h5>
						<p>直接用树脂在患者口内制作的贴面，其最大的优点是方便、快捷、迅速。可以快速改善患者的前牙美观。如果患者短期内无法接受瓷贴面以及超瓷贴面的费用，不失为短期改善美观的过渡性修复体。</p>
						<ul class="cricle clearfix">
							<li>直接<br>整复</li>
							<li>微创<br>或无创</li>
							<li>方便<br>快捷</li>
							<li>便宜<br>实惠</li>
						</ul>
						<h5>适用人群</h5>
						<ul class="applicable clearfix">
							<li><i class="fa fa-check-square"></i>氟斑牙</li>
							<li><i class="fa fa-check-square"></i>四环素牙</li>
							<li><i class="fa fa-check-square"></i>过小牙</li>
							<li><i class="fa fa-check-square"></i>牙间隙</li>
							<li><i class="fa fa-check-square"></i>外伤牙</li>
							<li><i class="fa fa-check-square"></i>牙缺损</li>
						</ul>
						<h5>推荐指数<i class="fa fa-star"></i><i class="fa fa-star"></i></h5>
						<a href="/swt" target="_blank" class="swt_btn">立刻咨询>></a>
					</div>
					<div class="tech_img clearfix">
						<img class="col-xs-6" src="/themes/simplebootx/Public/images/repari/vgt-1.jpg" />
						<img class="col-xs-6" src="/themes/simplebootx/Public/images/repari/xct-1.jpg" />
					</div>
				</div>
			</div>
			
		</div>-->

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

		<div class="wiki wiki2">
			<h2>牙齿修复<span>百科科普</span></h2>
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
		jQuery(".technology").slide({});
		
		jQuery(".wikiTxtBox").slide();
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