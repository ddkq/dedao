<?php
namespace app\admin\controller;
use app\common\controller\AdminBase;
use app\admin\model\RecycleModel;
use think\Db;


/**
* 回收站控制器
*/
class Recycle extends AdminBase{

	protected $recycleModel;

	public function initialize(){
		parent::initialize();
		$this->recycleModel = new RecycleModel();
	}
	
	/**
	@SWG\Post(
        path = "/admin/Recycle/index",
        summary = "回收站列表数据",
        description = "回收站列表数据",
        tags = {"Admin/Recycle(后台/回收站)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(ref="#/parameters/page"),
        @SWG\Parameter(ref="#/parameters/start_time"),
        @SWG\Parameter(ref="#/parameters/end_time"),
        @SWG\Parameter(ref="#/parameters/keyword"),
        @SWG\Response(
            response = "200",
            description = "回收站列表数据",
            @SWG\Schema(
                required = {"recycle"},
                type = "array",
                @SWG\Items(
                	@SWG\Property(
                		property = "current_page",
                		type = "integer",
                		description = "当前页码",
                	),
                    @SWG\Property(
                        property = "last_page",
                        type = "integer",
                        description = "页码总数",
                    ),
                    @SWG\Property(
                        property = "per_page",
                        type = "integer",
                        description = "每页显示文章数",
                    ),
                    @SWG\Property(
                        property = "total",
                        type = "integer",
                        description = "文章总数",
                    ),
                    @SWG\Property(
                        property = "data",
                        type = "array",
                        description = "数据列表",
                        @SWG\Items(
                        	@SWG\Property(
		                		property = "id",
		                		type = "integer",
		                		description = "主键id",
		                	),
		                	@SWG\Property(
		                		property = "title",
		                		type = "string",
		                		description = "标题",
		                	),
		                	@SWG\Property(
		                		property = "category",
		                		type = "string",
		                		description = "分类",
		                	),
		                	@SWG\Property(
		                		property = "author",
		                		type = "string",
		                		description = "删除人",
		                	),
		                	@SWG\Property(
		                		property = "delete_time",
		                		type = "string",
		                		format = "dateTime",
		                		description = "删除时间",
		                	),
                        ),
                    ),
                ),
            ),
        ),
    ),
    */
	public function index(){
		$param = $this->request->param();
		$recycle = $this->recycleModel->RecycleList($param);
		return json($recycle);
	}

	/**
	@SWG\Post(
        path = "/admin/Recycle/reduction",
        summary = "还原数据",
        description = "还原数据",
        tags = {"Admin/Recycle(后台/回收站)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "id",
        	type = "integer",
        	required = true,
        	in = "formData",
        	description = "主键id",
        ),
        @SWG\Response(
            response = "200",
            description = "状态码",
            @SWG\Schema(ref="#/definitions/info"),
        ),
    ),
    */
	public function reduction(){
		$id = $this->request->param('id',0,'intval');
		$reduction = $this->recycleModel->where('id',$id)->field('object_id,table_name')->find();
		if(!empty($reduction)){
			$reduction = $reduction->toArray();
			if($reduction['table_name'] == 'article'){
				Db::connect('db_config'.parent::$db_id)->name('PortalArticle')->where('id',$reduction['object_id'])->setField('delete_time',0);
				Db::connect('db_config'.parent::$db_id)->name('PortalRelationships')->where('article_id',$reduction['object_id'])->setField('status',1);
			}else if($reduction['table_name'] == 'doctor'){
				Db::connect('db_config'.parent::$db_id)->name('Doctor')->where('id',$reduction['object_id'])->setField('delete_time',0);
				Db::connect('db_config'.parent::$db_id)->name('DepartmentRelationships')->where('doctor_id',$reduction['object_id'])->setField('status',1);
			}else if($reduction['table_name'] == 'encyclopedia'){
				Db::connect('db_config'.parent::$db_id)->name('Encyclopedia')->where('id',$reduction['object_id'])->setField('delete_time',0);
				Db::connect('db_config'.parent::$db_id)->name('EnRelationships')->where('en_id',$reduction['object_id'])->setField('status',1);
			}else if($reduction['table_name'] == 'question'){
				Db::connect('db_config'.parent::$db_id)->name('Question')->where('id',$reduction['object_id'])->setField('delete_time',0);
				Db::connect('db_config'.parent::$db_id)->name('QaRelationships')->where('question_id',$reduction['object_id'])->setField('status',1);
			}else{
				Db::connect('db_config'.parent::$db_id)->name($reduction['table_name'])->where('id',$reduction['object_id'])->setField('delete_time',0);
			}

			$result = $this->recycleModel->where('id',$id)->delete();
			if($result){
				$this->info(1,'还原成功');
			}else{
				$this->info(0,'还原失败');
			}	
		}else{
			$this->info(0,'还原失败');
		}
	}

	/**
	@SWG\Post(
        path = "/admin/Recycle/delete",
        summary = "真实删除数据",
        description = "真实删除数据",
        tags = {"Admin/Recycle(后台/回收站)"},
        @SWG\Parameter(ref="#/parameters/token"),
        @SWG\Parameter(
        	name = "id",
        	type = "integer",
        	required = true,
        	in = "formData",
        	description = "主键id",
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
		$reduction = $this->recycleModel->where('id',$id)->field('object_id,table_name')->find();
		if(!empty($reduction)){
			$reduction = $reduction->toArray();
			if($reduction['table_name'] == 'article'){
				Db::connect('db_config'.parent::$db_id)->name('PortalArticle')->where('id',$reduction['object_id'])->delete();
				Db::connect('db_config'.parent::$db_id)->name('PortalRelationships')->where('article_id',$reduction['object_id'])->delete();
			}else if($reduction['table_name'] == 'doctor'){
				Db::connect('db_config'.parent::$db_id)->name('Doctor')->where('id',$reduction['object_id'])->delete();
				Db::connect('db_config'.parent::$db_id)->name('DepartmentRelationships')->where('doctor_id',$reduction['object_id'])->delete();
			}else if($reduction['table_name'] == 'encyclopedia'){
				Db::connect('db_config'.parent::$db_id)->name('Encyclopedia')->where('id',$reduction['object_id'])->delete();
				Db::connect('db_config'.parent::$db_id)->name('EnRelationships')->where('en_id',$reduction['object_id'])->delete();
			}else{
				Db::connect('db_config'.parent::$db_id)->name($reduction['table_name'])->where('id',$reduction['object_id'])->delete();
			}

			$result = $this->recycleModel->where('id',$id)->delete();
			if($result){
				$this->info(1,'删除成功');
			}else{
				$this->info(0,'删除失败');
			}
		}else{
			$this->info(0,'删除失败');
		}

		
	}



}