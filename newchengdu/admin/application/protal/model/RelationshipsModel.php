<?php
namespace app\protal\model;
use app\common\model\BaseModel;

/**
* 文章关系模型
*/
class RelationshipsModel extends BaseModel{

	protected $table = 'cmf_portal_relationships';

	public function article(){
        return $this->hasOne('ArticleModel','id');
    }

    public function category(){
    	return $this->hasOne('CategoryModel','id');
    }

}