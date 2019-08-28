<?php if (!defined('THINK_PATH')) exit();?><!--医生终端页-->
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
	<link href="/themes/simplebootx_mobile/Public/css/article.css" rel="stylesheet" type="text/css">
	<title><?php echo ($name); ?>_<?php echo ($site_name); ?></title>
	<meta name="keywords" content="<?php echo ($post_keywords); ?>"/>
	<meta name="description" content="<?php echo ($post_excerpt); ?>" />
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
		
		<div class="font_page">
			<div class="font_page_nr media">
				<div class="media-left">
					<img src="<?php echo ($smeta[thumb_phone]); ?>" />
				</div>
				<div class="media-body">
					<h3><?php echo ($name); ?><span><?php echo ($job); ?></span></h3>
					<p>职务：<?php echo ($duties); ?></p>
					<p>科室：
						<?php if(is_array($terms)): $i = 0; $__LIST__ = $terms;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["name"]); ?>&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
					</p>
					<p>职称：<?php echo ($job); ?></p>	
					<div class="swt">
						<a href="/doctor/<?php echo ($vo["id"]); ?>.html">专家详情</a>
						<a href="/swt/"  target="_blank">预约咨询</a>	
					</div>
				</div>
				
				<h4>坐诊时间</h4>
				<table class="table table-bordered text-center">
					<?php foreach($working as $vo){ if($vo == 11){ $s11 = '<i class="fa fa-check"></i>';}if($vo == 12){ $s12 = '<i class="fa fa-check"></i>';}if($vo == 13){ $s13 = '<i class="fa fa-check"></i>';} if($vo == 21){ $s21 = '<i class="fa fa-check"></i>';}if($vo == 22){ $s22 = '<i class="fa fa-check"></i>';}if($vo == 23){ $s23 = '<i class="fa fa-check"></i>';} if($vo == 31){ $s31 = '<i class="fa fa-check"></i>';}if($vo == 32){ $s32 = '<i class="fa fa-check"></i>';}if($vo == 33){ $s33 = '<i class="fa fa-check"></i>';} if($vo == 41){ $s41 = '<i class="fa fa-check"></i>';}if($vo == 42){ $s42 = '<i class="fa fa-check"></i>';}if($vo == 43){ $s43 = '<i class="fa fa-check"></i>';} if($vo == 51){ $s51 = '<i class="fa fa-check"></i>';}if($vo == 52){ $s52 = '<i class="fa fa-check"></i>';}if($vo == 53){ $s53 = '<i class="fa fa-check"></i>';} if($vo == 61){ $s61 = '<i class="fa fa-check"></i>';}if($vo == 62){ $s62 = '<i class="fa fa-check"></i>';}if($vo == 63){ $s63 = '<i class="fa fa-check"></i>';} if($vo == 71){ $s71 = '<i class="fa fa-check"></i>';}if($vo == 72){ $s72 = '<i class="fa fa-check"></i>';}if($vo == 73){ $s73 = '<i class="fa fa-check"></i>';} } ?>
					<thead>
						<tr>
							<th></th>
							<th>周一</th>
							<th>周二</th>
							<th>周三</th>
							<th>周四</th>
							<th>周五</th>
							<th>周六</th>
							<th>周日</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">上午</th>
							<td><?php echo ($s11); ?></td>
							<td><?php echo ($s21); ?></td>
							<td><?php echo ($s31); ?></td>
							<td><?php echo ($s41); ?></td>
							<td><?php echo ($s51); ?></td>
							<td><?php echo ($s61); ?></td>
							<td><?php echo ($s71); ?></td>
						</tr>
						<tr>
							<th scope="row">中午</th>
							<td><?php echo ($s12); ?></td>
							<td><?php echo ($s22); ?></td>
							<td><?php echo ($s32); ?></td>
							<td><?php echo ($s42); ?></td>
							<td><?php echo ($s52); ?></td>
							<td><?php echo ($s62); ?></td>
							<td><?php echo ($s72); ?></td>
						</tr>
						<tr>
							<th scope="row">下午</th>
							<td><?php echo ($s13); ?></td>
							<td><?php echo ($s23); ?></td>
							<td><?php echo ($s33); ?></td>
							<td><?php echo ($s43); ?></td>
							<td><?php echo ($s53); ?></td>
							<td><?php echo ($s63); ?></td>
							<td><?php echo ($s73); ?></td>
						</tr>
					</tbody>
				</table>
				
			
				<div class="font_content">
					<h4>医师介绍</h4>
					<?php echo ($excerpt); ?>
					<h4>专业擅长</h4>
					<?php echo ($content); ?>
				</div>
			</div>
			
			<ul class="article_btn clearfix">
				<li class="col-xs-6">
					<a href="/swt/"><i class="icon_01"></i>在线咨询<span>专家快速解答</span></a>
				</li>
				<li class="col-xs-6">
					<a href="tel:4008006161"><i class="icon_02"></i>电话咨询<span>400-800-6161 / 0755-86522406</span></a>
				</li>
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

</html>