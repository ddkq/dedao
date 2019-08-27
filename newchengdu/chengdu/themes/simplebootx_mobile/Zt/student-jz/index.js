$(function() {
	$('.content-list>div').on('click', function() {
		$(this).addClass('checked').parent('div').siblings().children('div').removeClass('checked');
	});

	$('.left-list>div').hover(function() {
		$(this).children('.text-2').fadeIn('fast').prev().fadeOut('fast');
	}, function() {
		$(this).children('.text-1').fadeIn('fast').next().fadeOut('fast');
	});

	$('.right-list>div>div').hover(function() {
		$(this).children('.text-2').fadeIn('fast').prev().fadeOut('fast');
	}, function() {
		$(this).children('.text-1').fadeIn('fast').next().fadeOut('fast');
	});

	var mySwiper = new Swiper('.swiper-container', {
		autoplay: true,
		pagination: {
		    el: '.swiper-pagination',
	  	},
	  	loop: true
	});

	$('.submit-btn').on('click', function() {
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
		
		var symptom = $('.checked').children('span').text();
		$('.input-symptom').val(symptom);
		data = $('form').serializeArray();

		$.post('/tables/tables/add_post',data,function(result){
			//console.log(result);
			alert(result.info);
		});
	});

})