<?php if (!defined('THINK_PATH')) exit();?><!--牙齿修复-->
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon" />
<link href="/themes/simplebootx_mobile/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/base.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://swt.szddkqyy.com/JS/LsJS.aspx?siteid=MTI57225838&lng=cn"></script>
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
	
	<div class="main_img">
		<?php $slide = sp_getslide("implant_pbanner"); ?>
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

	<section class="content1 text-center">
		<h1 class="content-title">
			<p>
				牙齿缺失的痛苦 
				<span class="color-red">你体会过吗？</span>
				<i class="bottom-color"></i>
			</p>
		</h1>
		
		<div class="img-list">
			<div class="bcg-f6">
				<p>
					<i class="line"></i>
					<span class="num">01</span>
					<i class="line"></i></p>
				<p class="name">容易实物嵌塞</p>
				<p><img src="/themes/simplebootx_mobile/Public/images/implant/01.jpg" alt=""></p>
			</div>
			<div class="bcg-d8">
				<p>
					<i class="line color-bf"></i>
					<span class="num">02</span>
					<i class="line color-bf"></i>
				</p>
				<p class="name">破坏牙列的完整性</p>
				<p><img src="/themes/simplebootx_mobile/Public/images/implant/02.jpg" alt=""></p>
			</div>
		</div>
		<div class="img-list" style="margin-top: 2px;">
			<div class="bcg-f6">
				<p>
					<i class="line"></i>
					<span class="num">03</span>
					<i class="line"></i>
				</p>
				<p class="name">面部变形 影响美观</p>
				<p><img src="/themes/simplebootx_mobile/Public/images/implant/03.jpg" alt=""></p>
			</div>
			<div class="bcg-d8">
				<p>
					<i class="line color-bf"></i>
					<span class="num">04</span>
					<i class="line color-bf"></i>
				</p>
				<p class="name">引发各类口腔疾病</p>
				<p><img src="/themes/simplebootx_mobile/Public/images/implant/04.jpg" alt=""></p>
			</div>
		</div>
		<div><a href="javascript:swtClick();" target="_blank" class="consult writening-btn color-red">我要咨询 >></a></div>
	</section>

	<section class="content2">
		<div class="understand text-center">
			<p class="content-title">
				<i class="fa fa-question-circle-o"></i>
				<span>了解种植牙 &nbsp;—&nbsp;广受认可的修复技术</span>
			</p>
			<p class="content-second-title">
				<a href="javascript:swtClick();">种植牙寿命</a>
				<a href="javascript:swtClick();" target="_blank" class="left-line">种植牙有风险吗</a>
				<a href="javascript:swtClick();" target="_blank" class="left-line">种植牙价格</a>
			</p>
		</div>
		<div>
			<ul class="content-text">
				<li><i class="round"></i>主要材料是种植体\修复基台\牙冠三部分组成的</li>
				<li><i class="round"></i>植体植入牙槽骨内充当牙根，增加假牙固定性，能够更好的恢复口腔咀嚼受力</li>
			</ul>
			<h1 class="content-title">什么情况需要种植牙？</h1>
			<ul class="content-flex text-center content-list">
				<li>
					<img src="/themes/simplebootx_mobile/Public/images/implant/lost01.jpg" alt="">
					<p class="img-msg">单颗缺失</p>
				</li>
				<li>
					<img src="/themes/simplebootx_mobile/Public/images/implant/lost02.jpg" alt="">
					<p class="img-msg">多颗缺失</p>
				</li>
				<li>
					<img src="/themes/simplebootx_mobile/Public/images/implant/lost03.jpg" alt="">
					<p class="img-msg">半口缺失</p>
				</li>
			</ul>
			<ul class="content-flex text-center content-list" style="margin-top: 1.75rem;">
				<li>
					<img src="/themes/simplebootx_mobile/Public/images/implant/lost04.jpg" alt="">
					<p class="img-msg">全口缺失</p>
				</li>
				<li>
					<img src="/themes/simplebootx_mobile/Public/images/implant/lost05.jpg" alt="">
					<p class="img-msg">牙齿脱落</p>
				</li>
				<li>
					<img src="/themes/simplebootx_mobile/Public/images/implant/lost06.jpg" alt="">
					<p class="img-msg">活动义齿</p>
				</li>
			</ul>
			<div class="implant">
				<h1 class="small-title color-red">[ 种植牙为什么不贵？ ]</h1>
				<div class="adv_red">
					<p>0.68元/天  =  幸福生活</p>
					<p>健康好牙+乐享美食+灿烂笑容</p>
				</div>
				<p class="desc">种植牙齿由三部分组成，即种植体、牙冠和基台，通常种植体的价格在几千至上万元不等(以下我们按1万元来计算)</p>
				<span>1颗种植牙可使用40年（甚至更久） 一年365天，40年约等于14600天</span>
				<font>10000元÷14600天=0.68元<small>/天</small></font>
			</div>
			<div class="factor">
				<h1 class="small-title color-red">[ 影响种植牙价格的因素包括 ]</h1>
				<div class="clearfix">
					<div class="col-xs-6 right-linear factor-list">
						<p class="text-center">
							<i class="num color-red">01</i>
							<span class="color-linear">医院/医生</span>
						</p>
						<p>医院的技术实力、医生实力、手术设备等 是影响种植牙价格的重要因素之一。</p>
					</div>
					<div class="col-xs-6 factor-list">
						<p class="text-center">
							<i class="num color-red">02</i>
							<span class="color-linear">种植牙材料</span>
						</p>
						<p>材料不同、性能不一样，价格就会存在 差异，品质越高的材料价格自然就越高。</p>
					</div>
					<div class="col-xs-6 top-linear right-linear factor-list">
						<p class="text-center">
							<i class="num color-red">03</i>
							<span class="color-linear">牙齿种植难易程度</span>
						</p>
						<p>医生根据每个人的情况定制方案，治疗 方法、难易程度不一样，价格也不一样。</p>
					</div>
					<div class="col-xs-6 top-linear factor-list">
						<p class="text-center">
							<i class="num color-red">04</i>
							<span class="color-linear">患者口腔状况</span>
						</p>
						<p>口腔状况好的患者可直接进行手术， 反之则需对口腔问题进行治疗后再种牙。</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="content4">
		<h1 class="content-title text-center">
			<p>
				<span class="color-red">5大优势</span>
				 带您做次不一样的种植牙
				<i class="bottom-color"></i>
			</p>
		</h1>
		<div class="advantage clearfix">
			<div class="col-xs-7">
				<div class="advantage-list advantage-list1">
					<p><img src="/themes/simplebootx_mobile/Public/images/implant/content4-01.jpg" alt=""></p>
					<p><i class="num">01</i><span class="bottom-linear">微创无痛</span></p>
					<p>融合先进技术，达到无痛、精准、快速、安全的种植牙手术效果。</p>
				</div>	
				<div class="advantage-list advantage-list2">
					<p><img src="/themes/simplebootx_mobile/Public/images/implant/content4-02.jpg" alt=""></p>
					<p><i class="num">02</i><span class="bottom-linear">无需磨牙</span></p>
					<p>依靠人工牙根进行修复，不用磨损旁边的健康牙齿</p>
				</div>
			</div>
			<div class="col-xs-5">
				<div class="advantage-list advantage-list3">
					<p class="num">03</p>
					<p><span class="bottom-linear">即种即用</span></p>
					<p>当天种当天用，解决耗时长问题，实现“即拔、即种、即用”。</p>
					<p class="text-center"><img src="/themes/simplebootx_mobile/Public/images/implant/content4-03.jpg" alt="" width="100%"></p>
				</div>
				<div class="text-center design-online">
					<a href="javascript:swtClick();" target="_blank" class="design">点击在线设计方案</a>
				</div>	
			</div>
			<div class="advantage-list advantage-list4">
				<p><img src="/themes/simplebootx_mobile/Public/images/implant/content4-04.jpg" alt=""><i class="num">04</i></p>
				<p><span class="bottom-linear">咀嚼功能强</span></p>
				<p>与真牙的力学原理相似，咀嚼功能优于传统假牙</p>
			</div>
			<div class="advantage-list advantage-list5">
				<p><img src="/themes/simplebootx_mobile/Public/images/implant/content4-05.jpg" alt=""><i class="num">05</i></p>
				<p><span class="bottom-linear">美观效果好</span></p>
				<p>根据患者脸型、其它牙齿形状与色泽制作牙冠，达到整体外观更协调 </p>
			</div>
		</div>
	</section>

	<section class="content3 compared">
		<h1 class="content-title text-center">
			<p>
				即刻用3.0种植牙VS<br />
				<span class="color-red">传统种植牙</span>
				<i class="bottom-color"></i>
			</p>
		</h1>
		<table class="table">
			<thead>
				<tr>
					<th></th>
					<th>即刻用3.0种植牙</th>
					<th>传统种植牙</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">术前检查</th>
					<td>
						<img src="/themes/simplebootx_mobile/Public/images/implant/compared_img4.png"/>
						新一代的360°3D口腔透视，不留死角，不误诊，准确率高达99.8%，确保手术方案安全可靠。
					</td>
					<td>
						<img src="/themes/simplebootx_mobile/Public/images/implant/compared_img5.png"/>
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
								<a href="javascript:swtClick();" target="_blank"><i class="fa fa-commenting-o"></i>在线咨询</a>
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
</script>
</html>