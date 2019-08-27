$(function() {
	certifySwiper = new Swiper('#certify .swiper-container', {
		watchSlidesProgress: true,
		slidesPerView: 'auto',
		centeredSlides: true,
		loop: true,
		loopedSlides: 3,
		navigation: {
			nextEl: '.content6-right-btn',
			prevEl: '.content6-left-btn',
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
					scale = 1 - Math.abs(slideProgress) / 5;
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
	});
	/*var mySwiper = new Swiper('.form-banner', {
		//direction : 'vertical',
		loop : true,
		//height: 25,
		simulateTouch : false,
		//autoplay: true,
		slidesPerView: 3,
	    slidesPerColumn: 2,
	    spaceBetween: 30,
	})*/
	

	$('.page').val(window.location.href);
	
	var re1 = /^[\u4E00-\u9FA5]{1,6}$/; 
	var re2 = /^((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+(\d{8})$/;

	$('body').on('click', '.submit-btn', function() {	
		var name = $(".name input").val();
		if(name == null){
			alert("姓名不能为空"); 
			return false; 
		}else if(name != null){
			if (!re1.test(name)){ 
				alert("姓名格式不正确"); 
				return false; 
			}	
		}
		

		var phone = $(".phone input").val();
		if(phone == null){
			alert("电话不能为空"); 
			return false; 
		}else if(phone != null){
			if (!re2.test(phone)){ 
				alert("电话格式不正确"); 
				return false; 
			}
		}
		
		var age = $(".age input").val();
		var re3 = /^[0-9]{1,2}$/;
		if(age == null){
			alert("年龄不能为空"); 
			return false; 
		}else if(age != null){
			if (!re3.test(age)){ 
				alert("请输入正确的年龄"); 
				return false; 
			}
		}
		
		var symptom = $(".symptom input").val();
		if(symptom == null){
			alert("症状不能为空");
		}
		
		var data = $('#form1').serializeArray();
		$.post('/tables/tables/add_post',data,function(result){
			//console.log(result);
			alert(result.info);
		});
	});
	
	$('body').on('click', '.submit-btn2', function() {
		var name = $(".footer-form .name input").val();
		if(name == null){
			alert("姓名不能为空"); 
			return false; 
		}else if(name != null){
			if (!re1.test(name)){ 
				alert("姓名格式不正确"); 
				return false; 
			}	
		}
		

		var phone = $(".footer-form .phone input").val();
		if(phone == null){
			alert("电话不能为空"); 
			return false; 
		}else if(phone != null){
			if (!re2.test(phone)){ 
				alert("电话格式不正确"); 
				return false; 
			}
		}

		var data1 = $('#form2').serializeArray();
		console.log(data1);
		$.post('/tables/tables/add_post',data1,function(result){
			//console.log(result);
			alert(result.info);
		});
	})
})

function autoScroll(obj){
	var liHeight = $("#form-banner ul li").height();
  	$(obj).children('ul').animate({
     	marginTop: -liHeight+'px'
  	},1000,function(){
     	$(this).css({marginTop : "0px"});
     	var li = $("#form-banner ul").children().first().clone()
     	$("#form-banner ul li:last").after(li );
     	$("#form-banner ul li:first").remove();
  })
}
$(function(){

  setInterval('autoScroll("#form-banner")',2000);


})