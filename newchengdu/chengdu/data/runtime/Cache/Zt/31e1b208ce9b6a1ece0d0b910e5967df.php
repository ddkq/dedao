<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
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
	<title>百万征集种植牙案例_<?php echo ($site_name); ?></title>
	<link rel="stylesheet" href="/themes/simplebootx_mobile/Zt/rzzn/base.css">
	<script type="text/javascript" src="/themes/simplebootx_mobile/Public/js/jquery-2.1.1.min.js" ></script>
</head>
<body>

	<a onclick="javascript:openJesongChatByGroup(16524,20125);" target="_blank"><img src="/themes/simplebootx_mobile/Zt/rzzn/imgs/1.jpg" /></a>
	
	<div class="dhk">
		<h2><p>我是在线客服， 有问题可以直接咨询~ </p> <a href="tel:4008006161"><span><img src="/themes/simplebootx_mobile/Public/images/icon_phone.png"></span>免费热线</a></h2>
		<div class="dhk-border">
			<div class="youhui-wrap">
				<div id="bb" style="display: none;">
					<div class="time"></div>
					<div class="toux"><img src="/themes/simplebootx_mobile/Zt/rzzn/imgs/01_03.png" alt=""></div>
					<p class="pp2">您好，请问有什么能帮到您？<span class="sj"><img src="/themes/simplebootx_mobile/Public/images/sj.png" alt=""></span></p>
				</div>
				<div id="ee" style="display: none;">
					<div class="time time2"></div>
					<div class="toux toux2"><img src="/themes/simplebootx_mobile/Zt/rzzn/imgs/01_03.png" alt=""></div>
					<p class="pp2 pp3">
						<span class="txt">报名“高疑难种植牙案例”享高科技智能种牙征集<br/><font>35岁以上缺牙市民（每日限免20名）</font></span>
						<span class="sj"><img src="/themes/simplebootx_mobile/Public/images/sj.png" alt=""></span></p>
				</div>
			</div>
		</div>
	</div>
	<a onclick="javascript:openJesongChatByGroup(16524,20125);" target="_blank" class="swt">
		<textarea id="input_n" placeholder="在此输入可直接对话"></textarea>
		<button type="button" id="button"><span>发送</span></button>
	</a>
	
</body>
<script>

	
	
    
	
	//日期时间处理
	function conver(s) {
		return s < 10 ? '0' + s : s;
	}
	
	$(window).scroll(function(){
	    setTimeout(function(){
            function show(){
              	var myDate = new Date();
              	var year = myDate.getFullYear();
				var month = myDate.getMonth() + 1;
				var date = myDate.getDate();
			    var h = myDate.getHours(); //获取当前小时数(0-23)
			    var m = myDate.getMinutes(); //获取当前分钟数(0-59)
			    var s = myDate.getSeconds();
              	var now = year + '-' + conver(month) + "-" + conver(date) + " " + conver(h) + ':' + conver(m) + ":" + conver(s);
                $('#bb .time').html(now);
                $('#bb').fadeIn(1000);
                
                //$('#ee').fadeIn(1000);
            };
            show();
	    },1000)
	    setTimeout(function(){
	        function show(){
	        	var myDate = new Date();
	        	var year = myDate.getFullYear();
				var month = myDate.getMonth() + 1;
				var date = myDate.getDate();
			    var h = myDate.getHours(); //获取当前小时数(0-23)
			    var m = myDate.getMinutes(); //获取当前分钟数(0-59)
			    var s = myDate.getSeconds();
	        	var now = year + '-' + conver(month) + "-" + conver(date) + " " + conver(h) + ':' + conver(m) + ":" + conver(s);
	            $('#ee .time').html(now);
	            $('#ee').fadeIn(1000);
	        }
	        show();
	    },3000)
	});
	
	var alinks = document.getElementsByTagName('a');
	var localhref = window.location.href.split('#');
	if (localhref.length >1&& localhref[1] != '') {
	    for (var index in alinks) {
	        if (typeof(alinks[index].href)=='string' && alinks[index].href.substr(0, 10).toLowerCase() != 'javascript' && alinks[index].href.substr(0, 3).toLowerCase() != 'tel') {
	            if (alinks[index].href.indexOf("#") == -1) {
	                alinks[index].href = alinks[index].href + '#' + localhref[1];
	            } else {
	                alinks[index].href = alinks[index].href + '&' + localhref[1];
	            }
	        }
	    }
	}
	
	
</script>
</html>