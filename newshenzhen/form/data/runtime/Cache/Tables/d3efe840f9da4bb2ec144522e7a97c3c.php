<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/public/js/artDialog/skins/default.css" rel="stylesheet" >
    <link href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
   
    <link href="/public/simpleboot/css/mystyle.css" rel="stylesheet">
    <style>
		.length_3{width: 180px;}
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
	</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
<script type="text/javascript">
//全局变量
var GV = {
    DIMAUB: "/",
    JS_ROOT: "public/js/",
    TOKEN: "",
    ROOT: "/",
	WEB_ROOT: "__WEB_ROOT__/",
	APP:'<?php echo (MODULE_NAME); ?>'/*当前应用名*/
};
</script>
<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/wind.js"></script>
    <script src="/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	</style><?php endif; ?>
<link href="/public/simpleboot/css/from.css" rel="stylesheet">
</head>
<body>
	<div class="wrap">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('AdminTables/index');?>" target="_self">表单管理</a></li>
			<li class="active"><a href="javascript:;">修改表单</a></li>
		</ul>
		<div class="flex content">
			<form action="<?php echo U('AdminTables/edit_post');?>" method="post" class="form-horizontal js-ajax-forms" enctype="multipart/form-data">
				<div class="content-left">
					<div class="from-name">
						<span>表单名<i class="red"> *</i></span>
						<span class="name-input">
							<input type="text" name="name" value="<?php echo ($post["name"]); ?>" placeholder="请输入表单名称">
							<input type="hidden" name="id" value="<?php echo ($id); ?>" />
							<input type="hidden" class="can" value="0"/>
							<span class="name-tips red unshow">表单名长度为1-20个字符</span>
						</span class="name-input">
					</div>
					<p>设置表单字段</p>
					<div class="table-box">
						<table>
							<thead>
								<tr class="title">
									<th>字段名</th>
									<th>类型</th>
									<th>是否必填</th>
									<th>是否唯一</th>
									<th>操作</th>
								</tr>
							</thead>
							<?php if(is_array($content)): $k = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
									<td class="name"><input type="text" name="content[0][name]" value="<?php echo ($vo["name"]); ?>" readonly="readonly"></td>
									<td class="type">
										<select name="content[0][type]" id="select<?php echo ($k); ?>" data-value="<?php echo ($vo["type"]); ?>" style="pointer-events: none;"></select>
									</td>
									<td class="must">
										<div class="cheakbox">
											<span><i></i></span>
											<input type="hidden" name="content[0][is_must]" value="<?php echo ($vo["is_must"]); ?>">
										</div>
									</td>
									<td class="only">
										<div class="cheakbox">
											<span><i></i></span>
											<input type="hidden" name="content[0][is_only]" value="<?php echo ($vo["is_only"]); ?>" />
										</div>
									</td>
									<td class="radio" style="display: none;">
										<input type="hidden" name="content[0][radio]" data-radio="<?php echo ($vo["radio"]); ?>" value="<?php echo ($vo["radio"]); ?>"/>
									</td>
									<td class="ctr">
										<span class="btn btn-default" title="上移">
											<i class="fa fa-list"></i>
											<i class="fa fa-long-arrow-up"></i>
										</span>
										<span class="btn btn-default" title="下移">
											<i class="fa fa-list"></i>
											<i class="fa fa-long-arrow-down"></i>
										</span>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							<tr>
								<td class="name"><input type="text" value="<?php echo ($submit["name"]); ?>"></td>
								<td class="type"><div>提交按钮</div></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="form-actions">
					<button class="btn btn-primary js-ajax-submit" type="submit">提交</button>
					<a class="btn" href="<?php echo U('AdminTables/index');?>">返回</a>
				</div>
			</form>
			<div>
				<div class="form-preview">
	    			<div class="device">
	    				<div class="screen">
	    					
	    				</div>
	    			</div>
	    		</div>
			</div>
		</div>
	</div>
	
