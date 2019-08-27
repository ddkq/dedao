<?php
namespace app\protal\model;
use app\common\model\BaseModel;

/**
* 百科关系模型
*/
class RelationshipsModel extends BaseModel{

	protected $table = 'cmf_en_relationships';

	public function encyclopedia(){
        return $this->hasOne('EncyclopediaModel','id');
    }

    public function category(){
    	return $this->hasOne('CategoryModel','id');
    }

}