<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/x-icon"/>
<link href="/themes/simplebootx/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx/Public/css/bootstrap4.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/themes/simplebootx/Public/css/swiper.min.css">
<link href="/themes/simplebootx/Public/css/font-awesome/4.7.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
<link href="/themes/simplebootx/Public/css/base.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/themes/simplebootx/Public/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/themes/simplebootx/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/themes/simplebootx/Public/js/jquery.SuperSlide.2.1.1.js"></script>
<script src="/themes/simplebootx/Public/js/swiper.min.js"></script>
<script language="javascript" src="http://swt.szddkqyy.com/JS/LsJS.aspx?siteid=MTI57225838&lng=cn"></script>
	<title>德道隐形纠正_<?php echo ($site_name); ?></title>
</head>
<style>
	*html, _html {
		background-image: url(about:blank);
		background-attachment: fixed;
	}
	body, h1, h2, h3, h4, h5, h6, hr, p, blockquote, dl, dt, dd, ul, ol, li, pre, form, fieldset, legend, button, input, textarea, th, td, img {
		border: medium none;
		margin: 0;
		padding: 0;
	}
	body {
		background-color: #fff;
	}
	h1, h2, h3, h4, h5, h6 {
		font-size: 100%;
	}
	em {
		font-style: normal;
	}
	ul, ol {
		list-style: none;
	}
	a {
		text-decoration: none;
		color: #333;
	}
	a:hover {
		text-decoration: none;
	}
	img {
		border: 0px;
		vertical-align: middle;
	}
	table {
		border-collapse: collapse;
		border-spacing: 0;
	}
	.clearfix:before, .clearfix:after {
		content: "";
		display: table;
	}
	.clearfix:after {
		clear: both;
		overflow: hidden;
	}
	.clearfix {
		zoom: 1;
	}
	.scroll_top {
		overflow: hidden;
		zoom: 1;
		position: relative
	}
	.clr {
		clear: both;
		height: 0px;
		overflow: hidden;
	}
	.pubW {
		width: 1190px;
	}
	.center {
		margin: 0 auto;
	}
	.float_left {
		float: left;
		display: inline;
	}
	.float_right {
		float: right;
		display: inline;
	}
	.fl {
		float: left;
		display: inline;
	}
	.fr {
		float: right;
		display: inline;
	}
	.bgff {
		background: #fff;
	}
	.bgf3 {
		background: #f2f2f2;
	}
	.top {
		height: 67px;box-sizing:content-box;-moz-box-sizing: content-box;-webkit-box-sizing: content-box;
		background: #fff;
		padding-top: 23px;
	}
	.top div h1 a, .top div span, .server .phone, .server span, .server input.inputbtn {
		background: url(/comjs/images/common_icon.png) no-repeat;
	}
	.top div h1 {
		width: 318px;
		height: 40px;
		float: left;
		display: inline;
	}
	.top div h1 a {
		background-position: 0 -400px;
		width: 318px;
		height: 40px;
		display: block;
	}
	.topNav{ margin-top:18px;}
	.topNav li {float:left;height:26px;line-height:26px; /*background:url(../newImg/navBg.jpg) no-repeat right center;*/}
	.topNav li:last-child{ background:none;}
	.topNav li a{display:block;padding:0 12px;font-size:18px;color:#494949;text-decoration:none;}
	/*.topNav li:first-child a {color:#006577;}*/
	.topNav a:hover{ background-color:#3d3f4b; color:#fff; text-decoration:none;}
	.top .server {
		width: 230px;
		float: right;
		display: inline;
		margin-top: 0;
	}
	.server p.call .phone {
		background-position: -634px -21px;
		width: 17px;
		height: 17px;
	}
	.server p span {
		color: #272727;
		font-size: 14px;
		display: inline-block;
	}
	.server p strong {
		font-size: 16px;
	}
	.server p.bd {
		border: 1px solid #272727;box-sizing:content-box;-moz-box-sizing: content-box;-webkit-box-sizing: content-box;
		border-radius: 3px;
		height: 23px;
		margin-top: 5px;
	}
	.server input.inputtext {
		width: 217px;box-sizing:content-box;-moz-box-sizing: content-box;-webkit-box-sizing: content-box;
	}
	.server input.inputtext {
		border: 0 none;background:#fff;
		color: #BABABA;
		float: left;
		height: 23px;
		line-height: 23px;
		padding-left: 5px;
		width: 109px;
	}
	.server input.inputbtn {
		background-position: -754px -12px;
		border: 0 none;
		cursor: pointer;
		float: right;
		height: 23px;
		width: 39px;
	}
	.server input.inputbtn:hover {
		background-position: -754px -35px;
	}
	.pop_btn_up {
		display: block;
		width: 97px;
		height: 15px;
		background: url(/comjs/images/common_icon.png) no-repeat -662px -294px;
		float: right;
		margin-top: 27px;
		margin-left: 25px;
		display: inline;
	}
	.pop_btn_down {
		background-position: -662px -267px;
	}
	.pop_box {
		width: 100%;
		height: 150px;
		background: url(/comjs/images/pop_banner.jpg) no-repeat center top;
		position: relative;
	}
	.pop_box a {
		width: 100%;
		height: 100%;
		display: block;
	}
	.close_pop {
		width: 43px;
		height: 43px;
		background: url(/comjs/images/common_icon.png) no-repeat -781px -211px;
		position: absolute;
		top: 50%;
		margin-top: -22px;
		right: 100px;
		cursor: pointer;
	}
</style>
<link rel="stylesheet" href="/themes/simplebootx/Zt/ddyxjz/css/Kd_Common.css">

<body>
	<header class="header">
	<div class="header-bcg">
		<div class="content-width">
			<div class="flex header-content">
				<div class="header-left">
					<i class="header-icon map-marker"></i>
					<span>德道口腔连锁：</span>
					<span class="chengdu">成都</span>
					<i class="vertical"></i>
					<span class="shenzhen">深圳</span>
				</div>
				<div class="header-right flex">
					<div class="time">
						<i class="header-icon"></i>
						<span>门诊时间: 09:00-18:00</span>
					</div>
					<i class="vertical"></i>
					<div class="phone-num">
						<i class="header-icon"></i>
						<span>健康热线: 400-800-6161 / 0755-86522406</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="content-width">
		<div class="header-logo flex">
			<div>
				<a href="/"><img src="/themes/simplebootx/Public/images/new-logo.png" alt=""></a>
				<div class="header-title"><img src="/themes/simplebootx/Public/images/header-title.gif" alt=""></div>
			</div>
		</div>
	</div>
	
	

	<div class="header-nav">
		<div class="content-width">
			<ul class="flex header-nav-list mb-0">
				<li>
					<div class="header-nav-active"><a href="/">网站首页</a></div>
				</li>
				<li>
					<div><a href="/about.html">德道品牌</a></div>
				</li>
				<li>
					<div><a href="/list/62.html">种牙项目</a></div>
				</li>
				<li>
					<div><a href="#">种牙案例</a></div>
				</li>
				<li>
					<div><a href="/department/7.html">种牙专家</a></div>
				</li>
				<li>
					<div><a href="/list/105.html">种牙设备</a></div>
				</li>
				<li>
					<div><a href="/zt/jkz.html">牙齿矫正</a></div>
				</li>
				<li>
					<div><a href="/zt/jkm">牙齿修复</a></div>
				</li>
			</ul>
		</div>
	</div>
</header>
<script src="/themes/simplebootx/Public/js/moveline.js"></script>
<script>
	$('.header-nav-list').moveline({color: '#c11820', position: 'inner', height: 100+'%'});

	$('.header-nav-list li').on('mouseenter', function() {
		$(this).children().addClass('header-nav-active');
		$(this).siblings().children().removeClass('header-nav-active');
	})
	$('.header-nav-list li').on('mouseleave', function() {
		$('.header-nav-list li').children().removeClass('header-nav-active');
		$('.header-nav-list li').eq(0).children().addClass('header-nav-active');
	})
</script>
	<div class="banner">
		<ul>
			<li class="bg1">
				<div class="wrap"><a href="javascript:void(0);return false;" target="_blank" onclick="swtClick();return false;" class="iBlock ico ljzx"></a></div>
			</li>
			<li class="bg2">
				<div class="wrap"><a href="javascript:void(0);return false;" target="_blank" onclick="swtClick();return false;" class="iBlock ico ljzx"></a></div>
			</li>
		</ul>
		<div class="hd"> <a class="prev ico"></a> <a class="next ico"></a> </div>
    </div>
  		
	<div class="container1">
  		<div class="box box1">
    		<div class="hd">
      			<h2 class="iBlock ico"></h2>
      			<em></em> 
      		</div>
    		<div class="bd">
      			<div class="col-box fl">
        			<dl class="clearfix">
          				<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p2.jpg" width="126" height="54"></dt>
          				<dd>
            				<h6>美观度</h6>
            				<p>透明轻薄,外观上几乎看不到牙套</p>
          				</dd>
        			</dl>
        			<dl class="clearfix">
          				<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p14.jpg" width="126" height="54"></dt>
          				<dd>
            				<h6>舒适度</h6>
            				<p>几乎感觉不到牙套存在</p>
          				</dd>
        			</dl>
        			<dl class="clearfix">
          				<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p3.jpg" width="126" height="54"></dt>
          				<dd>
            				<h6>清洁度</h6>
            				<p>自行摘带,容易清洁</p>
          				</dd>
        			</dl>
        			<dl class="clearfix">
          				<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p4.jpg" width="126" height="54"></dt>
          				<dd>
            				<h6>简便度</h6>
            				<p>1-2月就诊一次</p>
          				</dd>
        			</dl>
        			<dl class="clearfix">
          				<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p5.jpg" width="126" height="54"></dt>
          				<dd>
            				<h6>预知效果</h6>
            				<p>提前预知效果</p>
          				</dd>
        			</dl>
        			<dl class="clearfix">
          				<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p6.jpg" width="126" height="54"></dt>
          				<dd>
           	 				<h6>适应年龄</h6>
            				<p>无年龄限制</p>
          				</dd>
        			</dl>
        			<dl class="clearfix">
          				<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p7.jpg" width="126" height="54"></dt>
          				<dd>
            				<h6>拔牙率</h6>
            				<p>比较低</p>
          				</dd>
        			</dl>
      			</div>
      		<div class="col-box fr">
        		<dl class="clearfix">
          			<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p1.jpg" width="126" height="54"></dt>
          			<dd>
            			<h6>美观度</h6>
            			<p>钢丝牙套暴露 影响美观</p>
          			</dd>
        		</dl>
        		<dl class="clearfix">
          			<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p8.jpg" width="126" height="54"></dt>
         	 		<dd>
            			<h6>舒适度</h6>
            			<p>金属钢丝刮伤口腔</p>
          			</dd>
        		</dl>
        		<dl class="clearfix">
          			<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p9.jpg" width="126" height="54"></dt>
          			<dd>
            			<h6>清洁度</h6>
            			<p>托槽容易塞住食物,不宜清洁</p>
          			</dd>
        		</dl>
        		<dl class="clearfix">
          			<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p10.jpg" width="126" height="54"></dt>
          			<dd>
            			<h6>简便度</h6>
            			<p>1-2周就诊一次</p>
          			</dd>
        		</dl>
        		<dl class="clearfix">
          			<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p11.jpg" width="126" height="54"></dt>
          			<dd>
            			<h6>预知效果</h6>
            			<p>不可预知</p>
          			</dd>
        		</dl>
        		<dl class="clearfix">
          			<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p12.jpg" width="126" height="54"></dt>
          			<dd>
            			<h6>适应年龄</h6>
            			<p>14-26岁</p>
          			</dd>
        		</dl>
        		<dl class="clearfix">
          			<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p13.jpg" width="126" height="54"></dt>
          			<dd>
            			<h6>拔牙率</h6>
            			<p>比较高</p>
          			</dd>
        		</dl>
      		</div>
    	</div>
    	<p class="aLink"><a target="_blank" href="javascript:void(0);return false;" target="_blank" onclick="swtClick();return false;" class="iBlock ico ljzx"></a></p>
  	</div>
  	<div class="box box2 boxbg">
    	<div class="hd">
      		<h2 class="iBlock ico"></h2>
      		<em></em> 
      	</div>
    	<div class="bd wrap">
     		<div class="video clearfix">
        		<div class="videoPlay fl">
                	<img src="/themes/simplebootx/Zt/ddyxjz/imgs/pic.jpg">
          			<p><br>德道隐形矫正是通过3D模拟牙齿的移动与治疗，辅以精细内窥镜，使用量身定制几乎无法察觉的隐形矫治器，来矫正牙齿的方式。在治疗前可提前观摩正牙效果的矫正方法。</p>
        		</div>
        		<div class="pic fr"> <img src="/themes/simplebootx/Zt/ddyxjz/imgs/p16.jpg" width="529" height="194"> <img src="/themes/simplebootx/Zt/ddyxjz/imgs/p17.jpg" width="529" height="194"> </div>
      		</div>
      		<dl class="listPic clearfix">
        		<dd class="n1 col"> <em class="ico"></em>
          			<div class="covered second">
            			<div class="handle" style="left: 100px; top: 85px;"><span class="left icon-chevron-left"></span><span class="right icon-chevron-right"></span></div>
            			<div class="changeable" style="height: 160px; width: 100px; border-right: 1px dashed rgb(255, 255, 255);"></div>
          			</div>
          			<p>牙齿拥挤</p>
        		</dd>
        		<dd class="n2"> <em class="ico"></em>
          			<div class="covered second">
            			<div class="handle" style="left: 100px; top: 85px;"><span class="left icon-chevron-left"></span><span class="right icon-chevron-right"></span></div>
            			<div class="changeable" style="height: 160px; width: 100px; border-right: 1px dashed rgb(255, 255, 255);"></div>
          			</div>
          			<p>牙缝大</p>
        		</dd>
        		<dd class="n3"> <em class="ico"></em>
          			<div class="covered second">
            			<div class="handle" style="left: 100px; top: 85px;"><span class="left icon-chevron-left"></span><span class="right icon-chevron-right"></span></div>
            			<div class="changeable" style="height: 160px; width: 100px; border-right: 1px dashed rgb(255, 255, 255);"></div>
          			</div>
          			<p>牙不齐</p>
        		</dd>
        		<dd class="n4 col"> <em class="ico"></em>
          			<div class="covered second">
            			<div class="handle" style="left: 100px; top: 85px;"><span class="left icon-chevron-left"</span><span class="right icon-chevron-right"></span></div>
            			<div class="changeable" style="height: 160px; width: 100px; border-right: 1px dashed rgb(255, 255, 255);"></div>
          			</div>
          			<p>覆合</p>
        		</dd>
        		<dd class="n5"> <em class="ico"></em>
          			<div class="covered second">
            			<div class="handle" style="left: 100px; top: 85px;"><span class="left icon-chevron-left"></span><span class="right icon-chevron-right"></span></div>
            			<div class="changeable" style="height: 160px; width: 100px; border-right: 1px dashed rgb(255, 255, 255);"></div>
          			</div>
          			<p>反颌</p>
        		</dd>
        		<dt> 德道口腔医院，坚持在口腔正畸医学设计中，融入牙颌面部骨骼的美学黄金律，不止改变牙齿，更能矫正脸型。
          			<p class="aLink"><a href="javascript:void(0);return false;" target="_blank" onclick="swtClick();return false;" class="iBlock ico ljzx"></a></p>
        		</dt>
      		</dl>
    	</div>
    	<p class="colBg"></p>
  	</div>
  	<div class="box box3">
    	<div class="hd">
      		<h2 class="iBlock ico"></h2>
      		<em></em> 
      	</div>
    	<div class="bd wrap clearfix">
      		<p class="midPic"></p>
      		<dl class="n1 clearfix">
        		<dt class="fl"><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p23.jpg" width="265" height="196"></dt>
        		<dd class="fr"><em class="ico iBlock"></em>
          			<p>采集口内信息 构建模型</p>
        		</dd>
      		</dl>
      		<dl class="n2 clearfix">
        		<dt class="fr"><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p24.jpg" width="265" height="196"></dt>
        		<dd class="fl"><em class="ico iBlock"></em>
          			<p>制定三维治疗方案 提前预知效果</p>
        		</dd>
      		</dl>
      		<dl class="n3 clearfix">
        		<dt class="fl"><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p25.jpg" width="265" height="196"></dt>
        		<dd class="fr"><em class="ico iBlock"></em>
          			<p>定制隐形矫治器 佩戴牙套</p>
        		</dd>
      		</dl>
      		<dl class="n4 clearfix">
        		<dt class="fr"><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p26.jpg" width="265" height="196"></dt>
        		<dd class="fl"><em class="ico iBlock"></em>
          			<p>每两周更换矫治器 矫正牙齿</p>
        		</dd>
      		</dl>
    	</div>
    	<p class="aLink"><a target="_blank" href="javascript:void(0);return false;" target="_blank" onclick="swtClick();return false;" class="iBlock ico ljzx"></a></p>
  	</div>
  	<div class="box box4 boxbg">
    	<div class="hd">
      		<h2 class="iBlock ico"></h2>
      		<em></em> </div>
    		<div class="bd wrap clearfix">
	      		<dl class="n1 noMg">
	        		<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p27.jpg" width="262" height="285"><em class="ico iBlock"></em></dt>
	        		<dd>
	          			<h6>舒适的矫正--可自行摘戴正畸</h6>
	          			<p>突破传统正畸所造成的口腔内强烈异物感和不适，隐形美观，可自行摘戴的矫正。</p>
	        		</dd>
	      		</dl>
      			<dl class="n2">
        			<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p28.jpg" width="262" height="285"><em class="ico iBlock"></em></dt>
        			<dd>
          				<h6>准确的正畸--精度准确</h6>
          				<p>德道隐形矫正运用先进的三维数字成像，原始建模，准确精细。</p>
        			</dd>
      			</dl>
      			<dl class="n3">
        			<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p29.jpg" width="262" height="285"><em class="ico iBlock"></em></dt>
        			<dd>
          				<h6>灵活的方案设计--预知效果及时调整</h6>
          				<p>模拟预判矫治效果，跟踪矫治情况调整矫治方案，对矫治过程进行全程、准确的控制。</p>
        			</dd>
      			</dl>
      			<dl class="n4">
        			<dt><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p30.jpg" width="262" height="285"><em class="ico iBlock"></em></dt>
        			<dd>
          				<h6>有效的矫治过程--恒定轻力防止牙齿松动</h6>
          				<p>每一个小阶段对应一个不同的矫治器，只发生一个微小的位移。</p>
        			</dd>
      			</dl>
    		</div>
    	<p class="colBg"></p>
  	</div>
  	<div class="box box5">
    	<div class="hd">
      		<h2 class="iBlock ico"></h2>
      		<em></em> 
      	</div>
    	<div class="bd wrap">
      		<div class="shows">
        			<ul class="clearfix">
          				<li><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p31.jpg" width="389" height="230"></li>
          				<li><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p32.jpg" width="389" height="230"></li>
          				<li><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p37.jpg" width="389" height="230"></li>
          				<li><img src="/themes/simplebootx/Zt/ddyxjz/imgs/p38.jpg" width="389" height="230"></li>
        			</ul>
      		</div>
      		<a class="prev ico"></a> <a class="next ico"></a>
      	</div>
		<p class="aLink"> 
			<a target="_blank" href="javascript:void(0);return false;" target="_blank" onclick="swtClick();return false;" class="iBlock ico ljzx"></a> 
			<a target="_blank" href="javascript:void(0);return false;" target="_blank" onclick="swtClick();return false;" class="iBlock ico sqfqfk"></a> 
		</p>
  	</div>
  	<div class="box box6">
    	<div class="bd">
      		<div class="doctor">
		        <div class="intro clearfix">
		          <div class="pic fl"><img src="/themes/simplebootx/Zt/ddyxjz/imgs/doctor_1.png" width="612" height="730" style="left:89px; top:1px" /></div>
		          <div class="txt fr">
		            <h6> 张文彪<em>博士</em> <a  target="_blank" href="javascript:void(0);return false;" onClick="swtClick();return false;" class="iBlock">立即咨询</a> </h6>
		            <p>中华口腔医学会正畸专委会会员<br/>INSIGNIA首批认证医师
		            </p>
		            <img src="/themes/simplebootx/Zt/ddyxjz/imgs/p33.jpg" width="392" height="243" /> </div>
		        </div>
		        <div class="intro clearfix">
		          <div class="pic fl"><img src="/themes/simplebootx/Zt/ddyxjz/imgs/doctor_2.png" width="612" height="730" style="left:89px; top:1px" /></div>
		          <div class="txt fr">
		            <h6> 周卫明<em>主治医师</em> <a  target="_blank" href="javascript:void(0);return false;" onClick="swtClick();return false;" class="iBlock">立即咨询</a> </h6>
		            <p>师从全国著名正畸专家李兰超主任<br>中华口腔医学会正畸专委会会员<br>隐适美中国认证医师<br>INSIGNIA首批认证医师</p>
		            <img src="/themes/simplebootx/Zt/ddyxjz/imgs/p34.jpg" width="392" height="243" /> </div>
		        </div>
		    </div>
    	</div>
    	<div class="hd"> <a class="prev ico"></a> <a class="next ico"></a> </div>
  	</div>
	
<!--
<div class="flaot_b">
	<div class="cont">
		<div class="tsxm">
			<div class="if_pop" style="overflow: hidden; height: 0px;">
				<ul>
					<li class="lcli01">
						<a href="/list/4.html"></a>
					</li>
					<li class="lcli02">
						<a href="/list/3.html"></a>
					</li>
					<li class="lcli03">
						<a href="/list/5.html"></a>
					</li>
					<li class="lcli04">
						<a href="/list/13.html"></a>
					</li>
					<li class="lcli05">
						<a href="/list/154.html"></a>
					</li>
				</ul>
			</div>
		</div>
		<a onclick="swtClick()" target="_blank" class="a1" title="在线挂号"></a>
		<a href="/list/180.html" target="_blank" class="a2" title="当月特惠活动"></a>
		<a href="#" class="downup" target="_self" title="返回顶部"></a>
	</div>
</div>

<div class="fixed-left" style="width: 12%;">
	<div>
		<a href="/swt?id=left"><img src="/themes/simplebootx/Public/images/activity1.png" alt=""></a>
		<i class="fa fa-close fixed-close"></i>
	</div>
</div>
<div class="fixed-right">
	<div>
		<a href="/swt?id=right"><img src="/themes/simplebootx/Public/images/activity2.gif" alt=""></a>
		<i class="fa fa-close fixed-close"></i>
	</div>
</div>

-->
<div id="footer">
	<div class="footer">
		<div class="footer_left">
			<img src="/themes/simplebootx/Public/images/footer_logo1.png" />
		</div>
		<div class="footer_middle">
			<div class="list">
				<ul>
					<h3>关于我们</h3>
					<li><a href="/about.html">德道品牌</a></li>
					<li><a href="/department/7.html">专家团队</a></li>
					<li><a href="/list/187.html">前沿技术</a></li>
					<li><a href="/list/146.html">德道资讯</a></li>
					<li><a href="/contact.html">联系我们</a></li>
					<li><a href="/traffic.html">来院路线</a></li>
				</ul>
				<ul>
					<h3>口腔项目</h3>
					<li><a href="/list/4.html">种植中心</a></li>
					<li><a href="/list/3.html">正畸中心</a></li>
					<li><a href="/list/5.html">牙齿修复</a></li>
					<li><a href="/swt/">根管治疗</a></li>
					<li><a href="/list/13.html">牙病治疗</a></li>
					<li><a href="/list/154.html">儿童齿科</a></li>
				</ul>
				<ul>
					<h3>热门关注</h3>
					<li><a href="/list/24.html">门牙缺失</a></li>
					<li><a href="/list/7.html">牙齿拥挤</a></li>
					<li><a href="/list/170.html">牙齿稀疏</a></li>
					<li><a href="/list/10.html">牙齿缺损</a></li>
					<li><a href="/list/14.html">龋齿(蛀牙)</a></li>
					<li><a href="/list/15.html">牙周炎</a></li>
				</ul>
			</div>
		</div>
		<div class="footer_right">
			<h3>官方微信</h3>
			<div class="qrcode clearfix">
				<img src="/themes/simplebootx/Public/images/qrcode.png" />
				<div class="text">
					<p>[扫一扫]</p>
					<p>关注德道官方微信<br/>资讯优惠尽在掌握</p>
					<img src="/themes/simplebootx/Public/images/shake.png" />
				</div>
			</div>
			<div class="tel">
				<font><i>医院地址：</i><b>深圳市南山区桂庙路南侧5号龙意成大楼8/9楼</b></font>
				<font>电话：400-800-6161 / 0755-86522406</font>
			</div>
		</div>
	</div>
</div>
<div id="copy">
	<div class="copy">
		<p class="mb-0">CopyRight © 2017 深圳德道口腔门诊部 版权所有</p>
		<p class="mb-0">
			<a href="http://www.beian.miit.gov.cn" target="_blank">ICP备案号：粤ICP备18089183号</a>
			<a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44030502003611">
				<img src="/themes/simplebootx/Public/images/ga-icon.png" style="float:left;" />粤公网安备 44030502003611号
			</a>
			广审号：粤（B）广[2019]第07-22-327号
		</p>
		<p class="mb-0">声明：网站信息仅供参考，不能作为诊断及医疗依据。</p>
	</div>
</div>
		 

<!--
<div id="new_swt">
	<a href="javascript:void(0)" target="_self" class="swt-close"></a>
	<div class="swtslide swiper-container">
		<div class="swiper-wrapper">
			<?php if(is_array($ad_slides)): $i = 0; $__LIST__ = $ad_slides;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="swiper-slide"><a href="<?php echo ($vo["slide_url"]); ?>" target="_blank"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="swiper-pagination swiper-pagination-progressbar" id="swtslide-pagination3">
			<span class="swiper-pagination-progressbar-fill"></span>
		</div>
	</div>
	<div class="swt_mid">
		<p class="mb-0 font-weight-bold"><img class="mr-1" src="/themes/simplebootx/Public/images/swt/phone.png"/>400-800-6161 / 0755-86522406</p>
		<a class="inputc" href="/swt/" target="_blank"></a>
		<a class="swtfs" href="/swt/"  target="_blank">发送</a>
	</div>
</div>



<script type="text/javascript" src="/themes/simplebootx/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/themes/simplebootx/Public/js/jquery.SuperSlide.2.1.1.js"></script>

<script>
	
	$(function() {
	
		$('.first-nav>li.sick-nav').on('mouseenter', function() {
			$('.second-nav').slideDown(250);
			$('.third-nav').removeClass('nav-line');
			$(this).find('.arrow-icon').css('display','block');
			$(this).find('.arrow-line').css('display','block');
		})
		$('.first-nav>li.sick-nav').on('mouseleave', function() {
			$('.second-nav').slideUp(250);
			$('.third-nav').addClass('nav-line');
			$(this).find('.arrow-icon').css('display','none');
			$(this).find('.arrow-line').css('display','none');
		})
		$('.second-nav>li').on('mouseenter', function() {
			$(this).children('a').addClass('second-nav-active');
			$(this).children('.third-nav').removeClass('unshow');
			$(this).siblings().children('a').removeClass('second-nav-active');
			$(this).siblings().children('.third-nav').addClass('unshow');
		})
		$('.second-nav>li').on('mouseleave', function() {
			$('.second-nav>li').siblings().children('a').removeClass('second-nav-active');
			$('.second-nav>li').siblings().children('.third-nav').addClass('unshow');
			$('.second-nav>li:first-child>a').addClass('second-nav-active');
			$('.second-nav>li:first-child>.third-nav').removeClass('unshow');
		})
		
		$('.first-nav>li.brand-nav').on('mouseenter', function() {
			$('.second-nav2').slideDown(100);
			$('.third-nav').removeClass('nav-line');
			$(this).find('.arrow-icon').css('display','block');
			$(this).find('.arrow-line').css('display','block');
		})
		$('.first-nav>li.brand-nav').on('mouseleave', function() {
			$('.second-nav2').slideUp(100);
			$('.third-nav').addClass('nav-line');
			$(this).find('.arrow-icon').css('display','none');
			$(this).find('.arrow-line').css('display','none');
		})
		
		var swtslide = new Swiper('.swtslide',{
			pagination: {
			    el: '#swtslide-pagination3',
			    type: 'progressbar',
			},
			loop : false,
			autoplay: {
			    delay: 3000,
		  	},
		  	observer: true, 
        	observerParents: true,
		  	simulateTouch : false,
		})
		
		setTimeout(function() {
			$('#new_swt').css('visibility', 'visible');
		}, 5000)

		function time() {
			var ref = setTimeout(function(){
				$('#new_swt').css('visibility', 'visible');
			}, 15000);
		}
			
		$('.swt-close').click(function(){
			$('#new_swt').css('visibility', 'hidden');
			time();
		});
	})
    
    
	
	
	jQuery(".ad_tech").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:4,prevCell:'.prev1',nextCell:'.next1'});
	jQuery("#nav1").slide({ type:"menu", titCell:".nLi", targetCell:".sub",effect:"slideDown",delayTime:300,triggerTime:0,returnDefault:true});
	jQuery(".header_nav").slide({ type:"menu", titCell:".nLi", targetCell:".sub",effect:"slideDown",delayTime:300,triggerTime:0,returnDefault:true});
	jQuery(".banner_top ul").slide({ type:"menu", titCell:".nLi", targetCell:".sub",effect:"slideDown",delayTime:300,triggerTime:0,returnDefault:true});
	$('.fix_main').find('.btn').click(function(){
		if($(this).find('i').hasClass('fa-reorder')){
			$(this).find('i').removeClass('fa-reorder').addClass('fa-times');
		}else{
			$(this).find('i').removeClass('fa-times').addClass('fa-reorder');
		}
	});
	var rn = Math.floor(Math.random()*(100-41)+40);
	$('#radNum').text(rn);
	
	jQuery(".right_advBox").slide({mainCell:".bd ul",autoPlay:true});
	jQuery(".right_doctorBox").slide({mainCell:".bd ul",autoPlay:true});
	jQuery(".right_caseBox").slide({mainCell:".bd ul",autoPlay:true});
	jQuery(".right_hotsBox").slide({mainCell:".bd ul",autoPlay:true});
	//跟踪地址
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
	
	//商务通
	function swtClick(){
		 window.open('http://swt.szddkqyy.com/LR/chatwin.aspx?id=MTI57225838');
	}
	
	//百度统计代码
	var _hmt = _hmt || [];
	(function() {
	  var hm = document.createElement("script");
	  hm.src = "https://hm.baidu.com/hm.js?322d32dd7cecca6b5c9dd7460b3edf07";
	  var s = document.getElementsByTagName("script")[0]; 
	  s.parentNode.insertBefore(hm, s);
	})();
	
	
	
	
