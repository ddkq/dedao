<?php
namespace app\form\controller;
use app\common\controller\HomeBase;
use app\form\model\FormModel;
use app\form\model\FormDataModel;
use app\form\validate\FormDataValidate;


/**
* 前端表单数据接口
*/
class FormData extends HomeBase{
	
	/**
	@SWG\Post(
		path = "/form/Form_Data/getFormData",
		summary = "获取表单数据(最新20条)",
		description = "获取表单数据(最新20条)",
		tags = {"Api/Form(前端/表单)"},
		@SWG\Parameter(ref="#/parameters/db_id"),
		@SWG\Parameter(
			name = "form_id",
			type = "integer",
			in = "formData",
			description = "表单id",
		),
		@SWG\Response(
			response = "200",
			description = "数据列表",
			@SWG\Schema(
				required = {"data"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "name",
						type = "string",
						description = "姓名",
					),
					@SWG\Property(
						property = "phone",
						type = "string",
						description = "电话",
					),
					@SWG\Property(
						property = "time",
						type = "string",
						description = "预约时间",
					),
				),
			),
		),
	),
	*/
	public function getFormData(){

		$returnArr = [];

		$where = [
			'delete_time'	=>	'0',
		];

		$form_id = $this->request->param('form_id');
		if(!empty($form_id)){
			$where['form_id'] = $form_id;
		}

		$data = FormDataModel::where($where)->order("create_time desc")->field('data')->limit(0,20)->select();
		$data = collection($data)->toArray();
		foreach ($data as $key => $value) {
			$content = $value['data'];
			$rand = mt_rand(1,30);
			if($rand%2 == 0){
				$returnArr[$key]['name'] = mb_substr($content['name'],0,1,'utf-8').'先生';
			}else{
				$returnArr[$key]['name'] = mb_substr($content['name'],0,1,'utf-8').'女士';
			}
			$returnArr[$key]['phone'] = substr($content['phone'],0,4).'xxxx'.substr($content['phone'],8,3);
			$returnArr[$key]['time'] = $rand.'分钟前';
		}

		return json($returnArr);

	}

	/**
	@SWG\Post(
		path = "/form/Form_Data/getFormData2",
		summary = "获取表单数据(最新20条),格式2",
		description = "获取表单数据(最新20条),格式2",
		tags = {"Api/Form(前端/表单)"},
		@SWG\Parameter(ref="#/parameters/db_id"),
		@SWG\Parameter(
			name = "form_id",
			type = "integer",
			in = "formData",
			description = "表单id",
		),
		@SWG\Response(
			response = "200",
			description = "数据列表",
			@SWG\Schema(
				required = {"data"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "name",
						type = "string",
						description = "姓名",
					),
					@SWG\Property(
						property = "phone",
						type = "string",
						description = "电话",
					),
					@SWG\Property(
						property = "award",
						type = "string",
						description = "奖品",
					),
				),
			),
		),
	),
	*/
	public function getFormData2(){

		$returnArr = [];

		$where = [
			'delete_time'	=>	'0',
		];

		$form_id = $this->request->param('form_id');
		if(!empty($form_id)){
			$where['form_id'] = $form_id;
		}

		$data = FormDataModel::where($where)->order("create_time desc")->field('data')->limit(0,20)->select();
		$data = collection($data)->toArray();
		foreach ($data as $key => $value) {
			$content = $value['data'];
			$rand = mt_rand(1,4);
			$award = array('','免费口腔检查1次','免费洗牙1次','免费矫牙方案设计','预知体验矫牙效果');
			if($rand%2 == 0){
				$returnArr[$key]['name'] = mb_substr($content['name'],0,1,'utf-8').'先生';
			}else{
				$returnArr[$key]['name'] = mb_substr($content['name'],0,1,'utf-8').'女士';
			}
			$returnArr[$key]['phone'] = substr($content['phone'],0,3).'xxxxxxxx';
			$returnArr[$key]['award'] = $award[$rand];
		}

		return json($returnArr);

	}

