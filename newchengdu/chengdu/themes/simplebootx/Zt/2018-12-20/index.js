$(function() {
	var mySwiper = new Swiper('.swiper-container', {
		autoplay: true,
		loop: true,
		pagination: {
	    	el: '.swiper-pagination',
	  	},
	})

	$('form li').on('click', function() {
		$(this).addClass('active-symptom').siblings('li').removeClass('active-symptom');
		var symptom = $(this).children('div.option-text').children('span').text();
		$('.symptom-value').val(symptom);
	})

	$('.submit-btn').on('click', function() {
		var name = $(".name input").val();
		var re1 = /^[\u4E00-\u9FA5]{1,6}$/; 
		if(name == ''){
			alert("姓名不能为空"); 
			return false; 
		}else if(name != ''){
			if (!re1.test(name)){ 
				alert("姓名格式不正确"); 
				return false; 
			}	
		}

		var phone = $(".phone input").val();
		var re4 = /^((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+(\d{8})$/;
		if(phone == ''){
			alert("联系方式不能为空"); 
			return false; 
		}else if(phone != ''){
			if (!re4.test(phone)){ 
				alert("联系方式不正确"); 
				return false; 
			}
		}
		var data = $('form').serializeArray();
		// console.log(data)
		$.post('/tables/tables/add_post',data,function(result){
			//console.log(result);
			alert(result.info);
		});
	})

	
})