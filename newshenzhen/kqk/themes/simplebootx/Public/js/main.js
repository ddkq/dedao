$(function() {
	window.db = {
		id: 2,
		uri: 'http://api.dedaokq.com/',
		seoTitle: ''
	}

	// 医院信息
	$.post(window.db.uri + 'api/Setting/getSiteInfo', {db_id: window.db.id}, function(data) {
		$('.phone-num').html('健康热线: '+ data.site_telephone);
		$('.tel-num').html('电话： '+ data.site_telephone);
		$('.ICP').html('ICP备案号：'+ data.site_icp);
		$('.gov').html('川公网安备 '+ data.site_gov);
		$('.adv').html('广审号：'+ data.site_adv);
		window.db.seoTitle = data.site_seo_title;
	});


	// 
})