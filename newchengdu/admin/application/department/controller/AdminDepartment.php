<?php
namespace app\department\controller;
use app\common\controller\AdminBase;
use app\department\model\DepartmentModel;
use app\department\validate\DepartmentValidate;
use think\Db;

/**
* 后台科室
*/
class AdminDepartment extends AdminBase{
	
	protected $departmentModel;
	
	public function initialize(){
        parent::initialize(); 
        $this->departmentModel = new DepartmentModel();
    }

    /**
    @SWG\Post(
		path = "/department/Admin_Department/index",
		summary = "科室列表",
		description = "科室列表",
		tags = {"Admin/Department(后台/医院科室)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Response(
			response = "200",
			description = "科室列表",
			@SWG\Schema(
				required = {"department"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "id",
						type = "integer",
						description = "科室id",
					),
					@SWG\Property(
						property = "parent_id",
						type = "integer",
						description = "科室父级id",
					),
					@SWG\Property(
						property = "path",
						type = "string",
						description = "科室父级id集合",
					),
					@SWG\Property(
						property = "name",
						type = "string",
						description = "科室名称",
					),
					@SWG\Property(
						property = "doctor_count",
						type = "integer",
						description = "医生数量",
					),
					@SWG\Property(
						property = "description",
						type = "string",
						description = "科室描述",
					),
					@SWG\Property(
						property = "seo_title",
						type = "string",
						description = "seo标题",
					),
					@SWG\Property(
						property = "seo_keywords",
						type = "string",
						description = "seo关键词",
					),
					@SWG\Property(
						property = "seo_description",
						type = "string",
						description = "seo描述",
					),
					@SWG\Property(
						property = "list_tpl",
						type = "integer",
						description = "列表页模板id",
					),
					@SWG\Property(
						property = "one_tpl",
						type = "integer",
						description = "文章页模板id",
					),
					@SWG\Property(
						property = "status",
						type = "integer",
						description = "状态,1:发布,0:隐藏",
					),
					@SWG\Property(
						property = "list_order",
						type = "integer",
						description = "排序id",
					),
					@SWG\Property(
						property = "more",
						type = "array",
						description = "扩展属性",
						@SWG\Items(
							
						),
					),
				),
			),
		),
	),
	**/
	public function index(){
		$result = $this->departmentModel->DepartmentList();
		return json(array_values($result));
	}
	
	/**
	@SWG\Post(
		path = "/department/Admin_Department/DepartmentTree",
		summary = "科室列表(树形结构)",
		description = "科室列表(树形结构)",
		tags = {"Admin/Department(后台/医院科室)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Response(
			response = "200",
			description = "科室列表",
			@SWG\Schema(
				required = {"award"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "id",
						type = "integer",
						description = "科室id",
					),
					@SWG\Property(
						property = "value",
						type = "integer",
						description = "科室id",
					),
					@SWG\Property(
						property = "parent_id",
						type = "integer",
						description = "科室父级id",
					),
					@SWG\Property(
						property = "parents",
						type = "string",
						description = "科室父级id集合",
					),
					@SWG\Property(
						property = "label",
						type = "string",
						description = "科室名称",
					),
					@SWG\Property(
						property = "children",
						type = "array",
						description = "科室子类",
						@SWG\Items(),
					),
				),
			),
		),
	),
	*/
	public function DepartmentTree(){
		$result = $this->departmentModel->DepartmentTree();
		return json(array_values($result));
	}

