<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class ArticlecatController extends AdminbaseController{
	protected $ac_model;
	
	function _initialize() {
		parent::_initialize();
		$this->ac_model = D("Common/ArticleCat");
	}
	
	function index(){
		$ap_model=M(ArticlePat);
		$cat = $ap_model->where('cat_type=1')->select();
		$this->assign("cat",$cat);
		$this->display();
	}
	
	/**
     *  添加
     */
    public function add() {
    	$ap_model=M(ArticlePat);
		$map['cat_type']  = 1;
		$ap=$ap_model->where($map)->select();
		$this->assign("ap",$ap);
        $this->display();
    }
	
    /**
     *  添加
     */
    public function add_post() {
    	if (IS_POST) {
    		if ($this->ac_model->create()) {
    			if ($this->ac_model->add()!==false) {
    				$this->success("添加成功！", U("articlecat/index"));
    			} else {
    				$this->error("添加失败！");
    			}
    		} else {
    			$this->error($this->ac_model->getError());
    		}
    	}
    }
	function edit(){
		$id= intval(I("get.id"));
		$slidecat=$this->ac_model->where("cid=$id")->find();
		$this->assign($slidecat);
		$ap_model=M(ArticlePat);
		$map['cat_type']  = 1;
		$ap=$ap_model->where($map)->select();
		$this->assign("ap",$ap);
		$this->display();
	}
	
	function edit_post(){
		if (IS_POST) {
			if ($this->ac_model->create()) {
				if ($this->ac_model->save()!==false) {
					$this->success("保存成功！", U("articlecat/index"));
				} else {
					$this->error("保存失败！");
				}
			} else {
				$this->error($this->ac_model->getError());
			}
		}
	}
	
	
	function delete(){

		$id = intval(I("get.id"));
		if ($this->ac_model->delete($id)!==false) {
			$this->success("删除成功！");
		} else {
			$this->error("删除失败！");
		}
		
	}
	
	
}
?>