$(function() {
	certifySwiper = new Swiper('#certify .swiper-container', {
		watchSlidesProgress: true,
		slidesPerView: 'auto',
		centeredSlides: true,
		loop: true,
		loopedSlides: 3,
		navigation: {
			nextEl: '.arrow-right',
			prevEl: '.arrow-left',
		},
		on: {
			progress: function(progress) {
				for (i = 0; i < this.slides.length; i++) {
					var slide = this.slides.eq(i);
					var slideProgress = this.slides[i].progress;
					modify = 1;
					if (Math.abs(slideProgress) > 1) {
						modify = (Math.abs(slideProgress) - 1) * 0.3 + 1;
					}
					translate = slideProgress * modify * 260 + 'px';
					scale = 1 - Math.abs(slideProgress) / 5 + .5;
					zIndex = 999 - Math.abs(Math.round(10 * slideProgress));
					slide.transform('translateX(' + translate + ') scale(' + scale + ')');
					slide.css('zIndex', zIndex);
					slide.css('opacity', 1);
					if (Math.abs(slideProgress) > 3) {
						slide.css('opacity', 0);
					}
				}
			},
			setTransition: function(transition) {
				for (var i = 0; i < this.slides.length; i++) {
					var slide = this.slides.eq(i)
					slide.transition(transition);
				}

			}
		}
	})

	$('.page').val(window.location.href);
	$('body').on('click', '.submit-btn', function() {	
		var name = $(".input-name").val();
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
		
		var phone = $(".input-phone").val();
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
		
		var data = $('form').serializeArray();
		console.log(data)
		// $.post('/tables/tables/add_post',data,function(result){
		// 	//console.log(result);
		// 	alert(result.info);
		// });
	});
})