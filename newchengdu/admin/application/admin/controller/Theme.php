<?php
namespace app\admin\controller;
use app\common\controller\AdminBase;
use think\Db;

/**
* 模板控制器
*/
class Theme extends AdminBase{
	
	/**
	@SWG\Post(
        path = "/admin/Theme/index",
        summary = "模板列表",
        description = "模板列表",
        tags = {"Admin/SlideItem(后台/模板)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Response(
            response = "200",
            description = "模板列表",
            @SWG\Schema(
            	required = {"theme"},
                type = "array",
                @SWG\Items(
                    @SWG\Property(
                        property = "id",
                        type = "integer",
                        description = "模板id",
                    ),
                    @SWG\Property(
                        property = "name",
                        type = "string",
                        description = "模板名称",
                    ),
                    @SWG\Property(
                    	property = "file",
                    	type = "string",
                    	description = "模板文件路径",
                    ),
                    @SWG\Property(
                    	property = "description",
                    	type = "string",
                    	description = "模板描述",
                    ),
                ),
            ),
        ),
    ),
    */
	public function index(){
		$result = Db::connect('db_config'.parent::$db_id)->name('Theme')->select();
		return json(array_values($result));
	}

	/**
	@SWG\Post(
        path = "/admin/Theme/addPost",
        summary = "添加模板",
        description = "添加模板",
        tags = {"Admin/SlideItem(后台/模板)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "name",
        	type = "string",
        	required = true,
        	in = "formData",
        	description = "模板名称",
        ),
        @SWG\Parameter(
        	name = "file",
        	type = "string",
        	required = true,
        	in = "formData",
        	description = "模板文件路径",
        ),
        @SWG\Parameter(
        	name = "description",
        	type = "string",
        	in = "formData",
        	description = "模板描述",
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
			if(empty($data['name'])){
				$this->info(0,'模板文件名不能为空');
			}
			if(empty($data['file'])){
				$this->info(0,'模板文件路径不能为空');
			}
			$result = Db::connect('db_config'.parent::$db_id)->name('Theme')->insert($data);
			if($result){
				$this->info(1,'添加成功');
			}else{
				$this->info(0,'添加失败');
			}
		}
	}

	/**
	@SWG\Post(
        path = "/admin/Theme/editPost",
        summary = "修改保存模板",
        description = "修改保存模板",
        tags = {"Admin/SlideItem(后台/模板)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
			name = "id",
			type = "integer",
			required = true,
			in = "formData",
			description = "当前模板id"
        ),
        @SWG\Parameter(
        	name = "name",
        	type = "string",
        	required = true,
        	in = "formData",
        	description = "模板名称",
        ),
        @SWG\Parameter(
        	name = "file",
        	type = "string",
        	required = true,
        	in = "formData",
        	description = "模板文件路径",
        ),
        @SWG\Parameter(
        	name = "description",
        	type = "string",
        	in = "formData",
        	description = "模板描述",
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
			if(empty($data['name'])){
				$this->info(0,'模板文件名不能为空');
			}
			if(empty($data['file'])){
				$this->info(0,'模板文件路径不能为空');
			}
			$result = Db::connect('db_config'.parent::$db_id)->name('Theme')->update($data);
			if($result){
				$this->info(1,'修改成功');
			}else{
				$this->info(0,'修改失败');
			}
		}
	}

	/**
	@SWG\Post(
        path = "/admin/Theme/delete",
        summary = "删除模板",
        description = "删除模板",
        tags = {"Admin/SlideItem(后台/模板)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
			name = "id",
			type = "integer",
			required = true,
			in = "formData",
			description = "当前模板id"
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
		$result = Db::connect('db_config'.parent::$db_id)->name('Theme')->where('id',$id)->delete();
		if($result){
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}

}