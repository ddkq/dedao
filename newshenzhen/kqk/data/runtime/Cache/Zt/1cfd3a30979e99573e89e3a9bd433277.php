<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>领取福袋_<?php echo ($site_name); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon" />
<link href="/themes/simplebootx_mobile/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/base.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://swt.szddkqyy.com/JS/LsJS.aspx?siteid=MTI57225838&lng=cn"></script>
	<script src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js"></script>
	<script src="/themes/simplebootx_mobile/Public/js/swiper.min.js"></script>
	<link rel="stylesheet" href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css">
	<link rel="stylesheet" href="/themes/simplebootx_mobile/Public/css/swiper.min.css">
	<link href="/themes/simplebootx_mobile/Zt/2019-01-17/index.css" rel="stylesheet" type="text/css">
</head>
<body>
	<section class="">
		<img src="/themes/simplebootx_mobile/Zt/2019-01-18/imgs/banner.jpg" alt="">
	</section>

	<section class="content-1">
		<div class="container">
			<form action="">
				<div class="form-input mt-3">
					<input type="text" placeholder="姓名" class="w-100 pl-2 pt-2 pb-2 name" name="data[name]">
				</div>
				<div class="form-input mt-3">
					<input type="text" placeholder="电话" class="w-100 pl-2 pt-2 pb-2 phone" name="data[phone]">
				</div>
				<div class="form-input mt-3">
					<input type="text" placeholder="年龄" class="w-100 pl-2 pt-2 pb-2 phone" name="data[age]">
				</div>
				<input type="hidden" name="table_id" value="51" />
				<input type="hidden" name="page" class="page" />
				<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
			</form>
			<div class="submit-btn mt-3">
				<a href="javascript:;" class="text-white text-center d-block pt-2 pb-2">立即领取福袋</a>
			</div>
			<div class="mt-3">
				<img src="/themes/simplebootx_mobile/Zt/2019-01-18/imgs/content-1.jpg" alt="">
			</div>
		</div>
	</section>

	<section class="content-2 mt-4">
		<img src="/themes/simplebootx_mobile/Zt/2019-01-18/imgs/content-2.jpg" alt="">
	</section>

	<section class="content-3">
		<img src="/themes/simplebootx_mobile/Zt/2019-01-18/imgs/content-3.jpg" alt="">
	</section>

	<section class="content-4 mt-4">
		<img src="/themes/simplebootx_mobile/Zt/2019-01-18/imgs/content-4.jpg" alt="">
	</section>

	<section class="content-5 mt-4">
		<img src="/themes/simplebootx_mobile/Zt/2019-01-18/imgs/content-5.jpg" alt="">
	</section>

	<section class="content-6">
		<img src="/themes/simplebootx_mobile/Zt/2019-01-18/imgs/content-6.jpg" alt="">
	</section>
</body>
</html>

<script>
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
			alert(result.info);
		});
	});
</script>