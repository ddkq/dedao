<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class MessageadminController extends AdminbaseController{
	public function __construct(){
		parent::__construct();
	}
	protected $Messages_model;
	
	function _initialize(){
		parent::_initialize();
		$this->Messages_model=D("Common/Message");
	}

	function index(){
		
		$where=array();
		if(!empty($table)){
			$where['post_table']=$table;
		}
		
		$post_id=I("get.post_id");
		if(!empty($post_id)){
			$where['post_id']=$post_id;
		}
		$count=$this->Messages_model->where($where)->count();
		$page = $this->page($count, 20);
		$messages=$this->Messages_model
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("createtime DESC")
		->select();
		//var_dump($messages);
		$this->assign("messages",$messages);
		$this->assign("Page", $page->show('Admin'));
		$this->display();
	}
	function handle(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data['handle'] = 1;
			if ($this->Messages_model->where("id=$id")->save($data)!==false) {
				$this->success("处理成功！");
			} else {
				$this->error("处理失败！");
			}
		}
	}
	
	
	function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			if ($this->Messages_model->where("id=$id")->delete()!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		if(isset($_POST['ids'])){
			$ids=join(",",$_POST['ids']);
			if ($this->Messages_model->where("id in ($ids)")->delete()!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
	
	function check(){
		if(isset($_POST['ids']) && $_GET["check"]){
			$data["status"]=1;
				
			$ids=join(",",$_POST['ids']);
			
			if ( $this->Messages_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("审核成功！");
			} else {
				$this->error("审核失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["uncheck"]){
				
			$data["status"]=0;
			$ids=join(",",$_POST['ids']);
			if ( $this->Messages_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("取消审核成功！");
			} else {
				$this->error("取消审核失败！");
			}
		}
	}
	
}