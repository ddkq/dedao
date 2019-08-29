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
	<div class="wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="<?php echo U('articlecat/index');?>"><?php echo L('ADMIN_ARTICLECAT_INDEX1');?></a></li>
			<li><a href="<?php echo U('articlecat/add');?>"><?php echo L('ADMIN_ARTICLECAT_ADD');?></a></li>
			<li><a href="<?php echo U('EQrelationship/index');?>"><?php echo L('ADMIN_EQRELATIONSHIP');?></a></li>
			<li><a href="<?php echo U('EArelationship/index');?>"><?php echo L('ADMIN_EARELATIONSHIP');?></a></li>
			<li><a href="<?php echo U('EErelationship/index');?>"><?php echo L('ADMIN_EERELATIONSHIP');?></a></li>
		</ul>
		<form method="post" class="js-ajax-form" action="<?php echo U('term/listorders');?>">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th width="50">ID</th>
						<th><?php echo L('NAME');?></th>
						<th width="120"><?php echo L('ACTIONS');?></th>
					</tr>
				</thead>
				<tbody>
					
					<?php if(is_array($cat)): $i = 0; $__LIST__ = $cat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
							<td></td>
							<td><?php echo ($vo["cat_name"]); ?></td>
							<td></td>
						</tr>
						<?php $list = sp_cat_list($vo[cid]) ?>
						<?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
								<td><?php echo ($vo["cid"]); ?></td>
								<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  <?php echo ($vo["cat_name"]); ?></td>
								<td>
									<a href="<?php echo U('articlecat/edit',array('id'=>$vo['cid']));?>"><?php echo L('EDIT');?></a>|
									<a href="<?php echo U('articlecat/delete',array('id'=>$vo['cid']));?>" class="js-ajax-delete"><?php echo L('DELETE');?></a>
								</td>
							<tr/><?php endforeach; endif; endforeach; endif; else: echo "" ;endif; ?>

				</tbody>
			</table>
		</form>
	</div>
	<script src="/public/js/common.js"></script>
</body>
</html>