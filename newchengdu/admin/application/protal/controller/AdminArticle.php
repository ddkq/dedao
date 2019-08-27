<?php
namespace app\protal\controller;
use app\common\controller\AdminBase;
use app\protal\model\ArticleModel;
use app\protal\validate\ArticleValidate;
use think\Db;


/**
* 后台文章类
*/
class AdminArticle extends AdminBase{
	
	protected $articleModel;
	
	public function initialize(){
        parent::initialize(); 
        $this->articleModel = new ArticleModel();
    }

    /**
    @SWG\Post(
    	path = "/protal/Admin_Article/index",
    	summary = "文章数据列表",
    	description = "文章数据列表",
    	tags = {"Admin/Article(后台/文章)"},
    	@SWG\Parameter(ref="#/parameters/token"),
    	@SWG\Parameter(ref="#/parameters/page"),
    	@SWG\Parameter(
    		name = "category",
    		type = "integer",
    		in = "formData",
    		description = "搜索-文章分类id",
    	),
    	@SWG\Parameter(ref="#/parameters/start_time"),
    	@SWG\Parameter(ref="#/parameters/end_time"),
    	@SWG\Parameter(ref="#/parameters/keyword"),
    	@SWG\Response(
    		response = "200",
    		description = "文章数据列表",
    		@SWG\Schema(
    			required = {"articles"},
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
    					description = "文章总数",
    				),
    				@SWG\Property(
    					property = "data",
    					type = "array",
    					description = "具体数据",
    					@SWG\Items(
    						@SWG\Property(
    							property = "id",
    							type = "integer",
    							description = "文章id",
    						),
    						@SWG\Property(
    							property = "rid",
    							type = "integer",
    							description = "文章关系id",
    						),
    						@SWG\Property(
    							property = "post_title",
    							type = "string",
    							description = "文章标题",
    						),
    						@SWG\Property(
    							property = "category_id",
    							type = "string",
    							description = "文章所属分类id",
    						),
    						@SWG\Property(
    							property = "category_name",
    							type = "string",
    							description = "文章所属分类名称",
    						),
    						@SWG\Property(
    							property = "parents",
    							type = "string",
    							description = "文章所属分类父级id",
    						),
    						@SWG\Property(
    							property = "post_tag",
    							type = "string",
    							description = "文章标签(关键词)",
    						),
    						@SWG\Property(
    							property = "post_excerpt",
    							type = "string",
    							description = "文章摘要",
    						),
    						@SWG\Property(
    							property = "post_content",
    							type = "string",
    							description = "文章内容",
    						),
    						@SWG\Property(
    							property = "thumb",
    							type = "string",
    							description = "文章缩略图路径",
    						),
    						@SWG\Property(
    							property = "author",
    							type = "string",
    							description = "文章发布作者",
    						),
    						@SWG\Property(
    							property = "post_status",
    							type = "integer",
    							description = "是否通过审核",
    						),
    						@SWG\Property(
    							property = "is_top",
    							type = "integer",
    							description = "是否顶置",
    						),
    						@SWG\Property(
    							property = "recommended",
    							type = "integer",
    							description = "是否推荐",
    						),
    						@SWG\Property(
    							property = "post_hits",
    							type = "integer",
    							description = "点击数",
    						),
    						@SWG\Property(
    							property = "published_time",
    							type = "string",
    							description = "发布时间",
    						),
    						@SWG\Property(
    							property = "list_order",
    							type = "integer",
    							description = "排序"
    						),
    						@SWG\Property(
    							property = "more",
    							type = "array",
    							description = "文章为案例时的扩展字段",
    							@SWG\Items(
    								@SWG\Property(
    									property = "name",
    									type = "string",
    									description = "姓名",
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
    									property = "plan",
    									type = "string",
    									description = "方案",
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
		$result = $this->articleModel->ArticleList($param);
		return json($result);
	}

	/**
	@SWG\Post(
		path = "/protal/Admin_Article/addPost",
    	summary = "添加文章",
    	description = "添加文章",
    	tags = {"Admin/Article(后台/文章)"},
    	@SWG\Parameter(ref="#/parameters/token"),
    	@SWG\Parameter(
    		name = "post_title",
    		type = "string",
    		in = "formData",
    		required = true,
    		description = "文章标题",
    	),
    	@SWG\Parameter(
    		name = "category_id",
    		type = "integer",
    		in = "formData",
    		required = true,
    		description = "文章所属分类id",
    	),
    	@SWG\Parameter(
    		name = "post_tag",
    		type = "string",
    		in = "formData",
    		description = "文章标签(关键词)",
    	),
    	@SWG\Parameter(
    		name = "post_excerpt",
    		type = "string",
    		in = "formData",
    		description = "文章摘要",
    	),
    	@SWG\Parameter(
    		name = "post_content",
    		type = "string",
    		in = "formData",
    		description = "文章内容",
    	),
    	@SWG\Parameter(
    		name = "thumb",
    		type = "string",
    		in = "formData",
    		description = "文章缩略图",
    	),
    	@SWG\Parameter(
    		name = "published_time",
    		type = "string",
    		in = "formData",
    		required = true,
    		description = "文章发布时间",
    	),
    	@SWG\Parameter(
    		name = "more",
    		type = "array",
    		in = "body",
    		description = "文章为案例时的扩展字段",
    		@SWG\Schema(
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "name",
						type = "string",
						description = "姓名",
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
						property = "plan",
						type = "string",
						description = "方案",
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
		if($this->request->isPost()){
			$data = $this->request->param();
			//dump($data);exit;
			$result = $this->validate($data,'ArticleValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$data = $this->dataProcessing($data);
			$result1 = $this->articleModel->ArticleAddPost($data);
			if($result1){
				$this->info(1,'添加成功');
			}else{
				$this->info(0,'添加失败');
			}	
		}
	}

	/**
	@SWG\Post(
		path = "/protal/Admin_Article/editPost",
    	summary = "修改保存文章",
    	description = "修改保存文章",
    	tags = {"Admin/Article(后台/文章)"},
    	@SWG\Parameter(ref="#/parameters/token"),
    	@SWG\Parameter(
    		name = "id",
    		type = "integer",
    		in = "formData",
    		required = true,
    		description = "文章id",
    	),
    	@SWG\Parameter(
    		name = "post_title",
    		type = "string",
    		in = "formData",
    		required = true,
    		description = "文章标题",
    	),
    	@SWG\Parameter(
    		name = "category_id",
    		type = "integer",
    		in = "formData",
    		required = true,
    		description = "文章所属分类id",
    	),
    	@SWG\Parameter(
    		name = "post_tag",
    		type = "string",
    		in = "formData",
    		description = "文章标签(关键词)",
    	),
    	@SWG\Parameter(
    		name = "post_excerpt",
    		type = "string",
    		in = "formData",
    		description = "文章摘要",
    	),
    	@SWG\Parameter(
    		name = "post_content",
    		type = "string",
    		in = "formData",
    		description = "文章内容",
    	),
    	@SWG\Parameter(
    		name = "thumb",
    		type = "string",
    		in = "formData",
    		description = "文章缩略图",
    	),
    	@SWG\Parameter(
    		name = "published_time",
    		type = "string",
    		in = "formData",
    		required = true,
    		description = "文章发布时间",
    	),
    	@SWG\Parameter(
    		name = "more",
    		type = "array",
    		in = "body",
    		description = "文章为案例时的扩展字段",
    		@SWG\Schema(
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "name",
						type = "string",
						description = "姓名",
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
						property = "plan",
						type = "string",
						description = "方案",
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
		if($this->request->isPost()){
			$data = $this->request->param();
			$result = $this->validate($data,'ArticleValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$data = $this->dataProcessing($data);
			$result1 = $this->articleModel->ArticleEditPost($data);
			if($result1){
				$this->info(1,'修改成功');
			}else{
				$this->info(0,'修改失败');
			}	
		}
	}

	/**
	@SWG\Post(
		path = "/protal/Admin_Article/delete",
    	summary = "删除文章",
    	description = "删除文章",
    	tags = {"Admin/Article(后台/文章)"},
    	@SWG\Parameter(ref="#/parameters/token"),
    	@SWG\Parameter(
    		name = "id",
    		type = "integer",
    		in = "formData",
    		required = true,
    		description = "文章id",
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
    	@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	*/
	public function delete(){

		$param = $this->request->param();

		//单一文章
		if(isset($param['id'])){
			$id = $param['id'];
			$result = $this->articleModel->allowField(true)->isUpdate(true)->save(['delete_time'=>time()],['id'=>$id]);
			if($result){
				Db::connect('db_config'.parent::$db_id)->name('portalRelationships')->where('article_id',$id)->setField('status',0);
				$user_id = cmf_get_current_admin_id();
				$name = $this->articleModel->where('id',$id)->value('post_title');
				$data = [
					'object_id'		=>	$id,
					'create_time'	=>	time(),
					'table_name'	=>	'article',
					'name'			=>	$name,
					'user_id'		=>	$user_id
				];
				Db::connect('db_config'.parent::$db_id)->name('RecycleBin')->insert($data);
			}
		}
		//批量删除
		if(isset($param['ids'])){
			$ids = $param['ids'];
			$recycle = $this->articleModel->where(['id' => ['in', $ids]])->select();
			$result = $this->articleModel->where(['id' => ['in', $ids]])->update(['delete_time'=>time()]);
			if($result){
				Db::connect('db_config'.parent::$db_id)->name('portalRelationships')->where(['article_id' => ['in', $ids]])->setField('status',0);
				$user_id = cmf_get_current_admin_id();
				foreach ($recycle as $key => $value) {
					$name = $value['post_title'];
					$data = [
						'object_id'		=>	$value['id'],
						'create_time'	=>	time(),
						'table_name'	=>	'article',
						'name'			=>	$name,
						'user_id'		=>	$user_id
					];
					Db::name('RecycleBin')->insert($data);
				}
			}
		}


		$this->info(1,'删除成功');
	}

