$(function() {
	$('.name-input input').on('focusout', function() {
		if($(this).val().length > 20) {
			$('.name-tips').fadeIn();
		}
		else {
			$('.name-tips').fadeOut();
		}
	})

	function listen() {
		$('.table-box tbody tr input').bind('input propertychange', function () {
			var inx = $(this).parent().parent('tr').index();
			var text = $(this).val();
			$('.screen .input-group-i').eq(inx).children('span').text(text);
		})
	}
	listen();

	var can = $('.can').val();
	if(can) {
		return;
	}
	else {
		var attr = ['姓名', '电话', '邮箱', '数值', '性别', '日期', '城市', '文本', '多文本', '下拉', '单选', '多选'];
		var html = '';
		for(var i = 0; i < attr.length; i++) {
			html += `<option value="${i+1}">${attr[i]}</option>`;
		}
		
		$.each($(".table-box tbody tr"), function() {
			$(this).find('.type').find('select').html(html);
			if($(this).find('.must input').val() == 1){
				$(this).find('.must span').addClass('cheakbox checked')
			}
			if($(this).find('.only input').val() == 1){
				$(this).find('.only span').addClass('cheakbox checked')
			}
			
		});
		$('#select2 option:eq(1)').prop('selected',true);
	}
	

	$('body').on('click', '.add-line a', function() {
		var html2 = '';
		for(var i = 0; i < attr.length; i++) {
			if(i == 7) {
				html2 += `<option selected="true" value="${i+1}">${attr[i]}</option>`;
			}
			else {
				html2 += `<option value="${i+1}">${attr[i]}</option>`;
			}
		}
		var addHtml = `<tr>
						<td class="name"><input type="text" placeholder="字段名称"></td>
						<td class="type">
							<select name="" class="addtext">
								${html2}
							</select>
						</td>
						<td class="must">
							<div class="cheakbox">
								<span><i></i></span>
							</div>
						</td>
						<td class="only">
							<div class="cheakbox">
								<span><i></i></span>
							</div>
						</td>
						<td class="radio" style="display: none;">
							<input type="hidden" name="content[0][radio]" value="0" />
						</td>
						<td class="ctr">
							<span class="btn btn-default" title="上移">
								<i class="fa fa-list"></i>
								<i class="fa fa-long-arrow-up"></i>
							</span>
							<span class="btn btn-default delete" title="删除">
								<i class="fa fa-trash-o"></i>
							</span>
						</td>
					</tr>`;
		$('.table-box tbody tr').eq(-2).after(addHtml);

		var addBtn = `<span class="btn btn-default" title="下移">
							<i class="fa fa-list"></i>
							<i class="fa fa-long-arrow-down"></i>
						</span>`;
		$('.table-box tbody tr').eq(-3).children('.ctr').children('span').eq(-2).after(addBtn);

		var addHtml2 = `<div class="input-group-i">
                    		<span class="input-group-addon-i"></span>                      
                            <input type="text" class="form-control form-input-i name">
                		</div>`;
		$('.screen .input-group-i').eq(-2).after(addHtml2);

		if($('.table-box tbody tr').length > 2) {
			if($('.table-box tbody tr:first-child .ctr span').eq(0).attr('title') != '下移') {
				$('.table-box tbody tr:first-child .ctr span').eq(0).before(addBtn);
			}
		}
		listen();
		setInputName();
	})

	$('body').on('click', '.cheakbox span', function() {
		if(can){
			return;
		}else{
			if($(this).hasClass('checked')) {
				$(this).removeClass('checked');
				$(this).next('input').attr('value',0);
			}
			else {
				$(this).addClass('checked');
				$(this).next('input').attr('value',1);
			}
		}
		
	})

	$('body').on('click', '.btn-default', function() {
		var inx = $(this).parent().parent('tr').index();
		var moveUpBtn = `<span class="btn btn-default" title="上移">
							<i class="fa fa-list"></i>
							<i class="fa fa-long-arrow-up"></i>
						</span>`;
		if($(this).attr('title') == '下移') {
			if($('.table-box tbody tr').length == 3) {
				$(this).children('.fa-long-arrow-down').removeClass('fa-long-arrow-down').addClass('fa-long-arrow-up');
				$('.table-box tbody tr:nth-child(2) .ctr span').eq(0).children('i').eq(1).removeClass('fa-long-arrow-up').addClass('fa-long-arrow-down');
				$(this).parent().parent('tr').next().children('td').children('span').eq(0).attr('title', '下移');
				$(this).attr('title', '上移');
			}

			move($(this).parent().parent('tr'), 'down');
			move($('.screen .input-group-i').eq(inx), 'down');

			$('.table-box tbody tr:first-child').children('.ctr').children('span').attr('title') == '上移' ? $('.table-box tbody tr:first-child .ctr span').eq(0).remove() : ''
			$(this).parent('.ctr').children('span').eq(0).attr('title') != '上移' ? $(this).before(moveUpBtn) : ''

			$('.table-box tbody tr').length != 3 ? addOrDeleteMoveDownBtn() : ''
		}
		else if($(this).attr('title') == '上移') {
			if($('.table-box tbody tr').length == 3) {
				$(this).children('.fa-long-arrow-up').removeClass('fa-long-arrow-up').addClass('fa-long-arrow-down');
				$('.table-box tbody tr:first-child .ctr span').eq(0).children('i').eq(1).removeClass('fa-long-arrow-down').addClass('fa-long-arrow-up');
				$(this).parent().parent('tr').prev().children('td').children('span').eq(0).attr('title', '上移');
				$(this).attr('title', '下移');
			}

			move($(this).parent().parent('tr'), 'up');
			move($('.screen .input-group-i').eq(inx), 'up');

			$('.table-box tbody tr:first-child .ctr span').eq(0).attr('title') == '上移' ?	$('.table-box tbody tr:first-child .ctr span').eq(0).remove() : ''
			$('.table-box tbody tr:nth-child(2) .ctr span').eq(0).attr('title') != '上移' ? $('.table-box tbody tr:nth-child(2) .ctr span').eq(0).before(moveUpBtn) : ''

			$('.table-box tbody tr').length != 3 ? addOrDeleteMoveDownBtn() : ''
		}
		else if($(this).attr('title') == '删除') {
			var length = $('.table-box tbody tr').length;
			var inx = $(this).parent().parent('tr').index();
			if(inx == length - 2) {
				$('.table-box tbody tr').eq(-3).children('.ctr').children('span').eq(-2).remove();
			}
			else if(inx == 0) {
				$('.table-box tbody tr').eq(1).children('.ctr').children('span').eq(0).remove();
			}
			$(this).parent().parent('tr').remove();
			$('.screen .input-group-i').eq(inx).remove();
			setRadioName();
		}
		setInputName();
	})
	
	function move(target, key) {
		var temobj1 = $("<div></div>");
    	var temobj2 = $("<div></div>");
		if(key == 'down') {
			var otherHtml = target.next();
		}
		else if(key == 'up') {
			var otherHtml = target.prev();
		}
		temobj1.insertBefore(target);
    	temobj2.insertBefore(otherHtml);
    	target.insertAfter(temobj2);
    	otherHtml.insertAfter(temobj1);
    	temobj1.remove();
    	temobj2.remove();
    	listen();
	}
	function addOrDeleteMoveDownBtn() {
		var moveDownBtn = `<span class="btn btn-default" title="下移">
								<i class="fa fa-list"></i>
								<i class="fa fa-long-arrow-down"></i>
							</span>`;
		$('.table-box tbody tr').eq(-2).children('.ctr').children('span').eq(1).attr('title') == '下移' ? $('.table-box tbody tr').eq(-2).children('.ctr').children('span').eq(1).remove() : ''
		$('.table-box tbody tr').eq(-3).children('.ctr').children('span').eq(1).attr('title') != '下移' ? $('.table-box tbody tr').eq(-3).children('.ctr').children('span').eq(0).after(moveDownBtn) : ''
	}
	
	
	$('body').on('change', 'select', function() {
		var addDataBtn = `<div class="btn btn-primary btn-setselect" data-type="0">设置数据</div>`;
		var addDataBtn1 = `<div class="btn btn-primary btn-setselect" data-type="1">设置数据</div>`;
		if($(this).children('option:selected').val() == 11) {
			$(this).hasClass('Btn2') ? $(this).next().remove() : '' 
			$(this).after(addDataBtn);
			$(this).addClass('Btn1');
			$(this).removeClass('Btn2');
		}
		else if($(this).children('option:selected').val() == 12) {
			$(this).hasClass('Btn1') ? $(this).next().remove() : '' 
			$(this).after(addDataBtn1);
			$(this).addClass('Btn2');
			$(this).removeClass('Btn1');
		}
	})

	function setInputName(){
		$.each($(".table-box tbody tr"),function(i){
			$(this).find('.name').find('input').attr('name','content['+i+'][name]');
			$(this).find('.type').find('select').attr('name','content['+i+'][type]');
			$(this).find('.must').find('input').attr('name','content['+i+'][is_must]');
			$(this).find('.only').find('input').attr('name','content['+i+'][is_only]');
			$(this).find('.radio').find('input').attr('name','content['+i+'][radio]');
			$(this).find('.radio_type').find('input').attr('name','content['+i+'][radio_type]');
		});
	}
	setInputName();

	var idsBox1 = '';
	var idsBox2 = '';
	var ids = '';
	var radio_text1 = '';
	var radio_text2 = '';
	var details = '';
	$('body').on('click', '.radio-wrapper .icon', function() {
		$('.radio-wrapper .icon').removeClass('checked');
		$(this).hasClass('checked') ? $(this).removeClass('checked') : $(this).addClass('checked')
		ids = $(this).parent().parent('td').next().children('span').text();
		if($(this).parent().parent('td').parent('tr').parent('tbody').hasClass('box1')) {
			idsBox1 = $(this).parent().parent('td').next().children('span').text();
			radio_text1 = $(this).parent().parent('td').next().next().children('span').text();
		}
		else {
			idsBox2 = $(this).parent().parent('td').next().children('span').text();
			radio_text2 = $(this).parent().parent('td').next().next().children('span').text();
		}
	})

	$('body').on('click', '.check-detail', function() {
		$('.preview-radio').removeClass('unshow');
		$('.radio-table-section').addClass('unshow');
		$('.bottom-btn').addClass('unshow');
		var id = $(this).data('id');
	 	var html = "<tr><td>序号</td><td class='table-section-msg'>选项名</td></tr>";
	 	$.post('/Tables/AdminTablesOptions/view.html',{id:id},function(data){
	 		$.each(JSON.parse(data), function(i,n) {
	 			html += `<tr><td>${n.id}</td><td class="table-section-msg">${n.name}</td></tr>`;
	 		});
	 		$('.preview-radio').find('tbody').html(html);
	 	});
	})

	$('body').on('click', '.return-list', function() {
		$('.preview-radio').addClass('unshow');
		$('.edit-radio').addClass('unshow');
		$('.radio-table-section').removeClass('unshow');
		$('.bottom-btn').removeClass('unshow');

	})

	$('.modal-close-x').on('click', function() {
		$('.modal-wrap').fadeOut();
		setTimeout(function() {
			$('.radio-table-section').removeClass('unshow');
			$('.edit-radio').addClass('unshow');
			$('.preview-radio').addClass('unshow');
			$('.bottom-btn').removeClass('unshow');
		}, 1000)
	})


	var trInx = '';
	var radio_type = 0;
	$('body').on('click', '.btn-setselect', function() {
		$('.modal-wrap').fadeIn();
		trInx = $(this).parents('tr').index();
		radio_type = $(this).data('type');
		var type = $(this).data('type');
		$.post('/Tables/AdminTablesOptions/index.html',{type:type},function(data){
	 		var data = JSON.parse(data);
	 		var html = "";
	 		var checked = "";
	 		if(type == 0) {
	 			$.each(data, function(i,n) {
		 			if(idsBox1 == n.id){
		 				checked = "checked";
		 			}else{
		 				checked = "";
		 			}
		 			html += `<tr>
								<td>
				                    <div class="radio-wrapper">
								        <span class="icon ${checked}">
								            <i class="fa fa-check" aria-hidden="true"></i>
								        </span>
									</div>
				                </td>
				                <td><span>${n.id}</span></td>
				                <td><span>${n.name}</span></td>
				                <td>
				                	<a href="javascript:;" data-id="${n.id}" class="check-detail"><span>查看选项</span></a>
				                </td>
				                <td class="operation-cell">
				                    <a href="javascript:;" class="del_radio" data-id="${n.id}">
				                    	<span class="operation-item" title="删除">
					                        <i class="fa fa-trash-o"></i>
					                    </span>
				                    </a>
				                    <a href="javascript:;">
				                    	<span class="operation-item" title="复制并编辑" data-id="${n.id}">
					                        <i class="fa fa-copy"></i>
					                    </span>
				                    </a>
				                </td>
				            </tr>`;
		 		});
	 			$('.radio-table-section').find('tbody.box1').html(html);
	 			$('.radio-table-section tbody.box1').removeClass('unshow');
	 			$('.radio-table-section tbody.box2').addClass('unshow');
	 		}
	 		else if(type == 1) {
	 			$.each(data, function(i,n) {
		 			if(idsBox2 == n.id){
		 				checked = "checked";
		 			}else{
		 				checked = "";
		 			}
		 			html += `<tr>
								<td>
				                    <div class="radio-wrapper">
								        <span class="icon ${checked}">
								            <i class="fa fa-check" aria-hidden="true"></i>
								        </span>
									</div>
				                </td>
				                <td><span>${n.id}</span></td>
				                <td><span>${n.name}</span></td>
				                <td>
				                	<a href="javascript:;" data-id="${n.id}" class="check-detail"><span>查看选项</span></a>
				                </td>
				                <td class="operation-cell">
				                    <a href="javascript:;" class="del_radio" data-id="${n.id}">
				                    	<span class="operation-item" title="删除">
					                        <i class="fa fa-trash-o"></i>
					                    </span>
				                    </a>
				                    <a href="javascript:;">
				                    	<span class="operation-item" title="复制并编辑" data-id="${n.id}">
					                        <i class="fa fa-copy"></i>
					                    </span>
				                    </a>
				                </td>
				            </tr>`;
		 		});
	 			$('.radio-table-section').find('tbody.box2').html(html);
	 			$('.radio-table-section tbody.box2').removeClass('unshow');
	 			$('.radio-table-section tbody.box1').addClass('unshow');
	 		}
	 		
	 	});
	})
	
	$('body').on('click', '.del_radio', function(){
		var id = $(this).data('id');
		// console.log(id);
		$.post('/tables/AdminTablesOptions/delete.html',{id,id},function(data){
			if(data){
				alert('删除成功');
			}else{
				alert('删除失败');
			}
		});
	});
	href="/.html"
	
	
	$('.ensure').on('click', function() {
		var html = '';
		$('.modal-wrap').fadeOut();
		$('.table-box tbody tr').eq(trInx).children('td.radio').find('input').val(ids);
		if($('.table-box tbody tr').eq(trInx).children('td.type').find('div').data('type') == 0) {
			radio_text1 == '' ? '' : $('.table-box tbody tr').eq(trInx).children('td.type').find('.btn-setselect').text(radio_text1)
		}
		else {
			radio_text2 == '' ? '' : $('.table-box tbody tr').eq(trInx).children('td.type').find('.btn-setselect').text(radio_text2)
		}

		if(ids == '') {
			return;
		}
		else {
			$.post('/Tables/AdminTablesOptions/view.html',{id:ids},function(data){
		 		var datas = JSON.parse(data);
		 		for(var i = 0; i < datas.length; i ++) {
		 			html += `<label class="checkbox-item" style="display:inline-block;">
								<input type="checkbox" value="${datas[i].name}" class="radio-style">
								<span>${datas[i].name}</span>
							</label>`;
					$('.screen .input-group-i').eq(trInx).children('div').html(html);
		 		}
		 	});
		}
	})
	
	$('body').on('click', '.btn-setselect1', function() {
		$('.modal-wrap1').fadeIn();
	})

	$('body').on('click', '.operation-item', function() {
		$(this).attr('title') == '删除' ? $(this).parent().parent('.operation-cell').parent('tr').remove() : ''
		if($(this).attr('title') == '复制并编辑') {
			$('.edit-radio').removeClass('unshow'); 
			$('.radio-table-section').addClass('unshow');
			$('.bottom-btn').addClass('unshow');
			$('.bottom-btn2').removeClass('unshow');
			var id = $(this).data('id');
		 	$.post('/Tables/AdminTablesOptions/copy.html',{id:id},function(data){
		 		// console.log(data);
		 		var data = JSON.parse(data);
		 		var html = `<div>
	                    <div class="table-section">
	                    <form class="js-ajax-form" id="radioFrom" action="" method="post">
	                    	<div class="input-require-text rlt">
							    <div class="form-group flex">
							        <label class="control-label text-left">单选名<span class="text-danger">*</span></label>
						            <div class="form-group-input">
						                <input type="text" name="name" value="${data.name}" placeholder="请输入名称">
						                <input type="hidden" name="type" value="${data.type}" />
						                <h5 class="text-danger abs unshow">名称长度为1-20个字符,中文占2个字符</h5>
						            </div>
							    </div>
							</div>
	                        <table>
	                        	<thead>
	                        		<tr>
		                                <td>序号</td>
		                                <td>选项名</td>
		                                <td>操作</td>
		                            </tr>
	                        	</thead>
	                            <tbody>`;
	                            $.each(JSON.parse(data.content), function(i,n) {
		                            html +=`<tr class="content">
		                                <td class="id"><input type="text" name="" value="${n.id}" /></td>
		                                <td class="name"><input type="text" name="" value="${n.name}"></td>
		                                <td>
		                                    <span class="btn btn-default" title="删除">
		                                        <i class="fa fa-trash-o fa-lg"></i>
		                                    </span>
		                                </td>
		                            </tr>`;
		                        });
	                    html += `</tbody>
	                        </table></form>
	                    </div>
            		</div>
            		<div class="center bottom-btn2">
	                    <span class="btn btn-common return-list">返回列表</span>
	                    <span class="btn btn-success addLine">增加一项</span>
	                    <span class="btn save btn-primary" data-type="${radio_type}">保存</span>
	                </div>`;
		 		$('.edit-radio').html(html);
		 		setRadioName();
		 	});
		}
	})

	$('body').on('focusout', '.form-group-input .form-control', function() {
		if($(this).val().length > 20) {
			$(this).next().removeClass('unshow');
		}
		else {
			$(this).next().addClass('unshow');
		}
	})


	$('body').on('click', '.addLine', function() {
		var inx = $('.edit-radio .table-section tbody tr').length;
		var add = `<tr class="content">
                    <td class="id"><input type="text" name="content[0][id]" value="${inx + 1}" /></td>
                    <td class="name"><input type="text" value="选项${inx + 1}"></td>
                    <td>
                        <span class="btn btn-default" title="删除">
                            <i class="fa fa-trash-o fa-lg"></i>
                        </span>
                    </td>
                </tr>`;
        $('.edit-radio .table-section tbody tr:last-child').after(add);
        setRadioName();
	})
	
	function setRadioName(){
		$.each($(".edit-radio .table-section tbody tr.content"),function(i){
			$(this).find('.id').find('input').attr('name','content['+i+'][id]');
			$(this).find('.name').find('input').attr('name','content['+i+'][name]');
		});
	}
	
	$('body').on('click', '.build', function() {
		
		var html = `<div>
	                    <div class="table-section">
	                    <form class="js-ajax-form" id="radioFrom" action="" method="post">
	                    	<div class="input-require-text rlt">
							    <div class="form-group flex">
							        <label class="control-label text-left">单选名<span class="text-danger">*</span></label>
						            <div class="form-group-input">
						                <input type="text" name="name" placeholder="请输入名称">
						                <input type="hidden" class="radio_type" name="type" value="${radio_type}" />
						                <h5 class="text-danger abs unshow">名称长度为1-20个字符,中文占2个字符</h5>
						            </div>
							    </div>
							</div>
	                        <table>
	                        	<thead>
	                        		<tr>
		                                <td>序号</td>
		                                <td>选项名</td>
		                                <td>操作</td>
		                            </tr>
	                        	</thead>
	                            <tbody>
		                            <tr class="content">
		                                <td class="id"><input type="text" name="content[0][id]" value="1" /></td>
		                                <td class="name"><input type="text" name="content[0][name]" value="选项1"></td>
		                                <td>
		                                    <span class="btn btn-default" title="删除">
		                                        <i class="fa fa-trash-o fa-lg"></i>
		                                    </span>
		                                </td>
		                            </tr>
		                            <tr class="content">
		                                <td class="id"><input type="text" name="content[0][id]" value="2" /></td>
		                                <td class="name"><input type="text" name="content[0][name]" value="选项2"></td>
		                                <td>
		                                    <span class="btn btn-default" title="删除">
		                                        <i class="fa fa-trash-o fa-lg"></i>
		                                    </span>
		                                </td>
		                            </tr>
	                        	</tbody>
	                        </table></form>
	                    </div>
            		</div>
            		<div class="center bottom-btn2">
	                    <span class="btn btn-common return-list">返回列表</span>
	                    <span class="btn btn-success addLine">增加一项</span>
	                    <span class="btn save btn-primary">保存</span>
	                </div>`;
		
		$('.edit-radio').removeClass('unshow');
		$('.edit-radio').html(html);
		$('.radio-table-section').addClass('unshow');
		$('.bottom-btn').addClass('unshow');
		setRadioName();
	})
	
	$('body').on('click', '.save', function() {
		var data = $('.edit-radio .table-section #radioFrom').serializeArray();
		// console.log(data);
		$.post('/Tables/AdminTablesOptions/add_post.html',data,function(result){
	 		if(result.code == 1){
	 			alert('添加成功');
	 		}else{
	 			alert('添加失败，请稍后重试');
	 		}
	 	});
	})
})