<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>免费计算您的种牙价格_<?php echo ($site_name); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon" />
<link href="/themes/simplebootx_mobile/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/base.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://swt.szddkqyy.com/JS/LsJS.aspx?siteid=MTI57225838&lng=cn"></script>
	<link rel="stylesheet" href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css">
	<link href="/themes/simplebootx_mobile/Zt/plant-valuation/index.css" rel="stylesheet" type="text/css">
	<script src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js"></script>
</head>
<body>
	<div class="header d-flex justify-content-between">
	<div class="home d-flex align-items-center">
		<a href="/"></a>
	</div>
	<div class="logo d-flex align-items-center">
		<a href="/">
			<img src="/themes/simplebootx_mobile/Public/images/article_logo.png" alt="" class="img-fluid">
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
	<section class="banner">
		<img src="/themes/simplebootx_mobile/Zt/plant-valuation/imgs/banner.jpg" alt="">
	</section>
	
	<section class="container pt-3 pb-3">
		<div class="title text-center">
			<h4 class="blue font-weight-bold position-relative">种植牙费用自助计算器</h4>
		</div>
		<img class="mt-2" src="/themes/simplebootx_mobile/Zt/plant-valuation/imgs/1.jpg" />
		<p class="text-center mt-3 outnumber position-relative">目前已经有<span class="red"><?php echo ($code = mt_rand(6000,10000)); ?>人</span>参与活动</p>
		
		<p class="mt-4 mb-0">您的牙齿缺失情况？</p>
		<div class="symptom d-flex justify-content-between flex-wrap text-center">
			<div class="w-47 d-inline-block pt-2 pb-2 mr-2 mt-3 border checked" data-p="缺门牙">缺门牙</div>
			<div class="w-47 d-inline-block pt-2 pb-2 mt-3 border" data-p="缺大牙">缺大牙</div>
			<div class="w-47 d-inline-block pt-2 pb-2 mr-2 mt-3 border" data-p="多颗缺牙">多颗缺牙</div>
			<div class="w-47 d-inline-block pt-2 pb-2 mt-3 border" data-p="半口缺牙">半口缺牙</div>
			<div class="w-47 d-inline-block pt-2 pb-2 mt-3 border" data-p="全口缺牙">全口缺牙</div>
			<div class="w-47 d-inline-block pt-2 pb-2 mr-2 mt-3 border" data-p="烂牙（蛀牙）">烂牙（蛀牙）</div>
			<div class="w-47 d-inline-block pt-2 pb-2 mt-3 border" data-p="烤瓷牙失败">烤瓷牙失败</div>
			<div class="w-47 d-inline-block pt-2 pb-2 mt-3 border" data-p="其他牙齿情况">其他牙齿情况</div>
		</div>
		
		<p class="mt-4 mb-0">年龄</p>
		<div class="age d-flex justify-content-between flex-wrap text-center">
			<div class="w-47 d-inline-block pt-2 pb-2 mr-2 mt-3 border checked" data-p="25-35岁">25-35岁</div>
			<div class="w-47 d-inline-block pt-2 pb-2 mt-3 border" data-p="35-45岁">35-45岁</div>
			<div class="w-47 d-inline-block pt-2 pb-2 mr-2 mt-3 border" data-p="45-55岁">45-55岁</div>
			<div class="w-47 d-inline-block pt-2 pb-2 mt-3 border" data-p="60岁以上">60岁以上</div>
		</div>
		
		<p class="mt-4 mb-0">身体状况？</p>
		<div class="body-condition d-flex justify-content-between flex-wrap text-center">
			<div class="w-47 d-inline-block pt-2 pb-2 mr-2 mt-3 border" data-p="三高患者,">三高患者</div>
			<div class="w-47 d-inline-block pt-2 pb-2 mt-3 border" data-p="牙槽骨流失">牙槽骨流失</div>
			<div class="w-47 d-inline-block pt-2 pb-2 mr-2 mt-3 border" data-p="牙龈萎缩,">牙龈萎缩</div>
			<div class="w-47 d-inline-block pt-2 pb-2 mt-3 border" data-p="其他牙齿情况">其他牙齿情况</div>
		</div>
		
		<form>
			<div class="mt-2">
				<div>姓名<b class="red">*</b></div>
				<div><input type="text" name="data[name]" class="name w-100 pt-2 pl-2 pb-2"></div>
			</div>
			<div class="mt-2">
				<div>电话<b class="red">*</b></div>
				<div><input type="text" name="data[phone]" class="phone w-100 pt-2 pl-2 pb-2"></div>
			</div>
			<input type="hidden" name="data[symptom]" class="symptom-value" value="缺门牙" />
			<input type="hidden" name="data[age]" class="age-value" value="25-35岁" />
			<input type="hidden" name="data[etc]" class="etc-value" value="" />
			<input type="hidden" name="table_id" value="31" />
			<input type="hidden" name="page" class="page" />
			<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
		</form>
		
		<p class="text-center"><a href="javascript:;" class="submit-btn font-weight-bold text-white d-block pt-2 pb-2 mt-4">提交获取报价结果</a></p>
		
	</section>
	
	<section class="receive"><img src="/themes/simplebootx_mobile/Zt/plant-valuation/imgs/2.jpg" /></section>
	
	<section class="mb-2">
		<img src="/themes/simplebootx_mobile/Zt/plant-valuation/imgs/3.jpg" />
		<img src="/themes/simplebootx_mobile/Zt/plant-valuation/imgs/4.jpg" />
		<img src="/themes/simplebootx_mobile/Zt/plant-valuation/imgs/5.gif" />
		<img src="/themes/simplebootx_mobile/Zt/plant-valuation/imgs/6.jpg" />
		<img src="/themes/simplebootx_mobile/Zt/plant-valuation/imgs/7.jpg" />
	</section>
	
	
	<div class="copy">
	<p>CopyRight © 2017 深圳德道口腔门诊部 版权所有 
		<br/> ICP备案号：<a href="http://www.beian.miit.gov.cn" target="_blank">粤ICP备18089183号</a>
		<br/> <a target="_blank" class="d-flex justify-content-center" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44030502003611"><img src="/themes/simplebootx_mobile/Public/images/ga-icon.png" style="float:left;" />粤公网安备 44030502003611号</a>
		广审号：粤（B）广[2019]第07-22-327号
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
			<a href="javascript:swtClick();">
				<div><i class="footer-icon"></i></div>
				<div>预约挂号</div>
			</a>
		</li>
		<li class="d-inline-block">
			<a href="javascript:swtClick();">
				<div><i class="footer-icon"></i></div>
				<div>立即咨询</div>
				<i class="footer-line"></i>
			</a>
		</li>
		<li class="d-inline-block" style="width: 36%;">
			<a href="tel:400-800-6161">
				<div><i class="footer-icon"></i></div>
				<div>免费热线</div>
			</a>
		</li>
	</ul>
