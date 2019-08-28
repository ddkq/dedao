<?php
namespace Award\Controller;
use Common\Controller\AppframeController;
class AwardController extends AppframeController {

	protected $total;
	protected $acquiesce;
	protected $award_settings;
	protected $options_model;

	function _initialize() {
		parent::_initialize();
		$this->options_model = M("Options");
		$this->award_settings = sp_get_option('award_settings');
		$this->total = $this->award_settings['award_total'];
		$this->acquiesce = explode(',',$this->award_settings['award_setting']);
		foreach ($this->acquiesce as $key => $value) {
			$this->acquiesce[$key] = intval($value);
		}
	}

	public function total(){
		$this->ajaxReturns($this->total);
	}

	public function acquiesce(){
		$acquiesce = $this->acquiesce;
		shuffle($acquiesce);
		$this->ajaxReturns($acquiesce);
	}

	public function lottery(){
		//是否新一次抽奖
		$reset = I('reset',0);
		//一次返回多少个数字
		$count = I('count',4);
		//是否内定
		$default = I('default',0);

		if($reset){
			$setting = $this->award_settings;
			$setting['award_having'] = $this->acquiesce;
			$setting['award_having2'] = '';
			$cmf_settings['option_value']=json_encode($setting);
			$this->options_model->where("option_name='award_settings'")->save($cmf_settings);
		}

		$num = $this->unique_rand($count,$default);
		$this->ajaxReturns($num);
	}
	
	private function unique_rand($num = 4,$default = 0){
	    $count = 0;
	    $return_arr = array();
	    while($count < $num){
	    	$return_arr[] = $this->get_num($default);
	        $count = count($return_arr);
	    }
	    array_unique(shuffle($return_arr));
	    return $return_arr;
	}

	private function get_num($default = 0){

		$award_settings = sp_get_option('award_settings');
		$total = $award_settings['award_total'];

		if(empty($award_settings['award_having'])){
			$acquiesce = $this->acquiesce;
		}else{
			$acquiesce = $award_settings['award_having'];
		}

		if(empty($award_settings['award_having2'])){
			$acquiesce2 = [];
		}else{
			$acquiesce2 = $award_settings['award_having2'];
		}
		
		if(count($acquiesce) >= $this->total){
			$this->ajaxReturns(['code'=>0,'info'=>'抽奖已结束']);
		}
		if(count($acquiesce) >= $this->total-2){
			$this->ajaxReturns(['code'=>0,'info'=>'抽奖已结束']);
		}


		$num = mt_rand(1,$total);
		if($num == 4 || $num == 44){
			return $num = $this->get_num();
		}

		if($default){
			$count = count($acquiesce2);
			if($count == count($this->acquiesce)){
				return $num = $this->get_num();
			}else{
				foreach ($this->acquiesce as $value) {
					if(in_array($value,$acquiesce) && in_array($value,$acquiesce2) ){
						//return $num = $this->get_num($default = 1);
						continue;
					}
					array_push($acquiesce2,$value);
					$setting = $award_settings;
					$setting['award_having2'] = $acquiesce2;
					$cmf_settings['option_value']=json_encode($setting);
					$result = $this->options_model->where("option_name='award_settings'")->save($cmf_settings);
					return $value;
				}	
			}
		}else{
			if(in_array($num, $acquiesce)){
				return $num = $this->get_num();
			}
			array_push($acquiesce,$num);
			$setting = $award_settings;
			$setting['award_having'] = $acquiesce;
			$cmf_settings['option_value']=json_encode($setting);
			$result = $this->options_model->where("option_name='award_settings'")->save($cmf_settings);
			return $num;	
		}
	}

}