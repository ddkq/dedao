<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
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
	<link href="/themes/simplebootx_mobile/Public/css/article.css" rel="stylesheet" type="text/css">
	<title><?php echo ($name); ?>_<?php echo ($site_name); ?></title>
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


		<div class="main_list">
			<h3 class="term_title"><?php echo ($name); ?></h3>
			
			<div class="anli_bdts" id="anliBox">
				<?php $where['recommended'] = 1; $case1=sp_sql_posts("cid:174;field:tid,post_title,post_excerpt,smeta,link_type,post_murl,post_murl,post_extend;limit:1;order:post_date desc;"); $case2=sp_sql_posts("cid:175;field:tid,post_title,post_excerpt,smeta,link_type,post_murl,post_murl,post_extend;limit:1;order:post_date desc;"); $case3=sp_sql_posts("cid:178;field:tid,post_title,post_excerpt,smeta,link_type,post_murl,post_murl,post_extend;limit:1;order:post_date desc;"); ?>
				<div class="anli_mb-hover hd">
					<ul>
						<li class="on" data-type="1">种牙案例</li>
						<li class="" data-type="2">矫牙案例</li>
						<!--<li class="" data-type="3">修复案例</li>-->
					</ul>
				</div>
				<div class="anli_mb-yg bd">
					<ul>
						<?php $extend1 = json_decode($case1[0]['post_extend'],true); $smeta1=json_decode($case1[0]['smeta'],true); ?>
						<dl>
							<h1><?php echo ($case1[0][post_title]); ?></h1>
							<img src="<?php echo ($smeta1["thumb"]); ?>">
							<dt>人物档案：<span><?php echo ($extend1['post_extend2']); ?></span></dt>
							<dt>修复方案：<span><?php echo ($extend1['post_extend4']); ?></span></dt>
							<dt>术前症状：<span><?php echo ($extend1['post_extend3']); ?></span></dt>
							<a onclick="javascript:openJesongChatByGroup(16524,20125);">咨询主治医生</a>
							<a href="<?php echo get_article_url($case1[0][tid],$case1[0][link_type],$case1[0][post_murl]);?>" target="_blank" style="background:#be946d">查看案例详情</a>
						</dl>
					</ul>
					<ul>
						<?php $extend2 = json_decode($case2[0]['post_extend'],true); $smeta2=json_decode($case2[0]['smeta'],true); ?>
						<dl>
							<h1><?php echo ($case2[0][post_title]); ?></h1>
							<div style="height:1.2rem"></div>
							<img src="<?php echo ($smeta2["thumb"]); ?>">
							<dt>人物档案：<span><?php echo ($extend2['post_extend2']); ?></span></dt>
							<dt>修复方案：<span><?php echo ($extend2['post_extend4']); ?></span></dt>
							<dt>术前症状：<span><?php echo ($extend2['post_extend3']); ?></span></dt>
							<a onclick="javascript:openJesongChatByGroup(16524,20125);">咨询主治医生</a>
							<a href="<?php echo get_article_url($case2[0][tid],$case2[0][link_type],$case2[0][post_murl]);?>" target="_blank" style="background:#be946d">查看案例详情</a>
						</dl>
					</ul>
					<!--<ul>
						<?php $extend3 = json_decode($case3[0]['post_extend'],true); $smeta3=json_decode($case3[0]['smeta'],true); ?>
						<dl>
							<h1><?php echo ($case3[0][post_title]); ?></h1>
							<div style="height:1.2rem"></div>
							<img src="<?php echo ($smeta3["thumb"]); ?>">
							<dt>人物档案：<span><?php echo ($extend3['post_extend1']); ?>，<?php echo ($extend3['post_extend2']); ?></span></dt>
							<dt>修复方案：<span><?php echo ($extend3['post_extend4']); ?></span></dt>
							<dt>术前症状：<span><?php echo ($extend3['post_extend3']); ?></span></dt>
							<a onclick="javascript:openJesongChatByGroup(16524,20125);">咨询主治医生</a>
							<a href="<?php echo get_article_url($case3[0][tid],$case3[0][link_type],$case3[0][post_murl]);?>" target="_blank" style="background:#be946d">查看案例详情</a>
						</dl>
					</ul>-->
				</div>
			</div>
			
			<div class="dhk">
				<h2><p>我是在线客服， 有问题可以直接咨询~ </p> <a href="tel:4008006161"><span><img src="/themes/simplebootx_mobile/Public/images/icon_phone.png"></span>免费热线</a></h2>
				<div class="dhk-border">
					<div class="youhui-wrap">
						<div id="bb" style="">
							<div class="toux"><img src="/themes/simplebootx_mobile/Public/images/01_03.png" alt=""></div>
							<p class="pp2">您好，请问有什么能帮到您？<span class="sj"><img src="/themes/simplebootx_mobile/Public/images/sj.png" alt=""></span></p>
						</div>
						<div id="ee" style="">
							<div class="toux toux2"><img src="/themes/simplebootx_mobile/Public/images/01_03.png" alt=""></div>
							<p class="pp2 pp3">
								<span class="txt">征集高龄、疑难种植牙案例火热进行中，网络预约可申请种牙专项优惠</span>
								<span class="sj"><img src="/themes/simplebootx_mobile/Public/images/sj.png" alt=""></span></p>
						</div>
						<a onclick="javascript:openJesongChatByGroup(16524,20125);">
							<textarea id="input_n" placeholder="在此输入可直接对话"></textarea>
							<button type="button" id="button"><span class="jump">发送</span></button>
						</a>
					</div>
				</div>
			</div>
			
			<ul class="lists">
				<?php if(is_array($list['posts'])): $i = 0; $__LIST__ = $list['posts'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<a class="media" href="<?php echo get_article_url($vo['tid'],$vo['link_type'],$vo['post_murl']);?>">
							<div class="media-body">
								<p><?php echo ($vo["post_title"]); ?></p>
								<p class="time">时间：<?php echo substr("$vo[post_modified]", 0, -9);?></p>
							</div>
							<div class="media-right">
								<i class="fa fa-angle-right"></i>
							</div>
						</a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<ul class="page"><?php echo ($list['page']); ?></ul>

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



		<script type="text/javascript">
			TouchSlide({ slideCell:"#anliBox",effect:"leftLoop" });
			
			$('body').on('click','.anli_mb-hover ul li',function(){
				var type = $(this).data('type');
				var txt = $('.pp3').find('.txt');
				if(type == 1){
					txt.html('征集高龄、疑难种植牙案例火热进行中，网络预约可申请种牙专项优惠');
				}else if(type == 2){
					txt.html('征集牙齿矫正案例火热进行中，网络预约可申请种牙专项优惠');
				}else if(type == 3){
					txt.html('征集牙齿修复案例火热进行中，网络预约可申请种牙专项优惠');
				}
			});
			

			$(window).scroll(function(){
			    setTimeout(function(){
			          var winT=$(this).scrollTop();
					  var top1=$('.youhui-wrap').offset().top;
			          if(winT>=(top1-400)){
			              function show(){
			                $('#bb').fadeIn(1000);
			                $('#ee').fadeIn(1000);
			            };
			            show();
			          }
			    },0)
			    
			});
		</script>
	</body>

</html>