</script>

<script>
	$('.tsxm').hover(function(){
		$('.if_pop').animate({
			height: '256px'
		});
	},function(){
		$('.if_pop').animate({
			height: '0'
		});
	});
	$('.code').hover(function(){
		$('.smcode').animate({
			width: '200px',
			opacity: '1',
		});
	},function(){
		$('.smcode').animate({
			width: '0'
		});
	});

	$('.return-top').on('click', function() {
		$('html,body').animate({ scrollTop: 0 }, 500);
	})

	$(function() {
		$('.fixed-close').on('click', function() {
			$(this).parent().parent('div').fadeOut();
			setTimeout(function() {
				$('.fixed-left').css('display', 'block');
				$('.fixed-right').css('display', 'block');
			}, 20000)
		})

	})
</script>
-->
</body>
<script src="js/jsapi.js"></script>
<script src="js/coveringBad.js"></script>
<script type="text/javascript">
	jQuery(".banner").slide({mainCell:"ul",effect:"leftLoop",autoPlay:true,interTime:5000});
	jQuery(".box5 .bd").slide({mainCell:".shows ul",autoPlay:true,effect:"leftLoop",vis:2});
	jQuery(".box6").slide({mainCell:".bd .doctor",autoPlay:true,effect:"fold",interTime:5000});
	$(".box4 dl").hover(function(){
		$(this).addClass("on");
	},function(){
		$(this).removeClass("on");
	})
	$('.second').coveringBad({
		marginY : 20 ,
		marginX : 20 ,
		setX  : 100,
		setY  : 85 ,
		direction   : "horizontal"
	});
</script> 
</html>