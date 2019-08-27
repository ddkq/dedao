<?php
namespace app\qa\model;
use app\common\model\BaseModel;

/**
* 回答模型
*/
class AnswerModel extends BaseModel{
	
	protected $table = 'cmf_answer';

	protected $type = [
		'content'	=>	'json',
	];

	public function answerList($question_id){
		
		$where['a.question_id'] = $question_id;
		$where['a.delete_time'] = 0;

		$join = [
			['cmf_doctor d','d.id = a.doctor_id'],
		];

		$answers = $this->alias('a')->join($join)->where($where)->field('a.*,d.doctor_name')->find();
		return $answers;
	}


}