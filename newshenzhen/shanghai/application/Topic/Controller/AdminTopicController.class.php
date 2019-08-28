<?php
namespace Topic\Controller;
use Common\Controller\AdminbaseController;

class AdminTopicController extends AdminbaseController {

	protected $zt_model;

	
	function _initialize() {
		parent::_initialize();
		$this->zt_model = M('Topic');
	}

	function index(){
		$this->_lists();
		$this->display();
	}

	private  function _lists(){

		$where_ands = [];
		$fields=array(
				'start_time'=> array("field"=>"create_time","operator"=>">"),
				'end_time'  => array("field"=>"create_time","operator"=>"<"),
				'keyword'  => array("field"=>"topic_title","operator"=>"like"),
		);
		if(IS_POST){
			foreach ($fields as $param =>$val){
				if (isset($_POST[$param]) && !empty($_POST[$param])) {
					$operator=$val['operator'];
					$field   =$val['field'];
					$get=$_POST[$param];
					$_GET[$param]=$get;

					if($field == "create_time"){
						$get = strtotime($get);
					}
					if($operator=="like"){
						$get="%$get%";
					}
					array_push($where_ands, "$field $operator '$get'");
				}
			}
		}
		$where= join(" and ", $where_ands);
			
		$count=$this->zt_model
		->where($where)
		->count();
			
		$page = $this->page($count, 20);
			
			
		$posts=$this->zt_model
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("create_time DESC")->select();

		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
	}


}