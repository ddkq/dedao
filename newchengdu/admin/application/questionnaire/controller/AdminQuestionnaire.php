<?php
namespace app\questionnaire\controller;
use app\common\controller\AdminBase;
use app\questionnaire\model\QuestionnaireModel;
use app\questionnaire\model\QuestionnaireDataModel;
use app\questionnaire\validate\QuestionnaireValidate;
use app\questionnaire\validate\AnalysisValidate;
use think\Db;

/**
* 后台问卷控制器
*/
class AdminQuestionnaire extends AdminBase{
	
	protected $questionnaireModel;

	public function initialize(){
		parent::initialize();
		$this->questionnaireModel = new QuestionnaireModel();
	} 
	
	/**
	@SWG\Post(
		path = "/questionnaire/Admin_Questionnaire/index",
		summary = "问卷数据列表",
		description = "问卷数据列表",
		tags = {"Admin/Questionnaire(后台/问卷管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Response(
    		response = "200",
    		description = "问卷数据列表",
    		@SWG\Schema(
    			required = {"questionnaire"},
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
    					description = "问卷总数",
    				),
    				@SWG\Property(
    					property = "data",
    					type = "array",
    					description = "具体数据",
    					@SWG\Items(
    						@SWG\Property(
    							property = "id",
    							type = "integer",
    							description = "问卷id",
    						),
    						@SWG\Property(
    							property = "questionnaire_title",
    							type = "string",
    							description = "问卷名称",
    						),
    						@SWG\Property(
    							property = "content",
    							type = "array",
    							description = "问卷具有内容",
    							@SWG\Items(
									@SWG\Property(
										property = "name",
										type = "string",
										description = "题目标题"
									),
									@SWG\Property(
										property = "type",
										type = "integer",
										description = "题目类型;1单选,2多选",
									),
									@SWG\Property(
										property = "children",
										type = "array",
										description = "选项",
										@SWG\Items(
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
    				),
    			),
    		),
    	),
	),
	*/
	public function index(){
		$param = $this->request->param();
		$lists = $this->questionnaireModel->questionnaireList($param);
		return json($lists);
	}

	/**
	@SWG\Post(
		path = "/questionnaire/Admin_Questionnaire/addPost",
		summary = "添加问卷",
		description = "添加问卷",
		tags = {"Admin/Questionnaire(后台/问卷管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "questionnaire_title",
			type = "string",
			in = "formData",
			required = true,
			description = "问卷名称",
		),
		@SWG\Parameter(
			name = "content",
			type = "array",
			in = "body",
			description = "问卷具有内容",
			@SWG\Schema(
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "name",
						type = "string",
						description = "题目标题"
					),
					@SWG\Property(
						property = "type",
						type = "integer",
						description = "题目类型;1单选,2多选",
					),
					@SWG\Property(
						property = "children",
						type = "array",
						description = "选项",
						@SWG\Items(
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
	**/
	public function addPost(){
		$data = $this->request->param();
		$result = $this->validate($data,'QuestionnaireValidate');
		if($result !== true){
			$this->info(0,$result);
		}
		$data['content'] = json_encode($data['content']);
		$result1 = $this->questionnaireModel->isUpdate(false)->allowField(true)->data($data)->save();
		if($result1){
			$this->info(1,'添加成功');
		}else{
			$this->info(0,'添加失败');
		}
	}

	/**
	@SWG\Post(
		path = "/questionnaire/Admin_Questionnaire/editPost",
		summary = "修改保存问卷",
		description = "修改保存问卷",
		tags = {"Admin/Questionnaire(后台/问卷管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "问卷id",
		),
		@SWG\Parameter(
			name = "questionnaire_title",
			type = "string",
			in = "formData",
			required = true,
			description = "问卷名称",
		),
		@SWG\Parameter(
			name = "content",
			type = "array",
			in = "body",
			description = "问卷具有内容",
			@SWG\Schema(
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "name",
						type = "string",
						description = "题目标题"
					),
					@SWG\Property(
						property = "type",
						type = "integer",
						description = "题目类型;1单选,2多选",
					),
					@SWG\Property(
						property = "children",
						type = "array",
						description = "选项",
						@SWG\Items(
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
	**/
	public function editPost(){
		$data = $this->request->param();
		$result = $this->validate($data,'QuestionnaireValidate');
		if($result !== true){
			$this->info(0,$result);
		}
		$data['content'] = json_encode($data['content']);
		$result1 = $this->questionnaireModel->isUpdate(true)->allowField(true)->data($data)->save();
		if($result1){
			$this->info(1,'修改成功');
		}else{
			$this->info(0,'修改失败');
		}
	}

