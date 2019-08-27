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
</head>
<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="javascript:;">问卷管理</a></li>
			<li><a href="<?php echo U('AdminQuestionnaire/add');?>" target="_self">新建问卷</a></li>
		</ul>
		<form class="well form-search" method="post" action="<?php echo U('AdminQuestionnaire/index');?>">
			时间：
			<input type="text" name="start_time" class="js-date" value="<?php echo ((isset($formget["start_time"]) && ($formget["start_time"] !== ""))?($formget["start_time"]):''); ?>" style="width: 80px;" autocomplete="off">-
			<input type="text" class="js-date" name="end_time" value="<?php echo ($formget["end_time"]); ?>" style="width: 80px;" autocomplete="off"> &nbsp; &nbsp;
			状态： 
			<select class="select_2" name="status">
				<option value='1'>使用中</option>
				<option value="0">已删除</option>
			</select>
			问卷名： 
			<input type="text" name="keyword" style="width: 200px;" value="<?php echo ($formget["keyword"]); ?>" placeholder="请输入问卷名...">
			<input type="submit" class="btn btn-primary" value="搜索" />
		</form>
		<form class="js-ajax-form" action="" method="post">
			<table class="table table-hover table-bordered table-list">
				<thead>
					<tr>
						<th width="50">id</th>
						<th width="300">问卷名</th>
						<th width="70">创建时间</th>
						<th width="70">操作</th>
					</tr>
				</thead>
				<?php if(is_array($posts)): foreach($posts as $key=>$vo): ?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><span><?php echo ($vo["title"]); ?></span></td>
					<td><?php echo ($vo["createtime"]); ?></td>
					<td>
						<a href="<?php echo U('AdminQuestionnaire/data',array('id'=>$vo['id']));?>">查看数据</a> |
						<a href="<?php echo U('AdminQuestionnaire/analysis',array('id'=>$vo['id']));?>">交叉分析</a> |
						<a href="<?php echo U('AdminQuestionnaire/edit',array('id'=>$vo['id'],'can'=>0));?>">修改</a> | 
						<a href="<?php echo U('AdminQuestionnaire/delete',array('id'=>$vo['id']));?>" class="js-ajax-delete">删除</a>
					</td> 
				</tr><?php endforeach; endif; ?>
				<tfoot>
					<tr>
						<th width="50">id</th>
						<th width="300">问卷名</th>
						<th width="70">创建时间</th>
						<th width="70">操作</th>
					</tr>
				</tfoot>
			</table>
			<div class="pagination"><?php echo ($Page); ?></div>
		</form>
	</div>
	<script src="/public/js/common.js"></script>
	<script>
		function refersh_window() {
			var refersh_time = getCookie('refersh_time');
			if (refersh_time == 1) {
				window.location = "<?php echo U('AdminQuestionnaire/index',$formget);?>";
			}
		}
		setInterval(function() {
			refersh_window();
		}, 2000);
		
	</script>
</body>
</html>