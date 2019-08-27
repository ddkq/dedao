<?php
namespace app\admin\controller;
use think\Controller;

/**
*@SWG\Swagger(
	swagger = "2.0",
	schemes = {"http"},
	host = "api.dedaokq.com",
	basePath = "/",
	@SWG\Info(
		version = "1.0.0",
		title = "德道口腔后台用api文档",
		description = "德道口腔后台用api文档",
	),

	@SWG\Definition(
		definition = "info",
		required = {"code","info"},
		@SWG\Property(
			property = "code",
			type = "integer",
			description = "状态码",
		),
		@SWG\Property(
			property = "info",
			type = "string",
			description = "提示信息",
		),
	),

	@SWG\Parameter(
		name = "token",
		type = "string",
		required = true,
		in = "formData",
		description = "令牌",
	),
	@SWG\Parameter(
		name = "db_id",
		type = "integer",
		required = true,
		in = "formData",
		description = "区域id(1:成都,2:深圳)",
	),
	@SWG\Parameter(
		name = "original_list_order",
		required = true,
		type = "array",
		in = "body",
		description = "排序前原始id数组",
		@SWG\Schema(
			type = "array",
			@SWG\Items(
				@SWG\Property(
					property = "id",
					type = "integer",
					description = "排序对象id",
				),
				@SWG\Property(
					property = "list_order",
					type = "integer",
					description = "排序前的值",
				),
			),
		),
	),
	@SWG\Parameter(
		name = "list_order",
		type = "array",
		required = true,
		in = "body",
		description = "排序后id数组",
		@SWG\Schema(
			type = "array",
			@SWG\Items(
				@SWG\Property(
					property = "id",
					type = "integer",
					description = "排序对象id",
				),
				@SWG\Property(
					property = "list_order",
					type = "integer",
					description = "排序后的值",
				),
			),
		),
	),
	@SWG\Parameter(
		name = "page",
		type = "integer",
		default = "0",
		in = "formData",
		description = "分页页码",
	),
	@SWG\Parameter(
		name = "start_time",
		type = "string",
		format = "dateTime",
		in = "formData",
		description = "搜索-开始时间",
	),
	@SWG\Parameter(
		name = "end_time",
		type = "string",
		format = "dateTime",
		in = "formData",
		description = "搜索-结束时间",
	),
	@SWG\Parameter(
		name = "keyword",
		type = "string",
		in = "formData",
		description = "搜索-关键词",
	),
),
*/

class Doc extends Controller{

	public function adminDoc(){
		
		$path = APP_PATH; //你想要哪个文件夹下面的注释生成对应的API文档
		$swagger = \Swagger\scan($path);
		$swagger_json_path = '../public/adminDoc/swagger.json';
		$res = file_put_contents($swagger_json_path, $swagger);
		if ($res == true) {
			return view('doc/admin');
		}
	}

	public function frontDoc(){

		$path = '../public/frontDoc'; //你想要哪个文件夹下面的注释生成对应的API文档
		$swagger = \Swagger\scan($path);
		$swagger_json_path = '../public/frontDoc/swagger.json';
		$res = file_put_contents($swagger_json_path, $swagger);
		if ($res == true) {
			return view('doc/front');
		}

	}


	
	
}