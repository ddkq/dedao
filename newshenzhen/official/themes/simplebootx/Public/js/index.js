$(document).ready(function () {
 	var mySwiper = new Swiper ('.swiper1', {
	    direction: 'vertical',	// 竖屏轮播
	    mousewheel: true,
	    width: window.innerWidth,
	    height: window.innerHeight,
	    simulateTouch : false,
	    pagination: {
	    	el: '.nav1',
	    	clickable : true
	  	},
	    on: {
			slideChangeTransitionStart: function(){
				// 除了第一版头部透明，其余都是黑色
				if(this.activeIndex >= 1) {
					$('#menu').css('background-color','#000');
				}
				else {
					$('#menu').css('background','0');
				}
				// 第二版动画效果
				if(this.activeIndex == 1) {
					setTimeout(function() {
			  			$('.section2-title').css({'top': '0', 'opacity': 1})
						setTimeout(function() {
							$('.section2-text p').eq(0).css({'top': '0', 'opacity': 1});
							setTimeout(function() {
								$('.section2-text p').eq(1).css({'top': '0', 'opacity': 1});
								setTimeout(function() {
									$('.section2-title').removeClass('section-line');
								}, 100)
							}, 500)
						}, 400)
			  		}, 200)
				}
				else {
					$('.section2-title').css({'top': '5%', 'opacity': 0});
					$('.section2-text p').css({'top': '1rem', 'opacity': 0});
					$('.section2-title').addClass('section-line');
				}
				// 第三版动画效果
				if(this.activeIndex == 2) {
					$('.section2-list li').eq(0).css({'top': '0', 'opacity': 1})
					setTimeout(function() {
						$('.section2-list li').eq(1).css({'top': '0', 'opacity': 1})
						setTimeout(function() {
							$('.section2-list li').eq(2).css({'top': '0', 'opacity': 1})
							setTimeout(function() {
								$('.section02-title').removeClass('section-line');
							}, 100)
						}, 200)
					}, 200)
				}
				else {
					$('.section2-list li').css({'top': '30rem', 'opacity': 0})
					$('.section02-title').addClass('section-line');
				}
				// 第四版动画
				if(this.activeIndex == 3) {
					$('.section3 ul li:first-child').css({'left': '50%', 'opacity': 1})
					setTimeout(function() {
						$('.section3 ul li:nth-child(2)').css({'right': '50%', 'opacity': 1})
						setTimeout(function() {
							$('.section3 ul li:nth-child(3)').css({'left': '50%', 'opacity': 1})
							setTimeout(function() {
								$('.section3 ul li:nth-child(4)').css({'right': '50%', 'opacity': 1})
								setTimeout(function() {
									$('.section3 ul li:nth-child(5)').css({'left': '50%', 'opacity': 1})
									setTimeout(function() {
										$('.section3 ul li:nth-child(6)').css({'right': '50%', 'opacity': 1})
										setTimeout(function() {
											$('.section3 ul li:nth-child(7)').css({'left': '50%', 'opacity': 1})
											setTimeout(function() {
												$('.section3 ul li:nth-child(8)').css({'right': '50%', 'opacity': 1})
												setTimeout(function() {
													$('.section3 ul li:nth-child(9)').css({'left': '50%', 'opacity': 1})
													setTimeout(function() {
														$('.section3 ul li:nth-child(10)').css({'right': '50%', 'opacity': 1})
														setTimeout(function() {
															$('.section03-title').removeClass('section-line');
														}, 300)
													}, 300)
												}, 300)
											}, 300)
										}, 300)
									}, 300)
								}, 300)
							}, 300)
						}, 300)
					}, 300)
				}
				else {
					$('.section3 ul li:nth-of-type(odd)').css({'left': '70%', 'opacity': 0})
					$('.section3 ul li:nth-of-type(even)').css({'right': '70%', 'opacity': 0})
					$('.section03-title').addClass('section-line');
				}
				// 第五屏特效
				if(this.activeIndex == 4) {
					setTimeout(function() {
						$('.map').css('transform', 'scale(1)')
						setTimeout(function() {
							$('.shop1').css({'top': 315, 'opacity': 1})
							setTimeout(function() {
								$('.shop2').css({'bottom': 0, 'opacity': 1})
								setTimeout(function() {
									$('.shop3').css({'top': 290, 'opacity': 1})
									setTimeout(function() {
										$('.tip').fadeIn()
										setTimeout(function() {
											$('.section04-title').removeClass('section-line');
										}, 300)
									}, 400)
								}, 500)
							}, 500)
						}, 600)
					}, 200)
				}
				else {
					$('.map').css('transform', 'scale(0)')
					$('.shop1').css({'top': 270, 'opacity': 0})
					$('.shop2').css({'bottom': '-45px', 'opacity': 0})
					$('.shop3').css({'top': 245, 'opacity': 0})
					$('.tip').fadeOut()
					$('.section04-title').addClass('section-line');
				}
				// 第六屏特效
				if(this.activeIndex == 5) {
					$('.section5-content li').eq(0).css('top', 0)
					setTimeout(function() {
						$('.section5-content li').eq(1).css('top', 0)
						setTimeout(function() {
							$('.section5-content li').eq(2).css('top', 0)
							setTimeout(function() {
								$('.section05-title').removeClass('section-line');
							}, 300)
						}, 400)
					}, 400)
				}
				else {
					$('.section5-content li').css('top', 500)
					$('.section05-title').addClass('section-line');
				}
				// 第七屏特效
				if(this.activeIndex == 6) {
					$('.contact-bcg').css('right', 0)
					setTimeout(function() {
						$('.bottom-text').css('bottom', 0)
						$('.nav1 .swiper-pagination-bullet').addClass('bcg-fff')
					}, 400)
					setTimeout(function() {
						$('.head').css('left', 0)
						setTimeout(function() {
							$('.details').slideDown("normal")
						},800)
					}, 800)
				}
				else {
					$('.details').slideUp('fast')
					$('.head').css('left', 300)
					$('.contact-bcg').css('right', '-50%')
					$('.bottom-text').css('bottom', '-10%')
					$('.nav1 .swiper-pagination-bullet').removeClass('bcg-fff')
				}
			},
		}
  	})
	// 点击按钮跳到第二屏
  	$('.next-btn').on('click', function() {
  		mySwiper.slideTo(1, 500, false)
  		$('#menu').css('background-color','#000')
  		setTimeout(function() {
  			$('.section2-title').css({'top': '0', 'opacity': 1})
			setTimeout(function() {
				$('.section2-text p').eq(0).css({'top': '0', 'opacity': 1});
				setTimeout(function() {
					$('.section2-text p').eq(1).css({'top': '0', 'opacity': 1});
					setTimeout(function() {
						$('.section2-title').removeClass('section-line');
					}, 100)
				}, 500)
			}, 400)
  		}, 200)
  	})
})
$(document).ready(function () {
 	var mySwiper2 = new Swiper ('.swiper2', {
 		autoplay: true,
 		loop : true,
	    width: window.innerWidth,
	    height: window.innerHeight,
	    simulateTouch : false,
	    pagination: {
	    	el: '.nav2',
	    	clickable : true
	  	},
	  	speed:500,
	  	autoplay: {
		    delay: 10000,
		}
  	})        
})
$(function() {
	// 百度地图API功能
	var map = new BMap.Map("allmap");
	// 创建地址解析器实例
	var myGeo = new BMap.Geocoder();
	// 将地址解析结果显示在地图上,并调整地图视野
	var point  = new BMap.Point(113.933129,22.528875)
	var point2  = new BMap.Point(113.934529,22.528875)
	map.centerAndZoom(point2, 19);

	map.addOverlay(new BMap.Marker(point));
	// var myIcon = new BMap.Icon("/APP/Public/images/map-logo.png", new BMap.Size(80,49));
	map.clearOverlays();
	var marker2 = new BMap.Marker(point,"深圳市德道口腔医疗投资有限公司"); // 创建标注
	map.addOverlay(marker2);              // 将标注添加到地图中
	map.addControl(new BMap.MapTypeControl({ anchor: BMAP_ANCHOR_TOP_RIGHT, offset: new BMap.Size(10, 10) }));
	map.addControl(new BMap.OverviewMapControl({ anchor: BMAP_ANCHOR_BOTTOM_RIGHT, isOpen: 1 }));  
	var sContent =  
		"<h4 style='margin:0 0 5px 0;padding:0.2em 0'>深圳市德道口腔医疗投资有限公司</h4>" +  
		"<p style='margin:0;line-height:1.5;font-size:13px;'>地址：广东省深圳市南山区桂庙路5号仲良大厦8楼（德道口腔）<br/>电话：400-800-6161</p>" +  
		"</div>";  
	var infoWindow = new BMap.InfoWindow(sContent);  // 创建信息窗口对象  
	marker2.openInfoWindow(infoWindow, map.getCenter());      // 打开信息窗口 
	marker2.addEventListener('click', function() {   //点击标注显示信息窗口
		marker2.openInfoWindow(infoWindow, map.getCenter());
	})

	var end = "深圳市德道口腔医疗投资有限公司";
	var routePolicy = [BMAP_TRANSIT_POLICY_LEAST_TIME,BMAP_TRANSIT_POLICY_LEAST_TRANSFER,BMAP_TRANSIT_POLICY_LEAST_WALKING,BMAP_TRANSIT_POLICY_AVOID_SUBWAYS];
	var transit = new BMap.TransitRoute(map, {
	    renderOptions: {map: map},
	    policy: 0
	});
})