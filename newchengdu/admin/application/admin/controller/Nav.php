<?php
namespace app\admin\controller;
use app\common\controller\AdminBase;
use think\Db;
use tree\Tree;
use app\admin\model\NavModel;
use app\admin\model\NavValidate;

//前台导航控制器

class Nav extends AdminBase{

    protected $navModel;

    public function initialize(){
        parent::initialize();
        $this->navModel = new NavModel();
    }

	/**
    @SWG\Post(
        path = "/admin/Nav/index",
        summary = "前端导航列表",
        description = "前端导航列表",
        tags = {"Admin/Nav(后台/前端导航)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
            name = "cat_id",
            type = "integer",
            required = true,
            default = "1",
            in = "formData",
            description = "前端导航分类id",
        ),
        @SWG\Response(
            response = "200",
            description = "前端导航列表",
            @SWG\Schema(
                required = {"nav"},
                type = "array",
                @SWG\Items(
                    @SWG\Property(
                        property = "id",
                        type = "integer",
                        description = "前端导航id",
                    ),
                    @SWG\Property(
                        property = "value",
                        type = "integer",
                        description = "前端导航id",
                    ),
                    @SWG\Property(
                        property = "parent_id",
                        type = "integer",
                        description = "前端导航父级id",
                    ),
                    @SWG\Property(
                        property = "path",
                        type = "string",
                        description = "前端导航父级集合",
                        @SWG\Items(),
                    ),
                    @SWG\Property(
                        property = "cat_id",
                        type = "integer",
                        description = "前端导航分类id",
                    ),
                    @SWG\Property(
                        property = "label",
                        type = "string",
                        description = "前端导航名称",
                    ),
                    @SWG\Property(
                        property = "href",
                        type = "string",
                        description = "前端导航链接",
                    ),
                    @SWG\Property(
                        property = "target",
                        type = "string",
                        description = "前端导航打开方式",
                    ),
                    @SWG\Property(
                        property = "icon",
                        type = "string",
                        description = "前端导航图标",
                    ),
                    @SWG\Property(
                        property = "list_order",
                        type = "integer",
                        description = "前端导航排序id",
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
    **/
	public function index(){
		$id = $this->request->param('id',0,'intval');
		$map = [];
		if(!empty($id)){
			$map['cat_id'] = $id;
		}
		$result = Db::connect('db_config'.parent::$db_id)->name('Nav')->where($map)->order('list_order')->field('id,id as value,cat_id,parent_id,path,name as label,status,list_order,href,icon,target')->select();
		$tree = new Tree();
		$tree->init($result);
		$nav = $tree->getTree2(0);
		return json(array_values($nav));
	}

	/**
    @SWG\Post(
        path = "/admin/Nav/menu",
        summary = "前端导航列表(树形结构)",
        description = "前端导航列表(树形结构)",
        tags = {"Admin/Nav(后台/前端导航)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
            name = "cat_id",
            type = "integer",
            required = true,
            default = "1",
            in = "formData",
            description = "前端导航分类id",
        ),
        @SWG\Response(
            response = "200",
            description = "前端导航列表",
            @SWG\Schema(
                required = {"nav"},
                type = "array",
                @SWG\Items(
                    @SWG\Property(
                        property = "id",
                        type = "integer",
                        description = "前端导航id",
                    ),
                    @SWG\Property(
                        property = "value",
                        type = "integer",
                        description = "前端导航id",
                    ),
                    @SWG\Property(
                        property = "parent_id",
                        type = "integer",
                        description = "前端导航父级id",
                    ),
                    @SWG\Property(
                        property = "path",
                        type = "string",
                        description = "前端导航父级集合",
                        @SWG\Items(),
                    ),
                    @SWG\Property(
                        property = "cat_id",
                        type = "integer",
                        description = "前端导航分类id",
                    ),
                    @SWG\Property(
                        property = "label",
                        type = "string",
                        description = "前端导航名称",
                    ),
                    @SWG\Property(
                        property = "href",
                        type = "string",
                        description = "前端导航链接",
                    ),
                    @SWG\Property(
                        property = "target",
                        type = "string",
                        description = "前端导航打开方式",
                    ),
                    @SWG\Property(
                        property = "icon",
                        type = "string",
                        description = "前端导航图标",
                    ),
                    @SWG\Property(
                        property = "list_order",
                        type = "integer",
                        description = "前端导航排序id",
                    ),
                    @SWG\Property(
                        property = "status",
                        type = "integer",
                        description = "状态;1:显示,0:不显示",
                    ),
                    @SWG\Property(
						property = "children",
						type = "array",
						description = "当前前端导航子类数组",
						@SWG\Items(),
                    ),
                ),
            ),
        ),
    ),
    **/
	public function menu(){
		$id = $this->request->param('id',0,'intval');
		$map = [];
		if(!empty($id)){
			$map['cat_id'] = $id;
		}
		$result = Db::connect('db_config'.parent::$db_id)->name('Nav')->where($map)->order('list_order')->field('id,id as value,cat_id,parent_id,name as label,path,status,list_order,href,icon,target')->select();

		$tree = new Tree();
		$tree->init($result);
		$nav = $tree->getTreeArray(0);
		return json(array_values($nav));
	}

