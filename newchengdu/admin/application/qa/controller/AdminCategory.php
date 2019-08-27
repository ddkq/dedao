<?php
namespace app\qa\controller;
use app\common\controller\AdminBase;
use app\qa\model\CategoryModel;
use app\qa\validate\QaCategoryValidate;
use think\Db;

/**
* 后台问答分类
*/
class AdminCategory extends AdminBase{
	
	protected $categoryModel;
	
	public function initialize(){
        parent::initialize(); 
        $this->categoryModel = new CategoryModel();
    }

    /**
     * 问答分类列表
     * @return json
     */
	public function index(){
		$result = $this->categoryModel->CategoryList();
		return json(array_values($result));
	}

	public function categoryTree(){
		$result = $this->categoryModel->CategoryTree();
		return json(array_values($result));
	}

	/**
	 * 添加问答分类
	 * @return json
	 */
	public function addPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			$result = $this->validate($data, 'QaCategoryValidate');
			if($result !== true){
				$this->info(0,$result);
			}

			$result2 = $this->categoryModel->isUpdate(false)->allowField(true)->save($data);
			if($result2){
				$this->info(1,'添加成功');
			}else{
				$this->info(0,'添加失败');
			}
		}
	}

	//修改问答分类
	public function editPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			$result = $this->validate($data, 'QaCategoryValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$result = $this->categoryModel->isUpdate(true)->allowField(true)->save($data);
			if($result){
				$this->info(1,'修改成功');
			}else{
				$this->info(0,'修改失败');
			}
		}
	}

	//删除问答分类
	public function delete(){
		$id = $this->request->param('id',0,'intval');
		$count = $this->categoryModel->where(['parent_id' => $id , 'delete_time' => 0])->count();
		if($count > 0){
			$this->info(0,'该分类下还有子分类');
		}
		$result = Db::connect('db_config'.parent::$db_id)->name('qa_category')->where('id',$id)->setField('delete_time',time());
		if($result){
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}

	//排序
	public function list_orders(){
        $result = parent::listOrders($this->categoryModel);
        if($result){
            $this->info(1,'排序成功');
            $this->cleanCache();
        }else{
            $this->info(0,'排序失败');
        }
    }

    /**
	 * 显示/隐藏分类
	 * @return json
	 */
	public function transform(){

		$param = $this->request->param();

		if(isset($param['id'])){
			$id = $param['id'];
			if(isset($param['status']) && $param['status'] !== ''){
				$this->categoryModel->where('id',$id)->update(['status'=>$param['status']]);
			}
		}

		if(isset($param['ids'])){
			$ids = $param['ids'];
			if(isset($param['status']) && $param['status'] !== ''){
				$this->categoryModel->where(['id' => ['in', $ids]])->update(['status'=>$param['status']]);
			}
		}
		$this->info(1,'修改成功');

	}
}