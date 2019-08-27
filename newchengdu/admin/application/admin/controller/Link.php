<?php
namespace app\admin\controller;
use app\common\controller\AdminBase;
use think\Db;
use app\admin\model\LinkModel;
use app\admin\validate\LinkValidate;


/**
* 友情链接
*/
class Link extends AdminBase{
	
	/**
	@SWG\Post(
		path = "/admin/Link/index",
		summary = "获取友情链接列表",
		description = "获取友情链接列表",
		tags = {"Admin/Links(后台/友情链接)"},
		@SWG\Parameter(ref="#/parameters/token"),
		@SWG\Response(
			response = "200",
			description = "友情链接列表",
			@SWG\Schema(
				required = {"link"},
				type = "array",
				@SWG\Items(
					@SWG\Property(
						property = "id",
						type = "integer",
						description = "友情链接id",
					),
					@SWG\Property(
						property = "name",
						type = "string",
						description = "友情链接名称",
					),
					@SWG\Property(
						property = "image",
						type = "string",
						description = "友情链接图标地址",
					),
					@SWG\Property(
						property = "url",
						type = "string",
						description = "友情链接目标地址",
					),
					@SWG\Property(
						property = "target",
						type = "string",
						description = "友情链接打开方式",
					),
					@SWG\Property(
						property = "description",
						type = "string",
						description = "友情链接描述",
					),
					@SWG\Property(
						property = "list_order",
						type = "float",
						description = "友情链接排序",
					),
					@SWG\Property(
						property = "status",
						type = "integer",
						description = "友情链接排序",
					),
				),
			),
		),
	),
	*/ 
	public function index(){
		$result = Db::connect('db_config'.parent::$db_id)->name('Link')->order('list_order')->select();
		return json(array_values($result));
	}


	/**
	@SWG\Post(
		path = "/admin/Link/addPost",
	 	summary = "添加友情链接",
	  	description = "添加友情链接",
	   	tags = {"Admin/Links(后台/友情链接)"},
	    @SWG\Parameter(ref="#/parameters/token"),
	    @SWG\Parameter(
		   name = "name",
		   type = "string",
		   required = true,
		   in = "formData",
		   description = "友情链接名称",
	    ),
	    @SWG\Parameter(
		   name = "url",
		   type = "string",
		   required = true,
		   in = "formData",
		   description = "友情链接地址",
	    ),
	    @SWG\Parameter(
		   name = "image",
		   type = "string",
		   in = "formData",
		   description = "友情链接图标(base64格式)",
	    ),
	    @SWG\Parameter(
		   name = "target",
		   type = "string",
		   in = "formData",
		   description = "友情链接打开方式",
	    ),
	    @SWG\Parameter(
		   name = "description",
		   type = "string",
		   in = "formData",
		   description = "友情链接描述",
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
			$result = $this->validate($data,'LinkValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$data = $this->dataProcessing($data);
			$result2 = Db::connect('db_config'.parent::$db_id)->name('Link')->field(true)->insert($data);
			if($result2){
				$this->info(1,'添加成功');
			}else{
				$this->info(0,'添加失败');
			}
		}
	}

	/**
	@SWG\Post(
		path = "/admin/Link/editPost",
	 	summary = "保存修改友情链接",
	  	description = "保存修改友情链接",
	   	tags = {"Admin/Links(后台/友情链接)"},
	    @SWG\Parameter(ref="#/parameters/token"),
	    @SWG\Parameter(
		   name = "id",
		   type = "integer",
		   required = true,
		   in = "formData",
		   description = "友情链接id",
	    ),
	    @SWG\Parameter(
		   name = "name",
		   type = "string",
		   required = true,
		   in = "formData",
		   description = "友情链接名称",
	    ),
	    @SWG\Parameter(
		   name = "url",
		   type = "string",
		   required = true,
		   in = "formData",
		   description = "友情链接地址",
	    ),
	    @SWG\Parameter(
		   name = "image",
		   type = "string",
		   in = "formData",
		   description = "友情链接图标(base64格式)",
	    ),
	    @SWG\Parameter(
		   name = "target",
		   type = "string",
		   in = "formData",
		   description = "友情链接打开方式",
	    ),
	    @SWG\Parameter(
		   name = "description",
		   type = "string",
		   in = "formData",
		   description = "友情链接描述",
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
			$result = $this->validate($data,'LinkValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$data = $this->dataProcessing($data);
			$result2 = Db::connect('db_config'.parent::$db_id)->name('Link')->update($data);
			if($result2){
				$this->info(1,'保存成功');
			}else{
				$this->info(0,'保存失败');
			}
		}
	}

	/**
	@SWG\Post(
		path = "/admin/Link/delete",
	 	summary = "删除友情链接",
	  	description = "删除友情链接(直接删除,不进回收站)",
	   	tags = {"Admin/Links(后台/友情链接)"},
	    @SWG\Parameter(ref="#/parameters/token"),
	    @SWG\Parameter(
		   name = "id",
		   type = "integer",
		   required = true,
		   in = "formData",
		   description = "删除友情链接id",
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
		$LinkModel = new LinkModel();
		$result = parent::deleteImage($LinkModel);
		if($result){
			$result1 = $LinkModel->where('id',$id)->delete();
			if($result1){
				$this->info(1,'删除成功');
			}else{
				$this->info(0,'删除失败');
			}	
		}else{
			$this->info(0,'删除失败1');
		}
		
	}

	/**
	@SWG\Post(
		path = "/admin/Link/hide",
	 	summary = "显示、隐藏友情链接",
	  	description = "显示、隐藏友情链接",
	   	tags = {"Admin/Links(后台/友情链接)"},
	    @SWG\Parameter(ref="#/parameters/token"),
	    @SWG\Parameter(
		   name = "id",
		   type = "integer",
		   required = true,
		   in = "formData",
		   description = "友情链接id",
	    ),
	    @SWG\Parameter(
		   name = "show",
		   type = "integer",
		   required = true,
		   in = "formData",
		   description = "状态;1显示,0隐藏",
	    ),
		@SWG\Response(
			response = "200",
			description = "状态码",
			@SWG\Schema(ref="#/definitions/info"),
		),
	),
	 */
	public function hide(){
		$id = $this->request->param('id');
		if(empty($id)){
			$this->info(0,'非法操作');
		}
		$show = $this->request->param('show');
		$result = Db::connect('db_config'.parent::$db_id)->name('link')->where('id',$id)->setField('status',$show);
		if($result){
			$this->info(1,'修改成功');
		}else{
			$this->info(0,'修改失败');
		}
	}

	/**
	@SWG\Post(
		path = "/admin/Link/list_orders",
	 	summary = "友情链接排序",
	  	description = "友情链接排序",
	   	tags = {"Admin/Links(后台/友情链接)"},
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
    	$LinkModel = new LinkModel();
        $result = parent::listOrders($LinkModel);
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
    			$orginal_thumb = Db::connect('db_config'.parent::$db_id)->name('Link')->where('id',$data['id'])->value('image');
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