<?php
namespace app\qa\controller;
use app\common\controller\AdminBase;
use app\qa\model\QuestionModel;
use app\qa\validate\QuestionValidate;
use think\Db;


/**
* 后台问题类
*/
class AdminQuestion extends AdminBase{
	
	protected $questionModel;
	
	public function initialize(){
        parent::initialize(); 
        $this->questionModel = new QuestionModel();
    }

    /**
     * 问题列表
     * @return json
     */
	public function index(){
		$param = $this->request->param();
		$result = $this->questionModel->QuestionList($param);
		return json($result);
	}

	/**
	 * 添加问题
	 */
	public function addPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			$result = $this->validate($data,'QuestionValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$result1 = $this->questionModel->QuestionAddPost($data);
			if($result1){
				$this->info(1,'添加成功');
			}else{
				$this->info(0,'添加失败');
			}	
		}
	}

	/**
	 * 修改问题
	 * @return json
	 */
	public function editPost(){
		if($this->request->isPost()){
			$data = $this->request->param();
			$result = $this->validate($data,'QuestionValidate');
			if($result !== true){
				$this->info(0,$result);
			}
			$result1 = $this->questionModel->QuestionEditPost($data);
			if($result1){
				$this->info(1,'修改成功');
			}else{
				$this->info(0,'修改失败');
			}	
		}
	}

	/**
	 * 删除问题
	 * @return json
	 */
	public function delete(){

		$param = $this->request->param();

		//单一文章
		if(isset($param['id'])){
			$id = $param['id'];
			$result = $this->questionModel->allowField(true)->isUpdate(true)->save(['delete_time'=>time()],['id'=>$id]);
			if($result){
				Db::connect('db_config'.parent::$db_id)->name('qaRelationships')->where('question_id',$id)->setField('status',0);
				$user_id = cmf_get_current_admin_id();
				$name = $this->questionModel->where('id',$id)->value('question_title');
				$data = [
					'object_id'		=>	$id,
					'create_time'	=>	time(),
					'table_name'	=>	'question',
					'name'			=>	$name,
					'user_id'		=>	$user_id
				];
				Db::name('RecycleBin')->insert($data);
			}
		}
		//批量删除
		if(isset($param['ids'])){
			$ids = $param['ids'];
			$recycle = $this->questionModel->where(['id' => ['in', $ids]])->select();
			$result = $this->questionModel->where(['id' => ['in', $ids]])->update(['delete_time'=>time()]);
			if($result){
				Db::connect('db_config'.parent::$db_id)->name('qaRelationships')->where(['question_id' => ['in', $ids]])->setField('status',0);
				$user_id = cmf_get_current_admin_id();
				foreach ($recycle as $key => $value) {
					$name = $value['question_title'];
					$data = [
						'object_id'		=>	$value['id'],
						'create_time'	=>	time(),
						'table_name'	=>	'question',
						'name'			=>	$name,
						'user_id'		=>	$user_id
					];
					Db::connect('db_config'.parent::$db_id)->name('RecycleBin')->insert($data);
				}
			}
		}
		$this->info(1,'删除成功');
	}

	/**
	 * 修改问答属性
	 * @return json
	 */
	public function transform(){

		$param = $this->request->param();

		if(isset($param['id'])){
			$id = $param['id'];
			if(isset($param['status']) && $param['status'] !== ''){
				$this->questionModel->where('id',$id)->update(['status'=>$param['status']]);
			}
			if(isset($param['top']) && $param['top'] !== ''){
				$this->questionModel->where('id',$id)->update(['is_top'=>$param['top']]);
			}
			if(isset($param['recommended']) && $param['recommended'] !== ''){
				$this->questionModel->where('id',$id)->update(['recommended'=>$param['recommended']]);
			}
		}

		if(isset($param['ids'])){
			$ids = $param['ids'];
			if(isset($param['status']) && $param['status'] !== ''){
				$this->questionModel->where(['id' => ['in', $ids]])->update(['status'=>$param['status']]);
			}
			if(isset($param['top']) && $param['top'] !== ''){
				$this->questionModel->where(['id' => ['in', $ids]])->update(['is_top'=>$param['top']]);
			}
			if(isset($param['recommended']) && $param['recommended'] !== ''){
				$this->questionModel->where(['id' => ['in', $ids]])->update(['recommended'=>$param['recommended']]);
			}
		}
		$this->info(1,'修改成功');

	}

	/**
	 * 排序
	 * @return json
	 */
	public function list_orders(){
        $result = parent::listOrders(Db::name('qaRelationships'));
        if($result){
            $this->info(1,'排序成功');
        }else{
            $this->info(0,'排序失败');
        }
    }


    /**
     * 上传图片
     * @return json
     */
    public function upload(){
    	$result = parent::uploadImgMulit();
    	return json(array_values($result));
    }
	
}