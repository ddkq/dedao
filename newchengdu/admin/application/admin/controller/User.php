<?php
namespace app\admin\controller;
use app\common\controller\AdminBase;
use think\Db;
use app\admin\model\UserModel;
use app\admin\model\RoleUserModel;
use app\admin\validate\AdminUserValidate;

/**
 * 用户
 */
class User extends AdminBase{

	protected $userModel;

    public function initialize(){
        parent::initialize(); 
        $this->userModel = new UserModel();
    }

	/**
	 * 获取管理员列表
	 * @return json
	 */
	/**
	@SWG\Post(
        path = "/admin/User/index",
        summary = "管理员列表",
        description = "管理员列表",
        tags = {"Admin/User(后台/用户)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Response(
            response = "200",
            description = "管理员列表",
            @SWG\Schema(
            	required = {"Admin"},
                type = "array",
                @SWG\Items(
                    @SWG\Property(
                        property = "id",
                        type = "integer",
                        description = "管理员id",
                    ),
                    @SWG\Property(
                        property = "user_login",
                        type = "string",
                        description = "用户名",
                    ),
                    @SWG\Property(
                    	property = "last_login_time",
                    	type = "integer",
                    	description = "最后登录时间（时间戳）",
                    ),
                    @SWG\Property(
                    	property = "last_login_ip",
                    	type = "string",
                    	description = "最后登录ip",
                    ),
                    @SWG\Property(
                    	property = "user_status",
                    	type = "string",
                    	description = "用户状态;0:禁用,1:正常,2:未验证",
                    ),
                ),
            ),
        ),
    ),
    */
	public function index(){
		$admin_users = $this->userModel->getUsers();
		return json(array_values($admin_users));
	}

	/**
	@SWG\Post(
		path = "/admin/User/addPost",
		summary = "添加管理员",
		description = "添加管理员",
		tags = {"Admin/User(后台/用户)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "user_login",
			type = "string",
			required = true,
			in = "formData",
			description = "管理员名称",
		),
		@SWG\Parameter(
			name = "user_pass",
			type = "string",
			required = true,
			in = "formData",
			description = "管理员登录密码",
		),
		@SWG\Parameter(
			name = "re_pass",
			type = "string",
			required = true,
			in = "formData",
			description = "重复密码",
		),
		@SWG\Parameter(
			name = "role_id",
			type = "integer",
			required = true,
			in = "formData",
			description = "用户角色分组id",
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
			$result = $this->validate($data,'AdminUserValidate.add');
			if($result !== true){
				$this->info(0,$result);
			}

			//加密密码
			unset($data['re_pass']);
			$data['user_pass'] = cmf_password($data['user_pass']);
			
			$result2 = $this->userModel->allowField(true)->save($data);
			$new_id = $this->userModel->id;
			//插入到用户角色关系表
			Db::name('RoleUser')->insert(['role_id'=>$data['role_id'],'user_id'=>$new_id]);
			if($result2){
				$this->info(1,'添加成功');
			}else{
				$this->info(0,'添加失败');
			}
		}
	}

	/**
	@SWG\Post(
		path = "/admin/User/editPost",
		summary = "修改保存管理员信息",
		description = "修改保存管理员信息",
		tags = {"Admin/User(后台/用户)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			required = true,
			in = "formData",
			description = "管理员id",
		),
		@SWG\Parameter(
			name = "user_login",
			type = "string",
			required = true,
			in = "formData",
			description = "管理员名称",
		),
		@SWG\Parameter(
			name = "role_id",
			type = "integer",
			required = true,
			in = "formData",
			description = "用户角色分组id",
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
			$result = $this->validate($data,'AdminUserValidate.edit');
			if($result != true){
				$this->info(0,$result);
			}
			$user = UserModel::get($data['id']);
			$user->user_login = $data['user_login'];
			$user->role->role_id = intval($data['role_id']);
			$result2 = $user->save();
			$result3 = $user->role->save();
			if($result2 || $result3){
				$this->info(1,'修改成功');
			}else{
				$this->info(0,'修改失败');
			}
		}
	}

	/**
	@SWG\Post(
		path = "/admin/User/passwordPost",
		summary = "修改当前登录管理员密码",
		description = "修改当前登录管理员密码",
		tags = {"Admin/User(后台/用户)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "old_password",
			type = "string",
			required = true,
			in = "formData",
			description = "旧密码",
		),
		@SWG\Parameter(
			name = "password",
			type = "string",
			required = true,
			in = "formData",
			description = "新密码",
		),
		@SWG\Parameter(
			name = "re_password",
			type = "integer",
			required = true,
			in = "formData",
			description = "重复密码",
		),
		@SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
	),
	*/
	public function passwordPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			if(empty($data['old_password'])){
				$this->info(0,'原始密码不能为空！');
			}
			if(empty($data['password'])){
				$this->info(0,'新密码不能为空！');
			}

