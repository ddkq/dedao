<?php
namespace app\admin\controller;
use app\common\controller\AdminBase;
use think\Db;
use think\Cache;
use app\admin\validate\RoleValidate;
use app\admin\model\AdminMenuModel;

/**
* 角色管理控制器
*/
class Rbac extends AdminBase{

	/**
	@SWG\Post(
        path = "/admin/Rbac/index",
        summary = "角色信息列表",
        description = "角色信息列表",
        tags = {"Admin/Rbac(后台/用户角色)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Response(
            response = "200",
            description = "角色信息列表",
            @SWG\Schema(
                required = {"role"},
                type = "array",
                @SWG\Items(
                	@SWG\Property(
                		property = "id",
                		type = "integer",
                		description = "用户角色id",
                	),
                    @SWG\Property(
                        property = "parent_id",
                        type = "integer",
                        description = "用户角色父级id",
                    ),
                    @SWG\Property(
                        property = "name",
                        type = "string",
                        description = "用户角色名称",
                    ),
                    @SWG\Property(
                        property = "remark",
                        type = "string",
                        description = "用户角色备注",
                    ),
                    @SWG\Property(
                        property = "status",
                        type = "integer",
                        description = "状态;0:禁用,1:正常",
                    ),
                ),
            ),
        ),
    ),
	*/
	public function index(){	
		$result = Db::connect('db_config'.parent::$db_id)->name('Role')->select();
		return json(array_values($result));
	}


	/**
	@SWG\Post(
        path = "/admin/Rbac/addPost",
        summary = "添加角色信息",
        description = "添加角色信息",
        tags = {"Admin/Rbac(后台/用户角色)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "name",
        	type = "string",
        	required = true,
        	in = "formData",
        	description = "用户角色名称",
        ),
        @SWG\Parameter(
        	name = "parent_id",
        	type = "integer",
        	in = "formData",
        	default = "0",
        	description = "用户角色父级id",
        ),
        @SWG\Parameter(
        	name = "remark",
        	type = "string",
        	in = "formData",
        	description = "用户角色备注",
        ),
        @SWG\Parameter(
        	name = "status",
        	type = "integer",
        	in = "formData",
        	description = "状态;0:禁用,1:正常",
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
			unset($data['token']);
			$result = $this->validate($data,'RoleValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$result1 = Db::connect('db_config'.parent::$db_id)->name('Role')->insert($data);
			if($result1){
				$this->info(1,'添加成功');
			}else{
				$this->info(0,'添加失败');
			}
		}
	}

	/**
	@SWG\Post(
        path = "/admin/Rbac/editPost",
        summary = "修改保存角色信息",
        description = "修改保存角色信息",
        tags = {"Admin/Rbac(后台/用户角色)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "id",
        	type = "integer",
        	required = true,
        	in = "formData",
        	description = "当前用户角色id",
        ),
        @SWG\Parameter(
        	name = "name",
        	type = "string",
        	required = true,
        	in = "formData",
        	description = "用户角色名称",
        ),
        @SWG\Parameter(
        	name = "parent_id",
        	type = "integer",
        	in = "formData",
        	default = "0",
        	description = "用户角色父级id",
        ),
        @SWG\Parameter(
        	name = "remark",
        	type = "string",
        	in = "formData",
        	description = "用户角色备注",
        ),
        @SWG\Parameter(
        	name = "status",
        	type = "integer",
        	in = "formData",
        	description = "状态;0:禁用,1:正常",
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
			unset($data['token']);
			$result = $this->validate($data,'RoleValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$result = Db::connect('db_config'.parent::$db_id)->name('Role')->update($data);
			if($result){
				$this->info(1,'修改成功');
			}else{
				$this->info(0,'修改失败');
			}
		}
	}


	/**
	@SWG\Post(
        path = "/admin/Rbac/delete",
        summary = "删除角色信息",
        description = "删除角色信息",
        tags = {"Admin/Rbac(后台/用户角色)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "id",
        	type = "integer",
        	required = true,
        	in = "formData",
        	description = "当前用户角色id",
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
		if($id == 1){
			$this->info(0,'超级管理员不能删除');
		}
		$count = Db::connect('db_config'.parent::$db_id)->name('RoleUser')->where('role_id',$id)->count();
		if($count > 0){
			$this->info(0,'当前角色下还存在用户，不能删除');
		}
		$result = Db::connect('db_config'.parent::$db_id)->name('Role')->where('id',$id)->delete();
		if($result){
            Db::connect('db_config'.parent::$db_id)->name('AuthAccess')->where('role_id',$id)->delete();
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}

	/**
    @SWG\Post(
        path = "/admin/Rbac/menuList",
        summary = "权限菜单列表",
        description = "权限菜单列表",
        tags = {"Admin/Rbac(后台/用户角色)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Response(
            response = "200",
            description = "权限菜单列表",
            @SWG\Schema(
                required = {"menu"},
                type = "array",
                @SWG\Items(
                    @SWG\Property(
                        property = "id",
                        type = "integer",
                        description = "后台菜单id",
                    ),
                    @SWG\Property(
                        property = "value",
                        type = "integer",
                        description = "后台菜单id",
                    ),
                    @SWG\Property(
                        property = "parent_id",
                        type = "integer",
                        description = "后台菜单父级id",
                    ),
                    @SWG\Property(
                        property = "parents",
                        type = "array",
                        description = "后台菜单父级集合",
                        @SWG\Items(),
                    ),
                    @SWG\Property(
                        property = "label",
                        type = "string",
                        description = "后台菜单名称",
                    ),
                    @SWG\Property(
                        property = "status",
                        type = "integer",
                        description = "状态;1:显示,0:不显示",
                    ),
                    @SWG\Property(
                        property = "children",
                        type = "array",
                        @SWG\Items(),
                        description = "后台菜单子类数组",
                    ),
                ),
            ),
        ),
    ),
    */
	public function menuList(){
		$adminMenu = cache('admin_menus_tree_by_'.parent::$db_id);
		if(empty($adminMenu)){
			$adminMenuModel = new AdminMenuModel();
			$adminMenu = $adminMenuModel->menuTree();
		}
    	return json(array_values($adminMenu));
	}

