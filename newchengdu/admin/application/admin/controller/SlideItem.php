<?php
namespace app\admin\controller;
use app\common\controller\AdminBase;
use think\Db;
use app\admin\model\SlideItemModel;
use app\admin\validate\SlideItemValidate;

/**
* 幻灯片
*/
class SlideItem extends AdminBase{
	
	/**
	@SWG\Post(
        path = "/admin/Slide_Item/index",
        summary = "幻灯片列表",
        description = "幻灯片列表",
        tags = {"Admin/SlideItem(后台/幻灯片)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "id",
        	type = "integer",
        	in = "formData",
        	description = "幻灯片分类id(默认不传值读取全部)",
        ),
        @SWG\Response(
            response = "200",
            description = "幻灯片列表",
            @SWG\Schema(
            	required = {"slide_item"},
                type = "array",
                @SWG\Items(
                    @SWG\Property(
                        property = "id",
                        type = "integer",
                        description = "幻灯片id",
                    ),
                    @SWG\Property(
                        property = "slide_id",
                        type = "integer",
                        description = "幻灯片分类id",
                    ),
                    @SWG\Property(
                    	property = "title",
                    	type = "string",
                    	description = "幻灯片名称",
                    ),
                    @SWG\Property(
                    	property = "image",
                    	type = "string",
                    	description = "幻灯片图片路径",
                    ),
                    @SWG\Property(
                        property = "url",
                        type = "string",
                        description = "幻灯片链接",
                    ),
                    @SWG\Property(
                        property = "target",
                        type = "string",
                        description = "幻灯片链接打开方式",
                    ),
                    @SWG\Property(
                        property = "description",
                        type = "string",
                        description = "幻灯片描述",
                    ),
                    @SWG\Property(
                        property = "content",
                        type = "string",
                        description = "幻灯片内容",
                    ),
                    @SWG\Property(
                        property = "status",
                        type = "integer",
                        description = "幻灯片状态,1:显示,0隐藏",
                    ),
                    @SWG\Property(
                        property = "list_order",
                        type = "integer",
                        description = "幻灯片排序",
                    ),
                ),
            ),
        ),
    ),
    */
	public function index(){
		$id = $this->request->param('id',0,'intval');
		$map = [];
		if(!empty($id)){
			$map['slide_id'] = $id;
		}
		$result = Db::connect('db_config'.parent::$db_id)->name('SlideItem')->where($map)->order('list_order')->select();
		return json(array_values($result));
	}

