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
			<li class="active"><a href="<?php echo U('registeradmin/index');?>">挂号信息</a></li>
		</ul>
		<form class="well form-search" method="post" action="<?php echo U('registeradmin/index');?>">
			时间： 
			<input type="text" name="start_time" class="js-date" value="<?php echo ($formget["start_time"]); ?>" style="width: 80px;" autocomplete="off">-
			<input type="text" class="js-date" name="end_time" value="<?php echo ($formget["end_time"]); ?>" style="width: 80px;" autocomplete="off"> &nbsp; &nbsp;
			患者姓名：
			<input type="text" name="keyword" style="width: 200px;" value="<?php echo ($formget["keyword"]); ?>" placeholder="请输入关键字...">
			<input type="submit" class="btn btn-primary" value="搜索" />
		</form>
		<form class="js-ajax-form" action="" method="post">
			<div class="table-actions">
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('registeradmin/delete');?>" data-subcheck="true" data-msg="你确定删除吗？"><?php echo L('DELETE');?></button>
			</div>
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
						<th width="50">ID</th>
						<th width="100">姓名</th>
						<th width="100">电话</th>
						<th width="100">预约科室</th>
						<th width="100">预约医生</th>
						<th width="100">预约时间</th>
						<th width="100">备注</th>
						<th width="100">状态</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php if(is_array($register)): foreach($register as $key=>$vo): ?><tr>
						<td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="<?php echo ($vo["id"]); ?>" title="ID:<?php echo ($vo["id"]); ?>"></td>
						<td><?php echo ($vo["id"]); ?></td>
						<td><?php echo ($vo["name"]); ?></td>
						<td><?php echo ($vo["phone"]); ?></td>
						<td><?php echo ($vo["department"]); ?></td>
						<td><?php echo ($vo["doctor"]); ?></td>
						<td><?php echo ($vo["appointment"]); ?></td>
						<td><?php echo ($vo["remark"]); ?></td>
						<td><?php echo $status = $vo[register]==0 ? '未受理':'已受理' ?></td>
						<td>
							<a href="<?php echo U('registeradmin/edit',array('id'=>$vo['id']));?>" class="js-ajax-dialog-btn">受理预约</a>
							<a href="<?php echo U('registeradmin/delete',array('id'=>$vo['id']));?>" class="js-ajax-delete"><?php echo L('DELETE');?></a>
						</td>
					</tr><?php endforeach; endif; ?>
				</tbody>
				<tfoot>
					<tr>
						<th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
						<th width="50">ID</th>
						<th width="100">姓名</th>
						<th width="100">电话</th>
						<th width="100">预约科室</th>
						<th width="100">预约医生</th>
						<th width="100">预约时间</th>
						<th width="100">备注</th>
						<th width="100">状态</th>
						<th width="100">操作</th>
					</tr>
				</tfoot>
			</table>
			<div class="table-actions">
				<button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="<?php echo U('registeradmin/delete');?>" data-subcheck="true" data-msg="你确定删除吗？"><?php echo L('DELETE');?></button>
			</div>
			<div class="pagination"><?php echo ($Page); ?></div>
		</form>
	</div>
					
	<script src="/public/js/common.js?"></script>

</body>
</html>