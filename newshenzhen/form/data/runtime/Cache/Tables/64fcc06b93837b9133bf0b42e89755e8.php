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
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('AdminTables/index');?>">表单管理</a></li>
			<li class="active"><a href="javascript:;">数据查看</a></li>
		</ul>
		<div class="table-actions">
			<button class="btn btn-primary btn-excel">导出</button>
		</div>
		<form class="js-ajax-form" action="" method="post">
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="50">id</th>
						<?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><th width="50"><?php echo ($vo["name"]); ?></th><?php endforeach; endif; else: echo "" ;endif; ?>
						<th width="50">当前页</th>
						<th width="70">ip</th>
						<th width="70">提交时间</th>
					</tr>
				</thead>
				<?php if(is_array($posts)): foreach($posts as $key=>$vo): $content1 = json_decode($vo['content'],true); ?>
				<tr>
					<td><?php echo ($vo["id"]); ?></td>
					<?php if(is_array($content1)): $i = 0; $__LIST__ = $content1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><td><?php echo ($vo1); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
					<td><?php echo ($vo["page"]); ?></td>
					<td><?php echo ($vo["ip"]); ?></td>
					<td><?php echo ($vo["createtime"]); ?></td>
				</tr><?php endforeach; endif; ?>
				<tfoot>
					<tr>
						<th width="50">id</th>
						<?php if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><th width="50"><?php echo ($vo["name"]); ?></th><?php endforeach; endif; else: echo "" ;endif; ?>
						<th width="50">当前页</th>
						<th width="70">ip</th>
						<th width="70">提交时间</th>
					</tr>
				</tfoot>
			</table>
			<div class="pagination"><?php echo ($Page); ?></div>
		</form>
		
		<style>
			#calroot{z-index: 10001;}
		</style>
		<div class="modal-wrap excel" style="display: none;">
			<div class="modal">
				<div class="modal-content">
					<a class="modal-close">
	                    <span class="modal-close-x"></span>
	                </a>
	                <div class="modal-header">
	                    <div class="modal-title">选项设置</div>
	                </div>
	                <div class="modal-body">
	                    <div slot="content" class="radio-modal">
							<form class="" method="post" action="<?php echo U('AdminTables/excel');?>">
								时间：
								<input type="text" name="start_time" class="js-datetime" value="<?php echo ((isset($formget["start_time"]) && ($formget["start_time"] !== ""))?($formget["start_time"]):''); ?>" style="width: 80px;" autocomplete="off">-
								<input type="text" class="js-datetime" name="end_time" value="<?php echo ($formget["end_time"]); ?>" style="width: 80px;" autocomplete="off"> &nbsp; &nbsp;
								<br/>
								表单地址：
								<input type="text" name="page" style="width: 200px;" value="<?php echo ($formget["page"]); ?>" placeholder="请填写url地址" />
								<br/>
								ip：
								<input type="text" name="ip" style="width: 200px;" value="<?php echo ($formget["ip"]); ?>" placeholder="请填写ip地址" />
								<br/>
								<input type="hidden" name="id" value="<?php echo ($id); ?>"/>
								<input type="submit" class="btn btn-primary" value="导出" />
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
		
	</div>
	<script src="/public/js/common.js"></script>
	<script>
		function refersh_window() {
			var refersh_time = getCookie('refersh_time');
			if (refersh_time == 1) {
				window.location = "<?php echo U('AdminTables/index',$formget);?>";
			}
		}
		setInterval(function() {
			refersh_window();
		}, 2000);
		
		
		$('body').on('click', '.btn-excel', function() {
			$('.modal-wrap').fadeIn();
		});
		$('.modal-close-x').on('click', function() {
			$('.modal-wrap').fadeOut();
		})
	</script>
</body>
</html>