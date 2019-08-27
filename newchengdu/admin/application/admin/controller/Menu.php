<?php
namespace app\admin\controller;
use app\common\controller\AdminBase;
use app\admin\validate\AdminMenuValidate;
use app\admin\model\AdminMenuModel;
use think\Db;
use think\Cache;
use tree\Tree;

//后台菜单控制器
class Menu extends AdminBase{

    protected $adminMenuModel;

    public function initialize(){
        parent::initialize(); 
        $this->adminMenuModel = new AdminMenuModel();
    }

    /**
    @SWG\Post(
        path = "/admin/Menu/menuList",
        summary = "后台菜单列表",
        description = "后台菜单列表",
        tags = {"Admin/Menu(后台/后台菜单)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Response(
            response = "200",
            description = "后台菜单列表",
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
                        property = "path",
                        type = "string",
                        description = "后台菜单父级集合",
                        @SWG\Items(),
                    ),
                    @SWG\Property(
                        property = "label",
                        type = "string",
                        description = "后台菜单名称",
                    ),
                    @SWG\Property(
                        property = "url",
                        type = "string",
                        description = "前端组件名称",
                    ),
                    @SWG\Property(
                        property = "icon",
                        type = "string",
                        description = "后台菜单图标",
                    ),
                    @SWG\Property(
                        property = "app",
                        type = "string",
                        description = "后台菜单应用名称",
                    ),
                    @SWG\Property(
                        property = "controller",
                        type = "string",
                        description = "后台菜单控制器名称",
                    ),
                    @SWG\Property(
                        property = "action",
                        type = "string",
                        description = "后台菜单操作名称",
                    ),
                    @SWG\Property(
                        property = "status",
                        type = "integer",
                        description = "状态;1:显示,0:不显示",
                    ),
                ),
            ),
        ),
    ),
    */
    public function menuList(){
        $menu = $this->adminMenuModel->menuList();
        $admin_id = cmf_get_current_admin_id();
        cache("admin_menus_$admin_id".'_by_'.parent::$db_id,NULL);
        return json(array_values($menu));
    }

    /**
    @SWG\Post(
        path = "/admin/Menu/menuTree",
        summary = "后台菜单列表(树形结构)",
        description = "后台菜单列表(树形结构)",
        tags = {"Admin/Menu(后台/后台菜单)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Response(
            response = "200",
            description = "后台菜单列表(树形结构)",
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
                        property = "path",
                        type = "string",
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
                        property = "list_order",
                        type = "integer",
                        description = "后台菜单排序id",
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
    public function menuTree(){
        $menu = $this->adminMenuModel->menuTree();
        return json(array_values($menu));
    }


	/**
    @SWG\Post(
        path = "/admin/Menu/addPost",
        summary = "添加后台菜单",
        description = "添加后台菜单添加",
        tags = {"Admin/Menu(后台/后台菜单)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
            name = "parent_id",
            type = "integer",
            required = true,
            in = "formData",
            default = "0",
            description = "后台菜单父级id,默认0",
        ),
        @SWG\Parameter(
            name = "name",
            type = "string",
            required = true,
            in = "formData",
            description = "后台菜单名称",
        ),
        @SWG\Parameter(
            name = "app",
            type = "string",
            required = true,
            in = "formData",
            description = "后台菜单应用名",
        ),
        @SWG\Parameter(
            name = "controller",
            type = "string",
            required = true,
            in = "formData",
            description = "后台菜单控制器名",
        ),
        @SWG\Parameter(
            name = "action",
            type = "string",
            required = true,
            in = "formData",
            description = "后台菜单操作名称",
        ),
        @SWG\Parameter(
            name = "icon",
            type = "string",
            in = "formData",
            description = "后台菜单图标",
        ),
        @SWG\Parameter(
            name = "param",
            type = "string",
            in = "formData",
            description = "后台菜单额外参数",
        ),
        @SWG\Parameter(
            name = "url",
            type = "string",
            required = true,
            in = "formData",
            description = "前端组件名称",
        ),
        @SWG\Parameter(
            name = "status",
            type = "integer",
            required = true,
            in = "formData",
            description = "状态;1:显示,0:不显示",
        ),
        @SWG\Parameter(
            name = "remark",
            type = "string",
            in = "formData",
            description = "后台菜单备注信息",
        ),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
    */
	public function addPost(){
        if ($this->request->isPost()) {
            $result = $this->validate($this->request->param(), 'AdminMenuValidate.add');
            if ($result !== true) {
                return json(['code'=>0,'info'=>$result]);
            }else {
                $data = $this->request->param();
                $this->adminMenuModel->isUpdate(false)->allowField(true)->save($data);

                $parent_id = $this->request->param('parent_id');
                if($parent_id != 0){
                    $app          = $this->request->param("app");
                    $controller   = $this->request->param("controller");
                    $action       = $this->request->param("action");
                    $param        = $this->request->param("param");
                    $authRuleName = "$app/$controller/$action";
                    $menuName     = $this->request->param("name");

                    $findAuthRuleCount = Db::connect('db_config'.parent::$db_id)->name('auth_rule')->where([
                        'app'  => $app,
                        'name' => $authRuleName,
                        'type' => 'admin_url'
                    ])->count();
                    if (empty($findAuthRuleCount)) {
                        Db::connect('db_config'.parent::$db_id)->name('AuthRule')->insert([
                            "name"  => $authRuleName,
                            "app"   => $app,
                            "type"  => "admin_url", //type 1-admin rule;2-user rule
                            "title" => $menuName,
                            'param' => $param,
                        ]);
                    }
                }
                $this->cacheMenus();// 删除后台菜单缓存
                $this->info(1,'添加成功！');
            }
        }else{
            $this->info(0,'添加失败！');
        }
    }


