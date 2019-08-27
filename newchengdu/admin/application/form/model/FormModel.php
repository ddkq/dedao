<?php
namespace app\form\model;
use app\common\model\BaseModel;
use app\form\model\FormDataModel;


/**
* 表单模型
*/
class FormModel extends BaseModel{
	
	protected $table = 'cmf_form';

	protected $autoWriteTimestamp = true;

	protected $type = [
		'content' => 'json',
	];

	public function setContentAttr($value){
        return json($value);
    }

	public function formList($param){

		$where = [];
		$where['delete_time'] = 0;
		if(!empty($param['keyword'])){
			$where['form_name'] = ['like','%'.$param['keyword'].'%'];
		}
		if(!empty($param['a.start_time']) && !empty($param['end_time'])){
			$where['create_time'] = [['>=',strtotime($param['start_time'])],['<=',strtotime($param['end_time'])+86400]];
		}

		$list = $this->where($where)->order('create_time desc')->paginate(10)->each(function($item, $key){
		    $item->data_count = FormDataModel::where('form_id',$item->id)->count();
		    $item->last_post_time = FormDataModel::where('form_id',$item->id)->limit(1)->order('create_time desc')->value('create_time');
		});
		return $list;
	}

	


}