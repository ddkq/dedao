<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
	<link rel="stylesheet" href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css">
	<link rel="stylesheet" href="/themes/simplebootx_mobile/Zt/multiple-deletion/index.css">
	<title>30分钟种回“真牙”_<?php echo ($site_name); ?></title>
</head>
<body>
	<div class="header d-flex justify-content-between">
	<div class="home d-flex align-items-center">
		<a href="/"></a>
	</div>
	<div class="logo p-2">
		<a href="/">
			<img src="/themes/simplebootx_mobile/Public/images/article_logo.png" alt="" class="img-fluid">
		</a>
	</div>
	<p class="header_phone d-flex align-items-center"><a href="tel:028-67696635"><i class="header-icon-phone"></i></a></p>
</div>
<nav class="header-nav position-fixed">
	<ul class="d-flex justify-content-between">
		<li><a href="/about.html" target="_blank">关于德道</a></li>
		<li class="porject-nav"><a href="#">牙科项目</a></li>
		<!-- <li class="porject-nav"><a href="/list/62.html">牙科项目</a></li> -->
		<li><a href="#" target="_blank">真人案例</a></li>
		<li><a onclick="javascript:openJesongChatByGroup(16524,20125);">医保定点</a></li>
	</ul>
</nav>
	
	<section class="banner"><img src="/themes/simplebootx_mobile/Zt/multiple-deletion/imgs/banner.jpg" alt=""></section>

	<section class="content-box-1">
		<h2 class="text-center font-weight-bold p-2"><i class="phone-icon mr-1"></i>我要预约种牙</h2>
		<form  id="form1" method="post" enctype="multipart/form-data" class="text-center content-form p-2">
			<input type="hidden" name="table_id" value="31" />
			<input type="hidden" name="page" class="page" />
			<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
			<p class="symptom"><span class="mr-2">症状描述:</span><input type="text" name="data[symptom]"></p>
			<p class="name"><span class="mr-2">您的名字:</span><input type="text" name="data[name]" ></p>
			<p class="phone"><span class="mr-2">您的电话:</span><input type="text" name="data[phone]"></p>
		</form>
		<div class="text-center p-2 mb-3"><a href="" class="submit-btn text-white p-2">提交预约</a></div>
		<p class="tips pl-3 pr-3 mb-0 pb-1">*以上填写的信息仅用于本次预约，不会泄露给第三方或其他用途。</p>
	</section>

	<section><img src="/themes/simplebootx_mobile/Zt/multiple-deletion/imgs/content-img01.png" alt=""></section>

	<section class="content-box-2">
		<h2 class="text-center font-weight-bold p-3">他们都在德道重拾口福</h2>
		<div><img src="/themes/simplebootx_mobile/Zt/multiple-deletion/imgs/content-img02.png" alt=""></div>
		<?php $case_where['recommended'] = 1; $case = sp_sql_posts_bycatid(108,'field:tid,post_title,link_type,post_url,smeta,post_extend;limit:0,4',$case_where); ?>
		<ul class="case-list mt-4 pl-2 pr-2">
			<li>
				<h6 class="case-title">【案例】68岁老伯成功种牙 恢复正常生活</h6>
				<div class="mb-4">
					<img src="/themes/simplebootx_mobile/Zt/myqs/imgs/case01.jpg" alt="">
				</div>
			</li>
			<li>
				<h6 class="case-title">【案例】29岁女士不敢开怀大笑  修补门牙找回自信 </h6>
				<div class="mb-4">
					<img src="/themes/simplebootx_mobile/Zt/myqs/imgs/case02.jpg" alt="">
				</div>
			</li>
			<li>
				<h6 class="case-title">【案例】84岁老大爷不愿戴假牙 种植上一口好牙</h6>
				<div class="mb-4">
					<img src="/themes/simplebootx_mobile/Zt/myqs/imgs/case03.jpg" alt="">
				</div>
			</li>
			<li>
				<h6 class="case-title">【案例】53岁男士种上多颗牙  吃遍酸甜苦辣 </h6>
				<div class="mb-4">
					<img src="/themes/simplebootx_mobile/Zt/myqs/imgs/case04.jpg" alt="">
				</div>
			</li>
			<li>
				<h6 class="case-title">【案例】40岁商务人士种上牙齿 自信笑容回来了 </h6>
				<div class="mb-4">
					<img src="/themes/simplebootx_mobile/Zt/myqs/imgs/case05.jpg" alt="">
				</div>
			</li>
			<li>
				<h6 class="case-title">【案例】70岁奶奶重获整口牙   告别喝粥重圆美食梦 </h6>
				<div class="mb-4">
					<img src="/themes/simplebootx_mobile/Zt/myqs/imgs/case06.jpg" alt="">
				</div>
			</li>
		</ul>
		<div class="text-center mb-3"><a href="/list/108.html" class="check-more-btn">查看更多案例</a></div>
	</section>

	<footer><img src="/themes/simplebootx_mobile/Zt/multiple-deletion/imgs/footer-img.jpg" alt=""></footer>

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



	
	<script>
		$(function(){
			$('.page').val(window.location.href);
		});
		$('body').on('click', '.submit-btn', function() {	
			var name = $(".name input").val();
			var re1 = /^[\u4E00-\u9FA5]{1,6}$/; 
			if(name == null){
				alert("姓名不能为空"); 
				return false; 
			}else if(name != null){
				if (!re1.test(name)){ 
					alert("姓名格式不正确"); 
					return false; 
				}	
			}
			
	
			var phone = $(".phone input").val();
			var re2 = /^((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+(\d{8})$/;
			if(phone == null){
				alert("电话不能为空"); 
				return false; 
			}else if(phone != null){
				if (!re2.test(phone)){ 
					alert("电话格式不正确"); 
					return false; 
				}
			}
			
			var symptom = $(".symptom input").val();
			if(symptom == null){
				alert("症状不能为空");
			}
			
			var data = $('#form1').serializeArray();
			$.post('/tables/tables/add_post',data,function(result){
				//console.log(result);
				alert(result.info);
			});
		});
	</script>
	
	
</body>
</html>