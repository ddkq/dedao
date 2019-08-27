<?php
namespace app\admin\controller;
use app\common\controller\AdminBase;
use think\Db;

//导航分类控制器
class NavCat extends AdminBase{
	
	/**
	@SWG\Post(
        path = "/admin/Nav_Cat/index",
        summary = "前端导航分类列表",
        description = "前端导航分类列表",
        tags = {"Admin/Nav_Cat(后台/前端导航分类)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Response(
            response = "200",
            description = "前端导航分类列表",
            @SWG\Schema(
                required = {"nav_cat"},
                type = "array",
                @SWG\Items(
                    @SWG\Property(
                        property = "id",
                        type = "integer",
                        description = "前端导航分类id",
                    ),
                    @SWG\Property(
                        property = "name",
                        type = "string",
                        description = "前端导航分类名称",
                    ),
                    @SWG\Property(
                        property = "remark",
                        type = "string",
                        description = "前端导航分类备注",
                    ),
                ),
            ),
        ),
    ),
	*/
	public function catList(){
		$result = Db::connect('db_config'.parent::$db_id)->name('NavCat')->select();
		return json(array_values($result));
	}

	/**
	@SWG\Post(
        path = "/admin/Nav_Cat/addPost",
        summary = "添加前端导航分类",
        description = "添加前端导航分类",
        tags = {"Admin/Nav_Cat(后台/前端导航分类)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "name",
            type = "string",
            required = true,
            in = "formData",
            description = "前端导航分类名称",
        ),
        @SWG\Parameter(
        	name = "remark",
            type = "string",
            in = "formData",
            description = "前端导航分类备注",
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
			if(empty($data['name'])){
				$this->info(0,'请输入导航分类名称');
			}else{
				$result = Db::connect('db_config'.parent::$db_id)->name('NavCat')->field(true)->insert($data);
				if($result){
					$this->info(1,'添加成功');
				}else{
					$this->info(0,'添加失败');
				}
			}
		}
	}


	/**
	@SWG\Post(
        path = "/admin/Nav_Cat/editPost",
        summary = "修改保存前端导航分类",
        description = "修改保存前端导航分类",
        tags = {"Admin/Nav_Cat(后台/前端导航分类)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "id",
            type = "integer",
            required = true,
            in = "formData",
            description = "当前前端导航分类id",
        ),
        @SWG\Parameter(
        	name = "name",
            type = "string",
            required = true,
            in = "formData",
            description = "前端导航分类名称",
        ),
        @SWG\Parameter(
        	name = "remark",
            type = "string",
            in = "formData",
            description = "前端导航分类备注",
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
			if(empty($data['name'])){
				$this->info(0,'请输入导航分类名称');
			}else{
				$result = Db::connect('db_config'.parent::$db_id)->name('NavCat')->update($data);
				if($result){
					$this->info(1,'保存成功');
				}else{
					$this->info(0,'保存失败');
				}
			}

		}
	}

	/**
	@SWG\Post(
        path = "/admin/Nav_Cat/delete",
        summary = "删除前端导航分类",
        description = "删除前端导航分类",
        tags = {"Admin/Nav_Cat(后台/前端导航分类)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "id",
            type = "integer",
            required = true,
            in = "formData",
            description = "当前前端导航分类id",
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
		if(empty($id)){
			$this->info(0,'删除失败');
		}
        $child = Db::connect('db_config'.parent::$db_id)->name('Nav')->where('cat_id',$id)->count();
        if($child > 0){
            $this->info(0,'当前分类下还有菜单,不能删除');
        }
		$result = Db::connect('db_config'.parent::$db_id)->name('NavCat')->where('id',$id)->delete();
		if($result){
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}

}