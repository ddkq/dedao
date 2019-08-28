$(function() {
	var mySwiper = new Swiper('.case', {
		navigation: {
	      	nextEl: '.swiper-button-next',
	      	prevEl: '.swiper-button-prev',
	    },
	})
	var mySwiper2 = new Swiper('.service', {
		pagination: {
	    	el: '.swiper-pagination',
	  	},
	  	loop: true,
	})
	var mySwiper3 = new Swiper('.doctor', {
		on:{
		    slideChange: function(){
		      	$('.doctor-tab div').eq(mySwiper3.activeIndex).addClass('tab-active').siblings('div').removeClass('tab-active');
		    },
	  	},
	})
	$('.doctor-tab div').click(function(){
		var inx = $(this).index();
		$(this).addClass('tab-active').siblings('div').removeClass('tab-active');
		mySwiper3.slideTo(inx, 1000, false);
	})

	$('.page').val(window.location.href);
	$('.submit-btn').on('click', function() {
		var name = $(".name").val();
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
		
		var phone = $(".phone").val();
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
		$.post('/tables/tables/add_post',data,function(result){
			//console.log(result);
			alert(result.info);
		});
	});
})