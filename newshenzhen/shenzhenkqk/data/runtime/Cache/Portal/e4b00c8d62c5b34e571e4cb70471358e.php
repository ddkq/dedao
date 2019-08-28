<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
<script language="javascript" src="http://swt.szddkqyy.com/JS/LsJS.aspx?siteid=MTI57225838&lng=cn"></script>
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
				</div>
				<div class="header-right flex">
					<div class="time">
						<i class="header-icon"></i>
						<span>门诊时间: 09:00-18:00</span>
					</div>
					<i class="vertical"></i>
					<div class="phone-num">
						<i class="header-icon"></i>
						<span>健康热线: 400-800-6161 / 0755-86522406</span>
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
					<div><a href="/list/62.html">种牙项目</a></div>
				</li>
				<li>
					<div><a href="#">种牙案例</a></div>
				</li>
				<li>
					<div><a href="/department/7.html">种牙专家</a></div>
				</li>
				<li>
					<div><a href="/list/105.html">种牙设备</a></div>
				</li>
				<li>
					<div><a href="/zt/jkz.html">牙齿矫正</a></div>
				</li>
				<li>
					<div><a href="/zt/jkm">牙齿修复</a></div>
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
			<?php $slide = sp_getslide("implanted_banner"); ?>
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
			<li>您所在的位置</li>
			<li><a href="/">首页</a></li>
			<li class="active"><?php echo ($name); ?></li>
		</ol>
		
		<div class="problem">
			<h2>牙齿缺失的痛苦<span>你体会过吗？</span><i></i></h2>
			<p class="description">很多人对牙齿缺失熟视无睹，实际上口腔是消化道的开端，咀嚼功能的减退，必然加重肠胃的负担。此外，长期缺失不修复，邻牙可能倾斜倒塌，口内其他牙齿所承受的压力也将加大，最终可能导致这些牙齿脱落。</p>
			<ul class="clearfix">
				<li>
					<h3>01</h3>
					<p>影响饮食，容易实物嵌塞</p>
					<img src="/themes/simplebootx/Public/images/implanted/p_img1.png"/>
				</li>
				<li>
					<h3>02</h3>
					<p>破坏牙列的完整性</p>
					<img src="/themes/simplebootx/Public/images/implanted/p_img2.png"/>
				</li>
				<li>
					<h3>03</h3>
					<p>面部变形 影响美观</p>
					<img src="/themes/simplebootx/Public/images/implanted/p_img3.png"/>
				</li>
				<li>
					<h3>04</h3>
					<p>引发各类口腔疾病</p>
					<img src="/themes/simplebootx/Public/images/implanted/p_img4.png"/>
				</li>
			</ul>
			<a class="swt_btn" href="/swt/" target="_blank">立即咨询>></a>
		</div>

		<div class="adv">
			<p class="col-md-6">
				<i class="fa fa-question-circle-o"></i>
				<span>了解种植牙  |  为什么要做种植牙</span>
			</p>
			<p class="col-md-6">
				<a href="/swt/" target="_blank">种植牙寿命</a>  |   
				<a href="/swt/" target="_blank">种植牙有风险吗</a>  |   
				<a href="/swt/" target="_blank">种植牙价格</a>  |   
				<a href="/swt/" target="_blank">种植牙好在哪里</a>  |   
				<a href="/swt/" target="_blank">种植体品牌</a>
			</p>
		</div>

		<div class="inrto">
			<h3><span>种植牙</span>——广受认可的缺牙修复技术</h3>
			<ul class="test">
				<li>主要材料是种植体\修复基台\牙冠三部分组成的</li>
				<li>植体植入牙槽骨内充当牙根，增加假牙固定性，能够更好的恢复口腔咀嚼受力</li>
			</ul>
			<h4>什么情况需要种植牙？</h4>
			<ul class="sick">
				<li class="col-md-4">
					<img src="/themes/simplebootx/Public/images/implanted/sick_img1.png" />
					<p><a href="/list/23.html" target="">单颗缺失</a></p>
				</li>
				<li class="col-md-4">
					<img src="/themes/simplebootx/Public/images/implanted/sick_img2.png" />
					<p><a href="/list/25.html" target="">多颗缺失</a></p>
				</li>
				<li class="col-md-4">
					<img src="/themes/simplebootx/Public/images/implanted/sick_img3.png" />
					<p><a href="/list/26.html" target="">半口缺失</a></p>
				</li>
				<li class="col-md-4">
					<img src="/themes/simplebootx/Public/images/implanted/sick_img4.png" />
					<p><a href="/list/64.html" target="">全口缺失</a></p>
				</li>
				<li class="col-md-4">
					<img src="/themes/simplebootx/Public/images/implanted/sick_img5.png" />
					<p>牙齿脱落</p>
				</li>
				<li class="col-md-4">
					<img src="/themes/simplebootx/Public/images/implanted/sick_img6.png" />
					<p>颌骨缺损</p>
				</li>
			</ul>
		</div>

		<div class="price clearfix">
			<div class="price_left col-md-4">
				<h3>&nbsp;&nbsp;[种植牙为什么不贵？]</h3>
				<div class="adv_red">
					<p>0.68元/天  =  幸福生活</p>
					<p>健康好牙+乐享美食+灿烂笑容</p>
				</div>
				<p class="desc">种植牙齿由三部分组成，即种植体、牙冠和基台，通常种植体的价格在几千至上万元不等(以下我们按1万元来计算)</p>
				<span>1颗种植牙可使用40年（甚至更久） 一年365天，40年约等于14600天</span>
				<font>10000元÷14600天=0.68元<small>/天</small></font>
				<img alt="" src="/themes/simplebootx/Public/images/implanted/best.png">
			</div>
			<div class="price_right col-md-6">
				<h3>[影响种植牙价格的因素包括]</h3>
				<ul class="clearfix">
					<li class="col-md-6">
						<h5><span>01</span><font>医院/医生</font></h5>
						<p>医院的技术实力、医生实力、手术设备等是影响种植牙价格的重要因素之一。</p>
					</li>
					<li class="col-md-6">
						<h5><span>02</span><font>种植牙材料</font></h5>
						<p>材料不同、性能不一样，价格就会存在差异，品质越高的材料价格自然就越高。</p>
					</li>
					<li class="col-md-6">
						<h5><span>03</span><font>牙齿种植难易程度</font></h5>
						<p>医生根据每个人的情况定制方案，治疗方法、难易程度不一样，价格也不一样。</p>
					</li>
					<li class="col-md-6">
						<h5><span>04</span><font>患者口腔状况</font></h5>
						<p>口腔状况好的患者可直接进行手术，反之则需对口腔问题进行治疗后再种牙。</p>
					</li>
				</ul>
				<div class="price_btn">
					<a class="swt_btn" href="/swt/" target="_blank">立即咨询>></a>
				</div>
			</div>
		</div>

		<div class="technology2">
			<h2>即刻用3.0种植牙 革新种植新体验
			<p>新技术 新理念 新突破</p>
			</h2>
			<div class="tech_box">
				<div class="hd">
					<ul>
						<li>种牙新高度</li>
						<li>3.0口腔诊疗体系</li>
						<li>个体化量身种牙</li>
						<li>精进的技术设备</li>
					</ul>
				</div>
				<div class="bd">
					<ul>
						<li>
							<div class="n4_l">
								<img alt="" src="/themes/simplebootx/Public/images/implanted/n4_01.jpg">
							</div>
							<div class="n4_c">
								<div class="n4tit">
									<h3>种植新高度</h3>
								</div>
								<p>即刻用3.0种植牙技术是种植牙技术的一个新高度，它从各个方面对种植牙做了完善和改进。相比传统种植牙技术，它不仅仅只是单纯一项技术，而是一套科学设计的系统方案。</p>
							</div>
							<div class="n4_r">
								<img alt="" src="/themes/simplebootx/Public/images/implanted/n4_02.jpg">
							</div>
						</li>
					</ul>
					<ul>
						<li>
							<div class="n4_l">
								<img alt="" src="/themes/simplebootx/Public/images/implanted/n4_03.jpg">
							</div>
							<div class="n4_c">
								<div class="n4tit">
									<h3>即刻用3.0体系</h3>
								</div>
								<p>德道口腔即刻用3.0口腔诊疗体系 ，从数字化的口腔检查到三维模拟种植、从即刻种植到即刻负重、从无痛种植到3D打印导板、从术前调理到术后康复，一个能实现“即拔、即种、即用”效果的“即刻用”种植牙方案。</p>
								<div class="n4link">
									<a class="swt_btn" href="/swt/" target="_blank">立即咨询</A>
								</div>
							</div>
							<div class="n4_r">
								<img alt="" src="/themes/simplebootx/Public/images/implanted/n4_04.jpg">
							</div>
						</li>
					</ul>
					<ul>
						<li>
							<div class="n4_l">
								<img alt="" src="/themes/simplebootx/Public/images/implanted/n4_05.jpg">
							</div>
							<div class="n4_c">
								<div class="n4tit">
									<h3>个体化量身种牙</h3>
								</div>
								<p>
								在精进的技术设备的辅助下，根据国人的口腔特点、骨质密度、饮食习惯等地域特征、不同年龄、不同性别、不同体质条件、牙槽骨密度、质量等问题进行技术提升优化，为不同缺牙者提供个性化方案设计。
								
								</p>
								<div class="n4link">
									<a class="swt_btn" href="" target="_blank">立即咨询</A>
								</div>
							</div>
							<div class="n4_r">
								<img alt="" src="/themes/simplebootx/Public/images/implanted/n4_06.jpg">
							</div>
						</li>
					</ul>
					<ul>
						<li>
							<div class="n4_l">
								<img alt="" src="/themes/simplebootx/Public/images/implanted/n4_07.jpg">
							</div>
							<div class="n4_c">
								<div class="n4tit">
									<h3>精进的技术设备</h3>
								</div>
								<p>通过CAD\CAM精密重建患者下颌骨立体模型，多次模拟种植，来确定最适合患者口腔状况的种植体位置、数量、种植深度，种植体倾斜角度等，患者能提前预知自己的戴牙效果。</p>
								<div class="n4link">
									<a class="swt_btn" target="_blank">立即咨询</A>
								</div>
							</div>
							<div class="n4_r">
								<img alt="" src="/themes/simplebootx/Public/images/implanted/n4_08.jpg">
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	
		<div class="advantage">
			<h2><span>5大优势</span>带您做次不一样的种植牙
				<p>它不仅仅只是单纯一项技术，而是一套科学设计的系统方案</p>
			</h2>
			<div class="adv_main clearfix">
				<div class="adv_fri">
					<dl>
						<div class="media">
							<div class="media-left media-middle">
								<img class="media-object" src="/themes/simplebootx/Public/images/implanted/adv_img1.png">
							</div>
							<div class="media-body">
								<h4 class="media-heading">01</h4>
							</div>
						</div>
						<span>微创无痛</span>
						<p>融合先进技术，达到无痛、精准、快速、安全的种植牙手术效果。</p>
					</dl>
					<dl>
						<div class="media">
							<div class="media-left media-middle">
								<img class="media-object" src="/themes/simplebootx/Public/images/implanted/adv_img2.png">
							</div>
							<div class="media-body">
								<h4 class="media-heading">02</h4>
							</div>
						</div>
						<span>无需磨牙</span>
						<p>依靠人工牙根进行修复，不用磨损旁边的健康牙齿</p>
					</dl>
				</div>
				<div class="adv_sed">
					<dl>
						<h5>03</h5>
						<span>即种即用</span>
						<p>解决耗时长问题，实现“即拔、即种、即用”。</p>
						<img src="/themes/simplebootx/Public/images/implanted/adv_img3.png">
					</dl>
					<dl class="red">
						<a class="swt_btn" href="">点击在线设计方案</a>
					</dl>
				</div>
				<div class="adv_tri">
					<dl>
						<div class="media">
							<div class="media-left media-middle">
								<img class="media-object" src="/themes/simplebootx/Public/images/implanted/adv_img4.png">
							</div>
							<div class="media-body">
								<h4 class="media-heading">04</h4>
							</div>
						</div>
						<span>咀嚼功能强</span>
						<p>与真牙的力学原理相似，咀嚼功能优于传统假牙</p>
					</dl>
					<dl>
						<div class="media">
							<div class="media-left media-middle">
								<img class="media-object" src="/themes/simplebootx/Public/images/implanted/adv_img5.png">
							</div>
							<div class="media-body">
								<h4 class="media-heading">05</h4>
							</div>
						</div>
						<span>美观效果好</span>
						<p>根据患者脸型、其它牙齿形状与色泽制作牙冠，达到整体外观更协调</p>
					</dl>
				</div>
			</div>
		</div>

		<div class="compared compared1">
			<h2>即刻用3.0种植牙VS<span>传统种植牙</span></h2>
			<table class="table">
				<thead>
					<tr>
						<th> </th>
						<th>即刻用3.0种植牙<img src="/themes/simplebootx/Public/images/implanted/preferred.png" /></th>
						<th>传统种植牙</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">术前检查</th>
						<td>
							<img src="/themes/simplebootx/Public/images/implanted/compared_img4.png"/>
							新一代的360°3D口腔透视，不留死角，不误诊，准确率高达99.8%，确保手术方案安全可靠。
						</td>
						<td>
							<img src="/themes/simplebootx/Public/images/implanted/compared_img5.png"/>
							全景X光片，2D口腔影像，存在探视死角，误诊率近20%
						</td>
					</tr>
					<tr>
						<th scope="row">方案设计</th>
						<td>通过<b>CAD/CAM</b>方案精密设计种植牙速度、深度、角度，个体化方案设计</td>
						<td>2D口腔影像+医生经验</td>
					</tr>
					<tr>
						<th scope="row">创伤程度</th>
						<td><b>3D导板精准可视</b>种植，无需翻瓣（不切开）种牙，全程可视，能有效避开血管和神经的损伤，创伤小，无需拆线，一步到位</td>
						<td>医生经验种植，要翻瓣、打孔、缝合、拆线等一系列步骤</td>
					</tr>
					<tr>
						<th scope="row">修复速度</th>
						<td>种植体植入后不再受3-6个月等候期约束，术后可即刻负重，当天就可戴上牙冠，轻松进食</td>
						<td>种植体植入后需要3-6个月的恢复期，才能安装牙冠，在这个期间是不能用种植体吃东西</td>
					</tr>
					<tr>
						<th scope="row">年龄限制</th>
						<td>即刻用3.0种植牙采取<b>微创无痛方式</b>，手术时间短、种牙和戴牙可以同期进行，可<b>突破牙槽骨状态差、年龄大限制</b></td>
						<td>年龄稍大一些、体质偏弱、牙周炎严重、缺牙过多，都很难实现做种植牙</td>
					</tr>
					<tr>
						<th scope="row">护理方案</th>
						<td>治疗后精准医学护理</td>
						<td>一般笼统性的护理</td>
					</tr>
					<tr>
						<th scope="row">使用寿命</th>
						<td>恰当维护，<b>终身受用</b></td>
						<td>使用寿命稳定性不佳</td>
					</tr>
				</tbody>
			</table>
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
									<a href="/swt/" target="_blank" class="swt_btn">在线预约>></a>	
								</div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="pnBtn prev"> <span class="blackBg"></span> <span class="arrow"></span> </div>
				<div class="pnBtn next"> <span class="blackBg"></span> <span class="arrow"></span> </div>
			</div>

		</div>

		<div class="wiki">
			<h2>种植牙<span>百科科普</span></h2>
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
								<a class="red_btn" href="/swt/" target="_blank">我要提问>></a>
								<a class="yel_btn" href="/swt/" target="_blank">在线咨询>></a>
							</li>
						</ul><?php endforeach; endif; else: echo "" ;endif; ?>
					
				</div>
			</div>
		</div>
	
	
	</body>

	
