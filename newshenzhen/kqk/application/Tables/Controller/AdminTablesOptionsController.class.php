<?php
namespace Tables\Controller;
use Common\Controller\AdminbaseController;
class AdminTablesOptionsController extends AdminbaseController {
	
	protected $tablesoptions_model;

	function _initialize() {
		parent::_initialize();
		$this->tablesoptions_model = D('Tables/TablesOptions');
	}

	function index(){
		if(IS_AJAX){
			$type = $_POST['type'];
			if($type == 0){
				$data = $this->tablesoptions_model->where('type = 0')->select();
			}else{
				$data = $this->tablesoptions_model->where('type = 1')->select();
			}
			die(json_encode($data));
		}
		
	}

	function add(){
		$this->display();
	}

	function add_post(){
		if(IS_AJAX){
			$data = array();
			$_POST['content'] = json_encode($_POST['content']);
			$result = $this->tablesoptions_model->add($_POST);
			if($result){
				$data['code'] = 1;
			}else{
				$data['code'] = 0;
			}
			$this->ajaxReturn($data);
		}

		
	}

	function copy(){
		if(IS_AJAX){
			$id = $_POST['id'];
			$data = $this->tablesoptions_model->where("id = $id")->find();
			die(json_encode($data));
		}
	}


	function delete(){
		if(IS_AJAX){
			$id = $_POST['id'];
			$data = $this->tablesoptions_model->where("id = $id")->delete();
			die(json_encode($data));
		}
	}

	function view(){
		if(IS_AJAX){
			$id = $_POST['id'];
			$data = $this->tablesoptions_model->where("id = $id")->getField('content');
			$data = json_decode($data,true);
			die(json_encode($data));
		}
	}

}