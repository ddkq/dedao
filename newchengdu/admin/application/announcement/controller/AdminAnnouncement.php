<?php
namespace app\announcement\controller;
use app\common\controller\AdminBase;
use app\announcement\model\AnnouncementModel;

/**
* 后台公告控制器
*/
class AdminAnnouncement extends AdminBase{
	
	/**
	@SWG\Post(
		path = "/announcement/Admin_Announcement/index",
		summary = "后台公告详细内容",
		description = "后台公告详细内容",
		tags = {"Admin/Announcement(后台/后台公告)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Response(
			response = "200",
			description = "后台公告",
			@SWG\Schema(
				required = {"Announcement"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "title",
						type = "string",
						description = "后台公告标题",
					),
					@SWG\Property(
						property = "content",
						type = "string",
						description = "后台公告内容",
					),
					@SWG\Property(
						property = "create_time",
						type = "integer",
						description = "后台公告创建时间",
					),
					@SWG\Property(
						property = "update_time",
						type = "integer",
						description = "后台公告更新时间",
					),
				),
			),
		),
	),
	*/
	public function index(){
		$list = AnnouncementModel::get(1);
		return json($list);
	}

	/**
	@SWG\Post(
		path = "/announcement/Admin_Announcement/editPost",
		summary = "修改保存后台公告",
		description = "修改保存后台公告",
		tags = {"Admin/Announcement(后台/后台公告)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			default = "1",
			in = "formData",
			description = "当前后台公告id",
		),
		@SWG\Parameter(
			name = "title",
			type = "string",
			in = "formData",
			description = "后台公告标题",
		),
		@SWG\Parameter(
			name = "content",
			type = "string",
			in = "formData",
			description = "后台公告内容",
		),
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	*/
	public function editPost(){
		$param = $this->request->param();
		if(empty($param['id'])){
			$param['id'] = 1;
		}
		$announcementModel = new AnnouncementModel();
		$result = $announcementModel->allowField(true)->isUpdate(true)->save($param);
		if($result){
			$this->info(1,'修改成功');
		}else{
			$this->info(0,'修改失败');
		}
	}

}