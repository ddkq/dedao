$(function() {
	$('.page').val(window.location.href);
	
	var showList = 1;
	$('.symptom span:not(:last-child)').on('click', function() {
		$(this).addClass('active-symptom').siblings('span').removeClass('active-symptom');
		var symptom = $(this).text();
		$('.symptom-value').val(symptom);
		var text = $(this).attr('class');
		var text2 = '';

		if(text[0] == 1) {
			if(showList == 1) {
				return;
			}
			else {
			$('.form-doctor li').removeClass('doctor-active');
				showList = text[0];
				$('.doctor-list-1').fadeIn();
				$('.doctor-list-2').css('display', 'none');
				$('.doctor-list-3').css('display', 'none');
				$('.doctor-list-1 li').eq(0).addClass('doctor-active');
				text2 = $('.doctor-list-1 li:first-child .doctor-name').text()
				$('.doctor-value').val(text2);
			}
		}
		else if(text[0] == 2) {
			if(showList == 2) {
				return;
			}
			else {
				$('.form-doctor li').removeClass('doctor-active');
				showList = text[0];
				$('.doctor-list-2').fadeIn();
				$('.doctor-list-1').css('display', 'none');
				$('.doctor-list-3').css('display', 'none');
				$('.doctor-list-2 li').eq(0).addClass('doctor-active');
				text2 = $('.doctor-list-2 li:first-child .doctor-name').text();
				$('.doctor-value').val(text2);
			}
		}
		else if(text[0] == 3) {
			if(showList == 3) {
				return;
			}
			else {
				$('.form-doctor li').removeClass('doctor-active');
				showList = text[0];
				$('.doctor-list-3').fadeIn();
				$('.doctor-list-1').css('display', 'none');
				$('.doctor-list-2').css('display', 'none');
				$('.doctor-list-3 li').eq(0).addClass('doctor-active');
				text2 = $('.doctor-list-3 li:first-child .doctor-name').text()
				$('.doctor-value').val(text2);
			}
		}
	})

	$('.doctor-list-1 li').on('click', function() {
		activeDoctor($(this));
	})
	$('.doctor-list-2 li').on('click', function() {
		activeDoctor($(this));
	})
	$('.doctor-list-3 li').on('click', function() {
		activeDoctor($(this));
	})
	function activeDoctor(_this) {
		_this.addClass('doctor-active').siblings('li').removeClass('doctor-active');
		_this.children('.fa').css('display', 'block');
		var text = _this.children('.doctor-name').text();
		$('.doctor-value').val(text);
	}

	$('.submit-btn').on('click', function() {
		var name = $(".name").val();
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

		var phone = $(".phone").val();
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
		var data = $('.form form').serializeArray();
		// console.log(data)
		$.post('/tables/tables/add_post',data,function(result){
			//console.log(result);
			alert(result.info);
		});
	})

	var mySwiper = new Swiper('.content-2 .swiper-container', {
		slidesPerView : 3,
		navigation: {
	      	nextEl: '.next-btn',
	      	prevEl: '.prev-btn',
	    },
	    loop: true,
	})

	var mySwiper2 = new Swiper('.banner-2 .swiper-container', {
		autoplay: true,
		loop: true,
	})

	var mySwiper3 = new Swiper('.content4-banner .swiper-container', {
		direction : 'vertical',
	})

	$('.banner-tab-list>div').on('click', function() {
		var inx = $(this).index();
		$(this).addClass('active-tab').siblings('div').removeClass('active-tab');
		mySwiper3.slideTo(inx, 500, false);
	})
})