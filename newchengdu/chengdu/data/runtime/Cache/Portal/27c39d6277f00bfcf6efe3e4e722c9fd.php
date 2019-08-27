<?php if (!defined('THINK_PATH')) exit();?><!--儿童齿科-->
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
			<?php $slide = sp_getslide("child_pbanner"); ?>
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
			
		<div class="project">
			<h2>德道儿童齿科<span>中心项目</span></h2>
			<ul class="clearfix">
				<li class="col-xs-4">
					<img src="/themes/simplebootx_mobile/Public/images/child/project_img01.png" />
					<p>儿童防畸</p>
				</li>
				<li class="col-xs-4">
					<img src="/themes/simplebootx_mobile/Public/images/child/project_img02.png" />
					<p>治蛀防蛀</p>
				</li>
				<li class="col-xs-4">
					<img src="/themes/simplebootx_mobile/Public/images/child/project_img03.png" />
					<p>窝沟封闭</p>
				</li>
				<li class="col-xs-4 col-xs-offset-2">
					<img src="/themes/simplebootx_mobile/Public/images/child/project_img04.png" />
					<p>龋齿虫牙</p>
				</li>
				<li class="col-xs-4">
					<img src="/themes/simplebootx_mobile/Public/images/child/project_img05.png" />
					<p>换牙护理</p>
				</li>
			</ul>
		</div>
		
		<div class="love_bg_top"></div>
		<div class="love">
			<h2>专业儿童口腔<br/>让孩子爱上看牙</h2>
			<p class="info">德道口腔为了让孩子爱上看牙，特推出儿童口腔诊室——整个环境充分考虑儿童的天性，充满童趣欢乐，并融合先进诊疗技术和导乐心理疏导，提供儿童口腔健康档案与多项目增值服务，让儿童轻松看牙，提高诊疗效果，拥有快乐看牙经历！</p>
			<div class="love_img clearfix">
				<img src="/themes/simplebootx_mobile/Public/images/child/love_img.png">
			</div>
		</div>
		
		<div class="science clearfix">
			<h2><span>科学护牙</span>从孩子的第一颗<br/>乳牙开始</h2>
			<div class="hd">
				<ul>
					<li class="col-xs-4 on">窝沟封闭<br/>儿童防龋好帮手<i></i></li>
					<li class="col-xs-4">儿童正畸<br/>拒绝萌芽出轨<i></i></li>
					<li class="col-xs-4">儿童蛀牙<br/>3M树脂拯救萌牙<i></i></li>
				</ul>
			</div>
			<div class="bd">
				<div class="science_left clearfix">
					<div class="science_main">
						<h4><span>窝沟封闭</span><br/>儿童防龋好帮手</h4>
						<img src="/themes/simplebootx_mobile/Public/images/child/science_img1-2.png" />
						<p><b>治疗时间：</b>乳磨牙3－4岁，第一恒磨牙6－7岁,第二恒磨牙 11－13岁 双尖牙9－13岁</p>
						<p><b>治疗效果：</b>良好抗龋 　 脱落率低 　 效果显著 　 节约时间</p>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);" class="swt_btn">立刻咨询>></a>
					</div>
				</div>
				<div class="science_left clearfix">
					<div class="science_main">
						<h4><span>儿童正畸</span><br/>拒绝萌芽“出轨”</h4>
						<img src="/themes/simplebootx_mobile/Public/images/child/science_img2-2.png" />
						<p><b>治疗时间：</b>乳磨牙乳牙期阶段4-5，替牙期阶段;女孩8-10岁,男孩9－12岁,恒牙期阶段:女孩11-14岁，男孩13-15岁。</p>
						<p><b>治疗效果：</b>量齿定制 　 自然舒适 　效果显著 　节约时间</p>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);" class="swt_btn">立刻咨询>></a>
					</div>
				</div>
				<div class="science_left clearfix">
					<div class="science_main">
						<h4><span>儿童蛀牙</span><br/>3M树脂拯救萌牙</h4>
						<img src="/themes/simplebootx_mobile/Public/images/child/science_img3-2.png" />
						<p><b>治疗时间：</b>发现牙齿表面有龋坏现象（发黑、发黄、表面不平有龋洞）时，应及时到医院处理，否则将导致牙髓炎、牙齿疼痛，大面积龋坏后将拔除牙齿。</p>
						<p><b>治疗效果：</b>自然美观 效果显著 坚固耐用 使用广泛</p>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);" class="swt_btn">立刻咨询>></a>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="time_bg_top"></div>
		<div class="time">
			<h2>儿童护牙时间表</h2>
			<div class="time_main">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>时间</th>
							<th class="col-xs-4">第一颗乳牙萌出</th>
							<th class="col-xs-3">6个月-1岁</th>
							<th>3岁</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>注意事项</th>
							<td>建立口腔健康档案并清洁牙齿</td>
							<td>第一次看牙的最佳时期</td>
							<td>牙线清洁邻面（3-5岁是邻面龋齿高发期）</td>
						</tr>
					</tbody>
				</table>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>时间</th>
							<th>6岁</th>
							<th>10岁</th>
							<th>12岁</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>注意事项</th>
							<td>第一恒磨牙 窝沟封闭</td>
							<td>检查是否有畸形中央尖</td>
							<td>双尖牙及第二恒磨牙窝沟封闭</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		
		
		<div class="compared2 clearfix">
			<h2>儿童齿科<span>手术对比图</span></h2>
			<img class="col-xs-12" src="/themes/simplebootx_mobile/Public/images/child/compared01.png" />
			<img class="col-xs-12" src="/themes/simplebootx_mobile/Public/images/child/compared02.png" />
		</div>
		
		<div class="doctor">
			<h2>智能口腔专家团</h2>
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
		
		<div class="advertising">
			<img src="/themes/simplebootx_mobile/Public/images/child/ad_img.png">
		</div>
		
		<div class="wiki3">
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
		jQuery(".science").slide();

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