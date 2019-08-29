<?php
namespace Job\Controller;
use Common\Controller\HomebaseController;
class JobController extends HomebaseController {

	protected $job_model;
	protected $job_post_model;
	protected $job_contact_model;

	public function _initialize(){
		parent::_initialize();
		$this->job_model = D("Job/Job");
		$this->job_post_model = D("Job/JobPost");
		$this->job_welfare_model = D("Job/JobWelfare");
		$this->job_contact_model = D("Job/JobContact");
		$this->job_welfare_relationships_model = D('Job/JobWelfareRelationships');
	}


	public function index(){
		$id=intval($_GET['id']);
		$phone = sp_is_mobile();
		$all_job = $this->job_model->where('status = 1')->select();
		$this->assign('all_job',$all_job);

		$job = $this->job_model->where("job_id = $id")->find();
		$this->assign('job',$job);

		$job_post = $this->job_post_model->where("job_id = $id")->find();

		if($job_post['validity_data'] < time()){
			$this->display(":404");
		}else{
			$job_info = json_decode($job_post['info'],true);
			$this->assign('job_post',$job_post);
			$this->assign('job_info',$job_info);

			$job_contact = $this->job_contact_model->where("id",$job_post['contact'])->getField('email');
			$this->assign('job_contact',$job_contact);

			if($phone == 1){
		    	$tplname=$job["pone_tpl"];
	    	}else{
	    		$tplname=$job["one_tpl"];
	    	}
	    	$tplname=sp_get_apphome_tpl($tplname, "article");
	    	
	    	$this->display(":$tplname");
		}
		


	}

}