<!--
<div class="flaot_b">
	<div class="cont">
		<div class="tsxm">
			<div class="if_pop" style="overflow: hidden; height: 0px;">
				<ul>
					<li class="lcli01">
						<a href="/list/4.html"></a>
					</li>
					<li class="lcli02">
						<a href="/list/3.html"></a>
					</li>
					<li class="lcli03">
						<a href="/list/5.html"></a>
					</li>
					<li class="lcli04">
						<a href="/list/13.html"></a>
					</li>
					<li class="lcli05">
						<a href="/list/154.html"></a>
					</li>
				</ul>
			</div>
		</div>
		<a onclick="swtClick()" target="_blank" class="a1" title="在线挂号"></a>
		<a href="/list/180.html" target="_blank" class="a2" title="当月特惠活动"></a>
		<a href="#" class="downup" target="_self" title="返回顶部"></a>
	</div>
</div>

<div class="fixed-left" style="width: 12%;">
	<div>
		<a href="/swt?id=left"><img src="/themes/simplebootx/Public/images/activity1.png" alt=""></a>
		<i class="fa fa-close fixed-close"></i>
	</div>
</div>
<div class="fixed-right">
	<div>
		<a href="/swt?id=right"><img src="/themes/simplebootx/Public/images/activity2.gif" alt=""></a>
		<i class="fa fa-close fixed-close"></i>
	</div>
