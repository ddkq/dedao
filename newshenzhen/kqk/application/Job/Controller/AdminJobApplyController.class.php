<?php
namespace Job\Controller;
use Common\Controller\AdminbaseController;
class AdminJobApplyController extends AdminbaseController {

	protected $job_model;
	protected $job_apply_model;
	public function _initialize(){
		parent::_initialize();
		$this->job_model = D("Job/Job");
		$this->job_apply_model = D("Job/JobApply");
	}

	public function index(){
		$this->_lists();
		$this->_getTree();
		$this->display();
	}


	public function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$result=$this->job_apply_model->where(array("id" => $id))->delete();
			if ($result) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
		if(isset($_POST['ids'])){
			$tids=join(",",$_POST['ids']);
			$result=$this->job_apply_model->where("id in ($tids)")->delete();
			if ($result) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}


	private  function _lists($status=1){
		$job_id=0;
		if(!empty($_REQUEST["job"])){
			$job_id=intval($_REQUEST["job"]);
			$job=$this->job_model->where("job_id=$job_id")->find();
			$this->assign("job",$job);
			$_GET['job']=$job_id;
		}
		
		$where_ands=empty($job_id)?'':array("a.job_id = $job_id");
		
		$fields=array(
				'start_time'=> array("field"=>"createtime","operator"=>">"),
				'end_time'  => array("field"=>"createtime","operator"=>"<"),
				'keyword'  => array("field"=>"name","operator"=>"like"),
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
			
		$count=$this->job_apply_model
		->alias("a")
		->where($where)
		->count();
			
		$page = $this->page($count, 20);
			
			
		$posts=$this->job_apply_model
		->alias("a")
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->relation(true)
		->order("a.createtime DESC")->select();
		//var_dump($posts);exit;

		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
	}
	
	private function _getTree(){
		$job_id=empty($_REQUEST['job'])?0:intval($_REQUEST['job']);
		$result = $this->job_model->order(array("listorder"=>"asc"))->select();
		
		$tree = new \Tree();
		$tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
		$tree->nbsp = '&nbsp;&nbsp;&nbsp;';
		foreach ($result as $r) {
			$r['str_manage'] = '<a href="' . U("AdminJob/add", array("parent" => $r['job_id'])) . '">添加子类</a> | <a href="' . U("AdminJob/edit", array("id" => $r['job_id'])) . '">修改</a> | <a class="js-ajax-delete" href="' . U("AdminJob/delete", array("id" => $r['job_id'])) . '">删除</a> ';
			$r['visit'] = "<a href='#'>访问</a>";
			$r['taxonomys'] = $this->taxonomys[$r['taxonomy']];
			$r['id']=$r['job_id'];
			$r['parentid']=$r['parent'];
			$r['selected']=$job_id==$r['job_id']?"selected":"";
			$array[] = $r;
		}
		
		$tree->init($array);
		$str="<option value='\$id' \$selected>\$spacer\$name</option>";
		$taxonomys = $tree->get_tree(0, $str);
		$this->assign("taxonomys", $taxonomys);
	}


}