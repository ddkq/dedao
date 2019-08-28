<?php
namespace Award\Controller;
use Common\Controller\AdminbaseController;
class AdminawardController extends AdminbaseController {


	public function set(){
		$award_settings = sp_get_option('award_settings');
		$this->assign('award_settings',$award_settings);
		$this->display();
	}


	public function set_post(){
	    if(IS_POST){
	    	$setting = I('post.');
	    	$options_model=M("Options");
	    	$cmf_settings['option_value']=json_encode($setting);
			$result = $options_model->where("option_name='award_settings'")->save($cmf_settings);
	        if($result!==false){
	            $this->success('保存成功！');
	        }else{
	            $this->error('保存失败！');
	        }
	    }
	}






}