</div>

-->
<div id="footer">
	<div class="footer">
		<div class="footer_left">
			<img src="/themes/simplebootx/Public/images/footer_logo1.png" />
		</div>
		<div class="footer_middle">
			<div class="list">
				<ul>
					<h3>关于我们</h3>
					<li><a href="/about.html">德道品牌</a></li>
					<li><a href="/department/7.html">专家团队</a></li>
					<li><a href="/list/187.html">前沿技术</a></li>
					<li><a href="/list/146.html">德道资讯</a></li>
					<li><a href="/contact.html">联系我们</a></li>
					<li><a href="/traffic.html">来院路线</a></li>
				</ul>
				<ul>
					<h3>口腔项目</h3>
					<li><a href="/list/4.html">种植中心</a></li>
					<li><a href="/list/3.html">正畸中心</a></li>
					<li><a href="/list/5.html">牙齿修复</a></li>
					<li><a href="/swt/">根管治疗</a></li>
					<li><a href="/list/13.html">牙病治疗</a></li>
					<li><a href="/list/154.html">儿童齿科</a></li>
				</ul>
				<ul>
					<h3>热门关注</h3>
					<li><a href="/list/24.html">门牙缺失</a></li>
					<li><a href="/list/7.html">牙齿拥挤</a></li>
					<li><a href="/list/170.html">牙齿稀疏</a></li>
					<li><a href="/list/10.html">牙齿缺损</a></li>
					<li><a href="/list/14.html">龋齿(蛀牙)</a></li>
					<li><a href="/list/15.html">牙周炎</a></li>
				</ul>
			</div>
		</div>
		<div class="footer_right">
			<h3>官方微信</h3>
			<div class="qrcode clearfix">
				<img src="/themes/simplebootx/Public/images/qrcode.png" />
				<div class="text">
					<p>[扫一扫]</p>
					<p>关注德道官方微信<br/>资讯优惠尽在掌握</p>
					<img src="/themes/simplebootx/Public/images/shake.png" />
				</div>
			</div>
			<div class="tel">
				<font><i>医院地址：</i><b>深圳市南山区桂庙路南侧5号龙意成大楼8/9楼</b></font>
				<font>电话：400-800-6161 / 0755-86522406</font>
			</div>
		</div>
	</div>
