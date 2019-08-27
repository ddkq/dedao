<?php
namespace app\topic\controller;
use app\common\controller\AdminBase;
use app\topic\model\TopicModel;
use app\topic\validate\TopicValidate;
use think\Db;

/**
* 后台专题控制器
*/
class AdminTopic extends AdminBase{

	protected $topicModel;

	public function initialize(){
		parent::initialize();
		$this->topicModel = new TopicModel();
	}
	
	/**
	@SWG\Post(
		path = "/topic/Admin_Topic/index",
		summary = "专题列表信息",
		description = "专题列表信息",
		tags = {"Admin/Topic(后台/专题管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Response(
			response = "200",
			description = "专题列表信息",
			@SWG\Schema(
				required = {"topic"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "id",
						type = "integer",
						description = "专题id",
					),
					@SWG\Property(
						property = "topic_title",
						type = "string",
						description = "专题名称",
					),
					@SWG\Property(
						property = "topic_url",
						type = "string",
						description = "专题链接地址",
					),
					@SWG\Property(
						property = "status",
						type = "integer",
						description = "状态;1显示,0隐藏",
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
		$param = $this->request->param();
		$lists = $this->topicModel->topicList($param);
		return json($lists);
	}

	/**
	@SWG\Post(
		path = "/topic/Admin_Topic/addPost",
		summary = "添加专题信息",
		description = "添加专题信息",
		tags = {"Admin/Topic(后台/专题管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "topic_title",
			type = "string",
			in = "formData",
			required = true,
			description = "专题名称",
		),
		@SWG\Parameter(
			name = "topic_url",
			type = "string",
			in = "formData",
			required = true,
			description = "专题链接地址",
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
		$result = $this->validate($data,'TopicValidate');
		if($result !== true){
			$this->info(0,$result);
		}
		$result1 = $this->topicModel->isUpdate(false)->allowField(true)->data($data)->save();
		if($result1){
			$this->info(1,'添加成功');
		}else{
			$this->info(0,'添加失败');
		}
	}

	/**
	@SWG\Post(
		path = "/topic/Admin_Topic/editPost",
		summary = "修改保存专题信息",
		description = "修改保存专题信息",
		tags = {"Admin/Topic(后台/专题管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "专题id",
		),
		@SWG\Parameter(
			name = "topic_title",
			type = "string",
			in = "formData",
			required = true,
			description = "专题名称",
		),
		@SWG\Parameter(
			name = "topic_url",
			type = "string",
			in = "formData",
			required = true,
			description = "专题链接地址",
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
		if(empty($data['id'])){
			$this->info(0,'非法操作');
		}
		$result = $this->validate($data,'TopicValidate');
		if($result !== true){
			$this->info(0,$result);
		}
		$result1 = $this->topicModel->isUpdate(true)->allowField(true)->data($data)->save();
		if($result1){
			$this->info(1,'修改成功');
		}else{
			$this->info(0,'修改失败');
		}
	}

	/**
	@SWG\Post(
		path = "/topic/Admin_Topic/delete",
		summary = "删除专题信息",
		description = "删除专题信息",
		tags = {"Admin/Topic(后台/专题管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "专题id",
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
		$result = $this->topicModel->isUpdate(true)->allowField(true)->save(['delete_time'=>time()],['id'=>$id]);
		if($result){
			$user_id = cmf_get_current_admin_id();
			$name = $this->topicModel->where('id',$id)->value('topic_title');
			$data = [
				'object_id'		=>	$id,
				'create_time'	=>	time(),
				'table_name'	=>	'topic',
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
		path = "/topic/Admin_Topic/hide",
		summary = "显示隐藏专题",
		description = "显示隐藏专题",
		tags = {"Admin/Topic(后台/专题管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "专题id",
		),
		@SWG\Parameter(
			name = "status",
			type = "integer",
			in = "formData",
			required = true,
			description = "状态;1显示,2隐藏",
		),
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	*/
	public function hide(){
		$param = $this->request->param();
		if(empty($param['id'])){
			$this->info(0,'非法操作');
		}
		$result = $this->topicModel->isUpdate(true)->allowField(true)->save(['status'=>$param['status']],['id'=>$param['id']]);
		if($result){
			$this->info(1,'操作成功');
		}else{
			$this->info(0,'操作失败');
		}
	}


}