<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>10分钟预知效果，看看矫牙后的你，到底有多美_<?php echo ($site_name); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon" />
<link href="/themes/simplebootx_mobile/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/base.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://swt.szddkqyy.com/JS/LsJS.aspx?siteid=MTI57225838&lng=cn"></script>
	<link rel="stylesheet" href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css">
	<link rel="stylesheet" href="/themes/simplebootx_mobile/Public/css/swiper.min.css">
	<link href="/themes/simplebootx_mobile/Zt/20181211/index.css" rel="stylesheet" type="text/css">
	<script src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js"></script>
	<script src="/themes/simplebootx_mobile/Public/js/swiper.min.js"></script>
</head>
<body>

	<section class=""><img src="/themes/simplebootx_mobile/Zt/20181211/imgs/1.jpg" alt=""></section>

	<section class="container">
		<h2 class="date text-center">
			<span class="day"></span>天
			<span class="hour"></span>时
			<span class="min"></span>分
			<span class="sec"></span>秒
		</h2>
		<p class="text-center">———目前已经有<?php echo ($code = mt_rand(50,100)); ?>人预测效果———</p>
		<form action="" class="mb-4">
			<input type="text" class="w-100 pt-2 pb-2 name" placeholder="姓名：" name="data[name]">
			<input type="text" class="w-100 pt-2 pb-2 mt-2 phone"  placeholder="电话：" name="data[phone]">
			<input type="hidden" name="table_id" value="43" />
			<input type="hidden" name="page" class="page" />
			<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
		</form>
		<p class="text-center pt-2"><a href="javascript:;" class="text-center text-white w-75 submit-btn pt-2 pb-2 pr-5 pl-5">立即抢占矫牙预测名额</a></p>
		<div class="name-list pt-2 pb-2">
			<div class="swiper-container swiper-no-swiping" style="height: 200px;">
				<div class="swiper-wrapper">
					
				</div>
			</div>
		</div>
	</section>

	<div class="mt-2">
		<img src="/themes/simplebootx_mobile/Zt/20181211/imgs/2.jpg" alt="">
		<img class="mt-3" src="/themes/simplebootx_mobile/Zt/20181211/imgs/3.jpg" alt="">
		<div class="container bg-pink text-center">
			<img src="/themes/simplebootx_mobile/Zt/20181211/imgs/gif.gif" alt="">
		</div>
		<img class="mt-3" src="/themes/simplebootx_mobile/Zt/20181211/imgs/4.jpg" alt="">
		<img class="mb-3" src="/themes/simplebootx_mobile/Zt/20181211/imgs/5.jpg" alt="">
	</div>
	
	<div class="copy">
		<p>CopyRight © 2017 深圳德道口腔门诊部 版权所有 
			<br/> ICP备案号：<a href="http://www.miitbeian.gov.cn" target="_blank">粤ICP备18089183号</a>
			<br/> <a target="_blank" class="d-flex justify-content-center" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44030502003611"><img src="/themes/simplebootx_mobile/Public/images/ga-icon.png" style="float:left;" />粤公网安备 44030502003611号</a>
			广审号：粤（B）广[2019]第07-22-327号
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

		var date = new Date();
		var day = date.getDate();
		var hour = date.getHours();
		var min = date.getMinutes();
		var sec = date.getSeconds();
		var reciprocalDay = 31 - day;
		var reciprocalHour = 23 - hour;
		var reciprocalMin = 59 - min;
		var reciprocalSec = 59 - sec;
		$('.day').html(reciprocalDay);
		$('.hour').html(reciprocalHour);
		$('.min').html(reciprocalMin);
		$('.sec').html(reciprocalSec);

		setInterval(function() {
			reciprocalSec--;
			reciprocalSec == -1 ? (reciprocalSec = 59) | (reciprocalMin--) : '';
			reciprocalMin == -1 ? (reciprocalMin = 59) | (reciprocalHour--) : '';
			reciprocalHour == -1 ? (reciprocalHour = 23) | (reciprocalDay--) : '';
			$('.sec').html(reciprocalSec);
			$('.min').html(reciprocalMin);
			$('.hour').html(reciprocalHour);
			$('.day').html(reciprocalDay);
		}, 1000);

		$.post('/api/form/formdata', {}, function(data) {
			// console.log(data)
			var html = '';
			for(var i = 0; i < data.length; i ++) {
				html += '<div class="swiper-slide text-center">'+
							'<i class="icon d-inline-block"></i>'+
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