	/**
	@SWG\Post(
		path = "/questionnaire/Admin_Questionnaire/delete",
		summary = "删除问卷",
		description = "删除问卷",
		tags = {"Admin/Questionnaire(后台/问卷管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "问卷id",
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
		$result = $this->questionnaireModel->isUpdate(true)->allowField(true)->save(['delete_time'=>time()],['id'=>$id]);
		if($result){
			$user_id = cmf_get_current_admin_id();
			$name = $this->questionnaireModel->where('id',$id)->value('questionnaire_title');
			$data = [
				'object_id'		=>	$id,
				'create_time'	=>	time(),
				'table_name'	=>	'questionnaire',
				'name'			=>	$name,
				'user_id'		=>	$user_id,
			];
			Db::connect('db_config'.parent::$db_id)->name('RecycleBin')->insert($data);
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}

	/**
	@SWG\Post(
		path = "/questionnaire/Admin_Questionnaire/viewData",
		summary = "查看问卷数据",
		description = "查看问卷数据",
		tags = {"Admin/Questionnaire(后台/问卷管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "问卷id",
		),
		@SWG\Response(
			response = "200",
			description = "问卷数据",
			@SWG\Schema(
				required = {"questionnaire_data"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "name",
						type = "string",
						description = "题目标题",
					),
					@SWG\Property(
						property = "type",
						type = "integer",
						description = "题目类型;1单选,2多选"
					),
					@SWG\Property(
						property = "children",
						type = "array",
						description = "选项集合",
						@SWG\Items(
							@SWG\Property(
								property = "name",
								type = "string",
								description = "选项名称",
							),
							@SWG\Property(
								property = "proportion",
								type = "string",
								description = "比例",
							),
							@SWG\Property(
								property = "subtotal",
								type = "integer",
								description = "小计",
							),
						),
					),
				),
			),
		),
	),
	*/
	public function viewData(){
		//允许自定义数组键值
		error_reporting(E_ERROR | E_PARSE );
		$id = $this->request->param('id');
		if(empty($id)){
			$this->info(0,'非法操作');
		}
		$data = $this->questionnaireModel->viewData($id);
		return json($data);
	}

	/**
	@SWG\Post(
		path = "/questionnaire/Admin_Questionnaire/analysisData",
		summary = "交叉分析",
		description = "交叉分析",
		tags = {"Admin/Questionnaire(后台/问卷管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "问卷id",
		),
		@SWG\Parameter(
			name = "x",
			type = "integer",
			in = "formData",
			required = true,
			description = "自变量x1",
		),
		@SWG\Parameter(
			name = "y",
			type = "integer",
			in = "formData",
			required = true,
			description = "自变量y1",
		),
		@SWG\Parameter(
			name = "x2",
			type = "integer",
			in = "formData",
			required = true,
			description = "自变量x2,为空是传-1",
		),
		@SWG\Parameter(
			name = "y2",
			type = "integer",
			in = "formData",
			required = true,
			description = "自变量y2,为空是传-1",
		),
		@SWG\Response(
			response = "200",
			description = "分析数据列表",
			@SWG\Schema(
				required = {"analysis_data"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "title",
						type = "array",
						description = "表头信息",
						@SWG\Items(
							type = "string"
						),
					),
					@SWG\Property(
						property = "data",
						type = "array",
						description = "表格数据",
						@SWG\Items(
							type = "string"
						),
					),
				),
			),
		),
	),
	*/
	public function analysisData(){
		//允许自定义数组键值
		error_reporting(E_ERROR | E_PARSE );
		$param = $this->request->param();
		if(empty($param['id'])){
			$this->info(0,'非法操作');
		}
		$result = $this->validate($param,'AnalysisValidate');
		if($result !== true){
			$this->info(0,$result);
		}
		if($param['x2'] != -1){
			if($param['x2'] == $param['y2']){
				$this->info(0,'选择问题相同');
			}
		}
		$data = $this->questionnaireModel->analysisData($param);
		return json($data);
	}

}