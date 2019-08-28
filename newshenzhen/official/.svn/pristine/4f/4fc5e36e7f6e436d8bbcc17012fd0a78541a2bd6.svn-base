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
class AdminDoctorController extends AdminbaseController {
	
	protected $doctor_model;
	protected $department_model;
	protected $department_relationships_model;
	
	function _initialize() {
		parent::_initialize();
		$this->doctor_model = D("Department/Doctor");
		$this->department_model = D("Department/Department");
		$this->department_relationships_model = D("Department/DepartmentRelationships");
	}
	function index(){
		$this->_lists();
		$this->_getTree();
		$this->display();
	}
	
	
	function add(){
		
		$user = sp_get_users(3);
		$this->assign('user',$user);
		
	 	$this->_getTermTree();
	 	$this->display();
	}
	
	function add_post(){
		//var_dump($_POST);exit;
		if (IS_POST) {
			
			if(empty($_POST['term'])){
				$this->error("请至少选择一个科室！");
			}
			
			$doctor = I('post.');
			$doctor['smeta']=json_encode($_POST['smeta']);
			$doctor['excerpt']=htmlspecialchars_decode($_POST['excerpt']);
			$doctor['content']=htmlspecialchars_decode($_POST['content']);
			$doctor['post_extend']=json_encode($_POST['extend']);
			foreach ($_POST['term'] as $k => $mterm_id){
				if($k == count($_POST['term'])-1){
					$te .= $mterm_id;
				}else{
					$te .= $mterm_id.',';
				}
			}
			$doctor['term_id'] = $te;
			//var_dump($doctor);exit;
			$result=$this->doctor_model->add($doctor);
			if ($result) {
				foreach ($_POST['term'] as $mterm_id){
					$this->department_relationships_model->add(array("department_id"=>intval($mterm_id),"doctor_id"=>$result));
				}
				$this->success("添加成功！",'index');
			} else {
				$this->error("添加失败！");
			}

		}
	}
	
	function edit(){
		
		$id=  intval(I("get.id"));
		
		$department_relationship = M('DepartmentRelationships')->where(array("doctor_id"=>$id,"status"=>1))->getField("department_id",true);
		$this->_getTermTree($department_relationship);
		$terms=$this->department_model->select();
		$post=$this->doctor_model->where("id=$id")->find();
		
		$user = sp_get_users(3);
		$this->assign('user',$user);
		
		$this->assign("post",$post);
		$this->assign("smeta",json_decode($post['smeta'],true));
		$this->assign("extend",json_decode($post['post_extend'],true));
		$this->assign("terms",$terms);
		$this->assign("term",$department_relationship);
		$this->display();
	}
	
	function edit_post(){
		//var_dump($_POST);exit;
		if (IS_POST) {
			
			if(empty($_POST['term'])){
				$this->error("请至少选择一个科室！");
			}
			$post_id=intval($_POST['id']);
			$this->department_relationships_model->where(array("doctor_id"=>$post_id,"department_id"=>array("not in",implode(",", $_POST['term']))))->delete();
			//echo $this->term_relationships_model->_sql();
			foreach ($_POST['term'] as $mterm_id){
				$find_term_relationship=$this->department_relationships_model->where(array("doctor_id"=>$post_id,"department_id"=>$mterm_id))->count();
				if(empty($find_term_relationship)){
					$this->department_relationships_model->add(array("department_id"=>intval($mterm_id),"doctor_id"=>$post_id));
				}else{
					$this->department_relationships_model->where(array("doctor_id"=>$post_id,"department_id"=>$mterm_id))->save(array("status"=>1));
				}
			}
			
			
			$doctor = I('post.');
			$doctor['smeta']=json_encode($_POST['smeta']);
			$doctor['excerpt']=htmlspecialchars_decode($_POST['excerpt']);
			$doctor['content']=htmlspecialchars_decode($_POST['content']);
			$doctor['post_extend']=json_encode($_POST['extend']);
			foreach ($_POST['term'] as $k => $mterm_id){
				if($k == count($_POST['term'])-1){
					$te .= $mterm_id;
				}else{
					$te .= $mterm_id.',';
				}
			}
			$doctor['term_id'] = $te;

			$result=$this->doctor_model->save($doctor);
			//echo $this->doctor_model->getLastSql();exit;
			if ($result) {
				$this->success("修改成功！");
			} else {
				$this->error("修改失败！");
			}
		}
	}
	

