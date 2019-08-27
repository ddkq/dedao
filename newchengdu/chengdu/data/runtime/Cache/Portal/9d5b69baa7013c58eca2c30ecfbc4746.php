<?php if (!defined('THINK_PATH')) exit();?><!--牙齿纠正-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon" />
<link href="/themes/simplebootx_mobile/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/base.css" rel="stylesheet" type="text/css">
<!--<script language="javascript" src="http://swt.cdddkqyy.com/JS/LsJS.aspx?siteid=MRW75183048&lng=cn"></script>-->
<script language="javascript" src="https://scripts.easyliao.com/js/easyliao.js"></script>
<!--<script language="javascript" src="//scripts.easyliao.com/16524/27486/lazy.js"></script>-->
<script>
	var script=document.createElement("script");
	script.type="text/javascript";
	script.src="//scripts.easyliao.com/16524/27485/lazy.js";
	document.getElementsByTagName('head')[0].appendChild(script);
	script.onload=function(){}
</script>
<link href="/themes/simplebootx_mobile/Public/css/style.css" rel="stylesheet" type="text/css">
<title><?php echo ($name); ?>_<?php echo ($site_seo_title); ?></title>
<meta name="keywords" content="<?php echo ($seo_keywords); ?>"/>
<meta name="description" content="<?php echo ($seo_description); ?>" />
</head>
<body>
	<!-- 头部 -->
	<div class="header d-flex justify-content-between">
	<div class="home d-flex align-items-center">
		<a href="/"></a>
	</div>
	<div class="logo d-flex align-items-center">
		<a href="/">
			<img src="/themes/simplebootx_mobile/Public/images/article_logo.png" alt="">
		</a>
	</div>
	<p class="header_phone d-flex align-items-center"><a href="tel:028-67696635"><i class="header-icon-phone"></i></a></p>
</div>
<nav class="header-nav position-fixed">
	<ul class="flex">
		<li><a href="/about.html" target="_blank">关于德道</a></li>
		<li class="porject-nav"><a href="/list/62.html">牙科项目</a></li>
		<li><a href="#" target="_blank">真人案例</a></li>
		<li><a onclick="javascript:openJesongChatByGroup(16524,20125);">医保定点</a></li>
	</ul>
