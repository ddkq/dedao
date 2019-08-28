<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon"/>
	<title>牙不齐，不敢笑，不自信？是时候纠正牙齿了</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon" />
<link href="/themes/simplebootx_mobile/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<link href="/themes/simplebootx_mobile/Public/css/base.css" rel="stylesheet" type="text/css">
<script language="javascript" src="http://swt.szddkqyy.com/JS/LsJS.aspx?siteid=MTI57225838&lng=cn"></script>
	<link rel="stylesheet" href="/themes/simplebootx_mobile/Zt/braces/index.css">
</head>
<body>
	<section><img src="/themes/simplebootx_mobile/Zt/braces/images/1.jpg" alt=""></section>
	<div class="red-btn">一键测试——适合我的牙套</div>
	<section class="index-situation">
		<form id="form1" method="post" enctype="multipart/form-data">
			<input type="hidden" name="table_id" value="45" />
			<input type="hidden" name="page" class="page" />
			<input type="hidden" name="code" value="<?php echo ($code = mt_rand(0,1000000)); ?>">
			<h4 class="must">我的牙齿情况 （可多选）</h4>
			<div class="checkbox-control checkbox-box multiple-box">
				<label class="checkbox-item">
					<input type="checkbox" value="牙齿不齐" class="radio-style cheakbox1">
					<span>牙齿不齐</span>
				</label>
				<label class="checkbox-item">
					<input type="checkbox" value="门牙缝大" class="radio-style cheakbox1">
					<span>门牙缝大</span>
				</label>
				<label class="checkbox-item">
					<input type="checkbox" value="龅（暴）牙" class="radio-style cheakbox1">
					<span>龅（暴）牙</span>
				</label>
				<label class="checkbox-item">
					<input type="checkbox" value="地包天" class="radio-style cheakbox1">
					<span>地包天</span>
				</label>
				<label class="checkbox-item">
					<input type="checkbox" value="歪牙" class="radio-style cheakbox1">
					<span>歪牙</span>
				</label>
				<label class="checkbox-item">
					<input type="checkbox" value="其他牙齿情况" class="radio-style cheakbox1">
					<span>其他牙齿情况</span>
				</label>
				<input type="hidden" data-type="12" name="data[symptom]" value="">
			</div>
			<div class="situation-input-text">
				<input required="required" type="text" data-type="1" name="data[name]"  placeholder="姓名">
				<span class="input-clear"></span>
			</div>
			<div class="situation-input-text">
				<input required="required" type="text" data-type="2" name="data[phone]"  placeholder="电话">
				<span class="input-clear"></span>
			</div>

			<div class="situation-btn">
				<a href="javascript:;" class="submit-btn">提交测试</a>
			</div>
			
		</form>
		<div class="submit-btn"><a href="javascript:;"></a></div>
	</section>
	<section>
		<img src="/themes/simplebootx_mobile/Zt/braces/images/2.jpg" alt="">
	</section>
	<section style="margin: 1.2rem auto; text-align: center;" >
		<img src="/themes/simplebootx_mobile/Zt/braces/images/3.gif" width="640px" alt="">
	</section>
	<div class="copy">
		<p>CopyRight © 2017 深圳德道口腔门诊部 版权所有 
			<br/> ICP备案号：<a href="http://www.miitbeian.gov.cn" target="_blank">粤ICP备18089183号</a>
			<br/> <a target="_blank" class="d-flex justify-content-center" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44030502003611"><img src="/themes/simplebootx_mobile/Public/images/ga-icon.png" style="float:left;" />粤公网安备 44030502003611号</a>
			广审号：粤（B）广[2018]第08-19-214号
		</p>
	</div>
	<script src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js"></script>
	
	<script>
	
		$(function(){
			$('.page').val(window.location.href);
		});
		
		var options = "";
		
		
		//多选
		$('.cheakbox1').on('click', function(){
			if($(this).is(':checked')) {
				options += $(this).val() + ',';
			}
			else {
				options = options.split($(this).val() + ',').join("");
			}
			$(this).parent('label').nextAll('input').attr('value',options);
		})
	
		$('body').on('input', '.situation-input-text input', function() {
			var inputValue = $(this).val();
			inputValue == '' ? '' : $(this).next().css('display', 'block')
		})
		$('body').on('click', '.input-clear', function() {
			$(this).prev().val('');
			$(this).css('display', 'none');
		})
		
		
		$('body').on('click', '.submit-btn', function() {	
			var name = $("input[data-type=1]").val();
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
			
	
			var phone = $("input[data-type=2]").val();
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
			
			var options = $("input[data-type=12]").val();
			if(options == null){
				alert("请选择相关数据"); 
				return false;
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