    /**
    @SWG\Post(
        path = "/admin/Menu/editPost",
        summary = "修改保存后台菜单",
        description = "修改保存后台菜单",
        tags = {"Admin/Menu(后台/后台菜单)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
            name = "id",
            type = "integer",
            required = true,
            in = "formData",
            description = "当前后台菜单id",
        ),
        @SWG\Parameter(
            name = "parent_id",
            type = "integer",
            required = true,
            in = "formData",
            default = "0",
            description = "后台菜单父级id,默认0",
        ),
        @SWG\Parameter(
            name = "name",
            type = "string",
            required = true,
            in = "formData",
            description = "后台菜单名称",
        ),
        @SWG\Parameter(
            name = "app",
            type = "string",
            required = true,
            in = "formData",
            description = "后台菜单应用名",
        ),
        @SWG\Parameter(
            name = "controller",
            type = "string",
            required = true,
            in = "formData",
            description = "后台菜单控制器名",
        ),
        @SWG\Parameter(
            name = "action",
            type = "string",
            required = true,
            in = "formData",
            description = "后台菜单操作名称",
        ),
        @SWG\Parameter(
            name = "icon",
            type = "string",
            in = "formData",
            description = "后台菜单图标",
        ),
        @SWG\Parameter(
            name = "param",
            type = "string",
            in = "formData",
            description = "后台菜单额外参数",
        ),
        @SWG\Parameter(
            name = "url",
            type = "string",
            required = true,
            in = "formData",
            description = "前端组件名称",
        ),
        @SWG\Parameter(
            name = "status",
            type = "integer",
            required = true,
            in = "formData",
            description = "状态;1:显示,0:不显示",
        ),
        @SWG\Parameter(
            name = "remark",
            type = "string",
            in = "formData",
            description = "后台菜单备注信息",
        ),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
    */
    public function editPost(){
        //dump($this->request->param());exit;
        if ($this->request->isPost()) {
            $id      = $this->request->param('id', 0, 'intval');
            $oldMenu = Db::connect('db_config'.parent::$db_id)->name('AdminMenu')->where(['id' => $id])->find();
            $result = $this->validate($this->request->param(), 'AdminMenuValidate.edit');
            if ($result !== true) {
                return json(['code'=>0,'info'=>$result]);
            } else {
                $data = $this->request->param();
                $this->adminMenuModel->isUpdate(true)->allowField(true)->save($data);

                $parent_id = $this->request->param('parent_id');
                if($parent_id != 0){
                    $app          = $this->request->param("app");
                    $controller   = $this->request->param("controller");
                    $action       = $this->request->param("action");
                    $param        = $this->request->param("param");
                    $authRuleName = "$app/$controller/$action";
                    $menuName     = $this->request->param("name");

                    $findAuthRuleCount = Db::connect('db_config'.parent::$db_id)->name('auth_rule')->where([
                        'app'  => $app,
                        'name' => $authRuleName,
                        'type' => 'admin_url'
                    ])->count();
                    if (empty($findAuthRuleCount)) {
                        $oldApp        = $oldMenu['app'];
                        $oldController = $oldMenu['controller'];
                        $oldAction     = $oldMenu['action'];
                        $oldName       = "$oldApp/$oldController/$oldAction";
                        $findOldRuleId = Db::connect('db_config'.parent::$db_id)->name('AuthRule')->where(["name" => $oldName])->value('id');
                        if (empty($findOldRuleId)) {
                            Db::name('AuthRule')->insert([
                                "name"  => $authRuleName,
                                "app"   => $app,
                                "type"  => "admin_url",
                                "title" => $menuName,
                                "param" => $param
                            ]);//type 1-admin rule;2-user rule
                        } else {
                            Db::connect('db_config'.parent::$db_id)->name('AuthRule')->where(['id' => $findOldRuleId])->update([
                                "name"  => $authRuleName,
                                "app"   => $app,
                                "type"  => "admin_url",
                                "title" => $menuName,
                                "param" => $param]);//type 1-admin rule;2-user rule
                        }
                    } else {
                        Db::connect('db_config'.parent::$db_id)->name('AuthRule')->where([
                            'app'  => $app,
                            'name' => $authRuleName,
                            'type' => 'admin_url'
                        ])->update(["title" => $menuName, 'param' => $param]);//type 1-admin rule;2-user rule
                    }    
                }

                $this->cacheMenus();// 删除后台菜单缓存
                $this->info(1,'保存成功！');
            }
        }else{
            $this->info(0,'保存失败！');
        }
    }

