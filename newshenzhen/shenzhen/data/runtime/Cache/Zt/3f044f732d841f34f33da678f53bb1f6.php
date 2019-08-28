<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>缺牙市民公益普查_<?php echo ($site_name); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon" />
<link href="/themes/simplebootx_mobile/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/base.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://swt.szddkqyy.com/JS/LsJS.aspx?siteid=MTI57225838&lng=cn"></script>
	<link rel="stylesheet" href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css">
	<link href="/themes/simplebootx_mobile/Zt/welfare/index.css" rel="stylesheet" type="text/css">
	<script src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js"></script>
</head>
<body>

	<section class="position-relative">
		<img src="/themes/simplebootx_mobile/Zt/welfare/imgs/1.jpg" alt="">
		<h5 class="text-center mt-2 mb-0 text-white p-3 font-weight-bold">领取 ——智能种牙方案1份</h5>
	</section>
	
	<section class="container pt-3 pb-3 content-form">
		<?php $count = sp_count_tables_data(47); ?>
		<h6 class="text-center position-relative">目前已经有<b class="red d-inline-block"><?php echo ($count); ?></b>人参与活动</h6>
		<form action="">
			<p class="mb-2">牙齿症状<b class="red">*</b></p>
			<div class="symptom">
				<span class="d-inline-block checked text-center p-2 w-45" data-p="缺门牙">缺门牙</span>
				<span class="d-inline-block text-center p-2 w-45" data-p="缺大牙">缺大牙</span>
				<span class="d-inline-block text-center p-2 w-45" data-p="多颗缺牙">多颗缺牙</span>
				<span class="d-inline-block text-center p-2 mr-3 w-45 mt-2" data-p="半口/全口无牙">半口/全口无牙</span>
				<span class="d-inline-block text-center p-2 w-45 mt-2" data-p="烤瓷牙失败">烤瓷牙失败</span>
				<span class="d-inline-block text-center p-2 w-45 mt-2" data-p="其他牙齿情况">其他牙齿情况</span>
			</div>
			<p class="mb-2 mt-3">年龄：<b class="red">*</b></p>
			<div class="age">
				<span class="d-inline-block checked text-center p-2" data-p="30-40岁">30-40岁</span>
				<span class="d-inline-block text-center p-2" data-p="40-50岁">40-50岁</span>
				<span class="d-inline-block text-center p-2" data-p="60岁以上">60岁以上</span>
			</div>
			<input type="hidden" class="symptom-value" name="data[symptom]" value="缺门牙" />
			<input type="hidden" class="age-value" name="data[age]" value="20岁以下" />
			<div class="mt-2">
				<div class="mb-2">姓名:</div>
				<div><input type="text" name="data[name]" class="name w-100 pt-2 pl-2 pb-2"></div>
			</div>
			<div class="mt-2">
				<div class="mb-2">电话:</div>
				<div><input type="text" name="data[phone]" class="phone w-100 pt-2 pl-2 pb-2"></div>
			</div>
			<input type="hidden" name="table_id" value="48" />
			<input type="hidden" name="page" class="page" />
			<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
		</form>
		<p class="text-center"><a href="javascript:;" class="submit-btn font-weight-bold text-white d-block pt-2 pb-2 mt-4 yel">提交获取种牙方案</a></p>
	</section>

	<section><img src="/themes/simplebootx_mobile/Zt/welfare/imgs/2.jpg" alt=""></section>
	<section><img src="/themes/simplebootx_mobile/Zt/welfare/imgs/3.jpg" alt=""></section>
	<section><img src="/themes/simplebootx_mobile/Zt/welfare/imgs/4.gif" alt=""></section>
	<section><img src="/themes/simplebootx_mobile/Zt/welfare/imgs/5.jpg" alt=""></section>
	<section><img src="/themes/simplebootx_mobile/Zt/welfare/imgs/6.jpg" alt=""></section>
	<section class="mb-3"><img src="/themes/simplebootx_mobile/Zt/welfare/imgs/7.jpg" alt=""></section>
	
	<div class="copy">
		<p>CopyRight © 2017 深圳德道口腔门诊部 版权所有 
			<br/> ICP备案号：<a href="http://www.miitbeian.gov.cn" target="_blank">粤ICP备18089183号</a>
			<br/> <a target="_blank" class="d-flex justify-content-center" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44030502003611"><img src="/themes/simplebootx_mobile/Public/images/ga-icon.png" style="float:left;" />粤公网安备 44030502003611号</a>
			广审号：粤（B）广[2018]第08-19-214号
		</p>
	</div>
	
</body>
<script>
	
	$(function() {
		
		$('.symptom span').on('click',function(){
			$(this).siblings().removeClass('checked').end().addClass('checked');
			var symptom = $(this).data('p');
			$('.symptom-value').val(symptom);
		});
		
		$('.age span').on('click',function(){
			$(this).siblings().removeClass('checked').end().addClass('checked');
			var age = $(this).data('p');
			$('.age-value').val(age);
		});
		
		$('.etc span').on('click',function(){
			$(this).siblings().removeClass('checked').end().addClass('checked');
			var etc = $(this).data('p');
			$('.etc-value').val(etc);
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
				//console.log(result);
				alert(result.info);
			});
		});
	})
</script>
</html>