	/**
	@SWG\Post(
        path = "/admin/Rbac/auth",
        summary = "获取当前角色的权限",
        description = "获取当前角色的权限",
        tags = {"Admin/Rbac(后台/用户角色)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Response(
            response = "200",
            description = "权限菜单id集合",
            @SWG\Schema(
                required = {"rbac"},
                type = "array",
                @SWG\Items(
                    @SWG\Property(
                        property = "id",
                        type = "integer",
                        description = "后台菜单id",
                    ),
                ),
            ),
        ),
    ),
    */
	public function auth(){
		$role_id = $this->request->param('role_id',0,'intval');
		$join = [
			['cmf_admin_menu m','a.menu_id = m.id'],
		];
		$auth = Db::connect('db_config'.parent::$db_id)->name('AuthAccess')->alias('a')->join($join)->where('a.role_id',$role_id)->field('menu_id')->select();
		$newAuth = [];
		foreach ($auth as $value) {
			$newAuth[] = $value['menu_id'];
		}
		return json(array_values($newAuth));
	}

	/**
	@SWG\Post(
        path = "/admin/Rbac/authPost",
        summary = "分配角色权限",
        description = "分配角色权限",
        tags = {"Admin/Rbac(后台/用户角色)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "role_id",
        	type = "integer",
        	required = true,
        	in = "formData",
        	description = "当前角色id",
        ),
        @SWG\Parameter(
        	name = "menuIds",
        	type = "string",
        	required = true,
        	in = "formData",
        	description = "后台菜单id集合(数组)",
        ),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
	*/
	public function authPost(){
		if($this->request->isPost()){
			$role_id = $this->request->param('role_id');
			$menuIds = $this->request->param('menuIds/a');
			$count = Db::connect('db_config'.parent::$db_id)->name('AuthAccess')->where('role_id',$role_id)->count();
			if($count > 0){
				Db::connect('db_config'.parent::$db_id)->name('AuthAccess')->where('role_id',$role_id)->delete();
			}
			foreach ($menuIds as $id) {
				$menu = Db::connect('db_config'.parent::$db_id)->name('AdminMenu')->where('id',$id)->find();
				$data['role_id'] = $role_id;
				$data['rule_name'] = $menu['app'].'/'.$menu['controller'].'/'.$menu['action'];
				$data['menu_id'] = $id;
				Db::connect('db_config'.parent::$db_id)->name('AuthAccess')->insert($data);
			}
			$this->info(1,'分配权限成功');
		}
	}


}