<?php
namespace app\award\controller;
use app\common\controller\AdminBase;
use app\award\model\AwardModel;

/**
* 后台抽奖控制器
*/
class AdminAward extends AdminBase{

	protected $awardModel;

	public function initialize(){
		parent::initialize();
		$this->awardModel = new AwardModel();
	}

	/**
	@SWG\Post(
		path = "/award/Admin_Award/site",
		summary = "抽奖信息",
		description = "抽奖信息",
		tags = {"Admin/Award(后台/抽奖管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Response(
			response = "200",
			description = "抽奖信息",
			@SWG\Schema(
				required = {"award"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "id",
						type = "integer",
						description = "抽奖信息id",
					),
					@SWG\Property(
						property = "award_name",
						type = "string",
						description = "抽奖名称",
					),
					@SWG\Property(
						property = "award_total",
						type = "integer",
						description = "抽奖总人数",
					),
					@SWG\Property(
						property = "content",
						type = "array",
						description = "具体内容",
						@SWG\Items(
							@SWG\Property(
								property = "awardName",
								type = "string",
								description = "奖品名称",
							),
							@SWG\Property(
								property = "awardNumber",
								type = "integer",
								description = "奖品数量",
							),
							@SWG\Property(
								property = "drawRound",
								type = "integer",
								description = "每轮抽取数量",
							),
							@SWG\Property(
								property = "designated",
								type = "string",
								description = "内定号码(多个用英文逗号隔开)",
							),
						),
					),
					@SWG\Property(
						property = "create_time",
						type = "integer",
						description = "创建时间",
					),
				),
			),
		),
	),
	*/
	public function site(){
		$lists = AwardModel::all(['delete_time'=>0]);
		return json($lists);
	}

	/**
	@SWG\Post(
		path = "/award/Admin_Award/setPost",
		summary = "保存抽奖信息",
		description = "保存抽奖信息",
		tags = {"Admin/Award(后台/抽奖管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			description = "当前抽奖信息id(修改时必填)",
		),
		@SWG\Parameter(
			name = "award_name",
			type = "string",
			in = "formData",
			required = true,
			description = "抽奖名称",
		),
		@SWG\Parameter(
			name = "award_total",
			type = "integer",
			in = "formData",
			required = true,
			description = "抽奖总人数",
		),
		@SWG\Parameter(
			name = "content",
			required = true,
			type = "array",
			in = "body",
			description = "具体内容",
			@SWG\Schema(
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "awardName",
						type = "string",
						description = "奖品名称",
					),
					@SWG\Property(
						property = "awardNumber",
						type = "integer",
						description = "奖品数量",
					),
					@SWG\Property(
						property = "drawRound",
						type = "integer",
						description = "每轮抽取数量",
					),
					@SWG\Property(
						property = "designated",
						type = "string",
						description = "内定号码(多个用英文逗号隔开)",
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
	public function setPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			if(empty($data['award_name'])){
				$this->info(0,'抽奖标题不能为空');
			}
			if(empty($data['id'])){
				$result = AwardModel::create($data);
			}else{
				$result = AwardModel::update($data);
			}
			if($result){
				$this->info(1,'保存成功');
			}else{
				$this->info(0,'保存失败');
			}
		}
	}

	/**
	@SWG\Post(
		path = "/award/Admin_Award/delete",
		summary = "删除抽奖信息",
		description = "删除抽奖信息",
		tags = {"Admin/Award(后台/抽奖管理)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			required = true,
			in = "formData",
			description = "当前抽奖信息id",
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
		$result = AwardModel::where('id',$id)->update(['delete_time'=>time()]);
		if($result){
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}
}

	