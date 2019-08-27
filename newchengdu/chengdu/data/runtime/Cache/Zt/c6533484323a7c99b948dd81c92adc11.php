<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>院长学术案例征集_<?php echo ($site_name); ?></title>
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
	<link rel="stylesheet" href="/themes/simplebootx_mobile/Public/css/swiper.min.css">
	<link href="/themes/simplebootx_mobile/Zt/20181226/index.css" rel="stylesheet" type="text/css">
	<script src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js"></script>
	<script src="/themes/simplebootx_mobile/Public/js/swiper.min.js"></script>
</head>
<body>

	<section class=""><img src="/themes/simplebootx_mobile/Zt/20181226/imgs/1.jpg" alt=""></section>

	<section class="container">
		<form action="" class="mb-4 mt-4">
			<p class="mb-2">牙齿症状：</p>
			<span class="d-inline-block w-30 ml-2">
				<input type="radio" class="mr-1" name="data[symptom]" value="门牙缺失" id="radio-1" checked="checked">
				<label for="radio-1">门牙缺失</label>
			</span>
			<span class="d-inline-block w-30 ml-2">
				<input type="radio" class="mr-1" name="data[symptom]" value="大牙缺失" id="radio-2">
				<label for="radio-2">大牙缺失</label>
			</span>
			<span class="d-inline-block w-30 ml-2">
				<input type="radio" class="mr-1" name="data[symptom]" value="多颗牙缺失" id="radio-3">
				<label for="radio-3">多颗牙缺失</label>
			</span>
			<span class="d-inline-block w-30 ml-2">
				<input type="radio" class="mr-1" name="data[symptom]" value="半口缺牙" id="radio-4">
				<label for="radio-4">半口缺牙</label>
			</span>
			<span class="d-inline-block w-30 ml-2">
				<input type="radio" class="mr-1" name="data[symptom]" value="全口缺失" id="radio-5">
				<label for="radio-5">全口缺失</label>
			</span>
			<span class="d-inline-block ml-2">
				<input type="radio" class="mr-1" name="data[symptom]" value="烤瓷牙失败" id="radio-6">
				<label for="radio-6">烤瓷牙失败</label>
			</span>
			<span class="d-inline-block ml-2">
				<input type="radio" class="mr-1" name="data[symptom]" value="其他牙齿情况" id="radio-7">
				<label for="radio-7">其他牙齿情况</label>
			</span>
			<p class="mb-2">年龄：</p>
			<span class="d-inline-block w-30 ml-2">
				<input type="radio" class="mr-1" name="data[age]" value="30岁以下" id="radio-7" checked="checked">
				<label for="radio-7">30岁以下</label>
			</span>
			<span class="d-inline-block w-30 ml-2">
				<input type="radio" class="mr-1" name="data[age]" value="40-50岁" id="radio-8">
				<label for="radio-8">40-50岁</label>
			</span><br />
			<span class="d-inline-block w-30 ml-2">
				<input type="radio" class="mr-1" name="data[age]" value="50-60岁" id="radio-9">
				<label for="radio-9">50-60岁</label>
			</span>
			<span class="d-inline-block w-30 ml-3">
				<input type="radio" class="mr-1" name="data[age]" value="70岁以上" id="radio-10">
				<label for="radio-10">70岁以上</label>
			</span>
			
			
			<input type="text" class="w-100 pt-2 pb-2 name" placeholder="姓名：" name="data[name]">
			<input type="text" class="w-100 pt-2 pb-2 mt-2 phone"  placeholder="电话：" name="data[phone]">
			<input type="hidden" name="table_id" value="31" />
			<input type="hidden" name="page" class="page" />
			<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
		</form>
		<p class="text-center pt-2"><a href="javascript:;" class="text-center d-block text-white w-75 submit-btn m-auto pt-2 pb-2 pr-5 pl-5">提交</a></p>
		
		<h6 class="text-center">—————&nbsp;&nbsp;&nbsp;已有<span class="red"><?php echo ($code = mt_rand(300,500)); ?>位</span>市民申请&nbsp;&nbsp;&nbsp;—————</h6>
		<div class="name-list pt-2 pb-2">
			<div class="swiper-container swiper-no-swiping" style="height: 200px;">
				<div class="swiper-wrapper">
					
				</div>
			</div>
		</div>
	</section>

	<div class="mt-2">
		<img src="/themes/simplebootx_mobile/Zt/20181226/imgs/2.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20181226/imgs/3.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20181226/imgs/4.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20181226/imgs/5.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20181226/imgs/6.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20181226/imgs/7.jpg" alt="">
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
		var mySwiper = new Swiper('.swiper-container',{
		    autoplay: true,
		    observer: true,
		    loop: true,
		    direction : 'vertical',
		    height: 40,
	  	});


		$.post('/api/form/formdata', {}, function(data) {
			// console.log(data)
			var html = '';
			for(var i = 0; i < data.length; i ++) {
				html += '<div class="swiper-slide text-center">'+
							'<span class="d-inline-block ml-3">'+ data[i].name +'</span>'+
							'<span class="d-inline-block ml-3">'+ data[i].phone +'</span>'+
							'<span class="d-inline-block ml-3">'+ data[i].time +'</span>'+
						'</div>';
			}
			$('.name-list .swiper-wrapper').html(html);
		});

		$('.age span').on('click', function() {
			$(this).addClass('active').siblings().removeClass('active');
			$('.age input').val($(this).text());
		});

		$('.condition span').on('click', function() {
			$(this).addClass('active').siblings().removeClass('active');
			$('.condition input').val($(this).text());
		});

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
				alert(result.info);
			});
		});
	})
</script>
</html>