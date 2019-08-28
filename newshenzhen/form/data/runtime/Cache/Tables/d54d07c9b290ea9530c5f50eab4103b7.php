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
<script src="/public/js/from.js"></script>
</head>
<body>
	<div class="wrap">
		<ul class="nav nav-tabs">
			<li><a href="<?php echo U('AdminTables/index');?>" target="_self">表单管理</a></li>
			<li class="active"><a href="javascript:;">新建表单</a></li>
		</ul>
		<div class="flex content">
			<form action="<?php echo U('AdminTables/add_post');?>" method="post" class="form-horizontal js-ajax-forms" enctype="multipart/form-data">
				<div class="content-left">
					<div class="from-name">
						<span>表单名<i class="red"> *</i></span>
						<span class="name-input">
							<input type="text" name="name" placeholder="请输入表单名称">
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
							<tr>
								<td class="name"><input type="text" name="content[0][name]" value="姓名"></td>
								<td class="type">
									<select name="content[0][type]" id="select"></select>
								</td>
								<td class="must">
									<div class="cheakbox">
										<span class="checked"><i></i></span>
										<input type="hidden" name="content[0][is_must]" value="1">
									</div>
								</td>
								<td class="only">
									<div class="cheakbox">
										<span><i></i></span>
										<input type="hidden" name="content[0][is_only]" value="0" />
									</div>
								</td>
								<td class="radio" style="display: none;">
									<input type="hidden" name="content[0][radio]" value="0" />
								</td>
								<td class="ctr">
									<span class="btn btn-default" title="下移">
										<i class="fa fa-list"></i>
										<i class="fa fa-long-arrow-down"></i>
									</span>
									<span class="btn btn-default delete" title="删除">
										<i class="fa fa-trash-o"></i>
									</span>
								</td>
							</tr>
							<tr>
								<td class="name"><input type="text" name="content[1][name]" value="电话"></td>
								<td class="type">
									<select name="content[1][type]" id="select2"></select>
								</td>
								<td class="must">
									<div class="cheakbox">
										<span class="checked"><i></i></span>
										<input type="hidden" name="content[1][is_must]" value="1">
									</div>
								</td>
								<td class="only">
									<div class="cheakbox">
										<span><i></i></span>
										<input type="hidden" name="content[1][is_only]" value="0">
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
							</tr>
							<tr>
								<td class="name"><input type="text" value="立即提交"></td>
								<td class="type"><div>提交按钮</div></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</table>
					</div>
					<div class="add-line"><a href="javascript:;"><i>+</i>增加一项</a></div>
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
	    					<div class="input-group-i">
	                    		<span class="input-group-addon-i">姓名</span>                      
	                            <div><input type="text" class="form-control form-input-i name"></div>
	                		</div>
	                		<div class="input-group-i">
	                    		<span class="input-group-addon-i">电话</span>                      
	                            <div><input type="text" class="form-control form-input-i name"></div>
	                		</div>
							<div class="input-group-i">
	                    		<span class="btn-i">立即提交</span>
	                		</div>
	    				</div>
	    			</div>
	    		</div>
			</div>
		</div>
	</div>
	<div class="modal-wrap unshow">
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

            <div class="radio-list">
                <div>
                	<div class="table-section radio-table-section">
    					<table>
					        <thead>
					            <tr>
					            	<th></th>
					                <th>ID</th>
					                <th>名称</th>
					                <th>内容</th>
					                <th>操作</th>
					            </tr>
					        </thead>
					        <tbody class="box1 unshow"></tbody>
					        <tbody class="box2 unshow"></tbody>
					    </table>
					</div>
					<div class="edit-radio unshow">
						
            		</div>
            		<div class="preview-radio unshow">
		                <div>
		                    <div class="table-section">
		                        <table>
		                            <tbody>
			                            
			                        </tbody>
		                        </table>
		                    </div>
		                </div>
		                <div class="row center">
		                    <span class="btn btn-common return-list">返回列表</span>
		                    <span class="btn btn-common">复制并编辑</span>
		                </div>
		            </div>
                </div>
                <div class="center bottom-btn">
                    <span class="btn btn-success build">新建选项</span>
                    <span class="btn btn-primary ensure">确定</span>
                </div>
            </div>
		</div>
	</div>


</body>
</html>