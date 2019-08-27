<?php
namespace app\qa\controller;
use app\common\controller\AdminBase;
use app\qa\model\AnswerModel;
use app\qa\validate\AnswerValidate;
use think\Db;


/**
* 回答控制器
*/
class AdminAnswer extends AdminBase{

	protected $answerModel;

	public function initialize(){
		parent::initialize();
		$this->answerModel = new AnswerModel();
	}
	
	/**
	 * 根据问题id获取回答列表
	 * @return json
	 */
	public function index(){
		$question_id = $this->request->param('question_id');
		if(empty($question_id)){
			$this->info(0,'非法操作');
		}
		$answers = $this->answerModel->answerList($question_id);
		if(empty($answers)){
			$this->info(0,'数据为空');
		}else{
			return json($answers);
		}
		
	}

	/**
	 * 回答问题
	 */
	public function addPost(){
		$data = $this->request->param();
		$result = $this->validate($data,'AnswerValidate');
		if($result !== true){
			$this->info(0,$result);
		}
		$data['content'] = json_encode($data['content']);
		$result1 = $this->answerModel->allowField(true)->isUpdate(false)->data($data)->save();
		if($result1){
			$this->info(1,'回答成功');
		}else{
			$this->info(0,'回答失败');
		}
	}

	/**
	 * 修改回答
	 */
	public function editPost(){
		$data = $this->request->param();
		$result = $this->validate($data,'AnswerValidate');
		if($result !== true){
			$this->info(0,$result);
		}
		$data['content'] = json_encode($data['content']);
		if(empty($data['id'])){
			unset($data['id']);
			$result1 = $this->answerModel->allowField(true)->isUpdate(false)->data($data)->save();
		}else{
			$result1 = $this->answerModel->allowField(true)->isUpdate(true)->data($data)->save();
		}
		if($result1){
			$this->info(1,'回答成功');
		}else{
			$this->info(0,'回答失败');
		}
	}

	/**
	 * 删除回答
	 */
	public function delete(){
		$id = $this->request->param('id');
		if(empty($id)){
			$this->info(0,'非法操作');
		}
		$adoption = $this->answerModel->where('id',$id)->value('status');
		if($adoption == 1){
			$question_id = $this->answerModel->where('id',$id)->value('question_id');
			Db::connect('db_config'.parent::$db_id)->name('question')->where('id',$question_id)->setField('adoption',0);
			$this->answerModel->allowField(true)->isUpdate(true)->save(['status'=>0],['id'=>$id]);
		}
		$result = $this->answerModel->allowField(true)->isUpdate(true)->save(['delete_time'=>time()],['id'=>$id]);
		if($result){
			$this->info(1,'删除成功');
		}else{
			$this->info(0,'删除失败');
		}
	}

	/**
	 * 采纳回答
	 */
	public function adoption(){
		$id = $this->request->param('id');
		if(empty($id)){
			$this->info(0,'非法操作');
		}
		$status = $this->answerModel->where('id',$id)->value('status');
		if($status){
			$this->info(0,'已采纳，请勿重复操作');
		}
		$question_id = $this->answerModel->where('id',$id)->value('question_id');
		$adoption = Db::connect('db_config'.parent::$db_id)->name('question')->where('id',$question_id)->value('adoption');
		if($adoption){
			$this->info(0,'当前问题存在已采纳回答');
		}else{
			$result = $this->answerModel->allowField(true)->isUpdate(true)->save(['status'=>1],['id'=>$id]);
			Db::connect('db_config'.parent::$db_id)->name('question')->where('id',$question_id)->setField('adoption',1);
			if($result){
				$this->info(1,'采纳成功');
			}else{
				$this->info(0,'采纳失败');
			}
		}
	}



}