	/**
	@SWG\Post(
        path = "/admin/Nav/savePost",
        summary = "添加修改保存前端导航",
        description = "添加修改保存前端导航",
        tags = {"Admin/Nav(后台/前端导航)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
            name = "id",
            type = "integer",
            required = true,
            in = "formData",
            description = "当前前端导航id",
        ),
        @SWG\Parameter(
            name = "cat_id",
            type = "integer",
            required = true,
            default = "1",
            in = "formData",
            description = "前端导航分类id",
        ),
        @SWG\Parameter(
        	name = "parent_id",
        	type = "integer",
            required = true,
            default = "0",
            in = "formData",
            description = "前端导航父级id",
        ),
        @SWG\Parameter(
        	name = "name",
        	type = "string",
        	required = true,
        	in = "formData",
        	description = "前端导航名称",
        ),
        @SWG\Parameter(
        	name = "href",
        	type = "string",
        	in = "formData",
        	description = "前端导航链接",
        ),
        @SWG\Parameter(
        	name = "target",
        	type = "string",
        	in = "formData",
        	description = "前端导航打开方式",
        ),
        @SWG\Parameter(
        	name = "icon",
        	type = "string",
        	in = "formData",
        	description = "前端导航图标",
        ),
        @SWG\Parameter(
        	name = "status",
        	type = "integer",
        	required = true,
        	in = "formData",
        	description = "状态;1:显示,0:不显示",
        ),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
    */
	public function savePost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			//unset($data['token']);
			$result = $this->validate($this->request->param(),'NavValidate');
			if($result !== true){
				$this->info(0,$result);
			}else{
                $result2 = $this->navModel->allowField(true)->data($data)->save();
                //$result2 = NavModel::create($data);
				//$result2 = Db::connect('db_config'.parent::$db_id)->name('Nav')->insert($data);
				if($result2){
					$this->info(1,'添加成功');
				}else{
					$this->info(0,'添加失败');
				}
			}
		}
	}

	
	/**
	@SWG\Post(
        path = "/admin/Nav/editPost",
        summary = "修改保存前端导航",
        description = "修改保存前端导航",
        tags = {"Admin/Nav(后台/前端导航)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
            name = "id",
            type = "integer",
            required = true,
            in = "formData",
            description = "当前前端导航id",
        ),
        @SWG\Parameter(
            name = "cat_id",
            type = "integer",
            required = true,
            default = "1",
            in = "formData",
            description = "前端导航分类id",
        ),
        @SWG\Parameter(
        	name = "parent_id",
        	type = "integer",
            required = true,
            default = "0",
            in = "formData",
            description = "前端导航父级id",
        ),
        @SWG\Parameter(
        	name = "name",
        	type = "string",
        	required = true,
        	in = "formData",
        	description = "前端导航名称",
        ),
        @SWG\Parameter(
        	name = "href",
        	type = "string",
        	in = "formData",
        	description = "前端导航链接",
        ),
        @SWG\Parameter(
        	name = "target",
        	type = "string",
        	in = "formData",
        	description = "前端导航打开方式",
        ),
        @SWG\Parameter(
        	name = "icon",
        	type = "string",
        	in = "formData",
        	description = "前端导航图标",
        ),
        @SWG\Parameter(
        	name = "status",
        	type = "integer",
        	required = true,
        	in = "formData",
        	description = "状态;1:显示,0:不显示",
        ),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
    
	public function editPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			unset($data['token']);
			$result = $this->validate($data,'NavValidate');
			if($result !== true){
				$this->info(0,$result);
			}else{
                $result2 = NavModel::update($data);
				//$result2 = Db::connect('db_config'.parent::$db_id)->name('Nav')->update($data);
				if($result2){
					$this->info(1,'修改成功');
				}else{
					$this->info(0,'修改失败');
				}
			}
		}
	}
    */

	/**
	@SWG\Post(
        path = "/admin/Nav/delete",
        summary = "删除前端导航",
        description = "删除前端导航",
        tags = {"Admin/Nav(后台/前端导航)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
            name = "id",
            type = "integer",
            required = true,
            in = "formData",
            description = "当前前端导航id",
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
        parent::checkCategoryChildren($this->navModel);
		$result = Db::connect('db_config'.parent::$db_id)->name('nav')->where('id',$id)->delete();
		if($result){
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}


    /**
	@SWG\Post(
        path = "/admin/Nav/list_orders",
        summary = "前端导航排序",
        description = "前端导航排序",
        tags = {"Admin/Nav(后台/前端导航)"},
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
        $result = parent::listOrders($this->navModel);
        if($result){
			$this->info(1,'排序成功');
		}else{
			$this->info(0,'排序失败');
		}
    }

}