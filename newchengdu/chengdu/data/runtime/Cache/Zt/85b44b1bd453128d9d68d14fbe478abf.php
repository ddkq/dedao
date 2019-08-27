<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>矫正天使招募大赛_<?php echo ($site_name); ?></title>
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
	<link href="/themes/simplebootx_mobile/Zt/20190627/index.css" rel="stylesheet" type="text/css">
	<script src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js"></script>
</head>
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
<body>

	<section class="gotoform"><img src="/themes/simplebootx_mobile/Zt/20190627/imgs/1.jpg" /></section>
	
	<section class="">
		<form action="" class="container mt-3 mb-4">
			<p class="mb-2">我的牙齿情况</p>
			<div class="symptom text-center mb-3">
				<font class="d-inline-block pt-2 pb-2 mr-1 mb-2 active">牙齿不齐</font>
				<font class="d-inline-block pt-2 pb-2 mr-1 mb-2 ">龅（暴）牙</font>
				<font class="d-inline-block pt-2 pb-2 mr-1 mb-2 ">牙缝大</font>
				<font class="d-inline-block pt-2 pb-2 mr-1 mb-2 ">地包天</font>
				<font class="d-inline-block pt-2 pb-2 mr-1 mb-2 ">虎牙</font>
				<font class="d-inline-block pt-2 pb-2 mr-1 mb-2 ">其他牙齿情况</font>
				<input type="hidden" class="symptom-value" name="data[symptom]" value="牙齿不齐">
			</div>
			<input type="text" class="w-100 pt-3 pb-3 age" name="data[age]" placeholder="年龄">
			<input type="text" class="w-100 pt-3 pb-3 mt-2 name" name="data[name]" placeholder="姓名">
			<input type="text" class="w-100 pt-3 pb-3 mt-2 phone"  name="data[phone]" placeholder="电话">
			<input type="hidden" name="table_id" value="50" />
			<input type="hidden" name="page" class="page" />
			<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
		</form>
		<p class="text-center pt-2 mb-3">
			<a href="javascript:;" class="text-center text-white w-75 submit-btn pt-2 pb-2 d-inline-block">提交申请</a>
		</p>
		<div class="">
			<img src="/themes/simplebootx_mobile/Zt/20190627/imgs/2.jpg"/>
			<img class="gotoform" src="/themes/simplebootx_mobile/Zt/20190627/imgs/3.jpg"/>	
			<img src="/themes/simplebootx_mobile/Zt/20190627/imgs/4.jpg"/>
			<img src="/themes/simplebootx_mobile/Zt/20190627/imgs/5.jpg"/>
			<div class="container bg-blue pt-2 pb-2">
				<img class="round" src="/themes/simplebootx_mobile/Zt/20190627/imgs/6.gif"/>
			</div>
			<img src="/themes/simplebootx_mobile/Zt/20190627/imgs/7.jpg"/>
			<img src="/themes/simplebootx_mobile/Zt/20190627/imgs/8.jpg"/>
		</div>
		
	</section>

	<div class="copy">
		<p>CopyRight © 2017 成都青羊德道口腔医院 版权所有 
			<br/> ICP备案号：<a href="http://www.miitbeian.gov.cn" target="_blank">蜀ICP备18017345号-1</a>
			<br/> <a target="_blank" class="d-flex justify-content-center" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=51010502010725"><img src="/themes/simplebootx_mobile/Public/images/ga-icon.png" style="float:left;" />川公网安备 51010502010725号</a>
			广审号：（成青） 医广【2018】第06-05-510105045号
		</p>
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

			var age = $(".age").val();
			var re3 = /^[0-9]{1,2}$/;
			if(age == ''){
				alert("年龄不能为空"); 
				return false; 
			}else if(age != ''){
				if (!re3.test(age)){ 
					alert("请输入正确的年龄"); 
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