</nav>

	<!-- banner -->
	<div class="main_img">
		<?php $slide = sp_getslide("correction_pbanner"); ?>
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

	<!-- 内容1 -->
	<section class="correct-content1 text-center margin-top">
		<h1 class="content-title">
			<p>你是否因 <span class="color-red">这些牙齿畸形问题</span>
				<span class="content-second-title">而备受煎熬？</span>
				<i class="bottom-color"></i>
			</p>
		</h1>
		<p class="content-text">牙齿畸形让你遭人嘲笑缺少自信，同时影响咀嚼不利身体健康，就业受歧视工作难以如意，最悲催的是真爱难觅造成人生遗憾.......</p>
		<div class="content-flex flex-line1">
			<div>
				<img src="/themes/simplebootx_mobile/Public/images/correction/section1-img01.jpg" alt="">
				<p class="content-text-title">牙列拥挤</p>
				<p class="detail-text">牙齿拥挤错位排列<br>龋病及牙周病发病率较高...</p>
				<a onclick="javascript:openJesongChatByGroup(16524,20125);" class="detail-btn">了解详情>></a>
			</div>
			<div>
				<img src="/themes/simplebootx_mobile/Public/images/correction/section1-img02.jpg" alt="">
				<p class="content-text-title">牙齿稀疏</p>
				<p class="detail-text">牙齿间出现的间隙<br>一般引起该现象的原因为...</p>
				<a onclick="javascript:openJesongChatByGroup(16524,20125);" class="detail-btn">了解详情>></a>
			</div>
			<div>
				<img src="/themes/simplebootx_mobile/Public/images/correction/section1-img03.jpg" alt="">
				<p class="content-text-title">错颌（牙错位）</p>
				<p class="detail-text">儿童生长发育过程中<br>由先天或后天等因素造成...</p>
				<a onclick="javascript:openJesongChatByGroup(16524,20125);" class="detail-btn">了解详情>></a>
			</div>
		</div>
		<div class="content-flex flex-line2">
			<div>
				<img src="/themes/simplebootx_mobile/Public/images/correction/section1-img04.jpg" alt="">
				<p class="content-text-title">深覆颌（龅牙）</p>
				<p class="detail-text">上颌前突或双颌前突<br>无功能障碍，影响美观...</p>
				<a onclick="javascript:openJesongChatByGroup(16524,20125);" class="detail-btn">了解详情>></a>
			</div>
			<div>
				<img src="/themes/simplebootx_mobile/Public/images/correction/section1-img05.jpg" alt="">
				<p class="content-text-title">反颌（地包天）</p>
				<p class="detail-text">尽可能及早消除病因<br>早期矫治，防止畸形严重化...</p>
				<a onclick="javascript:openJesongChatByGroup(16524,20125);" class="detail-btn">了解详情>></a>
			</div>
		</div>
	</section>


	<!-- 内容3 -->
	<section class="correct-content3 margin-top">
		<h1 class="content-title text-center">
			<p>六大正畸技术 <span class="color-red">总有一款适合你</span>
				<span class="content-second-title">为您打造舒适的矫齿体验</span>
				<i class="bottom-color"></i>
			</p>
		</h1>
		<div id="tech_Box1">
			<ul class="content-flex text-center content-tab hd">
				<li class="content-tab-title on">
					<p>美国隐适美 </p>
					<p>隐形正畸</p>
				</li>
				<li class="content-tab-title">
					<p>时代天使无托槽 </p>
					<p>隐形正畸</p>
				</li>
				<li class="content-tab-title">
					<p>美国 3M 金属 </p>
					<p>托槽正畸</p>
				</li>
			</ul>
			<div class="bd">
				<div class="content-detail text-left">
					<div class="content-detail-img content-flex" style="margin:0;">
						<div><img src="/themes/simplebootx_mobile/Public/images/correction/s8w3-2.jpg" /></div>
					</div>
					<p class="diagnosis-time">诊疗时间：9个月</p>
					<p class="recommend color-red">医生推荐：<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </p>
					<p class="introduce">设计及制造的隐形牙齿矫正器，它既能满足矫正牙齿的需要，又同时避免了传统托槽矫正能看到：钢牙“的缺点，是市场上最先进的牙齿矫正方法。</p>
					<div class="content-detail-btn text-center">
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">在线咨询</a>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">价格咨询</a>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">在线预约</a>
					</div>
					<div class="describe">
						<div>
							<span class="describe-title">美观舒适</span>
							<p>矫治器质地透明，旁人难以察觉</p>
						</div>
						<div>
							<span class="describe-title">效果预测</span>
							<p>可以做出针对每个患者的三维仿真矫治过程效果预测</p>
						</div>
						<div>
							<span class="describe-title">摘戴便捷</span>
							<p>自由摘戴，不影响正常饮食及生活</p>
						</div>
						<div>
							<span class="describe-title">隐形牙套</span>
							<p>外表近乎透明，厚度更小于 1mm，几乎隐形</p>
						</div>
					</div>
				</div>
				<div class="content-detail text-left">
					<div class="content-detail-img content-flex" style="margin:0;">
						<div><img src="/themes/simplebootx_mobile/Public/images/correction/detail-img01.jpg" alt=""></div>
						<div><img src="/themes/simplebootx_mobile/Public/images/correction/detail-img02.jpg" alt=""></div>
					</div>
					<p class="diagnosis-time">诊疗时间：12个月</p>
					<p class="recommend color-red">医生推荐：<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
					<p class="introduce">进口"隐形牙箍"，不用钢丝、托槽，不影响美观，可自行摘带，在不知不觉中恢复正常颌面形态。</p>
					<div class="content-detail-btn text-center">
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">在线咨询</a>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">价格咨询</a>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">在线预约</a>
					</div>
					<div class="describe">
						<div>
							<span class="describe-title">舒适自在</span>
							<p>没有金属牙箍所造成的口腔磨损及不适，佩戴更舒服</p>
						</div>
						<div>
							<span class="describe-title">效果预测</span>
							<p>计算机三维诊断软件模拟牙齿移动及矫正效果</p>
						</div>
						<div>
							<span class="describe-title">隐形牙箍</span>
							<p>外表近乎透明，厚度更小于 1mm，几乎隐形</p>
						</div>
						<div>
							<span class="describe-title">可自行摘戴</span>
							<p>特别场合或进食时可自行摘下，更好维护口腔卫生</p>
						</div>
					</div>
				</div>
				<div class="content-detail text-left">
					<div class="content-detail-img content-flex" style="margin:0;">
						<div><img src="/themes/simplebootx_mobile/Public/images/correction/detail-img01.jpg" alt=""></div>
						<div><img src="/themes/simplebootx_mobile/Public/images/correction/detail-img02.jpg" alt=""></div>
					</div>
					<p class="diagnosis-time">诊疗时间：12个月</p>
					<p class="recommend color-red">医生推荐：<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </p>
					<p class="introduce">原装进口矫治系统，采用特殊"锁扣"技术，缩短正畸时间近三分之一，复诊间隔时间延长为8-12周。</p>
					<div class="content-detail-btn text-center">
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">在线咨询</a>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">价格咨询</a>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">在线预约</a>
					</div>
					<div class="describe">
						<div>
							<span class="describe-title">节省时间</span>
							<p>记忆弹性弓丝提高了畸牙移动的有效性，可缩短疗程</p>
						</div>
						<div>
							<span class="describe-title">减少拔牙</span>
							<p>特殊的持续微强力系统，能扩展空间，减少拔牙</p>
						</div>
						<div>
							<span class="describe-title">美观舒适</span>
							<p>外形小巧舒适，可避免结扎丝末端对口腔刺伤及不适</p>
						</div>
						<div>
							<span class="describe-title">保护口腔</span>
							<p>有利于保持口腔卫生，保护牙周组织健康</p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div id="tech_Box2">
			<ul class="content-flex text-center content-tab hd">
				<li class="content-tab-title on">
					<p>普通金属</p>
					<p>托槽正畸</p>
				</li>
				<li class="content-tab-title">
					<p>陶瓷 </p>
					<p>托槽正畸</p>
				</li>
				<li class="content-tab-title">
					<p>冰晶</p>
					<p>托槽正畸</p>
				</li>
			</ul>
			<div class="bd">
				<div class="content-detail text-left">
					<div class="content-flex" style="margin:0;">
						<div><img src="/themes/simplebootx_mobile/Public/images/correction/pic_18.jpg" alt=""></div>
						<div class="right-text">
							<p class="">普通金属托槽正畸：</p>
							<p>是一种较传统的牙齿正畸固定矫治器，可达到牙齿正畸错位牙齿的目的，应用比较广泛。</p>
							<p class="color-red">医生推荐：<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
						</div>
					</div>
					<div class="content-detail-btn text-center">
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">在线咨询</a>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">价格咨询</a>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">在线预约</a>
					</div>
					<div class="describe">
						<div>
							<span class="describe-title">费用较便宜</span>
							<p>受大多数人群喜欢。</p>
						</div>
						<div>
							<span class="describe-title">矫正时间较长</span>
							<p>采用这种方法进行矫正的时间虽然相对较长，<br>但能基本实现矫正效果。</p>
						</div>
						<div>
							<span class="describe-title">治疗流程</span>
							<p>在确定患者矫牙方案后，为患者取牙模。然后，医生会根据 <br>患者口腔情况为患者拔牙（并非每人都需要拔牙）。接着为患者分牙。<br>最后为患者戴上金属托槽，定期复诊。</p>
						</div>
					</div>
				</div>
				<div class="content-detail text-left">
					<div class="content-flex" style="margin:0;">
						<div><img src="/themes/simplebootx_mobile/Public/images/correction/pic_19.jpg" alt=""></div>
						<div class="right-text">
							<p class="">陶瓷托槽正畸：</p>
							<p>采用特殊透明陶瓷材料，颜色接近牙齿本色，不易被发现，不含金属成分，相容性很好。</p>
							<p class="color-red">医生推荐：<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
						</div>
					</div>
					<div class="content-detail-btn text-center">
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">在线咨询</a>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">价格咨询</a>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">在线预约</a>
					</div>
					<div class="describe">
						<div>
							<span class="describe-title">蔽性好</span>
							<p>特殊透明陶瓷，隐蔽性较好，使矫治过程悄然完成。</p>
						</div>
						<div>
							<span class="describe-title">抗变色强</span>
							<p>透明托槽具有良好的抗污染性和抗变色能力。</p>
						</div>
						<div>
							<span class="describe-title">不易变形</span>
							<p>具有很高的硬度，为不锈钢的九倍，不会变形。</p>
						</div>
						<div>
							<span class="describe-title">复诊量少</span>
							<p>附着受力均匀，不易脱落，明显降低复诊概率 。</p>
						</div>
					</div>
				</div>
				<div class="content-detail text-left">
					<div class="content-flex" style="margin:0;">
						<div><img src="/themes/simplebootx_mobile/Public/images/correction/pic_20.jpg" alt=""></div>
						<div class="right-text">
							<p class="">冰晶托槽正畸：</p>
							<p>似蓝宝石透明材质，小巧轻薄；热处理技术及高强度结扎翼，使强度和抗破坏性是普通陶瓷托槽的两倍。</p>
							<p class="color-red">医生推荐：<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
						</div>
					</div>
					<div class="content-detail-btn text-center">
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">在线咨询</a>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">价格咨询</a>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">在线预约</a>
					</div>
					<div class="describe">
						<div>
							<span class="describe-title">透明舒适</span>
							<p>兼顾美学正畸和隐形正畸效果。</p>
						</div>
						<div>
							<span class="describe-title">拆除方便</span>
							<p>专利技术减少拆除所需力量。</p>
						</div>
						<div>
							<span class="describe-title">光滑舒适</span>
							<p>热抛光技术形成的强光滑槽沟，可减小滑动摩擦力。</p>
						</div>
						<div>
							<span class="describe-title">定位强</span>
							<p>菱形结构、贴合底板外形及不同颜色水溶标记，能很好的托槽定位。</p>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</section>

	<!-- 内容4 -->
	<section class="correct-content4 text-center margin-top" style="background: #fff;">
		<h1 class="content-title">
			<p>
				美学正畸中心隐形矫正<span class="color-red">6部曲</span>
				<i class="bottom-color"></i>
			</p>
			
		</h1>
		<div>
			<ul class="correct-list">
				<li>
					<h3>
						<i class="linear left"></i>01<i class="linear right"></i>
					</h3>
					<p>初步检查<br/>拍片<br/>取模</p>
				</li>
				<li>
					<h3>
						<i class="linear left"></i>02<i class="linear right"></i>
					</h3>
					<p>诊断分析<br/>方案设计</p>
				</li>
				<li>
					<h3>
						<i class="linear left"></i>03<i class="linear right"></i>
					</h3>
					<p>模拟预期<br/>治疗效果</p>
				</li>
				<li>
					<h3>
						<i class="linear left"></i>04<i class="linear right"></i>
					</h3>
					<p>客户沟通<br/>制作</p>
				</li>
				<li>
					<h3>
						<i class="linear left"></i>05<i class="linear right"></i>
					</h3>
					<p>实施治疗</p>
				</li>
				<li>
					<h3>
						<i class="linear left"></i>06<i class="linear right"></i>
					</h3>
					<p>定期复诊</p>
				</li>
			</ul>
		</div>
	</section>
	<!-- 内容4 预约医师 -->
	<div class="doctor doctor2">
		<h2>
			智能口腔专家团
		</h2>
		<div class="doctorBox" id="doctorBox">
			<div class="hd">
				<ul></ul>
			</div>
			<div class="bd">
				<ul>
					<?php if(is_array($doctor)): $i = 0; $__LIST__ = $doctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<div class="dimg col-xs-6">
								<img src="<?php echo ($vo["main_img"]); ?>" />
								<a onclick="javascript:openJesongChatByGroup(16524,20125);"><i class="fa fa-commenting-o"></i>在线咨询</a>
							</div>
							<div class="text col-xs-6">
								<div class="info">
									<h4><?php echo ($vo["name"]); ?><span><?php echo ($vo["job"]); ?></span></h4>
									<?php if(is_array($vo['experience'])): $i = 0; $__LIST__ = array_slice($vo['experience'],0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><p><?php echo ($vo1); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
								<p class="item"><span>擅长项目</span><?php echo ($vo["item"]); ?></p>
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- 内容5 牙齿百科 -->
	<div class="wiki3 wiki">
		<h2><?php echo ($name); ?><span>热点关注</span></h2>
		<ul class="clearfix">
			<?php if(is_array($tab_text)): $i = 0; $__LIST__ = $tab_text;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<a href="<?php echo get_article_url($vo['tid'],$vo['link_type'],$vo['post_url']);;?>">
						<h4 class="media-heading"><?php echo ($vo["post_title"]); ?><span></span></h4>
						<?php echo ($vo["post_excerpt"]); ?>
					</a>
					<a href="/list/<?php echo ($vo["term_id"]); ?>.html" target="_blank" class="tab_term"><?php echo ($vo[name]); ?></a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>

	<div class="copy">
	<p>CopyRight © 2017 成都青羊德道口腔医院 版权所有 
		<br/> ICP备案号：<a href="http://www.miitbeian.gov.cn" target="_blank">蜀ICP备18017345号-1</a>
		<br/> <a target="_blank" class="d-flex justify-content-center" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=51010502010725"><img src="/themes/simplebootx_mobile/Public/images/ga-icon.png" style="float:left;" />川公网安备 51010502010725号</a>
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
	
	
	/*function openJesongChatByGroup(m,n){
		window.open('http://swt.cdddkqyy.com/LR/chatwin.aspx?id=MRW75183048');
	}*/
	
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
	  hm.src = "https://hm.baidu.com/hm.js?4cacc15b117be8562b33d04284b6d5d7";
	  var s = document.getElementsByTagName("script")[0]; 
	  s.parentNode.insertBefore(hm, s);
	})();
	
</script>



</body>
<script>
	TouchSlide({slideCell:".main_img",effect:"leftLoop"});
	TouchSlide({ 
		slideCell:"#doctorBox",
		titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
		mainCell:".bd ul", 
		effect:"leftLoop", 
		autoPlay:true,//自动播放
		autoPage:true, //自动分页
		switchLoad:"_src" //切换加载，真实图片路径为"_src" 
	});
	TouchSlide({ 
		slideCell:"#tech_Box1",
		titCell:".hd li", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
		mainCell:".bd", 
		effect:"leftLoop", 
	});
	TouchSlide({ 
		slideCell:"#tech_Box2",
		titCell:".hd li", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
		mainCell:".bd", 
		effect:"leftLoop", 
	});
</script>
</html>