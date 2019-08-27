<?php
namespace app\department\model;
use app\common\model\BaseModel;
use think\Db;

/**
* 科室关系模型
*/
class RelationshipsModel extends BaseModel{

	protected $table = 'cmf_department_relationships';

	public function doctor(){
        return $this->hasOne('DoctorModel','id');
    }

    public function department(){
    	return $this->hasOne('departmentModel','id');
    }

}