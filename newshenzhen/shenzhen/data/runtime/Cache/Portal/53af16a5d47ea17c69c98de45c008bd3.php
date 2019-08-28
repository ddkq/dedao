<?php if (!defined('THINK_PATH')) exit();?><!--来院路线-->
<!DOCTYPE html>
<html>
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
	<link href="/themes/simplebootx/Public/css/page.css" rel="stylesheet" type="text/css">
	<title><?php echo ($post_title); ?>_<?php echo ($site_name); ?></title>
	<meta name="keywords" content="<?php echo ($post_keywords); ?>"/>
	<meta name="description" content="<?php echo ($post_excerpt); ?>" />
	</head>
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
					<i class="vertical"></i>
					<span class="shanghai">上海</span>
					<i class="vertical"></i>
					<span class="guangzhou">广州</span>
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
		
		<div class="main_img">
			<img src="/themes/simplebootx/Public/images/brand/banner.png"/>
		</div>
		
		<div class="brand_main clearfix">
			<div class="brand_left">
	<div class="brand_left_hd">
		<strong>关于德道</strong>
		<span>About dedao</span>
	</div>
	<div class="brand_left_bd">
		<ul>
			<li><a target="_self" href="/about.html"><i class="fa fa-angle-right"></i><em>品牌诠释</em></a></li>
			<li><a target="_self" href="/brand_interpretation.html"><i class="fa fa-angle-right"></i><em>品牌荣誉</em></a></li>
			<li><a target="_self" href="/list/146.html"><i class="fa fa-angle-right"></i><em>品牌活动</em></a></li>
			<li><a target="_self" href="/list/148.html"><i class="fa fa-angle-right"></i><em>媒体报道</em></a></li>
			<li><a target="_self" href="/department/7.html"><i class="fa fa-angle-right"></i><em>医疗团队</em></a></li>
			<!--<li><a target="_self" href="#"><i class="fa fa-angle-right"></i><em>真实案例</em></a></li>-->
			<li><a target="_self" href="/list/105.html"><i class="fa fa-angle-right"></i><em>先进设备</em></a></li>
			<!--<li><a target="_self" href="/list/149.html"><i class="fa fa-angle-right"></i><em>精彩视频</em></a></li>-->
			<li><a target="_self" href="/environment.html"><i class="fa fa-angle-right"></i><em>院内环境</em></a></li>
			<li><a target="_self" href="/traffic.html"><i class="fa fa-angle-right"></i><em>来院路线</em></a></li>
			<li><a target="_self" href="/"><i class="fa fa-angle-right"></i><em>返回首页</em></a></li>
		</ul>
	</div>
