<?php
namespace Job\Controller;
use Common\Controller\AdminbaseController;
class AdminJobWelfareController extends AdminbaseController {
	protected $job_welfare_model;
	public function _initialize(){
		parent::_initialize();
		$this->job_welfare_model = D("Job/JobWelfare");
	}

	public function index(){
		$post = $this->job_welfare_model->select();
		$this->assign('post',$post);
		$this->display();
	}

	public function add(){
		$this->display();
	}

	public function add_post(){
		if (IS_POST) {
			if ($this->job_welfare_model->create()) {
				if ($this->job_welfare_model->add()!==false) {
					$this->success("添加成功！",U("AdminJobWelfare/index"));
				} else {
					$this->error("添加失败！");
				}
			} else {
				$this->error($this->job_welfare_model->getError());
			}
		}
	}

	public function edit(){
		$id = intval(I("get.id"));
		$data=$this->job_welfare_model->where(array("id" => $id))->find();
		$this->assign("data",$data);
		$this->display();
	}

	public function edit_post(){
		if (IS_POST) {
			if ($this->job_welfare_model->create()) {
				if ($this->job_welfare_model->save()!==false) {
					$this->success("修改成功！");
				} else {
					$this->error("修改失败！");
				}
			} else {
				$this->error($this->job_welfare_model->getError());
			}
		}
	}

	public function delete(){
		$id = intval(I("get.id"));
		$result=$this->job_welfare_model->where(array("id" => $id))->delete();
		if($result){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}


}