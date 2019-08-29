<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>0元定制种牙方案_<?php echo ($site_name); ?></title>
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
	<link href="/themes/simplebootx_mobile/Zt/seed1-tooth/index.css" rel="stylesheet" type="text/css">
	<script src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js"></script>
</head>
<body>
	<section class="banner"><img src="/themes/simplebootx_mobile/Zt/seed1-tooth/imgs/banner.jpg" alt=""></section>

	<section class="container pt-3 pb-3 content-form">
		<p class="text-center outnumber position-relative">目前已经有<span class="red"><?php echo ($code = mt_rand(6000,10000)); ?>人</span>参与活动</p>
		<form action="">
			<p>我的牙齿状况：</p>
			<span class="d-inline-block w-31">
				<input type="radio" class="mr-1" name="data[symptom]" value="缺大牙" id="radio-1" checked="checked">
				<label for="radio-1">缺大牙</label>
			</span>
			<span class="d-inline-block w-31">
				<input type="radio" class="mr-1" name="data[symptom]" value="缺门牙" id="radio-2">
				<label for="radio-2">缺门牙</label>
			</span>
			<span class="d-inline-block w-31">
				<input type="radio" class="mr-1" name="data[symptom]" value="多颗缺牙" id="radio-3">
				<label for="radio-3">多颗缺牙</label>
			</span>
			<span class="d-inline-block w-31">
				<input type="radio" class="mr-1" name="data[symptom]" value="半口无牙" id="radio-4">
				<label for="radio-4">半口无牙</label>
			</span>
			<span class="d-inline-block w-31">
				<input type="radio" class="mr-1" name="data[symptom]" value="全口无牙" id="radio-5">
				<label for="radio-5">全口无牙</label>
			</span>
			<span class="d-inline-block w-31">
				<input type="radio" class="mr-1" name="data[symptom]" value="陶瓷牙失败" id="radio-6">
				<label for="radio-6">陶瓷牙失败</label>
			</span>
			<span class="d-inline-block w-40">
				<input type="radio" class="mr-1" name="data[symptom]" value="蛀牙（补牙）" id="radio-7">
				<label for="radio-7">蛀牙（补牙）</label>
			</span>
			<span class="d-inline-block w-50">
				<input type="radio" class="mr-1" name="data[symptom]" value="其他牙齿情况" id="radio-8">
				<label for="radio-8">其他牙齿情况</label>
			</span>
			<div class="mt-2">
				<div>姓名<span class="red">*</span></div>
				<div><input type="text" name="data[name]" class="name w-100 pt-2 pb-2"></div>
			</div>
			<div class="mt-2">
				<div>电话<span class="red">*</span></div>
				<div><input type="text" name="data[phone]" class="phone w-100 pt-2 pb-2"></div>
			</div>
			<input type="hidden" name="table_id" value="31" />
			<input type="hidden" name="page" class="page" />
			<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
		</form>
		<p class="text-center"><a href="javascript:;" class="submit-btn d-block pt-3 pb-3 mt-4 text-white">一键提交&nbsp;&nbsp;&nbsp;免费领取</a></p>
	</section>

	<section class="position-relative">
		<img src="/themes/simplebootx_mobile/Zt/seed-tooth/imgs/content.jpg" alt="">
		<a href="javascript:;" class="d-block position-absolute p-5 m-auto content-btn"></a>
	</section>

	<section><img src="/themes/simplebootx_mobile/Zt/seed-tooth/imgs/footer.jpg" alt=""></section>
	<div class="copy mt-2"><p>CopyRight © 2017 成都德道口腔医院 版权所有 <br> ICP备案号：<a href="http://www.miitbeian.gov.cn" target="_blank">蜀ICP备18017345号-1</a> </p></div>
</body>
<script>
	$(function() {
		$('.content-btn').on('click', function() {
			$("html,body").animate({scrollTop: 300}, 250);
		})
		$('.page').val(window.location.href);
		$('.submit-btn').on('click', function() {
			var name = $(".name").val();
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
			
			var phone = $(".phone").val();
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
			
			var data = $('form').serializeArray();
			$.post('/tables/tables/add_post',data,function(result){
				//console.log(result);
				alert(result.info);
			});
		});
	})
</script>
</html>