</div>

			<div class="brand_right">
				<div class="brand_path">当前位置：<a href="/">首页</a> &gt; <?php echo ($post_title); ?></div>
				<h1 class="brand_right_hd"><?php echo ($post_title); ?></h1>
				<div class="brand_rongyu_info"><?php echo ($post_content); ?></div>
				<div class="traffic_box">
				    <div id="allmap" style="height:700px;width:855px;"></div>
				    <div class="busBox">请输入您的位置：
				   		<input type="text" class="mapStart">
			            <select>
			                <option value="0">最少时间</option>
			                <option value="1">最少换乘</option>
			                <option value="2">最少步行</option>
			                <option value="3">不乘地铁</option>
			            </select>
			            <input type="button" id="result" value="查询"/>
				    </div>
				    <div id="r-result"></div>
				</div>
				<div class="brand_btns">
					<ul class="clearfix">
						<li>
							<a href="/swt/"  target="_blank">
								<div class="brand_statu1">
									<i class="fa fa-microphone"></i>
									<b>健康咨询</b>
									<span>health inquiry</span>
								</div>
								<div class="brand_statu2">
									<p>德道提供免费健康咨询服务，也可添加德道口腔公众号：深圳德道口腔医院，了解护牙知识。</p>
									<span>&gt;&gt;点击预约</span>
								</div>
							</a>
						</li>
						<li>
							<a href="/swt/"  target="_blank">
								<div class="brand_statu1">
									<i class="fa fa-user-md"></i>
									<b>预约医生</b>
									<span>make an appointment</span>
								</div>
								<div class="brand_statu2">
									<p>可在我院免费预约，到院无需排队可享受VIP就诊。</p>
									<span>&gt;&gt;点击预约</span>
								</div>
							</a>
						</li>
						<li class="last">
							<a href="/swt/"  target="_blank">
								<div class="brand_statu1">
									<i class="fa fa-map-marker"></i>
									<b>来院指引</b>
									<span>Hospital guidance</span>
								</div>
								<div class="brand_statu2">
									<p>德道口腔全国连锁机构，就近就医或选喜欢的机构，来院前可联系导医获取交通指南。</p>
									<span>&gt;&gt;获取交通指南</span>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		


	</body>

	

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
				<font><i>医院地址：</i><b>广东省深圳市南山区桂庙路5号仲良大厦8楼（德道口腔）</b></font>
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

	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=NRSdUGWelRPGWYobbVE3bm3kq3KLMGpl"></script>
	<script type="text/javascript">
	    // 百度地图API功能
	    var map = new BMap.Map("allmap");
	    // 创建地址解析器实例
	    var myGeo = new BMap.Geocoder();
	    // 将地址解析结果显示在地图上,并调整地图视野
	    var point  = new BMap.Point(113.933129,22.528875)
	    map.centerAndZoom(point, 18);
	    map.addOverlay(new BMap.Marker(point));
	    //var myIcon = new BMap.Icon("/APP/Public/images/map-logo.png", new BMap.Size(80,49));
	    var marker2 = new BMap.Marker(point,"深圳市南山区桂庙路南侧5号龙意成大楼8/9楼");  // 创建标注
	    map.addOverlay(marker2);              // 将标注添加到地图中
		map.addControl(new BMap.MapTypeControl({ anchor: BMAP_ANCHOR_TOP_RIGHT, offset: new BMap.Size(10, 10) }));  
	    map.addControl(new BMap.NavigationControl());               // 添加平移缩放控件  
	    map.addControl(new BMap.ScaleControl());                    // 添加比例尺控件  
	    map.addControl(new BMap.OverviewMapControl());              //添加缩略地图控件  
	    map.addControl(new BMap.OverviewMapControl({ anchor: BMAP_ANCHOR_BOTTOM_RIGHT, isOpen: 1 }));  
		var sContent =  
			"<h4 style='margin:0 0 5px 0;padding:0.2em 0'>深圳德道口腔门诊部</h4>" +  
			"<p style='margin:0;line-height:1.5;font-size:13px;'>地址：深圳市南山区桂庙路南侧5号龙意成大楼8/9楼<br/>电话：400-800-6161/0755-86522406</p>" +  
			"</div>";  
	    var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象  
	    map.openInfoWindow(infoWindow, map.getCenter());      // 打开信息窗口 
	
	    var end = "深圳德道口腔门诊部";
	    var routePolicy = [BMAP_TRANSIT_POLICY_LEAST_TIME,BMAP_TRANSIT_POLICY_LEAST_TRANSFER,BMAP_TRANSIT_POLICY_LEAST_WALKING,BMAP_TRANSIT_POLICY_AVOID_SUBWAYS];
	    var transit = new BMap.TransitRoute(map, {
	        renderOptions: {map: map},
	        policy: 0
	    });
	    $(function(){
	        $("#result").on("click",function(){
	            var start=$(".mapStart").val();
	            if(start.length == 0){
	                alert("请输入您的位置");
	            }
	            map.clearOverlays();
	            var transit = new BMap.TransitRoute(map, {
	                renderOptions: {map: map, panel: "r-result"}
	            });
	            var i=$("#driving_way select").val();
	            search(start,end,routePolicy[i]);
	            function search(start,end,route){
	                transit.setPolicy(route);
	                transit.search(start,end);
	            }
	        });
	    })
	</script>
</html>