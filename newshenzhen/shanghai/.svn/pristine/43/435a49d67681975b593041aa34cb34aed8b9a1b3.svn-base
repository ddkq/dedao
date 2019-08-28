<?php

namespace Job\Model;
use Think\Model\RelationModel;
class JobPostModel extends RelationModel{    
	protected $_link = array(        
		'JobWelfareRelationships'=>array(
			'mapping_type'      => self::HAS_MANY,            
			'class_name'        => 'JobWelfareRelationships',
			'foreign_key'		=> 'post_id',
			'mapping_name'		=> 'welfare',
		),
	);

	/*protected function _after_update($id,$data,$options){
		var_dump($id);exit;
		if(isset($data['ids'])){
			$post_id=$data['id'];
			$relation = D('Job/JobWelfareRelationships');
			$relation->where('post_id = $post_id')->delete();
			foreach ($data['ids'] as $vo){
				$relation->add(array("post_id"=>$post_id,"welfare_id"=>$vo));
			}
		}
	}*/

}