	function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data['post_status']=0;
			$data2['status']=0;
			if ($this->doctor_model->where("id=$id")->save($data)!==false) {
				if ($this->department_relationships_model->where("doctor_id=$id")->save($data2)) {
					$this->success("删除成功！");
				} else {
					$this->error("删除失败！");
				}
			} else {
				$this->error("删除失败！");
			}

			
		}
		if(isset($_POST['ids'])){
			$tids=join(",",$_POST['ids']);
			$data['post_status']=0;
			if ($this->doctor_model->where("id in ($tids)")->save($data)) {
				if ($this->department_relationships_model->where("doctor_id in ($tids)")->save($data2)) {
					$this->success("删除成功！");
				} else {
					$this->error("删除失败！");
				}
			} else {
				$this->error("删除失败！");
			}
		}
	}
	
	function check(){
		if(isset($_POST['ids']) && $_GET["check"]){
			$data["post_status"]=1;
			$ids=join(",",$_POST['ids']);
			if ( $this->doctor_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("审核成功！");
			} else {
				$this->error("审核失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["uncheck"]){
			$data["post_status"]=0;
			$ids=join(",",$_POST['ids']);
			if ( $this->doctor_model->where("id in ($ids)")->save($data)) {
				$this->success("取消审核成功！");
			} else {
				$this->error("取消审核失败！");
			}
		}
	}
	function top(){
		if(isset($_POST['ids']) && $_GET["top"]){
			$data["istop"]=1;
				
			$ids=join(",",$_POST['ids']);
			if ( $this->doctor_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("置顶成功！");
			} else {
				$this->error("置顶失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["untop"]){
				
			$data["istop"]=0;
			$ids=join(",",$_POST['ids']);
			if ( $this->doctor_model->where("id in ($ids)")->save($data)) {
				$this->success("取消置顶成功！");
			} else {
				$this->error("取消置顶失败！");
			}
		}
	}
	
	function recommend(){
		if(isset($_POST['ids']) && $_GET["recommend"]){
			$data["recommended"]=1;
			$ids=join(",",$_POST['ids']);
			if ( $this->doctor_model->where("id in ($ids)")->save($data)!==false) {
				$this->success("推荐成功！");
			} else {
				$this->error("推荐失败！");
			}
		}
		if(isset($_POST['ids']) && $_GET["unrecommend"]){
			$data["recommended"]=0;
			$ids=join(",",$_POST['ids']);
			if ( $this->doctor_model->where("id in ($ids)")->save($data)) {
				$this->success("取消推荐成功！");
			} else {
				$this->error("取消推荐失败！");
			}
		}
	}

	function move(){
		if(IS_POST){
			if(isset($_GET['ids']) && isset($_POST['term_id'])){
				$tids=$_GET['ids'];
				$depatment['department_id'] = $_POST['term_id'];
				if ( $this->doctor_model->where("id in ($tids)")->save($_POST) !== false and  $this->department_relationships_model->where("doctor_id in ($tids)")->save($depatment) !== false) {
					$this->success("移动成功！");
				} else {
					$this->error("移动失败！");
				}
			}
		}else{
			$parentid = intval(I("get.parent"));
			
			$tree = new \Tree();
			$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
			$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
			$terms = $this->department_model->order(array("path"=>"asc"))->select();
			$new_terms=array();
			foreach ($terms as $r) {
				$r['id']=$r['term_id'];
				$r['parentid']=$r['parent'];
				$new_terms[] = $r;
			}
			$tree->init($new_terms);
			$tree_tpl="<option value='\$id'>\$spacer\$name</option>";
			$tree=$tree->get_tree(0,$tree_tpl);
			 
			$this->assign("terms_tree",$tree);
			$this->display();
		}
	}
	
	function recyclebin(){
		$this->_lists(array('post_status'=>array('eq',0)));
		$this->_getTree();
		$this->display();
	}
	
	function clean(){
		if(isset($_POST['ids'])){
			$ids = implode(",", $_POST['ids']);
			$status=$this->doctor_model->where("id in ($ids)")->delete();
			if ($status!==false) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}else{
			if(isset($_GET['id'])){
				$id = intval(I("get.id"));
				$status=$this->doctor_model->where(array("id"=>$id))->delete();
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
			$data["isdel"]=1;
			if ($this->doctor_model->where("id=$id")->save($data)) {
				$this->success("还原成功！");
			} else {
				$this->error("还原失败！");
			}
		}
	}
	
	
	//排序
	public function listorders() {
		$status = parent::_listorders($this->doctor_model);
		if ($status) {
			$this->success("排序更新成功！");
		} else {
			$this->error("排序更新失败！");
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
		
		$start_time=I('request.start_time');
		if(!empty($start_time)){
		    $where['post_date']=array(
		        array('EGT',$start_time)
		    );
		}
		
		$end_time=I('request.end_time');
		if(!empty($end_time)){
		    if(empty($where['post_date'])){
		        $where['post_date']=array();
		    }
		    array_push($where['post_date'], array('ELT',$end_time));
		}
		
		$keyword=I('request.keyword');
		if(!empty($keyword)){
		    $where['name']=array('like',"%$keyword%");
		}

		$where['post_status'] = 1;
			
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
		    $this->doctor_model->field('a.*');
		}else{
		    $this->doctor_model->field('a.*,b.tid');
		    $this->doctor_model->join("__DEPARTMENT_RELATIONSHIPS__ b ON a.id = b.doctor_id");
		}
		$posts=$this->doctor_model->select();
		$terms = $this->department_model->order(array("term_id = $term_id"))->getField("term_id,name",true);
		
		$this->assign("page", $page->show('Admin'));
		$this->assign("formget",array_merge($_GET,$_POST));
		$this->assign("posts",$posts);
		$this->assign("terms",$terms);
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

	private function _getTermTree($term=array()){
		$result = $this->department_model->order(array("listorder"=>"asc"))->select();
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("AdminExTerm/add", array("parent" => $r['term_id'])) . '">添加子类</a> | <a href="' . U("AdminExTerm/edit", array("id" => $r['term_id'])) . '">修改</a> | <a class="js-ajax-delete" href="' . U("AdminExTerm/delete", array("id" => $r['term_id'])) . '">删除</a> ';
			$r['visit'] = "<a href='#'>访问</a>";
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['term_id'];
			$r['parentid']=$r['parent'];
			$r['selected']=in_array($r['term_id'], $term)?"selected":"";
			$r['checked'] =in_array($r['term_id'], $term)?"checked":"";
			$array[] = $r;
		}
		
		$tree->init($array);
		$str="<option value='\$id' id='meau\$id' \$selected>\$spacer\$name</option>";
		$taxonomys = $tree->get_tree(0, $str);
		//var_dump($taxonomys);exit;
		$this->assign("taxonomys", $taxonomys);
	}
	
	
	
	
	
}