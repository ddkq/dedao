<?php
namespace app\admin\model;
use app\common\model\BaseModel;

/**
* 回收站模型
*/
class RecycleModel extends BaseModel{

	protected $table = 'cmf_recycle_bin';

	protected $type = [
		'delete_time'	=>	'timestamp',
	];

	protected $autoWriteTimestamp = false;

	public function getCategoryAttr($value){
		if($value == 'article'){
			$value = '文章';
		}
		if($value == 'doctor'){
			$value = '医生';
		}
		if($value == 'slide'){
			$value = '幻灯片';
		}
		if($value == 'encyclopedia'){
			$value = '百科';
		}
		if($value == 'question'){
			$value = '问答';
		}
		if($value == 'form_data'){
			$value = '表单';
		}
		if($value == 'topic'){
			$value = '专题';
		}
		if($value == 'questionnaire'){
			$value = '问卷';
		}


		return $value;
	}

	public function RecycleList($param){

		$where = [];

		if(!empty($param['start_time']) && !empty($param['end_time'])  ){
			$where['a.create_time'] = [['>=', strtotime($param['start_time'])], ['<=', strtotime($param['end_time'])+86400]];
		}
		if(!empty($param['keyword'])){
			$where['a.name'] = ['like','%'.$param['keyword'].'%'];
		}

		$recycle = $this
					->alias('a')
					->join('cmf_user u','a.user_id = u.id')
					->field('a.id,a.create_time as delete_time,a.table_name as category,a.name as title,u.user_login as author')
					->where($where)
					->order('a.table_name desc')
					->paginate(10);

		return $recycle;

	}


}