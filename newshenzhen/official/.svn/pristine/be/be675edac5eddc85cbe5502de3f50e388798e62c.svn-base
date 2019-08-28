<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class TplController extends AdminbaseController{
	protected $tpl_model;
	
	function _initialize() {
		parent::_initialize();
		$this->tpl_model = D("Common/Tpl");
	}
	
	function index(){
		$tpl=$this->tpl_model->select();
		$this->assign("tpl",$tpl);
		$this->display();
	}
	
	function add(){
		$this->display();
	}
	
	function add_post(){
		if(IS_POST){
			if ($this->tpl_model->create()){
				if ($this->tpl_model->add()!==false) {
					$this->success(L('ADD_SUCCESS'), U("tpl/index"));
				} else {
					$this->error(L('ADD_FAILED'));
				}
			} else {
				$this->error($this->tpl_model->getError());
			}
		
		}
	}
	
	function edit(){
		$id=I("get.id");
		$ad=$this->tpl_model->where("id=$id")->find();
		$this->assign($ad);
		$this->display();
	}
	
	function edit_post(){
		if (IS_POST) {
			if ($this->tpl_model->create()) {
				if ($this->tpl_model->save()!==false) {
					$this->success("保存成功！", U("tpl/index"));
				} else {
					$this->error("保存失败！");
				}
			} else {
				$this->error($this->tpl_model->getError());
			}
		}
	}
	
	/**
	 *  删除
	 */
	function delete(){
		$id = I("get.id",0,"intval");
		if ($this->tpl_model->delete($id)!==false) {
			$this->success("删除成功！");
		} else {
			$this->error("删除失败！");
		}
	}
	
	
	
	
	
	
}