</div>

<div class="wrap-ripple" style="top: 40%; right: 0px;">
	<a href="javascript:void(0);" onclick="swtClick()" class="s-ripple" id="s-ripple">
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



	
	<script>
		
		var etc = '';
		var is_submit = 0;
		
		$('.symptom div').on('click', function() {
			$(this).addClass('checked');
			$(this).siblings().removeClass('checked');
			var symptom = $(this).data('p');
			$('.symptom-value').val(symptom);
		});
		
		$('.age div').on('click', function() {
			$(this).addClass('checked');
			$(this).siblings().removeClass('checked');
			var age = $(this).data('p');
			$('.age-value').val(age);
		});
		
		$('.teet-condition div').on('click', function() {
			$(this).addClass('checked');
			$(this).siblings().removeClass('checked');
		});
		
		$('.body-condition div').on('click', function() {
			$(this).addClass('checked');
			$(this).siblings().removeClass('checked');
		});
		
		$('.apply div').on('click', function() {
			$(this).addClass('checked');
			$(this).siblings().removeClass('checked');
		});
		
		$('.receive').on('click',function(){
			if(is_submit){
				alert('领取成功');
			}else{
				alert('请先填写完整资料信息');
			}
		});
		
		$(function() {
			$('.page').val(window.location.href);
			$('.submit-btn').on('click', function() {
				var name = $(".name").val();
				var re1 = /^[\u4E00-\u9FA5]{1,6}$/; 
				if(name == ''){
					alert("姓名不能为空"); 
					return false; 
				}else if(name != ''){
					if (!re1.test(name)){ 
						alert("姓名格式不正确"); 
						return false; 
					}	
				}
				
				var phone = $(".phone").val();
				var re3 = /^((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+(\d{8})$/;
				if(phone == ''){
					alert("电话不能为空"); 
					return false; 
				}else if(phone != ''){
					if (!re3.test(phone)){ 
						alert("电话格式不正确"); 
						return false; 
					}
				}
				
				var etc = $('.teet-condition .checked').data('p') + $('.body-condition .checked').data('p') + $('.apply .checked').data('p');
				$('.etc-value').val(etc);
				
				var data = $('form').serializeArray();
				$.post('/tables/tables/add_post',data,function(result){
					//console.log(result);
					alert(result.info);
					is_submit = 1;
				});
			});
		})
		
		
		
		
	</script>
	
</body>
</html>