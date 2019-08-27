<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
<!--<script language="javascript" src="http://swt.cdddkqyy.com/JS/LsJS.aspx?siteid=MRW75183048&lng=cn"></script>-->
<script language="javascript" src="//scripts.easyliao.com/js/easyliao.js"></script>
<script>
	var script=document.createElement("script");
	script.type="text/javascript";
	script.src="//scripts.easyliao.com/16524/27486/lazy.js";
	document.getElementsByTagName('head')[0].appendChild(script);
	script.onload=function(){}
</script>

	<link href="/themes/simplebootx/Public/css/article.css" rel="stylesheet" type="text/css">
	<link href="/themes/simplebootx/Public/css/share.min.css" rel="stylesheet" type="text/css">
	<title><?php echo ($article["post_title"]); ?>_<?php echo ($site_name); ?></title>
	<meta name="keywords" content="<?php echo ($article["post_keywords"]); ?>"/>
	<meta name="description" content="<?php echo ($article["post_excerpt"]); ?>" />
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
						<span>健康热线: 400-800-6161 / 028-67696635</span>
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
			<div class="flex">
				<div class="header-logo-first flex align-items-center">
					<i class="header-icon"></i>
					<span>成都即刻用<br/>种植牙研究院</span>
				</div>
				<i class="vertical"></i>
				<div class="header-logo-second flex align-items-center">
					<i class="header-icon"></i>
					<span>麦哲伦<br/>数字化中心</span>
				</div>
				<i class="vertical"></i>
				<div class="header-logo-third flex align-items-center">
					<i class="header-icon"></i>
					<span>市医保<br/>定点单位</span>
				</div>
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
					<div><a href="#">种牙项目</a></div>
				</li>
				<li>
					<div><a onclick="openJesongChatByGroup(16524,20125);">种牙案例</a></div>
				</li>
				<li>
					<div><a href="/department/7.html">种牙专家</a></div>
				</li>
				<li>
					<div><a href="/list/105.html">种牙设备</a></div>
				</li>
				<li>
					<div><a href="/zt/correct">牙齿矫正</a></div>
				</li>
				<li>
					<div><a onclick="openJesongChatByGroup(16524,20125);">牙齿修复</a></div>
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
		
		<div class="pdbanner">
			<div class="hd">
				<ul>
					<?php if(is_array($ad)): $k = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li><?php echo ($k); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="bd">
				<ul>
					<?php if(is_array($ad)): $i = 0; $__LIST__ = $ad;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["slide_url"]); ?>" target="_blank"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		
		<ol class="breadcrumb">
			<i class="fa fa-home"></i>
			<li>您所在的位置</li>
			<li><a href="/">首页</a></li>
			<?php if(is_array($breadcrumb)): $i = 0; $__LIST__ = $breadcrumb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/list/<?php echo ($vo["term_id"]); ?>.html"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
			<li><a href="/list/<?php echo ($term["term_id"]); ?>.html"><?php echo ($term["name"]); ?></a></li>
		</ol>
		
		<div class="main_content clearfix">
			<div class="title clearfix">
		        <h3><?php echo ($article["post_title"]); ?></h3>
		        <div class="botton">
		        	<!-- <a href="javascript:" class="ioc1"><i class="fa fa-weixin"></i>微信客服</a>
		        	<div id="qrcode"><img src="/themes/simplebootx/Public/images/smcode.jpg" alt=""></div> -->
		            <a onclick="openJesongChatByGroup(16524,20125);" class="ioc2"><i class="fa fa-commenting"></i>咨询</a>
		            <a onclick="openJesongChatByGroup(16524,20125);" class="ioc3"><i class="fa fa-calendar"></i>预约</a>
		        </div>
		    </div>
			<div class="LEFT">
				<div class="content clearfix">
					<div class="LeftTool">
						<div class="left-stick-wp" style="top: 0px;">
							<div class="year through"><span><?php echo ($year); ?></span></div>
							<div class="md"><?php echo ($month); ?></div>
							<div class="time"><?php echo ($hour); ?></div>
							<div class="share-title through"><span>分享</span></div>
							<div class="share"></div>
						</div>
					</div>
					<div class="content-article"><?php echo ($article[post_content]); ?></div>
					<div class="advisory clearfix">
						<div class="col-md-6">
							<img src="/themes/simplebootx/Public/images/article_logo.png">
							<span>您身边的口腔医生</span>
							<p>免费在线咨询</p>
						</div>
						<div class="col-md-6">
							<a onclick="openJesongChatByGroup(16524,20125);" class="col-md-3"><i class="fa fa-commenting-o"></i>在线咨询</a>
							<a onclick="openJesongChatByGroup(16524,20125);" class="col-md-3"><i class="fa fa-user-md"></i>预约专家</a>
							<a onclick="openJesongChatByGroup(16524,20125);" class="col-md-3"><i class="fa fa-cny"></i>价格咨询</a>
							<a href="/traffic.html" target="_blank" class="col-md-3"><i class="fa fa-level-up"></i>来源路线</a>
						</div>
					</div>
					<div class="next clearfix">
						<?php if(!empty($prev)): ?><a href="<?php echo get_article_url($prev['tid'],$prev['link_type'],$prev['post_url']);?>" class="col-md-6"><i class="fa fa-chevron-circle-left"></i><?php echo ($prev["post_title"]); ?></a><?php endif; ?>
						<?php if(!empty($next)): ?><a href="<?php echo get_article_url($next['tid'],$next['link_type'],$next['post_url']);?>" class="col-md-6"><i class="fa fa-chevron-circle-right"></i><?php echo ($next["post_title"]); ?></a><?php endif; ?>
					</div>
					<div class="recommend clearfix">
						<p>相关阅读:</p>
						<ul>
							<?php if(is_array($hits)): $i = 0; $__LIST__ = $hits;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo[tid]) == $cid): else: ?>
									<li><a href="<?php echo get_article_url($vo[tid],$vo[link_type],$vo[post_url]);?>" target="_blank"><?php echo ($vo["post_title"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
					
					
					<div class="comments" data-aid="<?php echo ($article_id); ?>">
			
					</div>
					<ul class="pages flex">
						<li class="prev-page"></li>
						<li class="next-page"></li>
					</ul>
					
					<div class="comment_post" id="comment_post">
						<form class="comment-form" method="post">
							<div class="control-group">
								<div class="comment-postbox-wraper">
									<textarea class="form-control comment-postbox" placeholder="请输入评论内容" style="min-height:90px;" name="content"></textarea>
								</div>
							</div>
							<div class="control-group">
								<input type="text" name="full_name" value="" placeholder="名称" />
								<input type="text" name="verify" value="" placeholder="验证码" /> <?php echo sp_verifycode_img('length=4&font_size=14&width=100&height=34&charset=1234567890&use_noise=1&use_curve=0');?>

								<button type="button" class="btn pull-right btn-primary comment-submit"><i class="fa fa-comment-o"></i> 发表评论</button>
							</div>
						
							<input type="hidden" name="post_title" value="<?php echo ($article["post_title"]); ?>" />
							<input type="hidden" name="post_table" value="posts" />
							<input type="hidden" name="post_id" value="<?php echo ($article_id); ?>" />
							<input type="hidden" name="url" value="" />
							<input type="hidden" name="to_uid" value="0" />
							<input type="hidden" name="parentid" value="0" />
						</form>
					</div>

					
				</div>
			</div>
			<?php  $doctor = sp_get_doctor(); $i = 0; foreach ($doctor as $k => $v) { if($i >= 5){ unset($doctor[$k]); }else{ if($v['recommended'] == 0){ unset($doctor[$k]); }else{ $extend = json_decode($v['post_extend'],true); $doctor[$k]['main_img'] = $extend['thumb']; $doctor[$k]['experience'] = explode(",",$extend['post_extend5']); $doctor[$k]['item'] = $extend['post_extend1']; $i++; } } } $case_where['recommended'] = 1; $case = sp_sql_posts_bycatid(108,'field:tid,post_title,smeta,post_extend;limit:0,5;',$case_where); $hots = sp_sql_posts_bycatid(62,'field:tid,post_title,post_excerpt,smeta,post_url,link_type;limit:0,4;',$case_where); ?>

<div class="RIGHT">

	
	<div class="doctor">
		<h3>口腔专家<a href="/department/7.html">MORE+</a></h3>
		<div id="right_doctorBox" class="right_doctorBox">
			<div class="hd">
				<ul>
					<?php if(is_array($doctor)): $k = 0; $__LIST__ = $doctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="bd">
				<ul>
					<?php if(is_array($doctor)): $i = 0; $__LIST__ = $doctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<img src="<?php echo ($vo["main_img"]); ?>" />
						<div class="info">
							<h4><?php echo ($vo["name"]); ?><span><?php echo ($vo["job"]); ?></span></h4>
						</div>
						<p class="item">擅长:<?php echo ($vo["item"]); ?></p>
						<div class="swt">
							<a onclick="openJesongChatByGroup(16524,20125);"><i class="fa fa-commenting-o"></i>在线咨询</a>
							<a onclick="openJesongChatByGroup(16524,20125);"><i class="fa fa-user"></i>定制方案</a>
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="case">
		<h3>成功案例<a href="/list/108.html">MORE+</a></h3>
		<div id="right_caseBox" class="right_caseBox">
			<div class="hd">
				<ul>
					<?php if(is_array($case)): $k = 0; $__LIST__ = $case;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="bd">
				<ul>
					<?php if(is_array($case)): $i = 0; $__LIST__ = $case;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a href="#" target="_blank">
								<?php $smeta = json_decode($vo['smeta'],true); ?>
								<img src="<?php echo ($smeta["thumb"]); ?>" />
								<p><?php echo ($vo["post_title"]); ?></p>
							</a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
	
	<div class="hots">
		<h3>热门推荐</h3>
		<ul>
			<?php if(is_array($hots)): $i = 0; $__LIST__ = $hots;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<a href="<?php echo get_article_url($vo[tid],$vo[link_type],$vo[post_url]);?>" target="_blank"><?php echo ($vo["post_title"]); ?></a>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	
	<div class="contact">
		<div class="tel">
			<i class="fa fa-phone"></i>
			<div>
				<p>24小时热线</p>
				<p>400-800-6161</p>
				<p>028-67696635</p>
			</div>
		</div>
		<div class="time">
			<i class="fa fa-clock-o"></i>
			<div>
				<p>服务时间：</p>
				<p>门诊：9:00-18:00</p>
			</div>
		</div>
		<div class="swt">
			<a onclick="openJesongChatByGroup(16524,20125);"><i class="fa fa-commenting-o"></i>在线咨询</a>
			<a onclick="openJesongChatByGroup(16524,20125);"><i class="fa fa-user"></i>定制方案</a>
		</div>
	</div>
	
	
	<div class="upsetBox">
		<h2><span>你在<em>烦恼</em>这些吗？<i></i></span></h2>
		<div class="upsetCon">
			<a onclick="openJesongChatByGroup(16524,20125);" class="ioc10">牙齿矫正多少钱 </a>
			<a onclick="openJesongChatByGroup(16524,20125);" class="ioc11">拔牙多少钱 </a>
			<a onclick="openJesongChatByGroup(16524,20125);" class="ioc12">种植牙多少钱一颗 </a>
			<a onclick="openJesongChatByGroup(16524,20125);" class="ioc4">树脂贴面什么价格 </a>
			<a onclick="openJesongChatByGroup(16524,20125);" class="ioc5">最便宜的箍牙多少钱 </a>
			<a onclick="openJesongChatByGroup(16524,20125);" class="ioc6">现在镶牙好还是种牙好 </a>
			<a onclick="openJesongChatByGroup(16524,20125);" class="ioc7">镶牙多少钱 </a>
			<a onclick="openJesongChatByGroup(16524,20125);" class="ioc8">牙齿有些突，有什么办法可以解决？</a>
			<a onclick="openJesongChatByGroup(16524,20125);" class="ioc9">烤瓷牙如何收费 </a>
	
		</div>
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
						<a onclick="openJesongChatByGroup(16524,20125);"></a>
					</li>
					<li class="lcli02">
						<a onclick="openJesongChatByGroup(16524,20125);"></a>
					</li>
					<li class="lcli03">
						<a onclick="openJesongChatByGroup(16524,20125);"></a>
					</li>
					<li class="lcli04">
						<a onclick="openJesongChatByGroup(16524,20125);"></a>
					</li>
					<li class="lcli05">
						<a onclick="openJesongChatByGroup(16524,20125);"></a>
					</li>
				</ul>
			</div>
		</div>
		<a onclick="openJesongChatByGroup(16524,20125);" class="a1" title="在线挂号"></a>
		<a href="/list/180.html" target="_blank" class="a2" title="当月特惠活动"></a>
		<a href="#" class="downup" target="_self" title="返回顶部"></a>
	</div>
</div>

<div class="fixed-left" style="width: 12%;">
	<div>
		<a onclick="openJesongChatByGroup(16524,20125);"><img src="/themes/simplebootx/Public/images/activity1.png" alt=""></a>
		<i class="fa fa-close fixed-close"></i>
	</div>
</div>
<div class="fixed-right">
	<div>
		<a onclick="openJesongChatByGroup(16524,20125);"><img src="/themes/simplebootx/Public/images/activity3.gif" alt=""></a>
		<i class="fa fa-close fixed-close"></i>
	</div>
</div>


<div id="footer">
	<div class="footer">
		<div class="footer_left">
			<img src="/themes/simplebootx/Public/images/footer_logo.png" />
		</div>
		<div class="footer_middle">
			<div class="list">
				<ul>
					<h3>关于我们</h3>
					<li><a href="/about.html">德道品牌</a></li>
					<li><a href="/department/7.html">专家团队</a></li>
					<li><a href="/list/105.html">前沿技术</a></li>
					<li><a href="/list/146.html">德道资讯</a></li>
					<li><a href="/traffic.html">联系我们</a></li>
					<li><a href="/traffic.html">来院路线</a></li>
				</ul>
				<ul>
					<h3>口腔项目</h3>
					<li><a href="/zt/2018-12-27-jky">种植中心</a></li>
					<li><a href="/zt/correct">正畸中心</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">牙齿修复</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">根管治疗</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">牙病治疗</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">儿童齿科</a></li>
				</ul>
				<ul>
					<h3>热门关注</h3>
					<li><a href="/zt/s-missing">门牙缺失</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">牙齿拥挤</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">牙齿稀疏</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">牙齿缺损</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">龋齿(蛀牙)</a></li>
					<li><a onclick="openJesongChatByGroup(16524,20125);">牙周炎</a></li>
				</ul>
			</div>
		</div>-->
		<div class="footer_right">
			<!--<h3>官方微信</h3>
			<div class="qrcode clearfix">
				<img src="/themes/simplebootx/Public/images/qrcode.png" />
				<div class="text">
					<p>[扫一扫]</p>
					<p>关注德道官方微信<br/>资讯优惠尽在掌握</p>
					<img src="/themes/simplebootx/Public/images/shake.png" />
				</div>
			</div>-->
			<div class="tel">
				<font><i>医院地址：</i><b>成都市青羊区金凤路19号附1号</b></font>
				<font>电话：400-800-6161 / 028-67696635</font>
			</div>
		</div>
	</div>
</div>
<div id="copy">
	<div class="copy">
		<p class="mb-0">CopyRight © 2017 成都青羊德道口腔医院 版权所有</p>
		<p class="mb-0">
			<a href="http://www.miitbeian.gov.cn" target="_blank">ICP备案号：蜀ICP备18017345号-1</a>
			<a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=51010502010725">
				<img src="/themes/simplebootx/Public/images/ga-icon.png" style="float:left;" />川公网安备 51010502010725号
			</a>
			广审号：（成青） 医广【2019】第03-12-510105020号
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
		<p class="mb-0 font-weight-bold"><img class="mr-1" src="/themes/simplebootx/Public/images/swt/phone.png"/>400-800-6161 / 028-67696635</p>
		<a class="inputc" onclick="openJesongChatByGroup(16524,20125);"></a>
		<a class="swtfs" onclick="openJesongChatByGroup(16524,20125);">发送</a>
	</div>
</div>



<script>
	
	/*function openJesongChatByGroup(m,n){
		window.open('http://swt.cdddkqyy.com/LR/chatwin.aspx?id=MRW75183048');
	}*/
	
	
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
	

	
	//百度统计代码
	var _hmt = _hmt || [];
	(function() {
	  var hm = document.createElement("script");
	  hm.src = "https://hm.baidu.com/hm.js?4cacc15b117be8562b33d04284b6d5d7";
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



	<script type="text/javascript" src="/themes/simplebootx/Public/js/jquery.share.min.js"></script>
	<script>
		jQuery(".pdbanner").slide({mainCell:".bd ul",autoPlay:true});
		$('.ioc1').hover(function(){
			$('#qrcode').animate({
				height: '207px',
				opacity: '1',
			});
		},function(){
			$('#qrcode').animate({
				height: '0'
			});
		});
		$('.share').share({sites: ['wechat','qq','qzone','weibo']});
		
		$(function(){
			$("input[name='url']").attr('value',window.location.href);
			var page = 1;
			var aid = $('.comments').data('aid');
			var pageCount = '';
			$.post('/comment/comment/index.html',{page:page,aid:aid},function(data){
				//console.log(data)
				
				pageCount = data[0].page_count;
				if(pageCount == 0){
					return;
				}
				var li = '';
				var html = '';
				for(var i = 1; i <= data[0].page_count; i ++) {
					li += `<li class="page-num">${i}</li>`
				}
				for(var i = 0; i < data.length; i ++) {
					html += `<div class="comment flex" data-id="${data[i].id}">
								<div class="head-img">
									<img class="avatar" src="/themes/simplebootx/Public/images/headicon.png" class="headicon">
								</div>
								<div class="comment-body">
									<div class="comment-content">
										<p class="username">
											${data[i].full_name}
											<span class="comment-time">${data[i].createtime}</span>
										</p>
										<p class="content-text">${data[i].content}</p>
									</div>
								    <div class="clearfix">
										<a class="comments-like click-like" href="javascript:;">
											<i class="fa fa-thumbs-o-up"></i>
											<span class="like-num">${data[i].comment_like}</span>
										</a>
										<a class="comment_reply">回复</a>
									</div>
								</div>
							</div>`;
				}
				$('.comments').html(html);
				$('.comments div').eq(0).before(`<h3>全部评论</h3>`);
				$('.pages li').eq(0).after(li);
				$('.pages li').eq(1).addClass('list-on');
				$('.next-page').html('下一页');
			});

			$('body').on('click', '.next-page', function() {
				page ++;
				page == pageCount ? $('.next-page').html('') : ''
				$('.prev-page').html('上一页');
				$('.list-on').removeClass('list-on').next().addClass('list-on');
				$('.comments').html();

				getComment(page);
			})
			
			$('body').on('click', '.prev-page', function() {
				page --;
				page == 1 ? $('.prev-page').html('') : ''
				$('.next-page').html('下一页');
				$('.list-on').removeClass('list-on').prev().addClass('list-on');
				$('.comments').html();

				getComment(page);
			})

			$('body').on('click', '.page-num', function() {
				var pageNum = $(this).text();
				$('.comments').html();
				$(this).addClass('list-on').siblings().removeClass('list-on');
				$('.prev-page').html('上一页');
				$('.next-page').html('下一页');
				if(pageNum == 1) {
					$('.prev-page').html('');
				}
				else if(pageNum == pageCount){
					$('.next-page').html('');
				}
				page = pageNum;

				getComment(pageNum);
			})

			function getComment(pag) {
				var html = '';
				$.post('/comment/comment/index.html',{page:pag,aid:aid},function(data){
					for(var i = 0; i < data.length; i ++) {
						html += `<div class="comment flex" data-id="${data[i].id}">
									<div class="head-img">
										<img class="avatar" src="/themes/simplebootx/Public/images/headicon.png" class="headicon">
									</div>
									<div class="comment-body">
										<div class="comment-content">
											<p class="username">
												${data[i].full_name}
												<span class="comment-time">${data[i].createtime}</span>
											</p>
											<p class="content-text">${data[i].content}</p>
										</div>
									    <div class="clearfix">
											<a class="comments-like click-like" href="javascript:;">
												<i class="fa fa-thumbs-o-up"></i>
												<span class="like-num">${data[i].comment_like}</span>
											</a>
											<a class="comment_reply" >回复</a>
										</div>
									</div>
								</div>`;
					}
					$('.comments').html(html);
					$('.comments div').eq(0).before(`<h3>全部评论</h3>`);
				});
			}
		});
		$('.comment-submit').click(function(){
			
			var content = $('.comment-postbox').text();
			if(content == ''){
				alert("评论内容不能为空");
				return false;
			}
			var name = $("input[name=full_name]").val();
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
			
			var data = $('.comment-form').serializeArray();
			$.post('/comment/comment/post.html',data,function(result){
				alert(result.info);
				window.location.reload();
			});
		});
		
		$('body').on('click','.comments-like',function(){
			var id = $(this).parents('.comment').data('id');
			var like = $(this).find('.like-num');
			var num = parseInt(like.html());
			$(this).removeClass('comments-like');
			$.post('/comment/comment/do_like.html',{id,id},function(data){
				if(data.status){
					num+=1;
					like.html(num);
				}
			});
		});
		
		$('body').on('click', '.comment_reply', function() {
			$("html,body").stop(true);
			$("html,body").animate({scrollTop: $("#comment_post").offset().top - 150}, 500);
		})
		
		
	</script>
</html>