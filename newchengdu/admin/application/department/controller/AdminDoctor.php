<?php
namespace app\department\controller;
use app\common\controller\AdminBase;
use app\department\model\DoctorModel;
use app\department\validate\DoctorValidate;
use think\Db;


/**
* 后台医生控制器
*/
class AdminDoctor extends AdminBase{
	
	protected $doctorModel;
	
	public function initialize(){
        parent::initialize(); 
        $this->doctorModel = new DoctorModel();
    }

    /**
    @SWG\Post(
    	path = "/department/Admin_Doctor/index",
    	summary = "医生列表",
    	description = "医生列表",
    	tags = {"Admin/Doctor(后台/医生)"},
    	@SWG\Parameter(ref="#/parameters/token"),
    	@SWG\Parameter(ref="#/parameters/page"),
    	@SWG\Parameter(
    		name = "department",
    		type = "integer",
    		in = "formData",
    		description = "科室id",
    	),
    	@SWG\Parameter(ref="#/parameters/start_time"),
    	@SWG\Parameter(ref="#/parameters/end_time"),
    	@SWG\Parameter(ref="#/parameters/keyword"),
    	@SWG\Response(
    		response = "200",
    		description = "医生列表",
    		@SWG\Schema(
    			required = {"doctors"},
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
    					description = "医生总数",
    				),
    				@SWG\Property(
    					property = "data",
    					type = "array",
    					description = "具体数据",
    					@SWG\Items(
    						@SWG\Property(
    							property = "id",
    							type = "integer",
    							description = "医生id",
    						),
    						@SWG\Property(
    							property = "doctor_author",
    							type = "string",
    							description = "信息发布者",
    						),
    						@SWG\Property(
    							property = "department",
    							type = "string",
    							description = "所属科室名称",
    						),
    						@SWG\Property(
    							property = "doctor_name",
    							type = "string",
    							description = "医生名字",
    						),
    						@SWG\Property(
    							property = "doctor_tag",
    							type = "string",
    							description = "医生标签",
    						),
    						@SWG\Property(
    							property = "doctor_duties",
    							type = "string",
    							description = "医生职务",
    						),
    						@SWG\Property(
    							property = "doctor_job",
    							type = "string",
    							description = "医生职称",
    						),
    						@SWG\Property(
    							property = "doctor_champion",
    							type = "string",
    							description = "医生头衔",
    						),
    						@SWG\Property(
    							property = "doctor_introduction",
    							type = "string",
    							description = "医生介绍",
    						),
    						@SWG\Property(
    							property = "doctor_proficient",
    							type = "string",
    							description = "医生擅长项目",
    						),
    						@SWG\Property(
    							property = "thumb",
    							type = "array",
    							description = "医生缩略图",
    							@SWG\Items(
    								@SWG\Property(
    									property = "detail_thumb",
    									type = "string",
    									description = "医生详情页照片"
    								),
    								@SWG\Property(
    									property = "list_thumb",
    									type = "string",
    									description = "医生列表页头像"
    								),
    							),
    						),
    						@SWG\Property(
    							property = "status",
    							type = "integer",
    							description = "是否审核;1:已审核,0:未审核",
    						),
    						@SWG\Property(
    							property = "is_top",
    							type = "integer",
    							description = "是否顶置;1:顶置,0:未顶置",
    						),
    						@SWG\Property(
    							property = "recommended",
    							type = "integer",
    							description = "是否推荐;1:推荐,0:未推荐",
    						),
    						@SWG\Property(
    							property = "hits",
    							type = "integer",
    							description = "点击数",
    						),
    						@SWG\Property(
    							property = "like",
    							type = "integer",
    							description = "点赞数",
    						),
    						@SWG\Property(
    							property = "published_time",
    							type = "integer",
    							description = "发布时间(时间戳)",
    						),
    						@SWG\Property(
    							property = "list_order",
    							type = "integer",
    							description = "医生排序",
    						),
    						@SWG\Property(
    							property = "more",
    							type = "array",
    							description = "扩展选项",
    							@SWG\Items(
    								@SWG\Property(
		    							property = "registration_fee",
		    							type = "integer",
		    							description = "挂号费用",
		    						),
		    						@SWG\Property(
		    							property = "category",
		    							type = "string",
		    							description = "挂号分类",
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
		$result = $this->doctorModel->DoctorList($param);
		return json($result);
	}


	/**
	@SWG\Post(
		path = "/department/Admin_Doctor/doctorList",
		summary = "医生列表,无分页",
		description = "医生列表,无分页",
		tags = {"Admin/Doctor(后台/医生)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Response(
			response = "200",
			description = "医生列表",
			@SWG\Schema(
				required = {"doctors"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "id",
						type = "integer",
						description = "医生id",
					),
					@SWG\Property(
						property = "doctor_name",
						type = "integer",
						description = "医生名字",
					),
				),
			),
		),
	),
	*/
	public function doctorList(){
		$join = [
		    ['cmf_department_relationships r','a.id = r.doctor_id'],
		];
		$lists = $this->doctorModel->alias('a')->join($join)->where('a.delete_time',0)->field('a.id,a.doctor_name')->order('r.list_order')->select();
		return json(array_values($lists));
	}