	/**
	@SWG\Post(
		path = "/protal/Admin_Article/transform",
    	summary = "修改文章属性",
    	description = "修改文章属性",
    	tags = {"Admin/Article(后台/文章)"},
    	@SWG\Parameter(ref="#/parameters/token"),
    	@SWG\Parameter(
    		name = "id",
    		type = "integer",
    		in = "formData",
    		required = true,
    		description = "文章id",
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
			description = "是否通过审核",
		),
		@SWG\Parameter(
			name = "top",
			type = "integer",
			in = "formData",
			description = "是否顶置",
		),
		@SWG\Parameter(
			name = "recommended",
			type = "integer",
			in = "formData",
			description = "是否推荐",
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
				$this->articleModel->where('id',$id)->update(['post_status'=>$param['status']]);
			}
			if(isset($param['top']) && $param['top'] !== ''){
				$this->articleModel->where('id',$id)->update(['is_top'=>$param['top']]);
			}
			if(isset($param['recommended']) && $param['recommended'] !== ''){
				$this->articleModel->where('id',$id)->update(['recommended'=>$param['recommended']]);
			}
		}

		if(isset($param['ids'])){
			$ids = $param['ids'];
			if(isset($param['status']) && $param['status'] !== ''){
				$this->articleModel->where(['id' => ['in', $ids]])->update(['post_status'=>$param['status']]);
			}
			if(isset($param['top']) && $param['top'] !== ''){
				$this->articleModel->where(['id' => ['in', $ids]])->update(['is_top'=>$param['top']]);
			}
			if(isset($param['recommended']) && $param['recommended'] !== ''){
				$this->articleModel->where(['id' => ['in', $ids]])->update(['recommended'=>$param['recommended']]);
			}
		}
		$this->info(1,'修改成功');

	}

	/**
	@SWG\Post(
		path = "/protal/Admin_Article/list_orders",
		summary = "文章排序",
		description = "文章排序",
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
        $result = parent::listOrders(Db::name('portalRelationships'));
        if($result){
            $this->info(1,'排序成功');
        }else{
            $this->info(0,'排序失败');
        }
    }

    //上传图片
    public function upload(){
    	$result = parent::upload();
    	return json(array_values($result));
    }


    //处理post图片数据
    private function dataProcessing($data){
    	//缩略图
    	if(!empty($data['thumb'])){
    		$image = $data['thumb'];
    		if(!empty($data['id'])){
    			$orginal_thumb = $this->articleModel->where('id',$data['id'])->value('thumb');
    			if($orginal_thumb !== $image){
    				$upload = $this->upload_thumb($image);
					if($upload){
						$data['thumb'] = $upload;
					}else{
						$this->info(0,'上传图片失败');
					}
    			}else{
    				$data['thumb'] = $image;
    			}
    		}else{
    			$upload = $this->upload_thumb($image);
				if($upload){
					$data['thumb'] = $upload;
				}else{
					$this->info(0,'上传图片失败');
				}
    		}
		}
		//文章内容的图片
		if(!empty($data['post_content'])){
			ini_set('pcre.backtrack_limit', 999999999);
	    	$preg = "|(src=\x22)+[A-Za-z0-9]+[^%&'?$\x22]+|";
	    	$data['post_content'] = preg_replace_callback(
		        $preg,
		        function ($matches) {
				    return 'src="'.$this->upload_thumb(substr($matches[0],5));
		        },
		        $data['post_content']
		    );
		}
		return $data;
    }
	
}