	/**
	@SWG\Post(
		path = "/form/Form_Data/readForm",
		summary = "读取表单格式",
		description = "读取表单格式",
		tags = {"Api/Form(前端/表单)"},
		@SWG\Parameter(ref="#/parameters/db_id"),
		@SWG\Parameter(
			name = "form_id",
			type = "integer",
			in = "formData",
			required = true,
			description = "表单id",
		),
		@SWG\Response(
			response = "200",
			description = "表单信息列表",
			@SWG\Schema(
				required = {"forms"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "id",
						type = "integer",
						description = "表单id",
					),
					@SWG\Property(
						property = "form_name",
						type = "string",
						description = "表单名",
					),
					@SWG\Property(
						property = "content",
						type = "array",
						description = "表单具体内容",
						@SWG\Items(
							@SWG\Property(
    							property = "title",
    							type = "string",
    							description = "字段名称",
    						),
    						@SWG\Property(
    							property = "type",
    							type = "integer",
    							description = "字段类型:1姓名,2电话,3邮箱,4数值,5性别,6日期,7城市,8文本,9多文本,10下拉,11单选,2多选",
    						),
    						@SWG\Property(
    							property = "checkboxOrRadio",
    							type = "boolean",
    							description = "字段是否为选项",
    						),
    						@SWG\Property(
    							property = "radio",
    							type = "integer",
    							description = "字段为选项时的选项id",
    						),
    						@SWG\Property(
    							property = "dataTitle",
    							type = "string",
    							description = "字段为选项时的选项名称",
    						),
    						@SWG\Property(
    							property = "isMust",
    							type = "integer",
    							description = "字段是否必填",
    						),
						),
					),
				),
			),
		),
	),
	*/
	public function readForm(){
		$form_id = $this->request->param('form_id');
		if(empty($form_id)){
			$this->info(0,'请选择表单');
		}
		$data = FormModel::where('id',$form_id)->field('id,form_name,content')->find();
		return json($data);
	}


	/**
	@SWG\Post(
		path = "/form/Form_Data/addPostData",
		summary = "收集表单数据",
		description = "收集表单数据",
		tags = {"Api/Form(前端/表单)"},
		@SWG\Parameter(ref="#/parameters/db_id"),
		@SWG\Parameter(
			name = "form_id",
			type = "integer",
			required = true,
			in = "formData",
			description = "提交表单id",
		),
		@SWG\Parameter(
			name = "data",
			type = "array",
			required = true,
			in = "body",
			description = "具体数据",
			@SWG\Schema(
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "name",
						type = "string",
						description = "姓名",
					),
					@SWG\Property(
						property = "phone",
						type = "string",
						description = "电话",
					),
					@SWG\Property(
						property = "age",
						type = "string",
						description = "年龄",
					),
					@SWG\Property(
						property = "symptom",
						type = "string",
						description = "症状",
					),
					@SWG\Property(
						property = "etc",
						type = "string",
						description = "相关内容",
					),
				),
			),
		),
		@SWG\Parameter(
			name = "page",
			type = "string",
			required = true,
			in = "formData",
			description = "提交页面url",
		),
		@SWG\Parameter(
			name = "ip",
			type = "string",
			required = true,
			in = "formData",
			description = "提交ip",
		),
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),

	),
	*/
	public function addPostData(){

		$data = $this->request->param();
		$data['ip'] = $_SERVER['REMOTE_ADDR'];
		$data['create_time'] = time();

		/*$result = $this->validate($data,'FormDataValidate');
		if($result !== true){
			return json(['info'=>$result,'code'=>0]);
		}*/
		$formDataModel = new FormDataModel;
		$result = $formDataModel->allowField(true)->save($data);
		if($result){
			$this->info(1,'提交成功');
		}else{
			$this->info(0,'提交失败');
		}
	}





}