	/**
	@SWG\Post(
		path = "/department/Admin_Department/addPost",
		summary = "添加科室信息",
		description = "添加科室信息",
		tags = {"Admin/Department(后台/医院科室)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "name",
			type = "string",
			in = "formData",
			required = true,
			description = "科室名称",
		),
		@SWG\Parameter(
			name = "parent_id",
			type = "integer",
			in = "formData",
			required = true,
			description = "父级科室id",
		),
		@SWG\Parameter(
			name = "description",
			type = "string",
			in = "formData",
			description = "科室描述",
		),
		@SWG\Parameter(
			name = "seo_title",
			type = "string",
			in = "formData",
			description = "seo标题",
		),
		@SWG\Parameter(
			name = "seo_keywords",
			type = "string",
			in = "formData",
			description = "seo关键词",
		),
		@SWG\Parameter(
			name = "seo_description",
			type = "string",
			in = "formData",
			description = "seo描述",
		),
		@SWG\Parameter(
			name = "list_tpl",
			type = "integer",
			in = "formData",
			description = "列表页模板id",
		),
		@SWG\Parameter(
			name = "one_tpl",
			type = "integer",
			in = "formData",
			description = "文章页模板id",
		),
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	*/
	public function addPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			$result = $this->validate($data, 'DepartmentValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$result2 = $this->departmentModel->isUpdate(false)->allowField(true)->save($data);
			if($result2){
				$this->info(1,'添加成功');
			}else{
				$this->info(0,'添加失败');
			}
		}
	}

	/**
	@SWG\Post(
		path = "/department/Admin_Department/editPost",
		summary = "修改科室信息",
		description = "修改科室信息",
		tags = {"Admin/Department(后台/医院科室)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "当前科室id",
		),
		@SWG\Parameter(
			name = "name",
			type = "string",
			in = "formData",
			required = true,
			description = "科室名称",
		),
		@SWG\Parameter(
			name = "parent_id",
			type = "integer",
			in = "formData",
			required = true,
			description = "父级科室id",
		),
		@SWG\Parameter(
			name = "description",
			type = "string",
			in = "formData",
			description = "科室描述",
		),
		@SWG\Parameter(
			name = "seo_title",
			type = "string",
			in = "formData",
			description = "seo标题",
		),
		@SWG\Parameter(
			name = "seo_keywords",
			type = "string",
			in = "formData",
			description = "seo关键词",
		),
		@SWG\Parameter(
			name = "seo_description",
			type = "string",
			in = "formData",
			description = "seo描述",
		),
		@SWG\Parameter(
			name = "list_tpl",
			type = "integer",
			in = "formData",
			description = "列表页模板id",
		),
		@SWG\Parameter(
			name = "one_tpl",
			type = "integer",
			in = "formData",
			description = "文章页模板id",
		),
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	*/
	public function editPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			$result = $this->validate($data, 'DepartmentValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$result = $this->departmentModel->isUpdate(true)->allowField(true)->save($data);
			if($result){
				$this->info(1,'修改成功');
			}else{
				$this->info(0,'修改失败');
			}
		}
	}

	/**
	@SWG\Post(
		path = "/department/Admin_Department/delete",
		summary = "删除科室信息",
		description = "修改科室信息",
		tags = {"Admin/Department(后台/医院科室)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "当前科室id",
		),
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	*/

	public function delete(){
		$id = $this->request->param('id',0,'intval');
		$count = $this->departmentModel->where(['parent_id' => $id , 'delete_time' => 0])->count();
		if($count > 0){
			$this->info(0,'该科室下还有子科室');
		}
		$result = Db::connect('db_config'.parent::$db_id)->name('Department')->where('id',$id)->setField('delete_time',time());
		if($result){
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}

	/**
	@SWG\Post(
		path = "/department/Admin_Department/list_orders",
		summary = "排序科室信息",
		description = "排序科室信息",
		tags = {"Admin/Department(后台/医院科室)"},
		@SWG\Parameter(ref="#/parameters/token"),
	  	@SWG\Parameter(ref="#/parameters/original_list_order"),
	  	@SWG\Parameter(ref="#/parameters/list_order"),
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	*/
	public function list_orders(){
        $result = parent::listOrders($this->departmentModel);
        if($result){
            $this->info(1,'排序成功');
        }else{
            $this->info(0,'排序失败');
        }
    }

    /**
    @SWG\Post(
    	path = "/department/Admin_Department/transform",
    	summary = "显示/隐藏科室",
    	description = "显示/隐藏科室",
    	tags = {"Admin/Department(后台/医院科室)"},
    	@SWG\Parameter(ref="#/parameters/token"),
    	@SWG\Parameter(
    		name = "id",
    		type = "integer",
    		required = true,
    		in = "formData",
    		description = "当前科室id",
    	),
    	@SWG\Parameter(
    		name = "status",
    		type = "integer",
    		required = true,
    		in = "formData",
    		description = "状态:1显示,2隐藏",
    	),
    	@SWG\Response(
    		response = "200",
    		description = "状态码",
    		@SWG\Schema(ref="#/definitions/info"),
    	),
    ),
    */
	public function transform(){

		$param = $this->request->param();

		$id = $param['id'];
		if(isset($param['status']) && $param['status'] !== ''){
			$this->departmentModel->where('id',$id)->update(['status'=>$param['status']]);
		}

		$this->info(1,'修改成功');

	}

}