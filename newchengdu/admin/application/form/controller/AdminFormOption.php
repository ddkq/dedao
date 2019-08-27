<?php
namespace app\form\controller;
use app\common\controller\AdminBase;
use app\form\model\FormOptionModel;
use app\form\validate\OptionValidate;


/**
* 表单选项类
*/
class AdminFormOption extends AdminBase{
	
	protected $optionModel; 

	public function initialize(){
		parent::initialize();
		$this->optionModel = new FormOptionModel();
	}

	/**
	@SWG\Post(
		path = "/form/Admin_Form_Option/index",
		summary = "表单选项列表数据",
		description = "表单选项列表数据",
		tags = {"Admin/Form(后台/表单管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "type",
			type = "integer",
			in = "formData",
			description = "选项类型:11单选,12多选",
		),
		@SWG\Response(
			response = "200",
			description = "表单选项列表数据",
			@SWG\Schema(
				required = {"option"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "id",
						type = "integer",
						description = "表单选项id",
					),
					@SWG\Property(
						property = "option_title",
						type = "string",
						description = "表单选项名称",
					),
					@SWG\Property(
						property = "option_type",
						type = "integer",
						description = "表单选项类型:11单选,12多选,默认11",
					),
					@SWG\Property(
						property = "option_content",
						type = "array",
						description = "选项内容",
						@SWG\Items(
							@SWG\Property(
								property = "x",
								type = "array",
								description = "x",
								@SWG\Items(
									@SWG\Property(
										property = "id",
										type = "integer",
										description = "选项id",
									),
									@SWG\Property(
										property = "name",
										type = "string",
										description = "选项名称",
									),
								),
							),
						),
					),
					@SWG\Property(
						property = "create_time",
						type = "string",
						description = "创建时间",
					),
				),
			),
		),
	),
	*/
	public function index(){
		$type = $this->request->param('type',0,'intval');
		$list = $this->optionModel->where(['delete_time'=>0,'option_type'=>$type])->select();
		return json(array_values($list));
	}

	/**
	@SWG\Post(
		path = "/form/Admin_Form_Option/addPost",
		summary = "添加表单选项数据",
		description = "添加表单选项数据",
		tags = {"Admin/Form(后台/表单管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "option_title",
			type = "string",
			required = true,
			in = "formData",
			description = "表单选项名称",
		),
		@SWG\Parameter(
			name = "option_content",
			type = "array",
			required = true,
			in = "body",
			description = "表单选项具体内容",
			@SWG\Schema(
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "x",
						type = "array",
						description = "x",
						@SWG\Items(
							@SWG\Property(
								property = "id",
								type = "integer",
								description = "选项id",
							),
							@SWG\Property(
								property = "name",
								type = "string",
								description = "选项名称",
							),
						),
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
		$result = $this->validate($data,'OptionValidate');
		if($result !== true){
			$this->info(0,$result);
		}
		$data['option_content'] = json_encode($data['option_content']);
		$result1 = $this->optionModel->allowField(true)->isUpdate(false)->data($data)->save();
		if($result1){
			$this->info(1,'添加成功');
		}else{
			$this->info(0,'添加失败');
		}
	}


	/**
	@SWG\Post(
		path = "/form/Admin_Form_Option/editPost",
		summary = "修改保存表单选项数据",
		description = "修改保存表单选项数据",
		tags = {"Admin/Form(后台/表单管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			required = true,
			in = "formData",
			description = "表单选项id",
		),
		@SWG\Parameter(
			name = "option_title",
			type = "string",
			required = true,
			in = "formData",
			description = "表单选项名称",
		),
		@SWG\Parameter(
			name = "option_content",
			type = "array",
			required = true,
			in = "body",
			description = "表单选项具体内容",
			@SWG\Schema(
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "x",
						type = "array",
						description = "x",
						@SWG\Items(
							@SWG\Property(
								property = "id",
								type = "integer",
								description = "选项id",
							),
							@SWG\Property(
								property = "name",
								type = "string",
								description = "选项名称",
							),
						),
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
		$result = $this->validate($data,'OptionValidate');
		if($result !== true){
			$this->info(0,$result);
		}
		$data['option_content'] = json_encode($data['option_content']);
		$result1 = $this->optionModel->allowField(true)->isUpdate(true)->data($data)->save();
		if($result1){
			$this->info(1,'修改成功');
		}else{
			$this->info(0,'修改失败');
		}
	}


	/**
	@SWG\Post(
		path = "/form/Admin_Form_Option/delete",
		summary = "删除表单选项数据",
		description = "删除表单选项数据",
		tags = {"Admin/Form(后台/表单管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			required = true,
			in = "formData",
			description = "表单选项id",
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
		$result = $this->optionModel->allowField(true)->isUpdate(true)->save(['delete_time'=>time(),'id'=>$id]);
		if($result){
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}


}