    /**
    @SWG\Post(
        path = "/admin/Menu/delete",
        summary = "删除后台菜单",
        description = "删除后台菜单",
        tags = {"Admin/Menu(后台/后台菜单)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
            name = "id",
            type = "integer",
            required = true,
            in = "formData",
            description = "当前后台菜单id",
        ),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
    */
    public function delete(){
    	$id = $this->request->param("id",0,"intval");
        parent::checkCategoryChildren($this->adminMenuModel);
        $menu = Db::connect('db_config'.parent::$db_id)->name('AdminMenu')->where('id',$id)->field('app,controller,action')->find();
        $name = $menu['app'].'/'.$menu['controller'].'/'.$menu['action'];
        $result = Db::connect('db_config'.parent::$db_id)->name('AdminMenu')->where('id',$id)->delete();
        if($result){
            Db::connect('db_config'.parent::$db_id)->name('AuthRule')->where('name',$name)->delete();
            $this->cacheMenus();// 删除后台菜单缓存
            $this->info(1,'删除成功！');
        }else{
            $this->info(0,'删除失败！');
        }
    }

    /**
    @SWG\Post(
        path = "/admin/Menu/list_orders",
        summary = "排序后台菜单",
        description = "排序后台菜单",
        tags = {"Admin/Menu(后台/后台菜单)"},
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
        $result = parent::listOrders($this->adminMenuModel);
        if($result){
            $this->cacheMenus();// 删除后台菜单缓存
            $this->info(1,'排序成功');
        }else{
            $this->info(0,'排序失败');
        }
    }

    

    /**
     * 删除菜单缓存
     * @return 
     */
    private function cacheMenus(){
        $admin_id = cmf_get_current_admin_id();
        cache('admin_menus_by_'.parent::$db_id,NULL);
        cache('admin_auth_by_'.parent::$db_id,NULL);
        cache('admin_menus_tree_by_'.parent::$db_id,NULL);
        cache("admin_menus_$admin_id".'_by_'.parent::$db_id,NULL);
    }

    

}