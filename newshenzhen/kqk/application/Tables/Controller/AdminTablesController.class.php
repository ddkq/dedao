<?php
namespace Tables\Controller;
use Common\Controller\AdminbaseController;
class AdminTablesController extends AdminbaseController {

	protected $tables_model;
	protected $tablesoptions_model;
	protected $tablesdata_model;

	
	function _initialize() {
		parent::_initialize();
		$this->tables_model = D('Tables/Tables');
		$this->tablesoptions_model = D('Tables/TablesOptions');
		$this->tablesdata_model = D('Tables/TablesData');
	}

	function index(){
		$this->_lists();
		$this->display();
	}

	function add(){
		$single = $this->tablesoptions_model->where('type = 0')->select();
		$multiple = $this->tablesoptions_model->where('type = 1')->select();
		$this->assign('single',$single);
		$this->assign('multiple',$multiple);
		$this->display();
	}

	function add_post(){
		//var_dump($_POST);exit;
		if(IS_POST){

			$data['name'] = $_POST['name'];
			$data['name_bytable'] = pinyin($_POST['name']);
			$data['content'] = json_encode($_POST['content']);
			$data['createtime'] = date ('Y-m-d H:i:s');

			if($this->tables_model->create()){
				$result = $this->tables_model->add($data);
				if($result){
					$this->success("添加成功！");
				}else{
					$this->error('添加失败！');
				}
			}
		}
	}

	function edit(){
		$id = intval(I("get.id"));
		$post = $this->tables_model->where("id = $id")->find();
		$content = json_decode($post['content'],true);
		$submit = array_pop($content);
		$this->assign('id',$id);
		$this->assign("post",$post);
		$this->assign('content',$content);
		$this->assign('submit',$submit);

		$options = $this->tablesoptions_model->select();
		$this->assign('options',$options);

		$this->display();
	}

	function edit_post(){
		if(IS_POST){

			$id = $_POST['id'];
			$data['name'] = $_POST['name'];
			$data['content'] = json_encode($_POST['content']);

			$result=$this->tables_model->where("id = $id")->save($data);
			if ($result!==false) {
				$this->success("保存成功！");
			} else {
				$this->error("保存失败！");
			}
		}
	}

	function delete(){
		if(isset($_GET['id'])){
			$id = intval(I("get.id"));
			$data['status'] = 0;
			if ($this->tables_model->where("id = $id")->save($data)) {
				$this->success("删除成功！");
			} else {
				$this->error("删除失败！");
			}
		}
	}

	function copy(){
		if(isset($_GET['id'])){
			$id = intval(I('get.id'));
			$data = $this->tables_model->where('id = $id')->find();
			unset($data['id']);
			$data['name'] = $data['name'].'1';
			$data['content'] = json_encode($data['content']);
			if ($this->tables_model->add($data)) {
				$this->success("复制成功！");
			} else {
				$this->error("复制失败！");
			}
		}
	}

	function view(){
		$id = intval(I('id'));
		$data = $this->tables_model->where("id = $id")->find();

		$content = json_decode($data['content'],true);
		array_pop($content);
		$this->assign('content',$content);
		$this->assign('id',$id);
			
		$count=$this->tablesdata_model->where("tables_id = $id")->count();
			
		$page = $this->page($count, 20);
			
		$posts=$this->tablesdata_model->where("tables_id = $id")
		->limit($page->firstRow . ',' . $page->listRows)
		->order("createtime DESC")->select();

		//var_dump($posts);exit;

		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);

		$this->display();
	}



	private  function _lists(){

		if(!empty($_REQUEST['status'])){
			$status = $_REQUEST['status'];
		}else{
			$status = 1;
		}

		$where_ands=array("status=$status");
		
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
			
		$count=$this->tables_model
		->where($where)
		->count();
			
		$page = $this->page($count, 20);
			
			
		$posts=$this->tables_model
		->where($where)
		->limit($page->firstRow . ',' . $page->listRows)
		->order("createtime DESC")->relation(true)->select();

		/*foreach ($posts as $key => $value) {
			$posts[$key]['data_num'] = $child_model->count();
			$posts[$key]['last_time'] = $child_model->order('createtime desc')->getField('createtime');
		}*/

		//var_dump($posts);exit;

		$this->assign("Page", $page->show('Admin'));
		$this->assign("current_page",$page->GetCurrentPage());
		unset($_GET[C('VAR_URL_PARAMS')]);
		$this->assign("formget",$_GET);
		$this->assign("posts",$posts);
	}



}