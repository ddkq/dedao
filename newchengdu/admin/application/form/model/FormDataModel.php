<?php
namespace app\form\model;
use app\common\model\BaseModel;
use think\Db;


/**
* 表单数据模型
*/
class FormDataModel extends BaseModel{

	protected $table = 'cmf_form_data';

	protected $type = [
		'data' 		=> 	'json',
		'create_time' 	=> 	'timestamp',
	];

	protected $updateTime = false;


	//有分页的列表
	public function dataList($param){

		$is_search = 0;
		$where = [];
		$where['a.delete_time'] = 0; 
		if(!empty($param['start_time']) && !empty($param['end_time'])){
			$where['a.create_time'] = [['>=',strtotime($param['start_time'])],['<=',strtotime($param['end_time'])+86400]];
			$is_search = 1;
		}
		if(!empty($param['url'])){
			$where['a.page'] = ['like','%'.$param['url'].'%'];
			$is_search = 1;
		}
		if(!empty($param['form_id'])){
			$where['a.form_id'] = $param['form_id'];
			$is_search = 1;
		}

		$join = [
			['cmf_form f','a.form_id = f.id'],
		];

		if($is_search){
			$result = $this->alias('a')->join($join)->where($where)->field('a.*,f.form_name')->order('create_time desc')->select();
		}else{
			$result = $this->alias('a')->join($join)->where($where)->field('a.*,f.form_name')->order('create_time desc')->paginate(20);
		}

		
		return $result;

	}

	//无分页的列表(全部数据)
	public function dataListNoPage($param){
		$where = [];
		$where['a.delete_time'] = 0; 
		if(!empty($param['start_time']) && !empty($param['end_time'])){
			$where['a.create_time'] = [['>=',strtotime($param['start_time'])],['<=',strtotime($param['end_time'])]];
		}
		if(!empty($param['url'])){
			$where['a.page'] = ['like','%'.$param['url'].'%'];
		}
		if(!empty($param['form_id'])){
			$where['a.form_id'] = $param['form_id'];
		}

		$join = [
			['cmf_form f','a.form_id = f.id'],
		];

		$result = Db::connect('db_config'.parent::$db_id)->name('FormData')->alias('a')->join($join)->where($where)->field('a.id,a.page,a.ip,a.create_time,a.content,f.form_name')->order('create_time desc')->select();
		return $result;
	}



}