<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>周三花粉福利日_<?php echo ($site_name); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon" />
<link href="/themes/simplebootx_mobile/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/base.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://swt.szddkqyy.com/JS/LsJS.aspx?siteid=MTI57225838&lng=cn"></script>
	<link href="/themes/simplebootx_mobile/Zt/20190708/index.css" rel="stylesheet" type="text/css">
	<script src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js"></script>
</head>
<body>

	<section class="gotoform"><img src="/themes/simplebootx_mobile/Zt/20190708/imgs/1.jpg" /></section>
	
	<section class="">
		<form action="" class="container mt-3 mb-4">
			<p class="mb-2">牙齿状况</p>
			<div class="symptom text-center mb-3">
				<font class="d-inline-block pt-2 pb-2 mr-1 mb-2 active">有黑点</font>
				<font class="d-inline-block pt-2 pb-2 mr-1 mb-2 ">有虫洞</font>
				<font class="d-inline-block pt-2 pb-2 mr-1 mb-2 ">残留牙根</font>
				<font class="d-inline-block pt-2 pb-2 mr-1 mb-2 ">牙齿残缺</font>
				<font class="d-inline-block pt-2 pb-2 mr-1 mb-2 ">牙齿缺失</font>
				<font class="d-inline-block pt-2 pb-2 mr-1 mb-2 ">其他牙齿情况</font>
				<input type="hidden" class="symptom-value" name="data[symptom]" value="有黑点">
			</div>
			<input type="text" class="w-100 pt-3 pb-3 pl-2 name" name="data[name]" placeholder="姓名">
			<input type="text" class="w-100 pt-3 pb-3 pl-2 mt-3 phone"  name="data[phone]" placeholder="电话">
			<input type="hidden" name="table_id" value="54" />
			<input type="hidden" name="page" class="page" />
			<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
		</form>
		<p class="text-center pt-2 mb-3">
			<a href="javascript:;" class="text-center text-white w-75 submit-btn pt-2 pb-2 d-inline-block">立即领取</a>
			<span class="grey d-block"><span class="red">*</span>自领取成功后，60天内使用此优惠券</span>
		</p>
		
		<div class="">
			<img src="/themes/simplebootx_mobile/Zt/20190708/imgs/2.jpg"/>
			<img src="/themes/simplebootx_mobile/Zt/20190708/imgs/3.jpg"/>
			<img src="/themes/simplebootx_mobile/Zt/20190708/imgs/4.jpg"/>
			<img src="/themes/simplebootx_mobile/Zt/20190708/imgs/5.jpg"/>
			<img src="/themes/simplebootx_mobile/Zt/20190708/imgs/6.jpg"/>
		</div>

	</section>

	<div class="copy">
		<p>CopyRight © 2017 深圳德道口腔门诊部 版权所有 
			<br/> ICP备案号：<a href="http://www.miitbeian.gov.cn" target="_blank">粤ICP备18089183号</a>
			<br/> <a target="_blank" class="d-flex justify-content-center" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44030502003611"><img src="/themes/simplebootx_mobile/Public/images/ga-icon.png" style="float:left;" />粤公网安备 44030502003611号</a>
			广审号：粤（B）广[2019]第07-22-327号
		</p>
		<img src="/themes/simplebootx_mobile/Zt/20190708/imgs/7.jpg"/>
	</div>
</body>
<script type="text/javascript">
	$(function() {

		$('.symptom font').on('click', function() {
			$(this).addClass('active').siblings().removeClass('active');
			$('.symptom input').val($(this).text());
		});

		$(".gotoform").click(function(){
			$("html,body").animate({scrollTop:300}, 500);
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
			var re2 = /^((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+(\d{8})$/;
			if(phone == ''){
				alert("电话不能为空"); 
				return false; 
			}else if(phone != ''){
				if (!re2.test(phone)){ 
					alert("电话格式不正确"); 
					return false; 
				}
			}
			
			
			var data = $('form').serializeArray();
			$.post('/tables/tables/add_post',data,function(result){
				alert(result.info);
			});
		});
	})
</script>
</html>