	/**
	@SWG\Post(
		path = "/department/Admin_Doctor/addPost",
		summary = "添加医生信息",
		description = "添加医生信息",
		tags = {"Admin/Doctor(后台/医生)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "doctor_name",
			type = "string",
			in = "formData",
			required = true,
			description = "医生名",
		),
		@SWG\Parameter(
			name = "department_id",
			type = "integer",
			in = "formData",
			required = true,
			description = "所属科室id",
		),
		@SWG\Parameter(
			name = "doctor_duties",
			type = "string",
			in = "formData",
			description = "医生职务",
		),
		@SWG\Parameter(
			name = "doctor_job",
			type = "string",
			in = "formData",
			description = "医生职称",
		),
		@SWG\Parameter(
			name = "doctor_champion",
			type = "string",
			in = "formData",
			required = true,
			description = "医生头衔",
		),
		@SWG\Parameter(
			name = "doctor_introduction",
			type = "string",
			in = "formData",
			required = true,
			description = "医生介绍",
		),
		@SWG\Parameter(
			name = "doctor_proficient",
			type = "string",
			in = "formData",
			required = true,
			description = "医生擅长项目",
		),
		@SWG\Parameter(
			name = "detail_thumb",
			type = "string",
			in = "formData",
			description = "医生详情页照片",
		),
		@SWG\Parameter(
			name = "list_thumb",
			type = "string",
			in = "formData",
			description = "医生列表页头像",
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
			$result = $this->validate($data,'DoctorValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$data = $this->dataProcessing($data);
			$result1 = $this->doctorModel->DoctorAddPost($data);
			if($result1){
				$this->info(1,'添加成功');
			}else{
				$this->info(0,'添加失败');
			}	
		}
	}

	/**
	@SWG\Post(
		path = "/department/Admin_Doctor/editPost",
		summary = "修改保存医生信息",
		description = "修改保存医生信息",
		tags = {"Admin/Doctor(后台/医生)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "当前医生id",
		),
		@SWG\Parameter(
			name = "doctor_name",
			type = "string",
			in = "formData",
			required = true,
			description = "医生名",
		),
		@SWG\Parameter(
			name = "department_id",
			type = "integer",
			in = "formData",
			required = true,
			description = "所属科室id",
		),
		@SWG\Parameter(
			name = "doctor_duties",
			type = "string",
			in = "formData",
			description = "医生职务",
		),
		@SWG\Parameter(
			name = "doctor_job",
			type = "string",
			in = "formData",
			description = "医生职称",
		),
		@SWG\Parameter(
			name = "doctor_champion",
			type = "string",
			in = "formData",
			required = true,
			description = "医生头衔",
		),
		@SWG\Parameter(
			name = "doctor_introduction",
			type = "string",
			in = "formData",
			required = true,
			description = "医生介绍",
		),
		@SWG\Parameter(
			name = "doctor_proficient",
			type = "string",
			in = "formData",
			required = true,
			description = "医生擅长项目",
		),
		@SWG\Parameter(
			name = "detail_thumb",
			type = "string",
			in = "formData",
			description = "医生详情页照片",
		),
		@SWG\Parameter(
			name = "list_thumb",
			type = "string",
			in = "formData",
			description = "医生列表页头像",
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
			$result = $this->validate($data,'DoctorValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$data = $this->dataProcessing($data);
			$result1 = $this->doctorModel->DoctorEditPost($data);
			if($result1){
				$this->info(1,'修改成功');
			}else{
				$this->info(0,'修改失败');
			}	
		}
	}

	/**
	@SWG\Post(
		path = "/department/Admin_Doctor/delete",
		summary = "删除医生信息",
		description = "删除医生信息",
		tags = {"Admin/Doctor(后台/医生)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "当前医生id",
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
			$result = $this->doctorModel->allowField(true)->isUpdate(true)->save(['delete_time'=>time()],['id'=>$id]);
			if($result){
				Db::connect('db_config'.parent::$db_id)->name('departmentRelationships')->where('doctor_id',$id)->setField('status',0);
				$user_id = cmf_get_current_admin_id();
				$name = $this->doctorModel->where('id',$id)->value('doctor_name');
				$data = [
					'object_id'		=>	$id,
					'create_time'	=>	time(),
					'table_name'	=>	'doctor',
					'name'			=>	$name,
					'user_id'		=>	$user_id
				];
				Db::name('RecycleBin')->insert($data);
			}
		}
		//批量删除
		if(isset($param['ids'])){
			$ids = $param['ids'];
			$recycle = $this->doctorModel->where(['id' => ['in', $ids]])->select();
			$result = $this->doctorModel->where(['id' => ['in', $ids]])->update(['delete_time'=>time()]);
			if($result){
				Db::connect('db_config'.parent::$db_id)->name('departmentRelationships')->where(['doctor_id' => ['in', $ids]])->setField('status',0);
				$user_id = cmf_get_current_admin_id();
				foreach ($recycle as $key => $value) {
					$name = $value['doctor_name'];
					$data = [
						'object_id'		=>	$value['id'],
						'create_time'	=>	time(),
						'table_name'	=>	'doctor',
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
		path = "/department/Admin_Doctor/transform",
		summary = "修改医生属性",
		description = "修改医生属性",
		tags = {"Admin/Doctor(后台/医生)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "当前医生id",
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
			description = "是否审核;1:已审核,0:未审核",
		),
		@SWG\Parameter(
			name = "top",
			type = "integer",
			in = "formData",
			description = "是否顶置;1:顶置,0:未顶置",
		),
		@SWG\Parameter(
			name = "recommended",
			type = "integer",
			in = "formData",
			description = "是否推荐;1:推荐,0:未推荐",
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
				$this->doctorModel->where('id',$id)->update(['status'=>$param['status']]);
			}
			if(isset($param['top']) && $param['top'] !== ''){
				$this->doctorModel->where('id',$id)->update(['is_top'=>$param['top']]);
			}
			if(isset($param['recommended']) && $param['recommended'] !== ''){
				$this->doctorModel->where('id',$id)->update(['recommended'=>$param['recommended']]);
			}
		}

		if(isset($param['ids'])){
			$ids = $param['ids'];
			if(isset($param['status']) && $param['status'] !== ''){
				$this->doctorModel->where(['id' => ['in', $ids]])->update(['status'=>$param['status']]);
			}
			if(isset($param['top']) && $param['top'] !== ''){
				$this->doctorModel->where(['id' => ['in', $ids]])->update(['is_top'=>$param['top']]);
			}
			if(isset($param['recommended']) && $param['recommended'] !== ''){
				$this->doctorModel->where(['id' => ['in', $ids]])->update(['recommended'=>$param['recommended']]);
			}
		}
		$this->info(1,'修改成功');

	}

	/**
	@SWG\Post(
		path = "/department/Admin_Doctor/setWorking",
		summary = "设置医生排班信息和更多信息",
		description = "设置医生排班信息和更多信息",
		tags = {"Admin/Doctor(后台/医生)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "当前医生id",
		),
		@SWG\Parameter(
			name = "working",
			type = "array",
			in = "body",
			required = true,
			@SWG\Schema(
				type = "array",
				@SWG\Items(
					title = "x",
					description = "星期几(从0开始)",
					@SWG\Property(
						property = "am",
						type = "boolean",
						description = "上午",
					),
					@SWG\Property(
						property = "pm",
						type = "boolean",
						description = "下午",
					),
				),
			),
		),
		@SWG\Parameter(
			name = "more",
			type = "array",
			in = "body",
			@SWG\Schema(
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "registration_fee",
						type = "string",
						description = "挂号费用",
					),
					@SWG\Property(
						property = "category",
						type = "string",
						description = "挂号分类",
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
	public function setWorking(){
		if($this->request->isPost()){
			$data = $this->request->param();
			$data['working_time'] = json_encode($data['working']);
			$data['more'] = json_encode($data['more']);
			$result = $this->doctorModel->allowField(true)->isUpdate(true)->save($data);
			if($result){
				$this->info(1,'排班成功');
			}else{
				$this->info(0,'排班失败');
			}
		}
	}

	/**
	@SWG\Post(
		path = "/department/Admin_Doctor/list_orders",
		summary = "医生信息排序",
		description = "医生信息排序",
		tags = {"Admin/Doctor(后台/医生)"},
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
        $result = parent::listOrders(Db::name('departmentRelationships'));
        if($result){
            $this->info(1,'排序成功');
        }else{
            $this->info(0,'排序失败');
        }
    }


    //处理图片数据
    private function dataProcessing($data){
    	//上传主页缩略图
    	$thumb = array('detail_thumb'=>'','list_thumb'=>'');
    	if(!empty($data['detail_thumb'])){
    		$image = $data['detail_thumb'];
    		if(!empty($data['id'])){
    			$orginal_thumb = json_decode($this->doctorModel->where('id',$data['id'])->value('thumb'),true);
    			if(!empty($orginal_thumb['detail_thumb'])){
					if($orginal_thumb['detail_thumb'] !== $image){
	    				$upload = $this->upload_thumb($image);
						if($upload){
							$thumb['detail_thumb'] = $upload;
						}else{
							$this->info(0,'上传图片失败');
						}
	    			}else{
	    				$thumb['detail_thumb'] = $image;
	    			}
    			}else{
    				$upload = $this->upload_thumb($image);
					if($upload){
						$thumb['detail_thumb'] = $upload;
					}else{
						$this->info(0,'上传图片失败');
					}
    			}
    		}else{
    			$upload = $this->upload_thumb($image);
				if($upload){
					$thumb['detail_thumb'] = $upload;
				}else{
					$this->info(0,'上传图片失败');
				}
    		}
		}
		//上传列表缩略图
		if(!empty($data['list_thumb'])){
    		$image = $data['list_thumb'];
    		if(!empty($data['id'])){
    			$orginal_thumb = json_decode($this->doctorModel->where('id',$data['id'])->value('thumb'),true);
    			if(!empty($orginal_thumb['list_thumb'])){
					if($orginal_thumb['list_thumb'] !== $image){
	    				$upload = $this->upload_thumb($image);
						if($upload){
							$thumb['list_thumb'] = $upload;
						}else{
							$this->info(0,'上传图片失败');
						}
	    			}else{
	    				$thumb['list_thumb'] = $image;
	    			}
    			}else{
    				$upload = $this->upload_thumb($image);
					if($upload){
						$thumb['list_thumb'] = $upload;
					}else{
						$this->info(0,'上传图片失败');
					}
    			}
    		}else{
    			$upload = $this->upload_thumb($image);
				if($upload){
					$thumb['list_thumb'] = $upload;
				}else{
					$this->info(0,'上传图片失败');
				}
    		}
		}

		$data['thumb'] = json_encode($thumb);

		//医生介绍中的图片
		if(!empty($data['doctor_introduction'])){
			ini_set('pcre.backtrack_limit', 999999999);
	    	$preg = "|(src=\x22)+[A-Za-z0-9]+[^%&'?$\x22]+|";
	    	$data['doctor_introduction'] = preg_replace_callback(
		        $preg,
		        function ($matches) {
				    return 'src="'.$this->upload_thumb(substr($matches[0],5));
		        },
		        $data['doctor_introduction']
		    );
		}

		//医生擅长项目中的图片
		if(!empty($data['doctor_proficient'])){
			ini_set('pcre.backtrack_limit', 999999999);
	    	$preg = "|(src=\x22)+[A-Za-z0-9]+[^%&'?$\x22]+|";
	    	$data['doctor_proficient'] = preg_replace_callback(
		        $preg,
		        function ($matches) {
				    return 'src="'.$this->upload_thumb(substr($matches[0],5));
		        },
		        $data['doctor_proficient']
		    );
		}

		return $data;
    }
	
}