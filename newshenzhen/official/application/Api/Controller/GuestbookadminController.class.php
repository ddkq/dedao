<?php
namespace Api\Controller;
use Common\Controller\AdminbaseController;
class GuestbookadminController extends AdminbaseController{
	
	protected $guestbook_model;
	
	function _initialize() {
		parent::_initialize();
		$this->guestbook_model=D("Common/Guestbook");
	}
	
	function index(){
		$this->_lists();
		$this->display();
	}
	
	function edit(){
		$id=intval(I("get.id"));
		$result=$this->guestbook_model->where('id='.$id.'')->find();
		$this->assign('msg',$result);
		$this->display();
	}
	
	function edit_post(){
		if(IS_POST){
			$rid = I("post.id");
			$reply['reply_msg'] = I("post.reply_msg");
			$reply['reply_time']=date("Y-m-d H:i:s");
			$reply['isreply']=1;
			$reply['post_author']=get_current_admin_id();
			$result=$this->guestbook_model->where('id='.$rid.'')->save($reply);
			if ($result!==false) {
				$this->success("保存成功！");
			} else {
				$this->error("保存失败！");
			}	
		}
		
	}
	function delete(){
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$data['status']=0;
			$status=$this->guestbook_model->where("id in ($ids)")->save($data);
			if ($status!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			$id=intval(I("get.id"));
			$data['status']=0;
			if ($this->guestbook_model->where(array("id"=>$id))->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
	
	function check(){
		$id=intval(I("get.id"));
		$result=$this->guestbook_model->where('id='.$id.'')->find();
		$this->assign('msg',$result);
		$this->display();
	}
	
	function recyclebin(){
		$this->_lists(0);
		$this->display();
	}
	
	
	function clean(){
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$status=$this->guestbook_model->where("id in ($ids)")->delete();
			if ($status!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_GET['id'])){
				$id = intval(I("get.id"));
				$status=$this->guestbook_model->where(array("id"=>$id))->delete();
				if ($status!==false) {
					$this->success("删除成功！");
				} else {
					$this->error("删除失败！");
				}
			}	
		}
		
	}
	
	function restore(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data['status']=1;
			if ($this->guestbook_model->where(array("id"=>$id))->save($data)) {
				$this->success("还原成功！");
			} else {
				$this->error("还原失败！");
			}
		}
	}
	
	
	private function _lists($status=1){

		$where_ands=array("status=$status");
		
		$fields=array(
				'start_time'=> array("field"=>"createtime","operator"=>">"),
				'end_time'  => array("field"=>"createtime","operator"=>"<"),
				'keyword'  => array("field"=>"title","operator"=>"like"),
		);
		if(IS_POST){
			
			foreach ($fields as $param =>$val){
				if (isset($_POST[$param]) && !empty($_POST[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_POST[$param];
					$_GET[$param]=$get;
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}else{
			foreach ($fields as $param =>$val){
				if (isset($_GET[$param]) && !empty($_GET[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_GET[$param];
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}
		
		$where= join(" and ", $where_ands);
		
		$count=$this->guestbook_model->where($where)->count();
		$page = $this->page($count, 20);
		
		$guestmsgs=$this->guestbook_model->where($where)->order(array("createtime"=>"DESC"))->limit($page->firstRow . ',' . $page->listRows)->select();
		$this->assign("Page", $page->show('Admin'));
		$this->assign("guestmsgs",$guestmsgs);
	}
	
}