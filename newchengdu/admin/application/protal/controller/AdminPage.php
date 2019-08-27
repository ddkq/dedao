<?php
namespace app\protal\controller;
use app\common\controller\AdminBase;
use app\protal\model\PageModel;
use app\protal\validate\PageValidate;
use think\Db;

/**
* 后台页面管理控制器
*/
class AdminPage extends AdminBase{

	protected $pageModel;
	
	public function initialize(){
        parent::initialize(); 
        $this->pageModel = new PageModel();
    }
	
	//获取页面列表数据
	public function index(){
		$param = $this->request->param();
		$result = $this->pageModel->PageList($param);
		return json($result);
	}

	//添加页面
	public function addPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			$result = $this->validate($data,'PageValidate');
			if($result !== true ){
				$this->info(0,$result);
			}
			$data = $this->dataProcessing($data);
			$data['user_id'] = cmf_get_current_admin_id();
			$result1 = $this->pageModel->isUpdate(false)->allowField(true)->save($data);
			if($result1){
				$this->info(1,'添加成功');
			}else{
				$this->info(0,'添加失败');
			}
		}
	}

	//修改页面
	public function editPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			$result = $this->validate($data,'PageValidate');
			if($result !== true ){
				$this->info(0,$result);
			}
			$data = $this->dataProcessing($data);
			$result1 = $this->pageModel->isUpdate(true)->allowField(true)->save($data);
			if($result1){
				$this->info(1,'修改成功');
			}else{
				$this->info(0,'修改失败');
			}
		}
	}

	//删除页面
	public function delete(){
		$param = $this->request->param();

		//单一文章
		if(isset($param['id'])){
			$id = $param['id'];
			$result = $this->pageModel->allowField(true)->isUpdate(true)->save(['delete_time'=>time()],['id'=>$id]);
			if($result){
				$user_id = cmf_get_current_admin_id();
				$name = $this->pageModel->where('id',$id)->value('page_title');
				$data = [
					'object_id'		=>	$id,
					'create_time'	=>	time(),
					'table_name'	=>	'article',
					'name'			=>	$name,
					'user_id'		=>	$user_id
				];
				Db::connect('db_config'.parent::$db_id)->name('RecycleBin')->insert($data);
			}
		}
		//批量删除
		if(isset($param['ids'])){
			$ids = $param['ids'];
			$recycle = $this->pageModel->where(['id' => ['in', $ids]])->select();
			$result = $this->pageModel->where(['id' => ['in', $ids]])->update(['delete_time'=>time()]);
			if($result){
				$user_id = cmf_get_current_admin_id();
				foreach ($recycle as $key => $value) {
					$name = $value['page_title'];
					$data = [
						'object_id'		=>	$value['id'],
						'create_time'	=>	time(),
						'table_name'	=>	'page',
						'name'			=>	$name,
						'user_id'		=>	$user_id
					];
					Db::connect('db_config'.parent::$db_id)->name('RecycleBin')->insert($data);
				}
			}
		}
		$this->info(1,'删除成功');
	}

	//处理post图片数据
    private function dataProcessing($data){
    	
		//页面内容的图片
		if(!empty($data['page_content'])){
			ini_set('pcre.backtrack_limit', 999999999);
	    	$preg = "|(src=\x22)+[A-Za-z0-9]+[^%&'?$\x22]+|";
	    	$data['page_content'] = preg_replace_callback(
		        $preg,
		        function ($matches) {
				    return 'src="'.$this->upload_thumb(substr($matches[0],5));
		        },
		        $data['page_content']
		    );
		}
		return $data;
    }



}