</div>
<div id="copy">
	<div class="copy">
		<p class="mb-0">CopyRight © 2017 深圳德道口腔门诊部 版权所有</p>
		<p class="mb-0">
			<a href="http://www.beian.miit.gov.cn" target="_blank">ICP备案号：粤ICP备18089183号</a>
			<a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44030502003611">
				<img src="/themes/simplebootx/Public/images/ga-icon.png" style="float:left;" />粤公网安备 44030502003611号
			</a>
			广审号：粤（B）广[2019]第07-22-327号
		</p>
		<p class="mb-0">声明：网站信息仅供参考，不能作为诊断及医疗依据。</p>
	</div>
</div>
		 

<!--
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
		<p class="mb-0 font-weight-bold"><img class="mr-1" src="/themes/simplebootx/Public/images/swt/phone.png"/>400-800-6161 / 0755-86522406</p>
		<a class="inputc" href="/swt/" target="_blank"></a>
		<a class="swtfs" href="/swt/"  target="_blank">发送</a>
	</div>
</div>



<script type="text/javascript" src="/themes/simplebootx/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/themes/simplebootx/Public/js/jquery.SuperSlide.2.1.1.js"></script>

<script>
	
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
	
	//商务通
	function swtClick(){
		 window.open('http://swt.szddkqyy.com/LR/chatwin.aspx?id=MTI57225838');
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
-->
	<script type="text/javascript">
		jQuery(".main_img").slide({mainCell:".bd ul",autoPlay:true});
		jQuery(".tech_box").slide({autoPlay:true});
		jQuery(".caseBox").slide({autoPlay:true});
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