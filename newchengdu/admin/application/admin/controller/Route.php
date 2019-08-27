<?php
namespace app\admin\controller;
use app\common\controller\AdminBase;
use think\Db;
use app\admin\model\RouteModel;
use app\admin\validate\RouteValidate;


/**
* 路由(url美化)
*/
class Route extends AdminBase{

	protected $routeModel;

	public function initialize(){
		parent::initialize();
		$this->routeModel = new RouteModel();
	}


	/**
	@SWG\Post(
        path = "/admin/Route/index",
        summary = "获取url美化列表",
        description = "获取url美化列表",
        tags = {"Admin/Route(后台/路由-url美化)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Response(
            response = "200",
            description = "url美化列表",
            @SWG\Schema(
                required = {"route"},
                type = "array",
                @SWG\Items(
                    @SWG\Property(
                        property = "id",
                        type = "integer",
                        description = "路由id",
                    ),
                    @SWG\Property(
                        property = "status",
                        type = "integer",
                        description = "状态;1:启用,0:关闭",
                    ),
                    @SWG\Property(
                        property = "full_url",
                        type = "string",
                        description = "完整url",
                    ),
                    @SWG\Property(
                        property = "url",
                        type = "string",
                        description = "实际显示的url",
                    ),
                ),
            ),
        ),
    ),
    */
	public function index(){
		$routes	= $this->routeModel->cache('routes')->select();
		$this->routeModel->getRoute();
		return json(array_values($routes));
	}

	/**
	@SWG\Post(
        path = "/admin/Route/addPost",
        summary = "添加url美化",
        description = "添加url美化",
        tags = {"Admin/Route(后台/路由-url美化)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "full_url",
        	type = "string",
        	in = "formData",
        	description = "完整url",
        ),
        @SWG\Parameter(
        	name = "url",
        	type = "string",
        	in = "formData",
        	description = "实际显示的url",
        ),
        @SWG\Parameter(
        	name = "status",
        	type = "integer",
        	in = "formData",
        	description = "状态;1:启用,0:关闭",
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
			$result = $this->validate($data,'RouteValidate');
			if($result !== true){
				return json(['code'=>0,'info'=>$result]);
			}else{
				$result2 = $this->routeModel->allowField(true)->save($data);
				if($result2){
					cache('routes',null);
					$this->info(1,'添加成功');
				}else{
					$this->info(0,'添加失败');
				}
			}
		}
	}


	/**
	@SWG\Post(
        path = "/admin/Route/editPost",
        summary = "修改保存url美化",
        description = "修改保存url美化",
        tags = {"Admin/Route(后台/路由-url美化)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			description = "路由id",
        ),
        @SWG\Parameter(
        	name = "full_url",
        	type = "string",
        	in = "formData",
        	description = "完整url",
        ),
        @SWG\Parameter(
        	name = "url",
        	type = "string",
        	in = "formData",
        	description = "实际显示的url",
        ),
        @SWG\Parameter(
        	name = "status",
        	type = "integer",
        	in = "formData",
        	description = "状态;1:启用,0:关闭",
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
			$result = $this->validate($data,'RouteValidate');
			if($result !== true){
				return json(['code'=>0,'info'=>$result]);
			}else{
				$result2 = $this->routeModel->allowField(true)->isUpdate(true)->save($data);
				if($result2){
					cache('routes',null);
					$this->info(1,'修改成功');
				}else{
					$this->info(0,'修改失败');
				}
			}
		}
	}


	/**
	@SWG\Post(
        path = "/admin/Route/delete",
        summary = "删除url美化",
        description = "删除url美化",
        tags = {"Admin/Route(后台/路由-url美化)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			description = "路由id",
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
		$result = $this->routeModel->destroy($id);
		if($result){
			cache('routes',null);
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}

	/**
	@SWG\Post(
        path = "/admin/Route/ban",
        summary = "禁用url美化",
        description = "禁用url美化",
        tags = {"Admin/Route(后台/路由-url美化)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			description = "路由id",
        ),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
    */
	public function ban(){
		$id = $this->request->param('id',0,'intval');
		$data['id'] = $id;
		$data['status'] = 0;
		$result = $this->routeModel->allowField(true)->isUpdate(true)->save($data);
		if($result){
			cache('routes',null);
			$this->info(1,'禁用成功');
		}else{
			$this->info(0,'禁用失败');
		}

	}

	/**
	@SWG\Post(
        path = "/admin/Route/open",
        summary = "启用url美化",
        description = "启用url美化",
        tags = {"Admin/Route(后台/路由-url美化)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
			name = "id",
			type = "integer",
			in = "formData",
			description = "路由id",
        ),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
    */
	public function open(){
		$id = $this->request->param('id',0,'intval');
		$data['id'] = $id;
		$data['status'] = 1;
		$result = $this->routeModel->allowField(true)->isUpdate(true)->save($data);
		if($result){
			cache('routes',null);
			$this->info(1,'启用成功');
		}else{
			$this->info(0,'启用失败');
		}
	}


}
