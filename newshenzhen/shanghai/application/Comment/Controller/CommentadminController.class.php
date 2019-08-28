<?php
namespace Comment\Controller;
use Common\Controller\AdminbaseController;
class CommentadminController extends AdminbaseController{
	
	protected $comments_model;
	
	function _initialize(){
		parent::_initialize();
		$this->comments_model=D("Common/Comments");
	}

	function index(){
		if(!empty($_GET['post_table'])){
			$table = $_GET['post_table'];
		}else{
			$table = 'posts';
		}
		$this->_lists(1,$table);
		$this->display(":index");
	}

	function add(){

		$rs= M("TermRelationships");
		$join = "".C('DB_PREFIX').'posts as b on a.object_id =b.id';

		$all_posts = $rs->alias("a")->join($join)->where("status = 1")->order("a.tid asc")->field('tid,object_id,post_title')->select();
		$this->assign("all_posts",$all_posts);
		$this->display(":add");
	}

	function add_post(){
		//var_dump($_POST);exit;
		$result = $this->comments_model->add($_POST);
		if($result){
			$this->success("提交成功！");
		}else{
			$this->error("提交失败！");
		}
	}

	function serach_article(){
		if(IS_AJAX){
			$title = $_POST['title'];
			//var_dump($title);exit;
			$rs= M("TermRelationships");
			$join = "".C('DB_PREFIX').'posts as b on a.object_id =b.id';

			$where['post_title'] = array('like',htmlspecialchars("%$title%"));
			$where['status'] = 1;
			$posts = $rs->alias('a')->join($join)->where($where)->field('post_title,id,tid')->select();
			//var_dump($rs->getLastSql());exit;
			$this->ajaxReturns($posts,"JSON");
		}
	}



	
	function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data['isde']=0;
			if ($this->comments_model->where("id=$id")->save($data)!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		if(isset($_POST['ids'])){
			$ids=join(",",$_POST['ids']);
			$data['isde']=0;
			if ($this->comments_model->where("id in ($ids)")->save($data)!==false) {
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
			
			if ( $this->comments_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("审核成功！");
			} else {
				$this->error("审核失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["uncheck"]){
				
			$data["status"]=0;
			$ids=join(",",$_POST['ids']);
			if ( $this->comments_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("取消审核成功！");
			} else {
				$this->error("取消审核失败！");
			}
		}
	}
	
	function recyclebin(){
		$this->_lists(0);
		$this->display(":recyclebin");
	}
	
	
	function clean(){
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$status=$this->comments_model->where("id in ($ids)")->delete();
			if ($status!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_GET['id'])){
				$id = intval(I("get.id"));
				$status=$this->comments_model->where(array("id"=>$id))->delete();
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
			$data['isde']=1;
			if ($this->comments_model->where(array("id"=>$id))->save($data)) {
				$this->success("还原成功！");
			} else {
				$this->error("还原失败！");
			}
		}
	}
	
	private function _lists($status=1,$table){

		$where_ands=array("isde=$status","post_table='$table'");
		
		$fields=array(
				'start_time'=> array("field"=>"createtime","operator"=>">"),
				'end_time'  => array("field"=>"createtime","operator"=>"<"),
				'keyword'  => array("field"=>"content","operator"=>"like"),
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
		$count=$this->comments_model->where($where)->count();
		$page = $this->page($count, 20);
		$comments=$this->comments_model
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("createtime DESC")
		->select();
		$this->assign("comments",$comments);
		$this->assign("Page", $page->show('Admin'));
	}
	
	
}