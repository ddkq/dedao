<?php
namespace app\form\controller;
use app\common\controller\AdminBase;
use app\form\model\FormModel;

/**
* 表单控制器
*/
class AdminForm extends AdminBase{
	
	protected $formModel;

	public function initialize(){
		parent::initialize();
		$this->formModel = new FormModel();
	}

	/**
	@SWG\Post(
		path = "/form/Admin_Form/index",
		summary = "表单信息列表",
		description = "表单信息列表",
		tags = {"Admin/Form(后台/表单管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(ref="#/parameters/page"),
		@SWG\Parameter(ref="#/parameters/start_time"),
		@SWG\Parameter(ref="#/parameters/end_time"),
		@SWG\Parameter(ref="#/parameters/keyword"),
		@SWG\Response(
			response = "200",
			description = "表单信息列表",
			@SWG\Schema(
				required = {"forms"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
    					property = "current_page",
    					type = "integer",
    					description = "当前页码",
    				),
    				@SWG\Property(
    					property = "last_page",
    					type = "integer",
    					description = "页码总数",
    				),
    				@SWG\Property(
    					property = "per_page",
    					type = "integer",
    					description = "每页显示的数量",
    				),
    				@SWG\Property(
    					property = "total",
    					type = "integer",
    					description = "表单总数",
    				),
    				@SWG\Property(
    					property = "data",
    					type = "array",
    					description = "具体数据",
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
    						@SWG\Property(
    							property = "create_time",
    							type = "string",
    							description = "create_time",
    						),
    						@SWG\Property(
    							property = "status",
    							type = "int",
    							description = "是否启用",
    						),
    					),
    				),
				),
			),
		),
	),
	*/
	public function index(){
		$param = $this->request->param();
		$lists = $this->formModel->formList($param);
		return json($lists);
	}

	/**
	@SWG\Post(
		path = "/form/Admin_Form/addPost",
		summary = "添加表单信息",
		description = "添加表单信息",
		tags = {"Admin/Form(后台/表单管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "form_name",
			type = "string",
			in = "formData",
			required = true,
			description = "表单标题",
		),
		@SWG\Parameter(
			name = "content",
			type = "array",
			in = "body",
			required = true,
			description = "表单具体内容",
			@SWG\Schema(
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "name",
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
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	*/
	public function addPost(){
		$data = $this->request->param();
		if(empty($data['form_name'])){
			$this->info(0,'表单名字不能为空');
		}
		$data['content'] = json_encode($data['content']);
		$result = $this->formModel->allowField(true)->isUpdate(false)->data($data)->save();
		if($result){
			$this->info(1,'添加成功');
		}else{
			$this->info(0,'添加失败');
		}
	}

	/**
	@SWG\Post(
		path = "/form/Admin_Form/editPost",
		summary = "修改保存表单信息",
		description = "修改保存表单信息",
		tags = {"Admin/Form(后台/表单管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "表单id",
		),
		@SWG\Parameter(
			name = "form_name",
			type = "string",
			in = "formData",
			required = true,
			description = "表单标题",
		),
		@SWG\Parameter(
			name = "content",
			type = "array",
			in = "body",
			required = true,
			description = "表单具体内容",
			@SWG\Schema(
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "name",
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
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	*/
	public function editPost(){
		$data = $this->request->param();
		if(empty($data['form_name'])){
			$this->info(0,'表单名字不能为空');
		}
		$data['content'] = json_encode($data['content']);
		$result = $this->formModel->allowField(true)->isUpdate(true)->data($data)->save();
		if($result){
			$this->info(1,'修改成功');
		}else{
			$this->info(0,'修改失败');
		}
	}

	/**
	@SWG\Post(
		path = "/form/Admin_Form/delete",
		summary = "删除表单信息",
		description = "删除表单信息",
		tags = {"Admin/Form(后台/表单管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "表单id",
		),
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	*/
	public function delete(){
		$id = $this->request->param('id');
		if(empty($id)){
			$this->info(0,'非法操作');
		}
		$data['id'] = $id;
		$data['delete_time'] = time();
		$data['status'] = 0;
		$result = $this->formModel->allowField(true)->isUpdate(true)->data($data)->save();
		if($result){
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}

	/**
	@SWG\Post(
		path = "/form/Admin_Form/onoff",
		summary = "启用关闭表单信息",
		description = "启用关闭表单信息",
		tags = {"Admin/Form(后台/表单管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "表单id",
		),
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	*/
	public function onoff(){
		$param = $this->request->param();
		if(empty($param['id'])){
			$this->info(0,'非法操作');
		}
		$result = $this->formModel->allowField(true)->isUpdate(true)->save(['status'=>$param['status']],['id'=>$param['id']]);
		if($result){
			$this->info(1,'修改成功');
		}else{
			$this->info(0,'修改失败');
		}
	}

}