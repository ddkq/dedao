<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Tuolaji <479923197@qq.com>
// +----------------------------------------------------------------------
namespace Goods\Controller;
use Common\Controller\AdminbaseController;
class AdminGroupController extends AdminbaseController {
	
	protected $group_model;

	
	function _initialize() {
		parent::_initialize();
		$this->group_model = D("Goods/Group");
	}
	function index(){
		$this->_lists();
		$this->display();
	}
	
	
	function check(){
		$id=intval(I("get.id"));
		$post=$this->group_model->where("goods_id=$id and user_type=0 and status=1")->find();
		$other = $this->group_model->where("goods_id=$id and user_type=1 and status=1")->select();
		$this->assign("post",$post);
		$this->assign("other",$other);

		$this->display();
	}
	
	
	

	function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data['status']=0;
			if ($this->group_model->where("group_id=".$id)->save($data)!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}	
		}
		if(isset($_POST['ids'])){
			$tids=join(",",$_POST['ids']);
			$data['status']=0;
			if ($this->group_model->where("group_id in ($tids)")->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
	
	
	
	function recyclebin(){
		$this->_lists(0);
		$this->_getTree();
		$this->display();
	}
	
	function clean(){
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$status=$this->ex_model->where("good_id in ($ids)")->delete();
			if ($status!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_GET['id'])){
				$id = intval(I("get.id"));
				$status=$this->ex_model->where(array("good_id"=>$id))->delete();
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
			$data["good_status"]=1;
			if ($this->ex_model->where("good_id=$id")->save($data)) {
				$this->success("还原成功！");
			} else {
				$this->error("还原失败！");
			}
		}
	}
	
	
	private  function _lists($status=1){
		$where = array();
		$where['user_type'] = 0;
		$where['status'] = $status;

			
		$count=$this->group_model
		->where($where)
		->count();

		$page = $this->page($count, 20);
			
			
		$posts=$this->group_model
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("group_id DESC")->select();
		//echo $posts->_sql();exit;
		//var_dump($posts);exit;
		
		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
	}
	

	
	
	
	
	
}