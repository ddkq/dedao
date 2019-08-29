<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>5分钟种好一颗牙_<?php echo ($site_name); ?></title>
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
	<link href="/themes/simplebootx_mobile/Zt/20181214/index.css" rel="stylesheet" type="text/css">
	<script src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js"></script>
</head>
<body>

	<section class="">
		<img src="/themes/simplebootx_mobile/Zt/20181214/imgs/1-2.jpg" alt="">
	</section>
	
	<section class="container">
		<form action="" class="mb-4">
			<p class="mt-3 mb-2">牙齿情况：</p>
			<p class="d-flex flex-wrap  text-center condition">
				<span class="d-inline-block pt-2 pb-2 mr-2 mb-2 active">缺大牙</span>
				<span class="d-inline-block pt-2 pb-2 mr-2 mb-2">缺门牙</span>
				<span class="d-inline-block pt-2 pb-2 mr-2 mb-2">多颗缺牙</span>
				<span class="d-inline-block pt-2 pb-2 mr-2 mb-2">半口缺牙</span>
				<span class="d-inline-block pt-2 pb-2 mr-2 mb-2">全口缺牙</span>
				<span class="d-inline-block pt-2 pb-2 mr-2 mb-2">牙齿其他情况</span>
				<input type="hidden" name="data[symptom]" value="缺大牙">
			</p>
			<p class="mb-2">我的年龄：</p>
			<p class="d-flex age text-center">
				<span class="d-inline-block pt-2 pb-2 mr-2 active">30-40岁</span>
				<span class="d-inline-block pt-2 pb-2 mr-2">40-50岁</span>
				<span class="d-inline-block pt-2 pb-2 mr-2">50-60岁</span>
				<span class="d-inline-block pt-2 pb-2">60岁以上</span>
				<input type="hidden" name="data[age]" value="30-40岁">
			</p>
			<p class="mt-2 mb-0">电话：</p>
			<input type="text" class="w-100 pt-2 pb-2 mt-2 phone" name="data[phone]">
			<p class="mt-2 mb-0">姓名：</p>
			<input type="text" class="w-100 pt-2 pb-2 name" name="data[name]">
			<input type="hidden" name="table_id" value="31" />
			<input type="hidden" name="page" class="page" />
			<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
		</form>
		<p class="text-center pt-2"><a href="javascript:;" class="text-center text-white d-block submit-btn pt-3 pb-3 pr-4 pl-4">我要种牙</a></p>
		
	</section>

	<div class="mt-2">
		<img src="/themes/simplebootx_mobile/Zt/20181214/imgs/2.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20181214/imgs/3.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20181214/imgs/4.jpg" alt="">
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