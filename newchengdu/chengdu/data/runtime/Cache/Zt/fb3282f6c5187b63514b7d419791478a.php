<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>2019中老年口腔健康中国行·成都站_<?php echo ($site_name); ?></title>
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
	<link href="/themes/simplebootx_mobile/Zt/20190221/index.css" rel="stylesheet" type="text/css">
	<script src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js"></script>
	<script>
        window._agl = window._agl || [];
        (function () {
            _agl.push(
                ['production', '_f7L2XwGXjyszb4d1e2oxPybgD']
            );
            (function () {
                var agl = document.createElement('script');
                agl.type ='text/javascript';
                agl.async = true;
                agl.src = 'https://fxgate.baidu.com/angelia/fcagl.js?production=_f7L2XwGXjyszb4d1e2oxPybgD';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(agl, s);
            })();
        })();
    </script>
</head>
<body>

	<section class=""><img src="/themes/simplebootx_mobile/Zt/20190221/imgs/1.jpg" alt=""></section>

	<section class="container">
		<form action="" class="mt-3 mb-3">
			<p class="mb-1">牙齿状况：</p>
			<div class="pl-2 mb-3 porject">
				<span class="d-inline-block pt-2 pb-2 mr-2 mb-2 text-center active">缺门牙</span>
				<span class="d-inline-block pt-2 pb-2 mr-2 mb-2 text-center">缺大牙</span>
				<span class="d-inline-block pt-2 pb-2 mr-2 mb-2 text-center">半口缺牙</span>
				<span class="d-inline-block pt-2 pb-2 mr-2 mb-2 text-center">全口缺牙</span>
				<span class="d-inline-block pt-2 pb-2 mr-2 mb-2 text-center">佩戴假牙/义齿</span>
				<input type="hidden" name="data[symptom]" value="缺门牙">
			</div>
			<p class="mb-1">申请人电话：</p>
			<input type="text" class="pt-1 pl-2 pb-1 w-100 phone" name="data[phone]">
			<p class="mb-1">申请人姓名：</p>
			<input type="text" class="pt-1 pl-2 pb-1 w-100 name" name="data[name]">
			<input type="hidden" name="table_id" value="36" />
			<input type="hidden" name="page" class="page" />
			<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
		</form>
		<p class="text-center pt-2"><a href="javascript:;" class="text-center text-white w-100 submit-btn pt-2 pb-2">获取免费名额</a></p>
	</section> 
	
	<div class="mt-3 mb-2">
		<img src="/themes/simplebootx_mobile/Zt/20190221/imgs/2.jpg" alt="">
		
		<div class="pt-2 pl-2">
			<p class="text-center mb-2">-----------目前已有<span class="red font-weight-bold"><?php echo ($code = mt_rand(200,500)); ?></span>人领取名额-----------</p>
		</div>
		
		<img src="/themes/simplebootx_mobile/Zt/20190221/imgs/3.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20190221/imgs/4.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20190221/imgs/5.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20190221/imgs/6.gif" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20190221/imgs/7.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20190221/imgs/8.jpg" alt="">
	</div>

	
	
	<div class="copy">
		<p>CopyRight © 2017 成都青羊德道口腔医院 版权所有 
			<br/> ICP备案号：<a href="http://www.miitbeian.gov.cn" target="_blank">蜀ICP备18017345号-1</a>
			<br/> <a target="_blank" class="d-flex justify-content-center" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=51010502010725"><img src="/themes/simplebootx_mobile/Public/images/ga-icon.png" style="float:left;" />川公网安备 51010502010725号</a>
			广审号：（成青） 医广【2019】第03-12-510105020号
		</p>
	</div>
</body>
<script>
	$(function() {
		
		$('.porject span').on('click', function() {
			$(this).addClass('active').siblings('span').removeClass('active');
			$('.porject input').val($(this).text());
		})

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
			
			var data = $('form').serializeArray();
			$.post('/tables/tables/add_post',data,function(result){
				//console.log(result);
				window._agl && window._agl.push(['track', ['success', {t: 3}]]);
				alert(result.info);
			});
		});
	})
</script>
</html>