</body>
<script src="/public/js/from.js"></script>
<script>
	$(document).ready(function() {
		$('.table-box tbody tr').eq(-2).children('.ctr').children('span').eq(-1).remove();
		$('.table-box tbody tr:first-child .ctr span').eq(0).remove();

		var arrTitle = [];
		for(var i = 0; i < $('.table-box tbody tr').length; i ++) {
			arrTitle[i] = $('.table-box tbody tr').eq(i).children('.name').children('input').val()
		}
		var html = '';
		for(var k = 0; k < arrTitle.length; k ++) {
			if(k == arrTitle.length - 1) {
				html += `<div class="input-group-i">
                			<span class="btn-i">立即提交</span>
            			</div>`;
			}
			else {
				html += `<div class="input-group-i">
                			<span class="input-group-addon-i">${arrTitle[k]}</span>                      
                        	<input type="text" class="form-control form-input-i name">
            			</div>`;
			}
			$('.screen').html(html);
		}

		var selected1 = [];
		var attr2 = [' ','姓名', '电话', '邮箱', '数值', '性别', '日期', '城市', '文本', '多文本', '下拉', '单选', '多选'];
		for(var i = 0; i < $('.table-box tbody tr').length - 1; i ++) {
			selected1[i] = $(".table-box tbody tr").eq(i).children('.type').children('select').data("value");
		}
		var html2 = '';
		for(var k = 0; k < selected1.length; k ++) {
			html2 = `<option value="${selected1[k]}">${attr2[selected1[k]]}</option>`;
			$(".table-box tbody tr").eq(k).children('.type').children('select').html(html2);
		}
		
		for(var i = 0; i < $('.table-box tbody tr').length; i ++) {
			var is_must = $('.table-box tbody tr').eq(i).children('.must').find('input').val();
			if(is_must == 1){
				$('.table-box tbody tr').eq(i).children('.must').find('span').addClass('checked');
			}
		}
		for(var i = 0; i < $('.table-box tbody tr').length; i ++) {
			var is_only = $('.table-box tbody tr').eq(i).children('.only').find('input').val();
			if(is_only == 1){
				$('.table-box tbody tr').eq(i).children('.only').find('span').addClass('checked');
			}
		}
		
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
		}
		function addOrDeleteMoveDownBtn() {
			var moveDownBtn = `<span class="btn btn-default" title="下移">
									<i class="fa fa-list"></i>
									<i class="fa fa-long-arrow-down"></i>
								</span>`;
			$('.table-box tbody tr').eq(-2).children('.ctr').children('span').eq(1).attr('title') == '下移' ? $('.table-box tbody tr').eq(-2).children('.ctr').children('span').eq(1).remove() : ''
			$('.table-box tbody tr').eq(-3).children('.ctr').children('span').eq(1).attr('title') != '下移' ? $('.table-box tbody tr').eq(-3).children('.ctr').children('span').eq(0).after(moveDownBtn) : ''
		}
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

		var radioId = [];
		$(".radio input").each(function(i, ipt){
  			radioId[i] = $(ipt).data('radio');
		});
	  	if(radioId == '') {
			return;
		}
		else {
			$.post('/tables/adminTablesOptions/data_index.html', {id: radioId}, function(datas){
				// console.log(datas);
		 		for(var i = 0; i < datas.length; i ++) {
					if(datas[i] == null) {
						
					}
					else {
						var content = JSON.parse(datas[i].content);
						var html3 = '';
						for(var k = 0; k < content.length; k ++) {
							html3 += `<label class="checkbox-item" style="display:inline-block;">
										<input type="checkbox" value="${content[k].name}" class="radio-style">
										<span>${content[k].name}</span>
									</label>`;
							$('.screen .input-group-i').eq(i).children('span').after('<div>'+html3+'</div>');
							$('.screen .input-group-i').eq(i).children().eq(-1).remove();
						}
					}
		 		}
		 	});
		}
	})
</script>
</html>