<?php
namespace Api\Controller;
use Common\Controller\AppframeController;
class RegisteredController extends AppframeController{
	
	protected $register_model;
	
	public function _initialize() {
		parent::_initialize();
		$this->register_model=D("Common/Register");
	}
	
	public function index(){
		
	}
	
	public function register(){
		//var_dump($_POST);exit;
		if (IS_AJAX) {
			$data = array();
			if ($this->register_model->create()) {
				$result=$this->register_model->add();
				if ($result!==false) {
					$data['status'] = 1;
					$data['info'] = '预约成功！';
					die(json_encode($data));
				} else {
					$data['status'] = 0;
					$data['info'] = '预约失败，清稍后重试！！';
					die(json_encode($data));
				}
			}else{
				$this->error($this->register_model->getError());
			}
		}
	}
	
}