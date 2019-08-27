<?php
namespace app\admin\controller;
use app\common\controller\AdminBase;
use think\Db;

/**
* 幻灯片分类
*/
class Slide extends AdminBase{
	
	/**
	@SWG\Post(
        path = "/admin/Slide/slide",
        summary = "幻灯片分类列表",
        description = "幻灯片分类列表",
        tags = {"Admin/Slide(后台/幻灯片分类)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "id",
        	type = "integer",
        	in = "formData",
        	description = "幻灯片分类id(默认不传值读取全部)",
        ),
        @SWG\Response(
            response = "200",
            description = "幻灯片分类列表",
            @SWG\Schema(
            	required = {"slide_category"},
                type = "array",
                @SWG\Items(
                    @SWG\Property(
                        property = "id",
                        type = "integer",
                        description = "幻灯片分类id",
                    ),
                    @SWG\Property(
                    	property = "name",
                    	type = "string",
                    	description = "幻灯片分类名称",
                    ),
                    @SWG\Property(
                    	property = "remark",
                    	type = "string",
                    	description = "幻灯片分类备注",
                    ),
                    @SWG\Property(
                        property = "status",
                        type = "integer",
                        description = "状态,1:显示,0隐藏",
                    ),
                    @SWG\Property(
                        property = "delete_time",
                        type = "integer",
                        default = "0",
                        description = "删除时间(默认0，未删除)，格式为时间戳",
                    ),
                ),
            ),
        ),
    ),
    */
	public function slide(){
		$id = $this->request->param('id',0,'intval');
		$map = [];
		$map['delete_time'] = 0;
		if(!empty($id)){
			$map['id'] = $id;
		}
		$result = Db::connect('db_config'.parent::$db_id)->name('Slide')->where($map)->select();
		return json(array_values($result));
	}

	/**
	@SWG\Post(
        path = "/admin/Slide/addPost",
        summary = "添加幻灯片分类",
        description = "添加幻灯片分类",
        tags = {"Admin/Slide(后台/幻灯片分类)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "name",
        	type = "string",
        	required = true,
        	in = "formData",
        	description = "分类名称",
        ),
        @SWG\Parameter(
        	name = "remark",
        	type = "string",
        	in = "formData",
        	description = "备注",
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
				$this->info(0,'名称不能为空');
			}
			$result = Db::connect('db_config'.parent::$db_id)->name('Slide')->insert($data);
			if($result){
				$this->info(1,'添加成功');
			}else{
				$this->info(0,'添加失败');
			}
		}
	}


	/**
	@SWG\Post(
        path = "/admin/Slide/editPost",
        summary = "修改保存幻灯片分类",
        description = "修改保存幻灯片分类",
        tags = {"Admin/Slide(后台/幻灯片分类)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
			name = "id",
			type = "integer",
			required = true,
			in = "formData",
			description = "当前幻灯片分类id",
        ),
        @SWG\Parameter(
        	name = "name",
        	type = "string",
        	required = true,
        	in = "formData",
        	description = "分类名称",
        ),
        @SWG\Parameter(
        	name = "remark",
        	type = "string",
        	in = "formData",
        	description = "备注",
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
				$this->info(0,'名称不能为空');
			}
			$result = Db::connect('db_config'.parent::$db_id)->name('Slide')->update($data);
			if($result){
				$this->info(1,'保存成功');
			}else{
				$this->info(0,'保存失败');
			}
		}
	}

	/**
	@SWG\Post(
        path = "/admin/Slide/delete",
        summary = "删除幻灯片分类(回收站)",
        description = "删除幻灯片分类(回收站)",
        tags = {"Admin/Slide(后台/幻灯片分类)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
			name = "id",
			type = "integer",
			required = true,
			in = "formData",
			description = "当前幻灯片分类id",
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
		$count = Db::connect('db_config'.parent::$db_id)->name('SlideItem')->where('slide_id',$id)->count();
		if($count > 0){
			$this->info(0,'该幻灯片分类下还有幻灯片存在');
		}
		$result = Db::connect('db_config'.parent::$db_id)->name('Slide')->where('id',$id)->setField('delete_time',time());
		if($result){
			$user_id = cmf_get_current_admin_id();
			$name = Db::connect('db_config'.parent::$db_id)->name('Slide')->where('id',$id)->value('name');
			$data = [
				'object_id'		=>	$id,
				'create_time'	=>	time(),
				'table_name'	=>	'slide',
				'name'			=>	$name,
				'user_id'		=>	$user_id
			];
			Db::connect('db_config'.parent::$db_id)->name('RecycleBin')->insert($data);
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}



}