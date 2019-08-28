$(function() {
	$('.content-box-3 li').on('click', function() {
		$(this).children('a').addClass('active-list').parent('li').siblings().children('a').removeClass('active-list');
		var symptom = $(this).find('p.mb-0').html();
		$('.input-symptom').attr('value',symptom);
	});
	$('.content-box-5 .tab-list li').on('click', function() {
		var inx = $(this).index();
		$(this).addClass('tab-active').siblings('li').removeClass('tab-active');
		$('.list-content li').eq(inx).fadeIn().siblings('').css('display', 'none');;
	});
	var mySwiper = new Swiper('.doctor-banner', {
		simulateTouch : false,
		on: {
	    	slideChangeTransitionEnd: function(){
	      		this.activeIndex == 1 ? $('.doctor-bcg-arrow').animate({'left': '65%'}) : $('.doctor-bcg-arrow').animate({'left': '20%'});
	      		$('.banner-tab li').eq(this.activeIndex).addClass('doctor-tab-active').siblings('li').removeClass('doctor-tab-active');
	    	},
	  	},
		
	});
	var mySwiper2 = new Swiper('.banner-tab', {
		slidesPerView : 2,
		simulateTouch : false,
	});
	$('.banner-tab li').on('click', function() {
		var inx = $(this).index();
		$('.banner-tab li').eq(inx).addClass('doctor-tab-active').siblings('li').removeClass('doctor-tab-active');
		mySwiper.slideTo(inx, 500, false);
		mySwiper2.slideTo(inx, 500, false);
		inx == 1 ? $('.doctor-bcg-arrow').animate({'left': '65%'}) : $('.doctor-bcg-arrow').animate({'left': '20%'});
	});
	
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
		
		var options = $(".input-symptom").val();
		if(options == null){
			alert("请勾选牙齿情况"); 
			return false;
		}
		
		var data = $('#form1').serializeArray();
		$.post('/tables/tables/add_post',data,function(result){
			//console.log(result);
			alert(result.info);
		});
	});
	
})