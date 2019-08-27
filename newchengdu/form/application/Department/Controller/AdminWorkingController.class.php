<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Tuolaji <479923197@qq.com>
// +----------------------------------------------------------------------
namespace Department\Controller;
use Common\Controller\AdminbaseController;
class AdminWorkingController extends AdminbaseController {
	
	protected $doctor_model;
	protected $department_model;
	protected $working_model;
	
	function _initialize() {
		parent::_initialize();
		$this->doctor_model = D("Department/Doctor");
		$this->department_model = D("Department/Department");
		$this->working_model = D("Department/Working");
	}
	function index(){
		$this->_lists();
		$this->_getTree();
		$this->display();
	}
	
	
	
	function edit(){
		$id = intval(I("get.id"));
		
		$terms = $this->department_model->getField("term_id,name",true);
		$post=$this->doctor_model->where("id=$id")->find();
		$working = $this->working_model->where("doctor_id = $id")->getField("working_id",true);
		
		$this->assign("working",$working);
		$this->assign("terms",$terms);
		$this->assign("post",$post);

		$this->display();
	}
	
	function edit_post(){
		//var_dump($_POST);exit;
		if (IS_POST) {
			$time = I('post.');
			$did = $time['id'];
			$this->working_model->where(array("doctor_id"=>$did))->delete();
			
			$term_ids = explode(",",$time['term_id']);
			foreach($term_ids as $i){
				foreach($time['time'] as $k=>$j){
					$this->working_model->add(array("doctor_id"=>$did,"department_id"=>$i,"working_id"=>$j));
				}
			}
			foreach($time['time'] as $k=>$j){
				if($k == count($time['time'])-1){
					$working_time .= $j;
				}else{
					$working_time .= $j.',';
				}
			}
			$doctor['id'] = $did;
			$doctor['working_time'] = $working_time;
			$result=$this->doctor_model->save($doctor);
			//$this->doctor_model->getLastSql();
			if ($result) {
				$this->success("修改成功！");
			} else {
				$this->error("修改失败！");
			}
		}
	}
	


	
	private function _lists($where=array()){
		$term_id=I('request.term',0,'intval');
		
		$where['post_type']=array(array('eq',1),array('exp','IS NULL'),'OR');
		
		if(!empty($term_id)){
		    $where['b.department_id']=$term_id;
			$term=$this->department_model->where(array('term_id'=>$term_id))->find();
			$this->assign("term",$term);
		}
			
		$this->doctor_model
		->alias("a")
		->where($where);
		
		if(!empty($term_id)){
		    $this->doctor_model->join("__DEPARTMENT_RELATIONSHIPS__ b ON a.id = b.doctor_id");
		}
		
		$count=$this->doctor_model->count();
			
		$page = $this->page($count, 20);
			
		$this->doctor_model
		->alias("a")
		->where($where)
		->limit($page->firstRow , $page->listRows)
		->order("a.post_date DESC");
		if(empty($term_id)){
		    $this->doctor_model->field('a.id,a.name,a.working_time');
		}else{
		    $this->doctor_model->field('a.id,a.name,a.working_time,b.listorder,b.tid');
		    $this->doctor_model->join("__DEPARTMENT_RELATIONSHIPS__ b ON a.id = b.doctor_id");
		}
		$posts=$this->doctor_model->select();
		$terms = $this->department_model->order(array("term_id = $term_id"))->getField("term_id,name",true);

		$this->assign("page", $page->show('Admin'));
		$this->assign("formget",array_merge($_GET,$_POST));
		$this->assign("posts",$posts);
		$this->assign("terms",$terms);
		$this->assign("working_time",get_working_time());
	}
	
	private function _getTree(){
		$term_id=empty($_REQUEST['term'])?0:intval($_REQUEST['term']);
		$result = $this->department_model->order(array("listorder"=>"asc"))->select();
		
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("AdminTerm/add", array("parent" => $r['term_id'])) . '">添加子类</a> | <a href="' . U("AdminTerm/edit", array("id" => $r['term_id'])) . '">修改</a> | <a class="js-ajax-delete" href="' . U("AdminTerm/delete", array("id" => $r['term_id'])) . '">删除</a> ';
			$r['visit'] = "<a href='#'>访问</a>";
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['term_id'];
			$r['parentid']=$r['parent'];
			$r['selected']=$term_id==$r['term_id']?"selected":"";
			$array[] = $r;
		}
		
		$tree->init($array);
		$str="<option value='\$id' \$selected>\$spacer\$name</option>";
		$taxonomys = $tree->get_tree(0, $str);
		$this->assign("taxonomys", $taxonomys);
	}
	
}