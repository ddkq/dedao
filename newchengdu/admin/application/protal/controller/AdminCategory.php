<?php
namespace app\protal\controller;
use app\common\controller\AdminBase;
use app\protal\model\CategoryModel;
use app\protal\validate\CategoryValidate;
use think\Db;

/**
* 后台文章分类
*/
class AdminCategory extends AdminBase{
	
	protected $categoryModel;
	
	public function initialize(){
        parent::initialize(); 
        $this->categoryModel = new CategoryModel();
    }

    /**
    @SWG\Post(
    	path = "/protal/Admin_Category/index",
    	summary = "文章分类列表",
    	description = "文章分类列表",
    	tags = {"Admin/Article(后台/文章)"},
    	@SWG\Parameter(ref="#/parameters/token"),
    	@SWG\Response(
    		response = "200",
    		description = "文章分类列表",
    		@SWG\Schema(
    			required = {"category"},
    			type = "array",
    			@SWG\Items(
    				@SWG\Property(
    					property = "id",
    					type = "integer",
    					description = "文章分类id",
    				),
    				@SWG\Property(
    					property = "parent_id",
    					type = "integer",
    					description = "文章分类父级id",
    				),
    				@SWG\Property(
    					property = "name",
    					type = "string",
    					description = "文章分类名称",
    				),
    				@SWG\Property(
    					property = "description",
    					type = "string",
    					description = "文章分类描述",
    				),
    				@SWG\Property(
						property = "path",
						type = "string",
						description = "文章分类父级id集合",
					),
    				@SWG\Property(
    					property = "post_count",
    					type = "string",
    					description = "文章总数",
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
    					property = "list_order",
    					type = "integer",
    					description = "文章分类排序",
    				),
    			),
    		),
    	),
    ),
    */
	public function index(){
		$result = $this->categoryModel->CategoryList();
		return json(array_values($result));
	}

	/**
	@SWG\Post(
		path = "/protal/Admin_Category/CategoryTree",
		summary = "文章分类列表(树形结构)",
		description = "文章分类列表(树形结构)",
		tags = {"Admin/Article(后台/文章)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Response(
			response = "200",
			description = "文章分类列表(树形结构)",
			@SWG\Schema(
				required = {"category"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "id",
						type = "integer",
						description = "文章分类id",
					),
					@SWG\Property(
						property = "value",
						type = "integer",
						description = "文章分类id",
					),
					@SWG\Property(
						property = "parent_id",
						type = "integer",
						description = "文章分类父级id",
					),
					@SWG\Property(
						property = "label",
						type = "string",
						description = "文章分类名称",
					),
					@SWG\Property(
						property = "path",
						type = "string",
						description = "文章分类父级id集合",
					),
					@SWG\Property(
						property = "children",
						type = "array",
						description = "文章分类子类数组",
						@SWG\Items(),
					),
				),
			),
		),
	),
	*/
	public function categoryTree(){
		$result = $this->categoryModel->CategoryTree();
		return json(array_values($result));
	}

	/**
	@SWG\Post(
		path = "/protal/Admin_Category/addPost",
		summary = "添加文章分类",
		description = "添加文章分类",
		tags = {"Admin/Article(后台/文章)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "name",
			type = "string",
			in = "formData",
			required = true,
			description = "文章分类名称",
		),
		@SWG\Parameter(
			name = "parent_id",
			type = "integer",
			in = "formData",
			required = true,
			description = "文章分类父级id",
		),
		@SWG\Parameter(
			name = "description",
			type = "string",
			in = "formData",
			description = "文章分类描述",
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
			$result = $this->validate($data, 'CategoryValidate');
			if($result !== true){
				$this->info(0,$result);
			}

			$result2 = $this->categoryModel->isUpdate(false)->allowField(true)->save($data);
			if($result2){
				$this->info(1,'添加成功');
			}else{
				$this->info(0,'添加失败');
			}
		}
	}
	/**
	@SWG\Post(
		path = "/protal/Admin_Category/editPost",
		summary = "修改保存文章分类",
		description = "修改保存文章分类",
		tags = {"Admin/Article(后台/文章)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "当前文章分类id",
		),
		@SWG\Parameter(
			name = "name",
			type = "string",
			in = "formData",
			required = true,
			description = "文章分类名称",
		),
		@SWG\Parameter(
			name = "parent_id",
			type = "integer",
			in = "formData",
			required = true,
			description = "文章分类父级id",
		),
		@SWG\Parameter(
			name = "description",
			type = "string",
			in = "formData",
			description = "文章分类描述",
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
			$result = $this->validate($data, 'CategoryValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$result = $this->categoryModel->isUpdate(true)->allowField(true)->save($data);
			if($result){
				$this->info(1,'修改成功');
			}else{
				$this->info(0,'修改失败');
			}
		}
	}

	/**
	@SWG\Post(
		path = "/protal/Admin_Category/delete",
		summary = "删除文章分类",
		description = "删除文章分类",
		tags = {"Admin/Article(后台/文章)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "当前文章分类id",
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
		$count = $this->categoryModel->where(['parent_id' => $id , 'delete_time' => 0])->count();
		if($count > 0){
			$this->info(0,'该分类下还有子分类');
		}
		$result = Db::connect('db_config'.parent::$db_id)->name('portal_category')->where('id',$id)->setField('delete_time',time());
		if($result){
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}

	/**
	@SWG\Post(
		path = "/protal/Admin_Category/list_orders",
		summary = "文章分类排序",
		description = "文章分类排序",
		tags = {"Admin/Article(后台/文章)"},
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
        $result = parent::listOrders($this->categoryModel);
        if($result){
            $this->info(1,'排序成功');
            $this->cleanCache();
        }else{
            $this->info(0,'排序失败');
        }
    }

    /**
	@SWG\Post(
		path = "/protal/Admin_Category/transform",
		summary = "显示/隐藏文章分类",
		description = "显示/隐藏文章分类",
		tags = {"Admin/Article(后台/文章)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "当前文章分类id",
		),
		@SWG\Parameter(
			name = "ids",
			type = "array",
			in = "body",
			required = true,
			description = "多选id集合(数组格式),二选一",
			@SWG\Schema(
				type = "array",
				@SWG\Items(
					type = "integer",
				),
			),
		),
		@SWG\Parameter(
			name = "status",
			type = "integer",
			in = "formData",
			description = "是否隐藏",
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

		if(isset($param['id'])){
			$id = $param['id'];
			if(isset($param['status']) && $param['status'] !== ''){
				$this->categoryModel->where('id',$id)->update(['status'=>$param['status']]);
			}
		}

		if(isset($param['ids'])){
			$ids = $param['ids'];
			if(isset($param['status']) && $param['status'] !== ''){
				$this->categoryModel->where(['id' => ['in', $ids]])->update(['status'=>$param['status']]);
			}
		}
		$this->info(1,'修改成功');

	}
}