<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
	<meta name="description" content="<?php echo ($site_seo_description); ?>" />
	<meta name="format-detection" content="telephone=no" />
	<title>征集2018名缺牙市民_<?php echo ($site_name); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon" />
<link href="/themes/simplebootx_mobile/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/base.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://swt.szddkqyy.com/JS/LsJS.aspx?siteid=MTI57225838&lng=cn"></script>
	<link rel="stylesheet" href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css">
	<link href="/themes/simplebootx_mobile/Zt/agomphiasis/index.css" rel="stylesheet" type="text/css">
</head>
<body>
	<section><img src="/themes/simplebootx_mobile/Zt/agomphiasis/imgs/banner.jpg" alt=""></section>

	<section class="content-box-1 mt-3">
		<div class="container">
			<form id="form1" method="post" enctype="multipart/form-data">
				<input type="hidden" name="table_id" value="28" />
				<input type="hidden" name="page" class="page" />
				<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
				<h5 class="font-weight-bold">您的年龄</h5>
				<p class="age">
					<span><input type="radio" checked="checked" name="data[age]" value="20-30岁">20-30岁</span>
					<span><input type="radio" name="data[age]" value="30-40岁">30-40岁</span>
					<span><input type="radio" name="data[age]" value="40-60岁">40-60岁</span>
					<span><input type="radio" name="data[age]" value="60岁以上">60岁以上</span>
				</p>
				<h5 class="font-weight-bold">牙齿症状</h5>
				<p class="symptom">
					<span><input type="radio" name="data[symptom]" value="缺门牙" checked="checked">缺门牙</span>
					<span class="ml-2"><input type="radio" name="data[symptom]" value="多颗缺牙">多颗缺牙</span>
					<span class="ml-2"><input type="radio" name="data[symptom]" value="全口无牙">全口无牙</span>
					<span class="ml-2"><input type="radio" name="data[symptom]" value="烤瓷牙失败">烤瓷牙失败</span><br/>
					<span><input type="radio" name="data[symptom]" value="缺大牙">缺大牙</span>
					<span class="ml-2"><input type="radio" name="data[symptom]" value="半口缺牙">半口缺牙</span>
					<span class="ml-2"><input type="radio" name="data[symptom]" value="烂牙（蛀牙）">烂牙（蛀牙）</span>
					<span class="ml-2"><input type="radio" name="data[symptom]" value="其他牙齿情况">其他</span>
				</p>
				<p class="name">
					<input type="text" placeholder="输入您的姓名" name="data[name]" class="w-100 p-2 input-name">
				</p>
				<p class="phone">
					<input type="text" placeholder="输入手机号获取种植方案" name="data[phone]" class="w-100 p-2 input-phone">
				</p>
				<p class="submit-btn mt-4"><a href="javascript:;" class="d-block text-white text-center p-2">提交申请</a></p>
			</form>
		</div>
	</section>

	<section class="content-box-2 mt-3">
		<div class="container">
			<h3 class="content-title text-center text-white">缺牙危害须重视</h3>
			<p>有许多人认为自己口腔里缺少一两个牙齿没有什么问题，照样能吃东西，殊不知，长期缺失牙齿也会对我们的口腔及身体产生严重危害。</p>
		</div>
		<div><img src="/themes/simplebootx_mobile/Zt/agomphiasis/imgs/4.gif" alt=""></div>
		<div class="mt-3 mb-4 container"><img src="/themes/simplebootx_mobile/Zt/agomphiasis/imgs/4-1.jpg" alt=""></div>
	</section>

	<section class="content-box-3">
		<div class="container">
			<h3 class="content-title text-center text-white mb-3">专业种牙 我选德道口腔</h3>
		</div>
		<div><img src="/themes/simplebootx_mobile/Zt/agomphiasis/imgs/footer.jpg" alt=""></div>
	</section>
	
	<div class="copy">
		<p>CopyRight © 2017 深圳德道口腔门诊部 版权所有 
			<br/> ICP备案号：<a href="http://www.miitbeian.gov.cn" target="_blank">粤ICP备18089183号</a>
			<br/> <a target="_blank" class="d-flex justify-content-center" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44030502003611"><img src="/themes/simplebootx_mobile/Public/images/ga-icon.png" style="float:left;" />粤公网安备 44030502003611号</a>
			广审号：粤（B）广[2019]第07-22-327号
		</p>
	</div>
	<script src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js"></script>
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
			
			var data = $('#form1').serializeArray();

			$.post('/tables/tables/add_post',data,function(result){
				alert(result.info);
			});

		});

	</script>
	
	
	
</body>
</html>