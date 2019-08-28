$(function(){
	$('a.getdoctor').on('shown.bs.tab', function () {
		var did = $(this).data('did');
		$.post('/api/ajaxdata/ajax_doctor.html',{did:did},function(data){
			var html = "<div class='menu-doc fade in tab-pane active' id='menu-doc-0'><ul>";;
			$.each(data,function(i,n){
				html+="<li><a href='/doctor/" + n['doctor_id'] + ".html'>";
				html+="<div class='zj-pic'><img src='" + n['smeta'] +" '></div>";
				html+="<p class='zj-name'>" + n['name'] + "</p><p class='zj-zhichen'>" + n['duties'] + "</p></a></li>";
			});
			html+="</ul></div>";
			$('.tab_doctor').html(html);
		});
	});	
	
	/*$('a.get_term').on('shown.bs.tab', function () {
		var tid = $(this).data('tid');
		var cid = $(this).data('cid');
		$.post('/api/ajaxdata/ajax_nav.html',{tid:tid,cid:cid},function(data){
			var html = "<dl><dt>牙齿症状</dt><dd><ul>";;
			$.each(data.terms,function(i,n){
				if(n['term_id'] == 152){}else{
					html+="<li><a href='/list/" + n['term_id'] + ".html'>" + n['name'] + "</a></li>";
				}
			});
			html+="</ul></dd></dl><dl><dt>修复中心</dt><dd><ul>";
			$.each(data.way,function(i1,n1){
				if(n1['link_type'] == 1){
					html+="<li><a href='"+ n1['post_murl'] +"' target='_black'>" + n1['post_title'] + "</a></li>";
				}else{
					html+="<li><a href= /article/'"+ n1['tid'] +".html'>" + n1['post_title'] + "</a></li>";
				}
				
			});
			if(tid == 3 || tid == 4){
				html+="</ul></dd></dl><dl><dt>德道美学</dt><dd><ul><li><a href='/swt/' target='_blank'>DSD微笑美学设计</a></li><li><a href='/swt/' target='_blank'>颜面美学</a></li><li><a href='/swt/' target='_blank'>红白美学</a></li></ul></dd></dl>"
			}
			$('.tab_terms').html(html);
		});
	});*/
});

