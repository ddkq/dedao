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
		<?php $slide = sp_getslide("repair_pbanner"); ?>
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
	
	<section class="content1">
		<h1 class="content-title text-center">
			<p>
				什么情况需要
				<span class="color-red">牙齿修复</span>
				<i class="bottom-color"></i>
			</p>
		</h1>
		<ul class="content-flex text-center content-list">
			<li>
				<a href="/list/75.html">
					<img src="/themes/simplebootx_mobile/Public/images/repari/aa_1.jpg"/>
					<p class="img-msg">龅牙</p>
				</a>
			</li>
			<li>
				<a href="/list/10.html">
					<img src="/themes/simplebootx_mobile/Public/images/repari/aa_4.jpg"/>
					<p class="img-msg">牙齿缺失</p>
				</a>
			</li>
			<li>
				<a href="/list/74.html">
					<img src="/themes/simplebootx_mobile/Public/images/repari/aa_2.jpg"/>
					<p class="img-msg">色素牙</p>
				</a>
			</li>
		</ul>
		<ul class="content-flex text-center content-list">
			<li>
				<a href="/list/162.html">
					<img src="/themes/simplebootx_mobile/Public/images/repari/aa_3.jpg"/>
					<p class="img-msg">牙齿过小</p>
				</a>
			</li>
			<li>
				<a href="/list/170.html">
					<img src="/themes/simplebootx_mobile/Public/images/repari/aa_5.jpg"/>
					<p class="img-msg">牙缝过大</p>
				</a>
			</li>
			<li>
				<a href="/list/99.html">
					<img src="/themes/simplebootx_mobile/Public/images/repari/aa_6.jpg"/>
					<p class="img-msg">牙釉质不全</p>
				</a>
			</li>
		</ul>
		<div class="text-center"><a onclick="javascript:openJesongChatByGroup(16524,20125);" class="consult writening-btn color-red">我要咨询 >></a></div>
	</section>

	<section class="content2">
		<h1 class="content-title text-center">
			<p>
				<span class="color-red">齿科修复 </span>
				不只是功能重建
				<i class="bottom-color"></i>
			</p>
		</h1>
		<p class="content-text">许多人认为齿科修复无非就是填充龋洞或是做个烤瓷牙。对此，德道齿科医师指出：口腔修复不仅仅是功能重建。它不但包括了治疗恢复性修复、功能重建修复，同时更注重口腔的美学修复，而这也正是德道齿科美学修复中心一贯坚持的治疗标准。</p>
		
		<ul class="list">
			<li><span class="contnet-num">1</span>颜色美观</li>
			<li><span class="contnet-num">2</span>形态自然</li>
			<li><span class="contnet-num">3</span>边缘精密</li>
			<li><span class="contnet-num">4</span>邻接关系好</li>
			<li><span class="contnet-num">5</span>无疼痛等不适</li>
			<li><span class="contnet-num">6</span>牙龈健康</li>
			<li><span class="contnet-num">7</span>尽可能保留健康压根</li>
		</ul>
	</section>
	
	<div class="content3 problem">
		<h1 class="content-title text-center">
			<p>
				<span class="color-red">德道牙齿修复中心</span><br/>
				严格遵循现代口腔审美学标准
				<i class="bottom-color"></i>
			</p>
		</h1>
		<ul class="clearfix">
			<li class="col-xs-6 thumbnail">
				<div class="caption">
					<h3>01</h3>
					<p>结合颜面美学、DSD微笑美学进行面部美学微笑设计</p>	
				</div>
				<img src="/themes/simplebootx_mobile/Public/images/repari/001.jpg"/>
			</li>
			<li class="col-xs-6 thumbnail">
				<div class="caption">
					<h3>02</h3>
					<p>根据美学分析确定牙龈高度、长宽以及牙齿颜色，最终完成微笑线设计。</p>	
				</div>
				<img src="/themes/simplebootx_mobile/Public/images/repari/002.jpg"/>
			</li>
			<li class="col-xs-6 thumbnail">
				<div class="caption">
					<h3>03</h3>
					<p>严密遵循3-3-4-4法则，51道工序，量身定做修复体</p>	
				</div>
				<img src="/themes/simplebootx_mobile/Public/images/repari/003.jpg"/>
			</li>
			<li class="col-xs-6 thumbnail">
				<div class="caption">
					<h3>04</h3>
					<p>佩戴修复体，完成美学修复，较美微笑线成功打造</p>	
				</div>
				<img src="/themes/simplebootx_mobile/Public/images/repari/004.jpg"/>
			</li>
		</ul>
	</div>

	<section class="content3">
		<h1 class="content-title text-center">
			<p>
				<span class="color-red">牙齿修复</span>
				技术推荐
				<i class="bottom-color"></i>
			</p>
		</h1>
		
		<div id="techBox" class="techBox">
			<ul class="content-tab text-center content-flex hd">
				<li class="content-tab-list on">
					<p>3D瓷贴面</p>
				</li>
				<!--<li class="content-tab-list">
					<p>防生美容冠</p>
				</li>-->
				<li class="content-tab-list">
					<p>树脂贴面</p>
				</li>
			</ul>
			<div class="bd">
				<div class="tech_right">
					<div class="tech_main2">
						<h5>德道明星3D瓷贴面优势</h5>
						<p>根据牙齿高低厚薄进行3D精细化量齿定制，采用国际上最先进的粘结技术，在保存活髓、不磨牙的情况下，对牙体表面缺损、着色或变色牙和畸形牙等用高科技瓷修复材料粘结覆盖其表面，以恢复牙体的正常形态和改善其色泽。</p>
						<ul class="cricle clearfix">
							<li class="col-xs-3">不磨牙<br>不伤牙体</li>
							<li class="col-xs-3">经久耐用<br>效果持久</li>
							<li class="col-xs-3">无异物感<br>舒适性佳</li>
							<li class="col-xs-3">色泽自然<br>逼真通透</li>
						</ul>
						<h5>适用人群</h5>
						<ul class="applicable clearfix">
							<li class="col-xs-4"><i class="fa fa-check-square"></i>牙缝大</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>黑牙</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>黄牙</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>四环素牙</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>氟斑牙</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>牙缺损</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>牙釉质不全</li>
							
						</ul>
						<h5>推荐指数<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h5>
					</div>
					<div class="tech_img clearfix">
						<img class="col-xs-6" src="/themes/simplebootx_mobile/Public/images/repari/aqwe1.jpg" />
						<img class="col-xs-6" src="/themes/simplebootx_mobile/Public/images/repari/brts-1.jpg" />
					</div>
				</div>
				<!--<div class="tech_right">
					<div class="tech_main2">
						<h5>德道防生美容冠</h5>
						<p>德道仿生美容冠在扫描、设计、加工以及修复环节，全流程采用数字化修复方案，采用仿生材料，色泽逼真、通透自然，完全媲美真牙，独有齿雕工艺，持久耐用。</p>
						<ul class="cricle clearfix">
							<li class="col-xs-3">数字化<br>设计</li>
							<li class="col-xs-3">顶级<br>材料</li>
							<li class="col-xs-3">快速<br>变白变美</li>
							<li class="col-xs-3">持久<br>耐用</li>					
						</ul>
						<h5>适用人群</h5>
						<ul class="applicable clearfix">
							<li class="col-xs-4"><i class="fa fa-check-square"></i>牙缝大</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>牙缺损</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>畸形牙</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>氟斑牙</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>牙釉质不全</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>牙脱落</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>黄牙/黑牙</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>烤瓷牙失败</li>
						</ul>
						<h5>推荐指数<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h5>
					</div>
					<div class="tech_img clearfix">
						<img class="col-xs-6" src="/themes/simplebootx_mobile/Public/images/repari/bbbcccw-1.jpg" />
						<img class="col-xs-6" src="/themes/simplebootx_mobile/Public/images/repari/oirw-1.jpg" />
					</div>
				</div>-->
				<div class="tech_right">
					<div class="tech_main2">
						<h5>德道树脂贴面</h5>
						<p>直接用树脂在患者口内制作的贴面，其最大的优点是方便、快捷、迅速。可以快速改善患者的前牙美观。如果患者短期内无法接受瓷贴面以及超瓷贴面的费用，不失为短期改善美观的过渡性修复体。</p>
						<ul class="cricle clearfix">
							<li class="col-xs-3">直接<br>整复</li>
							<li class="col-xs-3">微创<br>或无创</li>
							<li class="col-xs-3">方便<br>快捷</li>
							<li class="col-xs-3">便宜<br>实惠</li>
						</ul>
						<h5>适用人群</h5>
						<ul class="applicable clearfix">
							<li class="col-xs-4"><i class="fa fa-check-square"></i>氟斑牙</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>四环素牙</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>过小牙</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>牙间隙</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>外伤牙</li>
							<li class="col-xs-4"><i class="fa fa-check-square"></i>牙缺损</li>
						</ul>
						<h5>推荐指数<i class="fa fa-star"></i><i class="fa fa-star"></i></h5>
					</div>
					<div class="tech_img clearfix">
						<img class="col-xs-6" src="/themes/simplebootx_mobile/Public/images/repari/vgt-1.jpg" />
						<img class="col-xs-6" src="/themes/simplebootx_mobile/Public/images/repari/xct-1.jpg" />
					</div>
				</div>
			</div>
		</div>
		<div class="text-center"><a onclick="javascript:openJesongChatByGroup(16524,20125);" class="consult writening-btn color-red">立即咨询 >></a></div>
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
		slideCell:"#techBox",
		titCell:".hd li", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
		mainCell:".bd", 
		effect:"leftLoop", 
	});
</script>
</html>