$(function() {
	var mySwiper = new Swiper('.content-1 .swiper-container', {
		autoplay: true,
		loop: true,
		navigation: {
	      	nextEl: '.content-1 .right-arrow',
	      	prevEl: '.content-1 .left-arrow',
	    },
	})

	$('.content-1-tab>div').hover(function() {
		var inx = $(this).index();
		$(this).addClass('active-tab').siblings('div').removeClass('active-tab');

		$('.content-1-img img').eq(inx).css('display', 'inline-block').siblings('img').css('display', 'none');
		$('.content-1-text p').eq(inx).css('display', 'inline-block').siblings('p').css('display', 'none');
	}, function() {
		/* Stuff to do when the mouse leaves the element */
	});

	var mySwiper2 = new Swiper('.content-2 .swiper-container', {
		autoplay: true,
		loop: true,
		navigation: {
	      	nextEl: '.content-2 .arrow-right',
	      	prevEl: '.content-2 .arrow-left',
	    },
	})

	$('.content-2-swt-text li').hover(function() {
		$(this).addClass('active-text').siblings('li').removeClass('active-text');
	}, function() {
		/* Stuff to do when the mouse leaves the element */
	});

	var mySwiper3 = new Swiper('.content-3 .swiper-container', {
		navigation: {
	      	nextEl: '.content-3 .arrow-right',
	      	prevEl: '.content-3 .arrow-left',
	    },
	    on: {
		    slideChangeTransitionEnd: function(){
		      	$('.page .current').html(this.activeIndex + 1);
		    },
	  	},
	})

	var mySwiper4 = new Swiper('.content-4 .swiper-container', {
		loop: true,
		navigation: {
	      	nextEl: '.content-4 .arrow-right',
	      	prevEl: '.content-4 .arrow-left',
	    },
	})

	$('.swt-btn-list a').hover(function() {
		$(this).addClass('active-btn').siblings('a').removeClass('active-btn');
	}, function() {
		/* Stuff to do when the mouse leaves the element */
	});

	$('.symptom-list>div').on('click', function() {
		$(this).addClass('active-symptom').siblings('div').removeClass('active-symptom');
		$('.symptom-input').val($(this).children('div').eq(-1).text());
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