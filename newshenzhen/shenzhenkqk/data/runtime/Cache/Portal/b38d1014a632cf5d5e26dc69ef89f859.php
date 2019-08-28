<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
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
	<title><?php echo ($site_seo_title); ?></title>
	<meta name="keywords" content="<?php echo ($site_seo_keywords); ?>" />
	<meta name="description" content="<?php echo ($site_seo_description); ?>" />
	<link rel="stylesheet" href="/themes/simplebootx/Public/css/new-index.css">
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

	<section class="content1">
		<div class="banner swiper-container">
			<ul class="swiper-wrapper">
				<?php if(is_array($slides)): $i = 0; $__LIST__ = $slides;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="swiper-slide">
						<a href="<?php echo ($vo["slide_url"]); ?>" target="_blank" class="<?php echo ($vo["slide_des"]); ?>">
							<img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" />
							<?php echo htmlspecialchars_decode($vo[slide_content]);?>
						</a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<div class="swiper-pagination"></div>
			<div class="arrow-right next"><i class="arrow"></i></div>
			<div class="arrow-left prev"><i class="arrow"></i></div>
		</div>
		<ul class="banner-bottom-msg flex content-width">
			<li class="banner-bottom-active">
				<a href="/zt/s-missing">
					<div class="banner-bottom-msg-left"><i class="index-icon"></i></div>
					<div class="banner-bottom-msg-right">
						<p>单颗缺牙</p>
					</div>
				</a>
			</li>
			<li>
				<a href="/swt" target="_blank">
					<div class="banner-bottom-msg-left"><i class="index-icon"></i></div>
					<div class="banner-bottom-msg-right">
						<p>半口缺牙</p>
					</div>
				</a>
			</li>
			<li>
				<a href="/swt" target="_blank">
					<div class="banner-bottom-msg-left"><i class="index-icon"></i></div>
					<div class="banner-bottom-msg-right">
						<p>全口缺牙</p>
					</div>
				</a>
			</li>
		</ul>
	</section>
	
	<section class="content2">
		<div class="content-width">
			<div class="content-title">
				<h1><i class="index-icon"></i>德道口腔 AI+ 即刻 3.0 技术中心</h1>
			</div>
			<div class="flex content2-detail">
					<div><img src="/themes/simplebootx/Public/images/index-content2.gif" alt=""></div>
				<div>
					<div class="content2-video-box">
						<img src="/themes/simplebootx/Public/images/technology.gif" controls="controls" width="100%" />
					</div>
					<div><img src="/themes/simplebootx/Public/images/index-content2.jpg" alt=""></div>
				</div>
			</div>
		</div>
	</section>
	

	<!-- <section class="content-width swt-img-box"><a onclick="openJesongChatByGroup(16524,20125);"><img src="/themes/simplebootx/Public/images/ad.jpg" alt=""></a></section> -->
	
	
	<section class="content-width content4">
		<div class="content-title">
			<h1>
				<i class="index-icon"></i>智能口腔中心
				<span class="content-more"><a href="/list/62.html">更多 ></a></span>
			</h1>
		</div>
		<ul class="flex content4-tab">
			<li class="content4-tab-active"><i class="index-icon"></i>牙齿种植</li>
			<li><i class="index-icon"></i>牙齿正畸</li>
			<li><i class="index-icon"></i>牙齿修复</li>
			<li><i class="index-icon"></i>儿童口腔</li>
			<li><i class="index-icon"></i>综合治疗</li>
		</ul>
		<div class="swiper-container content4-1">
			<div class="content4-bottom-detail swiper-wrapper">
				<div class="swiper-slide">
					<ul class="flex content4-second-tab1 content4-second-tab">
						<?php if(is_array($sick1)): $i = 0; $__LIST__ = $sick1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s1): $mod = ($i % 2 );++$i; if($i == 1): ?><li class="content4-second-active"><?php echo ($s1["name"]); ?></li>
							<?php else: ?>
								<li><?php echo ($s1["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<div class="swiper-container content4-2">
						<div class="swiper-wrapper">
							<?php if(is_array($sick1)): $i = 0; $__LIST__ = $sick1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s1): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
									<div class="flex content4-detail">
										<ul class="content-img-box flex">
											<li>
												<a onclick="openJesongChatByGroup(16524,20125);">
													<img src="/themes/simplebootx/Public/images/content4-img-list1-1.jpg" alt="">
													<div class="detail-hover unshow"><span>单颗<br>种植</span></div>
												</a>
											</li>
											<li>
												<a onclick="openJesongChatByGroup(16524,20125);">
													<img src="/themes/simplebootx/Public/images/content4-img-list1-2.jpg" alt="">
													<div class="detail-hover unshow"><span>多颗<br>种植</span></div>
												</a>
											</li>
											<li>
												<a onclick="openJesongChatByGroup(16524,20125);">
													<img src="/themes/simplebootx/Public/images/content4-img-list1-3.jpg" alt="">
													<div class="detail-hover unshow"><span>门牙<br>种植</span></div>
												</a>
											</li>
											<li>
												<a onclick="openJesongChatByGroup(16524,20125);">
													<img src="/themes/simplebootx/Public/images/content4-img-list1-4.jpg" alt="">
													<div class="detail-hover unshow"><span>全口<br>种植</span></div>
												</a>
											</li>
										</ul>
										<div class="content4-right-text">
											<div>
												<div class="date">
													<span><?php echo date('m-d',strtotime($s1[commended_article][post_modified]));?></span><br>
													<span><?php echo date('Y',strtotime($s1[commended_article][post_modified]));?></span>
												</div>
												<div class="content4-msg">
													<a href="<?php echo get_article_url($s1[commended_article][tid],$s1[commended_article][link_type],$s1[commended_article][post_url]);?>">
														<h1><?php echo ($s1[commended_article][post_title]); ?></h1>
														<p><?php echo ($s1[commended_article][post_excerpt]); ?></p>
													</a>
												</div>
											</div>
											<div class="link-list">
												<ul>
													<?php if(is_array($s1['etc_article'])): $i = 0; $__LIST__ = $s1['etc_article'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
															<a href="<?php echo get_article_url($vo[tid],$vo[link_type],$vo[post_url]);?>" style="display: block;"><?php echo ($vo["post_title"]); ?><span><?php echo date('Y-m-d',strtotime($vo[post_modified]));?></span></a>
														</li><?php endforeach; endif; else: echo "" ;endif; ?>
												</ul>
											</div>
										</div>
									</div>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>
				<div class="swiper-slide">
					<ul class="flex content4-second-tab2 content4-second-tab">
						<?php if(is_array($sick2)): $i = 0; $__LIST__ = $sick2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s1): $mod = ($i % 2 );++$i; if($i == 1): ?><li class="content4-second-active"><?php echo ($s1["name"]); ?></li>
							<?php else: ?>
								<li><?php echo ($s1["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<div class="swiper-container content4-3">
						<div class="swiper-wrapper">
							<?php if(is_array($sick2)): $i = 0; $__LIST__ = $sick2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s1): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
									<div class="flex content4-detail">
										<ul class="content-img-box flex">
											<li>
												<a onclick="openJesongChatByGroup(16524,20125);">
													<img src="/themes/simplebootx/Public/images/content4-img-list2-1.jpg" alt="">
													<div class="detail-hover unshow"><span>陶瓷<br>正畸</span></div>
												</a>
											</li>
											<li>
												<a onclick="openJesongChatByGroup(16524,20125);">
													<img src="/themes/simplebootx/Public/images/content4-img-list2-2.jpg" alt="">
													<div class="detail-hover unshow"><span>舌侧<br>正畸</span></div>
												</a>
											</li>
											<li>
												<a onclick="openJesongChatByGroup(16524,20125);">
													<img src="/themes/simplebootx/Public/images/content4-img-list2-3.jpg" alt="">
													<div class="detail-hover unshow"><span>传统<br>正畸</span></div>
												</a>
											</li>
											<li>
												<a onclick="openJesongChatByGroup(16524,20125);">
													<img src="/themes/simplebootx/Public/images/content4-img-list2-4.jpg" alt="">
													<div class="detail-hover unshow"><span>隐形<br>正畸</span></div>
												</a>
											</li>
										</ul>
										<div class="content4-right-text">
											<div>
												<div class="date">
													<span><?php echo date('m-d',strtotime($s1[commended_article][post_modified]));?></span><br>
													<span><?php echo date('Y',strtotime($s1[commended_article][post_modified]));?></span>
												</div>
												<div class="content4-msg">
													<a href="<?php echo get_article_url($s1[commended_article][tid],$s1[commended_article][link_type],$s1[commended_article][post_url]);?>">
														<h1><?php echo ($s1[commended_article][post_title]); ?></h1>
														<p><?php echo ($s1[commended_article][post_excerpt]); ?></p>
													</a>
												</div>
											</div>
											<div class="link-list">
												<ul>
													<?php if(is_array($s1['etc_article'])): $i = 0; $__LIST__ = $s1['etc_article'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo get_article_url($vo[tid],$vo[link_type],$vo[post_url]);?>"><?php echo ($vo["post_title"]); ?></a><span><?php echo date('Y-m-d',strtotime($vo[post_modified]));?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
													
												</ul>
											</div>
										</div>
									</div>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>
				<div class="swiper-slide">
					<ul class="flex content4-second-tab3 content4-second-tab">
						<?php if(is_array($sick3)): $i = 0; $__LIST__ = $sick3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s1): $mod = ($i % 2 );++$i; if($i == 1): ?><li class="content4-second-active"><?php echo ($s1["name"]); ?></li>
							<?php else: ?>
								<li><?php echo ($s1["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<div class="swiper-container content4-4">
						<div class="swiper-wrapper">
							<?php if(is_array($sick3)): $i = 0; $__LIST__ = $sick3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s1): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
									<div class="flex content4-detail">
										<ul class="content-img-box flex">
											<li>
												<a href="/zt/ztm/" target="_blank">
													<img src="/themes/simplebootx/Public/images/content4-img-list3-1.jpg" alt="">
													<div class="detail-hover unshow"><span>瓷贴<br>面</span></div>
												</a>
											</li>
											<li>
												<a href="/zt/ztm/" target="_blank">
													<img src="/themes/simplebootx/Public/images/content4-img-list3-2.jpg" alt="">
													<div class="detail-hover unshow"><span>瓷贴<br>面</span></div>
												</a>
											</li>
											<li>
												<a href="/zt/ztm/" target="_blank">
													<img src="/themes/simplebootx/Public/images/content4-img-list3-3.jpg" alt="">
													<div class="detail-hover unshow"><span>瓷贴<br>面</span></div>
												</a>
											</li>
											<li>
												<a href="/zt/ztm/" target="_blank">
													<img src="/themes/simplebootx/Public/images/content4-img-list3-4.jpg" alt="">
													<div class="detail-hover unshow"><span>瓷贴<br>面</span></div>
												</a>
											</li>
										</ul>
										<div class="content4-right-text">
											<div>
												<div class="date">
													<span><?php echo date('m-d',strtotime($s1[commended_article][post_modified]));?></span><br>
													<span><?php echo date('Y',strtotime($s1[commended_article][post_modified]));?></span>
												</div>
												<div class="content4-msg">
													<a href="<?php echo get_article_url($s1[commended_article][tid],$s1[commended_article][link_type],$s1[commended_article][post_url]);?>">
														<h1><?php echo ($s1[commended_article][post_title]); ?></h1>
														<p><?php echo ($s1[commended_article][post_excerpt]); ?></p>
													</a>
												</div>
											</div>
											<div class="link-list">
												<ul>
													<?php if(is_array($s1['etc_article'])): $i = 0; $__LIST__ = $s1['etc_article'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo get_article_url($vo[tid],$vo[link_type],$vo[post_url]);?>"><?php echo ($vo["post_title"]); ?></a><span><?php echo date('Y-m-d',strtotime($vo[post_modified]));?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
													
												</ul>
											</div>
										</div>
									</div>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>
				<div class="swiper-slide">
					<ul class="flex content4-second-tab4 content4-second-tab">
						<?php if(is_array($sick4)): $i = 0; $__LIST__ = $sick4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s1): $mod = ($i % 2 );++$i; if($i == 1): ?><li class="content4-second-active"><?php echo ($s1["name"]); ?></li>
							<?php else: ?>
								<li><?php echo ($s1["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<div class="swiper-container content4-5">
						<div class="swiper-wrapper">
							<?php if(is_array($sick4)): $i = 0; $__LIST__ = $sick4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s1): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
									<div class="flex content4-detail">
										<ul class="content-img-box flex">
											<li>
												<a href="/list/154.html" target="_blank">
													<img src="/themes/simplebootx/Public/images/content4-img-list4-1.jpg" alt="">
													<div class="detail-hover unshow"><span>儿童<br>口腔</span></div>
												</a>
											</li>
											<li><img src="/themes/simplebootx/Public/images/content4-img-list4-2.jpg" alt=""></li>
											<li><img src="/themes/simplebootx/Public/images/content4-img-list4-3.jpg" alt=""></li>
											<li>
												<a href="/list/154.html" target="_blank">
													<img src="/themes/simplebootx/Public/images/content4-img-list4-4.jpg" alt="">
													<div class="detail-hover unshow"><span>儿童<br>口腔</span></div>
												</a>
											</li>
										</ul>
										<div class="content4-right-text">
											<div>
												<div class="date">
													<span><?php echo date('m-d',strtotime($s1[commended_article][post_modified]));?></span><br>
													<span><?php echo date('Y',strtotime($s1[commended_article][post_modified]));?></span>
												</div>
												<div class="content4-msg">
													<a href="<?php echo get_article_url($s1[commended_article][tid],$s1[commended_article][link_type],$s1[commended_article][post_url]);?>">
														<h1><?php echo ($s1[commended_article][post_title]); ?></h1>
														<p><?php echo ($s1[commended_article][post_excerpt]); ?></p>
													</a>
												</div>
											</div>
											<div class="link-list">
												<ul>
													<?php if(is_array($s1['etc_article'])): $i = 0; $__LIST__ = $s1['etc_article'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo get_article_url($vo[tid],$vo[link_type],$vo[post_url]);?>"><?php echo ($vo["post_title"]); ?></a><span><?php echo date('Y-m-d',strtotime($vo[post_modified]));?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
													
												</ul>
											</div>
										</div>
									</div>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>
				<div class="swiper-slide">
					<ul class="flex content4-second-tab5 content4-second-tab">
						<?php if(is_array($sick5)): $i = 0; $__LIST__ = $sick5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s1): $mod = ($i % 2 );++$i; if($i == 1): ?><li class="content4-second-active"><?php echo ($s1["name"]); ?></li>
							<?php else: ?>
								<li><?php echo ($s1["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<div class="swiper-container content4-6">
						<div class="swiper-wrapper">
							<?php if(is_array($sick5)): $i = 0; $__LIST__ = $sick5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s1): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
									<div class="flex content4-detail">
										<ul class="content-img-box flex">
											<li>
												<a href="/list/13.html" target="_blank">
													<img src="/themes/simplebootx/Public/images/content4-img-list5-1.jpg" alt="">
													<div class="detail-hover unshow"><span>综合<br>治疗</span></div>
												</a>
											</li>
											<li><img src="/themes/simplebootx/Public/images/content4-img-list5-2.jpg" alt=""></li>
											<li><img src="/themes/simplebootx/Public/images/content4-img-list5-3.jpg" alt=""></li>
											<li>
												<a href="/list/13.html" target="_blank">
													<img src="/themes/simplebootx/Public/images/content4-img-list5-4.jpg" alt="">
													<div class="detail-hover unshow"><span>综合<br>治疗</span></div>
												</a>
											</li>
										</ul>
										<div class="content4-right-text">
											<div>
												<div class="date">
													<span><?php echo date('m-d',strtotime($s1[commended_article][post_modified]));?></span><br>
													<span><?php echo date('Y',strtotime($s1[commended_article][post_modified]));?></span>
												</div>
												<div class="content4-msg">
													<a href="<?php echo get_article_url($s1[commended_article][tid],$s1[commended_article][link_type],$s1[commended_article][post_url]);?>">
														<h1><?php echo ($s1[commended_article][post_title]); ?></h1>
														<p><?php echo ($s1[commended_article][post_excerpt]); ?></p>
													</a>
												</div>
											</div>
											<div class="link-list">
												<ul>
													<?php if(is_array($s1['etc_article'])): $i = 0; $__LIST__ = $s1['etc_article'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo get_article_url($vo[tid],$vo[link_type],$vo[post_url]);?>"><?php echo ($vo["post_title"]); ?></a><span><?php echo date('Y-m-d',strtotime($vo[post_modified]));?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
													
												</ul>
											</div>
										</div>
									</div>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	
	<section class="content6">
		<div class="content-width">
			<div class="content-title">
				<h1>
					<i class="index-icon"></i>展会活动
					<span class="content-more"><a href="">更多 ></a></span>
				</h1>
			</div>
		</div>
		<div id="certify">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php if(is_array($activitiy_banner)): $i = 0; $__LIST__ = $activitiy_banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>"/></div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
			<div class="arrow-left content6-left-btn"><i class="arrow"></i></div>
			<div class="arrow-right content6-right-btn"><i class="arrow"></i></div>
		</div>
	</section>

	<section class="content7">
		<div class="content-width">
			<div class="content-title">
				<h1>
					<i class="index-icon"></i>德道资讯
					<span class="content-more"><a href="/list/146.html">更多 ></a></span>
				</h1>
			</div>
		</div>
		<div class="flex content7-news content-width">
			<div class="content7-left-img-box">
				<a href="/swt/"><img src="/themes/simplebootx/Public/images/news.jpg" alt=""></a>
				<!--<div class="flex news-img-box-text">
					<div class="content7-date">
						<span><?php echo date('m-d',strtotime($top_news[0][post_modified]));?></span>
					</div>
					<div>
						<h1><?php echo ($top_news[0][post_title]); ?></h1>
						<p><?php echo ($top_news[0][post_excerpt]); ?></p>
					</div>
				</div>-->
			</div>
			<div class="content7-right-msg-list">
				<div class="content7-list-title">近期新闻</div>
				<ul class="news1">
					<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a href="<?php echo get_article_url($vo[tid],$vo[link_type],$vo[post_url]);?>" class="flex">
								<div class="right-msg-date">
									<span><?php echo date('m-d',strtotime($vo[post_modified]));?></span><br>
									<span><?php echo date('Y',strtotime($vo[post_modified]));?></span>
								</div>
								<div>
									<h1><?php echo ($vo["post_title"]); ?></h1>
									<p><?php echo ($vo[post_excerpt]); ?></p>
								</div>
							</a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<div class="content7-list-title" style="background: #BCA17A;">活动新闻</div>
				<ul class="news2">
					<?php if(is_array($activity)): $i = 0; $__LIST__ = $activity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
							<a href="<?php echo get_article_url($vo[tid],$vo[link_type],$vo[post_url]);?>" class="flex">
								<div class="news-list-date"><?php echo date('Y-m-d',strtotime($vo[post_modified]));?></div>
								<div class="news-list-text"><?php echo ($vo["post_title"]); ?></div>
							</a>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</section>
	
	
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
<script src="/themes/simplebootx/Public/js/jquery.lazyload.min.js"></script>
<script src="/themes/simplebootx/Public/js/index.js"></script>
</html>