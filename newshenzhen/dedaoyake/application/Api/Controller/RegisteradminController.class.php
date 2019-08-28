<?php
namespace Api\Controller;
use Common\Controller\AdminbaseController;
class RegisteradminController extends AdminbaseController{
	
	protected $register_model;
	
	function _initialize() {
		parent::_initialize();
		$this->register_model=D("Common/Register");
	}
	
	function index(){
		$this->_lists();
		$this->display();
	}
	
	function edit(){
		$id=intval(I("get.id"));
		$msg['register'] = 1;
		$result=$this->register_model->where('id='.$id.'')->save($msg);
		if ($result!==false) {
			$this->success("保存成功！");
		} else {
			$this->error("保存失败！");
		}	
	}
	

	function delete(){
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$data['status']=0;
			$status=$this->register_model->where("id in ($ids)")->save($data);
			if ($status!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			$id=intval(I("get.id"));
			$data['status']=0;
			if ($this->register_model->where(array("id"=>$id))->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}
	
	function check(){
		$id=intval(I("get.id"));
		$result=$this->register_model->where('id='.$id.'')->find();
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
			$status=$this->register_model->where("id in ($ids)")->delete();
			if ($status!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_GET['id'])){
				$id = intval(I("get.id"));
				$status=$this->register_model->where(array("id"=>$id))->delete();
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
			if ($this->register_model->where(array("id"=>$id))->save($data)) {
				$this->success("还原成功！");
			} else {
				$this->error("还原失败！");
			}
		}
	}
	
	
	private function _lists($status=1){

		$where_ands=array("a.status=$status");
		
		$fields=array(
				'start_time'=> array("field"=>"a.createtime","operator"=>">"),
				'end_time'  => array("field"=>"a.createtime","operator"=>"<"),
				'keyword'  => array("field"=>"a.name","operator"=>"like"),
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
		
		$count=$this->register_model->alias("a")->where($where)->count();
		$page = $this->page($count, 20);
		
		$join = "".C('DB_PREFIX').'doctor as b on a.doctor =b.id';
		$join1 = "".C('DB_PREFIX').'department as c on a.department =c.term_id';
		$field = "a.id,a.name as r_name,a.gender,a.tel,a.time,a.sick,a.content,a.status,a.register,b.name as d_name,c.name as t_name";
		
		$register=$this->register_model->alias("a")->join($join)->join($join1)->field($field)->where($where)->order(array("createtime"=>"DESC"))->limit($page->firstRow . ',' . $page->listRows)->select();
		$this->assign("Page", $page->show('Admin'));
		$this->assign("register",$register);
	}
	
}