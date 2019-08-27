<?php if (!defined('THINK_PATH')) exit();?><!--牙齿治疗-->
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

		<div class="main_img">
			<?php $slide = sp_getslide("treatment_pbanner"); ?>
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
		
		<div class="symptom">
			<h2>牙齿综合治疗常见症状</h2>
			<ul class="clearfix">
				<li class="col-xs-4">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/symptom_img01.png" alt="...">
					<p>牙周炎</p>
				</li>
				<li class="col-xs-4">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/symptom_img02.png" alt="...">
					<p>牙齿疼痛</p>
				</li>
				<li class="col-xs-4">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/symptom_img03.png" alt="...">
					<p>牙龈出血</p>
				</li>
				<li class="col-xs-4  col-xs-offset-2">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/symptom_img04.png" alt="...">
					<p>龋齿蛀牙</p>
				</li>
				<li class="col-xs-4">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/symptom_img05.png" alt="...">
					<p>智齿</p>
				</li>
			</ul>
			<a onclick="javascript:openJesongChatByGroup(16524,20125);" class="swt_btn">更多适应症状 咨询专业医生>></a>
		</div>
		
		<div class="understand clearfix">
			<h2>了解口腔病变<br/>及时预防治疗</h2>
			<p class="title">牙周病变史</p>
			<ul>
				<li class="col-xs-4 thumbnail">
					<h4><span>01</span></h4>
					<img src="/themes/simplebootx_mobile/Public/images/treatment/understand_img01.jpg" />
					<div class="caption">
						<h3>健康的牙齿</h3>
						<p>坚韧致密、紧贴牙面</p>
					</div>
				</li>
				<li class="col-xs-4 thumbnail">
					<h4><span>02</span></h4>
					<img src="/themes/simplebootx_mobile/Public/images/treatment/understand_img02.jpg" />
					<div class="caption">
						<h3>牙龈炎</h3>
						<p>刷牙、咬东西偶尔出血<br/>牙龈早期被炎症侵犯</p>
					</div>
				</li>
				<li class="col-xs-4 thumbnail">
					<h4><span>03</span></h4>
					<img src="/themes/simplebootx_mobile/Public/images/treatment/understand_img03.jpg" />
					<div class="caption">
						<h3>健康的牙齿</h3>
						<p>坚韧致密、紧贴牙面</p>
					</div>
				</li>
				<li class="col-xs-6 thumbnail">
					<h4><span>04</span></h4>
					<img src="/themes/simplebootx_mobile/Public/images/treatment/understand_img04.jpg" />
					<div class="caption">
						<h3>中期牙周病</h3>
						<p>牙齿反复疼痛、<br/>往牙龈深处发展</p>
					</div>
				</li>
				<li class="col-xs-6 thumbnail">
					<h4><span>05</span></h4>
					<img src="/themes/simplebootx_mobile/Public/images/treatment/understand_img05.jpg" />
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
				<li class="col-xs-6 thumbnail">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/process_pic1.jpg">
					<div class="caption">
						<h3>健康的牙齿</h3>
						<p>牙齿病变</p>
					</div>
				</li>
				<li class="col-xs-6 thumbnail">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/process_pic2.jpg">
					<div class="caption">
						<h3>牙髓炎</h3>
						<p>自发性、阵发性疼痛冷热刺激痛、夜晚疼痛</p>
					</div>
				</li>
				<li class="col-xs-6 thumbnail">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/process_pic3.jpg">
					<div class="caption">
						<h3>牙根炎</h3>
						<p>自发性、持续性疼痛吃东西疼痛、甚至牙齿长脓包</p>
					</div>
				</li>
				<li class="col-xs-6 thumbnail">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/process_pic4.jpg">
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
				<li class="thumbnail col-xs-6">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/cure_pic1.jpg">
					<div class="caption">
						<h3>360°气动洁牙</h3>
						<p>1年保证两次洁牙为佳</p>
					</div>
				</li>
				<li class="thumbnail col-xs-6">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/cure_pic2.jpg">
					<div class="caption">
						<h3>根管治疗</h3>
						<p>根治多种牙齿病症</p>
					</div>
				</li>
				<li class="thumbnail col-xs-6">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/cure_pic3.jpg">
					<div class="caption">
						<h3>3M纳米树脂补牙</h3>
						<p>色泽逼真坚固牙齿</p>
					</div>
				</li>
				<li class="thumbnail col-xs-6">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/cure_pic4.jpg">
					<div class="caption">
						<h3>轻柔舒适刮治</h3>
						<p>引导牙组织重生</p>
					</div>
				</li>
			</ul>
		</div>
		
		<div class="case clearfix">
			<h2>案例展示</h2>
			<ul>
				<li class="col-md-6">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/case_img01.png"/>
				</li>
				<li class="col-md-6">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/case_img02.png"/>
				</li>
				<li class="col-md-6">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/case_img03.png"/>
				</li>
				<li class="col-md-6">
					<img src="/themes/simplebootx_mobile/Public/images/treatment/case_img04.png"/>
				</li>
			</ul>
		</div>
		
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
	
	</body>
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



	<script type="text/javascript">
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