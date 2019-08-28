<?php
/*
 * 健康问答
 */
namespace Qa\Controller;
use Common\Controller\AdminbaseController;
class AdminAnswerController extends AdminbaseController {
	
	
	protected $answer_model;
	protected $question_model;
	protected $user_model;
	
	function _initialize() {
		parent::_initialize();
		$this->answer_model = D("Qa/Answer");
		$this->question_model = D("Qa/Question");
		$this->user_model = D("Common/Users");
	}
	function index(){
		$this->_lists();
		$this->display();
	}
	
	function add(){
		$qid = intval(I("get.id"));
		$parent = $this->question_model->where("id=".$qid)->find();	
		$user = $this->user_model->where('user_type=3')->select();
		$admin_id = get_current_admin_id();
		$this->assign("user",$user);
		$this->assign("admin_id",$admin_id);
		$this->assign("parent",$parent);
		$this->display();
	}
	
	function add_post(){
		//var_dump($_POST);exit;
		if (IS_POST) {
			$qid = intval(I("post.q_id"));
			$answer = I("post.");
			$answer['createtime']=date("Y-m-d H:i:s",time());
			$answer['content2'] = htmlspecialchars_decode($answer['content2']);
			$answer['content4'] = htmlspecialchars_decode($answer['content4']);
			if(empty($answer['content2']) && empty($answer['content4'])){
				$content = $answer['content1'].'<br/>'.$answer['content3'];
				$answer['content'] = array("content"=>$content,"type"=>0);
			}else if(!empty($answer['content2']) && empty($answer['content4'])){
				$content = '<strong>'.$answer['content1'].'</strong><br/>'.$answer['content2'];
				$answer['content'] = array($answer['content1']=>$answer['content2'],"content"=>$content,"type"=>1);
			}else if(empty($answer['content2']) && !empty($answer['content4'])){
				$content = '<strong>'.$answer['content3'].'</strong><br/>'.$answer['content4'];
				$answer['content'] = array($answer['content3']=>$answer['content4'],"content"=>$content,"type"=>2);
			}else{
				$content = '<strong>'.$answer['content1'].'</strong><br/>'.$answer['content2'].'<strong>'.$answer['content3'].'</strong><br/>'.$answer['content4'];
				$answer['content'] = array($answer['content1']=>$answer['content2'],$answer['content3']=>$answer['content4'],"content"=>$content,"type"=>3);
			}
			//var_dump($answer);exit;
			$answer['content'] = json_encode($answer['content']);
			$result=$this->answer_model->add($answer);
			if ($result) {
				$question=$this->question_model->where("id=".$qid)->setInc('answer_num');
				$this->success("回答成功！");
			} else {
				$this->error("回答失败！");
			}
		}
	}
	
	public function edit(){
		$id=  intval(I("get.id"));
		$qid = intval(I("get.qid"));
		$post=$this->answer_model->where("id=$id")->find();
		$parent = $this->question_model->where("id=".$qid)->find();
		$user = $this->user_model->where('user_type=3')->select();
		$admin_id = get_current_admin_id();
		$content = json_decode($post['content'],true);
		$key = array_keys($content);
		$value = array_values($content);
		$this->assign("user",$user);
		$this->assign("admin_id",$admin_id);	
		$this->assign("post",$post);
		$this->assign("content",$content);
		$this->assign("key",$key);
		$this->assign("value",$value);
		$this->assign("parent",$parent);
		$this->display();
	}
	
	public function edit_post(){
		if (IS_POST) {

			$id=intval($_POST['id']);
			$qid=intval($_POST['qid']);
			$answer = I("post.");
			$answer['content2'] = htmlspecialchars_decode($answer['content2']);
			$answer['content4'] = htmlspecialchars_decode($answer['content4']);
			if($answer['status'] == 1){
				$this->question_model->where('id='.$qid)->setField('status','1');
			}
			if(empty($answer['content2']) && empty($answer['content4'])){
				$content = $answer['content1'].'<br/>'.$answer['content3'];
				$answer['content'] = array("content"=>$content,"type"=>0);
			}else if(!empty($answer['content2']) && empty($answer['content4'])){
				$content = '<strong>'.$answer['content1'].'</strong><br/>'.$answer['content2'];
				$answer['content'] = array($answer['content1']=>$answer['content2'],"content"=>$content,"type"=>1);
			}else if(empty($answer['content2']) && !empty($answer['content4'])){
				$content = '<strong>'.$answer['content3'].'</strong><br/>'.$answer['content4'];
				$answer['content'] = array($answer['content3']=>$answer['content4'],"content"=>$content,"type"=>2);
			}else{
				$content = '<strong>'.$answer['content1'].'</strong><br/>'.$answer['content2'].'<strong>'.$answer['content3'].'</strong><br/>'.$answer['content4'];
				$answer['content'] = array($answer['content1']=>$answer['content2'],$answer['content3']=>$answer['content4'],"content"=>$content,"type"=>3);
			}
			$answer['content'] = json_encode($answer['content']);

			//var_dump($article);exit;
			$result=$this->answer_model->where("id=".$id)->save($answer);
			if ($result!==false) {
				$this->success("保存成功！");
			} else {
				$this->error("保存失败！");
			}
		}
	}
	
	
	private  function _lists($status=1){
		$qid = intval(I("get.qid"));
		
		
		$where_ands=empty($qid)?'':array("q_id = $qid");
		
		
		$where= join(" and ", $where_ands);
		
		//var_dump($where);exit;
			
		$count=$this->answer_model
		->where($where)
		->count();
		//echo $this->answer_model->_sql();
		//echo $count;exit;	
		$page = $this->page($count, 20);
			
		$parent = $this->question_model->field("title")->where("id=".$qid)->find();	
		$posts=$this->answer_model
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("id ASC")->select();
		//echo $posts->_sql();exit;
		//var_dump($posts);exit;
		$con = json_decode($post['content'],true);
		$content = $con['content'];
		$users_obj = M("Users");
		$users_data=$users_obj->field("id,user_login,sex,birthday")->where("user_status=1")->select();
		$users=array();
		foreach ($users_data as $u){
			$users[$u['id']]=$u;
		}
		$this->assign('parent',$parent);
		$this->assign("users",$users);
		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
		$this->assign("content",$content);
	}
	
	function delete(){
		$id=intval(I("get.id"));
		$qid=intval(I("get.qid"));
		$answer = $this->answer_model->where("id=".$id)->find();
		$result = $this->answer_model->where("id=".$id)->delete();
		if ($result) {
			if($answer['status'] == 1){
				$question=$this->question_model->where("id=".$qid)->setField('status','0');
			}
			$question=$this->question_model->where("id=".$qid)->setDec('answer_num');
			$this->success("删除成功！");
		} else {
			$this->error("删除失败！");
		}
	}
	
	
}