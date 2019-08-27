<?php
namespace app\department\model;
use app\common\model\BaseModel;

/**
* 预约挂号模型
*/
class ReservationModel extends BaseModel{
	
	protected $table = 'cmf_reservation';

	protected $dateFormat = 'Y-m-d';

	protected $type = [
		'appointment' 	=>	'timestamp',
	];

	protected $updateTime = false;

	public function reservationList($param){
		
		$where = [];
		$where['delete_time'] = 0;

		if(!empty($param['start_time'])){
			$where['appointment'] = ['>= time', $param['start_time']];
		}
		if(!empty($param['end_time'])){
			$where['appointment'] = ['<=', strtotime($param['end_time'])+86400];
		}
		if(!empty($param['keyword'])){
			$where['doctor'] = ['like','%'.$param['keyword'].'%'];
		}

		$lists = $this->where($where)->order('create_time')->paginate(10);

		return $lists;

	}
}