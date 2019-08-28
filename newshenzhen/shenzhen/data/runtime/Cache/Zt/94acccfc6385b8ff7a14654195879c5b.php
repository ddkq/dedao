<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>德国麦哲伦AI数字化体验月_<?php echo ($site_name); ?></title>
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
	<link href="/themes/simplebootx_mobile/Zt/20190212/index.css" rel="stylesheet" type="text/css">
	<script src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js"></script>
	<script src="/themes/simplebootx_mobile/Public/js/swiper.min.js"></script>
</head>
<body>

	<section class=""><img src="/themes/simplebootx_mobile/Zt/20190212/imgs/1.jpg" alt=""></section>

	<section class="container">
		<form action="" class="mt-3 mb-4">
			<div class="symptom">
				<span class="d-inline-block">申请项目：</span>
				<font class="d-inline-block pt-2 pb-2 mr-2 mb-2 active">缺牙</font>
				<font class="d-inline-block pt-2 pb-2 mr-2 mb-2 ">牙齿松动</font>
				<font class="d-inline-block pt-2 pb-2 mr-2 mb-2 ">其他情况</font>
				<input type="hidden" class="symptom-value" name="data[symptom]" value="缺牙">
			</div>
			<div>
				<span class="d-inline-block"> 申  请   人 ：</span>
				<input type="text" class="w-75 pt-2 pb-2 pl-2 name" name="data[name]" style="margin-left: 0.15rem;">
			</div>
			<div class="mt-2">
				<span class="d-inline-block">申请电话：</span>
				<input type="text" class="w-75 pt-2 pb-2 pl-2 phone" name="data[phone]">
			</div>
			<input type="hidden" name="table_id" value="53" />
			<input type="hidden" name="page" class="page" />
			<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
		</form>
		<p class="text-center pt-2"><a href="javascript:;" class="text-center text-white w-75 submit-btn pt-2 pb-2">申请体验补贴</a></p>
		
		<p class="text-center mt-2 mb-0">—————&nbsp;&nbsp;&nbsp;最新报名名单&nbsp;&nbsp;&nbsp;—————</p>
		<div class="name-list pt-2 pb-2">
			<div class="swiper-container data-list swiper-no-swiping" style="height: 200px;">
				<div class="swiper-wrapper">
					
				</div>
			</div>
		</div>
	</section>

	<div class="mt-4">
		<img src="/themes/simplebootx_mobile/Zt/20190212/imgs/2.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20190212/imgs/3.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20190212/imgs/4.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20190212/imgs/5.jpg" alt="">
	</div>
	<div class="swiper-container swiper01" style="background: #fffded;">
		<div class="swiper-wrapper">
			<div class="swiper-slide"><img src="/themes/simplebootx_mobile/Zt/20190212/imgs/5-1.png" alt=""></div>
			<div class="swiper-slide"><img src="/themes/simplebootx_mobile/Zt/20190212/imgs/5-2.png" alt=""></div>
			<div class="swiper-slide"><img src="/themes/simplebootx_mobile/Zt/20190212/imgs/5-3.png" alt=""></div>
			<div class="swiper-slide"><img src="/themes/simplebootx_mobile/Zt/20190212/imgs/5-4.png" alt=""></div>
		</div>
	</div>
	<div class="swiper-pagination1 text-center" style="background: #fffded;"></div>
	
	<div class="mb-3"><img src="/themes/simplebootx_mobile/Zt/20190212/imgs/6.jpg" alt=""></div>
	
	<div class="copy">
		<p>CopyRight © 2017 深圳德道口腔门诊部 版权所有 
			<br/> ICP备案号：<a href="http://www.miitbeian.gov.cn" target="_blank">粤ICP备18089183号</a>
			<br/> <a target="_blank" class="d-flex justify-content-center" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44030502003611"><img src="/themes/simplebootx_mobile/Public/images/ga-icon.png" style="float:left;" />粤公网安备 44030502003611号</a>
			广审号：粤（B）广[2019]第07-22-327号
		</p>
	</div>
</body>
<script>
	
	$('.symptom font').on('click', function() {
		$(this).addClass('active').siblings().removeClass('active');
		$('.symptom input').val($(this).text());
	});
	
	$(function() {
		var mySwiper = new Swiper('.data-list',{
		    autoplay: true,
		    observer: true,
		    loop: true,
		    direction : 'vertical',
		    height: 40,
	  	});
	  	
	  	var mySwiper = new Swiper('.swiper01', {
			autoplay: true,//可选选项，自动滑动
			loop: true,
			pagination: {
				el: '.swiper-pagination1',
			},
		})

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