			$user_id = cmf_get_current_admin_id();
			$nowPassword = Db::name('user')->where('id',$user_id)->value('user_pass');

			//旧密码
			$oldPassword = $data['old_password'];
			//新密码
			$password = $data['password'];
			//重复密码
			$rePassword = $data['re_password'];

			if(cmf_compare_password($oldPassword,$nowPassword)){
				if($rePassword == $password){
					if(cmf_compare_password($password,$nowPassword)){
						$this->info(0,'新密码不能和原始密码相同！');
					}else{
						$result = Db::name('user')->where('id',$user_id)->setField('user_pass',cmf_password($password));
						$this->info(1,'修改成功');
					}
				}else{
					$this->info(0,'两次密码输入不正确！');
				}
			}else{
				$this->info(0,'原始密码不正确！');
			}
		}
	}

	/**
	 * 
	 * @return json
	 */
	/**
	@SWG\Post(
		path = "/admin/User/resetPassword",
		summary = "还原密码",
		description = "还原密码(默认密码:123456),只有超级管理员才有操作",
		tags = {"Admin/User(后台/用户)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
	),
	*/
	public function resetPassword(){
		$user_id = cmf_get_current_admin_id();
		if($user_id != 1){
			$this->info(0,'你没有权限进行操作');
		}
		$id = $this->request->param('id',0,'intval');
		$password = '123456';
		$result = Db::name('user')->where('id',$id)->setField('user_pass',cmf_password($password));
		if($result){
			$this->info(1,'还原密码成功');
		}else{
			$this->info(0,'还原密码失败');
		}
	}


	/**
	@SWG\Post(
		path = "/admin/User/delete",
		summary = "删除管理员",
		description = "删除管理员",
		tags = {"Admin/User(后台/用户)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			required = true,
			in = "formData",
			description = "管理员id",
		),
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	*/
	public function delete(){
		$user_id = $this->request->param('id',0,'intval');
		if($user_id == 1){
			$this->info(0,'超级管理员禁止删除！');
		}
		$result = Db::name('user')->where('id',$user_id)->delete();
		Db::name('RoleUser')->where('user_id',$user_id)->delete();
		if($result){
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}

	/**
	@SWG\Post(
		path = "/admin/User/ban",
		summary = "禁用/启用管理员",
		description = "禁用/启用管理员",
		tags = {"Admin/User(后台/用户)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Parameter(
			name = "id",
			type = "integer",
			required = true,
			in = "formData",
			description = "管理员id",
		),
		@SWG\Parameter(
			name = "open",
			type = "integer",
			required = true,
			in = "formData",
			default = "0",
			description = "是否启用;0禁用,1启用",
		),
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	*/
	public function ban(){
		$user_id = $this->request->param('id',0,'intval');
		$open = $this->request->param('open',0,'intval');
		if($user_id == 1){
			$this->info(0,'超级管理员不能修改！');
		}
		$result = Db::name('user')->where('id',$user_id)->setField('user_status',$open);
		if($result){
			$this->info(1,'修改成功');
		}else{
			$this->info(0,'修改失败');
		}
	}

}