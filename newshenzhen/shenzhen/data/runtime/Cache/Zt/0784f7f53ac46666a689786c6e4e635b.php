<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>深圳院长学术案例征集_<?php echo ($site_name); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon" />
<link href="/themes/simplebootx_mobile/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/base.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://swt.szddkqyy.com/JS/LsJS.aspx?siteid=MTI57225838&lng=cn"></script>
	<link rel="stylesheet" href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css">
	<link href="/themes/simplebootx_mobile/Zt/20190319/index.css" rel="stylesheet" type="text/css">
	<script src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js"></script>
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
</head>
<body>
	
	<section class=""><img src="/themes/simplebootx_mobile/Zt/20190319/imgs/1-1.jpg" alt=""></section>

	<section class="container">
		<form action="" class="mt-3 mb-4">
			<p>缺牙情况</p>
			<div class="symptom">
				<font class="d-inline-block pt-2 pb-2 mr-2 mb-2 active">缺门牙/大牙</font>
				<font class="d-inline-block pt-2 pb-2 mr-2 mb-2 ">多颗缺牙</font>
				<font class="d-inline-block pt-2 pb-2 mr-2 mb-2 ">半/全口缺牙</font>
				<font class="d-inline-block pt-2 pb-2 mr-2 mb-2 ">长期戴假牙</font>
				<font class="d-inline-block pt-2 pb-2 mr-2 mb-2 ">残留牙根</font>
				<font class="d-inline-block pt-2 pb-2 mr-2 mb-2 ">其他问题</font>
				<input type="hidden" class="symptom-value" name="data[symptom]" value="缺门牙/大牙">
			</div>
			<input type="text" class="w-100 pt-2 pb-2 name" placeholder="姓名：" name="data[name]">
			<input type="text" class="w-100 pt-2 pb-2 mt-2 phone"  placeholder="联系方式:" name="data[phone]">
			<input type="hidden" name="table_id" value="59" />
			<input type="hidden" name="page" class="page" />
			<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
		</form>
		<p class="text-center pt-2"><a href="javascript:;" class="text-center text-white w-75 submit-btn pt-2 pb-2">提交</a></p>
	</section>

	<div class="mt-4 text-center">
		<img src="/themes/simplebootx_mobile/Zt/20190319/imgs/2.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20190319/imgs/3.jpg" alt="" />
		<img src="/themes/simplebootx_mobile/Zt/20190319/imgs/5.jpg" alt="">
		<img src="/themes/simplebootx_mobile/Zt/20190319/imgs/6.jpg" alt="">
	</div>
	
	<div class="copy pt-2">
		<p>CopyRight © 2017 深圳德道口腔门诊部 版权所有 
			<br/> ICP备案号：<a href="http://www.miitbeian.gov.cn" target="_blank">粤ICP备18089183号</a>
			<br/> <a target="_blank" class="d-flex justify-content-center" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44030502003611"><img src="/themes/simplebootx_mobile/Public/images/ga-icon.png" style="float:left;" />粤公网安备 44030502003611号</a>
			广审号：粤（B）广[2019]第07-22-327号
		</p>
	</div>
	<!--<div class="fixed fixed-bottom gotoform"><img src="/themes/simplebootx_mobile/Zt/20190319/imgs/fixed.jpg" /></div>-->
</body>
<script>
	$(function() {
		
		$(".gotoform").click(function(){
			$("html,body").animate({scrollTop:300}, 500);
		});
		
		$('.symptom font').on('click', function() {
			$(this).addClass('active').siblings().removeClass('active');
			$('.symptom input').val($(this).text());
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
				window._agl && window._agl.push(['track', ['success', {t: 3}]])
				alert(result.info);
			});
		});
	})
</script>
</html>