<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon"/>
	<title>百万征集100名缺牙市民_<?php echo ($site_name); ?></title>
	<link rel="stylesheet" href="/themes/simplebootx_mobile/Zt/bwzj100/index.css">
</head>
<body>
	<section><img src="/themes/simplebootx_mobile/Zt/bwzj100/images/banner.jpg" alt=""></section>
	<section class="content">
		<h1><span style="background-color: #f2e50d;color: #f10a14;">提交资料—获取体验名额</span></h1>
		<form id="form1" method="post" enctype="multipart/form-data">
			<input type="hidden" name="table_id" value="38" />
			<input type="hidden" name="page" class="page" />
			<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
			<div class="title">我的牙齿症状<i class="red">*</i></div>
			<ul class="flex list">
				<li>
					<input type="radio" name="data[symptom]" value="缺门牙" checked="checked">缺门牙
				</li>
				<li>
					<input type="radio" name="data[symptom]" value="多颗缺牙">多颗缺牙
				</li>
				<li>
					<input type="radio" name="data[symptom]" value="全口无牙">全口无牙
				</li>
				<li>
					<input type="radio" name="data[symptom]" value="烤瓷牙失败">烤瓷牙失败
				</li>
				<li>
					<input type="radio" name="data[symptom]" value="缺大牙">缺大牙
				</li>
				<li>
					<input type="radio" name="data[symptom]" value="半口缺牙">半口缺牙
				</li>
				<li>
					<input type="radio" name="data[symptom]" value="烂牙（蛀牙）">烂牙(蛀牙)
				</li>
				<li>
					<input type="radio" name="data[symptom]" value="其他牙齿情况">其他
				</li>
			</ul>
			<div class="title">姓名<i class="red">*</i></div>
			<div class="name"><input type="text" name="data[name]"></div>
			<div class="title">电话<i class="red">*</i></div>
			<div class="phone"><input type="text" name="data[phone]"></div>
		</form>
		<div class="submit-btn"><a href="javascript:;">提交申请</a></div>
	</section>
	<section class="content">
		<img src="/themes/simplebootx_mobile/Zt/bwzj100/images/content3.jpg" alt="">
	</section>
	<section class="content" style="margin-bottom: 0;">
		<h1><span>媒体相关报道</span></h1>
		<img src="/themes/simplebootx_mobile/Zt/bwzj100/images/content4.png" />
	</section>
	<section class="content">
		<h1><span>成都100名缺牙市民<br/>体验高科技智能种牙</span></h1>
		<img src="/themes/simplebootx_mobile/Zt/bwzj100/images/content5.jpg" />
	</section>
	<div class="bottom">COPYRIGHT © 2017 成都德道口腔医院 版权所有 <br> ICP备案号：蜀ICP备18017345号-1</div>
	
	<script type="text/javascript" src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js" ></script>
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
				//console.log(result);
				alert(result.info);
			});
		});
	</script>
</body>
</html>