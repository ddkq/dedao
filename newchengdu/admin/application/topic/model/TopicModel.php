<?php
namespace app\topic\model;
use app\common\model\BaseModel;

/**
* 专题模型
*/
class TopicModel extends BaseModel{
	
	protected $table = 'cmf_topic';

	protected $autoWriteTimestamp = true;
	protected $updateTime = false;


	public function topicList($param){

		$where = [];
		$where['delete_time'] = 0;
		if(!empty($param['start_time']) && !empty($param['end_time']) ){
			$where['create_time'] = [['>=',strtotime($param['start_time'])],['<=',strtotime($param['end_time'])+86400]];
		}
		if(!empty($param['keyword'])){
			$where['topic_title'] = ['like','%'.$param['keyword'].'%'];
		}

		$lists = $this->where($where)->order('create_time desc')->paginate(10);

		return $lists;
	}
}