<?php if (!defined('THINK_PATH')) exit();?><!--牙齿纠正-->
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
	<link href="/themes/simplebootx/Public/css/style.css" rel="stylesheet" type="text/css">
	<title><?php echo ($seo_title); ?></title>
	<meta name="keywords" content="<?php echo ($seo_keywords); ?>"/>
	<meta name="description" content="<?php echo ($seo_description); ?>" />
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
		<div class="main_img">
			<?php $slide = sp_getslide("correction_banner"); ?>
			<div class="hd">
				<ul>
					<?php if(is_array($slide)): $k = 0; $__LIST__ = $slide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li><?php echo ($k); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="bd">
				<ul>
					<?php if(is_array($slide)): $i = 0; $__LIST__ = $slide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["slide_url"]); ?>" target="_blank"><img src="<?php echo sp_get_asset_upload_path($vo['slide_pic']);?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		
		<ol class="breadcrumb">
			<i class="fa fa-home"></i>
			<li>您现在在的位置</li>
			<li class="active"><?php echo ($name); ?></li>
		</ol>
		
		<div class="problem2">
			<h2>你是否因<span>这些牙齿畸形问题</span>而备受煎熬？</h2>
			<p class="info">牙齿畸形让你遭人嘲笑缺少自信，同时影响咀嚼不利身体健康，就业受歧视工作难以如意，最悲催的是真爱难觅造成人生遗憾.......</p>
			<ul class="clearfix">
				<li>
					<img src="/themes/simplebootx/Public/images/correction/problem_img01.png" />
					<h4>牙列拥挤</h4>
					<p>牙齿拥挤错位排列<br/>龋病及牙周病发病率较高...</p>
					<a href="/swt/" target="_blank">了解详情</a>
				</li>
				<li>
					<img src="/themes/simplebootx/Public/images/correction/problem_img02.png" />
					<h4>牙齿稀疏</h4>
					<p>牙齿间出现的间隙<br/>一般引起该现象的原因为...</p>
					<a href="/swt/" target="_blank">了解详情</a>
				</li>
				<li>
					<img src="/themes/simplebootx/Public/images/correction/problem_img03.png" />
					<h4>错颌（牙错位）</h4>
					<p>儿童生长发育过程中<br/>由先天或后天等因素造成...</p>
					<a href="/swt/" target="_blank">了解详情</a>
				</li>
				<li>
					<img src="/themes/simplebootx/Public/images/correction/problem_img04.png" />
					<h4>深覆颌（龅牙）</h4>
					<p>上颌前突或双颌前突<br/>无功能障碍，影响美观...</p>
					<a href="/swt/" target="_blank">了解详情</a>
				</li>
				<li>
					<img src="/themes/simplebootx/Public/images/correction/problem_img05.png" />
					<h4>反颌（地包天）</h4>
					<p>尽可能及早消除病因<br/>早期矫治，防止畸形严重化...</p>
					<a href="/swt/" target="_blank">了解详情</a>
				</li>
			</ul>
		</div>

		<div class="advantage2 clearfix"> 
	        <h2>德道<span>矫正优势</span></h2> 
	        <dl> 
	            <span>01 </span>
	            <dt>共享百年口腔案例大数据库 </dt>
	            <dd>德道口腔作为全国连锁机构，专注东方人口腔，全面共享全国连锁医院齿科大数据库，为正畸提供强大的数据及技术支持。 </dd>
	        </dl>
	        <dl> 
	        	<span>02 </span>
	            <dt>口腔数字化设计 </dt>
	            <dd>德道口腔数字化设计可根据患者牙齿的具体形态进行3D数字化、精细化量齿定制，通过颜面摆正、尺寸输入、颜齿匹配，个性化设计微笑曲线，打造东方人标志笑容。</dd>
	        </dl>
	        <dl> 
	        	<span>03 </span>
	          	<dt style="margin-left: 40px;">精准矫治 缩短矫治时间 </dt>
	           	<dd>德道矫正具有精准矫治（不拔牙或少拔牙），缩短矫正时间（3-6个月）等特点。通过全牙分类提升空间，使用扩弓器和不伤牙的准确研磨，减少不必要的拔牙。</dd>
	        </dl>
	        <dl> 
	         	<span>04 </span>
	           	<dt>兼具咬合功能 </dt>
	           	<dd>德道矫正术前通过准确的投影测量软件，为每个客人进行个性化的矫治设计，并通过合适的转矩选择，准确的托槽粘结，调整咬合及治疗后期的精细而艺术的牙齿塑形，兼具咬合功能。</dd>
	        </dl>
	        <img src="/themes/simplebootx/Public/images/correction/advantage_bg2.png" />
	    </div>
		
		<div class="technology4">
			<h2>
				六大正畸技术<span>总有一款适合你</span>
				<p>为您打造舒适的矫齿体验</p>
			</h2>
			<div class="tech4_box tech4_box1">
				<div class="hd">
					<ul class="clearfix">
						<li class="on">隐适美<br/>隐形正畸<i class="fa fa-angle-down"></i></li>
						<li>无托槽<br/>隐形正畸<i class="fa fa-angle-down"></i></li>
						<li>3M金属<br/>托槽正畸<i class="fa fa-angle-down"></i></li>
					</ul>
				</div>
				<div class="bd">
					<div class="tech4_main clearfix">
						<div class="tech4_left">
							<img src="/themes/simplebootx/Public/images/correction/s8w3-2.jpg" />
							<p>诊疗时间：9个月</p>
							<p class="red">医生推荐：<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
							<p>设计及制造的隐形牙齿矫正器，它既能满足矫正牙齿的需要，又同时避免了传统托槽矫正能看到：钢牙“的缺点，是市场上最先进的牙齿矫正方法。</p>
							<div class="tech4_btn">
								<a href="/swt/" target="_blank">在线咨询</a>
								<a href="/swt/" target="_blank">价格咨询</a>
								<a href="/swt/" target="_blank">在线预约</a>
							</div>
						</div>
						<div class="tech4_right">
							<ul>
								<li>
									<span>美观舒适</span>
									<p>矫治器质地透明，旁人难以察觉</p>
								</li>
								<li>
									<span>效果预测</span>
									<p>可以做出针对每个患者的三维仿真矫治过程效果预测</p>
								</li>
								<li>
									<span>摘戴便捷</span>
									<p>自由摘戴，不影响正常饮食及生活</p>
								</li>
								<li>
									<span>隐形牙套</span>
									<p>外表近乎透明，厚度更小于 1mm，几乎隐形</p>
								</li>
							</ul>
						</div>	
					</div>
					<div class="tech4_main clearfix">
						<div class="tech4_left">
							<img src="/themes/simplebootx/Public/images/correction/technology_img01.png" />
							<p>诊疗时间：12个月</p>
							<p class="red">医生推荐：<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
							<p>进口"隐形牙箍"，不用钢丝、托槽，不影响美观，可自行摘带，在不知不觉中恢复正常颌面形态。</p>
							<div class="tech4_btn">
								<a href="/swt/" target="_blank">在线咨询</a>
								<a href="/swt/" target="_blank">价格咨询</a>
								<a href="/swt/" target="_blank">在线预约</a>
							</div>
						</div>
						<div class="tech4_right">
							<ul>
								<li>
									<span>舒适自在</span>
									<p>没有金属牙箍所造成的口腔磨损及不适，佩戴更舒服</p>
								</li>
								<li>
									<span>效果预知</span>
									<p>计算机三维诊断软件模拟牙齿移动及矫正效果</p>
								</li>
								<li>
									<span>隐形牙箍</span>
									<p>外表近乎透明，厚度更小于 1mm，几乎隐形</p>
								</li>
								<li>
									<span>可自行摘戴</span>
									<p>特别场合或进食时可自行摘下，更好维护口腔卫生</p>
								</li>
							</ul>
						</div>	
					</div>
					<div class="tech4_main clearfix">
						<div class="tech4_left">
							<img src="/themes/simplebootx/Public/images/correction/poie-2.jpg" />
							<p>诊疗时间：12个月</p>
							<p class="red">医生推荐：<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
							<p>原装进口矫治系统，采用特殊"锁扣"技术，缩短正畸时间近三分之一，复诊间隔时间延长为8-12周。</p>
							<div class="tech4_btn">
								<a href="/swt/" target="_blank">在线咨询</a>
								<a href="/swt/" target="_blank">价格咨询</a>
								<a href="/swt/" target="_blank">在线预约</a>
							</div>
						</div>
						<div class="tech4_right">
							<ul>
								<li>
									<span>节省时间</span>
									<p>记忆弹性弓丝提高了畸牙移动的有效性，可缩短疗程</p>
								</li>
								<li>
									<span>减少拔牙</span>
									<p>特殊的持续微强力系统，能扩展空间，减少拔牙</p>
								</li>
								<li>
									<span>美观舒适</span>
									<p>外形小巧舒适，可避免结扎丝末端对口腔刺伤及不适</p>
								</li>
								<li>
									<span>保护口腔</span>
									<p>有利于保持口腔卫生，保护牙周组织健康</p>
								</li>
							</ul>
						</div>	
					</div>
					
				</div>
			</div>
			
			<div class="tech4_box tech4_box2">
				<div class="hd">
					<ul class="clearfix">
						<li class="on">普通金属<br/>托槽正畸<i class="fa fa-angle-down"></i></li>
						<li>陶瓷<br/>托槽正畸<i class="fa fa-angle-down"></i></li>
						<li>冰晶<br/>托槽正畸<i class="fa fa-angle-down"></i></li>
					</ul>
				</div>
				<div class="bd">
					<div class="tech4_main clearfix">
						<div class="tech4_left">
							<img src="/themes/simplebootx/Public/images/correction/pic_18.jpg" />
							<p class="bold">普通金属托槽正畸：</p>
							<p>是一种较传统的牙齿正畸固定矫治器，可达到牙齿正畸错位牙齿的目的，应用比较广泛。</p>
							<p class="red">医生推荐：<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
							
							<div class="tech4_btn">
								<a href="/swt/" target="_blank">在线咨询</a>
								<a href="/swt/" target="_blank">价格咨询</a>
								<a href="/swt/" target="_blank">在线预约</a>
							</div>
						</div>
						<div class="tech4_right">
							<ul>
								<li>
									<span>费用较便宜</span>
									<p>受大多数人群喜欢。</p>
								</li>
								<li>
									<span>矫正时间较长</span>
									<p>采用这种方法进行矫正的时间虽然相对较长，但能基本实现矫正效果。</p>
								</li>
								<li>
									<span>治疗流程</span>
									<p>在确定患者矫牙方案后，为患者取牙模。然后，医生会根据患者口腔情况为患者拔牙（并非每人都需要拔牙）。接着为患者分牙。最后为患者戴上金属托槽，定期复诊。</p>
								</li>
							</ul>
						</div>	
					</div>
					<div class="tech4_main clearfix">
						<div class="tech4_left">
							<img src="/themes/simplebootx/Public/images/correction/pic_19.jpg" />
							<p class="red">医生推荐：<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
							<p>采用特殊透明陶瓷材料，颜色接近牙齿本色，不易被发现，不含金属成分，相容性很好。</p>
							<div class="tech4_btn">
								<a href="/swt/" target="_blank">在线咨询</a>
								<a href="/swt/" target="_blank">价格咨询</a>
								<a href="/swt/" target="_blank">在线预约</a>
							</div>
						</div>
						<div class="tech4_right">
							<ul>
								<li>
									<span>蔽性好</span>
									<p>特殊透明陶瓷，隐蔽性较好，使矫治过程悄然完成。</p>
								</li>
								<li>
									<span>抗变色强</span>
									<p>透明托槽具有良好的抗污染性和抗变色能力。</p>
								</li>
								<li>
									<span>不易变形</span>
									<p>具有很高的硬度，为不锈钢的九倍，不会变形。</p>
								</li>
								<li>
									<span>复诊量少</span>
									<p>附着受力均匀，不易脱落，明显降低复诊概率 。</p>
								</li>
							</ul>
						</div>	
					</div>
					<div class="tech4_main clearfix">
						<div class="tech4_left">
							<img src="/themes/simplebootx/Public/images/correction/pic_20.jpg" />
							<p class="red">医生推荐：<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
							<p>似蓝宝石透明材质，小巧轻薄；热处理技术及高强度结扎翼，使强度和抗破坏性是普通陶瓷托槽的两倍。</p>
							<div class="tech4_btn">
								<a href="/swt/" target="_blank">在线咨询</a>
								<a href="/swt/" target="_blank">价格咨询</a>
								<a href="/swt/" target="_blank">在线预约</a>
							</div>
						</div>
						<div class="tech4_right">
							<ul>
								<li>
									<span>透明舒适</span>
									<p>兼顾美学正畸和隐形正畸效果。</p>
								</li>
								<li>
									<span>拆除方便</span>
									<p>专利技术减少拆除所需力量。</p>
								</li>
								<li>
									<span>光滑舒适</span>
									<p>热抛光技术形成的强光滑槽沟，可减小滑动摩擦力。</p>
								</li>
								<li>
									<span>定位强</span>
									<p>菱形结构、贴合底板外形及不同颜色水溶标记，能很好的托槽定位。</p>
								</li>
							</ul>
						</div>	
					</div>
					
				</div>
			</div>
			
			
		</div>

		
		<div class="advantage3 clearfix">
			<h2>美学正畸中心隐形矫正<span>6部曲</span></h2>
			<ul class="clearfix">
				<li>
					<h3>01</h3>
					<p>初步检查/拍片/取模</p>
				</li>
				<li>
					<h3>02</h3>
					<p>诊断分析/方案设计</p>
				</li>
				<li>
					<h3>03</h3>
					<p>模拟预期治疗效果</p>
				</li>
				<li></li>
				<li>
					<h3>04</h3>
					<p>客户沟通/制作</p>
				</li>
				<li>
					<h3>05</h3>
					<p>实施治疗</p>
				</li>
				<li>
					<h3>06</h3>
					<p>定期复诊</p>
				</li>
			</ul>
			<a href="/swt/" target="_blank" class="swt_btn">立刻咨询>></a>
		</div>
		
		
		<div class="doctor">
			<h2>
				智能口腔专家团
			</h2>
			<div id="slideBox" class="slideBox">
				<div class="hd"></div>
				<div class="bd">
					<ul>
						<?php if(is_array($doctor)): $i = 0; $__LIST__ = $doctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $extend = json_decode($vo['post_extend'],true); ?>
							<li>
								<img src="<?php echo ($vo["main_img"]); ?>" />
								<div>
									<h4><?php echo ($vo["name"]); ?><span><?php echo ($vo["job"]); ?></span></h4>
									<?php if(is_array($vo['experience'])): $i = 0; $__LIST__ = array_slice($vo['experience'],0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><p><?php echo ($vo1); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>
									<h5>擅长项目</h5>
									<p><?php echo ($vo["item"]); ?></p>
									<a href="/swt/" target="_blank" class="swt_btn">在线预约>></a>	
								</div>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="pnBtn prev"> <span class="blackBg"></span> <span class="arrow"></span> </div>
				<div class="pnBtn next"> <span class="blackBg"></span> <span class="arrow"></span> </div>
			</div>

		</div>
		
		<div class="case case6 clearfix">
			<h2>案例展示</h2>
			<div></div>
			<div class="caseBox2">
				<div class="bd">
					<ul class="pic">
						<li>
							<img src="/themes/simplebootx/Public/images/correction/box7_1.jpg">
						</li>
						<li>
							<img src="/themes/simplebootx/Public/images/correction/box7_2.jpg">
						</li>
						<li>
							<img src="/themes/simplebootx/Public/images/correction/box7_3.jpg">
						</li>
						<li>
							<img src="/themes/simplebootx/Public/images/correction/box7_4.jpg">
						</li>
					</ul>	
				</div>
				
				<a class="prev" href="javascript:void(0)"></a>
				<a class="next" href="javascript:void(0)"></a>
				<ul class="hd">
				</ul>
			</div>
			<ul>
				
			</ul>
		</div>

		<div class="wiki wiki4">
			<h2><?php echo ($name); ?><span>百科科普</span></h2>
			<div class="wikiTxtBox">
				<div class="hd">
					<ul class="clearfix">
						<?php if(is_array($term_child)): $i = 0; $__LIST__ = $term_child;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/list/<?php echo ($vo["term_id"]); ?>.html" target="_blank"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="bd">
					<?php if(is_array($tab_text)): $i = 0; $__LIST__ = $tab_text;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="clearfix">
							<li class="col-md-8">
								<ul class="media-list">
									<li class="media">
										<div class="media-left media-middle">
											<a href="<?php echo get_article_url($vo['pic_recommend'][0]['tid'],$vo['pic_recommend'][0]['link_type'],$vo['pic_recommend'][0]['post_url']);;?>">
												<?php $smeta = json_decode($vo['pic_recommend'][0]['smeta'],true); ?>
												<img class="media-object" src="<?php echo ($smeta["thumb"]); ?>">
											</a>
										</div>
										<div class="media-body">
											<ul>
												<?php if(is_array($vo['art_recommend'])): $i = 0; $__LIST__ = array_slice($vo['art_recommend'],0,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><li>
														<a href="<?php echo get_article_url($vo1['tid'],$vo1['link_type'],$vo1['post_url']);;?>">
															<h4 class="media-heading"><?php echo ($vo1["post_title"]); ?><span></span></h4>
															<?php echo ($vo1["post_excerpt"]); ?>
														</a>
													</li><?php endforeach; endif; else: echo "" ;endif; ?>
											</ul>
										</div>
									</li>
									<li class="media">
										<div class="media-body">
											<ul>
												<?php if(is_array($vo['art_recommend'])): $i = 0; $__LIST__ = array_slice($vo['art_recommend'],2,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><li>
														<a href="<?php echo get_article_url($vo1['tid'],$vo1['link_type'],$vo1['post_url']);;?>">
															<h4 class="media-heading"><?php echo ($vo1["post_title"]); ?><span></span></h4>
															<?php echo ($vo1["post_excerpt"]); ?>
														</a>
													</li><?php endforeach; endif; else: echo "" ;endif; ?>
											</ul>
										</div>
										<div class="media-right media-middle">
											<a href="<?php echo get_article_url($vo['pic_recommend'][1]['tid'],$vo['pic_recommend'][1]['link_type'],$vo['pic_recommend'][1]['post_url']);;?>">
												<?php $smeta = json_decode($vo['pic_recommend'][1]['smeta'],true); ?>
												<img class="media-object" src="<?php echo ($smeta["thumb"]); ?>">
											</a>
										</div>
									</li>
								</ul>
							</li>
							<li class="col-md-4">
								<dl>
									<?php if(is_array($vo['question'])): $i = 0; $__LIST__ = $vo['question'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?><dd><a href="/qa/<?php echo ($vo2["id"]); ?>"><i class="fa fa-newspaper-o"></i><?php echo ($vo2["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
								</dl>
								<a class="red_btn" href="/swt/" target="_blank">我要提问>></a>
								<a class="yel_btn" href="/swt/" target="_blank">在线咨询>></a>
							</li>
						</ul><?php endforeach; endif; else: echo "" ;endif; ?>
					
				</div>
			</div>
		</div>
	
	
	</body>
	
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
	<script type="text/javascript">
		jQuery(".main_img").slide({mainCell:".bd ul",autoPlay:true});
		jQuery(".tech4_box1").slide();
		jQuery(".tech4_box2").slide();
		jQuery(".caseBox2").slide({mainCell:".bd ul",autoPlay:true});
		jQuery(".wikiTxtBox").slide({autoPlay:true});
		jQuery(".slideBox .bd li").first().before(jQuery(".slideBox .bd li").last());
		jQuery(".slideBox").slide({
			mainCell: ".bd ul",
			effect: "leftLoop",
			autoPlay: true,
			vis: 3,
			mouseOverStop: false
		});
	</script>
</html>