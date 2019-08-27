<?php
namespace app\user\controller;
use app\common\controller\AdminBase;
use think\Db;
use app\admin\model\UserModel;

/**
* 前台用户类
*/
class AdminIndex extends AdminBase{
	
	/**
	@SWG\Post(
		path = "/user/Admin_Index/index",
		summary = "本地用户数据列表",
		description = "本地用户数据列表",
		tags = {"Admin/User(后台/用户)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Response(
			response = "200",
			description = "本地用户数据列表",
			@SWG\Schema(
				required = {"user"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "id",
						type = "integer",
						description = "用户id",
					),
					@SWG\Property(
						property = "user_login",
						type = "string",
						description = "用户名",
					),
					@SWG\Property(
						property = "nickname",
						type = "string",
						description = "用户昵称",
					),
					@SWG\Property(
						property = "avatar",
						type = "string",
						description = "用户头像链接地址",
					),
					@SWG\Property(
						property = "last_login_time",
						type = "string",
						description = "用户最后登录时间",
					),
					@SWG\Property(
						property = "last_login_ip",
						type = "string",
						description = "用户最后登录ip",
					),
					@SWG\Property(
						property = "user_status",
						type = "integer",
						description = "用户状态;0:禁用,1:正常,2:未验证",
					),
				),
			),
		),
	),
	*/
	public function index(){
		$users = Db::connect('db_config'.parent::$db_id)->name('user')->where('user_type',2)->field('id,user_login,user_nickname,avatar,last_login_time,last_login_ip,user_status')->select();
		return json(array_values($users));
	}

	/**
	@SWG\Post(
		path = "/user/Admin_Index/ban",
		summary = "本地用户数据列表",
		description = "本地用户数据列表",
		tags = {"Admin/User(后台/用户)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			required = true,
			description = "用户id",
		),
		@SWG\Parameter(
			name = "open",
			type = "integer",
			in = "formData",
			required = true,
			description = "用户状态;0拉黑,1启用",
		),
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	*/
	public function ban(){
		$id = $this->request->param('id');
		if(empty($id)){
			$this->info(0,'非法操作');
		}
		$open = $this->request->param('open');
		$result = Db::connect('db_config'.parent::$db_id)->name('user')->where('id',$id)->setField('user_status',$open);
		if($result){
			$this->info(1,'修改成功');
		}else{
			$this->info(0,'修改失败');
		}
	}
}