	/**
	@SWG\Post(
        path = "/admin/Slide_Item/addPost",
        summary = "添加幻灯片",
        description = "添加幻灯片",
        tags = {"Admin/SlideItem(后台/幻灯片)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "slide_id",
        	type = "integer",
        	required = true,
        	in = "formData",
        	description = "幻灯片分类id",
        ),
        @SWG\Parameter(
        	name = "title",
        	type = "string",
        	required = true,
        	in = "formData",
        	description = "幻灯片名称",
        ),
        @SWG\Parameter(
        	name = "image",
        	type = "string",
        	in = "formData",
        	description = "幻灯片图片(base64格式)",
        ),
        @SWG\Parameter(
        	name = "url",
        	type = "string",
        	in = "formData",
        	description = "幻灯片链接",
        ),
        @SWG\Parameter(
        	name = "target",
        	type = "string",
        	in = "formData",
        	description = "幻灯片链接打开方式",
        ),
        @SWG\Parameter(
        	name = "description",
        	type = "string",
        	in = "formData",
        	description = "幻灯片描述",
        ),
        @SWG\Parameter(
        	name = "content",
        	type = "string",
        	in = "formData",
        	description = "幻灯片内容",
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
			$result = $this->validate($data,'SlideItemValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$data = $this->dataProcessing($data);
			$result1 = Db::connect('db_config'.parent::$db_id)->name('SlideItem')->field(true)->insert($data);
			if($result1){
				$this->info(1,'添加成功');
			}else{
				$this->info(0,'添加失败');
			}
		}
	}

	/**
	@SWG\Post(
        path = "/admin/Slide_Item/editPost",
        summary = "修改保存幻灯片",
        description = "修改保存幻灯片",
        tags = {"Admin/SlideItem(后台/幻灯片)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "id",
        	type = "integer",
        	required = true,
        	in = "formData",
        	description = "当前幻灯片id",
        ),
        @SWG\Parameter(
        	name = "slide_id",
        	type = "integer",
        	required = true,
        	in = "formData",
        	description = "幻灯片分类id",
        ),
        @SWG\Parameter(
        	name = "title",
        	type = "string",
        	required = true,
        	in = "formData",
        	description = "幻灯片名称",
        ),
        @SWG\Parameter(
        	name = "image",
        	type = "string",
        	in = "formData",
        	description = "幻灯片图片(base64格式)",
        ),
        @SWG\Parameter(
        	name = "url",
        	type = "string",
        	in = "formData",
        	description = "幻灯片链接",
        ),
        @SWG\Parameter(
        	name = "target",
        	type = "string",
        	in = "formData",
        	description = "幻灯片链接打开方式",
        ),
        @SWG\Parameter(
        	name = "description",
        	type = "string",
        	in = "formData",
        	description = "幻灯片描述",
        ),
        @SWG\Parameter(
        	name = "content",
        	type = "string",
        	in = "formData",
        	description = "幻灯片内容",
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
			$result = $this->validate($data,'SlideItemValidate');
			$data = $this->dataProcessing($data);
			$result = Db::connect('db_config'.parent::$db_id)->name('SlideItem')->update($data);
			if($result){
				$this->info(1,'保存成功');
			}else{
				$this->info(0,'保存失败');
			}
		}
	}


	/**
	@SWG\Post(
        path = "/admin/Slide_Item/delete",
        summary = "删除幻灯片",
        description = "删除幻灯片",
        tags = {"Admin/SlideItem(后台/幻灯片)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "id",
        	type = "integer",
        	required = true,
        	in = "formData",
        	description = "当前幻灯片id",
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
		//获取幻灯片图片并删除
		$image = Db::connect('db_config'.parent::$db_id)->name('SlideItem')->where('id',$id)->value('image');
		if(!empty($image)){
			$result = destory_file($image);
			if($result !== true){
				$this->info(0,'删除失败');
			}
		}
		$result = Db::connect('db_config'.parent::$db_id)->name('SlideItem')->where('id',$id)->delete();
		if($result){
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}

	/**
	@SWG\Post(
        path = "/admin/Slide_Item/hide",
        summary = "隐藏/显示幻灯片",
        description = "隐藏/显示幻灯片",
        tags = {"Admin/SlideItem(后台/幻灯片)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "id",
        	type = "integer",
        	required = true,
        	in = "formData",
        	description = "当前幻灯片id",
        ),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
    */
	public function hide(){
		$id = $this->request->param('id',0,'intval');
		$status = $this->request->param('status',0,'intval');
		$result = Db::connect('db_config'.parent::$db_id)->name('SlideItem')->where('id',$id)->setField('status',$status);
		if($result){
			$this->info(1,'更改成功');
		}else{
			$this->info(0,'更改失败');
		}
	}

    /**
	@SWG\Post(
        path = "/admin/Slide_Item/list_orders",
        summary = "幻灯片排序",
        description = "幻灯片排序",
        tags = {"Admin/SlideItem(后台/幻灯片)"},
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
        $slideItemModel = new SlideItemModel();
        $result = parent::listOrders($slideItemModel);
        if($result){
			$this->info(1,'排序成功');
		}else{
			$this->info(0,'排序失败');
		}
    }

    //处理图片数据
    private function dataProcessing($data){
    	//幻灯片
    	if(!empty($data['image'])){
    		$image = $data['image'];
    		if(!empty($data['id'])){
    			$orginal_thumb = Db::connect('db_config'.parent::$db_id)->name('SlideItem')->where('id',$data['id'])->value('image');
    			if($orginal_thumb !== $image){
    				$upload = $this->upload_thumb($image);
					if($upload){
						$data['image'] = $upload;
					}else{
						$this->info(0,'上传图片失败');
					}
    			}
    		}else{
    			$upload = $this->upload_thumb($image);
				if($upload){
					$data['image'] = $upload;
				}else{
					$this->info(0,'上传图片失败');
				}
    		}
		}
		return $data;
    }
	
}